<?php 
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
sec_session_start();

//Mostramos el carrito del usuario
//select * from carrito where idUser = $_SESSION[id_user];
$prep_stmt = "SELECT carrito.idProducto,carrito.idCarrito,cantidad,precio,oferta,nombreProducto,foto FROM carrito LEFT JOIN productos ON carrito.idProducto = productos.idProducto where carrito.idUser = ?";
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
	//echo $_SESSION['user_id'];
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idProductoCarrito,$idCarrito,$cantidadCarrito,$precioCarrito,$ofertaCarrito,$nombreProductoCarrito,$foto);
    if($stmt->num_rows()>0){
	    while ($stmt->fetch()) {
	    	?>
	    	<ul class="shopping-cart-items">
	    	<li class="clearfix">
	          <img width=50px src="<?php echo $foto ?>" alt="item1" />
	          <span class="item-name"><?php echo $nombreProductoCarrito ?></span>
	          <span class="item-price">
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
                	
                </span>
	          <span class="item-quantity">Cantidad:  <?php echo $cantidadCarrito ?></span>
	          <a href="?del=<?php echo $idCarrito ?>">
	    			<span class="label label-primary"> Borrar </span>
	    		</a>
	        </li>
	        </ul>
	    <?php
		}
		echo('<div class="shopping-cart-total">
              <span class="lighter-text">Total:</span>
              <span class="main-color-text">'. array_sum($totalArray).'€</span>
              </div>'
            );
	}
}
?>

