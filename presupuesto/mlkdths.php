<? include('../f54du60ig65.php');
$idcod = $_GET['jnnfsc'];
$idorden = base64_decode($idcod);

include('func_EliminarOrden.php');

eliminarorden($idorden, $rjdhfbpqj);


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../presupuesto'");
echo ("</script>");
