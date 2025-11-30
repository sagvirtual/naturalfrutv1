<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('func_descuentastock.php');
include('func_modificotock.php');
include('func_nombreunid.php');
include('../funciones/func_actividad.php');
include('funcVerificaIns.php'); //verifico que sea correcto lo que inserta
$iditem = $_POST['iditem'];
$cantidad = $_POST['cantidad'];
$descuenun = $_POST['descuenun'];
$total = $_POST['total'];
$unidad = $_POST['unidad'];
$precio = $_POST['precio'];



if ($descuenun == '0' && $total == '0') {
} else {

    $sqlodnx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id = '$iditem'");
    if ($rowordnx = mysqli_fetch_array($sqlodnx)) {

        $id_orden = $rowordnx['id_orden'];
        $id_cliente = $rowordnx['id_cliente'];
        $idproduc = $rowordnx['id_producto'];
        $kilos = $rowordnx['kilos'];
        $fechaorden = $rowordnx['fecha'];
        $presentacion = $rowordnx['presentacion'];
        $producto = nombrbultnota($rjdhfbpqj, $idproduc, $unidad);
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden'");
        if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

            $id_orden = $rowordenx['id'];
            $colorden = $rowordenx['col'];
            if ($colorden > '2') {
                $agregado = '1';

                if ($colorden != '8') {
                    $fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";
                } else {
                    $fechhoras = "Modificado en CONCRETADO día " . date("d") . " " . date("H:i") . "hs.";
                }
                $origen = "Modificado Producto";
                FuncActividad($rjdhfbpqj, $id_orden, $id_cliente, $idproduc, $origen, $id_usuarioclav);
            } else {
                $agregado = '0';
                $fechhoras = $rowordnx['hora'];
            }
        }
    }

    //extrao verificacion
    $resultaver = func_VeriInsert($rjdhfbpqj, $fechaorden, $idproduc, $cantidad, $unidad, $descuenun, $presentacion, $precio, $total, $iditem);
    if ($resultaver == '1') { //si escorrecto inserta  if('1'=='1')


        if (!empty($iditem && $cantidad > '0')) {



            if ($unidad == "0") {
                $cantidadfinal = $cantidad;
            } else {

                if ($presentacion != 0) {
                    $cantidbiene = $presentacion;
                } else {
                    $cantidbiene = cantbult($rjdhfbpqj, $idproduc);
                }
                $cantidadfinal = $cantidad * $cantidbiene;
            }

            /* descuenta stock */

            ModificoStock($rjdhfbpqj, $idproduc, $id_orden);

            ActualizaStock($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);

            if ($total <= 0 && $descuenun <= 0) {
                $nocarga = '1';
            } else {
                $nocarga = '3';
            }


            if ($nocarga == '3') {
                $sqlclientes = "Update item_orden Set  kilos='$cantidad', descuenun='$descuenun', nombre='$producto', tipounidad='$unidad', precio='$precio', total='$total', agregado='$agregado', hora='$fechhoras' Where id = '$iditem' and id_orden = '$id_orden'";
                mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
            }

            /* $sqloend2 = "Update orden Set picking='0',col='3'  Where id='$id_orden' and col < '8'";
    mysqli_query($rjdhfbpqj, $sqloend2) or die(mysqli_error($rjdhfbpqj)); */


            $id_clientecod = base64_encode($id_cliente);
            $id_ordencod = base64_encode($id_orden);
        }
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=1&orjndty=$id_ordencod&estatus=$resultaver'");
        echo ("</script>");
    } else {
        $id_clientecod = base64_encode($id_cliente);
        $id_ordencod = base64_encode($id_orden);

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=&orjndty=$id_ordencod&estatus=$resultaver'");
        echo ("</script>");
    }
}
