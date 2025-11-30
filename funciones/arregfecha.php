<?php
// dates order me

function arreglofech($fechaarreg){

$fechaexpl=explode("-", $fechaarreg);

if(!empty($fechaarreg)){
echo ''.$fechaexpl[2].'/'.$fechaexpl[1].'/'.$fechaexpl[0].'';

}

} 

 
?>