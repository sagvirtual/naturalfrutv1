<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_usuario=$_POST['id_usuario'];


$sqlitem_ordeni = "INSERT INTO `preparacion` (id_usuario, fecha_ini, hora_ini) VALUES ('$id_usuario', '$fechahoy', '$horasin');";
mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));

echo'
        <script>
    
location.reload();
</script>
        
        '; 

