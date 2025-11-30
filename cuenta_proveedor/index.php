<?php include('../f54du60ig65.php');
include('../template/cabezal.php');

$fottyd = $_GET['fort'];


if ($fottyd == '1') {
    $id_cliente = $_GET['hfbbd'];
    $ventascobros='0';
} else {
    $id_cliente = $_POST['id_cliente'];

$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];
$ventascobros = $_POST['ventascobros'];


}








$id_clientedec = base64_decode($id_cliente);
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, "es_RA");
$fechahoypo = date("Y-m-d");

//fecha por defecto
if (empty($desde_date)) {


    $fecha = date("d/m/Y");

    /** Actual month last day **/
    $month = date('m');
    $year = date('Y');
    $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

    $hasta_date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));


    /** Actual month first day **/
    $month = date('m');
    $year = date('Y');
    $desde_date = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
}

//


if ($id_cliente != 'MA==') {
    $sqlmodo = " and id_proveedor=" . $id_clientedec;
} else {
    $todos = "a todos los proveedores";
}
if($ventascobros=='0'){$todos2="Debo "; $selo = "selected";}
if($ventascobros=='1'){$todos2="Total Compras ";  $sel1 = "selected"; $sqlmodoventas=" and precioprov!='0'";}
if($ventascobros=='2'){$todos2="Total Pagos "; $sel2 = "selected"; $sqlmodoventas=" and valorprov!='0'";}



/* ventas anterior */
$sqlitem_ordena = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where  fecha < '$desde_date' $sqlmodo and stock='0' and conf_entrega='1' and conf_entrega2='1'");
while ($rowitem_ordena = mysqli_fetch_array($sqlitem_ordena)) {


    $subtotalante += $rowitem_ordena["totalprov"];
    $valortotal += $rowitem_ordena["valorprov"];
}

$subtotala = $subtotalante - $valortotal;
$subtotalav  = number_format($subtotala, 2, '.', '');
/* fin */

/* total ventas  tengo que hacer un join con los pagos */
$sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' $sqlmodo  $sqlmodoventas  and stock='0' and conf_entrega='1' and conf_entrega2='1' ORDER BY `item_orden`.`fecha` ASC");
while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {


    $subtotalev += $rowitem_orden["totalprov"];
    $pagostotal += $rowitem_orden["valorprov"];
}


if ($ventascobros == '0' && empty($ventascobros)) {
    $subtotale = $subtotalev - $pagostotal;
    $subtotalev = $subtotale + $subtotala;
    $mostrarvenant="1";
} else {

    if($ventascobros == '1'){$subtotalev = $subtotalev;}
    if($ventascobros == '2'){$subtotalev = $pagostotal;}
    $mostrarvenant="0";
    
}

$subtotalv = number_format($subtotalev, 2, '.', '');
/* fin */
?>

<!-- Select2 css -->
<link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<!-- Tagsinput css -->
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title"><i class="fa fa-file-text"></i> Deuda Proveedores </h4>


        </div>

    </div>
</div>

<div class="contentbar">
    <form action="/cuenta_proveedor/index" method="POST" enctype="multipart/form-data">

        <!-- Start row -->
        <div class="row">

            <!-- Proveedores -->

            <div class="col-sm-10">
                <select class="select2-multi-select form-control" id="id_cliente" name="id_cliente">
                    
                    <?php



                    $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores ORDER BY `proveedores`.`address` ASC");
                    while ($rowclientes = mysqli_fetch_array($sqlclientes)) {
                        $idcliente = base64_encode($rowclientes["id"]);


                        echo ' <option value="' . $idcliente . '" ';

                        if ($id_clientedec == $rowclientes["id"]) {
                            echo "selected";
                        }


                        echo '>' . $rowclientes["empresa"] . ', ' . $rowclientes["address"] . '</option>';
                    }



                    ?>
<option value="MA==">Todos los Proveedores</option>
                </select>

            </div>

        </div>
        <br>


        <div class="row">

            <!-- clientes -->
            <div class="col-sm-10 text-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Desde:</label>
                <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>">

                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Hasta:</label>

                <input type="date" id="hasta_date" name="hasta_date" value="<?= $hasta_date ?>">
                &nbsp;&nbsp;

    
                <select name="ventascobros" id="ventascobros">
                    <option value="0" <?=$selo?>>Todo  </option>
                    <option value="1" <?=$sel1?>>Compras</option>
                    <option value="2" <?=$sel2?>>Pagos</option>
                </select>

                &nbsp;&nbsp;
                <input type="submit" value="Buscar">

            </div>

        </div>
    </form>
    <? if($mostrarvenant=="1"){?>
    <br>
    <div class="row">

        <!-- clientes -->

        <div class="col-sm-10 text-center">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Saldo&nbsp;Anterior:</label>
            <input type="text" value=" <?= $subtotalav ?>">

        </div>

    </div>
    <?}?>

    <br>
    <div class="row">
        <!-- Start col -->

        <div class="col-lg-10">

            <div class="table-responsive m-b-30">Compras

                <div class="table-responsive m-b-30">
                    <table class="table table-bordered" style="background-color: #fff; ">

                        <thead>
                            <tr>
                               
                                <th scope="col" style="width: 130px; text-align:center;">Día</th>
                                <th scope="col" style="width: 120px; text-align:center;">Fecha</th>
                                <th scope="col" style="width: 100px; text-align:center;">Kg.</th>
                                <th scope="col" style="text-align:center;">Productos</th>
                                <th scope="col" style="width: 110px; text-align:center;">Precio</th>
                                <th scope="col" style="width: 110px; text-align:center;">Subtotal</th>

                            </tr>
                        </thead>

                    </table>
                    <!-- frame muestro resultados -->




                    <iframe scrolling="yes" height="400" width="100%" src="itemsframe.php?id_cliente=<?= $id_cliente ?>&desde_date=<?= $desde_date ?>&hasta_date=<?= $hasta_date ?>&ventascobros=<?= $ventascobros ?>" style="background-color: #ffffff"></iframe>

                    <!-- fin frame -->

                    <br>
                    <table class="table table-bordered">
                        <tbody>



                            <tr>
                                <td style="text-align:right;font-weight:bold;"><?= $todos2 ?><?= $todos ?></td>
                                <td style="text-align:right;width: 110px;font-weight:bold; background-color: #E7E7E7;"><?= $subtotalv ?></td>

                            </tr>


                        </tbody>
                    </table>
                    <?
       


                        if (!empty($id_clientedec)) { ?>
                            <table class="table table-bordered">
                                <tbody>
                                    <form action="inser_pag2" method="post">
                                        <div class="form-group row col-md-10">
                                            <div class="card-body">
                                                <label>Cargar Pago</label>
                                                <div class="input-group mb-2">
                                                    


                                                    <input type="date" id="fechapag" name="fechapag" class="custom-select" value="<?= $fechahoypo ?>">&nbsp;
                                                    <select class="custom-select" name="tipopag" id="tipopag">
                                                        <option value="1">Efectivo</option>
                                                        <option value="2">Transferencia</option>
                                                        <option value="3">Deposito</option>
                                                        <option value="4">Cheque</option>
                                                        <option value="5">Mercado Pago</option>
                                                    </select>&nbsp;
                                                    <input type="text" class="custom-select" name="pago_valor" id="pago_valor" placeholder="0.00">

                                                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clientedec ?>">

                                                    &nbsp;<button type="submit" class="btn btn-outline-secondary" style="width: 50px;"><i class="dripicons-checkmark"></i></button>
                                                </div>


                                            </div>
                                    </form>
                                </tbody>
                            </table> <? }
                                 ?>
                    <br>
                    <!--     <table style="width: 100%;">
        <tr>
            <td style="text-align:right;">

                <a href="print_orden" target="_blank"><button type="button" class="btn btn-outline-primary"><i class="dripicons-print"></i> Imprimir Remito</button>
                </a>
            </td>

        </tr>
    </table> -->
                </div>

            </div>
            <!-- End col -->




        </div>



    </div>



    <?php include('../template/pie.php'); ?>