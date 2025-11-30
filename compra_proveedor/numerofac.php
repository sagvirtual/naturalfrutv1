<?php include('../f54du60ig65.php');

$id_orden = $_POST['id_orden'];
$numero = $_POST['numero'];
$numeror = $_POST['numeror'];
    
if(!empty($id_orden)){
       $sqlordend = "Update ordenprovee Set numero='$numero', numeror='$numeror' Where id = '$id_orden' and cerrado='0'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));

}

echo 'okokok';