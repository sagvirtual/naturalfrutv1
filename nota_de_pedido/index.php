<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../listadeprecio/func_fechalista.php');
include('../cajadiaria/fun_idcuenta.php');
include('../funciones/func_formapago.php');
include('backorden.php');
if ($tipo_usuario == "0" || $tipo_usuario == "33"  || $tipo_usuario == "1"  || $tipo_usuario == "3" || $tipo_usuario == "30") {
    include('funcion_saldoanterior.php');
    include('../control_stock/funcionStockSnot.php');
    include('func_nombreunid.php');
    include('../funciones/funNoHay.php');
    include('func_frio.php');
    include('verfaltante.php');
    include('../funciones/entro_faltante.php');
    include('../funciones/dexuentoProduc.php');
    require_once('../funciones/func_ofertas.php');
    include('../funciones/func_vencactual.php');
    if ($tipo_usuario == "30" || $tipo_usuario == "0") {
        include('../picking_error/func_errorpick.php');
    }
    include('../funciones/func_control.php');


    if ($tipo_usuario == "30") {

        $nomostraus30 = "display:none;";
        $nomostrausin30 = "disabled";
        $ondblclick = "onclick";
    } else {

        $nomostraus30 = "";
        $nomostrausin30 = "";
        $ondblclick = "onclick";
    }
    /* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */


    function NomPickintex($rjdhfbpqj, $id_usuarioclav)
    {

        $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT nom_contac FROM usuarios Where id = '$id_usuarioclav'");
        if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

            $nompic = $rowusuarios["nom_contac"];
        }
        return $nompic;
    }


    function verificoOrden($rjdhfbpqj, $id_orden)
    {

        $totdtem = 0;
        $sqlitemb = mysqli_query($rjdhfbpqj, "SELECT  total,id_orden FROM item_orden Where id_orden = '$id_orden' and modo='0'");
        while ($rowitemb = mysqli_fetch_array($sqlitemb)) {
            $totdtem += $rowitemb['total'];
        }

        $sqliord = mysqli_query($rjdhfbpqj, "SELECT id,subtotal FROM orden Where id='$id_orden'");
        if ($rowiord = mysqli_fetch_array($sqliord)) {
            $totalordb = $rowiord['subtotal'];
        }

        if ($totdtem != $totalordb) {

            /*        echo "<script>
        alert('Error');
        location.reload(); // recarga la página al aceptar
    </script>"; */
        } else {
            // echo 'ok';
        }
    }
    $idproduc = 0;
    $fechalista = fechalista($rjdhfbpqj);
    $id_clientecod = $_GET['jhduskdsa'];

    $errcan = $_GET['error'];
    $modif = $_GET['modif'];
    $ref = $_GET['ref'];
    $estatus = $_GET['estatus'];
    $histofal = $_GET['histofal'];
    if ($estatus == '2') {
        echo '
<script>
   
       
           alert("No se pudo cargar el Producto Error 2376");
          

</script>';
    }

    /* idorden pasada */
    if (!empty($_GET['orjndty'])) {
        $id_ordencod = $_GET['orjndty'];
        $id_orden = base64_decode($id_ordencod);
    }

    /* idorden pasada */
    if (!empty($_GET['jufqwes'])) {
        $idordenseg = $_GET['jufqwes'];
        $id_orden = base64_decode($idordenseg);
    }

    if (!empty($id_clientecod)) {
        $id_clienteint = base64_decode($id_clientecod);

        /* echo"<script>document.getElementById('producto').focus();</script>";
 */
    } else {
        $id_cliente = $_GET['id_cliente'];
        $id_clientev = explode("@", $id_cliente);
        $id_clientevers = $id_clientev[0];

        $id_clientevr = explode("(", $id_clientevers);
        $id_clientever = $id_clientevr[0];

        $id_clienteint = $id_clientev[1];
        $id_orden = ''; //$id_clientev[2];

    }

    /* agregar */
    if (!empty($_GET['producto'])) {
        $productods = $_GET['producto'];
        $productod = explode("@", $productods);
        $productor = preg_replace('/\s+/', ' ', $productod[0]);
        $productore = explode("[", $productor);
        $producto = $productore[0];
        $idproduc = $productore[2];
        $id_orden = $productod[2];
        $unidsx = $productod[1];
    }
    $activainp = $_GET['focf'];
    if ($activainp != '1') {
        $verinpur = "display:none;";
    }
    /* fin */

    /* if ($unidsx == "Kg.") {
    $seleuna = "selected";
}
if ($unidsx == "Uni.") {
    $seleunb = "selected";
} */
    $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
    if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

        $id_clienteve = $rowclientes["nom_contac"];
        $saldoini = $rowclientes["saldoini"];
        $cobrable = $rowclientes["cobrable"];

        $direccion = $rowclientes['address'];
        $localidad = $rowclientes['localidad'];
        $retiradcv = $rowclientes['retira'];
        $zonaid = $rowclientes['zona'];
        $desceunto = $rowclientes['desceunto'];
        if ($retiradcv == '1') {
            $verprreir = "checked";
        }


        $tipo_cliente = $rowclientes["tipo_cliente"];
        $dia_repart1 = $rowclientes["dia_repart1"];
        $dia_repart2 = $rowclientes["dia_repart2"];
        $dia_repart3 = $rowclientes["dia_repart3"];
        $dia_repart4 = $rowclientes["dia_repart4"];
        $dia_repart5 = $rowclientes["dia_repart5"];
        $dia_repart6 = $rowclientes["dia_repart6"];
        $dia_repart0 = $rowclientes["dia_repart0"];

        /*     $facturado = $rowclientes["facturado"];

        $iva_por = $rowclientes["iva_por"];
        $persep_por = $rowclientes["persep_por"]; */


        if ($desceunto == '1') {
            $toponombre = '<span class="badge bg-danger">Cliente con Descuento/s</span>';
        } else {
            $toponombre = '';
        }

        if ($cobrable == '1') {
            $topopausado = '<br><div class="alert alert-danger text-center"><h3 style="color:red;">No cargar pedido si no pago anteriormente!</h3></div>

            ';/* 
            if ($colestado < 2) {
                $noverpro = "display:none;";
            } */
        } else {
            $topopausado = '';
        }


        if ($dia_repart1 == "1") {
            $dia_repart1c = "Lunes ";
        }
        if ($dia_repart2 == "1") {
            $dia_repart2c = "Martes ";
        }
        if ($dia_repart3 == "1") {
            $dia_repart3c = "Miercoles ";
        }
        if ($dia_repart4 == "1") {
            $dia_repart4c = "Jueves ";
        }
        if ($dia_repart5 == "1") {
            $dia_repart5c = "Viernes ";
        }

        if ($dia_repart6 == "1") {
            $dia_repart6c = "Sabado ";
        }

        if ($dia_repart0 == "1") {
            $dia_repart0c = "Domingo ";
        }


        $diasvisita = $dia_repart1c . $dia_repart2c . $dia_repart3c . $dia_repart4c . $dia_repart5c . $dia_repart6c . $dia_repart0c;


        $sqlleadd = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zonaid'");
        if ($rowleadd = mysqli_fetch_array($sqlleadd)) {
            $zonad = $rowleadd["nombre"];
        } else {
            $zonad = "";
        }
        $id_clientever = $zonad . " - " . $id_clienteve . " - " . $rowclientes["nom_empr"] . " ";
        /* echo '
NOombre: '.$id_clienteve.'<br>
Negocio: '.$id_clienem.'<br>
Dirección: '.$direccion.'<br>
Localidad: '.$localidad.'<br>
Dias: '.$diasvisita.'<br>

idcli: '.$id_clienteint.'
';  
 */


        $botedi = "editar";
        $idcliedit = base64_encode($id_clienteint);
        $id_ordencod = base64_encode($id_orden);
        $enalcli = '<a href="../lclientes/?jnnfsc=' . $idcliedit . '&modocl=1&jufqwes=' . $id_ordencod . '" tabindex="-1">';
    } else {
        $noverpro = "display:none;";
        $botedi = "agregar";
        $enalcli = '<a href="../lclientes/?modocl=1&jufqwes=' . $id_ordencod . '" tabindex="-1">';
    }

    if ($id_orden == '' || $id_orden == 'dsds') {

        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where finalizada='0' and id_cliente='$id_clienteint'");
    } else {
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$id_orden'");
    }


    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_cliente = $rowordenx['id_cliente'];
        $id_usuarioclav = $rowordenx['id_usuarioclav'];
        $NomPickintex = NomPickintex($rjdhfbpqj, $id_usuarioclav);
        $pickingok = $rowordenx['picking'];
        $idresponsable = $rowordenx['responsable'];

        $id_hoja = $rowordenx['id_hoja'];
        $fechahoja = $rowordenx['fechahoja'];
        $idcamioneta = $rowordenx['camioneta'];
        $observacion = $rowordenx['observacion'];

        $prioridad = $rowordenx['prioridad'];
        if ($prioridad == "1") {
            $chepr = "checked";
        }
        $id_orden = $rowordenx['id'];
        /*       $_SESSION['id_orden'] = $id_orden; */

        /* pie saldos */
        $subtotal = $rowordenx['subtotal'];
        $uniddesc = $rowordenx['uniddesc'];
        if ($uniddesc == '0') {
            $sedeeund0 = "selected";
        }
        if ($uniddesc == '1') {
            $sedeeund1 = "selected";
        }
        $desporsen = $rowordenx['desporsen'];
        $descuento = $rowordenx['descuento'];
        $perporsen = $rowordenx['perporsen'];
        $totalper = $rowordenx['totalper'];
        $adicional = $rowordenx['adicional'];

        if (empty($adicional)) {
            $adicional = "Envio";
        }
        $adicionalvalor = $rowordenx['adicionalvalor'];

        $ivaporsen = $rowordenx['ivaporsen'];

        /*      if ($facturado == '1') {

            if ($ivaporsen == "0") {
                $ivaporsen = $iva_por;
            }

            if ($perporsen == "0") {
                $perporsen = $persep_por;
            }
        } */



        $totalivas = $rowordenx['totalivas'];
        $totalOrden = $rowordenx['total'];
        $pago = $rowordenx['pago'];
        $saldo = $rowordenx['saldo'];
        $forzado = $rowordenx['forzado'];
        if ($forzado == '1') {
            $verprreirf = "checked";
        }
        /* fin */
        $comillas = "'";
        $fechaordn = $rowordenx['fecha'];
        $horaord = $rowordenx['hora'];
        $colestado = $rowordenx['col'];

        if ($colestado == '0') {
            $sele0 = "selected";
            $nombrvot = '1';
            $blain = "disabled";
        } else {
            $nombrvot = "2";
        }
        if ($colestado == '1') {
            $sele1 = "selected";
        }
        if ($colestado == '2') {
            $sele2 = "selected";
        }
        if ($colestado == '3') {
            $sele3 = "selected";
        }
        if ($colestado == '4') {
            $sele4 = "selected";
        }
        if ($colestado == '5') {
            $sele5 = "selected";
        }
        if ($colestado == '6') {
            $sele6 = "selected";
        }
        if ($colestado == '7') {
            $sele7 = "selected";
        }
        if ($colestado == '8') {
            $sele8 = "selected";
        }
        if ($colestado == '9') {
            $sele9 = "selected";
        }
        if ($colestado == '31') {
            $sele31 = "selected";
        }
        if ($colestado == '32') {
            $sele32 = "selected";
        }
        if ($colestado == '2' || $colestado == '3') {
            $verpicing = 'display: block;';
        } else {
            $verpicing = 'display: none;';
        }

        if ($_SESSION['tipo'] == "3") {
            if ($colestado > 2) {
                $blain = "disabled";
                $versele = '1';
            }
        } else {

            $versele = '1';
        }


        $fechahoyventa = date('d/m/Y', strtotime($fechaordn)) . " " . $horaord;
    } else {
        $id_orden = "dsds";
        $verpr = "hidden";


        $fechaordn = $fechahoy;
        $horaord = $horasin;

        $fechahoyventa = date('d/m/Y', strtotime($fechahoy)) . " " . $horasin;
    }

    if (empty($producto)) {
        $producto = "";
    }
    $totalite = 0;
    $sqltota = mysqli_query($rjdhfbpqj, "SELECT id_orden,total,modo FROM item_orden Where id_orden = '$id_orden' and modo='0'");
    while ($rowo = mysqli_fetch_array($sqltota)) {
        $totalite += $rowo['total'];
    }



    bakuporden($rjdhfbpqj, $id_orden);
    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT id_orden FROM item_orden Where id_orden = '$id_orden' and id_orden != ''");
    if ($rowordenre = mysqli_fetch_array($sqlordent)) {
        $veritem = "1";
        $notab = 'tabindex="-1"';
    } else {
        $veritem = "2";
        $blain = "disabled";
    }

    if ($ref != '1') {
        $urlref = 'notadepedido.php';
    } else {
        $urlref = 'concretadas';
    }

    if ($idresponsable == '99999' && $colestado < 1) {
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='https://pedidos.naturalfrut.com.ar/'");
        echo ("</script>");
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
    if (!empty($id_clienteint)) {
        $saldoactualvde = calculodeuda($rjdhfbpqj, $id_clienteint, 99999999999);
        $saldoactualve = number_format($saldoactualvde, 0, '.', ',');
    }
    $stockdispom = 0;
    $cantidbiene = 0;
    $ventaminima = 0;
    /* veo el fraccionado info del producto */
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        $cantidbiene = $rowpdaod['kilo'];
        $unidadnom = $rowpdaod['unidadnom'];
        $modo_producto = $rowpdaod['modo_producto'];
        $ventaminima = $rowpdaod['ventaminma'];
        $fraccionado = $rowpdaod['fracionado'];
        $mensaje = $rowpdaod['mensaje'];
        $id_categoria = $rowpdaod['categoria'];
        $id_marca = $rowpdaod['id_marcas'];
        $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
        //ingreso de faltante
        if ($stockdispom <= 0 && $id_orden > 0) {
            include('insfaltante.php');
            faltantes($rjdhfbpqj, $idproduc, $id_orden, $id_clienteint);
        }
        //

        /* saber como lo venden al producto en la lista de precio */

        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproduc' and fecha <='$fechalista' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $listafechaP = $rowprecioprod["fecha"];

            $mub = $rowprecioprod["mub"];
            $muc = $rowprecioprod["muc"];
            $mud = $rowprecioprod["mud"];
            $mue = $rowprecioprod["mue"];

            $mkb = $rowprecioprod["mkb"];
            $mkc = $rowprecioprod["mkc"];
            $mkd = $rowprecioprod["mkd"];
            $mke = $rowprecioprod["mke"];

            $mpa = $rowprecioprod["mpa"];
            $mpb = $rowprecioprod["mpb"];
            $mpc = $rowprecioprod["mpc"];
            $mpd = $rowprecioprod["mpd"];
            $mpe = $rowprecioprod["mpe"];

            $eub = $rowprecioprod["eub"];
            $euc = $rowprecioprod["euc"];
            $eud = $rowprecioprod["eud"];
            $eue = $rowprecioprod["eue"];

            $ekb = $rowprecioprod["ekb"];
            $ekc = $rowprecioprod["ekc"];
            $ekd = $rowprecioprod["ekd"];
            $eke = $rowprecioprod["eke"];

            $epa = $rowprecioprod["epa"];
            $epb = $rowprecioprod["epb"];
            $epc = $rowprecioprod["epc"];
            $epd = $rowprecioprod["epd"];
            $epe = $rowprecioprod["epe"];



            if ($ventaminima <= "1" && $mka > 1) {
                $fracio = ' <div class="p-2 bg-dark">1 ' . $unidadnom . ' <br>Precio <b>$' . number_format($mpa, 0, ',', '.') . ' </b></div>&nbsp;';
            }

            $fracio .= ' <div class="p-2 bg-dark"><i></i>' . $mka . ' ' . $unidadnom . ' Precio<br> <b style="font-size: 14pt;"><span class="badge bg-success">$' . number_format($mpa, 0, ',', '.') . '</span></h4></b></div>&nbsp;';

            if ($mub == "0" && $mkb > 0 && $mpb > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpb, 0, ',', '.') . '</span></b><br>' . $mkb . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpb * $mkb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($muc == "0" && $mkc > 0 && $mpc > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpc, 0, ',', '.') . '</span></b><br>' . $mkc . ' ' . $unidadnom . '  Precio <b>$' . number_format($mpc * $mkc, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mud == "0" && $mkd > 0 && $mpd > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpd, 0, ',', '.') . '</span></b><br>' . $mkd . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpd * $mkd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mue == "0" && $mke > 0 && $mpe > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpe, 0, ',', '.') . '</span></b><br>' . $mke . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpe * $mke, 0, ',', '.') . '</b></div>&nbsp';
            }


            if ($mub == "1" && $mkb > 0 && $mpb > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpb, 0, ',', '.') . '</span></b><br>' . $mkb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
            Precio <b>$' . number_format($mpb * $cantidbiene * $mkb, 0, ',', '.') . '</b></div>&nbsp;';
            }
            if ($muc == "1" && $mkc > 0 && $mpc > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpc, 0, ',', '.') . '</span></b><br>' . $mkc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
            Precio <b>$' . number_format($mpc * $cantidbiene * $mkc, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mud == "1" && $mkd > 0 && $mpd > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpd, 0, ',', '.') . '</span></b><br>' . $mkd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
            Precio <b>$' . number_format($mpd * $cantidbiene * $mkd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mue == "1" && $mke > 0 && $mpe > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($mpe, 0, ',', '.') . '</span></b><br>' . $mke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($mpe * $cantidbiene * $mke, 0, ',', '.') . '</b></div>&nbsp';
            }
            //distribuidor
            if ($eub == "0" && $ekb > 0 && $epb > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epb, 0, ',', '.') . '</span></b><br>' . $ekb . ' ' . $unidadnom . ' Precio <b>$' . number_format($epb * $ekb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($euc == "0" && $ekc > 0 && $epc > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epc, 0, ',', '.') . '</span></b><br>' . $ekc . ' ' . $unidadnom . '  Precio <b>$' . number_format($epc * $ekc, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eud == "0" && $ekd > 0 && $epd > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epd, 0, ',', '.') . '</span></b><br>' . $ekd . ' ' . $unidadnom . ' Precio <b>$' . number_format($epd * $ekd, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eue == "0" && $eke > 0 && $epe > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epe, 0, ',', '.') . '</span></b><br>' . $eke . ' ' . $unidadnom . ' Precio <b>$' . number_format($epe * $eke, 0, ',', '.') . '</b></div>&nbsp';
            }


            if ($eub == "1" && $ekb > 0 && $epb > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epb, 0, ',', '.') . '</span></b><br>' . $ekb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
    Precio <b>$' . number_format($epb * $cantidbiene * $ekb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($euc == "1" && $ekc > 0 && $epc > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epc, 0, ',', '.') . '</span></b><br>' . $ekc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
    Precio <b>$' . number_format($epc * $cantidbiene * $ekc, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eud == "1" && $ekd > 0 && $epd > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><b style="font-size: 14pt;"><span class="badge bg-success">1 ' . $unidadnom . ' $' . number_format($epd, 0, ',', '.') . '</span></b><br>' . $ekd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
    Precio <b>$' . number_format($epd * $cantidbiene * $ekd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($eue == "1" && $eke > 0 && $epe > 0) {
                $fracio .= ' <div class="p-2 bg-danger">(<i>1 ' . $unidadnom . ' $' . number_format($epe, 0, ',', '.') . '</span></b><br>' . $eke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($epe * $cantidbiene * $eke, 0, ',', '.') . '</b></div>&nbsp';
            }
        }

        if (($mub == '0' && $mkb > 0 && $mpb > 0) || ($muc == '0' && $mkc > 0  && $mpc > 0) || ($mud == '0' && $mkd > 0 && $mpd > 0) || ($mue == '0' && $mke > 0  && $mpe > 0)) {
            $selecunid = "1";
        } else {
            $selecunid = "0";
        }
        if (($mub == '1' && $mkb > 0 && $mpb > 0) || ($muc == '1' && $mkc > 0  && $mpc > 0) || ($mud == '1' && $mkd > 0 && $mpd > 0) || ($mue == '1' && $mke > 0  && $mpe > 0)) {
            $selecunidc = "1";
        } else {
            $selecunidc = "0";
        }


        if ($ventaminima == '0') {
            $ventamida = "No tiene <br>venta mínima.";
        } else {
            $ventamida = 'Venta<br>minima ' . $ventaminima . '' . $unidadnom;
        }

        /* if ($mensaje == '') {
            $menobs = "";
        } else {
            if ($nooferta == 1) {
                $menobs = '<div class="p-2 "></div><div class="cocardan text-center p-2 ">' . $mensaje . '</div>';
            }
        } */
        //oferta xx
        $resultoferta = oferta($rjdhfbpqj, $idproduc, $fechahoy, $id_clienteint);
        $fechavencimiento = funcvenciActual($rjdhfbpqj, $idproduc);
        $nooferta = $resultoferta['nooferta'];
        $oferta = $resultoferta['oferta'];
        $porsentajeOferta = $resultoferta['descuento'];
        $cantmaxOferta = $resultoferta['cantmax'];
        $unidadOferta = $resultoferta['unidad'];
        $stockOferta = $resultoferta['stock'];
        $unidstockOferta = $resultoferta['unidstock'];
        $notaOferta = $resultoferta['nota'];
        $limite = $resultoferta['limite'];
        $ofertapromo = $resultoferta['ofertapromo'];
        $stockhistorial = $resultoferta['stockhistorial'];
        $dosporeuno = $resultoferta['dosporeuno'];
        $forzadoprecio = $resultoferta['forzadoprecio'];
        $rawmultiploes = explode("x", $dosporeuno);
        $multiploes = $rawmultiploes[0];
        if ($multiploes <= 0) {
            $multiploes = 1;
        }
        //xxx
        if ($cantmaxOferta <= 0) {
            $cantmaxOferta = $stockdispom;
        }
        if ($notaOferta == "") {
            $notaOferta = "PROMO!";
        }
        $fecha_desdeOferta = date('d/m', strtotime($fechahoy));
        $fecha_hastaOferta = date('d/m', strtotime($resultoferta['fecha_hasta']));
        if ($oferta == 1) {

            if ($stockdispom >= $stockhistorial && $limite > 0) {
                $menobs = '<div class="p-2 "></div><div class="cocardan text-center p-2" style="width: 180px;">' . $notaOferta . '<br>Hasta ' . $fecha_hastaOferta . '
                <br><p style="font-size: 8pt;">Desc.&nbsp;%' . $porsentajeOferta . '
                </p>
                </div>';
            } else {
                if ($limite > 0) {
                    $sqlpreeprod = "Update oferta Set activo='0' Where id_producto = '$idproduc'";
                    mysqli_query($rjdhfbpqj, $sqlpreeprod) or die(mysqli_error($rjdhfbpqj));

                    $sqlpreod = "Update ofertacli Set activo='0' Where id_producto = '$idproduc' and id_cliente='$id_clienteint'";
                    mysqli_query($rjdhfbpqj, $sqlpreod) or die(mysqli_error($rjdhfbpqj));
                }
            }
            if ($limite < 1) {
                $menobs = '<div class="p-2 "></div><div class="cocardan text-center p-2" style="width: 180px;">' . $notaOferta . '<br>Hasta ' . $fecha_hastaOferta . '
                <br><p style="font-size: 8pt;">Desc.&nbsp;%' . $porsentajeOferta . '
                </p>
                </div>';
            }
        }


        $cuadrespe = '<h6><span class="badge bg-secondary">Producto Id: ' . $idproduc . '</span> <span class="badge bg-secondary">Precio del ' . date('d/m/y', strtotime($listafechaP)) . '</span>' . $fechavencimiento . '</h6>
<div class="d-flex  text-white" >
  <div class="p-2 bg-secondary  text-center">' . $ventamida . '</div>
  <div class="p-2 "></div>
  ' . $fracio . '

    <div class="p-2 "></div>
  <div class="p-2 bg-secondary text-center">Bulto en<br>' . $modo_producto . '&nbsp;x&nbsp;' . $cantidbiene . '&nbsp;' . $unidadnom . '</div>
  
  <div class="p-2 "></div>
  <div class="p-2 bg-secondary text-center">Stock<br>' . $stockdispom . '&nbsp;' . $unidadnom . '</div>
  ' . $menobs . '
</div><br>

';
    }

    if ($colestado == '0' || $colestado == '1') {
        $pedfnom = "presupuesto_pdf";
    } else {
        $pedfnom = "nota_de_pedido_pdf";
    }

    ?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Nota de Pedidos - Natural Frut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrapb.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>

    <body>
        <?php
        $sqlore = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden' and modo='0'");
        $canverificafin = mysqli_num_rows($sqlore);
        if ($canverificafin > 6) {
            $ubufocus = "ter";
            //echo'<div style="height: 305px;width: 100%; text-align:center;background-color: #fffff;"></div> ';
            //echo'<br><br><br><br><br><br><br><br><br> ';
        } else {
            $ubufocusr = "ter";
        }

        ?>
        <div id="foo<?= $ubufocusr ?>"></div>
        <style>
            body {
                zoom: 85%;
                scroll-behavior: smooth;
                /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
            }

            @media (min-width: 600px) and (max-width: 1200px) {

                body {
                    zoom: 75%;
                    scroll-behavior: smooth;
                    /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
                }

                .container {
                    width: 100% !important;
                    max-width: 100% !important;
                    padding-left: 20px !important;
                    padding-right: 20px !important;
                }
            }


            .scrdesa {
                width: 100%;
                height: 100%;
                overflow-y: scroll;
                scroll-behavior: none;
            }

            .fixed-bottom-left {
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 1000;
                /* Asegúrate de que esté por encima de otros elementos */
                width: 400px;
                /* Ajusta el ancho según tus necesidades */
                max-height: 35vh;
                /* Limita la altura si es necesario */
                overflow-y: auto;
                /* Añade un scroll interno si el contenido es muy largo */
                background-color: white;
                /* Opcional: establece un fondo */
                border-top-right-radius: 10px;
                /* Opcional: esquinas redondeadas */
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                /* Opcional: sombra */
            }


            .cocarda {
                font-family: Arial, sans-serif;
                width: 90px;
                background-color: rgb(255, 0, 0);
                color: white;
                font-weight: bold;
                border-radius: 50px;
                animation: titilar 0.5s infinite alternate;
            }


            .cocardan {
                font-family: Arial, sans-serif;
                width: 90px;
                background-color: #ffae00ff;
                color: black;
                font-weight: bold;
                animation: titilar 0.5s infinite alternate;
            }


            @keyframes titilar {
                30% {
                    opacity: 1;
                }

                100% {
                    opacity: 0.2;
                }
            }
        </style>


        <div class="scrdesa">



            <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
                <p style=" font-size: 10pt; color: white;">Sistema de Nota de Pedidos Versión 1.0.2</p>
            </div>
            <!--   <h1 style="color:red;"> NO!! USAR ESTOY CORRIGIENDO </h1> -->
            <div class="container">

                <div class="row">
                    <div class="col-2">
                        <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
                    </div>

                    <?php

                    if ($id_orden == "dsds") {
                        $id_ordends = "";
                    } else {
                        $id_ordends = $id_orden;
                        $blockclien = 'disabled';
                    }



                    ?>

                    <div class="col-4">
                        <div style="padding-bottom:15px; width: 350px;">
                            <b>Nº Venta</b>
                            <input type="text" class="form-control" value="<?= $id_ordends ?>" disabled>
                        </div>
                        <div style="padding-bottom:15px; width: 350px;">
                            <b>Fecha</b>
                            <input type="text" class="form-control" value="<?= $fechahoyventa ?>" style="width: 350px;" disabled>
                            <input type="hidden" id="fechaordn" value="<?= $fechaordn ?>">
                            <input type="hidden" id="horaord" value="<?= $horaord ?>">
                        </div>

                        <?php

                        if (!empty($id_clienteint)) {

                        ?>

                            <b>Retira el Cliente </b><input type="checkbox" name="retira" id="retira" value="1" onclick="ajax_retira($('input:checkbox[name=retira]:checked').val());" title="Marcar si retira el cliente en la Distribuidora" tabindex="-1" <?= $verprreir ?>> &nbsp;<b><?= $diasvisita ?> </b>
                            <div id="muestroorden5"></div>
                            <?php
                        } else {
                            echo ' <b>Cliente  </b>';
                        }

                            ?><?= $toponombre ?><?php

                                                //extrigo nnombre usuario
                                                $sqlcamrs = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id = ' $idresponsable'");
                                                if ($rowcm23 = mysqli_fetch_array($sqlcamrs)) {
                                                    echo '<span class="badge bg-secondary">Ingreso: ' . $rowcm23["nom_contac"] . '</span>';
                                                } elseif ($idresponsable == '99999') {
                                                    echo '<span class="badge bg-secondary">Ingreso: CLIENTE</span>';
                                                }
                                                if ($colestado > 2) {
                                                    echo '&nbsp;<span class="badge bg-secondary">Picking: ' . $NomPickintex . '</span>';
                                                }
                                                ?>
                            <?php

                            include('inpubclien.php');
                            ?>

                    </div>


                    <div class="col-2" style="width: auto;  position: relative; float: left;"><?= $enalcli ?>
                        <img src="../assets/images/<?= $botedi ?>.png" alt="Nuevo Cliente" style="width: auto; height: 30px; position: absolute; bottom: 20px; left: -70px;"></a>
                    </div>

                    <div class="col-4">

                        <div style="padding-bottom:15px; width: 350px;">
                            <b>Saldo Actual</b>
                            <input type="text" class="form-control" value="$<?= $saldoactualve ?>" disabled>
                        </div>
                        <b>Estado</b>
                        <select name="col" id="col" class="form-control" style="width: 350px;" onchange="ajax_seguimiento($('#col').val());showInputPickin()" tabindex="-1" <?= $blain ?> <?= $nomostrausin30 ?>>
                            <? if ($pickingok != "1") { ?>
                                <option value="0" <?= $sele0 ?>>Ingresando...</option>
                                <option value="1" <?= $sele1 ?>>Eperando Confirmación</option>
                                <option value="2" <?= $sele2 ?>>Confirmado</option>
                            <? } ?>
                            <? if ($versele == "1") { ?>
                                <option value="3" <?= $sele3 ?>>Preparando</option>
                                <option value="4" <?= $sele4 ?>>Pidiendo Productos</option>
                                <option value="5" <?= $sele5 ?>>Controlando</option>
                                <? if ($retiradcv == '1') { ?>
                                    <option value="6" <?= $sele6 ?>>Listo para Retiro</option>
                                <? } else { ?>
                                    <option value="7" <?= $sele7 ?>>Listo para Despacho</option>
                                <? } ?>
                                <option value="9" <?= $sele9 ?>>En Ruta de Entrega</option>
                                <option value="31" <?= $sele31 ?>>Entregada</option>
                                <option value="32" <?= $sele32 ?>>Cancelada</option>
                                <option value="8" <?= $sele8 ?>>CONCRETADO</option>

                            <? } ?>

                        </select>

                        <?php

                        function NomPickin($rjdhfbpqj, $id_usuarioclav)
                        {

                            $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente='34' and estado = '0' ORDER BY `usuarios`.`nom_contac` ASC");
                            while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

                                echo ' <option value="' . $rowusuarios["id"] . '"';
                                if ($id_usuarioclav == $rowusuarios["id"]) {
                                    echo 'selected';
                                }
                                echo '>' . $rowusuarios["nom_contac"] . '</option>';
                            }
                        }


                        ?>

                        <select name="IdPickin" id="IdPickin" class="form-control" style="background-color: yellow; width: 350px; <?= $verpicing ?>" onchange="ajax_Picking($('#IdPickin').val());" <?= $blain ?>>
                            <option value="0" <?= $selep0 ?>>Seleccionar Picking...</option>
                            <? NomPickin($rjdhfbpqj, $id_usuarioclav); ?>
                        </select>
                        <div name="Idurg" id="Idurg" style="<?= $verpicing ?>">
                            <b>Urgencia del preparado </b><input type="checkbox" name="forzar" id="forzar" value="1" onclick="ajax_forzar($('input:checkbox[name=forzar]:checked').val());" title="Marcar para Urgencia del preparado" tabindex="-1" <?= $verprreirf ?>>
                        </div>
                        <div id="muestroorden55"></div>
                        <div style="width: 350px;padding-top:15px;">
                            <b>Localidad</b>
                            <input type="text" class="form-control" tabindex="-1" value="<?= $localidad ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2" style="width: auto;  position: relative; float: left;">
                        <?php if ($id_hoja && $tipo_usuario != 30) {

                            echo '
            <a href="../hoja_de_ruta/ver_hoja_de_ruta?hdnsbloekdjgsd=' . base64_encode($fechahoja) . '&hdnskdjjgsd=' . base64_encode($idcamioneta) . '&hidjjhdho=' . $id_hoja . '" title="Ver hoja de ruta">
               <button type="button" class="btn btn-dark" style="position: absolute; bottom: 100px; left: 0px;" tabindex="-1">Hoja/R</button></a>
            ';
                        }
                        ?>


                        <a href="../<?= $urlref ?>" tabindex="-1">
                            <button type="button" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Volver</button></a>
                    </div>



                </div>
                <script>
                    setTimeout(function() {
                        var divb = document.getElementById('muestroorden4');
                        divb.style.display = 'none';
                    }, 3000); // 5000 milisegundos = 5 segundos
                </script>

                <div id="muestroorden4"> </div>
                <div id="muestroorden6"> </div>

                <div class="row" id="ordenin">

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
                    <? if ($id_orden != "dsds" && $veritem == "1") { ?>
                        <div class="container mt-3">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr> <? if ($tipo_usuario == '30' || $tipo_usuario == '0') { ?>
                                            <th style="text-align:center;width: 118px;">Errores</th>
                                        <? } ?>
                                        <? if ($colestado >= '2' && $tipo_usuario == '0' || $tipo_usuario == '33' || $tipo_usuario == '30') { ?>
                                            <th style="text-align:center;width: 50px;">Pick</th>
                                        <? } ?>

                                        <th style="text-align:left; padding-left: 10px;">Producto Ingresados(<?= $canverificafin ?>)</th>

                                        <th style="width: 110px;padding-left: 10px;">Unidad</th>
                                        <th style="width: 100px;padding-left: 10px;">Cantidad</th>
                                        <th style="width: 150px;padding-left: 10px;">Importe</th>
                                        <th style="width: 90px;padding-left: 10px;<?= $nomostraus30 ?>">Desc.&nbsp;(%)</th>
                                        <th style="width: 150px;padding-left: 10px;">Total&nbsp;Importe</th>
                                        <th style="width: 100px;text-align:center;"></th>
                                        <th style="width: 50px;text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    function ventmininfo($rjdhfbpqj, $id_producto)
                                    {
                                        $sqlde = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
                                        if ($rowpdaod = mysqli_fetch_array($sqlde)) {
                                            $ventfima = $rowpdaod['ventaminma'];
                                            $presentasd = $rowpdaod['kilo'];
                                            if ($ventfima == 0) {
                                                $ventfima = 1;
                                            }
                                        }
                                        return array('ventfima' => $ventfima, 'presentasd' => $presentasd);
                                    }
                                    $totalit = 0;

                                    if ($tipo_usuario != 30) {
                                        $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");
                                    } else {

                                        $sqlorden = mysqli_query($rjdhfbpqj, "SELECT e.*, u.nombre as nomcatego
                                        FROM item_orden e 
                                        INNER JOIN categorias u 
                                        ON e.id_categoria = u.id
                                        Where e.id_orden = '$id_orden' and e.modo='0' ORDER BY  nomcatego,e.nombre  ASC");
                                    }


                                    while ($roworden = mysqli_fetch_array($sqlorden)) {
                                        //$totalite += $roworden['total'];
                                        $iditeorfd = $roworden['id'];
                                        $id_producto = $roworden['id_producto'];
                                        $presentasd = $roworden['presentacion'];
                                        $pickingds = $roworden['picking'];
                                        $fechaitem = $roworden['fecha'];
                                        $pickinicio = new DateTime($roworden['pickinicio']);
                                        $pickinfin = new DateTime($roworden['pickinfin']);
                                        $desceunto = $roworden['descuenun'];
                                        $totals = $roworden['total'];
                                        if ($desceunto > 0) {
                                            $colordecuen = "background-color:Yellow";
                                        } else {
                                            $colordecuen = "background-color:white";
                                        }
                                        if ($totals <= 0) {
                                            $colot = "background-color:Orange";
                                        } else {
                                            $colot = "background-color:white";
                                        }

                                        if ($roworden['pickinicio'] != "00:00:00" && $roworden['pickinfin'] != "00:00:00" && ($tipo_usuario == "0" || $tipo_usuario == "33")) {

                                            $picktiemtardo = $pickinicio->diff($pickinfin);
                                            $minutostar = ($picktiemtardo->h * 60) + $picktiemtardo->i;
                                            if ($minutostar >= '10' && $minutostar < '200') {
                                                $colorred = " color:red;font-weight: bold;";
                                                $fechainipn = $roworden['pickinicio'] . "<br>";
                                            } else {
                                                $colorred = " ";
                                                $fechainipn = "";
                                            }
                                            if ($minutostar == 0) {
                                                $minutostar = "-1 Min.";
                                            } elseif ($minutostar > 200) {
                                                $minutostar = "";
                                            } else {
                                                $minutostar = $minutostar . " Min.";
                                            }


                                            $picktiem = '<p style="font-size: 9pt; ' . $colorred . '">' . $fechainipn . '' . $minutostar . '</p>';
                                        } else {
                                            $picktiem = "";
                                        }
                                        if ($pickingds == '1') {
                                            $verprdirf = "checked";
                                        } else {
                                            $verprdirf = "";
                                        }

                                        /*  */
                                        $ventfpr = ventmininfo($rjdhfbpqj, $id_producto);
                                        $ventfima = $ventfpr['ventfima'];

                                        if ($presentasd == '0') {
                                            $presentasd = $ventfpr['presentasd'];
                                        }



                                        $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
                                        $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
                                        $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);
                                        $tipounidad = $roworden['tipounidad'];
                                        //$totalite += $roworden['total'];
                                        $agregado = $roworden['agregado'];
                                        if ($agregado == '1') {
                                            $agreccs = '<i style="font-size: 10pt; color:red">' . $agregado = $roworden['hora'] . '</i>';
                                        } else {
                                            $agreccs = '';
                                        }

                                        if ($tipounidad == '0') {
                                            $seled0 = "selected";
                                        } else {
                                            $seled0 = "";
                                            $cantidacompr = $roworden['kilos'];
                                        }
                                        if ($tipounidad == '2') {
                                            $seled0 = "selected";
                                        } else {
                                            $seled0 = "";
                                            $cantidacompr = $roworden['kilos'];
                                        }
                                        if ($tipounidad == '1') {
                                            $cantidacompr = $roworden['kilos'] * $presentasd;

                                            $seled1 = "selected";
                                            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
                                        } else {
                                            $seled1 = "";
                                            $comoviene = "";
                                        }

                                        if ($idproduc == $id_producto) {
                                            $fondotd = "background-color: #FF9B9B;";
                                            $alerpeo = '
                            <div class="alert alert-danger">
                                <strong>Esto datos NO será agregaron el producto ya estaba anteriormente cargado!!</strong>
                                </div>';
                                        } else {
                                            $fondotd = "";
                                        }

                                        $stockdispomcar = SumaStock($rjdhfbpqj, $id_producto) + $cantidacompr;
                                        echo '
                        
                        <tr>';
                                        //errores control
                                        if ($tipo_usuario == '30' || $tipo_usuario == '0') {

                                            echo '
                                        <td  style="text-align:center;"> ';
                                            echo '' . selecterroomot($rjdhfbpqj, $id_orden, $id_producto, $tipo_usuario) . '';

                                            echo '</td>';
                                        }



                                        if ($colestado >= '2' && $tipo_usuario == '0' || $tipo_usuario == '33' || $tipo_usuario == '30') {

                                            $esfrio = frio($rjdhfbpqj, $id_producto);
                                            echo '
                        <td  style="text-align:center;"> ';
                                            if ($esfrio == '1') {

                                                echo '<h6><span class="badge bg-dark">FRIO</span></h6>
                            ';
                                            }

                                            if ($pickingds == '3') {
                                                $veresta = NoHay($rjdhfbpqj, $id_producto, $id_orden);
                                            } else {
                                                $veresta = "";
                                                echo ' <input type="checkbox" name="pickingy' . $roworden['id'] . '" id="pickingy' . $roworden['id'] . '" value="1" onclick="ajax_picitem($(' . $comillas . 'input:checkbox[name=pickingy' . $roworden['id'] . ']:checked' . $comillas . ').val(),' . $comillas . '' . $roworden['id_producto'] . '' . $comillas . ',' . $comillas . '' . $roworden['id'] . '' . $comillas . ');" title="Marcar como hecho" tabindex="-1" ' . $verprdirf . '>';
                                            }
                                            echo '' . $veresta . '
                        ' . $picktiem . '
                        ';

                                            echo '</td>';
                                        }
                                        echo '
                        <td  style="padding-left: 2mm; ' . $fondotd . ';">';

                                        if ($tipo_usuario != 30) {
                                            echo ' <input type="text" class="form-control" value="' . $roworden['nombre'] . ' "  disabled>' . $agreccs . ' ';
                                        } else {

                                            echo ' ' . $roworden['nombre'] . '' . $agreccs . ' ';
                                        }

                                        echo ' </td>
                                      <td style="padding-left: 2mm;' . $fondotd . '">
                      <select  id="unidad' . $roworden['id'] . '" class="form-select" tabindex="-1"
                      
                      onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val()); ajax_ventaminim' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                        caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 
                        
                            
                                       onblur="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());"
                        
                        
                        
                        >
                          <option value="0" ' . $seled0 . '>' . $nombreunid . '</option>
                         <option value="1" ' . $seled1 . '>' . $nombrebult . '</option>
                     </select>
                 </td>
                        <td  style="text-align:center;' . $fondotd . '">   
                        <input type="number" id="cantidad' . $roworden['id'] . '" value="' . $roworden['kilos'] . '"  class="form-control"  min="0" 
                          
                        onkeyup="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());


                             ajax_ventaminim' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());

                        caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"  
                        onKeyDown="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                      caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val())"  
  
                        onKeyPress="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                         
                              
                              
                              caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"  

                          onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());


                             ajax_ventaminim' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());

                             caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"  
                        
                              
                          
                                       onblur="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());"


                        onclick="select()"  style="text-align:center;" >
             
                     </td>
        
                   
                 </td>
                    <td  style="text-align:center;' . $fondotd . '">
                    <input type="text"  id="improteun' . $roworden['id'] . '" value="' . $roworden['precio'] . '" class="form-control" style="text-align:right;"  disabled></td>

                      <td  style="text-align:center;' . $colordecuen . '; ' . $nomostraus30 . '"> 
                    <input type="number"  id="descuenun' . $roworden['id'] . '" value="' . $roworden['descuenun'] . '" style="text-align:center;" class="form-control" min="0" max="100"  onkeyup="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                       onclick="select();" 

               
                      onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                   caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 
                    
                    onKeyDown="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"   

                    onKeyPress="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"  
                  
                  

                  
                    
                    onclick="select()" ' . $nomostrausin30 . '>


                      <td  style="text-align:center;' . $colot . '">
                      <input type="text" id="importtot' . $roworden['id'] . '" value="' . $roworden['total'] . '" class="form-control"  style="text-align:right;"  disabled>
                      </td>
                 
                       <td class="text-center" style="place-items: center;text-align:center;' . $fondotd . '">   
                       <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '">    
                       
                       
                                <button type="button"  class="btn btn-success" 
                    onclick="ajax_actuait' . $roworden['id'] . '(
                          $(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());"

                    style="width: 100%;">Mod</button></td><td style="text-align:center;">



                       <button type="button" class="btn btn-danger btn-sm"  ' . $ondblclick . '="ajax_elimina($(' . $comillas . '#iditem' . $roworden['id'] . '' . $comillas . ').val(),' . $comillas . '' . $id_producto . '' . $comillas . ');
                       $(' . $comillas . '#producto' . $comillas . ').val(' . $comillas . '' . $comillas . ');
                       
                       " tabindex="-1">X</button>
                       
                    <script>

    function ajax_ventaminim' . $roworden['id'] . '(cantidad' . $roworden['id'] . ', unidad' . $roworden['id'] . ') {
        
        var maximo = ' . $ventfima . '; 
       
        var unidad = unidad' . $roworden['id'] . '; 

        if(unidad==1){
                var cantidad=cantidad' . $roworden['id'] . '*' . $presentasd . ';
                    }else{
                    
                     var cantidad = cantidad' . $roworden['id'] . '; 
                    }


        if (cantidad >= maximo) {
         
           
        } else {
            
            var confirmacion = confirm("La cantidad ingresada es menor a la venta minima de " + maximo + "  ¿Deseas continuar?");
            
            if (confirmacion) {
               
                return true;
            } else {

             document.getElementById(' . $comillas . 'cantidad' . $roworden['id'] . '' . $comillas . ').value =' . $roworden['kilos'] . ';
              
                return false; 
            
        }
    }
}
</script>
                             <script> 
     
 function ajax_precios' . $roworden['id'] . '(cantidad' . $roworden['id'] . ',unidad' . $roworden['id'] . ') {
        var maximo' . $roworden['id'] . ' = ' . $stockdispomcar . ';
            var unidades' . $roworden['id'] . ' = unidad' . $roworden['id'] . ';
            var presenta' . $roworden['id'] . ' = ' . $presentasd . ';
            if(unidades' . $roworden['id'] . '==1){

                var cantidad' . $roworden['id'] . '=cantidad' . $roworden['id'] . '*presenta' . $roworden['id'] . ';
                var stockdidspom' . $roworden['id'] . ' = maximo' . $roworden['id'] . ' / presenta' . $roworden['id'] . ';
                var stockdispom' . $roworden['id'] . ' = Math.trunc(stockdidspom' . $roworden['id'] . ');
                

            }else{cantidad' . $roworden['id'] . '=cantidad' . $roworden['id'] . ';

                stockdispom' . $roworden['id'] . '=maximo' . $roworden['id'] . ';

            }

        if (cantidad' . $roworden['id'] . ' <= maximo' . $roworden['id'] . ') {
        var parametros = {
            "cantidad": cantidad' . $roworden['id'] . ',
            "unidad": unidad' . $roworden['id'] . ',
            "idprodu": ' . $id_producto . ',
            "tipocliente": ' . $tipo_cliente . ',
            "fechaorden": ' . $comillas . '' . $fechaitem . '' . $comillas . '
        };
        $.ajax({
            data: parametros,
            url: ' . $comillas . 'func_precios.php' . $comillas . ',
            type: ' . $comillas . 'POST' . $comillas . ',

            beforeSend: function() {
       
 


    },
    success: function(response) {
       
        document.getElementById(' . $comillas . 'improteun' . $roworden['id'] . '' . $comillas . ').value =response;
        if(cantidad==1){
        document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value =response;
    }
    calculocosto' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val());
   
}
          
        });
    }else{ alert("El stock maximo es de " + stockdispom' . $roworden['id'] . ' + ".");
        document.getElementById(' . $comillas . 'cantidad' . $roworden['id'] . '' . $comillas . ').value =stockdispom' . $roworden['id'] . ' ;
    return false; }

    }


</script>


                       <script>
                       function calculocosto' . $roworden['id'] . '(cantidad' . $roworden['id'] . ',descuenun' . $roworden['id'] . ',improteun' . $roworden['id'] . ') 
                       {
                         var cantidad' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ';
                         var descuenun' . $roworden['id'] . ' = descuenun' . $roworden['id'] . ';
                         var improteun' . $roworden['id'] . ' = improteun' . $roworden['id'] . ';

                         if (descuenun' . $roworden['id'] . ' === undefined || descuenun' . $roworden['id'] . ' === null || descuenun' . $roworden['id'] . ' === ' . $comillas . '' . $comillas . '|| descuenun' . $roworden['id'] . ' === ' . $comillas . '0' . $comillas . ') 
                         {
                            costoxbuldd' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ' * improteun' . $roworden['id'] . '
                            document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value = costoxbuldd' . $roworden['id'] . '; 
                            }else{
                           costoxbuldr' . $roworden['id'] . ' = cantidad' . $roworden['id'] . ' * improteun' . $roworden['id'] . ';
                           costoxbuldd' . $roworden['id'] . '  = costoxbuldr' . $roworden['id'] . ' - (costoxbuldr' . $roworden['id'] . ' * (descuenun' . $roworden['id'] . ' / 100));
                           document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value = Math.round(costoxbuldd' . $roworden['id'] . '); 
                               }
                       }
                       </script>
                       <script>
                       
                       function ajax_actuait' . $roworden['id'] . '(cantidad' . $roworden['id'] . ', descuenun' . $roworden['id'] . ',unidad' . $roworden['id'] . ',improteun' . $roworden['id'] . ') {
                        if (confirm("¿Estás seguro de que deseas modificar?")) {
                       
                       var parametros = {
                            "cantidad": cantidad' . $roworden['id'] . ',
                            "descuenun": descuenun' . $roworden['id'] . ',
                            "unidad": unidad' . $roworden['id'] . ',
                            "precio": improteun' . $roworden['id'] . ',
                            "total": Math.round(costoxbuldd' . $roworden['id'] . '),
                            "iditem": ' . $comillas . '' . $roworden['id'] . '' . $comillas . '
                        };
                        $.ajax({
                            data: parametros,
                            url: ' . $comillas . 'actualitem.php' . $comillas . ',
                            type: ' . $comillas . 'POST' . $comillas . ',
                            beforeSend: function() {
                                $("#muestroordenr' . $roworden['id'] . '").html(' . $comillas . '' . $comillas . ');
                            },
                            success: function(response) {
                                $("#muestroordenr' . $roworden['id'] . '").html(response);
                                
                            }
                        });
                        

                    }}
                    
                    
                 
                   </script>
 


<div id="muestroordenr' . $roworden['id'] . '"></div>


                      </td>
                   </tr>';
                                    }
                                    /* somo totales */
                                    /*      $sqlordento = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");
                    while ($rowordentot = mysqli_fetch_array($sqlordento)) {
                        $idor=$rowordentot['id'];

                        $recibe.="var input".$idor." = document.getElementById('importtot".$idor."').value;";
                        $recibev.="var totaogr".$idor." = parseFloat(input".$idor.");";
                        $recibevx.="totaogr".$idor." + ";
                    }
                        echo' <script>function sumarInputs() {';
                        echo ' 
                        '.$recibe.'
                        ';

                        echo ' 
                        '.$recibev.'
                        ';
                        

                    echo' var suma = '. $recibevx.' 0;';

                    echo" document.getElementById('suresul').value = suma;";

                    echo'} </script>'; */
                                    ?>

                                </tbody>
                            </table>


                        <?php

                    }

                        ?>

                        <?php
                        $sqlunidpercep = mysqli_query($rjdhfbpqj, "SELECT * FROM unidpercep Where id_orden = '$id_orden'");
                        if ($rowspercep = mysqli_fetch_array($sqlunidpercep)) {
                            $tipounidpre = $rowspercep['tipounid'];
                        }
                        if ($tipounidpre == '1') {
                            $perseselecb = 'selected';
                            $perseseleca = '';
                        } else {;
                            $perseseleca = 'selected';
                            $perseselecb = '';
                        }

                        ?>

                        <div id="muestroorden2"> </div>


                        <div id="muestroorden29"> </div>


                        <div>
                            <?= $topopausado ?>
                            <?= $cuadrespe ?><?
                                                if ($errcan == '1') {
                                                    echo '<h2 style="color:red;">!Se supero la cantidad que hay en stock!</h2>';
                                                }
                                                if ($id_orden != 'dsds') {
                                                    $id_ordenver = ' - Ven. Nº' . $id_orden;
                                                }
                                                ?>


                            <?php
                            $porcontro = controloPorsen($rjdhfbpqj, $id_orden);

                            if ($colestado == '5' ||  $tipo_usuario == '30') {
                                if ($retiradcv == "1") {
                                    $collisto = "6";
                                } else {
                                    $collisto = "7";
                                }

                                echo ' <div class="text-center" id="confrmar" style="width: 100%; text-aling:center;"><button type="button" class="btn btn-primary" onclick="ajax_cocontolr(' . $comilla . '' . $id_orden . '' . $comilla . ',' . $comilla . '' . $collisto . '' . $comilla . ')" tabindex="-1"> CONFIRMAR CONTROL</button></div><br><br>';
                            } ?>
                            <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                                <thead>
                                    <tr>
                                        <th style="text-align:left; padding-left: 10px;">Agregar Producto a <?= $id_clientever ?> <?= $id_ordenver ?></th>

                                        <th style="width: 130px;padding-left: 10px;">Unidad</th>
                                        <th style="width: 100px;padding-left: 10px;">Cantidad</th>
                                        <th style="width: 150px;padding-left: 10px;">Importe</th>
                                        <th style="width: 90px;padding-left: 10px;">Desc.&nbsp;(%)</th>
                                        <th style="width: 150px;padding-left: 10px;">Total&nbsp;Importe</th>
                                        <th style="width: 100px;text-align:center;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td style="padding-left: 2mm; ">
                                            <?php include('inpubuscado.php'); ?>
                                            <?= $alerpeo ?>
                                        </td>
                                        <td style="padding-left: 2mm; ">
                                            <select name="unidad" id="unidad" class="form-select" style="<?= $verinpur ?>" onchange="ajax_precios($('#cantidad').val(),$('#unidad').val());"

                                                onChange="ajax_precios($('#cantidad').val(),$('#unidad').val());">

                                                <option value="0"><?= $unidsx ?></option>
                                                <option value="1"><?= $modo_producto ?></option>


                                            </select>


                                        </td>
                                        <td style="text-align:center; ">
                                            <input type="number" name="cantidad" id="cantidad" class="form-control" value="0" min="1" max="<?= $stockdispom ?>"


                                                oninput="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onclick="select()"
                                                onChange="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onkeyup="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onmouseout="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onmouseover="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onblur="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onfocus="ajax_precios($('#cantidad').val(),$('#unidad').val());"
                                                onmousemove="ajax_precios($('#cantidad').val(),$('#unidad').val());"

                                                style="text-align:center; <?= $verinpur ?>">
                                            <input type="hidden" id="idproduc" value="<?= $idproduc ?>">
                                        </td>

                                        <td style="text-align:center; ">

                                            <input type="text" name="importever" id="importever" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                            <input type="hidden" name="improteun" id="improteun" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                        </td>
                                        <td style="text-align:center;">
                                            <input type="number" name="descuenun" id="descuenun" class="form-control" step="0.01" min="0" max="100"
                                                oninput="calculocosto($('#cantidad').val(),$('#descuenun').val(),$('#improteun').val())" onclick="select()"
                                                onkeyup="calculocosto($('#cantidad').val(),$('#descuenun').val(),$('#improteun').val())"
                                                style="text-align:center; <?= $verinpur ?>" onclick="select()"
                                                <?php if ($oferta == 1) {
                                                    /*    echo '
                                                value="' . $porsentajeOferta . '"'; */
                                                    echo '
                                                value="' . decuentoProducto($rjdhfbpqj, $idproduc, $desceunto) . '"';
                                                } else {
                                                    echo '
                                                value="' . decuentoProducto($rjdhfbpqj, $idproduc, $desceunto) . '"';
                                                }
                                                ?> <?= $nomostrausin30 ?>>

                                        </td>

                                        <td style="text-align:center; ">
                                            <input type="text" name="totalimpor" id="totalimpor" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                            <input type="hidden" name="importtot" id="importtot" value="0" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                        </td>

                                        <td class="text-center" style="place-items: center;text-align:center; ">
                                            <button type="button" id="suminstr" class="btn btn-success"
                                                onclick="ajax_ordenbajar($('#producto').val(),$('#idproduc').val(),$('#cantidad').val(),$('#unidad').val(),$('#descuenun').val(),$('#improteun').val(),$('#importtot').val());"

                                                style="width: 100%; <?= $verinpur ?>">Agregar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var input1 = document.getElementById('suminstr');

                                input1.addEventListener('keydown', function(event) {
                                    // Detectar si la tecla presionada es Tab (código de tecla 9)
                                    if (event.key === 'Tab' || event.keyCode === 9) {
                                        // Prevenir el comportamiento predeterminado (enfocar el siguiente elemento)
                                        event.preventDefault();
                                    }
                                });
                            });
                        </script>
                        <? if ($veritem == "1") { ?>
                            <!-- total venat -->
                            <table class="table">
                                <tr>
                                    <td>
                                        <div style="position:relative; top:100px;">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="observacion" id="observacion" rows="3" placeholder="Observación" tabindex="-1" oninput="actuanota();"><?= $observacion ?></textarea><br>
                                                </div>

                                            </div>





                                            <? if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "3" && !empty($id_clientecod)) { ?>
                                                <?php

                                                $formDePagSelc = formDePagSelc($rjdhfbpqj, $id_clienteint, $id_orden);

                                                echo '' . $formDePagSelc . '';

                                                ?>
                                                <br>
                                                <a href="../deuda_clientes/debe_haber?jhduskdsa=<?= $id_clientecod ?>" target="_blank" tabindex="-1">
                                                    <button type="button" class="btn btn-outline-primary" tabindex="-1">Resumen de Cuenta</button></a>



                                            <? } ?>

                                        </div>
                                    </td>
                                    <td style="text-align:right">
                                        <table style=" float: right;">
                                            <tr>

                                                <td colspan="3" style="text-align:right; width: 380px;">
                                                    Suma de Venta:&nbsp;
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="suresul" style="text-align:right;" value="<?= $totalite ?>" disabled>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right">
                                                    <div style="position:relative; left:40px; top:0px;">
                                                        Descuento:&nbsp;
                                                    </div>
                                                </td>

                                                <td style="text-align:right;  width: 50px;">
                                                    <div style="position:relative; left:40px; top:0px;">
                                                        <select name="desuni" id="desuni" class="form-control" tabindex="-1"
                                                            onChange="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val())" tabindex="-1" <?= $nomostrausin30 ?>>
                                                            <option value="0" <?= $sedeeund0 ?>>%</option>
                                                            <option value="1" <?= $sedeeund1 ?>>$</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="text-align:right; width: 100px;">
                                                    <div style="position:relative; left:40px; top:0px;">
                                                        <input type="text" id="desuniva" class="form-control" style="text-align:right; width: 55px;" value="<?= $desporsen ?>"
                                                            oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"
                                                            onclick="select()" <?= $nomostrausin30 ?>>
                                                    </div>
                                                </td>
                                                <td style="text-align:right;">
                                                    <input type="text" id="totaldes" class="form-control" style="text-align:right;" style="text-align:right; width: 100px;" value="<?= $descuento ?>" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: right;">
                                                    <div style="position:relative; left:128px; top:0px;">

                                                        <select id="unidpercep" name="unidpercep" class="form-select" tabindex="-1" onChange="ajax_unidpercep($('#unidpercep').val())" style="text-align:right;width: 170px;" <?= $nomostrausin30 ?>>
                                                            <option value="0" <?= $perseseleca ?>>Percepción %</option>
                                                            <option value="1" <?= $perseselecb ?>>Transferencia %</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td style="text-align: right;">
                                                    <div style="position:relative; left:20px; top:0px;">
                                                        <input type="text" id="valdvp" class="form-control" style="text-align:right; width: 75px" value="<?= $perporsen ?>"
                                                            oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"

                                                            onclick="select()" tabindex="-1" <?= $nomostrausin30 ?>>
                                                    </div>

                                                </td>
                                                <td colspan="3" style="text-align: right;">
                                                    <input type="text" id="totalpersep" class="form-control" style="text-align:right;" value="<?= $totalper ?>" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: right;">
                                                    <div style="position:relative; left:20px; top:0px;">
                                                        IVA %:&nbsp;
                                                    </div>
                                                </td>
                                                <td style="text-align: right;">
                                                    <div style="position:relative; left:25px; top:0px;">
                                                        <input type="text" id="valoiva" class="form-control" style="text-align:right; width: 70px" value="<?= $ivaporsen ?>"
                                                            oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"


                                                            onclick="select()" tabindex="-1" <?= $nomostrausin30 ?>>
                                                    </div>

                                                </td>
                                                <td colspan="3" style="text-align: right;">
                                                    <input type="text" id="totalivas" class="form-control" style="text-align:right;" value="<?= $totalivas ?>" disabled>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" style="text-align:right">
                                                    <strong>Total:</strong>&nbsp;
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="totalventa" style="padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?= $totalOrden ?>" disabled>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align:right;">
                                                    <div style="display: flex; justify-content: flex-end;">
                                                        <input type="text" id="adicional" class="form-control" style="text-align:right; width: 100px" value="<?= $adicional ?>" oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());" <?= $nomostrausin30 ?>>
                                                    </div>
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="adicionalvalor" style="padding-left:100px; text-align:right; width: 250px;" value="<?= $adicionalvalor ?>" oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());" <?= $nomostrausin30 ?>>

                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="3" style="text-align:right; width: 380px;">
                                                    Anterior:&nbsp;
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="anterior" style="text-align:right;" value="<?= $calculodeuda ?>" disabled>

                                                </td>
                                            </tr>

                                            <?php
                                            /* 
                                                $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint' and id_orden='$id_orden' and modo='1' ORDER BY `item_orden`.`id` ASC");
                                                while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                                    $iditefp = $rowpagdeufp["id"];
                                                    $idcodpfp = base64_encode($iditefp);
                                                    $deudavfp = $rowpagdeufp["valor"];
                                                    $pagoTotal += $rowpagdeufp["valor"];
                                                    //$deudavfp = number_format($deudavfp, 2, '.', '');
                                                    $tipopages = $rowpagdeufp['tipopag'];
                                                    if ($tipopages == '1') {
                                                        $tipopagver = "Efectivo $";
                                                    }
                                                    if ($tipopages == '2') {
                                                        $tipopagver = "Transferencia $";
                                                    }
                                                    if ($tipopages == '3') {
                                                        $tipopagver = "Deposito $";
                                                    }
                                                    if ($tipopages == '4') {
                                                        $tipopagver = "Cheque $";
                                                    }
                                                    if ($tipopages == '5') {
                                                        $tipopagver = "Mercado pago $";
                                                    }


                                                    $sumapag+=$deudavfp;

                                                    echo '<tr>
                                                                        <td  colspan="3" style="text-align:right;">
                                                                       
                                                                        <p  style="position:relative; left:40px; top:8px;">
                                                                        Pago ' . $tipopagver . ':';
                                                                        if($tipo_usuario=="0"){
                                                                        echo' &nbsp;&nbsp;&nbsp; <button type="button"   class="btn btn-danger btn-sm"  
                                                                        ondblclick="ajax_eliminapag(' . $comillas . '' . $rowpagdeufp['id'] . '' . $comillas .');                                                                        
                                                                        " tabindex="-1">X</button>';
                                                                        }
                                                                        echo'</p> </td>
                                                                        <td colspan="3" style="text-align:right;width: 110px;">
                                                                        
                                                                        <input type="text"  id="pago" class="form-control" style="text-align:right;"  value="'.$deudavfp.'" tabindex="-1" disabled></td>
                                                                        </tr>';
                                                }
                                                 */

                                            ?>

                                            <tr>
                                                <td colspan="3" style="text-align:right">
                                                    <strong>Saldo $:</strong>&nbsp;
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="saldo" style="background-color: yellow;font-size: 14pt;padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?= $saldo ?>" disabled>

                                                </td>
                                            </tr>



                                        </table>


                                        <div id="muestroorden7"></div>
                                    </td>
                                </tr>
                            </table>


                            <?
                            if ($tipo_usuario != 300) {

                                verfaltantes($rjdhfbpqj, $id_orden, $tipo_usuario);
                            }
                            ?>

                            <script>
                                function ajax_elfaltan(iditem, idproduc) {
                                    var parametros = {
                                        "iditem": iditem,
                                        "idproduc": idproduc,
                                        "idorden": '<?= $id_orden ?>',
                                        "idclicod": '<?= $id_clienteint ?>'
                                    };
                                    $.ajax({
                                        data: parametros,
                                        url: 'elifaltante.php',
                                        type: 'POST',
                                        beforeSend: function() {
                                            $("#muestroorden2").html('');
                                        },
                                        success: function(response) {
                                            $("#muestroorden2").html(response);
                                        }
                                    });
                                }
                            </script>

                            <div id="foo<?= $ubufocus ?>"></div>


                        </div>

                        <? if ($tipo_usuario == "023") { ?>
                            <table class="table table-bordered">
                                <tbody>

                                    <div class="form-group row col-md-10">
                                        <div class="card-body">
                                            <div id="muestroorden30"> </div>
                                            <label><b>Cargar Pago</b></label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                                                </div><input type="hidden" name="id_orden" id="id_orden" value="<?= $id_orden ?>" style="width: 50px;">

                                                &nbsp;


                                                <input type="date" id="fechapag" name="fechapag" class="form-control" value="<?= $fechahoy ?>">&nbsp;
                                                <select class="form-control" name="tipopag" id="tipopag" onchange="showInput()">
                                                    <option value="1">Efectivo</option>
                                                    <option value="2">Transferencia</option>
                                                    <option value="3">Deposito</option>
                                                    <option value="4">Cheque</option>
                                                    <option value="5">Mercado Pago</option>
                                                </select>

                                                &nbsp;
                                                <input type="text" class="form-control" name="ncheque" id="ncheque" placeholder="Nº Cheque" style="display: none;">
                                                &nbsp;
                                                <input type="date" class="form-control" name="vencheque" id="vencheque" style="display: none;">

                                                &nbsp;
                                                <input type="text" class="form-control" name="valor" id="valor" placeholder="0.00">

                                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clienteint ?>">

                                                &nbsp;<button onclick="ajax_agrgpago($('#valor').val(),$('#tipopag').val(),$('#fechapag').val(),$('#ncheque').val(),$('#vencheque').val())" class="btn btn-secondary" style="width: 100px;">Enviar</button>
                                            </div>


                                        </div>
                                </tbody>
                            </table> <? } ?>
                </div>


                <!-- fin --> <? } ?>
            <br><br><br><br><br>
            <br>
            <div id="muestroorden3"> </div>


            <br>
            <div class="container mt-3 text-center"> <? if ($veritem == "1") { ?>
                    <?
                                                            if ($tipo_usuario != 30) {
                                                                include('histfaltante.php');
                                                            }



                    ?>

                    <? if ($nombrvot == '2') { ?>

                        <a href="<?= $pedfnom ?>.php?jdhsknc=<?= base64_encode($id_orden) ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

                    <? }
                                                            if ($nombrvot == '1') { ?>
                        <button onclick="ajax_guardarorden($('#col').val());" type="button" class="btn btn-dark" tabindex="-1">Finalizar Venta</button>
                    <? } ?>
                    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <? } ?>
                <a href="../<?= $urlref ?>" tabindex="-1"><button type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



            </div>

            <script>
                <? if ($id_orden == "dsds" && empty($id_cliente)) { ?>
                    document.getElementById('unidad').focus();
                    document.getElementById('unidad').select();
                <?  } else { ?>



                    <? if (!empty($producto)) { ?>
                        document.getElementById('unidad').focus();
                        document.getElementById('unidad').select();

                        <? } else { ?>document.getElementById('producto').focus();
                <? }
                } ?>

                function detectarEnter(event) {
                    if (document.activeElement.id === "observacion") {
                        return;
                    }
                    if (event.key === 'Enter') {
                        ajax_ordenbajar($('#producto').val(), $('#idproduc').val(), $('#cantidad').val(), $('#unidad').val(), $('#descuenun').val(), $('#improteun').val(), $('#importtot').val());
                    }
                }

                function detectarEnterb(event) {
                    if (document.activeElement.id === "observacion") {
                        return;
                    }
                    if (event.key === 'Enter') {
                        document.getElementById('producto').focus();
                    }
                }
            </script>

            <?php

            //Agregar producto al Pedido

            ?>




            </div>


        </div>
        <br>




        <div id="muestroorden"> </div>







        <script>
            function ajax_ordenbajar(producto, idproduc, cantidad, unidad, descuenun, improteun, importtot) {
                var maximo = <?= $ventaminima ?>; // Venta mínima definida en PHP
                var unidad = unidad;

                if (unidad == 1) {
                    var cantidadd = cantidad * <?= $cantidbiene ?>;
                } else {

                    var cantidadd = cantidad;
                }

                if (<?= $id_clienteint ?>) { // Verifica si id_cliente tiene datos
                    var parametros = {
                        "producto": producto,
                        "idproduc": idproduc,
                        "cantidad": cantidad,
                        "unidad": unidad,
                        "descuenun": descuenun,
                        "improteun": improteun,
                        "importtot": importtot,
                        "id_cliente": '<?= $id_clienteint ?>',
                        "fechaordn": '<?= $fechaordn ?>',
                        "horaord": '<?= $horaord ?>',
                        "id_ordenedit": '<?= $id_orden ?>',
                        "id_marca": '<?= $id_marca ?>',
                        "id_categoria": '<?= $id_categoria ?>',
                        "presentacion": '<?= $cantidbiene ?>'
                    };

                    if (cantidadd >= maximo) {
                        $.ajax({
                            data: parametros,
                            url: 'insert_item.php',
                            type: 'POST',
                            beforeSend: function() {
                                $("#muestroorden").html('');
                            },
                            success: function(response) {
                                $("#muestroorden").html(response);
                            }
                        });
                    } else {
                        // Muestra confirmación con opción Aceptar/Cancelar
                        var confirmacion = confirm("La cantidad ingresada es menor a la venta minima de " + maximo + "  ¿Deseas continuar?");
                        if (confirmacion) {
                            $.ajax({
                                data: parametros,
                                url: 'insert_item.php',
                                type: 'POST',
                                beforeSend: function() {
                                    $("#muestroorden").html('');
                                },
                                success: function(response) {
                                    $("#muestroorden").html(response);
                                }
                            });
                            return true;
                        } else {
                            document.getElementById('cantidad').focus();
                            document.getElementById('cantidad').select();
                            return false;

                        }
                    }

                } else {
                    alert("INGRESE DATOS!");
                    document.getElementById('id_cliente').focus();
                }
            }
        </script>



        <script>
            function showInput() {
                var selectValue = document.getElementById("tipopag").value;
                var ncheque = document.getElementById("ncheque");
                var vencheque = document.getElementById("vencheque");

                if (selectValue === "4") {
                    ncheque.style.display = 'block';
                    vencheque.style.display = 'block';
                } else {
                    ncheque.style.display = 'none';
                    vencheque.style.display = 'none';
                }
            }
        </script>
        <script>
            function showInputPickin() {
                var selectValue = document.getElementById("col").value;
                var IdPickin = document.getElementById("IdPickin");
                var Idurg = document.getElementById("Idurg");

                if (selectValue === "2" || selectValue === "3") {
                    IdPickin.style.display = 'block';
                    Idurg.style.display = 'block';
                } else {
                    IdPickin.style.display = 'none';
                    Idurg.style.display = 'none';
                }
            }
        </script>



        <script>
            function ajax_elimina(iditem, idproduc) {
                var colestad = document.getElementById("col").value;
                if (colestad > 2) {
                    // Opciones como texto
                    var opciones = "Elegí un motivo:\n";
                    opciones += "1: No hay\n";
                    opciones += "2: Venc. Corto\n";
                    opciones += "3: Vencido\n";
                    opciones += "4: Mal estado\n";
                    opciones += "5: Equivocado\n";
                    opciones += "6: Bichos\n";
                    opciones += "8: Roto\n";
                    opciones += "9: No quiso el cliente\n";
                    opciones += "10: Ingrese Mal\n";
                    opciones += "11: Agregado no enviado\n";
                    opciones += "12: Olvido Chofer\n";

                    // Mostrar prompt
                    motivo = prompt(opciones, "");

                    if (motivo === null) {
                        return; // cancelado
                    }

                    // Validar que no sea 0 o vacío
                    if (motivo == "0" || motivo.trim() === "") {
                        alert("Debes elegir un motivo válido (distinto de 0).");
                        return; // no avanza
                    }
                } else {
                    var motivo = 0;
                }


                var parametros = {
                    "iditem": iditem,
                    "idproduc": idproduc,
                    "idorden": <?= $id_orden ?>,
                    "cantpro": <?= $canverificafin ?>,
                    "motivo": motivo,
                    "colestad": colestad
                };
                $.ajax({
                    data: parametros,
                    url: 'eliminar.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden2").html('');
                    },
                    success: function(response) {
                        $("#muestroorden2").html(response);
                    }
                });
            }
        </script>

        <? if ($tipo_usuario == "0") { ?>
            <script>
                function ajax_agrgpago(valor, tipopag, fechapag, ncheque, vencheque) {
                    var parametros = {
                        "pago_valor": valor,
                        "tipopag": tipopag,
                        "fechapag": fechapag,
                        "ncheque": ncheque,
                        "vencheque": vencheque,
                        "id_cliente": '<?= $id_clienteint ?>',
                        "id_orden": <?= $id_orden ?>
                    };
                    $.ajax({
                        data: parametros,
                        url: '../cuenta_clientes/insefdr_pag222',
                        type: 'POST',
                        beforeSend: function() {
                            $("#muestroorden29").html('');
                        },
                        success: function(response) {
                            $("#muestroorden29").html(response);
                        }
                    });
                }
            </script>
        <? } ?>
        <script>
            function ajax_guardarorden(col) {
                var parametros = {
                    "col": col,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'guardaor.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden3").html('');
                    },
                    success: function(response) {
                        $("#muestroorden3").html(response);
                    }
                });
            }


            function ajax_seguimiento(col) {
                var parametros = {
                    "col": col,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'guardaseg.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden4").html('');
                    },
                    success: function(response) {
                        $("#muestroorden4").html(response);
                    }
                });
            }


            function ajax_Picking(id_usuarioclav) {
                var parametros = {
                    "id_usuarioclav": id_usuarioclav,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'SetPicking.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden6").html('');
                    },
                    success: function(response) {
                        $("#muestroorden6").html(response);
                    }
                });
            }


            function ajax_retira(retira) {
                var parametros = {
                    "retira": retira,
                    "idcliente": '<?= $id_clienteint ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'guardasretira.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden5").html('');
                    },
                    success: function(response) {
                        $("#muestroorden5").html(response);
                    }
                });
            }


            function ajax_picitem(pickingy, idproduc, iditem) {
                var parametros = {
                    "pickingy": pickingy,
                    "idproduc": idproduc,
                    "iditem": iditem
                };
                $.ajax({
                    data: parametros,
                    url: 'pickitem.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden5").html('');
                    },
                    success: function(response) {
                        $("#muestroorden5").html(response);
                    }
                });
            }



            function ajax_forzar(forzar) {
                var parametros = {
                    "forzar": forzar,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'guardaforzar.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden55").html('');
                    },
                    success: function(response) {
                        $("#muestroorden55").html(response);
                    }
                });
            }
        </script>
        <script>
            function calculocosto(cantidad, descuenun, improteun) {
                <? if ($oferta == 1) { ?>
                    //descuento ofertaxs
                    var unidadeseleg = document.getElementById('unidad').value;
                    var cantmaxofer = <?= $cantmaxOferta ?>;
                    var unidadoferta = <?= $unidadOferta ?>;
                    var stockferta = <?= $stockOferta ?>;
                    var unidstock = <?= $unidstockOferta ?>;




                <? } ?>
                //valores 
                var cantidad = cantidad;
                var descuenun = descuenun;
                var improteun = improteun;
                /* precio total producto */
                if (descuenun === undefined || descuenun === null || descuenun === '' || descuenun === '0') {
                    costoxbuld = cantidad * improteun
                    document.getElementById('importtot').value = Math.round(costoxbuld);
                } else {
                    costoxbuldr = cantidad * improteun;
                    /* descuento al totalfinal */
                    costoxbuldd = costoxbuldr - (costoxbuldr * (descuenun / 100));
                    document.getElementById('importtot').value = Math.round(costoxbuldd);
                }

                function formatearNumero(num) {
                    return Number(num).toFixed(0).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                }

                // Asegúrate de definir improteun antes de usarlo
                let improteund = parseFloat(document.getElementById('improteun').value) || 0;
                let importtotun = parseFloat(document.getElementById('importtot').value) || 0;

                document.getElementById('importever').value = formatearNumero(improteund);
                document.getElementById('totalimpor').value = formatearNumero(importtotun);
            }
        </script>


        <script>
            function sumoventas(cantidad, descuenun, improteun) {
                //valores 
                var cantidad = cantidad;
                var descuenun = descuenun;
                var improteun = improteun;
                /* precio total producto */
                if (descuenun === undefined || descuenun === null || descuenun === '' || descuenun === '0') {
                    costoxbuld = cantidad * improteun
                    document.getElementById('importtot').value = Math.round(costoxbuld);
                } else {
                    costoxbuldr = cantidad * improteun;
                    /* descuento al totalfinal */
                    costoxbuldd = costoxbuldr - (costoxbuldr * (descuenun / 100));
                    document.getElementById('importtot').value = Math.round(costoxbuldd);
                }
            }
        </script>


        <script>
            // Función para validar y limitar el rango de un campo de entrada 
            function validarRango(input) {
                let valor = input.value;

                // Validar si el valor es un número válido entre 0 y 100
                if (valor !== '' && (isNaN(valor) || Number(valor) < 0 || Number(valor) > 100)) {
                    // Si el valor no es válido, restablecer el valor del input a un valor permitido
                    input.value = '';
                }
            }

            // Obtener referencias a los campos de entrada
            const input1 = document.getElementById('valoiva');
            /*  const input2 = document.getElementById('desuniva'); */

            // Agregar event listener al primer campo de entrada
            input1.addEventListener('input', function(event) {
                validarRango(input1);
            });

            // Agregar event listener al segundo campo de entrada
            /*    input2.addEventListener('input', function(event) {
                   validarRango(input2);
               }); */
        </script>

        <?php
        if ($sumapag < 0.1) {
            $sumapag = 0;
        }


        ?>
        <script>
            function caltotalven(valoiva, desuniva, desuni, valdvp) {
                // Valores
                var valoiva = parseFloat(valoiva) || 0; // Convertir a número
                var desuniva = parseFloat(desuniva) || 0; // Convertir a número
                var desuni = desuni;
                var adicional = document.getElementById('adicional').value;
                var adicionalvalor = parseFloat(document.getElementById('adicionalvalor').value) | 0;
                var anterior = parseFloat(<?= $calculodeuda ?>);
                var pago = '';
                /* presepciones resultado en: totalivasp */
                var valdvp = parseFloat(valdvp) || 0; // Convertir a número 

                var sumaventa = parseFloat(<?= $totalite ?>); // Convertir a número

                if (desuni === '0') {
                    // Calcular el descuento en porsentaje
                    if (desuniva !== '' && desuniva !== '0' && !isNaN(desuniva) && !isNaN(sumaventa)) {

                        var totalventaun = sumaventa * (desuniva / 100);
                        var totalventasd = sumaventa - (sumaventa * (desuniva / 100));

                        document.getElementById('totaldes').value = "-" + Math.round(totalventaun);
                        var sumaventa = Math.round(totalventasd);
                    }
                } else {
                    var totalventaun = desuniva;
                    var totalventasd = sumaventa - desuniva;

                    document.getElementById('totaldes').value = "-" + totalventaun;
                    var sumaventa = Math.round(totalventasd);


                }

                /* calculo persepciones */
                if (!isNaN(valdvp) && !isNaN(sumaventa)) {
                    var perpors = valdvp / 100;
                    var perporsd = perpors * sumaventa;

                    document.getElementById('totalpersep').value = Math.round(perporsd);
                }


                // Calcular el total de ventas con IVA
                if (!isNaN(valoiva) && !isNaN(sumaventa)) {
                    var ivapors = valoiva / 100;
                    var ivaporsd = ivapors * sumaventa;
                    var ivapovar = sumaventa + ivaporsd + perporsd;

                    document.getElementById('totalivas').value = Math.round(ivaporsd);
                    document.getElementById('totalventa').value = Math.round(ivapovar);
                }

                var total = Math.round(ivapovar);
                if (pago !== '') {
                    var saldofinal = total + anterior - pago;
                } else {
                    var saldofinal = total + anterior + adicionalvalor;
                }

                document.getElementById('saldo').value = Math.round(saldofinal);

                var parametros = {

                    "suresul": <?= $totalite ?>,
                    "desuni": desuni,
                    "desuniva": desuniva,
                    "totaldes": Math.round(totalventaun),
                    "perporsen": valdvp,
                    "totalper": Math.round(perporsd),
                    "valoiva": valoiva,
                    "adicional": adicional,
                    "adicionalvalor": adicionalvalor,
                    "totalivas": Math.round(ivaporsd),
                    "totalventa": Math.round(ivapovar),
                    "observacion": document.getElementById('observacion').value,
                    "anterior": anterior,
                    "pago": pago,
                    "saldo": saldofinal,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'actuaorden.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden7").html('');
                    },
                    success: function(response) {
                        $("#muestroorden7").html(response);
                    }
                });
            }
        </script>
        <script>
            function actuanota() {

                var parametros = {
                    "observacion": document.getElementById('observacion').value,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'actuanota.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden7").html('');
                    },
                    success: function(response) {
                        $("#muestroorden7").html(response);
                    }
                });
            }
        </script>
        <?php if ($tipo_usuario == 30 && $colestado > 2) { ?>
            <script>
                function guardarPickingMotivo(id_producto) {
                    var id_producto = id_producto;
                    var parametros = {
                        "id_producto": id_producto,
                        "id_resp_error": document.getElementById('id_resp_error' + id_producto).value,
                        "id_orden": '<?= $id_orden ?>',
                        "id_control": '<?= $id_respontotal ?>',
                        "id_cliente": '<?= $id_cliente ?>'
                    };
                    $.ajax({
                        data: parametros,
                        url: '../picking_error/picking_error_guardar.php',
                        type: 'POST'

                    });
                }
            </script>
        <?php } ?>
        <script>
            function ajax_precios(cantidad, unidad) {
                var maximo = <?= $stockdispom ?>;
                var unidades = unidad;
                var presenta = <?= $cantidbiene ?>;
                var ofertapr = <?= $oferta ?>;
                var cantmaxoferta = <?= $cantmaxOferta ?>;
                var unidadoferta = <?= $unidadOferta ?>;
                var finaloferstock = <?= $stockhistorial ?>;
                var multiploes = <?= $multiploes ?>;
                var limite = <?= $limite ?>;
                var forzadoprecio = <?= $forzadoprecio ?>;

                if (unidades == 1) {

                    var cantidad = cantidad * presenta;
                    var stockdidspom = maximo / presenta;
                    var stockdispom = Math.trunc(stockdidspom);


                } else {
                    cantidad = cantidad;

                    stockdispom = maximo;

                }
                if (maximo < 0) {

                    var maximo = 0;
                }
                //oferta poprcentaje xxx

                if (unidadoferta == 1) {
                    var cantmaxoferta = cantmaxoferta * presenta;
                } else {
                    cantmaxoferta = cantmaxoferta;

                }
                if (forzadoprecio == true) {
                    var cantidad = cantmaxoferta;
                }



                stockactual = maximo - cantidad;

                if (limite <= 0) {
                    stockactual = 9999999999999999;

                }

                if (ofertapr == 1 && cantidad <= cantmaxoferta && stockactual >= finaloferstock) {
                    if (multiploes === 0 || cantidad % multiploes === 0) {
                        document.getElementById('descuenun').value = <?= $porsentajeOferta ?>;
                    } else {
                        document.getElementById('descuenun').value = 0;
                    }
                } else {
                    document.getElementById('descuenun').value = 0;
                }

                if (cantidad <= maximo) {
                    var parametros = {
                        "cantidad": cantidad,
                        "unidad": unidad,
                        "idprodu": <?= $idproduc ?>,
                        "tipocliente": <?= $tipo_cliente ?>,
                        "oferta": <?= $oferta ?>
                    };
                    $.ajax({
                        data: parametros,
                        url: 'func_precios.php',
                        type: 'POST',

                        beforeSend: function() {
                            // Clear the value of the input element before sending the request
                            // $("#improteun").val('');   




                        },
                        success: function(response) {
                            // Set the response as the value of the input element
                            //$("#improteun").val(response);

                            document.getElementById('improteun').value = response;
                            if (cantidad == 1) {
                                document.getElementById('importtot').value = response;
                            }
                            calculocosto($('#cantidad').val(), $('#descuenun').val(), $('#improteun').val());

                        }

                    });
                } else {
                    alert("El stock maximo es de " + stockdispom + ".");
                    document.getElementById('cantidad').value = 0;

                    var parametrosd = {
                        "idorden": '<?= $id_orden ?>',
                        "idprodu": '<?= $idproduc ?>',
                        "tipocliente": '<?= $id_clienteint ?>'
                    };

                    $.ajax({
                        data: parametrosd,
                        url: 'ayacaltante.php',
                        type: 'POST',

                        beforeSend: function() {},
                        success: function(response) {
                            alert("Se ingreso en faltantes!");
                            location.reload();

                        }

                    });
                    return false;
                }

            }
        </script>


        <?php

        if (!empty($ventaminima)) {
        ?>
            <script>
                function ajax_ventaminim(cantidad, unidad) {

                    var maximo = <?= $ventaminima ?>; // Venta mínima definida en PHP
                    var unidad = unidad;

                    if (unidad == 1) {
                        var cantidad = cantidad * <?= $cantidbiene ?>;
                    } else {

                        var cantidad = cantidad;
                    }


                    if (cantidad >= maximo) {
                        // Si la cantidad es válida, puedes proceder

                    } else {
                        // Muestra confirmación con opción Aceptar/Cancelar
                        var confirmacion = confirm("La cantidad ingresada es menor a la venta minima de " + maximo + "  ¿Deseas continuar?");
                        if (confirmacion) {

                            return true;
                        } else {



                            return false;

                        }
                    }

                }
            </script>







        <? } ?>

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




        </scroll-container>
        <script>
            function ajax_unidpercep(unidpercep) {
                var idorden = '<?= $id_orden ?>';
                var parametros = {
                    "unidpercep": unidpercep,
                    "idorden": idorden
                };

                $.ajax({
                    data: parametros,
                    url: 'unidpercep.php',
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
        <script>
            function ajax_cantfaltan(unidadfal, cantidadfal, id_falta) {
                var parametros = {
                    "unidadfal": unidadfal,
                    "cantidadfal": cantidadfal,
                    "id_falta": id_falta,
                    "idorden": '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'actualizarfaltante.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden55").html('');
                    },
                    success: function(response) {
                        $("#muestroorden55").html(response);
                    }
                });
            }


            // Espera a que la página esté completamente cargada
            window.onload = function() {
                // Desplaza la página hasta el pie
                document.getElementById('footer').scrollIntoView();
            };
        </script>

        <!-- <script>
        document.getElementById('descuenun').addEventListener('input', function (e) {
            const value = e.target.value;
            const regex = /^\d+(\.\d{0,5})?$/;

            if (!regex.test(value)) {
                e.target.value = value.slice(0, -1);
               
            }
        });
    </script> -->
        <? if ($histofal != 1) { ?>


            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        if ($('#valoiva').length && $('#desuniva').length && $('#desuni').length && $('#valdvp').length) {
                            caltotalven($('#valoiva').val(), $('#desuniva').val(), $('#desuni').val(), $('#valdvp').val());
                            console.log("Valores recibidos en caltotalven:");
                        } else {
                            console.warn("Faltan elementos al cargar la página");
                        }
                    }, 300);
                });
            </script>
        <? } else { ?>



            <script>
                $(document).ready(function() {


                    console.log("Valores historial");

                });
            </script>

        <?
        } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        <style>
            /* Estilos del botón flotante */
            #btnGoToTop {
                position: fixed;
                bottom: 20px;
                /* Distancia desde la parte inferior */
                right: 20px;
                /* Distancia desde la derecha */
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: #025624;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 50%;
                display: none;
                /* El botón estará oculto inicialmente */
            }

            #btnGoToTop:hover {
                background-color: #025624;
            }
        </style>
        <style>
            #btnGoToTop {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: block;
                /* Siempre visible */
                z-index: 1000;
                font-size: 20px;
                padding: 10px;
                cursor: pointer;
            }
        </style>

        <button onclick="scrollToggle()" id="btnGoToTop" title="Ir Arriba o Abajo">⬆︎</button>
        <script>
            function ajax_formadepago(id_cliente, ef, tr, che, eche) { // <-- Parámetros corregidos
                var parametros = {
                    'id_cliente': '<?= $id_clienteint ?>',
                    'ef': ef,
                    'tr': tr,
                    'che': che,
                    'eche': eche,
                    'id_orden': '<?= $id_orden ?>'
                };
                $.ajax({
                    data: parametros,
                    url: '../lclientes/formadepagoNot.php',
                    type: 'POST',
                    beforeSend: function() {
                        $('#muestroorden55').html('');
                    },
                    success: function(response) {
                        $('#muestroorden55').html(ef);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en AJAX:", error);
                    }
                });
            }
        </script>
        <script>
            let isAtTop = true;

            window.onscroll = function() {
                const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

                // Determinar si estamos cerca del top (menos de 100px)
                isAtTop = scrollTop < 100;

                // Cambiar flecha del botón
                document.getElementById("btnGoToTop").innerText = isAtTop ? "⬇︎" : "⬆︎";
            };

            function scrollToggle() {
                if (isAtTop) {
                    // Ir hacia abajo
                    window.scrollTo({
                        top: document.body.scrollHeight,
                        behavior: 'smooth'
                    });
                } else {
                    // Ir hacia arriba
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            }
        </script>
        <script>
            function ajax_cocontolr(iditem, confirmado) {

                if (<?= $porcontro ?> != 100) {
                    alert("Falta Productos por Controlar!!");
                    return;
                }

                // Pedir confirmación digitando el iditem  $porcontro
                let ingreso = prompt("Para confirmar el Control, ingrese el número Pedido " + iditem);

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

    </body>

    </html>
<?php

    $resiltotal = ($totalite - $descuento) + $totalper + $totalivas;

    //echo 'rdet '.$id_ordends.'// '.$totalite.' - '. $descuento.' + '.$totalper.' + '. $totalivas.' = '.$resiltotal.'';



    if ($id_ordends > 10 && $totalite > 0) {

        /*     include('../f54du60ig65.php');
        $totdtem = 0;
        $sqlitemb = mysqli_query($rjdhfbpqj, "SELECT  total,id_orden FROM item_orden Where id_orden = '$id_orden'");
        while ($rowitemb = mysqli_fetch_array($sqlitemb)) {
            $totdtem += $rowitemb['total'];
        }

        $sqliord = mysqli_query($rjdhfbpqj, "SELECT id,subtotal FROM orden Where id='$id_orden'");
        if ($rowiord = mysqli_fetch_array($sqliord)) {
            $totalordb = $rowiord['subtotal'];
        }

        if ($totalordb == $totdtem) {
        } else {


            echo '
                <script>  
                   alert("Error 7376"); 
                   
                   
        </script> ';
        } */
        // echo 'x34//' . $totalordb . '--' . $totdtem . '// --' . $id_orden . '';

        /*         $sqlclds = "Update orden Set subtotal='$resiltotal' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlclds) or die(mysqli_error($rjdhfbpqj)); */
    } else {
    }

    if ($id_orden > 0) {
        verificoOrden($rjdhfbpqj, $id_orden);
    }
    mysqli_close($rjdhfbpqj);
} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
}

?>