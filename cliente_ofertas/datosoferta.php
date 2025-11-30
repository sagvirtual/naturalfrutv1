<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
include('../funciones/func_presentacion.php');
include('../control_stock/funcionStockSnot.php');


$id_oferta = $_POST['id_oferta'];
$id_cliente = $_POST['id_cliente'];
$activo = $_POST['activo'];
$id_producto = $_POST['id_producto'];
$descuento = $_POST['descuento'];
$canmax = $_POST['canmax'];
$unidad = $_POST['unidad'];
$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$stock = $_POST['stock'];
$unidstock = $_POST['unidstock'];
$nota = $_POST['nota'];
$dosporeuno = $_POST['dosporeuno'];
$forzadoprecio = $_POST['forzadoprecio'];
$funcPresenatcion = funcPresenatcion($rjdhfbpqj, $id_producto);
$presentacion = $funcPresenatcion['presentacion'];
if ($unidad == 1) {
    $oferta = $canmax * $presentacion;
} else {
    $oferta = $canmax;
}
if ($unidstock == 1) {
    $limite = $stock * $presentacion;
} else {
    $limite = $stock;
}
$stockhistoriald = SumaStock($rjdhfbpqj, $id_producto);
$stockhistorial = $stockhistoriald - $limite;


$sql = mysqli_query($rjdhfbpqj, "SELECT * FROM ofertacli Where id_producto = '$id_producto' and id_cliente='$id_cliente'");
if ($row = mysqli_fetch_array($sql)) {
    $sqlpreeprod = "Update ofertacli Set descuento='$descuento',cantmax='$canmax',unidad='$unidad',activo='$activo',fecha_desde='$fecha_desde',fecha_hasta='$fecha_hasta',activo='$activo',stock='$stock',unidstock='$unidstock',nota='$nota',stockhistorial='$stockhistorial',oferta='$oferta',limite='$limite',dosporeuno='$dosporeuno',forzado='$forzadoprecio' Where id_producto = '$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));
} else {

    $sqlins = "INSERT INTO `ofertacli` (descuento, cantmax, unidad, activo, fecha_desde, fecha_hasta,id_cliente, id_producto,stock,unidstock,nota,stockhistorial,oferta,limite,dosporeuno,forzado) VALUES ('$descuento', '$canmax', '$unidad', '$activo', '$fecha_desde', '$fecha_hasta', '$id_cliente', '$id_producto', '$stock', '$unidstock', '$nota', '$stockhistorial', '$oferta', '$limite', '$dosporeuno', '$forzadoprecio');";
    mysqli_query($rjdhfbpqj, $sqlins) or die(mysqli_error($rjdhfbpqj));
}
$origen = "Ofertacliente," . $fecha_desde . "," . $fecha_hasta . "," . $descuento . "," . $canmax . "," . $unidad . "," . $stock . "," . $unidstock . "," . $dosporeuno . "," . $id_cliente;

FuncActividad($rjdhfbpqj, $descuento, $activo, $id_producto, $origen, $id_usuarioclav);
