
<button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#respa">Resumen</button>

<br>
<div id="respa" class="collapse">


<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
?>



        <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">Resumen de Productos</th>

                            <th class="text-center" style="width: 20mm;">Total</th>

                        </tr>
                    </thead>
                    <tbody>

                        
                    <?php //Where ordenbajar.fecha = '$fechahoy'  ORDER BY `itembajar`.`producto` ASC

// Array para almacenar los colores
$colores = array('#F3F37A', '#C3C3C7');
// Índice para seguir el color en el array $colores
$indice_color = 0;



$colores_productos = array();


                        $sqljoinre = mysqli_query($rjdhfbpqj, "SELECT 
                        ordenbajar.id, ordenbajar.fecha, ordenbajar.preparado, ordenbajar.fin, ordenbajar.id_usuarioclav, ordenbajar.numero,
                        
                        
                        itembajar.unidad, itembajar.cantidad, itembajar.id_orden, itembajar.producto, itembajar.listo
                        FROM ordenbajar INNER JOIN itembajar 
                        
                        ON ordenbajar.id = itembajar.id_orden 
                        Where ordenbajar.fin = '1' and  (ordenbajar.preparado = '1' or ordenbajar.preparado = '0') and itembajar.listo='0' ORDER BY `itembajar`.`producto` ASC
                        
                        
                        ");





                    while ($rowordere = mysqli_fetch_array($sqljoinre)) {

                        
                       // Verificar si ya se asignó un color para este nombre de producto
    if (isset($colores_productos[$rowordere['producto']])) {
        $color = $colores_productos[$rowordere['producto']];
    } else {
        // Obtener el siguiente color del array $colores
        $color = $colores[$indice_color];
        // Incrementar el índice para el siguiente color
        $indice_color = ($indice_color + 1) % count($colores);
        // Almacenar el color asociado con el nombre del producto
        $colores_productos[$rowordere['producto']] = $color;
    }

  
    $producto = $rowordere['producto'];

    // Verificar si es la última repetición del producto
    $ultima_repeticion = ($repeticiones_por_producto[$producto] == $cantidad_por_producto[$producto]);

     // Incrementar el contador de repeticiones para el producto actual
     if (isset($repeticiones_por_producto[$producto])) {
        $repeticiones_por_producto[$producto]++;
    } else {
        $repeticiones_por_producto[$producto] = 1;
    }

    $cantidad = $rowordere['cantidad'];
    if (isset($cantidad_por_producto[$producto])) {
        $cantidad_por_producto[$producto] += $cantidad;
    } else {
        $cantidad_por_producto[$producto] = $cantidad;
    }

       // Verificar si es la última repetición para mostrar la cantidad total
       if ($repeticiones_por_producto[$producto] == $cantidad_por_producto[$producto]) {
        $ultima_repeticion = '1';
    } else {
        $ultima_repeticion = '2'+1;
    }
    
    $sqlcapror=${"sqlcapror".$idpr};
    $canverificafin=${"canverificafin".$idpr};
    $vapr=${"vapr".$idpr};
    $rowosdgd=${"rowosdgd".$idpr};
    $canpr=${"canpr".$idpr};

   $sqlcapror = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar Where fecha = '$fechahoy' and producto='$producto'  and listo='0'");
   $canverificafin = mysqli_num_rows($sqlcapror);


   if ($repeticiones_por_producto[$producto] == $canverificafin && $canverificafin !='1') {
    $vapr="1";
}else{ $vapr="2";}

    

                        echo '
                        <tr>
                       
                        <td  style="padding-left: 2mm; background-color:' . $color . ';">' . $canpr . '' . $rowordere['producto'] . ' </td>';
                      echo' 
                        <td class="text-center" style=" background-color:' . $color . '; place-items: center; '.$fonverde.'">';
                        
                    // Verificar si es la última repetición para mostrar la cantidad total
            if ($repeticiones_por_producto[$producto] == $canverificafin && $canverificafin !='1') {
                echo ''.$cantidad_por_producto[$producto].' ' . $rowordere['unidad'] . '';
            }else{
                
                if ($canverificafin =='1') {
                    echo ''. $rowordere['cantidad'].' ' . $rowordere['unidad'] . '';
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