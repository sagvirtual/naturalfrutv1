<?php include('../f54du60ig65.php');
$idcod = $_POST['jjdnhsa'];
$id = base64_decode($idcod);
$estado = $_POST["estado"];
$tipo_cliente = $_POST["tipo_cliente"];

$usuariode = strtolower($_POST['cli_usuario']);
$clavede = strtolower($_POST['cli_pass']);
$cli_usuario = base64_encode($usuariode);
$cli_pass = base64_encode($clavede);
$nom_contac = $_POST["nom_contac"];
$wsp = $_POST["wsp"];
$camioneta = $_POST["camioneta"];
$check_reparto = $_POST["check_reparto"];
$fecha = $fechahoy;

//if($tipo_cliente=='2'){$camioneta=$_POST["camioneta"];}else{$camioneta='0';}


if (empty($id)) {

    //anclaje
    $timean = date("His");
    $fechaan = date("d-m-Y");
    $anclaje = $timean . $fechaan;

    if (!empty($nom_contac) && !empty($cli_usuario) && !empty($cli_pass)) {
        $sqlusuarios = "INSERT INTO `usuarios` (estado, tipo_cliente, cli_usuario, cli_pass, nom_contac, wsp, fecha, anclaje, camioneta,piking) VALUES ('$estado', '$tipo_cliente','$cli_usuario', '$cli_pass', '$nom_contac', '$wsp','$fecha', '$anclaje', '$camioneta','$check_reparto');";
        mysqli_query($rjdhfbpqj, $sqlusuarios) or die(mysqli_error($rjdhfbpqj));


        //quito session
        unset($_SESSION["estado"]);
        unset($_SESSION["tipo_cliente"]);
        unset($_SESSION["cli_usuario"]);
        unset($_SESSION["cli_pass"]);
        unset($_SESSION["nom_contac"]);
        unset($_SESSION["wsp"]);
        unset($_SESSION["camioneta"]);
        unset($_SESSION["check_reparto"]);

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='/usuarios'");
        echo ("</script>");
    } else {

        //grabo session si faltan datos
        $_SESSION["estado"] = $_POST["estado"];
        $_SESSION["tipo_cliente"] = $_POST["tipo_cliente"];
        $_SESSION["cli_usuario"] = $_POST["cli_usuario"];
        $_SESSION["cli_pass"] = $_POST["cli_pass"];
        $_SESSION["nom_contac"] = $_POST["nom_contac"];
        $_SESSION["wsp"] = $_POST["wsp"];
        $_SESSION["camioneta"] = $_POST["camioneta"];
        $_SESSION["check_reparto"] = $_POST["check_reparto"];


        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='/lusuarios?error=1'");
        echo ("</script>");
    }
} else {
    if (!empty($nom_contac) && !empty($cli_usuario) && !empty($cli_pass)) {
        $sqlusuarios = "Update usuarios Set estado='$estado', tipo_cliente='$tipo_cliente', cli_usuario='$cli_usuario', cli_pass='$cli_pass', nom_contac='$nom_contac', wsp='$wsp', fecha='$fecha', camioneta='$camioneta', piking='$check_reparto' Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlusuarios) or die(mysqli_error($rjdhfbpqj));



        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='/usuarios'");
        echo ("</script>");
    }
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='/usuarios'");
    echo ("</script>");
}
