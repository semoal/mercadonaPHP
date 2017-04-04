<?php
include_once('productosModelo.php');
?>
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Editar producto</h4>
      </div>
      <div class="modal-body">
         <form action="editar_producto" class="form-horizontal editar_producto" role="form" method="POST">
                <!-- IDENTIFICADOR DEL PRODUCTO -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Código de barras</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $idProducto?>" readonly class="form-control" name="idProducto" id="name" placeholder="El identificador del producto es automatico">
                    </div>
                </div>
                <!-- Nombre del producto -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $nombreProducto?>" class="form-control" name="product_name" id="name" placeholder="Nombre del producto">
                    </div>
                </div>
                <!-- Cantidad -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="number" value="<?php echo $stock?>" class="form-control" name="stock" id="cantidad" placeholder="Cantidad de stock">
                    </div>
                </div>
                <!-- Descripcion // -->
                <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea name="desc" class="form-control"><?php echo $descripcion?></textarea>
                    </div>
                </div>
                <!-- Url de la foto // -->
                <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo $fotoUrl?>" class="form-control" name="foto" placeholder="Url de la foto">
                    </div>
                </div>
                <!-- Fecha de caducidad // -->
                <div class="form-group">
                    <label for="qty" class="col-sm-3 control-label">Fecha de caducidad</label>
                    <div class="col-sm-3">
                        <input type="text" id="datepicker" value="<?php echo $fecha_cad?>" class="form-control" data-date-format="yyyy-mm-dd" name="fecha_cadu" placeholder="Fecha de caducidad">
                    </div>
                </div>
                <!-- Precio // -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Precio</label>
                    <div class="col-sm-3">
                        <input type="number" value="<?php echo $precio?>" class="form-control" name="precio" id="date_start" placeholder="Precio">
                    </div>
                </div>
                <!-- form-group // -->
                <div class="form-group">
                    <label for="tech" class="col-sm-3 control-label">Rating</label>
                    <div class="col-sm-3">
                        <select name="rating" class="form-control" value="<?php echo $rating?>">
                            <option value="1">
                               1
                            </option>
                            <option value="2">
                               2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                        </select>
                    </div>
                </div>
                <!-- form-group // -->
                <div class="form-group">
                    <label for="tech" class="col-sm-3 control-label">Oferta</label>
                    <div class="col-sm-3">
                        <input type="number" value="<?php echo $oferta?>" class="form-control" name="oferta" id="date_start" placeholder="%">
                    </div>
                </div>
                <!-- form-group // -->
                <div class="form-group">
                    <label for="tech" class="col-sm-3 control-label">Categoria</label>
                    <div class="col-sm-3">
                        <select name="categoria" class="form-control">
                            <option value="bebida">Bebida</option>
                            <option value="comida">Comida</option>
                            <option value="higiene">Higiene personal</option>
                            <option value="limpieza">Limpieza del hogar</option>
                            <option value="mascotas">Cuidado de mascotas</option>
                        </select>
                    </div>
                </div>

            <div class="modal-footer">
               <button type="submit" name="upload" class="btn btn-success submitButton">Guardar cambios</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
      </div>
   </div>
</div>