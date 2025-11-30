<?php
include('../f54du60ig65.php'); // tu conexión
// $rjdhfbpqj es tu conexión mysqli



$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

// Verifico si ya existe un registro para este producto
$sql = mysqli_query($rjdhfbpqj, "SELECT id FROM stockinicial WHERE id_producto='$id_producto'");
if ($row = mysqli_fetch_array($sql)) {
    // Si existe → UPDATE
    $sqlu = "UPDATE stockinicial SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlu) or die(mysqli_error($rjdhfbpqj));
} else {
    // Si no existe → INSERT
    $sqli = "INSERT INTO stockinicial (id_producto, cantidad) VALUES ('$id_producto', '$cantidad')";
    mysqli_query($rjdhfbpqj, $sqli) or die(mysqli_error($rjdhfbpqj));
}
echo '
        <script>    
location.reload();
</script> ';
