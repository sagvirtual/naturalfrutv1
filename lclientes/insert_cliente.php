<?php include('../f54du60ig65.php');
$nom_empr = $_POST["nom_empr"];


$idcod = $_POST['jjdnhsa'];
$id = base64_decode($idcod);
$id_rubro = $_POST["id_rubro"];
$estado = $_POST["estado"];
$tipo_cliente = $_POST["tipo_cliente"];
$dia_repart1 = $_POST["dia_repart1"];
$dia_repart2 = $_POST["dia_repart2"];
$dia_repart3 = $_POST["dia_repart3"];
$dia_repart4 = $_POST["dia_repart4"];
$dia_repart5 = $_POST["dia_repart5"];
$dia_repart6 = $_POST["dia_repart6"];
$dia_repart0 = $_POST["dia_repart0"];
$dia_repart0 = $_POST["dia_repart0"];
$cod_fac = $_POST["cod_fac"];
$iva_por = $_POST["iva_por"];
$persep_por = $_POST["persep_por"];
$facturado = $_POST["facturado"];
$cli_usuario = base64_encode($_POST["cli_usuario"]);
$cli_pass = base64_encode($_POST["cli_pass"]);
$nom_contac = $_POST["nom_contac"];
$wsp = $_POST["wsp"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$localidad = $_POST["localidad"];
$address = $_POST["direccion"];
$file = $_FILES["file"]["type"];
$filed = $_FILES["file"]["type"];
$iva = $_POST["iva"];
$cuit = $_POST["cuit"];
$razonsocial = $_POST["razonsocial"];
$saldoini = $_POST["saldoini"];
$camioneta = $_POST["camioneta"];
$cobrable = $_POST["cobrable"];
$feriado = $_POST["feriado"];
$zona = $_POST["zona"];
$horarios = $_POST["horarios"];
$modocl = $_POST["modocl"];
$picking = $_POST["picking"];
$fecha = $fechahoy;

if ($nom_empr == "") {  //echo 'noo '.$nom_empr.' '.$_POST["nom_empr"].'';
    $_SESSION["nom_empr"] = $_POST["nom_empr"];
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='/lclientes?error=12'");
    echo ("</script>");
} else {
    if (empty($id)) {

        //anclaje
        $timean = date("His");
        $fechaan = date("d-m-Y");
        $anclaje = $timean . $fechaan;

        if (!empty($nom_empr)) {
            $sqlclientes = "INSERT INTO `clientes` (id_rubro, estado, tipo_cliente, dia_repart1, dia_repart2, dia_repart3, dia_repart4, dia_repart5, dia_repart6, dia_repart0, cli_usuario, cli_pass, nom_empr, nom_contac, wsp, tel, email, address, file, iva, cuit, razonsocial, fecha, anclaje, saldoini, camioneta, cobrable, feriado,localidad,zona,horarios,cod_fac,iva_por,persep_por,facturado,picking) VALUES ('$id_rubro', '$estado', '$tipo_cliente', '$dia_repart1', '$dia_repart2', '$dia_repart3', '$dia_repart4', '$dia_repart5', '$dia_repart6', '$dia_repart0', '$cli_usuario', '$cli_pass', '$nom_empr', '$nom_contac', '$wsp', '$tel', '$email', '$address', '$file', '$iva', '$cuit', '$razonsocial', '$fecha', '$anclaje', '$saldoini', '$camioneta', '$cobrable', '$feriado', '$localidad','$zona','$horarios','$cod_fac','$iva_por','$persep_por','$facturado','$picking');";
            mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

            $sqlproductosr = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where anclaje = '$anclaje'");
            if ($rowproductos = mysqli_fetch_array($sqlproductosr)) {
                $idfoto = "foto" . $rowproductos['id'];
                $id_productonew = $rowproductos['id'];
            }
            //quito session
            unset($_SESSION["id_rubro"]);
            unset($_SESSION["estado"]);
            unset($_SESSION["tipo_cliente"]);
            unset($_SESSION["dia_repart1"]);
            unset($_SESSION["dia_repart2"]);
            unset($_SESSION["dia_repart3"]);
            unset($_SESSION["dia_repart4"]);
            unset($_SESSION["dia_repart5"]);
            unset($_SESSION["dia_repart6"]);
            unset($_SESSION["dia_repart0"]);

            unset($_SESSION["cod_fac"]);
            unset($_SESSION["iva_por"]);
            unset($_SESSION["persep_por"]);
            unset($_SESSION["facturado"]);

            unset($_SESSION["cli_usuario"]);
            unset($_SESSION["cli_pass"]);
            unset($_SESSION["nom_empr"]);
            unset($_SESSION["nom_contac"]);
            unset($_SESSION["wsp"]);
            unset($_SESSION["tel"]);
            unset($_SESSION["email"]);
            unset($_SESSION["direccion"]);
            unset($_SESSION["localidad"]);
            unset($_SESSION["file"]);
            unset($_SESSION["iva"]);
            unset($_SESSION["cuit"]);
            unset($_SESSION["razonsocial"]);
            unset($_SESSION["saldoini"]);
            unset($_SESSION["camioneta"]);
            unset($_SESSION["cobrable"]);
            unset($_SESSION["zona"]);
            unset($_SESSION["horarios"]);
            unset($_SESSION["picking"]);

            if ($modocl == '1') {
                $ulrent = "../nota_de_pedido/?jhduskdsa=" . $idcod;
            } else {
                $ulrent = "/clientes";
            }

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='$ulrent'");
            echo ("</script>");
        } else {

            //grabo session si faltan datos
            $_SESSION["id_rubro"] = $_POST["id_rubro"];
            $_SESSION["estado"] = $_POST["estado"];
            $_SESSION["tipo_cliente"] = $_POST["tipo_cliente"];
            $_SESSION["dia_repart"] = $_POST["dia_repart"];
            $_SESSION["cli_usuario"] = $_POST["cli_usuario"];
            $_SESSION["cli_pass"] = $_POST["cli_pass"];
            $_SESSION["nom_empr"] = $_POST["nom_empr"];
            $_SESSION["nom_contac"] = $_POST["nom_contac"];
            $_SESSION["wsp"] = $_POST["wsp"];
            $_SESSION["tel"] = $_POST["tel"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["direccion"] = $_POST["direccion"];
            $_SESSION["localidad"] = $_POST["localidad"];
            $_SESSION["file"] = $_FILES["file"]["type"];
            $_SESSION["iva"] = $_POST["iva"];
            $_SESSION["cuit"] = $_POST["cuit"];
            $_SESSION["razonsocial"] = $_POST["razonsocial"];
            $_SESSION["saldoini"] = $_POST["saldoini"];
            $_SESSION["camioneta"] = $_POST["camioneta"];
            $_SESSION["cobrable"] = $_POST["cobrable"];
            $_SESSION["zona"] = $_POST["zona"];
            $_SESSION["horarios"] = $_POST["horarios"];

            $_SESSION["cod_fac"] = $_POST["cod_fac"];
            $_SESSION["iva_por"] = $_POST["iva_por"];
            $_SESSION["persep_por"] = $_POST["persep_por"];
            $_SESSION["facturado"] = $_POST["facturado"];
            $_SESSION["picking"] = $_POST["picking"];

            if ($modocl == '1') {
                $ulrenr = "'/lclientes?error=1&modocl=1";
            } else {
                $ulrenr = "'/lclientes?error=1";
            }

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='$ulrenr'");
            echo ("</script>");
        }
    } else {
        if (!empty($nom_empr)) {

            $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id'");
            if ($rowpdaod = mysqli_fetch_array($sqldrod)) {

                $sqlclientes = "Update clientes Set id_rubro='$id_rubro', estado='$estado', tipo_cliente='$tipo_cliente', dia_repart1='$dia_repart1', dia_repart2='$dia_repart2', dia_repart3='$dia_repart3', dia_repart4='$dia_repart4', dia_repart5='$dia_repart5', dia_repart6='$dia_repart6', dia_repart0='$dia_repart0', cli_usuario='$cli_usuario', cli_pass='$cli_pass', nom_empr='$nom_empr', nom_contac='$nom_contac', wsp='$wsp', tel='$tel', email='$email', address='$address', iva='$iva', cuit='$cuit', razonsocial='$razonsocial', camioneta='$camioneta', cobrable='$cobrable', feriado='$feriado', localidad='$localidad', zona='$zona', horarios='$horarios', cod_fac='$cod_fac', iva_por='$iva_por', persep_por='$persep_por', facturado='$facturado', picking='$picking' Where id = '$id'";
                mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
            } else {
                $sqlclientes = "Update clientes Set id_rubro='$id_rubro', estado='$estado', tipo_cliente='$tipo_cliente', dia_repart1='$dia_repart1', dia_repart2='$dia_repart2', dia_repart3='$dia_repart3', dia_repart4='$dia_repart4', dia_repart5='$dia_repart5', dia_repart6='$dia_repart6', dia_repart0='$dia_repart0', cli_usuario='$cli_usuario', cli_pass='$cli_pass', nom_empr='$nom_empr', nom_contac='$nom_contac', wsp='$wsp', tel='$tel', email='$email', address='$address', iva='$iva', cuit='$cuit', razonsocial='$razonsocial', fecha='$fecha', saldoini='$saldoini', camioneta='$camioneta', cobrable='$cobrable', feriado='$feriado', localidad='$localidad', zona='$zona', horarios='$horarios', cod_fac='$cod_fac', iva_por='$iva_por', persep_por='$persep_por', facturado='$facturado', picking='$picking' Where id = '$id'";
                mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
            }

            if ($modocl == '1') {


                $ulrenrf = "../nota_de_pedido/?jhduskdsa=" . $idcod . "&jufqwes=" . $_POST['jufqwes'];
            } else {
                $ulrenrf = "/clientes";
            }

            echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='$ulrenrf'");
            echo ("</script>");
        }
        if ($modocl == '1') {
            $ulren = "../nota_de_pedido/?jhduskdsa=" . $idcod;
        } else {
            $ulren = "/clientes";
        }
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='$ulren'");
        echo ("</script>");
    }
}
