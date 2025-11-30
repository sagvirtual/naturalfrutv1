  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Spectrum CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
<? 
if(empty($_POST['busqueda'])){$busquedads = $_GET['busqueda'];}else{$busquedads = $_POST['busqueda'];}


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
    $timean = date("His"); 
    $idlistafo = $idlista."?".$timean;
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
    $sqleditliold = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisold = mysqli_fetch_array($sqleditliold)) {
        $noseac = $roweditlisold["noseac"];

        $sqledittext = "Update editlista Set noseac='$noseac' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittext) or die(mysqli_error($rjdhfbpqj));
    } else {
        $noseac = 'NO SE ACEPTAN AGREGADOS';
    }
}

if (empty($comminima)) {
    $sqleditlioldc = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldc = mysqli_fetch_array($sqleditlioldc)) {
        $comminima = $roweditlisoldc["comminima"];

        $sqledittextc = "Update editlista Set comminima='$comminima' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittextc) or die(mysqli_error($rjdhfbpqj));
    } else {
        $comminima = '$120000';
    }
}
if (empty($commmenor)) {
    $sqleditlioldd = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '$tipolista' and fecha < '$fechalist' ORDER BY `editlista`.`fecha` ASC");
    if ($roweditlisoldd = mysqli_fetch_array($sqleditlioldd)) {
        $commmenor = $roweditlisoldd["commmenor"];


        $sqledittextd = "Update editlista Set commmenor='$commmenor' Where id = '$idlista'";
        mysqli_query($rjdhfbpqj, $sqledittextd) or die(mysqli_error($rjdhfbpqj));
    } else {
        $commmenor = '$12000';
    }
}

include 'scriptlis.php';
$anchotable="width: 205mm; ";
?>
<style>
    body {
       /*  zoom: 90%; */
        margin: 0;
        padding: 0;
        font-family: cambria;
        background-color: grey;
    }

    table {
        line-height: 1;
        font-size: 12pt;
    }
</style>

<?



if($fechalista == ''){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/listasdeprecios'");
    echo("</script>");}
?>
<!-- contenedor -->

<body>


    <table cellPadding="0" cellSpacing="0" style=" width: 100%;  background-color: grey; text-align:center; margin: 0; padding: 0; ">
        <tr>
            <td align="center">
                <div style="background-color: #107816;  font-family: Arial; font-size: 11pt; color: white; padding:1px;">
                    Sistema de Edición de Lista de Precios Versión Versión 1.0.0 &nbsp;&nbsp;&nbsp;&nbsp;Usuario: <?= $nombrenegocio ?>
                </div>
                <table style=" width: 100%;  height: 50px; background-color: #353535;">
                    <tr>
                        <td><a href="/listasdeprecios">&nbsp;<img src="/listadeprecio/atras.png"></a></td>
                        <td>
                            <p style="font-family: Arial; font-size: 14pt; color:white; padding-left:20px;"><img src="/listadeprecio/iconlista.png" style="height: 20px;"> Lista de Precios <?= $nbombrel ?>
                                <?php

                                echo '' . date('d/m/Y', strtotime($fechalista)) . '';

                                ?></p>



                        </td> <td>
                        <form method="post" action="listaedit?jfndhom=<?=$idcod?>" style="position:relative; top:10px;">
             <input type="text" style="width: 100mm; font-size: 26pt;" name="busqueda" placeholder="Buscar..." autocomplete="off" value="<?=$busquedads?>" onclick="select()">
            <input type="submit" value="Buscar" style="font-size: 26pt; ">
        </form>
                       
                        </td>
                        <td>
                        <a href="/listadeprecio/lista_pdf?fndhom=<?=$idcod?>" target="_blank" class="btn btn-success-rgba" title="Descarga Lista en PDF">
                            <img src="/listadeprecio/despdf.png" style="height: 40px;">
</a>
                        </td>


            </td>
        </tr>
    </table>
    <style>.mi-boton {
  background-color: #4CAF50; /* Color de fondo */
  border: none; /* Sin borde */
  color: white; /* Color del texto */
  padding: 15px 32px; /* Espaciado interno (arriba y abajo) de 15px y (izquierda y derecha) de 32px */
  text-align: center; /* Alineación del texto */
  text-decoration: none; /* Sin subrayado */
  display: inline-block; /* Hacer que el botón se comporte como un elemento de línea */
  font-size: 16px; /* Tamaño de fuente */
  margin: 4px 2px; /* Margen exterior (arriba y abajo) de 4px y (izquierda y derecha) de 2px */
  cursor: pointer; /* Cambiar el cursor al pasar por encima del botón */
  border-radius: 8px; /* Radio de borde para bordes redondeados */
}

.mi-boton:hover {
  background-color: #45a049; /* Cambiar el color de fondo cuando se pasa el cursor sobre el botón */
}

.mi-botonb {
  background-color: black; /* Color de fondo */
  border: none; /* Sin borde */
  color: white; /* Color del texto */
  padding: 15px 32px; /* Espaciado interno (arriba y abajo) de 15px y (izquierda y derecha) de 32px */
  text-align: center; /* Alineación del texto */
  text-decoration: none; /* Sin subrayado */
  display: inline-block; /* Hacer que el botón se comporte como un elemento de línea */
  font-size: 16px; /* Tamaño de fuente */
  margin: 4px 2px; /* Margen exterior (arriba y abajo) de 4px y (izquierda y derecha) de 2px */
  cursor: pointer; /* Cambiar el cursor al pasar por encima del botón */
  border-radius: 8px; /* Radio de borde para bordes redondeados */
}

.mi-botonb:hover {
  background-color: #45a049; /* Cambiar el color de fondo cuando se pasa el cursor sobre el botón */
}
</style>
<div style="position:fixed; float:right;"><a style="cursor: pointer;" onclick="recargarPagina()" title="Actualizar Información">
        <bottom class="mi-boton"style="font-size:36px">ACTUALIZAR</i> </a><br><br><br><br>
<a href="/lproductos/orden_productos">
        <bottom class="mi-botonb">Ordenar Productos</i> </a>

        </a><br><br><br><br>
<a href="/cartelitos/">
        <bottom class="mi-botonb">Agregar Cartelitos</i> </a>
    
    
    
    </div> 
   
       


    <table style=" width: 220mm;  background-color: white; text-align:center; vertical-align: top; ">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <!-- fin cuadro programado -->
           
                <!-- cabezal 1-->
                <table id="colorCell" cellPadding="0" cellSpacing="0" style="background-color: <?= $color1 ?>;<?=$anchotable?> border: 0.5mm solid black; border-bottom: none; font-size: 12pt; vertical-align: top;">

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
                        <td style="text-align:center; padding:3px;"><!--  onclick="convertirfechalis()" -->
                            <input type="hidden" id="hexInputFE" readonly />
                            <a id="colorpickerFE"><img src="color.png" title="Cambiar color de la Fecha" style=" cursor:pointer;"></a>
                            <font style="color:<?= $color3 ?>; " id="fechalis"> &nbsp;&nbsp; <?php

                                                                                                echo '' . date('d/m/Y', strtotime($fechalista)) . '';

                                                                                                ?> &nbsp;</font>



                        </td>

                    </tr>
                </table>
                <!-- cabezal 2-->
                <table style="background-color: <?= $color4 ?>;<?=$anchotable?>  border: 0.5mm solid black; border-bottom: none;     font-size: 12pt; " id="colorCellB">

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
                <table cellPadding="0" cellSpacing="0" style="background-color: <?= $color7 ?>;<?=$anchotable?> border: 0.5mm solid black; font-size: 12pt;cursor:pointer;" id="colorCellC">

                    <tr>
                        <td style="text-align:center; padding: 2px; padding-left: 10px;" id="colorpickerC" title="Cambiar color de Fondo">

                            <form enctype="multipart/form-data" id="form">
                                <span id="muestroaca"> </span>
                                <input type="file" id="myfile" name="file" style="display: none;" />

                            </form>
                            <a onclick="document.getElementById('myfile').click();"> <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30"></a>

                                &nbsp;&nbsp; &nbsp;&nbsp;
                                <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                        <input type="hidden" id="hexInputC" readonly />
                        <input type="hidden" id="hexInputTA" readonly />
                        <td style="text-align:center; font-size: 24pt " onclick="convertirEnInput()">
                            <a id="colorpickerTA"><img src="color.png" title="Cambiar color de Texto" style=" cursor:pointer;"></a>
                            <font style="color:<?= $color8 ?>;" id="noseacep"><?= $noseac ?></font>

                        <td style="text-align:center; padding: 2px; padding-right: 10px;">
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30"> &nbsp;&nbsp; &nbsp;&nbsp;
                            <img src="../listadeprecio/<?= $idlistafo ?>" width=auto height="30">
                        </td>
                    </tr>
                    
                </table>   
      
     <?php
      
  // echo ' <h1 style="color:red;">Estoy con los codigo no va a funcionar bién</h1> ';
      
     ?>
                <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------- -->
