<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_pallet=$_POST['id_pallet'];
 $idproducto=$_POST['idproducto'];
 $id_destino=$_POST['id_destino'];
 $fecha_venc=$_POST['fecha_venc'];
 $nombre=$_POST['nombre'];


 $primerCaracter = substr($id_pallet, 0, 1);

if($primerCaracter=='3'){
   // echo ' $id_pallet: '. $id_pallet.'<br>$idproducto: '. $idproducto.'<br>$nombre: '. $nombre.'<br>';
    //if(empty($id_destino)){

    if (strlen($id_pallet) == 12 || strlen($id_pallet) == 13){




 $sqlzona = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_pallet = '$id_pallet'");
 if ($rowzona = mysqli_fetch_array($sqlzona)) { 

/*  $sqlcliefes = "Update deposito Set id_producto='$idproducto', nombre='$nombre' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj)); */
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='../deposito/ingreso?idproedit=$idproducto&id_pallet=&error=2'");
    echo("</script>"); 
    exit;

  }else{
 if(strlen($id_pallet) == 12){
   // echo '<br><br>inserto '.$id_pallet.'';
 $sqldep = "INSERT INTO `deposito` (id_producto, nombre, id_pallet, fecha_ing, hora, fecha_venc,fecha_mod,hora_mod,id_usuario) VALUES ('$idproducto', '$nombre', '$id_pallet', '$fechahoy','$horasin', '0000-00-00', '$fechahoy', '$horasin', '$id_usuarioclav');";
    mysqli_query($rjdhfbpqj, $sqldep) or die(mysqli_error($rjdhfbpqj));

}

  }


 
}
//}
/* 
if(strlen($id_destino) == 12){

    $sqlclidfes = "Update deposito Set id_destino='$id_destino' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqlclidfes) or die(mysqli_error($rjdhfbpqj));
   
} */
/* if($fecha_venc !='0000-00-00' || !empty($fecha_venc)){
    $sqses = "Update deposito Set fecha_venc='$fecha_venc' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));
} */

if(!empty($id_pallet)){
$sqlclides = "Update deposito Set fecha_mod='$fechahoy', hora_mod='$horasin' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqlclides) or die(mysqli_error($rjdhfbpqj));
   }
   if(strlen($id_pallet) == 12){
 echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../deposito/ingreso?idproedit=$idproducto&id_pallet=$id_pallet'");
echo("</script>"); 
   }
  }else{
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='../deposito/ingreso?idproedit=$idproducto&id_pallet=&error=3'");
    echo("</script>"); 
    exit;
  }
?>