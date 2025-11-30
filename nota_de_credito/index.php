<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "30"  || $tipo_usuario == "3") {
    include('../nota_de_pedido/funcion_saldoanterior.php');
    include('../control_stock/funcionStockSnot.php');
    include('../listadeprecio/func_fechalista.php');
    include('../nota_de_pedido/func_nombreunid.php');

    /* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
    $fechalista = fechalista($rjdhfbpqj);
    $id_clientecod = $_GET['jhduskdsa'];

    $errcan = $_GET['error'];
    $modif = $_GET['modif'];
    $ref = $_GET['ref'];

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

        $direccion = $rowclientes['address'];
        $localidad = $rowclientes['localidad'];
        $retiradcv = $rowclientes['retira'];
        $zonaid = $rowclientes['zona'];
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
    } else {
        $noverpro = "display:none;";
        $botedi = "agregar";
    }

    if ($id_orden == '' || $id_orden == 'dsds') {

        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where finalizada='0' and id_cliente='$id_clienteint'");
    } else {
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id='$id_orden'");
    }


    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_cliente = $rowordenx['id_cliente'];
        $id_usuarioclav = $rowordenx['id_usuarioclav'];

        $id_hoja = $rowordenx['id_hoja'];
        $fechahoja = $rowordenx['fechahoja'];
        $idcamioneta = $rowordenx['camioneta'];
        $observacion = $rowordenx['observacion'];
        $ordedecompra = $rowordenx['ordedecompra'];



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

        $ordedecompra = $_SESSION['ordedecompra'];
    }

    if (empty($producto)) {
        $producto = "";
    }



    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_orden = '$id_orden' and id_orden != ''");
    if ($rowordenre = mysqli_fetch_array($sqlordent)) {
        $veritem = "1";
        $notab = 'tabindex="-1"';
    } else {
        $veritem = "2";
        $blain = "disabled";
    }



    if ($_SESSION['tipo'] == "29") {
        $editd = "";
    } else {
        $editd = "?1=1";
    }
    if ($_SESSION['tipo'] == "30") {
        $editd = "";
    }

    $calculodeuda = 0;
    //$calculodeuda= calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden);
    $stockdispom = 0;
    /* veo el fraccionado info del producto */
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        //$cantidbiene=$rowpdaod['kilo'];
        $unidadnom = $rowpdaod['unidadnom'];
        $modo_producto = $rowpdaod['modo_producto'];
        $ventaminima = $rowpdaod['ventaminma'];
        if ($ventaminima > 0.1) {
            $ventaminima = $rowpdaod['ventaminma'];
        } else {
            $ventaminima = 9999999999999;
        }

        $fraccionado = $rowpdaod['fracionado'];
        $mensaje = $rowpdaod['mensaje'];
        $id_categoria = $rowpdaod['categoria'];
        $id_marca = $rowpdaod['id_marcas'];
        $stockdispom = 9999999999999999999;




        $sqludd = mysqli_query($rjdhfbpqj, "SELECT id,fecha FROM orden Where id='$ordedecompra'");
        if ($rowusuadd = mysqli_fetch_array($sqludd)) {
            $fechaorden = $rowusuadd["fecha"];
            $fechalista = $rowusuadd["fecha"];
        }



        /* saber como lo venden al producto en la lista de precio */

        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproduc' and fecha <='$fechalista' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $cantidbiene = $rowprecioprod['kilo'];
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




            $fracio = ' <div class="p-2 bg-dark">1 ' . $unidadnom . ' <br>Precio <b>$' . number_format($mpa, 0, ',', '.') . '</b></div>&nbsp;';


            if ($mub == "0" && $mkb > 0 && $mpb > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpb, 0, ',', '.') . ')</i><br>' . $mkb . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpb * $mkb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($muc == "0" && $mkc > 0 && $mpc > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpc, 0, ',', '.') . ')</i><br>' . $mkc . ' ' . $unidadnom . '  Precio <b>$' . number_format($mpc * $mkc, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mud == "0" && $mkd > 0 && $mpd > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpd, 0, ',', '.') . ')</i><br>' . $mkd . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpd * $mkd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mue == "0" && $mke > 0 && $mpe > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpe, 0, ',', '.') . ')</i><br>' . $mke . ' ' . $unidadnom . ' Precio <b>$' . number_format($mpe * $mke, 0, ',', '.') . '</b></div>&nbsp';
            }


            if ($mub == "1" && $mkb > 0 && $mpb > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpb, 0, ',', '.') . ')</i><br>' . $mkb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
        Precio <b>$' . number_format($mpb * $cantidbiene * $mkb, 0, ',', '.') . '</b></div>&nbsp;';
            }
            if ($muc == "1" && $mkc > 0 && $mpc > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpc, 0, ',', '.') . ')</i><br>' . $mkc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
        Precio <b>$' . number_format($mpc * $cantidbiene * $mkc, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mud == "1" && $mkd > 0 && $mpd > 0) {
                $fracio .= ' <div class="p-2 bg-dark"><i>(1 ' . $unidadnom . ' $' . number_format($mpd, 0, ',', '.') . ')</i><br>' . $mkd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
        Precio <b>$' . number_format($mpd * $cantidbiene * $mkd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($mue == "1" && $mke > 0 && $mpe > 0) {
                $fracio .= ' <div class="p-2 bg-dark">(<i>1 ' . $unidadnom . ' $' . number_format($mpe, 0, ',', '.') . ')</i><br>' . $mke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($mpe * $cantidbiene * $mke, 0, ',', '.') . '</b></div>&nbsp';
            }
            //distribuidor
            if ($eub == "0" && $ekb > 0 && $epb > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epb, 0, ',', '.') . ')</i><br>' . $ekb . ' ' . $unidadnom . ' Precio <b>$' . number_format($epb * $ekb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($euc == "0" && $ekc > 0 && $epc > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epc, 0, ',', '.') . ')</i><br>' . $ekc . ' ' . $unidadnom . '  Precio <b>$' . number_format($epc * $ekc, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eud == "0" && $ekd > 0 && $epd > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epd, 0, ',', '.') . ')</i><br>' . $ekd . ' ' . $unidadnom . ' Precio <b>$' . number_format($epd * $ekd, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eue == "0" && $eke > 0 && $epe > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epe, 0, ',', '.') . ')</i><br>' . $eke . ' ' . $unidadnom . ' Precio <b>$' . number_format($epe * $eke, 0, ',', '.') . '</b></div>&nbsp';
            }


            if ($eub == "1" && $ekb > 0 && $epb > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epb, 0, ',', '.') . ')</i><br>' . $ekb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
Precio <b>$' . number_format($epb * $cantidbiene * $ekb, 0, ',', '.') . '</b></div>&nbsp;';
            }

            if ($euc == "1" && $ekc > 0 && $epc > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epc, 0, ',', '.') . ')</i><br>' . $ekc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
Precio <b>$' . number_format($epc * $cantidbiene * $ekc, 0, ',', '.') . '</b></div>&nbsp';
            }

            if ($eud == "1" && $ekd > 0 && $epd > 0) {
                $fracio .= ' <div class="p-2 bg-danger"><i>(1 ' . $unidadnom . ' $' . number_format($epd, 0, ',', '.') . ')</i><br>' . $ekd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
Precio <b>$' . number_format($epd * $cantidbiene * $ekd, 0, ',', '.') . '</b></div>&nbsp';
            }
            if ($eue == "1" && $eke > 0 && $epe > 0) {
                $fracio .= ' <div class="p-2 bg-danger">(<i>1 ' . $unidadnom . ' $' . number_format($epe, 0, ',', '.') . ')</i><br>' . $eke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($epe * $cantidbiene * $eke, 0, ',', '.') . '</b></div>&nbsp';
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


        $ventamida = '<div class="p-2 bg-dark">Precio <b>' . date('d/m/Y', strtotime($listafechaP)) . '</b></div>';


        $cuadrespe = '<h6><span class="badge bg-secondary">Producto Id: ' . $idproduc . '</span> <span class="badge bg-secondary">Precio del ' . date('d/m/y', strtotime($listafechaP)) . '</span></h6>
<div class="d-flex  text-white">
' . $fracio . '

<div class="p-2 "></div>
<div class="p-2 bg-secondary text-center">Bulto en<br>' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . '</div>

1
' . $menobs . '
</div><br>

';
    }




    $sqldord = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$ordedecompra' and id_producto='$idproduc'");
    if ($rowudord = mysqli_fetch_array($sqldord)) {

        $cantidadcr = $rowudord['kilos'];
        $tipounidadcr = $rowudord['tipounidad'];
        // echo 'catinda: '.$cantidadcr.' - '.$idproduc.'';
    }

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Nota de Credito - Natural Frut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrapb.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>
    <script>
        /* $(document).ready(function() {
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 500);
    });
}); */
        $(document).ready(function() {
            // Llamada a la función ajax_buscar con parámetros iniciales
            caltotalven($('#valoiva').val(), $('#desuniva').val(), $('#desuni').val(), $('#valdvp').val());
        });
    </script>

    <body onload="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val())">
        <?php
        $sqlore = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_orden = '$id_orden' and modo='0'");
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



            .scrdesa {
                width: 100%;
                height: 100%;
                overflow-y: scroll;
                scroll-behavior: none;
            }
        </style>


        <div class="scrdesa">



            <div class="bg-danger text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: red; ">
                <p style=" font-size: 10pt; color: white;">Sistema de Nota de Credito Versión 1.0.1</p>
            </div>

            <div class="container-fluid">

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
                            <b>Nº NOTA DE CREDITO</b>
                            <input type="text" class="form-control" value="<?= $id_ordends ?>" disabled>
                        </div>
                        <div style="padding-bottom:15px; width: 350px;">
                            <b>Fecha</b>
                            <input type="text" class="form-control" value="<?= $fechahoyventa ?>" style="width: 350px;" disabled>
                            <input type="hidden" id="fechaordn" value="<?= $fechaordn ?>">
                            <input type="hidden" id="horaord" value="<?= $horaord ?>">
                        </div>
                        <b>Cliente</b>


                        <?php

                        include('inpubclien.php');


                        ?>
                    </div>
                    <div class="col-2" style="width: auto;  position: relative; float: left;">


                    </div>

                    <div class="col-4">

                        <div style="padding-bottom:15px; width: 350px;">

                            <b>ESTABA EL PRODUCTO REF.EN Nº</b>


                            <select name="ordedecompra" id="ordedecompra" class="form-control" style="width: 350px;" onChange="ajax_idorden();">
                                <option value="0" <?= $selep0 ?>>Seleccionar Orden...</option>
                                <?

                                $sqlusuord = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente='$id_clienteint' and col != '0' ORDER BY `orden`.`id` DESC limit 50");
                                while ($rowusuaord = mysqli_fetch_array($sqlusuord)) {

                                    echo ' 
                                            <option value="' . $rowusuaord["id"] . '"';
                                    if ($ordedecompra == $rowusuaord["id"]) {
                                        echo 'selected';
                                    }
                                    echo '>Orden Nº ' . $rowusuaord["id"] . '</option>';
                                }


                                ?>
                            </select>


                        </div>
                        <b>Estado</b>
                        <select name="col" id="col" class="form-control" style="width: 350px;" onchange="ajax_seguimiento($('#col').val());" tabindex="-1" disabled>

                            <option value="0" <?= $sele0 ?>>Ingresando...</option>
                            <option value="1" <?= $sele1 ?>>Guardado</option>

                        </select>



                        <div id="muestroorden55"></div>
                        <div style="width: 350px;padding-top:15px;">
                            <b>Localidad</b>
                            <input type="text" class="form-control" tabindex="-1" value="<?= $localidad ?>" disabled>
                        </div>
                    </div>
                    <div class="col-2" style="width: auto;  position: relative; float: left;">
                        <?php if ($id_hoja) {

                            echo '
            <a href="../hoja_de_ruta/ver_hoja_de_ruta?hdnsbloekdjgsd=' . base64_encode($fechahoja) . '&hdnskdjjgsd=' . base64_encode($idcamioneta) . '&hidjjhdho=' . $id_hoja . '" title="Ver hoja de ruta">
               <button type="button" class="btn btn-dark" style="position: absolute; bottom: 100px; left: 0px;" tabindex="-1">Hoja/R</button></a>
            ';
                        }
                        ?>


                        <a href="../notasdecredito" tabindex="-1">
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
                                    <tr>
                                        <th style="text-align:left; padding-left: 10px;">Producto Ingresados(<?= $canverificafin ?>)</th>

                                        <th style="width: 100px;text-align:center;">Vencimiento</th>
                                        <th style="width: 100px;text-align:center;">Motivo</th>
                                        <th style="width: 100px;text-align:center;">Resolución</th>
                                        <th style="width: 100px;text-align:center;;">Cantidad</th>
                                        <th style="width: 110px;text-align:center;">Unidad</th>
                                        <th style="width: 150px;text-align:center;">Importe</th>
                                        <th style="width: 90px;text-align:center;">Desc.&nbsp;(%)</th>
                                        <th style="width: 150px;text-align:center;">Total&nbsp;Importe</th>
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
                                            if ($ventfima < 0.1) {
                                                $ventfima = "9999999999999";
                                            } else {
                                                $ventfima = $rowpdaod['ventaminma'];
                                            }
                                        }
                                        return $ventfima;
                                    }

                                    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");
                                    while ($roworden = mysqli_fetch_array($sqlorden)) {
                                        $iditeorfd = $roworden['id'];
                                        $id_producto = $roworden['id_producto'];

                                        /*  */
                                        $ventfima = ventmininfo($rjdhfbpqj, $id_producto);
                                        $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
                                        $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
                                        $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);
                                        $tipounidad = $roworden['tipounidad'];
                                        $totalite += $roworden['total'];
                                        $fechaitem = $roworden['fecha'];
                                        $fechaold = $roworden['fechaold'];
                                        $presentacion = $roworden['presentacion'];
                                        $agregado = $roworden['agregado'];
                                        $motivos = $roworden['motivo'];
                                        $destinos = $roworden['destino'];
                                        if ($agregado == '1') {
                                            $agreccs = '<i style="font-size: 10pt; color:red">' . $agregado = $roworden['hora'] . '</i>';
                                        } else {
                                            $agreccs = '';
                                        }

                                        if ($tipounidad == '0') {
                                            $seled0 = "selected";
                                        } else {
                                            $seled0 = "";
                                        }
                                        if ($tipounidad == '1') {
                                            $seled1 = "selected";
                                            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
                                        } else {
                                            $seled1 = "";
                                            $comoviene = "";
                                        }

                                        //motivo
                                        if ($motivos == '0') {
                                            $motselc0 = "selected";
                                        } else {
                                            $motselc0 = "";
                                        }
                                        if ($motivos == '1') {
                                            $motselc1 = "selected";
                                        } else {
                                            $motselc1 = "";
                                        }
                                        if ($motivos == '2') {
                                            $motselc2 = "selected";
                                        }
                                        if ($motivos == '3') {
                                            $motselc3 = "selected";
                                        } else {
                                            $motselc3 = "";
                                        }
                                        if ($motivos == '4') {
                                            $motselc4 = "selected";
                                        } else {
                                            $motselc4 = "";
                                        }
                                        if ($motivos == '5') {
                                            $motselc5 = "selected";
                                        } else {
                                            $motselc5 = "";
                                        }
                                        if ($motivos == '6') {
                                            $motselc6 = "selected";
                                        } else {
                                            $motselc6 = "";
                                        }
                                        if ($motivos == '7') {
                                            $motselc7 = "selected";
                                        } else {
                                            $motselc7 = "";
                                        }

                                        //destino
                                        if ($destinos == '0') {
                                            $destelc0 = "selected";
                                        } else {
                                            $destelc0 = "";
                                        }
                                        if ($destinos == '1') {
                                            $destelc1 = "selected";
                                        } else {
                                            $destelc1 = "";
                                        }
                                        if ($destinos == '2') {
                                            $destelc2 = "selected";
                                        } else {
                                            $destelc2 = "";
                                        }
                                        if ($destinos == '3') {
                                            $destelc3 = "selected";
                                        } else {
                                            $destelc3 = "";
                                        }
                                        if ($destinos == '4') {
                                            $destelc4 = "selected";
                                        } else {
                                            $destelc4 = "";
                                        }
                                        if ($destinos == '5') {
                                            $destelc5 = "selected";
                                        } else {
                                            $destelc5 = "";
                                        }


                                        if ($idproduc == $id_producto) {
                                            $fondotd = "background-color: #FF9B9B;";
                                            $alerpeo = '
                            <div class="alert alert-danger">
                                <strong>El producto ya fue agregado!!</strong>
                                </div>';
                                        } else {
                                            $fondotd = "";
                                            $alerpeo = "";
                                        }

                                        $stockdispomcar = SumaStock($rjdhfbpqj, $id_producto) + $roworden['kilos'];
                                        echo '
                        
                        <tr>
                        <td  style="padding-left: 2mm; ' . $fondotd . ';"> 
                        <input type="text" class="form-control" value="' . $roworden['nombre'] . ' ' . $comoviene . '"  disabled>' . $agreccs . ' 
                        </td>

                    <td  style="text-align:center;' . $fondotd . '">                  
                     <input type="date" id="fechaold' . $roworden['id'] . '" value="' . $roworden['fechaold'] . '"  class="form-control" >                    
                    </td>
                                          <td style="padding-left: 2mm;' . $fondotd . '">
                      <select  id="motivo' . $roworden['id'] . '" class="form-select" tabindex="-1" >
                        <option value="0"  ' . $motselc0 . '>Elegir...</option>
                                                <option value="1" ' . $motselc1 . '>Vencido</option>
                                                <option value="2"  ' . $motselc2 . '>Venc.Corto</option>
                                                <option value="3"  ' . $motselc3 . '>Roto</option>
                                                <option value="4"  ' . $motselc4 . '>Mal estado</option>
                                                <option value="5"  ' . $motselc5 . '>Equivocado</option>
                                                <option value="6"  ' . $motselc6 . '>Bichos</option>
                                                <option value="7"  ' . $motselc7 . '>Rechazado</option>
                     </select>
                 </td>
                   

    </td>
                      <td style="padding-left: 2mm;' . $fondotd . '">
                      <select  id="destino' . $roworden['id'] . '" class="form-select" tabindex="-1" >
                                      <option value="0" ' . $destelc0 . '>Esperando...</option>
                                                <option value="1" ' . $destelc1 . '>Vuelve Stock</option>
                                                <option value="2" ' . $destelc2 . '>Limpieza</option>
                                                <option value="3" ' . $destelc3 . '>Reembasado</option>
                                                <option value="4" ' . $destelc4 . '>Proveedor</option>
                                                <option value="5" ' . $destelc5 . '>Descarte</option>
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
                        
                        onclick="select()"  style="text-align:center;" >
             
                     </td>
                      <td style="padding-left: 2mm;' . $fondotd . '">
                      <select disabled  id="unidad' . $roworden['id'] . '" class="form-select" tabindex="-1"
                      
                      onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val()); ajax_ventaminim' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                        caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"  >
                          <option value="0" ' . $seled0 . '>' . $nombreunid . '</option>
                         <option value="1" ' . $seled1 . '>' . $nombrebult . '</option>
                     </select>
                 </td>
                   
                 </td>
                    <td  style="text-align:center;' . $fondotd . '">
                    <input type="text"  id="improteun' . $roworden['id'] . '" value="' . $roworden['precio'] . '" class="form-control" style="text-align:right;"  disabled></td>

                      <td  style="text-align:center; ' . $fondotd . '"> 
                    <input type="number"  id="descuenun' . $roworden['id'] . '" value="' . $roworden['descuenun'] . '" style="text-align:center;" class="form-control" min="0" max="100"  onkeyup="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                       onclick="select();" 

               
                      onChange="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                   caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 
                    
                    onKeyDown="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())"   

                    onKeyPress="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 
                  
                  
                     onmouseout="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 

                      onblur="ajax_precios' . $roworden['id'] . '($(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val());
                  caltotalven($(' . $comillas . '#valoiva' . $comillas . ').val(),$(' . $comillas . '#desuniva' . $comillas . ').val(),$(' . $comillas . '#desuni' . $comillas . ').val(),$(' . $comillas . '#valdvp' . $comillas . ').val())" 
                    
                    onclick="select()">


                      <td  style="text-align:center;' . $fondotd . '">
                      <input type="text" id="importtot' . $roworden['id'] . '" value="' . $roworden['total'] . '" class="form-control"  style="text-align:right;"  disabled>
                      </td>
                 
                       <td class="text-center" style="place-items: center;text-align:center;' . $fondotd . '">   
                       <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '">    
                       
                       
                                <button type="button"  class="btn btn-success" 
                    onclick="ajax_actuait' . $roworden['id'] . '(
                          $(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#descuenun' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#improteun' . $roworden['id'] . '' . $comillas . ').val()); 
                          caltotalven(
                          $(' . $comillas . '#valoiva' . $comillas . ').val(),
                          $(' . $comillas . '#desuniva' . $comillas . ').val(),
                          $(' . $comillas . '#desuni' . $comillas . ').val(),
                          $(' . $comillas . '#valdvp' . $comillas . ').val())"

                    style="width: 100%;">Mod</button></td><td style="text-align:center;">



                       <button type="button" class="btn btn-danger btn-sm"  ondblclick="ajax_elimina($(' . $comillas . '#iditem' . $roworden['id'] . '' . $comillas . ').val(),' . $comillas . '' . $id_producto . '' . $comillas . ');
                       $(' . $comillas . '#producto' . $comillas . ').val(' . $comillas . '' . $comillas . ');
                       
                       " tabindex="-1">X</button>
                       
                    <script>

    function ajax_ventaminim' . $roworden['id'] . '(cantidad' . $roworden['id'] . ', unidad' . $roworden['id'] . ') {
        
      
</script>
                             <script>
     
 function ajax_precios' . $roworden['id'] . '(cantidad' . $roworden['id'] . ',unidad' . $roworden['id'] . ') {

 var unidades' . $roworden['id'] . ' = unidad' . $roworden['id'] . ';
            var presenta' . $roworden['id'] . ' = ' . $presentacion . ';
            if(unidades' . $roworden['id'] . '==1){

                var cantidad' . $roworden['id'] . '=cantidad' . $roworden['id'] . '*presenta' . $roworden['id'] . ';
                

            }else{cantidad' . $roworden['id'] . '=cantidad' . $roworden['id'] . ';

            }

        var parametros = {
            "cantidad": cantidad' . $roworden['id'] . ',
            "unidad": unidad' . $roworden['id'] . ',
            "idprodu": ' . $comillas . '' . $id_producto . '' . $comillas . ',
            "tipocliente": ' . $comillas . '' . $tipo_cliente . '' . $comillas . ',
             "fechaorden": ' . $comillas . '' . $fechaorden . '' . $comillas . ',
             "ordedecompra": ' . $comillas . '' . $ordedecompra . '' . $comillas . '
             
        };
        $.ajax({
            data: parametros,';

                                        //
                                        if ($ordedecompra == "0") {
                                            echo '
                url: ' . $comillas . 'func_precios.php' . $comillas . ',';
                                        } else {
                                            echo ' url: ' . $comillas . 'func_preciosCr.php' . $comillas . ',';
                                        }


                                        //
                                        echo '
            
            
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
                            "total":  document.getElementById(' . $comillas . 'importtot' . $roworden['id'] . '' . $comillas . ').value,
                            "motivo":  document.getElementById(' . $comillas . 'motivo' . $roworden['id'] . '' . $comillas . ').value,
                            "destino":  document.getElementById(' . $comillas . 'destino' . $roworden['id'] . '' . $comillas . ').value,
                            "fechaold":  document.getElementById(' . $comillas . 'fechaold' . $roworden['id'] . '' . $comillas . ').value,
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
                                    /*      $sqlordento = mysqli_query($rjdhfbpqj, "SELECT * FROM item_credito Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");
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

                        <div id="muestroorden2"> </div>


                        <div id="muestroorden29"> </div>


                        <div><?= $cuadrespe ?><?
                                                if ($errcan == '1') {
                                                    echo '<h2 style="color:red;">!Se supero la cantidad que hay en stock!</h2>';
                                                }

                                                ?>
                            <br>
                            <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                                <thead>
                                    <tr>
                                        <th style="text-align:left; padding-left: 10px;">Agregar Producto</th>
                                        <th style="width: 150px;text-align:center;">Vencimiento</th>
                                        <th style="width: 150px;text-align:center;">Motivo</th>
                                        <th style="width: 150px;text-align:center;">Resolución</th>

                                        <th style="width: 100px;padding-left: 10px;">Cantidad</th>
                                        <th style="width: 130px;padding-left: 10px;">Unidad</th>
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
                                        </td>

                                        <td>
                                            <input type="date" name="fechaold" id="fechaold" class="form-control" style="text-align:center; <?= $verinpur ?>">


                                        </td>

                                        <td>
                                            <select name="motivo" id="motivo" class="form-select" style="text-align:center; <?= $verinpur ?>">
                                                <option value="0">Elegir...</option>
                                                <option value="1">Vencido</option>
                                                <option value="2">Venc.Corto</option>
                                                <option value="3">Roto</option>
                                                <option value="4">Mal estado</option>
                                                <option value="5">Equivocado</option>
                                                <option value="6">Bichos</option>
                                                <option value="7">Rechazado</option>
                                            </select>


                                        </td>



                                        <td style="text-align:center; ">
                                            <select name="destino" id="destino" class="form-select" style="text-align:center; <?= $verinpur ?>">
                                                <option value="0">Esperando...</option>
                                                <option value="1">Vuelve Stock</option>
                                                <option value="2">Limpieza</option>
                                                <option value="3">Reembasado</option>
                                                <option value="4">Proveedor</option>
                                                <option value="5">Descarte</option>
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
                                        <td style="padding-left: 2mm; ">
                                            <select name="unidad" id="unidad" class="form-select" style="<?= $verinpur ?>" onchange="ajax_precios($('#cantidad').val(),$('#unidad').val());"

                                                onChange="ajax_precios($('#cantidad').val(),$('#unidad').val());">

                                                <option value="0"><?= $unidsx ?></option>
                                                <option value="1"><?= $modo_producto ?></option>


                                            </select>

                                        </td>

                                        </td>
                                        <td style="text-align:center; ">

                                            <input type="text" name="importever" id="importever" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>


                                            <input type="hidden" name="improteun" id="improteun" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                        </td>
                                        <td style="text-align:center;">
                                            <input type="number" name="descuenun" id="descuenun" class="form-control" min="0" max="100"
                                                oninput="calculocosto($('#cantidad').val(),$('#descuenun').val(),$('#improteun').val())" onclick="select()"
                                                onkeyup="calculocosto($('#cantidad').val(),$('#descuenun').val(),$('#improteun').val())"
                                                style="text-align:center; <?= $verinpur ?>" onclick="select()">
                                        </td>


                                        <td style="text-align:center; ">
                                            <input type="text" name="totalimpor" id="totalimpor" value="" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>

                                            <input type="hidden" name="importtot" id="importtot" value="0" class="form-control" style="text-align:right; <?= $verinpur ?>" disabled>
                                        </td>

                                        <td class="text-center" style="place-items: center;text-align:center; ">
                                            <button type="button" id="suminstr" class="btn btn-success"
                                                onclick="ajax_ordenbajar($('#producto').val(),$('#idproduc').val(),$('#cantidad').val(),$('#unidad').val(),$('#descuenun').val(),$('#improteun').val(),$('#importtot').val())"

                                                style="width: 100%; <?= $verinpur ?>">Agregar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><?= $alerpeo ?>
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
                                                    <textarea class="form-control" name="observacion" id="observacion" rows="3" placeholder="Observación" tabindex="-1" oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"><?= $observacion ?></textarea><br>
                                                </div>
                                            </div>
                                            <a href="../deuda_clientes/debe_haber?jhduskdsa=<?= $id_clientecod ?>" target="_blank" tabindex="-1">
                                                <button type="button" class="btn btn-outline-primary" tabindex="-1">Resumen de Cuenta</button></a>

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
                                                            onChange="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val())" tabindex="-1">
                                                            <option value="0" <?= $sedeeund0 ?>>%</option>
                                                            <option value="1" <?= $sedeeund1 ?>>$</option>
                                                        </select>
                                                    </div>
                                                </td>

                                                <td style="text-align:right; width: 100px;">
                                                    <div style="position:relative; left:40px; top:0px;">
                                                        <input type="text" id="desuniva" class="form-control" style="text-align:right; width: 55px;" value="<?= $desporsen ?>"
                                                            oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"
                                                            onclick="select()">
                                                    </div>
                                                </td>
                                                <td style="text-align:right;">
                                                    <input type="text" id="totaldes" class="form-control" style="text-align:right;" style="text-align:right; width: 100px;" value="<?= $descuento ?>" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: right;">
                                                    <div style="position:relative; left:20px; top:0px;">
                                                        Percepción. %:&nbsp;
                                                    </div>
                                                </td>
                                                <td style="text-align: right;">
                                                    <div style="position:relative; left:20px; top:0px;">
                                                        <input type="text" id="valdvp" class="form-control" style="text-align:right; width: 75px" value="<?= $perporsen ?>"
                                                            oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());"

                                                            onclick="select()" tabindex="-1">
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


                                                            onclick="select()" tabindex="-1">
                                                    </div>

                                                </td>
                                                <td colspan="3" style="text-align: right;">
                                                    <input type="text" id="totalivas" class="form-control" style="text-align:right;" value="<?= $totalivas ?>" disabled>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" style="text-align:right;  display:none;">

                                                </td>
                                                <td style="text-align:right;  display:none;">
                                                    <input type="text" class="form-control" id="totalventa" style="padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?= $totalOrden ?>" disabled>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align:right;">
                                                    <div style="display: flex; justify-content: flex-end;">
                                                        <input type="text" id="adicional" class="form-control" style="text-align:right; width: 100px" value="<?= $adicional ?>" oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());">
                                                    </div>
                                                </td>
                                                <td style="text-align:right">
                                                    <input type="text" class="form-control" id="adicionalvalor" style="padding-left:100px; text-align:right; width: 250px;" value="<?= $adicionalvalor ?>" oninput="caltotalven($('#valoiva').val(),$('#desuniva').val(),$('#desuni').val(),$('#valdvp').val());">

                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="3" style="text-align:right; width: 380px; display:none;">
                                                    Anterior:&nbsp;
                                                </td>
                                                <td style="text-align:right; display:none;">
                                                    <input type="text" class="form-control" id="anterior" style="text-align:right;" value="0" disabled>

                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan="3" style="text-align:right">
                                                    <strong>Total $:</strong>&nbsp;
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



                            <div id="foo<?= $ubufocus ?>"></div>

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
                                </table>

                            <? } ?>
                        </div>


                        <!-- fin --> <? } ?>
                    <br><br><br><br><br>
                    <br>
                    <div id="muestroorden3"> </div>


                    <br>
                    <div class="container mt-3 text-center"> <? if ($veritem == "1") { ?>

                            <? if ($nombrvot == '2') { ?>

                                <a href="nota_de_credito_pdf.php?jdhsknc=<?= base64_encode($id_orden) ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

                            <? }
                                                                    if ($nombrvot == '1') { ?>
                                <button onclick="ajax_guardarorden($('#col').val());" type="button" class="btn btn-dark" tabindex="-1">Finalizar Nota de Credito</button>
                            <? } ?>
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <? } ?>
                        <a href="../notasdecredito" tabindex="-1"><button type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



                    </div>

                    <script>
                        <? if ($id_orden == "dsds" && empty($id_cliente)) { ?>
                            document.getElementById('fechaold').focus();
                            document.getElementById('fechaold').select();
                        <?  } else { ?>



                            <? if (!empty($producto)) { ?>
                                document.getElementById('fechaold').focus();
                                document.getElementById('fechaold').select();

                                <? } else { ?>document.getElementById('producto').focus();
                        <? }
                        } ?>

                        function detectarEnter(event) {
                            if (event.key === 'Enter') {
                                ajax_ordenbajar($('#producto').val(), $('#idproduc').val(), $('#cantidad').val(), $('#unidad').val(), $('#descuenun').val(), $('#improteun').val(), $('#importtot').val());
                            }
                        }

                        function detectarEnterb(event) {
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
                            "presentacion": '<?= $cantidbiene ?>',
                            "ordedecompra": document.getElementById('ordedecompra').value,
                            "motivo": document.getElementById('motivo').value,
                            "destino": document.getElementById('destino').value,
                            "fechaold": document.getElementById('fechaold').value
                        };
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
                function ajax_elimina(iditem, idproduc) {
                    var parametros = {
                        "iditem": iditem,
                        "idproduc": idproduc,
                        "idorden": <?= $id_orden ?>,
                        "cantpro": <?= $canverificafin ?>
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
                <? if ($tipo_usuario == "0") { ?>

                    function ajax_eliminapag(iditempag) {
                        var parametros = {
                            "iditem": iditempag,
                            "idorden": <?= $id_orden ?>,
                            "id_cliente": '<?= $id_clienteint ?>'
                        };
                        $.ajax({
                            data: parametros,
                            url: 'xxeliminarpag.php',
                            type: 'POST',
                            beforeSend: function() {
                                $("#muestroorden30").html('');
                            },
                            success: function(response) {
                                $("#muestroorden30").html(response);
                            }
                        });
                    }
                <? } ?>
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
                            url: '../cuenta_clientes/xxxinser_pag2',
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
                        "idorden": '<?= $id_orden ?>',
                        "id_cliente": '<?= $id_cliente ?>',
                        "total": '<?= $saldo ?>'
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





                function ajax_idorden() {
                    var parametros = {
                        "ordedecompra": document.getElementById('ordedecompra').value,
                        "idorden": '<?= $id_orden ?>'
                    };
                    $.ajax({
                        data: parametros,
                        url: 'copronumero.php',
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
                    var valoiva = parseFloat(valoiva); // Convertir a número
                    var desuniva = parseFloat(desuniva); // Convertir a número
                    var desuni = desuni;
                    var adicional = document.getElementById('adicional').value;
                    var adicionalvalor = parseFloat(document.getElementById('adicionalvalor').value) | 0;
                    var anterior = parseFloat(<?= $calculodeuda ?>);
                    var pago = '';
                    /* presepciones resultado en: totalivasp */
                    var valdvp = parseFloat(valdvp); // Convertir a número 

                    var sumaventa = parseFloat(document.getElementById('suresul').value); // Convertir a número

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

                        "suresul": document.getElementById('suresul').value,
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
                function ajax_precios(cantidad, unidad) {
                    var unidades = unidad;
                    var presenta = <?= $cantidbiene ?>;

                    if (unidades == 1) {

                        var cantidad = cantidad * presenta;


                    } else {
                        cantidad = cantidad;

                    }

                    var parametros = {
                        "cantidad": cantidad,
                        "unidad": unidad,
                        "idprodu": '<?= $idproduc ?>',
                        "tipocliente": '<?= $tipo_cliente ?>',
                        "fechaorden": '<?= $fechaorden ?>',
                        "cantidadcr": '<?= $cantidadcr ?>',
                        "tipounidadcr": '<?= $tipounidadcr ?>',
                        "ordedecompra": '<?= $ordedecompra ?>'
                    };
                    $.ajax({
                        data: parametros,
                        <? if ($ordedecompra == "0") { ?>
                            url: 'func_precios.php',
                        <? } else { ?>
                            url: 'func_preciosCr.php',
                        <? } ?>
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


                }
            </script>


            <?php

            if (!empty($ventaminima)) {
            ?>
                <script>
                    function ajax_ventaminim(cantidad, unidad) {

                        var maximo = <?= $ventaminima ?>; // Venta mínima definida en PHP
                        var unidad = unidad;

                        if (unidad == '0') {

                            if (cantidad >= maximo) {
                                // Si la cantidad es válida, puedes proceder

                            } else {
                                // Muestra confirmación con opción Aceptar/Cancelar
                                var confirmacion = confirm("La cantidad ingresada el menor a la venta minima de " + maximo + ".<?= $nombreunid ?> ¿Deseas continuar?");

                                if (confirmacion) {
                                    // El usuario acepta continuar
                                    return true;
                                } else {
                                    // El usuario cancela, se reinicia el campo con el stock disponible
                                    document.getElementById('cantidad').value = maximo;
                                    return false; // Detener la ejecución
                                }
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
                // Espera a que la página esté completamente cargada
                window.onload = function() {
                    // Desplaza la página hasta el pie
                    document.getElementById('footer').scrollIntoView();
                };
            </script>

    </body>

    </html>
<?php


} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
}

?>