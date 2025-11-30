<?php include('../f54du60ig65.php');

$buscar = $_POST['buscar'];

function prparo($rjdhfbpqj, $usuapick)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id='$usuapick'");
    if ($rowusuard = mysqli_fetch_array($sqlusuarios)) {

        $preparo = $rowusuard['nom_contac'];
    }
    return $preparo;
}



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


                                    <th style="width: 80px;">Fecha&nbsp;Orden</th>
                                    <th style="width: 120px;" class="text-center">Nº&nbsp;Orden</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th class="text-center">Accion</th>
                                    <th class="text-center">Responsable</th>
                                    <th class="text-center">Fecha </th>
                                    <th class="text-center">hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.fecha,e.id_orden, e.id_producto,e.nombre, e.id_cliente, u.nom_empr, u.nom_contac, u.retira, u.zona, u.address, u.localidad, u.id as nuncliente,a.origen,a.responsable,a.data_acction,a.data_acction
                                FROM item_orden e 
                                INNER JOIN clientes u 
                                ON e.id_cliente = u.id
                                    LEFT JOIN actividad a ON a.id_orden = e.id_orden and a.id_producto = e.id_producto

                                Where a.id_orden = '$buscar'  ORDER BY `fecha`  DESC
                                ");

                                if (!$sqluorden) {
                                    die('Error en la consulta: ' . mysqli_error($rjdhfbpqj));
                                }

                                while ($rowuorden = mysqli_fetch_array($sqluorden)) {

                                    $id_orden = $rowuorden["id_orden"];
                                    $id_cliente = $rowuorden["id_cliente"];
                                    $saldo = $rowuorden["saldo"];
                                    $id_hoja = $rowuorden["id_hoja"];
                                    $usuapick = $rowuorden['responsable'];
                                    $fecha_hora = $rowuorden['data_acction'];
                                    $datoaccion = explode(" ", $fecha_hora);
                                    $fechamod = date('d/m/Y', strtotime($datoaccion[0]));
                                    $horamod = $datoaccion[1];

                                    $id_ordencod = base64_encode($rowuorden["id_orden"]);
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


                                    echo '
                                          <tr>
                                          <td style="color: black;" class="text-center">' . date('d/m/Y', strtotime($rowuorden["fecha"])) . '</td>
                                          <td class="text-center" style="color: black;">';



                                    echo '<a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $id_ordencod . '"  target="_blank" tabindex="-1" title="PDF Nota de Pedido">';


                                    echo ' <button type="button" class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">Nº ' . $id_orden . '</button></td>   
                                             </a>
                                              <td>
                                              ' . $nombrezona . ' - ' . $nomclientes . ' ' . $nomnegocio . '
                                             </td>
                                             <td>' . $rowuorden['nombre'] . '</td> 
                                             <td class="text-center">' . $rowuorden['origen'] . '</td> 
                                             <td class="text-center"><b>' . prparo($rjdhfbpqj, $usuapick) . '</b></td>
                                             <td class="text-center">' . $fechamod . '</td> 
                                             <td class="text-center">' . $horamod . '</td> 
                                           
                                             
                                             
                                           
                                        </tr>';
                                }
                                ?>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>