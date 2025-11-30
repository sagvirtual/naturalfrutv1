<?php
include('../f54du60ig65.php');

include('../lusuarios/login.php');
include('lusuarios/login.php');




$id_orden = $_SESSION['id_orden'];
$producto = $_GET['producto'];
$numero = $_GET['numero'];



if ($_GET[1] == "1") {
    $editd = "";
    $tiempore = "120000";
} else {
    $editd = "?1=1";
    $tiempore = "120000";
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
<style>
    body {
        zoom: 80%;
    }
</style>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Orden Para Envasado</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>





    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema Sector: Preparacíon Pedidos Versión 1.0.0</p>
    </div>

    <div class="container mt-3">

        <div class="row">
            <div class="col-6">
                <img src="/assets/images/logopc.png" style="width:38mm;">
            </div>


            <div class="col-6">

                <ul class="list-group">
                    <li class="list-group-item">Sector: <strong><?= $tiposecto ?></strong></li>
                    <li class="list-group-item"><!-- <a href="../control_de_stock" target="_black"><button type="button" class="btn btn-dark">STOCK</button></a> &nbsp;&nbsp; --><a href="../" target="_black"><button type="button" class="btn btn-dark">Panel general</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <a href="../produccionenva/historialenvasado" target="_blank" style="float:right;"><button type="button" class="btn btn-dark">Historial&nbsp;Env.PB</button></a></strong>
                    </li>
                    <li class="list-group-item">Usuario: <strong><?= $nombrenegocio ?></strong></li>
                </ul>


            </div>


        </div>




    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">

                <?php
                $sectors = "21";
                include('../mensajes/index.php');

                include('../envasadopb/proseso.php');
                include('../envasadopb/historial.php');

                ?>


            </div>
            <div class="col-4">

                <?php
                $sectors = "29";
                include('../mensajes/index.php');
                include('../depositoplantaalta/proseso.php');
                include('../depositoplantaalta/historial.php');

                ?>


            </div>
            <div class="col-4">

                <?php
                $sectors = "22";
                include('../mensajes/index.php');
                include('../envasadopa/proseso.php');
                include('../envasadopa/historial.php');

                ?>


            </div>
        </div>
    </div>




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
    <div class="container">
        <a href="../lusuarios/logincerrar.php"><button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button></a><br><br>
    </div>



    <div id="muestromenPA"> </div>



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
    </script>














</body>

</html>