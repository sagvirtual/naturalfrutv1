<?php

function alarmavenci($rjdhfbpqj)
{
    /* alarma */

    $sqlprd = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where estado = '0'");
    while ($rowpr = mysqli_fetch_array($sqlprd)) {
        $idproduc = $rowpr['id'];
        $alarmastock = $rowpr['alarmastock'];
        $unidadnom = $rowpr['unidadnom'];
        $nombre = $rowpr['nombre'];
        $stockdispom = SumaStock($rjdhfbpqj, $idproduc);

        if ($unidadnom == "Kg.") {
            $kilo = 1;
            $bulto = "Kg.";
        }
        if ($unidadnom == "Uni.") {
            $kilo = $rowpr['kilo'];
            $bulto = $rowpr['modo_producto'];
        }








        $suma = 0;
        if ($stockdispom <= $alarmastock) {
            echo '
                <tr>     <td style="text-align:center;">
                                        <p style="display:none;"></p>
                                        
                                   
                                        
                                        </td>

                                        
                                        <td> ' . $nombre . '</td>
                                        <td style="text-align:center;"> </td>
                                        <td style="width:0px; text-align:center;">' . $stockdispom . ' ' . $unidadnom . ' </td>
                                        <td style="width:0px; text-align:center;"> ' . $alarmastock . ' ' . $unidadnom . '</td>
                                   

                                        </tr>
                
                ';
            $suma = $suma + 1;
        }
    }
    //   return  $fechavenpd; 
}
