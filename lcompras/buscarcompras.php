<?php include('../f54du60ig65.php');
include('../nota_de_pedido/func_nombreunid.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
$busproveedor = $_POST['busproveedor'];

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
                                    <th class="text-center">Nº Compra</th>
                                    <th class="text-center">Fecha</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center">Proveedor</th>
                                    <th class="text-center">Vencimiento</th>
                                    <th class="text-center">Produtos</th>
                                    <th class="text-center">Bulto</th>
                                    <th class="text-center">Unid.</th>
                                    <th class="text-center">Precio Final</th>
                                    <th class="text-center">Compra "A"</th>
                                    <th class="text-center">Compra "R"</th>

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
                                // Eliminar el "AND" adicional al final de las condiciones de búsqueda

                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    proveedores.id, proveedores.empresa, 
    precioprod.id_producto, precioprod.id_orden, precioprod.id_proveedor, precioprod.fecven, precioprod.cerrado, precioprod.fecha, precioprod.kilo, precioprod.agrstock, precioprod.costo_total,
    productos.id, productos.nombre,productos.unidadnom,productos.modo_producto,ordenprovee.fac_a, ordenprovee.fac_r,
    ordenprovee.id as idcompra, ordenprovee.numero, ordenprovee.numeror, ordenprovee.cerrado, ordenprovee.fac_unid, ordenprovee.fecha as fechaorden
    FROM proveedores
    INNER JOIN precioprod ON proveedores.id = precioprod.id_proveedor 
    INNER JOIN productos ON precioprod.id_producto = productos.id 
    INNER JOIN ordenprovee ON ordenprovee.id = precioprod.id_orden 
    WHERE ($condicion_final) AND precioprod.fecha BETWEEN '$desde_date' AND '$hasta_date' AND precioprod.cerrado='1' AND ordenprovee.cerrado='1' AND proveedores.empresa like '%$busproveedor%'
    ORDER BY `precioprod`.`fecha` DESC");

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {


                                    /*  if($rowcompra["fac_unid"]==1){

                                        $cantidadqueviene=  $rowcompra["agrstock"]; 
                                       // $cunidadqueviene=  $rowcompra["kilo"] * $rowcompra["agrstock"]; 
                                    }else{

                                    } */
                                    $cantidadqueviene =  $rowcompra["agrstock"] / $rowcompra["kilo"];

                                    $cunidadqueviene =  $rowcompra["agrstock"];



                                    $id_ordend = $rowcompra["idcompra"];
                                    $numeror = $rowcompra["numeror"];
                                    $numero = $rowcompra["numero"];
                                    $costo_totald = $rowcompra["costo_total"];
                                    $costo_total = $totalliqv = number_format($costo_totald, 0, ',', '.');


                                    $fac_r = $rowcompra["fac_r"];
                                    $fac_a = $rowcompra["fac_a"];
                                    /* 
                                   $vecor = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_ordend' and modo='1'");
                                    if ($rowcddddpr = mysqli_fetch_array($vecor)) {$tipocuneta=$rowcddddpr['tipocuneta'];} */


                                    if ($fac_a == '0') {

                                        $liknumero = '<a href="/compra_proveedor?ookdjfv=' . $rowcompra["id_proveedor"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-dark-rgba">Nº ' . $rowcompra["numero"] . '</button></a>';
                                    } else {
                                        $liknumero = '';
                                    }

                                    if ($fac_r == '0') {

                                        $liknumeror = '<a href="/compra_proveedor?ookdjfv=' . $rowcompra["id_proveedor"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-dark-rgba">Nº ' . $rowcompra["numeror"] . '</button></a>';
                                    } else {
                                        $liknumeror = '';
                                    }

                                    echo '
                                          <tr>
                                           <td scope="row" class="text-center">Nº ' . $rowcompra["idcompra"] . '</td>
                                           <td scope="row" class="text-center">' . date('d/m/y', strtotime($rowcompra["fechaorden"])) . '</td>
                                           
                                            <td >' . $rowcompra["empresa"] . '</td>
                                            <td class="text-center">' . date('d/m/Y', strtotime($rowcompra["fecven"])) . '</td>
                                             <td style="color: black;">' . $rowcompra["nombre"] . ' ' . $rowcompra["modo_producto"] . ' x ' . $rowcompra["kilo"] . ' ' . $rowcompra["unidadnom"] . '</strong></td>   
                                             <td class="text-center">' . $cantidadqueviene . ' ' . $rowcompra["modo_producto"] . '</td>   
                                             <td class="text-center">' . $cunidadqueviene . ' ' . $rowcompra["unidadnom"] . '</td>   
                                             
                                             <td class="text-center">
                                            $' . $costo_total . '
                                              </td>
                                               
                                             <td class="text-center">
                                            ' . $liknumero . '
                                              </td>
                                              <td class="text-center">
                                              ' . $liknumeror . '
                                              </td>
                                            
                                          
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->