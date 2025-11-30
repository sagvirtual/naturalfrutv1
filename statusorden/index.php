<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/StatusOrden.php');
include('../funciones/funcDiaNombreGral.php');
if ($tipo_usuario == "0" || $tipo_usuario == "33") {

    $_SESSION['fechacja'] = $_POST['fechacja'];

    $fechacja = $_SESSION['fechacja'];

    if (empty($fechacja)) {
        $fechacja = $fechahoy;
    }

    $fechacjaver = date('d/m/Y', strtotime($fechacja));


?>

    <!DOCTYPE html>


    <html lang="es">

    <head>
        <title>Sistema de Status Ordenes 1.0</title>
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
            <p style=" font-size: 10pt; color: white;">Sistema de Status Ordenes&nbsp;&nbsp;
                Usuario:&nbsp;<strong><?= $nombrenegocio ?></p>
        </div>




        <div class="container">
            <form action="../statusorden/" method="post">
                <div class="row">

                    <div class="col-lg-2 col-6">

                        <a onclick="window.close()">
                            <img src="/assets/images/logopc.png" style="width:38mm;">
                        </a>
                    </div>
                    <div class="col-lg-2 col-6 d-flex align-items-center justify-content-center mb-2" style="gap: 15px;">
                        <a href="javascript:location.reload()">
                            <button class="btn btn-primary">Actualizar</button></a>

                        <a href="/statusorden/ordens_realizadas">
                            <button type="button" class="btn btn-dark">Avanzado</button></a>
                    </div>


                    <div class="col-lg-8 col-12" style="padding-top: 10px;">


                        <div class="col">
                            <input type="date" class="form-control" name="fechacja" id="fechacja" value="<?= $fechacja ?>" style="width: 350px; float:right;">

                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success" style=" float:right;">
                                Ver
                            </button>
                        </div>





                    </div>
                </div>
            </form>
            <hr>



            <?php

            include('hojarutaordns.php');

            ?><br><br>
            <a href="../../" tabindex="-1">
                <button type="button" class="btn btn-dark" style="width: 100%;" tabindex="-1">Panel</button></a>
        </div>
        </div>


    </body>

    </html>
<? } ?>