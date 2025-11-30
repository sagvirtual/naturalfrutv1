<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

/* agregar */
$idproedit = $_GET['idproedit'];
$odoin = $_GET['odoin'];
if (!$idproedit) {
    $productods = $_GET['producto'];

    $productod = explode("@", $productods);
    $producto = preg_replace('/\s+/', ' ', $productod[0]);

    $unidsx = $productod[1];
    $ediyes = '0';
} else {

    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idproedit'");
    if ($rowod = mysqli_fetch_array($sqen)) {

        $nodrevpro = $rowod["nombre"];
        $kildpro = $rowod["kilo"];
    }
    $producto = $nodrevpro;

    $unidsx = $_GET['idproedit'];
    $ediyes = '1';
}
?>

<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Codificación </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Codificación&nbsp;&nbsp; Usuario:&nbsp;<strong><?= $nombrenegocio ?></p>
    </div>


    <div class="container">

        <div class="row">

            <div class="col-lg-12" style="padding-top: 10px;">
                <input type="hidden" class="form-control" id="numero" name="numero" value="999">
                <input type="hidden" class="form-control" id="cantidad" name="cantidad" value="999">
                <input type="hidden" class="form-control" id="unidad" name="unidad" value="999">
                <input type="hidden" class="form-control" id="suminstr" name="suminstr" value="999">
                <?php

                include('../codificacion/inpubuscado.php');

                // if($unidsx!=''){echo"<script>document.getElementById('codigo').focus();</script>";}
                $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$unidsx'");
                if ($rowod = mysqli_fetch_array($sqwen)) {

                    $nombrevpro = $rowod["nombre"];
                    $kilopro = $rowod["kilo"];
                    $ubicacionpro = $rowod["ubicacion"];
                    $codigo = $rowod["codigo"];
                    $codigodebarra = $rowod["codigo"];
                    $codigobulto = $rowod["codigobulto"];
                    $filapro = $rowod["filapro"];
                    $pascol = $rowod["pascol"];
                }

                switch ($ubicacionpro) {
                    case "0":
                        $origennom = "ENVASADO PA";
                        break;
                    case "1":
                        $origennom = "DEPOSITO PA";
                        break;
                    case "2":
                        $origennom = "ENVASADO PB";
                        break;
                    case "3":
                        $origennom = "DEPOSITO PB";
                        break;
                }


                ?> <br><?php if ($unidsx != '') {

                            if ($codigo == '0' || $ediyes == '1' && $odoin == '3') {

                        ?>

                        <div class="alert alert-success text-center">
                            <strong>Codigo Unidad</strong>

                            <div class="input-group">
                                <span class="input-group-text">Codigo</span>
                                <input type="number" min="13" max="13" class="form-control" id="codigo" name="codigo" oninput="ajax_codificacion($('#codigo').val());" autocomplete="off">
                                <script>
                                    document.getElementById('codigo').focus();
                                </script>
                            </div>

                            <!-- manual -->
                            <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Cod. Manual</span>
                                <input type="number" min="13" max="13" class="form-control" id="codmanual" name="codmanual">
                                <button class="btn btn-success" onclick="ajax_codificacion($('#codmanual').val());">OK</button>
                            </div>


                        </div>


                        <div class="alert alert-danger text-center">
                            <strong>Codigo Bulto</strong>

                            <div class="input-group">
                                <span class="input-group-text">Codigo</span>
                                <input type="number" min="13" class="form-control" id="codigobulto" name="codigobulto" oninput="ajax_codificacionb($('#codigobulto').val());" autocomplete="off">

                            </div>

                            <!-- manual -->
                            <div class="input-group">
                                <span class="input-group-text" style="width: 120px;">Cod. Manual</span>
                                <input type="number" min="13" class="form-control" id="codmanualb" name="codmanualb">
                                <button class="btn btn-success" onclick="ajax_codificacionb($('#codmanualb').val());">OK</button>
                            </div>


                        </div>

                    <?php
                            } ?>

                    <div id="muestroorden4"></div>

                    <?php

                            if ($ubicacionpro == '9' || $ediyes == '1' && $odoin == '1') {

                    ?>
                        <div class="input-group">
                            <span class="input-group-text">Origen</span>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" oninput="ajax_ubicacion($('#ubicacion').val());" autocomplete="off">

                            <?php

                                if ($codigo != '0') {

                            ?>
                                <script>
                                    document.getElementById('ubicacion').focus();
                                </script>
                            <?php

                                }

                            ?>
                        </div>
                    <?php

                            } else {

                    ?>
                        <div class="input-group">
                            <span class="input-group-text">Origen</span>
                            <div class="form-control">
                                <b><?= $origennom ?></b>
                            </div>
                            <a href="../codificacion/?idproedit=<?= $unidsx ?>&odoin=1"> <span class="input-group-text"><img src="../assets/images/editar.png" style="height: 25px; width: auto;"></span></a>
                        </div>




                    <?php
                            }

                    ?>
                    <?php

                            if ($pascol != '' && $odoin != '2') {

                    ?> <br>
                        <div class="input-group">
                            <span class="input-group-text">Pasillo/Columna/Fila</span>
                            <div class="form-control">

                                <b><?= $pascol ?></b>
                            </div>
                            <a href="../codificacion/?idproedit=<?= $unidsx ?>&odoin=2"> <span class="input-group-text"><img src="../assets/images/editar.png" style="height: 25px; width: auto;"></span></a>
                        </div>

                    <?php

                            }
                            if ($pascol == '' || $ediyes == '1' && $odoin == '2') {

                    ?> <br>
                        <div class="input-group">
                            <span class="input-group-text">Pasillo/Columna</span>
                            <input type="text" class="form-control" id="pascol" name="pascol" oninput="ajax_pascol($('#pascol').val());" autocomplete="off">
                            <?php

                                if ($ubicacionpro != '9') {

                            ?>
                                <script>
                                    document.getElementById('pascol').focus();
                                </script>
                            <?php

                                }

                            ?>

                        </div>


                    <?php

                            }

                    ?>

                    <br>

                    <div class="input-group">
                        <span class="input-group-text">Info Adic.</span>
                        <input type="text" class="form-control" id="filapro" name="filapro" value="<?= $filapro ?>" onkeyup="ajax_filapro($('#filapro').val());" onclick="select()" autocomplete="off">
                        <?php

                            if ($pascol != '' && $codigo != '0') {

                        ?>
                            <!--      <script>
                                document.getElementById('filapro').focus();
                            </script> -->
                        <?php

                            }

                        ?>
                    </div>


                    <br>
                    <?
                            if ($codigo != '0' || $idproedit == '0') {

                    ?>
                        <div class="input-group">
                            <div class="form-control">
                                <b><?= $nombrevpro ?></b> Id:<?= $unidsx ?>
                            </div>

                            <a href="../codificacion/?idproedit=<?= $unidsx ?>&odoin=3"> <span class="input-group-text"><img src="../assets/images/editar.png" style="height: 25px; width: auto;"></span></a>
                        </div><br>

                        <div class="col-12 text-center" style="width: 100%">
                            <p>Codigo Unidad</p>

                            <!-- codigo de barra -->
                            <?php


                                if (strlen($codigodebarra) == 12 || strlen($codigodebarra) == 13) {



                                    include('../barcode/html/BCGean13.php');
                                }
                            ?>


                        </div>

                        <?php if ($codigobulto > 0) { ?>
                            <br>
                            <div class="col-12 text-center" style="width: 100%">
                                <p>Codigo Bulto</p>
                                <h5><b>
                                        < <?= $codigobulto ?>>
                                    </b>
                                </h5>



                            </div>
                    <?php
                                }
                            }

                    ?>

                    <hr>
            </div>
        </div>

    </div> <br><br> <br><br>
    <div class="container" style="max-width: 360px;">
        <div class="row">
            <div class="col-12" style="padding-top: 10px;">
                <a href="../codificacion/">
                    <button type="button" id="suminstr1" class="btn btn-success" style="width: 100%;">Siguiente</button>
                </a>
            </div><br><br> <br><br>

            <div class="col-12" style="padding-top: 10px;">
                <a href="../codificacion/">
                    <button type="button" id="suminstr2" class="btn btn-danger" style="width: 100%;">Salir</button>
                </a>
            </div>
        </div>
    </div><? } ?>
<br><br>
<br><br>
<br><br>
<div class="mt-5 p-4 text-center">
    <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button></a><br><br>
</div>

<script>
    function ajax_codificacion(codigo) {
        var parametros = {
            "codigo": codigo,
            "idproducto": '<?= $unidsx ?>'
        };
        $.ajax({
            data: parametros,
            url: 'codific.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }

    function ajax_codificacionb(codigobulto) {
        var parametros = {
            "codigobulto": codigobulto,
            "idproducto": '<?= $unidsx ?>'
        };
        $.ajax({
            data: parametros,
            url: 'codificb.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }


    function ajax_ubicacion(ubicacion) {
        var parametros = {
            "ubicacion": ubicacion,
            "idproducto": '<?= $unidsx ?>'
        };
        $.ajax({
            data: parametros,
            url: 'codific.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }

    function ajax_pascol(pascol) {
        var parametros = {
            "pascol": pascol,
            "idproducto": '<?= $unidsx ?>'
        };
        $.ajax({
            data: parametros,
            url: 'codific.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }

    function ajax_filapro(filapro) {
        var parametros = {
            "filapro": filapro,
            "idproducto": '<?= $unidsx ?>'
        };
        $.ajax({
            data: parametros,
            url: 'codific.php',
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
</body>

</html>