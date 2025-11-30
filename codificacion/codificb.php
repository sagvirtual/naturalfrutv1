<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$codigobulto = $_POST['codigobulto'];
$filapro = $_POST['filapro'];
$idproducto = $_POST['idproducto'];


if (strlen($codigobulto) > 12) {
    $codigv = $_POST['codigobulto'];
} else {
    $codigv = 0;
}




if (!empty($codigv)) {

    if ($codigv == "9780000009999" || $codigv == "978000000999") {
        $codyuigv = 0;
    } else {
        $codyuigv = $codigv;
    }

    $sqlcliefes = "Update productos Set codigobulto='$codyuigv' Where id = '$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));
}

if (empty($filapro)) {

    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../codificacion/?idproedit=$idproducto'");
    echo ("</script>");
}
