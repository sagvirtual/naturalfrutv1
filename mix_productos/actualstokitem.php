<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 include('../nota_de_pedido/func_descuentastock.php');
 $idproduc=$_POST['id_producto'];
 $cant_kg=$_POST['kilosprepa'];
$id_orden="0";

  if(!empty($idproduc) && $cant_kg > 0){
 $fechavenprx=ActualizaStock($rjdhfbpqj,$idproduc,$cant_kg,$id_orden);
  }

?>