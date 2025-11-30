<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../orden_de_compra/funcion_saldoanterior.php');

$id_clientecod = $_GET['jhduskdsa'];
$id_clienteint = base64_decode($id_clientecod);

$errcan = $_GET['error'];
$modif = $_GET['modif'];
$tipoprove = $_GET['tipoprove'];

if ($_POST['modo'] == '') {
    $modo = $_GET['modo'];
} else {
    $modo = $_POST['modo'];
}



if (!empty($_POST['desde_date']) && !empty($_POST['hasta_date'])) {
    $desde_date = $_POST['desde_date'];
    $hasta_date = $_POST['hasta_date'];
    $tipoprove = $_POST['tipoprove'];
} else {
    $fechaObj = new DateTime($fechahoy);

    // Restar un mes
    $fechaObj->modify('-12 month');

    // Obtener la fecha modificada
    $desde_date = $fechaObj->format("Y-m-d");
    $hasta_date = $fechahoy;
}
$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $id_clientever = $rowclientes["empresa"];

    $direccion = $rowclientes['address'];
    $retiradcv = $rowclientes['retira'];
    $id_rubro = $rowclientes['rubro'];
}

if ($_SESSION['tipo'] == "29") {
    $editd = "";
} else {
    $editd = "?1=1";
}
if ($_SESSION['tipo'] == "30") {
    $editd = "";
}

$calculodeuda = calculodeudaM($rjdhfbpqj, $id_clienteint, $id_orden, $modo);


if ($tipoprove != '1') {
    if ($modo == '0') {
        $modotiti = 'Cuenta "A"';
        // $sqlre="and fac_a='1'";
    } else {
        $modotiti = 'Cuenta "R"';
        //  $sqlre="and fac_r='1'";
    }
} else {
    $modotiti = 'Cuenta Corriente';
}

function pagocliente($rjdhfbpqj, $id_clientepag)
{

    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clientepag'");
    if ($row = mysqli_fetch_array($sql)) {

        $pagcli = ' Transferencia de ' . $row['nom_contac'] . ' ';
    }

    return $pagcli;
}

function saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date, $modo)
{
    // $comillas = "'";
    $hasta_date = $hasta_date;
    $desde_date = $desde_date;

    if ($modo == "0") {
        $qlsaldoi = "saldoini !='0'";
    } else {
        $qlsaldoi = "saldoiniR !='0'";
    }


    //$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint' and saldoini !='0'  and fecha BETWEEN '$desde_date' and '$hasta_date'");
    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint' and $qlsaldoi");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {

        if ($modo == "0") {
            $saldoini = $rowpagdeufp["saldoini"];
        } else {
            $saldoini = $rowpagdeufp["saldoiniR"];
        }
        $fechahoy = date("Y-m-d");
        $fechaObj = new DateTime($fechahoy);

        // Restar un mes
        $fechaObj->modify('-12 month');

        // Obtener la fecha modificada
        $dfechadefec = $fechaObj->format("Y-m-d");

        //$fechasaldo = $rowpagdeufp["fecha"]; style="display:none;"

        //calculo y muestrop si tiene la fecha
        if ($dfechadefec == $desde_date) {
            $muestrova = '';
        } else {
            $muestrova = 'style="display:none;"';
        }


        echo '                      

<tr ' . $muestrova . '>

<td style="text-align: center;vertical-align: middle;">        

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

        echo '<option value="' . $rowclientes['id'] . '">' . $rowclientes['empresa'] . '</option>';
    }
}



function ordenes($rjdhfbpqj, $id_clienteint)
{


    $sqlclie = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_cliente='$id_clienteint'  ORDER BY fecha DESC limit 5");
    while ($rowc = mysqli_fetch_array($sqlclie)) {

        echo '<option value="' . $rowc['id'] . '">Nº' . $rowc['id'] . '</option>';
    }
    echo '<option value="0">A Cuenta</option>';
}

function ordenescompr($rjdhfbpqj, $id_orden)
{
    $sqlclie = mysqli_query($rjdhfbpqj, "SELECT id,id_proveedor FROM ordenprovee Where id='$id_orden'");
    if ($rowc = mysqli_fetch_array($sqlclie)) {
        $idorde = $rowc['id'];
        $idprodsdr = $rowc['id_proveedor'];
    }
    return array('idcompra' => $idprodsdr, 'idcomitem' => $idorde);
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

$calculodeuda = calculodeudaM($rjdhfbpqj, $id_clienteint, $id_orden, $modo);

$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint' and saldoini != 0");
if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
    $saldoini = $rowpagdeufp["saldoini"];
} else {
    $saldoini = 0;
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Debe y Haber Proveedores - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
</script>

<body>
    <!-- <h1 style="color:red;"> !! ESTOY CORRIGIENDO  (SE PUEDE CARGAR PAGOS)</h1> -->
    <style>
        body {
            zoom: 85%;
            scroll-behavior: smooth;
            /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
        }
    </style>


    <div>



        <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
            <p style=" font-size: 10pt; color: white;">Sistema de Debe y Haber Proveedores Versión 1.0.0</p>
        </div>

        <div class="container">
            <form action="../deuda_proveedores/debe_haber?fort=1&jhduskdsa=<?= $id_clientecod ?>" method="post">
                <div class="row">
                    <div class="col-2">

                        <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
                    </div>



                    <div class="col-4">
                        <div style="padding-bottom:15px; width: 350px;">
                            <b>Proveedor</b> Id: <?= $id_clienteint ?>
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

                                                                            $salgral = calculodeudaM($rjdhfbpqj, $id_clienteint, 99999999999, $modo);

                                                                            echo '' . number_format($salgral, 2, '.', ',') . '' ?>" disabled>
                        </div>

                        <b>Fecha Hasta</b>
                        <input type="date" id="hasta_date" name="hasta_date" class="form-control" value="<?= $hasta_date ?>" style="width: 350px;">
                        <input type="hidden" id="modo" name="modo" class="form-control" value="<?= $modo ?>" style="width: 350px;">
                        <input type="hidden" id="tipoprove" name="tipoprove" class="form-control" value="<?= $tipoprove ?>">

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
                        <h3><strong><?= $modotiti ?></strong></h3>
                        <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                            <thead>
                                <tr>
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
                                <? saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date, $modo); ?>
                                <?php


                                $comillas = "'";
                                if ($modo == '0') {
                                    if ($tipoprove != '1') {
                                        $modotiti = '"A"';
                                    } else {
                                        $modotiti = '';
                                    }
                                    $sqlre = "and fac_a='0'";
                                } else {
                                    if ($tipoprove != '1') {
                                        $modotiti = '"R"';
                                    } else {
                                        $modotiti = '';
                                    }
                                    $sqlre = "and fac_r='0'";
                                }

                                //and fin='1' and finalizada='1'   
                                $sqddeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
                                if ($rowpdeufp = mysqli_fetch_array($sqddeufp)) {

                                    if ($modo == '0') {
                                        $saldoinid = $rowpdeufp["saldoini"];
                                        $sumapd = $rowpdeufp["saldoini"];
                                    } else {
                                        $saldoinid = $rowpdeufp["saldoiniR"];
                                        $sumapd = $rowpdeufp["saldoiniR"];
                                    }
                                }



                                // Consulta unificada para "Debe" y "Haber" con prioridad  fecha BETWEEN '$desde_date' AND '$hasta_date'  and
                                $sql = mysqli_query($rjdhfbpqj, "
    SELECT id, fecha, 'Debe' AS tipo, 1 AS prioridad,'0' AS id_orden,'0' AS tipopag,'0' AS valor,'0' AS modopag,'0' AS tipocuneta,fac_r,fac_a,'0' AS id_clientepag,'0' AS nota,numero,numeror,'0' AS ncheque
    FROM ordenprovee 
    WHERE id_proveedor = '$id_clienteint' 
    
    AND fecha > '2025-01-01' $sqlre
    
    UNION ALL
    
    SELECT id, fecha, 'Haber' AS tipo, 2 AS prioridad,id_orden,tipopag,valor,modopag,tipocuneta,'0' AS fac_r,'0' AS fac_a,id_clientepag,nota,'0' AS numero,'0' AS numeror,ncheque
    FROM prodcom 
    WHERE id_proveedor = '$id_clienteint' 
  
    AND modopag='1' and tipocuneta='$modo' and fecha > '2025-01-01' 
    
    ORDER BY fecha ASC, prioridad ASC
");
                                // Inicializar el saldo
                                $saldo = 0;
                                // Iterar sobre los resultados y mostrarlos en la tabla

                                while ($row = mysqli_fetch_array($sql)) {
                                    $id_orden = $row["id"];
                                    $id_ordenhaber = $row["id_orden"];

                                    $fechaad = $row["fecha"];
                                    $total = $row["total"];

                                    $tipo = $row["tipo"];
                                    $tipopagver = $row["tipopagver"];
                                    $nota = $row["nota"];
                                    $nomb = $row["nomb"];
                                    $acuen = $row["acuen"];

                                    if ($modo == '0') {

                                        $numerofac = $row["numero"];

                                        if ($numerofac > 0) {
                                            $faponer = "Fac. Nº " . $numerofac;
                                        } else {
                                            $faponer = "";
                                        }
                                    } else {
                                        $numerofac = $row["numeror"];
                                        if ($numerofac > 0) {
                                            $faponer = "Rem. Nº " . $numerofac;
                                        } else {
                                            $faponer = "";
                                        }
                                    }
                                    $comprove = ordenescompr($rjdhfbpqj, $id_orden);
                                    $comprovev = $comprove['idcompra'];
                                    $idcomitemvc = $comprove['idcomitem'];

                                    $idcanord = $idcanord + 1;
                                    if ($idcanord == "1" && $tipo == 'Debe') {
                                        $decudaanter = calculodFech($rjdhfbpqj, $id_clienteint, $id_orden, $modo, $desde_date);
                                    } elseif ($idcanord == "1" && $tipo == 'Haber') {

                                        $decudaanter = calculodFech($rjdhfbpqj, $id_clienteint, $id_orden, $modo, $desde_date);
                                    } else {
                                        $decudaanter = 0;
                                    }


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

                                        $sqddldd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint'  and fecha > '2025-01-01' and id_orden='$id_orden' and modo='$modo'");
                                        while ($rowaufp = mysqli_fetch_array($sqddldd)) {

                                            $total += $rowaufp["cpratotal_prod"];
                                        }

                                        // Calcular el saldo dinámico

                                        //calculo y muestrop si tiene la fecha
                                        if ($fechaad >= $desde_date && $fechaad <= $hasta_date) {
                                            $muestrova = '';
                                        } else {
                                            $muestrova = 'style="display:none;"';
                                        }


                                        //$sumapd = $total + $sumapd + $decudaanter; 08-05-25 style="display:none;"
                                        $sumapd = $total + $sumapd;

                                        echo '                      

<tr  ' . $muestrova . '>

<td style="text-align: center;vertical-align: middle;">        
' . date('d/m/y', strtotime($fechaad)) . '  ' . $muestrova . '
</td>  
<td style="text-align: center; vertical-align: middle;">        
Fac.' . $modotiti . '
</td>
<td style="padding-left: 3mm; vertical-align: middle;">   
N' . str_pad($id_orden, 8, "0", STR_PAD_LEFT) . ' ' . $faponer . '
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
$' . number_format($total, 2, '.', ',') . '                 
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">

</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
<b> $' . number_format($sumapd, 2, '.', ',') . '              </b>
</td>
<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
<a href="../compra_proveedor?ookdjfv=' . $comprovev . '&idcomopra=' . $idcomitemvc . '" target="_blank" tabindex="-1" title="Compra">
<button type="button" class="btn btn-success btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a> 
                                  </td>
</tr>  ';
                                    } elseif ($tipo == "Haber") {

                                        $saldo -= $total;
                                        $nota = $row["nota"];
                                        $idpago = $row["id"];
                                        $deudavfp = $row["valor"];
                                        $idcand = $idcand + 1;
                                        $pagoTotald += $row["valor"];
                                        $id_clientepag = $row["id_clientepag"];



                                        $tipopages = $row['tipopag'];
                                        if ($tipopages == '1') {
                                            $tipopagver = "E";
                                        }
                                        if ($tipopages == '2') {
                                            $tipopagver = "T";
                                        }
                                        if ($tipopages == '3') {
                                            $tipopagver = "D";
                                        }
                                        if ($tipopages == '4') {
                                            $tipopagver = "C";
                                            $ncheque = "Cheque Nº" . $row["ncheque"];
                                        }
                                        if ($tipopages == '5') {
                                            $tipopagver = "M";
                                        }
                                        if ($tipopages == '6') {
                                            $tipopagver = "Ech";
                                        }
                                        if ($tipopages == '88') {
                                            $tipopagver = "";
                                        }
                                        $pagoid_orden = $row["id_orden"];
                                        if ($tipopages == '88') {
                                            $pagoid_orden = "Nota de Credito ";
                                            $fopagrm = "NC";
                                        } else {
                                            $pagoid_orden = str_pad($pagoid_orden, 8, "0", STR_PAD_LEFT);
                                            $fopagrm = "Pag";
                                        }
                                        if (!empty($nota)) {
                                            $notaver = " (" . $nota . ")";
                                        } else {
                                            $notaver = "";
                                        }


                                        if ($id_clientepag != '0') {
                                            $nompagcli = pagocliente($rjdhfbpqj, $id_clientepag);
                                            $notaver = $nompagcli . "(" . $nota . ")";
                                        }



                                        $sumapd = $sumapd - $deudavfp + $decudaanter;




                                        echo '                      

<tr  ' . $muestrova . '>

<td style="text-align: center;vertical-align: middle;">        
' . date('d/m/y', strtotime($fechaad)) . ' 
</td>
<td style="text-align: center; vertical-align: middle;">        
' . $fopagrm . '
</td>
<td style="padding-left: 3mm; vertical-align: middle;"> ';
                                        if ($deudavfp < 0) {
                                            echo 'Débito ' . $notaver . '';
                                        } else {

                                            echo '  ' . $tipopagver . '' .  $pagoid_orden . ' ' . $ncheque . '' . $notaver . '';
                                        }


                                        if ($fopagrm == "Pag") {
                                            echo ' &nbsp;&nbsp;&nbsp; <a href="../cajadiaria/ireciboProvee.php?jhduskdsa=' . $id_clientecod . '&pagdkdsa=' . $pagoid_orden . '&tipocuneta=' . $modo . '&fechapago=' . $fechaad . '" target="_blank"> <button type="button" class="btn btn-secondary btn-sm" style="width: 70px;float:right;" tabindex="-1">Recibo</button></a>';
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
<b> $' . number_format($sumapd, 2, '.', ',') . '              </b>
</td>
<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
<button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag(' . $comillas . '' . $row['id'] . '' . $comillas . ',' . $comillas . '' . $row['id_orden'] . '' . $comillas . ');" tabindex="-1">✕</button>



</td>
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
                                            <? if ($tipo_usuario != '33' && $tipo_usuario != '1') { ?>
                                                <h1 style="color:blue;">
                                                    << Efectivo>>
                                                </h1>
                                            <? } ?>
                                        </div>
                                        <label><b>Cargar Pago</b></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                                            </div>

                                            &nbsp;


                                            <input type="date" id="fechapag" name="fechapag" class="form-control" value="<?= $fechahoy ?>" min="<?= $cidordpag ?>" max="<?= $fechahoy ?>">&nbsp; &nbsp;
                                            <select class="form-control" name="tipopag" id="tipopag" onchange="showInput()">
                                                <? if ($tipo_usuario != '33' && $tipo_usuario != '1') { ?>
                                                    <option value="1">Efectivo</option>
                                                <? } ?>
                                                <option value="2">Transferencia</option>
                                                <option value="3">Deposito</option>
                                                <option value="4">Cheque</option>
                                                <option value="6">ECheq</option>
                                                <option value="88">Nota de Credito</option>
                                                <option value="5">Mercadería</option>
                                            </select>

                                            &nbsp;
                                            <input type="hidden" class="form-control" name="ncheque" id="ncheque" placeholder="Nº Cheque" style="display: none;" autocomplete="off">

                                            <?php
                                            echo '
                                                     <select class="form-control" name="selncheque" id="selncheque" placeholder="Nº Cheque" style="display: none; tabindex="-1"  onchange="showInput()">
                                                      <option value="0">Nº Cheques</option>';


                                            $sqljoin = mysqli_query($rjdhfbpqj, "SELECT tipopag,id,fecha,nota,vencheque,valor,ncheque FROM item_orden Where tipopag='4' and ncheque !='0' and fecha >='2025-02-18' ORDER BY ncheque DESC limit 1000");

                                            while ($roworden = mysqli_fetch_array($sqljoin)) {
                                                $vencheque = $roworden['vencheque'];
                                                $venchdeque = date('d/m/Y', strtotime($vencheque));
                                                $ncheque = $roworden['ncheque'];
                                                $nota = $roworden['nota'];
                                                $valorche = $roworden['valor'];
                                                $totddiqv = number_format($valorche, 0, ',', '.');
                                                $idpag = $roworden['id'];
                                                //$sqldn=${"sqldn".$sqldn};
                                                $sqldn = mysqli_query($rjdhfbpqj, "SELECT ncheque FROM prodcom Where tipopag='4' and ncheque ='$ncheque' and valor='$valorche'");
                                                if ($rdrden = mysqli_fetch_array($sqldn)) {
                                                } else {


                                                    echo '
                                                     <option value="' . $roworden['ncheque'] . '|' . $vencheque . '|' . $nota . '|' . $valorche . '">Nº' . $roworden['ncheque'] . '
                                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     ' . $roworden['nota'] . ' - 
                                                     $' . $totddiqv . ' - 
                                                     Venc. ' . $venchdeque . '
                                                     
                                                     </option>';
                                                }
                                            }
                                            echo ' </select>';
                                            ?>



                                            &nbsp;
                                            <input type="date" class="form-control" name="vencheque" id="vencheque" style="display: none;" autocomplete="off">

                                            &nbsp;
                                            <input type="text" class="form-control" name="valor" id="valor" placeholder="$0.00" autocomplete="off">
                                            &nbsp; &nbsp; &nbsp;
                                            <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota" autocomplete="off">

                                            <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clienteint ?>" autocomplete="off">
                                            <input type="hidden" id="id_rubro" name="id_rubro" value="<?= $id_rubro ?>">

                                            &nbsp;<button id="btnEnviar" onclick="ajax_agrgpago($('#valor').val(),$('#tipopag').val(),$('#fechapag').val(),$('#ncheque').val(),$('#vencheque').val(),$('#nota').val(),$('#id_rubro').val())" class="btn btn-secondary" style="width: 100px;">Enviar</button>
                                        </div>


                                    </div>
                            </tbody>
                        </table>
                    </div>





                    <br><br><br><br><br>
                    <br>

                    <br>
                    <div class="container mt-3 text-center">

                        <a href="debe_haber_pdf.php?jhduskdsa=<?= base64_encode($id_clienteint) ?>&desde_date=<?= $desde_date ?>&hasta_date=<?= $hasta_date ?>&modo=<?= $modo ?>&tipoprove=<?= $tipoprove ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" id="cerrar">Salir</button>

                        <script>
                            document.getElementById("cerrar").addEventListener("click", function() {
                                if (window.history.length === 1) {
                                    // Si la página no tiene historial, significa que fue abierta en una nueva pestaña
                                    window.close();
                                } else {
                                    // Si hay historial, redirigimos a otra página
                                    window.location.href = "../resumen_de_cuenta_prov";
                                }
                            });
                        </script>

                    </div>
                    <br>




                </div>


            </div>
            <br>













            <script>
                function ajax_eliminapag(iditempag, idorden) {
                    var parametros = {
                        "iditem": iditempag,
                        "idorden": idorden,
                        "id_cliente": '<?= $id_clienteint ?>'
                    };
                    $.ajax({
                        data: parametros,
                        url: '../deuda_proveedores/eliminarpag.php',
                        type: 'POST',
                        beforeSend: function() {
                            $("#muestroorden30").html('');
                        },
                        success: function(response) {
                            $("#muestroorden30").html(response);
                        }
                    });
                }
            </script>


            <script>
                function ajax_agrgpago(valor, tipopag, fechapag, ncheque, vencheque, nota, id_rubro) {
                    var btn = document.getElementById("btnEnviar");
                    btn.disabled = true; // Deshabilita el botón

                    var parametros = {
                        "pago_valor": valor,
                        "tipopag": tipopag,
                        "fechapag": fechapag,
                        "ncheque": ncheque,
                        "vencheque": vencheque,
                        "nota": nota,
                        "id_rubro": id_rubro,
                        "id_cliente": '<?= $id_clienteint ?>',
                        "tipocuneta": '<?= $modo ?>'
                    };
                    $.ajax({
                        data: parametros,
                        url: '../deuda_proveedores/insr_cobro_prov.php',
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







            <!-- xxx -->
            <?php
            if ($sumapag < 0.1) {
                $sumapag = 0;
            }


            ?>


            <script>
                function showInput() {

                    var selectValue = document.getElementById("tipopag").value;
                    var ncheque = document.getElementById("ncheque");
                    var vencheque = document.getElementById("vencheque");

                    if (selectValue === "4" || selectValue === "6") {
                        var selncheques = document.getElementById("selncheque").value;
                        var partes = selncheques.split("|");
                        var segundoa = partes[0];
                        var segundob = partes[1];
                        var segundoc = partes[2];
                        var segundod = partes[3];

                        selncheque.style.display = 'block';
                        ncheque.style.display = 'block';
                        vencheque.style.display = 'block';
                        nota.placeholder = "Banco";
                        document.getElementById("ncheque").value = segundoa;
                        document.getElementById("vencheque").value = segundob;
                        document.getElementById("nota").value = segundoc;
                        document.getElementById("valor").value = segundod;

                    } else {
                        selncheque.style.display = 'none';
                        ncheque.style.display = 'none';
                        vencheque.style.display = 'none';
                        nota.placeholder = "Nota";
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