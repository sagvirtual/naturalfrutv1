<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $iditem=$_POST['iditem'];
 $tipo=$_POST['tipo'];
 

if(!empty($iditem) && $tipo=='ingreso'){

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
    FROM item_orden WHERE id='$iditem' and modo='1' and id_orden='0'";
    
    if ($rjdhfbpqj->query($sql_historial) === TRUE) {
        // Si se guardó en el historial, proceder con el borrado
        $sqlborr = "DELETE FROM item_orden WHERE id='$iditem' and modo='1' and id_orden='0'";
        if ($rjdhfbpqj->query($sqlborr) === TRUE) {
            echo "";
        } else {
            echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
        }
    } else {
        echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
    }

/* 

        $sqlborrd ="delete from item_orden Where id='$iditem' and modo='1' and id_orden='0'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));  */

}

if(!empty($iditem) && $tipo=='egreso'){
   $sqlborrd ="delete from prodcom Where id='$iditem' and modopag='1' and id_orden='0'";
    mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj)); 

 
}

 
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando Pago...</strong></div>';

echo' <script>
    
location.reload();
</script>
        
        '; 
?>    

