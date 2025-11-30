<?php
function NombrePicking($rjdhfbpqj, $id_orden)
{
    $sqlusudarios = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$id_orden'");
    if ($rowusuardios = mysqli_fetch_array($sqlusudarios)) {

        $id_picker = $rowusuardios["id_usuarioclav"];
    }


    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$id_picker'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

        $nombreresp = $rowusuarios["nom_contac"];
    } else {
        $nombreresp = "";
    }
    return $nombreresp;
}
