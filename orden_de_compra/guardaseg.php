<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idorden = $_POST[ 'idorden' ];
$col = $_POST[ 'col' ];

if ( !empty( $idorden ) && $col != '2') {
    $sqlclientes = "Update ordencompra Set  col='$col',finalizada='1' Where id = '$idorden'";
    mysqli_query( $rjdhfbpqj, $sqlclientes ) or die( mysqli_error( $rjdhfbpqj ) );

    if ( $col != '0') {

        $sqlcliefes = "Update ordencompra Set fecha$col='$fechahoy', hora$col='$horasin',finalizada='1' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) );

        if ( $col < 2 ) {

            $sqlclied = "Update ordencompra Set fechahoja='0000-00-00', dia='0',finalizada='1' Where id = '$idorden'";
            mysqli_query( $rjdhfbpqj, $sqlclied ) or die( mysqli_error( $rjdhfbpqj ) );

        }
    
    }

    
     
    echo '<div  class="alert alert-success" style="width: 100%; text-align:center;"><strong>Estado Modificado</strong></div>';
    echo'
    <script>

location.reload();
</script>
    
    ';
} else {
    echo '<div  class="alert alert-danger" style="width: 100%; text-align:center;"><strong>Error!! </strong></div>
        <script>

location.reload();
</script>
    ';
    
}
?>