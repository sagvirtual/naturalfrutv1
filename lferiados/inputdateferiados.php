<?php 
 
 $sqlferiadosa = mysqli_query($rjdhfbpqj, "SELECT * FROM feriados  Where fecha >='$fechahoy' ORDER BY `feriados`.`fecha`");
 while ($rowferiadosa = mysqli_fetch_array($sqlferiadosa)) {
    $gechasferd.='"'.$rowferiadosa['fecha'].'", ';
}
$gechasferdd="[".$gechasferd."]";
$arreglofer = str_replace('", ]', '"]', $gechasferdd);
?>
