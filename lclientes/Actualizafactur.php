<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_cliente = $_POST['id_cliente'];
$facturar = $_POST['facturar'];


$sqlcliess = "Update clientes Set facturar='$facturar' Where id = '$id_cliente'";
mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));
