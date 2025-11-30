<?php
function ubicacionpro($rjdhfbpqj, $id_producto)
{

    $sqe = mysqli_query($rjdhfbpqj, "SELECT id_destino,id_producto,fin FROM deposito Where id_producto='$id_producto' and fin='0' ORDER BY `deposito`.`fecha_venc` ASC limit 1");
    if ($rowodpro = mysqli_fetch_array($sqe)) {
        $idunicacion = $rowodpro['id_destino'];
        /* nombre ubicacion */
        $sqldest = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$idunicacion' and fraccionar='0' ");
        if ($rowdest = mysqli_fetch_array($sqldest)) {
            $hayubi = "1";
        }


        if ($hayubi == "1") {
            echo ' <br><strong style="color:green;"> ' . $rowdest['nombre'] . '</strong> ';
        }
    }
}
