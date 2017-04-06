<?php 
    include_once 'user_checker.php';
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
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/datepicker.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css" media="all" />
    <style type="text/css">
       @import url('https://fonts.googleapis.com/css?family=Roboto');
          h4, h5, h6,
          h1, h2, h3 {margin: 0;}
          ul, ol {margin: 0;}
          p {margin: 0;}
          html, body{
          font-weight: 300;
          font-size: 14px;
          background:#fff; 
          font-family: 'Roboto', sans-serif;
          }
          #menu li a:hover {
            color: #00754D;
            transition: color 250ms ease-in-out, background-color 250ms ease-in-out;
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
        .market-update-right i.fa.fa-users {
            font-size: 3em;
            color:#68AE00;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
            }
        .market-update-right i.fa.fa-cart-arrow-down {
            font-size: 3em;
            color:#FC8213;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
        }
        .market-update-right i.fa.fa-money {
            font-size:3em;
            color:#337AB7;
            width: 80px;
            height: 80px;
            background: #fff;
            text-align: center;
            border-radius: 49px;
            -webkit-border-radius: 49px;
            -moz-border-radius:49px;
            -o-border-radius:49px;
            line-height: 1.7em;
        }
    </style>
</head>

<body>
    <?php if(login_check($mysqli)==true && $role=='Admin') { ?>
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
                        <div class="profile_details_left">
                            <div class="clearfix"> </div>
                        </div>
                        <!--notification menu end -->
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">
                                            <span class="prfil-img"><img width=50px height=50px src='<?php echo $picture ?>' alt=""> </span>
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
                    <div class="clearfix"> </div>
                </div>
                <div class="inner-block" style="padding:1em 0em 0em 0em;height: 100vh;">
                    <div class="container">
                <form action="añadir_producto" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST">
                <!-- IDENTIFICADOR DEL PRODUCTO -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Código de barras</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control" name="idProducto" id="name" placeholder="El identificador del producto es automatico">
                    </div>
                </div>
                <!-- Nombre del producto -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="product_name" id="name" placeholder="Nombre del producto">
                    </div>
                </div>
                <!-- Cantidad -->
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="stock" id="cantidad" placeholder="Cantidad de stock">
                    </div>
                </div>
                <!-- Descripcion // -->
                <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea name="desc" class="form-control"></textarea>
                    </div>
                </div>
                <!-- Url de la foto // -->
                <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="foto" placeholder="Url de la foto">
                    </div>
                </div>
                <!-- Fecha de caducidad // -->
                <div class="form-group">
                    <label for="qty" class="col-sm-3 control-label">Fecha de caducidad</label>
                    <div class="col-sm-3">
                        <input type="text" id="datepicker" class="form-control" data-date-format="yyyy-mm-dd" name="fecha_cadu" placeholder="Fecha de caducidad">
                    </div>
                </div>
                <!-- Precio // -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Precio</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="precio" id="date_start" placeholder="Precio">
                    </div>
                </div>
                <!-- form-group // -->
                <div class="form-group">
                    <label for="tech" class="col-sm-3 control-label">Rating</label>
                    <div class="col-sm-3">
                        <select name="rating" class="form-control" data-show-icon="true">
                            <option value="1">
                                <i class="price-text-color fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </option>
                            <option value="2">
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </option>
                            <option value="3">
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </option>
                            <option value="4">
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </option>
                            <option value="5">
                                 <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                                <i class="price-text-color fa fa-star"></i>
                            </option>
                        </select>
                    </div>
                </div>
                <!-- form-group // -->
                <div class="form-group">
                    <label for="tech" class="col-sm-3 control-label">Oferta</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="oferta" id="date_start" placeholder="%">
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
                <!-- form-group // -->
                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="upload" class="btn btn-success">Añadir producto</button>
                    </div>
                </div>
                <!-- form-group // -->
            </form>
                    </div>
                </div>
                <!--- TERMINA EL INNER -->
            </div>
        </div>
        <!--slider menu-->
        <div class="sidebar-menu">
            <div class="logo">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
                <a href="#"> <span id="logo"></span>
                    <!--<img id="logo" src="" alt="Logo"/>-->
                </a>
            </div>
            <div class="menu">
                <ul id="menu">
                    <li id="menu-home"><a href="admin-cp"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                    </li>
                    <li id="menu-home"><a href="admin-userlist"><i class="fa fa-users"></i><span>Usuarios</span></a>
                    </li>
                    <li id="menu-home">
                        <a href="admin-product">
                            <i class="fa fa-plus-circle">
                
              </i><span>Añadir producto</span>
                        </a>
                    </li>
                    <li id="menu-home">
                        <a href="admin-productlist">
                            <i class="fa fa-list">
                            </i><span>Listado productos</span>
                        </a>
                    </li>
                    <li id="menu-home">
                        <a href="../clientes/clientes-main">
                            <i class="fa fa-shopping-cart">
                            </i><span>Comprar productos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--slide bar menu end here-->
    <script> 
      $( function() {
    $( "#datepicker" ).datepicker();
  } );
        var toggle = true;

        $(".sidebar-icon").click(function() {
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({
                    "position": "absolute"
                });
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({
                        "position": "relative"
                    });
                }, 400);
            }
            toggle = !toggle;
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/sweetalert.min.js"></script>
  <?php
  //El error 0 significa que el producto no se ha introducido correctamente
  //El error 1 significa que el producto se ha introducido correctamente
  if(isset($_REQUEST['success']) && $_REQUEST['success'] == '0'){
    echo '  <script>
      swal({
        title: "Oops..!",
        text: "Producto no introducido",
        type: "success"
      });
      </script>';
  }else if(isset($_REQUEST['success']) && $_REQUEST['success'] == '1'){
    echo '  <script>
      swal({
        title: "Perfecto!",
        text: "Producto introducido correctamente",
        type: "success"
      });
      </script>';
  }
   ?>
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