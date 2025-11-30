<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');

$listo = $_POST['listo'];
$iditemdfd = $_POST['iditem'];



$sqlhoja = mysqli_query($rjdhfbpqj, "SELECT id,numero FROM itemenvas WHERE id ='$iditemdfd'");
if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
    $id_orden = $rowhoja['numero'];

    $sqlhodja = mysqli_query(
        $rjdhfbpqj,
        "SELECT h.position
         FROM orden o
         INNER JOIN hoja h ON h.id = o.id_hoja
         WHERE o.id = '$id_orden'
           AND h.camioneta != '0'
         LIMIT 1"
    );

    if ($rowhdoja = mysqli_fetch_array($sqlhodja)) {
        $salida = $rowhdoja['position'];
    }
}





$sqlordend = "Update itemenvas Set listo='$listo', id_usuarioclav='$id_usuarioclav', hora='$hora', salida='$salida' Where id = '$iditemdfd'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
