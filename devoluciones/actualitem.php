<?php include('../f54du60ig65.php');
include('func_descuentastock.php');
//include('func_modificotock.php');
include('func_nombreunid.php');
$iditem = $_POST['iditem'];
$cantidad = $_POST['cantidad'];
$fechaold = $_POST['fechaold'];
$unidad = $_POST['unidad'];
$destino = $_POST['destino'];
$motivo = $_POST['motivo'];
$nota = $_POST['nota'];


$sqlodnx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_devolu Where id = '$iditem'");
if ($rowordnx = mysqli_fetch_array($sqlodnx)) {

    $id_orden = $rowordnx['id_orden'];
    $id_cliente = $rowordnx['id_cliente'];
    $idproduc = $rowordnx['id_producto'];
    $kilos = $rowordnx['kilos'];

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id = '$id_orden'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_orden = $rowordenx['id'];
        $colorden = $rowordenx['col'];
        if ($colorden > '2') {
            $agregado = '1';

            if ($colorden != '8') {
                //  $fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";
            } else {
                //$fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";
            }
        } else {
            $agregado = '0';
            $fechhoras = $rowordnx['hora'];
        }
    }
}


if (!empty($iditem && $cantidad > '0')) {

    /*    if ($unidad == "0") {
        $cantidadfinal = $cantidad;
    } else {

        $cantidbiene = cantbult($rjdhfbpqj, $idproduc);

        $cantidadfinal = $cantidad * $cantidbiene;
    }
 */
    /* descuenta stock */

    // $fechavenprx = ModificoStock($rjdhfbpqj, $idproduc, $id_orden);

    // $fechavenprx = ActualizaStock($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);



    $sqlclientes = "Update item_devolu Set  kilos='$cantidad', tipounidad='$unidad', hora='$fechhoras', fechaold='$fechaold', motivo='$motivo', destino='$destino', nota='$nota', responsable='$id_usuarioclav' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


    $id_clientecod = base64_encode($id_cliente);
    $id_ordencod = base64_encode($id_orden);
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=1&orjndty=$id_ordencod'");
    echo ("</script>");
}
