<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE zona SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}

?>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-cutlery"></i> Listado de Zonas</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lzonas/"><button class="btn btn-primary"><i class="dripicons-cutlery"></i> Agregar Zonas</button></a>
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
                                    <th>Detalle</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM zona ORDER BY `zona`.`position` ASC");
                                while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                                    $id = $rowrubros["id"];
                                    $fila = $fila + 1;
                                    $idcod = base64_encode($id);
                                    $ubicacion = $rowrubros["ubicacion"];
                                    $estado = $rowrubros["estado"];

                                    echo '<tr data-index="' . $rowrubros['id'] . '" data-position="' . $rowrubros['position'] . '" style="cursor:move;">
                                              
                                                <td style="color: black;">' . $rowrubros["nombre"] . ' </td>
                                                <td>' . $rowrubros["estado"] . '</td>
                                                <td>
                                                    <div class="button-list">
                                                        <a href="/lzonas/?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        
                                                        
                                                        ';

                                                      $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where zona='1'");
                                                        if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {}
                                                       else{ 
                                                        echo' <a href="javascript:eliminar(' . "'/lzonas/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';} 

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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('table tbody').sortable({
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-position') != (index + 1)) {
                                $(this).attr('data-position', (index + 1)).addClass('updated');
                            }
                        });

                        saveNewPositions();
                    }
                });
            });

            function saveNewPositions() {
                var positions = [];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: 'zonas.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update: 1,
                        positions: positions
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        </script>