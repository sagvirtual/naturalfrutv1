<?php include('../f54du60ig65.php');

$idclienfr=$_POST['id_cliente'];
$fracionado=$_POST['fracionado'];

$ideclide=base64_decode($idclienfr);

//echo 'cli:'.$ideclide.' <br>fra:'.$fracionado.'';


if(!empty($ideclide)){
$sqlclientes = "Update clientes Set fraccionar='$fracionado' Where id = '$ideclide'";
mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
?>