<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);


$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = '$id'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $id = $rowcamionetas["id"];
    $nombre = $rowcamionetas["nombre"];
    $ubicacion = $rowcamionetas["ubicacion"];
    $estado = $rowcamionetas["estado"];
    if ($estado == "0") {
        $selectea = "selected";
    } else {
        $selectea = "";
    }
    if ($estado == "1") {
        $selecteb = "selected";
    } else {
        $selectea = "";
    }
}
mysqli_close($rjdhfbpqj);
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="feather icon-truck"></i> Nueva Camioneta</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/camionetas"> <button class="btn btn-primary"><i class="feather icon-truck"></i> Listar Camionetas</button></a>
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



                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nombre de la Camioneta</label>
                            <input type="text" class="form-control" id="nombre" value="<?= $nombre ?>" require>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Estado</label>
                            <select class="custom-select" id="estado">
                                <option value="0" <?=$selectea?>>Activo</option>
                                <option value="1" <?=$selecteb?>>Inactivo</option>
                            </select>
                        </div> 
                        <input type="hidden" name="estado" id="estado" value="0">


                    </div>






                    <div id="muestrocamionetas"> </div>

                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_camionetas($('#jfndhom').val(), $('#nombre').val(), $('#ubicacion').val(), $('#estado').val());" value="Guardar Datos" />

                </div>
            </div>
        </div>
        <!-- End col -->




        <script src="ajax_camionetas.js"></script>
        <?php include('../template/pie.php'); ?>