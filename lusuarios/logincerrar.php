<?php 
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, también se debe eliminar la cookie de sesión.
// Nota: ¡Esto destruirá la sesión y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Eliminar las cookies específicas de la aplicación si las hay
setcookie('Y2FjYXBpcwd', '', time() - 42000, '/', '', true, true);
setcookie('cGVkb3Jpbgd', '', time() - 42000, '/', '', true, true);


// Redirigir al usuario a la página de inicio o de login
header('Location: index.php');
exit;
?>