<?php 

$usuario = $_COOKIE['usuariom'];
$clave = $_COOKIE['clavem'];




//construyo la sentencia SQL
$sqllogins="SELECT * FROM usuarios WHERE `cli_usuario` = '$usuario' AND `cli_pass` = '$clave' and estado='0'";



$resultlpo = mysqli_query($rjdhfbpqj,$sqllogins);


if($rowusuarios = mysqli_fetch_array($resultlpo)){
$id_usuarioclav= $rowusuarios['id'];
$whatsapp= $rowusuarios['wsp'];
$idcamioneta= $rowusuarios['camioneta'];

$IdCamioneta = $rowusuarios['camioneta'];
$id_camioneta = $rowusuarios['camioneta'];


$nombrenegocio= $rowusuarios['nom_contac'];
$tipo_usuario= $rowusuarios['tipo_cliente'];

$sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where id = '$idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
$NombreComioneta = $rowcamionetas["nombre"];
}

}
else{ 
echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../inicio/'");
echo("</script>");} 
include('../funciones/funcZonas.php');
?>
