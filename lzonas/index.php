<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);


$sqlzona = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$id'");
if ($rowzona = mysqli_fetch_array($sqlzona)) {
    $id = $rowzona["id"];
    $nombre = $rowzona["nombre"];
    $ubicacion = $rowzona["ubicacion"];
    $estado = $rowzona["estado"];
}
mysqli_close($rjdhfbpqj);
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-cutlery"></i> Nueva Zona</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/zonas"> <button class="btn btn-primary"><i class="dripicons-cutlery"></i> Listar Zonas</button></a>
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
                <div class="card-header">
                    <h5 class="card-title">Datos</h5>
                </div>
                <div class="card-body">

                    <div class="form-row">



                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Sigla</label>
                            <input type="text" class="form-control" id="nombre" value="<?= $nombre ?>" require>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="inputEmail4">Detalle</label>
                            <input type="text" class="form-control" id="estado" value="<?= $estado ?>" require>
                        </div>


                    </div>






                    <div id="muestrorubros"> </div>

                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                    <input type="button" name="submit"  class="btn btn-primary" onclick="ajax_rubros($('#jfndhom').val(), $('#nombre').val(), $('#ubicacion').val(), $('#estado').val());" value="Guardar Datos"  />

                </div>
            </div>
        </div>
        <!-- End col -->




        <script src="ajax_rubros.js"></script>
        <?php include('../template/pie.php'); ?>