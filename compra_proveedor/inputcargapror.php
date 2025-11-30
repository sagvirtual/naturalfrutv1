<?php

/* sector editar R */


if ($editar == "1") {
    $iditem = $_GET['iditem'];
    $axax = "mod";
    $axaxmod = "Modificar";

    $sqlpredodr = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom  Where id_producto = '$idproducto' and id_orden = $id_orden and modo = '1'");
    if ($rowpreciopror = mysqli_fetch_array($sqlpredodr)) {
        $fecvenr = $rowpreciopror["fecven"];
        $iditemr = $rowpreciopror["id"];
        $agrstockr = $rowpreciopror["agrstock"];
        $costoxcajr = $rowpreciopror["costoxcaj"];
        $costor = $rowpreciopror["costo"];
        $descuentor = str_replace(".", ",", $rowpreciopror["descuento"]);
        $iibb_bsasr = str_replace(".", ",", $rowpreciopror["iibb_bsas"]);
        $iibb_cabar = str_replace(".", ",", $rowpreciopror["iibb_caba"]);
        $perc_ivar = str_replace(".", ",", $rowpreciopror["perc_iva"]);
        $ivar = str_replace(".", ",", $rowpreciopror["iva"]);
        $desadir = str_replace(".", ",", $rowpreciopror["desadi"]);


        if ($modounid == '2') {
            $costoxcajr = $rowpreciopror["costoxcaj"];
        } else {
            $costoxcajr = str_replace(".", ",", $rowpreciopror["costoxcaj"]);
        }

        if ($modounid == '1') {
            $costor = $rowpreciopror["costo"];
        } else {
            $costor = str_replace(".", ",", $rowpreciopror["costo"]);
        }
    }
} else {
    $axaxmod = "Agregar";
}


if ($editar != "1") {
    /*  $sqlprooreds = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
 if ($rowprovders = mysqli_fetch_array($sqlprooreds)) {
    $iibb_bsas = number_format($rowprovders["iibb_bsas"], 2, ',', '');
    $iibb_caba = number_format($rowprovders["iibb_caba"], 2, ',', '');
    $perc_iva = number_format($rowprovders["perc_iva"], 2, ',', '');
    $iva = number_format($rowprovders["iva"], 2, ',', '');
    $descuento = number_format($rowprovders["descuento"], 2, ',', '');
    $desadi = number_format($rowprovders["desadi"], 2, ',', '');

  
 } */
}


?>

<?php
/* style="position: relative; top:9px" */




/* if ($modounid == "1" || empty($modounid)) {
    $inputunidb = "text";
    $inputunid = "hidden";
    $vercuenc = 'style="display:none;"';
    $vercuen = 'style="position: relative; top:9px;"';
    $cantunidver = $unidadnomav;
} else {
    $inputunidb = "hidden";
    $inputunid = "text";
    $vercuen = 'style="display:none;"';
    $vercuenc = 'style="position: relative; top:9px;"';
    $cantunidver = $unidadver;
} */


$sqlcomraa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden' and modo='0'");
if ($rowcompa = mysqli_fetch_array($sqlcomraa)) {
} else { ?>
    <script>
        function redirigira() {
            window.location.href = "?ookdjfv=<?= $id_proveedor ?>&idproducto=<?= $idproducto ?>&modounid=1&id_orden=<?=$id_orden ?>";
        }

        function redirigirb() {
            window.location.href = "?ookdjfv=<?= $id_proveedor ?>&idproducto=<?= $idproducto ?>&modounid=2&id_orden=<?=$id_orden ?>";
        }
    </script>
<? }

if (empty($agrstockr)) {
    $agrstockr = "0";
}
if (empty($costoxcajr)) {
    $costoxcajr = "0,00";
}
if (empty($costor)) {
    $costor = "0,00";
}




if ($fac_r == "1") {
    $nopusfar = 'style="display: none;"';
}

?>

<form id="formdar" name="formdar" method="post" enctype="multipart/form-data" target="_parent">

    <!-- factura R -->
    <tr <?= $nopusfar ?>>

        <td class="text-center" style="background-color: #FEFEF2;">
            <h1 style="font-size: 20pt; position:relative; top:5px; "><strong>R</strong></h1>
            <input type="hidden" id="modor" name="modor" value="1">
            <input type="hidden" id="id_usuarior" name="id_usuarior" value="<?= $id_usuarioclav ?>">
            <input type="hidden" id="id_productor" name="id_productor" value="<?= $idproducto ?>">
            <input type="hidden" id="id_proveedorr" name="id_proveedorr" value="<?= $id_proveedor ?>">
            <input type="hidden" id="id_ordenr" name="id_ordenr" value="<?= $id_orden ?>">
            <input type="hidden" id="kilor" name="kilor" value="<?= $canxbul ?>">
            <input type="hidden" id="tipor" name="tipor" value="1">
            <input type="hidden" id="unid_bultor" name="unid_bultor" value="<?= $modounid ?>">
            <input type="hidden" id="iditemr" name="iditemr" value="<?= $iditemr?>">



        </td>
        <td class="text-center" style="background-color: #EDEDED;">
            <!-- AGREGAR STOCK -->
            <input type="text" class="form-control autoReplace text-center" id="agrstockr" name="agrstockr" value="<?= $agrstockr ?>" style="font-weight: 900; color:blue; width:80px; margin: 0 auto;" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()">


        </td>
        <td class="text-center" style="background-color: <?= $destaca ?>;">
            <!-- precio x caja -->
            <strong>
                <div id="costoxcajvr" <?= $vercuenc ?>><?= $costoxcajr ?></div>
            </strong>
            <input type="<?= $inputunidb ?>" class="form-control autoReplace text-center" id="costoxcajr" name="costoxcajr" value="<?= $costoxcajr ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()" onKeyUp="calculocostor(); calculopromedio();" style="color:blue; font-weight: 900; width:110px; margin: 0 auto;" onclick="select()" >

        </td>
        <td class="text-center" style="background-color: <?= $destacb ?>;">
            <!-- Precio UNITARIO -->
            <strong>
                <div id="costovr" <?= $vercuen ?>><?= $costor ?></div>
            </strong>
            <input type="<?= $inputunid ?>" id="costor" name="costor" value="<?= $costor ?>" class="form-control autoReplace text-center" onclick="select()" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()" onKeyUp="calculocostor(); calculopromedio();" style="color:blue; font-weight: 900; width:110px; margin: 0 auto;" >
        </td>
        <td class="text-center" style="background-color: #FEFEF2;">

            <!-- decuento -->
            <input type="text" class="form-control autoReplace text-center" id="descuentor" name="descuentor" value="<?= $descuentor ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue; width:70px; margin: 0 auto;" >

        </td>
        <td class="text-center" style="background-color: #FEFEF2;">

            <!-- precio con descuento -->

            <strong>
                <div id="pcondescuvr" style="position: relative; top:9px"><?= $pcondescur ?></div>
            </strong>
            <input type="hidden" id="pcondescur" name="pcondescur" value="<?= $pcondescur ?>">


        </td>
        <td class="text-center" style="background-color: #FEFEF2;">
            <!-- iibb_bsas -->
            <input type="text" class="form-control autoReplace text-center" id="iibb_bsasr" name="iibb_bsasr" value="<?= $iibb_bsasr ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

        </td>
        <td class="text-center" style="background-color: #FEFEF2;">

            <!-- iibb_caba -->
            <input type="text" class="form-control autoReplace text-center" id="iibb_cabar" name="iibb_cabar" value="<?= $iibb_cabar ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >


        </td>
        <td class="text-center" style="background-color: #FEFEF2;">
            <!-- perc_iva -->
            <input type="text" class="form-control autoReplace text-center" id="perc_ivar" name="perc_ivar" value="<?= $perc_ivar ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >


        </td>
        <td class="text-center" style="background-color: #FEFEF2;">
            <!-- iva -->
            <input type="text" class="form-control autoReplace text-center" id="ivar" name="ivar" value="<?= $ivar ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

        </td>
        <td class="text-center" style="background-color: #FEFEF2;">
            <!-- precio bruto -->
            <input type="hidden" id="pbrutor" name="pbrutor" value="<?= $pbrutor ?>">
            <strong>
                <div id="roimpimr" style="position: relative; top:9px"><?= $roimpimr ?></div>
            </strong>

        </td>
        <td class="text-center" style="background-color: #FEFEF2;">

            <!-- descuentos adicionales -->
            <input type="text" class="form-control autoReplace text-center" id="desadir" name="desadir" value="<?= $desadir ?>" onChange="calculocostor()" onKeyDown="calculocostor()" onKeyPress="calculocostor()"  onKeyUp="calculocostor(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

        </td>
        <td class="text-center" style="background-color: <?= $destacb ?>">
            <input type="hidden" class="form-control" id="costo_totalr" name="costo_totalr" value="<?= $costo_totalr ?>"><strong>
                <div id="costotunitrr" style="position: relative; top:9px"></div>
            </strong>
        </td>
        <td class="text-center" style="background-color: <?= $destaca ?>">
            <input type="hidden" class="form-control" id="costoxcajar" name="costoxcajar" value="<?= $costoxcajar ?>"><strong>
                <div id="costotuxbulr" style="position: relative; top:9px"></div>
            </strong>
        </td>
        <td class="text-center" style="background-color: #EDEDED;">
            <input type="hidden" class="form-control" id="comtotalr" name="comtotalr" value="<?= $comtotalr ?>"><strong>
                <div id="comtotalvr" style="position: relative; top:9px"></div>
            </strong>
        </td>

    </tr>
</form>

<script>
    function calculocostor() {
        //valores 

        var kilor = document.formdar.kilor.value;
        var costoxcajr = document.formdar.costoxcajr.value;
        var costor = document.formdar.costor.value;
        var agrstockr = document.formdar.agrstockr.value;
        agrstockr = agrstockr.replace(/,/g, '.');

        var descuentor = document.formdar.descuentor.value;
        var iibb_bsasr = document.formdar.iibb_bsasr.value;
        var iibb_cabar = document.formdar.iibb_cabar.value;
        var perc_ivar = document.formdar.perc_ivar.value;
        var ivar = document.formdar.ivar.value;
        var desadir = document.formdar.desadir.value;

        /* quito . y reemplazo cas de decimales */

        costoxcajr = costoxcajr.replace(/\./g, '').replace(/,/g, '.');
        costor = costor.replace(/\./g, '').replace(/,/g, '.');

        descuentor = descuentor.replace(/\./g, '').replace(/,/g, '.');
        iibb_bsasr = iibb_bsasr.replace(/\./g, '').replace(/,/g, '.');
        iibb_cabar = iibb_cabar.replace(/\./g, '').replace(/,/g, '.');
        perc_ivar = perc_ivar.replace(/\./g, '').replace(/,/g, '.');
        ivar = ivar.replace(/\./g, '').replace(/,/g, '.');
        desadir = desadir.replace(/\./g, '').replace(/,/g, '.');






        if (kilor === undefined || kilor === null || kilor === '') {
            document.formdar.kilor.value = "0".toFixed(2);
        }
        if (costoxcajr === undefined || costoxcajr === null || costoxcajr === '') {
            document.formdar.costoxcajr.value = 0.00;
        }
        if (costor === undefined || costor === null || costor === '') {
            document.formdar.costor.value = 0.00;
        }
        if (descuentor === undefined || descuentor === null || descuentor === '') {
            document.formdar.descuentor.value = 0.00;
        }
        if (iibb_bsasr === undefined || iibb_bsasr === null || iibb_bsasr === '') {
            document.formdar.iibb_bsasr.value = 0.00;
        }
        if (iibb_cabar === undefined || iibb_cabar === null || iibb_cabar === '') {
            document.formdar.iibb_cabar.value = 0.00;
        }
        if (perc_ivar === undefined || perc_ivar === null || perc_ivar === '') {
            document.formdar.perc_ivar.value = 0.00;
        }
        if (ivar === undefined || ivar === null || ivar === '') {
            document.formdar.ivar.value = 0.00;
        }
        if (desadir === undefined || desadir === null || desadir === '') {
            document.formdar.desadir.value = 0.00;
        }






        <?php if ($modounid == '1') { ?>


            /* costo por unidad */
            costocaur = costoxcajr / kilor;
            document.formdar.costor.value = costocaur.toFixed(2);
            document.getElementById('costovr').textContent = costocaur.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        <?
        } else {

        ?>

            /* costo por caja */
            costocaur = costor;
            costoxbulr = costor * kilor;
            document.formdar.costoxcajr.value = costoxbulr.toFixed(2);
            document.getElementById('costoxcajvr').textContent = costoxbulr.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        <?php

        }

        ?>
        /* descuento costo */
        const descccostr = costocaur - (costocaur * (descuentor / 100));
        document.formdar.pcondescur.value = descccostr.toFixed(2);
        document.getElementById('pcondescuvr').textContent = descccostr.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        /* precio bruto */
        const impuestosr = eval(iibb_bsasr) + eval(iibb_cabar) + eval(perc_ivar) + eval(ivar);
        const roimpr = descccostr + (descccostr * (impuestosr / 100));
        document.formdar.pbrutor.value = roimpr.toFixed(2);
        document.getElementById('roimpimr').textContent = roimpr.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        /* descuentoadicional */
        const preciofinalr = roimpr - (roimpr * (desadir / 100));




        /* costo total unitario */
        document.getElementById('costotunitrr').textContent = preciofinalr.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        document.formdar.costo_totalr.value = preciofinalr.toFixed(2);



        /* costo total bulto */

        preciofinalbr = preciofinalr.toFixed(2) * kilor;
        document.getElementById('costotuxbulr').textContent = preciofinalbr.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        document.formdar.costoxcajar.value = preciofinalbr.toFixed(2);



        <?php if ($modounid == '1') { ?>
            /* compra total bulto*/

            preciocomprar = agrstockr * preciofinalbr;
            document.getElementById('comtotalvr').textContent = preciocomprar.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.formdar.comtotalr.value = preciocomprar.toFixed(2);
        <? } ?>

        <?php if ($modounid == '2') { ?>
            /* compra total unitario*/

            preciocomprar = agrstockr * preciofinalr.toFixed(2);
            document.getElementById('comtotalvr').textContent = preciocomprar.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.formdar.comtotalr.value = preciocomprar.toFixed(2);
        <? } ?>


    }



    window.onload = calculocostor;
</script>