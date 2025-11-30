<?php include('../f54du60ig65.php');
 
 $iditem=$_POST['iditem'];
 $id_orden=$_SESSION['id_orden'];



/* 

echo '

$id_orden = '. $id_orden.'<br>
$iditem = '. $iditem.'<br>




'; */ 

if(!empty($iditem)){
    $sqlborr ="delete from itemenvasa Where id= '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }



echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?pan=1'");
        echo ("</script>"); 
 
?>