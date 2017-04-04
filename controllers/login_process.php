<?php
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

    $error_msg = "";
    if (isset($_POST['inputLogin'], $_POST['inputLoginPassword'])) {
        $username = filter_input(INPUT_POST, 'inputLogin', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'inputLoginPassword', FILTER_SANITIZE_STRING);

        /*
        * Comprueba que la información sea correcta
        */
        function usuarioExist ($username,$mysqli,$error_msg){
           $prep_stmt = "SELECT idUser FROM users WHERE username = ? LIMIT 1";
            $stmt = $mysqli->prepare($prep_stmt);
            if ($stmt) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows == "0") {
                    $error_msg .= 'Este usuario no existe';
                    header('Location: ../index?err=404');
                }
            }
        }

        usuarioExist($username,$mysqli,$error_msg);

        function doLogin($username,$password,$mysqli){
            if (empty($error_msg)) {
                if (isset($username,$password)) {
                    if (login($username, $password, $mysqli) == true) {
                        if(check_role() == 'Cliente'){
                            header('Location: ../pages/clientes/clientes-main');
                        }else if(check_role() == 'Admin'){
                            header('Location: ../pages/admin/admin-cp');
                        }
                        exit();
                    }else {
                        exit();
                    }
                }

            }
        }

        doLogin($username,$password,$mysqli);

    }
?>
