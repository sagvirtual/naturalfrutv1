<? session_start();

setcookie('usuariom', 'novaus', time() + 31536000, '/');
setcookie('clavem', 'novacla', time() + 31536000, '/');

/* unset($_SESSION["usuario"]);
unset($_SESSION["clave"]); */
unset($_SESSION["mailito"]);
unset($_SESSION["id_usuario"]);
unset($_SESSION['modo']);
unset($_SESSION['tipo']);
unset($_SESSION['id_orden']);

session_destroy();

header("Location: /module/");


?>