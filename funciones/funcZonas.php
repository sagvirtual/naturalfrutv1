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





     function NombreZonaOrden($rjdhfbpqj, $id_orden) {
        $sql = "
            SELECT 
                z.nombre AS nombre_zona
            FROM 
                orden o
            INNER JOIN 
                clientes c ON o.id_cliente = c.id
            INNER JOIN 
                zona z ON c.zona = z.id
            WHERE 
                o.id = '$id_orden'
        ";
    
        $resultado = mysqli_query($rjdhfbpqj, $sql);
    
        if ($fila = mysqli_fetch_assoc($resultado)) {
            return " (" . $fila['nombre_zona'] . ")";
        } else {
            return null; // Si no se encuentra el registro
        }
    }

    


?>