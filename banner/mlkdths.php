<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$idse=base64_decode($idcod);

if(!empty($idcod)){
$sqlborr ="delete from banner Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../banner'");
echo ("</script>");
?>