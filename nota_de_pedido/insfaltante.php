<?php
function faltantes($rjdhfbpqj, $id_producto, $id_orden, $id_cliente)
{
    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_producto = '$id_producto' and id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sql)) {
    } else {
        if (!empty($id_orden) && $id_orden > 0) {

            $sqlins = "INSERT INTO `faltantes` (id_producto, id_orden, id_cliente) VALUES ('$id_producto', '$id_orden', '$id_cliente');";
            mysqli_query($rjdhfbpqj, $sqlins) or die(mysqli_error($rjdhfbpqj));
        }
    }
}
