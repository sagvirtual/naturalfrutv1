<?php
function verfaltantes($rjdhfbpqj, $id_orden, $tipo_usuario)
{

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$id_orden'");



    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $colestado = $rowordenx['col'];
    }


    $sqel = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sqel)) {
        $id_cldiente = $row['id_cliente'];
        $comillas = "'";
        echo ' 
                  
                             
                              <div class="col-lg-12 fixed-bottom-left text-center"> ';
        if ($colestado <= '5') {
            $entrdofal = entrofaltangral($rjdhfbpqj, $id_orden, $id_cldiente);
            if ($entrdofal == '1') {

                echo '  <div class="cocarda text-center" style="width: 100%;">Ingreso en Stock Producto/s</div>';
            }
        }
        echo '
                              
                              <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#idaltante" aria-expanded="false" aria-controls="idaltante" style="width:100%;">
        Faltantes Presionar F6 o Shift
    </button><br><br><br>
                              <div id="idaltante" class="collapse';

        if ($tipo_usuario != 30) {

            echo 'show';
        }


        echo '" style="position:relative; top:-50px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Id</th>
                                                <th scope="col" >Productos</th>
                                                <th scope="col">Unid.</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>';


        $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_orden='$id_orden' ORDER BY `faltantes`.`fecha_accion` DESC");
        while ($row = mysqli_fetch_array($sql)) {
            $id_producto = $row['id_producto'];
            $id_falta = $row['id'];
            $entrofal = ${"entrofal" . $id_producto};
            $tipounidadfal = $row['tipounidad'];
            $cantidadfal = $row['cantidad'];
            if ($tipounidadfal == '0') {
                $sedeeund0f = "selected";
            } {
                $sedeeund0f = "";
            }
            if ($tipounidadfal == '1') {
                $sedeeund1f = "selected";
            } else {
                $sedeeund1f = "";
            }

            $sqlpro = mysqli_query($rjdhfbpqj, "SELECT id,nombre,modo_producto,unidadnom FROM productos Where id='$id_producto' ");
            if ($rownoombr = mysqli_fetch_array($sqlpro)) {
                $nombrpro = $rownoombr['nombre'];
                $modo_productofal = $rownoombr['modo_producto'];
                $unidadnomfal = $rownoombr['unidadnom'];
            }


            $sqlpro = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden' and id_producto='$id_producto' ");
            if ($rownoombr = mysqli_fetch_array($sqlpro)) {

                $sqlfaltan = "DELETE FROM faltantes WHERE id_producto = '$id_producto' AND id_orden = '$id_orden'";
                mysqli_query($rjdhfbpqj, $sqlfaltan);
            } else {

                echo '
     <tr>
       <td scope="row" class="text-center">' . $id_producto . '</td>
       <td scope="row" class="text-left">' . $nombrpro . '';

                if ($colestado <= '5') {
                    $entrofal = entrofaltan($rjdhfbpqj, $id_cldiente, $id_orden, $id_producto);
                    if ($entrofal == '1') {

                        echo '  <br><div class="cocarda text-center" style="width: 100%;">Hay Stock..</div>';
                    }
                }

                echo '</td>
       <td scope="row" class="text-left">';

                echo '
       <select name="unidadfal' . $id_falta . '" id="unidadfal' . $id_falta . '" class="form-select text-center"  onchange="ajax_cantfaltan($(' . $comillas . '#unidadfal' . $id_falta . '' . $comillas . ').val(),$(' . $comillas . '#cantidadfal' . $id_falta . '' . $comillas . ').val(),' . $comillas . '' . $id_falta . '' . $comillas . ');" >
     
           <option value="0" ' . $sedeeund0f . '>' . $unidadnomfal . '</option>
          <option value="1" ' . $sedeeund1f . '>' . $modo_productofal . '</option>
      
      
      ';



                echo '</select>
       
       <input type="text"  id="cantidadfal' . $id_falta . '" class="form-control  text-center" style="text-align:right;" style="text-align:right; width: 100px;"  value="' . $cantidadfal . '" onclick="select()"
       
       oninput="ajax_cantfaltan($(' . $comillas . '#unidadfal' . $id_falta . '' . $comillas . ').val(),$(' . $comillas . '#cantidadfal' . $id_falta . '' . $comillas . ').val(),' . $comillas . '' . $id_falta . '' . $comillas . ');">
       
       </td>


         

       <td colspan="2" class="text-center">      
       
         <button type="button" class="btn btn-danger btn-sm"  ondblclick="ajax_elfaltan(' . $comillas . '' . $id_falta . '' . $comillas . ',' . $comillas . '' . $id_producto . '' . $comillas . ');" tabindex="-1">X</button>
       
       
       
       
       
       </td>
    </tr>';
            }
        }
        echo '</tbody>
                                    </table>
                                </div>
                                </div>
                               
    ';
    }
    $sdql = mysqli_query($rjdhfbpqj, "SELECT * FROM faltantes Where id_orden='$id_orden' ORDER BY `faltantes`.`fecha_accion` DESC");
    if ($rowd = mysqli_fetch_array($sdql)) {
        $id_faltda = $rowd['id'];
    }


    echo '
<script>
   document.addEventListener("keydown", function(event) {

      if (document.activeElement.id === "observacion") {
        return;
    }
    if (event.key === "F6" || event.shiftKey) {
        event.preventDefault();
        let input = document.getElementById("cantidadfal' . $id_faltda . '");
        if (input) {
            input.focus();
            input.select();
        }
    }
});
</script>
<script>
   document.addEventListener("keydown", function(event) {
    if (event.key === "F5" || event.altKey ) {
        event.preventDefault();
        let input = document.getElementById("producto");
        if (input) {
            input.focus();
            input.select();
        }
    }
});
</script>
';
}
