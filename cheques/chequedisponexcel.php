<?php include('../f54du60ig65.php');

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=cheques_disponibles.xls");
header("Pragma: no-cache");
header("Expires: 0");
// Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-12 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");


if ($desde_date < '2025-03-01') {

    $desde_date = '2025-03-01';
}



?>

<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Cheque Cliente</th>
            <th class="text-center">Fecha&nbsp;de&nbsp;pago</th>
            <th class="text-center">Nº Cheque</th>
            <th class="text-center">Banco</th>
            <th class="text-center">Importe</th>
            <th class="text-center">Estado</th>
        </tr>
    </thead>
    <tbody>

        <?php


        $sqljoin = mysqli_query($rjdhfbpqj, "SELECT item_orden.tipopag, item_orden.fecha,item_orden.nota,item_orden.vencheque, item_orden.id_orden, item_orden.id_cliente, item_orden.ncheque, item_orden.valor, 
                                clientes.nom_empr, clientes.address, clientes.nom_contac
                                FROM item_orden 
                                INNER JOIN clientes ON item_orden.id_cliente = clientes.id
                                
                                Where item_orden.tipopag='4' and item_orden.fecha BETWEEN '$desde_date' AND '$fechahoy' ORDER BY `item_orden`.`fecha` DESC");



        while ($roworden = mysqli_fetch_array($sqljoin)) {
            $idorden = $roworden['id_orden'];
            $idcod = base64_encode($idorden);
            $fecha = $roworden['fecha'];
            $vencheque = $roworden['vencheque'];
            $idcli = $roworden['id_cliente'];
            $ncheque = $roworden['ncheque'];
            $banco = $roworden['nota'];
            $fechavr =  date('d/m/Y', strtotime($fecha));


            $valorche = number_format($roworden['valor'], 2, '.', ',');


            $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
            if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

                $nombrecli = $rowclientesi["nom_contac"] . ', ' . $rowclientesi["nom_empr"];
            }



            $valorched = $roworden['valor'];



            $sqldn = mysqli_query($rjdhfbpqj, "SELECT ncheque FROM prodcom Where tipopag='4' and ncheque ='$ncheque' and valor='$valorched'");
            if ($rdrden = mysqli_fetch_array($sqldn)) {
            } else {

                $totalcher += $roworden['valor'];
                $totalcherv = number_format($totalcher, 2, '.', ',');


                echo '
                                        <tr>
                               
                                        <td  style="text-align:center;">' . $fechavr . '</td>
                                        <td style="color: black;">' . $nombrecli . '</td>
                                        <td style="text-align:center;">
                                        ' . date('d/m/Y', strtotime($vencheque)) . '</td>
                                        <td style="color: black;">Nº ' . $ncheque . '</td>
                                        <td style="color: black;">' . $banco . '</td>
                                        
                                        
                                        <td style="color: black;" > $' . $valorche . '</td><td>';




                echo '<b>DISPONIBLE</b>';


                echo '</td>
                                        </tr>
                                        ';
            }
        }

        ?>
        <tr>
            <td colspan="7" style="text-align: center;">
                <h3>Total cheques $<?= $totalcherv ?></h3>
            </td>
        </tr>
    </tbody>
</table>