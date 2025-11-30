<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$buscarfe = $_POST['buscarfe'];
$buscarfeh = $_POST['buscarfeh'];

if (empty($buscarfe)) {
    $buscarfe = $fechahoy;
}

if (empty($buscarfeh)) {
    $buscarfeh = $fechahoy;
}

?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos Repetidos</h4>

        </div>

        <div class="col-md-4 col-lg-2">
            <div class="input-group" style="background-color: white;">









            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">





            <div class="col-lg-10">
                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="table-responsive">


                            <form action="repprod_pa" method="post">




                                <div class="form-row align-items-center">

                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Fecha Desde </div>
                                            </div>
                                            <input type="date" name="buscarfe" id="buscarfe" value="<?= $buscarfe ?>" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-auto">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">hasta</div>
                                            </div>
                                            <input type="date" name="buscarfeh" id="buscarfeh" value="<?= $buscarfeh ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary" style="position: relative; top:-5px;">Buscar</button>
                                    </div>

                                </div>


                            </form>



                            <table id="default-datatable" class="table table-bordered table-striped"> 
                                <thead>
                                    <tr>

                                        <th style="text-align:center;width: 100px;">Fecha</th>
                                        <th style="text-align:center;">Orden</th>
                                        <th style="text-align:center;">Hora</th>
                                        <th style="text-align:center;">Producto</th>
                                        <th style="text-align:center;">Cantidad</th>
                                        <th style="text-align:center;">Unidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
// $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar WHERE fecha = '$fechahoy' AND sinstock = '0' ORDER BY producto DESC");

$sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar WHERE fecha BETWEEN '$buscarfe' and '$buscarfeh' AND sinstock = '0' AND producto IN (SELECT producto FROM itembajar WHERE fecha BETWEEN '$buscarfe' and '$buscarfeh' AND sinstock = '0' GROUP BY producto HAVING COUNT(*) > 1) ORDER BY producto,id ASC");

// Arreglo para almacenar los colores
$colores = array('red', 'blue', 'green', '#E48000', 'purple'); // Puedes agregar más colores si lo deseas

// Variable para llevar el seguimiento del grupo actual
$grupo_actual = null;

while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
    $sinstockd = $rowordentd['sinstock'];
    $producto = $rowordentd['producto'];

    // Verificar si el producto pertenece a un nuevo grupo
    if ($producto != $grupo_actual) {
        // Obtener un color diferente para este grupo
        $color = array_shift($colores);
        // Si se agotan los colores, reiniciar el ciclo
        if (!$color) {
            $colores = array('red', 'blue', 'green', '#E48000', 'purple');
            $color = array_shift($colores);
        }
        $grupo_actual = $producto;
    }

    /* hora orden */
    $idordeen = $rowordentd['id_orden'];
    $sqlordenbajar = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar Where id = '$idordeen'and  preparado !='99'");
    if ($rowordenbajar = mysqli_fetch_array($sqlordenbajar)) {
        $hora = $rowordenbajar["hora"];
        $numeroor = $rowordenbajar["numero"];

        echo '
            <tr>
                <td style="text-align:center;">' . date('d/m/Y', strtotime($rowordentd['fecha'])) . '</td>
                <td style="text-align:center;">Nº&nbsp;' . $numeroor . '</td>
                <td style="text-align:center; color:' . $color . ';">' . $hora . '&nbsp;hs.</td>
                <td style="color:' . $color . ';"><strong>' . $producto . '</strong></td>
                <td style="text-align:center;color:' . $color . ';"><strong> ' . $rowordentd['cantidad'] . '</strong></td>
                <td style="text-align:center;color:' . $color . ';"> ' . $rowordentd['unidad'] . '</td>
            </tr>
        ';
    }
}
?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


<?php

/* date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$horadd = date("H:i:s");
$iptrr = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['REMOTE_ADDR'];

 $sqlvisualizacion = "INSERT INTO `visualizacion` (ip, fecha, hora, quin, origen, ordigen) VALUES ('$iptrr', '$fechahoy', '$horadd', '$quin', 'repetidos', '$ordigen');";
 mysqli_query($rjdhfbpqj, $sqlvisualizacion) or die(mysqli_error($rjdhfbpqj));
  */
?>



    <?php include('../template/pie.php'); ?><!-- 
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->