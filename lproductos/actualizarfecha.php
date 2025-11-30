<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$idprecio = $_POST[ 'idprecio' ];
$id_producto = $_POST[ 'id_producto' ];
$fechanuevap = $_POST[ 'fechanuevap' ]; 

//echo 'idprecio: '.$idprecio.' idpro: '.$id_producto.' fechanue: '.$fechanuevap.'<br>';


$sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' and fecha='$fechanuevap'");
                                  
if ($rowordentd = mysqli_fetch_array($sqlordenr)) {

echo '<b style="color:red;">Fecha repetida</b>';

}else{
    $sqlcliess = "Update precioprod Set fecha='$fechanuevap' Where id = '$idprecio' and id_producto='$id_producto'";
    mysqli_query( $rjdhfbpqj, $sqlcliess ) or die( mysqli_error( $rjdhfbpqj ) );
    echo '<b style="color:green;">OK</b>';
}




 

?>