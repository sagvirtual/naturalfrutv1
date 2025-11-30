<?php include('../f54du60ig65.php');

  $id_orden = $_POST["id_orden"];
  $pedir = $_POST["pedir"];

  $sqlorden = "Update orden Set pedir='$pedir' Where id = ' $id_orden'";
  mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));

 
?>