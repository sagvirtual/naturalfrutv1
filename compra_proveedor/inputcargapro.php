<?php

/* sector editar A */

if ($editar == "1") {
    $iditem = $_GET['iditem'];
    $axax = "mod";
    $axaxmod = "Modificar";

    $sqlpredod = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom  Where id_producto = '$idproducto' and id_orden = $id_orden and modo = '0'");
    if ($rowprecioprod = mysqli_fetch_array($sqlpredod)) {
        $fecven = $rowprecioprod["fecven"];
        $agrstock = $rowprecioprod["agrstock"];
        $iditem = $rowprecioprod["id"];

        


        $costoxcaj = $rowprecioprod["costoxcaj"];
        $costo = $rowprecioprod["costo"];
        $descuento = str_replace(".", ",", $rowprecioprod["descuento"]);
        $iibb_bsas = str_replace(".", ",", $rowprecioprod["iibb_bsas"]);
        $iibb_caba = str_replace(".", ",", $rowprecioprod["iibb_caba"]);
        $perc_iva = str_replace(".", ",", $rowprecioprod["perc_iva"]);
        $iva = str_replace(".", ",", $rowprecioprod["iva"]);
        $desadi = str_replace(".", ",", $rowprecioprod["desadi"]);


        if ($modounid == '2') {
            $costoxcaj = $rowprecioprod["costoxcaj"];
        } else {
            $costoxcaj = str_replace(".", ",", $rowprecioprod["costoxcaj"]);
        }

        if ($modounid == '1') {
            $costo = $rowprecioprod["costo"];
        } else {
            $costo = str_replace(".", ",", $rowprecioprod["costo"]);
        }
    }
} else {
    $axaxmod = "Agregar";
}


if ($editar != "1") {
    $sqlprooreds = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id = '$id_proveedor'");
    if ($rowprovders = mysqli_fetch_array($sqlprooreds)) {
        $iibb_bsas = number_format($rowprovders["iibb_bsas"], 2, ',', '');
        $iibb_caba = number_format($rowprovders["iibb_caba"], 2, ',', '');
        $perc_iva = number_format($rowprovders["perc_iva"], 2, ',', '');
        $iva = number_format($rowprovders["iva"], 2, ',', '');
        $descuento = number_format($rowprovders["descuento"], 2, ',', '');
        $desadi = number_format($rowprovders["desadi"], 2, ',', '');
    }
}


?>

<?php
/* style="position: relative; top:9px" */



/* 
if ($modounid == "1" || empty($modounid)) {
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


$sqlcomraa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where id_orden='$id_orden'");
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


if(empty($agrstock)){$agrstock="0";}
if(empty($costoxcaj)){$costoxcaj="0,00";}
if(empty($costo)){$costo="0,00";}




if($fac_a=="1"){$nopusfara='style="display: none;"';}
?>
                
                <form id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                <!-- factura A -->
                <tr <?=$nopusfara?>>

                    <td class="text-center" style="background-color: #FEFEF2;">
                        <h1 style="font-size: 20pt; position:relative; top:5px; "><strong>A</strong></h1>
                        <input type="hidden" id="modo" name="modo" value="0">
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?= $id_usuarioclav ?>">
                        <input type="hidden" id="id_producto" name="id_producto" value="<?= $idproducto ?>">
                        <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?= $id_proveedor ?>">
                        <input type="hidden" id="id_orden" name="id_orden" value="<?= $id_orden ?>">
                        <input type="hidden" id="kilo" name="kilo" value="<?= $canxbul ?>">
                        <input type="hidden" id="tipo" name="tipo" value="1">
                        <input type="hidden" id="unid_bulto" name="unid_bulto" value="<?= $modounid ?>">
                        <input type="hidden" id="iditem" name="iditem" value="<?= $iditem ?>">



                    </td>
                    <td class="text-center" style="background-color: #EDEDED;">
                        <!-- AGREGAR STOCK -->
                        <input type="text" class="form-control autoReplace text-center" id="agrstock" name="agrstock" value="<?= $agrstock ?>" style="font-weight: 900; color:blue; width:80px; margin: 0 auto;"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()">


                    </td>
                    <td class="text-center" style="background-color: <?= $destaca ?>;">
                        <!-- precio x caja -->
                        <strong>
                            <div id="costoxcajv" <?= $vercuenc ?>><?= $costoxcaj ?></div>
                        </strong>
                        <input type="<?= $inputunidb ?>" class="form-control autoReplace text-center" id="costoxcaj" name="costoxcaj" value="<?= $costoxcaj ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()" onKeyUp="calculocosto(); calculopromedio();"  style="color:blue; font-weight: 900; width:110px; margin: 0 auto;" onclick="select()" >

                    </td>
                    <td class="text-center" style="background-color: <?= $destacb ?>;">
                        <!-- Precio UNITARIO -->
                        <strong>
                            <div id="costov" <?= $vercuen ?>><?= $costo ?></div>
                        </strong>
                        <input type="<?= $inputunid ?>" id="costo" name="costo" value="<?= $costo ?>" class="form-control autoReplace text-center" onclick="select()"  onChange="calculocosto()" onKeyDown="calculocosto(); cambiarFocob(event);" onKeyPress="calculocosto()" onKeyUp="calculocosto();  calculopromedio();"style="color:blue; font-weight: 900; width:110px; margin: 0 auto;"  >
                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">

                        <!-- decuento -->
                        <input type="text" class="form-control autoReplace text-center" id="descuento" name="descuento" value="<?= $descuento ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue; width:70px; margin: 0 auto;" >

                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">

                        <!-- precio con descuento -->

                        <strong>
                            <div id="pcondescuv" style="position: relative; top:9px"><?= $pcondescu ?></div>
                        </strong>
                        <input type="hidden" id="pcondescu" name="pcondescu" value="<?= $pcondescu ?>">


                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">
                        <!-- iibb_bsas -->
                        <input type="text" class="form-control autoReplace text-center" id="iibb_bsas" name="iibb_bsas" value="<?= $iibb_bsas ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">

                        <!-- iibb_caba -->
                        <input type="text" class="form-control autoReplace text-center" id="iibb_caba" name="iibb_caba" value="<?= $iibb_caba ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >


                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">
                        <!-- perc_iva -->
                        <input type="text" class="form-control autoReplace text-center" id="perc_iva" name="perc_iva" value="<?= $perc_iva ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >


                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">
                        <!-- iva -->
                        <input type="text" class="form-control autoReplace text-center" id="iva" name="iva" value="<?= $iva ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">
                        <!-- precio bruto -->
                        <input type="hidden" id="pbruto" name="pbruto" value="<?= $pbruto ?>">
                        <strong>
                            <div id="roimpim" style="position: relative; top:9px"><?= $roimpim ?></div>
                        </strong>

                    </td>
                    <td class="text-center" style="background-color: #FEFEF2;">

                        <!-- descuentos adicionales -->
                        <input type="text" class="form-control autoReplace text-center" id="desadi" name="desadi" value="<?= $desadi ?>"  onChange="calculocosto()" onKeyDown="calculocosto()" onKeyPress="calculocosto()"  onKeyUp="calculocosto(); calculopromedio();" onclick="select()" style="color:blue;width:70px; margin: 0 auto;" >

                    </td>
                    <td class="text-center" style="background-color: <?= $destacb ?>">
                        <input type="hidden" class="form-control" id="costo_total" name="costo_total" value="<?= $costo_total ?>"><strong>
                            <div id="costotunitr" style="position: relative; top:9px"></div>
                        </strong>
                    </td>
                    <td class="text-center" style="background-color: <?= $destaca ?>">
                        <input type="hidden" class="form-control" id="costoxcaja" name="costoxcaja" value="<?= $costoxcaja ?>"><strong>
                            <div id="costotuxbul" style="position: relative; top:9px"></div>
                        </strong>
                    </td>
                    <td class="text-center" style="background-color: #EDEDED;">
                        <input type="hidden" class="form-control" id="comtotal" name="comtotal" value="<?= $comtotal ?>"><strong>
                            <div id="comtotalv" style="position: relative; top:9px"></div>
                        </strong>
                    </td>

                </tr>
            </form>


<script>

    function calculocosto() {
        //valores 

        var kilo = document.formda.kilo.value;
        var costoxcaj = document.formda.costoxcaj.value;
        var costo = document.formda.costo.value;
        var agrstock = document.formda.agrstock.value;
        agrstock = agrstock.replace(/,/g, '.');

        var descuento = document.formda.descuento.value;
        var iibb_bsas = document.formda.iibb_bsas.value;
        var iibb_caba = document.formda.iibb_caba.value;
        var perc_iva = document.formda.perc_iva.value;
        var iva = document.formda.iva.value;
        var desadi = document.formda.desadi.value;

        /* quito . y reemplazo cas de decimales */

        costoxcaj = costoxcaj.replace(/\./g, '').replace(/,/g, '.');
        costo = costo.replace(/\./g, '').replace(/,/g, '.');

        descuento = descuento.replace(/\./g, '').replace(/,/g, '.');
        iibb_bsas = iibb_bsas.replace(/\./g, '').replace(/,/g, '.');
        iibb_caba = iibb_caba.replace(/\./g, '').replace(/,/g, '.');
        perc_iva = perc_iva.replace(/\./g, '').replace(/,/g, '.');
        iva = iva.replace(/\./g, '').replace(/,/g, '.');
        desadi = desadi.replace(/\./g, '').replace(/,/g, '.');






        if (kilo === undefined || kilo === null || kilo === '') {
            document.formda.kilo.value = "0".toFixed(2);
        }
        if (costoxcaj === undefined || costoxcaj === null || costoxcaj === '') {
            document.formda.costoxcaj.value = 0.00;
        }
        if (costo === undefined || costo === null || costo === '') {
            document.formda.costo.value = 0.00;
        }
        if (descuento === undefined || descuento === null || descuento === '') {
            document.formda.descuento.value = 0.00;
        }
        if (iibb_bsas === undefined || iibb_bsas === null || iibb_bsas === '') {
            document.formda.iibb_bsas.value = 0.00;
        }
        if (iibb_caba === undefined || iibb_caba === null || iibb_caba === '') {
            document.formda.iibb_caba.value = 0.00;
        }
        if (perc_iva === undefined || perc_iva === null || perc_iva === '') {
            document.formda.perc_iva.value = 0.00;
        }
        if (iva === undefined || iva === null || iva === '') {
            document.formda.iva.value = 0.00;
        }
        if (desadi === undefined || desadi === null || desadi === '') {
            document.formda.desadi.value = 0.00;
        }






        <?php if ($modounid == '1') { ?>


            /* costo por unidad */
            costocau = costoxcaj / kilo;
            document.formda.costo.value = costocau.toFixed(2);
            document.getElementById('costov').textContent = costocau.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        <?
        } else {

        ?>

            /* costo por caja */
            costocau = costo;
            costoxbul = costo * kilo;
            document.formda.costoxcaj.value = costoxbul.toFixed(2);
            document.getElementById('costoxcajv').textContent = costoxbul.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

        <?php

        }

        ?>
        /* descuento costo */
        const descccost = costocau - (costocau * (descuento / 100));
        document.formda.pcondescu.value = descccost.toFixed(2);
        document.getElementById('pcondescuv').textContent = descccost.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        /* precio bruto */
        const impuestos = eval(iibb_bsas) + eval(iibb_caba) + eval(perc_iva) + eval(iva);
        const roimp = descccost + (descccost * (impuestos / 100));
        document.formda.pbruto.value = roimp.toFixed(2);
        document.getElementById('roimpim').textContent = roimp.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        /* descuentoadicional */
        const preciofinal = roimp - (roimp * (desadi / 100));




        /* costo total unitario */
        document.getElementById('costotunitr').textContent = preciofinal.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        document.formda.costo_total.value = preciofinal.toFixed(2);



        /* costo total bulto */

        preciofinalb = preciofinal.toFixed(2) * kilo;
        document.getElementById('costotuxbul').textContent = preciofinalb.toLocaleString('es-ES', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        document.formda.costoxcaja.value = preciofinalb.toFixed(2);



        <?php if ($modounid == '1') { ?>
            /* compra total bulto*/

            preciocompra = agrstock * preciofinalb;
            document.getElementById('comtotalv').textContent = preciocompra.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.formda.comtotal.value = preciocompra.toFixed(2);
        <? } ?>

        <?php if ($modounid == '2') { ?>
            /* compra total unitario*/

            preciocompra = agrstock * preciofinal.toFixed(2);
            document.getElementById('comtotalv').textContent = preciocompra.toLocaleString('es-ES', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.formda.comtotal.value = preciocompra.toFixed(2);
        <? } ?>


    }



    
</script>

<script>
  function cambiarFocob(event) {
    if (event.key === 'ArrowDown') {
      // Obtener el elemento de entrada
      var inputElement = document.getElementById('agrstockr');

      // Establecer el enfoque en el elemento
      inputElement.focus();

      // Seleccionar todo el texto después de un breve retraso
      setTimeout(function() {
        inputElement.setSelectionRange(0, inputElement.value.length);
      }, 0);
    }
  }
</script>