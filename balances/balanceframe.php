<?php include('../f54du60ig65.php');



$hasta_date = $_GET['hasta_date'];
$desde_date = $_GET['desde_date'];



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

            /* total ventas  tengo que hacer un join con los pagos */

            $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente!='0' and modo='0' and conf_entrega='1' and conf_entrega2='1' and stock='0' and id_orden!='0'  GROUP BY id_producto ORDER BY `item_orden`.`fecha`  ASC");
            while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                $id_producto = $rowitem_orden["id_producto"];
                $idite = 1 + $idite;
                //sumo el producto
                $sqlitem_ordenp = ${'sqlitem_ordenp' . $idite};
                $rowitem_ordenp = ${'rowitem_ordenp' . $idite};
                $valorventap = ${'valorventap' . $idite};
                $kilosp = ${'kilosp' . $idite};
                $valorventavp = ${'valorventavp' . $idite};

                $sqlitem_ordenp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente!='0' and modo='0' and conf_entrega='1' and conf_entrega2='1' and stock='0' and id_orden!='0' and id_producto='$id_producto'");
                while ($rowitem_ordenp = mysqli_fetch_array($sqlitem_ordenp)) {


                    $valorventap += $rowitem_ordenp["total"] - $rowitem_ordenp["totalprov"];
                    $kilosp += $rowitem_ordenp["kilos"];
                    $valorventavp = number_format($valorventap, 0, ',', '.');



                    //
                }








                    if (($idite % 2) == 0) {
                        //Es un número par
                        $par = 'background-color: #E7E7E7;';
                    } else {
                        //Es un número impar
                        $par = 'background-color: #F9F9F9;';
                    }


                    echo '<tr>
                            <td  style="padding: 0; text-align:left; padding-left:20px;' . $par . '">' . $rowitem_orden["nombre"] . ' id ' . $id_producto . '</td>
                            <td style="width: 20mm; text-align:center;' . $par . '">' . $kilosp . '</td>
                            <td  style="padding: 0;width: 25mm; text-align:right;padding-right:5px; ' . $par . '"><strong>' . $valorventavp . '</strong></td>
                           
                        </tr>';
                }
            
            ?>



        </tbody>