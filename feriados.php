<?php include('f54du60ig65.php');
include('template/cabezal.php');
$fedecofr=base64_decode($_GET['hdnsbloekdjgsd']);
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="fa fa-calendar"></i> Listado de días no laborables</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lferiados"><button class="btn btn-primary"><i class="fa fa-calendar"></i> Agregar Día</button></a>
            </div>
        </div>
    </div>
</div>


<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-10">

            <div class="card m-b-30">
     

                <div class="card-body">
                    <div class="table-responsive">
                    <? if($_GET['alert']=='1'){?>
        <div class="alert alert-danger" role="alert">
            El día <?=date("d/m/Y",strtotime($fedecofr))?> no puede ser no laborable, se detectaron Pedidos para esa fecha <a href="..//hoja_de_ruta/ver_hoja_de_ruta?hdnsbloekdjgsd=<?= $_GET['hdnsbloekdjgsd'] ?>&hdnskdjjgsd=<?= $_GET['hdnskdjjgsd'] ?>" class="alert-link">click para ver</a> .
        </div>
        <? } ?>
                        <table class="table table-borderless">
                            <thead>
                                <tr>

                                    <th>Fecha</th>
                                    <th>Motivo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlferiados = mysqli_query($rjdhfbpqj, "SELECT * FROM feriados  Where fecha >='$fechahoy' ORDER BY `feriados`.`fecha`");
                                while ($rowferiados = mysqli_fetch_array($sqlferiados)) {
                                    $id = $rowferiados["id"];
                                    $idcod = base64_encode($id);
                                    $titulo = $rowferiados["titulo"];
                                    $fecha = $rowferiados["fecha"];
                                    $primero = 1 + $primero;

                                    $agran = ${"agran" . $id};

                                    if ($primero == '1') {
                                        $agran = ' font-size:20pt;font-weight: bold; background-color: #ffcc00;';
                                    }

                                    echo '<tr>
                                              
                                    <td style="color: black; ' . $agran . '"> ' . date('d/m/Y', strtotime($rowferiados["fecha"]))  . '</td>
                                                <td style="color: black; ' . $agran . '">' . $rowferiados["titulo"] . '</td>
                                               
                                               
                                                <td style="color: black; ' . $agran . '">
                                                    <div class="button-list">
                                                        <a href="/lferiados?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>';


                                    echo ' <a href="javascript:eliminar(' . "'/lferiados/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';

                                    echo ' </div>
                                                </td>
                                              </tr>';
                                }
                                mysqli_close($rjdhfbpqj);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->















        <?php include('template/pie.php'); ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>