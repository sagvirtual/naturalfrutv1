<?php include('../f54du60ig65.php');

$id_producto = $_GET['id_producto'];
$idhg = $_GET['idhg'];
$unidad = $_GET['unidad'];
$pedido = $_GET['pedido'];

if (empty($unidad)) {
    $unidad = "Kg.";
}
if (!empty($pedido)) {
    $pedidod = "*P" . $pedido . "*";
}
$sqdrdenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
if ($redentc = mysqli_fetch_array($sqdrdenr)) {
    $codigodepro = $redentc['codigo'];
    $codiid = $redentc['id'];

    /*      $nomductods=explode("(", $nomductod);
     
     $nomducto=$nomductods[0]; */
    $nomductod = $redentc['nombre'];

    $nomductod = $redentc['nombre'];

    $elementos_a_eliminar = array(
        "(Frutas Glaseadas - Deshidroazucaradas)",
        "(Sin marca)",
        "(Especias y condimentos)",
        "(Fruta Desecada)",
        "(Fruta Seca)",
        "(Cultivo Avena)",
        "(Nuez - Almendras - Castañas - Pasas Negras y Rubias - Maní)",
        "(Nuez, Almendras, Castañas, Avell)",
        "(Nuez-Almendras-Castañas-Pasas Rubias y Negras)",
        "(Semillas)",
        "- Esencia",
        "(Especias y Condimentos)",
        "- Origen Ghana",
        "(Frutas glaseadas - deshidroazucaradas)",
    );

    $nomducto = str_replace($elementos_a_eliminar, '', $nomductod);
}
$sumak = '500000';
if ($codigodepro != '0') {
    $codigodebarra = 978000000000 + $codiid + $sumak;
} else {

    $codigodebarra = 978000000000 + $codiid + $sumak;
}
/* codigo de barra */
$altocod = '18';
$anchocod = '250';

$fechahoy = date("Y-m-d");



$fechasu = new DateTime();

// Sumar un año a la fecha
$fechasu->modify('+1 year');

// Formatear la fecha en el formato Y-m-d
$vencimiento = $fechasu->format('d.m.Y');

$sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM etiquetas Where id_producto= '$id_producto'");
if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {
    $lote = $rowordentcvr["lote"];

    if ($rowordentcvr["origen"] != "") {
        $origen = "Origen: " . $rowordentcvr["origen"] . "<br>";
    }
    if ($rowordentcvr["importado"] != "") {
        $importado = "Importado por: " . $rowordentcvr["importado"] . "<br>";
    }
    if ($rowordentcvr["direccion"] != "") {
        $direccion = $rowordentcvr["direccion"] . "<br>";
    }




    if ($rowordentcvr["elaborado"] != "") {
        $elaborado = "Elaborado: " . $rowordentcvr["elaborado"] . "<br>";
        $sumalineasa = 0;
    } else {
        $sumalineasa = 1;
    }

    if ($rowordentcvr["rnpa"] != "") {
        $rnpa = "R.N.E.: " . $rowordentcvr["rnpa"] . "<br>";
        $sumalineasb = 0;
    } else {
        $sumalineasb = 1;
        $rnpa = "<br>";
    }
    if ($rowordentcvr["rne"] != "") {
        $rne = "R.N.P.A: " . $rowordentcvr["rne"] . "<br>";
        $sumalineasc = 0;
    } else {
        $sumalineasc = 1;
    }
    if ($rowordentcvr["fraccionado"] != "") {
        $fraccionado = "FRACCIONADO POR: " . $rowordentcvr["fraccionado"] . "<br>";
        $sumalineasd = 0;
    } else {
        $sumalineasd = 1;
    }
}
$totalli = $sumalineasa + $sumalineasb + $sumalineasc + $sumalineasd;



if ($rowordentcvr["elaborado"] != "") {


    if (strlen($nomducto) > 30) {


        if ($totalli == '0') {
            $cssmov = "left:55mm; top:-38mm;";
        }



        if ($totalli == '2') {
            $cssmov = "left:55mm; top:-35mm;";
        }
    } else {
        $cssmov = "left:55mm; top:-38mm;";
    }
} else {


    if (strlen($nomducto) > 40) {
        $cssmov = "left:59mm; top:-38mm;";
    } else {
        $cssmov = "left:55mm; top:20px";
    }
}
if ($cssmov == "") {
    $cssmov = "left:55mm; top:-38mm;";
}

if (strlen($idhg) == 3) {
    $cssfon = "font-size: 14pt;";
} elseif (strlen($idhg) == 2) {
    $cssfon = "font-size: 16pt;";
} else {
    $cssfon = "font-size: 20pt; ";
}



if ($lote == "") {
    $primeras_dos_letras = substr($nomductod, 0, 1);

    $lotee = strtoupper($primeras_dos_letras);
    $loteq = date("m") + 3000 + date("y");


    $lote = $lotee . $loteq;
}
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        zoom: 90%;
    }
</style>

<div style="vertical-align: top; width:98mm;height:78mm; border-collapse: collapse; background-color: white;text-align: center;">

    <div style="background-color: black;color:white; width:76mm; text-align: center;font-weight: bold;  font-size: 16pt;position:relative; left:10mm; right:10mm; padding:2mm;">

        <?= $nomducto ?>


    </div>

    <? if ($pedido != '') { ?>
        <p style="color:black;  text-align: center;font-weight: bold; position: absolute; transform: rotate(-90deg);font-size: 31pt;
left:56mm;top:32mm; width:76mm;letter-spacing: 2;

"> &nbsp; &nbsp;
            <?= $pedidod ?> &nbsp; &nbsp;
        </p>
    <? } ?>

    <div style="text-align: left; padding-left:6mm; font-size: 11pt; padding-top:2mm; padding-bottom:3mm;">
        <?= $espa ?>
        <?= $elaborado ?>
        <?= $importado ?>
        <?= $origen ?>
        <?= $direccion ?>
        <?= $rnpa ?>
        <?= $rne ?>
        Lote: <?= $lote ?><br>
        VTO: <?= $vencimiento ?><br>
        <?= $fraccionado ?>


        <div style="position:relative; left:10mm; top:2mm;">
            <?php



            include('../barcode/html/BCGean13eti.php');

            ?>

        </div>


    </div>




    <div style="background-color: black;color:white; width:20mm; text-align: center;font-weight: bold;  <?= $cssfon ?> position:relative;  padding:2mm; <?= $cssmov ?> ">

        <?= $idhg ?> <?= $unidad ?>
    </div>


</div>

<script>
    window.print();

    window.onafterprint = function() {
        window.close();
    };
</script>