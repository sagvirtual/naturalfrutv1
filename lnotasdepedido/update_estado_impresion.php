<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

$idorden = $_POST['id_orden'];
$estado  = $_POST['estado'];

// Verificamos si ya existe el registro
$sqlcheck = mysqli_query($rjdhfbpqj, "SELECT id_orden FROM impresion WHERE id_orden='$idorden'");
if (mysqli_num_rows($sqlcheck) > 0) {
    // Si existe, actualizamos
    $sql = "UPDATE impresion SET estado='$estado',responsable='$id_usuarioclav' WHERE id_orden='$idorden'";
} else {
    // Si no existe, insertamos
    $sql = "INSERT INTO impresion (id_orden, estado,responsable) VALUES ('$idorden', '$estado','$id_usuarioclav')";
}

mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));

echo "ok";
