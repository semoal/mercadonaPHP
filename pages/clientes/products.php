<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
include_once 'carritosFunctions.php';
sec_session_start();
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idProducto,$nombreProducto,$stock,$descripcion,$foto,$fecha_caducidad,$precio,$rating,$oferta,$categoria);
    if($stmt->num_rows()>0){
	    while ($stmt->fetch()) {
	   		?>
	   		<div class="col-xs-12 col-sm-6 col-md-3 omagod">
	   		<div class="col-item" data-id="<?php echo $idProducto?>">
	   		<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal" class="showModalProductos" data-id="<?php echo $idProducto?>">
	   			
				<div class="post-img-content">
					<span style="position: absolute;z-index: 999;top: 6px;right: 6px;padding: 6px;" class="label label-primary">
                        <?php echo ucwords($categoria) ?>
                    </span>
				    <img style="width:350px;height:206px;" src="<?php echo $foto?>" class="img-responsive" />
				    <?php
				    if($oferta != 0){
				    	?>
				    	 <span class="round-tag"> <?php echo $oferta."%"?> </span>
				    <?php 
				    }
				    ?>
				</div>
				<div class="info">
			</a>
				    <div class="row">
				        <div class="price col-md-6">
				            <h5 class="nombreProducto"> 
				            	<?php echo $nombreProducto ?>
				            </h5>
				            <h5 class="price-text-color price">
				            	<?php 
				            	$total = 0;
				            	if($oferta != 0){
				            		echo '<strike style="color:red;">'.$precio."€".'</strike>';
				            		$total = ($precio) - ($precio * $oferta)/100;
				            		echo " ".$total."€";
				            	}else{
				            		echo $precio."€";
				            	}
				            	?>
				            </h5> 

				        </div>
				        <div class="rating hidden-sm col-md-6">
				       		<?php 
				       		for ($i=0; $i < 5 ; $i++) {        			
						         if($rating > $i) {
						         	echo '<i class="price-text-color fa fa-star"></i>';
						         }else {
				       				echo '<i class="fa fa-star"></i>';
						         }
				       		}
				       		?>
				        </div>
				    </div>
				    <!--<div style="padding:10px;background-color:#f9f9f9" class="well">
				    <?php echo $descripcion ?>
				    </div>-->
				    <div>
	   				<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block showModalProductos" data-id="<?php echo $idProducto?>">
	   						<i class="fa fa-shopping-cart"></i>
				            <span>Ver detalles...</span>
				        </a>
				    </div>
				    <div class="clearfix">
				    </div>
				</div>
			</div>
			</div>
	   		<?php
		}
    }else{
    	echo "<h1> No hay productos </h1>";
    }
}
?>

<script type="text/javascript">
    $('a.showModalProductos').on("click",function(event) {
	      event.preventDefault();
	      var d = $(this).attr('data-id');
	      $.post("modalShowProductos.php?dataid="+d, function(data){
	        $("#myModal").html(data);
	        $("#myModal").modal();
	      });
	  });

    /*
    Workaround nº12505325 - Cesta temporal solo con JS.
    $('div.col-item').on("click",function(e) {
    	e.preventDefault();
    	var cart = $('.cart');
	    var d_id = $(this).attr('data-id');
	    var nombreProducto = $(this).find('h5.nombreProducto').html();
	    var precio  = $(this).find('h5.price').html();
	    var template = 
	    '<ul class="list-group">'+
	    	'<li class="list-group-item">'+nombreProducto+
	    	'<p class="pull-right">'+precio+'</p>'+
	    	'</li>'+
        '</ul>';    
	    cart.append(template);
	    alert("Producto añadido");
    });*/
</script>














