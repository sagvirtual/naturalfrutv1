<? include('../f54du60ig65.php');
include('../orden_de_compra/funcion_saldoanterior.php');
require('../salidas/mpdf.php');


$id_clientecod = $_GET['jhduskdsa'];
$id_clienteint = base64_decode($id_clientecod);

$errcan = $_GET['error'];
$modif = $_GET['modif'];
$tipoprove = $_GET['tipoprove'];

if ($_GET['modo'] == '') {
    $modo = $_GET['modo'];
} else {
    $modo = $_GET['modo'];
}



if (!empty($_GET['desde_date']) && !empty($_GET['hasta_date'])) {
    $desde_date = $_GET['desde_date'];
    $hasta_date = $_GET['hasta_date'];
    $tipoprove = $_GET['tipoprove'];
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

function saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date)
{
    $comillas = "'";



    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint' and saldoini !='0'  and fecha BETWEEN '$desde_date' and '$hasta_date'");
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


if ($_SESSION['tipo'] == "29") {
    $editd = "";
} else {
    $editd = "?1=1";
}
if ($_SESSION['tipo'] == "30") {
    $editd = "";
}

$calculodeuda = calculodeudaM($rjdhfbpqj, $id_clienteint, $id_orden, $modo);




//comienzo pdf
ob_start();

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <title>Resumen de Cuenta - Natural Frut</title>
    <meta charset="utf-8">

</head>
</script>

<body>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>





    <p>Fecha de Emisión: <?= date('d/m/Y', strtotime($fechahoy)) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        Hora: <?= $horasin ?></p>

    <div style="width: 100%; text-align: center;"> <!-- <img src="/assets/images/logopc.png" style="width:38mm;"> -->
        <h2>Resumen de <?= $modotiti ?></h2>

    </div>
    <hr>
    <br>



    <b>Proveedor: <?= $id_clientever ?></b> <br><br>


    <b>Fecha desde: <?= $desde_date ?> <b>Fecha Hasta: <?= $hasta_date ?></b> <br><br>






        <hr>



        <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
            <thead>
                <tr>
                    <th style="width: 100px; text-align: center;">Fecha</th>
                    <th style="width: 60px; text-align: center;">Tipo</th>
                    <th style="text-align: left; padding-left: 10px;">Número</th>
                    <th style="width: 150px; padding-left: 10px;text-align: center;">Debe</th>
                    <th style="width: 150px; padding-left: 10px;text-align: center;">Haber</th>
                    <th style="width: 150px; padding-left: 10px;text-align: center;">Saldo</th>
                </tr>
            </thead>
            <tbody>
                <? saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date); ?>
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



                // Consulta unificada para "Debe" y "Haber" con prioridad
                $sql = mysqli_query($rjdhfbpqj, "
    SELECT id, fecha, 'Debe' AS tipo, 1 AS prioridad,'0' AS id_orden,'0' AS tipopag,'0' AS valor,'0' AS modopag,'0' AS tipocuneta,fac_r,fac_a,'0' AS id_clientepag,'0' AS nota,numero,numeror
    FROM ordenprovee 
    WHERE id_proveedor = '$id_clienteint' 
    
    AND fecha BETWEEN '$desde_date' AND '$hasta_date'  and fecha > '2025-01-01' $sqlre
    
    UNION ALL
    
    SELECT id, fecha, 'Haber' AS tipo, 2 AS prioridad,id_orden,tipopag,valor,modopag,tipocuneta,'0' AS fac_r,'0' AS fac_a,id_clientepag,nota,'0' AS numero,'0' AS numeror
    FROM prodcom 
    WHERE id_proveedor = '$id_clienteint' 
  
    AND fecha BETWEEN '$desde_date' AND '$hasta_date' and modopag='1' and tipocuneta='$modo' and fecha > '2025-01-01'
    
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
                            $faponer = "Fac.Nº" . $numerofac;
                        } else {
                            $faponer = "N" . str_pad($id_orden, 8, "0", STR_PAD_LEFT);
                        }
                    } else {
                        $numerofac = $row["numeror"];
                        if ($numerofac > 0) {
                            $faponer = "Rem.Nº" . $numerofac;
                        } else {
                            $faponer = "N" . str_pad($id_orden, 8, "0", STR_PAD_LEFT);
                        }
                    }

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




                        $sumapd = $total + $sumapd + $decudaanter;

                        echo '                      

<tr>

<td style="text-align: center;vertical-align: middle;">        
' . date('d/m/y', strtotime($fechaad)) . '  ' . $esto . '
</td>  
<td style="text-align: center; vertical-align: middle;">        
Fac.' . $modotiti . '
</td>
<td style="padding-left: 3mm; vertical-align: middle;">   
' . $faponer . '
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
$' . number_format($total, 2, '.', ',') . '                 
</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">

</td>
<td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
<b> $' . number_format($sumapd, 2, '.', ',') . '              </b>
</td>

</tr>  ';
                    } elseif ($tipo == "Haber") {

                        $saldo -= $total;
                        $nota = $row["nota"];
                        $idpago = $row["id"];
                        $pagoid_orden = $row["id_orden"];
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

<tr>

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

                            echo '  ' . $tipopagver . '' .  $pagoid_orden . '' . $notaver . '';
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

</tr> ';
                    }
                }


                ?>

                <?
                echo '<tr><td colspan="6" style="text-align:right; font-weight: bold;padding-top:23px;padding-right: 3mm; text-align:right;">
Saldo Actual  $' . number_format($sumapd, 2, '.', ',') . '
</td></tr>';






                ?>
            </tbody>
        </table>

















</body>

</html>
<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();
$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->SetHTMLFooter('<hr>Página: {PAGENO} de {nbpg}');


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Resumen_de_cuenta_No' . $id_clienteint . '_Fecha_' .  date('d-m-Y', strtotime($fechahoy)) . '.pdf', 'i'); //D




?>