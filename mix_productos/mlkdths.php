<? include('../f54du60ig65.php'); 
 include('../lusuarios/login.php');


$id_mix=$_POST['id_mix'];
$id_producto=$_POST['id_producto'];


if(!empty($id_mix)){

    $sqlborrd ="delete from dbmix Where id_mix='$id_mix' and id_producto='$id_producto'";
    mysqli_query($rjdhfbpqj, $sqlborrd) or die(mysqli_error($rjdhfbpqj));
echo'
    <script>

location.reload();
</script>
    
    ';}



echo '<div  class="alert alert-danger" style="width: 100%; text-align:center; color:red;"><strong>Producto Emiminando...</strong></div>';
?>
