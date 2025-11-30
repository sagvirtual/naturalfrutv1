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



$desde_date = $fechahoy;


$sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clientedec'");
if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
    $empresa = $rowproveedores["empresa"];
    $address = $rowproveedores["address"];
}


$sqlitndis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date' and stock='1'");
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
                    <h2 class="card-title"><strong>PRODUCTOS SIN VENDER </strong></h2>
                    <p class="card-title" style="font-size:10pt;">Fecha: <?= $dianombr ?> <?= $fechaarre ?></p>
                </div>  <? }else{echo '<div class="alert alert-danger" role="alert" style="position:relative; top:100px; text-align:center;">
                                      <h1>SE VENDIERON TODOS LOS PRODUCTOS!
                                      </h1></div>'; $vendido='1';}?>
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
                                $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'");
                                if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


                                    //join si el producto esta para el cliente
                                    $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor, u.stock
                                                        FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.fecha = '$desde_date' and u.stock='1'");

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

                                    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' ORDER BY `productos`.`position` ASC");

                                    while ($rowproductosr = mysqli_fetch_array($sqlproductosr)) {
                                        $idproduff = $rowproductosr['id'];
                                        //pruebo poner el producto




                                        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT DISTINCT id_producto FROM item_orden Where fecha = '$desde_date' and id_producto='$idproduff' and stock='1' ORDER BY `item_orden`.`fecha` ASC");

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


                                           /*  $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$desde_date' and id_producto='$idproduff'");
                                            if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
                                                $kilos = $rowcarga["kilos"];
                                                $kilosv = $rowcarga["kilos"];
                                                $kilos = number_format($kilos, 2, '.', '');
                                                $confirmado = $rowcarga["confirmado"];
                                            }
 */

                                            $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and id_producto='$id_producto' and stock='1' ORDER BY `item_orden`.`nombre` ASC");
                                            while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
                                                $nombreprod = $rowitem_orden["nombre"];


                                                $noverpagcl = $rowitem_orden["valor"];
                                                $id_clienteitem = $rowitem_orden["id_cliente"];
                                                $idite = $rowitem_orden["id"];
                                                $fecha = $rowitem_orden["fecha"];
                                                $modo = $rowitem_orden["modo"];
                                                $cliente_prov = $rowitem_orden["cliente_prov"];
                                                
                                                    $kilos += $rowitem_orden["kilos"];
                                                    $kilosv += $rowitem_orden["kilos"];
                                                
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
                                                $caja = "<h3>" . $cajonentero . "</h3>" ;
                                            } else {
                                                $caja = "<h3>" . $cajonentero . " Kg.</h3>";
                                            }


                                            //

                                            if ($noverpagcl == '0') {



                                                $id_productocod = base64_encode($id_producto);



                                                $nombreb = "1";
                                                $fechacod = base64_encode($desde_date);
                                                echo '<tr> 


                                                
                                                                    <td style="black; border: 1px solid black;"> 
                                                                    <div id="muestrocarga'.$id_producto.'"></div>
                                                                   
                                                                     <p style="line-height:-20px;font-weight: bold;position:relative; top:10px;" class="noseelc">' . $nombreprod . '</p>
                                                                     <p style="font-size:8pt; position:relative; top:0px;" class="noseelc">(Caja x ' . $kilocajon . 'kg.)</p>
                                                                     

                                                                     <input type="hidden" name="fecha'.$id_producto.'" id="fecha'.$id_producto.'" value="' . $fechacod . '">
                                                                     <input type="hidden" name="id_producto'.$id_producto.'" id="id_producto'.$id_producto.'" value="'.$id_productocod.'">
                                                                     <input type="hidden" name="id_proveedor'.$id_producto.'" id="id_proveedor'.$id_producto.'" value="' . $id_clientecod . '">
                                                                     <input type="hidden" name="kilosex'.$id_producto.'" id="kilosex'.$id_producto.'" value="' . $pediporkilov . '">
                                                                     <input type="hidden" name="cajas'.$id_producto.'" id="cajas'.$id_producto.'" value="' . $cajonentero . '">
                                                                    </td>
                                                                    <td 
                                                                    style="width: 110px; border: 1px solid black; text-align:center;font-weight: bold;" class="noseelc">
                                                                    
                                                                  
                                                                    ' .  $caja . '  ' . $pediporkilovok . '

                                                                   


                                                                   
                                                             
                                                               

                                                                        

                                                                    
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
                                <? if($vendido!='1'){?>
                           
                                <a href="print_productos?hfbbd=<?= $id_clientecod ?>&podjfuu=<?= $fechacod ?>"> <button type="button" class="btn btn-dark btn-block"><i class="la la-print"></i> Imprimir Productos</button></a><? }?>
                            
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