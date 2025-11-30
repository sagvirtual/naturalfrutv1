<?php



include('../f54du60ig65.php');
include('../lusuarios/login.php');

$admdmin = $_GET['admdmin'];

if ($tipo_usuario == "0" || $tipo_usuario == "1" || $tipo_usuario == "30"  || $tipo_usuario == "3"  || $tipo_usuario == "33") {
    //include('../nota_de_pedido/funcion_saldoanterior.php');
    include('../control_stock/funcionStockS.php');
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
        $localidad = $rowclientes["nom_empr"];

        if ($retiradcv == '1') {
            $verprreir = "checked";
        }

        $id_clientever = $id_clienteve;



        $botedi = "editar";
        $idcliedit = base64_encode($id_clienteint);
        $id_ordencod = base64_encode($id_orden);
    } else {
        $noverpro = "display:none;";
        $botedi = "agregar";
    }

    if ($id_orden == '' || $id_orden == 'dsds') {

        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where finalizada='0' and id_cliente='$id_clienteint' and fecha_accion!='0000-00-00 00:00:00'");
    } else {
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM devoluciones Where id='$id_orden'");
    }


    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_cliente = $rowordenx['id_cliente'];
        $id_usuarioclav = $rowordenx['id_usuarioclav'];

        $id_hoja = $rowordenx['id_hoja'];
        $fechahoja = $rowordenx['fechahoja'];
        $idcamioneta = $rowordenx['camioneta'];
        $observacion = $rowordenx['observacion'];
        $ordedecompra = $rowordenx['ordedecompra'];
        $idordendevd = $rowordenx['id_orden'];
        $finorden = $rowordenx['finalizada'];

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



    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM item_devolu Where id_orden = '$id_orden' and id_orden != ''");
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
        $cantidbiene = $rowpdaod['kilo'];
        $unidadnom = $rowpdaod['unidadnom'];
        $modo_producto = $rowpdaod['modo_producto'];
        $ventaminima = $rowpdaod['ventaminma'];
        $id_proveedor = $rowpdaod['id_proveedor'];
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
    }



?>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Devoluciones - Natural Frut</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrapb.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>

    <body>
        <?php
        $sqlore = mysqli_query($rjdhfbpqj, "SELECT * FROM item_devolu Where id_orden = '$id_orden' and modo='0'");
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
        </style>


        <div class="scrdesa">



            <div class="text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;background-color: #D8DD09;">
                <p style=" font-size: 10pt; color: #000000;">Sistema de Devoluciones Versión 1.0.1</p>
            </div>

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
                            <b>Nº ORDEN DEVOLUCIONES</b>
                            <input type="text" class="form-control" value="<?= $id_ordends ?>" disabled>
                        </div>

                        <b>Cliente:</b>


                        <?php

                        include('inpubclien.php');


                        ?>
                    </div>
                    <div class="col-2" style="width: auto;  position: relative; float: left;">


                    </div>

                    <div class="col-4">
                        <b>Fecha</b>
                        <input type="text" class="form-control" value="<?= $fechahoyventa ?>" style="width: 350px;" disabled>
                        <input type="hidden" id="fechaordn" value="<?= $fechaordn ?>">
                        <input type="hidden" id="horaord" value="<?= $horaord ?>">

                        <div id="muestroorden55"></div>
                        <div style="width: 350px;padding-top:15px;">
                            <b>Origen:</b>
                            <select name="idordendev" id="idordendev" class="form-control" style="width: 350px;" onChange="ajax_idordendev($('#idordendev').val());">
                                <option value="0" <?= $selep0 ?>>Desposito</option>
                                <?

                                $sqlusuord = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente='$id_clienteint' and col != '0' ORDER BY `orden`.`id` DESC limit 10 ");
                                while ($rowusuaord = mysqli_fetch_array($sqlusuord)) {

                                    echo ' 
                                            <option value="' . $rowusuaord["id"] . '"';
                                    if ($idordendevd == $rowusuaord["id"]) {
                                        echo 'selected';
                                    }
                                    echo '>Orden Nº ' . $rowusuaord["id"] . '</option>';
                                }


                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2" style="width: auto;  position: relative; float: left;">


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

                                        <th style="width: 100px;padding-left: 10px;text-align:center;">Cantidad</th>
                                        <th style="width: 110px;padding-left: 10px;text-align:center;">Unidad</th>
                                        <th style="width: 150px;padding-left: 10px;text-align:center;">Vencimiento</th>
                                        <th style="width: 150px;padding-left: 10px;text-align:center;">Motivo</th>
                                        <th style="width: 150px;padding-left: 10px;text-align:center;">Resolución</th>
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

                                    //if ($id_clienteint != '762') { } 
                                    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_devolu Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");

                                    while ($roworden = mysqli_fetch_array($sqlorden)) {
                                        $iditeorfd = $roworden['id'];
                                        $id_producto = $roworden['id_producto'];
                                        $motivos = $roworden['motivo'];
                                        $destinos = $roworden['destino'];

                                        /*  */
                                        $ventfima = ventmininfo($rjdhfbpqj, $id_producto);
                                        $nombreunid = nombrunid($rjdhfbpqj, $id_producto);
                                        $nombrebult = nombrbult($rjdhfbpqj, $id_producto);
                                        $cantidadbiene = cantbult($rjdhfbpqj, $id_producto);
                                        $tipounidad = $roworden['tipounidad'];
                                        $totalite += $roworden['total'];
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
                        <input type="number" id="cantidad' . $roworden['id'] . '" value="' . $roworden['kilos'] . '"  class="form-control"  min="0" onclick="select()"  style="text-align:center;" >
             
                     </td>
                      <td style="padding-left: 2mm;' . $fondotd . '">
                      <select  id="unidad' . $roworden['id'] . '" class="form-select" tabindex="-1" >
                          <option value="0" ' . $seled0 . '>' . $nombreunid . '</option>
                         <option value="1" ' . $seled1 . '>' . $nombrebult . '</option>
                     </select>
                 </td>
                   
                 </td>
                    <td  style="text-align:center;' . $fondotd . '">
                  
                     <input type="date" id="fechaold' . $roworden['id'] . '" value="' . $roworden['fechaold'] . '"  class="form-control"  >
             
                    
                    </td>

                 
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
                   
                       <td class="text-center" style="place-items: center;text-align:center;' . $fondotd . '">   
                      


                      </td>
                            <td class="text-center" style="place-items: center;text-align:center;' . $fondotd . '">   
                      


                      </td>
                   </tr>
                   <tr>
                     
                        <td  colspan="6" style="' . $fondotd . '">   
                        <input type="text" id="nota' . $roworden['id'] . '" value="' . $roworden['nota'] . '"  class="form-control"  >
             
                     </td>
                     <td class="text-center" style="place-items: center;text-align:center;' . $fondotd . '">   
                       <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '">    
                       
                       
                                <button type="button"  class="btn btn-success" 
                    onclick="ajax_actuait' . $roworden['id'] . '(
                          $(' . $comillas . '#cantidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#fechaold' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#unidad' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#motivo' . $roworden['id'] . '' . $comillas . ').val(),
                          $(' . $comillas . '#destino' . $roworden['id'] . '' . $comillas . ').val());"

                    style="width: 100%;">Mod</button></td><td style="text-align:center;">



                       <button type="button" class="btn btn-danger btn-sm"  onclick="ajax_elimina($(' . $comillas . '#iditem' . $roworden['id'] . '' . $comillas . ').val(),' . $comillas . '' . $id_producto . '' . $comillas . ');
                       $(' . $comillas . '#producto' . $comillas . ').val(' . $comillas . '' . $comillas . ');
                       
                       " tabindex="-1">X</button>
                       

                           


                    
                       <script>
                       
                       function ajax_actuait' . $roworden['id'] . '(cantidad' . $roworden['id'] . ', fechaold' . $roworden['id'] . ',unidad' . $roworden['id'] . ',motivo' . $roworden['id'] . ',destino' . $roworden['id'] . ') {
                     
                       
                       var parametros = {
                            "cantidad": cantidad' . $roworden['id'] . ',
                            "fechaold": fechaold' . $roworden['id'] . ',
                            "unidad": unidad' . $roworden['id'] . ',
                            "motivo": motivo' . $roworden['id'] . ',
                            "destino": destino' . $roworden['id'] . ',
                            "nota": document.getElementById(' . $comillas . 'nota' . $roworden['id'] . '' . $comillas . ').value,
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
            

        }
                    
                    
                 
                   </script>


<div id="muestroordenr' . $roworden['id'] . '"></div>


                      </td>
                   </tr>
                   <tr>
                   <td colspan="8">
                   </td>
                   </tr>
                   
                   
                   ';
                                    }

                                    ?>

                                </tbody>
                            </table>


                        <?php

                    }

                        ?>

                        <div id="muestroorden2"> </div>


                        <div id="muestroorden29"> </div>


                        <div>
                            <br>
                            <table class="table table-bordered table-sm" style="bottom: 300px; <?= $noverpro ?>">
                                <thead>
                                    <tr>
                                        <th style="text-align:left; padding-left: 10px;">Agregar producto para devolución</th>

                                        <th style="width: 100px;text-align:center;">Cantidad</th>
                                        <th style="width: 130px;text-align:center;">Unidad</th>
                                        <th style="width: 150px;text-align:center;">Vencimiento</th>
                                        <th style="width: 150px;text-align:center;">Motivo</th>
                                        <!--      <th style="width: 180px;text-align:center;">Resolución</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td style="padding-left: 2mm; ">
                                            <?php include('inpubuscado.php'); ?>
                                        </td>
                                        <td style="text-align:center; ">
                                            <input type="number" name="cantidad" id="cantidad" class="form-control" value="0" min="1" max="<?= $stockdispom ?>" style="text-align:center; <?= $verinpur ?>">
                                            <input type="hidden" id="idproduc" value="<?= $idproduc ?>">
                                        </td>
                                        <td style="padding-left: 2mm; ">
                                            <select name="unidad" id="unidad" class="form-select" style="<?= $verinpur ?>">

                                                <option value="1"><?= $modo_producto ?></option>
                                                <option value="0"><?= $unidsx ?></option>


                                            </select>


                                        </td>
                                        <td>
                                            <input type="date" name="fechaold" id="fechaold" class="form-control">


                                        </td>

                                        <td>
                                            <select name="motivo" id="motivo" class="form-select">
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


                                        <!-- 
                                        <td style="text-align:center;">
                                            <select name="destino" id="destino" class="form-select">
                                                <option value="0">Esperando...</option>
                                                <option value="1">Vuelve Stock</option>
                                                <option value="2">Limpieza</option>
                                                <option value="3">Reembasado</option>
                                                <option value="4">Proveedor</option>
                                                <option value="5">Descarte</option>
                                            </select>
                                        </td>
 -->



                                    </tr>
                                    <tr>
                                        <td colspan="8" class="text-center"><br>
                                            <? if (!empty($producto)) { ?>
                                                <label for="comment">Reporte del Problema en el producto : <?= $producto ?></label>
                                                <div class="text-center" style="width: 100%;text-align:center;">
                                                    <textarea class="form-control" rows="3" id="nota" name="nota" style="width: 100%;   font-size: 20pt;"></textarea>
                                                </div>
                                                <br>
                                                <button type="button" id="suminstr" class="btn btn-success"
                                                    onclick="ajax_ordenbajar($('#producto').val(),$('#idproduc').val(),$('#cantidad').val(),$('#unidad').val(),$('#idordendev').val())">Guardar detalle de devolución</button> <br><br>
                                            <? } ?>
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
                        <br><br>
                        <br>
                        <div id="muestroorden3"> </div>


                        <br>
                        <div class="container mt-3 text-center"> <? if ($veritem == "1") { ?>

                                <? if ($finorden == '1') { ?>

                                    <a href="reportedevoluciones.php?jdhsknc=<?= base64_encode($id_orden) ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

                                <? }
                                                                        if ($finorden != '1') { ?> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button onclick="ajax_guardarorden()" type="button" class="btn btn-dark" tabindex="-1">Finalizar Orden Devoluciones</button>
                                <? } ?>
                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <? } ?>


                            <?php

                            if (
                                $admdmin == 1
                            ) {
                                echo '  <button type="button" class="btn btn-danger" tabindex="-1" onclick="window.close()"">Salir</button>';
                            } else {

                            ?>
                                <a href="../ordendevoluciones" tabindex="-1"><button type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>

                            <? } ?>

                        </div> <br><br>
                        <br>

                        <script>
                            <? if ($id_orden == "dsds" && empty($id_cliente)) { ?>
                                document.getElementById('cantidad').focus();
                                document.getElementById('cantidad').select();
                            <?  } else { ?>



                                <? if (!empty($producto)) { ?>
                                    document.getElementById('cantidad').focus();
                                    document.getElementById('cantidad').select();

                                    <? } else { ?>document.getElementById('producto').focus();
                            <? }
                            } ?>

                            function detectarEnter(event) {
                                if (event.key === 'Enter') {
                                    ajax_ordenbajar($('#producto').val(), $('#idproduc').val(), $('#cantidad').val(), $('#unidad').val());
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
                    function ajax_ordenbajar(producto, idproduc, cantidad, unidad, idordendev) {
                        console.log("Iniciando ajax_ordenbajar..."); // Mensaje de inicio

                        // Verificar el valor de id_clienteint
                        console.log("id_clienteint:", <?= $id_clienteint ?>);

                        if (<?= $id_clienteint ?>) {
                            console.log("id_clienteint tiene valor, preparando parámetros...");

                            var parametros = {
                                "producto": producto,
                                "idproduc": idproduc,
                                "cantidad": cantidad,
                                "unidad": unidad,
                                "idordendev": idordendev,
                                "id_cliente": '<?= $id_clienteint ?>',
                                "fechaordn": '<?= $fechaordn ?>',
                                "fechaold": document.getElementById('fechaold').value,
                                "motivo": document.getElementById('motivo').value,
                                /*  "destino": document.getElementById('destino').value, */
                                "nota": document.getElementById('nota').value,
                                "horaord": '<?= $horaord ?>',
                                "id_ordenedit": '<?= $id_orden ?>',
                                "id_marca": '<?= $id_marca ?>',
                                "id_categoria": '<?= $id_categoria ?>',
                                "presentacion": '<?= $cantidbiene ?>',
                                "id_proveedor": '<?= $id_proveedor ?>'
                            };

                            console.log("Parámetros enviados:", parametros);

                            $.ajax({
                                data: parametros,
                                url: 'insert_item.php',
                                type: 'POST',
                                beforeSend: function() {
                                    console.log("Enviando solicitud AJAX...");
                                    $("#muestroorden").html('');
                                },
                                success: function(response) {
                                    console.log("Respuesta recibida:", response);
                                    $("#muestroorden").html(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error en la solicitud AJAX:");
                                    console.error("Status:", status);
                                    console.error("Error:", error);
                                    console.error("Respuesta del servidor:", xhr.responseText);
                                }
                            });
                        } else {
                            console.error("id_clienteint está vacío o es falso");
                            alert("INGRESE DATOS!");
                            document.getElementById('id_cliente').focus();
                        }
                    }
                </script>







                <script>
                    function ajax_elimina(iditem, idproduc) {

                        if (!confirm("¿Seguro que lo queres Eliminar?")) {
                            return; // si el usuario toca "Cancelar", no hace nada
                        }
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
                </script>

                <script>
                    function ajax_guardarorden() {
                        var parametros = {
                            "idorden": '<?= $id_orden ?>',
                            "id_cliente": '<?= $id_cliente ?>'
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
                </script>


                <script>
                    function ajax_idordendev(idordendev) {
                        var parametros = {
                            "idordendev": idordendev,
                            "idorden": '<?= $id_orden ?>',
                            "id_cliente": '<?= $id_cliente ?>'
                        };
                        console.log("Parámetros enviados:", parametros);

                        $.ajax({
                            data: parametros,
                            url: 'modidord.php',
                            type: 'POST',
                            beforeSend: function() {
                                $("#muestroorden3").html('');
                            },
                            success: function(response) {
                                $("#muestroorden3").html(response);
                            }
                        });
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