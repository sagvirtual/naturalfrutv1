<?php


function Salidas( $rjdhfbpqj,$id_orden) {

  $sqliubicacion = mysqli_query( $rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden'" );
    if ( $rowitubicacion = mysqli_fetch_array( $sqliubicacion ) ) {
        $id_hoja = $rowitubicacion[ 'id_hoja' ];

 

   

 $sqlitembajar = mysqli_query( $rjdhfbpqj, "SELECT * FROM hoja WHERE id = '$id_hoja' and camioneta != '0'" );
        if ( $row = mysqli_fetch_array( $sqlitembajar ) ) {

            $salidas = $row[ 'position' ];



    }
} 
    return  $salidas;
}

