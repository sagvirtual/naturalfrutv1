<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $idordencod=base64_encode($idorden);
 $col=$_POST['col'];
 $total=$_POST['total'];
 $id_cliente=$_POST['id_cliente'];
 include('../cajadiaria/fun_idcuenta.php');
 $idcuenta=calucloidcuen($rjdhfbpqj);
//if($col=='0'){$col='1';}

 if(!empty($idorden)){
 $sqlclientes = "Update nota_credito Set  col='1',finalizada='1', fecha1='$fechahoy', hora1='$horasin'  Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


 $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_notacredito = '$idorden' and modo='1'");
 if ($rowordenx = mysqli_fetch_array($sqlordenx)){

    $sqlclientes = "Update item_orden Set  valor='$total'  Where id_notacredito = '$idorden' and id_notacredito!='0'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));


 }else{


    $sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id_cliente='$id_cliente' and fecha <= '$fechahoy' ORDER BY `orden`.`id` DESC");
    if ($rowordx = mysqli_fetch_array($sqlo2nx)){
       $cidordpag=$rowordx['id'];}


 $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque,vencheque,idcuenta,id_notacredito) VALUES ('$id_cliente', '$cidordpag', '$fechahoy', '$total', '1', 'Nota de Credito', '33', '1', '1', '$ncheque', '$vencheque','$idcuenta','$idorden');";
 mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
 }



 echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Guardando Nota de Credito...</strong></div>';

 
 echo'
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