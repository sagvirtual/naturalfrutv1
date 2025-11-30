<?php include ('../f54du60ig65.php');
//include('func_nombreunid.php');
$iditem = $_POST['iditem'];
$cantidad = $_POST['cantidad'];
$descuenun = $_POST['descuenun'];
$total = $_POST['total'];
$unidad = $_POST['unidad'];
$precio = $_POST['precio'];


$sqlodnx = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id = '$iditem'");
if ($rowordnx = mysqli_fetch_array($sqlodnx)) {

    $id_orden = $rowordnx['id_orden'];
    $id_cliente = $rowordnx['id_cliente'];
    $idproduc = $rowordnx['id_producto'];
    $kilos = $rowordnx['kilos'];

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordencompra Where id = '$id_orden'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

        $id_orden = $rowordenx['id'];
        $colorden = $rowordenx['col'];
        if ($colorden > '2') {
            $agregado = '1';
            
            if($colorden != '8'){
            $fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";
        }else{$fechhoras = "Modificado día " . date("d") . " " . date("H:i") . "hs.";}
        } else {
            $agregado = '0';
            $fechhoras = $rowordnx['hora'];
        }
    }
}


if (!empty($iditem && $cantidad > '0')) {

 /*    if($unidad=="0"){ $cantidadfinal=$cantidad;}else{
                
        $cantidbiene=cantbult($rjdhfbpqj,$idproduc);
        
        $cantidadfinal=$cantidad*$cantidbiene;} */
   



    $sqlclientes = "Update item_compra Set  kilos='$cantidad', descuenun='$descuenun', tipounidad='$unidad', precio='$precio', total='$total', agregado='$agregado', hora='$fechhoras' Where id = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
    
    if($idorden !='0'){

    if($unidad=='0'){$unidadc='1';}else{$unidadc='2';}
    
    $sqlclids = "Update prodcom Set  agrstock='$cantidad', costoxcaj='$precio', costo='$precio', unid_bulto='$unidad', cpratotal_prod='$total' Where idordencompra = '$id_orden' and id_producto = '$iditem' and nref='prov'";
    mysqli_query($rjdhfbpqj, $sqlclids) or die(mysqli_error($rjdhfbpqj));
    }

$id_clientecod=base64_encode($id_cliente);
$id_ordencod=base64_encode($id_orden);
echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='index.php?jhduskdsa=$id_clientecod&modif=1&orjndty=$id_ordencod'");
        echo ("</script>");   

}

?>