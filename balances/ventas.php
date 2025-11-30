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


    <!-- ventas -->
    <form action="ventas" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clientedec ?>">
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card text-center m-b-30">
                    <div class="card-body">
                        <h5 class="card-title">Nuestras Ventas</h5>
                        <div class="row">
                            <div class="col-sm-6 text-center">

                                <label for="inputEmail3" class="col-form-label text-right">Desde:</label>
                                <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>">
                            </div>
                            <div class="col-sm-6 text-center">
                                <label for="inputEmail3" class="col-form-label text-right">Hasta:</label>

                                <input type="date" id="hasta_date" name="hasta_date" value="<?= $hasta_date ?>">



                            </div>
                        </div>
                        <img src="/assets/images/general/report.svg" class="img-fluid img-winner" alt="report">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ver Informe</button>
                        </div>
                    </div>

                    <div class="card-body">
                <div class="border-primary border rounded text-center py-3 mb-3">
                                    <h2 class="card-title text-primary mb-1">$<?= $valorventav ?></h2>
                                    <p class="text-primary mb-0">Total Ganancia</p>
                                </div> </div>
                    
                </div>
               
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ganancia por Producto</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-12">


                                <?php

                                /* total ventas por productos */
                                $sqlitem_ordenpv = mysqli_query($rjdhfbpqj, "SELECT  DISTINCT id_producto FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente!='0' and modo='0' and conf_entrega='1' and conf_entrega2='1' and stock='0' ORDER BY `item_orden`.`kilos` DESC");
                                while ($rowitem_ordenpv = mysqli_fetch_array($sqlitem_ordenpv)) {
                                    $idproducventa = $rowitem_ordenpv["id_producto"];

                                    $sqlitem_ordenp = ${"sqlitem_ordenp" . $idproducventa};
                                    $rowitem_ordenp = ${"rowitem_ordenp" . $idproducventa};
                                    $valorventap = ${"valorventap" . $idproducventa};
                                    $nombreprod = ${"nombreprod" . $idproducventa};
                                    $valorkilosp = ${"valorkilosp" . $idproducventa};



                                    $sqlitem_ordenp = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where fecha BETWEEN '$desde_date' and '$hasta_date' and id_cliente!='0' and modo='0' and conf_entrega='1' and conf_entrega2='1' and stock='0' and id_producto='$idproducventa'");
                                    while ($rowitem_ordenp = mysqli_fetch_array($sqlitem_ordenp)) {
                                        $valorventap += $rowitem_ordenp["total"] - $rowitem_ordenp["totalprov"];
                                        $valorventap = number_format( $valorventap, 0, ',', '.');
                                        $valorkilosp += $rowitem_ordenp["kilos"] ;
                                        $nombreprod = $rowitem_ordenp["nombre"];
                                    }
                                    echo '
                              

                                 <div class="card m-b-30">
                                     <div class="card-body">
                                         <div class="row align-items-center no-gutters">
                                             <div class="col-6">
                                                 <p class="font-15">'.$valorkilosp.'Kg. ' . $nombreprod . '</p>
                                                 <h4 class="card-title mb-0">$' . $valorventap . '</h4>
                                             </div>
                                             <div class="col-6 text-right">
                                                 <span class="piety-bar-1"><img src="/lproductos/foto' . $idproducventa . '" alt="Thumbnail Image" class="img-thumbnail" style="width:80px;"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                
                                ';
                                }
                                ?>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
</div>

</form>
<?php include('../template/pie.php'); ?>