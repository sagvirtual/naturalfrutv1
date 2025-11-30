<?php include('../f54du60ig65.php');

$idclienfr = $_POST['id_cliente'];
$facturado = $_POST['facturado'];

$ideclide = base64_decode($idclienfr);



if (!empty($ideclide)) {
    $sqlclientes = "Update clientes Set facturado='$facturado' Where id = '$ideclide'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
