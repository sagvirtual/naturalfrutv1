<?php include('../f54du60ig65.php');
include('../nota_de_pedido/func_nombreunid.php');
$iditem = $_POST['iditem'];
$cantidadit = $_POST['cantidad'];
$descuenun = $_POST['descuenun'];
$total = $_POST['total'];
$unidad = $_POST['unidad'];
$precio = $_POST['precio'];
$sqlodnx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_presupues Where id = '$iditem'");
if ($rowordnx = mysqli_fetch_array($sqlodnx)) {

    $id_orden = $rowordnx['id_orden'];
    $id_cliente = $rowordnx['id_cliente'];
    $idproduc = $rowordnx['id_producto'];
    $cantidbiene = $rowordnx['presentacion'];
    $kilos = $rowordnx['kilos'];
    $producto = nombrbultnota($rjdhfbpqj, $idproduc, $unidad);

    if ($cantidadit > $kilos) {
        $cantidad = $_POST['cantidad'] - $kilos;
    } else {
        $cantidad = $kilos - $_POST['cantidad'];
    }
}

$id_clientecod = base64_encode($id_cliente);
$id_ordencod = base64_encode($id_orden);



if (!empty($iditem)) {

    if ($unidad == "0") {
        $cantidadfinal = $cantidad;
        $cantidadithis = $cantidadit;
    } else {

        $cantidadfinal = $cantidad * $cantidbiene;
        $cantidadithis = $cantidadit * $cantidbiene;
    }





    $sqlclientes = "Update item_presupues Set  kilos='$cantidadit', descuenun='$descuenun', tipounidad='$unidad', precio='$precio', nombre='$producto', total='$total', agregado='$agregado', hora='$fechhoras' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=1&orjndty=$id_ordencod'");
echo ("</script>");

/* } */
