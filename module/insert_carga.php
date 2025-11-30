<?php include('../f54du60ig65.php');

$camioneta='1';


$fechacarga = $_POST["fecha"];
$id_proveedor = $_POST["id_proveedor"];
$id_producto = $_POST["id_producto"];
$kilosex = $_POST["kilosex"];
$cajas = $_POST["cajas"];


$fechacodhoy=base64_decode($fechacarga);
$id_proveedord=base64_decode($id_proveedor);
$id_productod=base64_decode($id_producto);




    //estraigo los kilos por el cual viene el cajon
    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_productod' ORDER BY `precioprod`.`id` DESC");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $kilocajon = $rowprecioprod["kilo"];
    }

    //calculo cuantos kilos se piden
    $ckilosajones = $cajas * $kilocajon;

    $kilototal = $kilosex + $ckilosajones;
    //

    $sqlcargav=mysqli_query($rjdhfbpqj,"SELECT * FROM carga Where fecha = '$fechacodhoy' and id_proveedor='$id_proveedord' and id_producto='$id_productod'");
    if ($rowcarga = mysqli_fetch_array($sqlcargav)){ $idCarga=$rowcarga['id'];

        $sqlcarga = "Update carga Set kilos='$kilototal' Where id = '$idCarga'";
        mysqli_query($rjdhfbpqj, $sqlcarga) or die(mysqli_error($rjdhfbpqj));  

        $sqlitem_orden = "Update item_orden Set conf_carga='1' Where id_producto='$id_productod'";
    mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
        
        

      

    }else{
    $sqlcarga = "INSERT INTO `carga` (id_proveedor, id_producto, fecha, kilos, confirmado, camioneta) VALUES ('$id_proveedord', '$id_productod', '$fechacodhoy', '$kilototal', '1', '$camioneta');";
    mysqli_query($rjdhfbpqj, $sqlcarga) or die(mysqli_error($rjdhfbpqj));


    $sqlitem_orden = "Update item_orden Set conf_carga='1' Where id_producto='$id_productod'";
    mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));




    }
    $time_start = microtime(true);
  echo("<script language='JavaScript' type='text/javascript'>");
        echo("location.href='orden_carga?hfbbd=$id_proveedor&podjfuu=$fechacarga&fdfdbbb=$time_start#pro$id_productod'");
        echo("</script>");


   