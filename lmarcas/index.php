<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');

$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);

$sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id'");
if ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
    $id = $rowmarcas["id"];
    $empresa = $rowmarcas["empresa"];
    $whatsapp = $rowmarcas["whatsapp"];
    $telefono = $rowmarcas["telefono"];
    $email = $rowmarcas["email"];
    $web = $rowmarcas["web"];
    $estado = $rowmarcas["estado"];




    if ($estado == "0") {
        $selcestadoa = "selected";
    } else {
        $selcestadob = "selected";
    }

    $tipo = $rowmarcas["tipo"];

    if ($estado == "0") {
        $selctipoa = "selected";
    } else {
        $selctipob = "selected";
    }
    $gananciaa = $rowmarcas["gananciaa"];
    $gananciab = $rowmarcas["gananciab"];
    $gananciac = $rowmarcas["gananciac"];
    $address = $rowmarcas["address"];
}
mysqli_close($rjdhfbpqj);

if (!empty($id)) {
    $titulopro = "Marca " . $empresa;
} else {
    $titulopro = '<i class="ri-stack-line"></i> Nueva Marca';
}
?>

<link rel="manifest" href="js13kpwa.webmanifest">


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?= $titulopro ?></h4>
            <?php
            if ($_GET['error'] == '1') {
                echo '        <br> <div class="alert alert-danger" role="alert">
           No se pudo hacer los cambios <a href="#" class="alert-link">Controle que los campos no esten vacios</a>. 
          </div>';
            }
            ?>
        </div>


        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/marcas"> <button class="btn btn-primary"><i class="ri-stack-line"></i> Listar Marca</button></a>
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
        <!-- <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Datos</h5>
                </div>
                <div class="card-body">
                    <form>
               
                                               <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"> WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp" value="<? //= $whatsapp 
                                                                                                ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Télefono</label>
                                <input type="text" class="form-control" id="telefono" value="<? //= $telefono 
                                                                                                ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" value="<? //= $email 
                                                                                            ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Web</label>
                                <input type="text" class="form-control" id="web" value="<? //= $web 
                                                                                        ?>">
                            </div>


                        </div> 

                </div>
            </div>
        </div>-->
        <!-- End col -->
        <!-- Start col -->
        <input type="hidden" class="form-control" id="whatsapp" value="">
        <input type="hidden" class="form-control" id="telefono" value="">
        <input type="hidden" class="form-control" id="email" value="">
        <input type="hidden" class="form-control" id="web" value="">
        <input type="hidden" class="form-control" id="andress" value="">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Datos</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="inputEmail4">Nombre Marca</label>
                            <input type="text" class="form-control" id="empresa" value="<?= $empresa ?>" required>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Estado</label><br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                            <select class="custom-select" id="estado" >
                                <option value="0" <?= $selcestadoa ?>>Activo</option>
                                <option value="1" <?= $selcestadob ?>>Inactivo</option>
                            </select>
                        </div>
                        </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4"> % Descuento</label>
                            <input type="text" class="form-control" id="gananciaa" value="<?= $gananciaa ?>">
                            <input type="hidden" id="tipo" name="tipo" value="1">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">% Aumento Temporal</label>
                            <input type="text" class="form-control" id="gananciab" value="<?= $gananciab ?>">
                        </div>
                        <div class="form-group col-md-3" style="display:none;">
                            <label for="inputEmail4">%  Ganancia 3</label>
                            <input type="text" class="form-control" id="gananciac" value="<?= $gananciac ?>">
                        </div>
                    </div>

                    <div id="muestromarcas" style="text-align:center;width: 100%;background-color:white;"></div>




                    <br>
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_marcas($('#jfndhom').val(), $('#empresa').val(), $('#whatsapp').val(), $('#telefono').val(), $('#email').val(), $('#web').val(), $('#estado').val(), $('#tipo').val(), $('#gananciaa').val(), $('#gananciab').val(), $('#gananciac').val(), $('#address').val());" value="Guardar Datos" />
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->

        <!-- Start mapa -->
        <!-- <div class="col-lg-12"> -->


        <!-- Start row -->
        <!-- <div class="row"> -->
        <!-- Start col -->
        <!-- <div class="col-lg-12">
                    <div id="muestromarcas" style="text-align:center;width: 100%;background-color:white;"></div>
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Geolocalización</h5>
                        </div>
                        <script>
                            window.onload = function() {
                                document.getElementById('clickButton').click();
                            }
                        </script>

                        <div class="card-body">
                            <form method="post" id="geocoding_form" class="m-b-20">
                                <div class="input-group mb-3">
                                    <input type="text" id="address" class="form-control fill" placeholder="Poner Direccion" aria-label="Search your place" aria-describedby="button-addon2" value="<?= $address ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="clickButton">Localizar</button>
                                    </div>
                                </div>
                            </form>
                            <div id="mapGeo" class="gmaps"></div> <br>
                            <input type="button" name="submit" class="btn btn-primary" onclick="ajax_marcas($('#jfndhom').val(), $('#empresa').val(), $('#whatsapp').val(), $('#telefono').val(), $('#email').val(), $('#web').val(), $('#estado').val(), $('#tipo').val(), $('#gananciaa').val(), $('#gananciab').val(), $('#gananciac').val(), $('#address').val());" value="Guardar Datos" />





                        </div>
                    </div> -->
        <!--  </div> -->
        <!-- End col -->

        <!--   <div id="basic-map" class="gmaps" style=" visibility: hidden;"></div>
                <div id="markers-map" class="gmaps" style=" visibility: hidden;"></div>
                <div id="polylines-map" class="gmaps" style=" visibility: hidden;"></div>
                <div id="polygon-map" class="gmaps" style=" visibility: hidden;"></div>
                <div id="route-map" class="gmaps" style=" visibility: hidden;"></div> -->

        <!--   </div> -->
        <!-- End row -->
        <!--   </div> -->
        <!-- End Contentbar -->

        <script src="ajax_marcas.js"></script>





        <?php include('../template/pie.php'); ?>