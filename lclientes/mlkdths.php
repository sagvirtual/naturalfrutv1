<? include('../f54du60ig65.php'); 
$idcod=$_GET['jnnfsc'];
$idse=base64_decode($idcod);

if(!empty($idcod)){

    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$idse'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {}else{

$sqlborr ="delete from clientes Where id= '$idse'";
mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }

    
}
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../clientes'");
echo ("</script>");
?>