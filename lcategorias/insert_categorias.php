<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $nombre = $_POST["nombre"];
 $ubicacion = $_POST["ubicacion"];
 $estado = $_POST["estado"];
 
 //actualiza
 if(!empty($id)){
 $sqlcategorias = "Update categorias Set nombre='$nombre', estado='$estado' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqlcategorias) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}else{

    $sqlcategorias=mysqli_query($rjdhfbpqj,"SELECT * FROM categorias ORDER BY `position` DESC");
    if ($rowcategorias = mysqli_fetch_array($sqlcategorias)){
    $position = $rowcategorias["position"]+1;}
    if(!empty($nombre)){
//inserta
 $sqlcategorias = "INSERT INTO `categorias` (nombre, position, estado) VALUES ('$nombre', '$position', '$estado');";
 mysqli_query($rjdhfbpqj, $sqlcategorias) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../categorias'");
echo("</script>");
 
?>