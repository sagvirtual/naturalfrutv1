<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../cajadiaria/fun_idcuenta.php');
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];
$ncheque = $_POST['ncheque'];
$vencheque = $_POST['vencheque'];
$nota = $_POST['nota'];
$tipocuneta = $_POST['tipocuneta'];
$idcuenta=calucloidcuen($rjdhfbpqj);
$idcliencod=base64_encode($id_cliente);

$sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenprovee Where id_proveedor='$id_cliente' and fecha <= '$fechapag' ORDER BY `ordenprovee`.`id` DESC");
if ($rowordx = mysqli_fetch_array($sqlo2nx)){
   $cidordpag=$rowordx['id'];}

if (!empty($id_cliente) && $cidordpag !='0'  && !empty($cidordpag)) {
    if (!empty($id_cliente) && !empty($valor) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `prodcom` (id_proveedor, id_orden, fecha, valor, modopag, nota, tipopag, ncheque,vencheque,id_usuario,hora,tipocuneta,modo,idcuenta) VALUES ('$id_cliente', '$cidordpag', '$fechapag', '$valor', '1', '$nota', '$tipopag', '$ncheque', '$vencheque', '$id_usuarioclav','$horasin','$tipocuneta','9','$idcuenta');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }

}




 echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='../deuda_proveedores/debe_haber?fort=1&jhduskdsa=$idcliencod&modif=1&modo=$tipocuneta'");
echo ("</script>");
