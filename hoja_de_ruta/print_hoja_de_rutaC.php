<?php include('../f54du60ig65.php');
require('../salidas/mpdf.php');
include('../funciones/func_tienefrio.php');
include('../funciones/funcZonas.php');
include('../funciones/func_formapago.php');
$diaselec = $_GET['hdnsbloekdjgsd'];
$dianumero = $_GET['ijkfndt'];
$id_hoja = $_GET['idhoja'];
$idcamcod = $_GET['hdnskdjjgsd'];

$idcamioneta = base64_decode($idcamcod);
$fechadecod = base64_decode($diaselec);

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


<?
ob_start();
?>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14pt;
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
        width: 300mm;
    }
</style>

<?php

echo '
<div class="tdbototn" style="text-align:center;font-size: 14pt;font-weight: bold;">
 
  &nbsp;*** Hoja de Ruta día ' . $numdia . ' ' . $dianombr . '  ' . $diaymes . '  ***
 </div>';

?>

<?

function hojasderut($rjdhfbpqj, $idcamioneta, $fechadecod, $ifil, $id_hoja)
{
    $filav = 0;
    //extrigo nombre de la camioneta
    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
        $nombrecamio = $rowcamionetas["nombre"];
        $idcamioneta = $rowcamionetas["id"];
    }


    //extrigo nombre de la camioneta
    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where camioneta = '$idcamioneta' and fecha='$fechadecod' and id='$id_hoja' ");
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

<td class="tdbototn" style="font-size: 18pt; width:12cm;">

 &nbsp;Camioneta: <strong>' . $nombrecamio . '</strong> 
    </td>

<td class="tdbototn" style="font-size: 20pt;font-weight: bold; text-align:center; width:4cm;">

Carga: Nº ' . $icarga . '

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

            <th class="tdbototn" style="width: 2cm;">ORDEN ' . $id_hoja . '</th>
            <th class="tdbototn" style="width: 2cm;">ID</th>
            <th class="tdbototn" style="width: 2cm;">ZONA</th>
            <th class="tdbototn" style="text-align:left;">&nbsp;CLIENTE</th>
              <th class="tdbototn" style="width: 3cm;">Nota</th>
            
            <th class="tdbototn" style="width: 1cm;">OK</th>

        </tr>
    </thead>
    <tbody>';


    $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.total, e.subtotal, e.pedir, e.fecha, e.id_hoja, e.id as idorden, u.retira, u.id, u.fecha, u.address, u.nom_empr,  u.estado, e.camioneta, u.nom_contac, u.localidad FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id 
                WHERE e.fechahoja='$fechadecod' and u.estado='0' and e.camioneta='$idcamioneta' and e.id_hoja='$id_hoja' ORDER BY `position` DESC ");


    $canverificafin = mysqli_num_rows($querycliordn) + 1;
    //fin
    while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
        $id = $rowcategorias["id"];
        $id_cliente = $rowcategorias["id_cliente"];
        //$mostrarr = ${"mostrarr" . $id};
        // $pedir = ${"pedir" . $id};
        $idorden = $rowcategorias["idorden"];
        $pedir = $rowcategorias["pedir"];
        $filav =  $filav + 1;
        $fila =  $canverificafin - $filav;
        /* 
        $idcod = base64_encode($id);
        $idordencod = base64_encode($idorden); */
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
        $sqlnotas = ${"sqlnotas" . $idorden};
        $rowotas = ${"rowotas" . $idorden};
        $nota = ${"nota" . $idorden};

        // $finalizada = $rowcategorias["finalizada"];

        $sqlnotas = mysqli_query($rjdhfbpqj, "SELECT * FROM notahoja where id_orden = '$idorden'");
        if ($rowotas = mysqli_fetch_array($sqlnotas)) {
            $nota = "<br><b>***" . strtoupper($rowotas['nota']) . "***</b>";
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
        //$positioncol = $rowcategorias["position"];
        //aculiso la posision






        echo '<tr>
                                      <td class="tdbototnfincen" style=" text-align:center; ">' . $fila . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;">' . $idorden . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;">' . $zona . ' </td>
                     <td class="tdbototnfincen" ><strong>' . $nom_contac . '</strong> (' . $nom_emprv . ')  - ' . $rita . '
                     ' . $nota . ' <b> ' . formDePag($rjdhfbpqj, $id_cliente, $idorden) . ' </b>
                     </td>
                                 <td class="tdbototnfincen" style="text-align:center;">
                                       
                                        
                     <td class="tdbototnfincen" style="text-align:center;">
                   
             </td> 
                                      </tr>';
    }


    echo '
    </tbody>
</table>';
}



$sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where  id='$id_hoja' and fin='0' ORDER BY `hoja`.`position` ASC");
while ($rowhoja = mysqli_fetch_array($sqlhoja)) {
    $idcam = $rowhoja['camioneta'];
    $idhoja = $rowhoja['id'];
    $ifil = $ifil + 1;

    $sqlclorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_hoja='$idhoja'"); //and dia_repart$dayver = '1' 
    if ($rowclorden = mysqli_fetch_array($sqlclorden)) {
        hojasderut($rjdhfbpqj, $idcam, $fechadecod, $ifil, $id_hoja);
    }
    echo '<br>';
}


//tiene frio
$tienefrio = frioordenestotal($rjdhfbpqj, $id_hoja);

echo '' . $tienefrio . '';
?>

<? $fechahojade = $numdia . '_' . $dianombr . '_' . $diaymes . '_' . $nombrecamio;
//envio de PDF

$html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4-P');
$mpdf->writeHTML($css, 1);
$mpdf->AddPageByArray([
    "margin-left" => "10mm",
    "margin-right" => "10mm",
    "margin-top" => "5mm",
    "margin-bottom" => "10mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('hoja_de_ruta' . $fechahojade . '.pdf', 'I');




?>