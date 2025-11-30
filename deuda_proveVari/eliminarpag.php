<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $iditem=$_POST['iditem'];
 $id_cliente=$_POST['id_cliente'];
 $idorden=$_POST['idorden'];
 



if(!empty($iditem)){

        $sqlborrd ="delete from prodcom Where id='$iditem' and id_proveedor='$id_cliente' and modopag='1'";
        mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));
echo'
        <script>
    
location.reload();
</script>
        
        ';}


    
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando Pago...</strong></div>';

 
?>    