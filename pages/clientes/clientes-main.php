<?php 
    include_once '../admin/user_checker.php';
    include_once 'carritosFunctions.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Mercadona - Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <link href="../admin/css/datepicker.css" rel="stylesheet" type="text/css" media="all" />
    <script src="../admin/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../admin/css/sweetalert.css">

    <style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Roboto');
      h4,
      h5,
      h6,
      h1,
      h2,
      h3 {
          margin: 0;
      }
      ul,
      ol {
          margin: 0;
      }
      p {
          margin: 0;
      }
      html,
      body {
          font-weight: 300;
          font-size: 14px;
          background: #fff;
          font-family: 'Roboto', sans-serif;
      }
      #menu li a:hover {
          color: #00754D;
          transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
      }
      .lighter-text {
        color: #ABB0BE;
      }

      .main-color-text {
        color: #6394F8;
      }

      nav {
        padding: 20px 0 40px 0;
        background: #F8F8F8;
        font-size: 16px;
      }
      nav .navbar-left {
        float: left;
      }
      nav .navbar-right {
        float: right;
      }
      nav ul li {
        display: inline;
        padding-left: 20px;
      }
      nav ul li a {
        color: #777777;
        text-decoration: none;
      }
      nav ul li a:hover {
        color: black;
      }

      .container-shopping {
        margin: auto;
        width: 80%;
      }

      .badge {
        background-color: #6394F8;
        border-radius: 10px;
        color: white;
        display: inline-block;
        font-size: 12px;
        line-height: 1;
        padding: 3px 7px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
      }

      .shopping-cart {
        margin: 20px 0;
        float: right;
        background: white;
        width: 320px;
        position: relative;
        border-radius: 3px;
        padding: 20px;
      }
      .shopping-cart .shopping-cart-header {
        border-bottom: 1px solid #E8E8E8;
        padding-bottom: 15px;
      }
      .shopping-cart .shopping-cart-header .shopping-cart-total {
        float: right;
      }
      .shopping-cart .shopping-cart-items {
        padding-top: 20px;
      }
      .shopping-cart .shopping-cart-items li {
        margin-bottom: 18px;
      }
      .shopping-cart .shopping-cart-items img {
        float: left;
        margin-right: 12px;
      }
      .shopping-cart .shopping-cart-items .item-name {
        display: block;
        padding-top: 10px;
        font-size: 16px;
      }
      .shopping-cart .shopping-cart-items .item-price {
        color: #6394F8;
        margin-right: 8px;
      }
      .shopping-cart .shopping-cart-items .item-quantity {
        color: #ABB0BE;
      }

      .shopping-cart:after {
        bottom: 100%;
        left: 89%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: white;
        border-width: 8px;
        margin-left: -8px;
      }

      .cart-icon {
        color: #515783;
        font-size: 24px;
        margin-right: 7px;
        float: left;
      }

      .button {
        background: #6394F8;
        color: white;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        display: block;
        border-radius: 3px;
        font-size: 16px;
        margin: 25px 0 15px 0;
      }
      .button:hover {
        background: #729ef9;
      }

      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }

      .datepicker {
          top: 0;
          left: 0;
          padding: 4px;
          margin-top: 1px;
          -webkit-border-radius: 4px;
          -moz-border-radius: 4px;
          border-radius: 4px;
          z-index: 9999 !important;
      }
      .col-item {
          border: 1px solid #E1E1E1;
          border-radius: 10px;
          background: #FFF;
      }
      .col-item .photo img {
          margin: 0 auto;
          width: 100%;
          padding: 1px;
          border-radius: 10px 10px 0 0;
      }
      .col-item .info {
          padding: 10px;
          border-radius: 0 0 5px 5px;
          margin-top: 1px;
      }
      .col-item .price {
          /*width: 50%;*/
          
          float: left;
          margin-top: 5px;
      }
      .col-item .price h5 {
          line-height: 20px;
          margin: 0;
      }
      .price-text-color {
          color: #00754D;
      }
      .col-item .info .rating {
          color: #777;
      }
      .col-item .rating {
          float: left;
          font-size: 17px;
          text-align: right;
          line-height: 52px;
          margin-bottom: 10px;
          height: 52px;
      }
      .col-item .separator {
          border-top: 1px solid #E1E1E1;
      }
      .clear-left {
          clear: left;
      }
      .col-item .separator p {
          line-height: 20px;
          margin-bottom: 0;
          margin-top: 10px;
          text-align: center;
      }
      .col-item .separator p i {
          margin-right: 5px;
      }
      .col-item .btn-add {
          width: 100%;
          float: left;
      }
      .col-item .btn-add {
          border-right: 0px solid #E1E1E1;
      }
      .col-item .btn-details {
          width: 50%;
          float: left;
          padding-left: 10px;
      }
      .controls {
          margin-top: 20px;
      }
      [data-slide="prev"] {
          margin-right: 10px;
      }
      /*
            Hover the image
            */
      
      .post-img-content {
          height: 196px;
          position: relative;
      }
      .post-img-content img {
          position: absolute;
          padding: 1px;
          border-radius: 10px 10px 0 0;
      }
      .post-title {
          display: table-cell;
          vertical-align: bottom;
          z-index: 2;
          position: relative;
      }
      .post-title b {
          background-color: rgba(51, 51, 51, 0.58);
          display: inline-block;
          margin-bottom: 5px;
          margin-left: 2px;
          color: #FFF;
          padding: 10px 15px;
          margin-top: 10px;
          font-size: 12px;
      }
      .post-title b:first-child {
          font-size: 14px;
      }
      .round-tag {
          width: 60px;
          height: 60px;
          border-radius: 50% 50% 50% 0;
          border: 2px solid #ffffff;
          box-shadow: 1px 0px 3px -1.5px #585858;
          background: #00754D;
          position: absolute;
          bottom: 0px;
          padding: 18px 13px;
          font-size: 17px;
          color: #FFF;
          font-weight: bold;
      }
      .btn-primary{
      background-color: #00754D;
      }
      .btn-primary:hover{
      background-color: #0e8a5e;
      }
      .btn-primary:active{
      background-color: #0e8a5e;
      }
      .btn-primary:focus{
      background-color: #0e8a5e;
      }
      .market-update-right i.fa.fa-users {
          font-size: 3em;
          color: #68AE00;
          width: 80px;
          height: 80px;
          background: #fff;
          text-align: center;
          border-radius: 49px;
          -webkit-border-radius: 49px;
          -moz-border-radius: 49px;
          -o-border-radius: 49px;
          line-height: 1.7em;
      }
      .market-update-right i.fa.fa-cart-arrow-down {
          font-size: 3em;
          color: #FC8213;
          width: 80px;
          height: 80px;
          background: #fff;
          text-align: center;
          border-radius: 49px;
          -webkit-border-radius: 49px;
          -moz-border-radius: 49px;
          -o-border-radius: 49px;
          line-height: 1.7em;
      }
      .market-update-right i.fa.fa-money {
          font-size: 3em;
          color: #337AB7;
          width: 80px;
          height: 80px;
          background: #fff;
          text-align: center;
          border-radius: 49px;
          -webkit-border-radius: 49px;
          -moz-border-radius: 49px;
          -o-border-radius: 49px;
          line-height: 1.7em;
      }
    </style>
</head>

<body>
    <?php if(login_check($mysqli)==true) { ?>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo-name">
                            <!--<a href="index.html"> <h1>Mercadona</h1> -->
                            <img id="logo" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTAl21or5hwbtUZor6albs9l12G7llpqfjQHn-YJPDPJYJb9mX2ncdpkfE" alt="Logo" />
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="header-right">
                        <!--notification menu end -->
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                 <span class="prfil-img" style="position: absolute;right:150px;cursor: pointer;">
                                    <span class="fa-stack fa-2x openCarrito">
                                      <i class="fa fa-shopping-cart fa-stack-1x"></i>
                                      <span class="badge badge"><?php cantidadProductos(); ?> </span>
                                    </span>
                                  </span>
                                  <div class="container-shopping" style="position: absolute;z-index: 993;display:none;">
                                    <div class="shopping-cart">
                                      <div class="shopping-cart-header">
                                        <i class="fa fa-shopping-cart cart-icon"></i>>
                                        
                                      </div>

                                      <div class="prueba">
                                      <script type="text/javascript">
                                         $.post('contenidoCart.php').then(function(data){
                                            var list = $('.prueba').html(data);
                                          });
                                      </script>
                                      </div>

                                      <a href="?buy">
                                           <button type="submit" name="comprar" class="btn btn-primary btn-block">Pagar</button>
                                      </a>
                                    </div> 
                                  </div> 
                                  <script type="text/javascript">
                                    (function(){
                                      $(".openCarrito").on("click", function() {
                                        $(".container-shopping").fadeToggle( "fast");
                                      });
                                      
                                    })();
                                  </script>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img">
                                            <img width=50px height=50px src='<?php echo $picture ?>' alt=""> 
                                            </span>
                                            <div class="user-name">
                                                <p>
                                                <?php 
                                                if($nombre != null){
                                                    echo $nombre;
                                                }else{
                                                    echo $username;
                                                }
                                                ?>
                                                </p>
                                                <span><?php echo $role ?></span>
                                            </div>
                                            <i class="fa fa-angle-down lnr"></i>
                                            <i class="fa fa-angle-up lnr"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a> 
                                    <ul class="dropdown-menu drp-mnu">
                                        <li> <a href="" data-toggle="modal" data-target="#editProfile"><i class="fa fa-user"></i> Perfil</a> </li>
                                        <li> <a href="../../controllers/logout"><i class="fa fa-sign-out"></i> Salir</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                <!-- Modal para añadir info al perfil -->
                <div id="editProfile" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="heading">Editar perfil </h4>
                      </div>
                      <div class="modal-body">
                        <form action="../admin/editar_perfil" class="form-horizontal" role="form" method="POST">
                        <!-- nombre -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $nombre ?>" class="form-control" name="userNombre" id="name" placeholder="Nombre" required>
                            </div>
                        </div>
                        <!-- apel  -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">1º Apellido</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $apellido1?>" class="form-control" name="apellido1" id="name" placeholder="Apellido" required>
                            </div>
                        </div>
                        <!-- ape -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">2º Apellido</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $apellido2?>" class="form-control" name="apellido2" id="name" placeholder="Segundo apellido" required>
                            </div>
                        </div>
                        <!--nif -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">NIF</label>
                            <div class="col-sm-9">
                                <input type="text" maxlength="9" value="<?php echo $nif?>" class="form-control" name="nif" id="name" placeholder="NIF" required>
                            </div>
                        </div>
                        <!-- Direccion // -->
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Dirección</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $direccion?>" class="form-control" name="direccion" id="name" placeholder="Dirección" required>
                            </div>
                        </div>
                        <!-- telefono -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $telefono?>" class="form-control" name="tlf" id="name" placeholder="Telefono" required>
                            </div>
                        </div>
                        <!-- + Provincia // -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Provincia</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $provincia?>" class="form-control" name="provincia" id="name" placeholder="Provincia" required>
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
                                <input type="email" value="<?php echo $email?>" class="form-control" name="email" id="name" placeholder="Correo electronico" required>
                            </div>
                        </div>
                         <!-- foto // -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Foto de perfil</label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $picture?>" class="form-control" name="foto" id="name" placeholder="Url del icono">
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="upload" class="btn btn-success">Guardar cambios</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                    </form>                     
                </div>
                </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="inner-block" style="padding:1em 0em 0em 0em;height:100vh;">
                <div class="row" style="padding-left:2em;padding-bottom:1em;">
                    <div class="col-md-3">
                        <input class="form-control" id="buscador" type="text" name="buscador" placeholder="Busca un producto...">
                    </div>
                    <div class="col-md-3">
                        <select class="selectpicker" title="Ordenar por...">
                          <option value="asc">Precio: de más bajo a más alto</option>
                          <option value="desc">Precio: de más alto a más bajo</option>
                          <option value="rating">Valoración media de los clientes</option>
                          <option value="oferta">Solo productos en oferta</option>
                        </select>
                    </div>
                </div>
                    <div id="myModal" class="modal fade" role="dialog"></div>

                    <div class="container">
                        <div id="productspage" class="row">
                                <script type="text/javascript">
                                var param = null;
                                var bla = "";
                                $('#buscador').on('input', function() { 
                                    bla = $('#buscador').val();
                                    searchItems(bla);
                                  
                               });
                                function searchItems(bla){
                                    if(bla!= ""){
                                      $.post('products.php?nombre='+bla).then(function(data){
                                        var list = $('#productspage').html(data);
                                      });
                                      }else{
                                        $.post('products.php').then(function(data){
                                        var list = $('#productspage').html(data);
                                      });
                                    }
                                }
                                searchItems(bla);
                                 $('select').on('change', function() {
                                      param = this.value;
                                      selectOption(param);
                                  });
                                function selectOption(param){
                                    if(param!= null){
                                      $.post('products.php?'+param).then(function(data){
                                        var list = $('#productspage').html(data);
                                      });
                                      }else{
                                        $.post('products.php').then(function(data){
                                          var list = $('#productspage').html(data);
                                      });
                                    }
                                }
                                selectOption(param); 
                                </script>
                        </div>  
                    <!-- TERMINA EL CONTAINER -->   
                    </div>
                    <!--- TERMINA EL INNER -->
                </div>
            </div>
        </div>
        <!--slider menu-->
        <div class="sidebar-menu">
            <div class="menu">
                <ul id="menu">
                 <?php if(login_check($mysqli)==true && $role == 'Admin') { ?>
                  <li id="menu-home"><a href="../admin/admin-cp"><i class="fa fa-area-chart"></i><span>Panel de administración</span></a></li>
                 <?php 
                  }
                 ?>
                    <li id="menu-home"><a href="clientes-main"><i class="fa fa-cutlery"></i><span>Productos</span></a></li>
                    <li id="menu-home"><a href="pedidosRealizados"><i class="fa fa-shopping-bag"></i><span>Mis pedidos</span></a></li>
                    <li id="menu-home"><a href="perfil"><i class="fa fa-user"></i><span>Perfil</span></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
<?php }else{ ?>
<div class="page-container">
    <div class="inner-block">
        <div class="error-404">
            <div class="error-page-left">
                <img src="../../404.png" alt="">
            </div>
            <div class="error-right">
                <h2>Oops! No se pudo abrir la página</h2>
                <h4>Necesitas iniciar sesión</h4>
                <a href="../../index">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>
</html>