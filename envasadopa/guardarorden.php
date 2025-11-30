<?php include('../f54du60ig65.php');
$horas = date("H:i");
$id_orden = $_SESSION['id_orden'];
  
       $sqlordend = "Update ordenevaa Set fin='1', hora='$horas' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php'");
        echo ("</script>"); 

        ?>

