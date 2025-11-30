<?php

function stockcarga($fechaarreg, $idcamioneta, $rjdhfbpqj)
{




    $sqlcarga = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$fechaarreg' and camioneta = '$idcamioneta'");
    while ($rowcarga = mysqli_fetch_array($sqlcarga)) {
        $iditem=$rowcarga['id'];
        $idproduc=$rowcarga['id_producto'];
        
        $rowitem_orden = ${"rowitem_orden" . $iditem};
        $kilosorden = ${"kilosorden" . $iditem};
        $sqlitem_orden = ${"sqlitem_orden" . $iditem};
        $nombrepro = ${"nombrepro" . $iditem};

        $kiloscarga = $rowcarga['kilos'];

        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechaarreg' and camioneta = '$idcamioneta' and id_producto='$idproduc' and id_orden!='0' and modo='0'");
        while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {

            $nombrepro = $rowitem_orden["nombre"];
            $kilosorden+=$rowitem_orden['kilos'];




        }

        if ($kilosorden > $kiloscarga) {
            $rkilos = $kilosorden - $kiloscarga;
            echo 'Faltan ' . $rkilos . 'Kg. de ' . $nombrepro . '<br><br>';
        }

      


    }
    if($rkilos <=0){echo 'No hay productos faltantes';}
    
}

function stocksobra($fechaarreg, $idcamioneta, $rjdhfbpqj)
{


    echo' <table class="table table-bordered">';

    $sqlcarga = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$fechaarreg' and camioneta = '$idcamioneta'");
    while ($rowcarga = mysqli_fetch_array($sqlcarga)) {
        $iditem=$rowcarga['id'];
        $idproduc=$rowcarga['id_producto'];
        
        $rowitem_orden = ${"rowitem_orden" . $iditem};
        $kilosorden = ${"kilosorden" . $iditem};
        $sqlitem_orden = ${"sqlitem_orden" . $iditem};
        $nombrepro = ${"nombrepro" . $iditem};

        $kiloscarga = $rowcarga['kilos'];


        $sqlitem_ordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_producto='$idproduc'");
        if ($rowitem_ordenr = mysqli_fetch_array($sqlitem_ordenr)) {$nombrepro = $rowitem_ordenr["nombre"];}


        $sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$fechaarreg' and camioneta = '$idcamioneta' and id_producto='$idproduc' and conf_entrega='1' and modo='0'");
        while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {

           
            $kilosorden+=$rowitem_orden['kilos'];




        }

        
        if ($kilosorden < $kiloscarga) {
            $rkilos = $kilosorden - $kiloscarga;
            $rkilos =substr($rkilos ,1);
            echo '<tr style="background-color: while;"><td style="text-align:center;">'.
            
            
            
            
            $rkilos . 'Kg.</td><td> ' . $nombrepro . '</td></tr>';
        }



    }  echo' </table>';
    if($rkilos <=0){echo 'No hay productos sin vender.';}
}
