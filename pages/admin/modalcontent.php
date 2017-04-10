<?php
include_once('user_checker.php');
?>
<script src="js/bootstrap-datepicker.js"></script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css" media="all" />

<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Editar perfil</h4>
      </div>
      <div class="modal-body">
         <form action="editar_perfil" class="form-horizontal editarperfil" role="form" method="POST">
            <!-- nombre -->
            <div class="form-group">
               <label for="name" class="col-sm-3 control-label">Nombre</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $nombre ?>" class="form-control" name="userNombre" id="name" placeholder="Nombre">
               </div>
            </div>
            <!-- apel  -->
            <div class="form-group">
               <label for="name" class="col-sm-3 control-label">1º Apellido</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $apellido1?>" class="form-control" name="apellido1" id="name" placeholder="Apellido">
               </div>
            </div>
            <!-- ape -->
            <div class="form-group">
               <label for="name" class="col-sm-3 control-label">2º Apellido</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $apellido2?>" class="form-control" name="apellido2" id="name" placeholder="Segundo apellido">
               </div>
            </div>
            <!--nif -->
            <div class="form-group">
               <label for="name" class="col-sm-3 control-label">NIF</label>
               <div class="col-sm-9">
                  <input type="text" maxlength="9" value="<?php echo $nif?>" class="form-control" name="nif" id="name" placeholder="NIF">
               </div>
            </div>
            <!-- Direccion // -->
            <div class="form-group">
               <label for="name" class="col-sm-3 control-label">Dirección</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $direccion?>" class="form-control" name="direccion" id="name" placeholder="Dirección">
               </div>
            </div>
            <!-- telefono -->
            <div class="form-group">
               <label class="col-sm-3 control-label">Telefono</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $telefono?>" class="form-control" name="tlf" id="name" placeholder="Telefono">
               </div>
            </div>
            <!-- + Provincia // -->
            <div class="form-group">
               <label class="col-sm-3 control-label">Provincia</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $provincia?>" class="form-control" name="provincia" id="name" placeholder="Provincia">
               </div>
            </div>
            <!-- Fecha de nacimiento // -->
            <div class="form-group">
               <label for="qty" class="col-sm-3 control-label">Fecha de nacimiento</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $fecha_nacimiento?>" id="datepicker" class="form-control" data-date-format="yyyy-mm-dd" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
               </div>
            </div>
            <!-- email // -->
            <div class="form-group">
               <label class="col-sm-3 control-label">Email</label>
               <div class="col-sm-9">
                  <input type="email" value="<?php echo $email?>" class="form-control" name="email" id="name" placeholder="Correo electronico">
               </div>
            </div>
            <!-- foto // -->
            <div class="form-group">
               <label class="col-sm-3 control-label">Foto de perfil</label>
               <div class="col-sm-9">
                  <input type="text" value="<?php echo $picture?>" class="form-control" name="foto" id="name" placeholder="Url del icono">
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" name="upload" class="btn btn-success submitButton">Guardar cambios</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
      </div>
      </form>                     
   </div>
</div>