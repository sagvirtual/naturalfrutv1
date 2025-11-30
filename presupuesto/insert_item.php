<?php include('../f54du60ig65.php');
include('../control_stock/funcionStockSnot.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../lusuarios/login.php');
$id_cliente = $_POST['id_cliente'];
$fechaorden = $_POST['fechaordn'];
$horaord = $_POST['horaord'];
$id_ordenedit = $_POST['id_ordenedit'];
$presentacion = $_POST['presentacion'];


// $producto=$_POST['producto'];
$idproduc = $_POST['idproduc'];
$cantidad = $_POST['cantidad'];
$unidad = $_POST['unidad'];
$descuenun = $_POST['descuenun'];
$improteun = $_POST['improteun'];
$importtot = $_POST['importtot'];
$motivo = $_POST['motivo'];
$destino = $_POST['destino'];
$fechaold = $_POST['fechaold'];
$ordedecompra = $_POST['ordedecompra'];
$producto = nombrbultnota($rjdhfbpqj, $idproduc, $unidad);
$id_categoria = $_POST['id_categoria'];
$id_marca = $_POST['id_marca'];
/* zona */
if ($id_cliente > 1 && !empty($idproduc) && $importtot != 0) {
    $sqlorxona = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id ='$id_cliente'");
    if ($roworzona = mysqli_fetch_array($sqlorxona)) {
        $zona = $roworzona['zona'];
    }

    $sqlorxona = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zona'");
    if ($roworzona = mysqli_fetch_array($sqlorxona)) {
        $poszona = $roworzona['position'];
    }


    if ($id_ordenedit == 'dsds' || $id_ordenedit == '') {
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM presupuesto Where id_cliente = '$id_cliente' and finalizada='0' and fin='1'");
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
                $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
            }
            //$fechhoras = "Producto Agregado día ".date("d")." ".date("H:i")."hs.";



            $sqlorden = "INSERT INTO `presupuesto` (id_cliente, fecha, hora, anclaje, fin, zona, poszona, id_usuarioclav,ordedecompra) VALUES ('$id_cliente', '$fechaorden', '$horaord', '$anclaje', '1', '$zona', '$poszona', '$id_usuarioclav', '$ordedecompra');";
            mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


            $sqlordenty = mysqli_query($rjdhfbpqj, "SELECT * FROM presupuesto Where anclaje = '$anclaje' and id_cliente = '$id_cliente' and fin='1'");
            if ($roworden = mysqli_fetch_array($sqlordenty)) {


                $id_orden = $roworden['id'];
            }
        }
    } else {
        $id_orden = $_POST['id_ordenedit'];

        $sqlo3x = mysqli_query($rjdhfbpqj, "SELECT * FROM presupuesto Where id = '$id_orden' and finalizada='1' and fin='1' and col >'2'");
        if ($rowordenx = mysqli_fetch_array($sqlo3x)) {
            $agregado = '1';
        } else {
            $agregado = '0';
        }

        // if( $idzona!=$zona){
        $sqlclied = "Update presupuesto Set zona='$zona', poszona='$poszona' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));
        //  }

    }
    if (!empty($id_cliente) && !empty($producto) && !empty($cantidad) && !empty($id_orden)) {

        $sqlorit = mysqli_query($rjdhfbpqj, "SELECT * FROM item_presupues Where id_orden = '$id_orden' and id_producto='$idproduc' and modo='0'");
        if ($roworitnx = mysqli_fetch_array($sqlorit)) {

            //echo 'El producto ya fue cargado<br><br>';

        } else {
            $stockdispom = SumaStock($rjdhfbpqj, $idproduc);

            if ($unidad == "0") {
                $cantidadfinal = $cantidad;
            } else {

                $cantidbiene = cantbult($rjdhfbpqj, $idproduc);

                $cantidadfinal = $cantidad * $cantidbiene;
            }


            $sqlo2nx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden'");
            if ($rowordx = mysqli_fetch_array($sqlo2nx)) {
                $coldden = $rowordx['col'];
            }
            if ($coldden != '8') {
                $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
            } else {
                $fechhoras = "Agregado día " . date("d") . " a las " . date("H:i") . "hs.";
                $refve = '1';
            }

            $sqlitem_presupuesi = "INSERT INTO `item_presupues` (id_cliente, id_orden, fecha, id_producto, kilos, tipounidad, nombre, descuenun, precio, total, fin, agregado, hora, id_categoria, id_marca,id_usuarioclav,presentacion, motivo, destino,fechaold) VALUES ('$id_cliente', '$id_orden', '$fechaorden', '$idproduc', '$cantidad', '$unidad', '$producto', '$descuenun', '$improteun', '$importtot', '1', '$agregado', '$fechhoras', '$id_categoria', '$id_marca', '$id_usuarioclav', '$presentacion', '$motivo', '$destino', '$fechaold');";
            mysqli_query($rjdhfbpqj, $sqlitem_presupuesi) or die(mysqli_error($rjdhfbpqj));
        }
    } else {
        echo 'Coloque cantidades<br><br>';
    }

    $id_clientecod = base64_encode($id_cliente);
    $id_ordencod = base64_encode($id_orden);
}

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?jhduskdsa=$id_clientecod$noser&orjndty=$id_ordencod&ref=$refve'");
echo ("</script>");
