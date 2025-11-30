<? include ('../f54du60ig65.php');
require ('../salidas/mpdf.php');

$idordencod = $_GET['jfndhom'];
$idorden = base64_decode($idordencod);


$sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM picking where id='$idorden'");
if ($rowrubros = mysqli_fetch_array($sqlrubros)) {
    $nombre = $rowrubros["nombre"];
}
$codigodebarra = $idorden + 878000000000;
$url = "https://softwarenatfrut.com/barcode/html/image.php?thickness=60&filetype=GIF&dpi=72&scale=4&rotation=0&font_family=Arial.ttf&font_size=20&text=".$codigodebarra."&code=BCGean13";


// Carpeta donde se guardará la imagen
$folder = '../lpicking/';


// Nombre del archivo
$filename = $folder . 'barcodex.png';
$filenamepng = $folder . 'barcodex.png';

// Descargar la imagen y guardarla en el archivo
if (file_put_contents($filename, file_get_contents($url))) {

    $originalImage = imagecreatefromgif($filename);

if ($originalImage !== false) {
    // Ruta donde se guardará el archivo PNG convertido
    $filenamepng = $folder . 'barcode'.$codigodebarra.'.png';

    // Guardar la imagen como PNG
    imagepng($originalImage, $filenamepng );}
   
} 
//comienzo pdf
ob_start(); 
?>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 35pt;
        font-weight: bold;
        line-height: -10%;
        padding:0;
    }
</style>


<div style="vertical-align: top; width:100mm;height:80mm; border-collapse: collapse; background-color: white;text-align: center;">
    <div style="text-align: center; padding-top:55px;">
<?=$nombre?>  
             <img src="<?=$filenamepng?>" style="vertical-align: top; width:75mm;height:auto;padding-top:10px;">       

</div>
</div>
<br>
<?  //envio de PDF


$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);



$mpdf->AddPageByArray([
    "margin-left" => "0mm",
    "margin-right" => "5mm",
    "margin-top" => "0mm",
    "margin-bottom" => "15mm"
]);

$mpdf->writeHTML($html);
$mpdf->Output('codigo_pickingb_' . $nombre . '.pdf', 'D');


 

?>