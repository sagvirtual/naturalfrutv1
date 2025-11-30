<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');


$_SESSION['desde'] = $_POST['desde'];
$_SESSION['hasta'] = $_POST['hasta'];



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
?>


    <?php

    function trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro)
    {
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT id_rubro,fecha,nota,valor FROM prodcom Where id_rubro >' 0'and id_rubro='$id_rubro' and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC");
        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $nota = $roworden['nota'];
            $id_rubro = $roworden['id_rubro'];
            $valor = number_format($roworden['valor'], 0, ',', '.');
            $fechapago = $roworden['fecha'];

            echo '
    
       <tr>
          <td class="text-center">  ' . date('d/m/y', strtotime($fechapago)) . '</td>
          <td>' . $nota . '</td>
          <td class="text-center">$' . $valor . '</td>
          </tr>';
        }
    }


    function totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro)
    {
        $valor = 0;
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT valor,id_rubro FROM prodcom Where id_rubro >' 0' and id_rubro='$id_rubro' and fecha BETWEEN '$desde' AND '$hasta'");
        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $valor += $roworden['valor'];
        }
        return  $valor;
    }

    function ocultarNumero($numero)
    {
        $numero = number_format($numero, 0, '', '.'); // Formatea el número con puntos
        $partes = explode('.', $numero);

        $resultado = [];
        foreach ($partes as $parte) {
            $resultado[] = str_repeat('*', strlen($parte)); // Reemplaza cada parte por asteriscos
        }

        return implode('.', $resultado);
    }
    ?>


    <style>
        .monto {
            font-size: 1.2em;
            cursor: pointer;
            user-select: none;
        }

        .ojo {
            cursor: pointer;
            margin-left: 5px;
        }
    </style>


    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <form action="/gastos/" method="post" class="form-inline">
                    <div class="form-group mb-3">
                        <label for="staticEmail2" style="padding-right: 20;">Desde: &nbsp;</label>
                        <input type="date" id="desde" name="desde" value="<?= $desde ?>" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-3">
                        <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: &nbsp; </label>
                        <input type="date" id="hasta" name="hasta" value="<?= $hasta ?>" class="form-control">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button type="submit" class="btn btn-primary">Ver Info</button>
                    </div>





                </form>



            </div>


        </div>
    </div>

    <div class="contentbar">
        <!-- Start row -->
        <div class="row">


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Insumos</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '2';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Combustible</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '6';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->







            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Comida</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '7';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->




            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Adelanto</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '9';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Liquidación</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '10';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->



            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Premio</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '11';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Servicios</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '1';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Impuestos</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '12';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Reparaciones</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '4';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Alquileres</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '3';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Multas</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '13';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->


            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Otros</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '5';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->



            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Retiro</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '8';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        // echo '$'. number_format($totalinsumos, 0, ',', '.').'';

                                        $montoFormateado = number_format($totalinsumos, 0, '', '.'); // Para mostrarlo al revelar
                                        $numeroOculto = ocultarNumero($totalinsumos);


                                        ?>
                                        <span onclick="toggleMonto()" id="monto" class="monto"><?php echo $numeroOculto; ?></span>




                                        <script>
                                            let oculto = true;
                                            const montoElemento = document.getElementById('monto');
                                            const montoReal = "<?php echo $montoFormateado; ?>";
                                            const montoOculto = "<?php echo $numeroOculto; ?>";

                                            function toggleMonto() {
                                                oculto = !oculto;
                                                montoElemento.textContent = oculto ? montoOculto : montoReal;
                                            }
                                        </script>

                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->

            <!-- Start col -->
            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">
                                <i class="ri-wallet-line"></i>
                                <div class="media-body">
                                    <h5>Preventa</h5>
                                    <h3>
                                        <?php
                                        $id_rubro = '14';

                                        $totalinsumos = totalgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                        echo '$' . number_format($totalinsumos, 0, ',', '.') . '';


                                        ?>




                                        <button type="button" data-toggle="collapse" data-target="#collapseExample<?= $id_rubro ?>" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-light text-muted btn-sm float-right font-12">Ver detalle</button>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="collapse" id="collapseExample<?= $id_rubro ?>">
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Detalle</th>
                                        <th scope="col" class="text-center">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    trgastos($rjdhfbpqj, $desde, $hasta, $id_rubro);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->



        </div>
        <!-- End row -->
    </div>







<?php }
include('../template/pie.php'); ?>