<?php include('../f54du60ig65.php');

$producto = $_POST['producto'];
$unidad = $_POST['unidad'];
$cantidad = $_POST['cantidad'];
$numero = $_POST['numero'];
$prioridad = $_POST['prioridad'];
$id_producto = $_POST['id_producto'];

$id_orden = $_SESSION['id_orden'];

$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva Where id = '$id_orden' and fin='0'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
} else {

    $timean = date("His");
    $fechaan = date("d-m-Y");
    $anclaje = $timean . $fechaan;
    $horas = date("H:i");

    $sqlordenr = "INSERT INTO `ordeneva` (fecha, numero, usuario, anclaje, hora, prioridad) VALUES ('$fechahoy', '$numero', '$usuario', '$anclaje','$horas','$prioridad');";
    mysqli_query($rjdhfbpqj, $sqlordenr) or die(mysqli_error($rjdhfbpqj));

    $sqlordenty = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva Where anclaje = '$anclaje' and fin='0'");
    if ($roworden = mysqli_fetch_array($sqlordenty)) {


        $_SESSION['id_orden'] = $roworden['id'];
        $_SESSION['numero'] = $roworden['numero'];
    }
}

$id_orden = $_SESSION['id_orden'];

if (!empty($producto) && !empty($cantidad) && !empty($id_orden)) {
    $sqlorden = "INSERT INTO `itemenvas` (producto, unidad, cantidad, fecha, id_orden, id_producto) VALUES ('$producto', '$unidad', '$cantidad', '$fechahoy', '$id_orden', '$id_producto');";
    mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


    $sqlordend = "Update ordeneva Set numero='$numero' Where id = '$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
}

/* echo '

$producto = '. $producto.'<br>
$unidad = '. $unidad.'<br>
$cantidad = '. $cantidad.'<br>
$id_orden = '. $id_orden.'<br>




'; */
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='index.php?pan=1'");
echo ("</script>");
