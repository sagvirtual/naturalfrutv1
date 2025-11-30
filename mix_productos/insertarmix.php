<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');


 $id_mix=$_POST['id_mix'];
 $id_producto=$_POST['id_producto'];


 

 $sqlormix=mysqli_query($rjdhfbpqj,"SELECT * FROM dbmix Where id_producto = '$id_producto' and id_mix='$id_mix'");
 if ($rowormix = mysqli_fetch_array($sqlormix)){  
    
    
   echo '
   <div class="alert alert-danger">
  <strong> Este Producto ya fue agregado al Mix</strong>
</div>
   ';
sleep(2);



}else{

    
    $sqlormix = "INSERT INTO `dbmix` (id_producto,id_mix,fecha, id_usuario,hora) VALUES ('$id_producto','$id_mix', '$fechahoy','$id_usuarioclav', '$hora');";
    mysqli_query($rjdhfbpqj, $sqlormix) or die(mysqli_error($rjdhfbpqj));
    
    echo 'Insertando';
    echo'
    
        <script>    
location.reload();
</script> ';
 

}



 
?>