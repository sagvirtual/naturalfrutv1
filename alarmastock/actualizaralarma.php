<?php include('../f54du60ig65.php');
$id_producto = $_POST['id_producto'];
$alarma = $_POST['alarma'];
$cantidadmax = $_POST['cantidadmax'];


if (is_numeric($alarma)) {

    $sqlpreeprod = "Update productos Set alarmastock='$alarma',ventaminma='$cantidadmax' Where id = '$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));

    echo 'alarma: ' . $alarma . ' id: ' . $id_producto . ' cantidadmax: ' . $cantidadmax . '';

    if (!$rjdhfbpqj) {
        die("Error de conexión: " . mysqli_connect_error());
    }
} else {


    echo 'nooo';
}
