<?php

function stockeo($rjdhfbpqj, $id_producto)
{
  $cantidadde = 0;
  $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.kilos, e.tipounidad, e.fecha, e.id_orden, 
    u.id, u.ubicacion, u.nombre, u.kilo,
    o.col, o.id AS orden_id
    FROM item_orden e 
    INNER JOIN productos u ON e.id_producto = u.id 
    INNER JOIN orden o ON e.id_orden = o.id
    WHERE o.col <= '3' AND e.id_producto = '$id_producto'");

  while ($rowcatpro = mysqli_fetch_array($querycliordn)) {
    $tipounidad = $rowcatpro['tipounidad'];
    $cantidad = $rowcatpro['kilos'];
    $previene = $rowcatpro['kilo'];
    if ($tipounidad == '1') {
      $cantidad = $cantidad * $previene;
    }
    if ($cantidad < $previene) {
      $cantidadde += $cantidad;
    }
  }

  return $cantidadde;
}
