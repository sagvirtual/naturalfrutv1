<?php
function ModoPercep($rjdhfbpqj, $id_orden)
{
    $sqlunidpercep = mysqli_query($rjdhfbpqj, "SELECT * FROM unidpercep Where id_orden = '$id_orden'");
    if ($rowspercep = mysqli_fetch_array($sqlunidpercep)) {
        $tipounidpre = $rowspercep['tipounid'];
    }
    if ($tipounidpre == '1') {
        $perseseleca = 'Transferencia';
    } else {
        $perseseleca = 'Percepción';
    }
    return $perseseleca;
}
