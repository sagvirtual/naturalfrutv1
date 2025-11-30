<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$iditem = $_POST['iditem'];
$cantpro = $_POST['cantpro'];
$idorden = $_POST['idorden'];
$idproduc = $_POST['idproduc'];





if (!empty($iditem)) {



    // Consulta para obtener el historial de la orden
    /*     $sqlHistorial = mysqli_query($rjdhfbpqj, "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'");
    
        $historial = [];
        while ($rowHistorial = mysqli_fetch_array($sqlHistorial)) {
            $historial[] = [
                'cantidad' => $rowHistorial['CantStock'],
                'vencimiento' => $rowHistorial['fecven']
            ];
        } */

    // Función para revertir el stock
    /*         function revertirStock(&$stock, $historial) {
            foreach ($historial as $item) {
                $fecha = $item['vencimiento'];
                $cantidadARevertir = $item['cantidad'];
    
                // Buscar el lote correspondiente en el stock
                foreach ($stock as &$lote) {
                    if ($lote['vencimiento'] === $fecha) {
                        $lote['cantidad'] -= $cantidadARevertir;
                        break;
                    }
                }
            }
        } */

    // Consulta para obtener el stock del producto ordenado por fecha de vencimiento
    /*       $sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc' ORDER BY fecven ASC");
    
        $stock = [];
        while ($rowsddk = mysqli_fetch_array($sqlesw)) {
            $stock[] = [
                'cantidad' => $rowsddk['CantStock'],
                'vencimiento' => $rowsddk['fecven']
            ];
        } */

    // Revertir el stock
    /*   revertirStock($stock, $historial); */

    // Actualizar la base de datos con el nuevo stock
    /*       foreach ($stock as $lote) {
            $cantidadActualizada = $lote['cantidad'];
            $vencimiento = $lote['vencimiento'];
            $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
            mysqli_query($rjdhfbpqj, $sql);
        } */

    // Eliminar el registro del historial
    /*  $sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$idorden'";
        mysqli_query($rjdhfbpqj, $sqlEliminarHistorial);
     */




    $sqlborr = "delete from item_devolu Where id= '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

    if ($cantpro == '1') {
        /* 
        $sqlborrd = "delete from devoluciones Where id= '$idorden'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj)); */


        $sqlclientes = "Update devoluciones Set  id_cliente='0', fecha='0000-00-00', hora='00:00', anclaje='', finalizada='0', fin='0', fecha_accion='0000-00-00 00:00:00', id_usuarioclav='0' Where id = '$idorden'";
        mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


        // Guardar los datos en el historial antes de eliminar
        /*   $sql_historial = "INSERT INTO historial_item_orden (
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
FROM item_orden WHERE  id_notacredito= '$idorden' and id_notacredito!='0'";

if ($rjdhfbpqj->query($sql_historial) === TRUE) {
    // Si se guardó en el historial, proceder con el borrado
    $sqlborr = "DELETE FROM item_orden WHERE id_notacredito= '$idorden' and id_notacredito!='0' and modo='0'";
    if ($rjdhfbpqj->query($sqlborr) === TRUE) {
        echo "";
    } else {
        echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
    }
} else {
    echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
}
 */

        /* 
        
        $sqlborrd ="delete from item_orden Where id_notacredito= '$idorden' and id_notacredito!='0'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj)); */


        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../ordendevoluciones'");
        echo ("</script>");
    } else {
        echo '
        <script>
    
location.reload();
</script>
        
        ';
    }
}
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando...</strong></div>';
