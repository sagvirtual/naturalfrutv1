<?php
// dates name day

function arreglofech($fechadia)
{
    $fechats = strtotime($fechadia);
    $dayver = date('w', $fechats);

    if ($dayver == '1') {
        $dianombr = "LUNES";
    }
    if ($dayver == '2') {
        $dianombr = "MARTES";
    }
    if ($dayver == '3') {
        $dianombr = "MIERCOLES";
    }
    if ($dayver == '4') {
        $dianombr = "JUEVES";
    }
    if ($dayver == '5') {
        $dianombr = "VIERNES";
    }
    if ($dayver == '6') {
        $dianombr = "SABADO";
    }
    if ($dayver == '0') {
        $dianombr = "DOMINGO";
    }

    echo '' . $dianombr . '';
}
