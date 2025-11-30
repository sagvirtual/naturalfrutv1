<?php include('../f54du60ig65.php');
$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);

 $titulov = $_POST["titulo"];
 $fechafer = $_POST["fecha"];


 //no tiene que haber compras con esa fecha
$sqlitem_orden=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where fecha = '$fechafer' and fin='1'");
if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)){
    $fecha = base64_encode($rowitem_orden["fecha"]);
    $camioneta = base64_encode($rowitem_orden["camioneta"]);


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../feriados?alert=1&hdnsbloekdjgsd=$fecha&hdnskdjjgsd=$camioneta'");
echo("</script>");

}else{

 //actualiza
 if(!empty($id)){
 $sqlferiados = "Update feriados Set titulo='$titulov', fecha='$fechafer' Where id = '$id'";
 mysqli_query($rjdhfbpqj, $sqlferiados) or die(mysqli_error($rjdhfbpqj));

}else{

    if(!empty($titulov)){
    //inserta
    $sqlferiados = "INSERT INTO `feriados` (titulo, fecha) VALUES ('$titulov', '$fechafer');";
    mysqli_query($rjdhfbpqj, $sqlferiados) or die(mysqli_error($rjdhfbpqj));
   
}
}

echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../feriados'");
echo("</script>");
}
