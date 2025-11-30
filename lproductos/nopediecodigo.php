<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$col = $_POST['col'];


$sqlcliess = "Update productos Set id_rubro9='$col' Where id = '$idorden'";
mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));
