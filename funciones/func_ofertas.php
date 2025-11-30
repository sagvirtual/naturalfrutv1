<?php
function oferta($rjdhfbpqj, $id_producto, $fechahoy, $id_clienteint)
{
    $descuento = 0;
    $cantmax = 0;
    $unidad = 0;
    $stock = 0;
    $unidstock = 0;
    $fecha_desde = '0000-00-00';
    $fecha_hasta = '0000-00-00';

    //oferta cliente 
    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM ofertacli Where id_cliente='$id_clienteint' and id_producto = '$id_producto' and activo='1' and ('$fechahoy' BETWEEN fecha_desde AND fecha_hasta)");
    if ($row = mysqli_fetch_array($sql)) {
        $busquedaorer = "cli";
    } else {
        $busquedaorer = "";
    }




    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM oferta$busquedaorer Where id_producto = '$id_producto' and activo='1' and ('$fechahoy' BETWEEN fecha_desde AND fecha_hasta)");
    if ($row = mysqli_fetch_array($sql)) {
        $descuento = $row['descuento'];
        $cantmax = $row['cantmax'];
        $unidad = $row['unidad'];
        $stock = $row['stock'];
        $unidstock = $row['unidstock'];
        $fecha_desde = $row['fecha_desde'];
        $fecha_hasta = $row['fecha_hasta'];
        $nota = $row['nota'];
        $limite = $row['limite'];
        $ofertapromo = $row['oferta'];
        $stockhistorial = $row['stockhistorial'];
        $forzadoprecio = $row['forzado'];
        $dosporeuno = $row['dosporeuno'];
        $oferta = 1;
        $nooferta = 1;
    } else {
        $oferta = 0;
        $descuento = 0;
        $cantmax = 0;
        $unidad = 0;
        $stock = 0;
        $unidstock = 0;
        $fecha_desde = 0;
        $fecha_hasta = 0;
        $nota = 0;
        $limite = 0;
        $ofertapromo = 0;
        $stockhistorial = 0;
        $forzadoprecio = 0;
        $dosporeuno = 0;
        $nooferta = 0;
    }


    return array('descuento' => $descuento, 'cantmax' => $cantmax, 'unidad' => $unidad, 'stock' => $stock, 'unidstock' => $unidstock, 'fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta, 'nota' => $nota, 'oferta' => $oferta, 'limite' => $limite, 'ofertapromo' => $ofertapromo, 'stockhistorial' => $stockhistorial, 'forzadoprecio' => $forzadoprecio, 'dosporeuno' => $dosporeuno, 'nooferta' => $nooferta);
}
