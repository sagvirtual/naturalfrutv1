<?
$sqlcomraae = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '0' and id_orden='$id_orden'");
if ($rowcompas = mysqli_fetch_array($sqlcomraae)) { ?>
    <hr>
    <table class="table table-bordered table-hover">
        <h3><strong>Compra "A"</strong></h3>
        <thead>
            <tr>
                <th style="text-align: center; ">
                    <ns style="position: relative; top:-8px"> Cant.</ns>
                </th>
                <th style="text-align: center;">
                    <ns style="position: relative; top:-8px">Unid.
                </th>
                <th style="text-align: center;">
                    <ns style="position: relative; top:-8px">Detalle</ns>
                </th>
                <th style="text-align: center;">Precio</th>
                <th style="text-align: center;">Precio<br>Unidad</th>
                <th style="text-align: center;">
                    <ns style="position: relative; top:-8px">Desc.</ns>
                </th>
                <th style="text-align: center;">Precio<br>C/Desc.</th>
                <th style="text-align: center;">IIBB<br>BS&nbsp;AS</th>
                <th style="text-align: center;">IIBB<br>CABA</th>
                <th style="text-align: center;">Perc.<br>IVA</th>
                <th style="text-align: center;">
                    <ns style="position: relative; top:-8px">IVA</ns>
                </th>
                <th style="text-align: center;">Precio<br>Brut.</th>
                <th style="text-align: center;">Desc.<br>Adic.</th>
                <th style="text-align: center;">Precio<br>Final&nbsp;Unid.</th>
                <th style="text-align: center;">Precio<br>Final</th>
                <th style="text-align: center;">Compra<br>Total</th>
                <? if ($cerrado == 0) { ?>
                    <th style="text-align: center; width: 27mm;">Opciones</th>
                <? } ?>
            </tr>
        </thead>
        <tbody>

            <?php
            $comillas = "'";

            $sqlcomraa = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '0' and id_orden='$id_orden' ORDER BY `prodcom`.`id` ASC");
            while ($rowcompa = mysqli_fetch_array($sqlcomraa)) {

                $idprdif = $rowcompa["id"];

                $canxbul = ${"canxbul" . $idprdif};

                $id_producto = $rowcompa["id_producto"];
                $fecha = $rowcompa["fecha"];

                $kilo = $rowcompa["kilo"];
                $canxbul = $rowcompa["kilo"];
                $nref = $rowcompa["nref"];
                $fecven = $rowcompa["fecven"];
                $costoxcaj = number_format($rowcompa["costoxcaj"], 2, ',', '.');
                $costo = number_format($rowcompa["costo"], 2, ',', '.');
                $descuento = number_format($rowcompa["descuento"], 2, ',', '.');
                $pcondescu = number_format($rowcompa["pcondescu"], 2, ',', '.');
                $iibb_bsas = number_format($rowcompa["iibb_bsas"], 2, ',', '.');
                $iibb_caba = number_format($rowcompa["iibb_caba"], 2, ',', '.');
                $perc_iva = number_format($rowcompa["perc_iva"], 2, ',', '.');
                $iva = number_format($rowcompa["iva"], 2, ',', '.');
                $pbruto = number_format($rowcompa["pbruto"], 2, ',', '.');
                $desadi = number_format($rowcompa["desadi"], 2, ',', '.');
                $costo_total = number_format($rowcompa["costo_total"], 2, ',', '.');
                $costoxcaja = number_format($rowcompa["costoxcaja"], 2, ',', '.');
                $unid_bulto = $rowcompa["unid_bulto"];
                $cpratotal_prod = number_format($rowcompa["cpratotal_prod"], 2, ',', '.');


                $cpratotal_comv += $rowcompa["cpratotal_prod"];
                $cpratotal_com = number_format($cpratotal_comv, 2, ',', '.');



                $base_imponible = $cpratotal_comv / (1 + ($rowcompa["iibb_bsas"] + $rowcompa["iibb_caba"] + $rowcompa["perc_iva"] + $rowcompa["iva"]) / 100);

                //IIBB BS AS
                $iibb_bsasgral = $base_imponible * ($rowcompa["iibb_bsas"] / 100);


                //IIBB iibb_caba
                $iibb_cabgral = $base_imponible * ($rowcompa["iibb_caba"] / 100);


                //Perc IVA
                $perc_ivagral = $base_imponible * ($rowcompa["perc_iva"] / 100);


                //iva
                $ivagral = $base_imponible * ($rowcompa["iva"] / 100);

                /* nombre del producto */
                $sqlprodcom = ${"sqlprodcom" . $idprdif};
                $rowprodtos = ${"rowprodtos" . $idprdif};
                $nombreproa = ${"nombreproa" . $idprdif};
                $unidadnom = ${"unidadnom" . $idprdif};
                $modo_producto = ${"modo_producto" . $idprdif};
                $unidadnomav = ${"unidadnomav" . $idprdif};

                $nombrepro = ${"nombrepro" . $idprdif};
                $unidadnav = ${"unidadnav" . $idprdif};


                $sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
                if ($rowprodtos = mysqli_fetch_array($sqlprodcom)) {

                    $nombreproa = $rowprodtos["nombre"];
                    $unidadnom = $rowprodtos["unidadnom"];
                    $modo_producto = $rowprodtos["modo_producto"];
                    $unidadnomav = $rowprodtos["modo_producto"];
                    //$canxbul = $rowprodtos["kilo"];




                    /*   if ($modo_producto == "0") {
                    $unidadnomav = "Caja";
                }
                if ($modo_producto == "1") {
                    $unidadnomav = "Bolsa";
                }
                if ($modo_producto == "2") {
                    $unidadnomav = "Kg.";
                }
                if ($modo_producto == "3") {
                    $unidadnomav = "Pack";
                } */
                }

                if ($unid_bulto == "2") {
                    $unidadnav = $unidadnom;
                    $boldunida = "<strong>";
                    $boldunidb = "</strong>";
                    $nombrepro = $nombreproa;
                } else {
                    $unidadnav = $unidadnomav;
                    $boldbulta = "<strong>";
                    $boldbultb = "</strong>";
                    $nombrepro = $nombreproa . " - " . $unidadnomav . " x " . $canxbul . " " . $unidadnom;
                }



                echo '

            <tr>
        <td style="text-align: center;">' . $rowcompa["agrstock"] . '</td> 
        <td style="text-align: center;">' . $unidadnav . '</td> 
            <td style="text-align: left;"><strong>' . $nombrepro . '</strong></td>
            <td style="text-align: right;">$' . $costoxcaj . '</td>
            <td style="text-align: right;">$' . $costo . '</td>
            <td style="text-align: center;">%&nbsp;' . $descuento . '</td>
            <td style="text-align: right;">$' . $pcondescu . '</td>
            <td style="text-align: center;">%&nbsp;' . $iibb_bsas . '</td>
            <td style="text-align: center;">%&nbsp;' . $iibb_caba . '</td>
            <td style="text-align: center;">%&nbsp;' . $perc_iva . '</td>
            <td style="text-align: center;">%&nbsp;' . $iva . '</td>
            <td style="text-align: right;">$' . $pbruto . '</td>
            <td style="text-align: center;">%&nbsp;' . $desadi . '</td>
            <td style="text-align: right;">' . $boldunida . '$' . $costo_total . '' . $boldunidb . '</td>
            <td style="text-align: right;">' . $boldbulta . '$' . $costoxcaja . '' . $boldbultb . '</td>
            
            <td style="text-align: right;"><strong>$' . $cpratotal_prod . '</strong></td>';
                if ($cerrado == 0) {
                    echo '<td style="text-align: center;>
            <input type="hidden" name="iditem' . $rowcompa['id'] . '" id="iditem' . $rowcompa['id'] . '" value="' . $rowcompa['id'] . '">            
            <a href="?ookdjfv=' . $rowcompa['id_proveedor'] . '&editar=1&iditem=' . $rowcompa['id'] . '&idproducto=' . $rowcompa['id_producto'] . '&id_orden=' . $id_orden . '" tabindex="-1">
            <button type="button" class="btn btn-success btn-sm" tabindex="-1">✎</button></a>&nbsp;<button type="button" class="btn btn-danger btn-sm"  onclick="ajax_elimina(' . $comillas . '' . $rowcompa['id'] . '' . $comillas . ');" tabindex="-1">X</button>
            </td>';
                }

                echo '</tr>
';
            }

            ?>

            <?php

            if ($iibb_bsasgral != '0') {

            ?>

                <tr>
                    <td style="text-align: right;" colspan="15">
                        <h5>IIBB BS AS </h5>
                    </td>
                    <td style="text-align: right;">
                        <h5>$<?= number_format($iibb_bsasgral, 2, ',', '.') ?></h5>
                    </td>
                    <? if ($cerrado == 0) { ?>
                        <td></td>
                    <? } ?>
                </tr>
            <?php

            }
            if ($iibb_cabgral != '0') {
            ?>
                <tr>
                    <td style="text-align: right;" colspan="15">
                        <h5>IIBB CABA </h5>
                    </td>
                    <td style="text-align: right;">
                        <h5>$<?= number_format($iibb_cabgral, 2, ',', '.') ?></h5>
                    </td>
                    <? if ($cerrado == 0) { ?>
                        <td></td>
                    <? } ?>
                </tr>
            <?php

            }
            if ($perc_ivagral != '0') {
            ?>
                <tr>
                    <td style="text-align: right;" colspan="15">
                        <h5>PERC IVA </h5>
                    </td>
                    <td style="text-align: right;">
                        <h5>$<?= number_format($perc_ivagral, 2, ',', '.') ?></h5>
                    </td>
                    <? if ($cerrado == 0) { ?>
                        <td></td>
                    <? } ?>
                </tr>
            <?php

            }
            if ($ivagral != '0') {
            ?>
                <tr>
                    <td style="text-align: right;" colspan="15">
                        <h5>IVA</h5>
                    </td>
                    <td style="text-align: right;">
                        <h5>$<?= number_format($ivagral, 2, ',', '.') ?></h5>
                    </td>
                    <? if ($cerrado == 0) { ?>
                        <td></td>
                    <? } ?>
                </tr>
            <? } ?>



            <tr>
                <td style="text-align: right;" colspan="15">
                    <h3>TOTAL</h3>
                </td>
                <td style="text-align: right;">
                    <h3>$<?= $cpratotal_com ?></h3>
                </td>
                <? if ($cerrado == 0) { ?>
                    <td></td>
                <? } ?>

            </tr>

        </tbody>
    </table>





<?
} ?>