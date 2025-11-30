<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $id_usuarioclav=$_POST['id_usuarioclav'];


 if(!empty($idorden) && $id_usuarioclav!=''){
 $sqlclientes = "Update orden Set  id_usuarioclav='$id_usuarioclav' Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));



 echo '

 <br>
 <div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Se asigno de Usuario para el Picking Correctamente!!</strong></div>';



 
} else{ echo '<div  class="alert alert-danger" style="width: 100%; text-align:center;"><strong>Error!! </strong></div>';}
?>