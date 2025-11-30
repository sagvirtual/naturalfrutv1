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
$fechaObj->modify('-3 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");

?>
<!-- Start Breadcrumbbar -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="breadcrumbbar">
    <div class="row align-items-center">

        <div class="col-md-12 col-lg-12">
            <fgf class="form-inline">



                <div class="form-group mx-sm-3 mb-2">
                    <input id="modobus" name="modobus" type="hidden">
                    <h4 class="page-title"><i class="sl-icon-people"></i> Registro de Actividades</h4>&nbsp;&nbsp;

                    <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
                        placeholder="Buscar Nº Orden" aria-label="Search" aria-describedby="button-addon2"
                        onchange="ajax_buscar($('#buscar').val());"
                        autocomplete="off">


                    &nbsp;&nbsp;&nbsp;
                    <a onclick="ajax_buscar($('#buscar').val());" style="cursor: pointer;">
                        <h4 class="page-title"><i class="sl-icon-people"></i> Buscar</h4>
                    </a>



                </div>


                </ffgf>


        </div>

    </div>
</div>
<div id="resultadobuscar">



</div>



<script>
    function ajax_buscar(buscar) {
        if (buscar.length > 2) {
            // Tomar la subcadena a partir del tercer carácter
            //var buscar_recortado = buscar.substring(2);

            var parametros = {
                "buscar": buscar
            };

            $.ajax({
                data: parametros,
                url: '../lnotasdepedido/buscarregistro.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                }
            });
        }
    }
</script>

<?php include('template/pie.php'); ?>