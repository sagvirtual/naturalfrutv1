<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_producto = $_POST['id_producto'];
$iducto=base64_decode($id_producto);
$esmix = $_POST['esmix'];



$sqlprecioprod = "Update productos Set mix='$esmix' Where id = '$iducto'";
mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));

