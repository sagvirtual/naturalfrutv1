<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$col = $_POST['confirmado'];

$idorden = $_POST['iditem'];



$sqlcliefes = "Update orden Set col='$col', fecha6='$fechahoy', hora6='$horasin' Where id = '$idorden'";
mysqli_query($rjdhfbpqj, $sqlcliefes) or die(mysqli_error($rjdhfbpqj));



echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../notadepedido'");
echo ("</script>");
