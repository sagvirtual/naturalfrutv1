<?php  include( '../f54du60ig65.php' );

$id_producto=$_POST['idprodu'];
$id_orden=$_POST['idorden'];
$id_cliente=$_POST['tipocliente'];

    $sql=mysqli_query($rjdhfbpqj,"SELECT * FROM faltantes Where id_producto = '$id_producto' and id_orden='$id_orden'");
    if ($row = mysqli_fetch_array($sql)){}else{
        if(!empty($id_orden)){

        $sqlins= "INSERT INTO `faltantes` (id_producto, id_orden, id_cliente) VALUES ('$id_producto', '$id_orden', '$id_cliente');";
        mysqli_query($rjdhfbpqj, $sqlins) or die(mysqli_error($rjdhfbpqj));
        }
    }
    echo'
    <script>    
location.reload();
</script> ';


 
?>