
<?php
$da=date("Y-m-d");
// Datos de la base de datos
$host = 'localhost';
$db = 'softwar2_dsddksujd';
$user = 'softwar2_koidksus';
$pass = '6*3o#5VzK6';

// Configuración del correo
$sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";


$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);




// Nombre del archivo de la copia de seguridad
//$backupFile = '../backup/backup_' . date('Y-m-d') . '.sql';


// Comando para realizar la copia de seguridad
$command = sprintf(
  'mysqldump --host=%s --user=%s --password=%s %s',
  escapeshellarg($host),
  escapeshellarg($user),
  escapeshellarg($pass),
  escapeshellarg($db)
);

$output = shell_exec($command);
// Ejecutar el comando y capturar la salida y el código de retorno
//exec($command . ' 2>&1', $output, $return_var);



// Verifica la conexión
if (!$rjdhfbpqj) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Array de tablas a optimizar
  $tablas = [
    "itembajar",
    "itemenvas",
    "itemenvasa",
    "item_orden",
    "deposito",
    "precioprod",
    "ordenprovee",
    "ordenbajar",
    "ordeneva",
    "ordenevaa",
    "orden",
    "prodcom",
    "productos"
];

foreach ($tablas as $tabla) {
    $sql = "OPTIMIZE TABLE $tabla";
    if (mysqli_query($rjdhfbpqj, $sql)) {
    } else {
    }
}  

// Cerrar la conexión
mysqli_close($rjdhfbpqj);



// Configuración del correo
$to = 'bajada@sagvirtual.com.ar';
$subject = 'Copia Seguridad NaturalFrut '. date('Y-m-d');



mb_language("Spanish");
mb_internal_encoding("UTF-8");

$boundary = md5(uniqid(time()));

$headers = "From: bajadasagvirtual@gmail.com\r\n";
$headers .= "Reply-To: bajadasagvirtual@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/alternative; boundary=\"$boundary\"\r\n";

// Crear el mensaje
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= "Copia del db";
$body .= $output;
//$body .= "--$boundary--";

if (mail($to, $subject, $body, $headers)) {
  echo 'Correo enviado correctamente';
} else {
  echo 'Error al enviar el correo';
}
?>
