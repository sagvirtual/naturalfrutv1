<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$idcod = $_GET['jfndhom'];
$jkdlsm = $_GET['jkdlsm'];
$id = base64_decode($idcod);

if($jkdlsm=='0'){$nbombrel='mayorista';}
if($jkdlsm=='1'){$nbombrel='especiales';}


mysqli_close($rjdhfbpqj);
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-document"></i> Nueva lista de precio <?=$nbombrel?></h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/listasdeprecios"> <button class="btn btn-primary"><i class="dripicons-document"></i> Listas de Precios</button></a>
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
                    <h5 class="card-title">Fecha de la lista de precio a aplicar</h5>
                </div>
                <div class="card-body">

                    <div class="form-row">



                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Fecha</label>
                            <input type="date" class="form-control" id="fecha" value="<?= $fecha ?>" min="<?=$fechahoy?>" require>
                        </div>
                        <input type="hidden" name="tipolista" id="tipolista" value="<?=$jkdlsm?>">


                    </div>






                    <div id="muestralista"> </div>

                    <br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_listamayor($('#jfndhom').val(), $('#fecha').val(), $('#tipolista').val());" value="Guardar Datos" />

                </div>
            </div>
        </div>
        <!-- End col -->




        <script>
            function ajax_listamayor(jfndhom,fecha,tipolista){
    var parametros = {
    "jfndhom":jfndhom,
    "fecha":fecha,
    "tipolista":tipolista
    };
    $.ajax({
             data: parametros,
             url: 'insert_lista.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestralista").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestralista").html(response);
             }
          });
    }
        </script>
        <?php include('../template/pie.php'); ?>