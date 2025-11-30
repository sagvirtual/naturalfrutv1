<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$idse=base64_decode($idcod);


$sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$idse'");
if ($rowpdaod = mysqli_fetch_array($sqldrod)) {}else{
if(!empty($idcod)){
$sqlborr ="delete from proveedores Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
}
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../proveedor'");
echo ("</script>");
?>