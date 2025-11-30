<?php include('../f54du60ig65.php');
require('../salidas/mpdf.php');
include('totalremitos.php');
$getver = $_GET['get'];
ob_start();
//POST
$hasta_date = $_GET['hasta_date'];
$IdCamioneta = $_GET['IdCamioneta'];

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
    <td style="width: 3cm; text-align: right;">$' . $Gastos . '</td>
    </tr> 
    ';
}
if (empty($val_entrada)) {
    $val_entrada = "0";
}

$sqlitem_ordenar = mysqli_query($rjdhfbpqj, "SELECT item_orden.id_cliente, item_orden.modo, item_orden.fecha,  item_orden.id_orden, item_orden.tipopag, item_orden.valor, clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta FROM item_orden INNER JOIN clientes ON item_orden.id_cliente = clientes.id 
        
Where item_orden.fecha = '$hasta_date' and clientes.camioneta='$IdCamioneta' and (item_orden.tipopag='1' or item_orden.tipopag='4') and item_orden.modo='1' ORDER BY `item_orden`.`fecha` ASC");

while ($rowclientesr = mysqli_fetch_array($sqlitem_ordenar)) {

    $pagosOrdenT += $rowclientesr["valor"];
}

$Remitoss = number_format($pagosOrdenT, 0, '.', '');


//efectivo total
$EfectifoTotals = $val_entrada + $pagosOrdenT - $GastosTotals;
$EfectifoTotal = number_format($EfectifoTotals, 0, ',', '.');

?>

<!-- Select2 css -->
<link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<!-- Tagsinput css -->
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="/assets/css/style.css" rel="stylesheet" type="text/css">

<body style="background-color: white; font-size:10pt;">
    <div class="contentbar" style="background-color: #ffffff;">


        <img src="/assets/images/logo.png" style="height: 100px; border: 0px solid black;">
        <hr>

        <div class="col-lg-12">
            <h2>CAJA DIARIA <?

                            $fechaexpl = explode("-", $hasta_date);

                            if (!empty($hasta_date)) {
                                echo '' . $fechaexpl[2] . '/' . $fechaexpl[1] . '/' . $fechaexpl[0] . '';
                            } ?></h2><br>
            




        </div>

   




        <div class="col-lg-12">
            <!-- Start row -->
            <div class="row">

                <div class="col-lg-12" style="background-color: #ffffff;">
                    <h5 class="card-title" style="padding-top: 10px;">Resumen General</h5>
                    <table class="table table-bordered">
                        <tr style="background-color: while;">
                            <td>CAMBIO</td>
                            <td style="width: 3cm; text-align: right;">
                                $<?= number_format($val_entrada, 0, ',', '.') ?>

                            </td>
                        </tr>
                        <tr style="background-color: while;">
                            <td>REMITOS</td>
                            <td style="width: 3cm; text-align: right;">$<? totalremitos($hasta_date, $IdCamioneta, $rjdhfbpqj); ?></td>
                        </tr>
                        <? if ($vergas == '1') { ?>
                            <tr>
                                <td>GASTOS</td>
                                <td style=" width: 3cm; text-align: right;">$-<?= $GastosTotal ?></td>
                            </tr>
                        <? } ?>
                        <tr>
                            <td style="text-align: right;">
                                <h5>Efectivo Remitos</h5>
                            </td>
                            <td style="text-align: right;">
                                <h5>$<?= $EfectifoTotal ?></h5>
                            </td>
                        </tr><?php



                                //efectivo real
                                $sqlefectivo = mysqli_query($rjdhfbpqj, "SELECT * FROM efectivo Where fecha_caja = '$hasta_date' and id_camioneta='$IdCamioneta'");
                                if ($rowefectivo = mysqli_fetch_array($sqlefectivo)) {
                                    $id_efectivo = $rowefectivo["id_efectivo"];
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
        </div>     <div class="col-lg-12">
            <br>
            <!-- End row -->
            <!-- Start row -->
            <? if ($vergas == '1') { ?>
                <div class="row">
                    <div class="col-lg-12" style="background-color: #ffffff;">
                        <h5 class="card-title" style="padding-top: 10px;">Gastos</h5>
                        <table class="table table-bordered table ">
                            <?php
                            echo '' . $gastos . '';
                            ?>
 <tr>
    <td>TOTAL GASTOS</td>
    <td style="width: 3cm; text-align: right;"> $<?= $GastosTotal ?> </td>
    </tr> 
                        </table>

                    </div>
                </div>

                <br>
            <? } ?>


        </div><br>
        <div class="col-lg-12">
            <!-- Start row -->
            <div class="row">

                <div class="col-lg-12" style="background-color: #ffffff;">
                   
                    <table class="table table-bordered">
                        <tr style="background-color: while;">

                            <td>
                            <h5 class="card-title" style="padding-top: 10px;">Efectivo entregado:</h5><br>
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

                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        
        <br>
        <div class="col-lg-12">
            <!-- Start row -->
            <div class="row">

                <div class="col-lg-12" style="background-color: #ffffff;">
                    <h5 class="card-title" style="padding-top: 10px;">Productos sin Vender</h5>
                   
                        

                           
                                <?php

                                stocksobra($hasta_date, $IdCamioneta, $rjdhfbpqj);
                                ?>

                           
                       
<h5 class="card-title" style="padding-top: 10px;">Cobros</h5>
            <div class="table-responsive ">

                <div class="table-responsive ">
                    <table class="table table-bordered" style="background-color: #fff; ">

                        <thead>
                            <tr>
                                <th scope="col" style="width: 3cm; text-align:center;">Remito</th>
                                <th scope="col" style="text-align:center;">Cliente</th>
                                <th scope="col" style="width: 3cm; text-align:center;">Valor $</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT orden.id_cliente, orden.fecha,  orden.id as idorden, orden.total, orden.position, orden.camioneta,
            
                                    clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta 
                                    FROM orden INNER JOIN clientes ON orden.id_cliente = clientes.id 
                                    
                                    Where  orden.fecha = '$hasta_date' and orden.camioneta='$IdCamioneta' and  orden.total !='0' ORDER BY `orden`.`position` ASC");
                                                        while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {
                                                            $IdOrdenCliente = $rowclientes["idorden"];
                                                            $sqlitem_ordenPaid = ${"sqlitem_ordenPaid" . $IdOrdenCliente};
                                                            $pagosOrden = ${"pagosOrden" . $IdOrdenCliente};
                                                            $rowitem_ordenPaid = ${"rowitem_ordenPaid" . $IdOrdenCliente};

                                                            //I extract thes paid
                                                            $sqlitem_ordenPaid = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$IdOrdenCliente' and (tipopag='1' or tipopag='4')");
                                                            while ($rowitem_ordenPaid = mysqli_fetch_array($sqlitem_ordenPaid)) {
                                                                $pagosOrden += $rowitem_ordenPaid['valor'];
                                                            }
                                                            //
                                                            if ($pagosOrden != 0) {

                                                                echo '<tr>
                                    <td  style="width: 3cm; padding-left: 10; text-align:center;">' . $rowclientes["idorden"] . '</td>
                                    <td  style="padding-left: 10;  text-align:left; ">' . $rowclientes["address"] . ' (' . $rowclientes["nom_empr"] . ')</td>
                                    <td  style="width: 3cm; padding-right: 10;  text-align:right; ">' . number_format($pagosOrden, 0, '', '.') . '</td>                     
                                    </tr>';
                                }
                            }
                            ?>



                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End col -->
                </div>
                
            </div>
            
        </div>

        



    </div>
    
</body>
<!-- End col --> <?  //envio de PDF

                    $html = ob_get_contents();
                    ob_end_clean();

                    $mpdf = new mPDF('c', 'A4-P');
                    $mpdf->writeHTML($css, 1);
                    $mpdf->AddPageByArray([
                        "margin-left" => "0mm",
                        "margin-right" => "0mm",
                        "margin-top" => "5mm",
                        "margin-bottom" => "10mm",
                        "resetpagenum" => "43"
                    ]);

                    $mpdf->writeHTML($html);
                    $mpdf->Output('cajadiaria_' . $hasta_date . '_' . $titub . '.pdf', 'I');




                    ?>