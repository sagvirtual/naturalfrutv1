<?php include('../f54du60ig65.php');

$id_rubro=$_POST['id_rubro'];
$id_categoria=$_POST['id_categoria'];
$fracionado=$_POST['fracionado'];



$sqlf_categoria=mysqli_query($rjdhfbpqj,"SELECT * FROM f_categoria Where id_rubro = '$id_rubro' and id_categoria = '$id_categoria'");
if ($rowf_categoria = mysqli_fetch_array($sqlf_categoria)){

    $idcat = $rowf_categoria["id"];

    $sqlf_categoria = "Update f_categoria Set fracionado='$fracionado' Where id = '$idcat'";
    mysqli_query($rjdhfbpqj, $sqlf_categoria) or die(mysqli_error($rjdhfbpqj));


}else{


    $sqlf_categoriai = "INSERT INTO `f_categoria` (id_rubro, id_categoria, fracionado) VALUES ('$id_rubro', '$id_categoria', '$fracionado');";
    mysqli_query($rjdhfbpqj, $sqlf_categoriai) or die(mysqli_error($rjdhfbpqj));


}
 








/* 
 echo '
 
 id_rubro: '.$id_rubro.'<br>
 id_categoria: '.$id_categoria.'<br>
 fracionado: '.$fracionado.'<br>
 
 '; */
 





?>