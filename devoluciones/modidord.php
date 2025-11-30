<?php include('../f54du60ig65.php');
$idorden = $_POST['idorden'];
$id_cliente = $_POST['id_cliente'];
$idordendev = $_POST['idordendev'];

if (!empty($idorden)) {
    $sqlclides = "Update devoluciones Set  id_orden='$idordendev'  Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclides) or die(mysqli_error($rjdhfbpqj));

    $sqlcds = "Update item_devolu Set idordendev='$idordendev' Where id_orden = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlcds) or die(mysqli_error($rjdhfbpqj));
}
