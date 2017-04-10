<?php
define("HOST", "localhost"); 				// El host. 
define("USER", "root"); 					// La bd user. 
define("PASSWORD", ""); 					// El pwd de la bd
global $mysqli;
$mysqli = new mysqli(HOST, USER, PASSWORD);
$errors = "";
	$prep_stmt = "CREATE DATABASE IF NOT EXISTS mercadona DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	if ($insert_stmt = $mysqli->prepare($prep_stmt)) {
        if (!$insert_stmt->execute()) {
            $errors = "error en la query de creacion de base de datos";
            echo $errors;

    	}
	}

	$mysqli->select_db('mercadona');

	//Creamos la tabla carrito 
	$prep_stmt = 'CREATE TABLE IF NOT EXISTS `carrito` (
	  `idCarrito` INT NOT NULL AUTO_INCREMENT,
	  `idUser` int(11) NOT NULL,
	  `idProducto` int(11) NOT NULL,
	  `cantidad` int(11) NOT NULL,
	   primary key (idCarrito)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	$stmt = $mysqli->prepare($prep_stmt);
	if (!$stmt->execute()) {
	    $errors = "error en la creacion de la tabla carrito";
	    echo $errors;

	}
	//Creamos la tabla productos
	$prep_stmt = 'CREATE TABLE IF NOT EXISTS `productos` (
	  `idProducto` int(11) AUTO_INCREMENT NOT NULL,
	  `nombreProducto` varchar(255) NOT NULL,
	  `stock` int(11) NOT NULL,
	  `descripcion` varchar(255) NOT NULL,
	  `foto` varchar(255) NOT NULL,
	  `fecha_caducidad` date NOT NULL,
	  `precio` decimal(6,2) NOT NULL,
	  `rating` int(11) NOT NULL,
	  `oferta` int(11) NOT NULL,
	  `categoria` varchar(255) NOT NULL,
	  primary key (idProducto)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	$stmt = $mysqli->prepare($prep_stmt);
	if (!$stmt->execute()) {
	    $errors = "error en la creacion de la tabla productos";
	    echo $errors;

	}
	//Creamos la tabla usuarios
	$prep_stmt = 'CREATE TABLE IF NOT EXISTS `users` (
	  `idUser` int(11) AUTO_INCREMENT NOT NULL,
	  `username` varchar(255) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `picture` varchar(255) NOT NULL,
	  `salt` varchar(255) NOT NULL,
	  `nombre` varchar(255) NOT NULL,
	  `nif` varchar(9) NOT NULL,
	  `apellido1` varchar(255) NOT NULL,
	  `apellido2` varchar(255) NOT NULL,
	  `direccion` varchar(255) NOT NULL,
	  `telefono` varchar(12) NOT NULL,
	  `provincia` varchar(255) NOT NULL,
	  `fecha_nacimiento` date NOT NULL,
	  `email` varchar(255) NOT NULL,
	  `gasto` decimal(10,0) NOT NULL,
	  `role` varchar(255) NOT NULL,
	  primary key(idUser)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	$stmt = $mysqli->prepare($prep_stmt);
	if (!$stmt->execute()) {
	    $errors = "error en la creacion de la tabla users";
	   	echo $errors;

	}
	//Creamos la tabla ventas
	$prep_stmt = 'CREATE TABLE IF NOT EXISTS `ventas` (
	  `idVenta` INT NOT NULL AUTO_INCREMENT,
	  `numCarrito` int(11) NOT NULL,
	  `idProducto` int(11) NOT NULL,
	  `idUser` int(11) NOT NULL,
	  `fechaCompra` date NOT NULL,
	  `cantidad` int(11) NOT NULL,
	  primary key(idVenta)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	$stmt = $mysqli->prepare($prep_stmt);
	if (!$stmt->execute()) {
	    $errors = "error en la creacion de la tabla ventas";
	    echo $errors;
	}

	$prep_stmt = "INSERT INTO `productos` (`idProducto`, `nombreProducto`, `stock`, `descripcion`, `foto`, `fecha_caducidad`, `precio`, `rating`, `oferta`, `categoria`) VALUES
(2, 'Bravas', 5, 'Bravas riquisimas', 'http://blogs.lainformacion.com/strambotic/files/2011/11/patatas-bravas-hacendado-1.jpg', '2017-08-10', '3.00', 1, 0, 'bebida'),
(3, 'Cocacola', 300, 'Cocacola', 'https://okdiario.com/recetas/img/2016/05/30/coca-cola.jpg', '2017-10-13', '1.00', 4, 40, 'bebida'),
(4, 'Chocolate', 5, 'Chocolate en barra', 'https://static.openfoodfacts.org/images/products/841/010/003/4065/front_es.6.full.jpg', '2017-03-09', '2.20', 1, 10, 'bebida'),
(6, 'Leche', 5, 'Leche entera de mentira', 'https://parroquiadesanjuandb.files.wordpress.com/2016/12/14-leche.png', '2017-03-15', '1.00', 3, 20, 'bebida')";
	$stmt = $mysqli->prepare($prep_stmt);
	if (!$stmt->execute()) {
		$errors = "Error en la insercion de productos";
	    echo $errors;
	}
	if($errors == ""){
		header('Location: ../index?err=success');
	}else{
		header('Location: ../index?err=creating');
	}
?>