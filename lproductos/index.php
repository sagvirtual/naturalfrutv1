<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$idcod = $_GET['jfndhom'];
$fechalistar = $_GET['jufjhgdf'];
$dmcnfg = $_GET['dmcnfg']; //ok actualizado
if ($tipo_usuario != '0') {
    $nomostrar = ' display: none;';
}
include('../control_stock/funcionStockSnot.php');

$error = $_GET['error'];
$id = base64_decode($idcod);
$timean = date("His");

$sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id'");
if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
    $codigo = $rowproductos["codigo"];
    $kilo = $rowproductos["kilo"];
    $categoria = $rowproductos["categoria"];
    $id_proveedor = $rowproductos["id_proveedor"];
    $mix = $rowproductos["mix"];
    if ($mix == "1") {
        $esmixcha = "checked";
    }

    //$nombre = $rowproductos["nombre"];

    // $nombreb = $rowproductos["nombreb"];
    //$fracionado = $rowproductos["fracionado"];
    //$estado = $rowproductos["estado"];
    //$detalle = $rowproductos["detalle"];
    // $file = $rowproductos["file"];
    //$fecha = $rowproductos["fecha"];
    $id_marcas = $rowproductos["id_marcas"];
    $anclaje = $rowproductos["anclaje"];
    $id_rubro = $rowproductos["id_rubro"];
    $id_rubro1 = $rowproductos["id_rubro1"];
    $id_rubro2 = $rowproductos["id_rubro2"];
    $id_rubro3 = $rowproductos["id_rubro3"];
    $id_rubro4 = $rowproductos["id_rubro4"];
    $id_rubro5 = $rowproductos["id_rubro5"];
    $id_rubro6 = $rowproductos["id_rubro6"];
    $id_rubro7 = $rowproductos["id_rubro7"];
    $id_rubro8 = $rowproductos["id_rubro8"];
    $id_rubro9 = $rowproductos["id_rubro9"];
    $gananciasper = $rowproductos["gananciasper"];
    $modo_producto = $rowproductos["modo_producto"];
    $ventaminma = $rowproductos["ventaminma"];
    $unidadventa = "1"; //$rowproductos["unidadventa"];
    $unidadnom = $rowproductos["unidadnom"];
    $ubicacion = $rowproductos["ubicacion"];
    $alarmaven = $rowproductos["alarmaven"];
    $alarmastock = $rowproductos["alarmastock"];
    $mensaje = $rowproductos["mensaje"];

    if ($file == "") {
        $sinfotoch = "checked";
    }

    if ($ubicacion == "0") {
        $selecuba = "selected";
    }
    if ($ubicacion == "1") {
        $selecubb = "selected";
    }
    if ($ubicacion == "2") {
        $selecubc = "selected";
    }
    if ($ubicacion == "3") {
        $selecubd = "selected";
    }

    $CantStocks = SumaStock($rjdhfbpqj, $id);

    if ($CantStocks > '0') {
        $CantStock = $CantStocks . " " . $unidadnom;
    } else {
        $CantStock = '<i style="color:red;">0 ' . $unidadnom . '</i>';
    }

    $verkilo = $rowproductos["verkilo"];
    $vercaja = $rowproductos["vercaja"];
    $verunidad = $rowproductos["verunidad"];
    $kgaprox = $rowproductos["kgaprox"];


    if ("1" == "1") {
        $verkiloc = "checked";
    }
    if ($vercaja == "12") {
        $vercajac = "checked";
    }
    if ($verunidad == "12") {
        $verunidadc = "checked";
    }
    if ($kgaprox == "1") {
        $kgaproxc = "checked";
    }

    if ($unidadnom == "Kg.") {
        $unidadnoma = "selected.";
        $unidadnomav = "Kg.";
    }
    if ($unidadnom == "Uni.") {
        $unidadnomb = "selected";
        $unidadnomav = "Uni.";
    }


    if ($gananciasper == "1") {
        $fondo = "red";
    }


    //costo
    if (empty($fechalistar)) {

        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' ORDER BY `precioprod`.`fecha` DESC");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            //$kilo = $rowprecioprod["kilo"];
            $costo = $rowprecioprod["costo"];
            $tipoprov = $rowprecioprod["tipoprov"];
            $cproveedor = $rowprecioprod["cproveedor"];


            $nref = $rowprecioprod["nref"];
            $fecven = $rowprecioprod["fecven"];
            $agrstock = $rowprecioprod["agrstock"];


            $costoxcaj = $rowprecioprod["costoxcaj"];
            $descuento = $rowprecioprod["descuento"];
            $pcondescu = $rowprecioprod["pcondescu"];
            $iibb_bsas = $rowprecioprod["iibb_bsas"];
            $iibb_caba = $rowprecioprod["iibb_caba"];
            $perc_iva = $rowprecioprod["perc_iva"];
            $iva = $rowprecioprod["iva"];
            $pbruto = $rowprecioprod["pbruto"];
            $desadi = $rowprecioprod["desadi"];
            $costo_total = $rowprecioprod["costo_total"];
            $costoxcaja = $rowprecioprod["costoxcaja"];




            if ($gananciasper == "1") {
                $tipo = $rowprecioprod["tipo"];
                $gananciaa = $rowprecioprod["ganancia_a"];
                $gananciab = $rowprecioprod["ganancia_b"];
                $gananciac = $rowprecioprod["ganancia_c"];







                if ($tipo == '0') {
                    $moneda = "$";
                }
                if ($tipo == '1') {
                    $moneda = "%";
                }
            }
        }
    } else {
        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id = '$fechalistar'");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            //$kilo = $rowprecioprod["kilo"];
            $costo = $rowprecioprod["costo"];
            $tipoprov = $rowprecioprod["tipoprov"];
            $cproveedor = $rowprecioprod["cproveedor"];


            $nref = $rowprecioprod["nref"];
            $fecven = $rowprecioprod["fecven"];
            $agrstock = $rowprecioprod["agrstock"];

            $costoxcaj = $rowprecioprod["costoxcaj"];
            $descuento = $rowprecioprod["descuento"];
            $pcondescu = $rowprecioprod["pcondescu"];
            $iibb_bsas = $rowprecioprod["iibb_bsas"];
            $iibb_caba = $rowprecioprod["iibb_caba"];
            $perc_iva = $rowprecioprod["perc_iva"];
            $iva = $rowprecioprod["iva"];
            $pbruto = $rowprecioprod["pbruto"];
            $desadi = $rowprecioprod["desadi"];
            $costo_total = $rowprecioprod["costo_total"];
            $costoxcaja = $rowprecioprod["costoxcaja"];

            if ($gananciasper == "1") {
                $tipo = $rowprecioprod["tipo"];
                $gananciaa = $rowprecioprod["ganancia_a"];
                $gananciab = $rowprecioprod["ganancia_b"];
                $gananciac = $rowprecioprod["ganancia_c"];

                if ($tipo == '0') {
                    $moneda = "$";
                }
                if ($tipo == '1') {
                    $moneda = "%";
                }
            }
        }
    }


    if (!empty($_GET['kkfnuhtf'])) {
        $id_marcas = $_GET['kkfnuhtf'];
    } else {
        $id_marcas  = $rowproductos["id_marcas"];
    }
    if (!empty($_GET['ookdjfv'])) {
        $id_proveedor = $_GET['ookdjfv'];
        $_SESSION["ookdjfv"] = $_GET['ookdjfv'];
    } else {
        if (!empty($_SESSION["ookdjfv"])) {
            $id_proveedor = $_SESSION["ookdjfv"];
        } else {
            $id_proveedor  = $rowproductos["id_proveedor"];
        }
    }

    $nombre = $rowproductos["nombre"];
    $nombreb = $rowproductos["nombreb"];
    $fracionado = $rowproductos["fracionado"];
    $estado = $rowproductos["estado"];
    $detalle = $rowproductos["detalle"];
    $file = $rowproductos["file"];
    $fecha = $rowproductos["fecha"];

    unset($_SESSION['kkfnuhtf']);
    unset($_SESSION["kilo"]);
    unset($_SESSION["costo"]);
    unset($_SESSION["codigo"]);
    unset($_SESSION["categoria"]);
    unset($_SESSION["id_proveedor"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["nombreb"]);
    unset($_SESSION["estado"]);
    unset($_SESSION["detalle"]);
    unset($_SESSION["id_marcas"]);
    unset($_SESSION["id_rubro1"]);
    unset($_SESSION["id_rubro2"]);
    unset($_SESSION["id_rubro3"]);
    unset($_SESSION["id_rubro4"]);
    unset($_SESSION["id_rubro5"]);
    unset($_SESSION["id_rubro6"]);
    unset($_SESSION["id_rubro7"]);
    unset($_SESSION["id_rubro8"]);
    unset($_SESSION["id_rubro9"]);
    unset($_SESSION["modo_producto"]);
    unset($_SESSION["unidadventa"]);
    unset($_SESSION["unidadnom"]);
    unset($_SESSION["ventaminma"]);
    unset($_SESSION["tipoprov"]);
    unset($_SESSION["cproveedor"]);
    unset($_SESSION["verkilo"]);
    unset($_SESSION["vercaja"]);
    unset($_SESSION["verunidad"]);
    unset($_SESSION["kgaprox"]);

    unset($_SESSION["nref"]);
    unset($_SESSION["fecven"]);
    unset($_SESSION["agrstock"]);
    unset($_SESSION["alarmaven"]);
    unset($_SESSION["alarmastock"]);
    unset($_SESSION["mensaje"]);
} else {

    //$cproveedor = "5";

    if (!empty($_GET['kkfnuhtf'])) {
        $_SESSION["kkfnuhtf"] = $_GET['kkfnuhtf'];
    }
    if (!empty($_GET['ookdjfv'])) {
        $_SESSION["ookdjfv"] = $_GET['ookdjfv'];
    }

    if (!empty($_GET['ookdjfv'])) {
        $id_proveedor = $_GET['ookdjfv'];
    } else {
        $id_proveedor  = $_SESSION["ookdjfv"];
    }

    $kilo = $_SESSION["kilo"];
    $unidadventa = $_SESSION["unidadventa"];
    $unidadnom = $_SESSION["unidadnom"];
    $costo = $_SESSION["costo"];
    $codigo = $_SESSION["codigo"];
    $categoria = $_SESSION["categoria"];
    $nombre = $_SESSION["nombre"];
    $nombreb = $_SESSION["nombreb"];
    $fracionado = $_SESSION["fracionado"];
    $ventaminma = $_SESSION["ventaminma"];
    $estado = $_SESSION["estado"];
    $detalle = $_SESSION["detalle"];
    $id_marcas = $_SESSION["id_marcas"];
    $id_rubro1 = $_SESSION["id_rubro1"];
    $id_rubro2 = $_SESSION["id_rubro2"];
    $id_rubro3 = $_SESSION["id_rubro3"];
    $id_rubro4 = $_SESSION["id_rubro4"];
    $id_rubro5 = $_SESSION["id_rubro5"];
    $id_rubro6 = $_SESSION["id_rubro6"];
    $id_rubro7 = $_SESSION["id_rubro7"];
    $id_rubro8 = $_SESSION["id_rubro8"];
    $id_rubro9 = $_SESSION["id_rubro9"];
    $modo_producto = $_SESSION["modo_producto"];


    $verkilo = $_SESSION["verkilo"];
    $vercaja = $_SESSION["vercaja"];
    $verunidad = $_SESSION["verunidad"];
    $kgaprox = $_SESSION["kgaprox"];
    $ubicacion = $_SESSION["ubicacion"];
    $nref = $_SESSION["nref"];
    $fecven = $_SESSION["fecven"];
    $agrstock = $_SESSION["agrstock"];
    $mensaje = $_SESSION["mensaje"];


    if (empty($kilo)) {
        $kilo = "1";
    }
    if (empty($costo)) {
        $costo = "0";
    }

    if (!empty($_GET['kkfnuhtf'])) {
        $id_marcas = $_GET['kkfnuhtf'];
    } else {
        $id_marcas = $_SESSION["kkfnuhtf"];
    }
}



if ("1" == "1") {
    // extraigo el proveedor para el producto para saber la ganancias
    $sqlpmarcaesadg = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id ='$id_marcas' and estado = '0'");
    if ($rowpmarcaesadg = mysqli_fetch_array($sqlpmarcaesadg)) {
        $empresa = $rowpmarcaesadg["empresa"];
        $gananciaa = $rowpmarcaesadg["gananciaa"];
        $gananciab = $rowpmarcaesadg["gananciab"];
        $gananciac = $rowpmarcaesadg["gananciac"];
        $tipo = $rowpmarcaesadg["tipo"];
        if ($tipo == '0') {
            $moneda = "$";
        }
        if ($tipo == '1') {
            $moneda = "%";
        }
    }
}



$nombre = preg_replace('/\(\s*' . $empresa . '\s*\)/i', '', $nombre);

?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="feather icon-package"></i> Producto </h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">

                <?php

                if (!empty($_SESSION['jfnddhom'])) {

                ?><a href=" 
            <?php

                    echo ' <a href="/productos"> <button class="btn btn-primary"><i class="feather icon-package"></i> Listar Productos</button></a>';
                    // echo'../productos?buscar='.$id.'&jfnddhom='.$_SESSION['jfnddhom'].'=&pagina='.$_SESSION['pagina'].'&busquedads='.$_SESSION['busquedads'].'&jfndhom='.$_SESSION['jfnddhom'].'';
                    //   echo'../listadeprecio/listaedit?jfndhom='.$_SESSION['jfnddhom'].'&pagina='.$_SESSION['pagina'].'&busquedads='.$_SESSION['busquedads'].'';

            ?>
            "><button type="button" class="btn btn-round btn-dark"><i class="fa fa-close"></i></button></a>&nbsp;&nbsp;&nbsp; <?php

                                                                                                                            } else {

                                                                                                                                ?>
                    <a href="/productos"> <button class="btn btn-primary"><i class="feather icon-package"></i> Listar Productos</button></a>
                <?php

                                                                                                                            }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <form action="insert_productos.php" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">

                <div class="card m-b-30">
                    <!-- aca cominzo etapa -->
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="card-header">
                                <h5 class="card-title">Datos Id Producto: <?= $id ?></h5>
                                <?php

                                if ($error == "7") {
                                    echo '<br><div class="alert alert-danger" role="alert">
                                    No se pudo guardar! <a href="#" class="alert-link">Controle que los campos que no esten vacios</a>. 
                                   </div>';
                                }

                                ?>
                            </div>



                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Proveedor</label><br>
                                        <select class="custom-select" id="id_proveedor" name="id_proveedor" style="color: black;" onchange="enviar_valoresb(this.value);">

                                            <?php
                                            // extraigo el proveedor para el producto
                                            $sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where estado = '0' ORDER BY `proveedores`.`empresa` ASC");
                                            while ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
                                                echo '<option value="' . $rowproveedoresad["id"] . '"';

                                                if ($id_proveedor == $rowproveedoresad["id"]) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $rowproveedoresad["empresa"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Marca</label><br>
                                        <select class="custom-select" id="id_marcas" name="id_marcas" style="color: black;">
                                            <option value="0">Elegir...</option>
                                            <?php
                                            // extraigo el proveedor para el producto
                                            $sqlpmarcassad = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas ORDER BY `marcas`.`empresa` ASC");
                                            while ($rowmarcassad = mysqli_fetch_array($sqlpmarcassad)) {

                                                echo '<option value="' . $rowmarcassad["id"] . '"';

                                                if ($id_marcas == $rowmarcassad["id"]) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $rowmarcassad["empresa"] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Categoría</label><br>
                                        <select class="custom-select" id="categoria" name="categoria" style="color: black;">
                                            <option value="0">Elegir...</option>
                                            <?php
                                            // extraigo la categoria para el producto
                                            $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`nombre` ASC");
                                            while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                                echo '<option value="' . $rowcategorias["id"] . '"';

                                                if ($categoria == $rowcategorias["id"]) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $rowcategorias["nombre"] . '</option>';
                                            }

                                            ?>
                                        </select>





                                    </div>


                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Codigo</label>
                                        <input type="text" id="codigo" name="codigo" value="<?= $codigo ?>" class="form-control">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">Nombre Producto</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre ?>" style="font-weight: 900;   background-color: yellow;" require>
                                    </div>

                                    <div class="form-group col-md-2 text-center">


                                        <label for="inputEmail4">Mix</label><br>

                                        <div class="row">

                                            <div class="custom-control custom-switch col-6"
                                                style="text-align: right; position:relative; left:20px;">


                                                <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                    name="customSwitch" value="1" onchange="showInput()"
                                                    onclick="ajax_esmix($('input:checkbox[name=customSwitch]:checked').val());" <?= $esmixcha ?>>

                                                <label class="custom-control-label" for="customSwitch"></label>
                                            </div>

                                            <div id="extraInput" class="col-6" style="text-align: left;">
                                                <? if ($mix == 0) { ?>
                                                    <a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>
                                                <? } else { ?>
                                                    <a href="/mix_productos/?jfndhom=<?= $idcod ?>" class="btn btn-primary-rgba" title="Editar el Mix"><i class="dripicons-link-broken"></i></a>
                                                <? } ?>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-2">
                                        <label for="inputEmail4">Estado</label>

                                        <?php

                                        if ($estado == "0") {
                                            $estaala = "selected";
                                        }
                                        if ($estado == "1") {
                                            $estaalb = "selected";
                                        }

                                        ?>

                                        <select class="custom-select" id="estado" name="estado">
                                            <option value="0" <?= $estaala ?>>Activo</option>
                                            <option value="1" <?= $estaalb ?>>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12" sty>
                                        <label for="inputEmail4">Texto (Ej:Cosecha 2024)</label>
                                        <input type="text" id="nombreb" name="nombreb" class="form-control" value="<?= $nombreb  ?>">
                                    </div>
                                    <!-- 
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Detalle</label>
                                                <textarea class="form-control" id="detalle" name="detalle"><? //= $detalle 
                                                                                                            ?></textarea>
                                            </div> -->



                                    <hr>
                                    <div class="form-group col-md-6">

                                        <h5 class="card-title">Presentación del Bulto</h5>
                                        <div class="form-row">

                                            <div class="form-group col-md-12">



                                                <script>
                                                    window.addEventListener('load', function() {
                                                        // Tu código aquí
                                                        calculocosto(); // Llama a tu función aquí
                                                    });
                                                </script>


                                                <?php

                                                if ($modo_producto == "Caja") {
                                                    $tipoproa = "selected";
                                                    $unidadver = "Caja";
                                                }
                                                if ($modo_producto == "Bolsa") {
                                                    $tipoprob = "selected";
                                                    $unidadver = "Bolsa";
                                                }
                                                if ($modo_producto == "Unidad") {
                                                    $tipoproc = "selected";
                                                    $unidadver = "Unidad.";
                                                }
                                                if ($modo_producto == "Pack") {
                                                    $tipoprod = "selected";
                                                    $unidadver = "Pack";
                                                }

                                                ?>

                                                <div class="form-row">
                                                    <label for="inputEmail4">
                                                        <select class="custom-select" id="modo_producto" name="modo_producto" onchange="mostrarSelecciona()">
                                                            <option value="Caja" <?= $tipoproa ?>>Caja</option>
                                                            <option value="Bolsa" <?= $tipoprob ?>>Bolsa</option>
                                                            <option value="Unidad" <?= $tipoproc ?>>Unidad</option>
                                                            <option value="Pack" <?= $tipoprod ?>>Pack</option>
                                                        </select>

                                                    </label> &nbsp;&nbsp;


                                                    <input type="hidden" id="exkilo" name="exkilo" value="<?= $kilo ?>">

                                                    <input type="text" id="kilo" name="kilo" value="<?= $kilo ?>" onMouseOver="calculocosto()" onChange="calculocosto()" style="width: 80px;" class="form-control">
                                                    &nbsp;&nbsp; <label for="inputEmail4">

                                                        <select class="custom-select" id="unidadnom" name="unidadnom" onchange="mostrarSeleccion()">
                                                            <option value="Kg." <?= $unidadnoma ?>>Kg.</option>
                                                            <option value="Uni." <?= $unidadnomb ?>>Uni.</option>
                                                        </select>


                                                    </label> <!--  &nbsp;&nbsp;y&nbsp;
                    
                                                        <label for="inputEmail4" style="position: relative; top:3px;">La unidad tiene</label>
                                                    <input type="text" id="unidadnom" name="unidadnom" value="<? //= $unidadnom 
                                                                                                                ?>" style="width: 70px;"> -->



                                                    <input type="hidden" id="unidadventa" name="unidadventa" value="<?= $unidadventa ?>" style="width: 50px;">
                                                    &nbsp;&nbsp;
                                                    <input style="position: relative; top:2px; left:0px;" type="checkbox" id="kgaprox" name="kgaprox" value="1" title="Heladera" <?= $kgaproxc ?>>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="card-title">Ubicación del producto</h5>
                                        <div class="form-row">

                                            <div class="form-group col-md-12">

                                                <select class="custom-select" id="ubicacion" name="ubicacion">
                                                    <option value="1" <?= $selecubb ?>>DEPOSITO PA</option>
                                                    <option value="0" <?= $selecuba ?>>ENVASADO PA</option>
                                                    <option value="2" <?= $selecubc ?>>ENVASADO PB</option>
                                                    <option value="3" <?= $selecubd ?>>DEPOSITO PB</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-header">


                                <div class="form-group col-md-12">
                                    <h5 class="card-title">Parametros</h5>
                                    <label for="ventaminma" style="position: relative; top:3px;">La venta mínima es de </label>
                                    <input type="text" id="ventaminma" name="ventaminma" value="<?= $ventaminma ?>" style="width: 50px;">
                                    <label for="inputEmail4" style="position: relative; top:3px;">
                                        <p id="seleccionaa" style="position: relative; top:6px;"> <?= $unidadnom ?> </p>
                                    </label>


                                    <label for="fracionado" style="position: relative; top:3px;">lo vendemos de</label>
                                    <input type="text" id="fracionado" name="fracionado" value="<?= $fracionado ?>" style="width: 50px;">
                                    <label for="inputEmail4">
                                        <p id="selecciona" style="position: relative; top:10px;"> <?= $unidadnom ?></p>
                                    </label><br>

                                    <label for="mensajess" style="position: relative; top:3px;">Observacíon </label>
                                    <input type="text" id="mensaje" name="mensaje" value="<?= $mensaje ?>" style="width: 100%;">
                                </div>
                                <div class="form-group col-md-12">


                                    <label for="inputEmail4">Lista de Precios</label><br>
                                    <?php

                                    $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where estado = '0' ORDER BY `rubros`.`id` ASC");
                                    while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                                        $numerrubro = $numerrubro + 1;
                                        $id_rubro = ${"id_rubro" . $numerrubro};
                                        echo ' 
                                                <div class="form-check-inline checkbox-primary" style="color:black">
                                                ' . $rowrubros["nombre"] . '&nbsp; <input type="checkbox" id="id_rubro' . $numerrubro . '" name="id_rubro' . $numerrubro . '" value="1"';

                                        if ($id_rubro == "1") {


                                            echo 'checked';
                                        } else {
                                            if ($id_rubro != "0") {
                                                echo 'checked';
                                            }
                                        }


                                        echo '>
                                                
                                                </div>';
                                    }


                                    ?>
                                </div>
                                <div class="form-row">

                                    <?php
                                    if (!empty($id)) {
                                    ?>

                                        <div class="form-group col-md-4">
                                            <? if ($file != "1") {
                                                if ($file != "") { ?>


                                                    <img src="/lproductos/foto<?= $id ?>?<?= $timean ?>" height="150" style="text-align:left; max-width: 150px; height:auto;">
                                            <? }
                                            } ?>

                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputEmail4">Foto producto</label>
                                            <input name="file" id="file" type="file" class="form-control">
                                            <br>Sin foto <input type="checkbox" id="sinfoto" name="sinfoto" value="1" <?= $sinfotoch ?>>

                                        </div>
                                    <? } else { ?>

                                        <div class="form-group col-md-4">



                                            <img src="/assets/images/no_image.png" alt="" style="width: 200px; height:200px; text-align:left;">


                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputEmail4">Foto producto</label>

                                            <input name="file" id="file" type="file" class="form-control">
                                        </div>


                                    <? } ?>

                                    <div class="form-group col-md-4">
                                        <div class="border-primary border rounded text-center py-3 mb-3">
                                            <p class="text-primary mb-0">STOCK <r id="useleccionbC"></r>
                                            </p>
                                            <h1 class=" text-primary mb-1"><?= $CantStock ?></h1>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="border-danger border rounded text-center py-3 mb-3">
                                            <p class="text-danger mb-0"><i class="dripicons-bell"></i> ALARMA STOCK</p>
                                            <input type="text" class="form-control text-center" id="alarmastock" name="alarmastock" value="<?= $alarmastock ?>" style="width:120px; margin: 0 auto; font-weight: 900;  font-size: 18pt;">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="border-dark border rounded text-center py-3 mb-3">
                                            <p class="text-dark mb-0"><i class="dripicons-bell"></i> ALARMA VENCI.</p>
                                            <input type="text" class="form-control text-center" id="alarmaven" name="alarmaven" value="<?= $alarmaven ?>" style="width:100px; margin: 0 auto; font-weight: 900;  font-size: 18pt;">


                                        </div>

                                    </div>








                                </div>
                            </div>
                        </div>
                        <!-- fin etapa -->
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Guardar Datos" /><br><br>

            </div>



            <div class="col-lg-12" style="<?= $nomostrar ?>">
                <div class="card m-b-30">




                    <div class="card-body">
                        <h5 class="card-title">Historial de Precios</h5>

                        <div class="form-row" style="display: none;">

                            <div class="form-group col-md-12">
                                <h5 class="card-title">Visualizar unidades en el Carrito de Compras</h5>
                                <label for="ventaminma" style="position: relative; top:3px;">Caja</label>
                                <input type="checkbox" id="vercaja" name="vercaja" value="1" <?= $vercajac ?>>&nbsp;&nbsp;

                                <label for="ventaminma" style="position: relative; top:3px;"><?= $unidadnom ?></label>
                                <input type="checkbox" id="verunidad" name="verunidad" value="1" <?= $verunidadc ?>>&nbsp;&nbsp;

                                <label for="ventaminma" style="position: relative; top:3px;">Kilo</label>
                                <input type="checkbox" id="verkilo" name="verkilo" value="1" <?= $verkiloc ?>>

                            </div>
                        </div>



                        <div class="form-row">


                            <div class="form-group col-md-4">
                                <?php
                                //me fijo si personalize proveedor


                                if ($id_proveedor != "") {
                                    $idsprosql = " Where id = '" . $id_proveedor . "'";
                                }

                                $sqlprovesadr = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores $idsprosql ORDER BY `proveedores`.`id` ASC");


                                if ($rowprosadr = mysqli_fetch_array($sqlprovesadr)) {
                                    $tipocomision = $rowprosadr["tipo"];
                                    if ($tipocomision == "0") {
                                        $selctipoa = "selected";
                                        $selctipob = "";
                                    } else {
                                        $selctipob = "selected";
                                        $selctipoa = "";
                                    }
                                    $comision = $rowprosadr["gananciaa"];
                                    if (empty($id)) {
                                        $iibb_bsas = $rowprosadr["iibb_bsas"];
                                        $iibb_caba = $rowprosadr["iibb_caba"];
                                        $perc_iva = $rowprosadr["perc_iva"];
                                        $iva = $rowprosadr["iva"];
                                    }
                                }


                                if ($cproveedor > 0 && $cproveedor != $comision) {
                                    $comision = $cproveedor;
                                    $tipocomision = $tipoprov;
                                    if ($tipocomision == "0") {
                                        $selctipoa = "selected";
                                        $selctipob = "";
                                    } else {
                                        $selctipob = "selected";
                                        $selctipoa = "";
                                    }
                                }

                                ?>




                                <!-- proveedor nuevo style="display: none;"-->
                                <div class="form-row" style="display: none;">
                                    <div class="form-group col-md-5">
                                        <label for="inputEmail4">Tipo</label><br>
                                        <select class="custom-select " id="tipoprov" name="tipoprov" onMouseOver="calculocosto()" onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto()">
                                            <option value="0" <?= $selctipoa ?>>$</option>
                                            <option value="1" <?= $selctipob ?>>%</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-7">
                                        <input type="text" class="form-control" id="cproveedor" name="cproveedor" value="<?= $comision ?>" onMouseOver="calculocosto()" onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto()">
                                    </div>

                                </div>
                                <!-- fin -->

                            </div>
                        </div>

                        <!-- costos -->

                        <?php

                        if (empty($unidadnomav)) {
                            $unidadnomav = "Kg.";
                        }
                        if (empty($unidadver)) {
                            $unidadver = "Caja";
                        }

                        ?>




                        <div class="table-responsive rwd-table">
                            <table id="tech-companies-1" class="table table-bordered ">
                                <thead>
                                    <tr style="background-color: #EBEDEF;">
                                        <th class="text-center" style="width:100px; background-color: #C8C8C8;">FECHA
                                        </th>
                                        <th class="text-center" style="width:100px; background-color: #C8C8C8;">MODO
                                        </th>
                                        <th class="text-center" style="width:100px;">PRECIO<br>POR&nbsp;<lrt id="seleccionb"><?= $unidadnomav ?></lrt>
                                        </th>
                                        <th class="text-center" style="width:60px;">
                                            <pa style="position: relative; top:-8px">DESC.</pa>
                                        </th>
                                        <th class="text-center" style="width:100px;">PRECIO<br>C/DESC.</th>
                                        <th class="text-center" style="width:60px;">IIBB<br>BS&nbsp;AS</th>
                                        <th class="text-center" style="width:60px;">IIBB<br>CABA</th>
                                        <th class="text-center" style="width:60px;">PERC<br>IVA</th>
                                        <th class="text-center" style="width:60px;">
                                            <pa style="position: relative; top:-8px">IVA</pa>
                                        </th>
                                        <th class="text-center" style="width:100px;">PRECIO<br>BRUTO</th>
                                        <th class="text-center" style="width:60px;">DESC.<br>ADICIONAL</th>
                                        <th class="text-center" style="background-color: #C8C8C8;">COSTO<br>FINAL&nbsp;X&nbsp;<ltr for="inputEmail4" id="seleccionc"><?= $unidadnom ?>
                                        <th class="text-center" style="width:100px;">PRECIO VENTA 1</th>
                                        <th class="text-center" style="width:100px;">PRECIO VENTA 2</th>
                                        <th class="text-center" style="width:100px;">PRECIO VENTA 3</th>
                                        <th class="text-center" style="width:100px;">PRECIO VENTA 4</th>
                                        <th class="text-center" style="width:100px;">PRECIO VENTA 5</th>
                                        <th class="text-center" style="background-color:white;width: 50px;">Acción </ltr>
                                        </th>
                                    </tr>
                                </thead>
                                <tr>

                                    <th class="text-center"></th>
                                    <th class="text-center">
                                        </hu>
                                    </th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">%</th>
                                    <th class="text-center">$</th>

                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>
                                    <th class="text-center">$</th>


                                    <th class="text-center"></th>

                                </tr>
                                <tbody>


                                    <?php
                                    $comilla = "'";

                                    //fecha
                                    $sqlprecioprodf = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id' and confirmado='1' ORDER BY `precioprod`.`fecha` DESC");
                                    while ($rowprecioprodf = mysqli_fetch_array($sqlprecioprodf)) {
                                        $fechalist = $rowprecioprodf["fecha"];
                                        $idpreciolis = $rowprecioprodf["id"];
                                        $nreflis = $rowprecioprodf["nref"];
                                        $costoxcajlis = $rowprecioprodf["costoxcaj"];
                                        $costolis = $rowprecioprodf["costo"];
                                        $descuentolis = $rowprecioprodf["descuento"];
                                        $pcondesculis = $rowprecioprodf["pcondescu"];
                                        $iibb_bsaslis = $rowprecioprodf["iibb_bsas"];
                                        $iibb_cabalis = $rowprecioprodf["iibb_caba"];
                                        $perc_ivalis = $rowprecioprodf["perc_iva"];
                                        $ivalis = $rowprecioprodf["iva"];
                                        $pbrutolsi = $rowprecioprodf["pbruto"];
                                        $desadilis = $rowprecioprodf["desadi"];
                                        if ($rowprecioprodf["id_orden"] > 0) {

                                            $id_orden = "<br>Nº" . $rowprecioprodf["id_orden"];
                                        } else {
                                            $id_orden = "";
                                        }


                                        /* precio ventas */
                                        $mpalis = $rowprecioprodf["mpa"];
                                        $mpblis = $rowprecioprodf["mpb"];
                                        $mpclis = $rowprecioprodf["mpc"];
                                        $mpdlis = $rowprecioprodf["mpd"];
                                        $mpelis = $rowprecioprodf["mpe"];
                                        /*  */
                                        $costo_totallis = $rowprecioprodf["costo_total"];
                                        $fechalistl = explode("-", $fechalist);
                                        $cantd = $cantd + 1;
                                        echo '
                              <tr>
                              <td class="text-center">';
                                        if ($cantd == '1') {

                                            echo  ' <input type="date" name="fechanuevap" id="fechanuevap" value="' . $fechalist . '" style="text-align:center"
                                onchange="ajax_feecha(' . $comilla . '' . $idpreciolis . '' . $comilla . ',$(' . $comilla . '#fechanuevap' . $comilla . ').val());">    <div id="muestroorden4"><div>';
                                        } else {
                                            echo  '' . date('d/m/Y', strtotime($fechalist)) . '';
                                        }
                                        echo ' </td>
                              <td class="text-center">
                                  <!-- modo -->
                                  ' . $nreflis . '
                                  ' . $id_orden . '

                              </td>    
                              <td class="text-center">
                                  <!-- PRECIO UNITARIO -->
                                  <strong>
                                  ' . $costolis . '
                                  </strong>
                              </td>
                              <td class="text-center">

                                  <!-- decuento -->
                                  ' . $descuentolis . '

                              </td>
                              <td class="text-center">

                                  <!-- precio con descuento -->

                                  <strong>
                                  ' . $pcondesculis . '
                                  </strong>


                              </td>
                              <td class="text-center">
                                  <!-- iibb_bsas -->
                                  ' . $iibb_bsaslis . '

                              </td>
                              <td class="text-center">

                                  <!-- iibb_caba -->
                                  ' . $iibb_cabalis . '


                              </td>
                              <td class="text-center">
                                  <!-- perc_iva -->
                                  ' . $perc_ivalis . '

                              </td>
                              <td class="text-center">
                                  <!-- iva -->
                                ' . $ivalis . '
                              </td>
                              <td class="text-center">
                                  <!-- precio bruto -->
                                  <strong>' . $pbrutolsi . '  </strong>

                              </td>
                              <td class="text-center">

                                  <!-- descuentos adicionales -->
                                  ' . $desadilis . '

                              </td>
                              <td class="text-center" style="background-color: yellow;">
                              <strong>  ' . $costo_totallis . '  </strong>
                                
                              </td>      
                              
                              
                              <td class="text-center" style="background-color: white;">
                               ' . $mpalis . ' 
                              </td>
                              <td class="text-center" style="background-color: white;">
                               ' . $mpblis . ' 
                              </td>
                              <td class="text-center" style="background-color: white;">
                               ' . $mpclis . ' 
                              </td>
                              <td class="text-center" style="background-color: white;">
                               ' . $mpdlis . ' 
                              </td>
                              <td class="text-center" style="background-color: white;">
                               ' . $mpelis . ' 
                              </td>


                              <td class="text-center">';
                                        if ($cantd == '1' && $nreflis == "Act.") {
                                            echo ' 
                              
                          
                              <button type="button" class="btn btn-danger btn-sm"  onclick="ajax_elimina(' . $idpreciolis . ')" tabindex="-1">X</button>
                              ';
                                        }
                                        echo ' </td>

                          </tr>

                      
                          ';
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <div id="muestroorden2"></div>
                        <!-- End col -->






                        <div style="display: none;">

                            <div class="form-row">
                                <div class="alert alert-dark col-md-12 text-center" role="alert">
                                    <b>Ganancias</b>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:<?= $fondo ?>">Minorista <?= $moneda ?></label>
                                    <input type="text" class="form-control" id="ganancia_a" name="ganancia_a" value="<?= $gananciaa ?>" onMouseOver="calculocosto()" onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto()" style="width: 80px;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" id="selecciond">&nbsp;&nbsp;Precio x <?= $unidadnom ?> $</label>
                                    <input type="text" class="form-control" id="precio_kiloa" name="precio_kiloa" value="<?= $precio_kiloa ?>" style="color:black;border: 0;font-weight:bold;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" id="uselecciona">&nbsp;&nbsp;Precio x <?= $unidadver ?> $</label>
                                    <input type="text" class="form-control" id="precio_cajaa" name="precio_cajaa" value="<?= $precio_cajaa ?>" style="color:black;border: 0;font-weight:bold;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:<?= $fondo ?>">Mayorista <?= $moneda ?></label>
                                    <input type="text" class="form-control" id="ganancia_b" name="ganancia_b" value="<?= $gananciab ?>" onMouseOver="calculocosto()" onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto()" style="width: 80px;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:white;">Precio x Kg.</label>
                                    <input type="text" class="form-control" id="precio_kilob" name="precio_kilob" value="<?= $precio_kilob ?>" style="color:black;border: 0; font-weight:bold;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:white;">Precio x Caja</label>
                                    <input type="text" class="form-control" id="precio_cajab" name="precio_cajab" value="<?= $precio_cajab ?>" style="color:black;border: 0;font-weight:bold;">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:<?= $fondo ?>">Distribuidor <?= $moneda ?></label>
                                    <input type="text" class="form-control" id="ganancia_c" name="ganancia_c" value="<?= $gananciac ?>" onMouseOver="calculocosto()" onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto()" style="width: 80px;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:white;">Precio x Kg.</label>
                                    <input type="text" class="form-control" id="precio_kiloc" name="precio_kiloc" value="<?= $precio_kiloc ?>" style="color:black;border: 0;font-weight:bold;">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" style="color:white;">Precio x Caja</label>
                                    <input type="text" class="form-control" id="precio_cajac" name="precio_cajac" value="<?= $precio_cajac ?>" style="color:black;border: 0;font-weight:bold;">
                                </div>
                            </div>
                        </div>






                        <div id="muestroproductos"></div>
                        <input name="jfndhom" type="hidden" id="jfndhom" name="jfndhom" value="<?= $idcod ?>">
                        <input name="fechalistar" type="hidden" id="fechalistar" name="fechalistar" value="<?= $fechalistar ?>">
                        <br>

                    </div>

                </div>


            </div>

    </form>

    <!-- End col -->

    <script>
        function enviar_valores(valor, valorb) {
            //Pasa los parámetros a la pagina buscar
            location.href = '?jfndhom=<?= $idcod ?>&kkfnuhtf=' + valor;
        }

        function enviar_valoresb(valor) {
            //Pasa los parámetros a la pagina buscar
            location.href = '?jfndhom=<?= $idcod ?>&ookdjfv=' + valor;
        }
    </script>
    <script>
        function mostrarSelecciona() {
            var selectElement = document.getElementById("modo_producto");
            var selectedValue = selectElement.options[selectElement.selectedIndex].text;

            var pElementu = document.getElementById("uselecciona");

            pElementu.textContent = "Precio x " + selectedValue + "  $";

            var pElementuf = document.getElementById("useleccionb");

            pElementuf.textContent = selectedValue.toUpperCase();

            var pElementufC = document.getElementById("useleccionbC");

            pElementufC.textContent = selectedValue.toUpperCase();

            var pElementufB = document.getElementById("useleccionbB");

            pElementufB.textContent = selectedValue;
        }



        function mostrarSeleccion() {
            var selectElement = document.getElementById("unidadnom");
            var selectedValue = selectElement.options[selectElement.selectedIndex].text;

            var pElementa = document.getElementById("selecciona");
            pElementa.textContent = selectedValue;

            var pElementa = document.getElementById("seleccionaa");
            pElementa.textContent = selectedValue + " y ";

            var pElementb = document.getElementById("seleccionb");
            pElementb.textContent = selectedValue.toUpperCase();

            var pElementb = document.getElementById("seleccionc");
            pElementb.textContent = selectedValue.toUpperCase();

            var pElementd = document.getElementById("selecciond");
            pElementd.textContent = " Precio x " + selectedValue + " $";
        }
    </script>

    <script>
        function ajax_elimina(idpreciolis) {
            var parametros = {
                "idpreciolis": idpreciolis
            };
            $.ajax({
                data: parametros,
                url: 'htndfkd.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden2").html('');
                },
                success: function(response) {
                    $("#muestroorden2").html(response);
                }
            });
        }
    </script>



    <script>
        function showInput() {
            var selectValue = document.getElementById("customSwitch").checked;
            var extraInputDiv = document.getElementById("extraInput");

            if (selectValue) {
                extraInputDiv.innerHTML = '<a href="/mix_productos/?jfndhom=<?= $idcod ?>" class="btn btn-primary-rgba" title="Editar el Mix"><i class="dripicons-link-broken"></i></a>';
            } else {
                extraInputDiv.innerHTML = '<a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>';
            }
        }

        function ajax_esmix(esmix) {
            var parametros = {
                "esmix": esmix,
                "id_producto": '<?= $idcod ?>'
            };
            $.ajax({
                data: parametros,
                url: 'esmix.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden2").html('');
                },
                success: function(response) {
                    $("#muestroorden2").html(response);
                }
            });
        }
    </script>



    <script>
        function ajax_feecha(idprecio, fechanuevap) {
            var parametros = {
                "idprecio": idprecio,
                "fechanuevap": fechanuevap,
                "id_producto": '<?= $id ?>'
            };
            $.ajax({
                data: parametros,
                url: '../lproductos/actualizarfecha.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden4").html('');
                },
                success: function(response) {
                    $("#muestroorden4").html(response);
                }
            });
        }
    </script>



    <?php
    mysqli_close($rjdhfbpqj);

    include('../template/pie.php'); ?>