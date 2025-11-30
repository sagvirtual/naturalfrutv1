<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/func_nombreunid.php');
include('../funciones/funcPicHar.php');
include('../funciones/funAsigOrdenUs.php');
include('../funciones/funsalidasphp.php');
include('../funciones/funcNombrcliente.php');
include('../control_stock/funcionStockS.php');
include('../funciones/funcvencimiProd.php');

function botonpikers($rjdhfbpqj, $idproedit, $nombreunid, $ubicacion, $kilos)
{

    $sqlcsm = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproedit'");
    if ($rowprdodtos = mysqli_fetch_array($sqlcsm)) {
        $kildso = $rowprdodtos["kilo"];
    }
    if ($nombreunid != "Kg." && $nombreunid != "Unid.") {

        $cantidadvulto = $kilos * $kildso;
    } else {
        $cantidadvulto = $kilos;
    }

    if ($cantidadvulto >= $kildso && ($ubicacion == "0" || $ubicacion == "2")) {

        $esbulto = "";
    } else {
        $esbulto = "7"; //aca cambio la cantidad de errores
    }
    return $esbulto;
}


$_SESSION['picaincorrcto'] = $_GET['picaincorrcto'];
function destock($rjdhfbpqj, $idproedit)
{
    $sqlcsm = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproedit'");
    if ($rowprdodtos = mysqli_fetch_array($sqlcsm)) {

        $kildso = $rowprdodtos["kilo"];
        $codigo = $rowprdodtos["codigo"];

        if ($codigo != '0') {
            $codigdo = "<br>Id Producto. " . $rowprdodtos["id"];
        } else {
            $codigdo = "<br>Id Producto. " . $rowprdodtos["id"];
        }
        $unidadnom = $rowprdodtos["unidadnom"];
        $modo_producto = $rowprdodtos["modo_producto"];
        $ubicacion = $rowprdodtos["ubicacion"];
        $stockdispom = SumaStock($rjdhfbpqj, $idproedit);

        $stokbultos = $stockdispom * $kildso;
        $stokbulto = explode(".", $stokbultos);



        //$stogfver= '[Stock: '.$stockdispom.' '.$unidadnom.' / '.$stokbulto[0].' '.$modo_producto.']';
        $stogfver = '[Stock: ' . $stockdispom . ' ' . $modo_producto . ' / ' . $stokbulto[0] . ' ' . $unidadnom . ']' . $codigdo . '';
    }
    return $stogfver;
}

$sqeini = mysqli_query($rjdhfbpqj, "SELECT * FROM preparacion Where fecha_ini='$fechahoy' and id_usuario='$id_usuarioclav' ");
if ($rowodini = mysqli_fetch_array($sqeini)) {

    /* agregar id=' $diaPaOrde' and */
    $codigo = $_GET['codigo'];
    $kiloscone = $_GET['kiloscone'];




    $sqeeni = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and prepara='1'  and picking='0' and col='3'");
    if ($rowodidnia = mysqli_fetch_array($sqeeni)) {
        $diaPaOrdes = $rowodidnia['id'];
        $id_cliente = $rowodidnia['id_cliente'];
    } else {

        $sqeenid = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and forzado='1' and picking='0' and col > 1 and col < 4 ");
        if ($rowodidnbi = mysqli_fetch_array($sqeenid)) {
            $diaPaOrdes = $rowodidnbi['id'];
            $id_cliente = $rowodidnbi['id_cliente'];
        } else {


            $sqeenic = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and forzado='2' and picking='0' and col > 1 and col < 4 ");
            if ($rowodidnic = mysqli_fetch_array($sqeenic)) {
                $diaPaOrdes = $rowodidnic['id'];
                $id_cliente = $rowodidnic['id_cliente'];
            } else {

                $sqeenidcd = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and forzado='0' and picking='0' and col > 1 and col < 4 ");
                if ($rodidnic = mysqli_fetch_array($sqeenidcd)) {
                    $diaPaOrdes = $rodidnic['id'];
                    $id_cliente = $rodidnic['id_cliente'];
                }
            }
        }
    }


    $sqenord = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and id='$diaPaOrdes' and picking='0' and col > 1");
    if ($rowoded = mysqli_fetch_array($sqenord)) {
        $hora_pic = $rowoded['hora_pic'];
        $idpedido = $rowoded["id"];

        if ($hora_pic = "00:00:00") {
            $sqlordend = "Update orden Set hora_pic='$horasin', fecha3='$fechahoy', forzado='2', col='3', prepara='1' Where id = '$idpedido'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
        } else {
            $hora_picd = '<strong>Inicio:</strong>' . $rowoded['hora_pic'] . ' hs.&nbsp;&nbsp;&nbsp;';
            $sqlordend = "Update orden Set col='3' Where id = '$idpedido'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
        }
    }
    /* intem picados */
    $sqenordi2 = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$idpedido' and picking!='0' and picking!='2'  and modo='0'");
    $canvehech = mysqli_num_rows($sqenordi2);





    $sqerdi2 = mysqli_query($rjdhfbpqj, "SELECT 
            productos.id, productos.kgaprox, 
          
            item_orden.id_orden, item_orden.id_producto, item_orden.picking
           
            FROM 
            productos 
           INNER JOIN item_orden ON productos.id = item_orden.id_producto
            
            
             Where item_orden.id_orden='$idpedido'  and productos.kgaprox='0'");
    $canverificafin = mysqli_num_rows($sqerdi2);



    /* fin  */



    $sqenordi = mysqli_query($rjdhfbpqj, "SELECT 
            productos.id, productos.pascol, productos.ubicacion, productos.codigo, productos.codigobulto, productos.kilo, productos.kgaprox, 
            picking.nombre, picking.position, 
            item_orden.id_orden, item_orden.id_producto, item_orden.picking, item_orden.tipounidad, item_orden.piccant, item_orden.kilos, item_orden.nombre as nombpro, item_orden.modo, item_orden.id as iditem
           
            FROM 
            productos 
            INNER JOIN picking ON productos.pascol = picking.nombre 
           INNER JOIN item_orden ON productos.id = item_orden.id_producto
            
            
             Where id_orden='$idpedido' and picking='0' and modo='0' and kgaprox='0' ORDER BY `picking`.`position` ASC");
    if ($rowodedi = mysqli_fetch_array($sqenordi)) {
        $iditem = $rowodedi["iditem"];

        $sqlodrsd = "Update item_orden Set pickinicio='$hora' Where id_orden='$idpedido' and id='$iditem'";
        mysqli_query($rjdhfbpqj, $sqlodrsd) or die(mysqli_error($rjdhfbpqj));

        $idproedit = $rowodedi["id_producto"];
        $tipounidad = $rowodedi["tipounidad"];
        $piccant = $rowodedi["piccant"];
        //$kilos=$rowodedi["kilos"]-$kiloscone;        
        $nodrevpro = $rowodedi["nombpro"];
        $ubicacion = $rowodedi["ubicacion"];
        $codigover = $rowodedi["codigo"];
        $codigobultover = $rowodedi["codigobulto"];
        if ($tipounidad == 1 && $codigobultover > 0) {

            $tipoesbulto = 1;
        } else {
            $tipoesbulto = 0;
        }



        $comoviene = $rowodedi["kilo"];
        $pascol = $rowodedi["pascol"];
        $destock = destock($rjdhfbpqj, $idproedit);
        $vecimienver = funcvencimiProd($rjdhfbpqj, $idproedit, $idpedido);
        if ($ubicacion == '2' || $ubicacion == '0') {

            $ruulhar = PedHarinas($rjdhfbpqj, $idproedit, $idpedido);
            $ruulharexp = explode("|", $ruulhar);


            //$pascol = $ruulharexp[0];
            $kilosbolsa = $ruulharexp[1];
            $kilosPresent = $ruulharexp[2];
            $sumapican = '9';

            $kilos = $rowodedi["kilos"];
        } else {
            $sumapican = 1;
            $kilos = $rowodedi["kilos"];
        }
    } else {
        $sqenowi = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$idpedido' and picking='2' ORDER BY `item_orden`.`id` ASC");
        if ($rowoddi = mysqli_fetch_array($sqenowi)) {

            $sqlorsd = "Update item_orden Set picking='0' Where id_orden='$idpedido' and picking='2'";
            mysqli_query($rjdhfbpqj, $sqlorsd) or die(mysqli_error($rjdhfbpqj));

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='index.php'");
            echo ("</script>");
            exit;
        } else {

            $salidas = Salidas($rjdhfbpqj, $idpedido);
            /* cierro la orden */
            $sqloend = "Update item_orden Set picking='1' Where id='$iditem'";
            mysqli_query($rjdhfbpqj, $sqloend) or die(mysqli_error($rjdhfbpqj));

            /* cierror ordens de sectores enva y depos */
            $sqlordend = "Update ordenbajar Set fin='1', hora='$horasin', ordenpedi='$salidas' Where numero='$idpedido' and fin='0'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
            if (mysqli_affected_rows($rjdhfbpqj) > 0) {
                $actualizadas = '1';
            }

            $sqlordend = "Update ordeneva Set fin='1', hora='$horasin', ordenpedi='$salidas' Where numero='$idpedido' and fin='0'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
            if (mysqli_affected_rows($rjdhfbpqj) > 0) {
                $actualizadas = '1';
            }


            $sqlordend = "Update ordenevaa Set fin='1', hora='$horasin', ordenpedi='$salidas' Where numero='$idpedido' and fin='0'";
            mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
            if (mysqli_affected_rows($rjdhfbpqj) > 0) {
                $actualizadas = '1';
            }
            if ($actualizadas == '1') {
                $sqloend2 = "Update orden Set picking='1',col='4',fecha4='$fechahoy',hora4='$horasin', finpick='$horasin', prepara='0' Where id='$idpedido'";
                mysqli_query($rjdhfbpqj, $sqloend2) or die(mysqli_error($rjdhfbpqj));
                //  echo "Se actualizaron algunas filas.";
            } else {
                $sqloend2 = "Update orden Set picking='1',col='5',fecha5='$fechahoy',hora5='$horasin', finpick='$horasin', prepara='0'  Where id='$idpedido'";
                mysqli_query($rjdhfbpqj, $sqloend2) or die(mysqli_error($rjdhfbpqj));
                //echo 'No se encontraron filas para actualizar.'.$idpedido.'';
            }

            $_SESSION['anterior'] = $idpedido;

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='continuar.php?numpedio=$idpedido'");
            echo ("</script>");
            exit;
        }
    }

    if ($tipounidad == '0') {


        $nombreunid = nombrunid($rjdhfbpqj, $idproedit);
    } else {
        $nombreunid = nombrbult($rjdhfbpqj, $idproedit);

        if ($kilos > 1) {
            $agres = "s";
        }
    }


    if ($codigover == '0' || $pascol == '') {

        $pascol = '<h1 style="color:red;">Falta Codigo de Barras</h1> ' . $pascol . '';
    } else {
        $poncor = '<i style="font-size: 10pt;">Cod. ' . $codigover . '</i>';
    }
}
?>

<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Preparación de Pedidos 1.0</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;"
        style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Preparación de Pedidos&nbsp;&nbsp;
            Usuario:&nbsp;<strong><?= $nombrenegocio ?></p>
    </div>
    <?php


    $sqeini = mysqli_query($rjdhfbpqj, "SELECT * FROM preparacion Where fecha_ini='$fechahoy' and id_usuario='$id_usuarioclav'");
    if ($rowodini = mysqli_fetch_array($sqeini)) {


    ?>

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <?= $urg ?>
                    <div class="alert alert-success text-center" data-bs-toggle="collapse" data-bs-target="#ver" onclick="fococod()">

                        <h1><span class="badge bg-primary" style="font-size: 40pt;">Nº <?= $idpedido ?></span></h1>
                        <?= $hora_picd ?>Items. <?= $canvehech ?>/<?= $canverificafin ?>
                    </div>
                    <? include('../picking/resumenpick.php'); ?>
                    <div class="alert alert-secondary text-center" onclick="fococod()">
                        <strong style="font-size: 20pt;"><?= $pascol ?></strong>

                    </div>

                    <div class="bg-light p-3 text-center" onclick="fococod()">
                        <h2><?= $nodrevpro ?></h2><?= $destock ?> - Venc. <?= $vecimienver ?><br>
                        <button type="button" class="btn btn-dark" style="font-size: 30pt; font-weight: bold;"><?= $kilos ?> <?= $nombreunid ?><?= $agres ?>




                        </button>

                    </div>


                    <br>


                    <?

                    $esbulto = botonpikers($rjdhfbpqj, $idproedit, $nombreunid, $ubicacion, $kilos);



                    if ($codigover != '0' && $_GET['picaincorrcto'] < $esbulto) {

                        if ($_GET['picaincorrcto'] >= 1) {
                            echo '
                               <div class="alert alert-danger text-center">
                               <strong><h1>Producto Picado Incorrecto!!</h1></strong>Codigo no correspondiente al pedido
                               </div>
                               ';
                        }


                    ?>




                        <div class="input-group"> <span class="input-group-text">Codigo </span>
                            <input type="number" min="13" max="13" class="form-control" id="codigo" name="codigo"
                                oninput="ajax_ingreso($('#codigo').val());" autocomplete="off" onclick="select()">
                            <script>
                                document.getElementById('codigo').focus();

                                function fococod() {
                                    document.getElementById('codigo').focus();
                                }
                            </script>
                        </div>

                        <!-- manual -->
                        <div class="input-group">
                            <span class="input-group-text" style="width: 120px;">Cod. Manual</span>
                            <input type="number" min="13" max="13" class="form-control" id="codmanual" name="codmanual">
                            <button class="btn btn-success" onclick="ajax_ingreso($('#codmanual').val());">OK</button>
                        </div>
                    <? } else { ?>
                        <div class="text-center">
                            <input type="hidden" class="form-control" id="codmanual" name="codmanual" value="manual">
                            <button class="btn btn-success" style="      font-size: 30pt;" onclick="ajax_ingreso($('#codmanual').val());">Realizado</button><br><br>

                        </div>
                    <? } ?><br>
                    <br>

                    <br><br>



                    <div id="muestroorden4"></div>





                </div>
            </div>

            <div class="row">

                <br><br>
                <div class="col-lg-12">

                    <div id="muestrodes"> </div>
                    <button class="btn btn-primary"
                        style="width: 100%; font-size: 20pt; font-weight: bold;" onclick="ajax_despues();">Dejar para después</button><br><br>

                    <br><br>
                    <div id="muestroorden">
                        <button class="btn btn-danger" style="width: 100%; font-size: 20pt; font-weight: bold;" onclick="ajax_nohay();">NO
                            HAY</button>
                    </div>

                </div>
            </div>
        </div>




    <? } else { ?>
        <style>
            .circle-button {
                width: 265px;
                height: 265px;
                background-color: green;
                text-decoration: none;
                border: none;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
                font-size: 80px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                outline: none;
                transition: background-color 0.3s ease;
            }

            .circle-button:hover {
                background-color: darkgreen;
            }

            .circle-button:active {
                background-color: lightgreen;
            }
        </style> <br><br>
        <br><br>

        <div class="row" id="muestroinic">
            <div class="col-2">


            </div>
            <div class="col-8">
                <div class="circle-button" onclick="ajax_iniciar()">Iniciar</div>

            </div>
            <div class="col-2">


            </div>
        </div>


        <script>
            function ajax_iniciar() {
                var parametros = {
                    "id_usuario": '<?= $id_usuarioclav ?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'iniciopic.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroinic").html('<div style="text-align:center;position:relative; top:100px;"><img src="../assets/images/loader.gif" style="width: 60px; height:60px;"><h4 style="text-align:center;">Iniciando...</h4></div>');
                    },
                    success: function(response) {
                        $("#muestroinic").html(response);
                    }
                });
            }
        </script>



    <? } ?>

    <br><br>
    <br><br>
    <br><br>
    <?php if ($pikiusuario == 1) { ?>
        <div class="mt-5 p-4 text-center">
            <a href="../deposito/"><button type="button"
                    class="btn btn-dark btn-xs btnGoToTop">Gestión Deposito</button></a><br><br>
        </div>
    <?php } ?>
    <div class="mt-5 p-4 text-center">
        <a href="../lusuarios/logincerrar.php">
            <button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button>
        </a><br><br>
    </div>


    <script>
        function ajax_ingreso(codigo) {
            // if (codigo.length > 12) {

            var parametros = {
                "codigo": codigo,
                "idproducto": '<?= $idproedit ?>',
                "id_orden": '<?= $idpedido ?>',
                "sumapican": '<?= $sumapican ?>',
                "cantidadrd": '<?= $kilos ?>',
                "kilosPresent": '<?= $kilosPresent ?>',
                "tipoesbulto": '<?= $tipoesbulto ?>'
            };
            $.ajax({
                data: parametros,
                url: 'picado.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden4").html('');
                },
                success: function(response) {
                    $("#muestroorden4").html(response);
                }
            });
            // }else{alert("Código Erroneo");}
        }
    </script>

    <script>
        <?php


        /*  if($kilosPresent=='1'){$ubicacion=$ubicacion;}
                    else{$ubicacion='1';$kilos='64'; $nombreunid='Unid.';$agres='';} */

        ?>
        <? if ($ubicacion != '3') { ?>

            function ajax_nohay() {

                var parametros = {
                    "producto": '<?= $nodrevpro ?>',
                    "unidad": '<?= $nombreunid ?><?= $agres ?>',
                    "cantidad": '<?= $kilos ?>',
                    "numero": '<?= $idpedido ?>',
                    "id_producto": '<?= $idproedit ?>',
                    "ubicacion": '<?= $ubicacion ?>',
                    "id_ordennum": '<?= $diaPaOrdes ?>'
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

            }
    </script>
<? } else { ?>
    <script>
        function ajax_nohay() {
            if (confirm("Buscar en el Deposito del Fondo")) {
                if (confirm("¿Seguro que no hay este producto se dara aviso a la Administracíon?")) {
                    ejecutarAjaxNoHay();
                } else {
                    alert("Error 37964");
                }
            } else {
                alert("Error 37965");
            }
        }

        function ejecutarAjaxNoHay() {
            var parametros = {
                "producto": '<?= $nodrevpro ?>',
                "unidad": '<?= $nombreunid ?><?= $agres ?>',
                "cantidad": '<?= $kilos ?>',
                "numero": '<?= $idpedido ?>',
                "id_producto": '<?= $idproedit ?>',
                "ubicacion": '<?= $ubicacion ?>',
                "id_ordennum": '<?= $diaPaOrdes ?>'
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
        }
    </script>

<? } ?>

<script>
    function ajax_despues() {

        var parametros = {
            "iditem": <?= $iditem ?>,
            "idpedido": <?= $idpedido ?>
        };
        $.ajax({
            data: parametros,
            url: 'despues.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestrodes").html('');
            },
            success: function(response) {
                $("#muestrodes").html(response);
            }
        });

    }
</script>

</div>
</body>

</html>