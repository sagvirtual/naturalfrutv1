<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$col = $_POST['confirmado'];

$idorden = $_POST['iditem'];


if (!empty($idorden &&  $col == 2)) {



    $sqlcliefes = "Update presupuesto Set col='2', fecha2='$fechahoy', hora2='$horasin' Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));


    echo '<script>
        location.reload();
        </script> ';
}
