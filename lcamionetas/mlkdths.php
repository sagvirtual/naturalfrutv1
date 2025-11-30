<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$idse=base64_decode($idcod);

if(!empty($idcod)){

    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where camioneta = '$idse'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {}else{

$sqlborr ="delete from camionetas Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../camionetas'");
echo ("</script>");
?>