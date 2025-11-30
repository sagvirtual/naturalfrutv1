<?php
function funcAvisoMix($rjdhfbpqj, $id_producto)
{

    $CantStocktotal = 0;

    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$id_producto'");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $CantStocktotal += $rowsdk['CantStock'];
    }


    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  id = '$id_producto'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $alarmastock = $rowusuarios["alarmastock"];
    }
    if ($CantStocktotal <= $alarmastock) {
        $resut = $rowusuarios["nombre"] . "<br>";
    } else {
        $resut = "";
    }

    return $resut;
}


function funcAvisoMixProd($rjdhfbpqj)
{


    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE nombre LIKE 'Mix%' and ubicacion='0'");
    while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $id_producto = $rowusuarios["id"];

        echo '' . funcAvisoMix($rjdhfbpqj, $id_producto) . '';
    }
}
