<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

 $mensajes = $_POST["mensajes"];
 $tipo_cliente = $_POST["tipo_cliente"];

    if($mensajes !="" && !empty($id_usuarioclav)){
//inserta
 $sqlmensa = "INSERT INTO `mensajes` (fecha, mensajes, usuario, hora, sector,origen) VALUES ('$fechahoy', ' $mensajes', '$nombrenegocio','$horasin', $tipo_cliente, $torigen);";
 mysqli_query($rjdhfbpqj, $sqlmensa) or die(mysqli_error($rjdhfbpqj));

}

/* if($_SESSION['tipo']=="30"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/preparacionpedidos'");
    echo("</script>");
 }

 if($_SESSION['tipo']=="31"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/control'");
    echo("</script>");
 }

 if($_SESSION['tipo']=="0"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/control'");
    echo("</script>");
 } */

 echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='index.php'");
    echo("</script>");
 
?>