<? include('f54du60ig65.php');
include('lusuarios/login.php');

if ($_POST['desde']) {

    unset($_SESSION['desde']);
    unset($_SESSION['hasta']);
    unset($_SESSION['desdeant']);
    unset($_SESSION['hastaant']);
    // unset($_SESSION['idclientes']);
    //unset($_SESSION['id_clientevers']);


    $_SESSION['desde'] = $_POST['desde'];
    $_SESSION['hasta'] = $_POST['hasta'];
    $_SESSION['desdeant'] = $_POST['desdeant'];
    $_SESSION['hastaant'] = $_POST['hastaant'];
    //$_SESSION['idclientes'] = $_POST['idclientes'];

} else {
}



if (empty($_SESSION['desde'])) {

    $fechaObj = new DateTime($fechahoy);

    // Restar un mes
    $fechaObj->modify('-7 day');

    // Obtener la fecha modificada
    $desde = $fechaObj->format("Y-m-d");


    //$desde = "2025-01-01";
    $hasta = $fechahoy;


    $desdeant = $desde;
    $hastaant = $fechahoy;
} else {

    $desde = $_SESSION['desde'];
    $hasta = $_SESSION['hasta'];


    $desdeant = $_SESSION['desdeant'];
    $hastaant = $_SESSION['hastaant'];
}

if (!empty($_GET['focf'])) {
    $id_cliente = $_GET['id_cliente'];
    $id_clientev = explode("@", $id_cliente);
    $id_clientevers = $id_clientev[0];

    $id_clientevr = explode("(", $id_clientevers);
    $id_clientever = $id_clientevr[0];

    $id_clienteint = $id_clientev[1];
    $_SESSION['idclientes'] = $id_clientev[1];
    $_SESSION['id_clientevers'] = $id_clientev[0];
} else {

    $id_clienteint = $_SESSION['idclientes'];
    $id_clientevers = $_SESSION['id_clientevers'];
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Estadisticas - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="js/chart.js"></script>
</head>
</script>

<body>
    <style>
        .zoom-85 {
            zoom: 85%;
            scroll-behavior: smooth;
        }


        canvas {
            max-width: 1200px;
            margin: auto;
            border: 1px solid #ccc;
        }
    </style>

    <?php

    function alcucompra($rjdhfbpqj, $idcategoria, $desde, $hasta, $id_clienteint)
    { //Where id_categoria='$idcategoria'

        if ($id_clienteint > 0) {
            $sqlo = " and id_cliente='" . $id_clienteint . "'";
        }

        $totalcaterori = 0;


        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_categoria='$idcategoria' and modo='0' and fecha BETWEEN '$desde' and '$hasta' $sqlo");
        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {
            $tipounidad = $rowcatedsdrias['tipounidad'];
            $id_producto = $rowcatedsdrias['id_producto'];
            //$comovinee=$rowcatedsdrias['kilo'];
            if ($tipounidad == '0') {
                $modoun = "Kg.";
            } else {
                $modoun = "Unid.";
            }

            $sqlcadgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
            if ($rowcaddrias = mysqli_fetch_array($sqlcadgorias)) {
                $unidadnom = $rowcaddrias['unidadnom'];
                $comovinee = $rowcaddrias['kilo'];
            }
            if ($unidadnom == "Kg." && $tipounidad == '0') {

                $totalcaterori += $rowcatedsdrias['kilos'];
            }
            // paso a kg la unidad
            else if ($unidadnom == "Kg." && $tipounidad == '1') {

                $totalcaterori += $rowcatedsdrias['kilos'] * $comovinee;
            } else if ($unidadnom == "Uni." && $tipounidad == '1') {

                $totalcaterori += $rowcatedsdrias['kilos'] * $comovinee;
            } else if ($unidadnom == "Uni." && $tipounidad == '0') {

                $totalcaterori += $rowcatedsdrias['kilos'];
            }
        }
        //return number_format($totalcaterori, 2, ',', '.');

        return array('totalcaterori' => $totalcaterori, 'modoun' => $unidadnom);
    }



    function categorias($rjdhfbpqj, $desde, $hasta, $id_clienteint, $desdeant, $hastaant)
    {
        $categoria = "";
        $urld = "";
        $totalcatds = 0;
        $totalcatdsant = 0;


        $cantidacarte = 0;
        $sqlcatedxgorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias  ORDER BY `categorias`.`position` ASC ");
        while ($rowcatedsdrias = mysqli_fetch_array($sqlcatedxgorias)) {

            $idcategoria = $rowcatedsdrias['id'];

            $totalcatde = alcucompra($rjdhfbpqj, $idcategoria, $desde, $hasta, $id_clienteint);
            $totalcatd = $totalcatde['totalcaterori']  | 0;
            /* 
        $desdeant="2000-02-02";
        $hastaant="2024-06-15"; */
            $totalcatdeant = alcucompra($rjdhfbpqj, $idcategoria, $desdeant, $hastaant, $id_clienteint);
            $totalcatdant = $totalcatdeant['totalcaterori'] | 0;




            if ($totalcatd > 0) {
                $cantidacarte = $cantidacarte + 1;


                $categoria .= "'" . $rowcatedsdrias['nombre'] . " " . $totalcatde['modoun'] . "', ";
                $urld .= "'" . $rowcatedsdrias['nombre'] . " " . $totalcatde['modoun'] . "': 'estadisticasp.php?id_categoria=" . $rowcatedsdrias['id'] . "',";
                $totalcatds .= $totalcatd . ",";
                $totalcatdsant .= $totalcatdant . ",";
            }
        }

        $totalcat = substr($totalcatds, 0, -1);
        $totalcatant = substr($totalcatdsant, 0, -1);

        $categoriar = substr($categoria, 0, -1);
        $urld = substr($urld, 0, -1);




        return array('categoria' => $categoriar, 'totalcat' => $totalcat, 'urld' => $urld, 'cantidacarte' => $cantidacarte, 'totalcatdant' => $totalcatant);
    }

    ?>


    <div>



        <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
            <p style=" font-size: 10pt; color: white;">Sistema de Estadisticas Versión 1.0.0</p>
        </div>

        <style>
            .seleccionacld {
                background-color: #ccc;
            }

            .no-seleccionacld {
                background-color: #fff;
            }
        </style>





        <div class="container zoom-85">

            <div class="row">
                <div class="col-2">
                    <a href="../">
                        <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1"></a>
                </div>



                <div class="col-4">
                    <div style="padding-bottom:15px; width: 350px;">
                        <b>Cliente</b>
                        <form id="formBusqucl">
                            <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente" value="<?= $id_clientevers ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;">

                        </form>
                        <div id="resultadocl"></div>

                    </div>
                    <form action="../estadisticas.php" method="post">
                        <div style="padding-bottom:15px; width: 350px;background-color: red;">
                            <b>Fecha desde</b>
                            <input type="date" id="desde" name="desde" class="form-control" value="<?= $desde ?>" style="width: 350px;"><br>

                            <b>Comparación desde</b>
                            <input type="date" id="desdeant" name="desdeant" class="form-control" value="<?= $desdeant ?>" style="width: 350px;">
                        </div>

                </div>
                <div class="col-2" style="width: auto;  position: relative; float: left;">

                </div>

                <div class="col-4">
                    <div style="position:relative; top:80px;">



                        <b>Fecha Hasta</b>
                        <input type="date" id="hasta" name="hasta" class="form-control" value="<?= $hasta ?>" style="width: 350px;">
                        <br>
                        <b>Comparación Hasta</b>
                        <input type="date" id="hastaant" name="hastaant" class="form-control" value="<?= $hastaant ?>" style="width: 350px;">


                    </div>
                </div>


                <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="debe_haber?jhduskdsa=Mw==" tabindex="-1">
                        <button type="submit" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Ver</button></a>
                </div>



            </div>
            </form>

        </div>
        <hr>
        <div class="container text-center">
            <?php

            $extraecdfa = categorias($rjdhfbpqj, $desde, $hasta, $id_clienteint, $desdeant, $hastaant);
            $cantidad = $extraecdfa['cantidacarte'] * 50;
            ?>
            <?




            ?>
            <h4>Ventas por Categoría - Cliente: <?= $id_clientevers ?></h4>
            <canvas id="horizontalBarChart" width="1200" height="<?= $cantidad ?>"></canvas>



            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Datos de ventas en miles
                    const ventas = [<?= $extraecdfa['totalcat'] ?>];
                    const ventasant = [<?= $extraecdfa['totalcatdant'] ?>];

                    // Datos de categorías (etiquetas)
                    const categorias = [<?= $extraecdfa['categoria'] ?>];

                    // Definir las URLs para cada categoría
                    const urls = {
                        <?= $extraecdfa['urld'] ?>
                    };
                    // Ordenar ventas en orden descendente y alinear categorías
                    const sortedData = ventas.map((venta, index) => ({
                            venta,
                            categoria: categorias[index]
                        }))
                        .sort((a, b) => b.venta - a.venta);

                    // Extraer los datos ordenados
                    const ventasOrdenadas = sortedData.map(item => item.venta);

                    // Ordenar ventas en orden descendente y alinear categorías
                    const sortedDataa = ventasant.map((ventasant, index) => ({
                            ventasant,
                            categoria: categorias[index]
                        }))
                        .sort((a, b) => b.ventasant - a.ventasant);

                    // Extraer los datos ordenados
                    const ventasOrdenadasa = sortedDataa.map(item => item.ventasant);



                    const categoriasOrdenadas = sortedData.map(item => item.categoria);

                    // Asegurarse de que las categorías sean únicas
                    const categoriasUnicas = [...new Set(categoriasOrdenadas)];

                    // Crear el gráfico
                    const ctx = document.getElementById('horizontalBarChart').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: categoriasUnicas, // Utiliza las categorías únicas
                            datasets: [{
                                    label: 'Ventas',
                                    data: ventasOrdenadas,
                                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                    yAxisID: 'y',

                                },
                                {
                                    label: 'Ventas Comparación',
                                    data: ventasOrdenadasa, // Este arreglo lo puedes ajustar según necesites
                                    backgroundColor: '#000000',
                                    yAxisID: 'y1',
                                }
                            ]
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            onHover: function(evt, elements) {
                                evt.native.target.style.cursor = elements.length ? 'pointer' : 'default';
                            },

                            onClick: function(evt) {
                                const activePoints = chart.getElementsAtEventForMode(evt, 'nearest', {
                                    intersect: true
                                }, true);
                                if (activePoints.length > 0) {
                                    const index = activePoints[0].index;
                                    const categoria = categoriasUnicas[index];
                                    const url = urls[categoria];
                                    if (url) {
                                        window.open(url, '_parent'); // Abrir en la misma ventana con _parent
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Valores'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return '' + value.toLocaleString(); // Agrega el símbolo de dólar
                                        }
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Categorías'
                                    }
                                },
                                y1: {
                                    position: 'none',
                                    grid: {
                                        drawOnChartArea: false
                                    },
                                    title: {
                                        display: false,
                                        text: 'Valores'
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top'
                                }
                            }
                        }
                    });
                });
            </script>


        </div>








        <!-- 
        <br><div class="container mt-3 text-center"> 
    
            <a href="debe_haber_pdf.php?jhduskdsa=MTU2&desde_date=2024-01-09&hasta_date=2024-12-09" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a> 

    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <a onclick="window.close()"><button  type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



        </div>
    
     -->



        <script>
            $(document).ready(function() {
                var indiceseleccionacld = -1;


                // Manejar el evento keyup para buscar mientras se escribe
                $('#id_cliente').on('keyup', function(e) {
                    if (event.key === 'Escape') { // Escape
                        $('#resultadocl').empty(); // Vaciar el listado de resultadcl

                    }
                });


                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
                        $('#resultadocl').empty();
                    }
                });



                // Manejar el evento keydown para buscar mientras se escribe
                $('#id_cliente').on('keyup', function(e) {
                    var $resultadcl = $('#resultadocl p');


                    if (e.keyCode === 38) { // Flecha arriba
                        e.preventDefault();
                        if (indiceseleccionacld > 0) {
                            indiceseleccionacld--;
                            actualizarSeleccion($resultadcl);
                        }
                    } else if (e.keyCode === 40) { // Flecha abajo
                        e.preventDefault();
                        if (indiceseleccionacld < $resultadcl.length - 1) {
                            indiceseleccionacld++;
                            actualizarSeleccion($resultadcl);
                        }
                    } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter


                        e.preventDefault();
                        if (indiceseleccionacld !== -1) {
                            // Aquí puedes hacer lo que necesites con el resultado seleccionacld, por ejemplo:



                            // Construir la URL con el parámetro seleccionacld
                            var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
                            var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                            // Redireccionar a la URL
                            window.location.href = url;


                        }





                    } else {
                        // Si se presiona otra tecla, realizar la búsqueda
                        realizarBusqucl();
                    }
                });

                // Manejar el evento click en los resultadcl de la búsqueda
                $(document).on('click', '#resultadocl p', function() {
                    indiceseleccionacld = $(this).index();
                    actualizarSeleccion($('#resultadocl p'));
                    $('#id_cliente').focus(); // Mantener el foco en el campo de búsqueda


                    var seleccionacld = $(this).text();
                    var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                    window.location.href = url;

                });



                function realizarBusqucl() {
                    // Obtener los datos del formulario
                    var formData = $('#formBusqucl').serialize();


                    // Realizar la solicitud AJAX       
                    $.ajax({
                        type: "POST",
                        url: "../lestadisticas/buscarcli.php",
                        data: formData,
                        success: function(response) {
                            $('#resultadocl').html(response); // Actualizar los resultadcl en la página
                            indiceseleccionacld = -1; // Reiniciar el índice seleccionacld
                        }
                    });
                }

                function actualizarSeleccion($resultadcl) {
                    $resultadcl.removeClass('seleccionacld');
                    $($resultadcl[indiceseleccionacld]).addClass('seleccionacld');
                }


            });
        </script>
        <br>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4 text-center">

                <a href="../">
                    <button type="button" id="suminstr2" class="btn btn-danger">Salir</button>
                </a>

            </div>
            <div class="col-4">
            </div>
        </div>
    </div>











    </div>
    <br>

</body>

</html>