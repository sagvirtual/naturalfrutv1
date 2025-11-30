<?php include('../f54du60ig65.php');
$idprodu = $_POST['idprodu'];
$cantidadds = $_POST['cantidad'];
$unidsx = $_POST['unidad'];
$tipocliente = $_POST['tipocliente'];

$sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprodu' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
    $idcosto = $rowprecioprod["id"];

    $id_producto = $rowprecioprod["id_producto"];
    $id_proveedor = $rowprecioprod["id_proveedor"];
    $kilox = $rowprecioprod["kilo"];
    $costoxcaj = $rowprecioprod["costoxcaj"];
    $costo = $rowprecioprod["costo"];
    $tipoprov = $rowprecioprod["tipoprov"];
    $cproveedor = $rowprecioprod["cproveedor"];
    $nref = $rowprecioprod["nref"];
    $fecven = $rowprecioprod["fecven"];
    $agrstock = $rowprecioprod["agrstock"];
    $tipo = $rowprecioprod["tipo"];
    $descuento = $rowprecioprod["descuento"];
    $pcondescu = $rowprecioprod["pcondescu"];
    $iibb_bsas = $rowprecioprod["iibb_bsas"];
    $iibb_caba = $rowprecioprod["iibb_caba"];
    $perc_iva = $rowprecioprod["perc_iva"];
    $iva = $rowprecioprod["iva"];
    $pbruto = $rowprecioprod["pbruto"];
    $desadi = $rowprecioprod["desadi"];
    $costo_total = $rowprecioprod["costo_total"];
    $costoxcaja = $rowprecioprod["costo_total"] * $kilox;
    if ($unidsx == "0") {
        $costo_total = $rowprecioprod['costo_total'];
    } else {
        $costo_total = $costoxcaja;
    }



    echo '' . $costo_total . '';
} else {
    echo '0';
}
