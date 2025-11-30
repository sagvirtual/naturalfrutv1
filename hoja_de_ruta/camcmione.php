<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idhoja=$_POST['idhoja'];
 $camioneid=$_POST['camioneid'];


 $sqlclientes = "Update hoja Set  camioneta='$camioneid' Where id = '$idhoja'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


