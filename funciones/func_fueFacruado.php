<?php
function fueFacturado($rjdhfbpqj, $id_orden)
{

    $sqe = mysqli_query($rjdhfbpqj, "SELECT id_orden,quienfac,nfactura,emitida,enviada FROM facturacion Where id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sqe)) {
        $quienfac  = $row["quienfac"];
        $nfactura  = $row["nfactura"];
        $emitida  = $row["emitida"];
        $enviada  = $row["enviada"];
        if ($emitida == 1 && $enviada == 0) {
            $emitidad = "Emitida";
        } elseif ($enviada == 1) {
            $emitidad = "Emitida y Enviada";
        } else {
            $emitidad = "Ingresando";
        }
    } else {
        $quienfac  = 0;
        $nfactura  = 0;
    }

    // Devuelve un array con ambos valores
    return array('quienfac' => $quienfac, 'nfactura' => $nfactura, 'emitida' => $emitidad);
}
