<? include('../f54du60ig65.php');




if ($_POST['usuario']) {
//Comprobacion del envio del nombre de usuario y password
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$clave=base64_encode($clave);
$usuario=base64_encode($usuario);

if ($clave==NULL) {
echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='index.php'");
echo("</script>");
}
else{
$querytgy = mysqli_query($rjdhfbpqj,"SELECT cli_usuario,cli_pass FROM usuarios WHERE cli_usuario = '$usuario' and cli_pass = '$clave' and tipo_cliente='2'");
$data = mysqli_fetch_array($querytgy);
if($data['cli_pass'] != $clave) {
echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='user-login&error=1'");
echo("</script>");


}else{
$querytgyd = mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios WHERE cli_usuario = '$usuario' and cli_pass = '$clave'");
$row = mysqli_fetch_array($querytgyd);

//cookies


setcookie('usuariom', $row['cli_usuario'], time() + 31536000, '/');
setcookie('clavem', $row['cli_pass'], time() + 31536000, '/'); 

//

$_SESSION["usuario"] = $row['cli_usuario'];
$_SESSION["clave"] = $row['cli_pass'];
$_SESSION["id_usuario"] = $row['id'];
$_SESSION['tipo']= $row['tipo_cliente'];
$id_cliente= $row['id'];
	



echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='/module'");
echo("</script>");


}
}
}
?>


  
