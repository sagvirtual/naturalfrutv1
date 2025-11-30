<?php

function fechalista($rjdhfbpqj){

   $sqenowi = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista  ORDER BY `editlista`.`id` DESC");
   if ($rowoddi = mysqli_fetch_array($sqenowi)) {
 
 
     $fechalita=$rowoddi['fecha'];
 
   }
   return  $fechalita;
 }
/*  function fechalista(){
    return  $fechalita="2129-12-12";
 } */
?>