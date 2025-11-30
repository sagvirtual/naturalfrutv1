<?php include('../f54du60ig65.php'); 
include('../inicio/login.php');
include('inicio/login.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Ticket</title>
</head>

<body>

    <style>
        @media print {
            #miDiv {
                display: none;
            }
        }

        .subrayado {
            text-decoration: underline;
        }

        table.tabla_sin {

            border-collapse: collapse;

            border: none;

        }

        td.celda_sin {

            padding: 0;

        }

        tr.tr_linea {

            padding: 0;
            border-bottom: 0.1mm solid black;

        }

        tr.tr_lineatop {

            padding: 0;
            border-bottom: 0.1mm solid black;
            border-left: 0.1mm solid black;
            border-top: 0.1mm solid black;


        }

        tr.tr_lineader {

            border-left: 0.1mm solid black;

        }


        td.td_lineader {

            border-right: 0.1mm solid black;

        }

        body {
            font-family: arial;
            font-size: 8pt;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            /* Green */

            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <?
    function totalremitos($hasta_date, $IdCamioneta, $rjdhfbpqj)
    {
        $sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT item_orden.id_cliente, item_orden.modo, item_orden.fecha,  item_orden.id_orden, item_orden.tipopag, item_orden.valor, clientes.id, clientes.address, clientes.nom_empr, clientes.camioneta FROM item_orden INNER JOIN clientes ON item_orden.id_cliente = clientes.id 
        
        Where item_orden.fecha = '$hasta_date' and clientes.camioneta='$IdCamioneta' and (item_orden.tipopag='1' or item_orden.tipopag='4') and item_orden.modo='1' ORDER BY `item_orden`.`fecha` ASC");

        while ($rowclientes = mysqli_fetch_array($sqlitem_ordena)) {

            $totalremito += $rowclientes["valor"];
        }

        $totalremitod = number_format($totalremito, 0, '', '.');
        echo '' . $totalremitod . '';
    }




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

    
              
        <tr class="tr_linea tr_lineader" style="border-top: 0.1mm solid black;">
                <td class="td_lineader" style="text-align:left;font-size:9pt;  vertical-align: middle; padding: 1mm; ">' . $rowcaja["det_entrada"] . '</td>
                <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; padding-right: 2px;">$' . $Gastos . '</td>
            
    </tr> 
    ';
    }

    //efectivo total
    $EfectifoTotals = $Cambios + $Remitoss - $GastosTotals;
    $EfectifoTotal = number_format($EfectifoTotals, 0, ',', '.');


    //TOTAL REMITOS + CAMBIO
    $totalremascams = $Cambios + $Remitoss;
    $totalremascam = number_format($totalremascams, 0, ',', '.');


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


        //GASTOS MAS EFECTIVO
        $GastosEfectivos = $GastosTotals + $EfecTotalReal;
        $GastosEfectivo = number_format($GastosEfectivos, 0, ',', '.');

        //calculo el gasto remito y el efectivo real

        $aRevisar = $EfecTotalReal - $EfectifoTotals;

        if ($aRevisar == 0) {
            $efectivoTotalreal = '<tr>
            <td class="celda_sin" style="text-align:right;font-size:12pt; font-weight: bold;  vertical-align: middle;"> 
                Efectivo Total
</td>
<td class="celda_sin" style="text-align:right;font-size:12pt; font-weight: bold;  vertical-align: middle;">
    Correcto
</td>
</tr>';


$efectivoRevisar = '<tr>
<td class="celda_sin" style="text-align:right;font-size:12pt; font-weight: bold;  vertical-align: middle; padding: 1mm;"> 
    Efectivo Correcto
</td>
<td class="celda_sin" style="text-align:right;font-size:12pt; font-weight: bold;  vertical-align: middle;">

</td>
</tr>';
       

if ($aRevisar < 0) {

                $efectivoRevisar = '<tr >


                <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">
       !Revisar Falta!
                        </td>
                        <td class="celda_sin td_lineader" style=" width:15mm; border-top: 0.1mm solid black;border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">
                       $' . number_format($aRevisar, 0, ',', '.') . '
                    </td>
                    </tr>';
            }



} else {

            if ($aRevisar < 0) {

                $efectivoRevisar = '<tr >


                <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">
       !Revisar Falta!
                        </td>
                        <td class="celda_sin td_lineader" style=" width:15mm; border-top: 0.1mm solid black;border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">
                       $' . number_format($aRevisar, 0, ',', '.') . '
                    </td>
                    </tr>';
            } else{

                $efectivoRevisar = '<tr>   <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">
                        Revisar hay de más 
                                        </td>
                                        <td class="celda_sin td_lineader" style=" width:15mm; border-top: 0.1mm solid black;border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">
                                       $' . number_format($aRevisar, 0, ',', '.') . '
                                       </td>
                                    </tr>';
            }
            
            

            $efectivoTotalreal = '<tr class="tr_linea">
            <td class="celda_sin" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle;">
                             Efectivo Total
                        </td>
                        <td class="celda_sin" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle;">
                             $' . $EfecTotalRealv . '
                        </td>
                    </tr>';
        }




        //cuadro efetivo real      


    }



    ?>
    <div id="miDiv" style="text-align: center;">
        <h1>Imprimiendo...</h1>
        <p>espere a que salga el Ticket</p>
        <br>
        <br>
        <a href="caja"><button class="button button1">LISTO</button></a>
        <!--  <a onclick="javascript:window.print()" style="font-size: 40pt;">Imprimir</a> -->
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
    </div>
    *******************************************
    <div style="text-align: center; font-size:7pt;">X<br>DOCUMENTO&nbsp;NO&nbsp;VALIDO&nbsp;COMO&nbsp;FACTURA
        <img src="/assets/images/logop.png" style="width:45mm;">
    </div>
    <!--   -->
    *******************************************
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea">
            <td class="celda_sin">
                <p>Fecha:&nbsp;<? arreglofech($fechahoy);
                                echo '&nbsp;&nbsp;' . $hora_actual = date("H:i:s") . ''; ?>
                </p>
            </td>
            <td class="celda_sin">
                <p style="float:right;text-align:right;font-size:8pt;">Ref.&nbsp;000<?= $IdCamioneta ?> <br><?php



                                                                                                            ?>
                <p>
            </td>

        </tr>







    </table>




    <!-- REMITO Y CAMBIO -->
    <table class="tabla_sin" style="width: 100%;">


        <tr style="border-top: 1mm solid black; border-bottom: 1mm solid black;">
            <td style="text-align:center;font-size:10pt; font-weight: bold;">CAJA DIARIA</td>
        </tr>

    </table><br>

    <table class="tabla_sin" style="width: 100%;">

        <tr class="tr_linea tr_lineader" style="border-top: 0.1mm solid black;">
            <td class="td_lineader" style="text-align:right;font-size:9pt;   vertical-align: middle; padding: 1mm;">TOTAL REMITOS</td>
            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  padding-right: 2px; vertical-align: middle;">$<? totalremitos($fechahoy, $IdCamioneta, $rjdhfbpqj); ?></td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;   vertical-align: middle; padding: 1mm;">CAMBIO</td>
            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">$<?= $Cambio ?></td>
        </tr>
        <tr>
            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">TOTAL</td>
            <td class="celda_sin td_lineader" style="border-bottom: 0.1mm solid black;text-align:right;font-size:9pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">$<?= $totalremascam ?></td>
        </tr>

    </table>

    <br><br>


    <table class="tabla_sin" style="width: 100%;">


        <tr style="border-top: 1mm solid black; border-bottom: 1mm solid black;">
            <td style="text-align:center;font-size:10pt; font-weight: bold;">EFECTIVO</td>
        </tr>

    </table><br>
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea tr_lineader" style="border-top: 0.1mm solid black;">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm; ">
                Billetes
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                Cantidad
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                Subtotal
            </td>
        </tr>


        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt; padding: 1mm; vertical-align: middle; width:10mm;">
                1000
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt; padding: 1mm; vertical-align: middle; width:10mm;">
                <?= $efec1 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot1 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                500
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec2 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot2 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                200
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec3 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot3 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                100
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec4 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot4 ?>
            </td>
        </tr>

        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                50
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec5 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot5 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                20
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec6 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot6 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                10
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                <?= $efec7 ?>
            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $<?= $eftot7 ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                Monedas
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">

            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $ <?= $efec8 ?>
            </td>
        </tr>

        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">
                Cheques
            </td>
            <td class="td_lineader" style="text-align:center;font-size:9pt;  vertical-align: middle; width:10mm;">

            </td>
            <td class="td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; width:10mm; padding-right: 2px;">
                $ <?= $efec9 ?>
            </td>
        </tr>


        <tr>
            <td class="celda_sin " style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;"></td>
            <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">TOTAL</td>
            <td class="celda_sin td_lineader" style="border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">$<?= $EfecTotalRealv ?></td>
        </tr>

    </table>
    <br>
    <br>
    <table class="tabla_sin" style="width: 100%;">


        <tr style="border-top: 1mm solid black; border-bottom: 1mm solid black;">
            <td style="text-align:center;font-size:10pt; font-weight: bold;">GASTOS</td>
        </tr>

    </table><br>





    <!-- Start row -->
    <? if ($vergas == '1') { ?>


        <table class="tabla_sin" style="width: 100%;">
            <?php
            echo '' . $gastos . '';
            ?>
            <tr>

                <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">TOTAL</td>
                <td class="celda_sin td_lineader" style="border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">$<?= $GastosTotal ?></td>
            </tr>
        </table>




        <br>
    <? } ?>






    <br>
    <table class="tabla_sin" style="width: 100%;">


        <tr style="border-top: 1mm solid black; border-bottom: 1mm solid black;">
            <td style="text-align:center;font-size:10pt; font-weight: bold;">RESUMEN</td>
        </tr>

    </table><br>
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea tr_lineader" style="border-top: 0.1mm solid black;">
            <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; ">
                REMITOS&nbsp;+&nbsp;CAMBIO
            </td>

            <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; width:15mm; padding-right: 2px;">
                $<?= $totalremascam ?>
            </td>
        </tr>
        <tr class="tr_linea tr_lineader">
            <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; ">
                GASTOS + EFECTIVO
            </td>

            <td class="td_lineader" style="text-align:right;font-size:9pt; padding: 1mm; vertical-align: middle; padding-right: 2px;">
                $<?= $GastosEfectivo ?>
            </td>
        </tr>


    <!--     <tr>
            <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">TOTAL</td>
            <td class="celda_sin td_lineader" style="border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">$<?//= $EfectifoTotal ?></td>
        </tr> -->
        <tr>
            <?= $efectivoRevisar ?>
        </tr>



    </table><br>
    <table class="tabla_sin" style="width: 100%;">


        <!-- <tr>
           
            <td class="celda_sin td_lineader" style="text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding: 1mm;">EFECTIVO</td>
            <td class="celda_sin td_lineader" style=" width:15mm; border-top: 0.1mm solid black;border-bottom: 0.1mm solid black;text-align:right;font-size:10pt; font-weight: bold;  vertical-align: middle; padding-right: 2px;">$<? //= $EfecTotalRealv 
                                                                                                                                                                                                                                    ?></td>
        </tr> -->



    </table>
    <br>












    <!-- 
    <table class="tabla_sin" style="width: 100%;">
 
        <tr>
            <? //= $efectivoRevisar 
            ?>
        </tr>

    </table>
    <br> -->

    *********************************************


    <script>
        window.print();



        // Esperar a que la impresión termine
        // Esperar 5 segundos antes de cerrar la ventana
        setTimeout(function() {
            location.href = 'caja';
        }, 20000);
    </script>