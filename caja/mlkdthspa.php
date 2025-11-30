<? include('../f54du60ig65.php'); 
$idcajen = $_GET['juhytm'];

$id_caja=base64_decode($idcajen);

if(!empty($id_caja)){
$sqlborr ="delete from caja Where id_caja= '$id_caja'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
}



echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../module/caja'");
echo("</script>"); 
?>



