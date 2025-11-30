<?php

function bakuporden($rjdhfbpqj, $id_orden)
{

    $verif = mysqli_query($rjdhfbpqj, "SELECT * FROM orden_historial Where id_orden = '$id_orden' and tipo_accion=''");
    if (mysqli_fetch_array($verif)) {
        echo "";
        return;
    } else {
        // Guardar los datos en el historial antes de eliminar
        $sql_historial = "INSERT INTO orden_historial (
    id_orden, tipo_accion, id_cliente, responsable, prepara
) SELECT 
    id,'de', id_cliente,responsable, prepara
FROM orden WHERE id= '$id_orden'";
        if ($rjdhfbpqj->query($sql_historial) === TRUE) {
        } else {
            echo "Error al guardar en el historial: " . $rjdhfbpqj->error;
        }
    }
}
