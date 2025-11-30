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
unset($_SESSION['ordedecompra']);

// Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-3 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");

?>
<!-- Start Breadcrumbbar -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="breadcrumbbar">
    <div class="row align-items-center">

        <div class="col-md-10 col-lg-10">
            <h class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" style="padding-right: 20;">Desde: </label>
                    <input type="date" id="desde_date" name="desde_date" value="<?= $fechahoy ?>" class="form-control"
                        onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="staticEmail2" style="padding-left: 30; padding-right: 20;">Hasta: </label>
                    <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control"
                        onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');">

                </div>


                <div class="form-group mx-sm-3 mb-2">
                    <input id="modobus" name="modobus" type="hidden">


                    <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
                        placeholder="Buscar por: Nº Devolucíon / Cliente" aria-label="Search" aria-describedby="button-addon2"
                        onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" autocomplete="off">


                    &nbsp;&nbsp;&nbsp;
                    <a onclick="ajax_buscartodo('',$('#desde_date').val(),$('#hasta_date').val(),'1');" style="cursor: pointer;">
                        <h4 class="page-title"><i class="sl-icon-people"></i> Ver todos</h4>
                    </a>



                </div>
            </h>



        </div>
        <div class="col-md-2 col-lg-2">
            <div class="widgetbar">



                <a href="../devoluciones/">
                    <button class="btn btn-primary"><i
                            class="feather icon-user-plus mr-2"></i>Nueva orden de devolucíon</button></a>

            </div>
        </div>

    </div>
</div>
<div id="resultadobuscar">



</div>

<script>
    function ajax_buscartodo(buscar, desde_date, hasta_date, col) {

        // Tomar la subcadena a partir del tercer carácter
        //var buscar_recortado = buscar.substring(2);

        var parametros = {
            "buscar": buscar,
            "desde_date": desde_date,
            "hasta_date": hasta_date,
            "col": col
        };

        $.ajax({
            data: parametros,
            url: '../devoluciones/buscarcnotasdevolu.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });

    }
</script>

<script>
    function ajax_buscar() {
        // Tomar la subcadena a partir del tercer carácter
        //var buscar_recortado = buscar.substring(2);

        var parametros = {
            "buscar": document.getElementById('buscar').value,
            "desde_date": document.getElementById('desde_date').value,
            "hasta_date": document.getElementById('hasta_date').value

        };

        $.ajax({
            data: parametros,
            url: '../devoluciones/buscarcnotasdevolu.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });

    }
</script>

<script>
    $(document).ready(function() {

        ajax_buscar();
    });
</script>

<?php include('template/pie.php'); ?>