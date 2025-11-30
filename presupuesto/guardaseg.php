<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$col = $_POST['col'];

if (!empty($idorden)) {
    $sqlclientes = "Update presupuesto Set  col='$col' Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));



    echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Estado Modificado</strong></div>';
    echo '
    <script>

location.reload();
</script>
    
    ';
} else {
    echo '<div  class="alert alert-danger" style="width: 100%; text-align:center;"><strong>Error!! </strong></div>';
}
