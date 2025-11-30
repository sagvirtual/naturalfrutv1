<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


$id_orden = $_POST["id_orden"];

$nota = $_POST["nota"];


$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM notahoja where id_orden = '$id_orden'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {


  $sqlorden = "Update notahoja Set nota='$nota', responsable='$id_usuarioclav' Where id_orden = '$id_orden'";
  mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));
} else {
  //inserta
  $sqlcamionetas = "INSERT INTO `notahoja` (id_orden, nota,responsable) VALUES ('$id_orden', '$nota','$id_usuarioclav');";
  mysqli_query($rjdhfbpqj, $sqlcamionetas) or die(mysqli_error($rjdhfbpqj));
}
mysqli_close($rjdhfbpqj);
