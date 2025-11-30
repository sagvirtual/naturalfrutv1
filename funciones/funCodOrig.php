<?php
 function NombreZona($rjdhfbpqj,$id_usuario){

$sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where  id = '$id_usuario'");
 if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {  
    $zonaid = $rowusuarios["zona"];    
         
         
         $sqlleadd=mysqli_query($rjdhfbpqj,"SELECT * FROM zona Where id = '$zonaid'");
         if ($rowleadd = mysqli_fetch_array($sqlleadd)){
             $zonad=$rowleadd["nombre"];
         }
          
        }

 return $zonad;
 }
?>