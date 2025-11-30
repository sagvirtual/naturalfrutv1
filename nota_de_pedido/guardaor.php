<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $idordencod=base64_encode($idorden);
 $col=$_POST['col'];

if($col=='0'){$col='1';}

 if(!empty($idorden)){
 $sqlclientes = "Update orden Set  col='$col',finalizada='1', fecha1='$fechahoy', hora1='$horasin'  Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

 echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Guardando venta...</strong></div>';

 

 
} 


echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../notadepedido'");
echo ("</script>");
?>

<?php
/* // Supongamos que $idordencod contiene el código de la orden

// Generar la URL para descargar el PDF
$pdf_url = '../nota_de_pedido/presupuesto_pdf.php?jdhsknc=' . $idordencod;

// Redirigir primero a la página de descarga del PDF
echo "<script>window.location.href = '$pdf_url';</script>";

// Después de cierto tiempo, redirigir a otra página (en este caso, 'nota_de_pedido/')
echo "<script>setTimeout(function() {
    window.location.href = '../notadepedido';
}, 3000); // Redirigir después de 3 segundos (3000 milisegundos)
</script>"; */
?>