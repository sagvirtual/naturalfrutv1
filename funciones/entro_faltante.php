<?php  
 function entrofaltan($rjdhfbpqj,$id_cliente,$id_orden,$id_producto){

      
    $sqla = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$id_producto'");
    while ($rowsa = mysqli_fetch_array($sqla)) {
        $CantStocktotal+= $rowsa['CantStock'];
    }

    $sqlb = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
    if ($rowsb = mysqli_fetch_array($sqlb)) {
        $presentacion= $rowsb['kilo'];
    }


$sqlc = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_cliente = '$id_cliente' and id_orden = $id_orden and id_producto='$id_producto'");
        if($rowsc = mysqli_fetch_array($sqlc)) {
            $tipounidad=$rowsc["tipounidad"];
            $cantidad=$rowsc["cantidad"];

            if( $tipounidad=='0'){
                $cantidadf=$rowsc["cantidad"];
            }else{ $cantidadf=$cantidad*$presentacion;}


            if($CantStocktotal >= $cantidadf && $cantidadf >0){  

                $avisofaltan='1';
            }else{$avisofaltan='0';}



        }   
       
     
    return $avisofaltan;

 }


 function entrofaltangral($rjdhfbpqj,$id_orden,$id_cliente){

  
$sqlc = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_cliente = '$id_cliente' and id_orden = $id_orden");
        while($rowsc = mysqli_fetch_array($sqlc)) {
            $id_producto=$rowsc["id_producto"];
        
            $hayfaltante=entrofaltan($rjdhfbpqj,$id_cliente,$id_orden,$id_producto);

                if($hayfaltante=='1'){

                    $hayfaltanteglar='1';
                break;
                }
                  

        }


       
     
    return $hayfaltanteglar;

 }

