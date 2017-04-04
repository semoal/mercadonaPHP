<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

$nombreProducto = $_POST['product_name'];
$stock = $_POST['stock'];
$descripcion = $_POST['desc'];
$fotoUrl = $_POST['foto'];
$fecha_cad = $_POST['fecha_cadu'];
$precio = $_POST['precio'];
$rating = $_POST['rating'];
$oferta = $_POST['oferta'];
$categoria = $_POST['categoria'];

if ($insert_stmt = $mysqli->prepare("INSERT INTO productos (nombreProducto,stock,descripcion,foto,fecha_caducidad,precio,rating,oferta,categoria) VALUES (?,?,?,?,?,?,?,?,?)")) {
    $insert_stmt->bind_param('sisssiiis', $nombreProducto,$stock,$descripcion,$fotoUrl,$fecha_cad,$precio,$rating,$oferta,$categoria);
    if (! $insert_stmt->execute()) {
        header('Location: admin-product?success=0');
        exit();
	}
}
header('Location: admin-product?success=1');
?>