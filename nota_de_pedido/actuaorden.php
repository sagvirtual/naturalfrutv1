<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 
 $subtotal=$_POST['suresul']; /* Suma de Venta */

 $uniddesc=$_POST['desuni']; /* undidad descuento % $ */
 $desporsen=$_POST['desuniva'];  /*descuento valor porsentaje */ 
 $descuento=$_POST['totaldes']; /*descuentoresultado */ 

 $perporsen=$_POST['perporsen'];  /* valor porsentaje persepcio */ 
 $totalper=$_POST['totalper']; /* persepcio esultado */ 

 $ivaporsen=$_POST['valoiva'];  /* valor porsentaje  iva */ 
 $totalivas=$_POST['totalivas']; /* iva esultado */ 


 $anterior=$_POST['anterior'];  /* valor porsentaje  iva */ 
 $pago=$_POST['pago']; /* iva esultado */ 
 $saldo=$_POST['saldo']; /* iva esultado */ 
 
 $adicional=$_POST['adicional']; /* iva esultado */ 
 $adicionalvalor=$_POST['adicionalvalor']; /* iva esultado */ 
 $observacion=$_POST['observacion']; /* iva esultado */ 

 
 $total=$_POST['totalventa']; /* total ventas */ 

 if(!empty($idorden)){
 $sqlclientes = "Update orden Set  subtotal='$subtotal', uniddesc='$uniddesc', desporsen='$desporsen', descuento='$descuento', perporsen='$perporsen', totalper='$totalper', ivaporsen='$ivaporsen', totalivas='$totalivas', total='$total', anterior='$anterior', pago='$pago', saldo='$saldo', adicional='$adicional', adicionalvalor='$adicionalvalor', observacion='$observacion' Where id = '$idorden'";
 mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

}  


 
?>

