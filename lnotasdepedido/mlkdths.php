<? include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');

if ($tipo_usuario == "0") {
    $idcod = $_GET['jnnfsc'];
    $idorden = base64_decode($idcod);

    $dsddd = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$idorden' AND col != '8'");
    if ($rowsdddk = mysqli_fetch_array($dsddd)) {


        include('../nota_de_pedido/func_EliminarOrden.php');

        eliminarorden($idorden, $rjdhfbpqj);
    }
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../notadepedido'");
    echo ("</script>");
} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../notadepedido'");
    echo ("</script>");
}

?>
<?php include('../template/pie.php'); ?>


