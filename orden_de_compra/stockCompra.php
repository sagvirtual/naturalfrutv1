<!-- <?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
$idproduc=$_POST['idproduc'];
$cantidadold=$_POST['cantidadold'];
$cantidadfinal=$_POST['cantidad'];
$id_orden='0';


$resulcantidad=$cantidadfinal-$cantidadold;



 if ($cantidadfinal == 0 || $cantidadfinal == '') {
    echo '<br>Elimino stock '.$cantidadfinal.'<br>';
} elseif ($resulcantidad > 0) {
    echo '<br>Sumo '.$resulcantidad.'<br>';
} elseif ($resulcantidad < 0) {

    echo '<br>Resto '.abs($resulcantidad).'<br>';

    $resulddad=abs($resulcantidad);



} else {
    echo '<br>Vuelvo a lo original '.$cantidadold.'<br>';
}








echo '<br><br><br><br>holas '.$idproduc.'<br>'.$cantidadfinal.' old: '.$cantidadold.'<br> cantidaactualizo: '.$resulcantidad.'';
 
?>
 -->