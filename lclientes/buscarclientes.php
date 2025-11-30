<?php include('../f54du60ig65.php');

// Función para obtener el nombre del dia
function DiaNombre($rjdhfbpqj, $id_cliente)
{
    $diaCliente = ''; // evita undefined

    $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_cliente'");
    if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

        $dia_repart1 = $rowclientes['dia_repart1'];
        $dia_repart2 = $rowclientes['dia_repart2'];
        $dia_repart3 = $rowclientes['dia_repart3'];
        $dia_repart4 = $rowclientes['dia_repart4'];
        $dia_repart5 = $rowclientes['dia_repart5'];
        $dia_repart6 = $rowclientes['dia_repart6'];
        $dia_repart0 = $rowclientes['dia_repart0'];

        if ($dia_repart1 == '1') {
            $diaCliente = "Lunes";
        }
        if ($dia_repart2 == '1') {
            $diaCliente .= " Martes";
        }
        if ($dia_repart3 == '1') {
            $diaCliente .= " Miercoles";
        }
        if ($dia_repart4 == '1') {
            $diaCliente .= " Jueves";
        }
        if ($dia_repart5 == '1') {
            $diaCliente .= " Viernes";
        }
        if ($dia_repart6 == '1') {
            $diaCliente .= " Sabado";
        }
        if ($dia_repart0 == '1') {
            $diaCliente .= " Domingo";
        }
    }
    return $diaCliente;
}


$buscar = isset($_POST['buscar']) ? mysqli_real_escape_string($rjdhfbpqj, $_POST['buscar']) : '';
$pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;
$limite = isset($_POST['limite']) ? (int)$_POST['limite'] : 15;
$comilla = "'";
$offset = ($pagina - 1) * $limite;



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<!-- End Breadcrumbbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px;" class="text-center">ID</th>
                                    <th style="width: 10px;" class="text-center">Reparto</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Zona</th>
                                    <th>Forma de Pago</th>
                                    <th>C/Pago</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>WhatsApp</th>
                                    <th style="display:none;">Ultima Orden</th>
                                    <th class="text-center" style="display:none;">Saldo</th>
                                    <th class="text-center" style="width: 85px;display:none;">Desc. </th>
                                    <th class="text-center" style="width: 85px;display:none;">Desc % </th>
                                    <th class="text-center" style="width: 10px;display:none;">Fac. </th>
                                    <th class=" text-center" style="width: 150px;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $buscar = mysqli_real_escape_string($rjdhfbpqj, $buscar);

                                // Dividir la cadena de búsqueda en palabrascl
                                $palabrascl = explode(' ', $buscar);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condicioncl = array();

                                foreach ($palabrascl as $palabracl) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condicioncl[] = "CONCAT(nom_empr, ' ', nom_contac, address, localidad, wsp) LIKE '$terminocl'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                                $condicion_fincl = implode(' AND ', $condicioncl);

                                // paginacion
                                $sqlTotal = mysqli_query($rjdhfbpqj, "SELECT COUNT(*) as total FROM clientes Where  $condicion_fincl  and estado='0'");
                                $rowTotal = mysqli_fetch_assoc($sqlTotal);
                                $totalRegistros = (int)$rowTotal['total'];
                                $totalPaginas = max(1, (int)ceil($totalRegistros / $limite));

                                // Asegurar que la página esté dentro del rango y recalcular offset
                                if ($pagina < 1) {
                                    $pagina = 1;
                                }
                                if ($pagina > $totalPaginas) {
                                    $pagina = $totalPaginas;
                                }
                                $offset = ($pagina - 1) * $limite;
                                //fin paginacion

                                /* $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where  nom_empr LIKE '%$buscar%' OR nom_contac LIKE '%$buscar%'ORDER BY nom_empr ASC"); */

                                $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT nom_empr,address,localidad,id,nom_contac,desceunto,facturar,cobrable,descporcen,wsp,zona,cli_usuario,cli_pass,file,camioneta,tipo_cliente,iva_por FROM clientes Where  $condicion_fincl  and estado='0' ORDER BY `clientes`.`nom_empr` ASC LIMIT $limite OFFSET $offset");

                                while ($rowclientes = mysqli_fetch_array($sqlclientes)) {

                                    $cli_usuarioc = base64_decode($rowclientes['cli_usuario']);
                                    $cli_pass = base64_decode($rowclientes['cli_pass']);

                                    $diaderem = ${"diaderem" . $rowclientes["id"]};
                                    $checkedf = ${"checkedf" . $rowclientes["id"]};
                                    $checkedfa = ${"checkedfa" . $rowclientes["id"]};
                                    $id = $rowclientes["id"];
                                    $file = $rowclientes["file"];
                                    $wsp = $rowclientes["wsp"];

                                    $zona = $rowclientes["zona"];
                                    $desceunto = $rowclientes["desceunto"];
                                    $descporcen = $rowclientes["descporcen"];
                                    $facturar = $rowclientes["facturar"];
                                    $cobrable = $rowclientes["cobrable"];
                                    $iva_por = $rowclientes["iva_por"];

                                    if ($iva_por > '0') {
                                        $factf = '<span class="badge badge-primary">Con factura</span>';
                                    } else {
                                        $factf = "";
                                    }

                                    if ($desceunto == '1') {
                                        $checkedf = "checked";
                                    } else {
                                        $checkedf = "";
                                    }
                                    if ($facturar == '1') {
                                        $checkedfa = "checked";
                                    } else {
                                        $checkedfa = "";
                                    }
                                    if ($cobrable == '1') {
                                        $checkedco = "checked";
                                    } else {
                                        $checkedco = "";
                                    }

                                    $id_cliente = $rowclientes["id"];

                                    $diaderem = DiaNombre($rjdhfbpqj, $id_cliente);
                                    $sqlcamionetas = ${"sqlcamionetas" . $rowclientes["id"]};
                                    $rowcamionetas = ${"rowcamionetas" . $rowclientes["id"]};
                                    $camionenom = ${"camionenom" . $rowclientes["id"]};
                                    $camioneta = ${"camioneta" . $rowclientes["id"]};
                                    $camioneta = $rowclientes["camioneta"];

                                    if (!empty($rowclientes["nom_contac"])) {
                                        $nocon = $rowclientes["nom_contac"] . " - " . $rowclientes["nom_empr"];
                                    } else {
                                        $nocon = "";
                                    }

                                    //camioneta
                                    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id='$camioneta'");
                                    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                                        $camionenom = $rowcamionetas["nombre"] . "<br>";
                                    }

                                    if ($diaderem == "") {
                                        $diaderem = '<b style="color:red;">Sin Día</b>';
                                    }

                                    $tipo_cliente = $rowclientes["tipo_cliente"];
                                    if ($tipo_cliente == "0") {
                                        $tipo = "Minorita";
                                    }
                                    if ($tipo_cliente == "1") {
                                        $tipo = "Mayorista";
                                    }
                                    if ($tipo_cliente == "2") {
                                        $tipo = "Ditribuidor";
                                    }

                                    /*      if (empty($file)) {
                                        $foto = "/assets/images/users/boy.svg";
                                    } else {
                                        $foto = "../lclientes/foto" . $rowclientes['id'] . "";
                                    }
 */
                                    /*  $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id' and finalizada='1' ORDER BY `orden`.`fecha` DESC");
                                    if ($roworden = mysqli_fetch_array($sqlorden)) {
                                        $fechasd = $roworden['fecha'];
                                        $idore = $roworden['id'];
                                        $fechav = explode("-", $fechasd);
                                        $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];
                                        $idcodord = base64_encode($idore);
                                        $verbo = "1";

                                        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id' and conf_entrega2='1'");
                                        $subtotalante = 0;
                                        $valortotal = 0;
                                        while ($rowitem_ordena = mysqli_fetch_array($sqlitem_orden)) {
                                            $subtotalante += $rowitem_ordena["total"];
                                            $valortotal += $rowitem_ordena["valor"];
                                        }
                                        $saldodeu = $subtotalante - $valortotal;
                                        $totalorden = number_format($saldodeu, 2, ',', '.');
                                    } else {
                                        $verbo = "0";
                                    } */
                                    $idcod = base64_encode($id);

                                    $sqlleadd = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zona'");
                                    if ($rowleadd = mysqli_fetch_array($sqlleadd)) {
                                        $zonad = $rowleadd["nombre"];
                                    } else {
                                        $zonad = "";
                                    }
                                    $sqllformapago = ${"sqllformapago" . $rowclientes["id"]};
                                    $rowlead = ${"rowlead" . $rowclientes["id"]};
                                    $efectivo = ${"efectivo" . $rowclientes["id"]};
                                    $Transferencia = ${"Transferencia" . $rowclientes["id"]};
                                    $Cheque = ${"Cheque" . $rowclientes["id"]};
                                    $Echeq = ${"Echeq" . $rowclientes["id"]};


                                    $checkedEf = ${"checkedEf" . $rowclientes["id"]};
                                    $checkedTr = ${"checkedTr" . $rowclientes["id"]};
                                    $checkedChe = ${"checkedChe" . $rowclientes["id"]};
                                    $checkedEche = ${"checkedEche" . $rowclientes["id"]};

                                    $sqllformapago = mysqli_query($rjdhfbpqj, "SELECT * FROM formapago Where id_cliente = '$id_cliente'");
                                    if ($rowlead = mysqli_fetch_array($sqllformapago)) {


                                        $efectivo = $rowlead["efectivo"];
                                        $Transferencia = $rowlead["Transferencia"];
                                        $Cheque = $rowlead["Cheque"];
                                        $Echeq = $rowlead["Echeq"];




                                        if ($efectivo == 1) {
                                            $checkedEf = "checked";
                                        } else {
                                            $checkedEf = "";
                                        }
                                        if ($Transferencia == 1) {
                                            $checkedTr = "checked";
                                        } else {
                                            $checkedTr = "";
                                        }
                                        if ($Cheque == 1) {
                                            $checkedChe = "checked";
                                        } else {
                                            $checkedChe = "";
                                        }
                                        if ($Echeq == 1) {
                                            $checkedEche = "checked";
                                        } else {
                                            $checkedEche = "";
                                        }
                                    }


                                    echo '
                                          <tr>
                                           <td scope="row" class="text-center">     <br>' . $id . '</td>
                                           <td scope="row" class="text-center"> <span class="badge badge-primary-inverse">' . $diaderem . '</span>
                                       
                                           </td>
                                            <td class="text-center" style="color: black;">' . $zonad . '</td>
                                            <td  style="color: black;">
                                            
                                              <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="ef' . $rowclientes["id"] . '"  value="1"
                                        
                                        onclick="ajax_formadepago(
                                        ' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', 
                                        $(' . $comilla . 'input:checkbox[name=ef' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=tr' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=che' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=eche' . $rowclientes["id"] . ']:checked' . $comilla . ').val()                                      
                                        
                                        );" ' . $checkedEf . '
                                        
                                        >
                                        <label class="form-check-label" for="exampleCheck1">Efectivo</label>
                                    </div>
                                              <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="tr' . $rowclientes["id"] . '"   value="1"   onclick="ajax_formadepago(
                                        ' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', 
                                        $(' . $comilla . 'input:checkbox[name=ef' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=tr' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=che' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=eche' . $rowclientes["id"] . ']:checked' . $comilla . ').val()                                      
                                        
                                        );" ' . $checkedTr . '>
                                        <label class="form-check-label" for="exampleCheck1">Transferencia</label>
                                    </div>     <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="che' . $rowclientes["id"] . '"   value="1"   onclick="ajax_formadepago(
                                        ' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', 
                                        $(' . $comilla . 'input:checkbox[name=ef' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=tr' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=che' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=eche' . $rowclientes["id"] . ']:checked' . $comilla . ').val()                                      
                                        
                                        );" ' . $checkedChe . '>
                                        <label class="form-check-label" for="exampleCheck1">Cheque</label>
                                    </div>   <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="eche' . $rowclientes["id"] . '"   value="1"   onclick="ajax_formadepago(
                                        ' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', 
                                        $(' . $comilla . 'input:checkbox[name=ef' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=tr' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=che' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),
                                        $(' . $comilla . 'input:checkbox[name=eche' . $rowclientes["id"] . ']:checked' . $comilla . ').val()                                      
                                        
                                        );" ' . $checkedEche . '>
                                        <label class="form-check-label" for="exampleCheck1">Echeq</label>

                                              </div>
                                            
                                            </td>
                                           <td style="width: 10px;">   <div class="custom-control custom-switch form-group  text-center"> 
                                                                
                                <input type="checkbox" class="custom-control-input" id="cobrable' . $rowclientes["id"] . '" name="cobrable' . $rowclientes["id"] . '" value="1"  onclick="ajax_pausar(' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', $(' . $comilla . 'input:checkbox[name=cobrable' . $rowclientes["id"] . ']:checked' . $comilla . ').val());" ' . $checkedco . '>
                                <label class="custom-control-label" for="cobrable' . $rowclientes["id"] . '"  style="position:relative;top:9px;"></label></div></td>
                                             
                                           <td style="color: black;">' . $rowclientes["nom_empr"] . '' . $nocon . '
                                        <br>' . $factf . '
                                           
                                           </td>   
                                           
                                            <td>';

                                    if (!empty($rowclientes["address"]) && $rowclientes["address"] != "S/D"  && $rowclientes["address"] != "000"  && $rowclientes["address"] != "-" && $rowclientes["address"] != "...") {
                                        echo '<a href="https://www.google.com.ar/maps/place/' . $rowclientes["address"] . ',' . $rowclientes["localidad"] . '" target="blank"> <i class="socicon-googlemaps"></i> ' . $rowclientes["address"] . '</a> ';
                                    }
                                    echo '</td>
                                             
                                              <td>';
                                    if ($rowclientes["wsp"] > 930181681) {
                                        echo '<a href="https://api.whatsapp.com/send?phone=54' . $rowclientes["wsp"] . '&text=Hola esta es la información para acceder al modulo de pedidos de Natural Frut, para tu local en ' . $rowclientes["address"] . '%0A el Usuario es *' . $cli_usuarioc . '* y tu Contraseña es *' . $cli_pass . '*%0A%0A Ingresa en este enlace http://pedidos.softwarenatfrut.com/%0A%0A Saludos!!" target="_blank"><i class="socicon-whatsapp"></i> ' . $rowclientes["wsp"] . '</a>';
                                    }
                                    if ($verbo == "1") {
                                        echo '</td><td style="display:none;">
                                             <a href="/orden/agregar_orden?jfndhom=' . $idcodord . '">
                                             <button type="button" class="btn btn-rounded btn-dark-rgba">Nº ' . $idore . ' | ' . $fechavr . '</button></a>
                                              </td>
                                            <td style="display:none;"><button type="button" class="btn btn-rounded btn-primary-rgba">$' . $totalorden . '</button></td>';
                                    } else {
                                        echo '<td style="display:none;"></td>
                                        
                                        <td style="display:none;"></td>';
                                    }
                                    //descporcen

                                    echo '     <td style="display:none;">   <div class="custom-control custom-switch form-group  text-center"> 
                                                                
                                <input type="checkbox" class="custom-control-input" id="descuento' . $rowclientes["id"] . '" name="descuento' . $rowclientes["id"] . '" value="1"  onclick="ajax_descuento(' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', $(' . $comilla . 'input:checkbox[name=descuento' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),$(' . $comilla . '#descporcen' . $rowclientes["id"] . '' . $comilla . ').val());" ' . $checkedf . '>
                                <label class="custom-control-label" for="descuento' . $rowclientes["id"] . '" style="position:relative;top:9px;"></label> </div>
                                </td> <td style="display:none;">
                                 <input type="text" class="form-control" id="descporcen' . $rowclientes["id"] . '" name="descporcen' . $rowclientes["id"] . '" value="' . $descporcen . '"  
                                 oninput="ajax_descuento(' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', $(' . $comilla . 'input:checkbox[name=descuento' . $rowclientes["id"] . ']:checked' . $comilla . ').val(),$(' . $comilla . '#descporcen' . $rowclientes["id"] . '' . $comilla . ').val());">
                                
                                
                               </td>';

                                    echo '     <td style="display:none;">   <div class="custom-control custom-switch form-group  text-center"> 
                                                                
                                <input type="checkbox" class="custom-control-input" id="facturar' . $rowclientes["id"] . '" name="facturar' . $rowclientes["id"] . '" value="1"  onclick="ajax_facturarcl(' . $comilla . '' . $rowclientes["id"] . '' . $comilla . ', $(' . $comilla . 'input:checkbox[name=facturar' . $rowclientes["id"] . ']:checked' . $comilla . ').val());" ' . $checkedfa . '>
                                <label class="custom-control-label" for="facturar' . $rowclientes["id"] . '" style="position:relative;top:9px;"></label></div></td>';


                                    echo '
                                            <td>
                                                <div class="button-list text-center">
                                                <a href="/orden/agregar_orden?idcliente=' . $rowclientes["id"] . '" class="btn btn-primary-rgba" title="Crear orden" style="display:none;" ><i class="sl-icon-note"></i>Crear Orden</a>
                                                    <a href="/lclientes/?jnnfsc=' . $idcod . '" class="btn btn-success-rgba" title="Editar Cliente"><i class="ri-pencil-line"></i></a>';
                                    if ($verbo == "0") {
                                        echo ' <a href="javascript:eliminar(' . "'/lclientes/mlkdths?" . 'jnnfsc=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"> 
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                    }
                                    echo ' </div>
                                            </td>
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>

                    </div> <?php
                            // Parámetros base (ya los tenés calculados)
                            $prev = max(1, $pagina - 1);
                            $next = min($totalPaginas, $pagina + 1);

                            // Ventana de páginas a mostrar alrededor de la actual
                            $window = 2; // muestra página actual ±2
                            $start  = max(1, $pagina - $window);
                            $end    = min($totalPaginas, $pagina + $window);

                            // Estilos inline sencillos (se mantienen tal cual)
                            $btn     = "display:inline-block;padding:6px 10px;margin:0 2px;border:1px solid #ccc;border-radius:6px;cursor:pointer;user-select:none;";
                            $activo  = "background:#0A2BAB;color:#fff;border-color:#0A2BAB;";
                            $disabled = "opacity:.4;cursor:not-allowed;";

                            // Render
                            echo '<div style="text-align:center; margin-top:10px;">';

                            // Botón "Primera"
                            if ($pagina > 1) {
                                echo "<span style='$btn' onclick='cambiarPagina(1)' title='Primera'>&laquo;&laquo;</span>";
                            } else {
                                echo "<span style='$btn;$disabled' title='Primera'>&laquo;&laquo;</span>";
                            }

                            // Botón "Anterior"
                            if ($pagina > 1) {
                                echo "<span style='$btn' onclick='cambiarPagina($prev)' title='Anterior'>&laquo;</span>";
                            } else {
                                echo "<span style='$btn;$disabled' title='Anterior'>&laquo;</span>";
                            }

                            // Elipsis izquierda si corresponde
                            if ($start > 1) {
                                echo "<span style='$btn;$disabled'>…</span>";
                            }

                            // Números de página
                            for ($i = $start; $i <= $end; $i++) {
                                $estilo = $btn . ($i == $pagina ? $activo : "");
                                $click  = $i == $pagina ? "" : "onclick='cambiarPagina($i)'";
                                echo "<span style='$estilo' $click>$i</span>";
                            }

                            // Elipsis derecha si corresponde
                            if ($end < $totalPaginas) {
                                echo "<span style='$btn;$disabled'>…</span>";
                            }

                            // Botón "Siguiente"
                            if ($pagina < $totalPaginas) {
                                echo "<span style='$btn' onclick='cambiarPagina($next)' title='Siguiente'>&raquo;</span>";
                            } else {
                                echo "<span style='$btn;$disabled' title='Siguiente'>&raquo;</span>";
                            }

                            // Botón "Última"
                            if ($pagina < $totalPaginas) {
                                echo "<span style='$btn' onclick='cambiarPagina($totalPaginas)' title='Última'>&raquo;&raquo;</span>";
                            } else {
                                echo "<span style='$btn;$disabled' title='Última'>&raquo;&raquo;</span>";
                            }

                            echo '</div>';
                            ?>

                </div>
            </div>

            <script>
                function ajax_descuento(id_cliente, descuento, descporcen) { // <-- Parámetros corregidos
                    var parametros = {
                        'id_cliente': id_cliente,
                        'descuento': descuento,
                        'descporcen': descporcen
                    };
                    $.ajax({
                        data: parametros,
                        url: '../lclientes/ActualizaDesccli.php',
                        type: 'POST',
                        beforeSend: function() {
                            $('#muestroorden55').html('');
                        },
                        success: function(response) {
                            $('#muestroorden55').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en AJAX:", error);
                        }
                    });
                }

                function ajax_facturarcl(id_cliente, facturar) { // <-- Parámetros corregidos
                    var parametros = {
                        'id_cliente': id_cliente,
                        'facturar': facturar // <-- Corregido "desceunto" → "descuento"
                    };
                    $.ajax({
                        data: parametros,
                        url: '../lclientes/Actualizafactur.php',
                        type: 'POST',
                        beforeSend: function() {
                            $('#muestroorden55').html('');
                        },
                        success: function(response) {
                            $('#muestroorden55').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en AJAX:", error);
                        }
                    });
                }

                function ajax_pausar(id_cliente, cobrable) { // <-- Parámetros corregidos
                    var parametros = {
                        'id_cliente': id_cliente,
                        'cobrable': cobrable
                    };
                    $.ajax({
                        data: parametros,
                        url: '../lclientes/pausarcliente.php',
                        type: 'POST',
                        beforeSend: function() {
                            $('#muestroorden55').html('');
                        },
                        success: function(response) {
                            $('#muestroorden55').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en AJAX:", error);
                        }
                    });
                }




                function ajax_formadepago(id_cliente, ef, tr, che, eche) { // <-- Parámetros corregidos
                    var parametros = {
                        'id_cliente': id_cliente,
                        'ef': ef,
                        'tr': tr,
                        'che': che,
                        'eche': eche
                    };
                    $.ajax({
                        data: parametros,
                        url: '../lclientes/formadepago.php',
                        type: 'POST',
                        beforeSend: function() {
                            $('#muestroorden55').html('');
                        },
                        success: function(response) {
                            $('#muestroorden55').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en AJAX:", error);
                        }
                    });
                }
            </script>

            <div id="muestroorden55"></div>
            <script src="../assets/plugins/switchery/switchery.min.js"></script>
            <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
            <script src="../assets/js/custom/custom-table-datatable.js"></script>
            <!-- End col -->