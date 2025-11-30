<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$idordencod = base64_encode($idorden);
$col = $_POST['col'];
$total = $_POST['total'];
$id_cliente = $_POST['id_cliente'];

if (!empty($idorden)) {
   $sqlclientes = "Update presupuesto Set  col='1',finalizada='1', fecha1='$fechahoy', hora1='$horasin'  Where id = '$idorden'";
   mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));




   echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Guardando Nota de Credito...</strong></div>';


   echo '
 <script>    
location.reload();
</script> ';
}
