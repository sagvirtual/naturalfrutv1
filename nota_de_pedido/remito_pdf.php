<? include ('../f54du60ig65.php');
include('funcion_saldoanterior.php');
include('func_nombreunid.php');
require ('../salidas/mpdf.php');
include('func_frio.php');
include('../funciones/funcvencimiProd.php');
include('verfaltantepdf.php');
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
$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$idorden'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_clienteint = $rowordenx['id_cliente'];
    $fechaord = $rowordenx['fecha'];
    $horaord = $rowordenx['hora'];


    $subtotal = $rowordenx['subtotal'];
    $descuento = $rowordenx['descuento'];
    $totalivas = $rowordenx['totalivas'];
    $total = $rowordenx['total'];
}




$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $nom_contac = $rowclientes["nom_contac"];
    $nom_empr = $rowclientes["nom_empr"];
    $horarios = $rowclientes["horarios"];
    $wsp = $rowclientes["wsp"];

    $direccion = $rowclientes['address'];
    $localidad = $rowclientes['localidad'];
    $retiradcv = $rowclientes['retira'];
    $zonaid = $rowclientes['zona'];
    if ($retiradcv == '1') {
        $textre = "Retira el Cliente";
    }
}


$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM zona  Where id='$zonaid'");
while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
    $zonanom = $rowrubros["nombre"];
}
?>

<table style="width:100%; height: 17mm; ">
    <tr>
        <td style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5; height: 17mm;">
            <p style=" font-size: 20px;">REMITO</p>


        </td>
        <td style="vertical-align: top;line-height: 1.5; width:50mm;">
            <p style="font-size: 14px;font-size: 14px; font-weight: bold;">No valido como<br>
                FACTURA</p>

        </td>
        <td style="width:10mm;"></td>
        <td style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5; height: 17mm;">
            <p style=" font-size: 20px;">REMITO<br>CLIENTE</p>


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
                Original<br>
                Num. Venta: <?= $idorden ?><br><br>
                Cliente: <?= $zonanom ?> - <?= $nom_empr ?> <?= $nom_contac ?><br>

                <?= $textre ?>
                <? if ($retiradcv == '0') { ?>
                    Dirección: <?= $direccion ?><br>
                    Localidad: <?= $localidad ?><br>
                <? } ?>
            </p>

        </td>
        <td style="vertical-align: top;line-height: 1.5;  width:50mm;">

            <p style="font-size: 14px;font-size: 12px; font-weight: bold;">
                Fecha: <?= date('d/m/Y', strtotime($fechaord)) ?> <?= $horaord ?><br><br>
                Días: a convenir<br>
                Horarios: <?= $horarios ?><br>
                Teléfono: <?= $wsp ?><br>
            </p>
        </td>
        <td style="width:10mm;"></td>
        <td style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5;">

            <p style="font-size: 12px; font-weight: bold;">
                Duplicado<br>
                Num. Venta: <?= $idorden ?><br><br>
                Cliente: <?= $zonanom ?> - <?= $nom_empr ?> <?= $nom_contac ?><br>

                <?= $textre ?>
                <? if ($retiradcv == '0') { ?>
                    Dirección: <?= $direccion ?><br>
                    Localidad: <?= $localidad ?><br>
                <? } ?>
            </p>

        </td>
        <td style="vertical-align: top;line-height: 1.5;  width:50mm;">

            <p style="font-size: 14px;font-size: 12px; font-weight: bold;">
                Fecha: <?= date('d/m/Y', strtotime($fechaord)) ?> <?= $horaord ?><br><br>
                Días: a convenir<br>
                Horarios: <?= $horarios ?><br>
                Teléfono: <?= $wsp ?><br>
            </p>
        </td>
    </tr>
</table>


<hr>

<table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse;">
    <tr style="vertical-align: middle;line-height: 1.5;height: 10mm;font-weight: bold;">
        <td style="text-align:center; padding-right:5px;width:41px;"><strong>Cod.</strong> </td>
        <td><strong>Producto</strong></td>
        <td style="width:50px; text-align:center;padding-left:5px;"><strong>Cant.</strong></td>
        <td style="width:33px;text-align:center;padding-left:5px;"> <strong>Unid.</strong></td>
        <td style="width:10mm;"></td>
        <td style="text-align:center; padding-right:5px;width:41px;"><strong>Cod.</strong> </td>
        <td><strong>Producto</strong></td>
        <td style="width:50px; text-align:center;padding-left:5px;"><strong>Cant.</strong></td>
        <td style="width:33px;text-align:center;padding-left:5px;"> <strong>Unid.</strong></td>
    </tr>

</table>
<?
$sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo,e.picking, e.precio,  e.descuenun,  e.id_orden,  e.agregado,  e.hora,  e.nombre,  e.kilos,  e.total,  e.tipounidad, u.id, u.nombre as nomcatego
FROM item_orden e 
INNER JOIN categorias u 
ON e.id_categoria = u.id
Where e.id_orden = '$idorden' and e.modo='0' ORDER BY  nomcatego,e.nombre  ASC"); 
//$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0'ORDER BY `id` ASC");
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $tipounidad = $roworden['tipounidad'];
    $id_producto = $roworden['id_producto'];
    $pickingds=$roworden['picking'];
    $vecimienver=funcvencimiProd($rjdhfbpqj,$id_producto,$idorden);
    $nombreunid=nombrunid($rjdhfbpqj,$id_producto);
    $nombrebult=nombrbult($rjdhfbpqj,$id_producto);
    $cantidadbiene=cantbult($rjdhfbpqj,$id_producto);
    $codigo_pro=codigopro($rjdhfbpqj,$id_producto);
    $esfrio=frio($rjdhfbpqj,$id_producto);
    if($pickingds=='1'){ $verprdirf="OK";}elseif($pickingds=='3'){
        $verprdirf="??";}else{$verprdirf=$codigo_pro;}
    if ($tipounidad == '0') {
        $seled0 =  $nombreunid;
        $comoviene="";
    } else {
        $seled0 = $nombrebult;
        $comoviene="- ".$nombrebult."&nbsp;x&nbsp;".$cantidadbiene."&nbsp;".$nombreunid;
                        
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
    $agregado=$roworden['agregado'];
    if($agregado=='1'){$agreccs='<br><i style="font-size: 8pt;">***'.$agregado=$roworden['hora'].'</i>';
        $agreccsb='<i style="font-size: 8pt;color:' . $colorfondo . ';">***'.$agregado=$roworden['hora'].'</i>';}else{$agreccs='';$agreccsb='';}
    echo '<table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse;">
<tr
style="vertical-align: top;line-height: 1.5; background-color: ' . $colorfondo . '; padding-top: 10px;">
<td style="width:41px; padding-top: 5px; padding-bottom: 5px;padding-left:5px;padding-right:10px">' . $verprdirf . '</td>';
 if($esfrio=='1'){

    echo '<br><br>
    
        <div class="rectangle">
           &nbsp;FRIO&nbsp;
        </div>
    ';
    
        } 



echo' 
<td style="width:400px; text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . ''.$comoviene.' - '.$vecimienver.' '.$agreccs.'</td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $roworden['kilos'] . '</td>
<td style="width:33px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $seled0 . '</td>
  <td style="width:10mm; background-color: white;"></td>
  <td style="width:41px; padding-top: 5px; padding-bottom: 5px;padding-left:5px;padding-right:10px">' . $codigo_pro . '</td>
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . ''.$comoviene.' '.$agreccsbx.'</div></td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $roworden['kilos'] . '</td>
<td style="width:33px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $seled0 . '</td>
</tr>
</table><br>
        

';

}

?>




<!-- pie -->
<hr>

<table style="width:100%; height: 17mm;  font-size: 14px;">
    <tr>
        <td style="width:185mm;">
            <table style="width:100%;">
                <tr>
                    <td style="width:250px">

                        <table style="border: 0px solid black; padding: 2px; width:300px; text-align:center;  ">
                            <tr>
                            <td style="width:250px"><br><br><br><br><br><hr>
                                    <p style="font-size: 10px;  line-height: 1.5; width:50mm">

                                        Preparado por:<br>
                                        <br>
                                        <br>
                                        <br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="width:250px">

                        <table style="border: 0px solid black; padding: 2px; width:300px; text-align:center;  ">
                            <tr>
                            <td style="width:250px"><br><br><br><br><br><hr>
                                    <p style="font-size: 10px;  line-height: 1.5; width:50mm">

                                        Controlado por:<br>
                                        <br>
                                        <br>
                                        <br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </td>
        <td style="width:10mm;"></td>
        <td style="width:180mm;">
            <table style="width:100%;">
                <tr>
                    <td style="width:250px">

                        <table style="border: 0px solid black; padding: 2px; width:300px; text-align:center;  ">
                            <tr>
                                <td style="width:250px">
                                    <p style="font-size: 10px;  line-height: 1.5; width:50mm">

                                        <br>
                                        <br>
                                        <br>
                                       <br>
                                    </p>
                                </td>
                            </tr>
                        </table> 
                    </td>

                    <td style="width:250px">

                        <table style="border: 0px solid black; padding: 2px; width:300px; text-align:center;  ">
                            <tr>
                                <td style="width:250px"><br><br><br><br><br><hr>
                                    <p style="font-size: 10px;  line-height: 1.5; width:50mm">

                                        Recibi conforme:<br>
                                        <br>
                                        <br>
                                        <br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                       
                    </td>
                <tr>
            </table>
            <? verfaltapdf($rjdhfbpqj,$idorden); ?>
        </td>
    </tr>
</table>
<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();
$mpdf = new mPDF('c', 'A4-L');
$mpdf->writeHTML($css, 1);
$mpdf->SetHTMLFooter('<hr><table style="width:280mm;"><tr><td style="width:50%;"><div class="page-footer"><i>Página: {PAGENO} de {nbpg} - Pedido: Nº '.$idorden.' - Cliente: '.$zonanom.' - '.$nom_empr.'</i></div></td><td style="width:10mm;"></td><td style="width:50%;"><div class="page-footer"><i>Página: {PAGENO} de {nbpg} - Pedido: Nº '.$idorden.' - Cliente: '.$zonanom.' - '.$nom_empr.'</i></div></td></tr></table>');

//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Pedido No ' . $idorden . ' Fecha ' . $fechaord . '.pdf', 'D'); //D




?>