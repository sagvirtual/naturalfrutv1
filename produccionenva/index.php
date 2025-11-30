<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');
include('../funciones/funcNomProd.php');

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

    /* ordenes */
    function totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
    {

        if ($sector == '21') {
            $fromes = 'itemenvas';
        }
        if ($sector == '22') {
            $fromes = 'itemenvasa';
        }




        $cantidad = 0;
        if (!empty($id_producto)) {
            $sqlp = " and id_producto='" . $id_producto . "'";
        }

        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM $fromes Where id_producto!='0' and  numero!='0' and listo='1' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ");
        $canverificafin = mysqli_num_rows($sqlordenc);
        while ($roworden = mysqli_fetch_array($sqlordenc)) {

            $id_productov =  $roworden['id_producto'];
            $presentacion = funcNombulto($rjdhfbpqj, $id_productov);

            if ($roworden['unidad'] != "Kg.") {
                $cantidad += $roworden['cantidad'] * $presentacion;
            } else {


                $cantidad += $roworden['cantidad'];
            }
        }
        $catru = number_format($cantidad, 0, ',', '.');
        $cantidadc = $catru . " Kg. - Productos " . $canverificafin;
        return  $cantidadc;
    }
    /* item ordenes */

    function itemordenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto)
    {
        if ($sector == '21') {
            $fromes = 'itemenvas';
        }
        if ($sector == '22') {
            $fromes = 'itemenvasa';
        }


        $CantKilos = 0;

        if (!empty($id_producto)) {
            $sqlp = " and id_producto='" . $id_producto . "'";
        }
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM $fromes Where id_producto!='0' and listo='1' and  numero!='0' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha,numero ASC");

        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $id = $roworden['id'];
            $horalisto = $roworden['hora'];
            $numero = $roworden['numero'];
            if ($horalisto > "00:00:00") {
                $horalisto = $roworden['hora'];
            } else {
                $horalisto =  "";
            }



            $id_producto = $roworden['id_producto'];
            $presentacion = funcNombulto($rjdhfbpqj, $id_producto);
            $CantKilos = ${"CantKilos" . $id};
            if ($roworden['unidad'] != "Kg.") {
                $CantKilos += $roworden['cantidad'] * $presentacion;
            } else {


                $CantKilos += $roworden['cantidad'];
            }

            $fecha = $roworden['fecha'];
            $nombrepro = funcNomProd($rjdhfbpqj, $id_producto);
            echo '

   <tr>
      <td class="text-center">  ' . date('d/m/y', strtotime($fecha)) . '</td>
      <td class="text-center">  ' . $horalisto . '</td>
      <td class="text-center">' . $numero . '</td>
      <td>' . $nombrepro . '</td>
      <td class="text-center"><b>' . $CantKilos . '&nbsp;Kg.</b></td>
      </tr>';
        }
    }


    ?>



    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <form action="/produccionenva/" method="post" class="form-inline">
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
            <? if (!empty($id_producto)) { ?>

                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="?vertodo=1"><button type="buttom" class="btn btn-primary">Ver todos los Productos</button></a>

            <? } ?>
        </div>
        <div class="col-md-4 col-lg-4">
            <?php

            include('inpubuscado.php');




            ?>
        </div>


    </div><br>
    <!-- Start row -->
    <div class="row">


        <!-- Start col -->
        <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="ecom-dashboard-widget">
                        <div class="media">
                            <a href="excel_espa.php?modulo=1&desde=<?= $desde ?>&hasta=<?= $hasta ?>&id_producto=<?= $id_producto ?>" title="Descargar Excel" target="_blank">
                                <i class="fa fa-file-excel-o"></i></a>
                            <div class="media-body">
                                <h5>Envasado Stock Planta Alta</h5>
                                <h3>
                                    <?php
                                    $sectorb = '22';

                                    $totalproducb = totalproduciom($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                                    echo '' . number_format($totalproducb, 0, ',', '.') . ' Kg.';


                                    ?>

                                    <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sectorb ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button>
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
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Hora</th>
                                    <th scope="col" class="text-center">Productos</th>
                                    <th scope="col" class="text-center">Kilos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                trkilos($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->


        <!-- Start col -->
        <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="ecom-dashboard-widget">
                        <div class="media">
                            <a href="excel_espa.php?modulo=2&desde=<?= $desde ?>&hasta=<?= $hasta ?>&id_producto=<?= $id_producto ?>" title="Descargar Excel" target="_blank">
                                <i class="fa fa-file-excel-o"></i></a>
                            <div class="media-body">
                                <h5>Envasado Stock Planta Baja</h5>
                                <h3>
                                    <?php
                                    $sector = '21';

                                    $totalproduc = totalproduciom($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                                    echo '' . number_format($totalproduc, 0, ',', '.') . ' Kg.';


                                    ?>

                                    <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sector ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button>
                                </h3>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="collapse show" id="collapseExample<?= $sector ?>">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Hora</th>
                                    <th scope="col" class="text-center">Productos</th>
                                    <th scope="col" class="text-center">Kilos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                trkilos($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->




    </div>

    <!-- envasado ordenes -->
    <!-- Start row -->
    <div class="row">


        <!-- Start col -->
        <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="ecom-dashboard-widget">
                        <div class="media">
                            <a href="excel_espa.php?modulo=3&desde=<?= $desde ?>&hasta=<?= $hasta ?>&id_producto=<?= $id_producto ?>" title="Descargar Excel" target="_blank">
                                <i class="fa fa-file-excel-o"></i></a>
                            <div class="media-body">
                                <h5>Envasado Ordenes Planta Alta</h5>
                                <h3>
                                    <?php
                                    $sectorb = '22';

                                    $totalproducb = totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                                    echo '' . $totalproducb . '';


                                    ?>

                                    <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sectorb ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button>
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
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Hora</th>
                                    <th scope="col" class="text-center">Nº Orden</th>
                                    <th scope="col" class="text-center">Productos</th>
                                    <th scope="col" class="text-center">Kilos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                itemordenes($rjdhfbpqj, $desde, $hasta, $sectorb, $id_producto);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->


        <!-- Start col -->
        <div class="col-lg-12 col-xl-6" style="cursor: pointer;">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="ecom-dashboard-widget">
                        <div class="media">
                            <a href="excel_espa.php?modulo=4&desde=<?= $desde ?>&hasta=<?= $hasta ?>&id_producto=<?= $id_producto ?>" title="Descargar Excel" target="_blank">
                                <i class="fa fa-file-excel-o"></i></a>
                            <div class="media-body">
                                <h5>Envasado Ordenes Planta Baja</h5>
                                <h3>
                                    <?php
                                    $sector = '21';

                                    $totalproduc = totalproduciomOrdenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                                    echo '' . $totalproduc . '';

                                    ?>

                                    <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $sector ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Detalle</button>
                                </h3>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="collapse show" id="collapseExample<?= $sector ?>">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Hora</th>
                                    <th scope="col" class="text-center">Nº Orden</th>
                                    <th scope="col" class="text-center">Productos</th>
                                    <th scope="col" class="text-center">Kilos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                itemordenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->




    </div>

<?php }
include('../template/pie.php'); ?>