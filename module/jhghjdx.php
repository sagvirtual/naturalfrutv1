<?php 
$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$fechahoy = date("Y-m-d");


$sqlcaja = "Update caja Set fecha_caja='$fechahoy'";
mysqli_query($rjdhfbpqj, $sqlcaja) or die(mysqli_error($rjdhfbpqj));




$sqlitem_orden = "Update item_orden Set fecha='$fechahoy', conf_entrega='1', conf_entrega2='1', conf_carga='1'  Where stock = '0' and modo='0'";
mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));




$sqlcaja3 = "Update orden Set fecha = '$fechahoy',finalizada = '1'";
mysqli_query($rjdhfbpqj, $sqlcaja3) or die(mysqli_error($rjdhfbpqj));




$sqlcaja4 = "Update efectivo Set fecha_caja = '$fechahoy'";
mysqli_query($rjdhfbpqj, $sqlcaja4) or die(mysqli_error($rjdhfbpqj));



/* 
$sqlcaja5 = "Update hoja Set `fecha` = '$fechahoy'";
mysqli_query($rjdhfbpqj, $sqlcaja5) or die(mysqli_error($rjdhfbpqj)); */





echo 'ok';
?>







