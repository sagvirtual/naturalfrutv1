<?php include('../f54du60ig65.php');
 include('../lusuarios/login.php');

 $id_producto=$_POST['id_producto'];
 $costolis=$_POST['costokg'];


 $sqlprdpr=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id='$id_producto' and mix='1'");
 if ($rordus = mysqli_fetch_array($sqlprdpr)){
    $canxbule=$rordus['kilo'];
    $id_proveedor=$rordus['id_proveedor'];

    $fecvend='3000-01-01';
 $costdsunldsdv=$costolis*$canxbule;

 $sqlpespr=mysqli_query($rjdhfbpqj,"SELECT * FROM precioprod Where costo!='$costolis' and id_producto = '$id_producto'");
 if ($rortus = mysqli_fetch_array($sqlpespr)){
    //tiene que tener costo diferente


 $sqlpreispr=mysqli_query($rjdhfbpqj,"SELECT * FROM precioprod Where fecha='$fechahoy' and id_producto = '$id_producto'");
 if ($rortus = mysqli_fetch_array($sqlpreispr)){
     $sqlprecioprod = "Update precioprod Set fecha='$fechahoy', kilo='$canxbule', tipoprov='$id_proveedor', cproveedor='$cproveedor', fecven='$fecvend', agrstock='$agrstocksd', costoxcaj='$costdsunldsdv', costo='$costolis', tipo='$tipo', descuento='$desclis', pcondescu='$predesclisv', iibb_bsas='$iibb_bsaslisv', iibb_caba='$iibb_cabalisv', perc_iva='$perc_ivalisv', iva='$ivalisv', pbruto='$pbruto', desadi='$descadilisv ', costo_total='$costolis', costoxcaja='$costdsunldsdv', id_usuario='$id_usuarioclav',confirmado='0' Where  id_producto = '$id_producto' and  fecha='$fechahoy'";
     mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));  
     }else{


     $sqlprecioprod = "INSERT INTO `precioprod` (id_usuario, modo, id_producto, id_proveedor, id_orden, fecha, kilo, tipoprov, cproveedor, nref, fecven, agrstock, costoxcaj, costo, tipo, costo_total, costoxcaja, cerrado) VALUES ('$id_usuarioclav', '$modo', '$id_producto', '$id_proveedor', '$id_orden', '$fechahoy', '$canxbule', '$id_proveedor', '$cproveedor', 'Compra', '$fecvend', '$agrstocksd', '$costdsunldsdv', '$costolis', '$tipo','$costolis', '$costdsunldsdv', '1');";
     mysqli_query($rjdhfbpqj, $sqlprecioprod) or die(mysqli_error($rjdhfbpqj));
     
     }

    }
}
 
?>