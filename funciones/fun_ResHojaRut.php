<?php
function func_RespHojRut($rjdhfbpqj, $id_hoja)
{

    //busco el usuario en la hoja de ruta
    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT id,chofer FROM hoja Where  id = '$id_hoja'");
    if ($rowuhoja = mysqli_fetch_array($sqlhoja)) {
        $id_usuario = $rowuhoja['chofer'];

        //nombre de usuario
        $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where  id = '$id_usuario'");
        if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
            $nombre = $rowusuarios['nom_contac'];
        }
    } else {
        $nombre = "";
    }
    return $nombre;
}
