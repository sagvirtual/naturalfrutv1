<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');
 



if (empty($idcliente)) {

    $idorcod = $_GET['jfndhom'];
    $idordenbbb = base64_decode($idorcod);

    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$idordenbbb' ");
    if ($rowordent = mysqli_fetch_array($sqlordent)) {
        $_SESSION['fecharepart'] =  $rowordent['fecha'];
        $_SESSION['idcliente'] =  $rowordent['id_cliente'];
    }
    $idcliente = $rowordent['id_cliente'];

    //$_SESSION['dianoms']=;
    //$_SESSION['id_rubro']=;
    //$_SESSION['tipo_cliente']=;
    //$_SESSION['id_orden'])=;

}


$idproducto = $_GET['idproducto'];  //id para enlazar el producto para extrar precio
if (!empty($idproducto)) {
    $sepid = explode("|", $idproducto);
    $idprop = $sepid[0];
    $priciop = $sepid[1];
    $kilop = $sepid[2];
    $pretotal = $priciop * $kilop;
    $pretotalv = number_format($pretotal, 2, '.', '');
} else {
    $priciop = "0.00";
    $kilop = "0";
    $pretotal = "0.00";
}
if ($_GET['dianoms'] == "" && $_GET['fecharepart'] != "") {
    unset($_SESSION['idcliente']);
    $_SESSION['fecharepart'] = $_GET['fecharepart'];
}

if ($_GET['idcliente'] != "") {
    $_SESSION['idcliente'] = $_GET['idcliente'];
}
$_SESSION['dianoms'] = $_GET['dianoms'];

if ($_SESSION['fecharepart'] == "") {
    $fechar = $fechahoy;
} else {
    $fechar = $_SESSION['fecharepart'];
}


if ($_SESSION['dianoms'] != "") {
    unset($_SESSION['idcliente']);
    unset($_SESSION['tipo_cliente']);
    unset($_SESSION['id_orden']);
    $dianom = $_SESSION['dianoms'];
} else {
    $dianoms = strtotime($fechar);
    $dianom = date("N", $dianoms);
}


if ($dianom == "1") {
    $dianombre = "LUNES";
    $diasele1 = "selected";
}
if ($dianom == "2") {
    $dianombre = "MARTES";
    $diasele2 = "selected";
}
if ($dianom == "3") {
    $dianombre = "MIERCOLES";
    $diasele3 = "selected";
}
if ($dianom == "4") {
    $dianombre = "JUEVES";
    $diasele4 = "selected";
}
if ($dianom == "5") {
    $dianombre = "VIERNES";
    $diasele10 = "selected";
}
if ($dianom == "6") {
    $dianombre = "SABADO";
    $diasele10 = "selected";
}
if ($dianom == "7") {
    $dianombre = "DOMINGO";
    $diasele10 = "selected";
}
if ($dianom == "10") {
    $dianombre = "Todos";
    $diasele10 = "selected";
}

$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);

$eplofeb = explode("-", $fechar);


//aca extraigo el rubro para que muetstre los productos

$idcli = $_SESSION['idcliente'];
$sqlclientesb = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
if ($rowclientesb = mysqli_fetch_array($sqlclientesb)) {
    $_SESSION['id_rubro'] = $rowclientesb["id_rubro"];
    $_SESSION['tipo_cliente'] = $rowclientesb["tipo_cliente"];
    $listaid = $rowclientesb["id_rubro"];
    $buscqueda = " and  id_rubro$listaid = '1'";
}
$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where id = '$listaid'");
if ($rowrubros = mysqli_fetch_array($sqlrubros)) {
    $nombrerub = $rowrubros["nombre"];
}






?>

<style>
    .saldo {
        display: block;
        font-size: 18pt;
        color: red;
        position: relative;
        right: 12px;
        float: right;
        top: 15px;
        z-index: 999;
        text-align: center;
    }
</style>
<?php
//me fijo si tiene un saldo inicial

$sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$idcli' and fin='1' ORDER BY `orden`.`fecha` DESC");
if ($rowordena = mysqli_fetch_array($sqlordena)) {
    $totaldebe = $rowordena["total"];
    $totaldebev = number_format($totaldebe, 2, '.', '');
    $totaldebevr = "Saldo anterior<br>$" . number_format($totaldebe, 2, '.', '');

} else {

    $sqlclientesan = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli' and sloff='0' and saldoini!='0'");
if ($rowclientes = mysqli_fetch_array($sqlclientesan)) {
    $saldoini = $rowclientes["saldoini"];
    $totaldebevr = 'Saldo anterior<br>$' . number_format($saldoini, 2, ',', '.') . ' ';
}
$totaldebev = "0.00" + $saldoini; 
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>San Cipriano - Lo mejor del Mar</title>
    <!--   <link rel="manifest" href="manifest.json"> -->
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!-- Touchspin css -->
    <link href="/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">

    <!-- Apex css -->
    <link href="/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <!-- Slick css -->
    <link href="/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>

<body style="background-color: white;">


    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->






        <!-- fin ver -->






        <!-- Start Contentbar -->
        <div class="contentbar">
            <!-- Start row -->


            <!-- orden de compra -->
            <?php //me fijo si hay orden con esa fecha y id clinete lo programe para una sola orden
            $id_cliente = $_SESSION['idcliente'];
            $sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechar' and id_cliente = '$id_cliente'");
            if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
                $idordenbbb = $rowordenx['id'];
               /*  $idordenbbbv = str_pad($idordenbbb, 4, '0', STR_PAD_LEFT); */
                $idordenitem = $rowordenx['id'];
                $fecha = $rowordenx['fecha'];
                $fechav = explode("-", $fecha);
                $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

            ?>
                <div class="row">
                    <style>
                        .fontco {
                            color: black;
                        }
                    </style>

                    <!-- Start col -->
                    <div class="col-lg-6">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="saldo"><?= $totaldebevr ?></div>
                                <img src="/assets/images/logo.png" style="height: 100px;">
                                <hr>
                                <h1 class="card-title">Remito: #<?=  $idordenbbb ?> </h1><br>
                                <h1 class="card-title">Fecha entrega: <?= $fechavr ?></h1>
                            </div>
                            <div class="card-body">
                                <p class="card-subtitle">Cliente: <b>
                                        <?php


                                        $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
                                        if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

                                            echo '' . $rowclientesi["address"] . ', ' . $rowclientesi["nom_empr"] . '';
                                        }


                                        ?></b>



                                <p>


                                <div class="table-responsive m-b-30">
                                    <table class="table table-bordered">
                                   

                                        <tbody>
                                            
                                        <?php
                                //aca pruebo el otro

                                $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
                                while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                    $id_categoria = $rowcategorias["id"];
                                    $nombrecate = strtoupper($rowcategorias["nombre"]);
                                    $sqlproductosr = ${"sqlproductos" . $id_categoria};
                                    $rowproductos = ${"rowproductos" . $id_categoria};
                                    $rowproductosr = ${"rowproductosr" . $id_categoria};
                                    $idproduff = ${"idproduff" . $id_categoria};
                                    $sqlitem_orden = ${"sqlitem_orden" . $id_categoria};
                                    $sqlitem_ordendis = ${"sqlitem_ordendis" . $id_categoria};


                                    //fin


                                    //me fijo si hay item comprados <tr
                                    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ");
                                    if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


                                        //join si el producto esta para el cliente
                                        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor, u.id_orden, u.fin
                                        FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where u.fin='1' and categoria='$id_categoria' and u.id_orden = '$idordenitem'");

                                        if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) {


                                            echo '<table class="table table-bordered" style="background-color: black; position:relative; text-align:left;">


                                            <tr><td  style="background-color: #CBCBCB;"><h5 style="position:relative; top:4px;"><b>' . $nombrecate . ' </b></h5></td></tr>
                                            
                                            </table>
                                            
                                            <table class="table table-bordered table-hover" style="background-color: #fff; position:relative; top:-10px; text-align:left; height:5px;">
                                            <tr>
                                                
                                            <th scope="col" style="border-color: black;width: 40px; text-align:center;">Kg.</th>
                                            <th scope="col" style="border-color: black;text-align:center;">Productos</th>
                                            <th scope="col" style="border-color: black;width: 110px; text-align:center;">P/Unit.</th>
                                            <th scope="col" style="border-color: black;width: 110px; text-align:center;">Total</th>
                                            </tr>
                                            ';
                                        }



                                        //pongo los item <tr>     

                                        $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

                                        while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
                                            $idproduff = $rowproductosrg['id'];
                                            //pruebo poner el producto



                                            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem' and id_producto='$idproduff' and modo='0' and fin='1'");
                                            if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                                                $nota = $rowitem_orden["nota"];
                                                $idite = $rowitem_orden["id"];
                                                $id_producto = $rowitem_orden["id_producto"];
                                                $id_productocod = base64_encode($id_producto);
                                                $idcodp = base64_encode($idite);
                                                $subtotal += $rowitem_orden["total"];
                                                $subtotalv = number_format($subtotal, 2, '.', '');
                                                $confirmado  = $rowitem_orden["conf_entrega"];
                                                $colorcon  = ${"colorcon" . $rowitem_orden["id"]};
                                                if (!empty($nota)) {
                                                    $notav = "(" . $nota . ")";
                                                } else {
                                                    $notav = "";
                                                }
                                                $preciov = number_format($rowitem_orden["precio"], 0, '', '.');
                                                $totalliqv = number_format($rowitem_orden["total"], 0, '', '.');

                                                if ($confirmado == '1') {
                                                    $colorcon = '#60FF76;';
                                                } else {
                                                    $colorcon = '#FF7E7E;';
                                                }

                                                $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                    $kilocajon = $rowprecioprod["kilo"];
                                                }


                                                echo '<tr>
                                                <td style="text-align:center;border-color: black;"><b>' . $rowitem_orden["kilos"] . '</b></td>
                                                <td  style="border-color: black;background-color:"><b>' . $rowitem_orden["nombre"] . '</b> ' . $notav . '
                                                <p style="font-size:8pt; position:relative; top:0px;">(Caja x ' . $kilocajon . 'kg.)
                                                                                 </p>
                                                
                                                </td>
                                                <td style="text-align:right;border-color: black;">' . $preciov . '</td>
                                                <td style="text-align:right;border-color: black;;">
                                                <b>' . $totalliqv . '</b></td>
                                                
                                            </tr>';
                                            }




                                            //fin poner el producto
                                        }
                                        echo '</table>';

                                        //fin item </tr>



                                    }
                                }

                                ?>



                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Sub Total</td>
                                                <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($subtotalv, 0, '', '.') ?></td>

                                            </tr>
                                       

                                            <?php
                                            //subtotal menos o mas la deuda


                                            $sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='3' ORDER BY `item_orden`.`id` ASC");
                                            while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
                                                $iditer = $rowpagdeu["id"];
                                                $idcodp = base64_encode($iditer);
                                                $deuda = $rowpagdeu["valor"];
                                                $deudaTotal += $rowpagdeu["valor"];
                                                $deudav = number_format($deuda, 0, '', '.');
                                                echo '<tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">' . $deudav . '</td>
                                        
                                        </tr>';
                                            }

                                            ?>

                                            <?php
                                           $sqlpagdeuf = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='2'");
                                           if ($rowpagdeuf = mysqli_fetch_array($sqlpagdeuf)) {
                                               $iditef = $rowpagdeuf["id"];
                                               $idcodpf = base64_encode($iditef);
                                               $deudaf = $rowpagdeuf["valor"];
                                               $tipodescuen=$rowpagdeuf["nota"];
                                               $modo=$rowpagdeuf["modo"];
                                               $pordesc=$rowpagdeuf["pordesc"];
                                               $deudavf = number_format($deudaf, 2, '.', '');
                                               
                                               if($modo=='2'){
                                                   
                                                   if($tipodescuen=='0'){ $descuenes=$pordesc."%";}else{ $descuenes="";}
                                                   $totalfver=$deudavf;
                                                   $descuentoTotal = $rowpagdeuf["valor"];
                                               }else{$descuenes="ss";
                                               
                                                   $descuentoTotal = $rowpagdeuf["valor"];
                                                   $totalfver=$deudavf;
                                               }
                                                


                                                echo '<tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;">Descuento ' . $descuenes . '</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">-' .number_format($totalfver, 0, '', '.') . '</td>
                                        
                                        </tr>';
                                            }

                                            ?>
                                            <?php
                            $total = $subtotalv + $totaldebev + $deudaTotal;
                            if (!empty($descuentoTotal)) {
                                $total = $total - $descuentoTotal;
                            }

                            $totalf = number_format($total, 2, '.', '');
                            ?>
                                                 <tr>
                                                <td style="border-right: 1px solid #000000; text-align:right;">Saldo Anterior</td>
                                                <td style="border-color: black;text-align:right;width: 110px;"><?= number_format($totaldebev, 0, '', '.') ?></td>

                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Total</td>
                                                <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($totalf, 0, '', '.') ?></td>

                                            </tr>
                                            <?php
                                             $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='1' ORDER BY `item_orden`.`id` ASC");

                                            while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                                $iditefp = $rowpagdeufp["id"];
                                                $idcodpfp = base64_encode($iditefp);
                                                $deudafp = $rowpagdeufp["valor"];
                                                $pagoTotal += $rowpagdeufp["valor"];
                                                $deudavfp = number_format($deudafp, 2, '.', '');
                                                $tipopages = $rowpagdeufp['tipopag'];
                                                if ($tipopages == '1') {
                                                    $tipopagver = "efectivo";
                                                }
                                                if ($tipopages == '2') {
                                                    $tipopagver = "transferencia";
                                                }
                                                if ($tipopages == '3') {
                                                    $tipopagver = "deposito";
                                                }
                                                if ($tipopages == '4') {
                                                    $tipopagver = "cheque";
                                                }
                                                if ($tipopages == '5') {
                                                    $tipopagver = "mercado pago";
                                                }
                                                echo '<tr>
                                            <td style="border-right: 1px solid #000000;text-align:right;">Su pago en ' . $tipopagver . '</td>
                                            <td style="border-color: black;text-align:right;width: 110px;">' . number_format($deudavfp, 0, '', '.') . '</td>
                                            
                                            </tr>';
                                            }
                                            $debe = $totalf - $pagoTotal;
                                            $debefp = number_format($debe, 2, '.', '');


                                            ?>
                                            <? if ($totalf != $debefp) { ?>
                                                <tr>
                                                    <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Debe</td>
                                                    <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($debefp, 0, '', '.') ?></td>

                                                </tr>
                                            <? } ?>

<!-- 
                                            <tr>
                                                <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Debe</td>
                                                <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?//= $debefp ?></td>

                                            </tr>
 -->


                                        </tbody>


                                    </table>

                                    </table>

                                </div>
                            </div>

                            &nbsp;&nbsp;Remito no Valido como Factura <br>
                            <div class="alert alert-dark" style="width: 270px;"> <b><?= $datosloc ?></b></div>
                        </div>
                    </div>

                    <!-- End col -->
                    <!-- Start col -->


                </div>

            <?php } ?>


        </div>
    