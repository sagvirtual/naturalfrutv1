<?php include('../f54du60ig65.php');

$idorcod = $_GET['jfndhom'];

$idorden = base64_decode($idorcod);


$sqlitem_ordends = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden'");
while ($rowitem_ordens = mysqli_fetch_array($sqlitem_ordends)) {
    $id_cliente = $rowitem_ordens['id_cliente'];
}

//todas las compras confirmadas
$sqlpagdeufpc = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente'  and modo='0' and conf_entrega='1'  and conf_entrega2='1' ");

while ($rowpagdeufpc = mysqli_fetch_array($sqlpagdeufpc)) {
    $comprasto += $rowpagdeufpc["total"] + 1;
}

//todas los pagos confirmadas
$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente'  and modo='1'");

while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
    $pagoTotal += $rowpagdeufp["valor"] + 1;
}
$debed = $comprasto - $pagoTotal;
$debe = number_format($debed, 0, '', '');



$sqlitem_ordend = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0' and conf_entrega='1'  and conf_entrega2='1'");
while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordend)) {
    $totalt = number_format($rowitem_orden["total"], 2, '.', '');
}
$sqlitem_ordendr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and modo='0' and conf_entrega='1'  and conf_entrega2='1'");
$canverificafin = mysqli_num_rows($sqlitem_ordendr);
while ($rowitem_ordenr = mysqli_fetch_array($sqlitem_ordendr)) {

    $cantidadestodasd += $rowitem_ordenr["kilos"];
    $totaltodasd += $rowitem_ordenr["total"];
    $totaltodasd = number_format($totaltodasd, 2, '.', '');
    $totaltodasda = number_format($totaltodasd, 2, '.', '');
}

$sqlitem_ordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and conf_entrega='1' and conf_entrega2='1' and modo='0'");
while ($rowitem_ordenx = mysqli_fetch_array($sqlitem_ordendx)) {
    $totaltx = number_format($rowitem_ordenx["total"], 2, '.', '');
    $wsp .= '*' . $rowitem_ordenx["kilos"] . '* Kg. *' . $rowitem_ordenx["nombre"] . '*%0ASubtotal = $' . number_format($totaltx, 0, '', '.') . '%0A%0A';
}

$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$idorden'");
if ($roworden = mysqli_fetch_array($sqlorden)) {
    $descuento = $roworden["descuento"];


    if ($descuento > 0) {
        $totaltodasdd = $totaltodasd - $descuento;
        $totaltodasd = number_format($totaltodasdd, 2, '.', '');
        $totaltodasdx = number_format($totaltodasdd, 0, '', '.');
        $descuenok = '%0ADescuento: $' . $descuento . '%0A*Total Final: $' . $totaltodasdx . '';
    }
}


$idordencod = base64_encode($idorden);



$totalapa = $totaltodasd + $debe;
//$totaltodasdad = number_format($totalapa, 2, '.', '');
$debefp = number_format($debe, 2, '.', '') + 200;
?>
<!-- print -->



<? 





//$totaltodasda= "$".number_format($subtotalv, 0, '', '.'); ?>


<?php


$sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idorden' and modo='3' ORDER BY `item_orden`.`id` ASC");
while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
    $iditer = $rowpagdeu["id"];
    $idcodp = base64_encode($iditer);
    $deuda = $rowpagdeu["valor"];
    $deudaTotal += $rowpagdeu["valor"];
    $deudav = number_format($deuda, 0, '', '');
    echo 'Deuda (' . $rowpagdeu["nota"] . ') $' . number_format($deudav, 0, '', '.') . '';
}


$sqlpagdeuf = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idorden' and modo='2'");

if ($rowpagdeuf = mysqli_fetch_array($sqlpagdeuf)) {
    $iditef = $rowpagdeuf["id"];
    $idcodpf = base64_encode($iditef);
    $deudaf = $rowpagdeuf["valor"];
    $tipodescuen = $rowpagdeuf["nota"];
    $modo = $rowpagdeuf["modo"];
    $pordesc = $rowpagdeuf["pordesc"];
    $deudavf = number_format($deudaf, 2, '.', '');

    if ($modo == '2') {

        if ($tipodescuen == '0') {
            $descuenes = $pordesc . "%";
        } else {
            $descuenes = "";
        }
        $totalfver = $deudavf;
        $descuentoTotal = $rowpagdeuf["valor"];
    } else {
        $descuenes = "";

        $descuentoTotal = $rowpagdeuf["valor"];
        $totalfver = $deudavf;
    }




    echo 'Descuento ' . $descuenes . ' -' . number_format($totalfver, 0, '', '.') . '';
}


$total = $subtotalv + $totaldebev + $deudaTotal;
if (!empty($descuentoTotal)) {
    $total = $total - $descuentoTotal;
}

$totalf = number_format($total, 2, '.', '');
?>

SALDO ANTERIOR $<?= number_format($totaldebev, 0, '', '.') ?>

TOTAL $<?= number_format($totalf, 0, '', '.') ?>

<?php
$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idorden' and modo='1' ORDER BY `item_orden`.`id` ASC");

while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
    $iditefp = $rowpagdeufp["id"];
    $idcodpfp = base64_encode($iditefp);
    $deudafp = $rowpagdeufp["valor"];
    $pagoTotal += $rowpagdeufp["valor"];
    $pagoTotale += $rowpagdeufp["valor"];
    $deudavfp = number_format($deudafp, 0, '', '');
    $tipopages = $rowpagdeufp['tipopag'];
    if ($tipopages == '1') {
        $tipopagver = "Efectivo";
    }
    if ($tipopages == '2') {
        $tipopagver = "Transferencia";
    }
    if ($tipopages == '3') {
        $tipopagver = "Deposito";
    }
    if ($tipopages == '4') {
        $tipopagver = "Cheque";
    }
    if ($tipopages == '5') {
        $tipopagver = "Mercadopago";
    }

    $supago .= '%0ASu pago en ' . $tipopagver . ' $' . number_format($deudavfp, 0, '', '.') . '';
}
/* $debe = $totalf - $pagoTotal;
$debefp = number_format($debe, 2, '.', ''); */


?>
<? if ($totalf != $debefp) { ?>
     DEBE $<?= number_format($debefp, 0, '', '.') ?>

<? } ?>


<?php
 

 $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_cliente'");
 if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

    $empresacliente=$rowclientesi["address"];
    $wspclien = $rowclientesi["wsp"];
 }

 $sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$idorden' and id_cliente = '$id_cliente'");
if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
    $camioneta = $rowordenx['camioneta'];
    $fecharft = $rowordenx['fecha'];
    $fechav = explode("-", $fecharft);
    $hora_actual = date("H:i");
    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0]." ".$hora_actual;
}
 
//subtotal menos o mas la deuda
$sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fecharft' and id_cliente = '$id_cliente'  ORDER BY `orden`.`fecha` DESC");
if ($rowordena = mysqli_fetch_array($sqlordena)) {
    $totaldebe = $rowordena["total"];
    $totaldebev = number_format($totaldebe, 0, '', '');
    $totaldebevr = "" . number_format($totaldebe, 0, '', '');
} else {

    $sqlclientesan = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_cliente' and sloff='0' and saldoini!='0'");
    if ($rowclientes = mysqli_fetch_array($sqlclientesan)) {
        $saldoini = $rowclientes["saldoini"];
        $totaldebevr = number_format($saldoini,  0, '', '') ;
    }else{$totaldebevr = '0.00';}
  
}
$totalsaldo=$totaldebevr+$totaltodasd;
$totalsaldor = number_format($totalsaldo,  0, '', '');


$debefinal=$totalsaldo-$pagoTotale;
$debefinal=$totalsaldo-$pagoTotale;
$debefinalr = number_format($debefinal,  0, '', '');
?>


<!-- finprint -->

<script language='JavaScript' type='text/javascript'>
    location.href = 'https://api.whatsapp.com/send?phone=549<?=$wspclien?>&text=*TICKET ELECTRONICO Nº:<?= $idorden ?>*%0A%0A*Cliente:*%0A_<?= $empresacliente ?>_%0A%0A*Fecha:*%0A_<?= $fechavr ?>_%0A%0A<?= $wsp ?>Subtotal:%0A$<?= number_format($totaltodasda, 0, '', '.') ?>%0A%0A*Saldo Anterior:*%0A_$<?= number_format($totaldebevr, 0, '', '.') ?>_%0A%0ATotal:%0A$<?= number_format($totalsaldor, 0, '', '.') ?>.00%0A<?= number_format($supago, 0, '', '.') ?>%0A%0A*DEBE:*%0A$<?= number_format($debefinalr, 0, '', '.') ?>.00%0A%0AGracias por elegir a San Cipriano.';
</script>




<script>
    // Esperar a que la impresión termine wspticket.php?jfndhom=MTMwOQ== $supago
    // Esperar 5 segundos antes de cerrar la ventana
    setTimeout(function() {
        location.href = '<?= $archipri ?>?jfndhom=<?= $idordencod ?>';
    }, 20000);
</script>