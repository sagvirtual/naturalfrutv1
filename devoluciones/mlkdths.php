<? include('../f54du60ig65.php');
$idcod = $_GET['jnnfsc'];
$idorden = base64_decode($idcod);
/* 
include('../nota_de_credito/func_EliminarOrden.php');

 eliminarorden($idorden,$rjdhfbpqj); */
if (!empty($idorden)) {
    $sqlborrd = "delete from item_devolu Where id_orden= '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));

    $sqlclientes = "Update devoluciones Set  id_cliente='0', fecha='0000-00-00', hora='00:00', anclaje='', fin='0', finalizada='0', fecha_accion='0000-00-00 00:00:00', id_usuarioclav='0' Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../ordendevoluciones'");
echo ("</script>");
