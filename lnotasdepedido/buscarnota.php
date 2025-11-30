<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/entro_faltante.php');
include('../funciones/fun_ResHojaRut.php');
include('../funciones/funcHojaRuta.php');


$diaver = $_POST['diaver'];
$ingreso = $_POST['ingreso'];
if ($_POST['buscar'] != "") {
    $buscar = $_POST['buscar'];

    $col = $_POST['col'];
} else {
    $buscar = '';
    $col = $_POST['col'];
}
//include('../funciones/funcPicking.php');
function seleimpresion($rjdhfbpqj, $id_orden)
{

    $sqlimpresion = mysqli_query($rjdhfbpqj, "SELECT id_orden, estado FROM impresion where id_orden='$id_orden'");
    if ($rowimp = mysqli_fetch_array($sqlimpresion)) {
        $estado  = $rowimp['estado'];
    } else {
        $estado  = 0;
    }
    return $estado;
}

if ($_POST['col'] != '99') {
    if (is_numeric($_POST['col'])) {
        $qlovus = "e.col = '$col' and e.col != '8' and e.col != '10'";
    } else {

        $qlovus = "(e.id LIKE '%$buscar%' OR u.nom_empr LIKE '%$buscar%' OR u.nom_contac LIKE '%$buscar%' OR u.address LIKE '%$buscar%' OR u.localidad LIKE '%$buscar%') and e.col LIKE '%$col%' and e.col != '8' and e.col != '10'";
    }
} else {

    switch ($diaver) {
        case 1:
            $diaverd  = 'Lunes';
            break;
        case 2:
            $diaverd  = 'Martes';
            break;
        case 3:
            $diaverd  = 'Miércoles';
            break;
        case 4:
            $diaverd  = 'Jueves';
            break;
        case 5:
            $diaverd  = 'Viernes';
            break;

        case 6:
            $diaverd  = 'Sábado';
            break;
    }



    $qlovus = "e.diaentrega = '$diaverd' and e.col != '8' and e.col != '32' and e.fechahoja >='$fechahoy'";
}


function diadereparto($diaHoy, $dia_repart1, $dia_repart2, $dia_repart3, $dia_repart4, $dia_repart5, $dia_repart6, $dia_repart0)
{

    if ($dia_repart1 == '1' && $diaHoy <= 1) {
        $diaCliente = 1;
    } elseif ($dia_repart2 == '1' && $diaHoy <= 2) {
        $diaCliente = 2;
    } elseif ($dia_repart3 == '1' && $diaHoy <= 3) {
        $diaCliente = 3;
    } elseif ($dia_repart4 == '1' && $diaHoy <= 4) {
        $diaCliente = 4;
    } elseif ($dia_repart5 == '1' && $diaHoy <= 5) {
        $diaCliente = 5;
    } elseif ($dia_repart6 == '1' && $diaHoy <= 6) {
        $diaCliente = 6;
    } elseif ($dia_repart0 == '1' && $diaHoy <= 0) {
        $diaCliente = 0;
    } elseif ($dia_repart1 == '1') {
        $diaCliente = 1;
    } elseif ($dia_repart2 == '1') {
        $diaCliente = 2;
    } elseif ($dia_repart3 == '1') {
        $diaCliente = 3;
    } elseif ($dia_repart4 == '1') {
        $diaCliente = 4;
    } elseif ($dia_repart5 == '1') {
        $diaCliente = 5;
    } elseif ($dia_repart6 == '1') {
        $diaCliente = 6;
    } elseif ($dia_repart0 == '1') {
        $diaCliente = 0;
    }

    switch ($diaCliente) {
        case 1:
            $diaverd  = 'Lunes';
            break;
        case 2:
            $diaverd  = 'Martes';
            break;
        case 3:
            $diaverd  = 'Miércoles';
            break;
        case 4:
            $diaverd  = 'Jueves';
            break;
        case 5:
            $diaverd  = 'Viernes';
            break;

        case 6:
            $diaverd  = 'Sábado';
            break;
    }

    return $diaverd;
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


    .cocarda {
        width: 100%;
        font-family: Arial, sans-serif;
        background-color: rgb(255, 0, 0);
        color: white;
        font-weight: bold;
        border-radius: 50px;
        animation: titilar 0.5s infinite alternate;
    }

    @keyframes titilar {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0.2;
        }
    }
</style>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [1, "desc"]
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

                        <table id="default-datatable" class="table table-bordered table-striped" style="position: relative;top:-30px;">
                            <thead>
                                <tr>


                                    <th>Fecha </th>
                                    <th>Nº Orden</th>
                                    <th>Cliente</th>
                                    <? if ($tipo_usuario == "0" || $tipo_usuario == "33") { ?>
                                        <th class="text-center">Total</th>
                                    <? } ?>
                                    <th>Estado</th>

                                    <th>Confirmar</th>

                                    <th class="text-center">Zona</th>
                                    <th>Destino</th>
                                    <th>Día Entrega</th>
                                    <th class="text-center">Venta</th>
                                    <th class="text-center">Remito</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                function retrasoRetiro($rjdhfbpqj, $id_orden, $fechahoy)
                                {
                                    // Consulta: obtengo las órdenes con fecha 10 días menor a hoy y col<8
                                    $sql = mysqli_query($rjdhfbpqj, "SELECT fecha,col FROM orden WHERE  id=' $id_orden' and DATEDIFF('$fechahoy', fecha) > 10 AND col < 8");

                                    if ($rowusuarios = mysqli_fetch_array($sql)) {
                                        $retraso = 'background-color: red;';
                                    } else {
                                        $retraso = '';
                                    }
                                    return $retraso;
                                }

                                $comilla = "'";
                                function NomPickin($rjdhfbpqj, $id_usuarioclav)
                                {

                                    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT id,nom_contac FROM usuarios Where id='$id_usuarioclav'");
                                    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

                                        $nombreuspic = $rowusuarios["nom_contac"];
                                    } else {
                                        $nombreuspic = '<i style="color:black;">Cualquiera</i>';
                                    }
                                    return $nombreuspic;
                                }


                                $sqluorden = mysqli_query($rjdhfbpqj, "SELECT e.id,e.id_hoja, e.camioneta,e.responsable, e.fecha,e.fecha1, e.fechahoja, e.hora, e.diaentrega, e.id_usuarioclav, e.col, e.total, e.id_cliente, u.nom_empr, u.nom_contac, u.retira, u.zona, u.address, u.localidad, u.cobrable, u.id as nuncliente
                                    FROM orden e 
                                    INNER JOIN clientes u 
                                    ON e.id_cliente = u.id
                                    Where  $qlovus");
                                $canverificafin = mysqli_num_rows($sqluorden);


                                //$sqluorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  id LIKE '%$buscar%' and col LIKE '%$col%' and col != '8'  ORDER BY `orden`.`fecha1`  ASC LIMIT 0, 10000");
                                while ($rowuorden = mysqli_fetch_array($sqluorden)) {

                                    $id_orden = $rowuorden["id"];
                                    $onmbreco = ${"onmbreco" . $id_orde};
                                    $fechaOrden = ${"fechaOrden" . $id_orde};
                                    $fechadn = $rowuorden["fechahoja"];
                                    $id_hoja = $rowuorden["id_hoja"];
                                    $colestado = $rowuorden['col'];
                                    $cobrable = $rowuorden['cobrable'];
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

                                        if ($fechadn != '') {
                                            $sqlpreeprod = "Update orden Set diaentrega='$fechadn' Where id = '$id_orden' and col !='8'";
                                            mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));
                                        }
                                    } else {
                                        $fechadn = '';
                                    }
                                    if ($cobrable == '1') {
                                        $cobrarv = '<img src="/assets/images/alerta.gif" title="Preguntar antes de avanzar!" style="height: 30px;width: auto;" />';
                                    } else {
                                        $cobrarv = '';
                                    }

                                    $idcamioneta = $rowuorden["camioneta"];
                                    $id_usuarioclav = $rowuorden["id_usuarioclav"];
                                    $responsable = $rowuorden["responsable"];
                                    $id_cliente = $rowuorden["id_cliente"];
                                    $saldo = $rowuorden["total"];
                                    $saldovd = number_format($saldo, 0, '', '');
                                    if ($colestado > '0') {
                                        $saldov = "$" . number_format($saldo, 2, '.', ',');
                                    } else {
                                        $saldov = "";
                                    }
                                    $entrofal = entrofaltangral($rjdhfbpqj, $id_orden, $id_cliente);
                                    $id_ordencod = base64_encode($rowuorden["id"]);
                                    $id_clientecod = base64_encode($rowuorden["id_cliente"]);

                                    //construyo la sentencia SQL
                                    //  $mbeusuario = $rowudden['nom_contac'];
                                    $sqllogdins = mysqli_query($rjdhfbpqj, "SELECT nom_contac,id FROM usuarios WHERE  id= '$responsable'");
                                    if ($rowudden = mysqli_fetch_array($sqllogdins)) {
                                        $mbeusuario = $rowudden['nom_contac'];
                                    }


                                    if ($colestado == '3' && $id_usuarioclav == '0') {
                                        /*   echo '    <script>
                                       
                                            var resultado = confirm("No se asigno un usuario para la Preparación del pedido '.$id_orden.'");
                                            
                                            
                                            if (resultado) {
                                                window.location.href = "../nota_de_pedido/?jhduskdsa='.$id_clientecod.'&orjndty='.$id_ordencod.'";
                                            }
                                        
                                    </script>'; */
                                    }
                                    if ($colestado == '0') {
                                        if ($responsable == '99999') {
                                            $estadoorden = '<span class="badge" style="background-color:orange;color:white;">Ingresando CLIENTE<span class="dots"></span></span>';
                                        } else {
                                            $estadoorden = '<span class="badge" style="background-color:grey;color:white;">Ingresando ' . $mbeusuario . '<span class="dots"></span></span>';
                                        }
                                    }
                                    if ($colestado == '1') {
                                        $estadoorden = '<span class="badge" style="background-color:#AD3B06;color:white;">Eperando Confirmación<span class="dots"></span></span>';
                                    }
                                    if ($colestado == '2') {
                                        $estadoorden = '<span class="badge" style="background-color:#067FAD;color:white;">Confirmado</span> <br><p style="font-size: 10pt;">Prepara ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '3') {
                                        $estadoorden = '<span class="badge" style="background-color:green;color:white;">Preparando<span class="dots"></span></span><br><p style="font-size: 10pt;">' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '4') {
                                        $estadoorden = '<span class="badge" style="background-color: #678C35;color:white;">Pidiendo Productos
                                            ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . ' <span class="dots"></span></span>';
                                    }
                                    if ($colestado == '5') {
                                        $estadoorden = '<span class="badge" style="background-color:#9000BA;color:white;">Controlando<span class="dots"></span><br>a ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</span>';
                                    }
                                    if ($colestado == '6') {
                                        $estadoorden = '<span class="badge" style="background-color:#F0FF00;color:black;">Listo para Retiro</span> <br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '7') {
                                        $estadoorden = '<span class="badge" style="background-color:#FFD500;color:black;">Listo para Despacho</span> <br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '31') {
                                        $estadoorden = '<span class="badge" style="background-color:green;color:white;">Entregadas</span> <br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '32') {
                                        $estadoorden = '<span class="badge" style="background-color:red;color:white;">Cancelada</span> <br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '8') {
                                        $estadoorden = '<span class="badge" style="background-color:black;color:white;">CONCRETADO</span> <br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }
                                    if ($colestado == '9') {
                                        $estadoorden = '<span class="badge" style="background-color:black;color:white;">Ruta de Entrega </span><br><p style="font-size: 10pt;">Preparo ' . NomPickin($rjdhfbpqj, $id_usuarioclav) . '</p>';
                                    }

                                    //extrigo nombre de la camioneta
                                    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT id,nombre FROM camionetas Where id = ' $idcamioneta'");
                                    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                                        $nombrecamio = $rowcamionetas["nombre"];
                                    } else {
                                        $nombrecamio = '';
                                    }
                                    $sqlclientess = mysqli_query($rjdhfbpqj, "SELECT id,nom_empr,nom_contac,localidad,retira,zona,dia_repart1,dia_repart2,dia_repart3,dia_repart4,dia_repart5,dia_repart6,dia_repart0 FROM clientes Where id='$id_cliente'");
                                    if ($rowcclientes = mysqli_fetch_array($sqlclientess)) {

                                        $nomclientes = $rowcclientes['nom_empr'];
                                        $nomnegocio = $rowcclientes['nom_contac'];
                                        $localidad = $rowcclientes['localidad'];
                                        $retiradcv = $rowcclientes['retira'];
                                        $zonaid = $rowcclientes['zona'];

                                        $dia_repart1 = $rowcclientes['dia_repart1'];
                                        $dia_repart2 = $rowcclientes['dia_repart2'];
                                        $dia_repart3 = $rowcclientes['dia_repart3'];
                                        $dia_repart4 = $rowcclientes['dia_repart4'];
                                        $dia_repart5 = $rowcclientes['dia_repart5'];
                                        $dia_repart6 = $rowcclientes['dia_repart6'];
                                        $dia_repart0 = $rowcclientes['dia_repart0'];




                                        $sqlczona = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id='$zonaid'");
                                        if ($rowczona = mysqli_fetch_array($sqlczona)) {

                                            $nombrezona = $rowczona['nombre'];
                                        } else {
                                            $nomclientes = "";
                                            $nomnegocio = "";
                                            $localidad = "";
                                            $nombrezona = "";
                                        }
                                    } else {
                                        $nomclientes = "";
                                        $nomnegocio = "";
                                        $localidad = "";
                                    }

                                    if ($retiradcv == '1') {
                                        $verprreir = "Retira Clientes";
                                    } else {
                                        $verprreir = "Despacho " . $localidad;
                                    }

                                    if ($ingreso == '1' && $colestado <= '5') {
                                        if ($entrofal == '1') {
                                            $mostrar = '';
                                        } else {
                                            $mostrar = 'style="display:none;"';
                                        }
                                    }
                                    $retaso = retrasoRetiro($rjdhfbpqj, $id_orden, $fechahoy);
                                    echo '
                                          <tr ' . $mostrar . '>
                                          <td class="text-center"  style="color: black; ' . $retaso . '">
                                            <p style="display:none;"> ' . date('Y/m/d', strtotime($rowuorden["fecha"])) . '</p>
                                          ' . date('d/m/y', strtotime($rowuorden["fecha"])) . '<br>
                                          ' . $rowuorden["hora"] . 'hs.<br>';
                                    if ($responsable != '99999') {
                                        echo ' <p style="font-size: 8pt;font-weight: normal;">' . $mbeusuario . '</p>';
                                    }

                                    echo '</td>
                                          
                                          <td class="text-center" style="color: black;">';
                                    if ($responsable != '99999') {
                                        echo '  <b> 
                                             <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '">
                                             
                                             <p> ' . $id_orden . '</p>
                                             
                                             </a> 
                                             </b>';
                                    } else {
                                        echo '  <b> 
                                             
                                             <p> ' . $id_orden . '</p>
                                            

                                             
                                             </b>';
                                    }



                                    echo ' </td>   
                                             
                                              <td>
                                     <p data-toggle="collapse" data-target="#collapse' . $id_orden . '" aria-expanded="true" aria-controls="collapse">
                                                ' . $cobrarv . '' . $nomnegocio . ' - ' . $nomclientes . '</p>';
                                    if ($tipo_usuario == "0") {

                                        echo '
                                                 <div id="collapse' . $id_orden . '" class="collapse">
                                                  <a href="../cambiar_cliente/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '">
                                             <button class="btn btn-primary my-1" type="button">
                                                    Cambiar Cliente
                                            </button>
                                            </a>
                                  </div>
                                            
                                            
                                            ';
                                    }


                                    echo '</td>';
                                    if ($tipo_usuario == "0" || $tipo_usuario == "33") {
                                        echo '<td class="text-center">
                                           
                                            
                                                ' . $saldov . '    

                                                </td>';
                                    }





                                    echo '  <td  class="text-center">';


                                    if ($colestado <= '5') {


                                        if ($entrofal == '1') {

                                            echo '  <div class="cocarda text-center">Ingreso Stock</div>';
                                        }
                                    }






                                    echo '' . $estadoorden . '  </td>';



                                    echo '<td style="text-align:center;">';
                                    if ($responsable != '99999' && $colestado == '1' || $colestado == '') {
                                        echo ' <a ondblclick="ajax_confirmarr(' . $id_orden . ',2)" class="btn btn-success-rgba" title="Confirmar nota de Pedido Doble Click" tabindex="-1"><i class="dripicons-checkmark"></i></a>
                                                
                                                <div id="confrmar"></div> ';
                                    } elseif ($responsable == '99999' && ($tipo_usuario == "0" || $tipo_usuario == "33") && $colestado == '1') {

                                        $fechare = date("Y-m-d");
                                        $fechare = new DateTime();
                                        $diaHoy = $fechare->format('w');
                                        $diaCliente = diadereparto($diaHoy, $dia_repart1, $dia_repart2, $dia_repart3, $dia_repart4, $dia_repart5, $dia_repart6, $dia_repart0);

                                        $diaClienter = obtenerFechaMasCercana($diaCliente);
                                        echo '  <div id="confrmarb" style="position:relative;top:13px;"> 
                                        <a ondblclick="ajax_conCliente(' . $comilla . '' . $id_ordencod . '' . $comilla . ',' . $comilla . '' . $id_clientecod . '' . $comilla . ')" class="btn btn-primary-rgba" title="Confirmar nota de Pedido del Cliente Doble Click " tabindex="-1"><i class="dripicons-checkmark"></i> <b>' . $diaCliente . '</b></a>
                                        </div><br>
                                                
                                             ';
                                    }


                                    if ($colestado == '5') {
                                        if ($tipo_usuario == "30" || $tipo_usuario == "0") {
                                            if ($retiradcv == "1") {
                                                $collisto = "6";
                                            } else {
                                                $collisto = "7";
                                            }

                                            echo ' <a onclick="ajax_cocontolr(' . $comilla . '' . $id_orden . '' . $comilla . ',' . $comilla . '' . $collisto . '' . $comilla . ')" 
                                                    ontouchstart="ajax_cocontolr(' . $comilla . '' . $id_orden . '' . $comilla . ',' . $comilla . '' . $collisto . '' . $comilla . ')" 
                                                    
                                                    class="btn btn-danger-rgba" title="Confirmar Control" tabindex="-1"><i class="dripicons-checkmark"></i></a>
                                                     
                                                     <div id="confrmar"></div> ';
                                        }
                                    }
                                    if ($colestado > 2) {
                                        $esatdoprint = seleimpresion($rjdhfbpqj, $id_orden);
                                        $checked = ($esatdoprint == 1) ? 'checked' : '';
                                        echo '<br>
                                    <span class="badge badge-success">Impreso 
                                    <input type="checkbox" id="check_impresion' . $id_orden . '" ' . $checked . ' 
                                            onchange="actualizarEstadoImpresion(' . $id_orden . ', this.checked)"></span> ';
                                    }
                                    echo '</td>';


                                    echo '
                                              <td class="text-center">' . $nombrezona . '</td>
                                              <td>' . $verprreir . '</td>
                                              <td> ' . $fechadn . '<br>
                                              <b style="font-size: 10pt;">' . func_RespHojRut($rjdhfbpqj, $id_hoja) . '</b>
                                              </td>
                                              <td class="text-center">';
                                    if ($colestado != '0') {
                                        if ($colestado == '0' || $colestado == '1') {
                                            $pedfnom = "presupuesto_pdf";
                                            $titleno = "PDF Presupuesto";
                                        } else {
                                            $pedfnom = "nota_de_pedido_pdf";
                                            $titleno = "PDF Nota de Pedido";
                                        }

                                        echo ' <a href="../nota_de_pedido/' . $pedfnom . '.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="' . $titleno . '"><i class="dripicons-print"></i></a>';
                                    }
                                    echo '   </td>
                                           <td class="text-center">';
                                    if ($colestado != '0') {
                                        echo '  <a href="../nota_de_pedido/remito_pdf.php?jdhsknc=' . $id_ordencod . '" target="_blank" tabindex="-1" class="btn btn-dark-rgba" title="PDF Remito"><i class="dripicons-print"></i></a>';
                                    }
                                    echo '</td>
                                                   <td class="text-center">';
                                    if ($colestado != '0') {
                                        echo '  <a href="../nota_de_pedido/presupuesto_pdf?jdhsknc=' . $id_ordencod . '" target="_blank" tabindex="-1" class="btn btn-dark-rgba" title="PDF Cliente"><i class="dripicons-download"></i></a>';
                                    }
                                    echo '</td>
                                            <td class="text-center">
                                                <div class="button-list">';
                                    if ($colestado != '8' && $responsable != '99999') {
                                        echo '
                                              
                                                    <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-success-rgba" title="Editar"><i class="ri-pencil-line"></i></a>';
                                    } else {

                                        if ($colestado > 1) {
                                            echo '
                                              
                                                    <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" class="btn btn-success-rgba" title="Editar"><i class="ri-pencil-line"></i></a>';
                                        }
                                    }
                                    if ($colestado != '8' && $tipo_usuario == "0") {
                                        echo ' 
                                                   <a href="javascript:void(0);" ondblclick="eliminar(' . "'/lnotasdepedido/mlkdths?" . 'jnnfsc=' . $id_ordencod . '' . "'" . ')" class="btn btn-danger-rgba">
                                                   
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                    } else {
                                        if ($colestado > 1  && $tipo_usuario == "0") {
                                            echo '<a href="javascript:void(0);" ondblclick="eliminar(' . "'/lnotasdepedido/mlkdths?" . 'jnnfsc=' . $id_ordencod . '' . "'" . ')" class="btn btn-danger-rgba">
                                                   
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                        }
                                    }




                                    echo ' </div>
                                            </td>
                                        </tr>';
                                }
                                mysqli_close($rjdhfbpqj);
                                ?>

                            </tbody>
                        </table>
                        <p>
                            <? echo 'Cantidad Pedidos: <b>' . $canverificafin . '</b>'; ?></p>
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
            url: '../nota_de_pedido/confirmarnot.php',
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

<script>
    function ajax_conCliente(id_ordencod, id_clientecodi) {
        var parametros = {
            "id_orden": id_ordencod,
            "id_clientecodi": id_clientecodi,
            "responsable": '99999'
        };
        $.ajax({
            data: parametros,
            url: '../nota_de_pedido/confirnoclinet.php',
            type: 'POST',
            beforeSend: function() {
                $("#confrmarb").html('Un momento...');
            },
            success: function(response) {
                $("#confrmarb").html(response);
            }
        });
    }
</script>


<script>
    function ajax_cocontolr(iditem, confirmado) {

        // Pedir confirmación digitando el iditem
        let ingreso = prompt("Para confirmar el Control, ingrese el número Pedido");

        // Si cancela el prompt
        if (ingreso === null) {
            return;
        }

        // Validar que sea igual
        if (ingreso != iditem) {
            alert("El número ingresado es Incorrecto. No se confirmo el pedido!!.");
            return;
        }

        var parametros = {
            "iditem": iditem,
            "confirmado": confirmado
        };
        $.ajax({
            data: parametros,
            url: '../nota_de_pedido/confirmacont.php',
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

<script>
    function actualizarEstadoImpresion(id_orden, estado) {
        // Convertimos true/false en 1 o 0
        var valorEstado = estado ? 1 : 0;

        // si se tilda, preguntamos
        if (valorEstado === 1) {
            var ok = confirm('¿Ya lo imprimiste?');
            if (!ok) {
                // revertimos el cambio visual y salimos
                checkboxEl.checked = false;
                return;
            }
        }

        $.ajax({
            url: '/lnotasdepedido/update_estado_impresion.php',
            type: 'POST',
            data: {
                id_orden: id_orden,
                estado: valorEstado
            },
            beforeSend: function() {
                console.log('Actualizando...');
            },
            success: function(response) {
                console.log('Respuesta:', response);
            },
            error: function(xhr) {
                console.error('Error AJAX:', xhr.status, xhr.responseText);
                alert('No se pudo actualizar el estado');
            }
        });
    }
</script>


<script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
<script src="../assets/js/custom/custom-table-datatable.js"></script>