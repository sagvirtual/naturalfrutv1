<?php include('f54du60ig65.php');
include('template/cabezal.php');


?>

<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-cutlery"></i> Listado de Listas de precios</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lrubros"><button class="btn btn-primary"><i class="dripicons-cutlery"></i> Agregar Lista de Precios</button></a>
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
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros ORDER BY `rubros`.`id` ASC");
                                while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                                    $id = $rowrubros["id"];
                                    $fila = $fila + 1;
                                    $idcod = base64_encode($id);
                                    $ubicacion = $rowrubros["ubicacion"];
                                    $estado = $rowrubros["estado"];
                                    if ($estado == "0") {
                                        $estados = "Activo";
                                    } else {
                                        $estados = "Inactivo";
                                    }

                                    echo '<tr data-index="' . $rowrubros['id'] . '" data-position="' . $rowrubros['position'] . '" style="cursor:move;">
                                              
                                                <td style="color: black;">' . $rowrubros["nombre"] . '</td>
                                                <td>' . $estados . '</td>
                                                <td>
                                                    <div class="button-list">
                                                        <a href="/lrubros?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        
                                                        
                                                        ';

                                                      /*   $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_rubro$fila='1'");
                                                        if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {}
                                                       else{ 
                                                        echo' <a href="javascript:eliminar(' . "'/lrubros/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';} */

                                                   echo' 
                                                   
                                                   </div>
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
        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <!-- End col -->















        <?php include('template/pie.php'); ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

