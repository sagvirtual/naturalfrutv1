<?php
 function nombrunid($rjdhfbpqj,$id_producto){
 $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
 if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
 $unidadnom=$rowpdaod['unidadnom'];}

return $unidadnom;
 }

 function nombrbult($rjdhfbpqj,$id_producto){
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
    $modo_producto=$rowpdaod['modo_producto'];}
   
   return $modo_producto;
      }

      function codigopro($rjdhfbpqj,$id_producto){
         $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
         if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
         $codigo_pro=$rowpdaod['codigo'];
      
      if($codigo_pro > 1){

         $codigo_pro = substr($codigo_pro, -4);
      }else{$codigo_pro='0000';}
      
      }
        
        return $codigo_pro;
           }

    function cantbult($rjdhfbpqj,$id_producto){
        $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
        if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        $cantidbiene=$rowpdaod['kilo'];}
       
       return $cantidbiene;
        }


        function nombrbultnota($rjdhfbpqj,$id_producto,$unidad){
         $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
         if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
            if($unidad=='1'){
            $producto=$rowpdaod["nombre"]." ".$rowpdaod["modo_producto"]." x ".$rowpdaod["kilo"]." ".$rowpdaod["unidadnom"];
            }else{

               $producto=$rowpdaod["nombre"];
            }
         }
        
        return $producto;
           }


?>