<?php
function Vencimiento($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT fecha FROM orden Where id_cliente = '$id_clienteint'  and col='8' and fin='1' and finalizada='1' ORDER BY `orden`.`fecha` DESC");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {

        $fechaorden = $rowpagdeufp['fecha'];
    }
    return $fechaorden;
}


function diasvenci($rjdhfbpqj, $id_clienteint)
{


    $venci = Vencimiento($rjdhfbpqj, $id_clienteint);
    $fechaFhoy =  date("Y-m-d");

    // Fecha de inicio
    $fechaInicio = new DateTime($venci);

    // Fecha de fin
    $fechaFin = new DateTime($fechaFhoy);
    $intervalo = $fechaInicio->diff($fechaFin);
    // Calcula la diferencia
    return $intervalo->days;
}

function diasvencitotal($rjdhfbpqj, $id_clienteint)
{
    $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, 99999999999);
    $totalven = diasvenci($rjdhfbpqj, $id_clienteint);

    if ($totalven > '1' && $salgral > '1') {
        $diasvedver = $totalven;
    } else {
        $diasvedver = '<i style="color:#ccc;">Sin Deuda</i>';
    }

    return $diasvedver;
}
