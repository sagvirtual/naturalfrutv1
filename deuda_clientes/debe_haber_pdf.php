<? include('../f54du60ig65.php');
include('../nota_de_pedido/funcion_saldoanterior.php');
require('../salidas/mpdf.php');

$idordencod = $_GET['jdhsknc'];
$idorden = base64_decode($idordencod);
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


    //$pagoTotal=$pagoTotal+$ptotalcredi;



    $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint'");
    if ($rowpclientes = mysqli_fetch_array($sclientes)) {
        $saldoini = $rowpclientes['saldoini'];
    }

    $saldo = $totald - $pagoTotal + $saldoini + $adicionalvalor;


    return $saldo;
}
//comienzo pdf
ob_start();


$id_clientecod = $_GET['jhduskdsa'];
$id_clienteint = base64_decode($id_clientecod);

$errcan = $_GET['error'];
$modif = $_GET['modif'];

if (!empty($_GET['desde_date']) && !empty($_GET['hasta_date'])) {
    $desde_date = $_GET['desde_date'];
    $hasta_date = $_GET['hasta_date'];
} else {
    $fechaObj = new DateTime($fechahoy);

    // Restar un mes
    $fechaObj->modify('-1 month');

    // Obtener la fecha modificada
    $desde_date = $fechaObj->format("Y-m-d");
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

function pagoprovee($rjdhfbpqj, $idprov)
{

    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idprov'");
    if ($row = mysqli_fetch_array($sql)) {

        $pagprov = ' Transferencia a ' . $row['empresa'] . '';
    }

    return $pagprov;
}

if ($_SESSION['tipo'] == "29") {
    $editd = "";
} else {
    $editd = "?1=1";
}
if ($_SESSION['tipo'] == "30") {
    $editd = "";
}

$calculodeuda = calculodeuda($rjdhfbpqj, $id_clienteint, $id_orden);


function saldoinicialsuma($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini > 0");
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

    
    </tr>  ';
    }
}



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
        <h2>Resumen de Cuenta</h2>

    </div>
    <hr>
    <br>



    <b>Cliente: <?= $id_clientever ?></b> <br><br>


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
            <tbody> <?
                    saldoinicial($rjdhfbpqj, $id_clienteint, $desde_date, $hasta_date);



                    // Consulta unificada para "Debe" y "Haber" con prioridad
                    $sql = mysqli_query($rjdhfbpqj, "
    SELECT id, fecha, total + adicionalvalor AS total, 'Debe' AS tipo, 1 AS prioridad, '' AS tipopagver, '' AS nota, '' AS nomb, '' AS acuen, '' AS refor, '0' AS id_provepag, '0' AS id_orden, '0' AS id_notacredito, '0' AS ncheque
    FROM orden 
    WHERE id_cliente = '$id_clienteint' 
    AND col != '0' 
    AND fecha BETWEEN '$desde_date' AND '$hasta_date' 
    
    UNION ALL
    
    SELECT id, fecha, valor AS total, 'Haber' AS tipo, 2 AS prioridad, tipopag AS tipopagver, nota, nombre AS nomb, '' AS acuen, '' AS refor, id_provepag,id_orden,id_notacredito,ncheque
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


                            $id_ordencodor = base64_encode($id_orden);


                            $saldo = $saldo + $decudaanter;

                            echo '                      
                         <tr>

          
            
            <td style="text-align: center;vertical-align: middle;">        
                ' . date('d/m/y', strtotime($fechaad)) . '
            </td>  
            <td style="text-align: center; vertical-align: middle;">        
                Fac
            </td>
            <td style="padding-left: 3mm; vertical-align: middle;">   
               N' . str_pad($id_orden, 8, "0", STR_PAD_LEFT) . '
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
            $' . number_format($total, 2, '.', ',') . '                 
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                            
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                $' . number_format($saldo, 2, '.', ',') . '             
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





                                $id_ordencod = base64_encode($iditefpnota);
                            }


                            if ($tipopagver == '33') {
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
                        ' . date('d/m/y', strtotime($fechaad)) . ' 
                    </td>
                         <td style="text-align: center; vertical-align: middle;">        
                        ' . $nomb . '
                    </td>
                    <td style="padding-left: 3mm; vertical-align: middle;"> ';
                            if ($deudavfp < 0) {
                                echo 'Débito ' . $notaver . '';
                            } else {

                                echo '  ' . $tipopagver . '' . str_pad($dnombrepag, 8, "0", STR_PAD_LEFT) . ' ' . $acuen . ' ' . $ncheque . '' . $notaver . ' ' . $refor . '';
                            }
                            echo '' . $pagprov . '</td>
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
                         $' . number_format($saldo, 2, '.', ',') . '            
                    </td>
      


                </tr> ';
                        }
                    }


                    ?>

            </tbody>
        </table>
        <hr>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Saldo Actual $<?

                            $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, 99999999999);

                            echo '' . number_format($salgral, 2, '.', ',') . '' ?>.-</b>





        <tr>





















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
$mpdf->Output('Resumen_de_cuenta_No' . $id_clienteint . '_Fecha_' .  date('d-m-Y', strtotime($fechahoy)) . '.pdf', 'D'); //D




?>