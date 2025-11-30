<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcNombreresponsable.php');
$desde_date = $_POST['desde_date'] . ' 00:00:00';
$hasta_date = $_POST['hasta_date'] . ' 23:59:59';
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];
$motivods = $_POST['motivo'];
$quiens = $_POST['quiens'];

function NomPickin($rjdhfbpqj, $id_orden)
{

    $sqldrios = mysqli_query($rjdhfbpqj, "SELECT id_usuarioclav FROM orden Where id='$id_orden'");
    if ($rowusuad = mysqli_fetch_array($sqldrios)) {

        $elpickin = $rowusuad["id_usuarioclav"];
    }

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$elpickin' and tipo_cliente='34'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

        $nomickin = $rowusuarios["nom_contac"];
    } else {
        $nomickin = $rowusuarios["nom_contac"];
    }
    return $nomickin;
}
function MotivoNombre($motivo)
{
    switch ($motivo) {
        case 0:
            $motivonom = "";
            break;
        case 34:
            $motivonom = "Picking";
            break;
        case 29:
            $motivonom = "Deposito. PA";
            break;
        case 22:
            $motivonom = "Envasado PA";
            break;
        case 21:
            $motivonom = "Envasado PB";
            break;
        case 30:
            $motivonom = "Control";
            break;
        case 1:
            $motivonom = "Mod. Cliente";
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
                                    <th class="text-center" style="color: red;">Fecha<br>Control</th>
                                    <th class="text-center" style="color: red;">Controlado</th>
                                    <th class="text-center" style="color: red;">Error Sector</th>
                                    <th class="text-center" style="color: red;">Error Usuario</th>
                                    <th class="text-center">Id Orden</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Produtos</th>


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
                                    $condiciones[] = "item_orden.nombre LIKE '$termino'";
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
                                    $motivods = "  AND picking_error.id_resp_error='$motivods'";
                                }
                                if ($quiens > 0) {
                                    $quiensql = "  AND orden.id_usuarioclav='$quiens'";
                                }
                                /*   WHERE ($condicion_final) AND picking_error.fecha_accion BETWEEN '$desde_date' AND '$hasta_date'  AND picking_error.id_resp_error!='0' and ($condicion_fincl)  $motivods
    ORDER BY `picking_error`.`fecha_accion` ASC */
                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "
    SELECT 
        clientes.id, 
        clientes.nom_empr, 
        clientes.nom_contac, 
        picking_error.id_producto, 
        picking_error.id_resp_error,
        picking_error.fecha_accion,
        picking_error.id_cliente,
        picking_error.id_orden,
        picking_error.id_control,
        item_orden.id AS id_itemv, 
        item_orden.nombre, 
        item_orden.id_producto, 
        item_orden.id_cliente,
        orden.id_usuarioclav
    FROM picking_error
    INNER JOIN item_orden 
        ON picking_error.id_producto = item_orden.id_producto
        AND picking_error.id_orden = item_orden.id_orden
        AND picking_error.id_cliente = item_orden.id_cliente
    INNER JOIN clientes 
        ON clientes.id = picking_error.id_cliente    
        INNER JOIN orden 
        ON orden.id = picking_error.id_orden
    WHERE ($condicion_final)  and ($condicion_fincl) 
      AND picking_error.id_resp_error != 0 AND picking_error.fecha_accion BETWEEN '$desde_date' AND '$hasta_date'
      $motivods  $quiensql and id_resp_error !='99' ORDER BY  picking_error.fecha_accion DESC
    LIMIT 5000  
");


                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {
                                    $id_producto = $rowcompra["id_producto"];
                                    $idorden = $rowcompra["id_orden"];
                                    $quien = $rowcompra["quien"];
                                    $controlo = $rowcompra["id_control"];
                                    $motivo = $rowcompra["id_resp_error"];
                                    $colv = $rowcompra["colboor"];
                                    $total = $rowcompra["total"];
                                    $id_cliente = $rowcompra["id_cliente"];
                                    $descuenun = $rowcompra["descuenun"];
                                    $fecha_accion = $rowcompra["fecha_accion"];
                                    $presentacion = $rowcompra["presentacion"];
                                    $id_ordencod = base64_encode($rowcompra["id_orden"]);
                                    $id_clientecod = base64_encode($rowcompra["id_cliente"]);
                                    $nombrespo = NomResponsa($rjdhfbpqj, $controlo);
                                    $motivonom = MotivoNombre($motivo);
                                    $canverificafin = mysqli_num_rows($sqlcompra);
                                    if ($motivo == 34) {
                                        $nomickin = NomPickin($rjdhfbpqj, $idorden);
                                    } else {
                                        $nomickin = "";
                                    }
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
                                    
                                          <tr> <td scope="row" class="text-center"> 
                                            <p style="display:none;"> ' . $fechaFormateadasin . '</p>
                                           ' . $fechaFormateada . '
                                           </td>
                                            <td style="text-align:center;">' . $nombrespo  . '</td>   <td style="text-align:center;">
                                            <b>' . $motivonom  . '</sb></td>  
                                            <td style="text-align:center;">
                                            <b>' . $nomickin  . '</sb></td>
                                          
                                           <td class="text-center">
                                            
                                             <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '">     ' . $rowcompra["id_orden"] . '</a>
                                            
                                            
                                            
                                            </td>
                                             
                                            <td>[' . $id_cliente . ']
                                          ' . $rowcompra["nom_empr"] . ' ' . $rowcompra["nom_contac"] . '</td>
                                             <td style="color: black;">[' . $id_producto . '] ' . $rowcompra["nombre"] . '</td>
                                             
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                        <?php

                        $cantidsktbul = $cantidskt / $bulto;


                        echo ' <br><div style="text-align:center">
                                   <p>desde ' . date('d/m/Y', strtotime($desde_date)) . ' al ' . date('d/m/Y', strtotime($hasta_date)) . '</p>';


                        echo '
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Cantidad Errores: ' .  $canverificafin . ' </span></h4>
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