<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idorden = $_POST['idorden'];
$idordencod = base64_encode($idorden);
$id_cliente = $_POST['id_cliente'];
//include('../cajadiaria/fun_idcuenta.php');
//$idcuenta = calucloidcuen($rjdhfbpqj);
//if($col=='0'){$col='1';}

if (!empty($idorden)) {
    $sqlclientes = "Update devoluciones Set  fin='1',finalizada='1'  Where id = '$idorden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));




    echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Guardando Orden de devolución...</strong></div>';


    echo '
 <script>    
location.reload();
</script> ';
}
?>

<?php
/* // Supongamos que $idordencod contiene el código de la orden

// Generar la URL para descargar el PDF
$pdf_url = 'nota_de_credito_pdf.php?jdhsknc=' . $idordencod;

// Redirigir primero a la página de descarga del PDF
echo "<script>window.location.href = '$pdf_url';</script>";

// Después de cierto tiempo, redirigir a otra página (en este caso, 'nota_de_pedido/')
echo "<script>setTimeout(function() {
    window.location.href = '../notadepedido';
}, 3000); // Redirigir después de 3 segundos (3000 milisegundos)
</script>"; */
?>