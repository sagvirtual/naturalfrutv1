<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../funciones/StatusOrden.php');
include('../control_stock/funcionStockS.php');
include('../funciones/funcNombreresponsable.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];
$motivods = $_POST['motivo'];
function StatusOrdenboorado($colv)
{
    switch ($colv) {

        case 0:
            $status = '';

            break;
        case 1:
            $status = '<p><span class="badge" style="background-color: #9B290A; color:white">Sin Confirmar</span></p>';

            break;
        case 2:
            $status = '<p><span class="badge " style="background-color: #1A6B9D; color:white">Confirmado</span></p>';

            break;
        case 3:
            $status = '<p><span class="badge " style="background-color: #1C7002; color:white">Preparando</span></p>';

            break;
        case 4:
            $status = '<p><span class="badge " style="background-color: #557B29; color:white">Pidiendo</span></p>';

            break;
        case 5:
            $status = '<p><span class="badge " style="background-color: #7B00AC; color:white">Controlando</span></p>';
            break;
        case 6:
            $status = '<p><span class="badge " style="background-color: #EDFF0A; color:black">Retiro</span></p>';

            break;
        case 7:
            $status = '<p><span class="badge " style="background-color: #FBCE0B; color:black">Despacho</span></p>';

            break;
        case 8:
            $status = '<p><span class="badge bg-secondary">Concretado</span></p>';

            break;
        case 7:
            $status = '<p><span class="badge bg-secondary">Finalizado</span></p>';
            break;
        case 9:
            $status = '<p><span class="badge"style="background-color:black; color:white">En Ruta</span></p>';
            break;
        case 31:
            $status = '<p><span class="badge"  style="background-color:blue; color:white">Entregada</span></p>';
            break;
        case 32:
            $status = '<p><span class="badge"  style="background-color:red; color:black">Cancelada</span></p>';
            break;
    }
    return $status;
}


function MotivoNombre($motivo)
{
    switch ($motivo) {
        case 1:
            $motivonom = "No hay";
            break;
        case 2:
            $motivonom = "Venc. Corto";
            break;
        case 3:
            $motivonom = "Vencido";
            break;
        case 4:
            $motivonom = "Mal estado";
            break;
        case 5:
            $motivonom = "Equivocado";
            break;
        case 6:
            $motivonom = "Bichos";
            break;
        case 8:
            $motivonom = "Roto";
            break;
        case 9:
            $motivonom = "No quiso el cliente";
            break;
        case 10:
            $motivonom = "Ingrese Mal";
            break;
        case 11:
            $motivonom = "Agregado no enviado";
            break;
        case 12:
            $motivonom = "Olvido Chofer";
            break;
        default:
            $motivonom = "";
            break;
    }


    return $motivonom;
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
                                    <th class="text-center">Estado<br>Actual</th>
                                    <th class="text-center" style="color: red;">
                                        Eliminado<br>en
                                    </th>
                                    <th class="text-center" style="color: red;">Lo<br>elimino</th>
                                    <th class="text-center" style="color: red;">Motivo</th>
                                    <th class="text-center" style="color: red;">Fecha<br>eliminado</th>
                                    <th class="text-center">Id Orden</th>
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
                                    $condiciones[] = "historial_item_orden.nombre LIKE '$termino'";
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



                                if ($motivods > 0) {
                                    $motivods = "  AND historial_item_orden.motivo='$motivods'";
                                }

                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    clientes.id, clientes.nom_empr, clientes.nom_contac, 
    historial_item_orden.nombre, historial_item_orden.kilos,  historial_item_orden.id_producto, historial_item_orden.modo, historial_item_orden.total, historial_item_orden.descuenun, historial_item_orden.tipounidad, historial_item_orden.motivo, historial_item_orden.col as colboor,historial_item_orden.fecha as fechacom, historial_item_orden.id_orden, historial_item_orden.presentacion, historial_item_orden.precio, historial_item_orden.quien,historial_item_orden.motivo,historial_item_orden.fecha_accion,
    orden.id as idcompra, orden.fin, orden.col, orden.fecha, orden.id_cliente
    FROM clientes
    INNER JOIN historial_item_orden ON clientes.id = historial_item_orden.id_cliente 
    INNER JOIN orden ON historial_item_orden.id_orden = orden.id 
    WHERE ($condicion_final) AND historial_item_orden.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND historial_item_orden.modo='0' and ($condicion_fincl) AND orden.col>'1'  and historial_item_orden.col > '1' $motivods
    ORDER BY `orden`.`fecha` ASC");

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id_producto"];
                                    $idorden = $rowcompra["id_orden"];
                                    $quien = $rowcompra["quien"];
                                    $tipounidad = $rowcompra["tipounidad"];
                                    $motivo = $rowcompra["motivo"];
                                    $colv = $rowcompra["colboor"];
                                    $total = $rowcompra["total"];
                                    $id_cliente = $rowcompra["id_cliente"];
                                    $descuenun = $rowcompra["descuenun"];
                                    $fecha_accion = $rowcompra["fecha_accion"];
                                    $presentacion = $rowcompra["presentacion"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombreuns = nombrunid($rjdhfbpqj, $id_producto);
                                    $nombrespo = NomResponsa($rjdhfbpqj, $quien);
                                    $status = StatusOrden($rjdhfbpqj, $idorden);
                                    $statusborrado  = StatusOrdenboorado($colv);
                                    $motivonom = MotivoNombre($motivo);
                                    if ($presentacion != '0') {
                                        $bulto = $rowcompra["presentacion"];
                                    } else {
                                        $bulto = cantbult($rjdhfbpqj, $id_producto);
                                    }
                                    $fechaFormateada = date("d/m/y H:i:s", strtotime($fecha_accion));
                                    $fechaFormateadasin = date("Y-m-d", strtotime($fecha_accion));

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
                                           <td style="text-align:center;">' . $statusborrado . '</td>  
                                            <td style="text-align:center;">' . $nombrespo  . '</td>   <td style="text-align:center;">
                                            <b>' . $motivonom  . '</sb></td>
                                           <td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . $fechaFormateadasin . '</p>
                                           ' . $fechaFormateada . '
                                           </td>
                                           <td class="text-center">
                                            
                                             <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '">     ' . $rowcompra["id_orden"] . '</a>
                                            
                                            
                                            
                                            </td>
                                             
                                            <td>[' . $id_cliente . ']
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