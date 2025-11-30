<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $idorden=$_POST['idorden'];
 $fefecivor=$_POST['fefecivo'];
 $fchequer=$_POST['fcheque'];
 $ftransferr=$_POST['ftransfer'];
 $fdepositor=$_POST['fdeposito'];
 $comment=$_POST['comment'];
 $numero=$_POST['numero'];
 $numeror=$_POST['numeror'];


 $fefecivod = str_replace('.', '', $fefecivor);
 $fefecivo = str_replace(',', '.', $fefecivod);

 $fchequed = str_replace('.', '', $fchequer);
 $fcheque = str_replace(',', '.', $fchequed);

 $ftransferd = str_replace('.', '', $ftransferr);
 $ftransfer = str_replace(',', '.', $ftransferd);


 $fdepositod = str_replace('.', '', $fdepositor);
 $fdeposito = str_replace(',', '.', $fdepositod);




 $sqlcliefes = "Update ordencompra Set fefecivo='$fefecivo', fcheque='$fcheque', ftransfer='$ftransfer', fdeposito='$fdeposito', comment='$comment', numero='$numero', numeror='$numeror' Where id = '$idorden'";
 mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) );

 echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Estado Modificado</strong></div>';
 echo'
 <script>

location.reload();
</script>
 
 ';
                            
?>