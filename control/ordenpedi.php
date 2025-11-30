<?php include('../f54du60ig65.php');
 
 $ordenpedi=$_POST['ordenpedi'];

 $id_orden=$_POST['id_orden'];

 

 $sqlordend = "Update ordenbajar Set ordenpedi='$ordenpedi' Where id = '$id_orden'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../control/'");
        echo ("</script>");

?>