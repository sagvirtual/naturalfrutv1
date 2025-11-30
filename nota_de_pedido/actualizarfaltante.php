<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $unidadfal=$_POST['unidadfal'];
 $cantidadfal=$_POST['cantidadfal'];
 $id_falta=$_POST['id_falta'];
 $idorden=$_POST['idorden'];




 if(!empty($idorden)){
 $sqlclientes = "Update faltantes Set tipounidad='$unidadfal', cantidad='$cantidadfal' Where id = '$id_falta'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

} 



?>