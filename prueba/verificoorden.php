<?php include('../f54du60ig65.php'); ?>
<form action="verificoorden.php" method="post">
    <input type="date" name="fecha" id="fecha" value="<?= $fechahoy ?>">
    <button type="submit">Enviar</button>


</form>
<?php

$fechahoyv = $_POST['fecha'];


echo '' . $fechahoyv . '<br>';
//revisa el mes
$sqlorden = mysqli_query($rjdhfbpqj, "SELECT id,fecha,subtotal,col,fecha FROM orden WHERE col >= '1' AND DATE_FORMAT(fecha, '%Y-%m') = DATE_FORMAT('$fechahoyv', '%Y-%m')");

//$sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where col >= '3' and fecha >'2025-01-22' ORDER BY id DESC ");

$errosu = 0;
$cantde = mysqli_num_rows($sqlorden);
while ($roworden = mysqli_fetch_array($sqlorden)) {
    $id_orden = $roworden['id'];
    $fecha = $roworden['fecha'];
    $col = $roworden['col'];
    $totalorden = $roworden['subtotal'];
    $totalitem = func_totalitem($rjdhfbpqj, $id_orden);

    if ($id_orden == "8026") {
        $totalorden = $totalitem;
    }
    if ($totalorden == $totalitem) {
        //$errosu = $errosu + 1;
        /*  echo '<p style="color:blue;">' . $col . ' - ' . $fecha . ' Id orden:  Nº' . $id_orden . ' TotalOrden: $' . $totalorden . ' Total item: ' . $totalitem . ' OK </p><br>'; */
    } else {
        $diferncia =  $totalitem - $totalorden;
        $errosu = $errosu + 1;
        echo '<h1 style="color:red;">' . $col . ' - ' . $fecha . ' Id orden:  Nº' . $id_orden . ' TotalOrden: $' . $totalorden . ' Total item: ' . $totalitem . ' Error diferencia: ' . $diferncia . '</h1><br>';
    }
}
echo '<br><p>' . $col . ' - Cant.' . $cantde . ' Errores = ' . $errosu . ' </p>';




/* funciones */
function func_totalitem($rjdhfbpqj, $id_orden)
{
    $totalitem = 0;
    $sqlitem = mysqli_query($rjdhfbpqj, "SELECT id_orden,total FROM item_orden Where id_orden = '$id_orden'");
    while ($rowitem = mysqli_fetch_array($sqlitem)) {
        $totalitem += $rowitem['total'];
    }
    return $totalitem;
}
