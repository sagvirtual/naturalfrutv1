<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$unidpercep = $_POST['unidpercep'];

if ($idorden > 0) {

    $sqlunidpercep = mysqli_query($rjdhfbpqj, "SELECT * FROM unidpercep Where id_orden = '$idorden'");
    if ($rowspercep = mysqli_fetch_array($sqlunidpercep)) {

        $sqlcpers = "Update unidpercep Set  tipounid='$unidpercep' Where id_orden ='$idorden'";
        mysqli_query($rjdhfbpqj, $sqlcpers) or die(mysqli_error($rjdhfbpqj));
    } else {

        $sqlpagdeu = "INSERT INTO `unidpercep` (id_orden, tipounid) VALUES ('$idorden', '$unidpercep');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
    //echo 'id ordem: ' . $idorden . ' persep: ' . $unidpercep . '';
    mysqli_close($rjdhfbpqj);
}
