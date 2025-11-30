<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idorden = $_POST[ 'idorden' ];
$col = $_POST[ 'col' ];


        $sqlcliess = "Update productos Set ubicacion='$col' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliess ) or die( mysqli_error( $rjdhfbpqj ) );


 

?>