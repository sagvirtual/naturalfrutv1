<?php include('../f54du60ig65.php');
include('../funciones/StatusOrden.php');
include('../funciones/funcNombreresponsable.php');
$buscar = $_POST['buscar'];
$pagina = $_POST['col'];
$todos = $_POST['col'];

$desde_date = $_POST['desde_date'];
$hasta_date = $_POST['hasta_date'];



?>


<table id="default-datatable" class="table table-bordered table-striped">
    <thead>
        <thead>
            <tr>
                <th class="text-center">Estado</th>
                <th class="text-center">Fecha Pedido</th>
                <th class="text-center">Nº Pedido</th>
                <th>Cliente</th>
                <th class="text-center">Monto Factura</th>
                <th class="text-center">Monto S/IVA</th>
                <th class="text-center">Nº Factura</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Fecha Emitida</th>
                <th class="text-center">Fecha Enviada</th>
            </tr>
        </thead>
    </thead>
    <tbody>
        <?php


        function faturado($rjdhfbpqj, $id_orden)
        {

            $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM facturacion Where id_orden='$id_orden'");
            if ($roworded = mysqli_fetch_array($sqlordendx)) {
                $emitida = $roworded['emitida'];
                $enviada = $roworded['enviada'];
                $monto_fac = $roworded['monto_fac'];
                $monto_sin = $roworded['monto_sin'];
                $nfactura = $roworded['nfactura'];
                $fecha_emitida = $roworded['fecha_emitida'];
                $fecha_enviada = $roworded['fecha_enviada'];
                $resp_emit = $roworded['resp_emit'];
            }
            return array('emitida' => $emitida, 'enviada' => $enviada, 'monto_fac' => $monto_fac, 'monto_sin' => $monto_sin, 'nfactura' => $nfactura, 'fecha_emitida' => $fecha_emitida, 'fecha_enviada' => $fecha_enviada, 'resp_emit' => $resp_emit);
        }






        if ($todos != "1") {
            if (is_numeric($buscar)) {
                $qlovus = "e.id = '$buscar' and";
            } else {
                $qlovus = "(u.nom_empr LIKE '%$buscar%' OR u.nom_contac LIKE '%$buscar%' OR u.address LIKE '%$buscar%' OR u.localidad LIKE '%$buscar%') and e.fecha BETWEEN '$desde_date' and '$hasta_date' and";
            }
        }





        $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha, e.col, e.total, e.ivaporsen, e.id_cliente, u.nom_empr, u.nom_contac, u.retira, u.zona, u.address, u.localidad, u.id as nuncliente
FROM orden e 
INNER JOIN clientes u 
ON e.id_cliente = u.id
Where $qlovus e.ivaporsen >= '4' and e.fecha >='2025-03-20' ORDER BY e.id ASC");



        //$sqluorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id LIKE '%$buscar%' and col = '8'  ORDER BY `orden`.`fecha`  ASC LIMIT 0, 10000");
        while ($rowuorden = mysqli_fetch_array($sqluorden)) {

            $id_orden = $rowuorden["id"];
            $id_cliente = $rowuorden["id_cliente"];
            $saldo = $rowuorden["total"];
            $id_ordencod = base64_encode($rowuorden["id"]);
            $id_clientecod = base64_encode($rowuorden["id_cliente"]);

            $colestado = $rowuorden['col'];

            $nomclientes = $rowuorden['nom_empr'];
            $nomnegocio = $rowuorden['nom_contac'];
            $localidad = $rowuorden['localidad'];
            $retiradcv = $rowuorden['retira'];
            $zonaid = $rowuorden['zona'];

            $resufatura = faturado($rjdhfbpqj, $id_orden);


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

            $emitida = ${"emitida" . $id_orden};
            $enviada = ${"enviada" . $id_orden};
            $monto_fac = ${"monto_fac" . $id_orden};
            $monto_sin = ${"monto_sin" . $id_orden};
            $nfactura = ${"nfactura" . $id_orden};
            $fecha_emitida = ${"fecha_emitida" . $id_orden};
            $resp_emit = ${"resp_emit'" . $id_orden};




            $emitida = $resufatura['emitida'];
            $enviada = $resufatura['enviada'];
            $monto_fac = $resufatura['monto_fac'];
            $monto_sin = $resufatura['monto_sin'];
            $nfactura = $resufatura['nfactura'];
            $fecha_emitida = $resufatura['fecha_emitida'];
            $fecha_enviada = $resufatura['fecha_enviada'];
            $resp_emit = $resufatura['resp_emit'];
            $resposable = NomResponsa($rjdhfbpqj, $resp_emit);
            if (!empty($monto_fac)) {
                $saldo = $monto_fac;
            }


            $estado = StatusOrden($rjdhfbpqj, $id_orden);
            echo '
                                          <tr>
                                          <td style="color: black;">' . $estado . '</td>

                                          <td style="color: black;text-align:center;">' . date('d/m/y', strtotime($rowuorden["fecha"])) . '</td>
                                          <td class="text-center" style="color: black;">
                                             
                                                <a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $id_ordencod . '"  target="_blank" tabindex="-1" title="PDF Nota de Pedido"><button type="button" class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">Nº ' . $id_orden . '</button></td>   
                                             </a>
                                              <td>
                                              ' . $nombrezona . ' - ' . $nomclientes . ' ' . $nomnegocio . '
                                             
                                             <td>$' . number_format($saldo, 2, ',', '.') . '</td> 
                                             <td style="text-align: right;">$' . number_format($monto_sin, 2, ',', '.') . '</td>
                                           
                                              <td class="text-center">
                                              ' . $nfactura . '
                                              </td>

                                              <td class="text-center">
                                              ' . $resposable . '
                                            </td>
                                               <td class="text-center">';
            if ($fecha_emitida > '2000-01-01') {
                echo '  ' . date('d/m/y', strtotime($fecha_emitida)) . '';
                $emitir = 1;
            } else {
                echo '<span class="badge bg-danger">Falta Emitir</span>';
                $emitir = 0;
            }
            echo ' </td>
                                              <td class="text-center">';
            if ($fecha_enviada > '2000-01-01') {
                echo '  ' . date('d/m/y', strtotime($fecha_enviada)) . '';
            } else {
                if ($emitir == 1) {
                    echo '<span class="badge bg-danger">Falta Enviar</span>';
                }
            }
            echo ' </td>
                                        </tr>';
        }
        ?>

    </tbody>
</table>