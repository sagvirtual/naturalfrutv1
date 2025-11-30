<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
include('../funciones/funcionAlaVenc.php');


//alarmavenci($rjdhfbpqj,$idproduc);
?>
<script>
    $('#datatable-buttons').DataTable({
        "order": [
            [1, "desc"]
        ],
        responsive: true
    });
</script>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"> Productos por Vencer</h4>

        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">





        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="table-responsive">



                        <table id="datatable-buttons" class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width: 100px;">Vencimiento</th>
                                    <th>Producto</th>
                                    <th style="text-align:center; width: 80px;">Falta días</th>
                                    <th>Cantidad</th>
                                    <th>Alarma</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                alarmavenci($rjdhfbpqj, $fechahoy);
                                ?>

                            </tbody>
                        </table>
                        CONTIDAD DE PRODUCTOS: <b id="resultadocan"> </b>


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
    // Obtén la tabla por su ID
    var tabla = document.getElementById("datatable-buttons");

    // Cuenta la cantidad de filas <tr>
    var cantidadFilas = tabla.getElementsByTagName("tr").length - 1;

    // Muestra la cantidad de filas en un párrafo
    document.getElementById("resultadocan").innerText = cantidadFilas;
</script>





<?php include('../template/pie.php'); ?><!-- 
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> -->