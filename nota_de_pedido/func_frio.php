<?php
 function frio($rjdhfbpqj,$id_producto){
 $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
 if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
 $esfrio=$rowpdaod['kgaprox'];}

return $esfrio;
 }


?>