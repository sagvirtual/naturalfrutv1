<? include ('../f54du60ig65.php');
require ('../salidas/mpdf.php');

$ubica = $_GET['ubica'];


if($ubica=='0'){$nombrelugar="ENVASADO PLANTA ALTA";}
if($ubica=='1'){$nombrelugar="DEPOSITO PLANTA ALTA";}
if($ubica=='2'){$nombrelugar="ENVASADO PLANTA BAJA";}
if($ubica=='9'){$nombrelugar="SIN UBICACION";}

//comienzo pdf
ob_start(); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
</style>




<p >Fecha de Emisión: <?=date('d/m/Y', strtotime($fechahoy))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Hora: <?=$horasin?></p>

<div style="width: 100%; text-align: center;"> <img src="/assets/images/logopc.png" style="width:38mm;"><h2>PRODUCTOS <?=$nombrelugar?></h2>

        </div>
<hr>

<table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


$sqlcategoriasb = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `categorias`.`position` ASC");
while ($rowcategoriasb = mysqli_fetch_array($sqlcategoriasb)) {
    $id_categoria = $rowcategoriasb["id"];
    $nombrecate = strtoupper($rowcategoriasb["nombre"]);

    $sqlproductosv = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where categoria='$id_categoria' and ubicacion='$ubica' and estado='0' "); 
    if ($rowproductosv = mysqli_fetch_array($sqlproductosv)) {

           echo '<tr>  <td colspan="2" style="color: black;background-color: #F0F0F0;"><h4>' . $nombrecate . ' </h4>
           
         
           </td></tr>';
        
    }
    
                                                              
                              $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos WHERE ubicacion='$ubica' and estado='0' and categoria='$id_categoria' ORDER BY nombre ASC");



                                  
                                    while ($rowordentd = mysqli_fetch_array($sqlordenr)) {
                                        $nombrepro=$rowordentd['nombre'];
                                        $estado=$rowordentd['estado'];
                                        $nover='0';

                                        $canverificafin = $canverificafin+1;
                                    echo '

                                    <tr>
                                    <td style="border-bottom: 1px solid black;">' . $canverificafin . ' </td>
                                    <td style="border-bottom: 1px solid black;">' . $nombrepro . ' </td>


                                    </tr>

                                    ';}
                                    }             

                                                                    ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS: <b><?=$canverificafin?> </b>
<?  //envio de PDF

$html = ob_get_contents();
ob_end_clean();
$mpdf->shrink_tables_to_fit = 0;
$mpdf->ignore_table_widths = false;
$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);


//$mpdf->SetHTMLFooter('<p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga su pedido al 4709-3075 // 15-2415-0520 o 15-5429-6101 Num venta: 615252</p>');
$mpdf->AddPageByArray([
    "margin-left" => "20mm",
    "margin-right" => "20mm",
    "margin-top" => "5mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('ubicaciones.pdf', 'D'); //D




?>