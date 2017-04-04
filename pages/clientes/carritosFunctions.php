<?php 
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
//Query para insertar en la base de datos de carrito 
//Insertamos en carrito: idUser,idProducto,cantidad,precio,oferta
//Pedimos por parametro el idDel producto a añadir y la cantidad
//INSERT INTO carrito c(idUser,idProducto,cantidad,precio,oferta) SELECT precio,oferta from productos p where p.idProducto = c.idProducto;
if(isset($_REQUEST['buyProd']) && isset($_REQUEST['buyCant'])){
	$idProductoBuy = $_REQUEST['buyProd'];
	$cantidad = $_REQUEST['buyCant'];	
	if ($insert_stmt = $mysqli->prepare("INSERT INTO carrito (idUser, idProducto, cantidad) VALUES (?, ?, ?)")) {
	        $insert_stmt->bind_param('iii', $_SESSION['user_id'], $idProductoBuy, $cantidad);
	        if (!$insert_stmt->execute()) {
	            echo "Fallo al añadir un producto al carro";
	            exit();
	    	}
	}
}

function cantidadProductos (){
	global $mysqli;
	$prep_stmt = "select count(*) from carrito where idUser = ?";
	$stmt = $mysqli->prepare($prep_stmt);

	if ($stmt) {
	    $stmt->bind_param('i', $_SESSION['user_id']);
	    $stmt->execute();
	    $stmt->store_result();
	    $stmt->bind_result($productosEnCarrito);
	    $stmt->fetch();
	}
	echo $productosEnCarrito;
}

//Borramos algun item del carrito cuando el usuario nos lo pida por param ?delItem=idProducto
//idProductoDel = $_REQUEST['delItem'];
/*delete from carrito where idUser = $_SESSION[id-user] and idProducto = idProductoDel; */
if(isset($_REQUEST['del'])){
	$idCarrito = $_REQUEST['del'];
	$prep_stmt = "DELETE FROM carrito where idUser = ? and idCarrito = ?";
	$stmt = $mysqli->prepare($prep_stmt);
		if ($stmt) {
			$stmt->bind_param('ii',$_SESSION['user_id'],$idCarrito);
		    $stmt->execute();
		}  
}

if(isset($_REQUEST['buy'])){
	$numCarrito=0;
	$prep_stmt = "select max(numCarrito) from ventas where idUser = ?";
	$stmt = $mysqli->prepare($prep_stmt);

	if ($stmt) {
	    $stmt->bind_param('i', $_SESSION['user_id']);
	    $stmt->execute();
	    $stmt->store_result();
	    $stmt->bind_result($numCarrito);
	    $stmt->fetch();
	}
	$numCarrito = intval($numCarrito)+1;

	$prep_stmt = "select idProducto,cantidad,idCarrito from carrito where idUser = ?";
	$stmt = $mysqli->prepare($prep_stmt);

	if ($stmt) {
	    $stmt->bind_param('i', $_SESSION['user_id']);
	    $stmt->execute();
	    $stmt->store_result();
	    $stmt->bind_result($idProducto,$cantidad,$idCarrito);
	    while($stmt->fetch()){
	    	if ($insert_stmt = $mysqli->prepare("INSERT INTO ventas 
	    		(numCarrito, idProducto, idUser, fechaCompra,cantidad) VALUES (?, ?, ?, NOW(), ?)")) {
			        $insert_stmt->bind_param('iiii', $numCarrito, $idProducto, $_SESSION['user_id'], $cantidad);
			        if ($insert_stmt->execute()) {
			    	}
			}
	    }
	}
	 $prep_stmt = "DELETE FROM carrito where idUser = ?";
	 $stmt = $mysqli->prepare($prep_stmt);
		if ($stmt) {
			$stmt->bind_param('i',$_SESSION['user_id']);
		    $stmt->execute();
		} 
	header('Location: clientes-main'); 
}
?>

