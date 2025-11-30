<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');
include('../caja/totalremitos.php');



$sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT item_orden.id_cliente, item_orden.modo, item_orden.fecha,  item_orden.id_orden, item_orden.tipopag, item_orden.valor, clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta FROM item_orden INNER JOIN clientes ON item_orden.id_cliente = clientes.id Where item_orden.fecha = '$fechahoy' and clientes.camioneta='$IdCamioneta' and (item_orden.tipopag='1' or item_orden.tipopag='4') and item_orden.modo='1' ORDER BY `item_orden`.`fecha` ASC");
while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {

    $totalremito += $rowclientes["valor"];
}

$Remitoss = number_format($totalremito, 0, '.', '');



$sqlcajaV = mysqli_query($rjdhfbpqj, "SELECT * FROM caja Where fecha_caja = '$fechahoy' and id_camioneta='$IdCamioneta' and modo='1'");
while ($rowcajaV = mysqli_fetch_array($sqlcajaV)) {
    $val_entrada = $rowcajaV["val_entrada"];
}


$Cambio = number_format($val_entrada, 0, ',', '.');
$Cambios = number_format($val_entrada, 0, '.', '');

$sqlcaja = mysqli_query($rjdhfbpqj, "SELECT * FROM caja Where fecha_caja = '$fechahoy' and id_camioneta='$IdCamioneta' and modo='0'");
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
    <td><a href="javascript:eliminar(' . $comi . '../caja/mlkdthspa.php?juhytm=' . $idcajaen . '' . $comi . ')">
    <i class="ri-delete-bin-3-line" style="color: red;"></i>
    </a>' . $rowcaja["det_entrada"] . '</td>
    <td style="text-align: right;">$' . $Gastos . '</td>
    </tr> 
    ';
}

//efectivo total
$EfectifoTotals = $Cambios + $Remitoss - $GastosTotals;
$EfectifoTotal = number_format($EfectifoTotals, 0, ',', '.');


//efectivo real
$sqlefectivo = mysqli_query($rjdhfbpqj, "SELECT * FROM efectivo Where fecha_caja = '$fechahoy' and id_camioneta='$IdCamioneta'");
if ($rowefectivo = mysqli_fetch_array($sqlefectivo)) {
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
<style>
    a {
        color: black;
    }
</style>
<div class="contentbar">


    <div class="col-lg-12">
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff;">
                <h5 class="card-title" style="padding-top: 10px;">CAJA DIARIA <? arreglofech($fechahoy); ?></h5>
                <table class="table table-bordered">
                    <tr style="background-color: while;">
                        <td>CAMBIO</td>
                        <td style="text-align: right;">$<?= $Cambio ?></td>
                    </tr>
                    <tr style="background-color: while;">
                        <td>REMITOS</td>
                        <td style="text-align: right;">$<? totalremitos($fechahoy, $IdCamioneta, $rjdhfbpqj); ?></td>
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
                    <tr>
                        <?= $efectivoTotalreal ?>
                        <?= $efectivoRevisar ?>
                    </tr>
                </table>

            </div>
        </div>

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

                    </table>

                </div>
            </div>

            <br>
        <? } ?>
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">
                <table style="width:100%;">
                    <tr>
                        <td> <br>

                            <input type="text" class="form-control" name="det_entrada" id="det_entrada" placeholder="Detalle:" style="font-weight: bold; color:black;" autocomplete="on">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" class="form-control" name="modo" id="modo" value="0">
                            <input type="hidden" class="form-control" name="fecha_caja" id="fecha_caja" value="<?= $fechahoy ?>">
                            <input type="hidden" class="form-control" name="id_camioneta" id="id_camioneta" value="<?= $id_camioneta ?>">
                            <input type="hidden" class="form-control" name="val_entrada" id="val_entrada" value="0">
                            <input type="number" class="form-control" name="val_salida" id="val_salida" placeholder="Importe:" style="font-weight: bold; color:black;">

                        </td>
                    </tr>


                </table>
                <br>
                <div id="muestrocaja"> </div>
                <div style="padding-bottom: 10px;">
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="ajax_caja($('#fecha_caja').val(), $('#id_camioneta').val(), $('#det_entrada').val(), $('#val_entrada').val(), $('#val_salida').val(), $('#modo').val());"><b>AGREGAR GASTO</b></button>

                </div>
            </div>
        </div>




    </div><br>
    <div class="card m-b-20">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <li class="media">
                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"> <i class="fa fa-money"></i></span>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1 font-16">Carga Efectivo</h5>
                            <p class="mb-0">Ingresar</p>

                        </div>
                    </li>
                </a>
            </ul>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">

                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <div id="muestroefectivo"> </div>
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$1000 =</button>
                    </div>
                    <input type="number" name="efec1" id="efec1" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec1 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$500 =</button>
                    </div>
                    <input type="number" name="efec2" id="efec2" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec2 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$200 =</button>
                    </div>
                    <input type="number" name="efec3" id="efec3" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec3 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$100 =</button>
                    </div>
                    <input type="number" name="efec4" id="efec4" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec4 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$50 =</button>
                    </div>
                    <input type="number" name="efec5" id="efec5" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec5 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$20 =</button>
                    </div>
                    <input type="number" name="efec6" id="efec6" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec6 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:18pt; width:120px;">$10 =</button>
                    </div>
                    <input type="number" name="efec7" id="efec7" class="form-control" style="font-weight: bold; color:black;  font-size:18pt; text-align:center;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec7 ?>" onclick="select()">
                </div>
                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:15pt; width:120px;">Monedas</button>
                    </div>
                    <input type="number" name="efec8" id="efec8" class="form-control" style="font-weight: bold; color:black;  font-size:12pt; text-align:center; height:50px;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec8 ?>" placeholder="$" onclick="select()">
                </div>

                <div class="input-group mb-3 col-lg-6">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-addon1" style="font-weight: bold; color:grey; text-align:right; font-size:15pt; width:120px;">Cheques</button>
                    </div>
                    <input type="number" name="efec9" id="efec9" class="form-control" style="font-weight: bold; color:black;  font-size:9pt; text-align:center;height:50px;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $efec9 ?>" placeholder="$" onclick="select()">
                </div>

                <br>
                <div id="muestrocaja"> </div>
                <div style="padding-bottom: 10px;">


                    <button type="button" name="submit" class="btn btn-primary btn-lg btn-block" onclick="ajax_efectivo($('#fecha_caja').val(), $('#id_camioneta').val(), $('#efec1').val(), $('#efec2').val(), $('#efec3').val(), $('#efec4').val(), $('#efec5').val(), $('#efec6').val(), $('#efec7').val(), $('#efec8').val(), $('#efec9').val());"><b>GUARDAR</b></button>

                    
                </div>
                
                
                
                
                
                
                
                
                
            </div>
            
        </div>
        
    </div>
    <a href="print_caja"> <button type="button" class="btn btn-dark btn-block"><i class="la la-print"></i> Imprimir Caja</button></a>
</div>


<script src="../caja/ajax_caja.js"></script>
<script src="ajax_efectivo.js"></script>










<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>