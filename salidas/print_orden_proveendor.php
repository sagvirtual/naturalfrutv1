<? require('mpdf.php');
include('../f54du60ig65.php');



$id_clientecod = $_GET['hfbbd'];
$desde_datee = $_GET['podjfuu'];
$desde_date = base64_decode($desde_datee);

$id_cliente = base64_decode($id_cliente);
$id_clientedec = base64_decode($id_clientecod);


$sqlproveedores=mysqli_query($rjdhfbpqj,"SELECT * FROM proveedores Where id = '$id_clientedec'");
if ($rowproveedores = mysqli_fetch_array($sqlproveedores)){
    $empresa = $rowproveedores["empresa"];
    $address = $rowproveedores["address"];
}

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

//comienzo pdf
ob_start();
?>

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!-- Touchspin css -->
    <link href="/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">
 
    <!-- Apex css -->
    <link href="/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <!-- Slick css -->
    <link href="/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">

   
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
<!-- inserto los iem -->


<body style="background-color: #fff;">


    <div class="container-fluid">
        <div class="row">


            <!-- Start col -->

            <div class="card m-b-30" style="border: 0px solid black;">
                <div class="card-header">

                    <img src="/assets/images/logo.png" style="height: 100px; border: 0px solid black;">
                    <hr>
                    <h2 class="card-title"><strong>ORDEN DE CARGA </strong></h2>
                    <h1 class="card-title">Fecha entrega: <?= $dianombr ?> <?= $fechaarre ?></h1>
                    <h1 class="card-title">Proveedor: <?= $empresa ?> - <?= $address ?> </h1>
                </div>
                <div class="card-body" style="border: 0px solid black;">
                    <!-- <p class="card-subtitle">Cliente: <b>Mariano</b>
                    <p>
                            -->

                    <div class="table-responsive m-b-30" style="border: 0px solid black;">


                        <!-- inserto los iem -->

                        <!-- aca volcar -->




                        <div class="table-responsive m-b-30">
                            <table class="table table-bordered" style="background-color: #fff; ">
                                <tr>
                                    <td>

                                        <?php


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
                                                        
                                                        <table class="table table-bordered" style="background-color: #fff; position:relative; top:-10px; text-align:left; height:5px;">
                                                        <tr>
                                                            <td scope="col" style="width: 130px; text-align:center;  border: 1px solid black;">Kg. Pedidos</td>
                                                            <td scope="col" style="text-align:center;  border: 1px solid black;">Productos</td>
                                                            <td scope="col" style="width: 110px; text-align:center;  border: 1px solid black;">Cajas Pedidas</td>
                                                            <td scope="col" style="width: 3mm;background-color: black;  border: 1px solid black;"></td>
                                                            <td scope="col" style="width: 110px; text-align:center;  border: 1px solid black;">Cajas  Cargadas</td>
                                                        </tr>
                                                        ';
                                                }

                                                

                                                //pongo los item <tr>     

                                                $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY `productos`.`position` ASC");

                                                while ($rowproductosr = mysqli_fetch_array($sqlproductosr)) {
                                                    $idproduff = $rowproductosr['id'];
                                                    //pruebo poner el producto




                                                    $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT DISTINCT id_producto FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec' and id_producto='$idproduff' ORDER BY `item_orden`.`fecha` ASC");




                                                    while ($rowitem_ordendis = mysqli_fetch_array($sqlitem_orden)) {
                                                        $id_producto = $rowitem_ordendis["id_producto"];
                                                        $kilos = ${"kilos" . $id_producto};
                                                        $totalliqv = ${"totalliqv" . $id_producto};
                                                        $totalprov = ${"totalprov" . $id_producto};
                                                        $cliente_prov = ${"cliente_prov" . $id_producto};
                                                        $noverpagcl = ${"noverpagcl" . $id_producto};
                                                        $par = ${"par" . $id_producto};

                                                        $sqlcargav = ${"sqlcargav" . $id_producto};
                                                        $rowcarga  = ${"rowcarga " . $id_producto};
                                                        $confirmado  = ${"confirmado " . $id_producto};
                                                        $kilost  = ${"kilost " . $id_producto};
                                                        $kilostv  = ${"kilostv " . $id_producto};
                                                        $canticajonesw = ${"canticajonesw" . $id_producto};
                                                        $canticajonesredw = ${"canticajonesredw" . $id_producto};
                                                        $pediporkilovw = ${"pediporkilovw" . $id_producto};
                                                        $pediporkilovokw = ${"pediporkilovokw" . $id_producto};
                                                        $kiloscob = ${"kiloscob" . $id_producto};
                                                        $cajonenterow = ${"cajonenterow" . $id_producto};
                                                        $cajaw = ${"cajaw" . $id_producto};
            
            
                                                        $regis = $regis + 1;
            
                                                         
                                                        $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$desde_date' and id_proveedor='$id_clientedec' and id_producto='$id_producto'");
                                                        if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
                                                            $kilost = $rowcarga["kilos"];
                                                            $kilostv = $rowcarga["kilos"];
                                                            $kilost = number_format($kilost, 2, '.', '');
                                                            $confirmado = $rowcarga["confirmado"];
                                                        }else{ $kilosConfirmado = '888';
                                                            $kilosvConfirmado = '888';}
            



                                                        $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec'  and id_producto='$id_producto' ORDER BY `item_orden`.`nombre` ASC");
                                                        while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
                                                            $nombreprod = $rowitem_orden["nombre"];


                                                            $noverpagcl = $rowitem_orden["valor"];
                                                            $id_clienteitem = $rowitem_orden["id_cliente"];
                                                            $idite = $rowitem_orden["id"];
                                                            $fecha = $rowitem_orden["fecha"];
                                                            $modo = $rowitem_orden["modo"];
                                                            $cliente_prov = $rowitem_orden["cliente_prov"];
                                                            
                                                            $kilos += $rowitem_orden["kilos"];
                                                            $kilos = number_format($kilos, 2, '.', '');
                                                           
                                                            $desde_datecod = base64_encode($desde_date);


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


                                                            if($confirmado=='1'){$colorcon='';
                                                            if( $kilost=='0'){$cajaw='Sin Stock';}else{
                                                                
                                                            
                                                               if($kilost==$kilos){$kiloscob='<i class="feather icon-check">OK</i>';}else{
                                                               
                                                            
                                                                        //calculo cuantos cajones se piden
                                                                    $canticajonesw = $kilost / $kilocajon;

                                                                    $canticajonesredw = explode(".", $canticajonesw);

                                                                    $cajonenterow = $canticajonesredw[0];

                                                                    $pediporkilow = $cajonenterow * $kilocajon;
                                                                    $pediporkilovw = $kilost - $pediporkilow;

                                                                    if ($pediporkilovw > 0) {
                                                                        $pediporkilovokw = "+ " . $pediporkilovw . "kg.";
                                                                    } else {
                                                                        $pediporkilovokw = "";
                                                                    }
                                                                    //
                                                                    //cajas con foto
                                                                    $kiloscob=$pediporkilovokw;

                                                                    if ($kilocajon != '1') {
                                                                        $cajaw = "<h3>" . $cajonenterow . "</h3>";
                                                                    } else {
                                                                        $cajaw = "<h3>" . $cajonenterow . " Kg.</h3>";
                                                                    }
                                                                    
            
                                                                        
                                                            
                                                                }
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            }
                                                            
                                                            
                                                            }else{$colorcon=''; $kiloscob='<i>Esperando</i>';$cajaw='';}
                                                           
                                                            echo '<tr>
                               
                                                            <td  style="padding: 0; width: 130px; text-align:center; black; border: 1px solid black;">&nbsp;' . $kilos . '</td>
                                                            <td style="black; border: 1px solid black;">
                                                    
                                                    
                                                            ' . $nombreprod . '
                                                            
                                                            
                                                            
                                                            </td>
                                                            <td style="width: 110px; border: 1px solid black; text-align:center;">' .  $caja . '  ' . $pediporkilovok . '</td>
                                                            <td scope="col" style="width: 3mm; background-color: black; border: 1px solid black;"></td>
                                                            <td scope="col" style="width: 110px; text-align:center; border: 1px solid black;">'.$colorcon.''.$cajaw.' '.$kiloscob.'</td>
                                                           
                                                            
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


                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    &nbsp;&nbsp;Documento no Valido como Factura <br>
                    <div class="alert alert-dark" style="width: 270px;"> <b><?= $datosloc ?></b></div>
                </div>
            </div>





        </div>
    </div>
</body>















<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->AddPageByArray([
    "margin-left" => "10mm",
    "margin-right" => "10mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('orden_de_carga' . $desde_date . '.pdf', 'I');




?>