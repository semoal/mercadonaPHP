<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Mercadona - Supermercado</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
  .navbar-brand {
  padding: 0px;
  }
  .navbar-brand>img {
  height: 100%;
  padding: 15px;
  width: auto;
  }

  .panel-body{
    padding:0px;

  }

  .panel-footer h6{
    color:#00754D;
    padding:0px;
    font-size:15px;
  }

  .panel-default {
    -webkit-transition: transform 1s ease-in-out;
    -moz-transition: transform 1s ease-in-out;
    transition: transform 1s ease-in-out;
  }
  .panel-default:hover{
    -moz-transform: scale(1.05);
    -webkit-transform: scale(1.05);
    -o-transform: scale(1.05);
    -ms-transform: scale(1.05);
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
  }

  /* EXAMPLE 8 - Center on mobile*/
  @media only screen and (max-width : 768px){
  .example-8 .navbar-brand {
  padding: 0px;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  left: 50%;
  position: absolute;
  }
  .example-8 .navbar-brand>img {
  height: 100%;
  width: auto;
  padding: 7px 14px;
  }
  }


  /* EXAMPLE 8 - Center Background */


  .navbar-inverse{
  background-color: #00754D;
  }
  .navbar-inverse .navbar-nav>li>a {
  color: white;
  }
  .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
  color: #fff;
  background-color: #0e8a5e;
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

  .navbar-inverse {
  border-color: white;
  }

  /* CSS Transform Align Navbar Brand Text ... This could also be achieved with table / table-cells */
  .navbar-alignit .navbar-header {
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  height: 50px;
  color: white;
  }
  .navbar-alignit .navbar-brand {
  top: 50%;
  display: block;
  position: relative;
  height: auto;
  -webkit-transform: translate(0,-50%);
  transform: translate(0,-50%);
  margin-right: 15px;
  margin-left: 15px;
  }

  .navbar-nav>li>.dropdown-menu {
  z-index: 9999;
  }
</style>
<body>
<nav class="navbar navbar-inverse navbar-static-top example-8">
    <div class="container">
      <div id="navbar8" class="navbar-collapse collapse">
                <h1 style="text-align:center;position:absolute;margin:0;color:white">
                  Mercadona
                 </h1>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="glyphicon glyphicon-list"> </span>
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#loginModal" data-toggle="modal">Iniciar sesión</a></li>
              <li><a href="#registerModal" data-toggle="modal">Registro</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">+ Opciones</li>
              <li><a href="https://www.mercadona.es">Web oficial</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
<div class="container text-center">
<div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="https://www.mercadona.es/img-cont/es/responsabilidad.jpg" class="img-responsive" style="width:100%;margin:0 auto;" alt="Image">
        </div>
        <div class="panel-footer"><h6>Sala de prensa</h6></div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="https://www.mercadona.es/img-cont/es/organizacion.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer"><h6>Gobierno corporativo</h6></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="https://www.mercadona.es/img-cont/es/memorias-anuales-0.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer"><h6>Modelo</h6></div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="https://www.mercadona.es/img-cont/es/historia.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="panel-footer"><h6>Historia</h6></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="well">
      <button data-target="#loginModal" data-toggle="modal" class="btn btn-primary">Iniciar sesión</button>
      <button data-target="#registerModal" data-toggle="modal" class="btn btn-primary">Registrarse </button>
      </div>
      <div class="well">
       <p>Un proyecto compartido y sostenible que lleva más de 35 años construyéndose, que la sociedad quiera que exista, sienta orgullo de él y mejore constantemente</p>
      </div>
      <div class="well">
       <p>Mercadona cuenta con una plantilla de 79.000 trabajadoras y trabajadores, todos con contratos fijos, que se esfuerzan cada día por ofrecer la máxima excelencia en el servicio. Asimismo, comparte con sus proveedores un proyecto en el que se trabaja conjuntamente y a largo plazo para lograr su principal objetivo: satisfacer las necesidades de nuestros clientes.</p>
      </div>
    </div>
  </div>
</div><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">
                  <img class="img-responsive" src="https://upload.wikimedia.org/wikipedia/en/d/d7/Mercadona.png" alt="logo-mercadona"/>
                </p>
            </div>

            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://www.techoscalabuig.com/blog/wp-content/uploads/2015/07/COLABORACIONES-EN-GRANDE-SUPERFICIES.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="https://k60.kn3.net/taringa/B/6/F/3/8/F/FedericoAndrade1/6BF.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://estaticos.aniversario.elpais.com/wp-content/uploads/2016/07/08092453/lideres-01.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- MODAL DE LOGIN -->
                <div id="loginModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="heading">Por favor, inicia sesión</h4>
                      </div>
                      <div class="modal-body">
                          <form class="form-signin" method="POST" action="controllers/login_process">
                            <input type="text" id="inputLogin" name="inputLogin" class="form-control" placeholder="Usuario" required autofocus>
                            <input type="password" id="inputLoginPassword" name="inputLoginPassword" class="form-control" placeholder="Contraseña" required>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Inicia sesión</button>
                          </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <!-- MODAL DE REGISTRO -->
                <div id="registerModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="heading"> Registrate como cliente </h4>
                      </div>
                      <div class="modal-body">
                          <form class="form-signin" method="POST" action="controllers/register_process">
                                <input type="text" id="inputUser" name="usr" class="form-control" placeholder="Usuario" required>
                                <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Contraseña" required>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
                          </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MODALS  -->
        </div>
      </div>
    </div>
</div>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
  <!-- Bootstrap js -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/main.js"></script>

  <script src="js/sweetalert.min.js"></script>
  <?php
  //El error 404 significa que el usuario no existe en nuestra base de datos
  //El error 405 significa que la contrseña de ese usuario no es correcta
  if(isset($_REQUEST['err']) && $_REQUEST['err'] == '404'){
    echo '  <script>
      swal({
        title: "Oops..!",
        text: "El usuario no existe",
        type: "error"
      });
      </script>';
  }else if(isset($_REQUEST['err']) && $_REQUEST['err'] == '405'){
    echo '  <script>
      swal({
        title: "Oops..!",
        text: "La contraseña no es correcta",
        type: "error"
      });
      </script>';
  }
   ?>
</body>

</html>
