<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$estadoh = $_POST['estadoh'];
$descuento = $_POST['descuento'];


$sqlclientes = "Update item_devolu Set destino='$estadoh',  descuento='$descuento', responsable='$id_usuarioclav' Where id = '$idorden'";
mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
mysqli_close($rjdhfbpqj);/*  */
