<?php /* $sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);


date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$fecha = date("Y-m-d");



    //creo hoja de ruta
    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fecha'");
    if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
    }else{
        if(!empty($fecha)){
        $sqlborr ="delete from hoja Where fecha= '$fecha'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

        $sqlborrs ="delete from orden Where fecha= '$fecha' and col !='8'";
        mysqli_query($rjdhfbpqj, $sqlborrs) or die(mysqli_error($rjdhfbpqj));
    }

    }
 */

