<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
 
 $fechahoja=$_POST['confirmado'];

 $idorden=$_POST['iditem'];

$sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordencompra Where id='$idorden'");

if ($rowordenx = mysqli_fetch_array($sqlordenx)) {$coestado=$rowordenx['col'];

if($coestado=='6' || $coestado=='7'){$colum=$rowordenx['col'];}else{$colum='2';}
}

if ( $fechahoja!='') {

    $dia_en_espanol = array(
        'Monday'    => '1',
        'Tuesday'   => '2',
        'Wednesday' => '3',
        'Thursday'  => '4',
        'Friday'    => '5',
        'Saturday'  => '6',
        'Sunday'    => '7'
    );
    
    $nombre_dia_ingles = date('l', strtotime($fechahoja));
    $dianume = $dia_en_espanol[$nombre_dia_ingles];



        $sqlcliefes = "Update ordencompra Set col='$colum', fechahoja='$fechahoja', fecha2='$fechahoy', hora2='$horasin', dia='$dianume' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) );
    
   
    } else{
        $sqlcliefes = "Update ordencompra Set col='1', fechahoja='0000-00-00', fecha2='$fechahoy', hora2='$horasin', dia='0' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) );

    }   
    

//echo 'aca:'.$fechahoja.' oden: '. $idorden.'';
/* 
  echo'<script>
        location.reload();
        </script> ';  */
 
?>