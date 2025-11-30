<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/funcion_saldoanterior.php');
include('../funciones/StatusOrden.php');
include('../funciones/func_fueFacruado.php');
include('../funciones/funcNombreresponsable.php');

function calculodeudafecha($rjdhfbpqj, $id_clienteint, $fecha)
{
    $ptotalcredi = 0;
    $adicionalvalor = 0;
    $adicionalvalor = 0;
    $totald = 0;
    $pagoTotal = 0;

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint' and fecha < '$fecha' and col!='0'");
    while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $iddorden = $rowpagdeufp["id"];
        $adicionalvalor += $rowpagdeufp["adicionalvalor"];
        $totald += $rowpagdeufp["total"];
        $feorcha = $rowpagdeufp["fecha"];
    }

    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1'  and fecha < '$fecha' ");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
    }

    $sqlpecrpd = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id_cliente = '$id_clienteint'  and fin='1'  and fecha < '$fecha' ");

    while ($rowdpaufp = mysqli_fetch_array($sqlpecrpd)) {

        $ptotalcredi += $rowdpaufp["total"];
    }


    //$pagoTotal = $pagoTotal + $ptotalcredi;



    $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
    if ($rowpclientes = mysqli_fetch_array($sclientes)) {
        $saldoini = $rowpclientes['saldoini'];
    }

    $saldo = $totald - $pagoTotal + $saldoini + $adicionalvalor;


    return $saldo;
}



$id_clientecod = $_GET['jhduskdsa'];





$id_clienteint = base64_decode($id_clientecod);
if (!empty($id_clientecod)) {
    $errcan = $_GET['error'];
    $modif = $_GET['modif'];

    if (!empty($_POST['desde_date']) && !empty($_POST['hasta_date'])) {
        $desde_date = $_POST['desde_date'];
        $hasta_date = $_POST['hasta_date'];
    } else {
        $fechaObj = new DateTime($fechahoy);

        // Restar un mes
        $fechaObj->modify('-1 month');

        // Obtener la fecha modificada
        $desde_date = $fechaObj->format("Y-m-d");
        //$desde_date = "2024-12-30";
        $hasta_date = $fechahoy;
    }
    $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
    if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

        $id_clienteve = $rowclientes["nom_contac"];

        $direccion = $rowclientes['address'];
        $localidad = $rowclientes['localidad'];
        $retiradcv = $rowclientes['retira'];
        $zonaid = $rowclientes['zona'];


        $sqlleadd = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zonaid'");
        if ($rowleadd = mysqli_fetch_array($sqlleadd)) {
            $zonad = $rowleadd["nombre"];
        } else {
            $zonad = "";
        }
        $id_clientever = $zonad . " - " . $rowclientes["nom_empr"] . " " . $id_clienteve . "";
    }

    function saldoinicialsuma($rjdhfbpqj, $id_clienteint)
    {

        $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini != 0");
        if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
            $saldoini = $rowpagdeufp["saldoini"];
            $nosumomas = 99;
        }
        // Devuelve un array con ambos valores
        return array('saldoini' => $saldoini, 'nosumomas' => $nosumomas);
    }

    function saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date)
    {
        $comillas = "'";



        $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini !='0'  and fecha BETWEEN '$desde_date' and '$hasta_date'");
        if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
            $saldoini = $rowpagdeufp["saldoini"];
            $fechasaldo = $rowpagdeufp["fecha"];



            echo '                      

<tr>

<td style="text-align: center;vertical-align: middle;">        

</td>  

<td style="text-align: center;vertical-align: middle;">        
' . date('d/m/y', strtotime($fechasaldo)) . '
</td>  
<td style="text-align: center; vertical-align: middle;">        

</td>
<td style="padding-left: 3mm; vertical-align: middle;">   
Saldo Anterior  
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
$' . number_format($saldoini, 2, '.', ',') . '                 
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">

</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">

</td>
<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
</td>

</tr>  ';
        }
    }

    function proveedores($rjdhfbpqj)
    {


        $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where estado='0' ORDER BY `proveedores`.`empresa` ASC");
        while ($rowclientes = mysqli_fetch_array($sqlclientes)) {
            //$id_proveedor=$rowclientes['id'];
            //$desudaprov=${"desudaprov".$id_proveedor};
            // $desudaprov=calculoddeprovM($rjdhfbpqj,$id_proveedor,999999999999,0); $'. $desudaprov.'
            echo '<option value="' . $rowclientes['id'] . '">' . $rowclientes['empresa'] . ' </option>';
        }
    }

    function pagoprovee($rjdhfbpqj, $idprov)
    {

        $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idprov'");
        if ($row = mysqli_fetch_array($sql)) {

            $pagprov = ' Transferencia a ' . $row['empresa'] . '';
        }

        return $pagprov;
    }

    function ordenes($rjdhfbpqj, $id_clienteint)
    {


        $sqlclie = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente='$id_clienteint' and col >= '5'  ORDER BY fecha DESC limit 5");
        while ($rowc = mysqli_fetch_array($sqlclie)) {

            echo '<option value="' . $rowc['id'] . '">Nº' . $rowc['id'] . '</option>';
        }
        echo '<option value="0">A Cuenta</option>';
    }
    //saldo proveedor
    function calculoddeprovM($rjdhfbpqj, $id_clienteint, $id_orden, $modo)
    {

        /* calculo cobros saldoini */


        if ($modo == '1') {

            $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
            if ($rowpclientes = mysqli_fetch_array($sclientes)) {
                $saldoini = $rowpclientes['saldoiniR'];
            }
        } else {

            $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
            if ($rowpclientes = mysqli_fetch_array($sclientes)) {
                $saldoini = $rowpclientes['saldoini'];
            }
        }

        $pagoTotal = 0;
        $totald = 0;
        $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint'  and fecha > '2025-01-01'");
        $canv = mysqli_num_rows($sqlpeufpd);
        while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

            $pagoTotal += $rowpaufp["valor"];
            $totald += $rowpaufp["cpratotal_prod"];
        }

        ///
        $saldod = $totald - $pagoTotal + $saldoini;
        $saldo = number_format($saldod, 0, ',', '.');
        return $saldo;
    }
?>
    <?php

    if ($_SESSION['tipo'] == "29") {
        $editd = "";
    } else {
        $editd = "?1=1";
    }
    if ($_SESSION['tipo'] == "30") {
        $editd = "";
    }

    $calculodeuda = calculodeuda($rjdhfbpqj, $id_clienteint, $id_orden);

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini != 0");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $saldoini = $rowpagdeufp["saldoini"];
    } else {
        $saldoini = 0;
    }
    ?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Debe y Haber Clientes - Natural Frut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>
    </script>

    <body>
        <style>
            body {
                zoom: 85%;
                scroll-behavior: smooth;
                /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
            }
        </style>


        <div>



            <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
                <p style=" font-size: 10pt; color: white;">Sistema de Debe y Haber Clientes Versión 1.0.0</p>
            </div>
            <!-- </div class="text-center">
<h1 style="color:red;"> AL CLIENTE ESTE RESUMEN ESTOY CONTROLANDO </h1>
</div> -->
            <div class="container">
                <form action="../deuda_clientes/debe_haber?fort=1&jhduskdsa=<?= $id_clientecod ?>" method="post">
                    <div class="row">
                        <div class="col-2">
                            <a href="../../">
                                <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1"></a>
                        </div>



                        <div class="col-4">
                            <div style="padding-bottom:15px; width: 350px;">
                                <b>Cliente Id: <?= $id_clienteint ?></b>
                                <input type="text" class="form-control" value="<?= $id_clientever ?>" disabled>
                            </div>

                            <div style="padding-bottom:15px; width: 350px;">
                                <b>Fecha desde</b>
                                <input type="date" id="desde_date" name="desde_date" class="form-control" value="<?= $desde_date ?>" style="width: 350px;">
                            </div>

                        </div>
                        <div class="col-2" style="width: auto;  position: relative; float: left;">

                        </div>

                        <div class="col-4">

                            <div style="padding-bottom:15px; width: 350px;">
                                <b>Saldo Actual</b>
                                <input type="text" class="form-control" value="$<?

                                                                                $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, 99999999999);

                                                                                echo '' . number_format($salgral, 0, '.', ',') . '' ?>" disabled>
                            </div>

                            <b>Fecha Hasta</b>
                            <input type="date" id="hasta_date" name="hasta_date" class="form-control" value="<?= $hasta_date ?>" style="width: 350px;">

                        </div>


                        <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="debe_haber?jhduskdsa=Mw==" tabindex="-1">
                                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Ver</button></a>
                        </div>



                    </div>
                </form>


                <div class="row">

                    <?php $comillas = "'";
                    if ($modif == '1') {
                        echo ' <script>
                            setTimeout(function() {
                                var div = document.getElementById(' . $comillas . 'guardao7364' . $comillas . ');
                                div.style.display = ' . $comillas . 'none' . $comillas . ';
                            }, 3000); // 5000 milisegundos = 5 segundos
                        </script>

                    <br><div id="guardao7364" class="alert alert-success" style="width:400px">
                    <strong>Información actualizada.</strong>
                    </div>  ';
                    }


                    ?>

                    <div class="container">








                        <div>
                            <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                                <thead>
                                    <tr>
                                        <th style="width: 100px; text-align: center;">Estado</th>
                                        <th style="width: 100px; text-align: center;">Fecha</th>
                                        <th style="width: 60px; text-align: center;">Tipo</th>
                                        <th style="text-align: left; padding-left: 10px;">Número</th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center;">Debe</th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center;">Haber</th>
                                        <th style="width: 150px; padding-left: 10px;text-align: center;">Saldo</th>
                                        <th style="width: 90px; padding-left: 10px;text-align: center;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date); ?>
                                    <?php


                                    // Consulta unificada para "Debe" y "Haber" con prioridad
                                    $sql = mysqli_query($rjdhfbpqj, "
    SELECT id, fecha, total + adicionalvalor AS total, 'Debe' AS tipo, 1 AS prioridad, '' AS tipopagver, '' AS nota, '' AS nomb, '' AS acuen, '' AS refor, '0' AS id_provepag, '0' AS id_orden, '0' AS id_notacredito, '0' AS ncheque,id_usuarioclav
    FROM orden 
    WHERE id_cliente = '$id_clienteint' 
    AND col != '0' 
    AND fecha BETWEEN '$desde_date' AND '$hasta_date' 
    
    UNION ALL
    
    SELECT id, fecha, valor AS total, 'Haber' AS tipo, 2 AS prioridad, tipopag AS tipopagver, nota, nombre AS nomb, '' AS acuen, '' AS refor, id_provepag,id_orden,id_notacredito,ncheque,id_usuarioclav
    FROM item_orden 
    WHERE id_cliente = '$id_clienteint' 
    AND modo = '1' 
    AND fecha BETWEEN '$desde_date' AND '$hasta_date' 
    
    ORDER BY fecha ASC, prioridad ASC
");
                                    // Inicializar el saldo
                                    $saldo = 0;
                                    // Iterar sobre los resultados y mostrarlos en la tabla

                                    while ($row = mysqli_fetch_array($sql)) {
                                        $id_orden = $row["id"];
                                        $idpago = $row["id_orden"];
                                        $fechaad = $row["fecha"];
                                        $total = $row["total"];

                                        $tipo = $row["tipo"];
                                        $tipopagver = $row["tipopagver"];
                                        $tipopagverb = $row["tipopagver"];
                                        $nota = $row["nota"];
                                        $nomb = $row["nomb"];
                                        $acuen = $row["acuen"];
                                        $refor = $row["refor"];
                                        $id_ordencodor = ${"id_ordencodor" . $id_orden};
                                        $canverificafin = $canverificafin + 1;
                                        /*     if($canverificafin==1){
        $saldoinicials=saldoinicialsuma($rjdhfbpqj,$id_clienteint);
        $saldoinials=$saldoinicials['saldoini'];
        }else{
            $saldoinials=0;
    
        } */

                                        $idcanord = $idcanord + 1;
                                        if ($idcanord == "1" && $tipo == 'Debe') {
                                            $decudaanter = calculodeudafecha($rjdhfbpqj, $id_clienteint, $desde_date);
                                        } elseif ($idcanord == "1" && $tipo == 'Haber') {

                                            $decudaanter = calculodeudafecha($rjdhfbpqj, $id_clienteint, $desde_date);
                                        } else {
                                            $decudaanter = 0;
                                        }

                                        // Calcular el saldo dinámico
                                        if ($tipo == 'Debe') {
                                            $saldo += $total; // Sumar al saldo en caso de "Debe"
                                            $debe = $total;
                                            $haber = 0;
                                        } else {
                                            $saldo -= $total; // Restar del saldo en caso de "Haber"
                                            $debe = 0;
                                            $haber = $total;
                                        }



                                        if ($tipo == "Debe") {
                                            $status = StatusOrden($rjdhfbpqj, $id_orden);
                                            $arrayfue = fueFacturado($rjdhfbpqj, $id_orden);

                                            $quienfac  = $arrayfue["quienfac"];
                                            $emitida  = $arrayfue["emitida"];
                                            if ($quienfac != 0) {
                                                $quinsfac = NomResponsa($rjdhfbpqj, $quienfac);
                                                $nfactura  = '<p style="color:grey;">(Fac Nº' . $arrayfue['nfactura'] . ' - ' . $quinsfac . ' - ' . $emitida . ') </p>';
                                            } else {
                                                $nfactura = "";
                                            }
                                            $id_ordencodor = base64_encode($id_orden);


                                            $saldo = $saldo + $decudaanter;

                                            echo '                      
                         <tr>

                                       <td style="text-align: center;vertical-align: middle;">        
                ' . $status . '
            </td>  
            
            <td style="text-align: center;vertical-align: middle;">        
                ' . date('d/m/y', strtotime($fechaad)) . '
            </td>  
            <td style="text-align: center; vertical-align: middle;">        
                Fac
            </td>
            <td style="padding-left: 3mm; vertical-align: middle;">   
               N' . str_pad($id_orden, 8, "0", STR_PAD_LEFT) . ' ' . $nfactura . '
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
            $' . number_format($total, 2, '.', ',') . '                 
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                            
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                <b>$' . number_format($saldo, 2, '.', ',') . '              </b>
            </td>
            <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

            <a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $id_ordencodor . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
              <button type="button" class="btn btn-success btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
            </td>
        </tr>  ';
                                        } elseif ($tipo == "Haber") {

                                            $id_ordencod = base64_encode($idpago);

                                            $haber += $row["total"];

                                            $idprov = $row["id_provepag"];
                                            $deudavfp = $total;
                                            $dnombrepag = $row["nomb"];


                                            if ($nomb != "") {
                                                $dnombrepag = $nomb;
                                            } else {

                                                $dnombrepag = $idpago;
                                            }

                                            if ($tipopagverb == '1') {
                                                $tipopagver = "E";
                                                $ncheque = "";
                                            }
                                            if ($tipopagverb == '2') {
                                                $tipopagver = "T";
                                                $ncheque = "";
                                            }
                                            if ($tipopagverb == '3') {
                                                $tipopagver = "D";
                                                $ncheque = "";
                                            }
                                            if ($tipopagverb == '4') {
                                                $tipopagver = "C";
                                                $ncheque = "Cheque Nº" . $row["ncheque"];
                                            }
                                            if ($tipopagverb == '5') {
                                                $tipopagver = "M";
                                                $ncheque = "";
                                            }
                                            if ($tipopagverb == '6') {
                                                $tipopagver = "Ech";
                                                $ncheque = "";
                                            }
                                            $refor = "";
                                            if ($tipopagverb == '33') {
                                                $tipopagver = "C";
                                                $ncheque = "";
                                                $iditefpnota = $row['id_notacredito'];


                                                $sddenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id='$iditefpnota'");
                                                if ($rowodx = mysqli_fetch_array($sddenx)) {
                                                    $ordedecompra = $rowodx['ordedecompra'];
                                                }

                                                if ($ordedecompra > 0) {
                                                    $refor = "Ref. Nº" . $rowodx['ordedecompra'];
                                                } else {
                                                    $refor = "";
                                                }


                                                //  $iditefp=$rowpaufp['id_notacredito'].$refor ;




                                                $id_ordencod = base64_encode($iditefpnota);
                                            }


                                            if ($tipopagverb == '33') {
                                                $nomb = "Cred";
                                            } else {
                                                $nomb = "Pag";
                                            }

                                            if ($idprov != '0') {
                                                $pagprov = pagoprovee($rjdhfbpqj, $idprov);
                                            } else {
                                                $pagprov = "";
                                            }
                                            if (!empty($nota)) {
                                                $notaver = " (" . $nota . ")";
                                            } else {
                                                $notaver = "";
                                            }

                                            $saldo = $saldo + $decudaanter;

                                            echo '                      
                                
                                 <tr>
                               <td style="text-align: center;vertical-align: middle;">        
           
            </td>  
                    <td style="text-align: center;vertical-align: middle;">        
                        ' . date('d/m/y', strtotime($fechaad)) . '
                    </td>
                         <td style="text-align: center; vertical-align: middle;">        
                        ' . $nomb . ' ';

                                            echo ' </td>
                    <td style="padding-left: 3mm; vertical-align: middle;"> ';
                                            if ($deudavfp < 0) {
                                                echo 'Débito ' . $notaver . '';
                                            } else {

                                                echo '  ' . $tipopagver . '' . str_pad($dnombrepag, 8, "0", STR_PAD_LEFT) . ' ' . $acuen . ' ' . $ncheque . ' ' . $notaver . ' ' . $refor . '';
                                            }
                                            echo '' . $pagprov . '';

                                            if ($nomb == "Pag") {
                                                echo ' &nbsp;&nbsp;&nbsp; <a href="../cajadiaria/irecibo?jhduskdsa=' . $id_clientecod . '&pagdkdsa=' . $idpago . '&fechapago=' . $fechaad . '" target="_blank"> <button type="button" class="btn btn-dark btn-sm" style="width: 70px;float:right;" tabindex="-1">Recibo</button></a>';
                                            }

                                            echo ' </td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> ';
                                            if ($deudavfp < 0) {
                                                $deuddfp = substr($deudavfp, 1);
                                                echo '  $' . number_format($deuddfp, 2, '.', ',') . ' ';
                                            }
                                            echo '</td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">';
                                            if ($deudavfp > 0) {

                                                echo '  $' . number_format($deudavfp, 2, '.', ',') . ' ';
                                            }
                                            echo ' </td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                        <b> $' . number_format($saldo, 2, '.', ',') . '              </b>
                    </td>';
                                            if ($tipopagverb != '33') {
                                                echo '  <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag(' . $comillas . '' . $row['id'] . '' . $comillas . ',' . $comillas . '' . $row['id_orden'] . '' . $comillas . ',' . $comillas . '' . $row['id_provepag'] . '' . $comillas . ');" tabindex="-1">✕</button>';
                                            } else {


                                                echo '<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

            <a href="../nota_de_credito/nota_de_credito_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
              <button type="button" class="btn btn-primary btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
            </td>';
                                            }
                                            echo ' </td>


                </tr> ';
                                        }
                                    }


                                    ?>


                                </tbody>
                            </table>


                        </div>
                        <br><br>
                        <div class="container">

                            <table class="table table-bordered">
                                <tbody>

                                    <div class="form-group row col-md-12">
                                        <div class="card-body">
                                            <div id="muestroorden30"> </div>

                                            <div id="muestroorden29"> </div>
                                            <div class="container text-center" id="tipodepagov">
                                                <? if ($tipo_usuario == '37') { ?>
                                                    <h1 style="color:blue;">
                                                        << Efectivo>>
                                                    </h1>

                                                <? } else {

                                                    echo '  <h1 style="color:red;">
                                                    << Transferencia>>
                                                </h1>';
                                                } ?>
                                            </div>
                                            <label><b>Cargar Pago</b></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                                                </div>

                                                &nbsp;
                                                &nbsp;
                                                <select class="form-control" name="idordenpag" id="idordenpag">
                                                    <?php

                                                    ordenes($rjdhfbpqj, $id_clienteint);

                                                    ?>
                                                </select>

                                                <input type="date" id="fechapag" name="fechapag" class="form-control" value="<?= $fechahoy ?>" min="<?= $cidordpag ?>" max="<?= $fechahoy ?>">&nbsp; &nbsp;
                                                <select class="form-control" name="tipopag" id="tipopag" onchange="showInput()">

                                                    <? if ($tipo_usuario == '37') { ?>
                                                        <option value="1">Efectivo</option>
                                                    <? } ?>
                                                    <option value="2">Transferencia</option>
                                                    <option value="3">Deposito</option>
                                                    <option value="4">Cheque</option>
                                                    <option value="5">Mercadería</option>
                                                    <? if ($tipo_usuario != '33' && $tipo_usuario != '37') { ?>
                                                        <option value="1">Efectivo</option>
                                                    <? } ?>
                                                    <option value="6">ECheq</option>
                                                </select>

                                                &nbsp;
                                                <select class="form-control" name="id_proveedor" id="id_proveedor" style="display: none;width: 200px;">
                                                    <option value="0">Mi Banco</option>
                                                    <?php

                                                    proveedores($rjdhfbpqj);

                                                    ?>
                                                </select>

                                                &nbsp;
                                                <select class="form-control" name="tipocuneta" id="tipocuneta" style="display: none;">
                                                    <option value="0">Cuenta A</option>
                                                    <option value="1">Cuenta R</option>

                                                </select>

                                                &nbsp;
                                                <input type="text" class="form-control" name="ncheque" id="ncheque" placeholder="Nº Cheque" style="display: none;" autocomplete="off">
                                                &nbsp;
                                                <input type="date" class="form-control" name="vencheque" id="vencheque" style="display: none;" autocomplete="off">

                                                &nbsp;
                                                <input type="text" class="form-control" name="valor" id="valor" placeholder="$0.00" autocomplete="off">
                                                &nbsp; &nbsp; &nbsp;
                                                <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota" autocomplete="off">

                                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clienteint ?>" autocomplete="off">

                                                &nbsp;<button id="btnEnviar" onclick="ajax_agrgpago($('#valor').val(),$('#tipopag').val(),$('#fechapag').val(),$('#ncheque').val(),$('#vencheque').val(),$('#nota').val(),$('#id_proveedor').val(),$('#tipocuneta').val(),$('#idordenpag').val())" class="btn btn-secondary" style="width: 100px;">Enviar</button>
                                            </div>


                                        </div>
                                </tbody>
                            </table>
                        </div>
                        <?php /* }else{
                             
    } */

                        ?>
                    </div>









                    <br><br><br><br><br>
                    <br>

                    <br>
                    <div class="container mt-3 text-center">

                        <a href="debe_haber_pdf.php?jhduskdsa=<?= base64_encode($id_clienteint) ?>&desde_date=<?= $desde_date ?>&hasta_date=<?= $hasta_date ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" id="cerrar">Salir</button>

                        <script>
                            document.getElementById("cerrar").addEventListener("click", function() {
                                if (window.history.length === 1) {
                                    // Si la página no tiene historial, significa que fue abierta en una nueva pestaña
                                    window.close();
                                } else {
                                    // Si hay historial, redirigimos a otra página
                                    window.location.href = "../ingreso_cobros";
                                }
                            });
                        </script>



                    </div>
                    <br>




                </div>


            </div>
            <br>













            <script>
                /*        function ajax_eliminapag(iditempag,idorden,id_provepag) {
            var parametros = {
                "iditem": iditempag,
                "idorden": idorden,
                "id_provepag": id_provepag,
                "id_cliente": '<?= $id_clienteint ?>'
            };
            $.ajax({
                data: parametros,
                url: '../nota_de_pedido/eliminarpag.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden30").html('');
                },
                success: function(response) {
                    $("#muestroorden30").html(response);
                }
            });
        }

 */
            </script>

            <script>
                function ajax_eliminapag(iditempag, idorden, id_provepag) {
                    // Mostrar un cuadro de entrada para que el usuario ingrese un número
                    var idordend = iditempag;
                    var numeroIngresado = prompt("Por favor, ingrese el número: " + idordend);

                    // Verificar si el usuario ingresó un número válido
                    if (numeroIngresado !== null && numeroIngresado.trim() == idordend) {
                        // Confirmar si desea continuar
                        var confirmacion = confirm("¿Está seguro de que desea eliminar el pago?");

                        if (confirmacion) {
                            // Preparar parámetros con el número ingresado
                            var parametros = {
                                "iditem": iditempag,
                                "idorden": idorden,
                                "id_provepag": id_provepag,
                                "id_cliente": '<?= $id_clienteint ?>'
                            };

                            // Realizar la solicitud AJAX
                            $.ajax({
                                data: parametros,
                                url: '../nota_de_pedido/eliminarpag.php',
                                type: 'POST',
                                beforeSend: function() {
                                    $("#muestroorden30").html('');
                                },
                                success: function(response) {
                                    $("#muestroorden30").html(response);
                                }
                            });
                        }
                    } else {
                        alert("Debe ingresar un número válido para continuar.");
                    }
                }
            </script>



            <script>
                function ajax_agrgpago(valor, tipopag, fechapag, ncheque, vencheque, nota, id_proveedor, tipocuneta, idordenpag) {
                    var btn = document.getElementById("btnEnviar");
                    btn.disabled = true; // Deshabilita el botón
                    // Validar si el tipo de pago es 4 y el número de cheque no se ingresó
                    if (tipopag === '4' && (!ncheque || ncheque.trim() === '')) {
                        alert('Debe ingresar un número de cheque para este tipo de pago.');
                        return; // Detener la ejecución para evitar la inserción
                    }
                    var parametros = {
                        "pago_valor": valor,
                        "tipopag": tipopag,
                        "fechapag": fechapag,
                        "ncheque": ncheque,
                        "vencheque": vencheque,
                        "nota": nota,
                        "id_proveedor": id_proveedor,
                        "tipocuneta": tipocuneta,
                        "idordenpag": idordenpag,
                        "id_cliente": '<?= $id_clienteint ?>'
                    };
                    $.ajax({
                        data: parametros,
                        url: '../cuenta_clientes/inser_pag3.php',
                        type: 'POST',
                        beforeSend: function() {
                            $("#muestroorden29").html('');
                        },
                        success: function(response) {
                            $("#muestroorden29").html(response);
                        }
                    });

                    setTimeout(() => {
                        btn.disabled = false; // Reactiva el botón después de unos segundos (opcional)
                    }, 4000);
                }
            </script>







            <?php
            if ($sumapag < 0.1) {
                $sumapag = 0;
            }


            ?>


            <script>
                <?php if ($tipo_usuario != '37') { ?>
                    ncheque.style.display = 'block';
                    vencheque.style.display = 'block';
                    id_proveedor.style.display = 'block';
                    nota.placeholder = "Banco";
                <?php } ?>

                function showInput() {
                    var selectValue = document.getElementById("tipopag").value;
                    var ncheque = document.getElementById("ncheque");
                    var vencheque = document.getElementById("vencheque");
                    var id_proveedor = document.getElementById("id_proveedor");

                    if (selectValue === "4" || selectValue === "6") {
                        ncheque.style.display = 'block';
                        vencheque.style.display = 'block';
                        id_proveedor.style.display = 'block';
                        nota.placeholder = "Banco";
                    } else {
                        ncheque.style.display = 'none';
                        vencheque.style.display = 'none';
                        id_proveedor.style.display = 'none';
                        nota.placeholder = "Nota";
                    }


                    if (selectValue === "2") {
                        id_proveedor.style.display = 'block';
                        tipocuneta.style.display = 'block';
                    } else {
                        id_proveedor.style.display = 'none';
                        tipocuneta.style.display = 'none';

                    }
                    if (selectValue == '1') {
                        document.getElementById("tipodepagov").innerHTML = '<h1 style="color:blue;"><< Efectivo >></h1>';
                    }
                    if (selectValue == '2') {
                        document.getElementById("tipodepagov").innerHTML = '<h1 style="color:red;"><< Transferencia >></h1>';
                    }
                    if (selectValue == '3') {
                        document.getElementById("tipodepagov").innerHTML = '<h1 style="color:black;"><< Deposito >></h1>';
                    }
                    if (selectValue == '4') {
                        document.getElementById("tipodepagov").innerHTML = '<h1 style="color:black;"><< Cheque >></h1>';
                    }
                    if (selectValue == '6') {
                        document.getElementById("tipodepagov").innerHTML = '<h1 style="color:black;"><<  ECheq >></h1>';
                    }

                }
            </script>

            <style>
                /* Estilos del botón flotante */
                .btnGoToTop {
                    position: fixed;
                    bottom: 20px;
                    /* Distancia desde la parte inferior */
                    right: 20px;
                    /* Distancia desde la derecha */
                    z-index: 99;
                }
            </style>







    </body>

    </html>
<? } else {


    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='..//index.php?error=1232'");
    echo ("</script>");
} ?>