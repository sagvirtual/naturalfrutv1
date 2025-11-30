<?php


function SumaStock($rjdhfbpqj, $idproduc)
{

    $CantStocktotal = 0;

    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc'");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $CantStocktotal += $rowsdk['CantStock'];
    }
    return $CantStocktotal;
}



function vencimientoprox($rjdhfbpqj, $idproduc)
{


    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' ORDER BY `stockhgz1`.`fecven` DESC");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {

        $fechavenprx = $rowsdk['fecven'];
        //$CantdStock = $rowsdk['CantStock'];
    }
    return  $fechavenprx;
}

function cantoprox($rjdhfbpqj, $idproduc, $uniddom)
{
    /* alarma */
    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpr = mysqli_fetch_array($sqlprd)) {
        $alarmaven = $rowpr['alarmaven'];
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





    $fechavenprx = "";
    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' ORDER BY `stockhgz1`.`fecven` ASC");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
        $ver = ${"ver" . $rowsdk["id"]};
        $CantdStock = ${"ver" . $rowsdk["id"]};


        if ($rowsdk['fecven'] <= $fechad) {
            $roaviso = "danger";
        } else {
            $roaviso = "primary";
        }
        $CantdStock = $rowsdk['CantStock'];
        $fechavenprxs =  date('d/m/Y', strtotime($rowsdk['fecven']));

        if ($CantdStock > 0) {
            $fechavenpd = ' <button type="button" class="btn btn-' . $roaviso . '" style="width: 100%; padding:1px; ' . $ver . '">
            ' . $fechavenprxs . '&nbsp;<span class="badge badge-light"> ' . $CantdStock . ' ' . $uniddom . ' </span>
            </button><br> ';
        } else {
            $ver = "";
        }


        $fechavenprx .= $fechavenpd;
    }
    return  $fechavenprx;
}
