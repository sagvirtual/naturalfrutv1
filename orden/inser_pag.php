<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');

$id_orden = $_SESSION['id_orden'];
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$modo = $_POST['modo'];
$nota = $_POST['nota'];
$tipopag = $_POST['tipopag'];





if ($modo == '1') {
    if (!empty($id_orden) && !empty($id_cliente) && !empty($valor) && !empty($modo) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, fin) VALUES ('$id_cliente', '$id_orden', '$fechahoy', '$valor', '$modo', '$nota', '$tipopag','1');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
}
if (!empty($id_orden) && !empty($id_cliente) && !empty($valor) && !empty($modo) && $valor != "0") {
    if ($modo == '2') {



        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden' ORDER BY `item_orden`.`id` ASC");
        while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
            $subtotal += $rowitem_orden["total"];
            $subtotalv = number_format($subtotal, 2, '.', '');
        }


        if($nota!="1"){
        $deudavf = $subtotalv / 100 * $valor;
        $valorf = number_format($deudavf, 2, '.', '');
        }else{$deudavf = $_POST['pago_valor']; 
            $valor="0";
            $valorf = number_format($deudavf, 2, '.', '');}
       

        $sqlpagdeur = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden' and modo='2'");
        if ($rowpagdeu = mysqli_fetch_array($sqlpagdeur)) {
            $idse=$rowpagdeu['id'];


            $sql_historial = "INSERT INTO historial_item_orden (
                id_item_orden, tipo_accion, id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
                id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
                nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
                conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
                piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin
            ) SELECT 
                id, 'DELETE', id_cliente, id_orden, id_notacredito, fecha, fechaold, id_producto, 
                id_categoria, id_marca, kilos, tipounidad, nombre, descuenun, precio, precioprov, total, totalprov, 
                nota, valor, valorprov, modo, tipopag, ncheque, vencheque, pordesc, id_proveedor, cliente_prov, stock, 
                conf_entrega, conf_entrega2, conf_carga, camioneta, noentregado, agregado, hora, fin, picking, hay, 
                piccant, id_usuarioclav, horamod, idcuenta, id_rubro, id_provepag, responsable, presentacion, pickinicio, pickinfin
            FROM item_orden WHERE id = '$idse'";
            
            if ($rjdhfbpqj->query($sql_historial) === TRUE) {
                // Si se guardó en el historial, proceder con el borrado
                $sqlborr = "DELETE FROM item_orden WHERE id = '$idse'  and col !='8'";
                if ($rjdhfbpqj->query($sqlborr) === TRUE) {
                    echo "";
                } else {
                    echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
                }
            } else {
                echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
            }
/* 
            
            $sqlborr ="delete from item_orden Where id= '$idse'";
            mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj)); */

            
            $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, pordesc) VALUES ('$id_cliente', '$id_orden', '$fechahoy', '$valorf', '$modo', '$nota', '$tipopag', '$valor');";
            mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
        } else {

            $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, pordesc) VALUES ('$id_cliente', '$id_orden', '$fechahoy', '$valorf', '$modo', '$nota', '$tipopag', '$valor');";
            mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
        }
    }
}




echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='agregar_orden'");
echo ("</script>");
