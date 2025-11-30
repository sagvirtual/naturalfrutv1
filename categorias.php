<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');
if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE categorias SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-book-read-line"></i> Listado de Categorías</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href=" 
            <?php
             
             echo'../listadeprecio/listaedit?jfndhom='.$_SESSION['jfnddhom'].'&pagina='.$_SESSION['pagina'].'&busquedads='.$_SESSION['busquedads'].'';
             
            ?>
            " 
            ><button type="button" class="btn btn-round btn-dark"><i class="fa fa-close"></i></button>
            &nbsp;   &nbsp;   &nbsp;   &nbsp;
                <a href="/lcategorias"><button class="btn btn-primary"><i class="ri-book-read-line"></i> Agregar Categorías</button></a>
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
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `position` ASC");
                                while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                    $id = $rowcategorias["id"];
                                    $fila = $fila + 1;
                                    $idcod = base64_encode($id);
                                    $ubicacion = $rowcategorias["ubicacion"];
                                    $estado = $rowcategorias["estado"];
                                    if ($estado == "0") {
                                        $estados = "Activo";
                                    } else {
                                        $estados = "Inactivo";
                                    }

                                    echo '<tr data-index="' . $rowcategorias['id'] . '" data-position="' . $rowcategorias['position'] . '" style="cursor:move;">
                                              
                                                <td style="color: black;">' . $rowcategorias["nombre"] . '</td>
                                                <td>' . $estados . '</td>
                                                <td>
                                                    <div class="button-list">
                                                        <a href="/lcategorias?jfndhom=' . $idcod . '" class="btn btn-success-rgba" title="Editar Categoría"><i class="ri-pencil-line"></i></a>';

                                                        $sqlproductos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where categoria = '$id'");
                                                        if ($rowproductos = mysqli_fetch_array($sqlproductos)){}else{

                                                        echo'<a href="javascript:eliminar(' . "'/lcategorias/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';
                                                        }


                                                  echo'  </div>
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
                    url: 'categorias.php',
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