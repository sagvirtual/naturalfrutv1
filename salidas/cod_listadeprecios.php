<? include('../f54du60ig65.php');
require('mpdf.php');
$fechahoy = date("d/m/Y");
$fechahoya = date("d_m_Y");
$list = '1';//$_GET['list'];
$modolist = $_GET['modolist'];
$listaid = $_GET['listaid'];
$ordenrub = $_GET['ordenrub'];

if ($modolist != '1') {
    if ($list == '1') {
        $venta = "";
        $ventaa = "costos";
    }
    if ($list == '2') {
        $venta = "MAYORISTA";
        $ventaa = "mayorista";
    }
    if ($list == '3') {
        $venta = "DISTRIBUIDOR";
        $ventaa = "distribuidor";
    }
} else {
    $list = '2';
    $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros Where id = '$listaid'");
    if ($rowrubros = mysqli_fetch_array($sqlrubros)) {

        $venta = strtoupper($rowrubros["nombre"]);
        $ventaa = strtolower($rowrubros["nombre"]);
        $idru = $rowrubros["id"];

        $buscqueda = " and  id_rubro$ordenrub = '1'";
    }
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

    <tr style="text-align: center;border: 1pt solid #000000;">
        <td style="text-align: center;border: 1pt solid #000000;font-size:10pt"><b>COSTOS <?= $fechahoy ?></b></td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
    <tr class="fondotitulo">
        <td class="cuadromenu detalle" style="color:white;background-color:black;border-right: 1pt solid #ffffff; font-size: 12pt;"><b>PRODUCTOS</b></td>
    <td class="cuadromenu unidad" style="width: 30mm;color:white;background-color:black; border-right: 1pt solid #ffffff; font-size: 12pt;"><b>STOCK UNID.</b></td>
        <td class="cuadromenu unidad" style="width: 30mm;color:white;background-color:black; border-right: 1pt solid #ffffff; font-size: 12pt;"><b>STOCK CAJA</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b Style="font-size: 12pt;">P.U.</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b Style="font-size: 12pt;">P.D.</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b Style="font-size: 12pt;">P.B.</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b style="font-size: 12pt;">P.F. UNIT.</b></td>
        <td class="cuadromenu unidad" style="color:white;background-color:black;border-right: 1pt solid #ffffff;"><b style="font-size: 12pt;">P.F. BULTO.<br>x KG.</b></td>
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
            <td class="cuadromenu"><b>* ' . $nombrecate . ' *</b></td>
            <td class="cuadromenu" ></td>
            <td class="cuadromenu" ></td>
            <td class="cuadromenu"></td>
            <td class="cuadromenu"></td>
            <td class="cuadromenu"></td>
            <td class="cuadromenu"></td>
        </tr>';}
        }
        if ($inactivo == '1') {
            //busco el produco por la categoria
            $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' $buscqueda");
            while ($rowproductos = mysqli_fetch_array($sqlproductos)) {
                $id_producto = $rowproductos['id'];

                //aca saco los valores
                $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT kilo,costoxcaja,costo,pcondescu,pbruto,costo_total,costoxcaj FROM precioprod Where id_producto = '$id_producto' ORDER BY `precioprod`.`fecha` DESC");
                if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
                    $kilo = $rowprecioprod["kilo"];

                    $cproveedor = $rowprecioprod["cproveedor"];
                    $costo = $rowprecioprod["costo"];
                    $costov = number_format($costo, 2, ',', '.');
                    $costototal = $rowprecioprod["costo_total"];
                    $costototalv = number_format($costototal, 2, ',', '.');
                    
                        $costoxcaja = $rowprecioprod["costoxcaja"];
                        $pbruto = $rowprecioprod["pbruto"];
                        $costoxcaja = number_format($costoxcaja, 2, ',', '.');
                        $pbruto = number_format($pbruto, 2, ',', '.');
                    
                        $pcondescu = $rowprecioprod["pcondescu"];
                        $precio_cajab = $rowprecioprod["precio_cajab"];
                        $pcondescu = number_format($pcondescu, 2, ',', '.');
                        $precio_caja = number_format($precio_cajab, 2, ',', '.');
                    
                        $costoxcaj = $rowprecioprod["costoxcaj"];
                        $precio_cajac = $rowprecioprod["precio_cajac"];
                        $costoxcaj = number_format($costoxcaj, 2, ',', '.');
                        $precio_caja = number_format($precio_cajac, 2, ',', '.');
                    
                }
                //fin valores

                $nombreproduc = strtolower($rowproductos["nombre"]);
                $nombreproduc = ucfirst($nombreproduc);
                echo '<tr>
                <td class="cuadromenu detallep">&nbsp; ' . $nombreproduc . '</td>
                <td class="cuadromenu">230987</td>
                <td class="cuadromenu">345</td>
                <td class="cuadromenu"> ' . $costov . '</td>
                <td class="cuadromenu"> ' . $pcondescu . '</td>
                <td class="cuadromenu"> ' . $pbruto . ' </td>
                <td class="cuadromenu"  style="background-color: yellow;"> <b>' . $costototalv . '</b></td>
                <td class="cuadromenu"><b> ' . $costoxcaj . '</b></td>
                
                
                </tr>';
            }
            //fin producto
        }
    }
    ?>

    <tr>
    <td class="cuadromenu detallep"></td>
        <td class="cuadromenu"></td>
        <td class="cuadromenu"></td>
        <td class="cuadromenu"> </td>
        <td class="cuadromenu"> </td>
        <td class="cuadromenu"> </td>
        <td class="cuadromenu"> </td>
        <td class="cuadromenu"> </td>
        
    </tr>
</table>

<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;" tyle="text-align: center;border: 2pt solid #000000;">

    <tr style="text-align: center;border: 1pt solid #000000;">
        <td style="text-align: right;border: 1pt solid #000000;font-size:8pt;color:white;background-color:black;"> &nbsp;&nbsp;</td>
    </tr>
</table>

<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-L');
$mpdf->writeHTML($css, 1);
$mpdf->AddPageByArray([
    "margin-left" => "20mm",
    "margin-right" => "20mm",
    "margin-top" => "10mm",
    "margin-bottom" => "15mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('lista_' . $ventaa . '_' . $fechahoya . '.pdf', 'I');//d




?>