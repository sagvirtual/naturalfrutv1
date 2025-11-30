<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idorden = $_POST[ 'idorden' ];
$col = $_POST[ 'col' ];

if($col =='1' || $col =='2'){
        $sqlcol=", col='31'";
}elseif($col =='99'){
        $sqlcol=", col='5'";
}


        $sqlcliess = "Update orden Set recibido='$col' $sqlcol Where id = '$idorden' and col!='8' and col >='1'";
        mysqli_query( $rjdhfbpqj, $sqlcliess ) or die( mysqli_error( $rjdhfbpqj ) );

        $sqlcliess = "Update orden Set recibido='$col' Where id = '$idorden' and col='8'";
        mysqli_query( $rjdhfbpqj, $sqlcliess ) or die( mysqli_error( $rjdhfbpqj ) );


        echo'
        <script>    
location.reload();
</script> ';


?>