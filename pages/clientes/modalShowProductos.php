<?php
include_once('../admin/productosModelo.php');
?>
<style type="text/css">

.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0px;}
.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0px;}
div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0px;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}
</style>
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo $nombreProducto?></h4>
      </div>
      <div class="modal-body">
            <div class="row">
               <div class="col-md-4">
                  <img style="width: 200%;border-radius: 4%;" src="<?php echo $fotoUrl?>" />
                </div>
                <!--Informacion de la derecha -->
                <div class="col-md-5" style="border:0px solid gray;float:right;">
                    <!-- Datos del vendedor y titulo del producto -->
                     <h3><?php echo $nombreProducto?></h3>    
                     <h5 class="price-text-color">
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

                     <?php 
                     for ($i=0; $i < 5 ; $i++) {               
                        if($rating > $i) {
                           echo '<i class="price-text-color fa fa-star"></i>';
                        }else {
                           echo '<i class="fa fa-star"></i>';
                        }
                     }
                     ?>

                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>CANTIDAD</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input id="cantidadValue" value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button onclick="addToCart();" data-id="<?php echo $idProducto ?>" class="btn btn-primary btn-block"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                    </div>                                        
                </div>                              
                <div class="col-xs-9">
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            <?php echo $descripcion?>
                            </small>
                        </p>
                    </div>
                </div>     
            </div>
      </div>
   </div>
</div>
<script type="text/javascript">
       $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            });      
            function addToCart(){
                var idProducto = $('.section > button').attr('data-id');
                var cantidadProductos = $(".section > div > input").val();
                window.location.replace("clientes-main?buyProd="+idProducto+"&buyCant="+cantidadProductos+"");
             }
            
</script>