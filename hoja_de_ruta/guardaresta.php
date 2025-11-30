<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');


$estadoho=$_POST['estado'];
$idhoja=$_POST['idhoja'];
$fechaidhoja=$_POST['fechaidhoja'];


if($estadoho=='1'){

$col='9';

}else{
    $sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM hoja Where  id='$idhoja' and fecha='$fechaidhoja'");
    if ($rowordx = mysqli_fetch_array($sqlo2nx)){
       $position=$rowordx['position']; 
    
    }
    
    if($position=='99'){ $col='6';}else{ $col='7';}
    
   

}


if($idhoja > '5'){
$sqlhoja = "Update hoja Set  enruta='$estadoho' Where id = '$idhoja'  and fecha='$fechaidhoja'";
mysqli_query( $rjdhfbpqj, $sqlhoja ) or die( mysqli_error( $rjdhfbpqj ) );

$sqlorden = "Update orden Set col='$col' Where id_hoja='$idhoja'  and fechahoja='$fechaidhoja' and col >= '5' and col != '8' and col != '31'";
       mysqli_query( $rjdhfbpqj, $sqlorden ) or die( mysqli_error( $rjdhfbpqj ) );

       



}else{echo '4343434343Error';}






?>