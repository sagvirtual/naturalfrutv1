<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');

$listo = $_POST['listo'];
$iditemdfd = $_POST['iditem'];






$sqlordend = "Update itemenvasa Set listo='$listo', id_usuarioclav='$id_usuarioclav', hora='$hora' Where id = '$iditemdfd'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
