<?php include('../f54du60ig65.php');
require('../salidas/mpdf.php');
$start = $_GET['desde'];
$end = $_GET['hasta'];

//ise cominezo a imprimir  2501 hasta el 5000

/* $start = 1000;
$end = 1501;  */

// Generar un array con los números del 1000 al 2000
$numbers = range($start, $end);

// Imprimir los números
foreach ($numbers as $number) {
    $url = ${"url" . $number};
    $filename = ${"filename" . $number};
    $filenamepng = ${"filenamepng" . $number};
    $originalImage = ${"originalImage" . $number};
    $codigodebarra = ${"codigodebarra" . $number};
    $codigodebarra = $number + 300000000000;
    // echo  $codigodebarra . "\n";

    //include('../barcode/html/BCGean13.php');



    // habilito esto para generar los png y desabilito la creacion de pdf

    /* $url = "https://softwarenatfrut.com/barcode/html/image.php?thickness=60&filetype=GIF&dpi=72&scale=4&rotation=0&font_family=Arial.ttf&font_size=20&text=".$codigodebarra."&code=BCGean13";



$folder = '../codigodebarradep/';

$filename = $folder . 'barcodex'.$codigodebarra.'.png';
$filenamepng = $folder . 'barcodex'.$codigodebarra.'.png';

if (file_put_contents($filename, file_get_contents($url))) {

    $originalImage = imagecreatefromgif($filename);

if ($originalImage !== false) {
    $filenamepng = $folder . 'barcode'.$codigodebarra.'.png';

    imagepng($originalImage, $filenamepng );}
   
}  */
    // fin habilitacion

    $pasaocod .= '

<div style="vertical-align: top; width:100mm;height:80mm; border-collapse: collapse; background-color: white;text-align: center;">
    <div style="text-align: center; padding-top:55px;">

' . $codigodebarra . '#

   <img src="../codigodebarradep/barcode' . $codigodebarra . '.png" style="vertical-align: top; width:75mm;height:auto;padding-top:10px;">       


</div>
</div>
<br>


';
}/* cierra for */



ob_start();
?>

<?= $pasaocod ?>

<?

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);



$mpdf->AddPageByArray([
    "margin-left" => "0mm",
    "margin-right" => "5mm",
    "margin-top" => "0mm",
    "margin-bottom" => "200mm"
]);




$mpdf->writeHTML($html);
$mpdf->Output('codigo_deposito_' . $codigodebarra . '.pdf', 'I');




?>