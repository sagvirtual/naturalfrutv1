<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_pallet=$_POST['id_pallet'];
 $idproducto=$_POST['idproducto'];
 $id_destino=$_POST['id_destino'];
 $fecha_venc=$_POST['fecha_venc'];
 $nombre=$_POST['nombre'];






if(strlen($id_destino) == 12){

    $sqlclidfes = "Update deposito Set id_destino='$id_destino' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqlclidfes) or die(mysqli_error($rjdhfbpqj));
   
}
/* if($fecha_venc !='0000-00-00' || !empty($fecha_venc)){
    $sqses = "Update deposito Set fecha_venc='$fecha_venc' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));
} */

if(!empty($id_pallet)){
$sqlclides = "Update deposito Set fecha_mod='$fechahoy', hora_mod='$horasin', id_usuario='$id_usuarioclav' Where id_pallet = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqlclides) or die(mysqli_error($rjdhfbpqj));
   }
   if(strlen($id_pallet) == 12){
 echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../deposito/ingreso?idproedit=$idproducto&id_pallet=$id_pallet'");
echo("</script>"); 
   }

?>