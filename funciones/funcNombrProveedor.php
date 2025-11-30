<?php
function NomProveedor($rjdhfbpqj, $id_proveedor)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$id_proveedor'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

        $nombreproveedor = $rowusuarios["empresa"];
    }
    return $nombreproveedor;
}
