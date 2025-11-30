<?php /* determino si se pide en envasado o deposito arriba o ababajo */

function DondPedir($rjdhfbpqj,$id_producto,$id_orden){

       /* nombre de la ubicacion del producto */
       $sqe = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$id_producto' and fin='0' ORDER BY `deposito`.`fecha_venc` ASC");
       if ($rowodpro = mysqli_fetch_array($sqe)) {
           $idunicacion=$rowodpro['id_destino'];
           /* nombre ubicacion */
           $sqldest = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$idunicacion'");
           if ($rowdest = mysqli_fetch_array($sqldest)) {                     
               $abjadep=$rowdest['fraccionar'];
               $nomubic=$rowdest['nombre'];
               if($abjadep==0){$buscanen="<br> No hay en el <br>deposito del fondo";}else{$buscanen=" <br>Deposito Fondo";}
           } 
       }else{
          $nomubic="";}

            $quedrdn = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.id_orden, e.picking, u.id, u.ubicacion FROM item_orden e INNER JOIN productos u ON e.id_producto = u.id 
            Where e.id_orden = '$id_orden' and e.picking='0' and (u.ubicacion='0' or u.ubicacion='2')");
            
            $canverifdin = mysqli_num_rows($quedrdn);
            if($canverifdin >'1'){
            
            
                 $sqlordnd = "Update item_orden Set picking='2', pickinicio='00:00:00', pickinfin='00:00:00' Where id_orden='$id_orden' and id_producto='$id_producto'";
                      mysqli_query($rjdhfbpqj, $sqlordnd) or die(mysqli_error($rjdhfbpqj));
                 
                      echo'
                      <script>
                          
                      location.reload();
                      </script>        
                      ';
            }
            
            
            
            

       
          return $nomubic." ".$buscanen;

          

}

/* funcion principal */
function PedHarinas($rjdhfbpqj,$id_producto,$id_orden){
    $sqenordi2 = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$id_orden' and id_producto=$id_producto and picking='0'");
    if ($rowodpro = mysqli_fetch_array($sqenordi2)) {
       
        $kilosventa=$rowodpro['kilos']; 
    }

    /* como viene el producto */

    $sqerdi2 = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
    if ($rowodprod = mysqli_fetch_array($sqerdi2)) {
        $kilopresen=$rowodprod['kilo'];
        if($kilopresen < 20){$kilopresen=20;} 
    }

/* saber si es envasado */
if($kilosventa < $kilopresen){
    //"Va a envasado ".$kilosventa."Kg."
    //$resultped="Va a envasado ".$kilosventa."Kg.";
    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
    if ($rowod = mysqli_fetch_array($sqen)) {
             $resultped=$rowod["pascol"];
            }

}
else{
   // $resultped="Se pide en deposito ".$kilosventa."Kg.";


        if ($kilosventa >= $kilopresen) {

          

            $DondPedir=DondPedir($rjdhfbpqj,$id_producto,$id_orden);
            //$resultped="$kilosventa Kg. ".$DondPedir;
           //$resultped=$DondPedir;
           
            $resultped=$DondPedir."|0|".$kilopresen;

        } else {

            $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
            if ($rowod = mysqli_fetch_array($sqen)) {
                     $pascol=$rowod["pascol"];
                    }

            $residuo = $kilosventa % $kilopresen;
                $diferencia = $residuo;
                $kilodeposito = $kilosventa - $residuo;
                $sumakilos = "1";
                
                /* cuanto pido a envasado */
              //  $pidoenvasa="a estanteria pido ".$diferencia."Kg.<br><br>";
            
             
             




             $resultped=$pascol."|".$kilodeposito."|".$sumakilos;

        }
  










}



    return $resultped;
}
                        ?>
