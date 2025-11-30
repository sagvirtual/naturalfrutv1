<?php include('../f54du60ig65.php');



function verpagosinorden($rjdhfbpqj,$id_orden){

    $sqlpedpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where  modo='1' and id_orden !='0' and id_orden !='773' 
    and id_orden !='773'
    and id_orden !='1878'
    and id_orden !='2'
    and tipopag !='33'
    
    
    ");
    while ($rowdfp = mysqli_fetch_array($sqlpedpd)) {
        $id_orden= $rowdfp["id_orden"];

        //busco orden relacionada al pago   
    $sqlporden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden'");
    if ($rowdord = mysqli_fetch_array($sqlporden)) {
        $id_orden= $rowdord["id"];
        $relacionok=2;

     }else{
        $relacionok=$id_orden;
        break;

     }


     
     }

     return $relacionok;

}
 

$id_orden='2484';
$norelacion=verpagosinorden($rjdhfbpqj,$id_orden);

echo ''.$norelacion.'';


?>