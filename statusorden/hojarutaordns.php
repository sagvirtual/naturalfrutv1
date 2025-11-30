<?php 
$fechadecod=$fechacja;

$nombredia=DiaNombregral($rjdhfbpqj,$fechadecod,$fechacja);



function horainiorden($rjdhfbpqj,$fechadecod,$idudri,$idorden,$hora){



    $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fechadecod' and e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
      if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

        $hora_pic=$rowordedi['pickinicio'];
    } 


    $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fechadecod' and  e.id_usuarioclav='$idudri' and e.id='$idorden' and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
      if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

        $finpick=$rowordedf['pickinfin'];
    } 


    return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
    }

function canitemporhorda($rjdhfbpqj,$total_pedidos,$hora,$fechadecod,$fechahoy){

    $fincon = strtotime($hora);



    $sqlclorinis = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fechadecod' and pickinicio !='00:00:00' ORDER BY u.pickinicio ASC");
      if ($rowqordedi = mysqli_fetch_array($sqlclorinis)) {

        $hora_picgral=$rowqordedi['pickinicio'];
    } 


    $sqlcloriswni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
    FROM orden e INNER JOIN item_orden u 
    ON e.id = u.id_orden 
    Where fecha3='$fechadecod' and pickinfin !='00:00:00' ORDER BY u.pickinfin DESC");
      if ($rowodrdedf = mysqli_fetch_array($sqlcloriswni)) {

        $finpickgral=$rowodrdedf['pickinfin'];
    } 
     /*    $hora_inicio = "07:00";
        if($fechadecod !=$fechahoy){$hora_fin = "16:00";}else{
        if($fincon >="1737745200" ){$hora_fin = "16:00";}else{$hora_fin = $hora;}
        } */
        //$total_pedidos = 379;
        
        // Convertir las horas a timestamps
        $inicio = strtotime($hora_picgral);
        $fin = strtotime($finpickgral);
        
        // Calcular la duración en horas
        $duracion_horas = ($fin - $inicio) / 3600;

        $duracion_horas =number_format($duracion_horas, 0, '.', ',');
        
        // Calcular el promedio de pedidos por hora
        $promedio_por_hora = $total_pedidos / $duracion_horas;
        
        // Mostrar el resultado
        
        $cantprohor=number_format($promedio_por_hora, 0)." Item x hs en ".$duracion_horas. " horas de trabajo aprox." ;
    
        return $cantprohor;
    }
    

function quienessongral($rjdhfbpqj,$fechadecod,$hora){

    function horaini($rjdhfbpqj,$fechadecod,$idudri,$hora){



        $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinicio,u.pickinfin
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where fecha3='$fechadecod' and e.id_usuarioclav='$idudri' and pickinicio !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinicio ASC");
          if ($rowordedi = mysqli_fetch_array($sqlclorini)) {

            $hora_pic=$rowordedi['pickinicio'];
        } 


        $sqlclorisni = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav,u.pickinfin,u.id_orden
        FROM orden e INNER JOIN item_orden u 
        ON e.id = u.id_orden 
        Where fecha3='$fechadecod' and  e.id_usuarioclav='$idudri'  and pickinfin !='00:00:00' and pickinfin < '$hora' ORDER BY u.pickinfin DESC");
          if ($rowordedf = mysqli_fetch_array($sqlclorisni)) {

            $finpick=$rowordedf['pickinfin'];
        } 


        return array('hora_pic' => $hora_pic, 'finpick' => $finpick);
        }

        function horafin($rjdhfbpqj,$fechadecod,$idudri){
            $sqlclorini = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha_ini = '$fechadecod' and id_usuario='$idudri'");
        
            if ($roworded = mysqli_fetch_array($sqlclorini)) {
    
                $horafinpick=$roworded['finpick'];
            }
            return $cantopickpr;
            }



// Función para calcular el tiempo de retraso
function calculotiempo($pickinicio, $pickinfin) {
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
function retrasosusuario($conexion, $fechadecod, $idudri, $idorden) {
    $totalRetrasos = 0; // Contador de registros con retraso

    // Consulta SQL
    $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 = '$fechadecod' AND e.id_usuarioclav = '$idudri'");

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
function retrasosusuarioor($conexion, $fechadecod, $idudri, $idorden) {
    $totalRetrasos = 0; // Contador de registros con retraso

    // Consulta SQL
    $sqlclorinis = mysqli_query($conexion, "SELECT e.id, e.fecha3, e.picking, e.id_usuarioclav, 
                                                    u.pickinicio, u.pickinfin, u.id_orden
                                             FROM orden e 
                                             INNER JOIN item_orden u ON e.id = u.id_orden 
                                             WHERE e.fecha3 = '$fechadecod' AND e.id_usuarioclav = '$idudri' AND e.id = '$idorden'");

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




        function cantpick($rjdhfbpqj,$fechadecod,$idudri){
            $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fechadecod' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32'");
        
            $canverificafin = mysqli_num_rows($sqlclorden);
        return $canverificafin;
            }

            function cantotempicorden($rjdhfbpqj,$fechadecod,$idudri){


                $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where fecha3='$fechadecod'  and e.picking='1' and modo='0' and e.id_usuarioclav='$idudri'");
    
            
                $canvdot = mysqli_num_rows($sqlprofavo);
            return $canvdot;
               
        
        }


        function cantotempicordenusuario($rjdhfbpqj,$fechadecod,$idudri,$idorden){


            $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking,e.id_usuarioclav
            FROM orden e INNER JOIN item_orden u 
            ON e.id = u.id_orden 
            Where fecha3='$fechadecod'  and e.picking='1'and modo='0' and e.id_usuarioclav='$idudri' and e.id='$idorden'");

        
            $canvdot = mysqli_num_rows($sqlprofavo);
        return $canvdot;
           
    
    }

function canitemporhora($hora_inicio,$total_pedidos,$hora_pic,$finpick){

if(!empty($hora_pic)){
  /*   $hora_inicio = "07:00";
    if($fechadecod !=$fechahoy){$hora_fin = "16:00";}else{
    if($hora_fin >="16:00" ){$hora_fin = "16:00";}else{$hora_fin = $hora;}
    }  */
    //$total_pedidos = 379;
    
    // Convertir las horas a timestamps
    $inicio = strtotime($hora_pic);
    $fin = strtotime($finpick);
    
    // Calcular la duración en horas
    $duracion_horas = ($fin - $inicio) / 3600;

    $duracion_horas =number_format($duracion_horas, 0, '.', ',');
    
    // Calcular el promedio de pedidos por hora
    $promedio_por_hora = $total_pedidos / $duracion_horas;
    
    // Mostrar el resultado
    
    /* $cantprohor=number_format($promedio_por_hora, 0)." Item x hs en ".$duracion_horas. " horas de trabajo aprox." ;

    return $cantprohor;
 */
    
    
    // Mostrar el resultado
   
    $cantprohor=number_format($promedio_por_hora, 0)." Item x hs" ;
 if($cantprohor > 4){$cantprohor=number_format($promedio_por_hora, 0)." Item x hs" ;}else{$cantprohor="";}
    return $cantprohor;
}


}



    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente = '34' or tipo_cliente = '56' ORDER BY `usuarios`.`nom_contac` ASC");
    
     while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
        $idudri=$rowordentd['id'];
        $cantopickpr=horaini($rjdhfbpqj,$fechadecod,$idudri,$hora);
        $hora_pic= $cantopickpr['hora_pic'];
        $finpick= $cantopickpr['finpick'];


        $horafin=horafin($rjdhfbpqj,$fechadecod,$idudri);
        $cantopick=cantpick($rjdhfbpqj,$fechadecod,$idudri);
        $cantotempicorden=cantotempicorden($rjdhfbpqj,$fechadecod,$idudri);
       // Llamada a la función
$retrasoTotal = retrasosusuario($rjdhfbpqj, $fechadecod, $idudri, $idorden);

if($retrasoTotal>0){$avreee=";color:red;";}else{$avreee="";}
$cantprohor=canitemporhora($hora_inicio,$cantotempicorden,$hora_pic,$finpick);
        if($cantopick>0){

        echo '
           <tr data-bs-toggle="collapse" data-bs-target="#ordeshechas'.$idudri.'">
<td>'.$rowordentd['nom_contac'].'</td>

<td style="text-align:center">'. $cantopick.'</td>
<td style="text-align:center">'.$cantotempicorden.'</td>
<td style="text-align:center">'.$hora_pic.'</td>
<td style="text-align:center">'.$finpick.'</td>

<td style="text-align:center">'.$cantprohor.'</td>
<td style="text-align:center '.$avreee.'">'.$retrasoTotal.'</td>
</tr>
       


        ';
        

     }
     $sqldrden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fechadecod' and id_usuarioclav='$idudri' and col!='0' and col > '3' and col!='32' ORDER BY hora_pic ASC");
        
     while ($rowodntd = mysqli_fetch_array($sqldrden)) {
        $idorden=$rowodntd["id"];
        $cantotempus=cantotempicordenusuario($rjdhfbpqj,$fechadecod,$idudri,$idorden);
        $id_ordencod=base64_encode($rowodntd["id"]);
        $id_clientecod=base64_encode($rowodntd["id_cliente"]);

        $cantopicdkpr=horainiorden($rjdhfbpqj,$fechadecod,$idudri,$idorden,$hora);
        $hora_picd= $cantopicdkpr['hora_pic'];
        $finpickd= $cantopicdkpr['finpick'];
       
        $retradsoTotal = retrasosusuarioor($rjdhfbpqj, $fechadecod, $idudri, $idorden);

if($retradsoTotal=='0'){$retradsoTotal="";}
$cantdprohor=canitemporhora($hora_inicio,$cantotempus,$hora_picd,$finpickd);

 echo'           <tr id="ordeshechas'.$idudri.'" class="collapse">
<td style="background-color:#FFF8B8;"></td>

<td style="text-align:center;background-color:#FFF8B8;">
<a href="../nota_de_pedido/?jhduskdsa='.$id_clientecod.'&orjndty='.$id_ordencod.'" target="_blank" ">  
Nº'.$rowodntd["id"].'</a></td>
<td style="text-align:center;background-color:#FFF8B8;">'.$cantotempus.'</td>
<td style="text-align:center;background-color:#FFF8B8;">'.$hora_picd.'</td>
<td style="text-align:center;background-color:#FFF8B8;">'.$finpickd.'</td>
<td style="text-align:center;background-color:#FFF8B8;">'.$cantdprohor.'</td>
<td style="text-align:center;background-color:#FFF8B8">'.$retradsoTotal.'</td>
</tr>
';
     }
    
    }

    }

        function cantpicktotal($rjdhfbpqj,$fechadecod){
            $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fecha3='$fechadecod' and col!='0' and col > '3' and col!='32'");
        
            $canveritot = mysqli_num_rows($sqlclorden);
        return $canveritot;
            }
            

            function cantotempic($rjdhfbpqj,$fechadecod){


                $sqlprofavo = mysqli_query($rjdhfbpqj, "SELECT e.id, e.fecha3, e.picking
                FROM orden e INNER JOIN item_orden u 
                ON e.id = u.id_orden 
                Where fecha3='$fechadecod'  and e.picking='1'");

            
                $canvdot = mysqli_num_rows($sqlprofavo);
            return $canvdot;
               
        
        }

    




$ordenestotal=cantpicktotal($rjdhfbpqj,$fechadecod);
//cantida item total
$cantotempic=cantotempic($rjdhfbpqj,$fechadecod);
$cantd=canitemporhorda($rjdhfbpqj,$cantotempic,$hora,$fechadecod,$fechahoy);

echo'
<div class="alert alert-success text-center">
  Ordenes realizadas el '.$fechacjaver.'<br><h1><strong>Total:'.$ordenestotal.'</strong> </h1>
'.$cantotempic.' item. / '.$cantd.'
</div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Usuario</th>
        <th class="text-center">Ordenes</th>
        <th class="text-center">Cant. Item</th>
        <th class="text-center">Hora Inicio</th>
        <th class="text-center">Hora Fin</th>
        
        <th class="text-center">Promedio</th>
        <th class="text-center">Retrasos</th>
      </tr>
    </thead>
    <tbody>';
    //quienes pickan
    quienessongral($rjdhfbpqj,$fechadecod,$hora);
    echo'</tbody>
  </table>

<hr>
';








echo '
<button data-bs-toggle="collapse" class="btn btn-dark" data-bs-target="#hojaruta" style="width:100%;">Ordenes '.$nombredia.' '.$fechacjaver.' </button>
<div id="hojaruta" class="collapse">';

include('../funciones/funcZonas.php');


$fechaexplo = explode("-", $fechadecod);
$diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

$fechats = strtotime($fechadecod);
$dayver = date('w', $fechats);


if (!empty($diaselec)) {
    if ($dayver == '1') {
        $activla1 = "active";
        $selectearial1 = "true";
        $dianombr = "Lunes";
        $diasql = "position1";
    } else {
        $selectearial1 = "false";
    }
    if ($dayver == '2') {
        $activla2 = "active";
        $selectearial2 = "true";
        $dianombr = "Martes";
        $diasql = "position2";
    } else {
        $selectearial2 = "false";
    }
    if ($dayver == '3') {
        $activla3 = "active";
        $selectearial3 = "true";
        $dianombr = "Miercoles";
        $diasql = "position3";
    } else {
        $selectearial3 = "false";
    }
    if ($dayver == '4') {
        $activla4 = "active";
        $selectearial4 = "true";
        $dianombr = "Jueves";
        $diasql = "position4";
    } else {
        $selectearial4 = "false";
    }
    if ($dayver == '5') {
        $activla5 = "active";
        $selectearial5 = "true";
        $dianombr = "Viernes";
        $diasql = "position5";
    } else {
        $selectearial5 = "false";
    }
    if ($dayver == '6') {
        $activla6 = "active";
        $selectearial6 = "true";
        $dianombr = "Sábado";
        $diasql = "position6";
    } else {
        $selectearial6 = "false";
    }

    if ($dayver == '0') {
        $activla0 = "active";
        $selectearial0 = "true";
        $dianombr = "Domingo";
        $diasql = "position0";
    } else {
        $selectearial0 = "false";
    }
}
?>




<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .tabla_sin {
        border-collapse: collapse;
        border: none;
       
    }

    .tdbototn {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 2px;
        border-top-width: 2px;
        border-left-width: 2px;
        border-right-width: 2px;
    }

    .tdbototnfiniz {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 1px;
        border-top-width: 1px;
        border-left-width: 2px;
        border-right-width: 1px;
        padding-right: 5px;
        padding-left: 5px;
    }

    .tdbototnfincen {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 1px;
        border-top-width: 1px;
        border-left-width: 2px;
        border-right-width: 2px;
        padding-right: 5px;
        padding-left: 5px;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .tdbototnfinder {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 1px;
        border-top-width: 1px;
        border-left-width: 1px;
        border-right-width: 2px;
        text-align: center;

    }

    .tdbototnfinizfin {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 2px;
        border-top-width: 1px;
        border-left-width: 2px;
        border-right-width: 1px;
        padding-right: 5px;
        padding-left: 5px;
    }

    .tdbototnfincenfin {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 2px;
        border-top-width: 1px;
        border-left-width: 2px;
        border-right-width: 2px;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    .tdbototnfinderfin {
        border-style: solid;
        border-color: #000000;
        border-bottom-width: 2px;
        border-top-width: 1px;
        border-left-width: 1px;
        border-right-width: 2px;
        text-align: center;

    }
    td {
        padding: 0px;
    }

    table {
        width: 100%;
    }
</style>

<?php
 
 echo '
<div class="tdbototn" style="text-align:center;font-size: 14pt;font-weight: bold;"  data-bs-target="#hojaruta">
 
  &nbsp;*** Hoja de Ruta día ' . $numdia . ' ' . $dianombr . '  ' . $diaymes . '  ***
 </div>';
 
?>

<? 

function hojasderut($rjdhfbpqj,$idcamioneta,$fechadecod,$ifil){

//extrigo nombre de la camioneta
$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $nombrecamio = $rowcamionetas["nombre"];
    $idcamioneta = $rowcamionetas["id"];
}


//extrigo nombre de la camioneta
$sqlhoja=mysqli_query($rjdhfbpqj,"SELECT * FROM hoja Where camioneta = '$idcamioneta' and fecha='$fechadecod'");
if ($rowhoja = mysqli_fetch_array($sqlhoja)){
$idchofer = $rowhoja["chofer"];
$icarga = $rowhoja["position"];

//extrigo nombre de la camioneta
$sqlcamiodtas=mysqli_query($rjdhfbpqj,"SELECT * FROM usuarios Where id = ' $idchofer'");
if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)){
$nomchofer = $rowcam23["nom_contac"];
}
}

//


echo '
<table  class="tabla_sin">
 
<tr>';

if($nombrecamio !="" || $nomchofer !=""){
echo'<td class="tdbototn" style="font-size: 18pt ">

 &nbsp;Chofer: <strong>'.$nomchofer.'</strong>
    </td>

<td class="tdbototn" style="font-size: 18pt;">

 &nbsp;Camioneta: <strong>' . $nombrecamio .'</strong> 
    </td>

<td class="tdbototn" style="font-size: 20pt;font-weight: bold; text-align:center; width:4cm;">

Carga: Nº '.$ifil.'

</td>';
}else{
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
    $comilla="'";

                $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.recibido, e.total, e.subtotal, e.pedir, e.fecha, e.id as idorden, u.retira, u.id, u.fecha, u.address, u.nom_empr,  u.estado, e.camioneta, u.nom_contac, u.localidad FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fechahoja='$fechadecod' and u.estado='0' and e.camioneta='$idcamioneta' ORDER BY `position` DESC ");            
           
        
                $canverificafin = mysqli_num_rows($querycliordn)+1;
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
                $nota = '';//tranferencia
            } else {
                $nota = "";
            } 
            $retira = $rowcategorias["retira"];
            if($retira=='1'){$rita='*** Retira en el Local ***';}
            else{$rita=$clientev.', '.$rowcategorias["localidad"];}
            $zona=NombreZona($rjdhfbpqj,$id_cliente);
            $positioncol = $rowcategorias["position"];
            //aculiso la posision
            if($recibido=='0'){$selred99="selected";}else{$selred99="";}
            if($recibido=='1'){$selred1="selected";}else{$selred1="";}
            if($recibido=='2'){$selred2="selected";}else{$selred2="";}
            $status=StatusOrden($rjdhfbpqj,$idorden);

            echo '<tr>
                                      <td class="tdbototnfincen" style=" text-align:center; ">'.$fila.'</td>
                                      <td class="tdbototnfincen" style="text-align:center;">Nº' . $idorden . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;">'.$zona.' </td>
                     <td class="tdbototnfincen" ><strong>' . $nom_contac . '</strong> (' . $nom_emprv . ')  - ' . $rita . '</td>
                                       
                                        
                     <td class="tdbototnfinder text-align:center;">
           
                                              
                         '.$status.'
                     
                     </td> 
                   
             </td> 
                                      </tr>';
        }


        echo'
    </tbody>
</table><div id="muestroorden4"></div>'; 
}


$sqlhoja=mysqli_query($rjdhfbpqj,"SELECT * FROM hoja Where  fecha='$fechadecod'  ORDER BY `hoja`.`position` ASC");

while ($rowhoja = mysqli_fetch_array($sqlhoja)){
    $idcam=$rowhoja['camioneta'];
    $idhoja=$rowhoja['id'];
    $ifil=$ifil+1;

$sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_hoja='$idhoja'");//and dia_repart$dayver = '1' 
if ($rowclorden = mysqli_fetch_array($sqlclorden)) {
    
hojasderut($rjdhfbpqj,$idcam,$fechadecod,$ifil);
}echo '<br>';
}
echo '</div>';


function cantoorden($rjdhfbpqj,$fechadecod){
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' ");

    $canverificafin = mysqli_num_rows($sqlclorden);
return $canverificafin;
}

function cantoordenespera($rjdhfbpqj,$fechadecod){
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and  col = '2'");
  
    $canverificafin = mysqli_num_rows($sqlclorden);
  return $canverificafin;
      }


function cantoordenrpreparando($rjdhfbpqj,$fechadecod){
  $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and  col = '3' ");

  $canverificafin = mysqli_num_rows($sqlclorden);
return $canverificafin;
    }


    function cantoordencpreparadas($rjdhfbpqj,$fechadecod){
        $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and col!='0' and col > '3' and col!='32'");
    
        $canverificafin = mysqli_num_rows($sqlclorden);
    return $canverificafin;
        }


        function cantoordencotrolad($rjdhfbpqj,$fechadecod){
            $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and col!='0' and col > '5' and col!='32'");
        
            $canverificafin = mysqli_num_rows($sqlclorden);
        return $canverificafin;
            }

//ordenes picadas
function usuariopica($rjdhfbpqj,$fechadecod,$idusauri){
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and id_usuarioclav='$idusauri'  and col!='0' and col > '3' and col!='32'");

    $canverificafin = mysqli_num_rows($sqlclorden);
return $canverificafin;
    }

    //ordenes picadas
function usuariopicapr($rjdhfbpqj,$fechadecod,$idusauri){
    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where fechahoja='$fechadecod' and id_usuarioclav='$idusauri'  and col = '3' ");

    $canverificafin = mysqli_num_rows($sqlclorden);
    while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
        $idordenpic="Nº".$rowordentd['id'];
        $hora_pic=$rowordentd['hora_pic'];

    }

    return array('idordenpic' => $idordenpic, 'hora_pic' => $hora_pic, 'canverificafin' => $canverificafin);

    }



            function quienesson($rjdhfbpqj,$fechadecod){
                $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente = '34' or tipo_cliente = '56' ORDER BY `usuarios`.`nom_contac` ASC");
                
                 while ($rowordentd = mysqli_fetch_array($sqlclorden)) {
                    $idusauri=$rowordentd['id'];

                   $cantopick=usuariopica($rjdhfbpqj,$fechadecod,$idusauri);
                   $cantopickpre=usuariopicapr($rjdhfbpqj,$fechadecod,$idusauri);
                    echo '
                       <tr>
        <td>'.$rowordentd['nom_contac'].'</td>
        <td style="text-align:center">'.$cantopickpre['idordenpic'].'</td>
        <td style="text-align:center">'.$cantopickpre['hora_pic'].'</td>
        <td style="text-align:center">'.$cantopickpre['canverificafin'].'</td>
        <td style="text-align:center">'. $cantopick.'</td>
      </tr>
                    
                    ';
                    

                 }
            
                }

                
        
    
    

$canverificafin=cantoorden($rjdhfbpqj,$fechadecod); //la cantidad de ordenes ok

$canvepreespera=cantoordenespera($rjdhfbpqj,$fechadecod); // la cantidad que esta esperoa
$canvepreparando=cantoordenrpreparando($rjdhfbpqj,$fechadecod); // la cantidad que esta preparando


$canvepretermi=cantoordencpreparadas($rjdhfbpqj,$fechadecod); // la cantidad que estan preparadas

   // Cálculo del porcentaje pick
   $porcentaje = ($canvepretermi / $canverificafin) * 100;

   $porcentaje=number_format($porcentaje, 0, '', '');

   if($porcentaje==100){
    $barracopick="";
   }else{$barracopick="progress-bar-striped";}

   // Cálculo del porcentaje controlon

   $canveprecontroladas=cantoordencotrolad($rjdhfbpqj,$fechadecod);


   $porcentajeco = ($canveprecontroladas / $canverificafin) * 100;

   $porcentajeco=number_format($porcentajeco, 0, '', '');

   if($porcentajeco==100){
    $barracontrol="";
   }else{$barracontrol="progress-bar-striped";}
   $tremicontro=$canverificafin - $canveprecontroladas;

   
if($canverificafin !=0){
echo '

<ul class="list-group">
<li class="list-group-item text-center">Total de Ordenes: '.$canverificafin.'</li>
</ul>






<br>
<li class="list-group-item text-center">Total de Ordenes Pickiadas '.$canvepretermi.'/'.$canverificafin.'</li>
</ul>
<div class="progress"  style="height:60px;font-size: 30pt;"  data-bs-toggle="collapse" data-bs-target="#cikean">
  <div class="progress-bar '.$barracopick.' progress-bar-animated" style="width:'.$porcentaje .'%">'.$porcentaje .'%</div>
</div>

<div data-bs-toggle="collapse" data-bs-target="#cikean">
<ul class="list-group">
  <li class="list-group-item">En espera de Pick: '.$canvepreespera.'</li>
  <li class="list-group-item">Preparando Pikiando: '.$canvepreparando.'</li>

</div>

<div id="cikean" class="collapse">

   
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Usuario</th>
        <th class="text-center">Orden</th>
        <th class="text-center">Hora</th>
        <th class="text-center">Preparando</th>
        <th class="text-center">Hechas</th>
      </tr>
    </thead>
    <tbody>';
    //quienes pickan
    quienesson($rjdhfbpqj,$fechadecod);
    echo'</tbody>
  </table>
</div>








<li class="list-group-item text-center">Total de Ordenes Controladas '.$canveprecontroladas.'/'.$canverificafin.'</li>
</ul>
<div class="progress"  style="height:60px;font-size: 30pt;">
  <div class="progress-bar '.$barracontrol.' progress-bar-animated bg-success" style="width:'.$porcentajeco .'%">'.$porcentajeco .'%</div>
</div>
<br>
<ul class="list-group">
  <li class="list-group-item">Controlado: '.$canveprecontroladas.'</li>
</ul>
<br>






';
}else{echo'Sin Actividad..';}

?>
