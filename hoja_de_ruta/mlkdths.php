<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$day=$_GET['day'];
$idse=base64_decode($idcod);

if(!empty($idcod)){
    $sqlclientes = "Update clientes Set poscol$day='1' Where id = '$idse'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
   
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../hoja_ruta_config?hdnsbloekdjgsd=1'");
echo ("</script>");
?>