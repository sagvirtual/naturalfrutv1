<? include('../f54du60ig65.php');



$desde_date = $fechahoy;

$id_cliente = base64_decode($id_cliente);
$id_clientedec = base64_decode($id_clientecod);



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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Productos sin Vender</title>
</head>


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

        border-collapse: collapse;

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
        border-top: 0.1mm solid black;

    }

    body {
        font-family: arial;
        font-size: 8pt;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #4CAF50;
        /* Green */

        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>


<body>

    <div id="miDiv" style="text-align: center;">
        <h1>Imprimiendo...</h1>
        <p>espere a que salga el Ticket</p>
        <br>
        <br>
        <a href="orden_carga?hfbbd=<?= $id_clientecod ?>&podjfuu=<?= $desde_datee ?>"><button class="button button1">LISTO</button></a>
        <!--  <a onclick="javascript:window.print()" style="font-size: 40pt;">Imprimir</a> -->
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
    </div>


    *******************************************
    <div style="text-align: center; font-size:7pt;">X<br>DOCUMENTO&nbsp;NO&nbsp;VALIDO&nbsp;COMO&nbsp;FACTURA
        <img src="/assets/images/logop.png" style="width:45mm;">
    </div>
    <!--   -->
    *******************************************
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea">
            <td class="celda_sin" style="text-align: center; ">
                <p style="text-align:center;font-size:12pt; font-weight: bold;"> DEVOLUCIONES
 </p>


            </td>


        </tr>







    </table>
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea">
        
            <td class="celda_sin">
                <p style="font-size:8pt;"><?= $dianombr ?> <?= $fechaarre ?> <p>
            </td>            <td class="celda_sin">
                <p style="float:right;text-align:right;font-size:8pt;"> <?php

                                                                                                                echo '' . $hora_actual = date("H:i:s") . '';

                                                                                                                ?>
                <p>
            </td>

        </tr>







    </table>




    <!-- Start col -->


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
    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'");
    if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


        //join si el producto esta para el cliente
        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor
                            FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.fecha = '$desde_date' and u.stock='1'");

        if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) { 

                                    echo '<br><table  class="tabla_sin" style="width: 100%;">


                                    <tr class="tr_linea"><td style="text-align:center;font-size:10pt; font-weight: bold;">' . $nombrecate . '</td></tr>
                                    
                                    </table>
                                    
                                    <table  class="tabla_sin" style="width: 100%;">
                                                
                                               
                                               
                                                ';
                                  
                                           

                                    //pongo los item <tr>     

                                    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'  ORDER BY `productos`.`position` ASC");

                                    while ($rowproductosr = mysqli_fetch_array($sqlproductosr)) {
                                        $idproduff = $rowproductosr['id'];
                                        $nombreprod = $rowproductosr["nombreb"];
                                        //pruebo poner el producto


                                       

                                        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date' and stock='1' and id_producto='$idproduff'");




                                        if ($rowitem_ordendis = mysqli_fetch_array($sqlitem_orden)) {
                                            $id_producto = $rowitem_ordendis["id_producto"];
                                            $totalprov = ${"totalprov" . $id_producto};
                                            $sqlcargav = ${"sqlcargav" . $id_producto};
                                            $rowcarga  = ${"rowcarga " . $id_producto};
                                            $kilost  = ${"kilost " . $id_producto};
                                            $kilostv  = ${"kilostv " . $id_producto};
                                            $canticajonesw = ${"canticajonesw" . $id_producto};
                                            $canticajonesredw = ${"canticajonesredw" . $id_producto};
                                            $pediporkilovw = ${"pediporkilovw" . $id_producto};
                                            $pediporkilovokw = ${"pediporkilovokw" . $id_producto};
                                            $kiloscob = ${"kiloscob" . $id_producto};
                                            $cajonenterow = ${"cajonenterow" . $id_producto};
                                            $cajaw = ${"cajaw" . $id_producto};




                                            $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date' and stock='1' and id_producto='$id_producto'");
                                            if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
                                                $kilost = $rowcarga["kilos"];
                                                $kilostv = $rowcarga["kilos"];
                                                $kilost = number_format($kilost, 2, '.', '');
                                            }



                                            //estraigo los kilos por el cual viene el cajon
                                            $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                            if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                $kilocajon = $rowprecioprod["kilo"];
                                            }

                                            //calculo cuantos cajones se piden
                                            $canticajonesw = $kilost / $kilocajon;

                                            $canticajonesredw = explode(".", $canticajonesw);

                                            $cajonenterow = $canticajonesredw[0];

                                            if ($cajonenterow == 0) {
                                                $cajonenterow = '';
                                                $elmas = '';
                                                $cajasver = '';
                                            } else {
                                                $elmas = "+";
                                                $cajasver = "Caj.";
                                            }

                                            $pediporkilow = $cajonenterow * $kilocajon;
                                            $pediporkilovw = $kilost - $pediporkilow;



                                            if ($pediporkilovw > 0) {
                                                $pediporkilovokw = $elmas . "&nbsp;" . $pediporkilovw . "kg.";
                                            } else {
                                                $pediporkilovokw = "";
                                            }
                                            //
                                            //cajas con foto
                                            $kiloscob = $pediporkilovokw;


                                            $bultosR += $cajonenterow;
                                            $bultoskilR += $pediporkilovw;

                                            if ($kilost == '0') {
                                                $kilosver = 'Sin Stock';
                                            } else {
                                                $kilosver = $kilost . 'Kg';
                                            }

                                            echo '<tr class="tr_linea">
                               
                                                            <td  class="celda_sin">' . $nombreprod . '<br>(Caja x ' . $kilocajon . 'Kg.)</td>
                                                            <td class="celda_sin">' . $cajasver . '' . $cajonenterow . '&nbsp;' . $kiloscob . '</td>
                                                           
                                                            
                                                            </tr>';
                                        }
                                    }



                                    //fin poner el producto 
                                }
                                echo '</table>'; 
                            }}


                            ?>




                            <!-- fin -->


                        </td>
                    </tr>
                    <tr class="tr_linea">
                        <td class="celda_sin">
                            <p style="text-align:left;font-size:12pt; font-weight: bold;">Bultos&nbsp;<?= $bultosR ?> y <?= $bultoskilR ?> Kilos</p>
                        </td>



                    </tr>
                </table><br><br><br>
                <p style="font-size: 6pt; text-align:center" class="tr_lineatop">.................................................................................<br>NOMBRE RESPONSABLE</p>

                *******************************************

            </div>
        </div>


    </div>
    <br><br><br>
<img src="/assets/images/tijera.gif" alt=""> - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
<br><br><br><br><br>
<!-- SEGUNDA -->

*******************************************
    <div style="text-align: center; font-size:7pt;">X<br>DOCUMENTO&nbsp;NO&nbsp;VALIDO&nbsp;COMO&nbsp;FACTURA
        <img src="/assets/images/logop.png" style="width:45mm;">
    </div>
    <!--   -->
    *******************************************
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea">
            <td class="celda_sin" style="text-align: center; ">
                <p style="text-align:center;font-size:12pt; font-weight: bold;"> DEVOLUCIONES
 </p>


            </td>


        </tr>







    </table>
    <table class="tabla_sin" style="width: 100%;">
        <tr class="tr_linea">
        
            <td class="celda_sin">
                <p style="font-size:8pt;"><?= $dianombr ?> <?= $fechaarre ?> <p>
            </td>            <td class="celda_sin">
                <p style="float:right;text-align:right;font-size:8pt;"> <?php

                                                                                                                echo '' . $hora_actual = date("H:i:s") . '';

                                                                                                                ?>
                <p>
            </td>

        </tr>







    </table>




    <!-- Start col -->


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
    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'");
    if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {


        //join si el producto esta para el cliente
        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT e.id, e.categoria, e.position, u.id_producto, u.nombre, u.fecha, u.id_proveedor
                            FROM productos e INNER JOIN item_orden u ON e.id = u.id_producto Where categoria='$id_categoria' and u.fecha = '$desde_date' and u.stock='1'");

        if ($rowproductosre = mysqli_fetch_array($sqlproductosv)) { 

                                    echo '<br><table  class="tabla_sin" style="width: 100%;">


                                    <tr class="tr_linea"><td style="text-align:center;font-size:10pt; font-weight: bold;">' . $nombrecate . '</td></tr>
                                    
                                    </table>
                                    
                                    <table  class="tabla_sin" style="width: 100%;">
                                                
                                               
                                               
                                                ';
                                  
                                           

                                    //pongo los item <tr>     

                                    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'  ORDER BY `productos`.`position` ASC");

                                    while ($rowproductosr = mysqli_fetch_array($sqlproductosr)) {
                                        $idproduff = $rowproductosr['id'];
                                        $nombreprod = $rowproductosr["nombreb"];
                                        //pruebo poner el producto


                                       

                                        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date' and stock='1' and id_producto='$idproduff'");




                                        if ($rowitem_ordendis = mysqli_fetch_array($sqlitem_orden)) {
                                            $id_producto = $rowitem_ordendis["id_producto"];
                                            $totalprov = ${"totalprov" . $id_producto};
                                            $sqlcargav = ${"sqlcargav" . $id_producto};
                                            $rowcarga  = ${"rowcarga " . $id_producto};
                                            $kilost  = ${"kilost " . $id_producto};
                                            $kilostv  = ${"kilostv " . $id_producto};
                                            $canticajonesw = ${"canticajonesw" . $id_producto};
                                            $canticajonesredw = ${"canticajonesredw" . $id_producto};
                                            $pediporkilovw = ${"pediporkilovw" . $id_producto};
                                            $pediporkilovokw = ${"pediporkilovokw" . $id_producto};
                                            $kiloscob = ${"kiloscob" . $id_producto};
                                            $cajonenterow = ${"cajonenterow" . $id_producto};
                                            $cajaw = ${"cajaw" . $id_producto};




                                            $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date' and stock='1' and id_producto='$id_producto'");
                                            if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
                                                $kilost = $rowcarga["kilos"];
                                                $kilostv = $rowcarga["kilos"];
                                                $kilost = number_format($kilost, 2, '.', '');
                                            }



                                            //estraigo los kilos por el cual viene el cajon
                                            $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
                                            if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                                                $kilocajon = $rowprecioprod["kilo"];
                                            }

                                            //calculo cuantos cajones se piden
                                            $canticajonesw = $kilost / $kilocajon;

                                            $canticajonesredw = explode(".", $canticajonesw);

                                            $cajonenterow = $canticajonesredw[0];

                                            if ($cajonenterow == 0) {
                                                $cajonenterow = '';
                                                $elmas = '';
                                                $cajasver = '';
                                            } else {
                                                $elmas = "+";
                                                $cajasver = "Caj.";
                                            }

                                            $pediporkilow = $cajonenterow * $kilocajon;
                                            $pediporkilovw = $kilost - $pediporkilow;



                                            if ($pediporkilovw > 0) {
                                                $pediporkilovokw = $elmas . "&nbsp;" . $pediporkilovw . "kg.";
                                            } else {
                                                $pediporkilovokw = "";
                                            }
                                            //
                                            //cajas con foto
                                            $kiloscob = $pediporkilovokw;


                                            $bultos += $cajonenterow;
                                            $bultoskil += $pediporkilovw;

                                            if ($kilost == '0') {
                                                $kilosver = 'Sin Stock';
                                            } else {
                                                $kilosver = $kilost . 'Kg';
                                            }

                                            echo '<tr class="tr_linea">
                               
                                                            <td  class="celda_sin">' . $nombreprod . '<br>(Caja x ' . $kilocajon . 'Kg.)</td>
                                                            <td class="celda_sin">' . $cajasver . '' . $cajonenterow . '&nbsp;' . $kiloscob . '</td>
                                                           
                                                            
                                                            </tr>';
                                        }
                                    }



                                    //fin poner el producto 
                                }
                                echo '</table>'; 
                            }}


                            ?>




                            <!-- fin -->


                        </td>
                    </tr>
                    <tr class="tr_linea">
                        <td class="celda_sin">
                            <p style="text-align:left;font-size:12pt; font-weight: bold;">Bultos&nbsp;<?= $bultos ?> y <?= $bultoskil ?> Kilos</p>
                        </td>



                    </tr>
                </table><br><br><br>
                <p style="font-size: 6pt; text-align:center" class="tr_lineatop">.................................................................................<br>NOMBRE RESPONSABLE</p>

                *******************************************

            </div>
        </div>


    </div>


<script>
        window.print();




        // Esperar a que la impresión termine
        // Esperar 5 segundos antes de cerrar la ventana
        setTimeout(function() {
            location.href = 'producstock';
        }, 20000);
    </script>


</body>