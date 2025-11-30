<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');

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



if ($tipo_usuario == "0") {


    function viaweb($rjdhfbpqj, $desde, $hasta, $porcentajed)
    {

        $sqlodrddenc = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where responsable='99999' and fecha BETWEEN '$desde' AND '$hasta'");
        $canverificd = mysqli_num_rows($sqlodrddenc);



        $sqlodrdenc = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  responsable='99999' and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
        $canverificafin = mysqli_num_rows($sqlodrdenc);




        //$porcentaje = $porcentajed - 100;
        $porcentaje = 100 - $porcentajed;


        $sqlodrddd = mysqli_query($rjdhfbpqj, "
    SELECT 
        orden.id AS id_orden,
        orden.fecha AS fecha_orden,
        orden.responsable AS resp_orden,
        item_orden.id AS id_item,
        item_orden.id_producto,
        item_orden.kilos,
        item_orden.modo,
        item_orden.responsable AS resp_item
    FROM orden
    INNER JOIN item_orden 
        ON orden.id = item_orden.id_orden
    WHERE 
        orden.responsable = '99999'
        AND item_orden.kilos > '0'
        AND item_orden.modo = '0'
        AND orden.fecha BETWEEN '$desde' AND '$hasta'
    ORDER BY orden.fecha ASC
");



        // $sqlodrddd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where  kilos > '0' and responsable='0' and modo='0' and fecha BETWEEN '$desde' AND '$hasta'");
        $canverifiddcafin = mysqli_num_rows($sqlodrddd);

        echo '
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <div class="border-primary border rounded text-center py-3 mb-3">

                                        <h2 class="card-title text-dark mb-1">' . number_format($canverificafin, 0, ',', '.') . '</h2> 
                                        <p class="text-primary mb-0">' .  number_format($canverifiddcafin, 0, ',', '.') . ' Items</p>
                                    </div>
                                
                                </div>
                                <div class="col-6 col-lg-9">
                                    <div class="border-warning  rounded text-center py-3  mb-3">
                                        <h5 style="color:orange;">CARGADO POR LOS CLIENTES <span class="float-right">' .  round($porcentaje, 2) . '%</span></h5>
                                        <div class="progress mb-3" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: ' . $porcentaje . '%;" aria-valuenow="' . $porcentaje . '" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            ';
    }


?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
    // los item individuales
    function trkilos($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
    {
        $CantKilos = 0;

        if (!empty($id_producto)) {
            $sqlp = " and id_producto='" . $id_producto . "'";
        }
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM producion_env Where  sector='$sector' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $id = $roworden['id'];
            $hora = $roworden['hora'];
            $id_producto = $roworden['id_producto'];
            $CantKilos = ${"CantKilos" . $id};

            $CantKilos = $roworden['CantStock'];
            $fecha = $roworden['fecha'];
            $nombrepro = funcNomProd($rjdhfbpqj, $id_producto);
            echo '
    
       <tr>
          <td class="text-center">  ' . date('d/m/y', strtotime($fecha)) . '</td>
          <td class="text-center">' . $hora . '</td>
          <td>' . $nombrepro . '</td>
          <td class="text-center"><b>' . $CantKilos . '&nbsp;Kg.</b></td>
          </tr>';
        }
    }


    function totalproduciom($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
    {
        $valor = 0;
        if (!empty($id_producto)) {
            $sqlp = " and id_producto='" . $id_producto . "'";
        }

        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM producion_env Where sector='$sector' $sqlp and fecha BETWEEN '$desde' AND '$hasta'");
        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $valor += $roworden['CantStock'];
        }
        return  $valor;
    }


    ?>

    <META HTTP-EQUIV="REFRESH" CONTENT="22">

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <form action="/balanceingreosno/" method="post" class="form-inline">
                    <div class="form-group mb-3">
                        <label for="staticEmail2" style="padding-right: 20;">Desde: &nbsp;</label>
                        <input type="date" id="desde" name="desde" value="<?= $desde ?>" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-3">
                        <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: &nbsp; </label>
                        <input type="date" id="hasta" name="hasta" value="<?= $hasta ?>" class="form-control">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-primary">Ver Info</button>

                </form>



            </div>
        </div>


    </div><br>

    <!-- nuevo -->




    <?php

    function cantitem($rjdhfbpqj, $idorden)
    {



        $cantidaditem = 0;
        $sqlodrddenc = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden='$idorden'");
        while ($rdndsd = mysqli_fetch_array($sqlodrddenc)) {
            $presentacion = $rdndsd['presentacion'];
            $tipounidad = $rdndsd['tipounidad'];
            $cantidaditem += $rdndsd['kilos'];

            if ($tipounidad == 1) {
                $cantidaditem = $cantidaditem * $presentacion;
            } else {
                $cantidaditem = $cantidaditem;
            }
        }
        return $cantidaditem;
    }

    ?>


    <!-- Start col -->
    <div class="col-lg-12 col-xl-8">
        <div class="card m-b-30">
            <div class="card-header text-center">
                <h5 class="card-title mb-0">Balance de Pedidos Realizados</h5>
            </div>

            <div class="card-body">

                <?php

                $sqlodrddenc = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
                $canverificd = mysqli_num_rows($sqlodrddenc);
                while ($rdnedsd = mysqli_fetch_array($sqlodrdenc)) {

                    $responsable = $rdnedsd['responsable'];
                }







                //construyo la sentencia SQL
                $sqllogins = mysqli_query($rjdhfbpqj, "SELECT id,nom_contac FROM usuarios Where estado='0' ORDER BY nom_contac ASC");
                while ($rowusuarios = mysqli_fetch_array($sqllogins)) {

                    $id_usuarioclav = $rowusuarios['id'];
                    $nombre = strtoupper($rowusuarios['nom_contac']);

                    $sqlodrddd = ${"sqlodrddd" . $id_usuarioclav};
                    $canverifiddcafin = ${"canverifiddcafin" . $id_usuarioclav};

                    $sqlodrdenc = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  responsable=' $id_usuarioclav' and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
                    $canverificafin = mysqli_num_rows($sqlodrdenc);
                    while ($rdndsd = mysqli_fetch_array($sqlodrdenc)) {
                        $responsable = $rdndsd['responsable'];
                        $idorden = $rdndsd['id'];
                        $cantidaditem = 0;
                    }





                    $porcentaje = ($canverificafin / $canverificd) * 100;


                    if ($responsable == $id_usuarioclav) {

                        $sqlodrddd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where  kilos > '0' and responsable=' $id_usuarioclav' and fecha BETWEEN '$desde' AND '$hasta'");
                        $canverifiddcafin = mysqli_num_rows($sqlodrddd);

                        echo '
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <div class="border-primary border rounded text-center py-3 mb-3">

                                        <h2 class="card-title text-dark mb-1">' . number_format($canverificafin, 0, ',', '.') . '</h2> 
                                        <p class="text-primary mb-0">' .  number_format($canverifiddcafin, 0, ',', '.') . ' Items</p>
                                    </div>
                                
                                </div>
                                <div class="col-6 col-lg-9">
                                    <div class="border-warning  rounded text-center py-3  mb-3">
                                        <h5>' . $nombre . ' <span class="float-right">' .  round($porcentaje, 2) . '%</span></h5>
                                        <div class="progress mb-3" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: ' . $porcentaje . '%;" aria-valuenow="' . $porcentaje . '" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            ';
                        $porcentajed += $porcentaje;
                    }
                }
                ///via web
                viaweb($rjdhfbpqj, $desde, $hasta, $porcentajed);

                $sqlodrdeenc = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where  responsable='99999' and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
                $canverdificafin = mysqli_num_rows($sqlodrdeenc);

                $canverificd = $canverdificafin + $canverificd;
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
                                    echo '' .  number_format($canverificd, 0, ',', '.') . '';


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












<?php }
include('../template/pie.php'); ?>