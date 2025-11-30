<?php
function calculodFech($rjdhfbpqj, $id_clienteint, $id_orden, $modo, $fecha)
{

    /* calculo cobros saldoini */
    $pagoTotal = 0;
    $totald = 0;

    if ($modo == '1') {

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {
            $saldoini = $rowpclientes['saldoiniR'];
        }
    } else {

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {
            $saldoini = $rowpclientes['saldoini'];
        }
    }


    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint' and fecha > '2025-01-01' and fecha < '$fecha' ORDER BY `prodcom`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
        $totald += $rowpaufp["cpratotal_prod"];
    }


    $saldo = $totald - $pagoTotal + $saldoini;




    /* 
if($saldo<0.1){$saldo=0;} */
    return $saldo;
}


function calculodeudaM($rjdhfbpqj, $id_clienteint, $id_orden, $modo)
{

    /* calculo cobros saldoini */
    $pagoTotal = 0;
    $totald = 0;


    if ($modo == '1') {

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {
            $saldoini = $rowpclientes['saldoiniR'];
        }
    } else {

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {
            $saldoini = $rowpclientes['saldoini'];
        }
    }


    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint' and fecha > '2025-01-01' and id < '$id_orden' ORDER BY `prodcom`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
        $totald += $rowpaufp["cpratotal_prod"];
    }


    $saldo = $totald - $pagoTotal + $saldoini;




    /* 
if($saldo<0.1){$saldo=0;} */
    return $saldo;
}
function calculodeuda($rjdhfbpqj, $id_clienteint, $id_orden)
{

    /* calculo cobros saldoini */


    $pagoTotal = 0;
    $totald = 0;



    /* 
$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenprovee Where id_proveedor = '$id_clienteint'and id < $id_orden and col='8' ORDER BY `ordenprovee`.`id` DESC");
    while($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $iddorden=$rowpagdeufp["id"];
       // $saldo = $rowpagdeufp["saldo"];
        $totald+= $rowpagdeufp["cpratotal_prod"];

    } */
    if (empty($iddorden)) {

        $sclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_clienteint'");
        if ($rowpclientes = mysqli_fetch_array($sclientes)) {
            $saldoini = $rowpclientes['saldoini'] + $rowpclientes['saldoiniR'];
        }
    }
    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint' and fecha > '2025-01-01' ORDER BY `prodcom`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
        $totald += $rowpaufp["cpratotal_prod"];
    }


    $saldo = $totald - $pagoTotal + $saldoini;




    /* 
if($saldo<0.1){$saldo=0;} */
    return $saldo;
}


function saldoprovee($rjdhfbpqj, $id_clienteint, $id, $modo)
{
    $pagoTotal = 0;
    $totald = 0;


    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT *  FROM proveedores Where id = '$id_clienteint'");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        if ($modo == '0') {
            $saldoini = $rowpagdeufp["saldoini"];
        } else {
            $saldoini = $rowpagdeufp["saldoiniR"];
        }
    }

    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_proveedor = '$id_clienteint' and id_orden <='1606' and  tipocuneta='$modo' and fecha > '2025-01-01' ");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {

        $pagoTotal += $rowpaufp["valor"];
        $totald += $rowpaufp["cpratotal_prod"];
    }


    $saldo = $totald;


    return $saldo;
}
