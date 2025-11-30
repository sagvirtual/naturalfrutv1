<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');
 $id_pallet=$_POST['id_pallet'];
 $fecha_encar=$_POST['fecha_encar'];
 $encarpado=$_POST['encarpado'];

 if(!empty($id_pallet)){

    if($encarpado=='0'){
        $sqses = "Update deposito Set fecha_encar='$fecha_encar', encarpado='$encarpado' Where id_pallet='$id_pallet'";
        mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));
        echo'        <script>    
        location.reload();
        </script>        
                '; 
    }
    elseif($encarpado=='1' & $fecha_encar > 2000-01-01){
    $sqses = "Update deposito Set fecha_encar='$fecha_encar', encarpado='$encarpado' Where id_pallet='$id_pallet'";
    mysqli_query($rjdhfbpqj, $sqses) or die(mysqli_error($rjdhfbpqj));




echo'        <script>    
location.reload();
</script>        
        '; }else{echo '<div class="alert alert-danger text-center">
            <strong>Coloque la fecha del Encarpado!</strong>
          </div>';}





}else{echo '<div class="alert alert-danger text-center">
  <strong>Error 39432</strong>
</div>';}
?>