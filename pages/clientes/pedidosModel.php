<?php 
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

	$prep_stmt = "SELECT numCarrito,fechaCompra FROM ventas v,productos p WHERE v.idProducto = p.idProducto and idUser = ? GROUP BY numCarrito";
	$stmt = $mysqli->prepare($prep_stmt);
	if ($stmt) {
	    $stmt->bind_param('i', $_SESSION['user_id']);
	    $stmt->execute();
	    $stmt->store_result();
	    $stmt->bind_result($numCarrito,$fecha);
	    while($stmt->fetch()){
	    	?>
	    	<a href="factura?ped=<?php echo $numCarrito?>">
	    	<li class="list-group-item">
              <span class="prefix"><?php echo $fecha ?></span>
              <span class="label label-success"><?php echo "#Pedido: ".$numCarrito ?></span>
          </li>
          </a>
	    	<?php
	    }
	}
?>

