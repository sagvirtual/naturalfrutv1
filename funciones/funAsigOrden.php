<?php

// 1- Buscar fecha hoja de ruta mas cercana

function AsigOrdenHoja ( $rjdhfbpqj ) {

    // Creo hoja de ruta
    $sqlhoja = mysqli_query( $rjdhfbpqj, "SELECT * FROM hoja WHERE cerrar = '0' AND enruta='0' AND fecha >= DATE_SUB(CURDATE(), INTERVAL 9 DAY) ORDER BY fecha ASC, position ASC" );
    if ( $rowhoja = mysqli_fetch_array( $sqlhoja ) ) {
         $id_hoja = $rowhoja[ 'id' ];



         $sqlclorden = mysqli_query( $rjdhfbpqj, "SELECT * FROM orden WHERE id_hoja='$id_hoja' and  picking='0' and id_usuarioclav='0' and col='2' ORDER BY `orden`.`position` DESC");
         if ( $rowclorden = mysqli_fetch_array( $sqlclorden ) ) {

         $idorden = $rowclorden[ 'id' ];
 
     } else {
         if ( empty( $idorden ) ) {
           $sqlclied = "Update hoja Set cerrar='1' Where id = '$id_hoja'";
             mysqli_query( $rjdhfbpqj, $sqlclied ) or die( mysqli_error( $rjdhfbpqj ) );
       echo'
         <script>
             
         location.reload();
         </script>        
         ';
 //echo ' no idhoja:/ '.$id_hoja.' /';
         }
 
     }

    }

    return  $idorden;
    
}

