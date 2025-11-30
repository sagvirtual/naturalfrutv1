<? include('../f54du60ig65.php'); 
$idcod=$_GET['jnnfsc'];
$idorden=base64_decode($idcod);

include('../nota_de_credito/func_EliminarOrden.php');

 eliminarorden($idorden,$rjdhfbpqj);


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../notasdecredito'");
echo ("</script>");
?>
