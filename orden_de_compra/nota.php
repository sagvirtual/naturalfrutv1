<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$nota = $_POST['nota'];


$sqlclientes = "Update ordencompra Set nota='$nota' Where id = '$idorden'";
mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
mysqli_close($rjdhfbpqj);

echo 'Erros32';
