<?php include('../f54du60ig65.php');



$idcod = $_POST["jfndhom"];
$idproducto = $_POST["idproducto"];
$id_categotria = $_POST["idcategotria"];
$fracionado = $_POST["fracionado"];
$gananciab = $_POST["gananciab"];
$gananciac = $_POST["gananciac"];
$id_proveedor = $_POST["id_proveedor"];


//echo 'id rubro '.$idcod.' venta minima: '.$gananciab.'  // fraccionado: '.$gananciac.' id:producto '.$idproducto.' id_proveedor '.$id_proveedor.'<br>';

//selected

$sqlproductos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$idproducto' and fracionado='$gananciac' and ventaminma='$gananciab'");
if ($rowproductos = mysqli_fetch_array($sqlproductos)){

    $sqlborr = "delete from f_rubro Where id_proveedor = '$id_proveedor' and id_rubro='$idcod' and id_producto='$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

}
else{


$sqlf_rubro = mysqli_query($rjdhfbpqj, "SELECT * FROM f_rubro Where id_proveedor = '$id_proveedor' and id_rubro='$idcod' and id_producto='$idproducto'");
if ($rowf_rubro = mysqli_fetch_array($sqlf_rubro)) {

    $idfrac = $rowf_rubro['id'];


    if ($gananciab != '0' || $gananciac != '0') { //update
        $sqlf_rubro = "Update f_rubro Set r_ventamin='$gananciab', r_fraccionado='$gananciac', fracionado='$fracionado' Where id = '$idfrac'";
        mysqli_query($rjdhfbpqj, $sqlf_rubro) or die(mysqli_error($rjdhfbpqj));
    } else {
        $sqlborr = "delete from f_rubro Where id= '$idfrac'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }
} else {

    if ($gananciab != '0' || $gananciac != '0') {
    //insertar
    $sqlf_rubroi = "INSERT INTO `f_rubro` (id_proveedor, id_rubro, id_producto, r_ventamin, r_fraccionado, id_categotria, fracionado) VALUES ('$id_proveedor', '$idcod', '$idproducto', '$gananciab', '$gananciac', '$id_categotria', '$fracionado');";
    mysqli_query($rjdhfbpqj, $sqlf_rubroi) or die(mysqli_error($rjdhfbpqj));
}
}
}