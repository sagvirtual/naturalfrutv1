<?php include('../f54du60ig65.php');
include('../template/cabezal.php');

if (empty($idcliente)) {

    $idorcod = $_GET['jfndhom'];
    $idordenbbb = base64_decode($idorcod);

    $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id=$idordenbbb");
    if ($rowordent = mysqli_fetch_array($sqlordent)) {
        $_SESSION['fecharepart'] =  $rowordent['fecha'];
        $_SESSION['idcliente'] =  $rowordent['id_cliente'];
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
    $diasele10 = "selected";
}
if ($dianom == "6") {
    $dianombre = "SABADO";
    $diasele10 = "selected";
}
if ($dianom == "7") {
    $dianombre = "DOMINGO";
    $diasele10 = "selected";
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
    $listaid = $rowclientesb["id_rubro"];
    $buscqueda = " and  id_rubro$listaid = '1'";
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

<link rel="manifest" href="js13kpwa.webmanifest">
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
                <a href="/orden"> <button class="btn btn-primary"><i class="fa fa-file-text"></i> Listar Remitos</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

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

                                $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem' ORDER BY `item_orden`.`id` ASC");
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
                                        $par ='background-color: #E7E7E7;';
                                    } else {
                                        //Es un número impar
                                        $par= 'background-color: #F9F9F9;';
                                    }
                                    echo '<tr>
                                            <td style="text-align:center; '.$par.'">' . $rowitem_orden["kilos"] . '</td>
                                            <td style="'.$par.'">' . $rowitem_orden["nombre"] . ' ' . $notav . '</td>
                                            <td style="text-align:right; '.$par.'">' . $preciov . '</td>
                                            <td style="text-align:right; '.$par.'">' . $totalliqv . '</td>
                                            <td style="text-align:center; '.$par.'"><a href="javascript:eliminar(' . "'mlkdths?" . 'juhytm=' . $idcodp . '' . "'" . ')" > <i class="ri-delete-bin-3-line" style="color: red; '.$par.'"></i></a></td>
                                        </tr>';
                                }

                                ?>



                            </tbody>
                        </table><br><br><br><br><br>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="text-align:right;font-weight:bold;">Sub Total</td>
                                    <td style="text-align:right;width: 110px;font-weight:bold;"><?= $subtotalv ?></td>
                                    <td style="width: 40px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">Saldo Anterior</td>
                                    <td style="text-align:right;width: 110px;"><?= $totaldebev ?></td>
                                    <td style="width: 40px;"></td>
                                </tr>

                                <?php
                                //subtotal menos o mas la deuda



                                $sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='3'");
                                while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
                                    $iditer = $rowpagdeu["id"];
                                    $idcodp = base64_encode($iditer);
                                    $deuda = $rowpagdeu["valor"];
                                    $deudaTotal += $rowpagdeu["valor"];
                                    $deudav = number_format($deuda, 2, '.', '');
                                    echo '<tr>
                                                <td style="text-align:right;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                                <td style="text-align:right;width: 110px;">' . $deudav . '</td>
                                                <td style="width: 40px;"><a href="javascript:eliminar(' . "'mlkdthspa?" . 'juhytm=' . $idcodp . '' . "'" . ')" ><i class="ri-delete-bin-3-line" style="color: red;"></i></a></td>
                                                </tr>';
                                }

                                ?>

                                <?php

                                $sqlpagdeuf = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='2'");
                                while ($rowpagdeuf = mysqli_fetch_array($sqlpagdeuf)) {
                                    $iditef = $rowpagdeuf["id"];
                                    $idcodpf = base64_encode($iditef);
                                    $deudaf = $rowpagdeuf["valor"];
                                    $descuentoTotal += $rowpagdeuf["valor"];
                                    $deudavf = number_format($deudaf, 2, '.', '');
                                    echo '<tr>
                                                <td style="text-align:right;">Descuento (' . $rowpagdeuf["nota"] . ')</td>
                                                <td style="text-align:right;width: 110px;">-' . $deudavf . '</td>
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
                                    <td style="text-align:right;font-weight:bold;">Total</td>
                                    <td style="text-align:right;width: 110px;font-weight:bold;"><?= $totalf ?></td>
                                    <td style="width: 40px;"></td>
                                </tr>
                                <?php

                                $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM pagdeu Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='1'");
                                while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                    $iditefp = $rowpagdeufp["id"];
                                    $idcodpfp = base64_encode($iditefp);
                                    $deudafp = $rowpagdeufp["valor"];
                                    $pagoTotal += $rowpagdeufp["valor"];
                                    $deudavfp = number_format($deudafp, 2, '.', '');
                                    echo '<tr>
                                                    <td style="text-align:right;">Su pago</td>
                                                    <td style="text-align:right;width: 110px;">' . $deudavfp . '</td>
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
                                        <td style="text-align:right;width: 110px;font-weight:bold;"><?= $debefp ?></td>
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



<?php } ?>
       
            <div class="col-lg-6 card m-b-30" style="background-color: #cfd0d1; border:none;">
                
                    <div class="form-row">

                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Periodo:</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="fecharepart" id="fecharepart" value="<?= $fechar ?>" min="<?=$fechahoy?>" onchange="enviar_valores(this.value);">
                            </div>
                        </div>

                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Día:</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="dianoms" name="dianoms" onchange="enviar_valoresb(this.value);">
                                    <option value="10" <?= $diasele10 ?>>Todos</option>
                                    <option value="1" <?= $diasele1 ?>>Lunes</option>
                                    <option value="2" <?= $diasele2 ?>>Martes</option>
                                    <option value="3" <?= $diasele3 ?>>Miercoles</option>
                                    <option value="4" <?= $diasele4 ?>>Jueves</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Cliente:</label>

                            <?   if($idcli==""){$focusa="autofocus";}else{$focusb="autofocus";
                            if($_GET['idproducto']!=""){$focusb=""; $focusc="autofocus";}
                        }?>

                            <div class="col-sm-8">
                                <select class="select2-multi-select form-control"  id="nombre" name="nombre" onchange="enviar_valoresc(this.value);" <?=$focusa?> >
                                    <option value="0">Listado de Clientes...</option>
                                    <?php
                                    $idcli = $_SESSION['idcliente'];

                                  
                                     // si es viernes sabado o domingo busca todos los clientes
                                        if(!empty($_GET['dianoms']))
                                        if ($dianom != "10" && $dianom != "5" && $dianom != "6" && $dianom != "7") {
                                            $forsq = "and dia_repart='$dianom'";
                                        } else {
                                            $forsq = "";
                                        }

                                    

                                    $sqlclientes1 = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado = '0' and id='$idcli' ORDER BY `clientes`.`address` ASC");
                                    if ($rowclientes1 = mysqli_fetch_array($sqlclientes1)) {
                                        echo ' <option value="' . $rowclientes1["id"] . '" ';
                                        if ($_SESSION['idcliente'] == $rowclientes1["id"]) {
                                            echo "selected";
                                        }
                                        echo '>' . $rowclientes1["address"] . ', ' . $rowclientes1["nom_empr"] . '</option>';
                                    }


                                    $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where estado = '0' $forsq   NOT IN (id='$idcli')
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
                            if($_GET['idproducto']!=""){$inserin='action="inser_item"';}else{{$inserin="";}}
                            ?>
                        <form <?=$inserin?> name="formda48" id="formda48" method="post" style="width: 100%;">
                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label  text-right">Producto <?= $nombrerub ?>:</label>
                            <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">
                            <input type="hidden" id="fecha" name="fecha" value="<?= $fechar ?>">
                            <div class="col-sm-8">
                            <select class="select2-single form-control" name="producto" id="producto" onchange="enviar_producto(this.value);" <?=$focusb?>>
                                            <option>Select</option>
                                            <?php

                                            $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
                                            while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                                $id_categoria = $rowcategorias["id"];
                                                $nombrecate = strtoupper($rowcategorias["nombre"]);

                                                //me fijo si hay productos en esa categoria
                                                $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda");
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
                                                    //busco el produco por la categoria
                                                    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda ORDER BY `productos`.`nombre` ASC");
                                                    while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                                                        $id_producto = $rowproductos['id'];

                                                        //aca saco los valores  la fecha que toma d eprecio es menor o igual a la fecha de la orden
                                                        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT kilo, costoxcaja, precio_kiloa, precio_cajaa, precio_kilob, precio_cajab, precio_kiloc, precio_cajac FROM precioprod Where id_producto = '$id_producto' and  fecha <= '$fechar' ORDER BY `precioprod`.`fecha` DESC");
                                                        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                            $kilo = $rowprecioprod["kilo"];
                                                            $list = $_SESSION['tipo_cliente'];
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
                                                        echo '<option value="' . $rowproductos["id"] . '|' . $precio_kilo . '|' . $kilo . '" ';
                                                        if ($idprop == $rowproductos["id"]) {
                                                            echo "selected";
                                                        }
                                                        echo '>' . $nombreproduc . '</option>';
                                                    }
                                                    echo ' </optgroup>';
                                                    //fin producto

                                                }
                                            }
                                            
                                            ?>
                                        </select>

                            </div>
                        </div>
                                       

                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Kilos:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?= $kilop ?>" onMouseOver="calculocosto48()" onChange="calculocosto48()" onKeyDown="calculocosto48()" onKeyPress="calculocosto48()" onKeyUp="calculocosto48()" onClick="this.select();" step="<?= $kilop ?>" min="0" <?=$focusc?> onfocus="this.select();">
                                <input type="hidden" id="idprop" name="idprop" value="<?= $idprop ?>">

                            </div>
                        </div>
                      
                               
                        
                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Precio:</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="priciop" id="priciop" value="<?= $priciop ?>">
                                <input type="text" class="form-control" id="totalfb" name="totalfb" disabled>
                                <input type="hidden" id="totalf" name="totalf">
                            </div>
                        </div>

                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>
                            <div class="col-sm-8">
                            <button type="submit" class="btn btn-dark" style="width: 100%;" onMouseOver="calculocosto48()" onChange="calculocosto48()" onKeyDown="calculocosto48()" onKeyPress="calculocosto48()" onKeyUp="calculocosto48()" onClick="this.select();">Agregar</button>
                            </div>
                        </div>
                            </form>
                       

             
               

                   
                   



                    <?php


                    $sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$idcli'  ORDER BY `orden`.`fecha` DESC");
                    if ($rowordena = mysqli_fetch_array($sqlordena)) {
                        $totaldebe = $rowordena["total"];
                        $totaldebev = number_format($totaldebe, 2, '.', '');
                    } else {
                        $totaldebev = "0.00";
                    }

                    ?>

               
            </div>
               
       





        <!--   <textarea class="form-control" name="nota" id="nota" rows="4" placeholder="Observación:"></textarea> -->

        <br><br><br><br><br>
        <form action="inser_pag" method="post">
        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Pago:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" name="pago_valor" id="pago_valor" value="0.00" onClick="this.select();">
                                <input type="hidden" class="form-control" name="modo" id="modo" value="1">
                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">

                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-secondary" style="width: 100%;">Agregar</button>

                            </div>
                        </div>
                        </form>
                        <br><br>
                        <form action="inser_pag" method="post">
                        <div class="form-group row col-md-12">
                            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Descuento:</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="nota" id="nota" placeholder="Ingresa Motivo"><br>

                            </div>
                            <div class="col-sm-2">
                            <input type="text" class="form-control" name="pago_valor" id="pago_valor" value="0.00" onClick="this.select();">
                                <input type="hidden" class="form-control" name="modo" id="modo" value="2">
                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $idcli ?>">

                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-secondary" style="width: 100%;">Agre.</button>

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
                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?//= $idcli ?>">

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
        function enviar_valores(valor, valorb) {
            location.href = '?fecharepart=' + valor;
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




   


</div>


</div><!-- fin row general -->
  


<?php include('../template/pie.php'); ?>


