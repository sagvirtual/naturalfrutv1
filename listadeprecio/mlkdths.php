<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$fechlis=$_GET['fechlis'];
$tipolist=$_GET['tipolist'];
$idse=base64_decode($idcod);

if(!empty($idcod)){
$sqlborr ="delete from editlista Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

$sqlborr ="delete from editliscartel Where fecha='$fechlis' and tipolist='$tipolist'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

$sqlborr ="delete from editlispro Where fecha='$fechlis'and tipolist='$tipolist'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../listasdeprecios'");
echo ("</script>");
?>