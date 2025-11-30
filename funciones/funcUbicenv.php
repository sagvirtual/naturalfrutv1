<?php
 function ubicacionpro($rjdhfbpqj,$id_producto){

    $sqe = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$id_producto' and fin='0' ORDER BY `deposito`.`fecha_venc` ASC");
    while ($rowodpro = mysqli_fetch_array($sqe)) {
        $idunicacion=$rowodpro['id_destino'];
        /* nombre ubicacion */
        $sqldest = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$idunicacion' ");
        if ($rowdest = mysqli_fetch_array($sqldest)) {
            $nombre=$rowdest['nombre'];
            $exploespro=explode("/", $nombre);
           

            $hayubi="1";
        }    
        

        if($hayubi=="1"){
        $haypro= ' <strong style="color:green;"> Hay en '.$exploespro[1].'</strong> ';
       break;
    }
    
    }
return $haypro;

 }

