<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


$idorden = $_POST["idorden"];
$gridRadios1 = $_POST["gridRadios1"];
$nota = $_POST["nota"];
$noenterga = $_POST["noenterga"];
$idordend = base64_decode($idorden);


if (!empty($gridRadios1)) {

    /* busco con el numero de orden los productos */
    $sqlbusprod = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordend' and fin='1'");
    while ($rowbusprod = mysqli_fetch_array($sqlbusprod)) {
        $iditemprod = $rowbusprod['id'];
        $id_productod = ${"id_productod" . $iditemprod};
        $kilosok = ${"kilosok" . $iditemprod};
        $notaok = ${"notaok" . $iditemprod};
        $sqlcarga = ${"sqlcarga" . $iditemprod};
        $sqlitem_orden = ${"sqlitem_orden" . $iditemprod};
        $sqlitem_ordenrr = ${"sqlitem_ordenrr" . $iditemprod};
        $sqlitem_ordendisv = ${"sqlitem_ordendisv" . $iditemprod};
        $sqlitem_ordenr = ${"sqlitem_ordenr" . $iditemprod};
        $kilosmax = ${"kilosmax" . $iditemprod};
        $agregarstock = ${"agregarstock" . $iditemprod};
        $kiloscarga = ${"kiloscarga" . $iditemprod};
        $kilosorden = ${"kilosorden" . $iditemprod};


        $id_productod = $rowbusprod['id_producto'];
        $kilosok = $rowbusprod["kilos"];
        $notaok = $rowbusprod["nota"];


        //me fijo si hay producto faltante
        $sqlcarga = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and confirmado='1'");
        while ($rowcarga = mysqli_fetch_array($sqlcarga)) {
            $kiloscarga += $rowcarga['kilos'];
        }
        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and modo='0' and fin='1'");
        while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
            $kilosorden += $rowitem_orden['kilos'];
        }

        if ($kilosorden > $kiloscarga) {
            //si hay mas pedido en ordenes de lo que se cargo no agrego stock
            $agregarstock = "1";
        } else { //agrego al ststok el sobrante
            $agregarstock = "0";

            //lo que sobra entre carga y remito lo sumo al stock
            $agresctokki = $kiloscarga - $kilosorden;
        }

        //fin producto faltante



        $sqlitem_ordenrr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and modo='0' and fin='1'");

        if ($rowitem_ordenr = mysqli_fetch_array($sqlitem_ordenrr)) {
            $precio = $rowitem_ordenr["precio"];
            $id_clientese = $rowitem_ordenr["id_cliente"];
            $nombrePro = $rowitem_ordenr["nombre"];
            $camioneta = $rowitem_ordenr["camioneta"];
            $id_proveedor = $rowitem_ordenr["id_proveedor"];
            $nota = $rowitem_ordenr["nota"];
            $kilosmax = $rowitem_ordenr["kilos"];
            $conf_entrega = $rowitem_ordenr["conf_entrega"];
            $conf_entrega2 = $rowitem_ordenr["conf_entrega2"];
            $precioprov = $rowitem_ordenr["precioprov"];
            $kilos = "0";

            $kilosRes = $kilos * $precio;
            $kilosResprov = $kilos * $precioprov;

            $kilosResv = number_format($kilosRes, 2, '.', '');
            $kilosResprovv = number_format($kilosResprov, 2, '.', '');
        }


        //aca inserto el stock
        if ($kilos < $kilosmax && $agregarstock == "0") {


            $isertsctockt = $kilosmax - $kilos;
            $isertsctock = $isertsctockt + $agresctokki;




            //controlo si esta el producto en sctok
            $sqlitem_ordendisv = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1'");
            if ($rowitem_ordenv = mysqli_fetch_array($sqlitem_ordendisv)) {
                $kilosr = $rowitem_ordenv["kilos"] + $isertsctockt;
                $kidore = $rowitem_ordenv["id"];

                $sqlitem_ordenr = "Update item_orden Set  kilos='$kilosr' Where id = ' $kidore '";
                mysqli_query($rjdhfbpqj, $sqlitem_ordenr) or die(mysqli_error($rjdhfbpqj));
            } else {

                $sqlitem_ordeni = "INSERT INTO `item_orden` (fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, conf_carga, fin) VALUES ('$fechahoy', '$id_productod', '$isertsctockt', '$nombrePro', '$nota', '$id_proveedor','$camioneta', '1', '1', '1');";
                mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
            }
        }






        $sqlitem_od = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fechaold = '$fechahoy'  and id_producto='$id_productod' and id_cliente='$id_clientese' and stock='7' ");
        if ($rowitem_ordenvd = mysqli_fetch_array($sqlitem_od)) {
            $kidored = $rowitem_ordenvd["id"];
            $sqlitem_ordenrw = "Update item_orden Set  kilos='$kilosr', noentregado='$gridRadios1', nota='$notaok' Where id = ' $kidored '";
            mysqli_query($rjdhfbpqj, $sqlitem_ordenrw) or die(mysqli_error($rjdhfbpqj));
        } else {
            if (!empty($id_productod)) {
                /* fi no pongo fecha espera a el dia del cliente */
                if (empty($noenterga)) {
                    $sqlitem_ordenir = "INSERT INTO `item_orden` (id_cliente, fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, noentregado,fechaold,fin) VALUES ('$id_clientese', '5000-01-01', '$id_productod', '$kilosok', '$nombrePro', '$notaok', '$id_proveedor','$camioneta','7','$gridRadios1','$fechahoy','1');";
                    mysqli_query($rjdhfbpqj, $sqlitem_ordenir) or die(mysqli_error($rjdhfbpqj));

                    /*  $borrasorden = "delete FROM orden Where id = '$idordend' and finalizada = '0' and col !='8'";
                    mysqli_query($rjdhfbpqj, $borrasorden) or die(mysqli_error($rjdhfbpqj)); */
                } else {
                    /* $sqlitem_ordenir = "INSERT INTO `item_orden` (id_orden, id_cliente, fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, noentregado,fechaold) VALUES ('$idordend', '$id_clientese', '$noenterga', '$id_productod', '$kilosok', '$nombrePro', '$notaok', '$id_proveedor','$camioneta','0','0','$fechahoy');";
                    mysqli_query($rjdhfbpqj, $sqlitem_ordenir) or die(mysqli_error($rjdhfbpqj)); */

                    $sqlitem_ordenir = "INSERT INTO `item_orden` (id_cliente, fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, noentregado,fechaold, fin) VALUES ('$id_clientese', '5000-01-01', '$id_productod', '$kilosok', '$nombrePro', '$notaok', '$id_proveedor','$camioneta','7','$gridRadios1','$fechahoy','1');";
                    mysqli_query($rjdhfbpqj, $sqlitem_ordenir) or die(mysqli_error($rjdhfbpqj));

                    $sqlordenc = "Update orden Set fecha='$noenterga', position='0', total='0', subtotal='0'  Where id = '$idordend' and finalizada='0'";
                    mysqli_query($rjdhfbpqj, $sqlordenc) or die(mysqli_error($rjdhfbpqj));
                }
            }
        }
        if ($kilos == "0") {

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
FROM item_orden WHERE   id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'";

            if ($rjdhfbpqj->query($sql_historial) === TRUE) {
                // Si se guardó en el historial, proceder con el borrado
                $sqlborr = "DELETE FROM item_orden WHERE  id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'";
                if ($rjdhfbpqj->query($sqlborr) === TRUE) {
                    echo "";
                } else {
                    echo "Error al eliminar el registro: " . $rjdhfbpqj->error;
                }
            } else {
                echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
            }

            /* 
            
            $borras = "delete FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'";
            mysqli_query($rjdhfbpqj, $borras) or die(mysqli_error($rjdhfbpqj)); */
        }
    }/* fin de buscar productos con el numero de orden */


    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='/module/'");
    echo ("</script>");
} else {
    echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Obligatorio el motivo</a>.
                </div>';
}
