<?php include('../f54du60ig65.php');
include('../template/cabezal.php');
include('totalremitos.php');
$getver = $_GET['get'];

if ($getver == '1') {
    //POST
    $hasta_date = $_GET['hasta_date'];
    $IdCamioneta = $_GET['IdCamioneta'];
} else {
    //POST
    $hasta_date = $_POST['hasta_date'];
    $IdCamioneta = $_POST['IdCamioneta'];

    if (empty($_POST['IdCamioneta'])) {
        $IdCamioneta = "1";
    }
    if (empty($_POST['hasta_date'])) {
        $hasta_date = $fechahoy;
    }
}
$sqlcajaV = mysqli_query($rjdhfbpqj, "SELECT * FROM caja Where fecha_caja = '$hasta_date' and id_camioneta='$IdCamioneta' and modo='1'");
while ($rowcajaV = mysqli_fetch_array($sqlcajaV)) {
    $val_entrada = $rowcajaV["val_entrada"];
}

$sqlcaja = mysqli_query($rjdhfbpqj, "SELECT * FROM caja Where fecha_caja = '$hasta_date' and id_camioneta='$IdCamioneta' and modo='0'");
while ($rowcaja = mysqli_fetch_array($sqlcaja)) {
    $idcajaen = base64_encode($rowcaja["id_caja"]);
    if ($rowcaja["id_caja"] > 0) {
        $vergas = '1';
    }
    $Gastos = number_format($rowcaja["val_salida"], 0, ',', '.');
    $GastosTotals += $rowcaja["val_salida"];
    $GastosTotal = number_format($GastosTotals, 0, ',', '.');
    $GastosTotals = number_format($GastosTotals, 0, '.', '');
    $comi = "'";
    $gastos .= '
    <tr>
    <td>' . $rowcaja["det_entrada"] . '</td>
    <td style="text-align: right;">$' . $Gastos . '</td>
    </tr> 
    ';
}
if (empty($val_entrada)) {
    $val_entrada = "0";
}



$sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT item_orden.id_cliente, item_orden.modo, item_orden.fecha,  item_orden.id_orden, item_orden.tipopag, item_orden.valor, clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta FROM item_orden INNER JOIN clientes ON item_orden.id_cliente = clientes.id Where item_orden.fecha = '$hasta_date' and clientes.camioneta='$IdCamioneta' and (item_orden.tipopag='1' or item_orden.tipopag='4') and item_orden.modo='1' ORDER BY `item_orden`.`fecha` ASC");
while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {

    $totalremito += $rowclientes["valor"];
}

$Remitoss = number_format($totalremito, 0, '.', '');


//efectivo total
$EfectifoTotals = $val_entrada + $Remitoss - $GastosTotals;
$EfectifoTotal = number_format($EfectifoTotals, 0, ',', '.');

?>

<!-- Select2 css -->
<link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<!-- Tagsinput css -->
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title"><i class="fa fa-file-text"></i> Caja Diaria</h4>


        </div>

    </div>
</div>

<div class="contentbar">
    <form action="/caja/index" method="POST" enctype="multipart/form-data">



        <div class="row">

            <!-- clientes -->
            <div class="col-sm-10">



                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Día:</label>

                <input type="date" id="hasta_date" name="hasta_date" value="<?= $hasta_date ?>">
                &nbsp;&nbsp;

                <select name="IdCamioneta" id="IdCamioneta">
                    <?php

                    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where estado = '0' ORDER BY `camionetas`.`position` ASC");
                    while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                        if ($rowcamionetas["id"] == $IdCamioneta) {
                            $selcob = ${"selcob" . $rowcamionetas["id"]};
                            $selcob = "selected";
                        } else {
                            $selcob = "";
                        }

                        echo '<option value="' . $rowcamionetas["id"] . '" ' . $selcob . '>' . $rowcamionetas["nombre"] . ' </option>';
                    }

                    ?>
                </select>

                &nbsp;&nbsp;
                <input type="submit" value="Buscar">

            </div>

        </div>
    </form>

    <br>








    <!-- Start col -->
    <div class="col-lg-8">
        <div class="card m-b-30" style="background-color: #D2D2D2; border:none;">
            <div class="accordion accordion-outline" id="accordionoutline">
                <div class="card">
                    <div class="card-header" id="headingOneoutline">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline" aria-expanded="true" aria-controls="collapseOneoutline"><i class="ri-award-line mr-2"></i>CAJA DIARIA <? arreglofech($hasta_date); ?></button>
                        </h2>
                    </div>
                    <div id="collapseOneoutline" class="collapse show" aria-labelledby="headingOneoutline" data-parent="#accordionoutline">

                        <div class="card-body">

                            <div class="col-lg-12">
                                <!-- Start row -->
                                <div class="row">
                                    <div class="col-lg-12" style="background-color: #ffffff;">

                                        <table class="table table-bordered table-hover">
                                            <tr style="background-color: while;">
                                                <td>CAMBIO</td>
                                                <td style="text-align: right;">
                                                    $<?= number_format($val_entrada, 0, ',', '.') ?>

                                                </td>
                                            </tr>
                                            <tr style="background-color: while;">
                                                <td>REMITOS</td>
                                                <td style="text-align: right;">$<? totalremitos($hasta_date, $IdCamioneta, $rjdhfbpqj); ?></td>
                                            </tr>
                                            <? if ($vergas == '1') { ?>
                                                <tr>
                                                    <td>GASTOS</td>
                                                    <td style="text-align: right;">$-<?= $GastosTotal ?></td>
                                                </tr>
                                            <? } ?>
                                            <tr>
                                                <td style="text-align: right;">
                                                    <h5>Efectivo Remitos</h5>
                                                </td>
                                                <td style="text-align: right;">
                                                    <h5>$<?= $EfectifoTotal ?></h5>
                                                </td>
                                            </tr>

                                            <?php



                                            //efectivo real
                                            $sqlefectivo = mysqli_query($rjdhfbpqj, "SELECT * FROM efectivo Where fecha_caja = '$hasta_date' and id_camioneta='$IdCamioneta'");
                                            if ($rowefectivo = mysqli_fetch_array($sqlefectivo)) {
                                                $id_efectivo=$rowefectivo["id_efectivo"];
                                                $efec1 = $rowefectivo["efec1"];
                                                $efec2 = $rowefectivo["efec2"];
                                                $efec3 = $rowefectivo["efec3"];
                                                $efec4 = $rowefectivo["efec4"];
                                                $efec5 = $rowefectivo["efec5"];
                                                $efec6 = $rowefectivo["efec6"];
                                                $efec7 = $rowefectivo["efec7"];
                                                $efec8 = $rowefectivo["efec8"];
                                                $efec9 = $rowefectivo["efec9"];



                                                $eftot1 = $efec1 * 1000;
                                                $eftot2 = $efec2 * 500;
                                                $eftot3 = $efec3 * 200;
                                                $eftot4 = $efec4 * 100;
                                                $eftot5 = $efec5 * 50;
                                                $eftot6 = $efec6 * 20;
                                                $eftot7 = $efec7 * 10;

                                                $EfecTotalReal = $eftot1 + $eftot2 + $eftot3 + $eftot4 + $eftot5 + $eftot6 + $eftot7 + $efec8 + $efec9;

                                                $EfecTotalRealv = number_format($EfecTotalReal, 0, ',', '.');




                                                //calculo el gasto remito y el efectivo real

                                                $aRevisar = $EfecTotalReal - $EfectifoTotals;

                                                if ($aRevisar == 0) {
                                                    $efectivoTotalreal = '<tr><td style="text-align: right;">
                                                     <h5 >Efectivo Total</h5>
                                                 </td>
                                                 <td style="text-align: right;">
                                                     <h5 style="color:#0C9026;">Correcto</h5>
                                                 </td>
                                                 </tr>';
                                                } else {

                                                    if ($aRevisar < 0) {

                                                        $efectivoRevisar = '<tr><td style="text-align: right;">
                                                         <h5 style="color:red;">Revisar Falta <i class="dripicons-arrow-right"></i></h5>
                                                                         </td>
                                                                         <td style="text-align: right;">
                                                                         <h5 style="color:red;">$' . number_format($aRevisar, 0, ',', '.') . '</h5>
                                                                     </td>
                                                                     </tr>';
                                                    } else {

                                                        $efectivoRevisar = '<tr><td style="text-align: right;">
                                                                         <h5 style="color:red;">Revisar hay de más <i class="dripicons-arrow-right"></i></h5>
                                                                                         </td>
                                                                                         <td style="text-align: right;">
                                                                                         <h5 style="color:red;">$' . number_format($aRevisar, 0, ',', '.') . '</h5>
                                                                                        </td>
                                                                                     </tr>';
                                                    }

                                                    $efectivoTotalreal = '<tr><td style="text-align: right;">
                                                                              <h5>Efectivo Total</h5>
                                                                         </td>
                                                                         <td style="text-align: right;">
                                                                              <h5>$' . $EfecTotalRealv . '</h5>
                                                                         </td>
                                                                     </tr>';
                                                }




                                                //cuadro efetivo real      


                                            }


                                            ?>
                                            <?= $efectivoTotalreal ?>
                                            <?= $efectivoRevisar ?>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwooutline">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwooutline" aria-expanded="false" aria-controls="collapseTwooutline"><i class="ri-calendar-line mr-2"></i>GASTOS</button>
                        </h2>
                    </div>
                    <div id="collapseTwooutline" class="collapse" aria-labelledby="headingTwooutline" data-parent="#accordionoutline">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <br>
                                <!-- End row -->
                                <!-- Start row -->
                                <? if ($vergas == '1') { ?>
                                    <div class="row">
                                        <div class="col-lg-12" style="background-color: #ffffff;">
                                            <h5 class="card-title" style="padding-top: 10px;">Gastos</h5>
                                            <table class="table table-bordered table table-hover">
                                                <?php
                                                echo '' . $gastos . '';
                                                ?>
                                                <tr>
                                                    <td style="text-align: right;">
                                                        <h5>Gastos Total</h5>
                                                    </td>
                                                    <td style="text-align: right;">
                                                        <h5>$<?= $GastosTotal ?></h5>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                    <br>
                                <? } ?>


                            </div>
                            <!-- fin izquierda -->
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThreeoutline">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeoutline" aria-expanded="false" aria-controls="collapseThreeoutline"><i class="dripicons-blog mr-2"></i>REMITOS</button>
                        </h2>
                    </div>
                    <div id="collapseThreeoutline" class="collapse" aria-labelledby="headingThreeoutline" data-parent="#accordionoutline">
                        <div class="card-body">

                            <div class="col-lg-12">

                                <div class="table-responsive m-b-30">

                                    <div class="table-responsive m-b-30">
                                        <table class="table table-bordered" style="background-color: #fff; ">

                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 3cm; text-align:center;">Remito Nº</th>
                                                    <th scope="col" style="text-align:center;">Direccíon</th>
                                                    <th scope="col" style="width: 3cm; text-align:center;">Cobro $</th>
                                                </tr>
                                            </thead>

                                        </table>
                                        <!-- frame muestro resultados -->




                                        <iframe scrolling="yes" height="400" width="100%" src="cajaframe.php?hasta_date=<?= $hasta_date ?>&IdCamioneta=<?= $IdCamioneta ?>" style="background-color: #ffffff"></iframe>

                                        <!-- fin frame -->

                                        <br>
                                        <table class="table table-bordered">
                                            <tbody>



                                                <tr>
                                                    <td style="text-align:right;font-weight:bold;">Total Remitos</td>
                                                    <td style="text-align:right;width: 110px;font-weight:bold; background-color: #E7E7E7;">
                                                        <? totalremitos($hasta_date, $IdCamioneta, $rjdhfbpqj);
                                                        ?>
                                                    </td>

                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <!-- End col -->




                            </div>
                        </div>
                    </div>
                </div>
                                    <? if(!empty($id_efectivo)){?>
                <div class="card m-b-20">


                    <div class="card">
                        <div class="card-header" id="theadingThreeoutlineb">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="ion ion-md-cash mr-2"></i> EFECTIVO ENTREGADO</button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">

                                    

                                        <h5>Billetes de $1000 = <?= $efec1 ?> unidades</h5><br>
                                        <h5>Billetes de $500 = <?= $efec2 ?> unidades</h5><br>
                                        <h5>Billetes de $200 = <?= $efec3 ?> unidades</h5><br>
                                        <h5>Billetes de $100 = <?= $efec4 ?> unidades</h5><br>
                                        <h5>Billetes de $50 = <?= $efec5 ?> unidades</h5><br>
                                        <h5>Billetes de $20 = <?= $efec6 ?> unidades</h5><br>
                                        <h5>Billetes de $10 = <?= $efec7 ?> unidades</h5><br>
                                        <h5>Monedas = $<?= $efec8 ?></h5><br>
                                        <h5>Cheques = $<?= $efec9 ?></h5><br><br>
                                        <h5>TOTAL ENTREGADO: $<?= number_format($EfecTotalReal, 0, ',', '.'); ?></h5>
                                   






                            </div>

                        </div>
                    </div>
                    </div> <? }?>

                    <div class="card m-b-20">
                        <div class="card">
                            <div class="card-header" id="theadingThreeoutlineb">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeoutlineb" aria-expanded="false" aria-controls="collapseThreeoutline"><i class="fa fa-money mr-2"></i>AGREGAR CAMBIO</button>
                                </h2>
                            </div>
                            <div id="collapseThreeoutlineb" class="collapse" aria-labelledby="theadingThreeoutlineb" data-parent="#accordionoutline">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <br>
                                        <!-- End row -->
                                        <div class="row">
                                            <div class="col-lg-6" style="background-color: #ffffff;">
                                                <h5 class="card-title" style="padding-top: 10px;">Cargar cambio</h5>
                                                <table class="table table-bordered table table-hover">
                                                    <tr style="background-color: while;">

                                                        <td style="text-align: right;">

                                                            <div id="muestrocaja"> </div>
                                                            <input type="hidden" class="form-control" name="modo" id="modo" value="1">
                                                            <input type="hidden" class="form-control" name="det_entrada" id="det_entrada">
                                                            <input type="hidden" class="form-control" name="fecha_caja" id="fecha_caja" value="<?= $hasta_date ?>">
                                                            <input type="hidden" class="form-control" name="id_camioneta" id="id_camioneta" value="<?= $IdCamioneta ?>">
                                                            <input type="hidden" class="form-control" name="val_salida" id="val_salida" value="">
                                                            <input type="number" class="form-control" name="val_entrada" id="val_entrada" placeholder="Importe:" value="<?= $val_entrada ?>" style="float:left; color:black; width:30mm; " onclick="select()">

                                                            <button type="button" class="btn btn-primary btn-lg" onclick="ajax_caja($('#fecha_caja').val(), $('#id_camioneta').val(), $('#det_entrada').val(), $('#val_entrada').val(), $('#val_salida').val(), $('#modo').val());"><b><i class="dripicons-checkmark"></i></b></button>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div><br>




                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                   

                    <div class="card m-b-20">


                        <div class="card">
                            <div class="card-header" id="theadingThreeoutlinebc">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeoutlinebc" aria-expanded="false" aria-controls="collapseThreeoutline"><i class="dripicons-basket"></i> PRODUCTOS SIN VENDER</button>
                                </h2>
                            </div>
                            <div id="collapseThreeoutlinebc" class="collapse" aria-labelledby="theadingThreeoutlinebc" data-parent="#accordionoutline">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <br>
                                        <!-- End row -->
                                        <div class="row">
                                            <?php

                                            stocksobra($fechahoy, $IdCamioneta, $rjdhfbpqj);
                                            ?>


                                        </div><br>




                                    </div>

                                </div>
                            </div>
                        </div>




                    </div>
                    <br>
                    <table>

                        <tr>
                            <td style="text-align:right;">

                                <a href="print_caja?hasta_date=<?= $hasta_date ?>&IdCamioneta=<?= $IdCamioneta ?>" target="_blank"><button type="button" class="btn btn-outline-primary"><i class="dripicons-print"></i> Descargar caja <? arreglofech($hasta_date); ?></button>
                                </a>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>



        </div>
    </div>
    <!-- End col -->












    <script src="ajax_caja.js"></script>

    <?php include('../template/pie.php'); ?>