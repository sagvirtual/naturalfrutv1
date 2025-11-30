<?php  $sdhf="localhost";
$dbdhf="softwar2_dsddksujd";
$udhf="softwar2_koidksus";
$pdhf="6*3o#5VzK6";
$rjdhfbpqj=new mysqli($sdhf,$udhf,$pdhf,$dbdhf);

    // Primero, obtenemos los registros duplicados con su cantidad de repeticiones
    $sql = "SELECT id_producto, fecven, COUNT(*) as repeticiones 
            FROM stockhgz1
            GROUP BY id_producto, fecven
            HAVING repeticiones > 1";

    $result = mysqli_query($rjdhfbpqj, $sql);

    if (!$result) {
        die("Error en la consulta SELECT: " . mysqli_error($rjdhfbpqj));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id_producto = $row['id_producto'];
        $fecven = $row['fecven'];
        $repeticiones = $row['repeticiones'];

        // Ejecutar el UPDATE tantas veces como repeticiones haya
        for ($i = 0; $i < $repeticiones; $i++) {
            $update = "UPDATE stockhgz1 
                       SET fecven = DATE_ADD(fecven, INTERVAL $i DAY) 
                       WHERE id_producto = '$id_producto' AND fecven = '$fecven'
                       LIMIT 1"; // Solo afecta un registro por iteración

            if (!mysqli_query($rjdhfbpqj, $update)) {
                echo "Error en la actualización: " . mysqli_error($rjdhfbpqj);
            }
        }
    }

?>