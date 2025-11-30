<?php
function verfaltapdf($rjdhfbpqj,$id_orden){
    $sqel=mysqli_query($rjdhfbpqj,"SELECT * FROM faltantes Where id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sqel)){
echo ' 
                                   <br>  <table style="border: 1px solid black; padding: 2px; width:300px; font-size: 8pt; ">
                                        <thead>
                                            <tr>
                                                <th style="text-align:left;">Productos Faltantes</th>
                                            </tr>
                                        </thead>
                                        <tbody>';


    $sql=mysqli_query($rjdhfbpqj,"SELECT * FROM faltantes Where id_orden='$id_orden' ORDER BY `faltantes`.`fecha_accion` DESC");
    while ($row = mysqli_fetch_array($sql)){
        $id_producto=$row['id_producto'];
        $id_falta=$row['id'];

        $sqlpro=mysqli_query($rjdhfbpqj,"SELECT id,nombre FROM productos Where id='$id_producto' ");
        if ($rownoombr = mysqli_fetch_array($sqlpro)){
            $nombrpro=$rownoombr['nombre'];
        }




echo'
     <tr>
       <td >'.$nombrpro.'</td>
    </tr>';
    }
    echo '</tbody>
                                    </table>
   
    ';

}

}
 

?>