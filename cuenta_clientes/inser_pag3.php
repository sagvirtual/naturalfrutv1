<?php include('../f54du60ig65.php');
include('../cajadiaria/fun_idcuenta.php');
include('../lusuarios/login.php');
$id_cliente = $_POST["id_cliente"];
$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];
$ncheque = $_POST['ncheque'];
$vencheque = $_POST['vencheque'];
$tipocuneta = $_POST['tipocuneta'];
$cidordpagver = $_POST['idordenpag'];
$nota = $_POST['nota'];
$id_provepag = $_POST['id_proveedor'];
$idcuenta = calucloidcuen($rjdhfbpqj);
$idcliencod = base64_encode($id_cliente);
if (!empty($id_cliente)  && is_numeric($valor) && $valor != 0) {
    $sqlo2nx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente='$id_cliente' and fecha <= '$fechapag' and col!='0' ORDER BY `orden`.`id` DESC");
    if ($rowordx = mysqli_fetch_array($sqlo2nx)) {
        $cidordpag = $rowordx['id'];
        if (!empty($id_cliente) && !empty($valor) && $valor != "0.00" && $valor != "0") {
        } else {
            $cidordpag = '0';
        }

        // if($tipo_usuario=="37"){

        $sqlcliess = "Update orden Set recibido='1', col='31' Where id = '$cidordpagver' and col!='8'";
        mysqli_query($rjdhfbpqj, $sqlcliess) or die(mysqli_error($rjdhfbpqj));

        $sqlclie = "Update orden Set recibido='1' Where id = '$cidordpagver' and col='8'";
        mysqli_query($rjdhfbpqj, $sqlclie) or die(mysqli_error($rjdhfbpqj));
        // }



        $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque,vencheque,idcuenta,id_provepag,nombre) VALUES ('$id_cliente', '$cidordpag', '$fechapag', '$valor', '1', '$nota', '$tipopag', '1', '1', '$ncheque', '$vencheque','$idcuenta','$id_provepag','$cidordpagver');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));

        //$tipocunet+ 1 cuenta R
        if ($id_provepag != '0' && $id_provepag != '' && $id_provepag != ' ') {
            $sqlpagdeup = "INSERT INTO `prodcom` (id_proveedor, id_orden, fecha, valor, modopag, nota, tipopag, ncheque,vencheque,id_usuario,hora,tipocuneta,modo,idcuenta,id_rubro,id_clientepag) VALUES ('$id_provepag', '1', '$fechapag', '$valor', '1', 'Tr', '$tipopag', '$ncheque', '$vencheque', '$id_usuarioclav','$horasin','$tipocuneta','9','$idcuenta','$id_rubro','$id_cliente');";
            mysqli_query($rjdhfbpqj, $sqlpagdeup) or die(mysqli_error($rjdhfbpqj));
        }
    } else {

        if (!empty($id_cliente)) {

            $sqlpagdeu = "INSERT INTO `item_orden` (id_cliente, id_orden, fecha, valor, modo, nota, tipopag, conf_entrega, conf_entrega2, ncheque,vencheque,idcuenta,id_provepag,nombre) VALUES ('$id_cliente', '$nota', '$fechapag', '$valor', '1', '$nota', '$tipopag', '1', '1', '$ncheque', '$vencheque','$idcuenta','$id_provepag','$cidordpagver');";
            mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
        }
    }

    //echo 'Errorxrdg '.$id_cliente.'// '.$valor.'';
}

mysqli_close($rjdhfbpqj);

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("top.location.href='../deuda_clientes/debe_haber?fort=1&jhduskdsa=$idcliencod&modif=1'");
echo ("</script>");
