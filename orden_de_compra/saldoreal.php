<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idorden = $_POST[ 'idorden' ];
$saldoreal = $_POST[ 'saldoreal' ];

// Eliminar puntos
$sin_puntos = str_replace('.', '', $saldoreal);
$saldorealv = str_replace(',', '.', $sin_puntos);

if ( !empty( $idorden )) {
    $sqlclientes = "Update ordencompra Set  saldoreal='$saldorealv' Where id = '$idorden'";
    mysqli_query( $rjdhfbpqj, $sqlclientes ) or die( mysqli_error( $rjdhfbpqj ) );
    
    }

 

?>