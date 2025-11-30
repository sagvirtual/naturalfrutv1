<?php include('../f54du60ig65.php');
include('../template/cabezal.php');
include('../lferiados/inputdateferiados.php');
if (!empty($_GET['edit'])) {
    $_SESSION['edit'] = $_GET['edit'];
}

if (!empty($_GET['hdnsbloekdjgsd'])) {
    $_SESSION['hojaderut'] = $_GET['hdnsbloekdjgsd'];
}

if (!empty($_GET['fecharepart'])) {
    $fecharemi = base64_encode($_GET['fecharepart']);
    $_SESSION['hojaderut'] = $fecharemi;
    $noblack = "1";
}
if (empty($idcliente)) {

    $idorcod = $_GET['jfndhom'];
    $idordenbbb = base64_decode($idorcod);

    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id='$idordenbbb'");
    if ($rowordent = mysqli_fetch_array($sqlordent)) {
        $_SESSION['fecharepart'] =  $rowordent['fecha'];
        $_SESSION['idcliente'] =  $rowordent['id_cliente'];
        $pedir = $rowordent["pedir"];
        if ($pedir == '1') {
            $chec = "checked";
        } else {
            $chec = "";
        }
    }
    $idcliente = $rowordent['id_cliente'];

    //$_SESSION['dianoms']=;
    //$_SESSION['id_rubro']=;
    //$_SESSION['tipo_cliente']=;
    //$_SESSION['id_orden'])=;

}


$idproducto = $_GET['idproducto'];  //id para enlazar el producto para extrar precio
if (!empty($idproducto)) {
    $sepid = explode("|", $idproducto);
    $idprop = $sepid[0];
    $priciop = $sepid[1];
    $kilop = $sepid[2];
    $pretotal = $priciop * $kilop;
    $pretotalv = number_format($pretotal, 2, '.', '');
} else {
    $priciop = "0.00";
    $kilop = "0";
    $pretotal = "0.00";
}
if ($_GET['dianoms'] == "" && $_GET['fecharepart'] != "") {
    unset($_SESSION['idcliente']);
    $_SESSION['fecharepart'] = $_GET['fecharepart'];
}

if ($_GET['idcliente'] != "") {
    $_SESSION['idcliente'] = $_GET['idcliente'];
}
$_SESSION['dianoms'] = $_GET['dianoms'];

if ($_SESSION['fecharepart'] == "") {
    $fechar = $fechahoy;
} else {
    $fechar = $_SESSION['fecharepart'];
}


if ($_SESSION['dianoms'] != "") {
    unset($_SESSION['idcliente']);
    unset($_SESSION['tipo_cliente']);
    unset($_SESSION['id_orden']);
    $dianom = $_SESSION['dianoms'];
} else {
    $dianoms = strtotime($fechar);
    $dianom = date("N", $dianoms);
}

if ($dianom == "7") {
    $dianom = '0';
}
if ($dianom == "1") {
    $dianombre = "LUNES";
    $diasele1 = "selected";
}
if ($dianom == "2") {
    $dianombre = "MARTES";
    $diasele2 = "selected";
}
if ($dianom == "3") {
    $dianombre = "MIERCOLES";
    $diasele3 = "selected";
}
if ($dianom == "4") {
    $dianombre = "JUEVES";
    $diasele4 = "selected";
}
if ($dianom == "5") {
    $dianombre = "VIERNES";
    $diasele5 = "selected";
}
if ($dianom == "6") {
    $dianombre = "SABADO";
    $diasele6 = "selected";
}
if ($dianom == "0") {
    $dianombre = "DOMINGO";
    $diasele0 = "selected";
}
if ($dianom == "10") {
    $dianombre = "Todos";
    $diasele10 = "selected";
}

$idcod = $_GET['jfndhom'];
$id = base64_decode($idcod);

$eplofeb = explode("-", $fechar);


//aca extraigo el rubro para que muetstre los productos

$idcli = $_SESSION['idcliente'];
$sqlclientesb = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
if ($rowclientesb = mysqli_fetch_array($sqlclientesb)) {
    $_SESSION['id_rubro'] = $rowclientesb["id_rubro"];
    $_SESSION['tipo_cliente'] = $rowclientesb["tipo_cliente"];
    $idcamioneta = $rowclientesb["camioneta"];
    $listaid = $rowclientesb["id_rubro"];
    $buscqueda = " and  id_rubro$listaid = '1'";
} else {
    if (!empty($_GET['idcamioneta'])) {
        $_SESSION['idcamioneta'] = $_GET['idcamioneta'];
    }
    $idcamioneta = $_SESSION['idcamioneta'];
}
$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where id = '$listaid'");
if ($rowrubros = mysqli_fetch_array($sqlrubros)) {
    $nombrerub = $rowrubros["nombre"];
}


if (!empty($id)) {
    $titulopro = '<i class="fa fa-file-text"></i> Editar Remito ' . $cliente;
} else {
    $titulopro = '<i class="fa fa-file-text"></i> Remito Cliente';
}


?>




<style>
    .fontco {
        color: black;


    }
</style>
<!-- Select2 css -->
<link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<!-- Tagsinput css -->
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-4 col-lg-4">
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


                <?php
                //me fijo si tiene un saldo inicial


                $sqlordenar = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$idcli' and fin='1' ORDER BY `orden`.`fecha` DESC");
                if ($rowordenar = mysqli_fetch_array($sqlordenar)) {
                    $totaldeber = $rowordenar["total"];
                    $totaldebevr = '<h3>Saldo Anterior: ' . number_format($totaldeber, 2, ',', '.') . '</h3>  ';
                } else {
                    $sqlclientesan = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli' and sloff='0' and saldoini!='0'");
                    if ($rowclientes = mysqli_fetch_array($sqlclientesan)) {
                        $saldoini = $rowclientes["saldoini"];
                        $totaldebevr = '<h3>Saldo Anterior: ' . number_format($saldoini, 2, ',', '.') . '</h3>  ';
                    }
                }

                ?>


                <?= $totaldebevr ?>&nbsp;&nbsp;&nbsp;&nbsp;

                <? if ($idcli != "") { ?>
                    <input type="hidden" id="id_ordenr" value="<?= $idordenbbb ?>">
                    Transferencia <input type="checkbox" id="pedir" name="pedir" value="1" onclick="ajax_pedirdinero($('#id_ordenr').val(), $('input:checkbox[name=pedir]:checked').val());" <?= $chec ?>>
                <? } ?>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar"><?php

                                    if ($_SESSION['hojaderut'] != "") {

                                    ?>
                    <a href="/hoja_de_ruta/ver_hoja_de_ruta?hdnsbloekdjgsd=<?= $_SESSION['hojaderut'] ?>&hdnskdjjgsd=<?= base64_encode($idcamioneta) ?>"> <button class="btn btn-primary"><i class="fa fa-file-text"></i> Hoja de ruta</button></a><? } else { ?>

                    <a href="/hoja_de_ruta/"> <button class="btn btn-primary"><i class="fa fa-file-text"></i> Hoja de ruta</button></a>

                <? } ?>
            </div>
            <!--     <div class="widgetbar">
                <a href="/orden"> <button class="btn btn-primary"><i class="fa fa-file-text"></i> Listar Remitos</button></a>
            </div> -->
        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->

<?php

if (!empty($_SESSION['hojaderut'] && $noblack != "1")) {
    $blokcfecha = "readonly";
}

?>
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">



        <div class="col-lg-6 card m-b-30" style="background-color: #cfd0d1; border:none;">

            <div class="form-row">

                <div class="form-group row col-md-12">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Fecha:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecharepart" id="fecharepart" value="<?= $fechar ?>" min="<?= $fechahoy ?>" 
                        onchange="enviar_valores($('#fecharepart').val());" <?= $blokcfecha ?>>
                    </div>
                </div>

                <div class="form-group row col-md-12">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Día:</label>
                    <div class="col-sm-8">
                        <?php

                        if ($_SESSION['edit'] == "1") {
                            $desib = "disabled";
                        }


                        ?>
                        <select class="select2-multi-select form-control" id="dianoms" name="dianoms" onchange="enviar_valoresb(this.value);" <?= $desib ?>>
                            <option value="10" <?= $diasele10 ?>>Todos</option>
                            <option value="1" <?= $diasele1 ?>>Lunes</option>
                            <option value="2" <?= $diasele2 ?>>Martes</option>
                            <option value="3" <?= $diasele3 ?>>Miercoles</option>
                            <option value="4" <?= $diasele4 ?>>Jueves</option>
                            <option value="5" <?= $diasele5 ?>>Viernes</option>
                            <option value="6" <?= $diasele6 ?>>Sábados</option>
                            <option value="0" <?= $diasele0 ?>>Domingos</option>

                        </select>
                    </div>
                </div>


                <div class="form-group row col-md-12">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Cliente:</label>

                    <? if ($idcli == "") {
                        $focusa = "autofocus";
                    } else {
                        $focusb = "autofocus";
                        if ($_GET['idproducto'] != "") {

                            if ($idproducto == 'hdusvx76tdg') {
                                $focusb = "autofocus";
                                $focusc = "";
                            } else {
                                $focusb = "";
                                $focusc = "autofocus";
                            }
                        }
                    } ?>

                    <div class="col-sm-8">
                        <?

                        if (empty($idcamioneta)) {
                            $sqlcam = "";
                        } else {
                            $sqlcam = "and camioneta='" . $idcamioneta . "'";
                        }

                        ?>
                        <select class="select2-multi-select form-control" id="nombre" name="nombre" onchange="enviar_valoresc(this.value);" <?= $focusa ?> <?= $desib ?>>
                            <option value="0">Listado de Clientes...</option>
                            <?php
                            $idcli = $_SESSION['idcliente'];


                            // si es viernes sabado o domingo busca todos los clientes
                            if ($dianom != "")
                                if ($dianom != "10") {
                                    $forsq = "and dia_repart$dianom='1'";
                                    $unico = "NOT IN (id='" . $idcli . "')";
                                } else {
                                    $forsq = "";
                                }



                            $sqlclientes1 = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado = '0' and id='$idcli' $sqlcam ORDER BY `clientes`.`address` ASC");
                            if ($rowclientes1 = mysqli_fetch_array($sqlclientes1)) {
                                echo ' <option value="' . $rowclientes1["id"] . '" ';
                                if ($_SESSION['idcliente'] == $rowclientes1["id"]) {
                                    echo "selected";
                                }
                                echo '>' . $rowclientes1["address"] . ', ' . $rowclientes1["nom_empr"] . '</option>';
                            }


                            $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where  estado = '0' $sqlcam $forsq $unico
                                     ORDER BY `clientes`.`address` ASC");
                            while ($rowclientes = mysqli_fetch_array($sqlclientes)) {
                                echo ' <option value="' . $rowclientes["id"] . '" ';
                                if ($_SESSION['idcliente'] == $rowclientes["id"]) {
                                    echo "selected";
                                }
                                echo '>' . $rowclientes["address"] . ', ' . $rowclientes["nom_empr"] . '</option>';
                            }



                            ?>

                        </select>

                    </div>
                </div>
                <?php if (!empty($_SESSION['idcliente'])) {
                    if ($_GET['idproducto'] != "") {
                        $inserin = 'action="inser_item"';
                    } else { {
                            $inserin = "";
                        }
                    }
                ?>



                    <?php
                    if ($_GET['idproducto'] != 'hdusvx76tdg' && $idprop != '' && $idcli != '') {
                        //inserto como favorito

                        $sqlfavoritos = mysqli_query($rjdhfbpqj, "SELECT * FROM favoritos Where id_cliente='$idcli' and id_producto = '$idprop'");
                        if ($rowfavoritos = mysqli_fetch_array($sqlfavoritos)) {
                        } else {
                            $sqlfavoritosi = "INSERT INTO `favoritos` (id_cliente, id_producto) VALUES ('$idcli', '$idprop');";
                            mysqli_query($rjdhfbpqj, $sqlfavoritosi) or die(mysqli_error($rjdhfbpqj));
                        }
                    }

                    //fin

                    ?>
                    <form <?= $inserin ?> name="formda48" id="formda48" method="post" style="width: 100%;">
                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label  text-right">Producto <?= $nombrerub ?>:</label>
                            <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">
                            <input type="hidden" id="id_camioneta" name="id_camioneta" value="<?= $idcamioneta ?>">
                            <input type="hidden" id="fecha" name="fecha" value="<?= $fechar ?>">
                            <input type="hidden" id="numday" name="numday" value="<?= $dianom ?>">
                            <div class="col-sm-8">
                                <select class="select2-single form-control" name="producto" id="producto" onchange="enviar_producto(this.value);" <?= $focusb ?>>
                                    <option>Select</option>
                                    <?php

                                    $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
                                    while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                        $id_categoria = $rowcategorias["id"];
                                        $nombrecate = strtoupper($rowcategorias["nombre"]);

                                        //me fijo si hay productos en esa categoria
                                        if ('hdusvx76tdg' == 'hdusvx76tdg') {
                                            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda");
                                        } else {

                                            //join si el producto esta para el cliente
                                            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.id_marcas, e.estado, e.nombre, e.position, u.id_producto, u.id_cliente 
                                        FROM productos e INNER JOIN favoritos u ON e.id = u.id_producto Where id_cliente='$idcli' and categoria='$id_categoria' and  estado = '0' $buscqueda");
                                            //fin
                                        }

                                        if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

                                            $id_marcas = $rowproductosv['id_marcas'];
                                            $sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = ' $id_marcas' and estado='0'");
                                            if ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
                                                $inactivo = '1';
                                            }
                                            if ($inactivo == '1') {
                                                echo '<optgroup label="' . $nombrecate . '">';
                                            }
                                        }
                                        if ($inactivo == '1') {


                                            if ('hdusvx76tdg' == 'hdusvx76tdg') {
                                                $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda ORDER BY `productos`.`position` ASC");
                                            } else {
                                                //join si el producto esta para el cliente
                                                $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.estado, e.nombre, e.position, u.id_producto, u.id_cliente FROM productos e INNER JOIN favoritos u ON e.id = u.id_producto Where id_cliente='$idcli' and categoria='$id_categoria' and  estado = '0' $buscqueda ORDER BY `position` ASC");


                                                //fin


                                            }



                                            //busco el produco por la categoria
                                            /*  $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda ORDER BY `productos`.`position` ASC");*/
                                            while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                                $id_producto = $rowproductos['id'];



                                                //aca saco los valores  la fecha que toma d eprecio es menor o igual a la fecha de la orden
                                                $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT kilo, costoxcaja, precio_kiloa, precio_cajaa, precio_kilob, precio_cajab, precio_kiloc, precio_cajac, costo_total FROM precioprod Where id_producto = '$id_producto' and  fecha <= '$fechar' ORDER BY `precioprod`.`fecha` DESC");
                                                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                    $kilo = $rowprecioprod["kilo"];
                                                    $list = $_SESSION['tipo_cliente'];
                                                    $costo_total = $rowprecioprod['costo_total'];
                                                    if ($list == '0') {
                                                        $precio_kiloa = $rowprecioprod["precio_kiloa"];
                                                        $precio_cajaa = $rowprecioprod["precio_cajaa"];
                                                        $precio_kilo = number_format($precio_kiloa, 2, '.', '');
                                                        $precio_caja = number_format($precio_cajaa, 2, ',', '.');
                                                        $tipocli = "Minorista";
                                                    }
                                                    if ($list == '1') {
                                                        $precio_kilob = $rowprecioprod["precio_kilob"];
                                                        $precio_cajab = $rowprecioprod["precio_cajab"];
                                                        $precio_kilo = number_format($precio_kilob, 2, '.', '');
                                                        $precio_caja = number_format($precio_cajab, 2, ',', '.');
                                                        $tipocli = "Mayorista";
                                                    }
                                                    if ($list == '2') {
                                                        $precio_kiloc = $rowprecioprod["precio_kiloc"];
                                                        $precio_cajac = $rowprecioprod["precio_cajac"];
                                                        $precio_kilo = number_format($precio_kiloc, 2, '.', '');
                                                        $precio_caja = number_format($precio_cajac, 2, ',', '.');
                                                        $tipocli = "Distribuidor";
                                                    }
                                                }
                                                //fin valores

                                                $nombreproduc = strtolower($rowproductos["nombre"]);
                                                $nombreproduc = ucfirst($nombreproduc);
                                                echo '<option value="' . $rowproductos["id"] . '|' . $precio_kilo . '|' . $kilo . '|' . $costo_total . '" ';
                                                if ($idprop == $rowproductos["id"]) {
                                                    echo "selected";
                                                }
                                                echo '>' . $nombreproduc . '</option>';
                                            }
                                            echo ' </optgroup> ';
                                            //fin producto

                                        }
                                    }
                                    //ver si el producto es fraccionado
                                    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idprop'");
                                    if ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                        $fracionado = $rowproductos["fracionado"];
                                        if ($fracionado == "0") {
                                            $fraci = 'step="' . $kilop . '" min="' . $kilop . '"';
                                        }
                                    }
                                    ?>
                                    <option value="hdusvx76tdg"></option>
                                    <option value="hdusvx76tdg">->Todos los Producto</option>

                                </select>

                            </div>
                        </div>


                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Kilos: </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?= $kilop ?>" <?= $fraci ?> onMouseOver="calculocosto48()" onChange="calculocosto48()" onKeyDown="calculocosto48()" onKeyPress="calculocosto48()" onKeyUp="calculocosto48()" onClick="this.select();" <?= $focusc ?> onfocus="this.select();">


                                <!--  step="<? //= $kilop 
                                            ?>" min="0" -->

                                <input type="hidden" id="idprop" name="idprop" value="<?= $idprop ?>">

                            </div>
                        </div>



                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Precio:</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="priciop" id="priciop" value="<?= $priciop ?>">
                                <input type="text" class="form-control" id="totalfb" name="totalfb">
                                <input type="hidden" id="totalf" name="totalf">
                            </div>
                        </div>

                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>

                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3">
                            </div>


                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-outline-secondary" style="width: 100%;" onMouseOver="calculocosto48()" onChange="calculocosto48()" onKeyDown="calculocosto48()" onKeyPress="calculocosto48()" onKeyUp="calculocosto48()" onClick="this.select();"><i class="dripicons-checkmark"></i></button>
                            </div>
                        </div>
                    </form>










                    <?php


                    $sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$idcli' and fin='1' ORDER BY `orden`.`fecha` DESC");
                    if ($rowordena = mysqli_fetch_array($sqlordena)) {
                        $totaldebe = $rowordena["total"];
                        $totaldebev = number_format($totaldebe, 2, '.', '');
                    } else {
                        $totaldebev = "0.00" + $saldoini;
                    }

                    ?>


            </div>







            <!--   <textarea class="form-control" name="nota" id="nota" rows="4" placeholder="Observación:"></textarea>   -->

            <br><br><br><br><br>
            <form action="inser_pag" method="post">
                <div class="form-group row col-md-12">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Pago:</label>
                    <div class="col-sm-4">
                        <select class="select2-single form-control" name="tipopag" id="tipopag">
                            <option value="1">Efectivo</option>
                            <option value="2">Transferencia</option>
                            <option value="3">Deposito</option>
                            <option value="4">Cheque</option>
                            <option value="5">Mercado Pago</option>
                        </select>

                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="pago_valor" id="pago_valor" value="0.00" onClick="this.select();">
                        <input type="hidden" class="form-control" name="modo" id="modo" value="1">
                        <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-outline-secondary" style="width: 100%;"><i class="dripicons-checkmark"></i></button>

                    </div>
                </div>
            </form>
            <br><br>
            <form action="inser_pag" method="post">
                <div class="form-group row col-md-12">
                    <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Descuento:</label>
                    <div class="col-lg-4">

                        <select class="select2-single form-control" name="nota" id="nota">
                            <option value="0">Porcentaje %</option>
                            <option value="1">Pesos $</option>

                        </select>




                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="pago_valor" id="pago_valor" value="0" onClick="this.select();">
                        <input type="hidden" class="form-control" name="modo" id="modo" value="2">
                        <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">

                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-outline-secondary" style="width: 100%;"><i class="dripicons-checkmark"></i></button>

                    </div>
                </div>
            </form>
        <?php } ?>

        <!-- Start col -->
        <div class="col-lg-4">





            <!--    <form action="inser_pag" method="post">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Agregar:</h5><br>
                        <div class="row">


                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="nota" id="nota" placeholder="Ingresa Observación"><br>

                            </div>


                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="pago_valor" id="pago_valor" value="0.00" onClick="this.select();">
                                <input type="hidden" class="form-control" name="modo" id="modo" value="3">
                                <input type="hidden" id="id_cliente" name="id_cliente" value="<? //= $idcli 
                                                                                                ?>">

                            </div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-light" style="width: 100%;">Agregar</button>

                            </div>
                        </div>

                    </div>
                </div>
            </form> -->

        </div>
        </div>
        <!-- End col -->





        <script>
            window.onload = calculocosto48;

            function calculocosto48() {


                var cantidad = document.formda48.cantidad.value;

                var resultado48 = <?= $priciop ?> * cantidad;

                document.formda48.totalf.value = resultado48.toFixed(2);
                document.formda48.totalfb.value = resultado48.toFixed(2);



            }
        </script>


        <script>
            var fechasDeshabilitadas = <?=$arreglofer?>;
            function enviar_valores(fecharepart) {
                var fecharepart = fecharepart;


                    if (fechasDeshabilitadas.includes(fecharepart)) {
                        fecharepart.value = ''; // Limpiar el valor para evitar que se seleccione
                        document.getElementById('fecharepart').value='';
                        alert('Esta configurado como día no laborable!');
                    }else{ location.href = '?fecharepart=' + fecharepart;  }
               ;

            }

            function enviar_valoresb(valor, valorb) {
                location.href = '?dianoms=' + valor;
            }

            function enviar_valoresc(valor, valorb) {
                location.href = '?idcliente=' + valor;
            }

            function enviar_producto(valor, valorb) {
                location.href = '?idproducto=' + valor;
            }
        </script>




        <!-- orden de compra -->
        <?php //me fijo si hay orden con esa fecha y id clinete lo programe para una sola orden
        $id_cliente = $_SESSION['idcliente'];
        $sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechar' and id_cliente = '$id_cliente'");
        if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
            $_SESSION['id_orden'] = $rowordenx['id'];
            $idordenitem = $rowordenx['id'];

        ?>


            <!-- Start col -->

            <div class="col-lg-6">


                <div class="table-responsive m-b-30">
                    <table class="table table-bordered" style="background-color: #fff; ">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 40px; text-align:center;">Kg.</th>
                                <th scope="col" style="text-align:center;">Productos</th>
                                <th scope="col" style="width: 110px; text-align:center;">Precio</th>
                                <th scope="col" style="width: 110px; text-align:center;">Subtotal</th>
                                <th scope="col" style="width: 40px;"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem' and modo='0' and fin='1' ORDER BY `item_orden`.`id` ASC");
                            while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                                $nota = $rowitem_orden["nota"];
                                $idite = $rowitem_orden["id"];
                                $idcodp = base64_encode($idite);
                                $subtotal += $rowitem_orden["total"];
                                $subtotalv = number_format($subtotal, 2, '.', '');
                                if (!empty($nota)) {
                                    $notav = "(" . $nota . ")";
                                } else {
                                    $notav = "";
                                }
                                $preciov = number_format($rowitem_orden["precio"], 2, '.', '');
                                $totalliqv = number_format($rowitem_orden["total"], 2, '.', '');


                                if (($idite % 2) == 0) {
                                    //Es un número par
                                    $par = 'background-color: #E7E7E7;';
                                } else {
                                    //Es un número impar
                                    $par = 'background-color: #F9F9F9;';
                                }
                                echo '<tr>
                                            <td style="text-align:center; ' . $par . '">' . $rowitem_orden["kilos"] . '</td>
                                            <td style="' . $par . '">' . $rowitem_orden["nombre"] . ' ' . $notav . '</td>
                                            <td style="text-align:right; ' . $par . '">' . number_format($preciov, 0, '', '.') . '</td>
                                            <td style="text-align:right; ' . $par . '">' . number_format($totalliqv, 0, '', '.') . '</td>
                                            <td style="text-align:center; ' . $par . '"><a href="javascript:eliminar(' . "'mlkdths?" . 'juhytm=' . $idcodp . '' . "'" . ')" > <i class="ri-delete-bin-3-line" style="color: red; ' . $par . '"></i></a></td>
                                        </tr>';
                            }

                            ?>



                        </tbody>
                    </table><br><br><br><br><br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="text-align:right;font-weight:bold;">Sub Total</td>
                                <td style="text-align:right;width: 110px;font-weight:bold;"><?= number_format($subtotalv, 0, '', '.') ?></td>
                                <td style="width: 40px;"></td>
                            </tr>


                            <?php
                            //subtotal menos o mas la deuda



                            $sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='3' ORDER BY `item_orden`.`id` ASC");
                            while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
                                $iditer = $rowpagdeu["id"];
                                $idcodp = base64_encode($iditer);
                                $deuda = $rowpagdeu["valor"];
                                $deudaTotal += $rowpagdeu["valor"];
                                $deudav = number_format($deuda, 0, '', '.');
                                echo '<tr>
                                                <td style="text-align:right;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                                <td style="text-align:right;width: 110px;">' . $deudav . '</td>
                                                <td style="width: 40px;"><a href="javascript:eliminar(' . "'mlkdthspa?" . 'juhytm=' . $idcodp . '' . "'" . ')" ><i class="ri-delete-bin-3-line" style="color: red;"></i></a></td>
                                                </tr>';
                            }

                            ?>

                            <?php

                            $sqlpagdeuf = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='2'");
                            if ($rowpagdeuf = mysqli_fetch_array($sqlpagdeuf)) {
                                $iditef = $rowpagdeuf["id"];
                                $idcodpf = base64_encode($iditef);
                                $deudaf = $rowpagdeuf["valor"];
                                $tipodescuen = $rowpagdeuf["nota"];
                                $modo = $rowpagdeuf["modo"];
                                $pordesc = $rowpagdeuf["pordesc"];
                                $deudavf = number_format($deudaf, 2, '.', '');

                                if ($modo == '2') {

                                    if ($tipodescuen == '0') {
                                        $descuenes = $pordesc . "%";
                                    } else {
                                        $descuenes = "";
                                    }

                                    $descuentoTotal = $rowpagdeuf["valor"];
                                } else {
                                    $descuenes = "";

                                    $descuentoTotal = $rowpagdeuf["valor"];
                                    $totalfver = $deudavf;
                                }

                                echo '<tr>
                                                <td style="text-align:right;">Descuento ' .  $descuenes . '</td>
                                                <td style="text-align:right;width: 110px;">' . number_format($deudavf, 0, '', '.') . '</td>
                                                <td style="width: 40px;"><a href="javascript:eliminar(' . "'mlkdthspa?" . 'juhytm=' . $idcodpf . '' . "'" . ')" ><i class="ri-delete-bin-3-line" style="color: red;"></i></a></td>
                                                </tr>';
                            }

                            ?>
                            <?php
                            $total = $subtotalv + $totaldebev + $deudaTotal;
                            if (!empty($descuentoTotal)) {
                                $total = $total - $descuentoTotal;
                            }

                            $totalf = number_format($total, 2, '.', '');
                            ?>
                            <tr>
                                <td style="text-align:right;">Saldo Anterior</td>
                                <td style="text-align:right;width: 110px;"><?= number_format($totaldebev, 0, '', '.') ?></td>
                                <td style="width: 40px;"></td>
                            </tr>
                            <tr>
                                <td style="text-align:right;font-weight:bold;">Total</td>
                                <td style="text-align:right;width: 110px;font-weight:bold;"><?= number_format($totalf, 0, '', '.') ?></td>
                                <td style="width: 40px;"></td>
                            </tr>
                            <?php

                            $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='1' ORDER BY `item_orden`.`id` ASC");
                            while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                $iditefp = $rowpagdeufp["id"];
                                $idcodpfp = base64_encode($iditefp);
                                $deudafp = $rowpagdeufp["valor"];
                                $pagoTotal += $rowpagdeufp["valor"];
                                $deudavfp = number_format($deudafp, 2, '.', '');
                                $tipopages = $rowpagdeufp['tipopag'];
                                if ($tipopages == '1') {
                                    $tipopagver = "efectivo";
                                }
                                if ($tipopages == '2') {
                                    $tipopagver = "transferencia";
                                }
                                if ($tipopages == '3') {
                                    $tipopagver = "deposito";
                                }
                                if ($tipopages == '4') {
                                    $tipopagver = "cheque";
                                }
                                if ($tipopages == '5') {
                                    $tipopagver = "mercado pago";
                                }




                                echo '<tr>
                                                    <td style="text-align:right;">Su pago en ' . $tipopagver . '</td>
                                                    <td style="text-align:right;width: 110px;">' . number_format($deudavfp, 0, '', '.') . '</td>
                                                    <td style="width: 40px;"><a href="javascript:eliminar(' . "'mlkdthspa?" . 'juhytm=' . $idcodpfp . '' . "'" . ')" ><i class="ri-delete-bin-3-line" style="color: red;"></i></a></td>
                                                    </tr>';
                            }
                            $debe = $totalf - $pagoTotal;
                            $debefp = number_format($debe, 2, '.', '');


                            $sqlordent = "Update orden Set total='$debefp', subtotal='$totalf' Where id = '$idordenitem'";
                            mysqli_query($rjdhfbpqj, $sqlordent) or die(mysqli_error($rjdhfbpqj));
                            ?>
                            <? if ($totalf != $debefp) { ?>
                                <tr>
                                    <td style="text-align:right;font-weight:bold;">Debe</td>
                                    <td style="text-align:right;width: 110px;font-weight:bold;"><?= number_format($debefp, 0, '', '.') ?></td>
                                    <td style="width: 40px;"></td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                    <br>
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align:right;">

                                <a href="print_orden" target="_blank"><button type="button" class="btn btn-outline-primary"><i class="dripicons-print"></i> Imprimir Remito</button>
                                </a>
                            </td>

                        </tr>
                    </table>
                </div>

            </div>
            <!-- End col -->


    </div><!-- fin row general -->

<?php } ?>


</div>



<script src="ajax_pedirdinero.js"></script>

<?php include('../template/pie.php'); ?>