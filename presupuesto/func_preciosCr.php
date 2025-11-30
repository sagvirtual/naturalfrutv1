<?php include('../f54du60ig65.php');

$idprodu = $_POST['idprodu'];
$unidad = $_POST['unidad'];
$tipocliente = $_POST['tipocliente'];
$ordedecompra = $_POST['ordedecompra'];

$sqldord = mysqli_query($rjdhfbpqj, "SELECT * FROM item_presupues Where id_orden='$ordedecompra' and id_producto='$idprodu'");
if ($rowudord = mysqli_fetch_array($sqldord)) {

  $presentacion = $rowudord['presentacion'];
  $tipounidad = $rowudord['tipounidad'];


  if ($presentacio > 0) {
    $presentacion = $rowudord['presentacion'];
  } else {
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idprodu'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
      $presentacion = $rowpdaod['kilo'];
    }
  }


  if ($tipounidad == '0') {
    $preciounid = $rowudord['precio'];
  } else {

    $preciounid = $rowudord['precio'] / $presentacion;
  }
}


if ($unidad == 0) {
  $preciouni = $preciounid;
} else {

  $preciouni = $preciounid * $presentacion;
}



echo '' . $preciouni . '';
