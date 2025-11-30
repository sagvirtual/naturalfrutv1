<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$pickidngy = $_POST['pickingy'];
$idproduc = $_POST['idproduc'];
$iditem = $_POST['iditem'];

if ($pickidngy == '') {
    $pickingy = '0';
} else {
    $pickingy = '1';
}

if (!empty($iditem && $tipo_usuario != "30")) {
    $sqlclientes = "Update item_orden Set  picking='$pickingy' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


    //echo 'spick: '.$pickingy.', idpro: '.$idproduc.', iditrem: '.$iditem.'';
}
