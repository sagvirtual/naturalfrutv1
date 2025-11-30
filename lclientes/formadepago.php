<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
$id_cliente = $_POST['id_cliente'];
$efectivo = $_POST['ef'];
$transferencia = $_POST['tr'];
$cheque = $_POST['che'];
$echeq = $_POST['eche'];



// Verificar si ya existe el registro
$sql_check = mysqli_query($rjdhfbpqj, "SELECT id,id_cliente FROM formapago WHERE id_cliente = '$id_cliente'");

if (mysqli_num_rows($sql_check) > 0) {
    // Si existe → actualizar
    $sql = "UPDATE formapago 
            SET efectivo='$efectivo', 
                Transferencia='$transferencia', 
                Cheque='$cheque', 
                Echeq='$echeq',
                responsable='$id_usuarioclav'
            WHERE id_cliente='$id_cliente'";
} else {
    // Si no existe → insertar
    $sql = "INSERT INTO formapago (id_cliente, efectivo, Transferencia, Cheque, Echeq,responsable) 
            VALUES ('$id_cliente', '$efectivo', '$transferencia', '$cheque', '$echeq','$id_usuarioclav')";
}

mysqli_query($rjdhfbpqj, $sql) or die(mysqli_error($rjdhfbpqj));
