<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');

// ================== FECHAS DESDE / HASTA ==================
if (!empty($_POST['desde']) && $_POST['desde'] > "0000-00-00") {
    $desde = $_POST['desde'];

    if (!empty($_POST['hasta']) && $_POST['hasta'] > "0000-00-00") {
        $hasta = $_POST['hasta'];
    } else {
        // Si no mandan "hasta", uso el mismo día que "desde"
        $hasta = $desde;
    }
} else {
    // Si no mandan nada, uso hoy
    $desde = $fechahoy;
    $hasta = $fechahoy;
}

$desdei = $desde;
$hastai = $hasta;

// Rango completo de día en DATETIME
$desded = $desde . " 00:00:00";
$hastad = $hasta . " 23:59:59";


function cantidadordens($rjdhfbpqj, $desded, $hastad)
{
    $canveordex = 0;
    //construyo la sentencia SQL usuarios de control
    $sqllogins = mysqli_query(
        $rjdhfbpqj,
        "SELECT id, nom_contac
                     FROM usuarios
                     WHERE tipo_cliente = '30'
                       AND estado = '0'
                     ORDER BY nom_contac ASC"
    );

    while ($rowusuarios = mysqli_fetch_array($sqllogins)) {

        $id_usuarioclav = $rowusuarios['id'];
        $nombre = strtoupper($rowusuarios['nom_contac']);

        // ERRORES DE PICKING POR CONTROLADOR EN EL RANGO DE FECHAS
        $sqlodrddd = mysqli_query(
            $rjdhfbpqj,
            "SELECT *
                         FROM picking_error
                         WHERE id_control = '$id_usuarioclav'
                           AND fecha_accion BETWEEN '$desded' AND '$hastad'"
        );

        // JOIN CON ORDEN, SIN DUPLICAR id_orden
        $sql = mysqli_query(
            $rjdhfbpqj,
            "SELECT pe.id_orden,
                                o.*,
                                MIN(pe.fecha_accion) AS fechcon   -- o MAX(), si preferís la última
                        FROM picking_error AS pe
                        INNER JOIN orden AS o ON pe.id_orden = o.id
                        WHERE pe.id_control = '$id_usuarioclav'
                        AND pe.fecha_accion BETWEEN '$desded' AND '$hastad'
                        GROUP BY pe.id_orden"
        );

        $canveordex += mysqli_num_rows($sql);
    }
    return $canveordex;
}
function iniciofin($rjdhfbpqj, $id_uscontrol, $desded, $hastad)
{
    $sqlodrddd = mysqli_query($rjdhfbpqj, "SELECT * FROM picking_error  WHERE id_control = '$id_uscontrol' AND fecha_accion >= '$desded' ORDER BY fecha_accion ASC");
    if ($rowusuarios = mysqli_fetch_array($sqlodrddd)) {
        $inicio = $rowusuarios['fecha_accion'];
        $hora_forini  = date("H:i", strtotime($inicio)) . " hs.";

        $inococs = "Inicio Control: " . $hora_forini;
        $sqlo = mysqli_query($rjdhfbpqj, "SELECT * FROM picking_error  WHERE id_control = '$id_uscontrol' AND fecha_accion <= '$hastad' ORDER BY fecha_accion DESC");
        if ($rowusuaridos = mysqli_fetch_array($sqlo)) {
            $fin = $rowusuaridos['fecha_accion'];

            $hora_fofin  = date("H:i", strtotime($fin)) . " hs.";


            $finc = "<br>Ultimo Control:" . $hora_fofin;
        }
    } else {
        $inococs = '';
        $finc = "";
    }


    return $inococs . $finc;
}


if ($tipo_usuario == "0") {
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <meta http-equiv="refresh" content="22222222">

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <form action="/reportecontroles/" method="post" class="form-inline">
                    <div class="form-group mb-3">
                        <label for="desde" style="padding-right: 20;">
                            Desde: &nbsp;
                        </label>
                        <input type="date" id="desde" name="desde" value="<?= $desdei ?>" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-3">
                        <label for="hasta" style="padding-left: 30; padding-right: 20;">Hasta: &nbsp; </label>
                        <input type="date" id="hasta" name="hasta" value="<?= $hastai ?>" class="form-control">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type="submit" class="btn btn-primary">Ver Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div><br>

    <!-- Start col -->
    <div class="col-lg-12 col-xl-8">
        <div class="card m-b-30">
            <div class="card-header text-center">
                <h5 class="card-title mb-0">Reporte Controles de Pedidos</h5>
            </div>

            <div class="card-body">

                <?php

                $cantidadordenes = cantidadordens($rjdhfbpqj, $desded, $hastad);
                // Inicializo por las dudas (depende de tu lógica previa)
                // $canverificd = 0;
                // $porcentajed = 0;
                // $canveorde = 0;

                //construyo la sentencia SQL usuarios de control
                $sqllogins = mysqli_query(
                    $rjdhfbpqj,
                    "SELECT id, nom_contac
                     FROM usuarios
                     WHERE tipo_cliente = '30'
                       AND estado = '0'
                     ORDER BY nom_contac ASC"
                );

                while ($rowusuarios = mysqli_fetch_array($sqllogins)) {

                    $id_usuarioclav = $rowusuarios['id'];
                    $nombre = strtoupper($rowusuarios['nom_contac']);
                    $inciod = iniciofin($rjdhfbpqj, $id_usuarioclav, $desded, $hastad);
                    // ERRORES DE PICKING POR CONTROLADOR EN EL RANGO DE FECHAS
                    $sqlodrddd = mysqli_query(
                        $rjdhfbpqj,
                        "SELECT *
                         FROM picking_error
                         WHERE id_control = '$id_usuarioclav'
                           AND fecha_accion BETWEEN '$desded' AND '$hastad'"
                    );

                    // JOIN CON ORDEN, SIN DUPLICAR id_orden
                    $sql = mysqli_query(
                        $rjdhfbpqj,
                        "SELECT pe.id_orden,
                                o.*,
                                MIN(pe.fecha_accion) AS fechcon   -- o MAX(), si preferís la última
                        FROM picking_error AS pe
                        INNER JOIN orden AS o ON pe.id_orden = o.id
                        WHERE pe.id_control = '$id_usuarioclav'
                        AND pe.fecha_accion BETWEEN '$desded' AND '$hastad'
                        GROUP BY pe.id_orden"
                    );

                    $canveorde = mysqli_num_rows($sql);
                    // MUESTRO ÓRDENES Y FECHAS (para control visual)
                    /*  while ($roworden = mysqli_fetch_array($sql)) {
                        echo '' . $roworden['id_orden'] . ' fecha: ' . $roworden['fechcon'] . '<br>';
                    } */

                    // Cantidad de órdenes con errores (DISTINTAS)


                    // Cantidad de items con error en picking_error
                    $canverifiddcafin = mysqli_num_rows($sqlodrddd);

                    // OJO: estas variables las supongo definidas antes:
                    // $canverificafin, $canverificd, $porcentaje, $porcentajed
                    // Ejemplo típico:
                    // $canverificd = $canverificd + $canverifiddcafin;
                    if ($cantidadordenes > 0) {
                        $porcentaje = ($canveorde / $cantidadordenes) * 100;
                    } else {
                        $porcentaje = 0;
                    }

                    echo '
                        <div class="row align-items-center">
                            <div class="col-6 col-lg-3">
                                <div class="border-primary border rounded text-center py-3 mb-3">
                                    <h2 class="card-title text-dark mb-1">Pedidos ' . number_format($canveorde, 0, ',', '.') . '</h2> 
                                    <p class="text-primary mb-0">' . number_format($canverifiddcafin, 0, ',', '.') . ' Items</p>
                                    ' . $inciod . '
                                </div>
                            </div>
                            <div class="col-6 col-lg-9">
                                <div class="border-warning rounded text-center py-3 mb-3">
                                    <h5>' . $nombre . ' <span class="float-right">' . round($porcentaje, 2) . '%</span></h5>
                                    <div class="progress mb-3" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: ' . $porcentaje . '%;" aria-valuenow="' . $porcentaje . '" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }




                ?>

            </div>

            <div class="card-body" style="width: 100%;">
                <div class="ecom-dashboard-widget" style="width: 100%;">
                    <div class="media" style="width: 100%;">
                        <div class="media-body text-center">
                            <div class="border-primary border rounded text-center py-3 mb-3">
                                <h5>Cantidad de Pedidos</h5>
                                <h1>
                                    <?php

                                    echo '' . $cantidadordenes . '';
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End col -->

<?php
} // fin if tipo_usuario == "0"

include('../template/pie.php');
?>