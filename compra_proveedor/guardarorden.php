<?php include('../f54du60ig65.php');

$id_orden = $_POST['id_orden'];
    
       $sqlordend = "Update ordenprovee Set fin='1' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));



        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php'");
        echo ("</script>"); 

        ?>

