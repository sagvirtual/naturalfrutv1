<? include('../f54du60ig65.php'); 
 include('../lusuarios/login.php');
$idcod=$_GET['juhytm'];
$idse=base64_decode($idcod);

if(!empty($idcod)){
$sqlborr ="delete from orden Where id= '$idse' and col !='8'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

        // Guardar los datos en el historial antes de eliminar
        $sql_historialo = "INSERT INTO orden_historial (
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
        
        if ($rjdhfbpqj->query($sql_historialo) === TRUE) {
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

     // Guardar los datos en el historial antes de eliminar
     $sql_historial = "INSERT INTO historial_item_orden (
        id_item_orden, tipo_accion, id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
        id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
        nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
        conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
        piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin,quien
    ) SELECT 
        id, 'DELETE', id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
        id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
        nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
        conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
        piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin,'$id_usuarioclav'
    FROM item_orden WHERE id = '$idse'";
    
    if ($rjdhfbpqj->query($sql_historial) === TRUE) {
        // Si se guardó en el historial, proceder con el borrado
        $sqlborr = "DELETE FROM item_orden WHERE id = '$idse'";
        if ($rjdhfbpqj->query($sqlborr) === TRUE) {
            echo "";
        } else {
            echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
        }
    } else {
        echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
    }

    
}


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../orden'");
echo ("</script>");
?>