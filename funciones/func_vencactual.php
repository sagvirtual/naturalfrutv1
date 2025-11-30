<?php

function funcvenciActual($rjdhfbpqj, $id_producto)
{
    $fechaven = "";

    $sql = mysqli_query(
        $rjdhfbpqj,
        "SELECT CantStock,fecven, DATE_FORMAT(fecven, '%d/%m/%y') AS fechavend
         FROM stockhgz1
         WHERE id_producto = '$id_producto' AND CantStock > 0
         ORDER BY fecven ASC"
    );

    $hoy = new DateTime(); // fecha actual

    while ($row = mysqli_fetch_assoc($sql)) {
        $fechaV = new DateTime($row['fecven']);

        // diferencia en meses
        $diffMeses = (($fechaV->format('Y') - $hoy->format('Y')) * 12) + ($fechaV->format('m') - $hoy->format('m'));

        // 🔴 Si vence dentro de los próximos 2 meses (0, 1 o 2)
        if ($diffMeses <= 2 && $diffMeses >= 0) {
            $color = 'danger';
        } else {
            $color = 'primary';
        }

        $fechaven .= ' <span class="badge bg-' . $color . '">Vencimiento: ' . $row['fechavend'] . ' Cant.' . $row['CantStock'] . '</span> ';
    }

    return $fechaven;
}
