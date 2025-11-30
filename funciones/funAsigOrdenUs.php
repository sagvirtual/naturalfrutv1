<?php


// extraigo la orden que no fuen picada

function OrdensinPick( $rjdhfbpqj, $id_hoja, $id_usuarioclav ) {
    $sqlclorden = mysqli_query( $rjdhfbpqj, "SELECT 
       orden.id, orden.col, orden.picking as ordpicking, orden.id_usuarioclav, orden.hora_pic, orden.position, orden.id_hoja, item_orden.id_orden, item_orden.picking FROM orden INNER JOIN item_orden ON orden.id = item_orden.id_orden Where  id_hoja='$id_hoja' and item_orden.picking='0' and orden.picking='0' and orden.id_usuarioclav='$id_usuarioclav' and orden.col > 1 ORDER BY position DESC" );

    if ( $rowclorden = mysqli_fetch_array( $sqlclorden ) ) {
        $idorden = $rowclorden[ 'id' ];

    } else{

        $idorden = 0;


        
    }

    return $idorden;
}

// 1- Buscar fecha hoja de ruta mas cercana

function AsigOrdenHojab($rjdhfbpqj,$id_usuarioclav) {

    // Creo hoja de ruta
    $sqlhoja = mysqli_query( $rjdhfbpqj, "SELECT * FROM hoja WHERE cerrar = '0' AND fecha >= DATE_SUB(CURDATE(), INTERVAL 9 DAY) ORDER BY fecha ASC, position ASC" );
    if ( $rowhoja = mysqli_fetch_array( $sqlhoja ) ) {
        $fechahoja = $rowhoja[ 'fecha' ];
        $id_hoja = $rowhoja[ 'id' ];

        $idorden = OrdensinPick( $rjdhfbpqj, $id_hoja, $id_usuarioclav );

    }

    return  $idorden;
}

