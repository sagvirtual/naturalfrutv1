
   <?php

    function colorearFecha($fecha)
    {


        $fechaActual = new DateTime();
        $fechaComparar = DateTime::createFromFormat('d/m/y', $fecha);

        if (!$fechaComparar) {
            return "grey"; // Fecha inválida
        }

        $diferencia = $fechaComparar->diff($fechaActual);
        $diasDiferencia = $diferencia->days;
        $mesesDiferencia = ($diferencia->y * 12) + $diferencia->m;

        if ($mesesDiferencia < 1) {
            return "yellow"; // Menos de 30 días
        } elseif ($mesesDiferencia == 1 && $diasDiferencia < 60) {
            return "orange"; // Hace 1 mes
        } elseif ($mesesDiferencia >= 2) {
            return "red"; // Hace más de 2 meses
        } else {
            return "grey"; // En caso de que la fecha sea incorrecta
        }
    }


    function faltantespiden($rjdhfbpqj, $id_producto)
    {

        $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
        faltantes.id_orden,faltantes.id_producto, orden.id, orden.col

        FROM faltantes INNER JOIN orden ON faltantes.id_orden = orden.id 

        WHERE  faltantes.id_producto='$id_producto' AND orden.col < '8'");

        if ($rowcompra = mysqli_fetch_array($sqlcompra)) {
            $estanpidiendo = "1";
        } else {
            $estanpidiendo = "0";
        }

        return $estanpidiendo;
    }


    function itemparcompras($rjdhfbpqj, $id_orden, $id_clienteint, $fechaordn, $horaord)
    {
        if (!empty($id_clienteint)) {

            function SumaStodck($rjdhfbpqj, $idproduc)
            {

                $CantStocdktotal = 0;

                $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc'");
                while ($rowsdk = mysqli_fetch_array($sqlsw)) {
                    $CantStocdktotal += $rowsdk['CantStock'];
                }

                if (empty($CantStocdktotal)) {
                    $CantStocktotal = '0';
                } else {
                    $CantStocktotal = $CantStocdktotal;
                }

                return $CantStocktotal;
            }



            function comanter($rjdhfbpqj, $id_producto, $id_clienteint)
            {

                // include('../control_stock/funcionStockS.php');

                $lown = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint' and id_producto='$id_producto' and cerrado='1' ORDER BY `fecha` DESC");
                if ($rowdorden = mysqli_fetch_array($lown)) {
                    $ordencompra = $rowdorden['id_orden'];
                    $tipounidad = $rowdorden['unid_bulto'];
                }


                $lorden = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_orden='$ordencompra' and id_producto='$id_producto' and nref='Compra'");
                if ($roworden = mysqli_fetch_array($lorden)) {

                    $cantidadCom = $roworden['agrstock'];
                    $fechault = date('d/m/y', strtotime($roworden['fecha']));
                    $fecven = date('d/m/y', strtotime($roworden['fecven']));
                    $costoCom = $roworden['costo_total'];
                    $costoxcajComs = $roworden['costoxcaja'];
                    $costoxcajCom = number_format($costoxcajComs, 2, '.', '');

                    $comviene = $roworden['kilo'];
                } else {
                    $lord = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
                    if ($rowordd = mysqli_fetch_array($lord)) {

                        $comviene = $rowordd['kilo'];
                    }
                    $fechault = '';
                    $cantidadCom = '0';
                    $fechault = '0';
                    $costoCom = '0';
                    $costoxcajCom = '0';
                }
                return array('cantidadCom' => $cantidadCom, 'costoCom' => $costoCom, 'costoxcajCom' => $costoxcajCom, 'tipounidad' => $tipounidad, 'comviene' => $comviene, 'fechault' => $fechault, 'ordencompra' => $ordencompra, 'fecven' => $fecven);
            }
            $canverificafin = 0; // ver si hay prblemas

            $comillas = "'";

            echo '   
                <div class="container-fluid">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                    <th style="text-align:left; padding-left: 10px;">Productos Sugeridos</th>
                    <th style="width: 10px;text-align:center;"></th>
                    <th style="width: 100px;text-align:center;">Stock</th>
                    <th style="width: 100px;text-align:center;background-color: red;">Stock Bulto</th>
                    <th style="width: 100px;text-align:center;">Bulto</th>

                        <th style="width: 110px;text-align:center;background-color: red;">UC Fecha </th>
                        <th style="width: 100px;padding-left: 10px;">UC Cant.</th>
                        <th style="width: 100px;padding-left: 10px;background-color: red;">UC Cant.Bulto</th>
                        <th style="width: 100px;text-align:center;">Bulto</th>
                        <th style="width: 100px;text-align:center;">Pedir</th>
                        <th style="width: 150px;text-align:center;">Costo</th>
                        <th style="width: 150px;text-align:center;">Total</th>
                        <th style="width: 100px;text-align:center;"></th>
                    </tr>
                </thead>
                <tbody>';
            $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_proveedor = '$id_clienteint'  and estado='0' ORDER BY `nombre` ASC");

            while ($roworden = mysqli_fetch_array($sqlorden)) {
                $iditeorfd = $roworden['id'];
                $id_producto = $roworden['id'];
                $nombrebult = $roworden['modo_producto'];
                $nombreunid = $roworden['unidadnom'];
                $nomductod = $roworden['nombre'];


                $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$id_orden' and id_producto='$id_producto'");
                if ($rowordenre = mysqli_fetch_array($sqlordent)) {
                    $veritem = "1";
                    $vercolorverdem = ' background-color: green;';
                } else {
                    $veritem = "2";
                    $vercolorverdem = 'background-color: white;';
                }


                $hapdallets = ubicacionprohab($rjdhfbpqj, $id_producto);
                if ($hapdallets > 0) {
                    $hapallets = '&nbsp;&nbsp;<w style="color:red;">↑ hay ' . $hapdallets . ' Pallets aproximado.</w>';
                } else {
                    $hapallets = "";
                }

                $id_marca = $roworden['id_marcas'];
                $categoria = $roworden['categoria'];

                $infoprodu = comanter($rjdhfbpqj, $id_producto, $id_clienteint);
                $stockdispom = SumaStodck($rjdhfbpqj, $id_producto);

                $tipounidad = $infoprodu['tipounidad'];
                $cantidadbiene = $infoprodu['comviene'];
                $costoxcajCom = $infoprodu['costoxcajCom'];
                $ordencompra = $infoprodu['ordencompra'];
                $fecven = $infoprodu['fecven'];
                $fechault = $infoprodu['fechault'];
                $stockdibulto = $stockdispom / $cantidadbiene;

                $cantidadcom = comprapro($rjdhfbpqj, $id_producto, $ordencompra);

                // $cantickl = $rowprecioprod["agrstock"];
                $cantidaddbul = $cantidadcom / $cantidadbiene;

                /* 
xxx
                        $cantidadcom=$infoprodu['cantidadCom'];
                        $cantidaddbul=$infoprodu['cantidadCom'] / $cantidadbiene; */

                if ($cantidaddbul > 0 && $cantidaddbul < 1) {
                    $cantidadcombul = '1';
                } else {

                    $cantidadcombul = number_format($cantidaddbul, 0, '.', '');
                }
                $totalited = 0;
                $importecomd = $cantidadcom * $infoprodu['costoCom'];
                $importecom = number_format($importecomd, 2, '.', '');
                $totalited += $roworden['total'];
                $totalite = number_format($totalited, 2, '.', '');

                $comovbulto = $cantidadbiene . "&nbsp;" . $nombreunid;

                // precio para el bulto
                $preciounitv = $infoprodu['costoCom'];


                if ($tipounidad == '0') {
                    $nombredcomo = $nombreunid;
                } elseif ($tipounidad == '2') {
                    $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
                    $nombredcomo = $nombreunid;
                } elseif ($tipounidad == '1') {
                    $comoviene = "- x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
                    $nombredcomo = $nombrebult;
                } elseif (empty($tipounidad)) {
                    $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
                    $nombredcomo = $nombreunid;
                }



                $stockdispomcar = '9999999999999';


                $elementoa = "(Frutas Glaseadas - Deshidroazucaradas)";
                $elementob = "(Sin marca)";
                $elementoc = "(Especias y Condimentos)";
                $elementod = "(Fruta Desecada)";
                $elementoe = "(Fruta Seca)";
                $elementof = "(Cultivo Avena)";
                $elementog = "(Nuez - Almendras - Castañas - Pasas Negras y Rubias - Maní)";
                $elementoh = "(Nuez, Almendras, Castañas, Avell)";
                $elementoi = "(Nuez-Almendras-Castañas-Pasas Rubias y Negras)";
                $elementoj = "(Semillas)";




                $nomductoa = str_replace($elementoa, '', $nomductod);
                $nomductob = str_replace($elementob, '', $nomductoa);
                $nomductoc = str_replace($elementoc, '', $nomductob);
                $nomductod = str_replace($elementod, '', $nomductoc);
                $nomductof = str_replace($elementoe, '', $nomductod);
                $nomductog = str_replace($elementof, '', $nomductof);
                $nomductoh = str_replace($elementog, '', $nomductog);
                $nomductoi = str_replace($elementoh, '', $nomductoh);
                $nomductoj = str_replace($elementoj, '', $nomductoi);

                $nomducto = str_replace($elementoi, '', $nomductoj);

                //color por fecha

                $colorporfecha = colorearFecha($fechault);


                $faltantespiden = faltantespiden($rjdhfbpqj, $id_producto);



                if ("2" == "2") {
                    echo '
                           
                        
                        <tr>  
                        <td  style="padding-left: 2mm; ' . $vercolorverdem . '" idpro="' . $iditeorfd . '" > ';

                    if ($faltantespiden == '1') {

                        echo '  <div class="cocarda text-center">Lo piden</div>';
                    }




                    echo '<input type="text" class="form-control" value="' . $nomducto . ' - Venc.' . $fecven . '"  disabled>' . $hapallets . '
       </td>
  <td>';


                    $loen = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' and nref='Compra'");
                    if ($rowordn = mysqli_fetch_array($loen)) {

                        echo '<a  data-bs-toggle="collapse" data-bs-target="#history' . $roworden['id'] . '"><button type="button" class="btn btn-outline-dark btn-sm">H</button></a>  </div>';
                    }




                    echo '  </td>
                        <td  style="text-align:center;' . $vercolorverdem . '"> 
                        <input type="text" class="form-control text-center" value="' . $stockdispom . '"  disabled>
                        </td>
                          <td  style="text-align:center;background-color: ' . $colorporfecha . '; font-weight: bold;">   
                        <input type="text" class="form-control text-center"  style="font-weight: bold;" value="' . number_format($stockdibulto, 2, '.', '') . '"  disabled>
                        </td>    
                        <td  style="text-align:center;' . $vercolorverdem . '">   
                        <input type="text" class="form-control text-center" value="' . $comovbulto . '"  disabled>
                        </td>
                        
                          <td  style="text-align:center;background-color: ' . $colorporfecha . '; font-weight: bold;">   
                        <input type="text" class="form-control text-center"  style="font-weight: bold;" value="' . $fechault . '"  disabled>
                        </td>

                                     <td  style="text-align:center;' . $vercolorverdem . '">   
                        <input type="text"  value="' . $cantidadcom . '"  class="form-control" style="text-align:center;" disabled>
             
                     </td>               <td  style="text-align:center;background-color: ' . $colorporfecha . '; font-weight: bold;">   
                        <input type="text"  style="font-weight: bold;" value="' . number_format($cantidadcombul, 2, '.', '') . '"  class="form-control" style="text-align:center;" disabled>
             
                     </td>
                                  <td style="padding-left: 2mm;' . $vercolorverdem . '">

                           <select  id="unidad' . $roworden['id'] . '" class="form-select" tabindex="-1"
                           
                           onChange="preciobulto(' . $comillas . '' . $roworden['id'] . '' . $comillas . ', $(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val(), ' . $comillas . '' . $cantidadbiene . '' . $comillas . ',' . $comillas . '' . $preciounitv . '' . $comillas . ');calculocosto' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());"
                           
                           >
                        <option value="1" >' . $nombrebult . '</option>
                          <option value="0">' . $nombreunid . '</option>
                     </select>
                  
                 </td>

                        <td  style="text-align:center;' . $vercolorverdem . '">   
                        <input type="number" id="cantidad' . $roworden['id'] . '" value="' . $cantidadcombul . '"  class="form-control"  min="0" 
                      

                          onChange=" calculocosto' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());
                             "  

                               onkeyup=" calculocosto' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());
                             "  
                        
                        onclick="select()" style="text-align:center;">
             
                     </td>
           

       
                 
                                <td  style="text-align:center;' . $vercolorverdem . '">
                    <input type="text"  id="improteun' . $roworden['id'] . '" value="' . $infoprodu['costoxcajCom'] . '" class="form-control" style="text-align:right;" 
                    
                    
                          onkeyup=" calculocosto' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());
                             "  
                     onclick="select();"
                    
                    ></td>
  <td  style="text-align:center;' . $vercolorverdem . '">
                      <input type="text" id="importtot' . $roworden['id'] . '" value="' . $importecom . '" class="form-control"  style="text-align:right;" disabled>
                      </td>
                      <td  style="text-align:center; "> 
                    <input type="number"  id="descuenun' . $roworden['id'] . '" value="' . $roworden['descuenun'] . '" style="text-align:center;display:none;" class="form-control" min="0" max="100"  onkeyup="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                       onclick="select();" 

               
                      onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                   " 
                    
                    onKeyDown="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                 "   

                    onKeyPress="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  "                 
                    
                    onclick="select()">


                     
                       <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '"> ';

                    if ($veritem != '1') {
                        echo '   <button type="button"  class="btn btn-light" 
       
                        onclick="ajax_ordenbajar' . $roworden['id'] . '(
                        $(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),
                        $(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val(),
                        $(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),
                        $(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val(),
                        $(' . $comillas . '#importtot' . $roworden['id'] . '' . $comillas . ').val());


                         caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val()) "

                    style="width: 100%;">Agregar</button>';
                    } else {

                        echo ' <button type="button" class="btn btn-success">PEDIDO</button>';
                    }




                    echo '

                       <script>
                       function calculocosto' . $roworden['id'] . '(cantidad' . $roworden['id'] . ',descuenun' . $roworden['id'] . ',improteun' . $roworden['id'] . ') 
                       {
                         var cantidad' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ';
                         var descuenun' . $roworden['id'] . ' = descuenun' . $roworden['id'] . ';
                         var improteun' . $roworden['id'] . ' = improteun' . $roworden['id'] . ';

                         if (descuenun' . $roworden['id'] . ' === undefined || descuenun' . $roworden['id'] . ' === null || descuenun' . $roworden['id'] . ' === ' . $comillas . '' . $comillas . '|| descuenun' . $roworden['id'] . ' === ' . $comillas . '0' . $comillas . ') 
                         {
                            costoxbuldd' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ' * improteun' . $roworden['id'] . ';
                            document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value = costoxbuldd' . $roworden['id'] . '; 
                            }else{
                           costoxbuldr' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ' * improteun' . $roworden['id'] . ';
                           costoxbuldd' . $roworden['id'] . '  = costoxbuldr' . $roworden['id'] . ' - (costoxbuldr' . $roworden['id'] . ' * (descuenun' . $roworden['id'] . ' / 100));
                           document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value = Math.round(costoxbuldd' . $roworden['id'] . '); 
                               }
                       }
                       </script>
          <script>
          
           function ajax_ordenbajar' . $roworden['id'] . '(cantidad' . $roworden['id'] . ',unidad' . $roworden['id'] . ',descuenun' . $roworden['id'] . ',improteun' . $roworden['id'] . ',importtot' . $roworden['id'] . ') {
            if (' . $id_clienteint . ') { 
            var parametros = {
            "producto": ' . $comillas . '' . $nomducto . '' . $comillas . ',
                    "idproduc": ' . $comillas . '' . $roworden['id'] . '' . $comillas . ',
                "cantidad": cantidad' . $roworden['id'] . ',
                "unidad": unidad' . $roworden['id'] . ',
                "descuenun": descuenun' . $roworden['id'] . ',
                "improteun": improteun' . $roworden['id'] . ',
                "importtot": importtot' . $roworden['id'] . ',
                "id_cliente": ' . $comillas . '' . $id_clienteint . '' . $comillas . ',
                "fechaordn": ' . $comillas . '' . $fechaordn . '' . $comillas . ',
                "horaord": ' . $comillas . '' . $horaord . '' . $comillas . ',
                "id_ordenedit": ' . $comillas . '' . $id_orden . '' . $comillas . ',
                "id_marca": ' . $comillas . '' . $id_marca . '' . $comillas . ',
                "id_categoria": ' . $comillas . '' . $categoria . '' . $comillas . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comillas . 'insert_item.php' . $comillas . ',
                type: ' . $comillas . 'POST' . $comillas . ',
                beforeSend: function() {
                    $("#muestroorden").html(' . $comillas . '' . $comillas . ');
                },
                success: function(response) {
                    $("#muestroorden").html(response);
                }
            });
            
            } 
            }
                
                
                </script>





                


                            <div id="muestroordenr' . $roworden['id'] . '"></div>
</td>
 </tr>

';
                    $loen = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' and nref='Compra' ORDER BY `precioprod`.`fecha` DESC");
                    while ($rowordn = mysqli_fetch_array($loen)) {
                        $fechacomrp = $rowordn['fecha'];
                        $fecvend = $rowordn['fecven'];
                        $fechajult = date('d/m/y', strtotime($fechacomrp));
                        $fechavend = date('d/m/y', strtotime($fecvend));
                        $costvomf = $rowordn['costo_total'];
                        $costodjComs = $rowordn['costoxcaja'];
                        $ordencomprad = $rowordn['id_orden'];

                        $coagrstocks = comprapro($rjdhfbpqj, $id_producto, $ordencomprad);

                        //$coagrstocks=$rowordn['agrstock'];
                        $cobulto = $coagrstocks / $cantidadbiene;
                        $costvomf = number_format($costvomf, 2, '.', '');






                        $costodComs = number_format($costodjComs, 2, '.', '');
                        $costoom = $costodComs * $cobulto;
                        $costodom = number_format($costoom, 2, '.', '');

                        $id_ordedn = $rowordn['id_orden'];




                        echo '
<tr id="history' . $roworden['id'] . '" class="collapse">
                     <td style="text-align:right; padding-right: 18px;background-color: #ffffb4;" >
                       <a href="../compra_proveedor/?ookdjfv=' . $id_clienteint . '&idcomopra=' . $id_ordedn . '" target="_blank">
                     <button type="button" class="btn btn-secondary btn-sm">Compra Nº ' . $id_ordedn . '</button>
                 
                     </a>
                    </td>
                     <td style="background-color: #ffffb4;text-align:center;"></td>
                     <td style="background-color: #ffffb4;"></td>
                     <td style="background-color: #ffffb4;"></td>
                     <td style="background-color: #ffffb4;"></td>
                     <td style="text-align:center;background-color: #ffffb4;">' . $fechajult . '</td>
                     <td style="text-align:center;background-color: #ffffb4;">' . $coagrstocks . '</td>
                     <td style="text-align:center;background-color: #ffffb4;">' . number_format($cobulto, 2, '.', '') . '</td>
                     <td style="text-align:center;background-color: #ffffb4;"  colspan="2">Venc. ' . $fechavend . '</td> 
                     <td style="text-align:right; padding-right: 18px;background-color: #ffffb4;">' . number_format($costodComs, 2, ',', '.') . '</td>
                     
                     <td style="text-align:right;background-color: #ffffb4;padding-right: 18px;">' . number_format($costodom, 2, ',', '.') . '</td>
                     <td ></td>
    </tr>';
                    }
                }
            }









            echo '
                </tbody>
            </table>
            
                <script>
        function ajax_elimina(iditem,idproduc) {
            var parametros = {
                "iditem": iditem,
                "idproduc": idproduc,
                "idorden": ' . $id_orden . ',
                "cantpro": ' . $canverificafin . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comillas . 'eliminar.php' . $comillas . ',
                type: ' . $comillas . 'POST' . $comillas . ',
                beforeSend: function() {
                    $("#muestroorden2").html(' . $comillas . '' . $comillas . ');
                },
                success: function(response) {
                    $("#muestroorden2").html(response);
                }
            });
        }        
  
         </script>
            
            <div id="muestroorden2"></div>
            
            ';
        }
        echo '</div>
                
 
                
                
                ';
    }
    ?>

            