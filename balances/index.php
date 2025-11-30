<?php include('../f54du60ig65.php');
include('../template/cabezal.php');

$id_cliente = $_POST['id_cliente'];
$hasta_date = $_POST['hasta_date'];
$desde_date = $_POST['desde_date'];


if (empty($desde_date)) {
    $desde_date = $fechahoy;
    $hasta_date = $fechahoy;
}

/* total ventas */
$sqlitem_orden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente!='0' and modo='0' and conf_entrega='1' and conf_entrega2='1' and stock='0' ORDER BY `item_orden`.`fecha` ASC");
while ($rowitem_orden = mysqli_fetch_array($sqlitem_orden)) {
    $valorventa += $rowitem_orden["total"] - $rowitem_orden["totalprov"];
}

$valorventav = number_format($valorventa, 0, ',', '.');
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
        <h4 class="page-title"><i class="mdi mdi-chart-line"></i> Ganancias Ventas</h4>


        </div>

    </div>
</div>

<div class="contentbar">
    <form action="/balances/index" method="POST" enctype="multipart/form-data">



        <div class="row">

            <!-- clientes -->
            <div class="col-sm-10 text-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Desde:</label>
                <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>">

                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Hasta:</label>

                <input type="date" id="hasta_date" name="hasta_date" value="<?= $hasta_date ?>">
                &nbsp;&nbsp;

                <input type="submit" value="Ver Informe">

            </div>

        </div>
    </form>
    <div class="row">
        <!-- Start col -->

        <div class="col-lg-10">

            <div class="table-responsive m-b-30">Ventas

                <div class="table-responsive m-b-30">
                    <table class="table table-bordered" style="background-color: #fff; ">

                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center;">Producto</th>
                                <th scope="col" style="width: 20mm; text-align:center;">Kilos</th>
                                <th scope="col" style="width: 25mm; text-align:center;">Ganancia</th>

                            </tr>
                        </thead>

                    </table>
                    <!-- frame muestro resultados -->




                    <iframe scrolling="yes" height="400" width="100%" src="balanceframe.php?desde_date=<?= $desde_date ?>&hasta_date=<?= $hasta_date ?>" style="background-color: #ffffff"></iframe>

                    <!-- fin frame -->

                    <br>
                    <table class="table table-bordered">
                        <tbody>



                            <tr>
                                <td style="text-align:right;font-weight:bold;">Total Ganacia</td>
                                <td style="text-align:right;width: 110px;font-weight:bold; background-color: #E7E7E7;"><?= $valorventav ?></td>

                            </tr>


                        </tbody>
                    </table>
                  

                     
                    <br>
                </div>

            </div>
            <!-- End col -->




        </div>



    </div>


    <?php include('../template/pie.php'); ?>