<?php
// Configuración de la base de datos
$sdhf = "localhost";
$dbdhf = "softwar2_dsddksujd";
$udhf = "softwar2_koidksus";
$pdhf = "6*3o#5VzK6";
$rjdhfbpqj = new mysqli($sdhf, $udhf, $pdhf, $dbdhf);


date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_RA");
$fechahoy = date("Y-m-d");

// Verificar conexión
if ($rjdhfbpqj->connect_error) {
    die("Conexión fallida: " . $rjdhfbpqj->connect_error);
}

$sqlpreeprod = "Update oferta Set activo='0' Where fecha_hasta < '$fechahoy'";
mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));


$sqlpwprod = "Update ofertacli Set activo='0' Where fecha_hasta < '$fechahoy'";
mysqli_query($rjdhfbpqj, $sqlpwprod) or die(mysqli_error($rjdhfbpqj));




$rjdhfbpqj->close();
