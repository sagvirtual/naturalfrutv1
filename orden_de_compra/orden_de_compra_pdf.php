<? include('../f54du60ig65.php');
include('funcion_saldoanterior.php');
include('../control_stock/funcionStockS.php');
include('../nota_de_pedido/func_nombreunid.php');
require('../salidas/mpdf.php');

$idordencod = $_GET['jdhsknc'];
$idorden = base64_decode($idordencod);

//comienzo pdf
ob_start(); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
</style>

<?php
$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordencompra Where id='$idorden'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_clienteint = $rowordenx['id_cliente'];
    $fechaord = $rowordenx['fecha'];
    $horaord = $rowordenx['hora'];


    $perporsen = $rowordenx['perporsen'];
    $totalper = $rowordenx['totalper'];
    $ivaporsen = $rowordenx['ivaporsen'];


    $subtotal = $rowordenx['subtotal'];
    $descuento = $rowordenx['descuento'];
    $totalivas = $rowordenx['totalivas'];
    $total = $rowordenx['total'];
    // $saldo = $rowordenx['saldo'];
    $pago = $rowordenx['pago'];
}

$calculodeuda = calculodeuda($rjdhfbpqj, $id_clienteint, $idorden);
//$calculodeuda= $rowordenx['anterior'];


$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $empresa = $rowclientes["empresa"];
    $rubro = $rowclientes["rubro"];
    /* 
    $nom_empr = $rowclientes["nom_empr"];
    $horarios = $rowclientes["horarios"];
    $wsp = $rowclientes["wsp"];

    $direccion = $rowclientes['address'];
    $localidad = $rowclientes['localidad'];
    $retiradcv = $rowclientes['retira'];
    $zonaid = $rowclientes['zona'];
    if ($retiradcv == '1') {
        $textre = "";
    } */
}




/* $sqlwden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$idorden' and modo='0'");
while ($rodrden = mysqli_fetch_array($sqlwden)) {
    $deddpre+=$rodrden['descuenun'];


}
 */

/* 
$sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_cliente = '$id_clienteint'  and modo='1' and id_orden='$idorden'");
$canv = mysqli_num_rows($sqlpeufpd);
while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

    $pagoTotal= $rowpagdeufp["valor"];


}
$saldo =  ($total + $calculodeuda)- $pagoTotal ; */


$id_ordendsd = str_pad($idorden, 8, '0', STR_PAD_LEFT);
?>



<p>Fecha de Emisión: <?= date('d/m/Y', strtotime($fechahoy)) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Hora: <?= $horasin ?></p>

<div style="width: 100%; text-align: center;"><!--  <img src="/assets/images/logopc.png" style="width:38mm;"> -->
    <h2>ORDEN DE COMPRA</h2>
    <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
</div>
<hr>

<table style="width:100%; height: 17mm; ">
    <tr>
        <td
            style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5; height: 17mm;">
            <p style="font-size: 14px; font-weight: bold;">

                Num.: <?= $id_ordendsd ?><br><br>
                PROVEEDOR: <?= $empresa ?><br>
                Fecha: <?= date('d/m/Y', strtotime($fechaord)) ?><br>

            </p>


        </td>
        <td style="vertical-align: top;line-height: 1.5; width:50mm;">
            <p style="font-size: 14px;font-size: 14px; font-weight: bold;">No valido como<br>
                FACTURA</p>

        </td>
    </tr>
</table>
<table style="width:100%;  ">
    <tr>
        <td style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5;">

            <p style="font-size: 12px; font-weight: bold;">


                <?= $textre ?>
                <? if ($retiradcv == '0') { ?>
                    Dirección: <?= $direccion ?><br>
                    Localidad: <?= $localidad ?><br>
                <? } ?>
            </p>

        </td>

        <td style="vertical-align: top;line-height: 1.5;  width:50mm;">

            <p style="font-size: 14px;font-size: 12px; font-weight: bold;">
                <!-- 
    Días: a convenir<br>
    Horarios: <? //= $horarios 
                ?><br>
    Teléfono: <? //= $wsp 
                ?><br> -->
            </p>
        </td>
    </tr>
</table>


<hr>

<table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse;">
    <tr style="vertical-align: middle;line-height: 1.5;height: 10mm;font-weight: bold;">
        <td><strong>Producto</strong></td>
        <td style="width:50px; text-align:center;padding-left:5px;"><strong>Cant.</strong></td>
        <td style="width:50;text-align:center;padding-left:5px;"> <strong>Unid.</strong></td>
        <td style="width:70px;text-align:right;padding-left:5px;"><strong>Importe</strong></td>
        <? if ($deddpre > 0) { ?>
            <td style="width:33px;text-align:center;padding-left:5px;"><strong>Desc.</strong></td>
            <td style="width:70px;text-align:right;padding-left:5px;"><strong>Imp. Desc.</strong></td>
        <? } ?>
        <td style="width:70px;text-align:right;padding-left:5px;padding-right: 5px;"><strong>Total</strong></td>

    </tr>

</table>
<?

if ($rubro == '0') {

    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo, e.precio,  e.descuenun,  e.id_orden,  e.agregado,  e.total,  e.hora,  e.nombre,  e.kilos,  e.total,  e.tipounidad, u.id, u.nombre as nomcatego
FROM item_compra e 
INNER JOIN categorias u 
ON e.id_categoria = u.id
Where e.id_orden = '$idorden' and e.modo='0' ORDER BY `nomcatego` ASC");
} else {
    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra  Where id_orden = '$idorden' and modo='0' ORDER BY `nombre` ASC");
}

//$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$idorden' and modo='0' ORDER BY `u.nombre` ASC");
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $tipounidad = $roworden['tipounidad'];
    $id_producto = $roworden['id_producto'];
    $total += $roworden['total'];

    $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
    $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
    $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);

    if ($rubro == '0') {
        if ($tipounidad == '0') {
            $seled0 =  $nombreunid;
            $comoviene = "";
        } else {

            $seled0 = $nombrebult;
            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
        }
    } else {

        if ($tipounidad == '0') {
            $seled0 =  "Unid.";
            $comoviene = "";
        } else {

            $seled0 = "Kg.";
            $comoviene = "";
        }
    }




    $cant = $cant + 1;
    if ($cant % 2 == 0) {
        $colorfondo = "white";
    } else {
        $colorfondo = "#E2E2E2";
    }
    $preciounit = $roworden['precio'];
    $descunpre = $roworden['descuenun'];
    if ($descunpre != '0') {
        $monto_descuento = ($preciounit * $descunpre) / 100;
        $preciocdes = floor($preciounit - $monto_descuento);
    } else {
        $preciocdes = '0';
    }
    $agregado = $roworden['agregado'];


    echo '<br><table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse; ">
<tr
style="vertical-align: top;line-height: 1.5; background-color: ' . $colorfondo . '; padding-top: 10px;">
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . '' . $comoviene . ' </td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $roworden['kilos'] . '</td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $seled0 . '</td>
<td style="width:70px;text-align:right;padding-right: 5px; padding-top: 5px; padding-bottom: 5px;">$' . number_format($roworden['precio'], 0, ',', '.') . '</td>';
    if ($deddpre > 0) {
        echo '<td style="width:33px;text-align:center;padding-top: 5px; padding-bottom: 5px;">%' . $roworden['descuenun'] . '</td>
<td style="width:70px;text-align:right;padding-top: 5px; padding-bottom: 5px;">$' . number_format($preciocdes, 0, ',', '.') . '</td>';
    }
    echo '<td style="width:70px; text-align:right;padding-top: 5px; padding-bottom: 5px;padding-right: 5px;">$' . number_format($roworden['total'], 0, ',', '.') . '</td>
</tr>
</table>

';
}

?>




<!-- pie -->
<hr>

<table style="width:100%; height: 17mm;  font-size: 14px;">
    <tr>

        <td style="width:50%">
            <table style="width:100%;">
                <tr>
                    <td style="width:250px">

                    </td>
                    <td style="vertical-align: top;line-height: 1.5;  text-align:right;">
                        Suma de Compra:&nbsp;
                    </td>
                    <td style="vertical-align: top;line-height: 1.5;text-align:right;">
                        $<?= number_format($total, 2, ',', '.') ?>


                    </td>

            </table>
        </td>
    </tr>
</table>
<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();
$mpdf->shrink_tables_to_fit = 0;
$mpdf->ignore_table_widths = false;
$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->SetHTMLFooter('<hr><table style="width:280mm;"><tr><td style="width:50%;"><div class="page-footer"><i>Página: {PAGENO} de {nbpg} - Orden de Compra: Nº ' . $idorden . ' - Proveedor: ' . $empresa . '</i></div></td></tr></table>');


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "20mm",
    "margin-right" => "20mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Orden de Compra No ' . $idorden . ' Fecha ' . $fechaord . '.pdf', 'D'); //D




?>