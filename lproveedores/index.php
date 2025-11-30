<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');

$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);
$dmcnfg = $_GET['dmcnfg'];
$tipoproveedor = $_GET['tipoproveedor']; //tiopo proveedor 0 es para mercaderia

if ($tipoproveedor == '0') {
    $nombretipo = 'Mercadería';
    $urlpro = 'proveedor';
} else {
    $nombretipo = 'varios Rubros';
    $urlpro = 'proveedoresvarios';
}

$sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id' and id != '0'");
if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
    $id = $rowproveedores["id"];
    $empresa = $rowproveedores["empresa"];
    $whatsapp = $rowproveedores["whatsapp"];
    $telefono = $rowproveedores["telefono"];
    $email = $rowproveedores["email"];
    $web = $rowproveedores["web"];
    $estado = $rowproveedores["estado"];
    $cuit = $rowproveedores["cuit"];
    $tipoiva = $rowproveedores["tipoiva"];
    $rubro = $rowproveedores["rubro"];
    $saldoini = $rowproveedores["saldoini"];
    $saldoiniR = $rowproveedores["saldoiniR"];

    if ($rubro == "0") {
        $selrub0 = "selected";
    }
    if ($rubro == "1") {
        $selrub1 = "selected";
    }
    if ($rubro == "2") {
        $selrub2 = "selected";
    }
    if ($rubro == "3") {
        $selrub3 = "selected";
    }
    if ($rubro == "4") {
        $selrub4 = "selected";
    }
    if ($rubro == "5") {
        $selrub5 = "selected";
    }
    if ($rubro == "6") {
        $selrub6 = "selected";
    }
    if ($rubro == "7") {
        $selrub7 = "selected";
    }




    if ($tipoiva == "1") {
        $seleca = "selected";
    }
    if ($tipoiva == "2") {
        $selecb = "selected";
    }
    if ($tipoiva == "3") {
        $selecc = "selected";
    }


    if ($estado == "0") {
        $selcestadoa = "selected";
    } else {
        $selcestadob = "selected";
    }

    $tipo = $rowproveedores["tipo"];

    if ($estado == "0") {
        $selctipoa = "selected";
    } else {
        $selctipob = "selected";
    }
    $gananciaa = $rowproveedores["gananciaa"];
    $gananciab = $rowproveedores["gananciab"];
    $gananciac = $rowproveedores["gananciac"];
    $address = $rowproveedores["address"];
    //impuestos
    $iibb_bsas = $rowproveedores["iibb_bsas"];
    $iibb_caba = $rowproveedores["iibb_caba"];
    $perc_iva = $rowproveedores["perc_iva"];
    $iva = $rowproveedores["iva"];


    $razonsocial1 = $rowproveedores["razonsocial1"];
    $razonsocial2 = $rowproveedores["razonsocial2"];
    $razonsocial3 = $rowproveedores["razonsocial3"];
    $razonsocial4 = $rowproveedores["razonsocial4"];
    $razonsocial5 = $rowproveedores["razonsocial5"];

    $cuit1 = $rowproveedores["cuit1"];
    $cuit2 = $rowproveedores["cuit2"];
    $cuit3 = $rowproveedores["cuit3"];
    $cuit4 = $rowproveedores["cuit4"];
    $cuit5 = $rowproveedores["cuit5"];

    $cbu1 = $rowproveedores["cbu1"];
    $cbu2 = $rowproveedores["cbu2"];
    $cbu3 = $rowproveedores["cbu3"];
    $cbu4 = $rowproveedores["cbu4"];
    $cbu5 = $rowproveedores["cbu5"];

    $alias1 = $rowproveedores["alias1"];
    $alias2 = $rowproveedores["alias2"];
    $alias3 = $rowproveedores["alias3"];
    $alias4 = $rowproveedores["alias4"];
    $alias5 = $rowproveedores["alias5"];
    $orden = $rowproveedores["orden"];

    switch ($orden) {
        case '1':
            $cherra1 = 'checked';
            break;
        case '2':
            $cherra2 = 'checked';
            break;
        case '3':
            $cherra3 = 'checked';
            break;
        case '4':
            $cherra4 = 'checked';
            break;
        case '5':
            $cherra5 = 'checked';
            break;
        case '0':
            $cherra1 = 'checked';
            break;
    }
}


if (!empty($id)) {
    $titulopro = "Marca " . $empresa;
} else {
    $titulopro = '<i class="dripicons-user-group"></i> Nuevo Proveedor';
}
?>

<link rel="manifest" href="js13kpwa.webmanifest">


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Proveedor <?= $nombretipo ?></h4>
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
                <a href="/<?= $urlpro ?>"> <button class="btn btn-primary"><i class="dripicons-user-group"></i> Listar Proveedor</button></a>
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
                    <? if (!empty($dmcnfg)) { ?><br>
                        <div class="col-md-6 alert alert-primary text-center" role="alert">
                            Información <a href="#" class="alert-link">Actualizada!</a>.
                        </div>
                    <? } ?>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="inputEmail4">Nombre Proveedor</label>
                            <input type="text" class="form-control" id="empresa" value="<?= $empresa ?>" required>
                        </div>



                        <div class="form-group col-md-3">



                            <?php

                            if ($tipoproveedor == '0') {
                                echo ' <input name="rubro" type="hidden" id="rubro" value="0">';
                            } else {
                                echo '
                                <label for="inputEmail4">Rubro</label><br> 
                                  <select class="custom-select" id="rubro" name="rubro">
                                <option value="1" ' . $selrub1 . '>Servicios</option>
                                <option value="2" ' . $selrub2 . '>Insumos</option>
                                <option value="6" ' . $selrub6 . '>Combustible</option>
                                <option value="7" ' . $selrub7 . '>Comida</option>
                                <option value="4" ' . $selrub4 . '>Reparaciones</option>
                                <option value="3" ' . $selrub3 . '>Alquileres</option>
                                <option value="5" ' . $selrub5 . '>Otros</option>
                            </select>
                                ';
                            }

                            ?>
                            <input name="tipoproveedor" type="hidden" id="tipoproveedor" value="<?= $tipoproveedor ?>">

                        </div>
                    </div>

                    <div class="form-row">


                        <div class="form-group col-md-9">
                            <label for="inputEmail4">Dirección</label>
                            <input type="text" id="address" class="form-control" value="<?= $address ?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Estado</label><br> <input name="jfndhom" type="hidden" id="jfndhom" value="<?= $idcod ?>">
                            <select class="custom-select" id="estado">
                                <option value="0" <?= $selcestadoa ?>>Activo</option>
                                <option value="1" <?= $selcestadob ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>






                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"> WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" value="<?= $whatsapp ?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Télefono</label>
                            <input type="text" class="form-control" id="telefono" value="<?= $telefono ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= $email ?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Web</label>
                            <input type="text" class="form-control" id="web" value="<?= $web ?>" autocomplete="off">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Condición frente al IVA</label><br>
                            <select id="tipoiva" class="custom-select">
                                <option value="0">Seleccione una Opci&oacute;n</option>

                                <option value="1" <?= $seleca ?>>IVA Responsable Inscripto</option>
                                <option value="2" <?= $selecb ?>>Responsable Monotributo</option>
                                <option value="3" <?= $selecc ?>>Consumidor Final</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label><br>

                            <input type="text" class="form-control" id="cuit" value="<?= $cuit ?>" autocomplete="off">
                        </div>




                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">IIBB BS. AS.</label>
                            <input type="text" class="form-control" id="iibb_bsas" value="<?= $iibb_bsas ?>" onclick="select()">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputEmail4">IIBB CABA</label>
                            <input type="text" class="form-control" id="iibb_caba" value="<?= $iibb_caba ?>" onclick="select()">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputEmail4">PERC. IVA</label>
                            <input type="text" class="form-control" id="perc_iva" value="<?= $perc_iva ?>" onclick="select()">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputEmail4">IVA</label>
                            <input type="text" class="form-control" id="iva" value="<?= $iva ?>" onclick="select()">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="alert alert-primary" role="alert">
                                <b>Saldo Inicial Cuenta A</b>
                                <input type="text" class="form-control" id="saldoini" name="saldoini" placeholder="Numero" value="<?= $saldoini ?>" <?= $verbo ?>>

                            </div> <br>
                            <div class="alert alert-primary" role="alert">
                                <b>Saldo Inicial Cuenta R</b>
                                <input type="text" class="form-control" id="saldoiniR" name="saldoiniR" placeholder="Numero" value="<?= $saldoiniR ?>" <?= $verbo ?>>

                            </div>
                        </div>

                    </div>




                    <div class="form-row" style="display: none;">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Tipo de Costo</label><br>
                            <select class="custom-select " id="tipo" style="width:160px">
                                <option value="0" <?= $selctipoa ?>>Pesos</option>
                                <option value="1" <?= $selctipob ?>>Porcentaje</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Costo Proveedor x Kilo</label>
                            <input type="text" class="form-control" id="gananciaa" value="<?= $gananciaa ?>">
                        </div>

                    </div> <input type="hidden" class="form-control" id="gananciac" value="<?= $gananciac ?>">
                    <input type="hidden" class="form-control" id="gananciab" value="<?= $gananciab ?>">
                    <div id="muestroproveedores" style="text-align:center;width: 100%;background-color:white;"></div>




                    <br>
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_proveedores($('#jfndhom').val(), $('#empresa').val(), $('#whatsapp').val(), $('#telefono').val(), $('#email').val(), $('#web').val(), $('#estado').val(), $('#tipo').val(), $('#gananciaa').val(), $('#gananciab').val(), $('#gananciac').val(), $('#address').val(), $('#tipoiva').val(), $('#cuit').val(), $('#iibb_bsas').val(), $('#iibb_caba').val(), $('#perc_iva').val(), $('#iva').val(), $('#rubro').val(), $('#tipoproveedor').val(), $('#saldoini').val(), $('#saldoiniR').val(), $('#razonsocial1').val(),$('#cuit1').val(), $('#cbu1').val(), $('#alias1').val(), $('#razonsocial2').val(), $('#cuit2').val(), $('#cbu2').val(), $('#alias2').val(), $('#razonsocial3').val(), $('#cuit3').val(), $('#cbu3').val(), $('#alias3').val(), $('#razonsocial4').val(), $('#cuit4').val(), $('#cbu4').val(), $('#alias4').val(), $('#razonsocial5').val(), $('#cuit5').val(), $('#cbu5').val(), $('#alias5').val(),$('input:radio[name=orden]:checked').val());" value="Guardar Datos" />

                </div>
            </div>
        </div> <!-- End col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Datos Bancarios</h5>
                </div>
                <div class="card-body">


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">&nbsp;&nbsp;<input class="form-check-input" type="radio" name="orden" id="orden" value="1" <?= $cherra1 ?>>Datos 1 - Banco </label><br>


                            <input type="text" class="form-control" id="razonsocial1" value="<?= $razonsocial1 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label>
                            <input type="text" class="form-control" id="cuit1" value="<?= $cuit1 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CBU</label>
                            <input type="text" class="form-control" id="cbu1" value="<?= $cbu1 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">N° de Cuenta</label>
                            <input type="text" class="form-control" id="alias1" value="<?= $alias1 ?>">
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">&nbsp;&nbsp;<input class="form-check-input" type="radio" name="orden" id="orden" value="2" <?= $cherra2 ?>>Datos 2 - Banco</label><br>
                            <input type="text" class="form-control" id="razonsocial2" value="<?= $razonsocial2 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label>
                            <input type="text" class="form-control" id="cuit2" value="<?= $cuit2 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CBU</label>
                            <input type="text" class="form-control" id="cbu2" value="<?= $cbu2 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">N° de Cuenta</label>
                            <input type="text" class="form-control" id="alias2" value="<?= $alias2 ?>">
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">&nbsp;&nbsp;<input class="form-check-input" type="radio" name="orden" id="orden" value="3" <?= $cherra3 ?>>Datos 3 - Banco</label><br>
                            <input type="text" class="form-control" id="razonsocial3" value="<?= $razonsocial3 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label>
                            <input type="text" class="form-control" id="cuit3" value="<?= $cuit3 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CBU</label>
                            <input type="text" class="form-control" id="cbu3" value="<?= $cbu3 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">N° de Cuenta</label>
                            <input type="text" class="form-control" id="alias3" value="<?= $alias3 ?>">
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">&nbsp;&nbsp;<input class="form-check-input" type="radio" name="orden" id="orden" value="4" <?= $cherra4 ?>>Datos 4 - Banco</label><br>
                            <input type="text" class="form-control" id="razonsocial4" value="<?= $razonsocial4 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label>
                            <input type="text" class="form-control" id="cuit4" value="<?= $cuit4 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CBU</label>
                            <input type="text" class="form-control" id="cbu4" value="<?= $cbu4 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">N° de Cuenta</label>
                            <input type="text" class="form-control" id="alias4" value="<?= $alias4 ?>">
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">&nbsp;&nbsp;<input class="form-check-input" type="radio" name="orden" id="orden" value="5" <?= $cherra5 ?>>Datos 5 - Banco</label><br>
                            <input type="text" class="form-control" id="razonsocial5" value="<?= $razonsocial5 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CUIT</label>
                            <input type="text" class="form-control" id="cuit5" value="<?= $cuit5 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CBU</label>
                            <input type="text" class="form-control" id="cbu5" value="<?= $cbu5 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">N° de Cuenta</label>
                            <input type="text" class="form-control" id="alias5" value="<?= $alias5 ?>">
                        </div>

                    </div>
                    <br>
                    <input type="button" name="submit" class="btn btn-primary" onclick="ajax_proveedores($('#jfndhom').val(), $('#empresa').val(), $('#whatsapp').val(), $('#telefono').val(), $('#email').val(), $('#web').val(), $('#estado').val(), $('#tipo').val(), $('#gananciaa').val(), $('#gananciab').val(), $('#gananciac').val(), $('#address').val(), $('#tipoiva').val(), $('#cuit').val(), $('#iibb_bsas').val(), $('#iibb_caba').val(), $('#perc_iva').val(), $('#iva').val(), $('#rubro').val(), $('#tipoproveedor').val(), $('#saldoini').val(), $('#saldoiniR').val(), $('#razonsocial1').val(), $('#cuit1').val(), $('#cbu1').val(), $('#alias1').val(), $('#razonsocial2').val(), $('#cuit2').val(), $('#cbu2').val(), $('#alias2').val(), $('#razonsocial3').val(), $('#cuit3').val(), $('#cbu3').val(), $('#alias3').val(), $('#razonsocial4').val(), $('#cuit4').val(), $('#cbu4').val(), $('#alias4').val(), $('#razonsocial5').val(), $('#cuit5').val(), $('#cbu5').val(), $('#alias5').val(),$('input:radio[name=orden]:checked').val());" value="Guardar Datos" />
                </div>
            </div>

        </div>
        <!-- End col -->


        <script>
            function ajax_proveedores(jfndhom, empresa, whatsapp, telefono, email, web, estado, tipo, gananciaa, gananciab, gananciac, address, tipoiva, cuit, iibb_bsas, iibb_caba, perc_iva, iva, rubro, tipoproveedor, saldoini, saldoiniR, razonsocial1, cuit1, cbu1, alias1, razonsocial2, cuit2, cbu2, alias2, razonsocial3, cuit3, cbu3, alias3, razonsocial4, cuit4, cbu4, alias4, razonsocial5, cuit5, cbu5, alias5, orden) {
                var parametros = {
                    "jfndhom": jfndhom,
                    "empresa": empresa,
                    "whatsapp": whatsapp,
                    "telefono": telefono,
                    "email": email,
                    "web": web,
                    "estado": estado,
                    "tipo": tipo,
                    "gananciaa": gananciaa,
                    "gananciab": gananciab,
                    "gananciac": gananciac,
                    "address": address,
                    "tipoiva": tipoiva,
                    "cuit": cuit,
                    "iibb_bsas": iibb_bsas,
                    "iibb_caba": iibb_caba,
                    "perc_iva": perc_iva,
                    "iva": iva,
                    "rubro": rubro,
                    "tipoproveedor": tipoproveedor,
                    "saldoini": saldoini,
                    "saldoiniR": saldoiniR,
                    "razonsocial1": razonsocial1,
                    "cuit1": cuit1,
                    "cbu1": cbu1,
                    "alias1": alias1,
                    "razonsocial2": razonsocial2,
                    "cuit2": cuit2,
                    "cbu2": cbu2,
                    "alias2": alias2,
                    "razonsocial3": razonsocial3,
                    "cuit3": cuit3,
                    "cbu3": cbu3,
                    "alias3": alias3,
                    "razonsocial4": razonsocial4,
                    "cuit4": cuit4,
                    "cbu4": cbu4,
                    "alias4": alias4,
                    "razonsocial5": razonsocial5,
                    "cuit5": cuit5,
                    "cbu5": cbu5,
                    "alias5": alias5,
                    "orden": orden
                };
                $.ajax({
                    data: parametros,
                    url: 'insert_proveedores.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroproveedores").html('<img src="../assets/images/loader.gif">');
                    },
                    success: function(response) {
                        $("#muestroproveedores").html(response);
                    }
                });
            }
        </script>





        <?php include('../template/pie.php'); ?>