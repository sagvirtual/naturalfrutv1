<?php 
   function NombrePCF($rjdhfbpqj,$pascolo){
    /* saco el nombre del pasill fila y columna] */
if (strlen($pascolo) == 13){
$cod12 = substr($pascolo, 0, -1);
$codId = $cod12-878000000000;
}else{$codId = $pascolo-878000000000;}

$sqlzona = mysqli_query($rjdhfbpqj, "SELECT * FROM picking Where id = '$codId'");
if ($rowzona = mysqli_fetch_array($sqlzona)) {  
$vemoselv = $rowzona["nombre"];
}else{$vemoselv='';

}
return $vemoselv;
mysqli_close($rjdhfbpqj);
}

                        ?>
