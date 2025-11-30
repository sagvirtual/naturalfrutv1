<?php include('../f54du60ig65.php');
$id_producto = $_POST['id_producto'];
$bulto = $_POST['bulto'];



$sqlpreeprod = "Update productos Set file='$bulto' Where id = '$id_producto'";
mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));

// echo 'alarma: ' . $alarma . ' id: ' . $id_producto . '';

if (!$rjdhfbpqj) {
    die("Error de conexión: " . mysqli_connect_error());
}
