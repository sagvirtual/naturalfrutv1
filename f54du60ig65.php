<?php session_start();

$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);
$rjdhfbpqj->set_charset("utf8mb4");




date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$fechahoy = date("Y-m-d");
$fechahoyver = date("d/m/Y");
$hora = date("H:i:s");
$horasin = date("H:i");

//include ('orden/inser_item_deuda.php'); 

//include ('../funciones/arregfecha.php');
//include ('../funciones/porcentajeOrden.php');
//include ('../funciones/stockcarga.php'); 


//borrar configurar en el login
/* $idcamioneta='1';  */

/* $sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where id = '$idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
$NombreComioneta = $rowcamionetas["nombre"];
}
 */


//borrar fin

$datosloc="Tel: 11 3333-3333";


header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");



?>
