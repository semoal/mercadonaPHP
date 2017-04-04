<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();


	if(isset($_REQUEST['dataid'])){
		$userid = $_REQUEST['dataid'];
		$prep_stmt = "SELECT idUser,username,picture,nif,role,nombre,apellido1,apellido2,direccion,telefono,provincia,fecha_nacimiento,email FROM users WHERE idUser = ? LIMIT 1";
			$stmt = $mysqli->prepare($prep_stmt);
			if ($stmt) {
			    $stmt->bind_param('i', $userid);
			    $stmt->execute();
			    $stmt->store_result();
			    $stmt->bind_result($idUser,$username,$picture,$nif,$role,$nombre,$apellido1,$apellido2,$direccion,$telefono,$provincia,$fecha_nacimiento,$email);
			    $stmt->fetch();
			}  
	}else{
		$prep_stmt = "SELECT idUser,username,picture,nif,role,nombre,apellido1,apellido2,direccion,telefono,provincia,fecha_nacimiento,email FROM users WHERE idUser = ? LIMIT 1";
			$stmt = $mysqli->prepare($prep_stmt);
			if ($stmt) {
			    $stmt->bind_param('i', $_SESSION['user_id']);
			    $stmt->execute();
			    $stmt->store_result();
			    $stmt->bind_result($idUser,$username,$picture,$nif,$role,$nombre,$apellido1,$apellido2,$direccion,$telefono,$provincia,$fecha_nacimiento,$email);
			    $stmt->fetch();
			}  
	}

	if(isset($_REQUEST['userid_del'])){
		$userIdDel = $_GET['userid_del'];
		$prep_stmt = "DELETE from users where idUser = ?";
		$stmt = $mysqli->prepare($prep_stmt);
		if ($stmt) {
		  $stmt->bind_param('i',$userIdDel);
		  $stmt->execute();
		} 
	}


?>