<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funAsigOrden.php');
include('../funciones/funAsigOrdenPre.php');


$numpedio = $_GET['numpedio'];

$sqeini = mysqli_query($rjdhfbpqj, "SELECT * FROM preparacion Where fecha_ini='$fechahoy' and id_usuario='$id_usuarioclav'");
if ($rowodini = mysqli_fetch_array($sqeini)) {


    $sqenord = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_usuarioclav='$id_usuarioclav' and picking='0' and col>1 and col< 4");
    if ($rowoded = mysqli_fetch_array($sqenord)) {


        $idorasig = AsigOrdenHojaPre($rjdhfbpqj, $id_usuarioclav);
        //asigno orden de hoja de ruta
        if ($idorasig > 2) {
            $sqlcdlied = "Update orden Set forzado='2' Where id = '$idorasig'";
            mysqli_query($rjdhfbpqj, $sqlcdlied) or die(mysqli_error($rjdhfbpqj));
        }
        $hayperido = '1';
    } else {
        if ($id_usuarioclav != '84' &&  $pikiusuario == 0) {
            //asigno orden de hoja de ruta
            $diaPaOrdes = AsigOrdenHoja($rjdhfbpqj);
            $sqlclied = "Update orden Set id_usuarioclav='$id_usuarioclav', col='3', forzado='2' Where id = '$diaPaOrdes'";
            mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));
        }
        if (empty($diaPaOrdes)) {
            $hayperido = '2';
        } else {
            $hayperido = '1';
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
        <META HTTP-EQUIV="REFRESH" CONTENT="12">

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
                font-size: 40px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                outline: none;
                animation: blink 1s infinite;
            }

            @keyframes blink {
                0% {
                    background-color: green;
                }

                50% {
                    background-color: red;
                }

                100% {
                    background-color: green;
                }
            }

            a {
                text-decoration: none;
            }


            .buttonsin {
                width: 265px;
                height: 265px;
                background-color: black;
                text-decoration: none;
                border: none;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
                font-size: 42px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                outline: none;
            }
        </style>
    </head>

    <body>
        <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;"
            style="background-color: #0B6CF7;">
            <p style="font-size: 10pt; color: white;">Sistema de Preparación de Pedidos&nbsp;&nbsp;Usuario:&nbsp;<strong><?= $nombrenegocio ?></strong></p>
        </div>

        <br><br>
        <br><br>

        <? if ($hayperido == '1') { ?>
            <div class="row" id="muestroinic">
                <div class="col-2"></div>
                <div class="col-8">
                    <a href="index.php">
                        <div class="circle-button">Nuevo<br>Pedido</div>
                    </a>
                </div> <? } else {
                        if ($hayperido != '2') { ?>

                    <div class="row" id="muestroinic">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <a href="index.php">
                                <div class="circle-button">Un momento...<?= $hayperido ?></div>
                            </a>
                        </div>



                <? }
                    } ?>


                <?
                if ($hayperido == '2') { ?>

                    <div class="row" id="muestroinic">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="buttonsin">
                                Sin<br>Pedidos

                            </div>

                        </div>



                    <? } ?>
                    <div class="col-2"></div>
                    </div>

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



    </body>

    </html>
<? } else {
} ?>