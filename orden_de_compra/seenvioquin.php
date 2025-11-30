<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idorden = $_POST[ 'idorden' ];
$quien = $_POST[ 'quien' ];


    $sqlclientes = "Update ordencompra Set  quien='$quien' Where id = '$idorden'";
    mysqli_query( $rjdhfbpqj, $sqlclientes ) or die( mysqli_error( $rjdhfbpqj ) );
    mysqli_close($rjdhfbpqj);



?>