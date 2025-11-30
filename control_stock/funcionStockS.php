<?php

function modosctok($rjdhfbpqj, $idproduc)
{
    /* alarma */
    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpr = mysqli_fetch_array($sqlprd)) {
        $unidadnom = $rowpr['unidadnom'];
    }

    //if($unidadnom=="Kg."){$kilo=1;$bulto="Kg."; }
    if ($unidadnom == "Kg.") {
        $kilo = $rowpr['kilo'];
        $bulto = $rowpr['modo_producto'];
    }
    if ($unidadnom == "Uni.") {
        $kilo = $rowpr['kilo'];
        $bulto = $rowpr['modo_producto'];
    }

    return array('kilo' => $kilo, 'bulto' => $bulto);
}


function detallebulto($rjdhfbpqj, $idproduc)
{
    /* alarma */
    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpr = mysqli_fetch_array($sqlprd)) {
        $unidadnom = $rowpr['unidadnom'];
        $modo_producto = $rowpr['modo_producto'];
    }
    $kilo = $rowpr['kilo'];
    $bulto = $rowpr['modo_producto'];

    return array('kilo' => $kilo, 'bulto' => $bulto, 'unidadnom' => $unidadnom);
}


function SumaStock($rjdhfbpqj, $idproduc)
{

    $comocalculo = modosctok($rjdhfbpqj, $idproduc);

    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' and CantStock > 0");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $CantStocktodtal += $rowsdk['CantStock'];
        $CantStocktotal = $CantStocktodtal / $comocalculo['kilo'];

        $CantStocktotal = explode("E", $CantStocktotal);

        // Ahora, limitar a dos decimales
        $CantStocktotal = number_format((float)$CantStocktotal[0], 2, '.', '');
    }
    return $CantStocktotal;
}

function SumaStockunid($rjdhfbpqj, $idproduc)
{

    $comocalculo = modosctok($rjdhfbpqj, $idproduc);

    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1  Where id_producto = '$idproduc' and CantStock > 0");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $CantStocktotal += $rowsdk['CantStock'];/* 

        $CantStocktotal = explode("E", $CantStocktotal);

        // Ahora, limitar a dos decimales
        $CantStocktotalu = number_format((float)$CantStocktotal[0], 2); */
    }
    return $CantStocktotal;
}




function vencimientoprox($rjdhfbpqj, $idproduc)
{


    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' and CantStock > 0 ORDER BY `stockhgz1`.`fecven` DESC");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {

        $fechavenprx = $rowsdk['fecven'];
        $CantdStock = $rowsdk['CantStock'];
    }
    return  $fechavenprx;
}

function cantoprox($rjdhfbpqj, $idproduc, $uniddom)
{
    /* alarma */
    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpr = mysqli_fetch_array($sqlprd)) {
        $alarmaven = $rowpr['alarmaven'];
        $unidadnom = $rowpr['unidadnom'];
    }

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_TIME, "es_RA");
    /*    $alarmaven=1.5;
    $fechahoy = date("Y-m-d");
    $fecha = new DateTime($fechahoy);
    $fecha->modify('-'.$alarmaven.' months');
    $fechad=$fecha->format('Y-m-d');
 */
    /* nuevo calculo */
    $fechahoy = date("Y-m-d");
    $fechah = new DateTime($fechahoy);

    $explodia = explode(".", $alarmaven);
    $diads = $explodia['1'];
    $mesesd = $explodia['0'];

    $fechah->modify('+' . $mesesd . ' months');

    if ($diads == 0) {
        $dias = 0;
    } else {
        $dias = $diads;
    }
    $fechah->modify('+' . $dias . ' days');

    $fechad = $fechah->format('Y-m-d');

    /* fin */


    $comocalculo = modosctok($rjdhfbpqj, $idproduc);


    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' and CantStock > 0 ORDER BY `stockhgz1`.`fecven` ASC");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $ver = ${"ver" . $rowsdk["id"]};
        $CantdStock = ${"ver" . $CantdStock["id"]};


        if ($rowsdk['fecven'] <= $fechad) {
            $roaviso = "danger";
        } else {
            $roaviso = "primary";
        }

        $CantdStock = $rowsdk['CantStock'] / $comocalculo['kilo'];

        $CantdStock = explode("E", $CantdStock);

        // Ahora, limitar a dos decimales
        $CantdStock = number_format((float)$CantdStock[0], 2);



        $fechavenprxs =  date('d/m/Y', strtotime($rowsdk['fecven']));

        if ($CantdStock > 0) {
            $fechavenpd = ' <button type="button" class="btn btn-' . $roaviso . '" style="width: 100%; padding:1px; ' . $ver . '">
            ' . $fechavenprxs . '&nbsp;
            <span class="badge badge-light"> ' . $rowsdk['CantStock'] . ' ' . $unidadnom . ' </span>&nbsp;
            <span class="badge badge-light"> ' . $CantdStock . ' ' . $comocalculo['bulto'] . ' </span>


            </button><br> ';
        } else {
            $ver = "";
        }


        $fechavenprx .= $fechavenpd;
    }
    return  $fechavenprx;
}
