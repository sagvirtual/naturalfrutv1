<?php include('../f54du60ig65.php');
include('../listadeprecio/func_fechalista.php');
$idprodu = $_POST['idprodu'];
$cantidadds = $_POST['cantidad'];
$unidsx = $_POST['unidad'];
$tipocliente = $_POST['tipocliente'];
$fechaorden = $_POST['fechaorden'];

if (!empty($fechaorden)) {
    $fechalista = $_POST['fechaorden'];
} else {

    $fechalista = fechalista($rjdhfbpqj);
}


$sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprodu' and fecha <='$fechalista' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
    $idcosto = $rowprecioprod["id"];

    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idprodu'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        $kilox = $rowpdaod['kilo'];
    }
    $costo_total = $rowprecioprod["costo_total"];


    if ($unidsx == "0") {
        $preciofin = $rowprecioprod["costo_total"];
    } else {
        $preciofin = $rowprecioprod["costo_total"] * $kilox;
    }



    echo '' . $preciofin . '';
} else {
    echo '0';
}

mysqli_close($rjdhfbpqj);
