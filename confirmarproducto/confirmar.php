<?php include('../f54du60ig65.php');
 
 $confirmado=$_POST['confirmado'];

 $iditem=$_POST['iditem'];

 

 $sqlordend = "Update precioprod Set confirmado='$confirmado' Where id = '$iditem'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));

?>