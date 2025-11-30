<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../cajadiaria/fun_idcuenta.php');

$valor = $_POST['pago_valor'];
$tipopag = $_POST['tipopag'];
$fechapag = $_POST['fechapag'];
$ncheque = $_POST['ncheque'];
$vencheque = $_POST['vencheque'];
$nota = $_POST['nota'];
$tipocuneta = $_POST['tipocuneta'];
$id_rubro = $_POST['id_rubro'];

$idcuenta=calucloidcuen($rjdhfbpqj);

    if (!empty($valor) && $valor != "0.00" && $valor != "0") {

        $sqlpagdeu = "INSERT INTO `prodcom` (fecha, valor, modopag, nota, tipopag, ncheque,vencheque,id_usuario,hora,tipocuneta,idcuenta,id_rubro) VALUES ('$fechapag', '$valor', '1', '$nota', '$tipopag', '$ncheque', '$vencheque', '$id_usuarioclav','$horasin','$tipocuneta','$idcuenta','$id_rubro');";
        mysqli_query($rjdhfbpqj, $sqlpagdeu) or die(mysqli_error($rjdhfbpqj));
    }
    echo '<div  class="alert alert-success" style="width: 100%; text-align:center; "><strong>Se agrego Correctamente!...</strong></div>';


  echo'
    <script>

location.reload();
</script>
    
    ';