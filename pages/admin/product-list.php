<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';

sec_session_start();
$prep_stmt = "SELECT * FROM productos";
$stmt = $mysqli->prepare($prep_stmt);
if ($stmt) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idProducto,$nombreProducto,$stock,$descripcion,$fotoUrl,$fecha_cad,$precio,$rating,$oferta,$categoria);
}  

?>
 <div class="main-box no-header clearfix">
 <div class="main-box-body clearfix">
 <div class="table-responsive">
 <table class="table user-list">
 <thead>
    <tr style="
    background-color:#00754D;
    color:white;
    border-width:0px;
    font-family:Arial;
    font-size:13px;
    text-align:center;">
       <th><span>Foto</span></th>
       <th><span>Nombre producto</span></th>
       <th><span>Stock</span></th>
       <th><span>Descripcion</span></th>
       <th><span>Fecha caducidad</span></th>
       <th><span>Precio</span></th>
       <th><span>Valoración</span></th>
       <th class="text-center"><span>Oferta</span></th>
       <th><span>Categoria</span></th>
       <th><span>Opciones</span></th>
    </tr>
 </thead>
 <tbody>
    <?php 
    while ($stmt->fetch()) {

    ?>
      <tr class="well" style="background-color:#efefef;">
      <td> 
          <img width=60px style="border-radius:10px;" src="<?php echo $fotoUrl ?>" alt=""> 
      </td>
      <td>
           <span class="col-md-2"><?php echo $nombreProducto?></span>
      </td>
      <td>
           <span class="user-link"><?php echo $stock ?></span>
      </td>
      <td>
       <span class="user-subhead"><?php echo $descripcion ?></span>
      </td>
       <td align="center"><?php echo $fecha_cad ?></td>
       <td class="text-center"><?php echo $precio."€" ?></td>
       <td class="text-center">
       <?php
        for ($i=0; $i < 5 ; $i++) {             
           if($rating > $i) {
            echo '<i style="color:green" class="fa fa-star"></i>';
           }else {
            echo '<i class="fa fa-star"></i>';
           }
        }
       ?>
       </td>
       <td class="text-center"> 
       <?php 
       if ($oferta == 0) {
          echo '<span class="label label-default">'.$oferta."%".' </span>';
       }else {
          echo '<span class="label label-success">'.$oferta."%".' </span>';
       }
       ?>
      </td>
      <td> 
          <span><?php echo ucwords($categoria) ?></a>
      </td>
       <td style="width: 20%;"> 
           <a data-toggle="modal" data-target="#myModal" class="btn btn-success editProduct" data-id="<?php echo $idProducto?>" aria-label="Delete"> 
              <i class="fa fa-edit" aria-hidden="true"></i>
          </a>
          <a class="btn btn-danger" 
          href="?prod_del=<?php echo $idProducto ?>" 
          aria-label="Delete">
          <i class="fa fa-trash-o" aria-hidden="true"></i>
          </a>
      </td>
    </tr>
  <?php } ?>

 </tbody>
</table>
</div>
</div>
</div>
<script type="text/javascript">
    $('a.editProduct').on("click",function(event) {
      event.preventDefault();
      var d = $(this).attr('data-id');
      $.post("modalProductos.php?dataid="+d, function(data){
        var e="editar_producto.php?dataid="+d;
        $("#myModal").html(data);
        $("#myModal").modal();
        $("#myModal").find(".editar_producto").attr('action',e);
      });
});
</script>