<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $iditem=$_POST['iditem'];
 $cantpro=$_POST['cantpro'];
 $idorden=$_POST['idorden'];
 $idproduc=$_POST['idproduc'];
 $id_clientdc=$_POST['idclicod'];
 
 $id_ordencod=base64_encode($idorden);
 $id_clientecod=base64_encode($id_clientdc);



if(!empty($iditem) && $idorden > 1){

    $sqlborr ="delete from faltantes Where id= '$iditem' and id_producto='$idproduc' and id_orden='$idorden'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj)); 

echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando...</strong></div>';


echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?jhduskdsa=$id_clientecod&orjndty=$id_ordencod'");
        echo ("</script>");  


}
      // Cerrar conexión
      $rjdhfbpqj->close();
?>    