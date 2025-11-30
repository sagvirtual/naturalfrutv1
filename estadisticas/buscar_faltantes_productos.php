<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/StatusOrden.php');
include('../listadeprecio/func_fechalista.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];
$busproveedorP = $_POST['busproveedorp'];
/* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); */
function func_Precios($rjdhfbpqj, $fechaorden, $idprodu, $cantidadds, $unidsx, $presentacion)
{

    $preciofin = 0;

    if ($unidsx == '0') {
        $cantidadds = $cantidadds;
    } else {
        $cantidadds = $cantidadds * $presentacion;
    }
    if ($fechaorden > '2000-01-01') {
        $fechaorden = $fechaorden;
    } else {

        $fechaorden = fechalista($rjdhfbpqj);
    }




    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idprodu' and fecha <='$fechaorden' and cerrado = '1'  and confirmado = '1' ORDER BY fecha DESC, id DESC;");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $costo_total = $rowprecioprod["costo_total"];

        $omitempc = 0;
        $omitempb = 0;
        $omitempd = 0;
        $omitempe = 0;
        $omiteepb = 0;

        if ($costo_total < $rowprecioprod["mpa"]) {
            $mua = $rowprecioprod["mua"];
            $mub = $rowprecioprod["mub"];
            $muc = $rowprecioprod["muc"];
            $mud = $rowprecioprod["mud"];
            $mue = $rowprecioprod["mue"];

            $eub = $rowprecioprod["eub"];
            $euc = $rowprecioprod["euc"];
            $eud = $rowprecioprod["eud"];
            $eue = $rowprecioprod["eue"];

            $mka = $rowprecioprod["mka"];
            $mkb = $rowprecioprod["mkb"];
            $mkc = $rowprecioprod["mkc"];
            $mkd = $rowprecioprod["mkd"];
            $mke = $rowprecioprod["mke"];

            $ekb = $rowprecioprod["ekb"];
            $ekc = $rowprecioprod["ekc"];
            $ekd = $rowprecioprod["ekd"];
            $eke = $rowprecioprod["eke"];


            if ($mub == '1') {
                $mkb = $mkb * $presentacion;
            } else {
                $mkb = $rowprecioprod["mkb"];
            }
            if ($muc == '1') {
                $mkc = $mkc * $presentacion;
            } else {
                $mkc = $rowprecioprod["mkc"];
            }
            if ($mud == '1') {
                $mkd = $mkd * $presentacion;
            } else {
                $mkd = $rowprecioprod["mkd"];
            }
            if ($mue == '1') {
                $mke = $mke * $presentacion;
            } else {
                $mke = $rowprecioprod["mke"];
            }


            if ($eub == '1') {
                $ekb = $ekb * $presentacion;
            } else {
                $ekb = $rowprecioprod["ekb"];
            }
            if ($euc == '1') {
                $ekc = $ekc * $presentacion;
            } else {
                $ekc = $rowprecioprod["ekc"];
            }
            if ($eud == '1') {
                $ekd = $ekd * $presentacion;
            } else {
                $ekd = $rowprecioprod["ekd"];
            }
            if ($eue == '1') {
                $eke = $eke * $presentacion;
            } else {
                $eke = $rowprecioprod["eke"];
            }

            if ($rowprecioprod["mpb"] == '0') {
                $omitempb = '1';
                $mkb = '999999999999';
            }
            if ($rowprecioprod["mpc"] == '0') {
                $omitempc = '1';
                $mkc = '999999999999';
            }
            if ($rowprecioprod["mpd"] == '0') {
                $omitempd = '1';
                $mkd = '999999999999';
            }
            if ($rowprecioprod["mpe"] == '0') {
                $omitempe = '1';
                $mke = '999999999999';
            }

            if ($rowprecioprod["epb"] == '0') {
                $omiteepb = '1';
                $ekb = '999999999999';
            }
            if ($rowprecioprod["epc"] == '0') {
                $omiteepc = '1';
                $ekc = '999999999999';
            }
            if ($rowprecioprod["epd"] == '0') {
                $omiteepd = '1';
                $ekd = '999999999999';
            }
            if ($rowprecioprod["epe"] == '0') {
                $omiteepe = '1';
                $eke = '999999999999';
            }



            /* cuando es menor al B */
            if ($cantidadds < $mkb) {

                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpa"];
                } else {
                    $preciofin = $rowprecioprod["mpa"] * $presentacion;
                }
            } elseif ($cantidadds < $mkc && $omitempb != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpb"];
                } else {
                    $preciofin = $rowprecioprod["mpb"] * $presentacion;
                }
            } elseif ($cantidadds < $mkd && $omitempc != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpc"];
                } else {
                    $preciofin = $rowprecioprod["mpc"] * $presentacion;
                }
            } elseif ($cantidadds < $mke && $omitempd != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpd"];
                } else {
                    $preciofin = $rowprecioprod["mpd"] * $presentacion;
                }
            } elseif ($cantidadds < $ekb && $omitempe != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["mpe"];
                } else {
                    $preciofin = $rowprecioprod["mpe"] * $presentacion;
                }
            }

            //distri

            elseif ($cantidadds < $ekc && $omiteepb != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epb"];
                } else {
                    $preciofin = $rowprecioprod["epb"] * $presentacion;
                }
            } elseif ($cantidadds < $ekd && $omiteepc != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epc"];
                } else {
                    $preciofin = $rowprecioprod["epc"] * $presentacion;
                }
            } elseif ($cantidadds < $eke && $omiteepd != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epd"];
                } else {
                    $preciofin = $rowprecioprod["epd"] * $presentacion;
                }
            } elseif ($cantidadds >= $eke && $omiteepe != '1') {
                if ($unidsx == "0") {
                    $preciofin = $rowprecioprod["epe"];
                } else {
                    $preciofin = $rowprecioprod["epe"] * $presentacion;
                }
            }
        }
    } else {
        $preciofin = 0;
    }



    if ($unidsx == '1') {
        $totalresd = $preciofin / $presentacion * $cantidadds;
    } else {
        $totalresd = $preciofin; //$preciofin * $cantidadds;
    }

    $totalresfin = round($totalresd);








    return $totalresfin;
}
?>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [1, "desc"]
        ],
        responsive: true
    });
</script>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
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
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Id Orden</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Proveedor</th>
                                    <th class="text-center">Produtos</th>

                                    <th class="text-center">Cant.</th>
                                    <th class="text-center">Unid.</th>

                                    <? if ($tipo_usuario == "0" || $tipo_usuario == "33") { ?>
                                        <th class="text-center">Precio Unit.</th>
                                        <th class="text-center">Total</th>
                                    <?     } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //join and precioprod.fecha BETWEEN '$desde_date' and '$hasta_date' 
                                //Consulta SQL
                                // Separar la entrada del usuario en palabras individuales

                                $busquedads = mysqli_real_escape_string($rjdhfbpqj, $buscar);

                                // Dividir la cadena de búsqueda en palabras
                                $palabras = explode(' ', $busquedads);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condiciones = array();

                                foreach ($palabras as $palabra) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condiciones[] = "productos.nombre LIKE '$termino'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
                                $condicion_final = implode(' AND ', $condiciones);
                                // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND orden.col>='1'  // AND orden.col!='0' AND orden.col!='32' 


                                //clente busqueda


                                // Dividir la cadena de búsqueda en palabrascl
                                $palabrascl = explode(' ', $busproveedor);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condicioncl = array();

                                foreach ($palabrascl as $palabracl) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condicioncl[] = "CONCAT(clientes.nom_empr, ' ', clientes.nom_contac) LIKE '$terminocl'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                                $condicion_fincl = implode(' AND ', $condicioncl);

                                //proveedor busqueda


                                // Dividir la cadena de búsqueda en palabrascl
                                $palabrasclP = explode(' ', $busproveedorP);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condicionclP = array();

                                foreach ($palabrasclP as $palabraclP) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $terminoclP = '%' . str_replace(' ', '%', $palabraclP) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condicionclP[] = "proveedores.empresa LIKE '$terminoclP'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                                $condicion_finclP = implode(' AND ', $condicionclP);


                                $cantidskt = 0;
                                $bulto = 0;
                                $total = 0;


                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
                                clientes.id, clientes.nom_empr, clientes.nom_contac, clientes.id as idcliente,
                                faltantes.fecha, faltantes.tipounidad, faltantes.cantidad,faltantes.id_orden, faltantes.id_cliente,faltantes.id_producto,
                                productos.nombre, productos.kilo, productos.unidadnom, productos.id,productos.id_proveedor,
                                proveedores.id as idproveedor,proveedores.empresa
                                FROM clientes
                                INNER JOIN faltantes ON clientes.id = faltantes.id_cliente 
                                INNER JOIN productos ON productos.id = faltantes.id_producto 
                                INNER JOIN proveedores ON proveedores.id = productos.id_proveedor 
                             WHERE ($condicion_final) AND faltantes.fecha BETWEEN '$desde_date' AND '$hasta_date' and ($condicion_fincl) and ($condicion_finclP) ORDER BY `faltantes`.`fecha` ASC");

                                if (!$sqlcompra) {
                                    die("Error en consulta SQL básica: " . mysqli_error($rjdhfbpqj));
                                }
                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id"];
                                    $fechaorden = $rowcompra["fecha"];
                                    $cantidadds = $rowcompra["cantidad"];
                                    $idorden = $rowcompra["id_orden"];
                                    $tipounidad = $rowcompra["tipounidad"];
                                    $presentacion = $rowcompra["kilo"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombreuns = $rowcompra["unidadnom"];
                                    $descuenun = 0;

                                    $status = StatusOrden($rjdhfbpqj, $idorden);
                                    $bulto = $rowcompra["kilo"];
                                    if ($cantidadds == 0) {
                                        $cantidadds = 1;
                                    }

                                    $precio = func_Precios($rjdhfbpqj, $fechaorden, $id_producto, $cantidadds, $tipounidad, $presentacion);

                                    if ($tipounidad == "0") {
                                        $cantidsk = $rowcompra["cantidad"];
                                        $cantidskt += $rowcompra["cantidad"];
                                        $precioOriginal = $precio;
                                    } else {
                                        $cantidsk = $rowcompra["cantidad"] * $bulto;
                                        $cantidskt += $rowcompra["cantidad"] * $bulto;
                                        $precioOriginal = $precio / $bulto;
                                    }
                                    if ($cantidsk == 0) {
                                        $total = $precio * 1;
                                    } else {
                                        $total = $precio * $rowcompra["cantidad"];
                                    }
                                    $totalventa += $total;
                                    echo '
                                          <tr>
                                           <td style="text-align:center;">';
                                    if ($idorden > 0) {
                                        echo '' . $status . '</td>';
                                    }
                                    echo '<td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . date('Y/m/d', strtotime($rowcompra["fecha"])) . '</p>
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td class="text-center">';
                                    if ($idorden > 0) {
                                        echo ' <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1">     ' . $rowcompra["id_orden"] . '</a>';
                                    } else {
                                        echo '<p style="color:red;font-size: 8pt;">No Compro<br>nada</p>';
                                    }


                                    echo '</td>
                                             
                                            <td>
                                          ' . $rowcompra["nom_empr"] . ' ' . $rowcompra["nom_contac"] . '</td>
                                             <td style="color: black;">' . $rowcompra["empresa"] . '</td>
                                             <td style="color: black;">[' . $id_producto . '] ' . $rowcompra["nombre"] . '</td>
                                              <td class="text-center">' . $cantidsk . '</h4></td>
                                             <td class="text-center">' . $nombreuns . '</h4></td>
                                             ';
                                    if ($tipo_usuario == "0" || $tipo_usuario == "33") {
                                        echo '
                                             <td style="color: black;" class="text-center">$' . number_format($precioOriginal, 2, '.', ',') . '</td>    
                                              <td style="color: black;" class="text-center">$' . number_format($total, 2, '.', ',') . '</td>  
                                          
                                          ';
                                    }
                                    echo '</tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                        <?php

                        $cantidsktbul = $cantidskt / $bulto;
                        if ($tipo_usuario == "0") {

                            echo ' <br><div style="position:relative;  float:right; text-align:right">
                                   <p>desde ' . date('d/m/Y', strtotime($desde_date)) . ' al ' . date('d/m/Y', strtotime($hasta_date)) . '</p>';
                            echo ' <span class="badge badge-primary-inverse">
                                   <h4 style="position:relative;">Total $:' . number_format($totalventa, 2, ',', '.') . '  </h4></span>';
                        }
                        echo '
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad: ' . $cantidskt . '  </span></h4>
                                   </div>';
                        /*   echo '
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad: ' . $cantidskt . '  &nbsp;📦 ' . number_format($cantidsktbul, 2, '.', ',') . '</span></h4>
                                   </div>'; */

                        mysqli_close($rjdhfbpqj);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->