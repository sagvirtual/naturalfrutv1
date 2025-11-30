<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');

$id_orden = $_POST['id_orden'];
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$ncheque = $_POST['ncheque'];

$idcliencod = base64_decode($id_cliente);
$id_ordencod = base64_decode($id_orden);


//echo ''.$tipopag .' nche: '.$ncheque .'';
 
if (empty($valor)) {


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
FROM item_orden WHERE  fecha = '$fechahoy' and id_orden='$id_ordencod' and id_cliente='$idcliencod' and tipopag='$tipopag' and modo='1'";

if ($rjdhfbpqj->query($sql_historial) === TRUE) {
    // Si se guardó en el historial, proceder con el borrado
    $sqlborr = "DELETE FROM item_orden WHERE fecha = '$fechahoy' and id_orden='$id_ordencod' and id_cliente='$idcliencod' and tipopag='$tipopag' and modo='1'";
    if ($rjdhfbpqj->query($sqlborr) === TRUE) {
        echo "";
    } else {
        echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
    }
} else {
    echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
}
/* 

    
    $sqlborr = "delete from item_orden Where fecha = '$fechahoy' and id_orden='$id_ordencod' and id_cliente='$idcliencod' and tipopag='$tipopag' and modo='1'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj)); */
} else {



    $sqlitem_ordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and id_orden='$id_ordencod' and id_cliente='$idcliencod' and tipopag='$tipopag' and modo='1'");
    if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordenr)) {
        $id = $rowitem_orden["id"];

        $sqlitem_orden = "Update item_orden Set  valor='$valor' Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
    } else {


            if (!empty($id_ordencod) && !empty($idcliencod) && $valor != "0.00" && $valor != "0") {

                $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque, fin) VALUES ('$idcliencod', '$id_ordencod', '$fechahoy', '$valor', '1', '$nota', '$tipopag', '1', '1', '$ncheque','1');";
                mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
            }
        
    }
}

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='remito?jfndhom=$id_orden'");
echo ("</script>"); 
