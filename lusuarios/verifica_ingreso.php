<?php session_start();

    $sdhf="localhost";
    $dbdhf="softwar2_dsddksujd";
    $udhf="softwar2_koidksus";
    $pdhf="6*3o#5VzK6";

    $rjdhfbpqj = new mysqli($sdhf, $udhf, $pdhf, $dbdhf);

    if ($rjdhfbpqj->connect_error) {
        die("Fallo en la conexión: " . $rjdhfbpqj->connect_error);
    }

if ($_POST['usuario']) {
    $usuario = strtolower($_POST['usuario']);
    $clave = strtolower($_POST['clave']);

    if (empty($clave)) {
        header('Location: index.php?null');
        exit;
    }

    $usuario = base64_encode($usuario);
    $clave = base64_encode($clave);

    $stmt = $rjdhfbpqj->prepare("SELECT cli_usuario, cli_pass FROM usuarios WHERE cli_usuario = ? AND cli_pass = ? AND estado = '0'");
    $stmt->bind_param('ss', $usuario, $clave);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data || $data['cli_pass'] != $clave) {
        header('Location: user-login?error=1');
        exit;
    } else {
        $stmt = $rjdhfbpqj->prepare("SELECT * FROM usuarios WHERE cli_usuario = ? AND cli_pass = ? AND estado = '0'");
        $stmt->bind_param('ss', $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        setcookie('Y2FjYXBpcwd', $row['cli_usuario'], time() + 31536000, '/', '', true, true);
        setcookie('cGVkb3Jpbgd', $row['cli_pass'], time() + 31536000, '/', '', true, true);

        $_SESSION["usuario"] = $row['cli_usuario'];
      /*   $_SESSION["clave"] = $row['cli_pass'];
        $_SESSION["id_usuario"] = $row['id']; */
        $_SESSION['tipo'] = $row['tipo_cliente'];
        $tipo_cliente = $row['tipo_cliente'];
        $id_cliente = $row['id'];

        switch ($tipo_cliente) {
            case "0":
            case "3":
                header('Location: ../');
                break;
            case "2":
                header('Location: /deposito');
                break;
            case "29":
                header('Location: /depositoplantaalta');
                break;
            case "30":
                header('Location: /preparacionpedidos');
                break;
            case "21":
                header('Location: /envasadopb');
                break;
            case "22":
                header('Location: /envasadopa');
                break;
            case "31":
                header('Location: /control');
                break;
                case "56":
                    header('Location: /codificacion');
                    break;
            default:
                header('Location: /');
                break;
        }
        exit;
    }
}
?>
