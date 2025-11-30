<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');

$iditem = $_POST['iditem'];
$id_proveedor = $_POST['id_proveedor'];

if (!empty($iditem)) {



    //busco datos para borrar el producto de la lista
    $sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id = '$iditem'");

    if ($rowprodcom = mysqli_fetch_array($sqlprodcom)) {

        $id_producto = $rowprodcom["id_producto"];
        $id_proveedor = $rowprodcom["id_proveedor"];
        $id_orden = $rowprodcom["id_orden"];
        $fecvend = $rowprodcom["fecven"];


        $sqlprodcd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$id_orden' and id_producto = '$id_producto' ");

        while ($rodwprod = mysqli_fetch_array($sqlprodcd)) {
            $unid_bulto = $rodwprod["unid_bulto"];
            $kilow = $rodwprod["kilo"];
            if ($unid_bulto == '2') {
                $agrstocksdv += $rodwprod["agrstock"];
            } else {
                $agrstocksdvs += $rodwprod["agrstock"];
                $agrstocksdv = $agrstocksdvs * $kilow;
            }
        }
    }

    if ($id_orden > 0) {
        $sqlbordr = "delete from precioprod Where id_orden= '$id_orden' and id_producto='$id_producto'";
        mysqli_query($rjdhfbpqj, $sqlbordr) or die(mysqli_error($rjdhfbpqj));

        $sqldd = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$id_producto' and fecven='$fecvend'");
        if ($rowcadtol = mysqli_fetch_array($sqldd)) { // si encuentro con el mismo vencimiento aupdate
            $idstock = $rowcadtol['id'];
            $CantStockd = $rowcadtol['CantStock'];
            $agrstocksd = $CantStockd - $agrstocksdv;

            $sddlh = "UPDATE stockhgz1 SET CantStock = '$agrstocksd' WHERE id_producto = '$id_producto' and id='$idstock'";
            mysqli_query($rjdhfbpqj, $sddlh);
        }
        /* 

$sqlordend = "Update stockhgz1 Set id_producto='9.$iditem' WHERE id_compra = '$id_orden' and id_producto='$id_producto' and id_usuario='$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj)); */


        $sqlborr = "delete from prodcom Where id_orden= '$id_orden' and id_producto='$id_producto' and tipopag ='0' and id_producto!='0'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }

    $origen = "Elimino Compra Producto"; //id_orden, id_cliente, id_producto, origen, responsable)
    FuncActividad($rjdhfbpqj, $id_orden, $id_producto, $id_producto, $origen, $id_usuarioclav);
}

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='?ookdjfv=$id_proveedor&osert=1&id_orden=$id_orden'");
echo ("</script>");
