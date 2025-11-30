<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

 $idmensa = $_POST["idmensa"];

    if($idmensa !="" && !empty($idmensa)){
//inserta
$sqlrubros = "Update mensajes Set visto='1', usuariovisto='$id_usuarioclav' Where id = '$idmensa'";
mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
mysqli_close($rjdhfbpqj);

}

if($_SESSION['tipo']=="21"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/envasadopb'");
    echo("</script>");
 }

 if($_SESSION['tipo']=="22"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/envasadopa'");
    echo("</script>");
 }

 if($_SESSION['tipo']=="29"){
    echo("<script language='JavaScript' type='text/javascript'>");
    echo("location.href='/depositoplantaalta'");
    echo("</script>");
 } 

?>