<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


if ($_POST['buscar'] != "") {
    $buscar = $_POST['buscar'];
    $col = $_POST['col'];
    $diaver = $_POST['diaver'];
} else {
    $buscar = '';
    $col = $_POST['col'];

    $diaver = $_POST['diaver'];
}
$comilla = "'";


function compararFecha($fechahoja, $fechahoy, $fechadn)
{
    $fechaActual = new DateTime($fechahoy); // Fecha actual
    $fechaIngresada = new DateTime($fechahoja); // La fecha ingresada
    $diaesx = date('d/m', strtotime($fechahoja));
    // Diferencia entre las fechas en días
    $diferencia = $fechaActual->diff($fechaIngresada)->days;
    $esFuturo = $fechaIngresada > $fechaActual;

    if ($diferencia == 0) {
        return '<b style="color:red;">Hoy<br>' . $fechadn . '</b>';
    } elseif ($diferencia == 1 && $esFuturo) {
        return '<b style="color:blue;">Mañana<br>' . $fechadn . '</b>';
    } elseif ($diferencia == 2 && $esFuturo) {
        return '<b style="color:green;">Pasado Mañana<br>' . $fechadn . '</b>';
    } elseif ($diferencia == 3 && $esFuturo) {
        return '<b style="color:green;">Este ' . $fechadn . '</b>';
    } elseif ($diferencia == 4 && $esFuturo) {
        return '<b style="color:green;">Este ' . $fechadn . '</b>';
    } elseif ($diferencia == 5 && $esFuturo) {
        return '<b style="color:green;">Este ' . $fechadn . '</b>';
    } elseif ($diferencia == 6 && $esFuturo) {
        return '<b style="color:green;">Este ' . $fechadn . '</b>';
    } else {
        return $fechadn . ' ' . $diaesx;
    }
}
?>

<link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
    .dots::after {
        width: 10px;
        text-align: left;
        content: '';
        display: inline-block;
        animation: dots 1s steps(5, end) infinite;
    }

    @keyframes dots {

        0%,
        20% {
            content: '';
        }

        40% {
            content: '.';
        }

        60% {
            content: '..';
        }

        80%,
        100% {
            content: '...';
        }
    }
</style>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [0, "desc"]
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


                                    <th>Fecha</th>
                                    <th>Nº Orden</th>
                                    <th>Proveedor</th>
                                    <th>Estado</th>

                                    <th>Entrega/Retiro</th>

                                    <th class="text-center">Deuda $</th>
                                    <th>Forma</th>
                                    <th>Día</th>
                                    <th class="text-center">PDF</th>
                                    <th class="text-center">Cuenta</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($diaver)) {
                                    $sqls = "(e.id LIKE '%$buscar%' OR u.empresa LIKE '%$buscar%' OR u.address LIKE '%$buscar%') and (e.col LIKE '8'  and e.col != '10')";
                                } else {
                                    $sumodia = date("Y-m-d", strtotime($fechahoy . "+ 6 days"));
                                    $sqls = "e.dia = '$diaver' and e.fechahoja<='$sumodia' and e.fechahoja>='$fechahoy'";
                                }

                                $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.id, e.dia, e.dia, e.fecha,e.fecha1, e.fechahoja, e.id_usuarioclav, e.col, e.saldo, e.saldoreal, e.id_cliente, 
                                    u.empresa, u.address, u.retira, u.id as nunprove
                                    FROM ordencompra e 
                                    INNER JOIN proveedores u 
                                    ON e.id_cliente = u.id
                                    Where  $sqls
                                    
                                    ");


                                while ($rowuorden = mysqli_fetch_array($sqluorden)) {

                                    $id_orden = $rowuorden["id"];
                                    $retiradcv = $rowuorden["retira"];
                                    $fechadn = $rowuorden["fechahoja"];
                                    $fechahoja = $rowuorden["fechahoja"];
                                    $colestado = $rowuorden['col'];
                                    $saldo = $rowuorden['saldo'];
                                    $saldoreal = $rowuorden['saldoreal'];

                                    if ($saldoreal != '0') {
                                        $saldoorden = number_format($saldoreal, 2, '.', ',');
                                        $saldototo += $saldoreal;
                                    } else {
                                        $saldoorden = number_format($saldo, 2, '.', ',');
                                        $saldototo += $saldo;
                                    }



                                    if ($fechadn != '0000-00-00') {
                                        $dia_en_espanol = array(
                                            'Monday'    => 'Lunes',
                                            'Tuesday'   => 'Martes',
                                            'Wednesday' => 'Miércoles',
                                            'Thursday'  => 'Jueves',
                                            'Friday'    => 'Viernes',
                                            'Saturday'  => 'Sábado',
                                            'Sunday'    => 'Domingo'
                                        );

                                        $nombre_dia_ingles = date('l', strtotime($fechadn));
                                        $fechadn = $dia_en_espanol[$nombre_dia_ingles];

                                        $verquedia = compararFecha($fechahoja, $fechahoy, $fechadn);
                                    } else {
                                        $fechadn = '';
                                    }

                                    $idcamioneta = $rowuorden["camioneta"];
                                    $id_usuarioclav = $rowuorden["id_usuarioclav"];
                                    $id_cliente = $rowuorden["id_cliente"];
                                    $saldo = $rowuorden["saldo"];
                                    $id_ordencod = base64_encode($rowuorden["id"]);
                                    $id_clientecod = base64_encode($rowuorden["id_cliente"]);

                                    $id_ordenv = str_pad($rowuorden["id"], 8, '0', STR_PAD_LEFT);

                                    if ($retiradcv == '0') {
                                        $verprreir = "Entregan";
                                        $vforma = "Fecha Entrega";
                                    } else {
                                        $verprreir = '<i style="color:blue;">Retirar ' . $rowuorden['andress'] . '</i>';
                                        $vforma = "Fecha Retiro";
                                    }
                                    if ($colestado == '0') {
                                        $estadoorden = '<span class="badge" style="background-color:grey;color:white;">Ingresando<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '1') {
                                        $estadoorden = '<span class="badge" style="background-color:#AD3B06;color:white;">Eperando ' . $vforma . '<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '2') {
                                        $estadoorden = '<span class="badge" style="background-color:#067FAD;color:white;">Confirmado</span>';
                                    }

                                    if ($colestado == '4') {
                                        $estadoorden = '<span class="badge" style="background-color: #678C35;color:white;">Pidiendo Productos<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '5') {
                                        $estadoorden = '<span class="badge" style="background-color:#9000BA;color:white;">Controlando<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '6') {
                                        $estadoorden = '<span class="badge" style="background-color:#F0FF00;color:black;">Listo para Retiro</span>';
                                    }
                                    if ($colestado == '7') {
                                        $estadoorden = '<span class="badge" style="background-color:#FFD500;color:black;">Listo para Despacho</span>';
                                    }
                                    if ($colestado == '8') {
                                        $estadoorden = '<span class="badge" style="background-color:black;color:white;">CONCRETADO</span>';
                                    }




                                    echo '
                                          <tr>
                                          <td style="color: black;">' . date('Y/m/d', strtotime($rowuorden["fecha"])) . '</td><td class="text-center" style="color: black;">
                                             
                                             <a href="../orden_de_compra/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '">
                                             <button type="button" class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">Nº ' . $id_ordenv . '</button></td>   
                                             </a>
                                              <td>
                                               ' . $rowuorden["empresa"] . '
                                               </td>
                                             
                                              <td>' . $estadoorden . '</td>';



                                    echo '<td style="text-align:center;">';
                                    if ($colestado >= '1' || $colestado == '' && $fechahoja != "0000-00-00") {
                                        if ($fechahoja == "0000-00-00") {
                                            echo ' <i style="color:grey;">Sin Fecha</i>
                                            ';
                                        } else {

                                            echo ' 
                                             ' . date('Y/m/d', strtotime($fechahoja)) . '
                                            ';
                                        }
                                    } else {
                                        echo "";
                                    }
                                    echo '</td>';



                                    echo '
                                              <td class="text-center">' . $saldoorden . '</td>
                                              <td class="text-center">' . $verprreir . '</td>
                                              <td class="text-center"> ';
                                    if ($colestado >= '1' || $colestado == '') {
                                        echo '' . $verquedia . '';
                                    }
                                    echo '</td>
                                            <td class="text-center">
                                             <a href="../orden_de_compra/orden_de_compra_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '"><i class="dripicons-print"></i></a>
                                            </td>


                                              <td class="text-center">';
                                    if ($colestado != '0') {


                                        echo ' <a href="../deuda_proveedores/debe_haber?jhduskdsa=' . $id_clientecod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '"><i class="dripicons-checklist"></i></a>';
                                    }
                                    echo '   </td>
                                        
                                            <td class="text-center">
                                                <div class="button-list">';
                                    if ($colestado == '8') {
                                        echo '
                                              
                                                    <a href="../orden_de_compra/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-success-rgba" title="Editar"><i class="ri-pencil-line"></i></a>';
                                    }
                                    if ($colestado < '2') {
                                        echo ' 
                                                   <a href="javascript:void(0);" ondblclick="eliminar(' . "'/orden_de_compra/mlkdths?" . 'jnnfsc=' . $id_ordencod . '' . "'" . ')" class="btn btn-danger-rgba">
                                                   
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                    }
                                    echo ' </div>
                                            </td>
                                        </tr>';
                                }
                                $saldototo = number_format($saldototo, 2, '.', ',');



                                if ($tipo_usuario == "0") {

                                ?>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:right;"><b>Total Concretados</b> </td>
                                        <td class="text-center"><b><?= $saldototo ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php

                                }
                                mysqli_close($rjdhfbpqj);
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