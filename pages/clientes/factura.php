<?php
include_once '../../controllers/db_connect.php';
include_once '../../controllers/functions.php';
include_once '../admin/user_checker.php';

if(isset($_REQUEST['ped']) && is_numeric($_REQUEST['ped']) ){
    $numPedidoRequest = $_REQUEST['ped'];    
    $prep_stmt = "SELECT numCarrito,nombreProducto,precio,oferta,categoria,cantidad,fechaCompra FROM ventas v,productos p WHERE v.idProducto = p.idProducto and idUser = ? and numCarrito = ?";
    $stmt = $mysqli->prepare($prep_stmt);
    if ($stmt) {
        $stmt->bind_param('ii', $_SESSION['user_id'],$numPedidoRequest);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($numCarrito,$nombreProducto,$precio,$oferta,$categoria,$cantidad,$fecha);
    }
    $fechaPedido = "00-00-0000";
    ?>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                 <h2>Factura</h2>
                 <img style="right:0;position: absolute;top: 10px;width:10%;" class="img-responsive" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTAl21or5hwbtUZor6albs9l12G7llpqfjQHn-YJPDPJYJb9mX2ncdpkfE" alt="Logo" />
                 <h3 class="pull-right">
                 Pedido # <?php echo $numPedidoRequest ?></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Factura para:</strong><br>
                        <?php echo $nombre." ".$apellido1." ".$apellido2?><br>
                        <?php echo $direccion ?><br>
                        <?php echo $email ?><br>
                        <?php echo $provincia ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>Enviado a:</strong><br>
                        <?php echo $nombre." ".$apellido1." ".$apellido2?><br>
                        <?php echo $direccion ?><br>
                        <?php echo $email ?><br>
                        <?php echo $provincia ?>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Metodo de pago:</strong><br>
                        Visa acabada en **** 4242<br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Resumen</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Producto</strong></td>
                                    <td class="text-center"><strong>Precio</strong></td>
                                    <td class="text-center"><strong>Cantidad</strong></td>
                                    <td class="text-center"><strong>Oferta</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            while($stmt->fetch()){
                                    $fechaPedido = $fecha;

                            ?>
                                <tr>

                                    <td><?php echo $nombreProducto ?> </td>
                                    <td class="text-center"><?php echo $precio."€" ?></td>
                                    <td class="text-center"><?php echo $cantidad ?></td>
                                    <td class="text-center"><?php echo $oferta."%" ?></td>
                                    <td class="text-right">
                                    <?php 
                                    $total = 0;
                                    $totalArray[] = 0;
                                    if($oferta != 0){
                                       echo '<strike style="color:red;">'. $cantidad * $precio."€".'</strike>';
                                       $total = ($precio) - ($precio * $oferta)/100;
                                       echo " ".$cantidad * $total."€";
                                       array_push($totalArray, $cantidad*$total);

                                    }else{
                                       echo  $cantidad * $precio."€";
                                       array_push($totalArray, $cantidad*$precio);

                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <h3 class="panel-title"><strong>Total a pagar: <?php echo array_sum($totalArray)."€"?></strong></h3>
                </div>
            </div>
            <div class="col-xs-6 text-right pull-right">
                <address>
                    <strong>Fecha pedido:</strong><br>
                    <?php echo $fechaPedido ?><br><br>
                </address>
            </div>
        </div>
    </div>
</div>
<?php 
}else{
    echo 
    '<div class="page-container">
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
</div>';
}   
?>
