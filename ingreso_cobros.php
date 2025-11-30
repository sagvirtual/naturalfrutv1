<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']);

// Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-1 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");

?>
<!-- Start Breadcrumbbar -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="breadcrumbbar">
    <div class="row align-items-center">

        <div class="col-md-12 col-lg-12">
            <div class="form-inline">
                <!--   <div class="form-group mb-2">
                    <label for="staticEmail2" style="padding-right: 20;">Desde: </label>
                    <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>" class="form-control" 
                    onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: </label>
                    <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control"  
                    onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" >

                </div> -->


                <div class="form-group mx-sm-3 mb-2">
                    <input id="modobus" name="modobus" type="hidden">
                    <h4 class="page-title"> Ingreso de Cobros </h4>&nbsp;&nbsp;&nbsp;
                    <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
                        placeholder="Nº Orden / Cliente / Localidad / Direccíon" aria-label="Search" aria-describedby="button-addon2"
                        oninput="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');"
                        onChange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');"
                        onkeyup="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" autocomplete="off">
                </div>
            </div>

        </div>

    </div>
</div>
<div id="resultadobuscar">



</div>



<script>
    function ajax_buscar(buscar, desde_date, hasta_date, col) {
        if (buscar.length > 2) {
            var parametros = {
                "buscar": buscar,
                "desde_date": desde_date,
                "hasta_date": hasta_date,
                "col": col
            };

            $.ajax({
                data: parametros,
                url: '../ingreso_de_cobros/buscarclientes.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                },
                error: function(xhr, status, error) {
                    if (status === "error") {
                        // Verificar si hay conexión a internet
                        if (!navigator.onLine) {
                            $("#resultadobuscar").html('<div class="alert alert-danger">Error: No hay conexión a internet</div>');
                        } else {
                            $("#resultadobuscar").html('<div class="alert alert-danger">Error al realizar la consulta</div>');
                        }
                    }
                },
                timeout: 5000 // tiempo de espera en milisegundos (5 segundos)
            });
        }
    }
</script>

<?php include('template/pie.php'); ?>