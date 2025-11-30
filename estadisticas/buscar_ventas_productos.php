<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../funciones/StatusOrden.php');
include('../control_stock/funcionStockS.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];
$factura = $_POST['factura'];


if ($factura == 1) {
    $factura = " and orden.ivaporsen > 0";
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

<?php
//saber cuantos cliente compraron el producto
function canclientecom($rjdhfbpqj, $desde_date, $hasta_date, $buscar)
{

    if (is_numeric($buscar)) {
        $condicion_finald = "item_orden.id_producto = '$buscar'";
    } else {
        $busquedads = mysqli_real_escape_string($rjdhfbpqj, $buscar);

        // Dividir la cadena de búsqueda en palabras
        $palabras = explode(' ', $busquedads);

        // Crear un array para almacenar las condiciones de búsqueda para cada palabra
        $condiciones = array();

        foreach ($palabras as $palabra) {
            // Reemplazar espacios con comodines para que coincida con cualquier palabra
            $termino = '%' . str_replace(' ', '%', $palabra) . '%';
            // Agregar la condición para esta palabra al array
            $condiciones[] = "item_orden.nombre LIKE '$termino'";
        }


        // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
        $condicion_final = implode(' AND ', $condiciones);
        $condicion_finald = "(" . $condicion_final . ")";
        // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND orden.col>='1'  // AND orden.col!='0' AND orden.col!='32' 

        //clente busqueda
    }
    //cantidas de clientes que compraron
    // Construir la consulta SQL completa
    $sqlcomwpra = mysqli_query($rjdhfbpqj, "SELECT DISTINCT clientes.id, clientes.nom_empr, clientes.nom_contac
        FROM clientes
        INNER JOIN item_orden ON clientes.id = item_orden.id_cliente 
        INNER JOIN orden ON item_orden.id_orden = orden.id 
        WHERE  item_orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_orden.modo='0' 
        ORDER BY `orden`.`fecha` ASC");
    $cantodos = mysqli_num_rows($sqlcomwpra);



    // Construir la consulta SQL completa
    $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT DISTINCT clientes.id, clientes.nom_empr, clientes.nom_contac
        FROM clientes
        INNER JOIN item_orden ON clientes.id = item_orden.id_cliente 
        INNER JOIN orden ON item_orden.id_orden = orden.id 
        WHERE $condicion_finald AND item_orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_orden.modo='0' 
        ORDER BY `orden`.`fecha` ASC");
    $canverificafin = mysqli_num_rows($sqlcompra);



    $porcentaje = ($canverificafin / $cantodos) * 100;


    return "Cant. Clientes: " . $canverificafin . " (%" . number_format($porcentaje, 2) . ")";
}
$canticlien = canclientecom($rjdhfbpqj, $desde_date, $hasta_date, $buscar);
?>
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
                                    <th class="text-center">Estado </th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Id Orden</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Produtos</th>

                                    <? if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3") { ?>
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
                                if (is_numeric($buscar)) {
                                    $condicion_finald = "item_orden.id_producto = '$buscar'";
                                } else {
                                    $busquedads = mysqli_real_escape_string($rjdhfbpqj, $buscar);

                                    // Dividir la cadena de búsqueda en palabras
                                    $palabras = explode(' ', $busquedads);

                                    // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                    $condiciones = array();

                                    foreach ($palabras as $palabra) {
                                        // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                        $termino = '%' . str_replace(' ', '%', $palabra) . '%';
                                        // Agregar la condición para esta palabra al array
                                        $condiciones[] = "item_orden.nombre LIKE '$termino'";
                                    }


                                    // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
                                    $condicion_final = implode(' AND ', $condiciones);
                                    $condicion_finald = "(" . $condicion_final . ")";
                                    // Eliminar el "AND" adicional al final de las condiciones de búsqueda AND orden.col>='1'  // AND orden.col!='0' AND orden.col!='32' 

                                    //clente busqueda
                                }

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
    item_orden.nombre, item_orden.kilos,  item_orden.id_producto, item_orden.modo, item_orden.total, item_orden.descuenun, item_orden.tipounidad,item_orden.fecha as fechacom, item_orden.id_orden, item_orden.presentacion, item_orden.precio,
    orden.id as idcompra, orden.fin, orden.col, orden.ivaporsen, orden.fecha, orden.id_cliente
    FROM clientes
    INNER JOIN item_orden ON clientes.id = item_orden.id_cliente 
    INNER JOIN orden ON item_orden.id_orden = orden.id 
    WHERE $condicion_finald AND item_orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND item_orden.modo='0' and ($condicion_fincl) $factura
    ORDER BY `orden`.`fecha` ASC");

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id_producto"];
                                    $idorden = $rowcompra["id_orden"];
                                    $tipounidad = $rowcompra["tipounidad"];
                                    $ivaporsen = $rowcompra["ivaporsen"];
                                    $total = $rowcompra["total"];
                                    $descuenun = $rowcompra["descuenun"];
                                    $presentacion = $rowcompra["presentacion"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombreuns = nombrunid($rjdhfbpqj, $id_producto);

                                    $status = StatusOrden($rjdhfbpqj, $idorden);
                                    if ($presentacion != '0') {
                                        $bulto = $rowcompra["presentacion"];
                                    } else {
                                        $bulto = cantbult($rjdhfbpqj, $id_producto);
                                    }
                                    if ($ivaporsen > 0) {
                                        $sefaturo = '<p  style="font-size: 12pt;color:white"><span class="badge bg-danger">C/Factura</span></p>';
                                    } else {
                                        $sefaturo = "";
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
                                           <td style="text-align:center;">' . $status . '</td>
                                           <td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . date('Y/m/d', strtotime($rowcompra["fecha"])) . '</p>
                                           ' . date('d/m/y', strtotime($rowcompra["fecha"])) . '
                                           </td>
                                           <td class="text-center">
                                            
                                             <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '">     ' . $rowcompra["id_orden"] . '</a>
                                            
                                            
                                            
                                            </td>
                                             
                                            <td>
                                          ' . $rowcompra["nom_empr"] . ' ' . $rowcompra["nom_contac"] . ' ' . $sefaturo . '</td>
                                             <td style="color: black;">[' . $id_producto . '] ' . $rowcompra["nombre"] . '</td>';
                                    if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3") {
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
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad: ' . $cantidskt . '  &nbsp;📦 ' . number_format($cantidsktbul, 2, '.', ',') . '
                                  </h4> </span> ';
                        if ($tipo_usuario == "0") {

                            echo '
                                   <span class="badge badge-primary-inverse"> <h4> ' . $canticlien . '</h4></span>';
                        }
                        echo '</div>';

                        mysqli_close($rjdhfbpqj);
                        ?>


                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->