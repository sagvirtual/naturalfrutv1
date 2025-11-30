<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$confirmado = $_POST['confirmado'];

$iditem = $_POST['iditem'];

if ($confirmado == '1') {


    $sqlordend = "Update stockhgz1 Set connohay='$fechahoy',horacon='$horasin', iduscon='$id_usuarioclav' Where id_producto = '$iditem'";
    mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
    $origen = "Confirmo hay Stock";

    FuncActividad($rjdhfbpqj, $idordencam, $id_clienteant, $iditem, $origen, $id_usuarioclav);
}
echo '<script>
location.reload();
</script> ';
//Galletitas Kids Vainilla x 120g (Smookies)
