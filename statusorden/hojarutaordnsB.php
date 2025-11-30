<?php
$fecha_desde = $fechacja;

$nombredia = DiaNombregral($rjdhfbpqj, $fecha_desde, $fechacja);



function horainiorden($rjdhfbpqj, $fecha_desde, $idudri, $idorden, $hora)
{



    $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fecha_desde' and e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
    if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

        $hora_pic = $rowordedi['pickinicio'];
    }


    $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fecha_desde' and  e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
    if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

        $finpick = $rowordedf['pickinfin'];
    }


    return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
}

function canitemporhorda($rjdhfbpqj, $total_pedidos, $hora, $fecha_desde, $fechahoy)
{

    $fincon = strtotime($hora);



    $sqlclorinis = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fecha_desde' and pickinicio !='00:00:00' ORDER BY u.pickinicio ASC");
    if ($rowqordedi = mysqli_fetch_array($sqlclorinis)) {

        $hora_picgral = $rowqordedi['pickinicio'];
    }


    $sqlcloriswni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fecha_desde' and pickinfin !='00:00:00' ORDER BY u.pickinfin DESC");
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


function horaini($rjdhfbpqj, $fecha_desde, $idudri, $hora)
{



    $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where fecha3='$fecha_desde' and e.id_usuarioclav='$idudri' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
    if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

        $hora_pic = $rowordedi['pickinicio'];
    }


    $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where fecha3='$fecha_desde' and  e.id_usuarioclav='$idudri'  and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
    if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

        $finpick = $rowordedf['pickinfin'];
    }


    return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
}

function horafin($rjdhfbpqj, $fecha_desde, $idudri)
{
    $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha_ini = '$fecha_desde' and id_usuario='$idudri'");

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
function retrasosusuario($conexion, $fecha_desde, $idudri, $idorden)
{
    $totalRetrasos = 0; // Contador de registros con retraso

    // Consulta SQL
    $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 = '$fecha_desde' AND e.id_usuarioclav = '$idudri'");

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
function retrasosusuarioor($conexion, $fecha_desde, $idudri, $idorden)
{
    $totalRetrasos = 0; // Contador de registros con retraso

    // Consulta SQL
    $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 = '$fecha_desde' AND e.id_usuarioclav = '$idudri' AND e.id = '$idorden'");

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




function cantpick($rjdhfbpqj, $fecha_desde, $idudri)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fecha_desde' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32'");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}

function cantotempicorden($rjdhfbpqj, $fecha_desde, $idudri)
{


    $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where fecha3='$fecha_desde'  and e.picking='1' and modo='0' and e.id_usuarioclav='$idudri'");


    $canvdot = mysqli_num_rows($sqlprofavo);
    return $canvdot;
}


function cantotempicordenusuario($rjdhfbpqj, $fecha_desde, $idudri, $idorden)
{


    $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
            FROM orden e INNER JOIN item_orden u 
            ON e.id = u.id_orden 
            Where fecha3='$fecha_desde'  and e.picking='1'and modo='0' and e.id_usuarioclav='$idudri' and e.id='$idorden'");


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
function quienessongral($rjdhfbpqj, $fecha_desde, $hora)
{


    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente = '34' or tipo_cliente = '56' ORDER BY `usuarios`.`nom_contac` ASC");

    while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
        $idudri = $rowordentd['id'];
        $cantopickpr = horaini($rjdhfbpqj, $fecha_desde, $idudri, $hora);
        $hora_pic = $cantopickpr['hora_pic'];
        $finpick = $cantopickpr['finpick'];


        $horafin = horafin($rjdhfbpqj, $fecha_desde, $idudri);
        $cantopick = cantpick($rjdhfbpqj, $fecha_desde, $idudri);
        $cantotempicorden = cantotempicorden($rjdhfbpqj, $fecha_desde, $idudri);
        // Llamada a la función
        $retrasoTotal = retrasosusuario($rjdhfbpqj, $fecha_desde, $idudri, '');

        if ($retrasoTotal > 0) {
            $avreee = ";color:red;";
        } else {
            $avreee = "";
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
                </tr>
                    


        ';
        }
        $sqldrden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fecha_desde' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32' ORDER BY hora_pic ASC");

        while ($rowodntd = mysqli_fetch_array($sqldrden)) {
            $idorden = $rowodntd["id"];
            $cantotempus = cantotempicordenusuario($rjdhfbpqj, $fecha_desde, $idudri, $idorden);
            $id_ordencod = base64_encode($rowodntd["id"]);
            $id_clientecod = base64_encode($rowodntd["id_cliente"]);

            $cantopicdkpr = horainiorden($rjdhfbpqj, $fecha_desde, $idudri, $idorden, $hora);
            $hora_picd = $cantopicdkpr['hora_pic'];
            $finpickd = $cantopicdkpr['finpick'];

            $retradsoTotal = retrasosusuarioor($rjdhfbpqj, $fecha_desde, $idudri, $idorden);

            if ($retradsoTotal == '0') {
                $retradsoTotal = "";
            }
            $cantdprohor = canitemporhora('00:00', $cantotempus, $hora_picd, $finpickd);

            echo '           <tr id="ordeshechas' . $idudri . '" class="collapse">
                <td style="background-color:#FFF8B8;"></td>

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

function cantpicktotal($rjdhfbpqj, $fecha_desde)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fecha_desde' and col!='0' and col > '3' and col!='32'");

    $canveritot = mysqli_num_rows($sqlclorden);
    return $canveritot;
}


function cantotempic($rjdhfbpqj, $fecha_desde)
{


    $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where fecha3='$fecha_desde'  and e.picking='1'");


    $canvdot = mysqli_num_rows($sqlprofavo);
    return $canvdot;
}


function hojasderut($rjdhfbpqj, $idcamioneta, $fecha_desde, $ifil)
{

    //extrigo nombre de la camioneta
    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
        $nombrecamio = $rowcamionetas["nombre"];
        $idcamioneta = $rowcamionetas["id"];
    }


    //extrigo nombre de la camioneta
    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where camioneta = '$idcamioneta' and fecha='$fecha_desde'");
    if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
        $idchofer = $rowhoja["chofer"];
        $icarga = $rowhoja["position"];

        //extrigo nombre de la camioneta
        $sqlcamiodtas = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id = ' $idchofer'");
        if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)) {
            $nomchofer = $rowcam23["nom_contac"];
        }
    }

    //


    echo '
        <table  class="tabla_sin">
        
        <tr>';

    if ($nombrecamio != "" || $nomchofer != "") {
        echo '<td class="tdbototn" style="font-size: 18pt ">

        &nbsp;Chofer: <strong>' . $nomchofer . '</strong>
            </td>

        <td class="tdbototn" style="font-size: 18pt;">

        &nbsp;Camioneta: <strong>' . $nombrecamio . '</strong> 
            </td>

        <td class="tdbototn" style="font-size: 20pt;font-weight: bold; text-align:center; width:4cm;">

        Carga: Nº ' . $ifil . '

        </td>';
    } else {
        echo '<td class="tdbototn" style="font-size: 20pt;font-weight: bold; text-align:center; width:4cm;">

        Retiro en el local o sin ubicación asignada en la hoja de ruta

        </td>';
    }

    echo '</tr>

    </table>


        <table class="tabla_sin">
            <thead>
                <tr>

                    <th class="tdbototn text-center" style="width: 2cm;">ORDEN</th>
                    <th class="tdbototn text-center" style="width: 2cm;">ID</th>
                    <th class="tdbototn text-center" style="width: 2cm;">ZONA</th>
                    <th class="tdbototn" style="text-align:left;">&nbsp;CLIENTE</th>
                    <th class="tdbototn text-center" style="width: 3cm;">Estado</th>

                </tr>
            </thead>
            <tbody>';
    $comilla = "'";

    $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.recibido, e.total, e.subtotal, e.pedir, e.fecha, e.id as idorden, u.retira, u.id, u.fecha, u.address, u.nom_empr,  u.estado, e.camioneta, u.nom_contac, u.localidad FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fechahoja='$fecha_desde' and u.estado='0' and e.camioneta='$idcamioneta' ORDER BY `position` DESC ");
    $filav = 0;

    $canverificafin = mysqli_num_rows($querycliordn) + 1;
    //fin
    while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
        $id = $rowcategorias["id"];
        $id_cliente = $rowcategorias["id_cliente"];
        $recibido = $rowcategorias["recibido"];
        $mostrarr = ${"mostrarr" . $id};
        $pedir = ${"pedir" . $id};
        $idorden = $rowcategorias["idorden"];
        $pedir = $rowcategorias["pedir"];
        $filav =  $filav + 1;
        $fila =  $canverificafin - $filav;

        $idcod = base64_encode($id);
        $idordencod = base64_encode($idorden);
        $cliente = $rowcategorias["address"];
        $clientev = strtoupper($cliente);
        $nom_empr = $rowcategorias["nom_empr"];
        $nom_emprv = ucfirst(strtolower($nom_empr));
        $nom_contac = $rowcategorias["nom_contac"];
        $nom_contacv = ucfirst(strtolower($nom_contac));
        if (($fila % 2) == 0) {
            //Es un número par
            $colorf = '#fff';
        } else {
            //Es un número impar
            $colorf = '#F1F1F1';
        }
        if ($pedir == '1') {
            $nota = ''; //tranferencia
        } else {
            $nota = "";
        }
        $retira = $rowcategorias["retira"];
        if ($retira == '1') {
            $rita = '*** Retira en el Local ***';
        } else {
            $rita = $clientev . ', ' . $rowcategorias["localidad"];
        }
        $zona = NombreZona($rjdhfbpqj, $id_cliente);
        $positioncol = $rowcategorias["position"];
        //aculiso la posision
        if ($recibido == '0') {
            $selred99 = "selected";
        } else {
            $selred99 = "";
        }
        if ($recibido == '1') {
            $selred1 = "selected";
        } else {
            $selred1 = "";
        }
        if ($recibido == '2') {
            $selred2 = "selected";
        } else {
            $selred2 = "";
        }
        $status = StatusOrden($rjdhfbpqj, $idorden);

        echo '<tr>
                                      <td class="tdbototnfincen" style=" text-align:center; ">' . $fila . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;">Nº' . $idorden . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;">' . $zona . ' </td>
                     <td class="tdbototnfincen" ><strong>' . $nom_contac . '</strong> (' . $nom_emprv . ')  - ' . $rita . '</td>
                                       
                                        
                     <td class="tdbototnfinder text-align:center;">
           
                                              
                         ' . $status . '
                     
                     </td> 
                   
             </td> 
                                      </tr>';
    }


    echo '
    </tbody>
    </table><div id="muestroorden4"></div>';
}



function cantoorden($rjdhfbpqj, $fecha_desde)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' ");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}

function cantoordenespera($rjdhfbpqj, $fecha_desde)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' and  col = '2'");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}


function cantoordenrpreparando($rjdhfbpqj, $fecha_desde)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' and  col = '3' ");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}


function cantoordencpreparadas($rjdhfbpqj, $fecha_desde)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' and col!='0' and col > '3' and col!='32'");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}



//ordenes picadas
function usuariopica($rjdhfbpqj, $fecha_desde, $idusauri)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' and id_usuarioclav='$idusauri'  and col!='0' and col > '3' and col!='32'");

    $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
}

//ordenes picadas
function usuariopicapr($rjdhfbpqj, $fecha_desde, $idusauri)
{
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fecha_desde' and id_usuarioclav='$idusauri'  and col = '3' ");

    $canverificafin = mysqli_num_rows($sqlclorden);
    while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
        $idordenpic = "Nº" . $rowordentd['id'];
        $hora_pic = $rowordentd['hora_pic'];
    }

    return array('idordenpic' => $idordenpic, 'hora_pic' => $hora_pic, 'canverificafin' => $canverificafin);
}



$ordenestotal = cantpicktotal($rjdhfbpqj, $fecha_desde);
//cantida item total
$cantotempic = cantotempic($rjdhfbpqj, $fecha_desde);
$cantd = canitemporhorda($rjdhfbpqj, $cantotempic, $hora, $fecha_desde, $fechahoy);

echo '
<div class="alert alert-success text-center">
  Ordenes realizadas el ' . $fecha_desdever . ' hasta ' .  $fecha_hastaver . '<br>
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
      </tr>
    </thead>
    <tbody>';
//quienes pickan
quienessongral($rjdhfbpqj, $fecha_desde, $hora);
echo '</tbody>
  </table>

<hr>
';


$canverificafin = cantoorden($rjdhfbpqj, $fecha_desde); //la cantidad de ordenes ok

$canvepreespera = cantoordenespera($rjdhfbpqj, $fecha_desde); // la cantidad que esta esperoa
$canvepreparando = cantoordenrpreparando($rjdhfbpqj, $fecha_desde); // la cantidad que esta preparando


$canvepretermi = cantoordencpreparadas($rjdhfbpqj, $fecha_desde); // la cantidad que estan preparadas

// Cálculo del porcentaje pick
$porcentaje = ($canvepretermi / $canverificafin) * 100;

$porcentaje = number_format($porcentaje, 0, '', '');

if ($porcentaje == 100) {
    $barracopick = "";
} else {
    $barracopick = "progress-bar-striped";
}



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
}
