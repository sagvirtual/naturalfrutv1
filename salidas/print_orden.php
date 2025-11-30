<?php include('../f54du60ig65.php');
require('mpdf.php');
//comienzo pdf
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


if (!empty($id)) {
    $titulopro = '<i class="fa fa-file-text"></i> Editar Orden ' . $cliente;
} else {
    $titulopro = '<i class="fa fa-file-text"></i> Orden de Compra';
}




?>
        <?php
 
 ob_start();
 
?>
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

<!-- ver -->
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
        $_SESSION['id_orden'] = $rowordenx['id'];
        $idordenitem = $rowordenx['id'];
        $fecha = $rowordenx['fecha'];
        $fechav = explode("-", $fecha);
        $fechavr = $fechav[2]."/".$fechav[1]."/".$fechav[0];

    ?>
        <div class="row">
            <style>
                .fontco {
                    color: black;
                }
            </style>
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">

                    <img src="/assets/images/logo.png" style="height: 100px;"><hr>
                        <h1 class="card-title">Orden de Compra: #<?= $_SESSION['id_orden'] ?> </h1><br>
                        <h1 class="card-title">Fecha entrega: <?= $fechavr ?></h1>
                    </div>
                    <div class="card-body">
                        <p class="card-subtitle">Cliente: <b>
                            <?php


                            $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
                            if($rowclientesi = mysqli_fetch_array($sqlclientesi)) {
                            
                                echo '' . $rowclientesi["address"] . ', ' . $rowclientesi["nom_empr"] . '';
                            }


                            ?></b><p>
                        <div class="table-responsive m-b-30">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="border-color: black;width: 40px; text-align:center;">Kg.</th>
                                        <th scope="col" style="border-color: black;text-align:center;">Productos</th>
                                        <th scope="col" style="border-color: black;width: 110px; text-align:center;">Precio</th>
                                        <th scope="col" style="border-color: black;width: 110px; text-align:center;">Total</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem'");
                                    while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                                        $nota = $rowitem_orden["nota"];
                                        $idite = $rowitem_orden["id"];
                                        $idcodp = base64_encode($idite);
                                        $subtotal += $rowitem_orden["total"];
                                        $subtotalv = number_format($subtotal, 2, '.', '');
                                        if (!empty($nota)) {
                                            $notav = "(" . $nota . ")";
                                        } else {
                                            $notav = "";
                                        }
                                        $preciov = number_format($rowitem_orden["precio"], 2, '.', '');
                                        $totalliqv = number_format($rowitem_orden["total"], 2, '.', '');
                                        echo '<tr>
                                    <td style="text-align:center;border-color: black;">' . $rowitem_orden["kilos"] . '</td>
                                    <td  style="border-color: black;">' . $rowitem_orden["nombre"] . ' ' . $notav . '</td>
                                    <td style="text-align:right;border-color: black;">' . $preciov . '</td>
                                    <td style="text-align:right;border-color: black;">' . $totalliqv . '</td>
                                    
                                </tr>';
                                    }

                                    ?>



                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="border-color: black;text-align:right;font-weight:bold;">Sub Total</td>
                                        <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= $subtotalv ?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td style="border-color: black;text-align:right;">Saldo Anterior</td>
                                        <td style="border-color: black;text-align:right;width: 110px;"><?= $totaldebev ?></td>
                                      
                                    </tr>

                                    <?php
                                    //subtotal menos o mas la deuda



                                    $sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='3'");
                                    while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
                                        $iditer = $rowpagdeu["id"];
                                        $idcodp = base64_encode($iditer);
                                        $deuda = $rowpagdeu["valor"];
                                        $deudaTotal += $rowpagdeu["valor"];
                                        $deudav = number_format($deuda, 2, '.', '');
                                        echo '<tr>
                                        <td style="border-color: black;text-align:right;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">' . $deudav . '</td>
                                        
                                        </tr>';
                                    }

                                    ?>

                                    <?php

                                    $sqlpagdeuf = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='2'");
                                    while ($rowpagdeuf = mysqli_fetch_array($sqlpagdeuf)) {
                                        $iditef = $rowpagdeuf["id"];
                                        $idcodpf = base64_encode($iditef);
                                        $deudaf = $rowpagdeuf["valor"];
                                        $descuentoTotal += $rowpagdeuf["valor"];
                                        $deudavf = number_format($deudaf, 2, '.', '');
                                        echo '<tr>
                                        <td style="border-color: black;text-align:right;">Descuento (' . $rowpagdeuf["nota"] . ')</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">-' . $deudavf . '</td>
                                        
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
                                        <td style="border-color: black;text-align:right;font-weight:bold;">Total</td>
                                        <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= $totalf ?></td>
                                       
                                    </tr>
                                    <?php

                                    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='1'");
                                    while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                        $iditefp = $rowpagdeufp["id"];
                                        $idcodpfp = base64_encode($iditefp);
                                        $deudafp = $rowpagdeufp["valor"];
                                        $pagoTotal += $rowpagdeufp["valor"];
                                        $deudavfp = number_format($deudafp, 2, '.', '');
                                        echo '<tr>
                                            <td style="border-color: black;text-align:right;">Su pago</td>
                                            <td style="border-color: black;text-align:right;width: 110px;">' . $deudavfp . '</td>
                                            
                                            </tr>';
                                    }
                                    $debe = $totalf - $pagoTotal;
                                    $debefp = number_format($debe, 2, '.', '');


                                    ?>
                                    <? if ($totalf != $debefp) { ?>
                                        <tr>
                                            <td style="border-color: black;text-align:right;font-weight:bold;">Debe</td>
                                            <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= $debefp ?></td>
                                           
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
           

        </div>

    <?php } ?>
    <?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->AddPageByArray([
    "margin-left" => "30mm",
    "margin-right" => "30mm",
    "margin-top" => "10mm",
    "margin-bottom" => "15mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('lista_' . $ventaa . '_' . $fechahoya . '.pdf', 'D');




?>

</div>

