<?php  include('../f54du60ig65.php');

 
 $id_cliente = $_POST["id_cliente"];
$iddecod=base64_decode($id_cliente);

 $id_producto = $_POST["id_producto"];
 $favorito = $_POST["favorito"];





 if($favorito=='1'){
    $sqlfavoritos = "INSERT INTO `favoritos` (id_cliente, id_producto) VALUES ('$iddecod', '$id_producto');";
    mysqli_query($rjdhfbpqj, $sqlfavoritos) or die(mysqli_error($rjdhfbpqj));
 }else{
    $sqlborr ="delete from favoritos Where id_cliente='$iddecod' and id_producto='$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
 }

 
?>