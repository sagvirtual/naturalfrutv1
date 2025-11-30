<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_devol = $_POST['id_devol'];
$verpdf = $_POST['verpdf'];

if ($verpdf == null) {
    $poren = 1;
} else {
    $poren == 0;
}


//echo '3233// ' . $poren . '// ' . $id_devol . '';

$sqlclientes = "Update item_devolu Set verpdf='$poren' Where id = '$id_devol'";
mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
mysqli_close($rjdhfbpqj);/*  */
