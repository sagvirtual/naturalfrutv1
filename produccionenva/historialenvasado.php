<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

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

if ($tipo_usuario == "0" || $tipo_usuario == "21" || $tipo_usuario == "30") {
?>
    <html lang="es">

    <head>
        <title>Historial Envasado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php




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
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT * FROM $fromes Where id_producto!='0' and listo='1' and  numero!='0' $sqlp and fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha DESC");

        while ($roworden = mysqli_fetch_array($sqlordenc)) {
            $id = $roworden['id'];
            $horalisto = $roworden['hora'];
            $numero = $roworden['numero'];
            $salida = $roworden['salida'];
            if ($horalisto > "00:00:00") {
                $horalisto = $roworden['hora'];
            } else {
                $horalisto =  "";
            }

            if ($salida > 0) {
                $versali = 'Salida&nbsp;Nº' . $salida;
            } else {
                $versali = '';
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
      <td class="text-center">' . $versali . '</td>
      <td class="text-center">  ' . date('d/m/y', strtotime($fecha)) . '</td>
      <td class="text-center">  ' . $horalisto . '</td>
      <td class="text-center"><b>Nº' . $numero . '</b></td>
      <td>' . $nombrepro . '</td>
      <td class="text-center"><b>' . $CantKilos . '&nbsp;Kg.</b></td>
      </tr>';
        }
    }


    ?>






    <!-- envasado ordenes -->
    <!-- Start row -->
    <div class="container text-center">
        <div class="row">




            <!-- Start col -->
            <div class="col-lg-12 col-xl-12" style="cursor: pointer;">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="ecom-dashboard-widget">
                            <div class="media">

                                <i class="fa fa-file-excel-o"></i></a>
                                <div class="media-body">
                                    <h5>Envasado Ordenes Planta Baja <button onclick="window.close();" class="btn  btn-danger" style="position: relative; float:right;  ">
                                            Cerrar
                                        </button></h5>
                                    <h3>
                                        <?php
                                        $sector = '21';

                                        ?>
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
                                        <th scope="col" class="text-center">Salida</th>
                                        <th scope="col" class="text-center">Fecha</th>
                                        <th scope="col" class="text-center">Hora</th>
                                        <th scope="col" class="text-center">Orden</th>
                                        <th scope="col" class="text-center">Productos</th>
                                        <th scope="col" class="text-center">Kilos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $hasta = date("Y-m-d");                     // Hoy
                                    $desde = date("Y-m-d", strtotime("-3 days")); // Tres días atrás

                                    itemordenes($rjdhfbpqj, $desde, $hasta, $sector, $id_producto);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->




    </div>

<?php }
