<? include ('../f54du60ig65.php');
include('../nota_de_pedido/func_nombreunid.php');
require ('../salidas/mpdf.php');

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
$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id='$idorden'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_clienteint = $rowordenx['id_cliente'];
    $fechaord = $rowordenx['fecha'];
    $horaord = $rowordenx['hora'];
    $ordedecompra = $rowordenx['ordedecompra'];

    if($rowordenx['ordedecompra'] > 0){

        $ordedecompra = 'Orden de Compra Ref. Nº: '.$rowordenx['ordedecompra'];

    }else{$ordedecompra = "";}

    $perporsen=$rowordenx['perporsen'];
    $totalper=$rowordenx['totalper'];
    $ivaporsen=$rowordenx['ivaporsen'];

    $adicional=$rowordenx['adicional'];

    if(empty($adicional)){$adicional="Envio";}
    $adicionalvalor=$rowordenx['adicionalvalor'];

    $subtotal = $rowordenx['subtotal'];
    $descuento = $rowordenx['descuento'];
    $totalivas = $rowordenx['totalivas'];
    $total = $rowordenx['total'];
   // $saldo = $rowordenx['saldo'];
    $pago = $rowordenx['pago'];
}

$calculodeuda= 0;
//$calculodeuda= $rowordenx['anterior'];


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
        $textre = "";
    }
}


$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM zona  Where id='$zonaid'");
while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
    $zonanom = $rowrubros["nombre"];
}



$sqlwden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_orden = '$idorden' and modo='0'");
while ($rodrden = mysqli_fetch_array($sqlwden)) {
    $deddpre+=$rodrden['descuenun'];


}



$sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_cliente = '$id_clienteint'  and modo='1' and id_orden='$idorden'");
$canv = mysqli_num_rows($sqlpeufpd);
while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

    $pagoTotal= $rowpagdeufp["valor"];


}
$saldo =  ($total + $calculodeuda + $adicionalvalor)- $pagoTotal ;



?>



<p >Fecha de Emisión: <?=date('d/m/Y', strtotime($fechahoy))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Hora: <?=$horasin?></p>

<div style="width: 100%; text-align: center;background-color: grey; color:white;"><!--  <img src="/assets/images/logopc.png" style="width:38mm;"> --><h2>NOTA DE CREDITO</h2>

        </div>
<hr>

            <table style="width:100%; height: 17mm; ">
                <tr>
                                  <td
                        style="vertical-align: top; font-size: 13px; font-weight: bold;line-height: 1.5; height: 17mm;">
                        <p style="font-size: 14px; font-weight: bold;">
                        
                            Num.: <?= str_pad($idorden, 8, '0', STR_PAD_LEFT) ?><br><br>
                            Cliente: <?= $zonanom ?> - <?= $nom_empr ?> <?= $nom_contac ?><br>
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
        <td style="width:50;text-align:center;padding-left:5px;"> <strong>Unid.</strong></td>
        <td style="width:70px;text-align:right;padding-left:5px;"><strong>Importe</strong></td>
       <? if($deddpre > 0){?>
        <td style="width:33px;text-align:center;padding-left:5px;"><strong>Desc.</strong></td>
        <td style="width:70px;text-align:right;padding-left:5px;"><strong>Imp. Desc.</strong></td>
        <? }?>
        <td style="width:70px;text-align:right;padding-left:5px;padding-right: 5px;"><strong>Total</strong></td>
 
    </tr>

</table>
<?


$sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_categoria, e.modo, e.precio,  e.descuenun,  e.id_orden,  e.agregado,  e.hora,  e.nombre,  e.kilos,  e.total,  e.tipounidad, u.id, u.nombre as nomcatego
FROM item_credito e 
INNER JOIN categorias u 
ON e.id_categoria = u.id
Where e.id_orden = '$idorden' and e.modo='0' ORDER BY `nomcatego` ASC"); 



//$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0' ORDER BY `u.nombre` ASC");
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $tipounidad = $roworden['tipounidad'];
    $id_producto = $roworden['id_producto'];

    $nombreunid=nombrunid($rjdhfbpqj,$id_producto);
    $nombrebult=nombrbult($rjdhfbpqj,$id_producto);
    $cantidadbiene=cantbult($rjdhfbpqj,$id_producto);
    
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
    $preciounit=$roworden['precio'];
    $descunpre=$roworden['descuenun'];
    if($descunpre!='0'){
        $monto_descuento = ($preciounit * $descunpre) / 100;
        $preciocdes = floor($preciounit - $monto_descuento);
        
    
    
    }else{$preciocdes ='0';}
    $agregado=$roworden['agregado'];


    echo '<br><table style="vertical-align: top; width:100%; font-size: 12px; border-collapse: collapse; ">
<tr
style="vertical-align: top;line-height: 1.5; background-color: ' . $colorfondo . '; padding-top: 10px;">
<td style="text-align:left; padding-top: 5px; padding-bottom: 5px;">' . $roworden['nombre'] . ''.$comoviene.' </td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $roworden['kilos'] . '</td>
<td style="width:50px;text-align:center;padding-top: 5px; padding-bottom: 5px;">' . $seled0 . '</td>
<td style="width:70px;text-align:right;padding-right: 5px; padding-top: 5px; padding-bottom: 5px;">$' . number_format($roworden['precio'], 0, ',', '.') . '</td>';
if($deddpre > 0){
echo'<td style="width:33px;text-align:center;padding-top: 5px; padding-bottom: 5px;">%' . $roworden['descuenun'] . '</td>
<td style="width:70px;text-align:right;padding-top: 5px; padding-bottom: 5px;">$' . number_format($preciocdes, 0, ',', '.') . '</td>';
}
echo'<td style="width:70px; text-align:right;padding-top: 5px; padding-bottom: 5px;padding-right: 5px;">$' . number_format($roworden['total'], 0, ',', '.') . '</td>
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

                        Se emite la presente nota de crédito por devoluciones de mercadería, correcciones de precios y/o ajustes en las cantidades correspondientes a la Orden Nº <?= str_pad($idorden, 8, '0', STR_PAD_LEFT) ?>.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
        <td style="vertical-align: top;line-height: 1.5;  text-align:right;">
            Total:&nbsp;<br>
            <?php
             
             if($descuento>0){
              
             ?>
            Descuento:&nbsp;<br>
            <?php
             }
             if($perporsen>0){
              
             ?>
            Persep <?=$perporsen?>%:&nbsp; <br>
            <?php
             }
             if($totalivas>0){
              
             ?>
            IVA <?=$ivaporsen?>%:&nbsp; <br>
            <?php
             }
             if($total!= $subtotal){
              
             ?>
            Total:&nbsp;<br>
            <?php
             } ?> 
             <? if($adicionalvalor!="0"){
                echo ''.$adicional.':&nbsp; <br>';
             }
             ?>
             
             <? if($calculodeuda!==0){ ?>
            Anterior:&nbsp;<br>
            <?php
             }
            if($pagoTotal>0){
             
            ?>
            Pago:&nbsp;<br>
            <?php
             } if($saldo!= $subtotal && $saldo == '0' || $pagoTotal>0 || $calculodeuda>0){
             ?>
            Saldo:&nbsp;<br>
            <?php
             }
             ?>
        </td>
        <td style="vertical-align: top;line-height: 1.5;text-align:right;">
            $<?= number_format($subtotal, 2, ',', '.') ?><br>
            <?php
             
             if($descuento>0){
              
             ?>
            $-<?= number_format($descuento, 2, ',', '.') ?><br>
            <?php
             }
             if($totalper>0){
             ?>
            $<?= number_format($totalper, 2, ',', '.') ?><br>
            <?php
             }
             if($totalivas>0){
             ?>
            $<?= number_format($totalivas, 2, ',', '.') ?><br>
            <?php
             }
             if($total!= $subtotal){
              
             ?>
            $<?= number_format($total, 2, ',', '.') ?><br>


            <? if($adicionalvalor!="0"){
                            echo ''.number_format($adicionalvalor, 2, ',', '.').'<br>';
                        }
             ?>


            <?php
             }
             if($calculodeuda>0){ 
               

             ?>
            $<?= number_format($calculodeuda, 2, ',', '.') ?><br>
            <?php
              }
             if($pagoTotal>0){
              
             ?>
            $<?= number_format($pagoTotal, 2, ',', '.') ?><br>
            <?php
             } if($saldo!= $subtotal && $saldo == '0' || $pagoTotal>0 || $calculodeuda>0){
             ?>
            $<?= number_format($saldo, 2, ',', '.') ?><br>
            <?php
              }
              
             
             
             ?>
          
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
$mpdf->SetHTMLFooter('<hr><table style="width:280mm;"><tr><td style="width:50%;"><div class="page-footer"><i>Página: {PAGENO} de {nbpg} - Nota de Credito: Nº '.$idorden.' - Cliente: '.$zonanom.' - '.$nom_empr.'</i></div></td></tr></table>');


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "20mm",
    "margin-right" => "20mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Nota de credito No ' . $idorden . ' Fecha ' . $fechaord . '.pdf', 'D'); //D




?>