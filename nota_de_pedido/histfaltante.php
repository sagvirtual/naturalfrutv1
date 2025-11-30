<?php

if (empty($histofal)) {
    $histodfal = 1;
}
if ($histofal == 1) {
    $histodfal = 0;
} else {
    $histdofal = 1;
}


$sqelh = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_cliente='$id_clienteint'");
if ($rowh = mysqli_fetch_array($sqelh)) {
    echo ' 
                  
                             
                              <div class="col-lg-12 fixed-bottom-left text-center">               
                          <a href="?jhduskdsa=' .  $id_clientecod . '&orjndty=' . $id_ordencod . '&histofal=' . $histodfal . '">   <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#idaltanteh" aria-expanded="false" aria-controls="idaltanteh" style="width:100%;">
       Historial Faltantes
            </button></a> ';
    if ($histofal == 1) {
        echo '       <div id="idaltanteh" class="collapse show" >
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th scope="col" >Nº</th>
                                                <th scope="col" >Fecha</th>
                                                <th scope="col" >Productos</th>
                                                <th scope="col">Unid.</th>
                                            </tr>
                                        </thead>
                                        <tbody>';


        $sqlhh = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_cliente='$id_clienteint' and id_orden!='$id_orden' ORDER BY `faltantes`.`fecha_accion` DESC limit 100");
        while ($rowhh = mysqli_fetch_array($sqlhh)) {
            $id_producto = $rowhh['id_producto'];
            $id_falta = $rowhh['id'];
            $id_ordenh = $rowhh['id_orden'];
            $entrofal = ${"entrofal" . $id_producto};
            $tipounidadfal = $rowhh['tipounidad'];
            $cantidadfal = $rowhh['cantidad'];
            $fechahis = date('d/m/y', strtotime($rowhh['fecha']));
            $CandtStdocks = SumaStock($rjdhfbpqj, $id_producto);
            if ($CandtStdocks > 1) {
                $hassrs = '<i style="color:red;">hay Stock</i>';
            } else {
                $hassrs = "";
            }
            $sqlhdh = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto='$id_producto' and id_orden >'$id_ordenh' and id_cliente='$id_clienteint'");
            if ($rowhdh = mysqli_fetch_array($sqlhdh)) {
                $yasepidio = 'style="text-decoration: line-through; color:red;"';
            } else {
                $yasepidio = '';
            }


            $sqlproh = mysqli_query($rjdhfbpqj, "SELECT id,nombre,modo_producto,unidadnom FROM productos Where id='$id_producto' ");
            if ($rownoombrh = mysqli_fetch_array($sqlproh)) {
                $nombrpro = $rownoombrh['nombre'];
                if ($tipounidadfal == '0') {
                    $sedeeund0f = $rownoombrh['unidadnom'];
                } else {
                    $sedeeund0f =  $rownoombrh['modo_producto'];
                }
            }



            echo '
            <tr>
                <td scope="row" class="text-center" ' . $yasepidio . '>Nº' . $id_ordenh . '</td>
                <td scope="row" class="text-center" ' . $yasepidio . '>' . $fechahis . '</td>
                <td scope="row" class="text-left" ' . $yasepidio . '>' . $nombrpro . ' </td>
                <td scope="row" class="text-left" ' . $yasepidio . '>' . $cantidadfal . ' ' . $sedeeund0f . ' ' . $hassrs . ' </td>
 </tr>';
        }
        echo '</tbody>
                                    </table>
                                </div>';
    }
    echo '</div>
                               
    ';
    mysqli_close($rjdhfbpqj);
}
