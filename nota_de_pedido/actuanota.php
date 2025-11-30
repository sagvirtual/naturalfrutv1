<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$observacion = $_POST['observacion']; /* iva esultado */

if (!empty($idorden)) {
    $sqlclientes = "Update orden Set observacion='$observacion' Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
