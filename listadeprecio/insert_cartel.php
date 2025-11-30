<?php include('../f54du60ig65.php');

$idlis=$_POST['idlis'];
$iddecod=base64_decode($idlis);


$poner=$_POST['poner'];
$id_cartel=$_POST['id_cartel'];
$position=$_POST['position'];
$fechalis=$_POST['fecha'];
$id_producto=$_POST['id_producto'];
$tipolista=$_POST['tipolista'];

if($fechalis > '2000-01-01'){
    
  if($poner=='1'){

        
        $sqleditlista=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalis' and tipolista = '$tipolista'  and id_cartel = '$id_cartel' and id_producto='$id_producto'");
        if ($roweditlista = mysqli_fetch_array($sqleditlista)){
        }else{  
        
$sqlproductos = "INSERT INTO `editliscartel` (id_cartel, fecha, id_producto, tipolista, position) VALUES ('$id_cartel', '$fechalis', '$id_producto', '$tipolista', '$position');";
mysqli_query($rjdhfbpqj, $sqlproductos) or die(mysqli_error($rjdhfbpqj));
        
        
       }

    }else{

        $borras = "delete FROM editliscartel Where fecha = '$fechalis' and tipolista = '$tipolista'  and id_cartel = '$id_cartel' and id_producto='$id_producto'";
        mysqli_query($rjdhfbpqj, $borras) or die(mysqli_error($rjdhfbpqj));
        mysqli_close($rjdhfbpqj);

    }

}



?>