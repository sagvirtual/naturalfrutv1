<?php include('../f54du60ig65.php');
$id_fac = $_POST['id_fac'];

if (!empty($id_fac)) {
    $sql = "delete from facturacion Where id='$id_fac'";
    mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
}
