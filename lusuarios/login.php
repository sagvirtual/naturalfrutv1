<?php session_start();

// Conexión a la base de datos
/* $sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";

$rjdhfbpqj = new mysqli($sdhf, $udhf, $pdhf, $dbdhf);
$rjdhfbpqj->set_charset("utf8mb4");

if ($rjdhfbpqj->connect_error) {
    die("Fallo en la conexión: " . $rjdhfbpqj->connect_error);
} */

// Verificar que las cookies existen
if (!isset($_COOKIE['Y2FjYXBpcwd']) || !isset($_COOKIE['cGVkb3Jpbgd'])) {
    header('Location: ../lusuarios/user-login');
    exit;
}

$usuario = $_COOKIE['Y2FjYXBpcwd'];
$clave = $_COOKIE['cGVkb3Jpbgd'];

// Usar una consulta preparada para evitar inyecciones SQL
$stmt = $rjdhfbpqj->prepare("SELECT * FROM usuarios WHERE cli_usuario = ? AND cli_pass = ? AND estado = '0'");
$stmt->bind_param('ss', $usuario, $clave);
$stmt->execute();
$resultlpo = $stmt->get_result();

if ($rowusuarios = $resultlpo->fetch_assoc()) {
    $id_usuarioclav = $rowusuarios['id'];
    $id_respontotal = $rowusuarios['id'];
    $whatsapp = $rowusuarios['whatsapp'];
    $idcamioneta = $rowusuarios['camioneta'];
    $nombrenegocio = $rowusuarios['nom_contac'];
    $tipo_usuario = $rowusuarios['tipo_cliente'];
    $torigen = $rowusuarios['tipo_cliente'];
    $pikiusuario = $rowusuarios['piking'];
    $_SESSION['tipo'] = $rowusuarios['tipo_cliente'];
    $_SESSION['id_usuarioclav'] = $rowusuarios['id'];

    // Obtener la información de la camioneta
    $stmt = $rjdhfbpqj->prepare("SELECT * FROM camionetas WHERE id = ?");
    $stmt->bind_param('i', $idcamioneta);
    $stmt->execute();
    $sqlcamionetas = $stmt->get_result();

    if ($rowcamionetas = $sqlcamionetas->fetch_assoc()) {
        $NombreComioneta = $rowcamionetas["nombre"];
    }

    switch ($_SESSION['tipo']) {
        case "0":
            $tiposecto = "General";
            break;
        case "3":
            $tiposecto = "Ventas";
            break;
        case "1":
            $tiposecto = "Administración";
            break;
        case "30":
            $tiposecto = "Preparación de Pedidos";
            $ordensalp = " ORDER BY `itembajar`.`id` ASC";
            break;
        case "31":
            $tiposecto = "Recepción de Pedidos";
            break;
        case "2":
            $tiposecto = "Gestíon de Deposito";
            break;
        case "21":
            $tiposecto = "Envasado Planta Baja";
            break;
        case "22":
            $tiposecto = "Envasado Planta Alta";
            break;
        case "27":
            $tiposecto = "Reparto";
            break;
        case "33":
            $tiposecto = "Jefa Ventas";
            break;
        case "34":
            $tiposecto = "Picking";
            break;
        case "37":
            $tiposecto = "Tesorería";
            break;
        case "56":
            $tiposecto = "Inventario";
            break;
        case "57":
            $tiposecto = "Stock";
            break;

        case "29":
            $tiposecto = "Dep. Planta Alta";
            if ($_SERVER['REQUEST_URI'] == "/depositoplantaalta/") {
                $sqldep = " AND (id_usuarioclav='$id_usuarioclav' OR id_usuarioclav='0')";
            }
            $ordensalp = " ORDER BY `itembajar`.`producto` ASC";
            break;
        default:
            // Manejo de tipo de usuario desconocido
            header('Location: ../lusuarios/user-login');
            exit;
    }
} else {
    header('Location: ../lusuarios/user-login');
    exit;
}
?>

<!-- 
<script>
        function formatoMoneda(input) {
            var num = input.value.replace(/\./g, '');
            if (!isNaN(num)) {
                num = num.split('').reverse().join('').replace(/(\d{3}(?!$))/g, '$1.');
                num = num.split('').reverse().join('');
                input.value = num;
            } else {
                input.value = input.value.replace(/[^\d,.]/g, '');
            }
        }
    </script> -->