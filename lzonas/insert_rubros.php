<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $nombre = $_POST["nombre"];
 $ubicacion = $_POST["ubicacion"];
 $estado = $_POST["estado"];
 
 //actualiza
 if(!empty($id)){
 $sqlrubros = "Update zona Set nombre='$nombre', estado='$estado' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}else{

    $sqlrubros=mysqli_query($rjdhfbpqj,"SELECT * FROM zona ORDER BY `position` DESC");
    if ($rowrubros = mysqli_fetch_array($sqlrubros)){
    $position = $rowrubros["position"]+1;}
    if(!empty($nombre)){
//inserta
 $sqlrubros = "INSERT INTO `zona` (nombre, position, estado) VALUES ('$nombre', '$position', '$estado');";
 mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../zonas'");
echo("</script>");
 
?>