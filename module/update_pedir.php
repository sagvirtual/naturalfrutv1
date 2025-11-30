<?php include('../f54du60ig65.php');


$id_producto = $_POST["id_producto"];
$idorden = $_POST["idorden"];
$kilos = $_POST["kilos"];



$id_productod=base64_decode($id_producto);
$idordend=base64_decode($idorden);

//miro el maximode kilos en stopk
$sqlitem_ordendisvf = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1'");
                while ($rowitem_ordenvf = mysqli_fetch_array($sqlitem_ordendisvf)) {
                    $maxkilos+=$rowitem_ordenvf["kilos"];
                
                    
                }
if($kilos > $maxkilos){$kilos=$maxkilos;}

//esta el producto en la orden
$sqlitem_ordenr=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where id_orden = '$idordend' and id_producto = '$id_productod' and fin='1'");
if ($rowitem_orden = mysqli_fetch_array($sqlitem_ordenr)){

    

    $kilosnew = $rowitem_orden["kilos"]+$kilos;


$precio = $rowitem_orden["precio"];
$precioprov = $rowitem_orden["precioprov"];
$kilosRes=$kilosnew*$precio;
$kilosResprov=$kilosnew*$precioprov;

$kilosResv=number_format($kilosRes, 2, '.', '');
$kilosResprovv=number_format($kilosResprov, 2, '.', '');


$sqlitem_orden = "Update item_orden Set  kilos='$kilosnew', total='$kilosResv', totalprov='$kilosResprovv', conf_entrega='1' Where id_orden = '$idordend' and id_producto = '$id_productod'";
mysqli_query($rjdhfbpqj, $sqlitem_orden) or die(mysqli_error($rjdhfbpqj));



} else{//no esta el producto en la orden

    $idcli=$_SESSION['idcliente'];
    //tipo de cliente
    
    $sqlclientesb = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$idcli'");
    if ($rowclientesb = mysqli_fetch_array($sqlclientesb)) {
        $list = $rowclientesb["tipo_cliente"];
    }
    //fin tipo de cliente
    
    $sqlproductosf=mysqli_query($rjdhfbpqj,"SELECT * FROM productos Where id = '$id_productod'");
    if ($rowproductosf = mysqli_fetch_array($sqlproductosf)){$nombrePro = $rowproductosf["nombre"]; $id_proveedor = $rowproductosf["id_proveedor"];}
    //aca extraigo el precio del p[roducto
    //aca saco los valores  la fecha que toma d eprecio es menor o igual a la fecha de la orden
    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT kilo, costoxcaja, precio_kiloa, precio_cajaa, precio_kilob, precio_cajab, precio_kiloc, precio_cajac, costo_total FROM precioprod Where id_producto = '$id_productod' and  fecha <= '$fechahoy' ORDER BY `precioprod`.`fecha` DESC");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $kilobiene = $rowprecioprod["kilo"];
       
        $costo_total= $rowprecioprod['costo_total'];
        if ($list == '0') {
            $precio_kiloa = $rowprecioprod["precio_kiloa"];
            $precio_kilo = number_format($precio_kiloa, 2, '.', '');
        }
        if ($list == '1') {
            $precio_kilob = $rowprecioprod["precio_kilob"];
            $precio_kilo = number_format($precio_kilob, 2, '.', '');
        }
        if ($list == '2') {
            $precio_kiloc = $rowprecioprod["precio_kiloc"];
            $precio_kilo = number_format($precio_kiloc, 2, '.', '');
    }
    
    }
    //fin valores
    
    //inserto orden
    
    $total=$precio_kilo*$kilos;
    $totalprov=$costo_total*$kilos;
    
    $sqlitem_ordeni = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, id_producto, kilos, nombre, precio, total, nota, id_proveedor, precioprov, totalprov, camioneta, conf_entrega,conf_carga, fin) VALUES ('$idcli', '$idordend', '$fechahoy', '$id_productod', '$kilos', '$nombrePro', '$precio_kilo', '$total', '$nota', '$id_proveedor', '$costo_total', '$totalprov', '$idcamioneta', '1', '1','1');";
    mysqli_query($rjdhfbpqj, $sqlitem_ordeni) or die(mysqli_error($rjdhfbpqj));
    
    //




}
//fin esta el producto en la orden


//actualiso el stock
$sqlitem_ordendisv = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechahoy'  and id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1'");
    if ($rowitem_ordenv = mysqli_fetch_array($sqlitem_ordendisv)) {
        $kilosr = $rowitem_ordenv["kilos"]-$kilos;
        $kidore = $rowitem_ordenv["id"];
       
        $sqlitem_ordenr = "Update item_orden Set  kilos='$kilosr' Where id = ' $kidore '";
            mysqli_query($rjdhfbpqj, $sqlitem_ordenr) or die(mysqli_error($rjdhfbpqj));


    }

        if($kilosr <='0'){






            $sqlborr ="delete from item_orden Where id= '$kidore' and  id_producto='$id_productod' and modo='0' and id_orden='0' and stock='1' and fin='1' ";
            mysqli_query($rjdhfbpqj, $sqlborr) or die(mysqli_error($rjdhfbpqj));
            

    }
//fin stock

//echo 'Id cliente '.$idcli.' ID producto '.$id_productod.'<br> id orden '.$idordend.'<br> id kilos '.$kilos.'<br> total '.$kilosRes.'<br> total provee'.$kilosResprovv.'';

echo("<script language='JavaScript' type='text/javascript'>");
        echo("location.href='remito?jfndhom=$idorden'");
        echo("</script>"); 

 


   