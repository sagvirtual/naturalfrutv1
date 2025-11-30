<?php include('../f54du60ig65.php');

$textcar=$_POST['textcar'];
$jfndhom=base64_decode($_POST['jfndhom']);



$timean = date("His");
$fechaan = date("d-m-Y");
$anclaje = $timean . $fechaan;


if(empty($jfndhom)){
if (!empty($textcar)) {

    $sqlbanneri = "INSERT INTO `carteltext` (textcar, anclaje) VALUES ('$textcar', '$anclaje');";
    mysqli_query($rjdhfbpqj, $sqlbanneri) or die(mysqli_error($rjdhfbpqj));
}
}else{
    $sqlprecioprod = "Update carteltext Set textcar='$textcar' Where id = '$jfndhom'";
    mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));


}

echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='/cartelitos'");
    echo ("</script>");

