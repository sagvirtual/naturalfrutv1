<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../control_stock/funcionStockSnot.php');
require('../salidas/mpdf.php');
ob_start();

$buscar = $_GET['buscar'];
$sincan = $_GET['sincan'];


if ($buscar == 0) {

    $sql = "";
} else {
    $sql = "and id='" . $buscar . "'";
}

?>



<style>
    body {
        font-size: 10pt;
        font-family: Arial, sans-serif;
    }

    th,
    td {
        border-bottom: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
        padding: 2px;
    }


    .tdderechaf {
        border-right-width: 1pt;
        border-right-style: solid;
        border-right-color: #000000;
        border-bottom-width: 1pt;
        border-bottom-style: solid;
        border-bottom-color: #000000;
        width: 80px;

    }
</style>



<p>Fecha de Emisión: <?= date('d/m/Y', strtotime($fechahoy)) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    Hora: <?= $horasin ?></p>

<?php
//aca pruebo el otro

$sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias Where estado = '0' $sql ORDER BY `categorias`.`position` ASC ");
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
    $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY nombre ASC");
    if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {




        echo '<table border="0" padding="0" style="text-align:left;width: 100%;">


                                            <tr>
                                            <td  style=" font-size: 20pt;text-align:left;background-color: #000000;color: #ffffff;">
                                            <h5><b>' . $nombrecate . ' </b></h5>
                                            </td></tr>
                                            
                                            </table>
                                            
                                            <table border="0" padding="0" style="background-color: #fff; width: 100%; text-align:left; height:5px;">
                                            <tr>
                                                
                                            <td scope="col" style="border-color: black;text-align:center;">Productos</td>';

        if ($sincan != '1') {
            echo '
                                            <td scope="col" style="border-color: black;width: 110px; text-align:center;">Stock Unid.</td>
                                            <td scope="col" style="border-color: black;width: 110px; text-align:center;">Stock Bulto.</td>';
        }
        echo ' </tr>
                                            </td></tr></table>
                                            ';
    }



    //pongo los item <tr>     

    $sqlproductosrg = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and  estado = '0' ORDER BY nombre ASC");

    while ($rowproductosrg = mysqli_fetch_array($sqlproductosrg)) {
        $idproduc = $rowproductosrg['id'];
        //pruebo poner el producto
        $CantStocks = SumaStock($rjdhfbpqj, $idproduc);
        $CantStocksbu = $CantStocks / $rowproductosrg["kilo"];
        $CantStocksbu = number_format($CantStocksbu, 0, '.', '');

        if ($CantStocks != 0) {
            echo '<table border="0" padding="0" style="background-color: #fff; width: 100%;"><tr>
                                                
                                                <td  style="border-color: black;width: 141mm;text-align:left;">' . $rowproductosrg["nombre"] . ' 
                                                (' . $rowproductosrg["modo_producto"] . ' x ' . $rowproductosrg["kilo"] . ' ' . $rowproductosrg["unidadnom"] . ')
                                                                               
                                                
                                                </td>';

            if ($sincan != '1') {
                echo '
                                                <td style="width: 29mm;text-align:center;">' . $CantStocks . ' ' . $rowproductosrg["unidadnom"] . '</td>
                                                <td style="width: 29mm;text-align:center;">';
                if ($CantStocksbu > 0) {
                    echo ' ' . $CantStocksbu . ' ' . $rowproductosrg["modo_producto"] . '';
                }
                echo '</td>';
            }
            echo '
                                                
                                                
                                            </tr>
                                            </table>';
        }
    }
}








?>





<?  //envio de PDF


$html = ob_get_contents();
ob_end_clean();
sleep(15);
$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
//$mpdf->SetHTMLFooter('<hr>Página: {PAGENO} de {nbpg}');


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('Productos_Fecha_' .  date('d_m_Y', strtotime($fechahoy)) . '.pdf', 'I'); //D




?>