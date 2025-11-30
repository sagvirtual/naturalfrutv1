<?php
 function funcunidProd($rjdhfbpqj,$id_producto){

$sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  id = '$id_producto'");
 if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
    $unidadnom = $rowusuarios["unidadnom"];  
               
        }

 return $unidadnom;
 }
?>