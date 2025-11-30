<?php include('../f54du60ig65.php');
 
 $eordenpedi=$_POST['eordenpedi'];

 $id_orden=$_POST['id_orden'];

 

 $sqlordend = "Update ordeneva Set ordenpedi='$eordenpedi' Where id = '$id_orden'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../control/'");
        echo ("</script>");

?>