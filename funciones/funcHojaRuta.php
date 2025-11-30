<?php

// Función para obtener la fecha más cercana para un día específico

function obtenerFechaMasCercana($diaCliente)
{
    $diasDeLaSemana = [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday'
    ];

    $fechahoy = new DateTime();
    $diaHoy = $fechahoy->format('w');
    // Día de la semana actual como número ( 0 = domingo, 1 = lunes, etc. )

    // Validar que el día del cliente sea un número válido
    if (!array_key_exists($diaCliente, $diasDeLaSemana)) {
        return 'Día del cliente no válido';
    }

    // Calcular la fecha más cercana
    $diasParaSiguiente = ($diaCliente - $diaHoy + 7) % 7;
    if ($diasParaSiguiente == 0) {
        // Si el día es hoy, devolvemos hoy
        return $fechahoy->format('Y-m-d');
    }

    $fechaMasCercana = (clone $fechahoy)->modify('+' . $diasParaSiguiente . ' days');

    return $fechaMasCercana->format('Y-m-d');
}


function HojaRuta($rjdhfbpqj, $diaCliente, $id_camioneta, $idorden, $position, $retira)
{
    // Verificar si es domingo
    $fechahoy = date("Y-m-d");
    if (date('w', strtotime($fechahoy)) == 0) {
        return;
        // No hacer nada si es domingo
    }

    if ($retira == '1') {
        $id_camioneta = '0';
    }

    if ($diaCliente != $fechahoy) {
        $cersrar = 0;
        // Creo hoja de ruta
        $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja WHERE fecha = '$diaCliente' AND camioneta='$id_camioneta' and fin='0' and enruta='0'");
        if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
            $id_hoja = $rowhoja['id'];
            $cersrar = $rowhoja['enruta'];
            // Ya existe una hoja de ruta para esta fecha y camioneta
        } else {

            $sqlcamiodtas = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente='27' and camioneta = '$id_camioneta'");
            if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)) {
                $idchofer = $rowcam23['id'];
            } else {
                $idchofer = 0;
            }
            $timean = date('His');
            $fechaan = date('d-m-Y');
            $anclaje = $timean . $fechaan;
            if ($id_camioneta == '0') {
                $posidtion = '99';
            } else {
                $posidtion = '0';
            }

            $sqlhojain = "INSERT INTO `hoja` (fecha, fin, camioneta,chofer,anclaje,position) VALUES ('$diaCliente', '0', '$id_camioneta', '$idchofer', '$anclaje', '$posidtion');";
            mysqli_query($rjdhfbpqj, $sqlhojain) or die(mysqli_error($rjdhfbpqj));

            $sqlbanner = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where fecha = '$diaCliente' AND camioneta='$id_camioneta' and anclaje = '$anclaje'");
            if ($rowbanner = mysqli_fetch_array($sqlbanner)) {
                $id_hoja = $rowbanner['id'];
            }
        }

        if ($cersrar == '0') {
            /* AGREGO ORDEN A LA HOJA DE RURA */
            $sqlclied = "Update orden Set position='$position', camioneta='$id_camioneta', fechahoja='$diaCliente', id_hoja='$id_hoja' Where id = '$idorden'";
            mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));

            $sqlcslied = "Update hoja Set cerrar='0' Where id = '$id_hoja' and enruta='0'";
            mysqli_query($rjdhfbpqj, $sqlcslied) or die(mysqli_error($rjdhfbpqj));
        }
    }
    // Fin crear hoja de ruta
}
