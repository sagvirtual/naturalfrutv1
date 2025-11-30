<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../control_stock/funcionStockS.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];

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
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Id Credito</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Produtos</th>

                                    <? if ($tipo_usuario == "0" || $tipo_usuario == "33") { ?>
                                        <th class="text-center">Precio Unit.</th>
                                        <th class="text-center">Desc.</th>
                                        <th class="text-center">Precio Final</th>
                                        <th class="text-center">Total</th>
                                    <?     } ?>

                                    <th class="text-center">Cant.</th>
                                    <th class="text-center">Unid.</th>
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
                                    $condiciones[] = "item_credito.nombre LIKE '$termino'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
                                $condicion_final = implode(' AND ', $condiciones);
                                // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND nota_credito.col>='1'  // AND nota_credito.col!='0' AND nota_credito.col!='32' 


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





                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    item_credito.nombre, item_credito.kilos,  item_credito.id_producto, item_credito.modo, item_credito.total, item_credito.descuenun, item_credito.tipounidad,item_credito.fecha as fechacom, item_credito.id_orden, item_credito.presentacion, item_credito.precio,
    nota_credito.id as idcompra, nota_credito.fin, nota_credito.col, nota_credito.fecha, nota_credito.id_cliente
    FROM clientes
    INNER JOIN item_credito ON clientes.id = item_credito.id_cliente 
    INNER JOIN nota_credito ON item_credito.id_orden = nota_credito.id 
    WHERE ($condicion_final) AND item_credito.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_credito.modo='0' and ($condicion_fincl)
    ORDER BY `nota_credito`.`fecha` ASC");

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id_producto"];
                                    $idorden = $rowcompra["id_orden"];
                                    $tipounidad = $rowcompra["tipounidad"];
                                    $total = $rowcompra["total"];
                                    $descuenun = $rowcompra["descuenun"];
                                    $presentacion = $rowcompra["presentacion"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombreuns = nombrunid($rjdhfbpqj, $id_producto);

                                    if ($presentacion != '0') {
                                        $bulto = $rowcompra["presentacion"];
                                    } else {
                                        $bulto = cantbult($rjdhfbpqj, $id_producto);
                                    }

                                    if ($tipounidad == "0") {
                                        $cantidsk = $rowcompra["kilos"];
                                        $cantidskt += $rowcompra["kilos"];
                                        $precioOriginal = $rowcompra["precio"];
                                    } else {
                                        $cantidsk = $rowcompra["kilos"] * $bulto;
                                        $cantidskt += $rowcompra["kilos"] * $bulto;
                                        $precioOriginal = $rowcompra["precio"] / $bulto;
                                        $precioOriginal = $rowcompra["precio"] / $bulto;
                                    }

                                    $descuento = ($precioOriginal * $descuenun) / 100;
                                    $preciounit = $precioOriginal - $descuento;
                                    $totalventa += $rowcompra["total"];
                                    echo '
                                          <tr>
                                           <td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . date('Y/m/d', strtotime($rowcompra["fecha"])) . '</p>
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td class="text-center">
                                            
                                             <a href="../nota_de_credito/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '">     ' . $rowcompra["id_orden"] . '</a>
                                            
                                            
                                            
                                            </td>
                                             
                                            <td>
                                          ' . $rowcompra["nom_empr"] . ' ' . $rowcompra["nom_contac"] . '</td>
                                             <td style="color: black;">[' . $id_producto . '] ' . $rowcompra["nombre"] . '</td>';
                                    if ($tipo_usuario == "0" || $tipo_usuario == "33") {
                                        echo '
                                             <td style="color: black;" class="text-center">$' . number_format($precioOriginal, 2, '.', ',') . '</td>  
                                              <td style="color: black;" class="text-center">%' . $rowcompra["descuenun"] . '</td>  
                                              <td style="color: black;" class="text-center">$' . number_format($preciounit, 2, '.', ',') . '</td>  
                                              <td style="color: black;" class="text-center">$' . number_format($rowcompra["total"], 2, '.', ',') . '</td>  
                                          
                                          ';
                                    }
                                    echo '   
                                             
                                            
                                            
                                             <td class="text-center">' . $cantidsk . '</h4>
                                             <td class="text-center">' . $nombreuns . '</h4>
                                           </td>
                                        </tr>';
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
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad: ' . $cantidskt . '  &nbsp;📦 ' . number_format($cantidsktbul, 2, '.', ',') . '</span></h4>
                                   </div>';

                        mysqli_close($rjdhfbpqj);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->