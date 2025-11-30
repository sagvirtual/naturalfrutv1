<?php include('../f54du60ig65.php');
include('../template/cabezal.php'); ?>

<?php
$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);


$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM feriados Where id = '$id'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $id = $rowcamionetas["id"];
   
    $titulo = $rowcamionetas["titulo"];
    $fechafer = $rowcamionetas["fecha"];
}
mysqli_close($rjdhfbpqj);
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="fa fa-calendar"></i> Nuevo día no laborables</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/feriados"> <button class="btn btn-primary"><i class="fa fa-calendar"></i> Listar días</button></a>
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



                        <div class="form-group col-md-4">

                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" min="<?=$fechahoy?>" value="<?= $fechafer ?>" require>
                            
                        </div>
                        <div class="form-group col-md-8">

                            <label for="titulo">Motivo</label>
                            <input type="text" class="form-control" id="titulo" value="<?= $titulo ?>" require>

                        </div>

                    </div>






                    <div id="muestroferiados"> </div>

                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_feriados($('#jfndhom').val(), $('#titulo').val(), $('#fecha').val());" value="Guardar Datos" />

                </div>
            </div>
        </div>




        <script src="ajax_feriados.js"></script>
        <?php include('../template/pie.php'); ?>