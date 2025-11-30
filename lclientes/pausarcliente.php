<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$id_cliente = $_POST['id_cliente'];
$cobrable = $_POST['cobrable'];


$sqlcliess = "Update clientes Set cobrable='$cobrable' Where id = '$id_cliente'";
mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));

$origen = "Pausado cliente";

FuncActividad($rjdhfbpqj, $cobrable, $id_cliente, $id_producto, $origen, $id_usuarioclav);
