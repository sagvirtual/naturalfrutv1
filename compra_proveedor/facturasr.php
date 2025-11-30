
<?
$sqlcomraav = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '1' and id_orden='$id_orden'");
        if ($rowcompav = mysqli_fetch_array($sqlcomraav)) {?>
        <hr>
<table class="table table-bordered table-hover">
    <h3><strong>Compra "R"</strong></h3>
    <thead>
    <tr>
            <th style="text-align: center; "><ns style="position: relative; top:-8px"> Cant.</ns></th>
            <th style="text-align: center;"><ns style="position: relative; top:-8px">Unid.</th>
            <th style="text-align: center;"><ns style="position: relative; top:-8px">Detalle</ns></th>
            <th style="text-align: center;">Precio</th>
            <th style="text-align: center;">Precio<br>Unidad</th>
            <th style="text-align: center;"><ns style="position: relative; top:-8px">Desc.</ns></th>
            <th style="text-align: center;">Precio<br>C/Desc.</th>
            <th style="text-align: center;">IIBB<br>BS&nbsp;AS</th>
            <th style="text-align: center;">IIBB<br>CABA</th>
            <th style="text-align: center;">Perc.<br>IVA</th>
            <th style="text-align: center;"><ns style="position: relative; top:-8px">IVA</ns></th>
            <th style="text-align: center;">Precio<br>Brut.</th>
            <th style="text-align: center;">Desc.<br>Adic.</th>
            <th style="text-align: center;">Precio<br>Final&nbsp;Unid.</th>
            <th style="text-align: center;">Precio<br>Final</th>
            <th style="text-align: center;">Compra<br>Total</th>
            <? if($cerrado==0){?>
            <th style="text-align: center; width: 27mm;">Opciones</th>
            <? }?>
        </tr>
    </thead>
    <tbody>

        <?php
       $comillas = "'";

        $sqlcomraar = mysqli_query($rjdhfbpqj, "SELECT * FROM prodcom Where modo = '1' and id_orden='$id_orden' ORDER BY `prodcom`.`id` ASC");
        while ($rowcompar = mysqli_fetch_array($sqlcomraar)) {

            $idprdifr = $rowcompar["id"];

            

            $id_producto = $rowcompar["id_producto"];
            $canxbul = ${"canxbul" . $id_producto};
            $fecha = $rowcompar["fecha"];
            $canxbul = $rowcompar["kilo"];
            $kilo = $rowcompar["kilo"];
            $nref = $rowcompar["nref"];
            $fecven = $rowcompar["fecven"];
            $costoxcaj = number_format($rowcompar["costoxcaj"], 2, ',', '.');
            $costo = number_format($rowcompar["costo"], 2, ',', '.');
            $descuento = number_format($rowcompar["descuento"], 2, ',', '.');
            $pcondescu = number_format($rowcompar["pcondescu"], 2, ',', '.');
            $iibb_bsas = number_format($rowcompar["iibb_bsas"], 2, ',', '.');
            $iibb_caba = number_format($rowcompar["iibb_caba"], 2, ',', '.');
            $perc_iva = number_format($rowcompar["perc_iva"], 2, ',', '.');
            $iva = number_format($rowcompar["iva"], 2, ',', '.');
            $pbruto = number_format($rowcompar["pbruto"], 2, ',', '.');
            $desadi = number_format($rowcompar["desadi"], 2, ',', '.');
            $costo_total = number_format($rowcompar["costo_total"], 2, ',', '.');
            $costoxcaja = number_format($rowcompar["costoxcaja"], 2, ',', '.');
            $unid_bulto = $rowcompar["unid_bulto"];
            $cpratotal_prod = number_format($rowcompar["cpratotal_prod"], 2, ',', '.');


            $cpratotal_comvr += $rowcompar["cpratotal_prod"];
            $cpratotal_comr = number_format($cpratotal_comvr, 2, ',', '.');



            /* nombre del producto */
            $sqlprodcom = ${"sqlprodcom" . $idprdifr};
            $rowprodtos = ${"rowprodtos" . $idprdifr};
            $nombreproa = ${"nombreproa" . $idprdifr};
            $unidadnom = ${"unidadnom" . $idprdifr};
            $modo_producto = ${"modo_producto" . $idprdifr};
            $unidadnomav = ${"unidadnomav" . $idprdifr};
           
            $nombrepro = ${"nombrepro" . $idprdifr};
            $unidadnav = ${"unidadnav" . $idprdifr};


            $sqlprodcom = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$id_producto'");
            if ($rowprodtos = mysqli_fetch_array($sqlprodcom)) {

                $nombreproa = $rowprodtos["nombre"];
                $unidadnom = $rowprodtos["unidadnom"];
                $modo_producto = $rowprodtos["modo_producto"];
                $unidadnomav = $rowprodtos["modo_producto"];
                //$canxbul = $rowprodtos["kilo"];



/* 
                if ($modo_producto == "0") {
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
        <td style="text-align: center;">' . $rowcompar["agrstock"] . '</td> 
        <td style="text-align: center;">' . $unidadnav . '</td> 
            <td style="text-align: left;"><strong>' . $nombrepro . '</strong></td>
            <td style="text-align: right;">$' . $costoxcaj . '</td>
            <td style="text-align: right;">$' . $costo . '</td>
            <td style="text-align: center;">%&nbsp;'. $descuento . '</td>
            <td style="text-align: right;">$' . $pcondescu . '</td>
            <td style="text-align: center;">%&nbsp;'. $iibb_bsas . '</td>
            <td style="text-align: center;">%&nbsp;'. $iibb_caba . '</td>
            <td style="text-align: center;">%&nbsp;'. $perc_iva . '</td>
            <td style="text-align: center;">%&nbsp;'. $iva . '</td>
            <td style="text-align: right;">$' . $pbruto . '</td>
            <td style="text-align: center;">%&nbsp;'. $desadi . '</td>
            <td style="text-align: right;">'.$boldunida.'$' . $costo_total . ''.$boldunidb.'</td>
            <td style="text-align: right;">'. $boldbulta.'$' . $costoxcaja . ''. $boldbultb.'</td>
            
            <td style="text-align: right;"><strong>$' . $cpratotal_prod . '</strong></td>';
            if($cerrado==0){
            echo'
            <td style="text-align: center;>
            <input type="hidden" name="iditem' . $rowcompar['id'] . '" id="iditem' . $rowcompar['id'] . '" value="' . $rowcompar['id'] . '"> <a href="?ookdjfv=' . $rowcompar['id_proveedor'] . '&editar=1&iditem=' . $rowcompar['id'] . '&idproducto=' . $rowcompar['id_producto'] . '&id_orden='.$id_orden.'" tabindex="-1">
            <button type="button" class="btn btn-success btn-sm" tabindex="-1">✎</button></a>&nbsp;
            <button type="button" class="btn btn-danger btn-sm"  onclick="ajax_eliminar(' . $comillas . '' . $rowcompar['id'] . '' . $comillas . ');" tabindex="-1">X</button>

        </td>';
            }

            echo'<tr>
';
        }

        ?>






        <tr>
            <td style="text-align: right;" colspan="15"><h3>TOTAL</h3></td>
            <td style="text-align: right;"><h3>$<?=$cpratotal_comr?></h3></td>
            <? if($cerrado==0){?>
            <td></td>
            <? }?>


        </tr>

    </tbody>
</table>





<?
}?>