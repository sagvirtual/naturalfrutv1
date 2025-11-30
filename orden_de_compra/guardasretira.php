<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idcliente=$_POST['idcliente'];
 $retira=$_POST['retira'];



 if(!empty($idcliente)){
 $sqlclientes = "Update proveedores Set  retira='$retira' Where id = '$idcliente'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


} 
?>