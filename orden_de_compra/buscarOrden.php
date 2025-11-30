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

$sinenviar = $_POST['sinenviar'];
$quinenviar = $_POST['quinenviar'];

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive" style="position:relative; top:-50px;">
                        <script>
                            setTimeout(function() {
                                var divb = document.getElementById('muestroorden4');
                                divb.style.display = 'none';
                            }, 3000); // 5000 milisegundos = 5 segundos
                        </script>

                        <div id="muestroorden4"> </div>
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>


                                    <th>Fecha</th>
                                    <th>Proveedor</th>

                                    <th class="text-center">Fecha Tarea</th>

                                    <th class="text-center">Tarea</th>

                                    <?
                                    if ($tipo_usuario == "0" ||  $tipo_usuario == "37" || $tipo_usuario == "1") { ?>
                                        <th class="text-center" style="width: 56px;">Forma</th>

                                        <th class="text-center">Total OC</th>
                                    <? } ?>
                                    <th ass="text-center">Día</th>
                                    <th class="text-center">PDF</th>

                                    <?
                                    if ($tipo_usuario == "0" ||  $tipo_usuario == "37"  || $tipo_usuario == "1") { ?>
                                        <th class="text-center">Cuenta</th>
                                        <th class="text-center">Acción</th>
                                    <? } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($sinenviar == '1') {
                                    $sqls = " e.enviado = '0' and  e.quien='$quinenviar'";
                                } else {
                                    if (empty($diaver)) {
                                        if (empty($col)) {

                                            $sqls = "(e.id LIKE '%$buscar%' OR u.empresa LIKE '%$buscar%' OR u.address LIKE '%$buscar%') and (e.col LIKE '%$col%' and e.col != '8')";
                                        } else {
                                            $sqls = "(e.id LIKE '%$buscar%' OR u.empresa LIKE '%$buscar%' OR u.address LIKE '%$buscar%') and (e.col LIKE '%$col%')";
                                        }
                                    } else {
                                        $sumodia = date("Y-m-d", strtotime($fechahoy . "+ 6 days"));
                                        $sqls = "e.dia = '$diaver' and e.fechahoja<='$sumodia' and e.fechahoja>='$fechahoy' and e.col != '8'";
                                    }
                                }


                                $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.id, e.dia, e.dia, e.fecha,e.fecha1, e.fechahoja, e.id_usuarioclav, e.col, e.saldo, e.saldoreal, e.id_cliente, e.fefecivo, e.fcheque, e.ftransfer, e.fdeposito, e.enviado, e.comment, e.tarea,e.tipoprov,e.quien,
                                    u.empresa, u.address, u.retira, u.id as nunprove
                                    FROM ordencompra e 
                                    INNER JOIN proveedores u 
                                    ON e.id_cliente = u.id
                                    Where  $sqls
                                    
                                    ");


                                while ($rowuorden = mysqli_fetch_array($sqluorden)) {

                                    $id_orden = $rowuorden["id"];
                                    $retiradcv = $rowuorden["retira"];
                                    $enviado = $rowuorden["enviado"];
                                    $fechadn = $rowuorden["fechahoja"];
                                    $fechahoja = $rowuorden["fechahoja"];
                                    $colestado = $rowuorden['col'];
                                    $saldo = $rowuorden['saldo'];
                                    $saldoreal = $rowuorden['saldoreal'];
                                    $diahay = $rowuorden['dia'];
                                    $tarea = $rowuorden['tarea'];
                                    $tipoprov = $rowuorden['tipoprov'];
                                    $quien = $rowuorden['quien'];

                                    $fefecivo = ${"fefecivo" . $rowuorden['id']};
                                    $fcheque =  ${"fcheque" . $rowuorden['id']};
                                    $ftransfer =  ${"ftransfer" . $rowuorden['id']};
                                    $fdeposito =  ${"fdeposito" . $rowuorden['id']};
                                    $comment =  ${"comment" . $rowuorden['id']};
                                    $pagoforma =  ${"pagoforma" . $rowuorden['id']};

                                    /*   $tarea =  ${"tarea".$rowuorden['id']};
                                        $seled99 =  ${"seled99".$rowuorden['id']};
                                        $seled6 =  ${"seled6".$rowuorden['id']};
                                        $seled7 =  ${"seled7".$rowuorden['id']};
                                        $seled1 =  ${"seled1".$rowuorden['id']};
                                        $seled8 =  ${"seled8".$rowuorden['id']}; */

                                    $seled20 =  ${"seled20" . $rowuorden['id']};
                                    $seled21 =  ${"seled21" . $rowuorden['id']};
                                    $seled22 =  ${"seled22" . $rowuorden['id']};
                                    $seled23 =  ${"seled23" . $rowuorden['id']};
                                    $seled24 =  ${"seled24" . $rowuorden['id']};
                                    $seled25 =  ${"seled25" . $rowuorden['id']};
                                    $seled26 =  ${"seled26" . $rowuorden['id']};

                                    $fefecivo = $rowuorden['fefecivo'];
                                    $fcheque = $rowuorden['fcheque'];
                                    $ftransfer = $rowuorden['ftransfer'];
                                    $fdeposito = $rowuorden['fdeposito'];

                                    if ($fefecivo > 0) {
                                        $pagoforma .= '<button type="button" class="btn btn-sm btn-primary" style="width: 160px;">EFECTIVO<br>
                                            $' . number_format($fefecivo, 2, ',', '.') . '</button>';
                                    }
                                    if ($fcheque > 0) {
                                        $pagoforma .= '<button type="button" class="btn btn-sm btn-danger" style="width: 160px;">CHEQUE<br>
                                            $' . number_format($fcheque, 2, ',', '.') . '</button>';
                                    }
                                    if ($ftransfer > 0) {
                                        $pagoforma .= '<button type="button" class="btn btn-sm btn-warning" style="width: 160px;">TRANSFER<br>
                                            $'                                            . number_format($ftransfer, 2, ',', '.') . '</button>';
                                    }
                                    if ($fdeposito > 0) {
                                        $pagoforma .= '<button type="button" class="btn btn-sm btn-success" style="width: 160px;">DEPOSITO<br>
                                            $' . number_format($fdeposito, 2, ',', '.') . '</button>';
                                    }



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

                                        if ($diahay != '0') {
                                            $verquedia = compararFecha($fechahoja, $fechahoy, $fechadn);
                                        }
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
                                        $estadoorden = '<span class="badge" style="background-color:#AD3B06;color:white;">Eperando Fecha<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '2' || $colestado > '19') {
                                        $estadoorden = '<span class="badge" style="background-color:#067FAD;color:white;">Confirmado</span>';
                                    }

                                    if ($colestado == '4') {
                                        $estadoorden = '<span class="badge" style="background-color:#067FAD;color:white;">Confirmado</span>';
                                    }
                                    if ($colestado == '5') {
                                        $estadoorden = '<span class="badge" style="background-color:#067FAD;color:white;">Confirmado</span>';
                                    }
                                    if ($colestado == '6') {
                                        $estadoorden = '<span class="badge" style="background-color:RED;color:black;">Entregado sin pagar</span>';
                                    }
                                    if ($colestado == '7') {
                                        $estadoorden = '<span class="badge" style="background-color:RED;color:black;">Pagado sin Entregar</span>';
                                    }
                                    if ($colestado == '8') {
                                        $estadoorden = '<span class="badge" style="background-color:black;color:white;">FINALIZADO</span>';
                                    }



                                    if ($tarea == '99') {
                                        $seled99 = "selected";
                                    }

                                    if ($col == '6') {
                                        $seled6 = "selected";
                                    }
                                    if ($col == '7') {
                                        $seled7 = "selected";
                                    }
                                    if ($col == '1') {
                                        $seled1 = "selected";
                                    }
                                    if ($col == '8') {
                                        $seled8 = "selected";
                                    }

                                    if ($tarea == '20') {
                                        $seled20 = "selected";
                                    }
                                    if ($tarea == '21') {
                                        $seled21 = "selected";
                                    }
                                    if ($tarea == '22') {
                                        $seled22 = "selected";
                                    }
                                    if ($tarea == '23') {
                                        $seled23 = "selected";
                                    }
                                    if ($tarea == '24') {
                                        $seled24 = "selected";
                                    }
                                    if ($tarea == '25') {
                                        $seled25 = "selected";
                                    }
                                    if ($tarea == '26') {
                                        $seled26 = "selected";
                                    }



                                    $fefecivov += $rowuorden['fefecivo'];
                                    $fchequev += $rowuorden['fcheque'];
                                    $ftransferv += $rowuorden['ftransfer'];
                                    $fdepositov += $rowuorden['fdeposito'];
                                    $chec = ${"chec" . $id_orden};
                                    if ($enviado == "1") {
                                        $chec = "checked";
                                    }
                                    echo '
                                          <tr>
                                          <td style="color: black;" class="text-center" ><i style="display: none;">' . date('Y/m/d', strtotime($rowuorden["fecha"])) . '</i>
                                           <b  class="btn btn-secondary" style="background-color: #EAE9E9;color: black; font-weight: bold;">' . date('d/m/y', strtotime($rowuorden["fecha"])) . '<br>         
                                         Nº' . $id_ordenv . '</b><br>
                                         ' . $estadoorden . '
                                          </td>
                                            
                                             
                                              <td>


                                                                      <input type="checkbox" id="enviado' . $id_orden . '"  name="enviado' . $id_orden . '"  value="1" 
                                                                onclick="ajax_seenvio(' . $comilla . '' . $id_orden . '' . $comilla . ', 
                                                                    $(' . $comilla . 'input:checkbox[name=enviado' . $id_orden . ']:checked' . $comilla . ').val()
                                                                );" 
                                                                    ' . $chec . '>



                                               ' . $rowuorden["empresa"] . '
                                               <select name="quien' . $id_orden . '" id="quien' . $id_orden . '" class="form-control"  style="width:210px;"
                                               onchange="ajax_quien($(' . $comilla . '#quien' . $id_orden . '' . $comilla . ').val(), ' . $comilla . '' . $id_orden . '' . $comilla . ');" tabindex="-1">
                                               <option value="0">--Enviar--</option>';

                                    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente<='1' and estado = '0' and (id='35' or id='74' or id='51') ORDER BY nom_contac ASC");
                                    while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

                                        echo ' <option value="' . $rowusuarios["id"] . '"';
                                        if ($quien == $rowusuarios["id"]) {
                                            echo 'selected';
                                        }
                                        echo '>' . $rowusuarios["nom_contac"] . '</option>';
                                    }





                                    echo '  </select></td>
                                             
                                             ';



                                    echo '<td style="text-align:center;">';
                                    //if($colestado>='1'|| $colestado==''){
                                    echo ' 
                                               <input type="date" id="confirmado' . $id_orden . '" value="' . $fechahoja . '" class="form-control" onChange="ajax_confirmarr(' . $id_orden . ',$(' . $comilla . '#confirmado' . $id_orden . '' . $comilla . ').val())" style="width: 150px;"  >
                                               <div style="position: absolute; z-index: 99999; left: -400px;">' . $fechahoja . '</div>
                                                
                                                <div id="confrmar"></div> ';
                                    //  }
                                    echo '</td>';



                                    echo '
                                             
                                              <td class="text-center">
                                              
                                                  <select name="col' . $id_orden . '" id="col' . $id_orden . '" class="form-control"  style="width:210px;"
                                                  onchange="ajax_ssseguimiento($(' . $comilla . '#col' . $id_orden . '' . $comilla . ').val(), ' . $comilla . '' . $id_orden . '' . $comilla . ');" tabindex="-1" ' . $blain . '>';
                                    echo ' <option value="99" ' . $seled99 . '>--Elegir tarea--</option>';
                                    if ($retiradcv == '0') {
                                        echo '<option value="20" ' . $seled20 . '>Entregan/Cobran</option>';
                                    }
                                    if ($retiradcv == '0') {
                                        echo '<option value="21" ' . $seled21 . '>Solo Entregan</option> ';
                                    }
                                    if ($retiradcv == '1') {
                                        echo '<option value="22" ' . $seled22 . '>Retirar y Pagar</option> ';
                                    }
                                    if ($retiradcv == '1') {
                                        echo '<option value="23" ' . $seled23 . '>Retirar Sin Pagar</option> ';
                                    }
                                    echo '<option value="24" ' . $seled24 . '>Cobran</option>';
                                    echo '<option value="25" ' . $seled25 . '>Ir a Pagar</option>';
                                    echo '<option value="26" ' . $seled26 . '>Ir a Depositar</option>';
                                    echo ' <option value="6" >ENTREGADO S/PAGAR</option>';
                                    echo '<option value="7" >PAGADO S/ENTREGAR</option> ';
                                    echo '<option value="1" >ESPERANDO FECHA</option> ';
                                    echo '<option value="8" ' . $seled8 . '>**FINALIZADO**</option>';
                                    echo ' </select>
                                              </td>';
                                    if ($tipo_usuario == "0" ||  $tipo_usuario == "37"  || $tipo_usuario == "1") {
                                        echo '
                                              <td class="text-center">
                                              ' . $pagoforma . '
                                              </td>
                                              <td class="text-center">' . $saldoorden . '<br> <p style="font-size: 10pt;">' . $rowuorden['comment'] . ' </p></td>
                                          ';
                                    }
                                    echo '
                                              <td class="text-center"> ';
                                    if ($colestado >= '1' || $colestado == '') {
                                        if ($diahay != 0) {
                                            echo '' . $verquedia . '';
                                        }
                                    }

                                    echo '</td>
                                              
                                            <td class="text-center">';
                                    if ($tipo_usuario == "0" ||  $tipo_usuario == "37"  || $tipo_usuario == "1") {
                                        echo '
                                             <a href="../orden_de_compra/orden_de_compra_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="Con Precio"><i class="feather icon-dollar-sign"></i></a> 
                                             ';
                                    }
                                    echo '
                                             <a href="../orden_de_compra/orden_de_comprasin_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="Sin Precio"><i class="dripicons-print"></i></a>

                                            </td>

                                              ';
                                    if ($tipo_usuario == "0" ||  $tipo_usuario == "37"  || $tipo_usuario == "1") {
                                        echo '
                                              <td class="text-center">';
                                        if ($colestado != '0' && $tipoprov == '0') {


                                            echo ' <a href="../deuda_proveedores/debe_haber?jhduskdsa=' . $id_clientecod . '&modo=0" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '" style="width:51px;">"A"</a>
                                             <a href="../deuda_proveedores/debe_haber?jhduskdsa=' . $id_clientecod . '&modo=1" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '" style="width:51px;">"R"</a> 
                                             
                                             
                                             ';
                                        }
                                        if ($colestado != '0' && $tipoprov == '1') {


                                            echo ' <a href="../deuda_proveedores/debe_haber?jhduskdsa=' . $id_clientecod . '&modo=0&tipoprove=1" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '" style="width:101px;">C/C</a>
                                                
                                                
                                                ';
                                        }
                                        echo '   </td>
                                        
                                            <td class="text-center">
                                                <div class="button-list">';
                                        if ($colestado != '8') {
                                            echo '
                                              
                                                    <a href="../orden_de_compra/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-success-rgba" title="Editar" target="_blank"><i class="ri-pencil-line"></i></a>';
                                        }
                                        if ($colestado < '2' && $tipoprov != '1') {
                                            echo ' 
                                                   <a href="javascript:void(0);" ondblclick="eliminar(' . "'/orden_de_compra/mlkdths?" . 'jnnfsc=' . $id_ordencod . '' . "'" . ')" class="btn btn-danger-rgba">
                                                   
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                        }
                                        echo ' </div>
                                            </td>

                                            ';
                                    }
                                    echo '
                                        </tr>';
                                }

                                $saldototo = number_format($saldototo, 0, '.', ',');
                                if (!empty($fechadn)) {
                                    if (empty($diaver)) {
                                        $fechadns = "Confirmados";
                                    } else { {
                                            $fechadns = $fechadn;
                                        }
                                    }
                                ?>


                                <? } ?>

                            </tbody>
                        </table>


                        <?php
                        if ($tipo_usuario == "0" || $tipo_usuario == "37" || $tipo_usuario == "1") {
                            if ($saldototo > 0) {

                        ?>
                                <table id="default-datatable" class="table table-bordered table-striped">
                                    <tr>
                                        <? if ($fefecivov > 0) { ?>
                                            <td class="text-center">(E)Total Efectivo&nbsp;&nbsp;&nbsp;<b>$<?= number_format($fefecivov, 0, '.', ',') ?></b></td>
                                        <? } ?>
                                        <? if ($fdepositov > 0) { ?>
                                            <td class="text-center">(D)Total Deposito&nbsp;&nbsp;&nbsp;<b>$<?= number_format($fdepositov, 0, '.', ',') ?></b></td>
                                        <? } ?>

                                        <? if ($fdepositov > 0 && $fefecivov > 0) {
                                            $emasd = $fdepositov + $fefecivov;

                                        ?>
                                            <td class="text-center">Total E + D &nbsp;&nbsp;&nbsp;<b>$<?= number_format($emasd, 0, '.', ',') ?></b></td>
                                        <? } ?>


                                        <? if ($fchequev > 0) { ?>
                                            <td class="text-center">Total Cheques&nbsp;&nbsp;&nbsp;<b>$<?= number_format($fchequev, 0, '.', ',') ?></b></td>
                                        <? } ?>
                                        <? if ($ftransferv > 0) { ?>
                                            <td class="text-center">Total Transferencia&nbsp;&nbsp;&nbsp;<b>$<?= number_format($ftransferv, 0, '.', ',') ?></b></td>
                                        <? }
                                        $totaltodf = $fefecivov + $fdepositov + $fchequev + $ftransferv;

                                        ?>

                                        <td class="text-center"><b>Total <?= $fechadns ?>&nbsp;&nbsp;&nbsp;$<?= number_format($totaltodf, 0, '.', ',') ?></b></td>
                                    </tr>
                                </table> <? }
                                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ajax_confirmarr(iditem, confirmado) {
        var parametros = {
            "iditem": iditem,
            "confirmado": confirmado
        };
        $.ajax({
            data: parametros,
            url: '../orden_de_compra/confirmarorden.php',
            type: 'POST',
            beforeSend: function() {
                $("#confrmar").html('');
            },
            success: function(response) {
                $("#confrmar").html(response);
            }
        });
    }

    function ajax_ssseguimiento(col, idorden) {
        var parametros = {
            "col": col,
            "idorden": idorden
        };
        $.ajax({
            data: parametros,
            url: '../orden_de_compra/guardasegtarea.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }

    function ajax_seenvio(id_orden, enviado) {


        var parametros = {
            "idorden": id_orden,
            "enviado": enviado
        };
        $.ajax({
            data: parametros,
            url: '../orden_de_compra/seenvio.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }

    function ajax_quien(quien, id_orden) {


        var parametros = {
            "quien": quien,
            "idorden": id_orden
        };
        $.ajax({
            data: parametros,
            url: '../orden_de_compra/seenvioquin.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }
</script>





<!-- End col -->
<script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
<script src="../assets/js/custom/custom-table-datatable.js"></script>