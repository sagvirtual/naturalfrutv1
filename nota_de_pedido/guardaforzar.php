<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $forzar=$_POST['forzar'];



 if(!empty($idorden)){
 $sqlclientes = "Update orden Set forzado='$forzar', col='3' Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


} 
?>