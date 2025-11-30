<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $idordencod=base64_encode($idorden);
 $col=$_POST['col'];
 $id_clientecod=$_POST['idcliente'];
if($col=='0'){$col='1';}
if($col=='1'){$idaponer=", dia='0'";}

 if(!empty($idorden)){
 $sqlclientes = "Update ordencompra Set  col='$col',finalizada='1', fecha1='$fechahoy', hora1='$horasin' $idaponer Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

 echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Guardando Orden de Compra...</strong></div>';

 

 
} 
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../orden_de_pago/?jhduskdsa=$id_clientecod&orjndty=$idordencod'");
echo ("</script>");

/* echo'
        <script>
    
location.reload();
</script>
        
        '; */
?>

<?php
/* // Supongamos que $idordencod contiene el código de la orden

// Generar la URL para descargar el PDF
$pdf_url = '../orden_de_compra/orden_de_compra_pdf.php?jdhsknc=' . $idordencod;

// Redirigir primero a la página de descarga del PDF
echo "<script>window.location.href = '$pdf_url';</script>";

// Después de cierto tiempo, redirigir a otra página (en este caso, 'nota_de_pedido/')
 echo "<script>
setTimeout(function() {
   location.reload();
}, 3000);
</script>";  */
?>

