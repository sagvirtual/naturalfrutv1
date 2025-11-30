<?php 
function ActualizaStock($rjdhfbpqj, $idproduc, $cantidad, $id_orden) {

    // Consulta para obtener el stock del producto ordenado por fecha de vencimiento
    $sqlesw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 WHERE id_producto = '$idproduc' and CantStock >'0' ORDER BY fecven ASC");

    $stock = [];
    while ($rowsddk = mysqli_fetch_array($sqlesw)) {
        $stock[] = [
            'cantidad' => $rowsddk['CantStock'],
            'vencimiento' => $rowsddk['fecven']
        ];
    }

    // Función para descontar el stock
    function descontarStock(&$stock, $cantidad, $rjdhfbpqj, $idproduc, $id_orden) {
        foreach ($stock as &$lote) {
            if ($cantidad <= 0) {
                break;
            }

            $cantidadOriginal = $lote['cantidad'];
            $cantidadDescontada = 0;

            if ($lote['cantidad'] >= $cantidad) {
                $cantidadDescontada = $cantidad;
                $lote['cantidad'] += $cantidad;
                $cantidad = 0;
            } else {
                $cantidadDescontada = $lote['cantidad'];
                $cantidad += $lote['cantidad'];
                $lote['cantidad'] = 0;
            }

            // Insertar en histostock la cantidad descontada


$sqlh = "SELECT * FROM histostock WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
$result = mysqli_query($rjdhfbpqj, $sqlh);
if (mysqli_num_rows($result) > 0) {
    // Actualizar el registro existente
    if($cantidadDescontada > 0){
    $sqlh = "UPDATE histostock SET CantStock = '$cantidadDescontada' WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlh);}else{   
         $sqlborr ="delete from histostock WHERE id_producto = '$idproduc' AND fecven = '{$lote['vencimiento']}' and id_orden='$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));}
} else {
    // Insertar un nuevo registro
    if($cantidadDescontada > 0){
    $sqlh = "INSERT INTO histostock (id_producto, CantStock, fecven, id_orden) VALUES ('$idproduc', '$cantidadDescontada', '{$lote['vencimiento']}', '$id_orden')";
    mysqli_query($rjdhfbpqj, $sqlh);
}
}





        }
        return $cantidad; // Retorna la cantidad que no se pudo descontar, si hay alguna
    }

    // Descontar el stock
    $restante = descontarStock($stock, $cantidad, $rjdhfbpqj, $idproduc, $id_orden);

    // Actualizar la base de datos con el nuevo stock
    foreach ($stock as $lote) {
        $cantidadActualizada = $lote['cantidad'];
        $vencimiento = $lote['vencimiento'];
        $sql = "UPDATE stockhgz1 SET CantStock = '$cantidadActualizada' WHERE id_producto = '$idproduc' AND fecven = '$vencimiento'";
        mysqli_query($rjdhfbpqj, $sql);
    }
}

?>
