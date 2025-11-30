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
$id_rubro = $_POST['id_rubro'];
$tipocuneta = $_POST['tipocuneta'];
$modo = $_POST['modo'];
$idcuenta=calucloidcuen($rjdhfbpqj);
$idcliencod=base64_encode($id_cliente);



if($tipocuneta=='0'){
   $sqlre="and fac_a='0'";
}else{
   $sqlre="and fac_r='0'";
    }


  

if($sqlre !=""){
$sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenprovee Where id_proveedor='$id_cliente' and fecha > '2025-01-01' $sqlre and fecha <= '$fechapag' and cerrado='1' ORDER BY id DESC");
if ($rowordx = mysqli_fetch_array($sqlo2nx)){
   $cidordpag=$rowordx['id'];}

if (!empty($id_cliente)) {
    if (!empty($id_cliente) && !empty($valor)  && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `prodcom` (id_proveedor, id_orden, fecha, valor, modopag, nota, tipopag, ncheque,vencheque,id_usuario,hora,tipocuneta,modo,idcuenta,id_rubro) VALUES ('$id_cliente', '$cidordpag', '$fechapag', '$valor', '1', '$nota', '$tipopag', '$ncheque', '$vencheque', '$id_usuarioclav','$horasin','$tipocuneta','9','$idcuenta','$id_rubro');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }

}
}
echo'
        <script>
    
location.reload();
</script>
        
        ';