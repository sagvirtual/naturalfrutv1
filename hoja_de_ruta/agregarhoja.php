<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $fechdoy=$_POST['fechah'];
 $id_camioneta=$_POST['camioneta'];
 $idchofer=$_POST['choferd'];

 $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja WHERE fecha = '$fechdoy' AND camioneta='$id_camioneta' and enruta='0'");
 if ($rowhoja = mysqli_fetch_array($sqlhoja)) {

 }else{

if(!empty($fechdoy)){
 $sqlhojain = "INSERT INTO `hoja` (fecha, fin, camioneta,chofer,position) VALUES ('$fechdoy', '0', '$id_camioneta', '$idchofer', '80');";
 mysqli_query($rjdhfbpqj, $sqlhojain) or die(mysqli_error($rjdhfbpqj));        


    echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../hoja_de_ruta/'");
echo ("</script>");
}
 }



