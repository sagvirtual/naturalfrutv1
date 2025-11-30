<?php include('../f54du60ig65.php');

$file = $_FILES["file"]["type"];


$timean = date("His");
$fechaan = date("d-m-Y");
$anclaje = $timean . $fechaan;

if (!empty($file)) {

    $sqlbanneri = "INSERT INTO `banner` (position, anclaje) VALUES ('$position', '$anclaje');";
    mysqli_query($rjdhfbpqj, $sqlbanneri) or die(mysqli_error($rjdhfbpqj));


    $sqlbanner = mysqli_query($rjdhfbpqj, "SELECT * FROM banner Where anclaje = '$anclaje'");
    if ($rowbanner = mysqli_fetch_array($sqlbanner)) {
        $id = $rowbanner["id"];

        //cargo foto

        $filev = $_FILES["file"]["tmp_name"];
        if ($file  == "image/png" || $file  == "image/jpg" || $file  == "image/jpeg") {
        move_uploaded_file($filev, $id);
        chmod($id, 0777);
        }
    }
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='/banner'");
    echo ("</script>");
}
