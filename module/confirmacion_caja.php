<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');

$desde_date = base64_decode($_GET['fdmkms']);
$IdProducto = base64_decode($_GET['jjdfngh']);
$id_clientedec = base64_decode($_GET['jjtadfngh']);











$sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT DISTINCT id_producto FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec' and id_producto='$IdProducto' ORDER BY `item_orden`.`fecha` ASC");

while ($rowitem_ordendis = mysqli_fetch_array($sqlitem_orden)) {
    $id_producto = $rowitem_ordendis["id_producto"];
    $kilos = ${"kilos" . $id_producto};
    $kilosv = ${"kilos" . $id_producto};
    $totalliqv = ${"totalliqv" . $id_producto};
    $totalprov = ${"totalprov" . $id_producto};
    $cliente_prov = ${"cliente_prov" . $id_producto};
    $noverpagcl = ${"noverpagcl" . $id_producto};
    $par = ${"par" . $id_producto};


    $regis = $regis + 1;




    $sqlcargav = mysqli_query($rjdhfbpqj, "SELECT * FROM carga Where fecha = '$desde_date' and id_proveedor='$id_clientedec' and id_producto='$IdProducto'");
    if ($rowcarga = mysqli_fetch_array($sqlcargav)) {
        $kilos = $rowcarga["kilos"];
        $kilosv = $rowcarga["kilos"];
        $kilos = number_format($kilos, 2, '.', '');
        $confirmado = $rowcarga["confirmado"];
    }
    $sqlitem_ordendis = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha = '$desde_date'  and id_proveedor='$id_clientedec'  and id_producto='$IdProducto' ORDER BY `item_orden`.`nombre` ASC");
    while ($rowitem_orden = mysqli_fetch_array($sqlitem_ordendis)) {
        $nombreprod = $rowitem_orden["nombre"];


        $noverpagcl = $rowitem_orden["valor"];
        $id_clienteitem = $rowitem_orden["id_cliente"];
        $idite = $rowitem_orden["id"];
        $fecha = $rowitem_orden["fecha"];
        $modo = $rowitem_orden["modo"];
        $cliente_prov = $rowitem_orden["cliente_prov"];
        if($confirmado!='1'){
        $kilos += $rowitem_orden["kilos"];
        $kilosv += $rowitem_orden["kilos"];
        $kilos = number_format($kilos, 2, '.', '');
        }
        $desde_datecod = base64_encode($desde_date);


        $idcodp = base64_encode($idite);
        $nombreb = ${"nombreb" . $rowitem_orden["id"]};
    }





    //estraigo los kilos por el cual viene el cajon
    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto='$id_producto' ORDER BY `precioprod`.`id` DESC");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
        $kilocajon = $rowprecioprod["kilo"];
    }

    //calculo cuantos cajones se piden
    $canticajones = $kilos / $kilocajon;

    $canticajonesred = explode(".", $canticajones);

    $cajonentero = $canticajonesred[0];

    $pediporkilo = $cajonentero * $kilocajon;
    $pediporkilov = $kilos - $pediporkilo;

    if ($pediporkilov > 0) {
        $pediporkilovok = "+ " . $pediporkilov . "kg.";
    } else {
        $pediporkilovok = "";
    }
    //
}

?>
<style>
    a {
        color: black;
    }
</style>

<div class="contentbar">


    <div class="col-lg-12">
        <a href="orden_carga?hfbbd=<?=$_GET['jjtadfngh']?>&podjfuu=<?=$_GET['fdmkms']?>">
    <h2 class="card-title"><strong>ORDEN DE CARGA </strong></h2></a>
        <!-- Start row -->
        <div class="row">
            
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">
            
                <table style="width:100%;">
                    <tr>
                        <td> <br>
                            <div class="row">
                                <div class="input-group mb-3 col-lg-6">
                                    <h2 style="text-align: center;"><?= $nombreprod ?></h2>
                                    <div id="muestrocarga"> </div>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light" type="button" id="button-addon1">Cajas</button>
                                    </div>
                                    <input type="number" name="cajas" id="cajas" class="form-control" style="font-weight: bold; color:black; font-size:30pt;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $cajonentero ?>" onclick="select()">
                                </div>
                                <div class="input-group mb-3 col-lg-6">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light" type="button" id="button-addon1">Kilos<br>Extras</button>
                                    </div>
                                    <input type="number" name="kilosex" id="kilosex" class="form-control" style="font-weight: bold; color:black;  font-size:20pt;" aria-label="Example text with button addon" aria-describedby="button-addon1" value="<?= $pediporkilov ?>" onclick="select()">
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>

                            <input type="hidden" name="fecha" id="fecha" value="<?= $_GET['fdmkms'] ?>">
                            <input type="hidden" name="id_producto" id="id_producto" value="<?= $_GET['jjdfngh'] ?>">
                            <input type="hidden" name="id_proveedor" id="id_proveedor" value="<?= $_GET['jjtadfngh'] ?>">
                        </td>
                    </tr>


                </table>
                <div id="muestrocaja"> </div>
            </div>
        </div>
        <br>
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">

                <div id="muestrocaja"> </div>
                <div style="padding-bottom: 10px; padding-top:10px;">
                    <button type="button" class="btn btn-success btn-lg btn-block" onclick="ajax_carga($('#id_proveedor').val(), $('#id_producto').val(), $('#fecha').val(), $('#kilosex').val(), $('#cajas').val());" style="font-size:20pt; padding-bottom: 10px; padding-top:10px; height:100px;"><b>CONFIRMAR CARGA</b></button>

                </div>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12" style="background-color: #ffffff; width:100%;">

                <div style="padding-bottom: 10px; padding-top:10px;">
                    <button type="button" class="btn btn-danger btn-lg btn-block" onclick="ajax_carga($('#id_proveedor').val(), $('#id_producto').val(), $('#fecha').val(), $('#kilosex').val(0), $('#cajas').val(0));"><b>SIN STOCK</b></button>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="ajax_carga.js"></script>













<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>