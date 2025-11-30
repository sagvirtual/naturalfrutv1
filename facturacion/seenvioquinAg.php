<?php include('../f54du60ig65.php');
$id_orden = $_POST['idorden'];
$quien = $_POST['quien'];
$monto_fac = $_POST['monto_fac'];
$monto_sin = $_POST['monto_sin'];

$monto_facd = str_replace('.', '', $monto_fac);
$monto_face = str_replace(',', '.', $monto_facd);

$monto_sind = str_replace('.', '', $monto_sin);
$monto_sindds = str_replace(',', '.', $monto_sind);


$sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id FROM facturacion Where id='$id_orden'");
if ($roworded = mysqli_fetch_array($sqlordendx)) {


    $sqlordend = "Update facturacion Set  quienfac='$quien' Where id = '$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
} else {

    $sqlprodu = "INSERT INTO `facturacion` (quienfac,id_orden,monto_fac,monto_sin) VALUES ('$quien','$id_orden','$monto_face','$monto_sindds');";
    mysqli_query($rjdhfbpqj, $sqlprodu) or die(mysqli_error($rjdhfbpqj));
}
