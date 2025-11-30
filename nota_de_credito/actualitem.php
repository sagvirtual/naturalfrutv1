<?php include('../f54du60ig65.php');
include('func_descuentastockA.php');
include('func_descuentastock.php');
include('func_modificotock.php');
include('../nota_de_pedido/func_nombreunid.php');
$iditem = $_POST['iditem'];
$cantidadit = $_POST['cantidad'];
$descuenun = $_POST['descuenun'];
$total = $_POST['total'];
$unidad = $_POST['unidad'];
$precio = $_POST['precio'];
$motivo = $_POST['motivo'];
$destino = $_POST['destino'];
$fechaold = $_POST['fechaold'];

$sqlodnx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id = '$iditem'");
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

    /* $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id = '$id_orden'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        //$id_orden = $rowordenx['id'];
        $colorden = $rowordenx['col'];
        if ($colorden > '2') {
            $agregado = '1';
            
            if($colorden != '8'){
            $fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";
        }else{$fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";}
        } else {
            $agregado = '0';
            $fechhoras = $rowordnx['hora'];
        }
    }
 */
}

$id_clientecod = base64_encode($id_cliente);
$id_ordencod = base64_encode($id_orden);


/* if($cantidad==$kilos){

    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=5&orjndty=$id_ordencod'");
    echo ("</script>");   
exit;

}else{ */


//Eliminar el registro del historial
$sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$id_orden'";
mysqli_query($rjdhfbpqj, $sqlEliminarHistorial);

//$cantidad=$kilos-$cantidad;

if (!empty($iditem && $cantidad > '0')) {

    if ($unidad == "0") {
        $cantidadfinal = $cantidad;
        $cantidadithis = $cantidadit;
    } else {

        $cantidadfinal = $cantidad * $cantidbiene;
        $cantidadithis = $cantidadit * $cantidbiene;
    }

    /* descuenta stock */
    if ($destino != '0' && $destino != '4' && $destino != '5') {
        ModificoStock($rjdhfbpqj, $idproduc, $id_orden);

        if ($cantidadit > $kilos) {
            ActualizaStock($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);
        } else {
            ActualizaStockA($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);
        }
    }



    $sqlclientes = "Update item_credito Set  kilos='$cantidadit', descuenun='$descuenun', tipounidad='$unidad', precio='$precio', nombre='$producto', total='$total', agregado='$agregado', hora='$fechhoras', motivo='$motivo', destino='$destino', fechaold='$fechaold' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


    $sqlclientes = "Update histostock Set  CantStock='$cantidadithis' Where id_producto = '$idproduc' AND id_orden = '$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=1&orjndty=$id_ordencod'");
echo ("</script>");

/* } */
