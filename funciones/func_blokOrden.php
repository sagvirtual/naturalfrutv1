<?php
function blokOrden($rjdhfbpqj, $id_orden){
   
    // ver ordenes concretadas
    $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id='$id_orden'and col = '8'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)){
    
    $id_cliente=$rowordenx['id_cliente'];
    $fecha=$rowordenx['fecha'];



    

    $sqlodd=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_orden='$id_orden' and id_cliente = '$id_cliente' and modo='1'");
    if ($rowoded = mysqli_fetch_array($sqlodd)){
       $fechafactura= $rowoded['fecha'];


    }else{
        $sqlod=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_orden='$id_orden' and id_cliente = '$id_cliente' and modo='0'");
        if ($roworded = mysqli_fetch_array($sqlod)){
           $fechafactura= $roworded['fecha'];
    
    
        }


    }


   

    $dias = (new DateTime())->diff(new DateTime($fechafactura))->days;
    

    if ($dias > 30) {
     $bloked=1;
    }else{$bloked=0;}
    }else{
        $bloked=0;

    }


    // si hay

return $bloked;

}
