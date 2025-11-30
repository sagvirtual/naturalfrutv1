<?php include('../f54du60ig65.php');
/*
 
*/
//TOQUEN QUE QUERRAMOS PONER 
$token = 'NaturalFrut';
//RETO QUE RECIBIREMOS DE FACEBOOK
$palabraReto = $_GET['hub_challenge'];
//TOQUEN DE VERIFICACION QUE RECIBIREMOS DE FACEBOOK
$tokenVerificacion = $_GET['hub_verify_token'];
//SI EL TOKEN QUE GENERAMOS ES EL MISMO QUE NOS ENVIA FACEBOOK RETORNAMOS EL RETO PARA VALIDAR QUE SOMOS NOSOTROS
if ($token === $tokenVerificacion) {
    echo $palabraReto;
    exit;
}

/*
 * RECEPCION DE MENSAJES
 */
//LEEMOS LOS DATOS ENVIADOS POR WHATSAPP
$respuesta = file_get_contents("php://input");
//CONVERTIMOS EL JSON EN ARRAY DE PHP
$respuesta = json_decode($respuesta, true);
//EXTRAEMOS EL MENSAJE DEL ARRAY
$mensaje=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
//EXTRAEMOS EL TELEFONO DEL ARRAYπm
$telefonoCliente=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'];
//EXTRAEMOS EL ID DE WHATSAPP DEL ARRAY
$id=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['id'];
//EXTRAEMOS EL TIEMPO DE WHATSAPP DEL ARRAY
$timestamp=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['timestamp'];
//SI HAY UN MENSAJE
/* if($mensaje!=null){
    file_put_contents("text.txt", $mensaje);
} */

//inserta
 $sqlmensa = "INSERT INTO `mensajescrm` (fecha, mensajes, usuario, hora, sector,telefono) VALUES ('$fechahoy', ' $mensaje', '99','$horasin', 99, $telefonoCliente);";
 mysqli_query($rjdhfbpqj, $sqlmensa) or die(mysqli_error($rjdhfbpqj));
