<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');




/* // Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-1 day');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d"); */

$desde_date = $fechahoy;
?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="breadcrumbbar">

    <div class="col-md-12 col-lg-12">


        <div class="form-inline">
            <div class="form-group mb-2">
                <h4 class="page-title" style="padding-right: 70px;"><i class="sl-icon-people"></i> ⁠Totalizador de Notas de Creditos</h4>
            </div>
            <div class="form-group mb-2">
                <label for="staticEmail2" style="padding-right: 20;">Desde: </label>
                <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>" class="form-control">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: </label>
                <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control">

            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input id="modobus" name="modobus" type="hidden">

                <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2"
                    onkeyup="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val());return false;" style="width: 400px;">

            </div>

            <div class="form-group mx-sm-3 mb-2">
                <a onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val())" style="cursor: pointer;">
                    <h4 class="page-title"><i class="sl-icon-people"></i> Ver</h4>
                </a>

            </div>

        </div>

    </div>





</div>

<div id="resultadobuscar"></div>
</div>
<script>
    function ajax_buscar(desde_date, hasta_date, buscar) {
        var parametros = {
            "desde_date": desde_date,
            "hasta_date": hasta_date,
            "buscar": buscar

        };
        $.ajax({
            data: parametros,
            url: 'totalizadordecreditos.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><div>');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });
    }
</script>
<?php include('../template/pie.php'); ?>