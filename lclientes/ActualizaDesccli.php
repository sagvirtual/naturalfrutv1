<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$id_cliente = $_POST['id_cliente'];
$descuento = $_POST['descuento'];
$descporcen = $_POST['descporcen'];


//$sqlcliess = "Update clientes Set desceunto='$descuento',facturar='$facturar' Where id = '$id_cliente'";
$sqlcliess = "Update clientes Set desceunto='$descuento',descporcen='$descporcen' Where id = '$id_cliente'";
mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));


$origen = "Cambio descuento cliente";

FuncActividad($rjdhfbpqj, 0, $id_cliente, 0, $origen, $id_usuarioclav);
