<?php

// Configuración de la base de datos
$host = 'localhost';
$usuario = 'softwar2_koidksus';
$contraseña = '6*3o#5VzK6';
$baseDeDatos = 'softwar2_dsddksujd';


date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_RA");
$fechahoy = date("Y-m-d");
$fechahoyver = date("d/m/Y");
$hora = date("H:i:s");
$horasin = date("Hi");

// Ruta donde se guardará el archivo de respaldo
$rutaRespaldo = __DIR__ . '/respaldo_' . $fechahoy . '' . $horasin . '.sql';

// Comando mysqldump
$comando = "mysqldump --user={$usuario} --password={$contraseña} --host={$host} {$baseDeDatos} > {$rutaRespaldo}";

// Ejecutar el comando
exec($comando, $salida, $resultado);

// Verificar el resultado
if ($resultado === 0) {
    echo "Copia de seguridad creada con éxito: {$rutaRespaldo}";
} else {
    echo "Error al crear la copia de seguridad. Código de error: {$resultado}";
}
?>
<?php
/* 
 $backupfile = $dbname . date("Y-m-d") . '.sql';
 system("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > $backupfile"); */


// Mail the file
/*  $sendto = "Copia de seguridad <daminaturalfrut@gmail.com>";
$sendfrom = "Naturalfrut Backup <daminaturalfrut@gmail.com>";
$sendsubject = "$fechahoy Copia de seguridad";
$bodyofemail = "Esta es la ultima copia de seguridad.";
 
 include('Mail.php');
 include('Mail/mime.php');
 
 
 $message = new Mail_mime();
 $text = "$bodyofemail";
 $message->setTXTBody($text);
 $message->AddAttachment($rutaRespaldo);
 $body = $message->get();
 $extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
 $headers = $message->headers($extraheaders);
 $mail = Mail::factory("mail");
 $mail->send("$sendto", $headers, $body);
  */
$rjdhfbpqj->query("FLUSH QUERY CACHE");
?>
