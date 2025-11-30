<?php

// 1- Buscar fecha hoja de ruta mas cercana

function NoHay( $rjdhfbpqj,$id_producto,$id_orden) {

  $sqliubicacion = mysqli_query( $rjdhfbpqj, "SELECT * FROM productos WHERE id = '$id_producto'" );
    if ( $rowitubicacion = mysqli_fetch_array( $sqliubicacion ) ) {
        $ubicacion = $rowitubicacion[ 'ubicacion' ];

 switch ($ubicacion) {
    case "0":
        $OrdenUbic = "ordenevaa";
        $ItemnUbic = "itemenvasa";
        $lugarpe = "ENV PA";
        break;
    case "1":
        $OrdenUbic = "ordenbajar";
        $ItemnUbic = "itembajar";
        $lugarpe = "DEP PA";
        break;
    case "2":
        $OrdenUbic = "ordeneva";
        $ItemnUbic = "itemenvas";
        $lugarpe = "ENV PB";
        break;
        case "9":
            $OrdenUbic = "ordenbajar";
            $ItemnUbic = "itembajar";
            $lugarpe = "DEP PA";
            break;
            case "3":
                $OrdenUbic = "ordenbajar";
                $ItemnUbic = "itembajar";
                $lugarpe = "Deposito<br>Plant. Baja";
                break;
    }


    }  if($ubicacion !='3'){
    $sqlitorden = mysqli_query( $rjdhfbpqj, "SELECT * FROM $OrdenUbic WHERE numero = '$id_orden' and `fecha` >= '2025-01-01' ORDER BY `id` DESC" );
    if ( $roworden = mysqli_fetch_array( $sqlitorden ) ) {
        
        $preparado=$roworden['preparado'];
      
    }   


    if($preparado=='0'){

        $resulbajar='<h6><span class="badge bg-primary">Pidiendo<br>'.$lugarpe.'</span></h6>';

    }else{


   

 $sqlitembajar = mysqli_query( $rjdhfbpqj, "SELECT * FROM $ItemnUbic WHERE id_producto = '$id_producto' and numero='$id_orden' and fecha > '2024-12-31' ORDER BY `id` DESC" );
        if ( $row = mysqli_fetch_array( $sqlitembajar ) ) {

            $listo = $row[ 'listo' ];
            $sinstock = $row[ 'sinstock' ];
            if($listo=='0' && $sinstock=='0'){
                $resulbajar='<h6><span class="badge bg-warning">Preparando<br>'.$lugarpe.'</span></h6>';
              

            }elseif($listo=='1' && $sinstock=='0'){
                $resulbajar='<h6><span class="badge bg-success">Completado<br>'.$lugarpe.'</span></h6>';
               
            }elseif($sinstock=='1'){
                $resulbajar='<h6><span class="badge bg-danger">Sin Stock</span></h6>';
           
            }
            else{
                $resulbajar='<h6><span class="badge bg-danger">Preparando<br>'.$lugarpe.'</span></h6>';
           
            }
            

        }



    }
    
}else{
    $resulbajar='<h6><span class="badge bg-secondary">'.$lugarpe.'</span></h6>';

} 
    return  $resulbajar;
}

