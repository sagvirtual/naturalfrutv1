<? include('../f54du60ig65.php'); 
include( '../lusuarios/login.php' );

$idcod=$_GET['jnnfsc'];
$idorden=base64_decode($idcod);


if($idorden!=''){
$sqlborr ="delete from item_compra Where id_orden= '$idorden'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));




$sqlborrd ="delete from ordencompra Where id= '$idorden'";
mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));

}


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../ordendecompra'");
echo ("</script>");
?>
