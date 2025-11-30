<?php include('../f54du60ig65.php');
include('../cajadiaria/fun_idcuenta.php');

$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];
$ncheque = $_POST['ncheque'];
$vencheque = $_POST['vencheque'];
$nota = $_POST['nota'];
$idcuenta=calucloidcuen($rjdhfbpqj);
$idcliencod=base64_encode($id_cliente);

$sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id_cliente='$id_cliente' and fecha <= '$fechapag' ORDER BY `orden`.`id` DESC");
if ($rowordx = mysqli_fetch_array($sqlo2nx)){
   $cidordpag=$rowordx['id'];}

if (!empty($id_cliente) && $cidordpag !='0'  && !empty($cidordpag)) {
    if (!empty($id_cliente) && !empty($valor) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque,vencheque,idcuenta) VALUES ('$id_cliente', '$cidordpag', '$fechapag', '$valor', '1', '$nota', '$tipopag', '1', '1', '$ncheque', '$vencheque', '$idcuenta');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
}




echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='../ingreso_de_cobros/debe_haber?fort=1&jhduskdsa=$idcliencod&modif=1'");
echo ("</script>");
