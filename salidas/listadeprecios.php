<? include('../f54du60ig65.php');

require('mpdf.php');
$fechahoy = date("d/m/Y");
$fechahoya = date("d_m_Y");
$list = $_GET['list'];
$modolist = $_GET['modolist'];
$listaid = $_GET['listaid'];
$ordenrub = $_GET['ordenrub'];

//Tipo de lista

    if ($list == '1') {
        $tipoventa = "MINORISTA";
        $tipoventaa = "minorista";
    }
    if ($list == '2') {
        $tipoventa = "MAYORISTA";
        $tipoventaa = "mayorista";
    }
    if ($list == '3') {
        $tipoventa = "DISTRIBUIDOR";
        $tipoventaa = "distribuidor";
    }

  
    $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where id = '$listaid'");
    if ($rowrubros = mysqli_fetch_array($sqlrubros)) {
                $texto_limpio = $rowrubros["nombre"];
                
                // Convertir a su forma desacentuada utilizando Normalizer::normalize()
                $texto_desacentuado = Normalizer::normalize("$texto_limpio", Normalizer::FORM_D);
                $texto_desacentuado = preg_replace('/[^\x20-\x7E]/u', '', $texto_desacentuado);
                $venta = strtoupper($texto_desacentuado);
                $ventaa = strtolower($texto_desacentuado);

                $buscqueda = " and  id_rubro$ordenrub = '1'";
    }




//comienzo pdf
ob_start();
?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18pt;
    }

    .cuadrobase {
        border: 0.5pt solid #000000;
        height: 0.6cm;

    }

    .lineaderecha {
        border-right-width: 0.5pt;
        border-right-style: none;
        border-right-color: #99CCCC;

    }

    .cuadroduplica {
        border-right-width: 0.1pt;
        border-bottom-width: 0.1pt;
        border-left-width: 0.1pt;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: none;
        border-left-style: solid;
        border-right-color: #000000;
        border-bottom-color: #000000;
        border-left-color: #000000;
        height: 0.6cm;
        border-top-width: 0.1pt;
        border-top-color: #000000;
    }

    .cuadroduplicafino {

        border-right-width: 0.1pt;
        border-bottom-width: 0.1pt;
        border-left-width: 0.1pt;
        border-top-style: none;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-right-color: #000000;
        border-bottom-color: #000000;
        border-left-color: #000000;
        height: 0.5cm;
        border-top-width: 0px;
    }

    .doscostado {
        border-left-width: 0.1pt;
        border-top-style: none;
        border-right-style: solid;
        border-bottom-style: none;
        border-left-style: solid;
        border-bottom-color: #000000;
        border-left-color: #000000;
        border-right-width: 10pt;
        border-right-color: #000000;
    }

    .cuadroduplica2 {
        border-right-width: 0.1pt;
        border-bottom-width: 0.1pt;
        border-left-width: 0.1pt;
        border-top-style: none;
        border-right-style: solid;
        border-bottom-style: none;
        border-left-style: solid;
        border-right-color: #000000;
        border-bottom-color: #000000;
        border-left-color: #000000;
        height: 0.4cm;
        border-top-width: 0px;
        background-color: #FFFFFF;
        font-style: normal;
        line-height: normal;
        font-variant: normal;
        font-weight: normal;
    }

    .cuadromenu {
        border: 0.5pt solid #000000;
        font-style: normal;
        line-height: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        background-position: center top;
        text-align: center;
        height: 100px;
        top: 20px;
    }
    .cuadromenub {
        border: 0.5pt solid #000000;
        font-style: normal;
        line-height: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        background-position: center top;
        text-align: center;
        height: 40px;
        top: 20px;
    }

    .cuadromenuder {
        border: 0.5pt solid #999999;

        font-style: normal;
        line-height: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        background-position: center top;
        text-align: right;
        height: 20px;
        top: 20px;
    }

    .unidad {
        width: 35mm;
    }

    .detalle {
        width: 100%;

    }

    .detallep {
        width: 100%;
        text-align: left;
    }
</style>


<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;" tyle="text-align: center;border: 2pt solid #000000;">
    <tr>
        <td><img src="/assets/images/logo.png"></td>
    </tr>
    <tr style="text-align: center;border: 1pt solid #000000;">
        <td style="text-align: center;border: 1pt solid #000000;font-size:10pt"><b>LISTA DE PRECIOS FECHA <?= $fechahoy ?>&nbsp;<?=$tipoventa?>&nbsp;<?= $venta ?></b></td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr class="fondotitulo">
    <td class="cuadromenu unidad" style="color:white;background-color:black; border-right: 1pt solid #ffffff;"></td>
    <td class="cuadromenu unidad" style="color:white;background-color:black; border-right: 1pt solid #ffffff;"><b>COD.</b></td>
        <td class="cuadromenu unidad" style="width: 15mm;color:white;background-color:black; border-right: 1pt solid #ffffff;"><b>KG.</b></td>
        <td class="cuadromenu detalle" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b>PRODUCTO</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b>PRECIO<br>x KG.</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;"><b>PRECIO<br>x CAJA</b></td>
    </tr>
    <?php

    $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' ORDER BY `categorias`.`position` ASC");
    while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
        $id_categoria = $rowcategorias["id"];
        $nombrecate = strtoupper($rowcategorias["nombre"]);

        //me fijo si hay productos en esa categoria
        $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria'  $buscqueda");
        if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

            $id_marcas = $rowproductosv['id_marcas'];
            $sqlmarcas = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = ' $id_marcas' and estado='0'");
            if ($rowmarcas = mysqli_fetch_array($sqlmarcas)) {
                $inactivo = '1';
            }
            if ($inactivo == '1') {
            echo '
            <tr style="background-color:#D8D8D8">
            <td class="cuadromenub" ></td>
            <td class="cuadromenub" ></td>
            <td class="cuadromenub" ></td>
            <td class="cuadromenub"><b>* ' . $nombrecate . ' *</b></td>
            <td class="cuadromenub"></td>
            <td class="cuadromenub"></td>
        </tr>';}
        }
        if ($inactivo == '1') {
            //busco el produco por la categoria
            $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda  ORDER BY `productos`.`position` ASC");
            while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                $id_producto = $rowproductos['id'];

                //aca saco los valores
                $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT kilo, costoxcaja, precio_kiloa, precio_cajaa, precio_kilob, precio_cajab, precio_kiloc, precio_cajac FROM precioprod Where id_producto = '$id_producto' ORDER BY `precioprod`.`fecha` DESC");
                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                    $kilo = $rowprecioprod["kilo"];

                    if ($list == '1') {
                        $precio_kiloa = $rowprecioprod["precio_kiloa"];
                        $precio_cajaa = $rowprecioprod["precio_cajaa"];
                        $precio_kilo = number_format($precio_kiloa, 2, ',', '.');
                        $precio_caja = number_format($precio_cajaa, 2, ',', '.');
                    }
                    if ($list == '2') {
                        $precio_kilob = $rowprecioprod["precio_kilob"];
                        $precio_cajab = $rowprecioprod["precio_cajab"];
                        $precio_kilo = number_format($precio_kilob, 2, ',', '.');
                        $precio_caja = number_format($precio_cajab, 2, ',', '.');
                    }
                    if ($list == '3') {
                        $precio_kiloc = $rowprecioprod["precio_kiloc"];
                        $precio_cajac = $rowprecioprod["precio_cajac"];
                        $precio_kilo = number_format($precio_kiloc, 2, ',', '.');
                        $precio_caja = number_format($precio_cajac, 2, ',', '.');
                    }
                }
                //fin valores

                $nombreproduc = strtolower($rowproductos["nombre"]);
                $nombreproduc = ucfirst($nombreproduc);
                $rut=$_SERVER['HTTPS'];
                echo '<tr>
                <td class="cuadromenu"><img src="/lproductos/foto' . $id_producto . '" alt="Thumbnail Image" class="img-thumbnail" style="max-width:80px; max-height: 80px;"></td>
                <td class="cuadromenu">' .  $rowproductos['codigo'] . '</td>
                <td class="cuadromenu">' . $kilo . '</td>
                <td class="cuadromenu detallep">&nbsp; ' . $nombreproduc . '</td>
                <td class="cuadromenu"><b> $' . $precio_kilo . '</b></td>
                <td class="cuadromenu"> $' . $precio_caja . '</td>
                </tr>';
            }
            //fin producto

        }
    }
    ?>

   
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;" tyle="text-align: center;border: 2pt solid #000000;">

    <tr style="text-align: center;border: 1pt solid #000000;">
        <td style="text-align: right;border: 1pt solid #000000;font-size:8pt;color:white;background-color:black;">FECHA <?= $fechahoy ?>&nbsp;&nbsp;</td>
    </tr>
</table>

<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->AddPageByArray([
    "margin-left" => "30mm",
    "margin-right" => "30mm",
    "margin-top" => "10mm",
    "margin-bottom" => "15mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('lista_' . $ventaa . '_'.$tipoventaa . '_'. $fechahoya . '.pdf', 'D'); //I




?>