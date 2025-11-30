<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');


 $id_mix=$_POST['id_mix'];
 $id_producto=$_POST['id_producto'];
 $kg_utiliz=$_POST['kg_utiliz'];
 $cant_kg=$_POST['cant_kg'] /$_POST['kg_utiliz'];

 $id_probasedec=base64_encode($id_producto);

$sqlclientes = "Update dbmix Set  cant_kg='$cant_kg', fecha='$fechahoy', id_usuario='$id_usuarioclav',hora='$hora', kg_utiliz='$kg_utiliz' Where id_producto='$id_producto' and id_mix = '$id_mix'";
mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));



 
?>