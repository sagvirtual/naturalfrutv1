<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $fecha = $_POST["fecha"];
 $tipolista = $_POST["tipolista"];
 
 //actualiza
 if(!empty($id)){
 $sqleditlistab = "Update editlista Set fecha='$fecha', tipolista='$tipolista' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqleditlistab) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}else{

    if(!empty($fecha)){
    /* me fijo que no se repita la fecha */
        $sqleditlista=mysqli_query($rjdhfbpqj,"SELECT * FROM editlista Where fecha = '$fecha' and tipolista = '$tipolista'");
        if ($roweditlista = mysqli_fetch_array($sqleditlista)){}else{
    //inserta
    $sqleditlista = "INSERT INTO `editlista` (fecha, tipolista) VALUES ('$fecha', '$tipolista');";
    mysqli_query($rjdhfbpqj, $sqleditlista) or die(mysqli_error($rjdhfbpqj));
    mysqli_close($rjdhfbpqj);
}
}
}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../listasdeprecios'");
echo("</script>");