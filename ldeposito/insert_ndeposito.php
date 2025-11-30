<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $nombre = $_POST["nombre"];
 $pascolold = $_POST["pascolold"];
 $ubicacion = $_POST["ubicacion"];
 $estado = $_POST["estado"];
 $fraccionar = $_POST["fraccionar"];
 
 //actualiza
 if(!empty($id)){
 $sqlrubros = "Update coddeposi Set nombre='$nombre', estado='$estado', fraccionar='$fraccionar' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));

/*  $sqlrubros = "Update productos Set pascol='$nombre' Where pascol = '$pascolold'";
 mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj)); */

 mysqli_close($rjdhfbpqj);
}else{

    $sqlrubros=mysqli_query($rjdhfbpqj,"SELECT * FROM coddeposi ORDER BY `position` DESC");
    if ($rowrubros = mysqli_fetch_array($sqlrubros)){
    $position = $rowrubros["position"]+1;}
    if(!empty($nombre)){
//inserta
 $sqlrubros = "INSERT INTO `coddeposi` (nombre, codigo, estado, fraccionar) VALUES ('$nombre', '$codigo', '$estado', '$fraccionar');";
 mysqli_query($rjdhfbpqj, $sqlrubros) or die(mysqli_error($rjdhfbpqj));
 mysqli_close($rjdhfbpqj);
}}


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../nomubdeposito'");
echo("</script>");
 
?>