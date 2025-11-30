<?php 
function ModificoStock($rjdhfbpqj, $idproduc, $id_orden) {

  
        // Consulta para obtener el historial de la orden
        $sqlHistorial = mysqli_query($rjdhfbpqj, "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$id_orden'");
    
        $historial = [];
        while ($rowHistorial = mysqli_fetch_array($sqlHistorial)) {
            $historial[] = [
                'cantidad' => $rowHistorial['CantStock'],
                'vencimiento' => $rowHistorial['fecven']
            ];
        }
    
        // Función para revertir el stock
        function revertirStock(&$stock, $historial) {
            foreach ($historial as $item) {
                $fecha = $item['vencimiento'];
                $cantidadARevertir = $item['cantidad'];
    
                // Buscar el lote correspondiente en el stock
                foreach ($stock as &$lote) {
                    if ($lote['vencimiento'] === $fecha) {
                        $lote['cantidad'] += $cantidadARevertir;
                        break;
                    }
                }
            }
        }
    
        // Consulta para obtener el stock del producto ordenado por fecha de vencimiento
        $sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc' ORDER BY fecven ASC");
    
        $stock = [];
        while ($rowsddk = mysqli_fetch_array($sqlesw)) {
            $stock[] = [
                'cantidad' => $rowsddk['CantStock'],
                'vencimiento' => $rowsddk['fecven']
            ];
        }
    
        // Revertir el stock
        revertirStock($stock, $historial);
    
        // Actualizar la base de datos con el nuevo stock
        foreach ($stock as $lote) {
            $cantidadActualizada = $lote['cantidad'];
            $vencimiento = $lote['vencimiento'];
            $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
            mysqli_query($rjdhfbpqj, $sql);
        }
    
        // Eliminar el registro del historial
        $sqlEliminarHistorial = "DELETE FROM histostock WHERE id_producto = '$idproduc' AND id_orden = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlEliminarHistorial);
}

?>
