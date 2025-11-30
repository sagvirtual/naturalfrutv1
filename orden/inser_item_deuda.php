<?php //include('../f54du60ig65.php');

//miro si hay cliente que tenga orden hoy

$sqlitem_orvendeu=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where fecha = '5000-01-01' and fechaold!='$fechahoy' and stock='7' and noentregado='1'");
if ($rowitem_ordfendeu = mysqli_fetch_array($sqlitem_orvendeu)){

$sqlordendeu=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where fecha = '$fechahoy'");
while ($rowordendeu = mysqli_fetch_array($sqlordendeu)){
    $ideordendeu=$rowordendeu['id'];
    $idclientdeu=$rowordendeu['id_cliente'];
    $sqlitem_ordendeu=${"sqlitem_ordendeu".$rowordendeu['id']};
    $rowitem_ordendeu=${"rowitem_ordendeu".$rowordendeu['id']};
    $sqlitem_ordendeub=${"sqlitem_ordendeub".$rowordendeu['id']};
    $iddeu=${"iddeu".$rowordendeu['id']};
    $id_productoeu=${"id_productoeu".$rowordendeu['id']};
    $sqlprecioproddeu=${"sqlprecioproddeu".$rowordendeu['id']};
    $rowprecioprode=${"rowprecioprode".$rowordendeu['id']};
    $tipo_clientedeu=${"tipo_clientedeu".$rowordendeu['id']};
    $precioproav=${"precioproav".$rowordendeu['id']};
    $kilosdeu=${"kilosdeu".$rowordendeu['id']};
    $costo_totaldeu=${"costo_totaldeu".$rowordendeu['id']};
    $totaldeu=${"totaldeu".$rowordendeu['id']};
    $totalprovdeu=${"totalprovdeu".$rowordendeu['id']};
    $sqlclientesdeu=${"sqlclientesdeu".$rowordendeu['id']};
    $rowclientesdeu=${"rowclientesdeu".$rowordendeu['id']};
    


//busco si hay item que sae adeuda
$sqlitem_ordendeu=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden Where fecha = '5000-01-01' and id_cliente='$idclientdeu' and stock='7' and noentregado='1'");
while ($rowitem_ordendeu = mysqli_fetch_array($sqlitem_ordendeu)){
    $iddeu = $rowitem_ordendeu["id"];
    $kilosdeu = $rowitem_ordendeu["kilos"];
    $id_productoeu = $rowitem_ordendeu["id_producto"];
    $sqlitem_ordendeubx=${"sqlitem_ordendeubx".$iddeu};

    //extraido precio segun cliente
    $sqlclientesdeu=mysqli_query($rjdhfbpqj,"SELECT * FROM clientes Where id = '$idclientdeu'");
        if ($rowclientesdeu = mysqli_fetch_array($sqlclientesdeu)){
        $tipo_clientedeu = $rowclientesdeu["tipo_cliente"];}

    $sqlprecioproddeu = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_productoeu' ORDER BY `precioprod`.`id` DESC");
    if ($rowprecioprode = mysqli_fetch_array($sqlprecioproddeu)) {
        $costo_totaldeu=$rowprecioprode["costo_total"];
        if($tipo_clientedeu=="0"){$precioproav = $rowprecioprode["precio_kiloa"];}
        if($tipo_clientedeu=="1"){$precioproav = $rowprecioprode["precio_kilob"];}
        if($tipo_clientedeu=="2"){$precioproav = $rowprecioprode["precio_kiloc"];}
    }
    $totaldeu=$precioproav*$kilosdeu;
    $totalprovdeu=$costo_totaldeu*$kilosdeu;
    //


    $sqlitem_ordendeubx = "Update item_orden Set id_orden='$ideordendeu', fecha='$fechahoy', precio='$precioproav', precioprov='$costo_totaldeu', total='$totaldeu', totalprov='$totalprovdeu', stock='0', noentregado='0', conf_entrega='0', conf_entrega2='0', conf_carga='0' Where id = '$iddeu'";
    mysqli_query($rjdhfbpqj, $sqlitem_ordendeubx) or die(mysqli_error($rjdhfbpqj));





}

}
}
?>