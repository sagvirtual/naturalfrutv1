<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_cliente = $_POST['id_cliente'];
$id_orden = $_POST['id_orden'];
$efectivo = $_POST['ef'];
$transferencia = $_POST['tr'];
$cheque = $_POST['che'];
$echeq = $_POST['eche'];



// Verificar si ya existe el registro
$sql_check = mysqli_query($rjdhfbpqj, "SELECT id,id_cliente FROM formapagor WHERE id_orden ='$id_orden' and id_cliente = '$id_cliente'");

if (mysqli_num_rows($sql_check) > 0) {
    // Si existe → actualizar
    $sql = "UPDATE formapagor 
            SET efectivo='$efectivo', 
                Transferencia='$transferencia', 
                Cheque='$cheque', 
                Echeq='$echeq', 
                responsable='$id_usuarioclav'
            WHERE id_orden ='$id_orden' and id_cliente='$id_cliente'";
} else {
    // Si no existe → insertar
    $sql = "INSERT INTO formapagor (id_cliente, id_orden,efectivo, Transferencia, Cheque, Echeq,responsable) 
            VALUES ('$id_cliente','$id_orden', '$efectivo', '$transferencia', '$cheque', '$echeq','$id_usuarioclav')";
}

mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
