<?php include('../f54du60ig65.php');



$hasta_date = $_GET['hasta_date'];
$desde_date = $_GET['desde_date'];
$id_cliente = $_GET['id_cliente'];
$ventascobros = $_GET['ventascobros'];

$id_clientedec = base64_decode($id_cliente);


?>
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">


<!-- Touchspin css -->
<link href="/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">

<!-- Apex css -->
<link href="/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
<!-- Slick css -->
<link href="/assets/plugins/slick/slick.css" rel="stylesheet">
<link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">



<div class="table-responsive m-b-30">
    <table class="table table-bordered" style="background-color: #fff; ">
        <tbody>
            <?php

            if($id_cliente!='MA=='){$sqlmodo=" and id_cliente=".$id_clientedec;}
            if($ventascobros=='1'){$sqlmodoventas=" and precio!='0'";}
            if($ventascobros=='2'){$sqlmodoventas=" and valor!='0'";}

            /* total ventas  tengo que hacer un join con los pagos */

            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente='$id_clientedec' $sqlmodoventas  and cliente_prov='0' and id_orden !='0' ORDER BY `item_orden`.`fecha` ASC");
            while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                $nota = $rowitem_orden["nota"];
                $idite = $rowitem_orden["id"];
                $fecha = $rowitem_orden["fecha"];
                $modo = $rowitem_orden["modo"];
                $tipopag = $rowitem_orden["tipopag"];

                if($tipopag=='1'){$nombrpag='Efectivo';}
                if($tipopag=='2'){$nombrpag='Transferencia';}
                if($tipopag=='3'){$nombrpag='Deposito';}
                if($tipopag=='4'){$nombrpag='Cheque';}
                if($tipopag=='5'){$nombrpag='Mercado Pago';}


                if ($modo != 0) {
                    
                    $preciov = "";
                    $sinbolome = "-";
                    $colortex = "color:red;";
                    $totalliqv = number_format($rowitem_orden["valor"], 2, '.', '');
                    $kilosd = "";
                    if ($modo == 1) {
                        $tipodeitem = "Pagó ".$nombrpag." ";
                    } else {

                        if($nota=='1'){$tipodeitem = "Descuento ";}
                        else{

                        $tipodeitem = "Descuento  ".$rowitem_orden["pordesc"]."%";}
                    }
                } else {
                    $tipodeitem = "";
                    $kilosd = $rowitem_orden["kilos"];

                    $preciov = number_format($rowitem_orden["precio"], 2, '.', '');
                    $totalliqv = number_format($rowitem_orden["total"], 2, '.', '');
                    $colortex = "color:black;";
                    $sinbolome = "";
                }

                $kilos = number_format($kilosd, 2, '.', '');

                $fechaex = explode("-", $fecha);

                $fechacon = $fechaex[2] . "/" . $fechaex[1] . "/" . $fechaex[0];


                $idcodp = base64_encode($idite);
                $subtotal += $rowitem_orden["total"];
                $subtotalv = number_format($subtotal, 2, '.', '');
                if (!empty($nota) && $nota!='1') {
                    $notav = "(" . $nota . ")";
                } else {
                    $notav = "";
                }


                /* configuro para que siga el nombre del dia */
                $fechats = strtotime($fecha);
                $dayver = date('w', $fechats);

                if ($dayver == '1') {
                    $dianombr = "LUNES";
                }
                if ($dayver == '2') {
                    $dianombr = "MARTES";
                }
                if ($dayver == '3') {
                    $dianombr = "MIERCOLES";
                }
                if ($dayver == '4') {
                    $dianombr = "JUEVES";
                }
                if ($dayver == '5') {
                    $dianombr = "VIERNES";
                }
                if ($dayver == '6') {
                    $dianombr = "SABADO";
                }
                if ($dayver == '0') {
                    $dianombr = "DOMINGO";
                }
                /* fin */
                if (($idite % 2) == 0) {
                    //Es un número par
                    $par = 'background-color: #E7E7E7;';
                } else {
                    //Es un número impar
                    $par = 'background-color: #F9F9F9;';
                }
                echo '<tr>
                            <td  style="padding: 0;width: 130px; text-align:center; ' . $par . '">Nº ' . $rowitem_orden["id_orden"] . '</td>
                            <td  style="padding: 0;width: 130px; text-align:left; ' . $par . '">' . $dianombr . '</td>
                            <td  style="width: 120px; text-align:center; ' . $par . '">' . $fechacon . '</td>
                            <td style="width: 100px; text-align:center; ' . $par . '">' . $kilos . '</td>
                            <td style="' . $par . '' . $colortex . '"> ';
                            if($modo == '1' && $id_cliente != 'MA=='){
                           echo' <a href="javascript:eliminar(' . "'mlkdthspa?" . 'juhytm=' . $idcodp . '&djuhytmf='.$id_cliente.'&desde_date='.$desde_date.'&hasta_date='.$hasta_date.'' . "'" . ')" > <i class="ri-delete-bin-3-line" style="color: red; ' . $par . '"></i></a> ';
                            
                        }
                            
                            echo'
                            ' . $rowitem_orden["nombre"] . ' ' . $tipodeitem . '' . $notav . '
                            
                           
                            
                            </td>
                            <td style="width: 110px; text-align:right; ' . $par . '">' . $preciov . '</td>
                            <td style="width: 110px; text-align:right; ' . $par . ' ' . $colortex . '">' . $sinbolome . '' . $totalliqv . '</td>
                           
                        </tr>';
            }

            ?>



        </tbody>
         <script src="/assets/js/borrar.js"></script>