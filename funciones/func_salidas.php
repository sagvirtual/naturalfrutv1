<?php
 function salidascam( $rjdhfbpqj, $id_orden){


    $sqlhodja = mysqli_query( $rjdhfbpqj, "SELECT id,id_hoja FROM orden WHERE id = '$id_orden'" );
    if ( $rowhdoja = mysqli_fetch_array( $sqlhodja ) ) {
        $id_dhoja = $rowhdoja[ 'id_hoja' ];

    
    $sqlhoja = mysqli_query( $rjdhfbpqj, "SELECT id,position,camioneta FROM hoja WHERE id = '$id_dhoja' and camioneta !='0'" );
    if ( $rowhoja = mysqli_fetch_array( $sqlhoja ) ) {
        $eoprioridadd = $rowhoja[ 'position' ];

    }else{$eoprioridadd ='20';}

         ///orden
         if ($eoprioridadd > "20") {
            $eopriover = '';
        }
        if ($eoprioridadd == "1") {
            $eopriover = '<button type="button" class="btn btn-primary btn-sm">1ra Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "2") {
            $eopriover = '<button type="button" class="btn btn-success btn-sm"> 2da Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "3") {
            $eopriover = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "4") {
           
            $eopriover = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "5") {
          
            $eopriover = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "6") {
            
            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "7") {
            
            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 7ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "8") {
            
            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 8ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "9") {
            
            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 9ta Salida</button>&nbsp;';
        }
        if ($eoprioridadd == "10") {
            
            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 10ta Salida</button>&nbsp;';
        }

    }else{ $eopriover = '';}
    
        return $eopriover;

    }
?>