<?php include('../f54du60ig65.php');
// Aumentar memoria para InnoDB (en bytes)
$rjdhfbpqj->query("SET GLOBAL innodb_buffer_pool_size = 1073741824"); // 1GB

// Aumentar memoria para MyISAM (en bytes)
$rjdhfbpqj->query("SET GLOBAL key_buffer_size = 536870912"); // 512MB

// Aumentar memoria para operaciones temporales
$rjdhfbpqj->query("SET GLOBAL tmp_table_size = 268435456"); // 256MB
$rjdhfbpqj->query("SET GLOBAL max_heap_table_size = 268435456"); // 256MB

include('../lusuarios/login.php');
include('../nota_de_pedido/funcion_saldoanterior.php');
include('../funciones/funcZonas.php');
include('../funciones/funcContarVencimiento.php');

$buscar = $_POST['buscar'];

function ultimaboleta($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id_cliente = '$id_clienteint' and col !='8' and col !='31' and col !='32' ORDER BY `orden`.`id` ASC");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $totalresta = $rowpagdeufp["id"];
    } else {
        $totalresta = '99999999999999';
    }
    return $totalresta;
}


?>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [4, "desc"]
        ],
        responsive: true
    });
</script>
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
                                    <!-- <th>Foto</th> -->
                                    <th style="width: 50px;" class="text-center">Zona</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Ult. Compra</th>
                                    <th class="text-center">Días Venc.</th>
                                    <th class="text-center">Saldo</th>
                                    <th class="text-center">Resumen de Cuenta</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if ($buscar == "") {
                                    $limit = '10000';
                                } else {
                                    $limit = '100';
                                }


                                //$buscar = mysqli_real_escape_string($rjdhfbpqj, $buscar);



                                // Dividir la cadena de búsqueda en palabrascl
                                $palabrascl = explode(' ', $buscar);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condicioncl = array();

                                foreach ($palabrascl as $palabracl) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condicioncl[] = "CONCAT(nom_empr, ' ', nom_contac, ' ',address) LIKE '$terminocl'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                                $condicion_fincl = implode(' AND ', $condicioncl);






                                /* $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where  nom_empr LIKE '%$buscar%' OR nom_contac LIKE '%$buscar%'ORDER BY nom_empr ASC"); */

                                $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT nom_empr,address,id,nom_contac FROM clientes Where  $condicion_fincl  and estado='0'");

                                while ($rowclientes = mysqli_fetch_array($sqlclientes)) {

                                    $id_clienteint = $rowclientes["id"];
                                    $salgral = ${"salgral" . $id_clienteint};
                                    $idorden = ${"salgral" . $id_clienteint};
                                    $id_clientecod = base64_encode($id_clienteint);

                                    $totalresta = ultimaboleta($rjdhfbpqj, $id_clienteint);
                                    $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
                                    $salgraltotal += calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
                                    $fechaven = Vencimiento($rjdhfbpqj, $id_clienteint);
                                    $nombrezona = NombreZona($rjdhfbpqj, $id_clienteint);
                                    $diasven = diasvencitotal($rjdhfbpqj, $id_clienteint);
                                    /* 
                                    //$salgral=$salgral;
                                    */
                                    if (!empty($fechaven)) {
                                        $fechave = date('d/m/Y', strtotime($fechaven));
                                    } else {
                                        $fechave = "";
                                    }

                                    /*  $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint'  and col='8' and fin='1' and finalizada='1'");
                                    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) { */

                                    echo '
                                          <tr>
                                          <td style="color: black;"  class="text-center">' . $nombrezona . '</td>   
                                          <td style="color: black;">' . $rowclientes["nom_contac"] . ' (' . $rowclientes["nom_empr"] . ')</td>   
                                           <td scope="row"  class="text-center">' . $fechave . '</td>
                                           <td scope="row"  class="text-center">' . intval($diasven) . '</td>
                                          
                                            <td  class="text-center">$' . number_format($salgral, 2, '.', ',') . '</td>
                                            <td  class="text-center">
                                            <a href="../deuda_clientes/debe_haber?jhduskdsa=' . $id_clientecod . '" target="_blank">
                                            <button type="button" class="btn btn-outline-primary">Resumen de Cuenta</button></td>
                                        </a>
                                        </tr>';
                                    /* } */
                                }

                                ?>

                            </tbody>
                        </table>
                        <?php

                        if ($tipo_usuario == "0") {

                        ?>
                            <table style="float:right;">
                                <tr>
                                    <td><b>Deuda Total</b> &nbsp;</td>
                                    <td><b>$<?= number_format($salgraltotal, 2, '.', ',') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="width:105;"></td>
                                </tr>
                            </table>
                        <?php

                        }
                        mysqli_close($rjdhfbpqj);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->