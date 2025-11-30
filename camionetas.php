<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="feather icon-truck"></i> Listado de Camionetas</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lcamionetas"><button class="btn btn-primary"><i class="feather icon-truck"></i> Agregar Camioneta</button></a>
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
        <div class="col-lg-6">
            <div class="card m-b-30">
       
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas ORDER BY `camionetas`.`id` ASC");
                                while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                                    $id = $rowcamionetas["id"];
                                    $fila = $fila + 1;
                                    $idcod = base64_encode($id);
                                    $ubicacion = $rowcamionetas["ubicacion"];
                                    $estado = $rowcamionetas["estado"];
                                    if ($estado == "0") {
                                        $estados = "";
                                    } else {
                                        $estados = '<p style="color:red;">Inactivo';
                                    }

                                    echo '<tr data-index="' . $rowcamionetas['id'] . '" data-position="' . $rowcamionetas['position'] . '" style="cursor:move;">
                                              
                                                <td style="color: black;">' . $rowcamionetas["nombre"] . ' '.$estados.'</td>
                                               
                                                <td>
                                                    <div class="button-list">
                                                        <a href="/lcamionetas?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>';

                                                  
                                                        if ($id!='1') {
                                                        echo' <a href="javascript:eliminar(' . "'/lcamionetas/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';}

                                                   echo' </div>
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

