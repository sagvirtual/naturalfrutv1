<?php function controlo($rjdhfbpqj, $idorden)
{

    $sqlusdd = mysqli_query($rjdhfbpqj, "SELECT id_control FROM picking_error Where id_orden='$idorden'");
    if ($rowdard = mysqli_fetch_array($sqlusdd)) {

        $uscontrol = $rowdard['id_control'];
    }

    $sqlusuard = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$uscontrol'");
    if ($rowusdard = mysqli_fetch_array($sqlusuard)) {

        $nombrrespo = '<span class="dots"></span><br>' . $rowusdard['nom_contac'] . '<h4 style="position:relative;top:5px;color:#ffffff;">%' . controloPorsen($rjdhfbpqj, $idorden) . '</h4>';
    } else {
        $nombrrespo = '<br>En espera';
    }

    return $nombrrespo;
}

function controloPorsen($rjdhfbpqj, $idorden)
{
    // CANTIDAD DE ERRORES DE PICKING
    $sqlusdd = mysqli_query($rjdhfbpqj, "SELECT id FROM picking_error WHERE id_orden='$idorden'");
    $canvtcontrol = mysqli_num_rows($sqlusdd);

    // CANTIDAD DE ITEMS DE LA ORDEN (MODO = 0)
    $sqlusddor = mysqli_query($rjdhfbpqj, "SELECT id FROM item_orden WHERE id_orden='$idorden' AND modo='0'");
    $canvtOrdne = mysqli_num_rows($sqlusddor);

    // EVITO DIVISIÓN POR CERO
    if ($canvtOrdne == 0) {
        return 0;
    }

    // PORCENTAJE
    $ncantporsen = ($canvtcontrol * 100) / $canvtOrdne;

    // DEVUELVO REDONDEADO SIN DECIMALES
    return round($ncantporsen, 0);
}


function controlodes($rjdhfbpqj, $idorden)
{

    $sqlusdd = mysqli_query($rjdhfbpqj, "SELECT id_control FROM picking_error Where id_orden='$idorden'");
    if ($rowdard = mysqli_fetch_array($sqlusdd)) {

        $uscontrol = $rowdard['id_control'];
    }

    $sqlusuard = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$uscontrol'");
    if ($rowusdard = mysqli_fetch_array($sqlusuard)) {

        $nombrrespo = '<br>Controlo ' . $rowusdard['nom_contac'] . '</h4>';
    } else {
        $nombrrespo = '';
    }

    return $nombrrespo;
}

function contrdespi($rjdhfbpqj, $idorden)
{

    $sqlusdd = mysqli_query($rjdhfbpqj, "SELECT id_control FROM picking_error Where id_orden='$idorden'");
    if ($rowdard = mysqli_fetch_array($sqlusdd)) {

        $uscontrol = $rowdard['id_control'];
    }

    $sqlusuard = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$uscontrol'");
    if ($rowusdard = mysqli_fetch_array($sqlusuard)) {

        $nombrrespo = '<br>Controlando ' . $rowusdard['nom_contac'] . '</h4>';
    } else {
        $nombrrespo = '';
    }

    return $nombrrespo;
}
