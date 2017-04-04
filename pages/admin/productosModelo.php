<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';

	if(isset($_REQUEST['dataid'])){
		$idprod = $_REQUEST['dataid'];
		$prep_stmt = "SELECT * FROM productos where idProducto = ? ";
		$stmt = $mysqli->prepare($prep_stmt);
		if ($stmt) {
			$stmt->bind_param('i',$idprod);
		    $stmt->execute();
		    $stmt->store_result();
		    $stmt->bind_result($idProducto,$nombreProducto,$stock,$descripcion,$fotoUrl,$fecha_cad,$precio,$rating,$oferta,$categoria);
		    $stmt->fetch();
		}  
	}

	//Eliminamos un producto si llega por parametro su id de producto
	if(isset($_REQUEST['prod_del'])){
		$idProducto = $_GET['prod_del'];
		$prep_stmt = "DELETE from productos where idProducto = ?";
		$stmt = $mysqli->prepare($prep_stmt);
		if ($stmt) {
		  $stmt->bind_param('i',$idProducto);
		  $stmt->execute();
		} 
	}


?>