<? include('../f54du60ig65.php'); ?>
<style>
    @media print {
        #miDiv {
            display: none;
        }
    }
    </style>
<div id="miDiv">
<?
include('../template/cabezalcelu.php');



$id_clientecod = $_GET['hfbbd'];
$desde_datee = $_GET['podjfuu'];
$desde_date = base64_decode($desde_datee);

$id_cliente = base64_decode($id_cliente);
$id_clientedec = base64_decode($id_clientecod);


$sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clientedec'");
if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
    $empresa = $rowproveedores["empresa"];
    $address = $rowproveedores["address"];
}


$sqlitndis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and camioneta='$id_camioneta' and id_proveedor='$id_clientedec'");
if ($rowitemorden = mysqli_fetch_array($sqlitndis)) {$hayorden='1';} else{$hayorden='0';}

/* configuro para que siga el nombre del dia */
$fechats = strtotime($desde_date);
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
$fechaexo = explode("-", $desde_date);
$fechaarre = $fechaexo[2] . "/" . $fechaexo[1] . "/" . $fechaexo[0];

?>

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">

<!-- inserto los iem -->

<style>
    a {
        color: black;
    }
    .noseelc {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select:none;
    user-select:none;
}
</style>

<body style="background-color: #fff;">


    <div class="container-fluid">
        <div class="row">


            <!-- Start col -->

            <div class="card m-b-30" style="border: 0px solid black;">
            <? if($hayorden=='1'){?>
                <div class="card-header" style="background-color:#D6D6D6;">
                    <h2 class="card-title"><strong>ORDEN DE CARGA </strong></h2>
                    <p class="card-title" style="font-size:10pt;">Fecha entrega: <?= $dianombr ?> <?= $fechaarre ?></p>
                    <p class="card-title" style="font-size:10pt;">Proveedor: <?= $empresa ?></p>
                    <p class="card-title" style="font-size:10pt;">Dirección: <?= $address ?> </p>
                </div>  <? }else{echo '<div class="alert alert-danger" role="alert" style="position:relative; top:100px; text-align:center;">
                                      <h1>Por el momento no tenos una Orden de carga!
                                      </h1></div>';}?>
                <div class="card-body" style="border: 0px solid black;">
                    <!-- <p class="card-subtitle">Cliente: <b>Mariano</b>
                    <p>
                            -->

                    <div class="table-responsive m-b-30" style="border: 0px solid black;">


                        <!-- inserto los iem -->

                        <!-- aca volcar -->




                        <div class="table-responsive m-b-30">


                            <?php
                            //emulo '
                            $comilla="'";

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

                                //fin


                                //me fijo si hay item comprados <tr
                                $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ");
                                if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


                                    //join si el producto esta para el cliente
                                    $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor
                                                        FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.fecha = '$desde_date' and u.id_proveedor='$id_clientedec' ");

                                    if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) {


                                        echo '<table class="table table-bordered" style="background-color: black; position:relative; text-align:left;">
                        
                            
                                                        <tr><td  style="background-color: #CBCBCB;"><h5 style="position:relative; top:4px;"><b>' . $nombrecate . ' </b></h5></td></tr>
                                                        
                                                        </table>
                                                        
                                                        <table class="table table-bordered table-hover" style="background-color: #fff; position:relative; top:-10px; text-align:left; height:5px;">
                                                        <tr>
                                                            
                                                            <td scope="col" style="text-align:center;  border: 1px solid black;">Productos</td>
                                                            <td scope="col" style="width: 110px; text-align:center;  border: 1px solid black;">Cajas</td>
                                                        </tr>
                                                        ';
                                    }



                                    //pongo los item <tr>     

                                    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

                                    while ($rowproductosr = mysqli_fetch_array($sqlproductosr)) {
                                        $idproduff = $rowproductosr['id'];
                                        //pruebo poner el producto




                                        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT DISTINCT id_producto FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec' and id_producto='$idproduff'  and camioneta='$id_camioneta' ORDER BY `item_orden`.`fecha` ASC");

                                        while ($rowitem_ordendis = mysqli_fetch_array($sqlitem_orden)) {
                                            $id_producto = $rowitem_ordendis["id_producto"];
                                            $kilos = ${"kilos" . $id_producto};
                                            $kilosv = ${"kilos" . $id_producto};
                                            $totalliqv = ${"totalliqv" . $id_producto};
                                            $totalprov = ${"totalprov" . $id_producto};
                                            $cliente_prov = ${"cliente_prov" . $id_producto};
                                            $noverpagcl = ${"noverpagcl" . $id_producto};
                                            $par = ${"par" . $id_producto};
                                            $sqlcargav = ${"sqlcargav" . $id_producto};
                                            $rowcarga  = ${"rowcarga " . $id_producto};
                                            $confirmado  = ${"confirmado " . $id_producto};


                                            $regis = $regis + 1;


                                            $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$desde_date' and id_proveedor='$id_clientedec' and id_producto='$idproduff'");
                                            if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
                                                $kilos = $rowcarga["kilos"];
                                                $kilosv = $rowcarga["kilos"];
                                                $kilos = number_format($kilos, 2, '.', '');
                                                $confirmado = $rowcarga["confirmado"];
                                            }


                                            $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec'  and id_producto='$id_producto'  and camioneta='$id_camioneta' ORDER BY `item_orden`.`nombre` ASC");
                                            while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
                                                $nombreprod = $rowitem_orden["nombre"];


                                                $noverpagcl = $rowitem_orden["valor"];
                                                $id_clienteitem = $rowitem_orden["id_cliente"];
                                                $idite = $rowitem_orden["id"];
                                                $fecha = $rowitem_orden["fecha"];
                                                $modo = $rowitem_orden["modo"];
                                                $cliente_prov = $rowitem_orden["cliente_prov"];
                                                if ($confirmado != '1') {
                                                    $kilos += $rowitem_orden["kilos"];
                                                    $kilosv += $rowitem_orden["kilos"];
                                                }
                                                $desde_datecod = base64_encode($desde_date);

                                                $kilos = number_format($kilos, 2, '.', '');

                                                $idcodp = base64_encode($idite);
                                                $nombreb = ${"nombreb" . $rowitem_orden["id"]};
                                            }


                                            //estraigo los kilos por el cual viene el cajon
                                            $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                            if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                $kilocajon = $rowprecioprod["kilo"];
                                            }




                                            //calculo cuantos cajones se piden
                                            $canticajones = $kilos / $kilocajon;

                                            $canticajonesred = explode(".", $canticajones);

                                            $cajonentero = $canticajonesred[0];

                                            $pediporkilo = $cajonentero * $kilocajon;
                                            $pediporkilov = $kilos - $pediporkilo;

                                            if ($pediporkilov > 0) {
                                                $pediporkilovok = "+ " . $pediporkilov . "kg.";
                                            } else {
                                                $pediporkilovok = "";
                                            }
                                            //
                                            //cajas con foto



                                            if ($kilocajon != '1') {
                                                $caja = "<h3>" . $cajonentero . "</h3>";
                                            } else {
                                                $caja = "<h3>" . $cajonentero . " Kg.</h3>";
                                            }


                                            //

                                            if ($noverpagcl == '0') {



                                                $id_productocod = base64_encode($id_producto);



                                                $nombreb = "1";
                                                $fechacod = base64_encode($desde_date);
                                                if ($confirmado == '1') {
                                                    $colorcon = '#60FF76;';
                                                } else {
                                                    $colorcon = '#FF7E7E;';
                                                }
                                                echo '<tr> 


                                                
                                                                    <td style="black; border: 1px solid black;"> 
                                                                    <div id="muestrocarga'.$id_producto.'"></div>
                                                                    <a href="confirmacion_caja?fdmkms=' . $fechacod . '&jjdfngh='. $id_productocod . '&jjtadfngh=' . $id_clientecod . '" name="pro'.$id_producto.'">
                                                                     <p style="line-height:-20px;font-weight: bold;position:relative; top:10px;" class="noseelc">' . $nombreprod . '</p>
                                                                     <p style="font-size:8pt; position:relative; top:0px;" class="noseelc">(Caja x ' . $kilocajon . 'kg. Pedido ' . $kilosv . 'kg.)
                                                                     </a></p>
                                                                     

                                                                     <input type="hidden" name="fecha'.$id_producto.'" id="fecha'.$id_producto.'" value="' . $fechacod . '">
                                                                     <input type="hidden" name="id_producto'.$id_producto.'" id="id_producto'.$id_producto.'" value="'.$id_productocod.'">
                                                                     <input type="hidden" name="id_proveedor'.$id_producto.'" id="id_proveedor'.$id_producto.'" value="' . $id_clientecod . '">
                                                                     <input type="hidden" name="kilosex'.$id_producto.'" id="kilosex'.$id_producto.'" value="' . $pediporkilov . '">
                                                                     <input type="hidden" name="cajas'.$id_producto.'" id="cajas'.$id_producto.'" value="' . $cajonentero . '">
                                                                    </td>
                                                                    <td 
                                                                    style="width: 110px; border: 1px solid black; text-align:center;font-weight: bold; background-color:' . $colorcon . ';"
                                                                    
                                                                    ondblclick="playAudio(); ajax_carga'.$id_producto.'($('.$comilla.'#id_proveedor'.$id_producto.''.$comilla.').val(), $('.$comilla.'#id_producto'.$id_producto.''.$comilla.').val(), $('.$comilla.'#fecha'.$id_producto.''.$comilla.').val(), $('.$comilla.'#kilosex'.$id_producto.''.$comilla.').val(), $('.$comilla.'#cajas'.$id_producto.''.$comilla.').val());" class="noseelc">
                                                                    
                                                                    <a ondblclick="playAudio(); ajax_carga'.$id_producto.'($('.$comilla.'#id_proveedor'.$id_producto.''.$comilla.').val(), $('.$comilla.'#id_producto'.$id_producto.''.$comilla.').val(), $('.$comilla.'#fecha'.$id_producto.''.$comilla.').val(), $('.$comilla.'#kilosex'.$id_producto.''.$comilla.').val(), $('.$comilla.'#cajas'.$id_producto.''.$comilla.').val());">
                                                                    ' .  $caja . '  ' . $pediporkilovok . '

                                                                    </a>


                                                                   
                                                             
                                                                    <script>
                                                                    function ajax_carga'.$id_producto.'(id_proveedor, id_producto, fecha, kilosex, cajas){
                                                                        var parametros = {
                                                                        "id_proveedor":id_proveedor,
                                                                        "id_producto":id_producto,
                                                                        "fecha":fecha,
                                                                        "kilosex":kilosex,
                                                                        "cajas":cajas
                                                                        };
                                                                        $.ajax({
                                                                                 data: parametros,
                                                                                 url: '.$comilla.'insert_carga.php'.$comilla.',
                                                                                 type: '.$comilla.'POST'.$comilla.',
                                                                                 beforeSend: function(){
                                                                                          $("#muestrocarga'.$id_producto.'").html('.$comilla.''.$comilla.');
                                                                                 },
                                                                                 success: function(response){
                                                                                          $("#muestrocarga'.$id_producto.'").html(response);
                                                                                 }
                                                                              });
                                                                        }
                                                                    
                                                                        </script>

                                                                        

                                                                    
                                                                    </td> 
                                                                  </tr>';
                                            }
                                        }



                                        //fin poner el producto
                                    }
                                    echo '</table>';

                                    //fin item </tr>



                                }
                            }

                            ?>



                            <!-- fin -->

                            <? $sqlitem_ordendist = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec'  and  conf_carga ='0' and modo='0' and camioneta='$id_camioneta'");
                                            if ($rowitem_ordent = mysqli_fetch_array($sqlitem_ordendist)) {}else{?>
                                <a href="print_carga?hfbbd=<?= $id_clientecod ?>&podjfuu=<?= $fechacod ?>"> <button type="button" class="btn btn-dark btn-block"><i class="la la-print"></i> Imprimir Orden de Carga</button></a>
                                <!-- <a href="../salidas/print_orden_proveendor?hfbbd=<?//= $id_clientecod ?>&podjfuu=<?//= $fechacod ?>"> <button type="button" class="btn btn-warning btn-block"><i class="feather icon-upload mr-2"></i> Descarga Orden de Carga</button></a> -->
                            <? } ?>
                        </div>
                    </div>


                </div>
            </div>





        </div>
    </div>
    </div>
    
</body>






<?php



include('../template/piecelu.php'); ?>