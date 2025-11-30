<?php include('../f54du60ig65.php');
include('func_descuentastock.php');
include('../control_stock/funcionStockS.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../lusuarios/login.php');
$id_cliente = $_POST['id_cliente'];
$fechaorden = $_POST['fechaordn'];
$fechaold = $_POST['fechaold'];
$horaord = $_POST['horaord'];
$id_ordenedit = $_POST['id_ordenedit'];
$idordendev = $_POST['idordendev'];


$producto = $_POST['producto'];
$idproduc = $_POST['idproduc'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$ordedecompra = $_POST['ordedecompra'];

$id_categoria = $_POST['id_categoria'];
$id_marca = $_POST['id_marca'];
$motivo = $_POST['motivo'];


/* borrar */

/*     <option value="0" ' . $selec0 . '>Esperando...</option>
                                                <option value="1" ' . $selec1 . '>Vuelve Stock</option>
                                                <option value="2" ' . $selec2 . '>Limpieza</option>
                                                <option value="3" ' . $selec3 . '>Reembasado</option>
                                                <option value="4" ' . $selec4 . '>Proveedor</option>
                                                <option value="5" ' . $selec5 . '>Descarte</option>
                                                <option value="6" ' . $selec6 . '>Oferta</option> */
/* borrar */

switch ($motivo) {
    case 0:
        // $detmotivo = "Sin motivo";
        $destino = 0;
        break;
    case 1:
        //$detmotivo = '<b style="color:red">Vencido</b>';
        $destino = 0;
        break;
    case 2:
        // $detmotivo = '<b style="color:green">Venc. Corto</b>';
        $destino = 0;
        break;
    case 3:
        // $detmotivo = '<b style="color:orange">Roto</b>';
        $destino = 0;
        break;
    case 4:
        //$detmotivo = '<b style="color:red">Mal estado</b>';
        $destino = 0;
        break;
    case 5:
        // $detmotivo = '<b style="color:green">Equivocado</b>';
        $destino = 1;
        break;
    case 6:
        //$detmotivo = '<b style="color:blue">Bichos</b>';
        $destino = 2;
        break;
    case 7:
        //$detmotivo = '<b style="color:green">Rechazado</b>';
        $destino = 1;
        break;
    default:
        $destino = 0;
        break;
}



$nota = $_POST['nota'];
$presentacion = $_POST['presentacion'];
$id_proveedor = $_POST['id_proveedor'];




if ($id_ordenedit == 'dsds' || $id_ordenedit == '') {
    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id_cliente = '$id_cliente' and finalizada='0' and fin='1'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $idzona = $rowordenx['zona'];
        $id_orden = $rowordenx['id'];
        $colorden = $rowordenx['col'];
        if ($colorden > '2') {
            $agregado = '1';
        } else {
            $agregado = '0';
        }

        /* udate dzona */
    } else {


        $timean = substr(microtime(), 2, 3) . date("His");
        $fechaan = date("dmy");
        $anclaje = $timean . $fechaan . $id_usuarioclav . $id_usuarioclav;


        $horas = date("H:i");
        if ($colorden != '8') {
            $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
        } else {
            $fechhoras = "Agregado en CONCRETADO día " . date("d") . " a las " . date("H:i") . "hs.";
        }
        //$fechhoras = "Producto Agregado día ".date("d")." ".date("H:i")."hs.";


        $sqlordencty = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where finalizada = '0' and id_cliente = '0' and fecha = '0000-00-00' and anclaje = '' and fecha_accion = '0000-00-00 00:00:00' and fin='0'");
        if ($rowordedn = mysqli_fetch_array($sqlordencty)) {

            $idorden = $rowordedn['id'];

            $fechaaccion = $fechaorden . " " . $horas . ":00";

            $sqlclientes = "Update devoluciones Set  id_cliente='$id_cliente', fecha='$fechaorden', hora='$horaord', anclaje='$anclaje', fecha_accion='$fechaaccion', id_usuarioclav='$id_usuarioclav', id_orden='$idordendev' Where id = '$idorden'";
            mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

            $id_orden = $idorden;
            //  echo 'actualizo: ' . $idorden . '';
        } else {
            $sqlorden = "INSERT INTO `devoluciones` (id_cliente, fecha, hora, anclaje, fin, id_usuarioclav,id_orden) VALUES ('$id_cliente', '$fechaorden', '$horaord', '$anclaje', '1', '$id_usuarioclav','$idordendev');";
            mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


            $sqlordenty = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where anclaje = '$anclaje' and id_cliente = '$id_cliente' and fin='1'");
            if ($roworden = mysqli_fetch_array($sqlordenty)) {


                $id_orden = $roworden['id'];
            }
            // echo 'inserto';
        }
    }
} else {
    $id_orden = $_POST['id_ordenedit'];
    /* 
    $sqlo3x = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id = '$id_orden' and finalizada='1' and fin='1' and col >'2'");
    if ($rowordenx = mysqli_fetch_array($sqlo3x)) {
        $agregado = '1';
    } else {
        $agregado = '0';
    }

    $sqlclied = "Update devoluciones Set zona='$zona', poszona='$poszona' Where id = '$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj)); */
}
if (!empty($id_cliente) && !empty($producto) && !empty($cantidad) && !empty($id_orden)) {

    $sqlorit = mysqli_query($rjdhfbpqj, "SELECT * FROM item_devolu Where id_orden = '$id_orden' and id_producto='$idproduc' and modo='0'");
    if ($roworitnx = mysqli_fetch_array($sqlorit)) {

        //echo 'El producto ya fue cargado<br><br>';

    } else {

        /* nuevo devol */


        $sqlitem_devolui = "INSERT INTO `item_devolu` (id_cliente, id_orden, fecha, id_producto, kilos, tipounidad, nombre, fin, hora, id_categoria, id_marca,id_usuarioclav,fechaold,motivo,destino,id_proveedor,nota,idordendev,presentacion) VALUES ('$id_cliente', '$id_orden', '$fechaorden', '$idproduc', '$cantidad', '$unidad', '$producto', '1', '$fechhoras', '$id_categoria', '$id_marca', '$id_usuarioclav', '$fechaold', '$motivo', '$destino','$id_proveedor','$nota','$idordendev','$presentacion');";
        mysqli_query($rjdhfbpqj, $sqlitem_devolui) or die(mysqli_error($rjdhfbpqj));


        /*    
        $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
        if ($cantidad <= $stockdispom) {
            if ($unidad == "0") {
                $cantidadfinal = $cantidad;
            } else {

                $cantidbiene = cantbult($rjdhfbpqj, $idproduc);

                $cantidadfinal = $cantidad * $cantidbiene;
            } */
        // $cantidadfinal=gmp_neg($cantidadfinal);

        /* descuenta stock */
        // $fechavenprx = ActualizaStock($rjdhfbpqj, $idproduc, $cantidadfinal, $id_orden);

        /*         $sqlo2nx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden'");
            if ($rowordx = mysqli_fetch_array($sqlo2nx)) {
                $coldden = $rowordx['col'];
            }
            if ($coldden != '8') {
                $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
            } else {
                $fechhoras = "Agregado en CONCRETADO día " . date("d") . " a las " . date("H:i") . "hs.";
                $refve = '1';
            }

            $sqlitem_devolui = "INSERT INTO `item_devolu` (id_cliente, id_orden, fecha, id_producto, kilos, tipounidad, nombre, descuenun, precio, total, fin, agregado, hora, id_categoria, id_marca,id_usuarioclav) VALUES ('$id_cliente', '$id_orden', '$fechaorden', '$idproduc', '$cantidad', '$unidad', '$producto', '$descuenun', '$improteun', '$importtot', '1', '$agregado', '$fechhoras', '$id_categoria', '$id_marca', '$id_usuarioclav');";
            mysqli_query($rjdhfbpqj, $sqlitem_devolui) or die(mysqli_error($rjdhfbpqj));
        } else {
            $noser = '&error=1';
        } */
    }
    /*     echo"
    <script>
    document.getElementById('producto').focus();
location.reload();
</script>
"; */
} else {

    //if (!empty($id_cliente) && !empty($producto) && !empty($cantidad) && !empty($id_orden)) {
    echo 'Coloque cantidades ' . $id_orden . '<br><br>';
}


$id_clientecod = base64_encode($id_cliente);
$id_ordencod = base64_encode($id_orden);


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?jhduskdsa=$id_clientecod$noser&orjndty=$id_ordencod&ref=$refve'");
echo ("</script>");
