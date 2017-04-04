<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

$nombreUsuario = $_POST['userNombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$telefono = $_POST['tlf'];
$provincia = $_POST['provincia'];
$fecha = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$picture = $_POST['foto'];
$nif = $_POST['nif'];
$userid = $_REQUEST['dataid'];
	

if(isset($userid)){
	$prep_stmt = "UPDATE users SET picture=?, nif=?,nombre=?,apellido1=?,apellido2=?,direccion=?,telefono=?,provincia=?,fecha_nacimiento=?,email=? WHERE idUser = ? LIMIT 1";
	$stmt = $mysqli->prepare($prep_stmt);
	if ($stmt) {
	    $stmt->bind_param('ssssssssssi',$picture,$nif,$nombreUsuario,$apellido1,$apellido2,$direccion,$telefono,$provincia,$fecha,$email,$userid);
	    $stmt->execute();
	    header('Location: admin-userlist');
	}  
}else{
	$prep_stmt = "UPDATE users SET picture=?, nif=?,nombre=?,apellido1=?,apellido2=?,direccion=?,telefono=?,provincia=?,fecha_nacimiento=?,email=? WHERE idUser = ? LIMIT 1";
	$stmt = $mysqli->prepare($prep_stmt);
	if ($stmt) {
	$stmt->bind_param('ssssssssssi',$picture,$nif,$nombreUsuario,$apellido1,$apellido2,$direccion,$telefono,$provincia,$fecha,$email,$_SESSION['user_id']);
	$stmt->execute();
	header('Location: ../clientes/clientes-main');
	}  
}

?>