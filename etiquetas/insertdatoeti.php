<?php include('../f54du60ig65.php');
$elaborado = $_POST["elaborado"];
$rnpa = $_POST["rnpa"];
$rne = $_POST["rne"];
$fraccionado = $_POST["fraccionado"];
$id_producto = $_POST["id_producto"];
$lote = $_POST["lote"];
$importado = $_POST["importado"];
$origen = $_POST["origen"];
$direccion = $_POST["direccion"];
 
 if (!empty($id_producto)) {

    
    $sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM etiquetas Where id_producto= '$id_producto'");
    if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {
       
       
        $sqlordend = "Update etiquetas Set elaborado='$elaborado', rnpa='$rnpa', rne='$rne', fraccionado='$fraccionado', lote='$lote', importado='$importado', origen='$origen', direccion='$direccion' Where id_producto = '$id_producto'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));


    }else{

    $sqlclientes = "INSERT INTO `etiquetas` (elaborado, rnpa, rne, fraccionado, id_producto,lote,importado,origen,direccion) VALUES ('$elaborado', '$rnpa', '$rne', '$fraccionado', '$id_producto', '$lote', '$importado', '$origen', '$direccion');";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));

    }


echo '

<div class="alert alert-success">
  <strong>Se Guardo correctamente!</strong>
</div>
   <script>
   location.reload();
</script>
';

}


 