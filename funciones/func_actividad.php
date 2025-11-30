<?php 
function FuncActividad($rjdhfbpqj, $id_orden, $id_cliente, $id_producto, $origen, $responsable) { 
    $sqlactividad = "INSERT INTO actividad (id_orden, id_cliente, id_producto, origen, responsable) VALUES ('$id_orden', '$id_cliente', '$id_producto', '$origen', '$responsable')";
    mysqli_query($rjdhfbpqj, $sqlactividad);
}
?>