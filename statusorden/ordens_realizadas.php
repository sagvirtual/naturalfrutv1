<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/StatusOrden.php');
include('../funciones/funcDiaNombreGral.php');
include('../funciones/funcNombreresponsable.php');
if ($tipo_usuario == "0" || $tipo_usuario == "33") {

    $_SESSION['fecha_desde'] = $_POST['fecha_desde'];
    $_SESSION['fecha_hasta'] = $_POST['fecha_hasta'];

    $fecha_desde = $_SESSION['fecha_desde'];
    $fecha_hasta = $_SESSION['fecha_hasta'];

    if (empty($fecha_desde)) {
        $fecha_desde = $fechahoy;
        $fecha_hasta = $fechahoy;
    }

    $fecha_desdever = date('d/m/Y', strtotime($fecha_desde));
    $fecha_hastaver = date('d/m/Y', strtotime($fecha_hasta));


?>

    <!DOCTYPE html>


    <html lang="es">

    <head>
        <title>Sistema de Status Ordenes Realizadas 1.0</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    </head>

    <body>




        <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;"
            style="background-color: #0B6CF7; ">
            <p style=" font-size: 10pt; color: white;">Sistema de Status Ordenes Realizadas&nbsp;&nbsp;
                Usuario:&nbsp;<strong><?= $nombrenegocio ?></p>
        </div>




        <div class="container">
            <form action="../statusorden/ordens_realizadas" method="post">
                <div class="row">

                    <div class="col-lg-2 col-6">

                        <a onclick="window.close()">
                            <img src="/assets/images/logopc.png" style="width:38mm;">
                        </a>
                    </div>



                    <div class="col-lg-2 col-6 d-flex align-items-center justify-content-center mb-2" style="gap: 15px;">
                        <a href="javascript:location.reload()">
                            <button class="btn btn-primary">Actualizar</button></a>

                        <a href="../statusorden/">
                            <button type="button" class="btn btn-success">Basico</button></a>
                    </div>




                    <div class="col-lg-8 col-12" style="padding-top: 10px;">

                        <div class="col-md-12 col-lg-12 d-flex align-items-center justify-content-center mb-2" style="gap: 15px;">
                            <label for="fecha_desde" class="mb-0">Desde:</label>
                            <input type="date" id="fecha_desde" name="fecha_desde" value="<?= $fecha_desde ?>" class="form-control" style="width: 200px;">

                            <label for="fecha_hasta" class="mb-0" style="margin-left: 10px;">Hasta:</label>
                            <input type="date" id="fecha_hasta" name="fecha_hasta" value="<?= $fecha_hasta ?>" class="form-control" style="width: 200px;"> <button type="submit" class="btn btn-success" style=" float:right;">
                                Ver
                            </button>
                        </div>






                    </div>
                </div>
            </form>
            <hr>
            <!-- php -->

            <?php

            //errores de picking
            function errorPicing($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri)
            {

                $fecha_desde = $fecha_desde;
                $fecha_hasta = $fecha_hasta;

                $sql = mysqli_query($rjdhfbpqj, "SELECT 
                     e.id, e.fecha3, e.picking,e.id_usuarioclav,e.col,
                     u.fecha_accion,u.id_orden,u.id_resp_error
                    FROM orden e INNER JOIN picking_error u ON e.id = u.id_orden 
                    Where e.fecha3 BETWEEN '$fecha_desde' and '$fecha_hasta' and u.id_resp_error='34' and e.id_usuarioclav='$idudri'");
                $canverificafin = mysqli_num_rows($sql);

                return $canverificafin;
            }


            function horainiorden($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $idorden, $hora)
            {


                $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
                if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

                    $hora_pic = $rowordedi['pickinicio'];
                }


                $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and  e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
                if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

                    $finpick = $rowordedf['pickinfin'];
                }


                return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
            }

            function canitemporhorda($rjdhfbpqj, $total_pedidos, $hora, $fecha_desde, $fecha_hasta, $fechahoy)
            {

                $fincon = strtotime($hora);



                $sqlclorinis = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and pickinicio !='00:00:00' ORDER BY u.pickinicio ASC");
                if ($rowqordedi = mysqli_fetch_array($sqlclorinis)) {

                    $hora_picgral = $rowqordedi['pickinicio'];
                }


                $sqlcloriswni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and pickinfin !='00:00:00' ORDER BY u.pickinfin DESC");
                if ($rowodrdedf = mysqli_fetch_array($sqlcloriswni)) {

                    $finpickgral = $rowodrdedf['pickinfin'];
                }
                /*    $hora_inicio = "07:00";
        if($fecha_desde !=$fechahoy){$hora_fin = "16:00";}else{
        if($fincon >="1737745200" ){$hora_fin = "16:00";}else{$hora_fin = $hora;}
        } */
                //$total_pedidos = 379;

                // Convertir las horas a timestamps
                $inicio = strtotime($hora_picgral);
                $fin = strtotime($finpickgral);

                // Calcular la duración en horas
                $duracion_horas = ($fin - $inicio) / 3600;

                $duracion_horas = number_format($duracion_horas, 0, '.', ',');

                // Calcular el promedio de pedidos por hora
                $promedio_por_hora = $total_pedidos / $duracion_horas;

                // Mostrar el resultado

                $cantprohor = number_format($promedio_por_hora, 0) . " Item x hs en " . $duracion_horas . " horas de trabajo aprox.";

                return $cantprohor;
            }


            function horaini($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $hora)
            {



                $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and e.id_usuarioclav='$idudri' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
                if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

                    $hora_pic = $rowordedi['pickinicio'];
                }


                $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and  e.id_usuarioclav='$idudri'  and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
                if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

                    $finpick = $rowordedf['pickinfin'];
                }


                return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
            }

            function horafin($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri)
            {
                $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha_ini BETWEEN '$fecha_desde' AND '$fecha_hasta' and id_usuario='$idudri'");

                if ($roworded = mysqli_fetch_array($sqlclorini)) {

                    $horafinpick = $roworded['finpick'];
                }
                return $horafinpick;
            }



            // Función para calcular el tiempo de retraso
            function calculotiempo($pickinicio, $pickinfin)
            {
                // Convertimos los valores de la BD en objetos DateTime
                $inicio = new DateTime($pickinicio);
                $fin = new DateTime($pickinfin);

                // Calculamos la diferencia de tiempo
                $picktiemtardo = $inicio->diff($fin);
                $minutostar = ($picktiemtardo->h * 60) + $picktiemtardo->i;

                // Si el retraso es de 10 minutos o más, lo consideramos retraso
                return ($minutostar >= 10 && $minutostar < 200) ? 1 : 0;
            }





            // Función para detectar retrasos en varios registros
            function retrasosusuario($conexion, $fecha_desde, $fecha_hasta, $idudri, $idorden)
            {
                $totalRetrasos = 0; // Contador de registros con retraso

                // Consulta SQL
                $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' AND e.id_usuarioclav = '$idudri'");

                // Procesamos todos los registros con un `while`
                while ($rowqordedi = mysqli_fetch_array($sqlclorinis)) {
                    $pickinicio = $rowqordedi['pickinicio'];
                    $pickinfin = $rowqordedi['pickinfin'];

                    // Si este registro tiene retraso, sumamos 1 al contador
                    if (calculotiempo($pickinicio, $pickinfin)) {
                        $totalRetrasos++;
                    }
                }

                return $totalRetrasos; // Retorna el número total de retrasos detectados
            }

            // Función para detectar retrasos en varios registros
            function retrasosusuarioor($conexion, $fecha_desde, $fecha_hasta, $idudri, $idorden)
            {
                $totalRetrasos = 0; // Contador de registros con retraso

                // Consulta SQL
                $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' AND e.id_usuarioclav = '$idudri' AND e.id = '$idorden'");

                // Procesamos todos los registros con un `while`
                while ($rowqordedi = mysqli_fetch_array($sqlclorinis)) {
                    $pickinicio = $rowqordedi['pickinicio'];
                    $pickinfin = $rowqordedi['pickinfin'];

                    // Si este registro tiene retraso, sumamos 1 al contador
                    if (calculotiempo($pickinicio, $pickinfin)) {
                        $totalRetrasos++;
                    }
                }

                return $totalRetrasos; // Retorna el número total de retrasos detectados
            }




            function cantpick($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32'");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }

            function cantotempicorden($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri)
            {


                $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta'  and e.picking='1' and modo='0' and e.id_usuarioclav='$idudri'");


                $canvdot = mysqli_num_rows($sqlprofavo);
                return $canvdot;
            }


            function cantotempicordenusuario($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $idorden)
            {


                $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
            FROM orden e INNER JOIN item_orden u 
            ON e.id = u.id_orden 
            Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta'  and e.picking='1'and modo='0' and e.id_usuarioclav='$idudri' and e.id='$idorden'");


                $canvdot = mysqli_num_rows($sqlprofavo);
                return $canvdot;
            }
            function canitemporhora($hora_inicio, $total_pedidos, $hora_pic, $finpick)
            {

                if (!empty($hora_pic)) {
                    /*   $hora_inicio = "07:00";
            if($fecha_desde !=$fechahoy){$hora_fin = "16:00";}else{
            if($hora_fin >="16:00" ){$hora_fin = "16:00";}else{$hora_fin = $hora;}
            }  */
                    //$total_pedidos = 379;

                    // Convertir las horas a timestamps
                    $inicio = strtotime($hora_pic);
                    $fin = strtotime($finpick);

                    // Calcular la duración en horas
                    $duracion_horas = ($fin - $inicio) / 3600;

                    $duracion_horas = number_format($duracion_horas, 0, '.', ',');

                    // Calcular el promedio de pedidos por hora
                    $promedio_por_hora = $total_pedidos / $duracion_horas;

                    // Mostrar el resultado

                    /* $cantprohor=number_format($promedio_por_hora, 0)." Item x hs en ".$duracion_horas. " horas de trabajo aprox." ;

                    return $cantprohor;
                */


                    // Mostrar el resultado

                    $cantprohor = number_format($promedio_por_hora, 0) . " Item x hs";
                    if ($cantprohor > 4) {
                        $cantprohor = number_format($promedio_por_hora, 0) . " Item x hs";
                    } else {
                        $cantprohor = "";
                    }
                    return $cantprohor;
                }
            }
            function quienessongral($rjdhfbpqj, $fecha_desde, $fecha_hasta, $hora)
            {


                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente = '34' or tipo_cliente = '56' ORDER BY `usuarios`.`nom_contac` ASC");

                while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
                    $idudri = $rowordentd['id'];
                    $cantopickpr = horaini($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $hora);
                    $hora_pic = $cantopickpr['hora_pic'];
                    $finpick = $cantopickpr['finpick'];
                    $rerrTotal = errorPicing($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri);

                    // $horafin = horafin($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri);
                    $cantopick = cantpick($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri);
                    $cantotempicorden = cantotempicorden($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri);
                    // Llamada a la función
                    $retrasoTotal = retrasosusuario($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, '');

                    if ($retrasoTotal > 0) {
                        $avreee = ";color:red;";
                    } else {
                        $avreee = "";
                    }
                    if ($rerrTotal > 0) {
                        $rerrTotalcd = ";color:red;";
                    } else {
                        $rerrTotalcd = "";
                    }
                    $cantprohor = canitemporhora('00:00', $cantotempicorden, $hora_pic, $finpick);
                    if ($cantopick > 0) {

                        echo '
           <tr data-bs-toggle="collapse" data-bs-target="#ordeshechas' . $idudri . '">
                <td>' . $rowordentd['nom_contac'] . '</td>

                <td style="text-align:center">' . $cantopick . '</td>
                <td style="text-align:center">' . $cantotempicorden . '</td>

                <td style="text-align:center">' . $cantprohor . '</td>
                <td style="text-align:center ' . $avreee . '">' . $retrasoTotal . '</td>
                <td style="text-align:center ' . $rerrTotalcd . '">' . $rerrTotal . '</td>
                </tr>
                    


        ';
                    }
                    $sqldrden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32' ORDER BY fecha3 ASC");

                    while ($rowodntd = mysqli_fetch_array($sqldrden)) {
                        $idorden = $rowodntd["id"];
                        $cantotempus = cantotempicordenusuario($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $idorden);
                        $id_ordencod = base64_encode($rowodntd["id"]);
                        $id_clientecod = base64_encode($rowodntd["id_cliente"]);

                        $cantopicdkpr = horainiorden($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $idorden, $hora);
                        $hora_picd = $cantopicdkpr['hora_pic'];
                        $finpickd = $cantopicdkpr['finpick'];

                        $retradsoTotal = retrasosusuarioor($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idudri, $idorden);

                        if ($retradsoTotal == '0') {
                            $retradsoTotal = "";
                        }
                        $cantdprohor = canitemporhora('00:00', $cantotempus, $hora_picd, $finpickd);

                        echo '           <tr id="ordeshechas' . $idudri . '" class="collapse">
                <td style="background-color:#FFF8B8;">Día Picking ' . date('d/m/Y', strtotime($rowodntd["fecha3"])) . '</td>

                <td style="text-align:center;background-color:#FFF8B8;">
                <a href="../nota_de_pedido/?jhduskdsa=' . $id_clientecod . '&orjndty=' . $id_ordencod . '" target="_blank" ">  
                Nº' . $rowodntd["id"] . '</a></td>
                <td style="text-align:center;background-color:#FFF8B8;">' . $cantotempus . '</td>
                <td style="text-align:center;background-color:#FFF8B8;">' . $cantdprohor . '</td>
                <td style="text-align:center;background-color:#FFF8B8">' . $retradsoTotal . '</td>
                </tr>
                ';
                    }
                }
            }

            function cantpicktotal($rjdhfbpqj, $fecha_desde, $fecha_hasta)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta' and col!='0' and col > '3' and col!='32'");

                $canveritot = mysqli_num_rows($sqlclorden);
                return $canveritot;
            }


            function cantotempic($rjdhfbpqj, $fecha_desde, $fecha_hasta)
            {


                $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where e.fecha3 BETWEEN '$fecha_desde' AND '$fecha_hasta'  and e.picking='1'");


                $canvdot = mysqli_num_rows($sqlprofavo);
                return $canvdot;
            }





            function cantoorden($rjdhfbpqj, $fecha_desde, $fecha_hasta)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta' ");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }

            function cantoordenespera($rjdhfbpqj,  $fecha_desde, $fecha_hasta)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta'  and  col = '2'");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }


            function cantoordenrpreparando($rjdhfbpqj,  $fecha_desde, $fecha_hasta)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta'  and  col = '3' ");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }


            function cantoordencpreparadas($rjdhfbpqj,  $fecha_desde, $fecha_hasta)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta'  and col!='0' and col > '3' and col!='32'");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }



            //ordenes picadas
            function usuariopica($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idusauri)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta'  and id_usuarioclav='$idusauri'  and col!='0' and col > '3' and col!='32'");

                $canverificafin = mysqli_num_rows($sqlclorden);
                return $canverificafin;
            }

            //ordenes picadas
            function usuariopicapr($rjdhfbpqj, $fecha_desde, $fecha_hasta, $idusauri)
            {
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja BETWEEN '$fecha_desde' AND '$fecha_hasta' and id_usuarioclav='$idusauri'  and col = '3' ");

                $canverificafin = mysqli_num_rows($sqlclorden);
                while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
                    $idordenpic = "Nº" . $rowordentd['id'];
                    $hora_pic = $rowordentd['hora_pic'];
                }

                return array('idordenpic' => $idordenpic, 'hora_pic' => $hora_pic, 'canverificafin' => $canverificafin);
            }



            $ordenestotal = cantpicktotal($rjdhfbpqj, $fecha_desde, $fecha_hasta);
            //cantida item total
            $cantotempic = cantotempic($rjdhfbpqj, $fecha_desde, $fecha_hasta);
            $cantd = canitemporhorda($rjdhfbpqj, $cantotempic, $hora, $fecha_desde, $fecha_hasta, $fechahoy);

            echo '
<div class="alert alert-success text-center">
  Ordenes realizadas desde ' . $fecha_desdever . ' hasta ' .  $fecha_hastaver . '<br>
  <h1><strong>Total:' . $ordenestotal . '</strong> </h1>
' . $cantotempic . ' item. / ' . $cantd . '
</div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Usuario</th>
        <th class="text-center">Ordenes</th>
        <th class="text-center">Cant. Item</th>
        
        <th class="text-center">Promedio</th>
        <th class="text-center">Retrasos</th>
        <th class="text-center">Errores</th>
      </tr>
    </thead>
    <tbody>';
            //quienes pickan
            quienessongral($rjdhfbpqj, $fecha_desde, $fecha_hasta, $hora);
            echo '</tbody>
  </table>

<hr>
';


            $canverificafin = cantoorden($rjdhfbpqj, $fecha_desde, $fecha_hasta); //la cantidad de ordenes ok

            $canvepreespera = cantoordenespera($rjdhfbpqj, $fecha_desde, $fecha_hasta); // la cantidad que esta esperoa
            $canvepreparando = cantoordenrpreparando($rjdhfbpqj, $fecha_desde, $fecha_hasta); // la cantidad que esta preparando


            $canvepretermi = cantoordencpreparadas($rjdhfbpqj, $fecha_desde, $fecha_hasta); // la cantidad que estan preparadas

            // Cálculo del porcentaje pick
            $porcentaje = ($canvepretermi / $canverificafin) * 100;

            $porcentaje = number_format($porcentaje, 0, '', '');

            if ($porcentaje == 100) {
                $barracopick = "";
            } else {
                $barracopick = "progress-bar-striped";
            }


            /* 
            if ($canverificafin != 0) {
                echo '

<ul class="list-group">
<li class="list-group-item text-center">Total de Ordenes: ' . $canverificafin . '</li>
</ul>






<br>








<br>






';
            } else {
                echo 'Sin Actividad..';
            } */
            ?>

            <!-- fin php -->

            <br><br>
            <a href="../../" tabindex="-1">
                <button type="button" class="btn btn-dark" style="width: 100%;" tabindex="-1">Panel</button></a>
        </div>
        </div>


    </body>

    </html>
<? } ?>