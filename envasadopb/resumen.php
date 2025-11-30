
<button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#respapb">Resumen</button>

<br>
<div id="respapb" class="collapse">


<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
?>



        <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                        <th class="text-center" style="width: 20mm;">Orden</th>

                            <th class="text-center">Resumen de todos los Productos</th>

                            <th class="text-center" style="width: 20mm;">Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        
                    <?php //Where ordeneva.fecha = '$fechahoy'  ORDER BY `itemenvas`.`producto` ASC

// Array para almacenar los colores
$colorespb = array('#F3F37A', '#C3C3C7');
// Índice para seguir el color en el array $colorespb 
$indice_colorpb = 0;



$colores_productospb = array();


                        $sqljoinrepb = mysqli_query($rjdhfbpqj, "SELECT
                        ordeneva.id, ordeneva.fecha, ordeneva.preparado, ordeneva.fin, ordeneva.id_usuarioclav, ordeneva.numero,
                        
                        
                        itemenvas.unidad, itemenvas.cantidad, itemenvas.id_orden, itemenvas.producto, itemenvas.listo
                        FROM ordeneva INNER JOIN itemenvas 
                        
                        ON ordeneva.id = itemenvas.id_orden 
                        Where  ordeneva.fin= '1' and  (ordeneva.preparado = '1' or ordeneva.preparado = '0'  or ordeneva.preparado = '4' or ordeneva.preparado = '5' or ordeneva.preparado = '6') and itemenvas.listo='0' ORDER BY `itemenvas`.`producto` ASC
                        
                        
                        ");





                    while ($roworderepb = mysqli_fetch_array($sqljoinrepb)) {

                        
                       // Verificar si ya se asignó un color para este nombre de producto
    if (isset($colores_productospb[$roworderepb['producto']])) {
        $colorpbr = $colores_productospb[$roworderepb['producto']];
    } else {
        // Obtener el siguiente color del array $colorespb
        $colorpbr = $colorespb[$indice_colorpb];
        // Incrementar el índice para el siguiente color
        $indice_colorpb = ($indice_colorpb + 1) % count($colorespb);
        // Almacenar el color asociado con el nombre del producto
        $colores_productospb[$roworderepb['producto']] = $colorpbr;
    }

  
    $productopb = $roworderepb['producto'];

    // Verificar si es la última repetición del producto
    $ultima_repeticionpb = ($repeticiones_por_productopb[$productopb] == $cantidad_por_productopb[$productopb]);

     // Incrementar el contador de repeticiones para el producto actual
     if (isset($repeticiones_por_productopb[$productopb])) {
        $repeticiones_por_productopb[$productopb]++;
    } else {
        $repeticiones_por_productopb[$productopb] = 1;
    }

    $cantidad = $roworderepb['cantidad'];
    if (isset($cantidad_por_productopb[$productopb])) {
        $cantidad_por_productopb[$productopb] += $cantidad;
    } else {
        $cantidad_por_productopb[$productopb] = $cantidad;
    }

       // Verificar si es la última repetición para mostrar la cantidad total
       if ($repeticiones_por_productopb[$productopb] == $cantidad_por_productopb[$productopb]) {
        $ultima_repeticionpb = '1';
    } else {
        $ultima_repeticionpb = '2'+1;
    }
    
    $sqlcaprorpb=${"sqlcaprorpb".$idpr};
    $canverificafinpb=${"canverificafinpb".$idpr};
    $vaprpb=${"vaprpb".$idpr};
    $rowosdgd=${"rowosdgd".$idpr};
    $canpr=${"canpr".$idpr};

   $sqlcaprorpb = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where fecha = '$fechahoy' and producto='$productopb'  and listo='0'");
   $canverificafinpb = mysqli_num_rows($sqlcaprorpb);


   if ($repeticiones_por_productopb[$productopb] == $canverificafinpb && $canverificafinpb !='1') {
    $vaprpb="1";
}else{ $vaprpb="2";}

    

                        echo '
                        <tr>
                       
                        <td  style="text-align:center; 2mm; background-color:' . $colorpbr . ';">' . $roworderepb['numero'] . ' </td>
                        <td  style="padding-left: 2mm; background-color:' . $colorpbr . ';">' . $canpr . '' . $roworderepb['producto'] . ' </td>';
                      echo' 
                        <td class="text-center" style=" background-color:' . $colorpbr . '; place-items: center; '.$fonverde.'">';
                        
                    // Verificar si es la última repetición para mostrar la cantidad total
            if ($repeticiones_por_productopb[$productopb] == $canverificafinpb && $canverificafinpb !='1') {
                echo ''.$cantidad_por_productopb[$productopb].' ' . $roworderepb['unidad'] . '';
            }else{
                
                if ($canverificafinpb =='1') {
                    echo ''. $roworderepb['cantidad'].' ' . $roworderepb['unidad'] . '';
                }
            
            
            }
                    
                    echo '</td>
                    </tr>';

                    

                    
                    }

                    ?>

                        <br>
                    </tbody>
                </table>


    </div>
</div>
