<?php include('../f54du60ig65.php');
include('../cajadiaria/fun_idcuenta.php');

$id_orden = $_POST['id_orden'];
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];
$ncheque = $_POST['ncheque'];
$vencheque = $_POST['vencheque'];
$idcuenta=calucloidcuen($rjdhfbpqj);
$idcliencod=base64_encode($id_cliente);



if (!empty($id_cliente)) {
    if (!empty($id_orden) && !empty($id_cliente) && !empty($valor) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque,vencheque,idcuenta) VALUES ('$id_cliente', '$id_orden', '$fechapag', '$valor', '1', '$nota', '$tipopag', '1', '1', '$ncheque', '$vencheque','$idcuenta');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
}


/* 
echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='../nota_de_pedido/?fort=1&jhduskdsa=$idcliencod'");
echo ("</script>"); */

$id_ordencod=base64_encode($id_orden);

$sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id = '$id_orden'");
if ($rowordx = mysqli_fetch_array($sqlo2nx)){
   $coldden=$rowordx['col'];}
if($coldden=='8'){$refve='1';}

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='../nota_de_pedido/?fort=1&jhduskdsa=$idcliencod&orjndty=$id_ordencod&ref=$refve'");
echo ("</script>");
