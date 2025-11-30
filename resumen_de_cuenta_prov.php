<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']); ?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    function ajax_buscar(buscar) {
        var parametros = {
            "buscar": buscar,

        };
        $.ajax({
            data: parametros,
            url: '../deuda_proveedores/buscarproveedores.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><div>');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });
    }
    $(document).ready(function() {
            // Llamada a la función ajax_buscar con parámetros iniciales
            ajax_buscar('');
        });
</script>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-3 col-lg-3">
            <h4 class="page-title"><i class="sl-icon-people"></i> Resumen de Cuenta Proveedores</h4>

        </div>
        <div class="col-md-6 col-lg-6">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" onkeyup="ajax_buscar($('#buscar').val());return false;" autocomplete="off"> <? } ?>

            </div>
        </div>
        <div class="col-md-2 col-lg-2">
        <a onclick="ajax_buscar('')" style="cursor: pointer;">
                <h4 class="page-title"><i class="sl-icon-people"></i> Ver todos</h4>
            </a>



        </div>
        
    </div>
</div>
<div id="resultadobuscar"></div>

<?php include('template/pie.php'); ?>