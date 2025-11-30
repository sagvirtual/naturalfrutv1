<?php include('../f54du60ig65.php');
 
 $idpreciolis=$_POST['idpreciolis'];
 




if(!empty($idpreciolis)){
    $sqlborr ="delete from precioprod Where id= '$idpreciolis' and nref='Act.'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

   echo'
        <script>
    
location.reload();
</script>
        
        ';


    } 
echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Emiminando...</strong></div>';

 
?>    