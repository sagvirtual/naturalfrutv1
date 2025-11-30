<?php include('../f54du60ig65.php'); ?>
<style>
    a {
        color: black;
    }

    .saldo {
        display: block;
        font-size: 18pt;
        color: red;
        position: relative;
        right: 12px;
        float: right;
        top: 0px;
        z-index: 999;
        text-align: center;
        
    }

    .noseelc {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }


    @media print {
        #miDiv {
            display: none;
        }
    }
</style>
<div id="miDiv">
    <?
    include('../template/cabezalcelu.php');
    $idorcod = $_GET['jfndhom'];
    if (empty($idcliente)) {


        $idordenbbb = base64_decode($idorcod);

        $sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id=$idordenbbb");
        if ($rowordent = mysqli_fetch_array($sqlordent)) {
            $_SESSION['fecharepart'] =  $rowordent['fecha'];
            $_SESSION['idcliente'] =  $rowordent['id_cliente'];
        }
        $idcliente = $rowordent['id_cliente'];
    }


    $idproducto = $_GET['idproducto'];  //id para enlazar el producto para extrar precio
    if (!empty($idproducto)) {
        $sepid = explode("|", $idproducto);
        $idprop = $sepid[0];
        $priciop = $sepid[1];
        $kilop = $sepid[2];
        $pretotal = $priciop * $kilop;
        $pretotalv = number_format($pretotal, 0, '', '');
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
        $dianoms = strtotime($fechahoy);
        $dianom = date("N", $dianoms);
    }


    if ($dianom == "1") {
        $dianombre = "LUNES";
        $diasele1 = "selected";
        $diasql = "position1";
    }
    if ($dianom == "2") {
        $dianombre = "MARTES";
        $diasele2 = "selected";
        $diasql = "position2";
    }
    if ($dianom == "3") {
        $dianombre = "MIERCOLES";
        $diasele3 = "selected";
        $diasql = "position3";
    }
    if ($dianom == "4") {
        $dianombre = "JUEVES";
        $diasele4 = "selected";
        $diasql = "position4";
    }
    if ($dianom == "5") {
        $dianombre = "VIERNES";
        $diasele10 = "selected";
        $diasql = "position5";
    }
    if ($dianom == "6") {
        $dianombre = "SABADO";
        $diasele10 = "selected";
        $diasql = "position6";
    }
    if ($dianom == "7") {
        $dianombre = "DOMINGO";
        $diasele10 = "selected";
        $diasql = "position7";
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



    //verifico si estan todo entrgado

    $sqlitem_ordenver = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenbbb' and conf_entrega2='0' and modo='0'");
    if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordenver)) {
        $sigRemito = '0';
    } else {
        $sigRemito = '1';

        $sqlorden = "Update orden Set finalizada='1' Where id = '$idordenbbb'";
        mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));
    }


    //


    ?>

    <?php
    //me fijo si tiene un saldo inicial

    $sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$idcli'  ORDER BY `orden`.`fecha` DESC");
    if ($rowordena = mysqli_fetch_array($sqlordena)) {
        $totaldebe = $rowordena["total"];
        $totaldebev = number_format($totaldebe, 0, '', '');
        $totaldebevr = "Saldo anterior<br>$" . number_format($totaldebe, 0, '', '');
    } else {

        $sqlclientesan = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli' and sloff='0' and saldoini!='0'");
        if ($rowclientes = mysqli_fetch_array($sqlclientesan)) {
            $saldoini = $rowclientes["saldoini"];
            $totaldebevr = 'Saldo anterior<br>$' . number_format($saldoini, 2, ',', '.') . ' ';
        }
        $totaldebev = "0.00" + $saldoini;
    }
    $sqlitem_ordendist = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechar' and conf_carga ='0' and modo='0'");
    if ($rowitem_ordent = mysqli_fetch_array($sqlitem_ordendist)) {
        $sincarga = "78732";
    } else {
        $sincarga = "34254";
    }

    ?>



    <!-- Start row -->


    <!-- orden de compra -->
    <?php //me fijo si hay orden con esa fecha y id clinete lo programe para una sola orden
    $id_cliente = $_SESSION['idcliente'];
    $sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechar' and id_cliente = '$id_cliente'");
    if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
        $_SESSION['id_orden'] = $rowordenx['id'];
        $pedir = $rowordenx['pedir'];
        if ($pedir == '1') {
            $verpedir = ' <div class="alert alert-danger" role="alert">
       Pedir <a href="#" class="alert-link">Pago</a>.
      </div>';
        } else {
            $verpedir = "";
        }
        $idordenitem = $rowordenx['id'];
        $idordencod = base64_encode($idordenitem);
        $fecha = $rowordenx['fecha'];
        $fechav = explode("-", $fecha);
        $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];

    ?>
        <div class="row">
            <style>
                .fontco {
                    color: black;
                }
            </style>

            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-header"><a href="hoja_de_ruta?>">
                            <h1 class="card-title"><strong> hoja de ruta </strong></h1>
                            <h1>Remito: #<?= $_SESSION['id_orden'] ?> </h1>
                        </a>
                        <div class="saldo"><span class="badge badge-danger"><?= $totaldebevr ?></span></div>


                        <h1 class="card-title">Fecha entrega: <?= $fechavr ?></h1>

                        <br>

                        <p class="card-subtitle"><b>
                                <?php




                                $sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
                                if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

                                    $direOrig = $rowclientesi["address"];
                                    $wsp = $rowclientesi["wsp"];
                                    $expldir = explode("Y", $direOrig);
                                    $expldircaba = explode(",", $direOrig);
                                    $direxf = str_replace(' ', '', $expldircaba[1]);
                                    $dirext = str_replace(' ', '+', $expldir[0]);
                                    $direx = strtolower($dirext) . $direxf;




                                    echo '<a href="https://www.google.com.ar/maps/place/' . $direx . '">' . $rowclientesi["address"] . ' </a> 
                                
                                
                                
                                
                                (' . $rowclientesi["nom_empr"] . ')';
                                }


                                ?></b>



                        <p>




                            <?= $verpedir ?>
                    </div>

                    <? include('ofrecer.php'); ?>
                    <div class="card-body" style="position: relative; top:-30px;">
                        <div class="table-responsive m-b-20">
                            <table class="table table-bordered">


                                <tbody>


                                    <?php
                                    //aca pruebo el otro
                                    $comilla = "'";
                                    $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
                                    while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                                        $id_categoria = $rowcategorias["id"];
                                        $nombrecate = strtoupper($rowcategorias["nombre"]);
                                        $sqlproductosr = ${"sqlproductos" . $id_categoria};
                                        $rowproductos = ${"rowproductos" . $id_categoria};
                                        $rowproductosr = ${"rowproductosr" . $id_categoria};
                                        $idproduff = ${"idproduff" . $id_categoria};
                                        $sqlitem_orden = ${"sqlitem_orden" . $id_categoria};
                                        $sqlitem_ordendis = ${"sqlitem_ordendis" . $id_categoria};
                                        $confirmado = ${"confirmado" . $id_categoria};
                                        $confirmado2 = ${"confirmado2" . $id_categoria};


                                        //fin


                                        //me fijo si hay item comprados <tr
                                        $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ");
                                        if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


                                            //join si el producto esta para el cliente
                                            $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor, u.id_orden
                                        FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.id_orden = '$idordenitem'");

                                            if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) {


                                                echo '<table class="table table-bordered" style="background-color: black; position:relative; text-align:left;">


                                            <tr><td  style="background-color: #CBCBCB;"><h5 style="position:relative; top:4px;"><b>' . $nombrecate . ' </b></h5></td></tr>
                                            
                                            </table>
                                            
                                            <table class="table table-bordered table-hover" style="background-color: #fff; position:relative; top:-10px; text-align:left; height:5px;">
                                            <tr>
                                                
                                            <th scope="col" style="border-color: black;width: 40px; text-align:center;">Kg.</th>
                                            <th scope="col" style="border-color: black;text-align:center;">Productos</th>
                                            <th scope="col" style="border-color: black;width: 110px; text-align:center;">P/Unit.</th>
                                            <th scope="col" style="border-color: black;width: 110px; text-align:center;">Total</th>
                                            </tr>
                                            ';
                                            }



                                            //pongo los item <tr>     

                                            $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

                                            while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
                                                $idproduff = $rowproductosrg['id'];
                                                //pruebo poner el producto



                                                $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem' and id_producto='$idproduff' and modo='0'");

                                                if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                                                    $fechaold = $rowitem_orden["fechaold"];
                                                    $fechaexpl = explode("-", $fechaold);
                                                    if ($fechaold != '0000-00-00') {
                                                        $nota = "Pedido el " . $fechaexpl[2] . "/" . $fechaexpl[1] . "/" . $fechaexpl[0] . " " . $rowitem_orden["nota"];
                                                    } else {
                                                        $nota = $rowitem_orden["nota"];
                                                    }

                                                    $idite = $rowitem_orden["id"];
                                                    $id_producto = $rowitem_orden["id_producto"];
                                                    $id_productocod = base64_encode($id_producto);
                                                    $idcodp = base64_encode($idite);
                                                    $subtotal += $rowitem_orden["total"];
                                                    $subtotalv = number_format($subtotal, 2, '.', '');
                                                    $confirmado  = $rowitem_orden["conf_entrega"];
                                                    $confirmado2  = $rowitem_orden["conf_entrega2"];
                                                    $colorcon  = ${"colorcon" . $rowitem_orden["id"]};
                                                    $kilos = $rowitem_orden["kilos"];
                                                    if (!empty($nota)) {
                                                        $notav = "(" . $nota . ")";
                                                    } else {
                                                        $notav = "";
                                                    }
                                                    $preciov = number_format($rowitem_orden["precio"], 0, '', '.');
                                                    $totalliqv = number_format($rowitem_orden["total"], 0, '', '.');

                                                    if ($confirmado == '1' && $confirmado2 == '1') {
                                                        $colorcon = 'background-color:#60FF76;'; //verde
                                                    } elseif ($confirmado == '0' && $confirmado2 == '0') {
                                                        $colorcon = 'background-color:#FF7E7E;'; //rojo
                                                    } elseif ($confirmado == '1' && $confirmado2 == '0') {
                                                        $colorcon = 'background: rgb(96,255,118);
                                                    background: linear-gradient(90deg, rgba(96,255,118,1) 0%,
                                                    rgba(96,255,118,1) 43%, 
                                                    rgba(255,126,126,1) 60%, 
                                                    rgba(255,126,126,1) 100%);'; //rojo
                                                    }

                                                    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                                    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                        $kilocajon = $rowprecioprod["kilo"];
                                                    }


                                                    echo '<tr>
                                                <td style="text-align:center;border-color: black;"><b>' . $rowitem_orden["kilos"] . '</b> <div id="muestrocarga' . $id_producto . '"></div></td>
                                                <td  style="border-color: black;background-color:"> <a ';
                                                if ($sincarga != '78732') {
                                                echo'
                                                href="confirmacion_entrega?jfndhom=' . $idordencod . '&jjdfngh=' . $id_productocod . '" name="pro' . $id_producto . '"';
                                                }
                                                
                                                echo'><b  class="noseelc">
                                                ' . $rowitem_orden["nombre"] . '</b> ' . $notav . '
                                                <p style="font-size:8pt; position:relative; top:0px;"  class="noseelc">(Caja x ' . $kilocajon . 'kg.)
                                                                                 </p></a>
                                                
                                                </td>
                                                <td style="text-align:right;border-color: black;">' . $preciov . '
                                                
                                                
                                                <input type="hidden" name="idorden' . $id_producto . '" id="idorden' . $id_producto . '" value="' . $idordencod . '">
                                                <input type="hidden" name="id_producto' . $id_producto . '" id="id_producto' . $id_producto . '" value="' . $id_productocod . '">
                                                <input type="hidden" name="kilos' . $id_producto . '" id="kilos' . $id_producto . '" value="' . $kilos . '">
                                                
                                                
                                                </td>
                                                <td style="text-align:right;border-color: black;' . $colorcon . '"
                                                
                                                ondblclick="playAudio(); ajax_carga' . $id_producto . '($(' . $comilla . '#id_producto' . $id_producto . '' . $comilla . ').val(), $(' . $comilla . '#idorden' . $id_producto . '' . $comilla . ').val(), $(' . $comilla . '#kilos' . $id_producto . '' . $comilla . ').val());">

                                                <b>' . $totalliqv . '</b>';

                                                    if ($sincarga != '78732') {
                                                        echo '
                                                <script>
                                                function ajax_carga' . $id_producto . '(id_producto, idorden, kilos){
                                                    var parametros = {
                                                    "id_producto":id_producto,
                                                    "idorden":idorden,
                                                    "kilos":kilos
                                                    };
                                                    $.ajax({
                                                             data: parametros,
                                                             url: ' . $comilla . 'update_intemorden.php' . $comilla . ',
                                                             type: ' . $comilla . 'POST' . $comilla . ',
                                                             beforeSend: function(){
                                                                      $("#muestrocarga' . $id_producto . '").html(' . $comilla . '' . $comilla . ');
                                                             },
                                                             success: function(response){
                                                                      $("#muestrocarga' . $id_producto . '").html(response);
                                                             }
                                                          });
                                                    }
                                                
                                                    </script>';
                                                    }


                                                    echo ' </td>
                                                
                                            </tr>';
                                                }




                                                //fin poner el producto
                                            }
                                            echo '</table>';

                                            //fin item </tr>



                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Sub Total</td>
                                        <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($subtotalv, 0, '', '.') ?></td>

                                    </tr>


                                    <?php
                                    //subtotal menos o mas la deuda


                                    $sqlpagdeu = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='3' ORDER BY `item_orden`.`id` ASC");
                                    while ($rowpagdeu = mysqli_fetch_array($sqlpagdeu)) {
                                        $iditer = $rowpagdeu["id"];
                                        $idcodp = base64_encode($iditer);
                                        $deuda = $rowpagdeu["valor"];
                                        $deudaTotal += $rowpagdeu["valor"];
                                        $deudav = number_format($deuda, 0, '', '');
                                        echo '<tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">' . number_format($deudav, 0, '', '.') . '</td>
                                        
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
                                            $totalfver = $deudavf;
                                            $descuentoTotal = $rowpagdeuf["valor"];
                                        } else {
                                            $descuenes = "";

                                            $descuentoTotal = $rowpagdeuf["valor"];
                                            $totalfver = $deudavf;
                                        }




                                        echo '<tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;">Descuento ' . $descuenes . '</td>
                                        <td style="border-color: black;text-align:right;width: 110px;">-' . number_format($totalfver, 0, '', '.') . '</td>
                                        
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
                                        <td style="border-right: 1px solid #000000; text-align:right;">Saldo Anterior</td>
                                        <td style="border-color: black;text-align:right;width: 110px;"><?= number_format($totaldebev, 0, '', '.') ?></td>

                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Total</td>
                                        <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($totalf, 0, '', '.') ?></td>

                                    </tr>
                                    <?php
                                    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_cliente' and id_orden='$idordenitem' and modo='1' ORDER BY `item_orden`.`id` ASC");

                                    while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
                                        $iditefp = $rowpagdeufp["id"];
                                        $idcodpfp = base64_encode($iditefp);
                                        $deudafp = $rowpagdeufp["valor"];
                                        $pagoTotal += $rowpagdeufp["valor"];
                                        $deudavfp = number_format($deudafp, 0, '', '');
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
                                            <td style="border-right: 1px solid #000000;text-align:right;">Su pago en ' . $tipopagver . '</td>
                                            <td style="border-color: black;text-align:right;width: 110px;">' . number_format($deudavfp, 0, '', '.') . '</td>
                                            
                                            </tr>';
                                    }
                                    $debe = $totalf - $pagoTotal;
                                    $debefp = number_format($debe, 2, '.', '');


                                    ?>
                                    <? if ($totalf != $debefp) { ?>
                                        <tr>
                                            <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Debe</td>
                                            <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><?= number_format($debefp, 0, '', '.') ?></td>

                                        </tr>
                                    <? } ?>

                                    <!-- 
                                            <tr>
                                                <td style="border-right: 1px solid #000000;text-align:right;font-weight:bold;">Debe</td>
                                                <td style="border-color: black;text-align:right;width: 110px;font-weight:bold;"><? //=  number_format($debefp, 0, '', '') 
                                                                                                                                ?></td>

                                            </tr>
                                    -->


                                </tbody>


                            </table> <? if ($sigRemito == '1') { ?><br>


                                <?php

                                            $debe = $totalf - $pagoTotal;
                                            $debefp = number_format($debe, 2, '.', '');


                                            $sqlordentf = "Update orden Set total='$debefp', subtotal='$totalf' Where id = '$idordenitem'";
                                            mysqli_query($rjdhfbpqj, $sqlordentf) or die(mysqli_error($rjdhfbpqj));

                                ?>
                                <a href="agregar_pago.php?jfndhom=<?= $idordencod ?>">
                                    <button type="button" class="btn btn-outline-primary btn-block" style="font-size: 20pt;">AGREGAR PAGO</button></a><br>


                                <a href="printcaja.php?jfndhom=<?= $idordencod ?>"> <button type="button" class="btn btn-outline-secondary btn-block" style="font-size: 20pt;" target="_blank">Imprimir Ticket</button></a><br> 
                                
                                <? if(!empty($wsp)){?>
                                <a href="wspticket.php?jfndhom=<?= $idordencod ?>"> <button type="button" class="btn btn-outline-secondary btn-block" style="font-size: 20pt;" target="_blank">Whatsapp Ticket</button></a><br>
                                <? }?>

                                <a href="/module/">
                                    <button type="button" class="btn btn-dark btn-block">
                                        <t style="font-size: 16pt; position:relative; top:-4px;">CONTINUAR </t><i class="dripicons-arrow-right" style="font-size: 20pt; position:relative; top:2px;"></i>
                                    </button></a>
                            <? } else { if ($sincarga != '78732') { ?><br><br>
                                <!-- local cerrado -->

                                
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">

                <div style="padding-bottom: 10px; padding-top:10px;">
                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <button type="button" class="btn btn-danger btn-lg btn-block" id='ocultar-mostrar'><b>Local Cerrado/No compra</b></button>
                    </a>
                </div>
                <div class="collapse" id="collapseExample">




                    <fieldset class="form-group">
                        <div class="row">
                                <div class="row">


                                    <div class="col-sm-12">
                                        <div class="form-check" style="font-weight: bold; color:black; font-size:15pt; padding-left:50px;">
                                            <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="1">
                                            <label class="form-check-label" for="gridRadios1">
                                                Local Cerrado
                                            </label>
                                        </div>
                                        <div class="col-auto" style="padding-left:50px;">
                                        <? 
                                        $sumaundia =date("Y-m-d",strtotime($fechahoy."+ 1 days"));
                                        
                                        ?>



                                        <label>Pasar el:&nbsp; </label><input type="date" min="<?=$sumaundia?>" name="noenterga" id="noenterga">
                                        </div><br>
                                        <div class="form-check" style="font-weight: bold; color:black; font-size:15pt;padding-left:50px;">
                                            <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="2">
                                            <input type="hidden" name="idordenr" id="idordenr" value="<?= $idordencod ?>">
                                            <label class="form-check-label" for="gridRadios2">
                                                No compro
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nota" placeholder="Observación">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <div id="muestrocargar"></div>
                                        <button type="submit"  class="btn btn-outline-danger btn-block" style="font-size: 10pt;" onclick="ajax_remitodev($('#idordenr').val(), $('input:radio[name=gridRadios1]:checked').val(), $('#nota').val(), $('#noenterga').val());">Enviar</button>
                                    </div>
                                </div>

                        </div>
                    </div>





                    <!-- End col -->
                </div>

                <script src="ajax_remitodev.js"></script>
               
            <? } }?>
            </div>
        </div>
</div>
</div>


<!-- End col -->
<!-- Start col -->


</div>

<?php } ?>



<?php include('../template/piecelu.php');
?>

</div>