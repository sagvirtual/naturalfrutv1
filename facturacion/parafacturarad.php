<?php include('../f54du60ig65.php');
$id_factura = $_POST['id_factura'];
$id_orden = $_POST['id_orden'];
$id_cliente = $_POST['id_cliente'];
$monto_fac = $_POST['monto_fac'];
$monto_sin = $_POST['monto_sin'];
$nfactura = $_POST['nfactura'];
$nota = $_POST['nota'];

$monto_facd = str_replace('.', '', $monto_fac);
$monto_face = str_replace(',', '.', $monto_facd);


$monto_sind = str_replace('.', '', $monto_sin);
$monto_sine = str_replace(',', '.', $monto_sind);


$sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id FROM facturacion Where id='$id_factura'");
if ($roworded = mysqli_fetch_array($sqlordendx)) {


    $sqlordend = "Update facturacion Set monto_fac='$monto_face', monto_sin='$monto_sine', nfactura='$nfactura', nota='$nota' Where id='$id_factura'";
    mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
} else {

    $sqlprodu = "INSERT INTO `facturacion` (id_orden,id_cliente,monto_fac, monto_sin,nfactura,nota) VALUES ('0','$id_cliente','$monto_face', '$monto_sine', '$nfactura', '$nota');";
    mysqli_query($rjdhfbpqj, $sqlprodu) or die(mysqli_error($rjdhfbpqj));
}
