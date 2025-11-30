<? include('../f54du60ig65.php');
$idcod = $_GET['jfndhom'];


/* parametros de color y tecto cabezal */
$idlista = base64_decode($idcod);
$sqleditlista = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where id = '$idlista'");
if ($roweditlista = mysqli_fetch_array($sqleditlista)) {
    $fechalista = $roweditlista["fecha"];
    $tipolista = $roweditlista["tipolista"];
    $comminima = $roweditlista["comminima"];
    $commmenor = $roweditlista["commmenor"];
    $noseac = $roweditlista["noseac"];
    $color1 = $roweditlista["color1"];
    $color2 = $roweditlista["color2"];
    $color3 = $roweditlista["color3"];
    $color4 = $roweditlista["color4"];
    $color5 = $roweditlista["color5"];
    $color6 = $roweditlista["color6"];
    $color7 = $roweditlista["color7"];
    $color8 = $roweditlista["color8"];
    $foto1 = $roweditlista["foto1"];

    if ($tipolista == '0') {
        $nbombrel = 'Mayorista';
    }
    if ($tipolista == '1') {
        $nbombrel = 'Especiales';
    }
}

if (empty($foto1)) {
    $idlistafo = 'logo.png';
} else {
    $idlistafo = $idlista;
}

if (empty($color1)) {
    $color1 = '#FFBB34';
    $sqlcolor1 = "Update editlista Set color1='$color1' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor1) or die(mysqli_error($rjdhfbpqj));
}
if (empty($color2)) {
    $color2 = '#000000';
    $sqlcolor2 = "Update editlista Set color2='$color2' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor2) or die(mysqli_error($rjdhfbpqj));
}

if (empty($color3)) {
    $color3 = '#FFFFFF';
    $sqlcolor3 = "Update editlista Set color3='$color3' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor3) or die(mysqli_error($rjdhfbpqj));
}

if (empty($color4)) {
    $color4 = '#6C2500';

    $sqlcolor4 = "Update editlista Set color4='$color4' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor4) or die(mysqli_error($rjdhfbpqj));
}
if (empty($color5)) {
    $color5 = '#FFFF00';
    $sqlcolor5 = "Update editlista Set color5='$color5' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor5) or die(mysqli_error($rjdhfbpqj));
}

if (empty($color6)) {
    $color6 = '#FFFFFF';
    $sqlcolor6 = "Update editlista Set color6='$color6' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor6) or die(mysqli_error($rjdhfbpqj));
}

if (empty($color7)) {
    $color7 = '#AD9162';
    $sqlcolor7 = "Update editlista Set color7='$color7' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor7) or die(mysqli_error($rjdhfbpqj));
}
if (empty($color8)) {
    $color8 = '#FFFFFF';
    $sqlcolor8 = "Update editlista Set color8='$color8' Where id = '$idlista'";
    mysqli_query($rjdhfbpqj, $sqlcolor8) or die(mysqli_error($rjdhfbpqj));
}
/* si no hay texto tomoel anterior */
if (empty($noseac)) {
    $sqleditliold = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and id < '$idlista' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisold = mysqli_fetch_array($sqleditliold)) {
        $noseac = $roweditlisold["noseac"];

        $sqledittext = "Update editlista Set noseac='$noseac' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittext) or die(mysqli_error($rjdhfbpqj));
    }else{$noseac = 'NO SE ACEPTAN AGREGADOS';}
}

if (empty($comminima)) {
    $sqleditlioldc = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and id < '$idlista' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldc = mysqli_fetch_array($sqleditlioldc)) {
        $comminima = $roweditlisoldc["comminima"];

        $sqledittextc = "Update editlista Set comminima='$comminima' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittextc) or die(mysqli_error($rjdhfbpqj));
    }else{$comminima = '$120000';}
}
if (empty($commmenor)) {
    $sqleditlioldd = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and id < '$idlista' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldd = mysqli_fetch_array($sqleditlioldd)) {
        $commmenor = $roweditlisoldd["commmenor"];


        $sqledittextd = "Update editlista Set commmenor='$commmenor' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittextd) or die(mysqli_error($rjdhfbpqj));
    }else{$commmenor = '$12000';}
}

include 'scriptlis.php';

?>
<style>
    body {
        zoom: 90%;
        margin: 0;
        padding: 0;
        font-family: cambria;
    }

    table {
        line-height: 1;
        font-size: 12pt;
    }
</style>
<!-- muestra1 cuadro con foto programado -->
<? $cuadrofoto =

    '<table border="0" cellPadding="0" cellSpacing="0" style="width: 200px;">
<tr>
    <td rowspan="2" border: none; vertical-align: bottom;>
    <img src="/fonts/fotoborrar.jpg" style="height: 140px; border: none;">

    </td>
    <td style="text-align:center;  ">
    <img src="../listadeprecio/envases02.png" style="height: 70px; border: none;">
    </td>
</tr>
<tr>

    <td style="border: none; text-align:center; ">
    <img src="../listadeprecio/consultar.png" style="height: 70px; border: none;"> </td>
</tr>
</table>'


    /* '
        <table border="0" cellPadding="0" cellSpacing="0" style="width: 200px;">
    <tr>
        <td rowspan="2" border: none; vertical-align: bottom;>
        <img src="/fonts/fotoborrar.jpg" style="height: 70px; border: none;">

        </td>
        <td style="text-align:center; font-size: 9pt; background-color: red; color:white; order: none; padding-left: 3px; padding-right: 3px; ">Sólo se vende x Caja Cerrada de 
        5&nbsp;Kg</td>
    </tr>
    <tr>

        <td style="border: none; text-align:center;font-size: 8pt; background-color: yellow; color:#000099; padding-left: 3px; padding-right: 3px; ">Por Cantidades Mayores Consultar Precios </td>
    </tr>
</table>' */; ?>
<!-- fin cuadro programado -->
<!-- muestra cuadro cantidades xxx-->
<? $cuadrofotoso = '

        <div style="text-align:center; ">
        <img src="../listadeprecio/consultar.png" style="height: 50px; border: none;"></div>
'; ?>
<!-- fin cuadro programado -->
<!-- muestra cuadro solo se vende por -->
<? $cuadrosoloseven = '

<div style="text-align:center; ">
<img src="../listadeprecio/envases02.png" style="height: 50px; border: none;"></div>
'; ?>
<!-- fin cuadro programado -->




<!-- muestra1 cuadro con foto solaprogramado 100 ALTURA -->
<? $cuadrofotosolaH = '
        <table border="0" cellPadding="0" cellSpacing="0" style=" width: 230px;">
    <tr>
        <td border: none;vertical-align: bottom; >
        <img src="/fonts/fotoborrar.jpg" style="height: 97px; width: 200px; border: none;">

        </td>
    </tr>
   
</table>'; ?>
<!-- fin cuadro programado -->
<!-- muestra1 cuadro con foto solaprogramado -->
<? $cuadrofotosola = '
        <table border="0" cellPadding="0" cellSpacing="0" style="width: 230px;">
    <tr>
        <td border: none;vertical-align: bottom; >
        <img src="/fonts/fotoborrar.jpg" style="height: 70px; width: 200px; border: none;">

        </td>
    </tr>
   
</table>'; ?>
<!-- fin cuadro programado -->

<!-- texttocosecha -->
<? $textcosecha = '
        <br><font style="color:green; font-size: 16pt;">Cosecha 2024</font>'; ?>
<!-- fin cuadro programado -->


<!-- muestra1 cuadro sin foto programado -->
<? $cuadrosinfoto = '
        <table border="0" cellPadding="0" cellSpacing="0" style="width: 130px;">
    <tr>
      
        <td style="text-align:center; ">
        <img src="../listadeprecio/envases03.png" style="height: 100px; border: none;">
        </td>
   

        <td style="border: none; text-align:center;">
        <img src="../listadeprecio/consultar.png" style="height: 100px; border: none;"></td>
    </tr>
</table>'; ?>
<!-- fin cuadro programado -->

<!-- muestra1b cuadro sin foto programado -->
<? $cuadrosinfotob = '
        <table border="0" cellPadding="0" cellSpacing="0" style="width: 110px;">
    <tr>
      
        <td style="text-align:center; ">
        <img src="../listadeprecio/suermromo.png" style="height: 60px; border: none;">
        </td>
    </tr>
    <tr>

        <td style="border: none; text-align:center;">
        <img src="../listadeprecio/consultar.png" style="height: 80px; border: none;">
        </td>
    </tr>
</table>'; ?>
<?

$pu1 = '
<img src="../listadeprecio/calidad.png" style="height: 60px; border: none;float: left; margin: 0px 0 0 -110px">';


$pu2 = '
<img src="../listadeprecio/descuentos.png" style="height: 100px; border: none;margin: 0px -60 -30 0px"><br>';


$pu3 = '
<img src="../listadeprecio/envases01.png" style="height: 60px; border: none; float: left; margin: 0px 0 0 -110px">';



$pu4 = /* '
<img src="../listadeprecio/fraccionx500.png" style="height: 60px; border: none; float: left; margin: 0px 0 0 -110px;
top: 200px">'; */
    '
<img src="../listadeprecio/fraccionx500.png" style="height: 60px; border: none;position:absolute; left: 93px; top: 90px;">';

$oferta = /* '
<img src="../listadeprecio/suermromo.png" style="height: 80px; border: none; float: left; margin: 0px 0 0 -110px;
top: 200px">'; */
    '

<img src="../listadeprecio/suermromo.png" style="height: 80px; border: none; position:absolute; left: 93px; top: 70px;">




';
?>
<!-- contenedor -->

<body>


    <table cellPadding="0" cellSpacing="0" style=" width: 100%;  background-color: grey; text-align:center; margin: 0; padding: 0; ">
        <tr>
            <td align="center">
                <div style="background-color: #107816;  font-family: Arial; font-size: 11pt; color: white; padding:1px;">
                    Sistema de Edición de Lista de Precios Versión Versión 1.0.0
                </div>
                <table style=" width: 100%;  height: 50px; background-color: #353535;">
                    <tr>
                        <td><a href="/listasdeprecios">&nbsp;<img src="/listadeprecio/atras.png"></a></td>
                        <td>
                            <p style="font-family: Arial; font-size: 14pt; color:white; padding-left:20px;"><img src="/listadeprecio/iconlista.png" style="height: 20px;"> Lista de Precios <?= $nbombrel ?>
                                <?php

                                echo '' . date('d/m/Y', strtotime($fechalista)) . '';

                                ?></p>
                        </td>

                        <td>
                        <td>
                            <img src="/listadeprecio/despdf.png" style="height: 40px;">

                        </td>

                        <!-- 
            <div style=" width: 100%;  height: 50px; background-color: #353535; position:relative; top:0px; font-size: 12pt; color:white; margin: 0;">
              <p style="font-family: Arial; font-size: 17pt; position:relative; left: -800px;top:14px; "> <img src="/listadeprecio/iconlista.png" style="height: 20px;"> Lista de Precios Mayoristas 16 02 2024</p>
              <p style="font-family: Arial; font-size: 12pt; position:ansolute; top:-35px; left: 800px; "> 
              <img src="/listadeprecio/despdf.png" style="height: 40px;">
            
            </p>
            </div> -->


            </td>
        </tr>
    </table>






    <table style=" width: 233mm; height: 1500px; background-color: white; text-align:center;  ">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <!-- fin cuadro programado -->

                <!-- cabezal 1-->
                <table id="colorCell" cellPadding="0" cellSpacing="0" style="background-color: <?= $color1 ?>; width: 220mm; border: 0.5mm solid black; border-bottom: none; font-size: 12pt; ">

                    <tr>

                        <td style="text-align:center; font-size: 10pt;padding: 5px;cursor:pointer;" id="colorpicker" title="Cambiar color de Fondo">
                            <!-- <input type="text" id="colorpicker" /> -->


                            <input type="hidden" id="hexInput" readonly />
                            <div id="color1"></div>
                            <input type="hidden" id="hexInputTer" readonly />
                            <font style="color:<?= $color2 ?>;cursor:pointer;" id="colorpickerTer" title="Cambiar color de texto">Precios</font>
                            <font style="color:red;">Sin IVA </font>
                            <font style="color:<?= $color2 ?>;" id="colorpickerTera">Incluído y Sujetos a Modificación Sin Previo Aviso. </font>
                            <font style="color:red;">Rojo </font>
                            <font style="color:<?= $color2 ?>;" id="colorpickerTerb">(Aumentos)</font>
                            <font style="color:green;">Verde </font>
                            <font style="color:<?= $color2 ?>;" id="colorpickerTerc">(Baja de Precios)</font>
                        </td>
                        <td style="text-align:center; padding:3px;" onclick="convertirfechalis()">
                            <input type="hidden" id="hexInputFE" readonly />
                            <a id="colorpickerFE"><img src="color.png" title="Cambiar color de la Fecha" style=" cursor:pointer;"></a>
                            <font style="color:<?= $color3 ?>; " id="fechalis"> &nbsp;&nbsp; <?php

                                                                                            echo '' . date('d/m/Y', strtotime($fechalista)) . '';

                                                                                            ?> &nbsp;</font>



                        </td>

                    </tr>
                </table>
                <!-- cabezal 2-->
                <table style="background-color: <?= $color4 ?>; width: 220mm;  border: 0.5mm solid black; border-bottom: none;     font-size: 12pt; " id="colorCellB">

                    <tr>

                        <td style="text-align:center; font-size: 14pt; cursor:pointer;" id="colorpickerB" title="Cambiar color de Fondo">
                            <input type="hidden" id="hexInputB" readonly />
                            <input type="hidden" id="hexInputTB" readonly />
                            <input type="hidden" id="hexInputTC" readonly />
                            <font style="color:<?= $color5 ?>;" id="colorpickerTB" title="Cambiar color de Texto ">COMPRA MÍNIMA</font>
                            <a id="colorpickerTC"><img src="color.png" title="Cambiar color de Precios Compra Minima y Compra Menores" style=" cursor:pointer;"> </a>
                            <font style="color:<?= $color6 ?>;" id="commin" onclick="convertircommin()"><?= $comminima ?></font>
                            <font style="color:<?= $color5 ?>;" id="colorpickerTBa"> Sin Costo de Envío - Compras Menores </font>
                            <font style="color:<?= $color6 ?>;" id="comenv" onclick="convertircomenv()"><?= $commmenor ?> </font>
                            <font style="color:<?= $color5 ?>;" id="colorpickerTBb">Cargo de Envío</font>
                    </tr>
                </table>
                <!-- cabezal 3-->
                <table cellPadding="0" cellSpacing="0" style="background-color: <?= $color7 ?>; width: 220mm;  border: 0.5mm solid black; font-size: 12pt;cursor:pointer;" id="colorCellC">

                    <tr>
                        <td style="text-align:center; padding: 2px; padding-left: 10px;" id="colorpickerC" title="Cambiar color de Fondo">

                            <form enctype="multipart/form-data" id="form">
                                <span id="muestroaca"> </span>
                                <input type="file" id="myfile" name="file" style="display: none;" />

                            </form>
                            <a onclick="document.getElementById('myfile').click();"> <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30"></z>

                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                        <input type="hidden" id="hexInputC" readonly />
                        <input type="hidden" id="hexInputTA" readonly />
                        <td style="text-align:center; font-size: 24pt " onclick="convertirEnInput()">
                            <a id="colorpickerTA"><img src="color.png" title="Cambiar color de Texto" style=" cursor:pointer;"></a>
                            <font style="color:<?= $color8 ?>;" id="noseacep"><?=$noseac?></font>

                        <td style="text-align:center; padding: 2px; padding-right: 10px;">
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30"> &nbsp;&nbsp; &nbsp;&nbsp;
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                    </tr>
                </table>
                <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------- -->



                <!-- muestra1 varian A-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;position: relative;">
                                <tr>
                                    <td rowspan="3" style="background-color: #FF66FF; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 150px; width: 200px; border: none;">
                                        <?= $oferta ?>
                                    </td>

                                    <td style="background-color: #FF66FF; text-align:right;  border: none; font-size: 20pt; padding: 3px; padding-right: 10px; ">
                                        <font style="color:#000000;" onclick="mostrarInputc()">Chips de Bananas</font>
                                        <?= $textcosecha ?>

                                        <div class="input-containerc" style="display: none;   border: 20px solid; position: fixed; top:300px;background-color: #ffffff; left:0px; z-index:999; ">
    <!-- costos -->

    <div>
      <table style="background-color: #ffffff; border: 1px solid;">
        <thead>
          <tr style="background-color: #EBEDEF;">

            <th style="width:100px; background-color: #F8F9F9;border: 1px solid;">VENCIMIENTO<br>PRODUCTO
            </th>

            <th style="width:60px; background-color: #F8F9F9;border: 1px solid;">AGREGAR<br>STOCK
            </th>
            <th style="width:100px; background-color: #C8C8C8;border: 1px solid;">PRECIO<br>POR
              <hu id="useleccionb"> CAJA</hu>
            </th>
            <th style="width:100px;border: 1px solid;">PRECIO<br>POR&nbsp;<lrt id="seleccionb">Uni.</lrt>
            </th>
            <th style="width:60px;border: 1px solid;">
              <pa style="position: relative; top:-8px">DESC.</pa>
            </th>
            <th style="width:100px;border: 1px solid;">PRECIO<br>C/DESC.</th>
            <th style="width:60px;border: 1px solid;">IIBB<br>BS&nbsp;AS</th>
            <th style="width:60px;border: 1px solid;">IIBB<br>CABA</th>
            <th style="width:60px;border: 1px solid;">PERC<br>IVA</th>
            <th style="width:60px;border: 1px solid;">
              <pa style="position: relative; top:-8px">IVA</pa>
            </th>
            <th style="width:100px;border: 1px solid;">PRECIO<br>BRUTO</th>
            <th style="width:60px;border: 1px solid;">DESC.<br>ADICIONAL</th>
            <th style="background-color: #C8C8C8;border: 1px solid;">PRECIO<br>FINAL&nbsp;X&nbsp;<ltr for="inputEmail4" id="seleccionc">Uni. </ltr>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <th style=" border: 1px solid;">Fecha</th>
            <th style=" border: 1px solid;">c/<hu id="useleccionbB">Caja</hu>
            </th>
            <th style=" border: 1px solid;">$</th>
            <th style=" border: 1px solid;">$</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">$</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">$</th>
            <th style=" border: 1px solid;">%</th>
            <th style=" border: 1px solid;">$</th>

          </tr>
          <tr style=" border: 1px solid;">

            <td style=" border: 1px solid; text-align:center;">
              <!-- AGREGAR vencimiento -->

              2034-12-23


            </td>
            <td style=" border: 1px solid; text-align:center;">
              <!-- AGREGAR STOCK -->
              7


            </td>
            <td style=" border: 1px solid; text-align:center;">
              <!-- precio x caja -->
              2525

            </td>
            <td style=" border: 1px solid; text-align:center;">
              <!-- PRECIO UNITARIO -->
              <strong>
                505
              </strong>

            </td>
            <td style=" border: 1px solid; text-align:center;">

              <!-- decuento -->
              0
            </td>
            <td style=" border: 1px solid; text-align:center;">

              <!-- precio con descuento -->

              <strong>
                505
              </strong>
            </td>
            <td style=" border: 1px solid; text-align:center;">
              <!-- iibb_bsas -->
              2

            </td>
            <td style=" border: 1px solid; text-align:center;">

              0


            </td>
            <td style=" border: 1px solid; text-align:center;">
              0

            </td>
            <td style=" border: 1px solid; text-align:center;">
              10.5
            </td>
            <td style=" border: 1px solid; text-align:center;">

              <strong>
                561
              </strong>

            </td>
            <td style=" border: 1px solid; text-align:center;">

              <!-- descuentos adicionales -->
              0
            </td>
            <td style="border: 1px solid; text-align:center; background-color: yellow;">
              <strong>
                561
              </strong>
            </td>

          </tr>
        </tbody>
      </table>

    </div>
    <!-- End col -->

  </div>
                                    </td>
                                    <td style="width: 110px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #FF66FF; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;"  > 
                                    <div class="input-container" style="display: none;">
                                    <p style="font-size: 11;">%<input type="text"  placeholder="Introduce el nuevo porcentaje" style="width: 50px;font-size: 14;" onclick="select()"  value="13"></p>
                                    </div>
                                    <div class="precio" onclick="mostrarInput()">$ 5.349</div>
                                </td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;" >$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FF66FF; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">2</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">
                                    
                                    <div class="input-containerb" style="display: none;">
                                    <p style="font-size: 11;">%<input type="text" placeholder="Introduce el nuevo porcentaje" style="width: 50px;font-size: 14;" onclick="select()"  value="16"></p>
</div>
                                    <div class="precio" onclick="mostrarInputb()">$ 5.300</div>
                                </td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra2 varian B sin nueva campaña-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="4" style="background-color: #F2DCDB; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 135px; width: 200px; border: none;">
                                    </td>

                                    <td rowspan="2" style="background-color: #F2DCDB; text-align:right; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#000000;">Chips de Bananas</font>

                                    </td>
                                    <td style="height: 28px; width: 110px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>



                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 6.163</td>
                                    <td style="text-align:right; background-color: #000000; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #F2DCDB; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #F2DCDB; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra3 -->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="height: 40px; background-color: #DAF7A6; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#974706;">Pasas de Uva</font>
                                        <font style="color:#000000;">Rubias S/S</font>
                                        <font style="color:#FF0000;"> Premium</font>
                                        <font style="color:#000000;"> - </font>
                                        <font style="color:#006FE0;">Mendoza</font>

                                    </td>
                                    <td colspan="2" style="width: 100px; background-color: #006FE0; text-align:center; border: none; font-size: 16pt; padding: 10px;  color:white;">Nuevo Ingreso</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" style="background-color: #DAF7A6; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 75px; width: 200px; border: none;">
                                    </td>



                                </tr>



                                <tr>



                                    <td style="padding-top: 0px; text-align:right;background-color: #DAF7A6; color:white; padding-right: 0px; border-left: none; border-bottom: none; font-size: 14pt;">

                                        <table style="width: 100%; ">
                                            <tr>
                                                <td style="height: 30px; width:150px; text-align:right;  font-size: 16pt; ">
                                                    <font style="color:#83148E;">Precios:</font>
                                                </td>
                                                <td>
                                                    <font style="color:#83148E; font-size: 16pt;">Por Kg:</font>
                                                </td>
                                                <td style="height:30px; text-align:center; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 16pt;padding-right: 10px;padding-left: 10px; ">&nbsp;$ 5.523&nbsp;</td>

                                            </tr>
                                        </table>



                                    </td>
                                    <td style="height:0px; text-align:right; background-color: #DAF7A6; color:white; border-left: none; border-bottom: none; font-size: 16pt; padding-right: 10px; border-bottom: none; padding-top: 0px;">
                                        <font style="color:#83148E;">Por</font>
                                        <font style="color:red;">5</font>
                                        <font style="color:#83148E;">Kg</font>

                                    </td>
                                    <td style="text-align:center; background-color: black; color:white; border-left: none; border-bottom: none; font-size: 16pt;padding-right: 10px;padding-left: 10px; ">$ 5.520</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #DAF7A6; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>
                                        <font style="color:#974706;">Kg, el Kg</font>
                                    </td>

                                    <td colspan="3" style="text-align:center; background-color: white; color:black; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">&nbsp;$ 5.120&nbsp;</td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table>

                <!-- muestra4 varian 2 en una linea por 5 quilos-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="3" style="height: 40px; background-color: #A8EC6A; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#974706;">Pasas de Uva</font>
                                        <font style="color:#000000;">Rubias S/S</font>
                                        <font style="color:#FF0000;"> Premium</font>
                                        <font style="color:#000000;"> - </font>
                                        <font style="color:#006FE0;">Mendoza</font>

                                    </td>
                                    <td style="width: 200px; background-color: #006FE0; text-align:center; border: none; font-size: 14pt; padding: 10px;  color:white;  ">Calidad&nbsp;Exportación</td>
                                </tr>
                                <tr>
                                    <td rowspan="4" style="background-color: #A8EC6A; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 110px; width: 200px; border: none;">
                                    </td>



                                </tr>
                                <tr>


                                    <td colspan="2" style="text-align:right;background-color: #A8EC6A; color:white; padding-right: 10px; border-left: none; border-bottom: none; padding-top: 5px; padding-bottom: 5px;font-size: 18pt;">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>

                                        <font style="color:#974706;">kg, el Kg:</font>

                                    </td>
                                    <td style="width: 80px; text-align:center; background-color: yellow; color:red; border-left: none; border-bottom: none; font-size: 20pt;">$ 5.520</td>
                                </tr>
                                <tr>


                                    <td colspan="2" style="text-align:right;background-color: #A8EC6A; color:white; padding-right: 10px; border-left: none; border-bottom: none; padding-top: 5px; padding-bottom: 5px;font-size: 18pt;">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">2</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>

                                        <font style="color:#974706;">kg, el Kg:</font>

                                    </td>
                                    <td style="text-align:center; background-color: white; color:red; border-left: none; border-bottom: none; font-size: 20pt;">$ 5.120</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #A8EC6A; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">3</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>
                                        <font style="color:#974706;">Kg, el Kg</font>
                                    </td>

                                    <td colspan="3" style="width: 200px; text-align:center; background-color: yellow; color:red; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px; ">$ 5.080</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>



                <!-- muestra5 -->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="background-color: #FFFF99; text-align:right; padding-right: 10px; border: none; font-size: 16pt; padding: 3px;">
                                        <font style="color:#974706;">Ciruela President</font>
                                        <font style="color:black;">Sin/Carozo Grande </font>

                                    </td>
                                    <td style="width: 110px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="text-align:left; background-color: #FFFF99;  border: none;">
                                        <?= $cuadrosinfoto ?>
                                    </td>
                                    <td style="text-align:right; background-color: #FFFF99; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FFFF99; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra6 con tofo -->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="background-color: #FFFF99; text-align:right; padding-right: 10px; border: none; font-size: 16pt; padding: 3px;">
                                        <font style="color:#974706;">Ciruela President</font>
                                        <font style="color:black;">Sin/Carozo Grande </font>

                                    </td>
                                    <td style="width: 110px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="text-align:left; background-color: #FFFF99;  border: none;">
                                        <?= $cuadrofoto ?>
                                    </td>
                                    <td style="text-align:right; background-color: #FFFF99; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FFFF99; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <!-- muestra7 con tofo sola -->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="background-color: #FFFF99; text-align:right; padding-right: 10px; border: none; font-size: 16pt; padding: 3px;">
                                        <font style="color:#974706;">Ciruela President</font>
                                        <font style="color:black;">Sin/Carozo Grande </font>

                                    </td>
                                    <td style="width: 110px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="text-align:left; background-color: #FFFF99;  border: none;">
                                        <?= $cuadrofotosola ?>
                                    </td>
                                    <td style="text-align:right; background-color: #FFFF99; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">1</font>&nbsp;<font style="color:#FF0000;">Caja</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">6</font>&nbsp;<font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FFFF99; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>

                <!-- muestra8 con tofo sola 100 ALTURA -->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;   border-top:  0.1mm solid black;   font-size: 12pt;">
                                <tr>
                                    <td rowspan="3" style="text-align:left; background-color: #FFFF99;  border: none;">
                                        <?= $cuadrofotosolaH ?>
                                    </td>
                                    <td style="background-color: #FFFF99; text-align:right; padding-right: 10px; border: none; font-size: 16pt; padding: 3px;">
                                        <font style="color:#000000;">Ciruela President</font>

                                    </td>
                                    <td style="width: 110px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FFFF99; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FFFF99; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>&nbsp;<font style="color:#008000;">1</font>&nbsp;<font style="color:#FF0000;">Caja</font>&nbsp;<font style="color:#974706;">de</font>&nbsp;<font style="color:#008000;">6</font>&nbsp;<font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FFFF99; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra9 varian A-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt; position:relative;">
                                <tr>
                                    <td rowspan="3" style="background-color: #FF66FF; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 150px; width: 200px; border: none;">
                                        <?= $pu4 ?>
                                    </td>

                                    <td style="background-color: #FF66FF; text-align:right;  border: none; font-size: 20pt; padding: 3px; padding-right: 10px; ">
                                        <font style="color:#000000;">Chips de Bananas</font>
                                        <?= $textcosecha ?>
                                    </td>
                                    <td style="width: 110px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #FF66FF; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FF66FF; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra10 varian B sin nueva campaña-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="4" style="background-color: #F2DCDB; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 135px; width: 200px; border: none;">
                                    </td>

                                    <td rowspan="2" style="background-color: #F2DCDB; text-align:right; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#000000;">Chips de Bananas</font>

                                    </td>
                                    <td style="height: 28px; width: 110px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>



                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 6.163</td>
                                    <td style="text-align:right; background-color: #000000; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #F2DCDB; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #F2DCDB; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra11 varian B-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="4" style="background-color: #FF66FF; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 170px; width: 200px; border: none;">
                                    </td>

                                    <td rowspan="2" style="background-color: #FF66FF; text-align:right; border: none; font-size: 20pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#000000;">Chips de Bananas</font>
                                        <?= $textcosecha ?>

                                    </td>
                                    <td style="width: 110px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #FF66FF; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>


                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 6.163</td>
                                    <td style="text-align:right; background-color: #948A54; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #FF66FF; border: none;font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.349</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.212</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #FF66FF; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 5.325</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 36.371</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <!-- muestra12 varian C-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td rowspan="4" style="background-color: #F2DCDB; vertical-align: bottom;"> <img src="/fonts/fotoborrar.jpg" style="height: 220px; width: 200px; border: none;">
                                    </td>

                                    <td colspan="2" style="background-color: #F2DCDB; text-align: right; border: none; overflow: hidden; font-size: 15pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#000000;">Dátiles C/Carozo Medjoul- Israel</font>
                                        <?= $textcosecha ?>
                                    </td>
                                    <td style="width: 110px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 10pt;">Precio del kg</td>
                                    <td style="width: 180px; background-color: #F2DCDB; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 14;">Precio de la Caja x 5Kg</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" style="background-color: #F2DCDB; vertical-align: top;"><?= $cuadrosinfotob ?></td>

                                    <td style="text-align:right; background-color: #ffffff; border: none; color:#000099; font-size: 16pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        Nueva Campaña
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 17.250</td>
                                    <td style="text-align:center; background-color: #0070C0; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt; border-bottom: none; padding-top: 1px;">Nuevo Ingreso</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #F2DCDB; border: none;font-size: 16pt; padding-right: 9px; border-bottom: none; border-top: none;padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>



                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 15.813</td>
                                    <td style="text-align:right; background-color: white; color:black; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 79.063</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #F2DCDB; border: none; font-size: 16pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">6</font>
                                        <font style="color:#974706;">Kg</font>
                                    </td>
                                    <td style="padding-top: 1px; text-align:center;background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 18pt;">$ 15.625</td>
                                    <td style="text-align:right; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 26pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">$ 78.125</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>

                <!-- muestra13 varian c en una linea por 5 quilos-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>
                                    <td colspan="2" style="height: 50px; background-color: #DAF7A6; text-align:right; border: none; font-size: 18pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#974706;">Pasas de Uva</font>
                                        <font style="color:#000000;">Rubias S/S</font>
                                        <font style="color:#FF0000;"> Premium</font>
                                        <font style="color:#000000;"> - </font>
                                        <font style="color:#006FE0;">Mendoza</font>

                                    </td>
                                    <td colspan="3" style="height: 50px;background-color: #006FE0; text-align:center; border: none; font-size: 16pt;   color:white;">Calidad&nbsp;Exportación</td>
                                </tr>
                                <tr>
                                    <td rowspan="4" style=" height: 50px;background-color: #DAF7A6; vertical-align: bottom;"> <?= $cuadrofoto ?>
                                    </td>



                                </tr>
                                <tr>




                                    <td colspan="3" style="text-align:right; background-color: #DAF7A6; color:white; border-left: none; border-bottom: none; font-size: 16pt; padding-right: 10px; border-bottom: none; padding-top: 1px;">
                                        <font style="color:#83148E;">Por</font>
                                        <font style="color:red;">5</font>
                                        <font style="color:#83148E;">Kg</font>

                                    </td>
                                    <td style="text-align:center; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 20pt; ">$ 5.520</td>
                                </tr>
                                <tr>
                                    <td style="text-align:right; background-color: #DAF7A6; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">1</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>
                                        <font style="color:#974706;">Kg, el Kg</font>
                                    </td>

                                    <td colspan="3" style="text-align:center; background-color: white; color:black; border-left:none; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">$ 5.120</td>
                                </tr>
                                <tr>


                                    <td style="text-align:right; background-color: #DAF7A6; border: none; font-size: 22pt; padding-right: 10px; border-bottom: none; border-top: none; padding-top: 1px ">
                                        <font style="color:#974706;">Por</font>
                                        <font style="color:#008000;">2</font>
                                        <font style="color:#FF0000;">Caja</font>
                                        <font style="color:#974706;">de</font>
                                        <font style="color:#008000;">10</font>
                                        <font style="color:#974706;">Kg, el Kg</font>
                                    </td>

                                    <td colspan="3" style="text-align:center; background-color: black; color:white; border-left: 0.1mm solid black; border-bottom: none; font-size: 30pt;  border-bottom: none; padding-top: 1px;">$ 5.080</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <!-- lista muestra14-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>
                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>


                                    <td style=" border-bottom: 0.1mm solid black;background-color: red; text-align:center;  font-size: 24pt; padding: 3px; padding-right: 10px;">
                                        <font style="color:#ffffff;">Maíz Frito</font>

                                    </td>
                                    <td style=" border-bottom: 0.1mm solid black; color:#ffffff; height: 28px; width: 130px; background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 10px; padding-right: 10px; font-size: 12pt;">
                                        Precio del Kg. Envase x 2,5kg</td>
                                    <td style=" border-bottom: 0.1mm solid black; color:#ffffff; width: 180px; background-color: red; text-align:center; border-left: 0.1mm solid black; padding-left: 18px; padding-right: 18px; font-size: 16;">
                                        Precio del Kg<br> Bulto Cerrado de 25Kg</td>
                                </tr>
                                <tr>

                                    <td style="height: 35px; padding-left: 10px;font-size: 13pt; border-bottom: 0.1mm solid black;">
                                        <font style="color:#000000;"> Maíz Frito Salado Original</font>
                                        <font style="color:red;">Envase x 2,5 kg</font>
                                        <font style="color:#000000;"> - España</font>
                                    </td>

                                    <td style=" padding-top: 1px; text-align:center;background-color: #AF3C00; color:#ffffff; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 16pt;">Sin Stock</td>
                                    <td style="text-align:center; background-color: #AF3C00; color:#ffffff; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 16pt; padding-top: 1px;">Sin Stock</td>
                                </tr>

                                <tr>

                                    <td style="height: 35px;padding-left: 10px;font-size: 13pt; border-bottom: 0.1mm solid black;">
                                        <font style="color:#000000;">Maíz Frito Barbacoa</font>
                                        <font style="color:red;">Envase x 2,5 kg</font>
                                        <font style="color:#000000;"> - España</font>
                                    </td>

                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:#000099; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 18pt;">$ 7.800</td>
                                    <td style="text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 24pt; padding-top: 1px;">$ 7.500</td>
                                </tr>
                                <tr>

                                    <td style="height: 35px;padding-left: 10px;font-size: 13pt; border-bottom: 0.1mm solid black;">
                                        <font style="color:#000000;"> Maíz Frito Mostaza y Miel</font>
                                        <font style="color:red;">Envase x 2,5 kg</font>
                                        <!--  <font style="color:#000000;"> - España</font> -->
                                    </td>

                                    <td style="padding-top: 1px; text-align:center;background-color: white; color:#000099; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 18pt;">$ 7.800</td>
                                    <td style="text-align:center; background-color: yellow; color:#9400E1; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 24pt; padding-top: 1px;">$ 7.500</td>
                                </tr>



                            </table>
                        </td>
                    </tr>
                </table>

                <!-- lista muestra15-->
                <table cellPadding="0" cellSpacing="0" style=" width: 220mm;  border: none; ">
                    <tr>
                        <td>

                            <table cellPadding="0" cellSpacing="0" style=" width: 100%;  border: 0.5mm solid black;  border-top:  0.1mm solid black;  font-size: 12pt;">
                                <tr>


                                    <td align="center" colspan="2" style=" vertical-align: middle; border-bottom: none;background-color: #6CD067; text-align:center;  font-size: 24pt; padding: 3px; ">

                                        <font style="color:#000000;">Oregano </font>
                                        <font style="color:#904FD0;">Premium </font>
                                        <font style="color:#000000;">- </font>
                                        <font style="color:#ffffff;">Mendoza</font>

                                        <?= $pu2 ?>

                                    </td>
                                    <td colspan="2" style="width: 200px; background-color: #006FE0; text-align:center; border: none; font-size: 16pt; padding: 10px;  color:white;">Nuevo Ingreso</td>

                                </tr>

                                <tr>

                                    <td style="background-color: #6CD067; height: 35px;padding-left: 10px;font-size: 16pt; border-bottom: 0.1mm solid black;">
                                        <font style="color:#AF3C00;">Bolsa x 25 kg en Envase Original</font>
                                        <font style="color:#904FD0;">Precio del Kg </font>
                                    </td>

                                    <td style="padding-top: 1px; text-align:center;background-color: #6CD067; color:#000000; border-left: none; border-bottom: 0.1mm solid black; font-size: 18pt; padding-right: 10px;">
                                        $ 4.290</td>
                                    <td style="text-align:center; background-color: black; color:#ffffff; border-left: 0.1mm solid black; border-bottom: 0.1mm solid black; font-size: 30pt; padding-top: 1px;">$ 64.350</td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table><br>

                <!-- fin contenedor -->
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    <!-- borrar -->

    <!-- <form enctype="multipart/form-data" id="form" >
  <span id="muestroaca"> </span>
  <input type="file" id="myfile" name="file" style="display: none;" />
<a onclick="document.getElementById('myfile').click();">Seleccionar</z>
  
</form> -->
    <script>
        $('#myfile').change(function() {
            // submit the form
            $('#form').submit();
        });

        $(document).ready(function(e) {
            $("#form").on('submit', function(e) {



                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'cargar_imagen.php?idlis=<?= $idcod ?>',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) {
                        $('.statusMsg').html('');

                        $('#form').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                        $("#muestroaca").html(msg);
                    }
                });
            });


        });
    </script>


</body>