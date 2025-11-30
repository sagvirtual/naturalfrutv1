<?php
function datosOferta($rjdhfbpqj, $id_producto)
{

    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM oferta Where id_producto = '$id_producto' ORDER BY id DESC ");
    if ($row = mysqli_fetch_array($sql)) {
        $id_oferta = $row['id'];
        $descuento = $row['descuento'];
        $cantmax = $row['cantmax'];
        $unidad = $row['unidad'];
        $stock = $row['stock'];
        $unidstock = $row['unidstock'];
        $fecha_desde = $row['fecha_desde'];
        $fecha_hasta = $row['fecha_hasta'];
        $activo = $row['activo'];
        $nota = $row['nota'];
        $dosporeuno = $row['dosporeuno'];
        $catx = $row['catx'];
        $forzadoprecio = $row['forzado'];
    }


    return array('descuento' => $descuento, 'cantmax' => $cantmax, 'unidad' => $unidad, 'stock' => $stock, 'unidstock' => $unidstock, 'fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta, 'activo' => $activo, 'id_oferta' => $id_oferta, 'nota' => $nota, 'dosporeuno' => $dosporeuno, 'catx' => $catx, 'forzadoprecio' => $forzadoprecio);
}
