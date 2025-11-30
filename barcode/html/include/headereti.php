<?php
if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }

if (version_compare(phpversion(), '5.0.0', '>=') !== true) {
    exit('Sorry, but you have to run this script with PHP5... You currently have the version <b>' . phpversion() . '</b>.');
}

if (!function_exists('imagecreate')) {
    exit('Sorry, make sure you have the GD extension installed before running this script.');
}

include_once('function.php');

// FileName & Extension
$system_temp_array = explode('/', $_SERVER['PHP_SELF']);
$filename = $system_temp_array[count($system_temp_array) - 1];
$system_temp_array2 = explode('.', $filename);
$availableBarcodes = listBarcodes();
$barcodeName = findValueFromKey($availableBarcodes, $filename);
$code = $system_temp_array2[0];

// Check if the code is valid
if (file_exists('config' . DIRECTORY_SEPARATOR . $code . '.php')) {
    include_once('config' . DIRECTORY_SEPARATOR . $code . '.php');
}
?>
<?php

registerImageKey('thickness', $altocod);
registerImageKey('filetype', 'GIF');
registerImageKey('dpi', 72);
registerImageKey('scale', 4);
registerImageKey('rotation', 0);
registerImageKey('font_family', 'Arial.ttf');
registerImageKey('font_size', 20);
registerImageKey('text', $codigodebarra);  // ACA PONGO LOS NUEMEROS DEL CODIGO

// Text in form is different than text sent to the image
$text = convertText($text);
?>





            

