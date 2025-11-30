<?php include('../f54du60ig65.php');

$modor = $_POST["modo"];
$fecha_caja = $_POST["fecha_caja"];
$id_camioneta = $_POST["id_camioneta"];
$det_entrada = strtoupper($_POST["det_entrada"]);
$val_entrada = $_POST["val_entrada"];
$val_salidae = $_POST["val_salida"];
$val_salida = str_replace(',','.', $val_salidae);


if($modor=='0'){

if(!empty($det_entrada) && !empty($val_salida)){
$sqlcaja = "INSERT INTO `caja` (fecha_caja, id_camioneta, det_entrada, val_entrada, val_salida, modo) VALUES ('$fecha_caja', '$id_camioneta', '$det_entrada', '$val_entrada', '$val_salida', '$modor');";
mysqli_query($rjdhfbpqj, $sqlcaja) or die(mysqli_error($rjdhfbpqj));


echo("<script language='JavaScript' type='text/javascript'>");
echo("location.href='../module/caja'");
echo("</script>"); 
}else{echo '<h5>Complete los campos</h5>';}


}else{
   

        $sqlcajaCambio = mysqli_query($rjdhfbpqj, "SELECT * FROM caja Where fecha_caja = '$fecha_caja' and modo ='1' and id_camioneta='$id_camioneta'");
        if ($rowcajaCambio = mysqli_fetch_array($sqlcajaCambio)) {

            $id_caja=$rowcajaCambio["id_caja"];

            $sqlcaja = "Update caja Set val_entrada='$val_entrada' Where id_caja = '$id_caja'";
            mysqli_query($rjdhfbpqj, $sqlcaja) or die(mysqli_error($rjdhfbpqj));
        }else{
            $sqlcaja = "INSERT INTO `caja` (fecha_caja, id_camioneta, det_entrada, val_entrada, val_salida, modo) VALUES ('$fecha_caja', '$id_camioneta', '$det_entrada', '$val_entrada', '$val_salida','$modor');";
            mysqli_query($rjdhfbpqj, $sqlcaja) or die(mysqli_error($rjdhfbpqj));
        }

        echo("<script language='JavaScript' type='text/javascript'>");
        echo("location.href='../caja/?hasta_date=$fecha_caja&IdCamioneta=$id_camioneta&get=1'");
        echo("</script>"); 

     
}
?>