<?php include('../f54du60ig65.php');

$idorden = $_SESSION['id_orden'];


$id_cliente = $_POST["id_cliente"];
$idcamioneta = $_POST["id_camioneta"];
$numday = $_POST["numday"];
$fecha = $_POST["fecha"];


//me fij la position cliente

$sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_cliente'");
if ($rowclientes = mysqli_fetch_array($sqlclientes)) {
    if ($numday == '1') {
        $position = $rowclientes['position1'];
    }
    if ($numday == '2') {
        $position = $rowclientes['position2'];
    }
    if ($numday == '3') {
        $position = $rowclientes['position3'];
    }
    if ($numday == '4') {
        $position = $rowclientes['position4'];
    }
    if ($numday == '5') {
        $position = $rowclientes['position5'];
    }   
    if ($numday == '6') {
        $position = $rowclientes['position6'];
    }
    if ($numday == '0') {
        $position = $rowclientes['position0'];
    }
    
}



//fin


//me fijo si hay orden con esa fecha y id clinete
$sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fecha' and id_cliente = '$id_cliente' and camioneta='$idcamioneta'");
if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
    $producto = $_POST["producto"];
    $total = $_POST["totalf"];
    $totalfb = $_POST["totalfb"];
    $nota = $_POST["nota"];
    $cantidad = $_POST["cantidad"];
    // separo det producto
    $exppro = explode("|", $producto);
    $id_producto = $exppro[0];
    $precio = $exppro[1];
    if($total==$totalfb){$total = $_POST["totalf"];}else{$total = $_POST["totalfb"]; $precio=$_POST["totalfb"]/$cantidad;}
    $kilos = $exppro[2];
    $costo_total = $exppro[3];
    $totalprov = $costo_total*$cantidad;

    //extraigo el nombre del producto
    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
    if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
        $nombre = $rowproductos["nombre"];
        $id_proveedor = $rowproductos["id_proveedor"];
    }

    // en esta parte iserto el item
    if (!empty($producto) && $producto != "") {
        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idorden' and id_producto = '$id_producto' and fin='1'");
        if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
            $id_item = $rowitem_orden["id"];
            //actualizo producto
            $sqlitem_ordenu = "Update item_orden Set kilos='$cantidad', total='$total' , precio='$precio' Where id = '$id_item'";
            mysqli_query($rjdhfbpqj, $sqlitem_ordenu) or die(mysqli_error($rjdhfbpqj));
        } else {
            if (!empty($id_cliente) && !empty($fecha) && !empty($idorden) && !empty($id_producto) && !empty($cantidad) && !empty($total)) {
                echo ("<script language='JavaScript' type='text/javascript'>");
                echo ("location.href='agregar_orden'");
                echo ("</script>");
                //inserto producto
                $sqlitem_ordeni = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, id_producto, kilos, nombre, precio, total, nota, id_proveedor, precioprov, totalprov, camioneta, fin) VALUES ('$id_cliente', '$idorden', '$fecha', '$id_producto', '$cantidad', '$nombre', '$precio', '$total', '$nota', '$id_proveedor', '$costo_total', '$totalprov', '$idcamioneta', '1');";
                mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
            }
        }
    }
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='agregar_orden?2'");
    echo ("</script>");
} else {

    //inserto una nueva orden
    if (!empty($id_cliente) && !empty($fecha)) {
        ///anclaje
        $timean = date("His");
        $fechaan = date("d-m-Y");
        $anclaje = $timean . $fechaan;
        $producto = $_POST["producto"];
        $total = $_POST["totalf"];
        $nota = $_POST["nota"];
        $cantidad = $_POST["cantidad"];
        $totalfb = $_POST["totalfb"];
        
        // separo det producto
        $exppro = explode("|", $producto);
        $id_producto = $exppro[0];

        $precio = $exppro[1];
        if($total==$totalfb){$total = $_POST["totalf"];}else{$total = $_POST["totalfb"]; $precio=$_POST["totalfb"]/$cantidad;}
        
        
        $kilos = $exppro[2];

        //extraigo el nombre del producto
        $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
        if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
            $nombre = $rowproductos["nombre"];
            $id_proveedor = $rowproductos["id_proveedor"];
        }

        $sqlorden = "INSERT INTO `orden` (id_cliente, fecha, anclaje, camioneta, fin) VALUES ('$id_cliente', '$fecha', '$anclaje', '$idcamioneta', '1');";
        mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


        $sqlordenveri = "INSERT INTO `ordenveri` (fecha, veri, camioneta) VALUES ('$fecha', '0', '$idcamioneta');";
        mysqli_query($rjdhfbpqj, $sqlordenveri) or die(mysqli_error($rjdhfbpqj));

        //hoja de ruta
        $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$fecha' and camioneta='$idcamioneta'");
        if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
        } else {
            $sqlhojai = "INSERT INTO `hoja` (fecha, camioneta) VALUES ('$fecha', '$idcamioneta');";
            mysqli_query($rjdhfbpqj, $sqlhojai) or die(mysqli_error($rjdhfbpqj));
        }


        $sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where anclaje = '$anclaje'");
        if ($roworden = mysqli_fetch_array($sqlordena)) {
            $_SESSION['id_orden'] = $roworden["id"];
            $idorden = $roworden["id"];
        }

        $sqlitem_ordeni = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, id_producto, kilos, nombre, precio, total, nota, id_proveedor, precioprov, totalprov, camioneta, fin) VALUES ('$id_cliente', '$idorden', '$fecha', '$id_producto', '$cantidad', '$nombre', '$precio', '$total', '$nota', '$id_proveedor','$costo_total', '$totalprov', '$idcamioneta', '1');";
        mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='agregar_orden?7'");
        echo ("</script>");
    } else {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='agregar_orden?4$fecha'");
        echo ("</script>");
    }
}
