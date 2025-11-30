<? include('../f54du60ig65.php'); 
$idcod=$_GET['juhytm'];
$idse=base64_decode($idcod);

$idfecha=$_GET['hdnsbloekdjgsd'];
$idfechacod=base64_decode($idfecha);

if(!empty($idcod)){

    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_hoja='$idse'");//and dia_repart$dayver = '1' 
    if ($rowclorden = mysqli_fetch_array($sqlclorden)) {}else{
$sqlborr ="delete from hoja Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    
    $sqlborrc ="delete from ordenveri Where fecha= '$idfechacod'";
    mysqli_query($rjdhfbpqj, $sqlborrc) or die(mysqli_error($rjdhfbpqj));
    }
}


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../hoja_de_ruta/index.php?buscar=$idfechacod'");
echo ("</script>");
?>