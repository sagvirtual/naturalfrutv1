<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$id_hoja=$_GET['hidjjhdho'];
$idcamioneta=$_GET['hdnskdjjgsd'];
$hdnsbloekdjgsd=$_GET['hdnsbloekdjgsd'];
$idse=base64_decode($idcod);

if(!empty($idcod)){

$sqlclied = "Update orden Set camioneta='0', fechahoja='0000-00-00', id_hoja='0', position='0' Where id = '$idse' and col !='8'";
            mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));



}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='ver_hoja_de_ruta?hdnsbloekdjgsd=$hdnsbloekdjgsd&hdnskdjjgsd=$idcamioneta&hidjjhdho=$id_hoja'");
echo ("</script>");