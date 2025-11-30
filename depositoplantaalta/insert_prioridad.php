<?php include('../f54du60ig65.php');
 
 $prioridad=$_POST['prioridad'];

 $id_orden=$_SESSION['id_orden'];

 

 $sqlordend = "Update ordenbajar Set prioridad='$prioridad' Where id = '$id_orden'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



/* echo '

$prioridad = '. $prioridad.'




'; */

?>