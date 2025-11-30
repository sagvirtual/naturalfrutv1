<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$buscar = $_POST['buscar'];
unset($_SESSION['id_orden']);
?>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [0, "desc"], // Ordena por la primera columna de forma descendente
            [1, "desc"] // Luego, por la segunda columna de forma ascendente
        ],
        responsive: false
    });
</script>
<link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                                    <th class="text-center" style="width: 100px;">Fecha</th>
                                    <!-- <th>Foto</th> -->
                                    <th class="text-center" style="width: 150px;">Nº Compra</th>
                                    <th class="text-center" style="width: 150px;">Compra "R"</th>
                                    <th class="text-center" style="width: 200px;">Compra "A"</th>
                                    <th class="text-center">Proveedor</th>
                                    <?php

                                    if ($tipo_usuario == '0') {

                                    ?>
                                        <th class="text-center">Total Gastos</th>
                                    <?php

                                    }

                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //join and precioprod.fecha BETWEEN '$desde_date' and '$hasta_date' 
                                //Consulta SQL
                                // Separar la entrada del usuario en palabras individuales
                                $palabras = explode(' ', $buscar);

                                // Inicializar la parte de la consulta para la búsqueda de palabras
                                $condiciones_busqueda = "";

                                // Construir dinámicamente las condiciones de búsqueda para cada palabra
                                foreach ($palabras as $palabra) {
                                    $condiciones_busqueda .= "(proveedores.empresa LIKE '%$palabra%' OR ordenprovee.numeror LIKE '%$palabra%' OR ordenprovee.numero LIKE '%$palabra%'  OR ordenprovee.id LIKE '%$palabra%') AND ";
                                }

                                // Eliminar el "AND" adicional al final de las condiciones de búsqueda
                                $condiciones_busqueda = rtrim($condiciones_busqueda, " AND ");

                                // Construir la consulta SQL completa
                                $sqlcompra = mysqli_query($rjdhfbpqj, "SELECT 
    proveedores.id, proveedores.empresa, 
    ordenprovee.id as idcompra, ordenprovee.numero, ordenprovee.numeror, ordenprovee.cerrado, ordenprovee.fecha, ordenprovee.tipoprov, ordenprovee.fac_a, ordenprovee.fac_r
    FROM proveedores
    INNER JOIN ordenprovee ON ordenprovee.id_proveedor = proveedores.id 
    WHERE ($condiciones_busqueda) AND ordenprovee.fecha BETWEEN '$desde_date' AND '$hasta_date'  AND ordenprovee.cerrado='1' AND ordenprovee.tipoprov='0'
    ORDER BY `ordenprovee`.`fecha` ASC limit 2000");

                                while ($rowcompra = mysqli_fetch_array($sqlcompra)) {


                                    //$idprovdr=$rowcompra["id"];
                                    $idprodsdr = $rowcompra["idcompra"];

                                    $sqlcamionetas = ${"sqlcamionetas" . $idprodsdr};
                                    $rowcamionetas = ${"rowcamionetas" . $idprodsdr};
                                    $cuatie = ${"cuatie" . $idprodsdr};
                                    $totalcom = ${"totalcom" . $idprodsdr};

                                    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden = '$idprodsdr' and cerrado='1' and fecha BETWEEN '$desde_date' AND '$hasta_date'");




                                    while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                                        $cuatie += $rowcamionetas['cpratotal_prod'];
                                        $totalcom = number_format($cuatie, 2, '.', ',');
                                    }
                                    $cuatiesss += $cuatie;




                                    $numeror = $rowcompra["numeror"];
                                    $numero = $rowcompra["numero"];


                                    $fac_r = $rowcompra["fac_r"];
                                    $fac_a = $rowcompra["fac_a"];



                                    if ($fac_a == '0') {

                                        $liknumero = '<a href="/compra_proveedor?ookdjfv=' . $rowcompra["id"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-dark-rgba">Nº ' . $rowcompra["numero"] . '</button></a>';
                                    } else {
                                        $liknumero = '';
                                    }

                                    if ($fac_r == '0') {

                                        $liknumeror = '<a href="/compra_proveedor?ookdjfv=' . $rowcompra["id"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-dark-rgba">Nº ' . $rowcompra["numeror"] . '</button></a>';
                                    } else {
                                        $liknumeror = '';
                                    }

                                    echo '
                                          <tr>
                                           <td scope="row" class="text-center">
                                           <i style="display:none;">' . date('Y/m/d', strtotime($rowcompra["fecha"])) . '</i> 
                                           <span class="badge badge-primary-inverse" style="text-align:left;">
                                           
                                           ' . date('d/m/Y', strtotime($rowcompra["fecha"])) . '</span></td>
                                              <td class="text-center">
                                               <i style="display:none;">' . $idprodsdr . '</i>
                                              Nº ' . $idprodsdr . '
                                              </td><td class="text-center">
                                              ' . $liknumeror . '
                                              </td>  <td class="text-center">
                                            ' . $liknumero . '
                                              </td>
                                            <td><a href="/compra_proveedor?ookdjfv=' . $rowcompra["id"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank">
                                            <button type="button" class="btn btn-rounded btn-dark-rgba"><strong>' . $rowcompra["empresa"] . ' </button></td>';


                                    if ($tipo_usuario == '0') {
                                        echo '
                                             <td class="text-center"><a href="/compra_proveedor?ookdjfv=' . $rowcompra["id"] . '&idcomopra=' . $rowcompra["idcompra"] . '" target="_blank"><h4 style="position:relative; top:4px;"><span class="badge badge-primary-inverse">$ ' . $totalcom . '</span></h4></a>
                                           </td>';
                                    }
                                    echo ' </tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                        <?
                        /*  $sqlcamiondetto = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where cerrado='1' and fecha BETWEEN '$desde_date' AND '$hasta_date'");
                                    
                                     
                                   

                                    while ($rowcamiodnetas = mysqli_fetch_array($sqlcamiondetto)) {
                                        $cuatide+=$rowcamiodnetas['cpratotal_prod'];
                                        $totalcodm=number_format($cuatide, 2, '.', ',');   
                                    } */
                        if ($tipo_usuario == '0') {
                            echo ' <br><div style="position:relative;  float:right; text-align:right">
                                   <p>desde ' . date('d/m/Y', strtotime($desde_date)) . ' al ' . date('d/m/Y', strtotime($hasta_date)) . '</p>
                                   <span class="badge badge-primary-inverse"><h4 style="position:relative;">Total: $ ' . number_format($cuatiesss, 2, '.', ',') . '</span></h4>
                                   </div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->