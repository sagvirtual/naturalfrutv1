<?php include('../f54du60ig65.php');
$nfechan = $_POST['nfechan'];
$id_orden = $_POST['numeroorn'];
$id_cliente = $_POST['id_clienten'];
$monto_fac = $_POST['monto_facn'];
$monto_sin = $_POST['monto_sinn'];
$nfactura = $_POST['nfacturan'];
$nota = $_POST['notan'];

$monto_facd = str_replace('.', '', $monto_fac);
$monto_face = str_replace(',', '.', $monto_facd);


$monto_sind = str_replace('.', '', $monto_sin);
$monto_sine = str_replace(',', '.', $monto_sind);


if (!empty($id_cliente)) {
    $sqlprodu = "INSERT INTO `facturacion` (fecha,id_orden,id_cliente,monto_fac, monto_sin,nfactura,nota) VALUES ('$nfechan','$id_orden','$id_cliente','$monto_face', '$monto_sine', '$nfactura', '$nota');";
    mysqli_query($rjdhfbpqj, $sqlprodu) or die(mysqli_error($rjdhfbpqj));
}
