<?php
include_once 'db_connect.php';
$error_msg = "";
if (isset($_POST['usr'], $_POST['pwd'])) {
    $username = filter_input(INPUT_POST, 'usr', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

    $prep_stmt = "SELECT idUser FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == "1") {
            //Un usuario ya existe con este nombre
            $error_msg .= 'Este usuario ya existe';
            echo $error_msg;
        }
    } 
    if (empty($error_msg)) {
    	$role = 'Cliente';
        //Creamos un codigo para cifrar aleatorio
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
        //Creamos una contraseña cifrada
        $password = hash('sha512', $password . $random_salt);
        //Introducimos una imagen de perfl inicial -- El usuario la podrá cambiar despúes
        $imagenPerfilInicial ="https://static.notinerd.com/wp-content/uploads/2014/04/715.jpg";
        
        //Si el usuario contiene @mercadona.es pasa a ser usuario administrador
        if(strpos($username, '@mercadona.es') !== false){
            $role = 'Admin';
        }
        

		if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, password, picture, salt, role) VALUES (?, ?, ?, ?, ?)")) {
	            $insert_stmt->bind_param('sssss', $username, $password, $imagenPerfilInicial, $random_salt, $role);
	            if (! $insert_stmt->execute()) {
	                header('Location: ../error?err=Registration failure');
	                exit();
            	}
        	}
            header('Location: ../index');
    	}
}

?>