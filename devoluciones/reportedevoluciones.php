<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
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
$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id='$idorden'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_clienteint = $rowordenx['id_cliente'];
    $fechaord = $rowordenx['fecha'];
    $horaord = $rowordenx['hora'];
    $idordendev = $rowordenx['id_orden'];
    if ($idordendev == 0) {
        $idordendev = "Int.";
    } else {
        $idordendev = "Nº" . $rowordenx['id_orden'];
    }
}



$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $proveedor = $rowclientes["nom_contac"];
    $direccion = $rowclientes['nom_empr'];
}







?>



<p>Fecha de Emisión: <?= date('d/m/Y', strtotime($fechahoy)) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Hora: <?= $horasin ?></p>

<div style="width: 100%; text-align: center;background-color: grey; color:white;"><!--  <img src="/assets/images/logopc.png" style="width:38mm;"> -->
    <h2>ORDEN DE DEVOLUCION</h2>

</div>
<hr>

<table style="width:100%; height: 17mm; ">
    <tr>
        <td
            style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5; height: 17mm;">
            <p style="font-size: 14px; font-weight: bold;">

                Num.: <?= str_pad($idorden, 8, '0', STR_PAD_LEFT) ?><br>
                Fecha: <?= date('d/m/Y', strtotime($fechaord)) ?><br><br>
                Ref Orden.: <?= $idordendev ?><br><br>
                CLIENTE: <?= $proveedor ?><br>

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

            <p style="font-size: 14px;font-size: 12px; font-weight: bold;">

                <?= $ordedecompra ?><br>
            </p>

        </td>

        <td style="vertical-align: top;line-height: 1.5;  width:50mm;">


        </td>
    </tr>
</table>


<hr>

<table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse;">
    <tr style="vertical-align: middle;line-height: 1.5;height: 10mm;font-weight: bold;">
        <td><strong>Producto</strong></td>
        <td style="width:50px; text-align:center;padding-left:5px;"><strong>Cant.</strong></td>
        <td style="width:50px;text-align:center;padding-left:5px;"> <strong>Unid.</strong></td>
        <td style="width:90px;text-align:center;padding-left:5px;"> <strong>Venc.</strong></td>
        <td style="width:90px;text-align:center;padding-left:5px;"><strong>Motivo</strong></td>

    </tr>

</table>
<?
$catbul = 0;

$sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo,  e.id_orden,  e.motivo, e.fechaold,  e.hora,  e.nombre,  e.kilos,  e.tipounidad, u.id, u.nombre as nomcatego
FROM item_devolu e 
INNER JOIN categorias u 
ON e.id_categoria = u.id
Where e.id_orden = '$idorden' and e.modo='0' ORDER BY `nomcatego` ASC");



//$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0' ORDER BY `u.nombre` ASC");
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $tipounidad = $roworden['tipounidad'];
    $id_producto = $roworden['id_producto'];
    $motivos = $roworden['motivo'];
    $catbul += $roworden['kilos'];

    $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
    $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
    $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);

    if ($tipounidad == '0') {
        $seled0 =  $nombreunid;
        $comoviene = "";
    } else {
        $seled0 = $nombrebult;
        $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
    }
    $cant = $cant + 1;
    if ($cant % 2 == 0) {
        $colorfondo = "white";
    } else {
        $colorfondo = "#E2E2E2";
    }
    switch ($motivos) {
        case 1:
            $textoMotivo = "Vencido";
            break;
        case 2:
            $textoMotivo = "Venc. Corto";
            break;
        case 3:
            $textoMotivo = "Roto";
            break;
        case 4:
            $textoMotivo = "Mal estado";
            break;
        case 5:
            $textoMotivo = "Equivocado";
            break;
        case 6:
            $textoMotivo = "Bichos";
            break;
        case 7:
            $textoMotivo = "Rechazado";
            break;
        default:
            $textoMotivo = "";
            break;
    }


    echo '<br>
    <table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse; ">
<tr style="vertical-align: top;line-height: 1.5; background-color: ' . $colorfondo . '; padding-top: 10px;">
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . '' . $comoviene . ' </td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;width:50px;">' . $roworden['kilos'] . '</td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;width:50px;">' . $seled0 . '</td>
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;width:90;text-align:center">' . date('d/m/y', strtotime($roworden['fechaold'])) . ' </td>
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px; width:90px;text-align:center">' .  $textoMotivo . ' </td>
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

                        <table style="border: 2px solid black; padding: 2px; width:300px; text-align:center;  ">
                            <tr>
                                <td>
                                    <p style="font-size: 10px;  line-height: 1.5;">

                                        Se emite la presente Orden por devolucione de mercaderí el día <?= date('d/m/Y', strtotime($fechaord)) ?>.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="vertical-align: top;line-height: 1.5;  text-align:right;">


                    </td>
                    <td style="vertical-align: top;line-height: 1.5;text-align:right;">
                        Total Bulto/s:&nbsp;<?= $catbul ?>

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
$mpdf->SetHTMLFooter('<hr><table style="width:280mm;"><tr><td style="width:50%;"><div class="page-footer"><i>Página: {PAGENO} de {nbpg} - Orden de Devolución: Nº ' . $idorden . ' - Cliente: ' . $proveedor . '</i></div></td></tr></table>');


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "20mm",
    "margin-right" => "20mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('orden de devolucion No ' . $idorden . ' Fecha ' . $fechaord . '.pdf', 'I'); //D




?>