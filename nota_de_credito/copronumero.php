<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $ordedecompra=$_POST['ordedecompra'];

 $_SESSION['ordedecompra']=$_POST['ordedecompra'];


 if(!empty($idorden)){
    $sqlclientes = "Update nota_credito Set  ordedecompra='$ordedecompra' Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
   
} 


echo'
        <script>    
location.reload();
</script> ';

?>