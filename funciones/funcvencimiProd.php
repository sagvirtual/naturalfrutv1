<?php
function funcvencimiProd($rjdhfbpqj, $id_producto, $idorden)
{
    // 1) traer solo lo necesario, ya formateado
    $sql = mysqli_query(
        $rjdhfbpqj,
        "SELECT DATE_FORMAT(fecven, '%d/%m/%y') AS fechavend
         FROM histostock
         WHERE id_producto = '$id_producto' AND id_orden = '$idorden'
         ORDER BY fecven DESC
         LIMIT 1"
    );

    if ($row = mysqli_fetch_assoc($sql)) {
        return $row['fechavend'];
    }
    return ""; // o NULL si preferís
}
