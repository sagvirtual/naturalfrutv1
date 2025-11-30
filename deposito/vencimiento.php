<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_pallet=$_POST['id_pallet'];
 $idproducto=$_POST['idproducto'];
 $fecha_venc=$_POST['fecha_venc'];




if($fecha_venc !='0000-00-00' || !empty($fecha_venc)){
    $sqses = "Update deposito Set fecha_venc='$fecha_venc' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));
}



 echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../deposito/ingreso?idproedit=$idproducto&id_pallet=$id_pallet'");
echo("</script>"); 


?>