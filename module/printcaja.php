<?php include('../f54du60ig65.php');

$idorcod = $_GET['jfndhom'];
$modoprint = $_GET['modoprint'];
if($modoprint!="1"){$archipri="remito";}else{$archipri="buscremito";}

$idordenbbb = base64_decode($idorcod);

$sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id=$idordenbbb");
if ($rowordent = mysqli_fetch_array($sqlordent)) {
    $fechar =  $rowordent['fecha'];
    $id_cliente =  $rowordent['id_cliente'];
}


$id_cliente = $_SESSION['idcliente'];
$sqlordenax = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha = '$fechar' and id_cliente = '$id_cliente'");
if ($rowordenx = mysqli_fetch_array($sqlordenax)) {
    $idordenitem = $rowordenx['id'];
    $camioneta = $rowordenx['camioneta'];
    $idordencod = base64_encode($idordenitem);
    $fecha = $rowordenx['fecha'];
    $fechav = explode("-", $fecha);
    $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];
}

//me fijo si tiene un saldo inicial

$sqlordena = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where `fecha` < '$fechar' and id_cliente = '$id_cliente'  ORDER BY `orden`.`fecha` DESC");
if ($rowordena = mysqli_fetch_array($sqlordena)) {
    $totaldebe = $rowordena["total"];
    $totaldebev = number_format($totaldebe, 0, '', '');
    $totaldebevr = "Saldo anterior<br>$" . number_format($totaldebe, 0, '', '');
} else {

    $sqlclientesan = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_cliente' and sloff='0' and saldoini!='0'");
    if ($rowclientes = mysqli_fetch_array($sqlclientesan)) {
        $saldoini = $rowclientes["saldoini"];
        $totaldebevr = 'Saldo anterior<br>$' . number_format($saldoini, 2, ',', '.') . ' ';
    }
    $totaldebev = "0.00" + $saldoini;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Ticket</title>
</head>

<body>

    <style>
        @media print {
            #miDiv {
                display: none;
            }
        }

        .subrayado {
            text-decoration: underline;
        }

      table.tabla_sin {

border-collapse:collapse;

border: none;

}

td.celda_sin {

 padding: 0;
 

}
tr.tr_linea {

 padding: 0;
 border-bottom: 0.1mm solid black;

}

tr.tr_lineatop {

 padding: 0;
 border-bottom: 0.1mm solid black;
 border-left: 0.1mm solid black;
 border-top: 0.1mm solid black;
 

}

tr.tr_lineader {

border-left: 0.1mm solid black;

}


td.td_lineader {

border-right: 0.1mm solid black;

}

        body {
font-family: arial;
            font-size: 8pt;
        }
        .button1 {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50; /* Green */

    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px; 
    cursor: pointer;
}
    </style>
    <div id="miDiv" style="text-align: center;">
        <h1>Imprimiendo...</h1>
        <p>espere a que salga el Ticket</p>
        <br>
        <br>
        <a href="<?=$archipri?>?jfndhom=<?= $idordencod?>"><button class="button button1">LISTO</button></a>
       <!--  <a onclick="javascript:window.print()" style="font-size: 40pt;">Imprimir</a> -->
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
    </div> *******************************************
    <div style="text-align: center; font-size:7pt;">X<br>DOCUMENTO&nbsp;NO&nbsp;VALIDO&nbsp;COMO&nbsp;FACTURA
    <img src="/assets/images/logop.png" style="width:45mm;"></div>
    <!--   -->
    *******************************************




    <table class="tabla_sin" style="width: 100%;">
        <tr>
            <td style="font-size:8pt;">
                Remito&nbsp;Nº<?=$idordenbbb?>
                    <br><?=$fechavr?>
                    <?php
                 
                 echo ''.$hora_actual = date("H:i").'';
                  
                 ?>
                    
              
            </td>
            <td style="float:right;text-align:right;font-size:8pt;">
            <?=$NombreComioneta?> <br>
                Cliente <?=$id_cliente?> 
               
             
            
            </td>

        </tr>      
        
         <tr class="tr_linea">
            <td class="celda_sin" colspan="2" style="vertical-align:top; text-align: left;">

            <br>
<table>
    <tr>
        <td style="vertical-align:top; font-size:8pt; font-weight: bold; width:40px; text-align: left;">Cliente:</td>
        <td style="vertical-align:top; font-size:8pt; font-weight: bold; text-align:left;">            <?php




$sqlclientesi = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_cliente'");
if ($rowclientesi = mysqli_fetch_array($sqlclientesi)) {

    echo '' . $rowclientesi["address"] . '';
}


?></td>
    </tr>
</table><br>
              
            </td>

        </tr>


         

       


    </table>

 <?php
                                //aca pruebo el otro
                                
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


                                        //join nombre de la categoria me dijo que lo quite
                                        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor, u.id_orden
                                        FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.id_orden = '$idordenitem'");

                                        if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) {


                                            /* echo ' <br><table  class="tabla_sin" style="width: 100%;">


                                            <tr class="tr_linea"><td style="text-align:center;font-size:10pt; font-weight: bold;">' . $nombrecate . '</td></tr>
                                            
                                            </table>'; */
                                            
                                            echo '<table  class="tabla_sin" style="width: 100%;">
                                        
                                            ';
                                        }



                                        //pongo los item <tr>     

                                        $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

                                        while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
                                            $idproduff = $rowproductosrg['id'];
                                            $nombreprod= $rowproductosrg['nombreb'];
                                            //pruebo poner el producto



                                            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordenitem' and id_producto='$idproduff' and modo='0'");
                                            
                                            if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                                                $nota = $rowitem_orden["nota"];
                                                $idite = $rowitem_orden["id"];
                                                $id_producto = $rowitem_orden["id_producto"];
                                                $id_productocod = base64_encode($id_producto);
                                                $idcodp = base64_encode($idite);
                                                $subtotal += $rowitem_orden["total"];
                                                $subtotalv = number_format($subtotal, 2, '.', '');
                                                $confirmado  = $rowitem_orden["conf_entrega"];
                                                $confirmado2  = $rowitem_orden["conf_entrega2"];
                                        
                                                $kilos = $rowitem_orden["kilos"];
                                                
                                                $preciov = number_format($rowitem_orden["precio"], 0, '', '.');
                                                $totalliqv = number_format($rowitem_orden["total"], 0, '', '.');


                                                $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                    $kilocajon = $rowprecioprod["kilo"];
                                                }


                                                echo '<tr class="tr_linea">
                                                <td  class="celda_sin" style="padding-top: 2px; padding-bottom: 2px;">' . $nombreprod . '<br>'.$rowitem_orden["kilos"].'kg.&nbsp;x&nbsp;$'.$rowitem_orden["precio"].'&nbsp;&nbsp;</td>
                                                <td  class="celda_sin" style="text-align:right;  vertical-align: middle;"> $'.$totalliqv.' </td>
                                                
                                                
                                            </tr>';
                                            }

                                          


                                            //fin poner el producto
                                        }
                                        echo '</table>';

                                        //fin item </tr>



                                    }
                                }

                                ?>
    
    
    
    
    <br>


        <table class="tabla_sin" style="width: 100%;">


     

        
     
    

                            
        <tr class="tr_lineatop">
                                    <td class="celda_sin td_lineader tr_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle;padding: 1mm;">SUB TOTAL</td>
                                    <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">$<?= number_format($subtotalv, 0, '', '.') ?></td>

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
                                    echo '<tr class="tr_linea tr_lineader">
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle;padding: 1mm;">Deuda (' . $rowpagdeu["nota"] . ')</td>
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">$' . number_format($deudav, 0, '', '.') . '</td>
                                        
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




                                    echo '<tr class="tr_linea tr_lineader">
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle;padding: 1mm;">Descuento ' . $descuenes . '</td>
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">-' . number_format($totalfver, 0, '', '.') . '</td>
                                        
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
                                <tr class="tr_linea tr_lineader">
                                    <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt; font-weight: bold; vertical-align: middle; padding: 1mm;">SALDO ANTERIOR</td>
                                    <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt; font-weight: bold; vertical-align: middle; padding-right: 2px;">$<?= number_format($totaldebev, 0, '', '.') ?></td>

                                </tr>
                                <tr class="tr_linea tr_lineader">
                                    <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle;  padding: 1mm;">TOTAL</td>
                                    <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">$<?= number_format($totalf, 0, '', '.') ?></td>

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
                                        $tipopagver = "EFECTIVO";
                                    }
                                    if ($tipopages == '2') {
                                        $tipopagver = "TRANSEFERENCIA";
                                    }
                                    if ($tipopages == '3') {
                                        $tipopagver = "DEPOSITO";
                                    }
                                    if ($tipopages == '4') {
                                        $tipopagver = "CHEQUE";
                                    }
                                    if ($tipopages == '5') {
                                        $tipopagver = "MERCADOPAGO";
                                    }
                                    echo '<tr class="tr_linea tr_lineader">
                                            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle;padding: 1mm;">SU PAGO EN ' . $tipopagver . '</td>
                                            <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt;  vertical-align: middle; padding-right: 2px;">$' . number_format($deudavfp, 0, '', '.') . '</td>
                                            
                                            </tr>';
                                }
                                $debe = $totalf - $pagoTotal;
                                $debefp = number_format($debe, 2, '.', '');


                                ?>
                                <? if ($totalf != $debefp) { ?>
                                    <tr class="tr_linea tr_lineader">
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt; font-weight: bold; vertical-align: middle;padding: 1mm;">DEBE</td>
                                        <td class="celda_sin td_lineader" style="text-align:right;font-size:9pt; font-weight: bold; vertical-align: middle; padding-right: 2px;">$<?= number_format($debefp, 0, '', '.') ?></td>

                                    </tr>
                                <? } ?>





                        </table><br><br><br>

 *******************************************
    <div style="text-align: center; font-size:9pt;">
      <img src="/assets/images/qr.png" style="width:50%; text-align: center; "> 
      <br> www.sancipriano-module.com.ar
    </div>
    *******************************************<br>
    <br><br><br><br> .


<script>
  window.print(); 



        // Esperar a que la impresión termine
        // Esperar 5 segundos antes de cerrar la ventana
      setTimeout(function() {
            location.href='<?=$archipri?>?jfndhom=<?= $idordencod?>';
        }, 20000); 
    </script>









</body>

</html>