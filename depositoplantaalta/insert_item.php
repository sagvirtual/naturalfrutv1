<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');

 $producto=$_POST['producto'];
 $unidad=$_POST['unidad'];
 $cantidad=$_POST['cantidad'];
 $numero=$_POST['numero'];
 $prioridad=$_POST['prioridad'];

 $id_orden=$_SESSION['id_orden'];
 $id_producto=$_POST['id_producto'];
 $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenbajar Where id = '$id_orden' and fin='0' and sector='$tipo_usuario'");
 if ($rowordenx = mysqli_fetch_array($sqlordenx)){




 }else{

    $timean= date("His");
    $fechaan = date("d-m-Y");
    $anclaje=$timean.$fechaan;
    $horas = date("H:i");

    $sqlordenr = "INSERT INTO `ordenbajar` (fecha, numero, anclaje, hora, prioridad, sector) VALUES ('$fechahoy', '$numero', '$anclaje','$horas','$prioridad', '$tipo_usuario');";
    mysqli_query($rjdhfbpqj, $sqlordenr) or die(mysqli_error($rjdhfbpqj));

    $sqlordenty=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenbajar Where anclaje = '$anclaje' and fin='0'");
    if ($roworden = mysqli_fetch_array($sqlordenty)){


        $_SESSION['id_orden']=$roworden['id'];
        $_SESSION['numero']=$roworden['numero'];

    }

 }

 $id_orden=$_SESSION['id_orden'];

if(!empty($producto) && !empty($cantidad) && !empty($id_orden)){
 $sqlorden = "INSERT INTO `itembajar` (producto, unidad, cantidad, fecha, id_orden,id_producto) VALUES ('$producto', '$unidad', '$cantidad', '$fechahoy', '$id_orden', '$id_producto');";
 mysqli_query($rjdhfbpqj, $sqlorden) or die(mysqli_error($rjdhfbpqj));


 $sqlordend = "Update ordenbajar Set numero='$numero' Where id = '$id_orden' and sector='$tipo_usuario'";
mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));

}

/* echo '

$producto = '. $producto.'<br>
$unidad = '. $unidad.'<br>
$cantidad = '. $cantidad.'<br>
$id_orden = '. $id_orden.'<br>




'; */
echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?pan=1'");
        echo ("</script>");
 
?>