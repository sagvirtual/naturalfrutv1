<?php include('../f54du60ig65.php');

$id_orden = $_POST['id_orden'];
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];

$idcliencod=base64_encode($id_cliente);

$sqlitem_orden=mysqli_query($rjdhfbpqj,"SELECT * FROM item_orden  ORDER BY `item_orden`.`id` DESC");
if ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)){
    $sumauno=$rowitem_orden["id"] + 1;
    $id_producto = $sumauno;}


if (!empty($id_cliente)) {
    if (!empty($id_cliente) && !empty($valor) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valorprov, modo, nota, tipopag, id_proveedor, cliente_prov, id_producto, conf_entrega, conf_entrega2) VALUES ('$id_cliente', '$id_orden', '$fechapag', '$valor', '1', '$nota', '$tipopag',$id_cliente, '1', '$id_producto', '1', '1');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
}



echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='/cuenta_proveedor/?fort=1&hfbbd=$idcliencod'");
echo ("</script>");
