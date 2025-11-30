<?php //include('../f54du60ig65.php');


$sqlordenact=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where fecha = '$fechahoy'");
while ($rowordenact = mysqli_fetch_array($sqlordenact)){
    $ideordenact=$rowordenact['id'];
    $idclientact=$rowordenact['id_cliente'];
    $sqlitem_ordenact=${"sqlitem_ordenact".$rowordenact['id']};
    $rowitem_ordenact=${"rowitem_ordenact".$rowordenact['id']};
    $sqlitem_ordenactb=${"sqlitem_ordenactb".$rowordenact['id']};
    $idact=${"idact".$rowordenact['id']};
    $id_productoaeu=${"id_productoaeu".$rowordenact['id']};
    $sqlprecioprodact=${"sqlprecioprodact".$rowordenact['id']};
    $rowprecioprodea=${"rowprecioprodea".$rowordenact['id']};
    $tipo_clienteact=${"tipo_clienteact".$rowordenact['id']};
    $precioproav=${"precioproav".$rowordenact['id']};
    $kilosact=${"kilosact".$rowordenact['id']};
    $costo_totalact=${"costo_totalact".$rowordenact['id']};
    $totalact=${"totalact".$rowordenact['id']};
    $totalprovact=${"totalprovact".$rowordenact['id']};
    $sqlclientesact=${"sqlclientesact".$rowordenact['id']};
    $rowclientesact=${"rowclientesact".$rowordenact['id']};
    $ifactualizo=${"ifactualizo".$rowordenact['id']};
    


//busco si hay item que sae aactda
$sqlitem_ordenact=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where fecha = '$fechahoy' and id_cliente='$idclientact' and modo='0' and tipopag='0' and id_producto!='0'");
while ($rowitem_ordenact = mysqli_fetch_array($sqlitem_ordenact)){
    $idact = $rowitem_ordenact["id"];
    $kilosact = $rowitem_ordenact["kilos"];
    $id_productoaeu = $rowitem_ordenact["id_producto"];
    $sqlitem_ordenactbx=${"sqlitem_ordenactbx".$idact};

    //extraido precio segun cliente
    $sqlclientesact=mysqli_query($rjdhfbpqj,"SELECT * FROM clientes Where id = '$idclientact'");
        if ($rowclientesact = mysqli_fetch_array($sqlclientesact)){
        $tipo_clienteact = $rowclientesact["tipo_cliente"];}

    $sqlprecioprodact = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_productoaeu' and fecha='$fechahoy' ORDER BY `precioprod`.`id` DESC");
    if ($rowprecioprodea = mysqli_fetch_array($sqlprecioprodact)) {
        $costo_totalact=$rowprecioprodea["costo_total"];
        if($tipo_clienteact=="0"){$precioproav = $rowprecioprodea["precio_kiloa"];}
        if($tipo_clienteact=="1"){$precioproav = $rowprecioprodea["precio_kilob"];}
        if($tipo_clienteact=="2"){$precioproav = $rowprecioprodea["precio_kiloc"];}
        $ifactualizo='1';
    }else{$ifactualizo='0';}
    $totalact=$precioproav*$kilosact;
    $totalprovact=$costo_totalact*$kilosact;
    //

    if($ifactualizo=='1'){
    $sqlitem_ordenactbx = "Update item_orden Set precio='$precioproav', precioprov='$costo_totalact', total='$totalact', totalprov='$totalprovact' Where id = '$idact'";
    mysqli_query($rjdhfbpqj, $sqlitem_ordenactbx) or die(mysqli_error($rjdhfbpqj));

        }



}

}
