<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$idordencam     = (int) $_POST['idorden'];
$id_clienteant  = (int) $_POST['id_clienteant'];
$id_clientenew  = (int) $_POST['id_clientenew'];


if ($idordencam > 1 && $id_clienteant > 1 && $id_clientenew > 1) {
    /*    echo '
    Id Orden: ' . $idordencam . ' <br>
    Id Cliente equivocado: ' . $id_clienteant . ' <br>
    Id Cliente Nuevo: ' . $id_clientenew . ' <br>

    
    <br>'; */

    //cambio el id de cliente a los item

    $sqlitem = "Update item_orden Set  id_cliente='$id_clientenew' Where id_orden = '$idordencam' and id_cliente = '$id_clienteant' and modo='0' and valor='0.00'";
    mysqli_query($rjdhfbpqj, $sqlitem) or die(mysqli_error($rjdhfbpqj));

    //cambio el id de cliente a la orden
    $sqlcorden = "Update orden Set  id_cliente='$id_clientenew' Where id = '$idordencam' and id_cliente = '$id_clienteant'";
    mysqli_query($rjdhfbpqj, $sqlcorden) or die(mysqli_error($rjdhfbpqj));
    
        //cambio el id de cliente a la faltantes
    $sqlfaltante = "Update faltantes Set  id_cliente='$id_clientenew' Where id_orden = '$idordencam' and id_cliente = '$id_clienteant'";
    mysqli_query($rjdhfbpqj, $sqlfaltante) or die(mysqli_error($rjdhfbpqj));
    
     $origen="Cambio de cliente";
    
    FuncActividad($rjdhfbpqj, $idordencam, $id_clienteant, $id_producto, $origen, $id_usuarioclav);

    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../notadepedido'");
    echo ("</script>");
} else {


    echo 'Error 898343';
}

mysqli_close($rjdhfbpqj);
