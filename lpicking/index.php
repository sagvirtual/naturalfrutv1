<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);


$sqlzona = mysqli_query($rjdhfbpqj, "SELECT * FROM picking Where id = '$id'");
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
            <h4 class="page-title"><i class="dripicons-clipboard"></i> Nombre Ubicación</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/nomubpicking"> <button class="btn btn-primary"><i class="dripicons-clipboard"></i>  Nombres Ubicaciónes</button></a>
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
                            <label for="inputEmail4">Sigla Ej. P1/C1/F1</label>
                            <input type="text" class="form-control" id="nombre" value="<?= $nombre ?>" autocomplete="off" require>
                            <input type="hidden" class="form-control" id="estado" value="<?= $estado ?>" >
                            <input type="hidden" class="form-control" id="pascolold" value="<?= $nombre ?>" >
                        </div>
                        <div class="form-group col-md-6">
                        <?php 
                $codigodebarra=878000000000+$id;
     if(!empty($id)){          
   
    if (strlen($codigodebarra) == 12 || strlen($codigodebarra) == 13) {
    
   
    
    include('../barcode/html/BCGean13.php');
    }}
    ?>
                        </div>


                    </div>






                    <div id="muestrorubros"> </div>

                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                    <input type="button" name="submit"  class="btn btn-primary" onclick="ajax_picking($('#jfndhom').val(), $('#nombre').val(), $('#pascolold').val(), $('#estado').val());" value="Guardar Datos"  />

                </div>
            </div>
        </div>
        <!-- End col -->




        <script>function ajax_picking(jfndhom, nombre, pascolold, estado){
    var parametros = {
    "jfndhom":jfndhom,
    "nombre":nombre,
    "pascolold":pascolold,
    "estado":estado
    };
    $.ajax({
             data: parametros,
             url: 'insert_picking.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrorubros").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrorubros").html(response);
             }
          });
    }</script>
        <?php include('../template/pie.php'); ?>