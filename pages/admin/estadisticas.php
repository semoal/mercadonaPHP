<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';

//Clientes activos
$prep_stmt = "SELECT count(*) FROM users WHERE role='Cliente'";
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($totalClientes);
    $stmt->fetch();
}  
//Ventas
$prep_stmt = "SELECT max(numCarrito) FROM ventas v,productos p WHERE v.idProducto = p.idProducto";
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($totalVentas);
    $stmt->fetch();
}  
//Ingresos
$prep_stmt = "SELECT precio,oferta,cantidad FROM ventas v,productos p WHERE v.idProducto = p.idProducto";
$stmt = $mysqli->prepare($prep_stmt);
$ingresos = 0;
if ($stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($precio,$oferta,$cantidad);
    while($stmt->fetch()){
    	if($oferta != 0){
    		$ingresos += (($precio) - ($precio * $oferta)/100)*$cantidad;
    	}else{
    		$ingresos += $precio * $cantidad;
    	}
    }
}  
?>