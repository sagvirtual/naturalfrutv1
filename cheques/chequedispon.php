<?php include('../f54du60ig65.php');


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



<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <script>
                    $('#default-datatable').DataTable({
                        "order": [
                            [0, "asc"]
                        ],
                        responsive: true
                    });
                </script>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
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
                                    $fechav = explode("-", $fecha);
                                    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

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
                                        <tr style="' . $colorestado . '">
                               
                                        <td class="text-center" scope="row">' . $fechavr . '</td>
                                        <td style="color: black;">' . $nombrecli . '</td>
                                        <td class="text-center" style="color: black;">     
                                         <p style="display:none;"> ' . date('Y/m/d', strtotime($vencheque)) . '</p>
                                        ' . date('d/m/y', strtotime($vencheque)) . '</td>
                                        <td class="text-center" style="color: black;">Nº ' . $ncheque . '</td>
                                        <td style="color: black;">' . $banco . '</td>
                                        
                                        
                                        <td style="color: black;" class="text-center"> $' . $valorche . '</td>
                                        
                                        <td class="text-center">';




                                        echo '<b>DISPONIBLE</b>';


                                        echo '</td>
                                        </tr>
                                        ';
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                        <div class="container text-center">
                            <h3>Total cheques $<?= $totalcherv ?></h3>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chequedisponexcel" target="_blank"><button type="button" style="cursor: pointer;" class="btn btn-success">Cheques Disponibles Excel</button></a>
                    </div>
                </div>
            </div>
        </div>