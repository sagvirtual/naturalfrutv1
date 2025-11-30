<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');
include('../funciones/funcAvisoMix.php');

$id_orden = $_SESSION['id_orden'];
$numero = $_GET['numero'];
$pan = $_GET['pan'];
/* agregar */
$productods = $_GET['producto'];

$productod = explode("@", $productods);
$producto = preg_replace('/\s+/', ' ', $productod[0]);

$unidsx = $productod[1];
$id_producto = $productod[2];


$activainp = $_GET['focf'];
if ($activainp != '1') {
    $verinpur = "display:none;";
}
/* fin */

if ($unidsx == "Kg.") {
    $seleuna = "selected";
}
if ($unidsx == "Uni.") {
    $seleunb = "selected";
}

//if($_SESSION['id_orden']!="dsds"){$verpr="checkbox";}else{$verpr="hidden";}

$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa Where fin='0' and manu='0'");
if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $numero = $rowordenx['numero'];
    $prioridad = $rowordenx['prioridad'];
    if ($prioridad == "1") {
        $chepr = "checked";
    }
    $id_orden = $rowordenx['id'];
    $_SESSION['id_orden'] = $id_orden;

    $verpr = "checkbox";
} else {
    $id_orden = "dsds";
    $verpr = "hidden";
}

if (empty($producto)) {
    $producto = "";
}



$sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvasa Where id_orden = '$id_orden'");
if ($rowordenre = mysqli_fetch_array($sqlordent)) {
    $veritem = "1";
} else {
    $veritem = "2";
}


?>
<?php

if ($_SESSION['tipo'] == "22") {
    $editd = "";
    $tiempore = "120000";
} else {
    $editd = "?1=1";
    $tiempore = "120000";
}

if ($_SESSION['tipo'] == "30") {
    $editd = "";
    $tiempore = "1200000";
}

?>
<script>
    // Función para recargar la página
    function recargarPagina() {
        location.reload();
    }

    // Configura la recarga automática cada 1 minuto (60,000 milisegundos)
    setInterval(recargarPagina, <?= $tiempore ?>);
</script>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Orden Para Envasado Planta Alta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body onclick="ajax_buscar('dsdssddds');">





    <div class="bg-danger text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Pedidos internos Versión 1.0.</p>
    </div>
    <div class="container">
        <?php
        if ($_SESSION['tipo'] == "22") {
            $sectors = "22";
            //  include('../mensajes/vistomensaje.php');
            include('../mensajes/index.php');
        }

        ?> </div>
    <div class="container mt-3">

        <div class="row">
            <div class="col-5">
                <? if ($_SESSION['tipo'] == "30") { ?> <a href="index.php<?= $editd ?>"> <? } ?><img src="/assets/images/logopc.png" style="width:38mm;"><? if ($_SESSION['tipo'] == "30") { ?> </a><? } ?>

                <br><br>
                <?php

                if ($_SESSION['tipo'] == "22") {

                    // $verstosha = funcAvisoMixProd($rjdhfbpqj);

                    echo '<b>Preparar:</b><br>';
                    echo '  ' . funcAvisoMixProd($rjdhfbpqj) . '';
                }
                ?>

            </div>

            <?php

            if ($_SESSION['tipo'] == "30") {

            ?>

                <div class="col-6">
                    <h2> <input type="number" name="numero" id="numero" value="<?= $numero ?>" class="form-control" placeholder="Número Pedido para ENVASADO PA" onkeyup="detectarEnterb(event)"></h2>
                </div>

                <div class="col-1">
                    <div class="checkbox">

                        <input type="<?= $verpr ?>" id="prioridad" name="prioridad" value="1" onclick="ajax_prioridad($('input:checkbox[name=prioridad]:checked').val());" title="Prioridad de Envasado" <?= $chepr ?>>



                    </div>
                </div>
        </div>



        <div class="row">

            <div class="col-lg-9" style="padding-top: 10px;">




                <?php

                include('../buscadoprodu/inpubuscado.php');

                ?>


                <div class="list-group" id="muestrobus" tabindex="0"></div>
            </div>
            <div class="col-lg-1 " style="padding-top: 10px; <?= $verinpur ?>">
                <select name="unidad" id="unidad" class="form-select">
                    <option value="Kg." <?= $seleuna ?>>Kg.</option>
                    <option value="Unid." <?= $seleunb ?>>Unid.</option>
                </select>
            </div>


            <div class="col-lg-1" style="padding-top: 10px;">
                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cant." onkeyup="detectarEnter(event);" style="<?= $verinpur ?>" onclick="select()">
            </div>

            <script>
                <? if ($id_orden == "dsds" && empty($numero)) { ?>
                    document.getElementById('numero').focus();
                <?  } else { ?>



                    <? if (!empty($producto)) { ?>
                        document.getElementById('cantidad').focus();

                        <? } else { ?>document.getElementById('producto').focus();
                <? }
                } ?>

                function detectarEnter(event) {
                    if (event.keyCode === 13) {
                        ajax_ordeneva($('#producto').val(), $('#unidad').val(), $('#cantidad').val(), $('#numero').val());
                    }
                }

                function detectarEnterb(event) {
                    if (event.keyCode === 13) {
                        document.getElementById('producto').focus();
                    }
                }
            </script>

            <?php

                //Agregar producto al Pedido

            ?>

            <div class="col-lg-1" style="padding-top: 10px;">
                <button type="button" id="suminstr" class="btn btn-danger" onclick="ajax_ordeneva($('#producto').val(), $('#unidad').val(), $('#cantidad').val(),$('#numero').val());" style="width: 100%; <?= $verinpur ?>">Agregar</button>
            </div>
        </div>


    </div>
    <br>
    <? if ($id_orden != "dsds" && $veritem == "1") { ?>
        <div class="container mt-3">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">Producto</th>

                        <th class="text-center" style="width: 20mm;">Cantidad</th>
                        <th style="width: 20px;;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $comillas = "'";

                    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvasa Where id_orden = '$id_orden' ORDER BY `id` ASC");
                    while ($roworden = mysqli_fetch_array($sqlorden)) {
                        echo '
                
                <tr>
                <td  style="padding-left: 2mm;">' . $roworden['producto'] . '</td>
              
                <td class="text-center" style="place-items: center;">' . $roworden['cantidad'] . ' ' . $roworden['unidad'] . '</td>
                <td> 
                <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '">
                <button type="button" class="btn btn-danger btn-sm"  onclick="ajax_elimina($(' . $comillas . '#iditem' . $roworden['id'] . '' . $comillas . ').val());">X</button></td>
            </tr>
                
                ';
                    }

                    ?>


                </tbody>
            </table>
        </div>
        <div class="container mt-3 text-center">
            <!-- <a href="printorden.php"> <button type="button" class="btn btn-dark">Imprimir  Orden</button></a> <br><br>   --><a href="guardarorden.php"><button type="button" class="btn btn-dark">Enviar a Envasado Planta Alta</button></a>
        </div>
        <br><?php

                }

            ?>

<?php } else { ?>
    <div class="col-7">

        <ul class="list-group" style="width: 100%;">
            <li class="list-group-item">Sector: <strong><?= $tiposecto ?></strong></li>
            <li class="list-group-item">Usuario:&nbsp<strong><?= $nombrenegocio ?></strong></li>
            <li class="list-group-item"><a href="../deposito/infodepositot"><button type="button" class="btn btn-dark"><strong>Ubicacion Productos</strong></button></a></li>
            <li class="list-group-item"> <a href="../etiquetas/buscadoreti.php" target="_blank" style="float:right;">Buscar Etiquetas</a></strong></li>
            <li class="list-group-item"> <a href="../stockeo/index.php?ubicacion=0" target="_blank" style="float:left;">Stockear</a></strong></li>
        </ul>


    </div>



<? }

            if ($producto == '') {
                include('proseso.php');
                include('historial.php');
            } else {

                echo ' <div style="text-align:center;"><a href="../preparacionpedidos"><button type="button" class="btn btn-primary">Volver al Panel</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="index.php"><button type="button" class="btn btn-success">Ver Ordenes</button></a></div>';
            }
?>

<div id="muestroorden"> </div>
<div id="muestroorden2"> </div>
<div id="muestroordenc"> </div>
<div id="muestroordenp"> </div>




<script>
    function ajax_ordeneva(producto, unidad, cantidad, numero, prioridad) {
        if (numero) { // Verifica si numero tiene datos
            var parametros = {
                "producto": producto,
                "unidad": unidad,
                "cantidad": cantidad,
                "numero": numero,
                "prioridad": prioridad,
                "id_producto": <?= $id_producto ?>
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
            alert("INGRESE EL NUMERO DE ORDEN O REFERENCIA!");
            document.getElementById('numero').focus();
        }
    }
</script>


<script>
    function ajax_prioridad(prioridad) {

        var parametros = {
            "prioridad": prioridad
        };
        $.ajax({
            data: parametros,
            url: 'insert_prioridad.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroordenp").html('');
            },
            success: function(response) {
                $("#muestroordenp").html(response);
            }
        });

    }
</script>








<script>
    function ajax_elimina(iditem) {
        var parametros = {
            "iditem": iditem
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







<!-- 
    <script>
        function ajax_buscar(producto, numero, unidad) {
            var parametros = {
                "producto": producto,
                "numero": numero,
                "unidad": unidad
            };
            $.ajax({
                data: parametros,
                url: 'buscar.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestrobus").html('');
                },
                success: function(response) {
                    $("#muestrobus").html(response);
                }
            });
        }
    </script> -->


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

<div id="muestroprpb"> </div>



<script>
    function ajax_mensvis(idmensa) {
        var parametros = {
            "idmensa": idmensa
        };
        $.ajax({
            data: parametros,
            url: '../mensajes/visto_mensajes',
            type: 'POST',
            beforeSend: function() {
                $("#muestroprpb").html('');
            },
            success: function(response) {
                $("#muestroprpb").html(response);
            }
        });
    }
</script>







<script>
    function ajax_mensaje(mensajes, tipo_cliente) {
        var parametros = {
            "mensajes": mensajes,
            "tipo_cliente": tipo_cliente
        };
        $.ajax({
            data: parametros,
            url: '../mensajes/insert_mensajes.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestromenPA").html('');
            },
            success: function(response) {
                $("#muestromenPA").html(response);
            }
        });
    }

    function cerrarVentana() {
        // Intentar cerrar la ventana actual
        window.close();
    }
</script>

<div class="container">
    <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button></a><br><br>
</div>
</body>

</html>