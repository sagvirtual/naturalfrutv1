<?php include('../f54du60ig65.php');



$idcod = $_POST["jfndhom"];
$id = base64_decode($idcod);
$gananciaa = $_POST["gananciaa"];
$gananciab = $_POST["gananciab"];
$gananciac = $_POST["gananciac"];





if (!empty($id)) {
    if (!empty($gananciaa) && !empty($gananciab) && !empty($gananciac)) {
        $sqlproveedores = "Update proveedores Set gananciaa='$gananciaa', gananciab='$gananciab', gananciac='$gananciac' Where id = '$id'";
        mysqli_query($rjdhfbpqj, $sqlproveedores) or die(mysqli_error($rjdhfbpqj));
        mysqli_close($rjdhfbpqj);
    } 
} 

