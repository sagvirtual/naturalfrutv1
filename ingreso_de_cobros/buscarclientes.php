<?php include('../f54du60ig65.php');

$buscar = $_POST['buscar'];
$pagina = $_POST['col'];

$desde_date = $_POST['desde_date'];
$hasta_date = $_POST['hasta_date'];

$comilla = "'";

?>
<style>
    .pagination-container {
        max-width: 20cm;
        margin: 0 auto;
    }

    /* Estilos de la paginación */
    .pagination {
        background-color: white;
        list-style-type: none;
        display: flex;
        flex-wrap: wrap;
        /* Esto permite que los elementos se muestren en varias líneas si es necesario */
        justify-content: center;
        padding: 0;
        cursor: pointer;
    }

    .pagination li {
        background-color: white;
        margin-right: 5px;
        margin-bottom: 20px;
        /* Añadimos un margen inferior para separar los elementos verticalmente */
        width: auto;
        /* Cambiamos el ancho a automático para que se adapten al contenido */
        white-space: nowrap;
        /* Evita que el texto se divida en varias líneas */
    }

    .pagination li a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
    }
</style>
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


                                    <th style="width: 80px;">Fecha</th>
                                    <th style="width: 250px;">Cliente</th>
                                    <th style="width: 80px;">Nº Orden</th>
                                    <th class="text-center">Saldo</th>
                                    <th class="text-center">Cobro</th>
                                    <th class="text-center">Cuenta PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $TAMANO_PAGINA = 50;

                                //examino la página a mostrar y el inicio del registro a mostrar

                                //$pagina = $_GET["pagina"];

                                if (!$pagina) {

                                    $inicio = 0;

                                    $pagina = 1;
                                } else {

                                    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                                }



                                if (is_numeric($buscar)) {
                                    $qlovus = "e.id = '$buscar'";
                                } else {
                                    $qlovus = "(u.nom_empr LIKE '%$buscar%' OR u.nom_contac LIKE '%$buscar%' OR u.address LIKE '%$buscar%' OR u.localidad LIKE '%$buscar%')";
                                }






                                $sqlcategoriasba = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha, e.col, e.saldo, e.id_cliente, u.nom_empr, u.nom_contac, u.retira, u.zona, u.address, u.localidad, u.id as nuncliente
FROM orden e 
INNER JOIN clientes u 
ON e.id_cliente = u.id
Where $qlovus and e.col > '0'");


                                $num_total = mysqli_num_rows($sqlcategoriasba);
                                $total_paginas = ceil($num_total / $TAMANO_PAGINA);
                                //construyo la sentencia SQL			  
                                $limit = " limit " . $inicio . "," . $TAMANO_PAGINA;






                                $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha, e.col, e.saldo, e.id_cliente, u.nom_empr, u.nom_contac, u.retira, u.zona, u.address, u.localidad, u.id as nuncliente
FROM orden e 
INNER JOIN clientes u 
ON e.id_cliente = u.id
Where $qlovus and e.col > '0'  ORDER BY `fecha`  ASC $limit
");

                                if (!$sqluorden) {
                                    die('Error en la consulta: ' . mysqli_error($rjdhfbpqj));
                                }

                                //$sqluorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id LIKE '%$buscar%' and col = '8'  ORDER BY `orden`.`fecha`  ASC LIMIT 0, 10000");
                                while ($rowuorden = mysqli_fetch_array($sqluorden)) {

                                    $id_orden = $rowuorden["id"];
                                    $id_cliente = $rowuorden["id_cliente"];
                                    $saldo = $rowuorden["saldo"];
                                    $id_ordencod = base64_encode($rowuorden["id"]);
                                    $id_clientecod = base64_encode($rowuorden["id_cliente"]);

                                    $colestado = $rowuorden['col'];

                                    $nomclientes = $rowuorden['nom_empr'];
                                    $nomnegocio = $rowuorden['nom_contac'];
                                    $localidad = $rowuorden['localidad'];
                                    $retiradcv = $rowuorden['retira'];
                                    $zonaid = $rowuorden['zona'];


                                    $sqlczona = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id='$zonaid'");
                                    if ($rowczona = mysqli_fetch_array($sqlczona)) {

                                        $nombrezona = $rowczona['nombre'];
                                    } else {
                                        $nomclientes = "";
                                        $nomnegocio = "";
                                        $localidad = "";
                                        $nombrezona = "";
                                    }

                                    $sqlpagdeufp = ${"sqlpagdeufp" . $id_cliente};
                                    $rowpagdeufp = ${"rowpagdeufp" . $id_cliente};
                                    $Idordenultima = ${"Idordenultima" . $id_cliente};
                                    /* me fijo la ultima orden para anular el edide las anteriores */
                                    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_cliente'and col='8' ORDER BY `orden`.`id` DESC");
                                    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                        $Idordenultima = $rowpagdeufp['id'];
                                    }

                                    echo '
                                          <tr>
                                          <td style="color: black;">' . date('d/m/Y', strtotime($rowuorden["fecha"])) . '</td>   
                                          <td>
                                              ' . $nombrezona . ' - ' . $nomclientes . ' ' . $nomnegocio . '</td>
                                          <td class="text-center" style="color: black;">';


                                    // if($Idordenultima == $id_orden){ <a href="../nota_de_pedido/?jhduskdsa='.$id_clientecod.'&orjndty='.$id_ordencod.'&ref=1" target="_blank" >
                                    echo '<a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $id_ordencod . '"  target="_blank" tabindex="-1" title="PDF Nota de Pedido">';

                                    echo ' <button type="button" class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">Nº&nbsp;' . $id_orden . '</button></a></td>   
                                             
                                           
                                             
                                             <td style="text-align: right;">$' . number_format($saldo, 0, ',', '.') . '</td>';
                                    echo '<td style="text-align:center;">';
                                    // if($colestado=='10'){
                                    echo ' <a onclick="ajax_confirmarr(' . $id_orden . ',8,' . $id_cliente . ')" class="btn btn-success-rgba" title="Ingresar Cobro a nota de Pedido Nº&nbsp;' . $id_orden . ' Click" tabindex="-1">Ingresar Cobro</a>
                                                         
                                                         <div id="confrmar"></div> ';
                                    //   }
                                    echo '</td>
                                          
                                              

                                              <td class="text-center">
                                              <a href="../deuda_clientes/debe_haber_pdf.php?jhduskdsa=' . $id_clientecod . '" target="_blank" tabindex="-1" class="btn btn-dark-rgba" title="PDF Resumen de cuenta"><i class="dripicons-print"></i></a></td>
                                         
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>


                        <div class="pagination-container">
                            <ul class="pagination">
                                <?php
                                if (($pagina - 1) > 0) { ?>
                                    <li> <a class="pagination-item" onclick="ajax_buscar('<?= $buscar ?>','<?= $desde_date ?>','<?= $hasta_date ?>','<?= $pagina - 1 ?>');">
                                            << /a>
                                    </li>
                                    <?  }

                                if ($total_paginas > 1) {
                                    for ($i = 1; $i <= $total_paginas; $i++) {
                                        if ($pagina == $i) { ?>
                                            <li class="active"><a class="pagination-item" onclick="ajax_buscar('<?= $buscar ?>','<?= $desde_date ?>','<?= $hasta_date ?>','<?= $i ?>');"><?= $i ?></a></li>

                                        <? } else { ?>
                                            <li><a class="pagination-item" onclick="ajax_buscar('<?= $buscar ?>','<?= $desde_date ?>','<?= $hasta_date ?>','<?= $i ?>');"><?= $i ?></a></li>

                                    <? }
                                    }
                                }

                                if (($pagina + 1) <= $total_paginas) { ?>

                                    <li> <a class="pagination-item" onclick="ajax_buscar('<?= $buscar ?>','<?= $desde_date ?>','<?= $hasta_date ?>','<?= $pagina + 1 ?>');">></a></li>
                                <? }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function ajax_confirmarr(iditem, confirmado, id_clientecod) {
                var parametros = {
                    "iditem": iditem,
                    "confirmado": confirmado,
                    "id_clientecod": id_clientecod
                };
                $.ajax({
                    data: parametros,
                    url: '../ingreso_de_cobros/confirmarnot.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#confrmar").html('');
                    },
                    success: function(response) {
                        $("#confrmar").html(response);
                    }
                });
            }
        </script>
        <!-- End col -->
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>