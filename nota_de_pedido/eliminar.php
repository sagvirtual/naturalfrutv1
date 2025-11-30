<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$iditem = $_POST['iditem'];
$cantpro = $_POST['cantpro'];
$idorden = $_POST['idorden'];
$idproduc = $_POST['idproduc'];
$motivo = $_POST['motivo'];
$colestad = $_POST['colestad'];





if (!empty($iditem)) {



    // Consulta para obtener el historial de la orden
    $sqlHistorial = mysqli_query($rjdhfbpqj, "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'");

    $historial = [];
    while ($rowHistorial = mysqli_fetch_array($sqlHistorial)) {
        $historial[] = [
            'cantidad' => $rowHistorial['CantStock'],
            'vencimiento' => $rowHistorial['fecven']
        ];
    }

    // Función para revertir el stock
    function revertirStock(&$stock, $historial)
    {
        foreach ($historial as $item) {
            $fecha = $item['vencimiento'];
            $cantidadARevertir = $item['cantidad'];

            // Buscar el lote correspondiente en el stock
            foreach ($stock as &$lote) {
                if ($lote['vencimiento'] === $fecha) {
                    $lote['cantidad'] += $cantidadARevertir;
                    break;
                }
            }
        }
    }

    // Consulta para obtener el stock del producto ordenado por fecha de vencimiento
    $sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc' ORDER BY fecven ASC");

    $stock = [];
    while ($rowsddk = mysqli_fetch_array($sqlesw)) {
        $stock[] = [
            'cantidad' => $rowsddk['CantStock'],
            'vencimiento' => $rowsddk['fecven']
        ];
    }

    // Revertir el stock
    revertirStock($stock, $historial);

    // Actualizar la base de datos con el nuevo stock
    foreach ($stock as $lote) {
        $cantidadActualizada = $lote['cantidad'];
        $vencimiento = $lote['vencimiento'];
        $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
        mysqli_query($rjdhfbpqj, $sql);
    }

    /*         // Eliminar el registro del historial
        $sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'";
        mysqli_query($rjdhfbpqj, $sqlEliminarHistorial); */

    //historial
    // ID a eliminar

    // Guardar los datos en el historial antes de eliminar
    $sql_historial = "INSERT INTO historial_item_orden (
         id_item_orden, tipo_accion, id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
         id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
         nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
         conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
         piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin,quien,motivo,col
     ) SELECT 
         id, 'DELETE', id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
         id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
         nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
         conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
         piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin,'$id_usuarioclav','$motivo','$colestad'
     FROM item_orden WHERE id = '$iditem'";
    //inserto de nuevo en stock
    $sddss = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc'");
    if ($rowsddk = mysqli_fetch_array($sddss)) {
    } else {

        $dsddasahi = mysqli_query($rjdhfbpqj, "SELECT * FROM histostock WHERE id_producto = '$idproduc' ORDER BY fecven DESC");
        if ($rowsdddkhi = mysqli_fetch_array($dsddasahi)) {
            $fechains = $rowsdddkhi['fecven'];
        } else {
            $fechains = '2060-01-01';
        }

        $dsddasa = mysqli_query($rjdhfbpqj, "SELECT * FROM historial_item_orden WHERE id_producto = '$idproduc' AND id_orden = '$idorden'");
        if ($rowsdddk = mysqli_fetch_array($dsddasa)) {
            $cantidadsto = $rowsdddk['kilos'];
            $tipounidad = $rowsdddk['tipounidad'];
            $presentacion = $rowsdddk['presentacion'];
            if ($tipounidad == '1') {

                $agrstocksd = $cantidadsto * $presentacion;
            } else {
                $agrstocksd = $rowsdddk['kilos'];
            }
        }

        $sqleh = "INSERT INTO stockhgz1 (id_producto, CantStock, fecven, id_usuario,hora,fecha,origen,id_compra) VALUES ('$idproduc', '$agrstocksd', '$fechains', '$id_usuarioclav','$horasin','$fechahoy','1','$idorden')";
        mysqli_query($rjdhfbpqj, $sqleh);
    }
    // Eliminar el registro del historial
    $sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlEliminarHistorial);


    if ($rjdhfbpqj->query($sql_historial) === TRUE) {
        // Si se guardó en el historial, proceder con el borrado
        $sqlborr = "DELETE FROM item_orden WHERE id = '$iditem' and modo='0'";
        if ($rjdhfbpqj->query($sqlborr) === TRUE) {
            echo "" . $rjdhfbpqj->error;
        } else {
            echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
        }
    } else {
        echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
    }



    ///
    /*     $sqlborr ="delete from item_orden Where id= '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj)); */

    if ($cantpro == '1') {

        // Guardar los datos en el historial antes de eliminar
        $sql_historial = "INSERT INTO orden_historial (
    id_orden, tipo_accion, id_cliente, fecha, hora, anclaje, position, pedir, camioneta, fechahoja, 
    id_hoja, finalizada, fin, col, subtotal, uniddesc, desporsen, descuento, perporsen, totalper, 
    ivaporsen, totalivas, adicional, adicionalvalor, observacion, total, anterior, pago, saldo, fecha1, 
    fecha2, fecha3, fecha4, fecha5, fecha6, fecha7, fecha8, fecha9, fecha10, hora1, hora2, hora3, hora4, 
    hora5, hora6, hora7, hora8, hora9, hora10, zona, poszona, id_usuarioclav, hora_pic, finpick, 
    picking, forzado, responsable, recibido, priori, idcuenta, diaentrega, prepara
) SELECT 
    id, 'DELETE', id_cliente, fecha, hora, anclaje, position, pedir, camioneta, fechahoja, 
    id_hoja, finalizada, fin, col, subtotal, uniddesc, desporsen, descuento, perporsen, totalper, 
    ivaporsen, totalivas, adicional, adicionalvalor, observacion, total, anterior, pago, saldo, fecha1, 
    fecha2, fecha3, fecha4, fecha5, fecha6, fecha7, fecha8, fecha9, fecha10, hora1, hora2, hora3, hora4, 
    hora5, hora6, hora7, hora8, hora9, hora10, zona, poszona, id_usuarioclav, hora_pic, finpick, 
    picking, forzado, responsable, recibido, priori, idcuenta, diaentrega, prepara
FROM orden WHERE id= '$idorden' and col !='8'";

        if ($rjdhfbpqj->query($sql_historial) === TRUE) {
            // Si se guardó en el historial, proceder con el borrado
            $sqlborr = "DELETE FROM orden WHERE id= '$idorden' and col !='8'";
            if ($rjdhfbpqj->query($sqlborr) === TRUE) {
                // echo "Registro eliminado y guardado en historial.";
            } else {
                echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
            }
        } else {
            echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
        }
        /* 

        $sqlborrd ="delete from orden Where id= '$idorden' and col !='8'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj)); */

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../notadepedido'");
        echo ("</script>");
    } else {
        echo '
        <script>
    
location.reload();
</script>
        
        ';
    }
}
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando...' . $iditem . '</strong></div>';

// Cerrar conexión
$rjdhfbpqj->close();
