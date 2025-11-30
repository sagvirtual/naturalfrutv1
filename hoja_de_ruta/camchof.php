<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idhoja=$_POST['idhoja'];
 $camioneid=$_POST['camioneid'];
 $idchof=$_POST['idchof'];


 $sqlclientes = "Update hoja Set  chofer='$idchof' Where id = '$idhoja'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


?>