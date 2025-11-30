<?php

$filtroesta = $_GET['filtroesta'];
$buscar = $_POST['buscar'];

if ($buscar) {

    $slbuscar = " e.id = '" . $buscar . "'";
}



if ($filtroesta === '0' || $filtroesta === '1' || $filtroesta === '2') {

    $slfiltro = "e.recibido='" . $filtroesta . "'";
}


echo ' 
<div class="btn-group">
  <a href="estodas.php?filtroesta=0"> <button type="button" class="btn btn-warning">Esperando</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="estodas.php?filtroesta=2"><button type="button" class="btn btn-danger">Recibidas sin Cobrar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
   <form action="estodas.php" method="post"> <div class="input-group mb-3">
  
 
    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Id Orden" > <button type="submit" class="btn btn-dark">Buscar</button>
  </div>
  </form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="pendientes_pdf.php?filtroesta=' . $_GET['filtroesta'] . '" target="_blank" style="float:right;"> <button type="button" class="btn btn-primary">PDF</button></a>
</div><br><br>
<div id="hojaruta" >';

include('../funciones/funcZonas.php');
//$diaselec = $_GET['hdnsbloekdjgsd'];

//$idcamioneta = base64_decode($idcamcod);
//$fechadecod = base64_decode($diaselec);
$fechadecod = $fechacja;

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



<?

function hojasderut($rjdhfbpqj, $idcamioneta, $fechadecod, $ifil, $slfiltro, $slbuscar)
{

    //extrigo nombre de la camioneta
    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
        $nombrecamio = $rowcamionetas["nombre"];
        $idcamioneta = $rowcamionetas["id"];
    }


    //extrigo nombre de la camioneta
    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where camioneta = '$idcamioneta' ");
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



<table class="tabla_sin">
    <thead>
        <tr>

            <th class="tdbototn text-center" style="width: 2cm;">STATUS</th>
            <th class="tdbototn text-center" style="width: 2cm;">FECHA</th>
            <th class="tdbototn text-center" style="width: 2cm;">ORDEN</th>
            <th class="tdbototn text-center" style="width: 2cm;">ZONA</th>
            <th class="tdbototn" style="text-align:left;">&nbsp;CLIENTE</th>
            <th class="tdbototn text-center" style="width: 3cm;">Estado</th>

        </tr>
    </thead>
    <tbody>';
    $comilla = "'";

    $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.fechahoja, e.id_hoja, e.recibido, e.total, e.subtotal, e.pedir, e.fecha, e.id as idorden, u.retira, u.id,  u.address, u.nom_empr,  u.estado, e.camioneta, u.nom_contac, u.localidad 
                FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE col > '5' and col != '32' and $slfiltro  $slbuscar 
                ORDER BY `fecha` DESC limit 500");

    $filav = 0;
    $canverificafin = mysqli_num_rows($querycliordn);
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
        $fechahoja = date('d/m/y', strtotime($rowcategorias["fecha"]));
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
        if ($recibido == '99') {
            $selred99 = "selected";
            $colorestado = "#FFFF84";
        } else {
            $selred99 = "";
        }
        if ($recibido == '0') {
            $selred99 = "selected";
            $colorestado = "#FFFF84";
        } else {
            $selred99 = "";
        }
        if ($recibido == '1') {
            $selred1 = "selected";
            $colorestado = "#26CD04";
        } else {
            $selred1 = "";
        }
        if ($recibido == '2') {
            $selred2 = "selected";
            $colorestado = "#FD8B9C";
        } else {
            $selred2 = "";
        }


        echo '<tr>
                                      <td class="tdbototnfincen" style="text-align:center;background-color: ' . $colorestado . ';">' . StatusOrden($rjdhfbpqj, $idorden) . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;background-color: ' . $colorestado . ';">' . $fechahoja . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;background-color: ' . $colorestado . ';">Nº' . $idorden . '</td>
                                      <td class="tdbototnfincen" style="text-align:center;background-color: ' . $colorestado . ';">' . $zona . ' </td>
                     <td class="tdbototnfincen" style="background-color: ' . $colorestado . ';"><strong>' . $nom_contac . '</strong> (' . $nom_emprv . ')  - ' . $rita . '</td>
                                       
                                        
                     <td class="tdbototnfinder text-align:center;" style="background-color: ' . $colorestado . ';">
           
                                              
                                                  <select name="col' . $idorden . '" id="col' . $idorden . '" class="form-control"  style="font-weight: bold;width:210px;s;background-color: ' . $colorestado . ';text-align:center;"
                                                  onchange="ajax_ssseguimiento($(' . $comilla . '#col' . $idorden . '' . $comilla . ').val(), ' . $comilla . '' . $idorden . '' . $comilla . ');" tabindex="-1">
                                                  
                                                  <option value="99" ' . $selred99 . '>ESPERANDO..</option>
                                                  <option value="1" ' . $selred1 . '>¡Recibido!</option>
                                                  <option value="2" ' . $selred2 . '>¡Recibido! SIN COBRAR</option>
                     
                      </select>
                     
                     
                     </td> 
                   
             </td> 
                                      </tr>';
    }


    echo '
    </tbody>
</table>Cantidad: ' . $canverificafin . ' limite de 500 a mostrar<div id="muestroorden4"></div>';
}


hojasderut($rjdhfbpqj, $idcam, $fechadecod, $ifil, $slfiltro, $slbuscar);


echo '</div>';
?>
<script>
    function ajax_ssseguimiento(col, idorden) {
        var parametros = {
            "col": col,
            "idorden": idorden
        };
        $.ajax({
            data: parametros,
            url: '../cajadiaria/guardasegtarea.php',
            type: 'POST',
            beforeSend: function() {
                $("#muestroorden4").html('');
            },
            success: function(response) {
                $("#muestroorden4").html(response);
            }
        });
    }
</script>