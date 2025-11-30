<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_factura = $_POST['id_factura'];


$fecha_enviada = date("Y-m-d H:i:s");


$sqlordend = "Update facturacion Set enviada='1', fecha_enviada='$fecha_enviada', resp_envi='$id_usuarioclav' Where id = '$id_factura' and nfactura > 0";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));









//echo  'hola id_or: '.$id_factura.' respo:  '.$id_usuarioclav.'  fecha:  '.$fecha_emitida.' ';
