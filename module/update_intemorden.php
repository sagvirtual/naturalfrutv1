<?php include('../f54du60ig65.php');


$id_producto = $_POST["id_producto"];
$idorden = $_POST["idorden"];
$kilos = $_POST["kilos"];
$gridRadios1 = $_POST["gridRadios1"];
$nota = $_POST["nota"];
$noenterga = $_POST["noenterga"];

$id_productod = base64_decode($id_producto);
$idordend = base64_decode($idorden);
//$kilosd = base64_decode($kilos);
if($noenterga=="1" ){ 

        if(!empty($gridRadios1)){  
                
         $idproex=explode("|",$id_producto); 
         $id_productod=base64_decode($idproex[1]);
         $id_productodf=base64_decode($idproex[0]);
                

        //me fijo si hay producto faltante
        $sqlcarga = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and confirmado='1'");
        while ($rowcarga = mysqli_fetch_array($sqlcarga)) {
                $kiloscarga+= $rowcarga['kilos'];
        }
        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and modo='0'");
        while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
                $kilosorden += $rowitem_orden['kilos'];
        }

        if ($kilosorden > $kiloscarga) {
                //si hay mas pedido en ordenes de lo que se cargo no agrego stock
                $agregarstock="1";
        }else{//agrego al ststok el sobrante
                $agregarstock="0";

                //lo que sobra entre carga y remito lo sumo al stock
                $agresctokki=$kiloscarga-$kilosorden;

        }

        //fin producto faltante



        $sqlitem_ordenrr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'");

        if ($rowitem_ordenr = mysqli_fetch_array($sqlitem_ordenrr)) {
                $precio = $rowitem_ordenr["precio"];
                $id_clientese = $rowitem_ordenr["id_cliente"];
                $nombrePro = $rowitem_ordenr["nombre"];
                $camioneta = $rowitem_ordenr["camioneta"];
                $id_proveedor = $rowitem_ordenr["id_proveedor"];
                $nota = $rowitem_ordenr["nota"];
                $kilosmax = $rowitem_ordenr["kilos"];
                $conf_entrega = $rowitem_ordenr["conf_entrega"];
                $conf_entrega2 = $rowitem_ordenr["conf_entrega2"];
                $precioprov = $rowitem_ordenr["precioprov"];
                $kilos = "0";

                $kilosRes = $kilos * $precio;
                $kilosResprov = $kilos * $precioprov;

                $kilosResv = number_format($kilosRes, 2, '.', '');
                $kilosResprovv = number_format($kilosResprov, 2, '.', '');
        }
        $sqlproductos=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$id_productodf'");
        if ($rowproductos = mysqli_fetch_array($sqlproductos)){
                $nombreProf = $rowproductos["nombre"];
        }

        //aca inserto el stock
        if ($kilos < $kilosmax && $agregarstock=="0") {
        

        $isertsctockt = $kilosmax - $kilos;
        $isertsctock = $isertsctockt+$agresctokki;



        //echo'inserto stock '.$isertsctock.'';

        //controlo si esta el producto en sctok
        $sqlitem_ordendisv = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1'");
        if ($rowitem_ordenv = mysqli_fetch_array($sqlitem_ordendisv)) {
                $kilosr = $rowitem_ordenv["kilos"] + $isertsctockt;
                $kidore = $rowitem_ordenv["id"];

                $sqlitem_ordenr = "Update item_orden Set  kilos='$kilosr' Where id = ' $kidore '";
                mysqli_query($rjdhfbpqj, $sqlitem_ordenr) or die(mysqli_error($rjdhfbpqj));
        } else {

                $sqlitem_ordeni = "INSERT INTO `item_orden` (fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, conf_carga, fin) VALUES ('$fechahoy', '$id_productod', '$isertsctockt', '$nombrePro', '$nota', '$id_proveedor','$camioneta','1','1','1');";
                mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
        }
        }




             
                $kilosok = $_POST["kilos"];
                $notaok = $_POST["nota"];

                $sqlitem_od = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fechaold = '$fechahoy'  and id_producto='$id_productod' and id_cliente='$id_clientese' and stock='7'");
                 if ($rowitem_ordenvd = mysqli_fetch_array($sqlitem_od )) {$kidored = $rowitem_ordenvd["id"];
                        $sqlitem_ordenrw = "Update item_orden Set  kilos='$kilosr', noentregado='$gridRadios1', nota='$notaok' Where id = ' $kidored '";
                                mysqli_query($rjdhfbpqj, $sqlitem_ordenrw) or die(mysqli_error($rjdhfbpqj));

                 }else{
                $sqlitem_ordenir = "INSERT INTO `item_orden` (id_cliente, fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, noentregado,fechaold,fin) VALUES ('$id_clientese', '5000-01-01', '$id_productodf', '$kilosok', '$nombreProf', '$notaok', '$id_proveedor','$camioneta','7','$gridRadios1','$fechahoy','1');";
                mysqli_query($rjdhfbpqj, $sqlitem_ordenir) or die(mysqli_error($rjdhfbpqj));

                 }
                if($kilos=="0"){$borras = "delete FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'";
                        mysqli_query($rjdhfbpqj, $borras) or die(mysqli_error($rjdhfbpqj));}







        $time_start = microtime(true);
        
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='remito?jfndhom=$idorden&fdfdbbb=$time_start#pro$id_productod'");
        echo ("</script>");





        } else{echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">Obligatorio el motivo</a>.
                </div>';}   

}  else{

//me fijo si hay producto faltante
$sqlcarga = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and confirmado='1'");
while ($rowcarga = mysqli_fetch_array($sqlcarga)) {
        $kiloscarga+= $rowcarga['kilos'];
}
$sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy' and camioneta = '$idcamioneta' and id_producto='$id_productod' and modo='0' and fin='1'");
while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
        $kilosorden += $rowitem_orden['kilos'];
}

if ($kilosorden > $kiloscarga) {
        //si hay mas pedido en ordenes de lo que se cargo no agrego stock
        $agregarstock="1";
}else{//agrego al ststok el sobrante
        $agregarstock="0";

        //lo que sobra entre carga y remito lo sumo al stock
        $agresctokki=$kiloscarga-$kilosorden;

}

//fin producto faltante



$sqlitem_ordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and fin='1'");

if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordenr)) {
        $precio = $rowitem_orden["precio"];
        $nombrePro = $rowitem_orden["nombre"];
        $camioneta = $rowitem_orden["camioneta"];
        $id_proveedor = $rowitem_orden["id_proveedor"];
        $nota = $rowitem_orden["nota"];
        $kilosmax = $rowitem_orden["kilos"];
        $conf_entrega = $rowitem_orden["conf_entrega"];
        $conf_entrega2 = $rowitem_orden["conf_entrega2"];
        $precioprov = $rowitem_orden["precioprov"];
        if ($kilos > $kilosmax) {
                $kilos = $kilosmax;
        }

        $kilosRes = $kilos * $precio;
        $kilosResprov = $kilos * $precioprov;

        $kilosResv = number_format($kilosRes, 2, '.', '');
        $kilosResprovv = number_format($kilosResprov, 2, '.', '');
}

//aca inserto el stock
if ($kilos < $kilosmax && $agregarstock=="0") {
        

        $isertsctockt = $kilosmax - $kilos;
        $isertsctock = $isertsctockt+$agresctokki;



        //echo'inserto stock '.$isertsctock.'';

        //controlo si esta el producto en sctok
        $sqlitem_ordendisv = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1'");
        if ($rowitem_ordenvr = mysqli_fetch_array($sqlitem_ordendisv)) {
                $kilosr = $rowitem_ordenvr["kilos"] + $isertsctockt;
                $kidore = $rowitem_ordenvr["id"];

                $sqlitem_ordenrt = "Update item_orden Set  kilos='$kilosr' Where id = ' $kidore '";
                mysqli_query($rjdhfbpqj, $sqlitem_ordenrt) or die(mysqli_error($rjdhfbpqj));
        } else {
               
                $sqlitem_ordeni = "INSERT INTO `item_orden` (fecha, id_producto, kilos, nombre, nota, id_proveedor, camioneta, stock, conf_carga, fin) VALUES ('$fechahoy', '$id_productod', '$isertsctockt', '$nombrePro', '$nota', '$id_proveedor','$camioneta','1','1','1');";
                mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
        }
}




if (!empty($id_productod) && !empty($idordend)) {

        $sqlitem_ordenrx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_orden = '$idordend' and modo='0' and fin='1'");
        $cantidadProduc = mysqli_num_rows($sqlitem_ordenrx);

        if ($cantidadProduc < '5') {
                $sqlitem_orden = "Update item_orden Set  kilos='$kilos', total='$kilosResv', totalprov='$kilosResprovv', conf_entrega='1' , conf_entrega2='1' Where id_orden = '$idordend' and id_producto = '$id_productod'";
                mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
        } else {
                if ($conf_entrega == '1' && $conf_entrega2 == '0') {

                        $sqlitem_orden = "Update item_orden Set  kilos='$kilos', total='$kilosResv', totalprov='$kilosResprovv', conf_entrega2='1' Where id_orden = '$idordend' and id_producto = '$id_productod'";
                        mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
                } elseif ($conf_entrega == '0' && $conf_entrega == '0') {
                        $sqlitem_orden = "Update item_orden Set  kilos='$kilos', total='$kilosResv', totalprov='$kilosResprovv', conf_entrega='1', conf_entrega2='0' Where id_orden = '$idordend' and id_producto = '$id_productod'";
                        mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
                }
                elseif ($conf_entrega == '1' && $conf_entrega == '1') {
                        $sqlitem_orden = "Update item_orden Set  kilos='$kilos', total='$kilosResv', totalprov='$kilosResprovv', conf_entrega='1', conf_entrega2='0' Where id_orden = '$idordend' and id_producto = '$id_productod'";
                        mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));
                }
        }
}

if($kilos=="0"){$borras = "delete FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and modo='0'";
        mysqli_query($rjdhfbpqj, $borras) or die(mysqli_error($rjdhfbpqj));}





        $time_start = microtime(true);
        
        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='remito?jfndhom=$idorden&fdfdbbb=$time_start#pro$id_productod'");
        echo ("</script>");
}  
