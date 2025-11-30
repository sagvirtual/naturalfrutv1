<?php function calucloidcuen($rjdhfbpqj){

// Consulta para obtener las órdenes
$sqlOrdenes = mysqli_query($rjdhfbpqj, "SELECT idcuenta FROM orden  ORDER BY `orden`.`idcuenta` DESC");
if ($rowpagdeufp = mysqli_fetch_array($sqlOrdenes)) {
   $idcuentaa = $rowpagdeufp["idcuenta"];

}

$sqlOrdendes = mysqli_query($rjdhfbpqj, "SELECT idcuenta  FROM item_orden  ORDER BY `item_orden`.`idcuenta` DESC");
if ($rowpagdeudfp = mysqli_fetch_array($sqlOrdendes)) {
  $idcuentab = $rowpagdeudfp["idcuenta"];

}

if($idcuentaa <= $idcuentab){$idcuenta=$idcuentab + 1;}else{$idcuenta=$idcuentaa + 1;}

return $idcuenta;
}



?>

<?php 

/* function calucloidcuen($rjdhfbpqj){

$ingresosE = mysqli_query($rjdhfbpqj, "SELECT id FROM item_orden WHERE modo='1'");
$egresosE = mysqli_query($rjdhfbpqj, "SELECT id FROM prodcom WHERE modopag='1'");

$cingresosE = mysqli_num_rows($ingresosE);
$cegresosE = mysqli_num_rows($egresosE);
$idcuenta = $cingresosE + $cegresosE + 1;

return $idcuenta;
} */
?>






