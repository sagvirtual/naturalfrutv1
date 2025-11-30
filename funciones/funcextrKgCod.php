<?php
 
 function extrikg($kisocod){
    //ej: $kisocod=9780005008515;
    $intermedio = substr($kisocod, 3, -6);
    $resultado = ltrim($intermedio, '0');
    return $resultado;
    }
    
 
?>