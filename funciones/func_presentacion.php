<?php
function funcPresenatcion($rjdhfbpqj, $id_producto)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  id = '$id_producto'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $presentacion = $rowusuarios["kilo"];
        $NombreBulto = $rowusuarios["modo_producto"];
        $NombreUnidad = $rowusuarios["unidadnom"];
    }

    return array('presentacion' => $presentacion, 'NombreBulto' => $NombreBulto, 'NombreUnidad' => $NombreUnidad);
}
