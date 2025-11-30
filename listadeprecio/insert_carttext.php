<?php include('../f54du60ig65.php');

$fechalis=$_GET['fecha'];
$fechaliscod=base64_encode($idcodrt);

$jfndhom=$_GET['jfndhom'];
$id_cartel=$_GET['id_cartel'];
$id_color=$_GET['id_color'];
$id_producto=$_GET['id_producto'];
$tipolista=$_GET['tipolista'];

$pagina=$_GET['pagina'];
$busquedads=$_GET['busquedads'];

echo 'aca:'.$fechalis.'';
    
  if($id_producto!=''){

        
        $sqleditlista=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartex Where fecha = '$fechalis' and tipolista = '$tipolista' and id_producto='$id_producto'");
        if ($roweditlista = mysqli_fetch_array($sqleditlista)){

            $carteidds=$roweditlista['id'];

            $sqleditlistab = "Update editliscartex Set id_cartel='$id_cartel', id_color=$id_color Where id = '$carteidds'";
            mysqli_query($rjdhfbpqj, $sqleditlistab) or die(mysqli_error($rjdhfbpqj));
            mysqli_close($rjdhfbpqj);

        }else{  
        
$sqlproductos = "INSERT INTO `editliscartex` (id_cartel, fecha, id_producto, tipolista, id_color) VALUES ('$id_cartel', '$fechalis', '$id_producto', '$tipolista', '$id_color');";
mysqli_query($rjdhfbpqj, $sqlproductos) or die(mysqli_error($rjdhfbpqj));
        
        
       }

    }

  echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='listaedit?jfndhom=$jfndhom&pagina=$pagina&busqueda=$busquedads'");
    echo ("</script>");


?>

