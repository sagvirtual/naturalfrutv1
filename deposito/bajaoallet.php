<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/func_actividad.php');
$id_pallet = $_POST['id_pallet'];
$idproducto = $_POST['idproducto'];



if (!empty($id_pallet)) {
  $sqlclides = "Update deposito Set fin='1', fecha_mod='$fechahoy', hora_mod='$horasin', id_destino='' Where id_pallet='$id_pallet' and id_producto = '$idproducto'";
  mysqli_query($rjdhfbpqj, $sqlclides) or die(mysqli_error($rjdhfbpqj));


  $origen = "Baja Pallets";

  FuncActividad($rjdhfbpqj, $id_pallet, $id_pallet, $id_pallet, $origen, $id_usuarioclav);
}

echo ("<script language='JavaScript' type='text/javascript'>");
echo ("location.href='../deposito/index.php?idproedit=$idproducto'");
echo ("</script>");
