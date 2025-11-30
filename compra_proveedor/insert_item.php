<?php include('../f54du60ig65.php');

$editar = $_POST["editar"];
$id_usuario = $_POST["id_usuario"];
$modo = $_POST["modo"];
$id_producto = $_POST["id_producto"];
$id_proveedor = $_POST["id_proveedor"];
$id_orden = $_POST["id_orden"];
$fecha = $_POST["fecha"];
$kilo = $_POST["kilo"];
$nref = $_POST["nref"];
$fecven = $_POST["fecven"];
$agrstock = $_POST["agrstock"];
$agrstock = str_replace(',', '.', $agrstock);


$sqlpdod = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto = '$id_producto' and modo = '0'");
if ($rowprdprod = mysqli_fetch_array($sqlpdod)) {
    $unid_bulto = $rowprdprod["unid_bulto"];
} else {
    $unid_bulto = $_POST["unid_bulto"];
}



if ($unid_bulto == '2') {
    $costoxcaj = $_POST["costoxcaj"];
} else {
    $costoxcajs = str_replace(".", "", $_POST["costoxcaj"]);
    $costoxcaj = str_replace(",", ".", $costoxcajs);
}

if ($unid_bulto == '1') {
    $costo = $_POST["costo"];
} else {
    $costos = str_replace(".", "", $_POST["costo"]);
    $costo = str_replace(",", ".", $costos);
}


$tipo = $_POST["tipo"];


$pcondescu = $_POST["pcondescu"];
$pbruto = $_POST["pbruto"];

$descuentox = str_replace(".", "", $_POST["descuento"]);
$iibb_bsasx = str_replace(".", "", $_POST["iibb_bsas"]);
$iibb_cabax = str_replace(".", "", $_POST["iibb_caba"]);
$perc_ivax = str_replace(".", "", $_POST["perc_iva"]);
$ivax = str_replace(".", "", $_POST["iva"]);
$desadix = str_replace(".", "", $_POST["desadi"]);


$descuento = str_replace(",", ".", $descuentox);
$iibb_bsas = str_replace(",", ".", $iibb_bsasx);
$iibb_caba = str_replace(",", ".", $iibb_cabax);
$perc_iva = str_replace(",", ".", $perc_ivax);
$iva = str_replace(",", ".", $ivax);
$desadi = str_replace(",", ".", $desadix);



$costo_total = $_POST["costo_total"];
$costoxcaja = $_POST["costoxcaja"];
$cpratotal_prod = $_POST["cpratotal_prod"];

$iditem = $_POST['iditem'];

//if(empty($editar)){
/* controlo si no esta */
$sqlprecrod = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and id_producto = '$id_producto' and modo = '0'");
if ($rowprecioprod = mysqli_fetch_array($sqlprecrod)) {
    if ($agrstock > 0) {
        $sqlprecioprod = "Update prodcom Set fecven='$fecven', agrstock='$agrstock', costoxcaj='$costoxcaj', costo='$costo', tipo='$tipo', descuento='$descuento', pcondescu='$pcondescu', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', pbruto='$pbruto', desadi='$desadi', costo_total='$costo_total', costoxcaja='$costoxcaja', cpratotal_prod='$cpratotal_prod', fecha='$fecha' Where id = '$iditem' and  cerrado='0' and id_producto!='0'";
        mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
    }
} else {/* inserto */
    if ($agrstock > 0) {
        $sqlprecioprod = "INSERT INTO `prodcom` (id_usuario, modo, id_producto, id_proveedor, id_orden, fecha, kilo, nref, fecven, agrstock, costoxcaj, costo, tipo, descuento, pcondescu, iibb_bsas, iibb_caba, perc_iva, iva, pbruto, desadi, costo_total, costoxcaja, unid_bulto, cpratotal_prod) VALUES ('$id_usuario', '$modo', '$id_producto', '$id_proveedor', '$id_orden', '$fecha', '$kilo', '$nref', '$fecven', '$agrstock', '$costoxcaj', '$costo', '$tipo', '$descuento', '$pcondescu', '$iibb_bsas', '$iibb_caba', '$perc_iva', '$iva', '$pbruto', '$desadi', '$costo_total', '$costoxcaja', '$unid_bulto', '$cpratotal_prod');";
        mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
    }
}
//}
/* 
if($editar=="1" && $modo =="0"){
    $iditem=$_POST['iditem'];

    $sqlprecioprod = "Update prodcom Set fecven='$fecven', agrstock='$agrstock', costoxcaj='$costoxcaj', costo='$costo', tipo='$tipo', descuento='$descuento', pcondescu='$pcondescu', iibb_bsas='$iibb_bsas', iibb_caba='$iibb_caba', perc_iva='$perc_iva', iva='$iva', pbruto='$pbruto', desadi='$desadi', costo_total='$costo_total', costoxcaja='$costoxcaja', unid_bulto='$unid_bulto', cpratotal_prod='$cpratotal_prod' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));





} */






/*  echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='?ookdjfv=$id_proveedor&osert=1'");
        echo ("</script>");  */
