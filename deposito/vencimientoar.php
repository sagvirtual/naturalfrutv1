<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_pallet=$_POST['id_pallet'];
 $fecha_venc=$_POST['fecha_venc'];




if($fecha_venc !='0000-00-00' || !empty($fecha_venc)){
    $sqses = "Update deposito Set fecha_venc='$fecha_venc' Where id = '$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));
}


echo'        <script>    
location.reload();
</script>        
        ';

?>