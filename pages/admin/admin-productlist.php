<?php 
    include_once 'user_checker.php';
    include_once 'productosModelo.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Mercadona - Productos List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/bootstrap-datepicker.js"></script>
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
          .btn-success {
              color: #fff;
              background-color: #00754D;
              border-color: #00754D;
          }
          .btn-success:hover{
              color: #fff;
              background-color: #00754C;
              border-color: #00754C;
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

<body style="height:100vh;">
    <?php if(login_check($mysqli)==true && $role=='Admin') { ?>
    <div class="page-container">
        <div class="left-content" style="padding-left:10px;padding-right:10px;border-radius:5px;">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo-name">
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
                    <div class="clearfix"> </div> </div>
                <!-- header finish here -->

                <!-- modal --> 
                <div id="myModal" class="modal fade" role="dialog"></div>
                
                <!-- contenedor principal -->
                <div class="product-container">
                    <script type="text/javascript">
                      $.post('product-list.php').then(function(data){
                        var list = $('.product-container').html(data);
                      });
                    </script>
                </div>
                <!-- termina el conentedor princiapl -->
            </div>
        </div>
        <!--slider menu-->
        <div class="sidebar-menu">
            <div class="logo">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
                <a href="#"> <span id="logo"></span></a>
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
                </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <script> 
        var toggle = true;
        $(".sidebar-icon").click(function() {
            if (toggle) {
                setTimeout(function() {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({
                        "position": "absolute"
                    });
                }, 400); 
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
    <script src="js/sweetalert.min.js"></script>
  <?php
  if(isset($_REQUEST['prod_del'])){
    echo '  <script>
      swal({
        title: "Hecho!",
        text: "Producto eliminado",
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
                <img src="images/404.png" alt="">
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