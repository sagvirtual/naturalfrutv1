<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_producto = $_POST['id_producto'];
$descproducto = $_POST['descproducto'];


$sqlcliess = "Update productos Set descuento='$descproducto' Where id = '$id_producto'";
mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));
