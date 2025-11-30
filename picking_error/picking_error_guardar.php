<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$id_producto   = isset($_POST['id_producto'])   ? intval($_POST['id_producto'])   : 0;
$id_orden      = isset($_POST['id_orden'])      ? intval($_POST['id_orden'])      : 0;
$id_resp_error = isset($_POST['id_resp_error']) ? intval($_POST['id_resp_error']) : 0;
$id_control    = isset($_POST['id_control'])    ? intval($_POST['id_control'])    : 0;
$id_cliente    = isset($_POST['id_cliente'])    ? intval($_POST['id_cliente'])    : 0;

/* 
echo "<b>POST RECIBIDO:</b><br>";
echo "id_producto: $id_producto<br>";
echo "id_orden: $id_orden<br>";
echo "id_resp_error: $id_resp_error<br>";
echo "id_control: $id_control<br><br>";
 */
if ($id_producto <= 0 || $id_orden <= 0) {
    // echo "Faltan datos obligatorios";
    exit;
}


// ¿Existe ya un registro para esta combinación?
$sqlsel = "SELECT id FROM picking_error 
           WHERE id_producto='$id_producto' 
             AND id_orden='$id_orden' 
           LIMIT 1";
$rssel = mysqli_query($rjdhfbpqj, $sqlsel) or die(mysqli_error($rjdhfbpqj));

if ($row = mysqli_fetch_array($rssel)) {
    // UPDATE
    $id_existente = intval($row['id']);
    $sqlupd = "UPDATE picking_error SET 
                  id_resp_error='$id_resp_error',
                  fecha_accion=NOW()
               WHERE id='$id_existente'";
    mysqli_query($rjdhfbpqj, $sqlupd) or die(mysqli_error($rjdhfbpqj));
    //  echo "OK: Actualizado (ID $id_existente)";
} else {
    // INSERT
    $sqlins = "INSERT INTO picking_error 
                  (id_producto, id_orden, id_resp_error, id_motivo, id_control, id_cliente, fecha_accion)
               VALUES 
                  ('$id_producto', '$id_orden', '$id_resp_error', '$id_motivo', '$id_control', '$id_cliente', NOW())";
    mysqli_query($rjdhfbpqj, $sqlins) or die(mysqli_error($rjdhfbpqj));
    $nuevo_id = mysqli_insert_id($rjdhfbpqj);
    // echo "OK: Insertado (ID $nuevo_id)";
}
