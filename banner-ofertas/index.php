<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');


if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];

        $rjdhfbpqj->query("UPDATE banneroferta SET position = '$newPosition' WHERE id='$index'");
    }

    exit('success');
}
$timean = date("His");
$refresko =  "?" . $timean;


?>



<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title"> <i class="mdi mdi-camera-burst"></i> Banner Ofertas</h4>

        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">

                    <div class="form-row">

                        <table>
                            <?php
                         
                         $sqlbanner=mysqli_query($rjdhfbpqj,"SELECT * FROM banneroferta ORDER BY position ASC");
                         while ($rowbanner = mysqli_fetch_array($sqlbanner)){
                            $idcod=base64_encode($rowbanner['id']);

                            echo '
                            <tr  data-index="' . $rowbanner['id'] . '" data-position="' . $rowbanner['position'] . '" style="cursor:move;">
                            <td>
                            <div class="form-group col-md-12"><br>
                            <img src="https://pedidos.naturalfrut.com.ar/banner-ofertas/'.$rowbanner['id'].''.$refresko.'" style="width: auto; height:200px"><br>
                            <a href="javascript:eliminar(' . "'https://pedidos.naturalfrut.com.ar/banner-ofertas/mlkdths?" . 'juhytm=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                            </div>
                            </td>
                            </tr>
                            
                            ';
                         }
                         
                        ?>

                        </table>




                    </div>
                </div>
                <form action="https://pedidos.naturalfrut.com.ar/banner-ofertas/insert_banner.php" id="formda"
                    name="formda" method="post" enctype="multipart/form-data" target="_parent">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">Cargar foto Banner de Ofertas</h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group mb-0">
                                    <input type="file" class="form-control-file" id="file" name="file">
                                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Guardar Foto" />
                                </div>
                            </div>
                        </div>
                    </div>

                </form>







            </div>
        </div>
        <!-- End col -->




        <script src="ajax_camionetas.js"></script>
        <?php include('../template/pie.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

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
                url: 'index.php',
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