<?php
 

    function frioordenes($rjdhfbpqj,$id_hoja,$id_produc){

  

      $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_producto, e.kilos, e.tipounidad, e.fecha, e.id_orden, 
        u.id, u.ubicacion, u.nombre, u.kilo, u.kgaprox,u.unidadnom,u.id as idpro,
        o.id_hoja,o.id AS orden_id
        
        FROM orden o INNER JOIN item_orden e  ON o.id = e.id_orden
        INNER JOIN productos u ON e.id_producto = u.id 
        Where o.id_hoja = '$id_hoja' and u.id='$id_produc'  and u.kgaprox='1' ORDER BY `nombre` ASC");
        
       
        while ($rowpdaod = mysqli_fetch_array($querycliordn)) {
            $idpro=$rowpdaod['idpro'];
            
            $ordenes.="Nº".$rowpdaod['orden_id'].", ";
            
            $totalkilos+=$rowpdaod['kilos'];
            $unidadnom=$rowpdaod['unidadnom'];
            $nombdre=$rowpdaod['nombre'];
            $canverificafin = $canverificafin+1;
       
            
        }
         
        echo '<br>Ordene/s: '.$ordenes.' <br>Producto: <b>'.$nombdre.'</b><br>Cantidad: <b>'.$totalkilos.' '.$unidadnom.'</b><br><br>';
       
      

       

    }


    function frioordenestotal($rjdhfbpqj, $id_hoja) {
        // Array para almacenar los IDs de los productos ya procesados
        $procesados = [];
    
        $querycliordn = mysqli_query($rjdhfbpqj, "
            SELECT 
                e.id_producto, e.kilos, e.tipounidad, e.fecha, e.id_orden,
                u.id, u.ubicacion, u.nombre, u.kilo, u.kgaprox, u.unidadnom, u.id as idpro,
                o.id_hoja, o.id AS orden_id
            FROM orden o 
            INNER JOIN item_orden e ON o.id = e.id_orden
            INNER JOIN productos u ON e.id_producto = u.id 
            WHERE o.id_hoja = '$id_hoja' AND u.kgaprox = '1'
            ORDER BY u.nombre ASC
        ");
        
        while ($rowpdaod = mysqli_fetch_array($querycliordn)) {
            $idpro = $rowpdaod['idpro'];
           
            // Comprobar si el producto ya fue procesado
            if (!in_array($idpro, $procesados)) {
                // Procesar el producto
                frioordenes($rjdhfbpqj, $id_hoja, $idpro);
                
                // Agregar el producto al array de procesados
                $procesados[] = $idpro;
            }
        }
    }
    
   
 
?>