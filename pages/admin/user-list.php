<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';

sec_session_start();
 $prep_stmt = "SELECT idUser,username,picture,nif,role,nombre,apellido1,apellido2,direccion,telefono,provincia,fecha_nacimiento,email FROM users";
      $stmt = $mysqli->prepare($prep_stmt);
      if ($stmt) {
          $stmt->execute();
          $stmt->store_result();
          $stmt->bind_result($idUser,$username,$picture,$nif,$role,$nombre,$apellido1,$apellido2,$direccion,$telefono,$provincia,$fecha_nacimiento,$email);
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
       <th><span>Icono</span></th>
       <th><span>Usuario</span></th>
       <th><span>NIF</span></th>
       <th><span>Nombre</span></th>
       <th><span>Dirección</span></th>
       <th><span>Provincia</span></th>
       <th><span>Telefono</span></th>
       <th class="text-center"><span>Gasto</span></th>
       <th><span>Email</span></th>
       <th><span>Role</span></th>
       <th><span>Opciones</span></th>
    </tr>
 </thead>
 <tbody>
    <?php 
    while ($stmt->fetch()) {

    ?>
      <tr class="well" style="background-color:#efefef;">
      <td> 
          <img width=60px style="border-radius:10px;" src="<?php echo $picture ?>" alt=""> 
      </td>
      <td>
           <span class="user-link"><?php echo $username?></span>
      </td>
      <td>
           <span class="user-link"><?php echo $nif ?></span>
      </td>
      <td>
       <span class="user-subhead"><?php echo $nombre." ".$apellido1." ".$apellido2 ?></span>
      </td>
       <td class="col-md-2" ><?php echo $direccion ?></td>
       <td class="col-md-2"><?php echo $provincia ?></td>
       <td><?php echo $telefono ?></td>
       <td class="text-center"> 
          <span class="label label-default">0€</span>
      </td>
      <td> 
          <a href="#"><?php echo $email ?></a>
      </td>
      <td> 
          <span><?php echo $role ?></a>
      </td>
       <td style="width: 20%;"> 
           <a data-toggle="modal" data-target="#myModal" class="btn btn-success editProfile" data-id="<?php echo $idUser?>" aria-label="Delete"> 
              <i class="fa fa-edit" aria-hidden="true"></i>
          </a>
          <a class="btn btn-danger" 
          href="?userid_del=<?php echo $idUser ?>" 
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
    $('a.editProfile').on("click",function(event) {
      event.preventDefault();
      var d = $(this).attr('data-id');
      $.post("modalcontent.php?dataid="+d, function(data){
        var e="editar_perfil.php?dataid="+d;
        $("#myModal").html(data);
        $("#myModal").modal();
        $("#myModal").find(".editarperfil").attr('action',e);
      });
});
</script>