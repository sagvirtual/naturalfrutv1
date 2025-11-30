<?php include('f54du60ig65.php');

/* $modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
 */

//update
$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);
$costo = $_POST["costo"];


$modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
$_SESSION["buscar"] = $_POST['buscar'];
//




$error = $_GET['error'];
$id = base64_decode($idcod);
$timean = date("His");

if (!empty($idw) && !empty($costo)) {
    $sqlprecioprod = "Update precioprod Set costo='$costo' Where id = '$idw'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<!-- Start Contentbar -->
<div class="contentbar">
    <style>
        tr:hover {
            background-color: #E7E6E6;
            cursor: pointer;
        }
        .contenidoOculto {
            display: none;
        }
    </style>

    <?php

    echo ' 
 <div class="row"> 
     <!-- Start col -->
     <div class="col-lg-12">
         <div class="card m-b-30">

             <div class="card-body">
                 <div class="table-responsive">

                     <table class="table table-borderless">
                         <thead>
                             <tr>
                                 <th style="vertical-align: middle;">Nombre Producto</th>
                                 <th style="text-align:center; vertical-align: middle;">Actualización</th>
                                 <th style="vertical-align: middle; text-align:center;">Precio</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #F9E79F; " class="contenidoOculto">Precio<br>Unitario</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #FEF9E7;" class="contenidoOculto">Descuento</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #F9E79F; " class="contenidoOculto">Precio<br>c/Desc.</th>
                                 <th style="text-align:center;vertical-align: middle; background-color: #FEF9E7;" class="contenidoOculto">IIBB<br>BS AS</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F9E79F; " class="contenidoOculto">IIBB<br>CABA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #FEF9E7;" class="contenidoOculto">PERC<br>IVA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F9E79F; " class="contenidoOculto">IVA</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #FEF9E7;" class="contenidoOculto">Precio<br>Bruto</th>
                                 <th style="text-align:center;vertical-align: middle;background-color: #F9E79F; " class="contenidoOculto">Desc.<br>Adicional</th>
                                 <th style="text-align:center; vertical-align: middle;background-color:#F3F3F3;" onclick="mostrarContenido(this);">Precio&nbsp;Un.<br>Final</th>
                                 <th style="vertical-align: middle;">Variación</th>
                                 <th style="text-align:center; background-color:#DAF7A6;">Precios<br><strong>MAYORISTAS</strong></th>
                                 <th style="text-align:center; background-color:#CFE9EC;">Precios<br><strong>ESPECIALES</strong></th>
                                 <th style="text-align:center; background-color:#FFC300;">Precios<br><strong>DISTRUBUIDORES</strong></th>
                                 <th>Acción</th>
                             </tr>
                         </thead>
                         <tbody>';
   // if (!empty($buscar) && $buscar != " ") {
        //buscadorgeneral
        $sqljoin = mysqli_query($rjdhfbpqj, "SELECT productos.id_marcas, productos.id as idproducto, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.id_proveedor,productos.detalle, productos.estado, marcas.empresa FROM productos INNER JOIN marcas 
    ON productos.id_marcas = marcas.id Where  productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' ORDER BY `productos`.`position` ASC");
   // }

    while ($rowproductos = mysqli_fetch_array($sqljoin)) {
        
    

        $idcategoria = $rowproductos["categoria"];
        $id_proveedor = $rowproductos["id_proveedor"];
        $gananciasper = $rowproductos["gananciasper"];
        $id = $rowproductos["idproducto"];
        $estado = $rowproductos["estado"];
        $idcodp = base64_encode($id);
        $id_marcas = $rowproductos["id_marcas"];
        $modo_producto = $rowproductos["modo_producto"];

        if ($modo_producto == "0") {
            $unidadver = "Caja";
        }
        if ($modo_producto == "1") {
            $unidadver = "Bolsa";
        }
        if ($modo_producto == "2") {
            $unidadver = "Kg.";
        }
        if ($modo_producto == "3") {
            $unidadver = "Pack";
        }

        if ($estado == '1') {
            $colorestado = 'background-color: #ffe6e6;';
        } else {
            $colorestado = '';
        }
        $idfila = 1 + $idfila;

        //me fijo el porcentaje ganancia provvedor
        $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
        if ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
            $porprovver = $rowproveedores["gananciaa"];
            $tipocomision = $rowproveedores["tipo"];
            if ($tipocomision == "0") {
                $tipov = "$";
            } else {
                $tipov = "%";
            }
            
        }
        //miro el precio anterior del producto

        $sqlpreciodant = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id'  and cerrado = '1' and confirmado = '1' ORDER BY `precioprod`.`fecha` DESC limit 1,1");
        if ($rowprecrodant = mysqli_fetch_array($sqlpreciodant)) {
            $costo_totalvie = $rowprecrodant["costo_total"];
            $precio_kiloavie = $rowprecrodant["precio_kiloa"];
            $precio_kilobvie = $rowprecrodant["precio_kilob"];
            $precio_kilocvie = $rowprecrodant["precio_kiloc"];
        } else {
            $nohayante = "1";
        }





        //nombre de la marca
        $sqlmarcasb = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas' ");
        if ($rowmarcasb = mysqli_fetch_array($sqlmarcasb)) {
            $marcaempre = $rowmarcasb["empresa"];
            if ($gananciasper == "0") {
                $texga = "dark";
                $tipo = $rowmarcasb["tipo"];
                $gananciaa = $rowmarcasb["gananciaa"];
                $gananciab = $rowmarcasb["gananciab"];
                $gananciac = $rowmarcasb["gananciac"];
            }
        }

        //aca saco el precio
        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$id'  and cerrado = '1' and confirmado = '1' ORDER BY `precioprod`.`fecha` DESC");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $id = $rowprecioprod["id"];
            $idcod = base64_encode($id);
            $id_producto = $rowprecioprod["id_producto"];
            $kilo = $rowprecioprod["kilo"];
            //$cproveedor = $rowprecioprod["cproveedor"];
            $costo = $rowprecioprod["costo"];

            $tipoprov = $rowprecioprod["tipoprov"];
            $cproveedor = $rowprecioprod["cproveedor"];

            //me fijo si esta la ganancia de porveedor personalizada
            if($cproveedor > 0 && $cproveedor!=$porprovver){
                $porprovver = $cproveedor;
                $tipocomision = $tipoprov;
                if ($tipocomision == "0") {
                    $tipov = "$";
                } else {
                    $tipov = "%";
                }
            }

            if ($tipocomision == "0") {
                $costo_total = $rowprecioprod["costo"] + $porprovver;
            }
            if ($tipocomision == "1") {
                $costo_total = $rowprecioprod["costo"] / 100 * $porprovver + $rowprecioprod["costo"];
            }


            if ($gananciasper == "1") {
                $texga = "danger";
                $tipo = $rowprecioprod["tipo"];
                $gananciaa = $rowprecioprod["ganancia_a"];
                $gananciab = $rowprecioprod["ganancia_b"];
                $gananciac = $rowprecioprod["ganancia_c"];
            }
            // $costoxcaja = $rowprecioprod["costoxcaja"];

            if ($tipo == "0") {
                $sibolo = "$";
                $precio_cajaar = $costo_total + $gananciaa;
                $precio_kiloa = number_format($precio_cajaar, 2, '.', '');
            } else {
                $sibolo = "%";
                $precio_kiloar =  $costo_total / 100 * $gananciaa + $costo_total;
                $precio_kiloa = number_format($precio_kiloar, 2, '.', '');
            }
            $precio_cajaar = $precio_kiloa * $kilo;
            $precio_cajaa = number_format($precio_cajaar, 2, '.', '');

            if ($tipo == "0") {
                $precio_kilob = $costo_total + $gananciab;
            } else {
                $precio_kilobr = $costo_total / 100 * $gananciab + $costo_total;
                $precio_kilob = number_format($precio_kilobr, 2, '.', '');
            }
            $precio_cajabr = $precio_kilob * $kilo;
            $precio_cajab = number_format($precio_cajabr, 2, '.', '');

            if ($tipo == "0") {
                $precio_kiloc = $costo_total + $gananciac;
            } else {
                $precio_kilocr = $costo_total / 100 * $gananciac + $costo_total;
                $precio_kiloc = number_format($precio_kilocr, 2, '.', '');
            }
            $precio_cajacr = $precio_kiloc * $kilo;
            $precio_cajac = number_format($precio_cajacr, 2, '.', '');



            $fechex = $rowprecioprod["fecha"];



            $fechexs = explode("-", $fechex);
            $fecheok = $fechexs[2] . "/" . $fechexs[1] . "/" . $fechexs[0];

            if ($fechex == $fechahoy) {
                $sticolr = 'style="color:green"';
            } else { {
                    $sticolr = 'style="color:red"';
                }
            }
        }
        //fin 
        if ($nohayante == "1") {
            //aca si no hay anterior
            $costo_totalvie = $costo_total;
            $precio_kiloavie = $precio_kiloa;
            $precio_kilobvie = $precio_kilob;
            $precio_kilocvie = $precio_kiloc;
        }


    ?>


        <script>

            document.getElementById('fechaactual<?= $idfila ?>').innerHTML = '<b <?= $sticolr ?>><?= $fecheok ?></b>';

            var costo_total = <?= $costo_total ?>;
            var precio_kiloa = <?= $precio_kiloa ?>;
            var precio_kiloc = <?= $precio_kiloc ?>;
            var precio_kilob = <?= $precio_kilob ?>;

            var precio_cajaa = <?= $precio_cajaa ?>;
            var precio_cajab = <?= $precio_cajab ?>;
            var precio_cajac = <?= $precio_cajac ?>;


            var costo_totalvie = <?= $costo_totalvie ?>;
            var precio_kiloavie = <?= $precio_kiloavie ?>;
            var precio_kilocvie = <?= $precio_kilocvie ?>;
            var precio_kilobvie = <?= $precio_kilobvie ?>;

            var variacostop = eval(costo_total) - eval(costo_totalvie);
            var variacostoporv = 100 * eval(costo_total) / eval(costo_totalvie);
            var variacostopor = variacostoporv - 100;

            /* variacion minorista */
            var variaka = eval(precio_kiloa) - eval(precio_kiloavie);
            var variaporav = 100 * eval(precio_kiloa) / eval(precio_kiloavie);
            var varkpora = eval(variaporav) - 100;

            document.getElementById('variaka<?= $idfila ?>').innerHTML = variaka.toFixed(0);
            document.getElementById('varkpora<?= $idfila ?>').innerHTML = varkpora.toFixed(0);
            if (variaka > 0) {
                document.getElementById('flechaa<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('flechaa<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-down"></i>';
            }
            /* fin minorista */


            /* variacion mayorista */
            var variakb = eval(precio_kilob) - eval(precio_kilobvie);
            var variaporbv = 100 * eval(precio_kilob) / eval(precio_kilobvie);
            var varkporb = eval(variaporbv) - 100;

            document.getElementById('variakb<?= $idfila ?>').innerHTML = variakb.toFixed(0);
            document.getElementById('varkporb<?= $idfila ?>').innerHTML = varkporb.toFixed(0);
            if (variakb > 0) {
                document.getElementById('flechab<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('flechab<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-down"></i>';
            }
            /* fin minorista */

            /* variacion distruibuidor */
            var variakc = eval(precio_kiloc) - eval(precio_kilocvie);
            var variaporcv = 100 * eval(precio_kiloc) / eval(precio_kilocvie);
            var varkporc = eval(variaporcv) - 100;

            document.getElementById('variakc<?= $idfila ?>').innerHTML = variakc.toFixed(0);
            document.getElementById('varkporc<?= $idfila ?>').innerHTML = varkporc.toFixed(0);
            if (variakc > 0) {
                document.getElementById('flechac<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('flechac<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-down"></i>';
            }
            /* fin minorista */




            if (variacostopor > 0) {
                document.getElementById('variacostop<?= $idfila ?>').innerHTML = variacostop.toFixed(0);


                document.getElementById('simblal<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('simblal<?= $idfila ?>').innerHTML = '';
                document.getElementById('variacostop<?= $idfila ?>').innerHTML = variacostop.toFixed(0);

            }

            precio_kiloa = Math.round(precio_kiloa);
            precio_kilob = Math.round(precio_kilob);
            precio_kiloc = Math.round(precio_kiloc);
            document.getElementById('costototal<?= $idfila ?>').innerHTML = costo_total.toLocaleString();
            document.getElementById('precio_kiloa<?= $idfila ?>').innerHTML = precio_kiloa.toLocaleString();
            document.getElementById('precio_kilob<?= $idfila ?>').innerHTML = precio_kilob.toLocaleString();
            document.getElementById('precio_kiloc<?= $idfila ?>').innerHTML = precio_kiloc.toLocaleString();

            document.getElementById('precio_cajaa<?= $idfila ?>').innerHTML = precio_cajaa.toLocaleString();
            document.getElementById('precio_cajab<?= $idfila ?>').innerHTML = precio_cajab.toLocaleString();
            document.getElementById('precio_cajac<?= $idfila ?>').innerHTML = precio_cajac.toLocaleString();

            document.getElementById('gananciaa<?= $idfila ?>').innerHTML = <?= $gananciaa ?>;
            document.getElementById('gananciab<?= $idfila ?>').innerHTML = <?= $gananciab ?>;
            document.getElementById('gananciac<?= $idfila ?>').innerHTML = <?= $gananciac ?>;


            document.getElementById('variacostopor<?= $idfila ?>').innerHTML = variacostopor.toFixed(0);
        </script>




    <?
        //update


        echo '       <script> window.onload =realizaProcesos' . $idfila . ';


        
            function realizaProcesos' . $idfila . '(jfndhom' . $idfila . ', costo' . $idfila . ', modobus, buscar){';
        /* saco los calculos */
        echo "
            var costo = costo" . $idfila . ";
            var tipo = " . $tipo . ";
            var ganancia_a = " . $gananciaa . ";
            var ganancia_b = " . $gananciab . ";
            var ganancia_c = " . $gananciac . ";
            var kilo = " . $kilo . ";
            var costototal = " . $porprovver . " +  eval(costo);
            
            /* precio x kilo */
            if (tipo == '0') {
            var precioporka = costototal + eval(ganancia_a);
            var precioporkb = costototal + eval(ganancia_b);
            var precioporkc = costototal + eval(ganancia_c);
            }
            if (tipo == '1') {
            var precioporka = eval(costototal) * eval(ganancia_a) / 100 + eval(costototal);
            var precioporkb = eval(costototal) * eval(ganancia_b) / 100 + eval(costototal);
            var precioporkc = eval(costototal) * eval(ganancia_c) / 100 + eval(costototal);
            }
            var costototal = costototal.toLocaleString();
            
            precioporka = Math.round(precioporka);
            var precioporka = precioporka.toLocaleString();
            precioporkb = Math.round(precioporkb);
            var precioporkb = precioporkb.toLocaleString();
            precioporkc = Math.round(precioporkc);
            var precioporkc = precioporkc.toLocaleString();

            /* precio x caja */

            var pcajaa = precioporka * kilo;
            var pcajab = precioporkb * kilo;
            var pcajac = precioporkc * kilo;
            var precio_cajaa = pcajaa.toFixed(0);
            var precio_cajab = pcajab.toFixed(0);
            var precio_cajac = pcajac.toFixed(0);


            document.getElementById('costototal" . $idfila . "').innerHTML = costototal;
            document.getElementById('precio_kiloa" . $idfila . "').innerHTML = precioporka;
            document.getElementById('precio_kilob" . $idfila . "').innerHTML = precioporkb;
            document.getElementById('precio_kiloc" . $idfila . "').innerHTML = precioporkc;
            document.getElementById('precio_cajaa" . $idfila . "').innerHTML = precio_cajaa;
            document.getElementById('precio_cajab" . $idfila . "').innerHTML = precio_cajab;
            document.getElementById('precio_cajac" . $idfila . "').innerHTML = precio_cajac;


            if(".$fechahoy."!=".$fechex."){
            if(".$costo."!=costo" . $idfila . "){
            document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:green> " . $fechahoyver . "</b>';
            }else{
                document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:red> " . $fecheok . "</b>';
            }
            }

            
            /* variacion del costo con el costo anterior */
            var costo_totalvie=" . $costo_totalvie . ";
            var precio_kiloavie=" . $precio_kiloavie . ";
            var precio_kilocvie=" . $precio_kilocvie . "; 
            var precio_kilobvie=" . $precio_kilobvie . ";   
            var variacostop=eval(costototal) - eval(costo_totalvie);
            var variacostoporv= 100 * eval(costototal) / eval(costo_totalvie);
            var variacostopor= eval(variacostoporv) - 100;            

            if(variacostopor > 0){
              document.getElementById('simblal" . $idfila . "').innerHTML ='<i class=";
        echo '"feather icon-arrow-up">';
        echo "</i>';}
               
            document.getElementById('variacostop" . $idfila . "').innerHTML = variacostop.toFixed(0);
            document.getElementById('variacostopor" . $idfila . "').innerHTML =variacostopor.toFixed(0); 
            /* fin variacion del costo con el costo anterior */

            /* variacion minorista */
            var variaka=eval(precioporka) - eval(precio_kiloavie);
            var variaporav= eval( precioporka) * 100 / eval(precio_kiloavie);
            var varkpora= eval(variaporav) - 100;

            document.getElementById('variaka" . $idfila . "').innerHTML = variaka.toFixed(0);
            document.getElementById('varkpora" . $idfila . "').innerHTML = varkpora.toFixed(0);
            if( variaka > 0){
                document.getElementById('flechaa" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-up"';
        echo "  ></i>';
            }
            else{document.getElementById('flechaa" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-down"';
        echo " ></i>';}
            /* fin minorista */


            /* variacion mayorista */
            var variakb=eval(precioporkb) - eval(precio_kilobvie);
            var variaporbv= eval( precioporkb) * 100 / eval(precio_kilobvie);
            var varkporb= eval(variaporbv) - 100;

            document.getElementById('variakb" . $idfila . "').innerHTML = variakb.toFixed(0);
            document.getElementById('varkporb" . $idfila . "').innerHTML = varkporb.toFixed(0);
            if( variakb > 0){
                document.getElementById('flechab" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-up"';
        echo "  ></i>';
            }
            else{document.getElementById('flechab" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-down"';
        echo " ></i>';}
            /* fin mayorista */

            /* variacion distribuidor */
            var variakc=eval(precioporkc) - eval(precio_kilocvie);
            var variaporcv= eval( precioporkc) * 100 / eval(precio_kilocvie);
            var varkporc= eval(variaporcv) - 100;

            document.getElementById('variakc" . $idfila . "').innerHTML = variakc.toFixed(0);
            document.getElementById('varkporc" . $idfila . "').innerHTML = varkporc.toFixed(0);
            if( variakc > 0){
                document.getElementById('flechac" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-up"';
        echo "  ></i>';
            }
            else{document.getElementById('flechac" . $idfila . "').innerHTML ='<i class=";
        echo ' "feather icon-arrow-down"';
        echo " ></i>';}
            /* fin distribuidor */
 ";

        /* fin de calculos */

        echo '
                                                   var parametros = {
                                                           "jfndhom" : jfndhom' . $idfila . ',
                                                        "costo" : costo' . $idfila . ',
                                                        "modobus" : modobus,
                                                        "buscar" : buscar
                                                   };
                                                   $.ajax({
                                                           data:  parametros,
                                                           url:';
        echo "'";
        echo 'lproductos/updateproducto.php';
        echo "'";
        echo ',
                                                           type:';
        echo "'";
        echo 'post';
        echo "'";
        echo ',
                                                           beforeSend: function () {
                                                                   $("#resultadocuenta").html(';
        echo "'";
        echo '<img src="../assets/images/loader.gif">';
        echo "'";
        echo ');
                                                           },
                                                           success:  function (response) {
                                                                   $("#resultadocuenta").html(response);
                                                           }




                                                   });return;
                                           }
                                           
                                           </script>';


        //fin update 
        echo '<tr scope="row"> 
        
              
               <td style="color: black;' . $colorestado . '"><strong>' . $rowproductos["nombre"] . '</strong>
               <br>
               <h9 style="color:grey;font-size:8pt;">Marca: ' . $marcaempre . '</h9>
               </td>
               <td style="text-align:center;"> <b id="fechaactual' . $idfila . '"></b></td>
              
               <td align="center"><div style="position:relative; top:-11px; text-align: center;"><p style="font-size:8pt; position:relative; top:10px;">

               
               
               <strong>'.$unidadver.'</strong></p>
             <input name="jfndhom' . $idfila . '" type="hidden" id="jfndhom' . $idfila . '" value="' . $idcodp . '">
             <input name="modobus" type="hidden" id="modobus' . $idfila . '" value="' . $_SESSION["modobus"] . '">
            <input name="buscar" type="hidden" id="buscar' . $idfila . '" value="' . $_SESSION["buscar"] . '">
               <input type="text"  style="width: 100px; text-align: center;" name="costo' . $idfila . '" id="costo' . $idfila . '" value="' . $rowprecioprod["costo"] . '"  onkeyup="realizaProcesos' . $idfila . '';
        $idfilaback = $idfila - 1;
        $idfilaup = $idfila + 1;
        echo "($('#jfndhom" . $idfila . "').val(),$('#costo" . $idfila . "').val(),$('#modobus" . $idfila . "').val(),$('#buscar" . $idfila . "').val());return false;";
        echo '" style="width:80px" ';
        echo ' onkeypress="nextFocus(';
        echo "'costo" . $idfila . "', 'costo" . $idfilaup . "'";
        echo ')"  onclick="select()"  >';

   
$aster="'";

        echo '   <div> </td>

 
               <td  style="text-align:center; background-color: #F9E79F; " class="contenidoOculto" onclick="mostrarContenido(this)">$0.00</td>
               <td  style="text-align:center; background-color: #FEF9E7;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               <td style="text-align:center; background-color: #F9E79F;" class="contenidoOculto"  onclick="mostrarContenido(this)">$0.00</td>
               <td style="text-align:center; background-color: #FEF9E7;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               <td style="text-align:center; background-color: #F9E79F;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               <td style="text-align:center; background-color: #FEF9E7;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               <td style="text-align:center; background-color: #F9E79F;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               <td style="text-align:center; background-color: #FEF9E7;" class="contenidoOculto"  onclick="mostrarContenido(this)">$0.00</td>
               <td style="text-align:center; background-color: #F9E79F;" class="contenidoOculto"  onclick="mostrarContenido(this)">%&nbsp;0.00</td>
               




               <td style="background-color:#F8F9F9; text-align: center;" onclick="mostrarContenido(this)"><strong>$</strong>
               <b style="color:black; "  id="costototal' . $idfila . '"><b></td>

                <td ><i id="simblal' . $idfila . '"></i>$<b id="variacostop' . $idfila . '"></b><br> %<b id="variacostopor' . $idfila . '"></b></td> 
               

                <td style="text-align:center; background-color:#ECFCEE;" id="listasa"><b style="color:black;">
                   <div onclick="mostrarOcultarElemento' . $idfila . '()">                        
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciaa' . $idfila . '"></b></span>

      

                                                                           
<div class="container">
<div class="row text-center">
<div class="col-4 text-center" style="text-align:center;">
<span class="badge badge-pill badge-' . $texga . '">Por 5 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-success"> <b style="color:black;">$<b id="precio_kiloa' . $idfila . '"></b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 10 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-success"> <b style="color:black;">$2,020</b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 20 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-success"> <b style="color:black;">$1,800</b></span></h2>
</div>

</div>
</div>

                
                <div  id="miSpan' . $idfila . '" style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkpora' . $idfila . '"></b> 
                <i id="flechaa' . $idfila . '"></i><b id="variaka' . $idfila . '"></b>$</span>
                <br>
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">
                <span class="badge badge-pill badge-light">Caja ' . $rowprecioprod["kilo"] . 'Kg. $<b id="precio_cajaa' . $idfila . '"></b></span>
                </div></div>
                </td>





                <td style="text-align:center;background-color:#ECF9FC;">
                <div onclick="mostrarOcultarElementob' . $idfila . '()">                          
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciab' . $idfila . '"></b></span>
      


                                
<div class="container">
<div class="row">
<div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 5 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-info"> <b style="color:black;">$<b id="precio_kilob' . $idfila . '"></b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 10 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-info"> <b style="color:black;">$2,020</b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 20 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-info"> <b style="color:black;">$1,800</b></span></h2>
</div>

</div>
</div>



               
                <div  id="miSpanb' . $idfila . '" style="display:none;">
                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkporb' . $idfila . '"></b> 
                <i id="flechab' . $idfila . '"></i>
                <b id="variakb' . $idfila . '"></b>$</span>
                <br>
              
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">
                
                
                <span class="badge badge-pill badge-light">Caja ' . $rowprecioprod["kilo"] . 'Kg. $<b id="precio_cajab' . $idfila . '"></b></span>
                </div> </div>
                </td>




                <td style="text-align:center;background-color:#FFEED3;">
                <div onclick="mostrarOcultarElementoc' . $idfila . '()">       
                <span class="badge badge-pill badge-' . $texga . '" style="display:none;">Gan. x  Kg. ' . $sibolo . '<b id="gananciac' . $idfila . '"></b></span>
             

                
<div class="container">
<div class="row">
<div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 5 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-warning"> <b style="color:black;">$<b id="precio_kiloc' . $idfila . '"></b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 10 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-warning"> <b style="color:black;">$2,020</b></span></h2>
</div><div class="col-4">
<span class="badge badge-pill badge-' . $texga . '">Por 20 Cajas<br>de 6,8 Kg.</span><br>
<h2> <span class="badge badge-warning"> <b style="color:black;">$1,800</b></span></h2>
</div>

</div>
</div>

               
                <div  id="miSpanc' . $idfila . '" style="display:none;">

                <span class="badge badge-pill badge-primary" title="Diferencia">%<b id="varkporc' . $idfila . '"></b> 
                <i id="flechac' . $idfila . '"></i><b id="variakc' . $idfila . '"></b>$</span>
              
               
                <input type="text" class="badge badge-pill" name="inputNumber" id="inputNumber" value="20">
               
                <br>
                <span class="badge badge-pill badge-light">Caja ' . $rowprecioprod["kilo"] . 'Kg. $<b id="precio_cajac' . $idfila . '"></b></span>
                </div> </div>
                </td>
               
                                 
               
                <td><div class="button-list">

                <a  data-toggle="modal" data-target="#exampleStandardModal' . $rowprecioprod["id"] . '"" target="_parent" class="btn btn-success-rgba" title="HISTORIAL">H</a>

                <a href="/lproductos/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $rowprecioprod["id_marcas"] . '" target="_parent" class="btn btn-success-rgba" title="Editar Productos"><i class="ri-pencil-line"></i></a>
                <a href="javascript:eliminar(' . "'/lproductos/mlkdths?" . 'juhytm=' . $idcodp . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>
                </div>
                </td>
               
            </tr>';


        //modal
        echo '
                                                
        <div class="modal fade" id="exampleStandardModal' . $rowprecioprod["id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleStandardModalLabel">Historial ' . $rowproductos["nombre"] . ' </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                            <div class="row">
                            <div class="col-lg-5">

                             <img src="/lproductos/foto' . $rowproductos["idproducto"] . '"  style="width:200px; text-align: center;">
                             </div>
                             <div class="col-lg-7">';
        $idproductohis = $rowproductos["idproducto"];
        $sqlprecioprodr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproductohis' and cerrado = '1' and confirmado = '1'  ORDER BY `precioprod`.`fecha` DESC limit 1,24");
        while ($rowprecioprodr = mysqli_fetch_array($sqlprecioprodr)) {
            $fechay = $rowprecioprodr["fecha"];
            $fechays = explode("-", $fechay);
            $fechaysw = $fechays[2] . "/" . $fechays[1] . "/" . $fechays[0];
            echo '<br> <p style="color:black;"> FECHA:  ' . $fechaysw . ' <br> COSTO X KG.: $' . $rowprecioprodr["costo_total"] . ' <p> Precio Uni. Mayorista: $' . $rowprecioprodr["precio_kiloa"] . ' <br> Precio x Kg. Mayorista: $' . $rowprecioprodr["precio_kilob"] . ' <br> Precio x Kg. Distribuidor: $' . $rowprecioprodr["precio_kiloc"] . ' <hr>
                             
                             ';
        }





        echo ' </div>
                             </div>
                             </div>
                    
        
                </div>
            </div>
        </div>
        
       
        ';
        

        echo " <script>
        function mostrarOcultarElemento" . $idfila . "() {
          const miSpan" . $idfila . " = document.getElementById('miSpan" . $idfila . "');
      
          const isVisible" . $idfila . " = miSpan" . $idfila . ".style.display !== 'none';
      
          if (isVisible" . $idfila . ") {
            miSpan" . $idfila . ".style.display = 'none'; 
          } else {
            miSpan" . $idfila . ".style.display = 'inline'; 
          }
        }        
        
        function mostrarOcultarElementob" . $idfila . "() {
          const miSpanb" . $idfila . " = document.getElementById('miSpanb" . $idfila . "');
      
          const isVisible" . $idfila . " = miSpanb" . $idfila . ".style.display !== 'none';
      
          if (isVisible" . $idfila . ") {
            miSpanb" . $idfila . ".style.display = 'none'; 
          } else {
            miSpanb" . $idfila . ".style.display = 'inline'; 
          }
        }

                
        function mostrarOcultarElementoc" . $idfila . "() {
            const miSpanc" . $idfila . " = document.getElementById('miSpanc" . $idfila . "');
        
            const isVisible" . $idfila . " = miSpanc" . $idfila . ".style.display !== 'none';
        
            if (isVisible" . $idfila . ") {
              miSpanc" . $idfila . ".style.display = 'none'; 
            } else {
              miSpanc" . $idfila . ".style.display = 'inline'; 
            }
          }
        </script>
        ";
    } //fin producto




    ?>





    </table>


    <script>

function nextFocus(inputF, inputS) {
  document.getElementById(inputF).addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
      document.getElementById(inputS).select();
    }
  });
}
</script>



</div>
<script>
    let contenidoVisible = false;

    function mostrarContenido() {
        const elementosOcultos = document.querySelectorAll('.contenidoOculto');

        if (contenidoVisible) {
            elementosOcultos.forEach(elemento => {
                elemento.style.display = 'none';
            });
        } else {
            elementosOcultos.forEach(elemento => {
                elemento.style.display = 'table-cell';
            });
        }

        contenidoVisible = !contenidoVisible;
    }

    let contenidoVisibleb = false;



</script>