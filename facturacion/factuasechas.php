<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcNombrcliente.php');

$id_fac       = isset($_POST['id_fac']) ? $_POST['id_fac'] : '';
$quien        = isset($_POST['quien']) ? $_POST['quien'] : '';
$fecha_desde  = isset($_POST['fecha_desde']) ? $_POST['fecha_desde'] : '';
$fecha_hasta  = isset($_POST['fecha_hasta']) ? $_POST['fecha_hasta'] : '';

$fecha_desde = $fecha_desde . " 00:00:00";
$fechas_hasta = $fechas_hasta . " 23:59:00";

echo '
<table id="default-datatable" class="table table-bordered table-striped">
    <thead>
        <thead>
            <tr>
                <th class="text-center">Nº Orden</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Monto Factura</th>
                <th class="text-center">Nº Factura</th>
                <th class="text-center">Realizada</th>
                <th class="text-center">Hora</th>
            </tr>
        </thead>
    </thead>
    <tbody>';
$sqlfact = mysqli_query(
    $rjdhfbpqj,
    "SELECT fecha_emitida,id_orden,nfactura,monto_fac,fecha_facturada
             FROM facturacion 
             WHERE quienfac = '$quien' AND emitida = '1' and fecha_facturada BETWEEN '$fecha_desde' and '$fecha_hasta' ORDER BY fecha_facturada ASC"
);


while ($rowusfac = mysqli_fetch_array($sqlfact)) {
    $id_orden = $rowusfac['id_orden'];
    $fecha_emitida = $rowusfac['fecha_facturada'];
    $nfactura = $rowusfac['nfactura'];
    $monto_fac = number_format($rowusfac['monto_fac'], 2, '.', ',');

    $fecha_formateada = date("d/m/y", strtotime($fecha_emitida));
    $hora_formateada  = date("H:i", strtotime($fecha_emitida));


    $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden' AND ivaporsen > 1 ");

    if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
        $id_cliente = $rowusdfac['id_cliente'];
        $NomCliente = NomCliente($rjdhfbpqj, $id_cliente);
        $fechapedido = date("d/m/y", strtotime($rowusdfac['fecha']));

        echo '<tr>
        <td class="text-center">Nº' . $id_orden . '</td>
        <td>' . $NomCliente . '</td>
        <td class="text-center">$' . $monto_fac . '</td>
        <td class="text-center">Nº' . $nfactura . '</td>
        <td class="text-center">' . $fecha_formateada . '</td>
        <td class="text-center">' . $hora_formateada . '</td>
        </tr>';
    }
}

echo ' </tbody>
</table>';
