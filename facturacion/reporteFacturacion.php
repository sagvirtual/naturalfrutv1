<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');
include('../funciones/funcNomProd.php');
$fecha_desde = $_POST['fecha_desde'];
$fechas_hasta = $_POST['fechas_hasta'];


// Si está vacío → primer día del mes
if (empty($fecha_desde)) {
    $fecha_desde = $fechahoy; //date("Y-m-01");
}

// Si está vacío → último día del mes
if (empty($fechas_hasta)) {
    $fechas_hasta = $fechahoy; //date("Y-m-t");
}
function funcNombulto($rjdhfbpqj, $id_producto)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where  id = '$id_producto'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $presentacion = $rowusuarios["kilo"];
    }

    return $presentacion;
}
if (!empty($_POST['desde'])) {
    $_SESSION['desde'] = $_POST['desde'];
    $_SESSION['hasta'] = $_POST['hasta'];
}



if (!empty($_SESSION['desde'])) {
    $desde = $_SESSION['desde'];
    $hasta = $_SESSION['hasta'];
} else {
    // Crear un objeto DateTime con la fecha actual
    $fechaObj = new DateTime($fechahoy);

    // Restar un mes
    $fechaObj->modify('-7 day');

    // Obtener la fecha modificada
    $desde = $fechahoy; //$fechaObj->format("Y-m-d");
    $hasta = $fechahoy;
}

$productods = $_GET['producto'];

$productod = explode("@", $productods);
$producto = preg_replace('/\s+/', ' ', $productod[0]);

$id_productod = $productod[1];


if (!empty($id_productod)) {
    $_SESSION['id_producto'] = $id_productod;
}

if ($_GET['vertodo'] == '1') {
    $_SESSION['id_producto'] = '';
}


$id_producto = $_SESSION['id_producto'];
$ediyes = '0';

if ($tipo_usuario == "0") {



?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php

    function ParaFacturar($rjdhfbpqj)
    {
        $canvecafconcre = 0;
        $sqlusuarios = mysqli_query(
            $rjdhfbpqj,
            "SELECT id, nom_contac 
         FROM usuarios 
         WHERE estado='0' AND (tipo_cliente='33' OR id='83' OR tipo_cliente='1')
         ORDER BY nom_contac ASC"
        );

        while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
            $quienfac = $rowusuarios['id'];

            $sqlfact = mysqli_query(
                $rjdhfbpqj,
                "SELECT 
                o.ivaporsen,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '$quienfac'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND f.fecha_accion >= '2025-04-01 00:00:00' and o.col!='0'"
            );

            //cuento concretadas
            $sqlfactco = mysqli_query(
                $rjdhfbpqj,
                "SELECT 
                o.ivaporsen,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '$quienfac'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND f.fecha_accion >= '2025-04-01 00:00:00' and o.col='8'"
            );

            $canvecafconcre = mysqli_num_rows($sqlfactco);
            //cuento con sin asig en facturacion

            $canvecaf = mysqli_num_rows($sqlfact);
            //mes anterior sin concretar
            $sqlfactcoants = mysqli_query(
                $rjdhfbpqj,
                "SELECT 
                o.ivaporsen,
                o.fecha,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '$quienfac'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND o.fecha >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m-01')
                AND o.fecha <  DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND o.col != '0' AND o.col != '8' AND o.col != '31'"
            );
            $canvecafants = mysqli_num_rows($sqlfactcoants);
            if ($canvecafants > 0) {
                $canantefas = '<b style="color:red;">' . $canvecafants . '</b>';
            } else {
                $canantefas = '<b>' . $canvecafants . '</b>';
            }
            //mes anterior
            $sqlfactcoant = mysqli_query(
                $rjdhfbpqj,
                "SELECT 
                o.ivaporsen,
                o.fecha,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '$quienfac'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND o.fecha >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m-01')
                AND o.fecha <  DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND o.col = '8'"
            );
            $canvecafant = mysqli_num_rows($sqlfactcoant);
            if ($canvecafant > 0) {
                $canantefa = '<b style="color:red;">' . $canvecafant . '</b>';
            } else {
                $canantefa = '<b>' . $canvecafant . '</b>';
            }

            if ($rowusfac = mysqli_fetch_array($sqlfact)) {
                echo '
            <tr>
                <td class="text-center">' . $rowusuarios["nom_contac"] . '</td>
                <td class="text-center">' . $canantefas . '</td>
                <td class="text-center">' . $canantefa . '</td>
                <td class="text-center"><b><sinfac>' . $canvecaf . '</sinfac></b></td>
                <td class="text-center"><b><sinfacds style="color:green;">' . $canvecafconcre . '</sinfacds></b></td>
            </tr>';
            }
        }
    }

    function ParaFacsinasig($rjdhfbpqj)
    {
        $sqlfactsin = mysqli_query(
            $rjdhfbpqj,
            "SELECT 
                o.ivaporsen,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '0'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND f.fecha_accion >= '2025-04-01 00:00:00' and o.col!='0'"
        );

        $sqlfactsicon = mysqli_query(
            $rjdhfbpqj,
            "SELECT 
                o.ivaporsen,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '0'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
               AND f.fecha_accion >= '2025-04-01 00:00:00' and o.col='8'"
        );


        //mes anterior sin
        $sqlfactcoants = mysqli_query(
            $rjdhfbpqj,
            "SELECT 
                o.ivaporsen,
                o.fecha,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '0'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
             AND o.fecha >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m-01')
                AND o.fecha <  DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND o.col != '8' AND o.col != '0' AND o.col != '30'"
        );
        $canvecafants = mysqli_num_rows($sqlfactcoants);
        if ($canvecafants > 0) {
            $canantefas = '<b style="color:red;">' . $canvecafants . '</b>';
        } else {
            $canantefas = '<b>' . $canvecafants . '</b>';
        }
        //mes anterior
        $sqlfactcoant = mysqli_query(
            $rjdhfbpqj,
            "SELECT 
                o.ivaporsen,
                o.fecha,
                o.ivaporsen,
                o.id AS id_orden_o,
                o.col,
                f.fecha_accion,
                f.emitida,
                f.enviada,
                f.quienfac,
                f.id_orden
             FROM orden o
             INNER JOIN facturacion f
                 ON o.id = f.id_orden
             WHERE f.quienfac = '0'
               AND o.ivaporsen > '0'
               AND f.emitida = '0'
               AND f.enviada = '0'
             AND o.fecha >= DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m-01')
                AND o.fecha <  DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND o.col = '8'"
        );
        $canvecafant = mysqli_num_rows($sqlfactcoant);
        if ($canvecafant > 0) {
            $canantefa = '<b style="color:red;">' . $canvecafant . '</b>';
        } else {
            $canantefa = '<b>' . $canvecafant . '</b>';
        }
        //sin facruainsert
        $fechaini = '2025-10-01';
        $cantiparfac = 0;
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,totalivas,fecha,ivaporsen FROM orden Where ivaporsen > '0' and fecha>='$fechaini' and col='8' ");
        while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

            $id_orden = $rowordenx['id'];


            $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida FROM facturacion Where id_orden='$id_orden'");
            if ($roworded = mysqli_fetch_array($sqlordendx)) {

                $emitida = 0;
            } else {
                $emitida = 1;
            }

            if ($emitida == 1) {
                $cantiparfac = 0; //$cantiparfac + 1;
            }
        }
        //fin


        $canvecaf = mysqli_num_rows($sqlfactsin);
        $canvecafcon = mysqli_num_rows($sqlfactsicon);

        $canvecafconv = $canvecafcon + $cantiparfac;

        /* if ($rowusfac = mysqli_fetch_array($sqlfactsin)) {
        } */
        echo '
            <tr>
                <td class="text-center">Sin Asignar 
                </td>
                <td class="text-center">' . $canantefas . '</td>
                <td class="text-center">' . $canantefa . '</td>
                <td class="text-center"><b><sinfacd id="resultado"></sinfacd></b></td>
                <td class="text-center"><b style="color:green;">' . $canvecafconv . '</b></td>
            </tr>';
    }



    function vercantfactur($rjdhfbpqj)
    {

        $cantiparfac = 0;
        $fechaini = '2025-04-01';

        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,totalivas,fecha,ivaporsen FROM orden Where ivaporsen >= '4' and fecha>='$fechaini' and col!='0' ");
        while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

            $id_orden = $rowordenx['id'];


            $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida FROM facturacion Where id_orden='$id_orden'");
            if ($roworded = mysqli_fetch_array($sqlordendx)) {

                $emitida = $roworded['emitida'];
            } else {
                $emitida = 0;
            }

            if ($emitida != 1) {
                $cantiparfac = $cantiparfac + 1;
            }
        }

        return $cantiparfac + 0;
    }


    function ParaEnviar($rjdhfbpqj)
    {
        $sqlusuarios = mysqli_query(
            $rjdhfbpqj,
            "SELECT id, nom_contac 
         FROM usuarios 
         WHERE estado='0' AND (tipo_cliente='33' OR id='83' OR tipo_cliente='1')
         ORDER BY nom_contac ASC"
        );

        while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
            $quienfac = $rowusuarios['id'];

            $sqlfact = mysqli_query(
                $rjdhfbpqj,
                "SELECT *
             FROM facturacion 
             WHERE quienfac = '$quienfac' AND emitida = '1' AND enviada = '0' AND nfactura > '0' and id !='0' AND fecha_accion >= '2025-04-01 00:00:00'"
            );
            $canvecdaf = 0;
            // $canvecaf = mysqli_num_rows($sqlfact);

            while ($rowusfac = mysqli_fetch_array($sqlfact)) {
                $id_orden = $rowusfac['id_orden'];

                $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden' AND ivaporsen > 1 ");

                if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
                    $canvecdaf = $canvecdaf + 1; ////el problema es los del iva
                }
            }
            $canvecdafe = $canvecdaf;
            $sqlfactd = mysqli_query(
                $rjdhfbpqj,
                "SELECT *
             FROM facturacion 
             WHERE id_orden='0' AND resp_emit = '$quienfac' AND emitida = '1' AND enviada = '0' AND nfactura > '0' AND fecha_accion >= '2025-04-01 00:00:00'"
            );
            while ($rowudsfac = mysqli_fetch_array($sqlfactd)) {
                $canvecdafe = $canvecdafe + 1; ////el problema es los del iva

            }
            if ($canvecdafe > 0) {
                echo '
                        <tr>
                            <td class="text-center">' . $rowusuarios["nom_contac"] . '</td>
                            <td class="text-center"><b><sinfacen>' . $canvecdafe . '</sinfacen></b></td>
                        </tr>';
            }
        }
    }
    function ParaEnvsinasi($rjdhfbpqj)
    {
        $canvecaf = 0;
        $sqlfact = mysqli_query(
            $rjdhfbpqj,
            "SELECT *
             FROM facturacion 
             WHERE quienfac = '0' AND resp_emit = '1' AND enviada = '0' AND nfactura > '0' AND fecha_accion >= '2025-04-01 00:00:00'"
        );

        //$canvecaf = mysqli_num_rows($sqlfact);

        while ($rowusfac = mysqli_fetch_array($sqlfact)) {

            $id_orden = $rowusfac['id_orden_o'];

            $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden' AND nfactura > '0'");

            if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
                $canvecaf = $canvecaf + 1;
                echo '
            <tr>
                <td class="text-center">Sin Asignar</td>
                <td class="text-center"><b><sinfacen>' . $canvecaf . ' ' . $rowusfac['id_orden_o'] . '</sinfacen></b></td>
            </tr>';
            }
        }
    }


    function Facturadas($rjdhfbpqj, $fecha_desde, $fechas_hasta)
    {

        $fecha_desde = $fecha_desde . " 00:00:00";
        $fechas_hasta = $fechas_hasta . " 23:59:00";
        $comilla = "'";
        $sqlusuarios = mysqli_query(
            $rjdhfbpqj,
            "SELECT id, nom_contac 
         FROM usuarios 
         WHERE estado='0' AND (tipo_cliente='33' OR id='83' OR tipo_cliente='1')
         ORDER BY nom_contac ASC"
        );

        while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
            $quienfac = $rowusuarios['id'];

            $sqlfact = mysqli_query(
                $rjdhfbpqj,
                "SELECT *
             FROM facturacion 
             WHERE quienfac = '$quienfac' AND nfactura > '0' and id !='0' and fecha_facturada BETWEEN '$fecha_desde' and '$fechas_hasta'"
            );
            $canvecdaf = 0;
            // $canvecaf = mysqli_num_rows($sqlfact);

            while ($rowusfac = mysqli_fetch_array($sqlfact)) {
                $id_orden = $rowusfac['id_orden'];
                $id_fac = $rowusfac['id'];

                $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden' AND ivaporsen > 1 ");

                if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
                    $canvecdaf = $canvecdaf + 1; ////el problema es los del iva
                }
            }
            $canvecdafe = $canvecdaf;
            $sqlfactd = mysqli_query(
                $rjdhfbpqj,
                "SELECT *
             FROM facturacion 
             WHERE id_orden='0' AND quienfac = '$quienfac' AND nfactura > '0' and fecha_facturada BETWEEN '$fecha_desde' and '$fechas_hasta'"
            );
            while ($rowudsfac = mysqli_fetch_array($sqlfactd)) {
                $canvecdafe = $canvecdafe + 1; ////el problema es los del iva

            }

            if ($canvecdafe > 0) {
                echo '
                        <tr style="cursor: pointer;">
                            <td class="text-center"><b>' . $rowusuarios["nom_contac"] . '</b> </td>
                            <td class="text-center"><b><facsinfacen>' . $canvecdafe . '</facsinfacen></b>
                            </td><td> 
                            <button type="button" data-toggle="collapse" data-target="#veritem' . $id_fac . '" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12"
                              onclick="ajax_itemfactura(
                                ' . $comilla . '' . $id_fac . '' . $comilla . ',
                                ' . $comilla . '' . $quienfac . '' . $comilla . ',
                                ' . $comilla . '' . $fecha_desde . '' . $comilla . ',
                                ' . $comilla . '' . $fechas_hasta . '' . $comilla . '
                                )">Facturas</button>
                            
                            </td>
                        </tr>
                        <tr  id="veritem' . $id_fac . '" class="collapse ">
                        <td colspan="3">
                        <div id="muestrafac' . $id_fac . '">
                        </div>
                        </td>
                        </tr>';
            }
        }
    }

    function Facsinasi($rjdhfbpqj, $fecha_desde, $fechas_hasta)
    {
        $fecha_desde = $fecha_desde . " 00:00:00";
        $fechas_hasta = $fechas_hasta . " 23:59:00";
        $comilla = "'";
        $canvecaf = 0;
        $sqlfact = mysqli_query(
            $rjdhfbpqj,
            "SELECT *
             FROM facturacion 
             WHERE quienfac = '0' AND nfactura > '0' and fecha_facturada BETWEEN '$fecha_desde' and '$fechas_hasta' ORDER BY fecha_facturada DESC"
        );

        //$canvecaf = mysqli_num_rows($sqlfact);

        while ($rowusfac = mysqli_fetch_array($sqlfact)) {

            $id_orden = $rowusfac['id_orden_o'];
            $id_fac = $rowusfac['id'];
            $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$id_orden' AND nfactura > '0'");

            if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
                $canvecaf = $canvecaf + 1;
                echo '
            <tr>
                <td class="text-center">Sin Asignar</td>
                <td class="text-center"><b><facsinfacen>' . $canvecaf . ' ' . $rowusfac['id_orden_o'] . '</facsinfacen></b>
                <button type="button" data-toggle="collapse" data-target="#veritem' . $id_fac . '" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12"
                              onclick="ajax_itemfactura(
                                ' . $comilla . '' . $id_fac . '' . $comilla . ',
                                ' . $comilla . '0' . $comilla . ',
                                ' . $comilla . '' . $fecha_desde . '' . $comilla . ',
                                ' . $comilla . '' . $fechas_hasta . '' . $comilla . '
                                )">Facturas</button>
                </td>
            </tr>
              <tr  id="veritem' . $id_fac . '" class="collapse ">
                        <td colspan="2">
                        <div id="muestrafac' . $id_fac . '">
                        </div>
                        </td>
                        </tr>';
            }
        }
    }

    ?>



    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">

                <div class="form-group mb-3">
                    <h4 class="page-title"><i class="feather icon-package"></i> Reporte Facturación</h4>
                </div>

            </div>
            <div class="col-md-4 col-lg-4">

            </div>


        </div>
        <!-- Start row -->
        <div class="row">


            <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">

                                <div class="media-body">
                                    <h5>Facturadas</h5>
                                    <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <label for="staticEmail2" class="input-group-text">Desde: </label>
                                            <input type="date" id="fecha_desde" name="fecha_desde" value="<?= $fecha_desde ?>" class="form-control" min="2025-04-01">&nbsp;&nbsp;&nbsp;

                                            <label for="staticEmail2" style="padding-left: 30; padding-right: 20;" class="input-group-text">Hasta: </label>
                                            <input type="date" id="fechas_hasta" name="fechas_hasta" value="<?= $fechas_hasta ?>" class="form-control" min="2025-04-01">


                                            &nbsp;&nbsp;&nbsp;







                                            <button type="submit" class="btn btn-secondary">Buscar</button>





                                        </div>
                                    </form>

                                    <h3>
                                        <?php
                                        $sectorb = '22'; ?>
                                        Total: <sinfacen id="resultadoef"></sinfacen>
                                        <!--  <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sectorb ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button> -->
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse show" id="collapseExample<?= $sectorb ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Realizo</th>
                                        <th scope="col" class="text-center">Cant. Facturas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $fecha_desde = $fecha_desde . " 00:00:00";
                                    $fechas_hasta = $fechas_hasta . " 23:59:00";

                                    Facturadas($rjdhfbpqj, $fecha_desde, $fechas_hasta);
                                    Facsinasi($rjdhfbpqj, $fecha_desde, $fechas_hasta);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start col -->
            <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">

                                <div class="media-body">
                                    <h5>Para Facturar</h5>
                                    <h3>
                                        <?php
                                        $sectorb = '22';
                                        //return array('totalfac' => $totalfac, 'monto_sin' => $monto_sin, 'iva' => $iva);
                                        $totalsinasi = vercantfactur($rjdhfbpqj);
                                        echo 'Total: ' . number_format($totalsinasi, 0, ',', '.') . '';


                                        ?>
                                        <!-- 
                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sectorb ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button> -->
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse show" id="collapseExample<?= $sectorb ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Realiza</th>
                                        <th scope="col" class="text-center">Mes/Ant.<br>S/Concre.</th>
                                        <th scope="col" class="text-center">Mes/Ant.<br>Concre.</th>
                                        <th scope="col" class="text-center">Total<br>Facturas</th>
                                        <th scope="col" class="text-center">Ordenes<br>Concretadas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    ParaFacturar($rjdhfbpqj);
                                    ParaFacsinasig($rjdhfbpqj);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">

                                <div class="media-body">
                                    <h5>Para Enviar</h5>
                                    <h3>
                                        <?php
                                        $sectorb = '22'; ?>
                                        Total: <sinfacen id="resultadoe"></sinfacen>
                                        <!--        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sectorb ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button> -->
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse show" id="collapseExample<?= $sectorb ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Realiza</th>
                                        <th scope="col" class="text-center">Cant. Facturas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    ParaEnviar($rjdhfbpqj);
                                    ParaEnvsinasi($rjdhfbpqj);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>

        <!-- envasado ordenes -->
        <!-- Start row -->
        <div class="card card-body">
            <div class="alert alert-light">
                <strong>Buscar Facturadas o para Facturar</strong>



                <div class="input-group mb-3">
                    <label for="staticEmail2" style="padding-right: 20;" class="input-group-text">Desde: </label>
                    <input type="date" id="desde_date" name="desde_date" value="<?= $fechahoy ?>" class="form-control"
                        onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" min="2025-04-01">&nbsp;&nbsp;&nbsp;

                    <label for="staticEmail2" style="padding-left: 30; padding-right: 20;" class="input-group-text">Hasta: </label>
                    <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control"
                        onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" min="2025-04-01">


                    <input id="modobus" name="modobus" type="hidden">
                    &nbsp;&nbsp;&nbsp;


                    <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
                        placeholder="Buscar por: Nº Orden / Cliente" aria-label="Search" aria-describedby="button-addon2"
                        onkeyup="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" autocomplete="off">




                    <button type="buttom" class="btn btn-secondary" onclick="ajax_buscartodo($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');">Buscar</button>





                </div>
            </div>
            <div id="muestroorden55"></div>

        </div>

        <script>
            // Selecciona todos los <p> excepto el del resultado
            const elementos = document.querySelectorAll('sinfac:not(#resultado)');

            let total = 0;

            // Recorre todos los <p> y suma su contenido numérico
            elementos.forEach(sinfac => {
                const valor = parseFloat(sinfac.textContent) || 0;
                total += valor;
            });

            var totalfinal = <?= $totalsinasi ?> - total;

            // Muestra el total en el <p> con id="resultado"
            document.getElementById('resultado').textContent = totalfinal;
        </script>
        <script>
            // Selecciona todos los <p> excepto el del resultado
            const elementose = document.querySelectorAll('sinfacen:not(#resultadoe)');

            let totale = 0;

            // Recorre todos los <p> y suma su contenido numérico
            elementose.forEach(sinfacen => {
                const valore = parseFloat(sinfacen.textContent) || 0;
                totale += valore;
            });


            // Muestra el total en el <p> con id="resultado"
            document.getElementById('resultadoe').textContent = totale;
        </script>
        <script>
            // Selecciona todos los <p> excepto el del resultado
            const elementosef = document.querySelectorAll('facsinfacen:not(#resultadoef)');

            let totalef = 0;

            // Recorre todos los <p> y suma su contenido numérico
            elementosef.forEach(facsinfacen => {
                const valoref = parseFloat(facsinfacen.textContent) || 0;
                totalef += valoref;
            });


            // Muestra el total en el <p> con id="resultado"
            document.getElementById('resultadoef').textContent = totalef;
        </script>

        <script>
            function ajax_buscar(buscar, desde_date, hasta_date, col) {
                if (buscar.length > 2) {
                    // Tomar la subcadena a partir del tercer carácter
                    //var buscar_recortado = buscar.substring(2);

                    var parametros = {
                        "buscar": buscar,
                        "desde_date": desde_date,
                        "hasta_date": hasta_date,
                        "col": col
                    };

                    $.ajax({
                        data: parametros,
                        url: '../facturacion/buscarhisfac.php',
                        type: 'POST',
                        beforeSend: function() {
                            $("#muestroorden55").html('');
                        },
                        success: function(response) {
                            $("#muestroorden55").html(response);
                        }
                    });
                }
            }
        </script>

        <script>
            function ajax_buscartodo(buscar, desde_date, hasta_date, col) {

                // Tomar la subcadena a partir del tercer carácter
                //var buscar_recortado = buscar.substring(2);

                var parametros = {
                    "buscar": buscar,
                    "desde_date": desde_date,
                    "hasta_date": hasta_date,
                    "col": col
                };

                $.ajax({
                    data: parametros,
                    url: '../facturacion/buscarhisfac.php',
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
            //aca para ver las facturadas se expande
            function ajax_itemfactura(id_fac, quien, fecha_desde, fecha_hasta) {
                var id_fac = id_fac;

                var parametros = {
                    "id_fac": id_fac,
                    "quien": quien,
                    "fecha_desde": fecha_desde,
                    "fecha_hasta": fecha_hasta
                };

                $.ajax({
                    data: parametros,
                    url: 'factuasechas.php',
                    type: 'POST',
                    beforeSend: function() {
                        // Mostrar un mensaje de carga
                        $("#muestrafac" + id_fac).html('<span class="text-muted">Cargando...</span>');
                        console.log("Enviando datos al servidor...");
                    },
                    success: function(response) {
                        // Cuando llega la respuesta, se muestra
                        $("#muestrafac" + id_fac).html(response);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", error);
                        $("#muestrafac" + id_fac).html('<span class="text-danger">Error al cargar.</span>');
                    }
                });
            }
        </script>
    <?php }
include('../template/pie.php'); ?>