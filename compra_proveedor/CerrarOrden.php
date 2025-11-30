<?php include('../f54du60ig65.php'); 
 
$cerrado=$_POST['cerrado'];
$id_proveedor=$_POST['id_proveedor'];
 $id_orden=$_POST['id_orden'];


if($cerrado==0){$cerradov='1';}else{$cerradov='0';}


//orden

$sqlordenprovee = "Update ordenprovee Set cerrado='$cerradov' Where id = '$id_orden' and id_proveedor = '$id_proveedor'";
mysqli_query($rjdhfbpqj, $sqlordenprovee) or die(mysqli_error($rjdhfbpqj));


//precio promedio
$sqlprodcom = "Update prodcom Set cerrado='$cerradov' Where id_orden = '$id_orden' and id_proveedor = '$id_proveedor'";
mysqli_query($rjdhfbpqj, $sqlprodcom) or die(mysqli_error($rjdhfbpqj));

//precio promedio
$sqlprecioprod = "Update precioprod Set cerrado='$cerradov' Where id_orden = '$id_orden' and id_proveedor = '$id_proveedor'";
mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));

if($cerradov=='1'){
 echo ("<script language='JavaScript' type='text/javascript'>");
 echo ("location.href='?ookdjfv=$id_proveedor&osert=1&idcomopra=$id_orden'");
 echo ("</script>"); 
}else{

    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='?ookdjfv=$id_proveedor&osert=1&id_orden=$id_orden'");
    echo ("</script>"); 
}

?>