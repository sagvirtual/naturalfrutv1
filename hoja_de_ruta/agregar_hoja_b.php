<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');

$fechaper = $_POST['fechaper'];
$idcamioneta = $_POST['hdnskdjjgsd'];
$id_hoja = $_POST['id_hoja'];
$id_camioneta = base64_decode($idcamioneta);
foreach ($_POST['juhytm'] as $valuea)
    $idcliente[] = $valuea;

foreach ($_POST['hdnsbloekdjgsd'] as $valueb)
    $fechadecod[] = $valueb;

foreach ($_POST['kjdsdsd'] as $valuec)
    $dia[] = $valuec;

foreach ($_POST['idorden'] as $valued)
    $idorden[] = $valued;



for ($i = 0; $i < count($_POST['idorden']); $i++) {

    if (!empty($idorden[$i])) {
        $sqlclientesr = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$idcliente[$i]'"); //and dia_repart$dayver = '1' 
        if ($rowclientesr = mysqli_fetch_array($sqlclientesr)) {
            $dayver = $dia[$i];

            $position = ${"position" . $i};
            $position = $rowclientesr['position' . $dayver];




            /* nuevo hoja */
            $sqlclied = "Update orden Set position='$position', camioneta='$id_camioneta', fechahoja='$fechadecod[$i]', id_hoja='$id_hoja' Where id = '$idorden[$i]'";
            mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));

            $sqlcliedw = "Update clientes Set camioneta='$id_camioneta'  Where id = '$idcliente[$i]'";
            mysqli_query($rjdhfbpqj, $sqlcliedw) or die(mysqli_error($rjdhfbpqj));

            $origen = "Hoja de ruta";

            FuncActividad($rjdhfbpqj, $idorden[$i], $id_hoja, $id_camioneta, $origen, $id_usuarioclav);
        }
    }
}

$sqlcslied = "Update hoja Set cerrar='0' Where id = '$id_hoja'";
mysqli_query($rjdhfbpqj, $sqlcslied) or die(mysqli_error($rjdhfbpqj));

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='ver_hoja_de_ruta?hdnsbloekdjgsd=$fechaper&hdnskdjjgsd=$idcamioneta&hidjjhdho=$id_hoja'");
echo ("</script>");
