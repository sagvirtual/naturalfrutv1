<?php





$stockdispom = SumaStock($rjdhfbpqj, $idproduc);
function prodvarios($rjdhfbpqj, $idproduc, $stockdispom)
{

    /* veo el fraccionado info del producto */
    $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$idproduc'");
    if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
        $cantidbiene = $rowpdaod['kilo'];
        $unidadnom = $rowpdaod['unidadnom'];
        $modo_producto = $rowpdaod['modo_producto'];
        /*     $ventaminima = $rowpdaod['ventaminma'];
        $fraccionado = $rowpdaod['fracionado'];
        $mensaje = $rowpdaod['mensaje'];
        $id_categoria = $rowpdaod['categoria'];
        $id_marca = $rowpdaod['id_marcas']; */



        /* saber como lo venden al producto en la lista de precio */

        $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$idproduc' and cerrado = '1' and nref='Compra' ORDER BY fecha DESC, id DESC;");
        if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
            $costo_total = $rowprecioprod["costo_total"];
            $id_ordencomra = $rowprecioprod["id_orden"];
            $costoxcaja = $rowprecioprod["costoxcaja"];
            $fechaultco = $rowprecioprod["fecha"];

            $cantickl = comprapro($rjdhfbpqj, $idproduc, $id_ordencomra);
            // $cantickl = $rowprecioprod["agrstock"];
            $canticompr = $cantickl / $cantidbiene;
        }

        $stockdibulto = $stockdispom / $cantidbiene;
        /*         $cantidadcom = $rowprecioprod["agrstock"];
        $cantidaddbul = $rowprecioprod["agrstock"] / $cantidbiene; */

        /*     if ($cantidaddbul > 0 && $cantidaddbul < 1) {
            $cantidadcombul = '1';
        } else {

            $cantidadcombul = number_format($cantidaddbul, 0, '.', '');
        } */

        /*     $importecomd = $cantidadcom * $costo_total;
        $importecom = number_format($importecomd, 2, '.', ''); */
        /*  $totalited += $roworden['total'];
        $totalite = number_format($totalited, 2, '.', '');

        $comovbulto = $cantidadbiene . "&nbsp;" . $nombreunid;

        if ($tipounidad == '0') {
            $nombredcomo = $nombreunid;
        } elseif ($tipounidad == '2') {
            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
            $nombredcomo = $nombreunid;
        } elseif ($tipounidad == '1') {
            $comoviene = "- x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
            $nombredcomo = $nombrebult;
        } elseif (empty($tipounidad)) {
            $comoviene = "- " . $nombrebult . "&nbsp;x&nbsp;" . $cantidadbiene . "&nbsp;" . $nombreunid;
            $nombredcomo = $nombreunid;
        } */
    }


    return array('costo_total' => $costo_total, 'costoxcaja' => $costoxcaja, 'stockdibulto' => $stockdibulto, 'comovbultod' => $cantidbiene, 'unidadnom' => $unidadnom, 'fechaultco' => $fechaultco, 'canticompr' => $canticompr, 'modo_producto' => $modo_producto, 'unidadnom' => $unidadnom, 'cantickl' => $cantickl);
}
$rawpro = prodvarios($rjdhfbpqj, $idproduc, $stockdispom);

$costo_total = $rawpro['costoxcaja'];
$costo_unit = $rawpro['costo_total'];
$stockdibultod = $rawpro['stockdibulto'];
$cantickl = $rawpro['cantickl'];
$canticompr = $rawpro['canticompr'];
$comovbultod = $rawpro['comovbultod'] . " " . $rawpro['unidadnom'];
$comoprsd = $rawpro['comovbultod'];
$fechaultd = $rawpro['fechaultco'];
$unidadnom = $rawpro['unidadnom'];
$modo_producto = $rawpro['modo_producto'];
$fechauldtd = date('d/m/y', strtotime($fechaultd));

$totalcompra = $costo_total * $canticompr;
?><div class="container-fluid" id="buscarproi">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th style="text-align:left; padding-left: 10px;">Productos varios</th>
                <th style="width: 10px;text-align:center;"></th>
                <th style="width: 100px;text-align:center;">Stock</th>
                <th style="width: 100px;text-align:center;">Stock Bulto</th>
                <th style="width: 100px;text-align:center;">Bulto</th>

                <th style="width: 110px;text-align:center;">UC Fecha </th>
                <th style="width: 100px;padding-left: 10px;">UC Cant.</th>
                <th style="width: 100px;padding-left: 10px;">UC Cant.Bulto</th>
                <th style="width: 100px;text-align:center;">Bulto</th>
                <th style="width: 100px;text-align:center;">Pedir</th>
                <th style="width: 150px;text-align:center;">Costo</th>
                <th style="width: 150px;text-align:center;">Total</th>
                <th style="width: 100px;text-align:center;"></th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td style="padding-left: 2mm;">

                    <?php

                    include('../orden_de_compra/inpubuscado.php');

                    $hapdalds = ubicacionprohab($rjdhfbpqj, $idproduc);
                    if ($hapdalds > 0) {
                        $hapadts = '&nbsp;&nbsp;<w style="color:red;">↑ hay ' . $hapdalds . ' Pallets aproximado.</w>';
                    } else {
                        $hapadts = "";
                    }
                    echo '' . $hapadts . '';


                    ?>
                </td>
                <td style="width:38px;">








                </td>
                <td style="text-align:center;">
                    <input type="text" class="form-control text-center" value="<?= $stockdispom ?>" disabled>
                </td>
                <td style="text-align:center;">
                    <input type="text" class="form-control text-center" value="<?= number_format($stockdibultod, 2, '.', '') ?>" disabled>
                </td>
                <td style="text-align:center;">
                    <input type="text" class="form-control text-center" value="<?= $comovbultod ?>" disabled>
                </td>

                <td style="text-align:center;">
                    <input type="text" class="form-control text-center" value="<?= $fechauldtd ?>" disabled>
                </td>

                <td style="text-align:center;">
                    <input type="text" value="<?= $cantickl ?>" class="form-control" style="text-align:center;" disabled>

                </td>
                <td style="text-align:center;">
                    <input type="text" value="<?= number_format($canticompr, 2, '.', '') ?>" class="form-control" style="text-align:center;" disabled>

                </td>
                <td style="padding-left: 2mm;">

                    <select id="unidadr" class="form-select" tabindex="-1" onChange="preciobultoun('1', $('#unidadr').val(), '<?= $comoprsd ?>','<?= $costo_unit ?>');
                   calculocostor();
                    
                    ">

                        <option value="1"><?= $modo_producto ?></option>
                        <option value="0"><?= $unidadnom ?></option>

                    </select>

                </td>

                <td style="text-align:center;">
                    <input type="number" id="cantidadr" value="<?= $canticompr ?>" class="form-control" min="0"



                        onkeyup="calculocostor();" onclick="select()" onChange="calculocostor();"
                        style="text-align:center;">

                </td>




                <td style="text-align:center;">
                    <input type="text" id="improteunr" value="<?= $costo_total ?>" class="form-control" style="text-align:right;"

                        onkeyup="calculocostor();" onclick="select()">

                </td>
                <td style="text-align:center;">
                    <input type="text" id="importtotr" value="<?= $totalcompra ?>" class="form-control" style="text-align:right;">
                </td>
                <td style="text-align:center; ">



                    <button type="button" class="btn btn-light"

                        onclick="ajax_ordenbajarun('<?= $idproduc ?>',$('#cantidadr').val(),$('#unidadr').val(),$('#improteunr').val(),$('#importtotr').val());" style="width: 100%;">Agregar</button>















                </td>
            </tr>
        </tbody>
    </table>

</div>