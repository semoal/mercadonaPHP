<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

$nombreProducto=$_POST['product_name'];
$stock=$_POST['stock'];
$descripcion=$_POST['desc'];
$fotoUrl=$_POST['foto'];
$fecha_cad=$_POST['fecha_cadu'];
$precio=$_POST['precio'];
$rating=$_POST['rating'];
$oferta=$_POST['oferta'];
$categoria=$_POST['categoria'];	
$idProducto = $_REQUEST['dataid'];

if(isset($idProducto)){
		$prep_stmt = "UPDATE productos SET nombreProducto=?, stock=?,descripcion=?,foto=?,fecha_caducidad=?,precio=?,rating=?,oferta=?,categoria=? WHERE idProducto = ? LIMIT 1";
	$stmt = $mysqli->prepare($prep_stmt);
	if ($stmt) {
	    $stmt->bind_param('sissssiisi',
	    	$nombreProducto,
	    	$stock,
	    	$descripcion,
	    	$fotoUrl,
	    	$fecha_cad,
	    	$precio,
	    	$rating,
	    	$oferta,
	    	$categoria,
	    	$idProducto);
	    $stmt->execute();
	    header('Location: admin-productlist');
	}  
}

?>