<?php

function alarmavenci($rjdhfbpqj, $fechahoy)
{
    /* alarma */

    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT id,alarmaven,alarmaven,nombre,estado,unidadnom FROM productos Where estado = '0'");
    while ($rowpr = mysqli_fetch_array($sqlprd)) {
        $idproduc = $rowpr['id'];
        $alarmaven = $rowpr['alarmaven'];
        $unidadnom = $rowpr['unidadnom'];
        $nombre = $rowpr['nombre'];


        /*   if ($unidadnom == "Kg.") {
            $kilo = 1;
            $bulto = "Kg.";
        }
        if ($unidadnom == "Uni.") {
            $kilo = $rowpr['kilo'];
            $bulto = $rowpr['modo_producto'];
        } */

        /* 
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        setlocale(LC_TIME, "es_RA");
        $fechahoy = date("Y-m-d"); */
        $fechah = new DateTime($fechahoy);

        $explodia = explode(".", $alarmaven);
        $diads = $explodia['1'];
        $mesesd = $explodia['0'];

        $fechah->modify('+' . $mesesd . ' months');

        if ($diads == 0) {
            $dias = 0;
        } else {
            $dias = $diads;
        }
        $fechah->modify('+' . $dias . ' days');

        $fechad = $fechah->format('Y-m-d');

        /* fin */
        $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$idproduc' and fecven<='$fechad' and fecven >= '2001-01-01' ORDER BY `stockhgz1`.`fecven` ASC");

        while ($rowsdk = mysqli_fetch_array($sqlsw)) {

            $CantdStock = ${"ver" . $rowsdk["id"]};


            if ($rowsdk['fecven'] <= $fechahoy) {
                $roaviso = "color:red;";
                $alarmavend = '*';
                $nover = "0";
            } else {
                $roaviso = "color:blue;";
                $alarmavend = '';
                $nover = "1";
            }

            $CantdStock = $rowsdk['CantStock'];
            $fechaacomo =  date('Y-m-d', strtotime($rowsdk['fecven']));
            $fechavenprxs =  date('d/m/Y', strtotime($rowsdk['fecven']));


            // Fecha actual
            $fecha_actual = date('Y-m-d');

            // Crear objetos DateTime
            $fecha_vencimiento = new DateTime($fechaacomo);
            $fecha_hody = new DateTime($fecha_actual);

            // Calcular la diferencia
            $diferencia = $fecha_hody->diff($fecha_vencimiento);

            // Obtener los días restantes
            $dias_faltantes = $diferencia->days;





            //if($alarmaven==''){$alarmaven='<p style="color:red;">Vencido</p>';}
            // Inicializa el contador

            if ($CantdStock > 0 && $nover == "1") {
                $suma = 0;
                echo '
                <tr>     <td style="text-align:center;">
                                        <p style="display:none;">' . $fechaacomo . '</p>
                                        
                                    <b style="' . $roaviso . '">' . $alarmavend . '' . $fechavenprxs . '' . $alarmavend . '</b>
                                        
                                        </td>

                                        
                                        <td> ' . $nombre . '</td>
                                        <td style="text-align:center;color:red;"><b> ' . $dias_faltantes . '</b></td>
                                        <td style="width:0px; text-align:center;">' . $CantdStock . ' ' . $unidadnom . ' </td>
                                        <td style="width:0px; text-align:center;"> ' . $alarmaven . ' Meses</td>
                                   

                                        </tr>
                
                ';
                $suma = $suma + 1;
            }
        }
    }
    //   return  $fechavenpd; 
}


/* cantidad */

function alarmavencicanti($rjdhfbpqj, $fechahoy)
{
    $sql = "
        SELECT p.id, p.alarmaven, s.fecven, s.CantStock
        FROM productos p
        INNER JOIN stockhgz1 s ON s.id_producto = p.id
        WHERE p.estado = '0'
          AND s.fecven >= '2001-01-01'
    ";

    $query = mysqli_query($rjdhfbpqj, $sql);
    $suma = 0;

    while ($row = mysqli_fetch_assoc($query)) {
        // Cálculo de la fecha límite
        $fechah = new DateTime($fechahoy);
        [$mesesd, $diads] = explode(".", $row['alarmaven']);
        $fechah->modify('+' . intval($mesesd) . ' months');
        $fechah->modify('+' . intval($diads) . ' days');
        $fechad = $fechah->format('Y-m-d');

        // Comprobación de stock
        if ($row['fecven'] <= $fechad && $row['fecven'] > $fechahoy && $row['CantStock'] > 0) {
            $suma++;
        }
    }

    echo '<span class="badge badge-pill badge-danger" style="position: absolute; top:20px; left:300px; font-size: 20pt;"> ' . $suma . ' </span>';
}
