<?php include('../f54du60ig65.php');
require('mpdf.php');






ob_start();

$diaselec = $_GET['hdnsbloekdjgsd'];
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
} 

?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        
    }

    .tabla_sin {
        border-collapse: collapse;
        border: none;
        font-size: 14;
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
        padding-top: 2px;
        padding-bottom: 2px;
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
        width: 200mm;
    }
</style>



<? echo '<h3>' . $numdia . '  ' . $dianombr . '  ' . $diaymes . '</h3>'; ?>
<table class="tabla_sin">
    <thead>
        <tr>

            <th class="tdbototn">Saldo</th>
            <th class="tdbototn">Clientes</th>
            <th class="tdbototn"></th>
            <th class="tdbototn" style="width: 3cm;">Nota</th>
            <th class="tdbototn" style="width: 3cm;">Remito</th>

        </tr>
    </thead>
    <tbody>
        <?php

        //aca miro si hay orden con positio diferente a 0
        $sqlorden=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where fecha='$fechadecod'");
        if ($roworden = mysqli_fetch_array($sqlorden)){$position=$roworden['position'];
        
            if($position=='0'){

                $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.total, e.fecha, e.id as idorden, u.id, u.fecha, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.estado FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' ORDER BY `position` ASC ");

            }else
            {

                $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.position, e.total, e.fecha, e.id as idorden, u.id, u.fecha, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.estado FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' ORDER BY `position` ASC ");


            }
        
        
        
        }

        //fin

        while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
            $id = $rowcategorias["id"];
            $idorden = $rowcategorias["idorden"];
            $fila = $fila + 1;
            $idcod = base64_encode($id);
            $idordencod = base64_encode($idorden);
            $cliente = $rowcategorias["address"];
            $clientev = strtoupper($cliente);
            $nom_empr = $rowcategorias["nom_empr"];
            $nom_emprv = ucfirst(strtolower($nom_empr));
            if (($fila % 2) == 0) {
                //Es un número par
                $colorf = '#fff';
            } else {
                //Es un número impar
                $colorf = '#F1F1F1';
            }
            $totalliq = $rowcategorias["total"];
            $total = number_format($totalliq, 2, '.', '');




            echo '<tr>
                                         <td class="tdbototnfiniz">$' . $total . '';

            $colortr = ${"colortr" . $idorden};
            $modopord = ${"modopord" . $idorden};
            $verde = ${"verde" . $idorden};
            $rosa = ${"rosa" . $idorden};
            //acabusco si hay item con congelado y fresco
            $querycliordnv = mysqli_query($rjdhfbpqj, "SELECT i.id_producto, i.id_orden, p.id, p.nombre, p.modo_producto  
                                                FROM item_orden i INNER JOIN productos p ON i.id_producto = p.id WHERE i.id_orden='$idorden'");
            while ($rowcategoriasv = mysqli_fetch_array($querycliordnv)) {
                $modopord = $rowcategoriasv['modo_producto'];

                if ($modopord == "0") {
                    $verde = "1";
                }
                if ($modopord == "1") {
                    $rosa = "1";
                }



                $modopord = $rowcategoriasv['modo_producto'];
                /*  echo '<br>Verde: '.$verde.', Rosa: '.$rosa.' -  Id orden: '.$rowcategorias["idorden"].' Producto: '.$rowcategoriasv['nombre'].' modo: '.$rowcategoriasv['modo_producto'].'<br>'; */
            }

            if ($rosa == "1" && $verde == "1") {
                $colortr = "#FFC300";
            } elseif ($rosa == "1" && empty($verde)) {
                $colortr = "#FF87F6";
            } elseif (empty($rosa) && $verde == "1") {
                $colortr = "#EDFF87";
            }

            /* echo'<br><br>Color: '.$colortr.'<br>'; */
            //fin


            echo '</td>
                                      
                                        <td class="tdbototnfincen" style="color: black; background-color:' . $colortr . '"><b>' . $clientev . '</b> (' . $nom_emprv . ')</td>
                                        <td class="tdbototnfincen" style="text-align: center;">
                                        <b>'.$rowcategorias["position"].'</b>
                                    </td> <td class="tdbototnfincen" ">
                                       
                                    </td> 
                                       <td class="tdbototnfinder">
                                            #' . $idorden . ' 
                                        </td> 
                                      </tr>';
        }


        ?>
        <tr>
            <td class="tdbototnfinizfin">&nbsp;</td>
            <td class="tdbototnfincenfin">&nbsp;</td>
            <td class="tdbototnfincenfin">&nbsp;</td>
            <td class="tdbototnfincenfin">&nbsp;</td>
            <td class="tdbototnfinderfin">&nbsp;</td>
        </tr>
    </tbody>
</table>
<?  

 $html = ob_get_contents();
ob_end_clean();

$mpdf = new mPDF('c', 'A4');
$mpdf->AddPageByArray([
    "margin-left" => "5mm",
    "margin-right" => "5mm",
    "margin-top" => "10mm",
    "margin-bottom" => "15mm",
    "resetpagenum" => "43"
]);

$mpdf->writeHTML($html);
$mpdf->Output('hoja_de_ruta_' . $fechadecod . '.pdf', 'I');




?>