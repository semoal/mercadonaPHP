<?php 
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

//Mostramos el carrito del usuario
//select * from carrito where idUser = $_SESSION[id_user];
$prep_stmt = "SELECT carrito.idProducto,carrito.idCarrito,cantidad,precio,oferta,nombreProducto FROM carrito LEFT JOIN productos ON carrito.idProducto = productos.idProducto where carrito.idUser = ?";
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
	//echo $_SESSION['user_id'];
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idProductoCarrito,$idCarrito,$cantidadCarrito,$precioCarrito,$ofertaCarrito,$nombreProductoCarrito);
    if($stmt->num_rows()>0){
	    while ($stmt->fetch()) {
	    	?>
	    	<ul class="list-group">
	    		<li class="list-group-item"> <?php echo $nombreProductoCarrito ?>
	    		<p class="pull-right">
	    		<?php 
                $total = 0;
                $totalArray[] = 0;
                if($ofertaCarrito != 0){
                   echo '<strike style="color:red;">'. $cantidadCarrito * $precioCarrito."€".'</strike>';
                   $total = ($precioCarrito) - ($precioCarrito * $ofertaCarrito)/100;
                   echo " ".$cantidadCarrito * $total."€";
                   array_push($totalArray, $cantidadCarrito*$total);

                }else{
                   echo  $cantidadCarrito * $precioCarrito."€";
                   array_push($totalArray, $cantidadCarrito*$precioCarrito);

                }
                ?>
	    		</p>
	    		<span class="label label-default"> <?php echo $cantidadCarrito ?></span>
	    		<a href="?del=<?php echo $idCarrito ?>">
	    			<span class="label label-primary"> Borrar </span>
	    		</a>
	    		</li>
	    	</ul>
	    <?php
		}
		echo('<h4 class="well"> Precio total cesta: '.array_sum($totalArray).'€ </h4>');
	}
}
?>

