<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');


// Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-1 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");
if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "37") {
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






    <div class="breadcrumbbar">
        <div class="row align-items-center">

            <div class="col-md-12 col-lg-12">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <h4 class="page-title"><i class="ti-layout-cta-btn-right"></i> Cheques</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="staticEmail2" style="padding-right: 20;">Desde: </label>
                        <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: </label>
                        <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control">

                    </div>


                    <div class="form-group mx-sm-3 mb-2">
                        <input id="modobus" name="modobus" type="hidden">


                        <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
                            placeholder="Buscar..." aria-label="Search" aria-describedby="button-addon2"
                            autocomplete="off">


                        &nbsp;&nbsp;&nbsp;<button type="button" onclick="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val());" style="cursor: pointer;" class="btn btn-primary">Buscar</button>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="ajax_buscarDispon($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val());" style="cursor: pointer;" class="btn btn-dark">Disponibles</button>






                    </div>
                </form>



            </div>


        </div>
    </div>

    <div id="resultadobuscar">
        <!-- End Breadcrumbbar -->
        <!-- Start Contentbar -->
    </div>


    <script>
        function ajax_buscar(buscar, desde_date, hasta_date) {
            var parametros = {
                "buscar": buscar,
                "desde_date": desde_date,
                "hasta_date": hasta_date

            };
            $.ajax({
                data: parametros,
                url: 'buscarcheque.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                }
            });
        }
    </script>
    <script>
        function ajax_buscarDispon(buscar, desde_date, hasta_date) {
            var parametros = {
                "buscar": buscar,
                "desde_date": desde_date,
                "hasta_date": hasta_date

            };
            $.ajax({
                data: parametros,
                url: 'chequedispon.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                }
            });
        }
    </script>
<?php }
include('../template/pie.php'); ?>