<?php
function decuentoProducto($rjdhfbpqj, $id_producto, $desceunto)
{
    if ($desceunto == 1) {

        $sqlb = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
        if ($rowsb = mysqli_fetch_array($sqlb)) {
            $descuento = $rowsb['descuento'];
        }

        if ($descuento > 0) {
            $descuentod = $rowsb['descuento'];
        } else {
            $descuentod = "0";
        }
    } else {
        $descuentod = "0";
    }
    return $descuentod;
}
