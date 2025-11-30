<?php include('../f54du60ig65.php');



$idcod = $_POST["jfndhom"];
$idproducto = $_POST["idproducto"];
$id_cliente = $_POST["id_cliente"];
$gananciab = $_POST["gananciab"];
$gananciac = $_POST["gananciac"];
$id_proveedor = $_POST["id_proveedor"];
$fracionado = $_POST["fracionado"];


//echo 'id clienet '.$id_cliente.' // id rubro '.$idcod.' venta minima: '.$gananciab.'  // fraccionado: '.$fracionado.' id:producto '.$idproducto.' id_proveedor '.$id_proveedor.'<br>';

//selected


$sqlf_rubro = mysqli_query($rjdhfbpqj, "SELECT * FROM f_rubro Where  id_producto = '$idproducto' and r_fraccionado='$gananciac' and r_ventamin='$gananciab'");
if ($rowf_rubro = mysqli_fetch_array($sqlf_rubro)) {

    $sqlborr = "delete from f_cliente Where  id_cliente='$id_cliente' and id_producto='$idproducto'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));

    $colorf='0';

} else {
    $sqlproductos = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproducto' and fracionado='$gananciac' and ventaminma='$gananciab'");
    if ($rowproductos = mysqli_fetch_array($sqlproductos)) {

        $sqlborr = "delete from f_cliente Where  id_cliente='$id_cliente' and id_producto='$idproducto'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
        $colorf='0';
        
    }
    else{
        
        $colorf='1';}
}

if($colorf=='1'){





$sqlf_rubro = mysqli_query($rjdhfbpqj, "SELECT * FROM f_cliente Where id_cliente='$id_cliente' and id_proveedor = '$id_proveedor' and id_rubro='$idcod' and id_producto='$idproducto'");
if ($rowf_rubro = mysqli_fetch_array($sqlf_rubro)) {

    $idfrac = $rowf_rubro['id'];


    if ($gananciab != '0' || $gananciac != '0') { //update
        $sqlf_rubro = "Update f_cliente Set r_ventamin='$gananciab', r_fraccionado='$gananciac', fracionado='$fracionado' Where id = '$idfrac'";
        mysqli_query($rjdhfbpqj, $sqlf_rubro) or die(mysqli_error($rjdhfbpqj));
    } else {
        $sqlborr = "delete from f_cliente Where id= '$idfrac'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }
} else {

    if ($gananciab != '0' || $gananciac != '0') { //update
        //insertar
        $sqlf_rubroi = "INSERT INTO `f_cliente` (id_cliente, id_proveedor, id_rubro, id_producto, r_ventamin, r_fraccionado, fracionado) VALUES ('$id_cliente', '$id_proveedor', '$idcod', '$idproducto', '$gananciab', '$gananciac', '$fracionado');";
        mysqli_query($rjdhfbpqj, $sqlf_rubroi) or die(mysqli_error($rjdhfbpqj));
    } else {
        $sqlborr = "delete from f_cliente Where id= '$idfrac'";
        mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
    }
}
}