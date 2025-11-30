<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $nombrev = $_POST["nombre"];
 $nombre = strtoupper($nombrev);
 $ubicacion = $_POST["ubicacion"];
 $estado = $_POST["estado"];
 
 //actualiza
 if(!empty($id)){
 $sqlcamionetas = "Update camionetas Set nombre='$nombre', estado='$estado' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqlcamionetas) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}else{

    $sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas ORDER BY `position` DESC");
    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
    $position = $rowcamionetas["position"]+1;}
    if(!empty($nombre)){
    //inserta
    $sqlcamionetas = "INSERT INTO `camionetas` (nombre, position, estado) VALUES ('$nombre', '$position', '$estado');";
    mysqli_query($rjdhfbpqj, $sqlcamionetas) or die(mysqli_error($rjdhfbpqj));
    mysqli_close($rjdhfbpqj);
}
}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../camionetas'");
echo("</script>");
