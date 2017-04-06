<?php 
    include_once 'user_checker.php';
    include_once 'estadisticas.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Mercadona - CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/Chart.min.js"></script>
    <script src="js/chartinator.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANszbzxhpGtf3R30J0NG6FaSqKk_oOMis"> </script>
    <script src="js/gmaps.js"></script>
    <link href="css/datepicker.css" rel="stylesheet" type="text/css" media="all" />
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
        .inner-block {
            padding: 9em 2em 2em 2em;
            background: #fafafa;
            height:100%;
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
    <script src="js/skycons.js"></script>
</head>

<body>
    <?php if(login_check($mysqli)==true && $role=='Admin') { ?>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                <div class="header-main" style="position:absolute;">
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
                        <form action="editar_perfil" class="form-horizontal" role="form" method="POST">
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
                <!--heder end here-->
                <script>
                    $(document).ready(function() {
                        var navoffeset = $(".header-main").offset().top;
                            var scrollpos = $(window).scrollTop();
                            if (scrollpos >= navoffeset) {
                                $(".header-main").addClass("fixed");
                            } else {
                                $(".header-main").add("fixed");
                            }
                        });

                </script>
                <!--inner block start here-->
                <div class="inner-block">
                    <!--market updates updates-->
                    <div class="market-updates">
                        <div class="col-md-4 market-update-gd">
                            <div class="market-update-block clr-block-1">
                                <div class="col-md-8 market-update-left">
                                    <h3><?php echo $totalClientes ?></h3>
                                    <h4>Clientes</h4>
                                </div>
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-users"> </i>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-4 market-update-gd">
                            <div class="market-update-block clr-block-2">
                                <div class="col-md-8 market-update-left">
                                    <h3><?php echo $totalVentas ?></h3>
                                    <h4>Ventas</h4>
                                </div>
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-cart-arrow-down"> </i>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-4 market-update-gd">
                            <div class="market-update-block clr-block-3">
                                <div class="col-md-8 market-update-left">
                                    <h3><?php echo $ingresos."€" ?></h3>
                                    <h4>Ingresos</h4>
                                </div>
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-money"> </i>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!--market updates end here-->
                    <!--mainpage chit-chating-->
                    <div class="chit-chat-layer1">
                        <div class="col-md-6 chart-blo-1">
                            <div class="dygno">
                                <h2>Estadistica anual</h2>
                                <canvas id="doughnut" height="300" width="470" style="width: 470px; height: 300px;"></canvas>
                                <script>
                                    var doughnutData = [{
                                        label: "Ingresos",
                                        value: <?php echo $ingresos?>,
                                        color: "#337AB7"
                                    }, {
                                        label: "Ventas",
                                        value: <?php echo $totalVentas ?>,
                                        color: "#FC8213"
                                    }, {
                                        label: "Total clientes",
                                        value: <?php echo $totalClientes ?>,
                                        color: "#68AE00"
                                    }, ];
                                    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
                                </script>
                            </div>
                        </div>
                        <div class="col-md-6 chit-chat-layer1-rit">
                            <div class="geo-chart">
                                <section id="charts1" class="charts">
                                    <div class="wrapper-flex">

                                       <div style="height:375px;z-index:999" id="map3"> </div>

                                    </div>
                                    <!-- .wrapper-flex -->
                                </section>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!--main page chit chating end here-->
                    <!--main page chart start here-->
                    <div class="main-page-charts">
                        <div class="main-page-chart-layer1">
                            <div class="col-md-6 chart-layer1-left">
                                <div class="glocy-chart">
                                    <div class="span-2c">
                                        <h3 class="tlt">Sales Analytics</h3>
                                        <canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
                                        <script>
                                            var barChartData = {
                                                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                                                datasets: [{
                                                    fillColor: "#FC8213",
                                                    data: [65, 59, 90, 81, 56, 55, 40]
                                                }, {
                                                    fillColor: "#337AB7",
                                                    data: [28, 48, 40, 19, 96, 27, 100]
                                                }]

                                            };
                                            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="chart-layer-2">

                                <div class="col-md-6 chart-layer2-right">
                                    <div class="prograc-blocks">
                                        <!--Progress bars-->
                                        <div class="home-progres-main">
                                            <h3>Ventas totales</h3>
                                        </div>
                                        <div class='bar_group'>
                                            <div class='bar_group__bar thin' label='Clientes' show_values='true' tooltip='true' value='<?php echo $totalClientes?>'></div>
                                            <div class='bar_group__bar thin' label='Ventas' show_values='true' tooltip='true' value='<?php echo $totalVentas?>'></div>
                                            <div class='bar_group__bar thin' label='Ingresos' show_values='true' tooltip='true' value='<?php echo $ingresos?>'></div>
                                             <div class='bar_group__bar thin' hidden value='100'></div>
                                        </div>
                                        <script src="js/bars.js"></script>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
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
      var map;
      $(document).ready(function(){
       var mapObj = new GMaps({
          el: '#map3',
          lat: 39.4024325,
          lng: -0.4039096
        });
        var m = mapObj.addMarker({
          lat: 39.4024325,
          lng: -0.4039096,
          icon: "uploads/pin.png",
          title: 'Mercadona ',
          infoWindow: {
            content: '<h4>Mercadona </h4><div> <img width=100px src="https://www.mercadona.com/estaticos/images/mercadona_logo/es/mercadona-logo.png"/> <br> Camí Real, 35, 46470 Catarroja, Valencia</div>',
            maxWidth: 100
          }
        });
        var m2 = mapObj.addMarker({
          lat: 39.4069454,
          lng: -0.4035542,
          icon: "uploads/pin.png",
          title: 'Mercadona ',
          infoWindow: {
            content: '<h4>Mercadona </h4><div> <img width=100px src="https://www.mercadona.com/estaticos/images/mercadona_logo/es/mercadona-logo.png"/> <br> Calle Filiberto Rodrigo, 6, 46470 Catarroja, Valencia</div>',
            maxWidth: 200
          }
        });
        
      });

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
    <!-- mother grid end here-->
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