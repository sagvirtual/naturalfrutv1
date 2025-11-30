<?php


function porcentajeorden($fechaarreg,$rjdhfbpqj){
    //CANTIDAD TOTAL DE ORDENES
    $sqlorden=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where fecha = '$fechaarreg'");
    $cantidadordens = mysqli_num_rows($sqlorden);

    //CANTIDAD DE ORDENES FINALIZADAS
    $sqlordenF=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where fecha = '$fechaarreg' AND finalizada='1'");
    $cantidadordensF = mysqli_num_rows($sqlordenF);


    $portola=$cantidadordensF*100/$cantidadordens;
    $portolav=number_format($portola, 0, '', '');


    if($portolav!='100'){

echo '
<span class="float-right" style="position:relative; top:-9px;">'.$portolav.'% </span>
<div class="progress mb-3" style="height: 5px;">
   <div class="progress-bar" role="progressbar" style="width: '.$portolav.'%;" aria-valuenow="'.$portolav.'" aria-valuemin="0" aria-valuemax="100"> </div>
</div>
<span class="badge badge-pill badge-success">'.$cantidadordensF.' / '.$cantidadordens.'</span>

';}
} 


 
?>