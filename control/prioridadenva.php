<?php include('../f54du60ig65.php');
 
 $prioridad=$_POST['prioridada'];

 $id_orden=$_POST['id_orden'];

 

 $sqlordend = "Update ordenevaa Set prioridad='$prioridad' Where id = '$id_orden'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../control/'");
        echo ("</script>");

?>