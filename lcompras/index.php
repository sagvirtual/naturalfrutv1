<?php include('../f54du60ig65.php');
include('../template/cabezal.php');
$error = $_GET['error'];
$idcod = $_GET['jnnfsc'];
$id = base64_decode($idcod);


$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id'");
if ($roworden = mysqli_fetch_array($sqlorden)) {
    $verbo = "disabled";
}

$sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id'");
if ($rowclientes = mysqli_fetch_array($sqlclientes)) {
    $id_rubro = $rowclientes["id_rubro"];
    $idrubcod = base64_encode($id_rubro);
    $estado = $rowclientes["estado"];
    $tipo_cliente = $rowclientes["tipo_cliente"];
    $dia_repart1 = $rowclientes["dia_repart1"];
    $dia_repart2 = $rowclientes["dia_repart2"];
    $dia_repart3 = $rowclientes["dia_repart3"];
    $dia_repart4 = $rowclientes["dia_repart4"];
    $dia_repart5 = $rowclientes["dia_repart5"];
    $dia_repart6 = $rowclientes["dia_repart6"];
    $dia_repart0 = $rowclientes["dia_repart0"];
    $cli_usuario = base64_decode($rowclientes["cli_usuario"]);
    $cli_pass = base64_decode($rowclientes["cli_pass"]);
    $nom_empr = $rowclientes["nom_empr"];
    $nom_contac = $rowclientes["nom_contac"];
    $wsp = $rowclientes["wsp"];
    $tel = $rowclientes["tel"];
    $email = $rowclientes["email"];
    $address = $rowclientes["address"];
    $file = $rowclientes["file"];
    $iva = $rowclientes["iva"];
    $cuit = $rowclientes["cuit"];
    $fecha = $rowclientes["fecha"];
    $saldoini = $rowclientes["saldoini"];
    $camionetaid = $rowclientes["camioneta"];
    $cobrable = $rowclientes["cobrable"];
    $fraccionar = $rowclientes["fraccionar"];
    $feriado = $rowclientes["feriado"];


    if ($fraccionar == '1') {
        $checked = "checked";
        $enlaceper = '<a href="/f_cliente?jfndhom=' . $idrubcod . '&jfndhdsccliom=' . $idcod . '" class="btn btn-primary-rgba" title="Fraccionamiento Personalizado"><i class="dripicons-link-broken"></i></a>
        ';
    } else {
        $checked = "";
        $enlaceper = '<a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>';
    }

    

    if (empty($file)) {
        $foto = "/assets/images/no_image.png";
    } else {
        $foto = "../lclientes/foto" . $rowclientes['id'] . "";
    }
} else {
    if ($error == "1") {
        $id_rubro = $_SESSION["id_rubro"];
        $estado = $_SESSION["estado"];
        $tipo_cliente = $_SESSION["tipo_cliente"];
        $dia_repart1 = $_SESSION["dia_repart1"];
        $dia_repart2 = $_SESSION["dia_repart2"];
        $dia_repart3 = $_SESSION["dia_repart3"];
        $dia_repart4 = $_SESSION["dia_repart4"];
        $dia_repart5 = $_SESSION["dia_repart5"];
        $dia_repart6 = $_SESSION["dia_repart6"];
        $dia_repart0 = $_SESSION["dia_repart0"];
        $cli_usuario = $_SESSION["cli_usuario"];
        $cli_pass = $_SESSION["cli_pass"];
        $nom_empr = $_SESSION["nom_empr"];
        $nom_contac = $_SESSION["nom_contac"];
        $wsp = $_SESSION["wsp"];
        $tel = $_SESSION["tel"];
        $email = $_SESSION["email"];
        $address = $_SESSION["direccion"];
        $direccion = $_SESSION["direccion"];
        $file = $_SESSION["file"];
        $iva = $_SESSION["iva"];
        $cuit = $_SESSION["cuit"];
        $camioneta = $_SESSION["camioneta"];
        $cobrable = $_SESSION["cobrable"];
        $fraccionar = $_SESSION["fraccionar"];
        $feriado = $_SESSION["feriado"];
    }
    $foto = "/assets/images/no_image.png";
}
if ($estado == "0") {
    $estadosel0 = "selected";
}
if ($estado == "1") {
    $estadosel1 = "selected";
}

//
if ($tipo_cliente == "0") {
    $tipo_clientesel0 = "selected";
}
if ($tipo_cliente == "1") {
    $tipo_clientesel1 = "selected";
}
if ($tipo_cliente == "2") {
    $tipo_clientesel2 = "selected";
}

if ($iva == "0") {
    $ivasel0 = "selected";
}
if ($iva == "1") {
    $ivasel1 = "selected";
}
if ($iva == "2") {
    $ivasel2 = "selected";
}
if ($iva == "3") {
    $ivasel3 = "selected";
}

if ($dia_repart1 == "1") {
    $dia_repart1c = "checked";
}
if ($dia_repart2 == "1") {
    $dia_repart2c = "checked";
}
if ($dia_repart3 == "1") {
    $dia_repart3c = "checked";
}
if ($dia_repart4 == "1") {
    $dia_repart4c = "checked";
}
if ($dia_repart5 == "1") {
    $dia_repart5c = "checked";
}

if ($dia_repart6 == "1") {
    $dia_repart6c = "checked";
}

if ($dia_repart0 == "1") {
    $dia_repart0c = "checked";
}

if ($cobrable == "0") {
    $cobA = "selected";
}
if ($cobrable == "1") {
    $cobB = "selected";
}

if ($feriado == "0") {
    $febA = "selected";
}
if ($feriado == "1") {
    $febB = "selected";
}


?>
<!-- Start Breadcrumbbar -->
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="feather icon-user-plus mr-2"></i> Nuevo Cliente</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/clientes"> <button class="btn btn-primary"><i class="sl-icon-people"></i>Listar Clientes</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<form action="insert_cliente.php" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Datos</h5>

                        <?php if ($error == "1") {
                            echo '<br><div class="alert alert-danger">
                                <strong>Falta completar datos!</strong><br> Nombre Empresa, WhatsApp, Usuario, Contraseña, Día de reparto y direccción deben estar completados.
                               </div>';
                        }
                        ?>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="<?= $address ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Nombre Contacto</label>
                                <input type="text" class="form-control" id="nom_empr" name="nom_empr" value="<?= $nom_empr ?>">
                            </div>


                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre Empresa:</label>
                                <input type="text" class="form-control" id="nom_contac" name="nom_contac" value="<?= $nom_contac ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"> WhatsApp</label>
                                <input type="number" class="form-control" id="wsp" name="wsp" value="<?= $wsp ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Télefono</label>
                                <input type="number" class="form-control" id="tel" name="tel" value="<?= $tel ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                            </div>





                            <div class="form-group col-md-4"> <br><br>
                                <img src="<?= $foto ?>" alt="" style="width: 200px; height:200px; text-align:left;">
                            </div>
                            <div class="form-group col-md-8"> <br><br>
                                <label for="inputEmail4">Foto</label>
                                <input name="file" id="file" type="file" class="form-control" value="<?= $file ?>">
                            </div>


                        </div>








                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Parametros</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Usuario</label>
                                <input type="text" class="form-control" id="cli_usuario" name="cli_usuario" placeholder="Calle" value="<?= $cli_usuario ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Contraseña</label>
                                <input type="text" class="form-control" id="cli_pass" name="cli_pass" placeholder="Numero" value="<?= $cli_pass ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Estado</label>
                                <select class="custom-select" id="estado" name="estado">
                                    <option value="0" <?= $estadosel0 ?>>Activo</option>
                                    <option value="1" <?= $estadosel1 ?>>Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Tipo de Cliente</label><br>
                                <select class="custom-select" name="tipo_cliente" id="tipo_cliente">
                                    <option value="0" <?= $tipo_clientesel0 ?>>Minorista</option>
                                    <option value="1" <?= $tipo_clientesel1 ?>>Mayorista</option>
                                    <option value="2" <?= $tipo_clientesel2 ?>>Distribuidor</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Rubro</label><br>


                                <select class="custom-select" name="id_rubro" id="id_rubro">
                                    <?php
                                    // extraigo el proveedor para el producto
                                    $sqlpmarcassad = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros ORDER BY `rubros`.`position` ASC");
                                    while ($rowmarcassad = mysqli_fetch_array($sqlpmarcassad)) {

                                        echo '<option value="' . $rowmarcassad["id"] . '"';

                                        if ($id_rubro == $rowmarcassad["id"]) {
                                            echo 'selected';
                                        }
                                        echo '>' . $rowmarcassad["nombre"] . '</option>';
                                    }

                                    ?>
                                </select>


                            </div>
                            <div class="form-group col-md-2 text-center">


                                <label for="inputEmail4">Fracionar</label><br>

                                <div class="row">

                                    <div class="custom-control custom-switch col-6" style="text-align: right; position:relative; left:20px;">

                                     <!--    <input type="hidden" id="id_rubro" name="id_rubro" value="valor">
                                        <input type="hidden" id="id_categoria" name="id_categoria" value="valor">
 -->


                                        <input type="checkbox" class="custom-control-input" id="customSwitch" name="customSwitch" value="1" onchange="showInput()" onclick="ajax_fracdionado($('#id_cliente').val(), $('input:checkbox[name=customSwitch]:checked').val());" <?=$checked?>>

                                        <label class="custom-control-label" for="customSwitch"></label>
                                    </div>

                                    <div id="extraInput" class="col-6" style="text-align: left;"><?= $enlaceper ?>

                                    </div>
                                </div>




                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Condición frente al IVA</label><br>
                                <select name="iva" id="iva" class="custom-select ">
                                    <option value="0" <?= $ivasel0 ?>>Consumidor Final</option>
                                    <option value="1" <?= $ivasel1 ?>>IVA Responsable Inscripto</option>
                                    <option value="2" <?= $ivasel2 ?>>IVA Responsable No Inscripto</option>
                                    <option value="3" <?= $ivasel3 ?>>Responsable Monotributo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">CUIT/DNI</label><br>

                                <input type="text" class="form-control" name="cuit" id="cuit" value="<?= $cuit ?>">
                            </div>

                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <b>Día Reparto</b>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck1" name="dia_repart1" <?= $dia_repart1c ?>>
                                        <label class="custom-control-label" for="customCheck1">Lunes</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck2" name="dia_repart2" <?= $dia_repart2c ?>>
                                        <label class="custom-control-label" for="customCheck2">Martes</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck3" name="dia_repart3" <?= $dia_repart3c ?>>
                                        <label class="custom-control-label" for="customCheck3">Miercoles</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck4" name="dia_repart4" <?= $dia_repart4c ?>>
                                        <label class="custom-control-label" for="customCheck4">Jueves</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck5" name="dia_repart5" <?= $dia_repart5c ?>>
                                        <label class="custom-control-label" for="customCheck5">Viernes</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck6" name="dia_repart6" <?= $dia_repart6c ?>>
                                        <label class="custom-control-label" for="customCheck6">Sábados</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" id="customCheck0" name="dia_repart0" <?= $dia_repart0c ?>>
                                        <label class="custom-control-label" for="customCheck0">Domingos</label>
                                    </div>



                                    <input type="hidden" id="jjdnhsa" name="jjdnhsa" value="<?= $idcod ?>">

                                </div>

                            </div>
                            <div class="form-group col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <b>Camioneta</b>





                                    <select id="camioneta" name="camioneta" class="custom-select ">
                                        <?php
                                        $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas ORDER BY `camionetas`.`id` ASC");
                                        while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {

                                            echo '<option value="' . $rowcamionetas["id"] . '"';

                                            if ($camionetaid == $rowcamionetas["id"]) {
                                                echo 'selected';
                                            }
                                            echo '>' . $rowcamionetas["nombre"] . '</option>';
                                        }

                                        ?>
                                    </select>

                                </div>
                                <div class="alert alert-primary" role="alert">
                                <b>Feriados</b>
                                    <select id="feriado" name="feriado" class="custom-select ">
                                      <option  value="0" <?= $febA ?>>Pasar al proximo día</option>
                                      <option value="1" <?= $febB ?>>Respetar día/s reparto</option>
                                    </select>

                                </div>

                            </div>




                            <div class="form-group col-md-4">
                                <div class="alert alert-primary" role="alert">
                                    <b>Saldo Inicial</b>
                                    <input type="text" class="form-control" id="saldoini" name="saldoini" placeholder="Numero" value="<?= $saldoini ?>" <?= $verbo ?>>

                                </div>
                                <div class="alert alert-primary" role="alert">
                                <b>Cliente</b>
                                    <select id="cobrable" name="cobrable" class="custom-select ">
                                        <option value="0" <?= $cobA ?>>Cobrable</option>
                                        <option value="1" <?= $cobB ?>>incobrable</option>
                                    </select>

                                </div>

                                <input type="hidden" id="jjdnhsa" name="jjdnhsa" value="<?= $idcod ?>">

                            </div>


                        </div>




<? if (!empty($idcod)){?>
                        <div class="accordion accordion-outline" id="accordionoutline">
                            <div class="card">
                                <div class="card-header" id="headingOneoutline">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline" aria-expanded="true" aria-controls="collapseOneoutline"><i class="dripicons-heart"></i> Productos Favoritos para <?= $nom_empr ?></button>
                                    </h2>
                                </div>
                                <div id="collapseOneoutline" class="collapse" aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                    <div class="card-body">


                                        <?php



                                        $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where id = '$id_rubro'");
                                        if ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                                            $position = $rowrubros["position"];
                                        }

                                        $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
                                        while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                            $id_categoria = $rowcategorias["id"];
                                            $nombrecate = strtoupper($rowcategorias["nombre"]);

                                            //me fijo si hay productos en esa categoria
                                            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_rubro$position = '1' and categoria='$id_categoria' and  estado = '0' $buscqueda");
                                            if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

                                                $id_marcas = $rowproductosv['id_marcas'];
                                                $sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = ' $id_marcas' and estado='0'");
                                                if ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
                                                    $inactivo = '1';
                                                }
                                                if ($inactivo == '1') {
                                                    echo ' <br><h5 class="card-title">' . $nombrecate . '</h5>';
                                                }
                                            }
                                            if ($inactivo == '1') {
                                                //busco el produco por la categoria
                                                $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id_rubro$position = '1' and categoria='$id_categoria' and  estado = '0' $buscqueda ORDER BY `productos`.`nombre` ASC");
                                                while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                                    $id_producto = $rowproductos['id'];

                                                    //me fijo en favoritos para el checked
                                                    $idcodec = base64_decode($idcod);
                                                    $sqlfavoritos = mysqli_query($rjdhfbpqj, "SELECT * FROM favoritos Where id_cliente = '$idcodec' and id_producto='$id_producto'");
                                                    if ($rowfavoritos = mysqli_fetch_array($sqlfavoritos)) {
                                                        $chec = "checked";
                                                    } else {
                                                        $chec = "";
                                                    }
                                                    //fin

                                                    $nombreproduc = strtolower($rowproductos["nombre"]);
                                                    $nombreproduc = ucfirst($nombreproduc);
                                                    echo '
                                                  <div class="custom-control custom-checkbox">
                                                  <input type="hidden" id="id_producto' . $rowproductos["id"] . '" name="id_producto' . $rowproductos["id"] . '" value="' . $rowproductos["id"] . '">
                                                        <input type="checkbox" class="custom-control-input" id="favorito' . $rowproductos["id"] . '"  name="favorito' . $rowproductos["id"] . '"  value="1"
                                                        onclick="ajax_favoritos($';

                                                    echo "('#id_cliente').val(), $('input:checkbox[name=favorito" . $rowproductos['id'] . "]:checked').val(), $('#id_producto" . $rowproductos['id'] . "').val());";



                                                    echo '" ' . $chec . '>
                                                         <label class="custom-control-label" for="favorito' . $rowproductos["id"] . '">' . $nombreproduc . '</label>
                                                     </div>';
                                                }

                                                //fin producto checked

                                            }
                                        }

                                        ?>
                                        <input type="hidden" id="id_cliente" value="<?= $idcod ?>">
                                        <script src="ajax_favoritos.js"></script>

                                        <div id="muestrofavoritos"> </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <? }?>




                    </div>





                </div>
                <button type="submit" class="btn btn-primary">Guardar Datos</button>






            </div>
        </div>
    </div>
    <!-- End col -->
</form>
<!-- Start mapa -->
<!-- <div class="col-lg-12">


    <div class="row">
  
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Geolocalización</h5>
                </div> -->
<script>
    /*  window.onload = function() {
                        document.getElementById('clickButton').click();
                    } */
</script>

<!--  <div class="card-body">
                    <form method="post" id="geocoding_form" class="m-b-20">
                        <div class="input-group mb-3">
                            <input type="text" id="address" name="address" class="form-control fill" placeholder="Poner Direccion" aria-label="Search your place" aria-describedby="button-addon2" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="clickButton" onclick="nextFocus($('#address').val())">Localizar</button>
                            </div>
                        </div>


                    </form>
                    <div id="mapGeo" class="gmaps"></div> <br>
 -->
<script>
    /*                         function nextFocus(address) {
                            var variable = address;

                            document.formda.direccion.value = variable;

                        } */
</script>





<!-- 


                </div>
            </div>
        </div>

        <div id="basic-map" class="gmaps" style=" visibility: hidden;"></div>
        <div id="markers-map" class="gmaps" style=" visibility: hidden;"></div>
        <div id="polylines-map" class="gmaps" style=" visibility: hidden;"></div>
        <div id="polygon-map" class="gmaps" style=" visibility: hidden;"></div>
        <div id="route-map" class="gmaps" style=" visibility: hidden;"></div>

    </div>
</div> -->
<!-- End Contentbar -->

<div id="muestrocli"></div>

<script>
    function showInput() {
        var selectValue = document.getElementById("customSwitch").checked;
        var extraInputDiv = document.getElementById("extraInput");

        if (selectValue) {
            extraInputDiv.innerHTML = '<a href="/f_cliente?jfndhom=<?= $idrubcod ?>&jfndhdsccliom=<?= $idcod ?>" class="btn btn-primary-rgba" title="Fraccionamiento Personalizado"><i class="dripicons-link-broken"></i></a>';
        } else {
            extraInputDiv.innerHTML = '<a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>';
        }
    }


    function ajax_fracdionado(id_cliente, fracionado){
    var parametros = {
    "id_cliente":id_cliente,
    "fracionado":fracionado
    };
    $.ajax({
             data: parametros,
             url: 'fracionarclie.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocli").html('');
             },
             success: function(response){
                      $("#muestrocli").html(response);
             }
          });
    }
</script>
<script src="/assets/plugins/switchery/switchery.min.js"></script>

<?php include('../template/pie.php'); ?>