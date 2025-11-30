<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');
include('funciones/funcUsuario.php');
unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']); ?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<script>
    function ajax_buscar(buscar) {
        var parametros = {
            "buscar": buscar,

        };
        $.ajax({
            data: parametros,
            url: 'lusuarios/buscarusuarios.php',
            type: 'POST',
            beforeSend: function () {
                $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
            },
            success: function (response) {
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
        <div class="col-md-4 col-lg-4">
            <h4 class="page-title"><i class="sl-icon-people"></i> Listado de usuarios</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control"
                        placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2"
                        onkeyup="ajax_buscar($('#buscar').val());return false;"> <? } ?>

            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lusuarios"><button class="btn btn-primary"><i class="feather icon-user-plus mr-2"></i>Agregar
                        Usuario</button></a>
            </div>
        </div>
    </div>
</div>


<div id="resultadobuscar">

   
            </div>


<div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="card m-b-30 text-center">
                       
                            <div class="card-body"> <img  src="../apk/qr.png" style="width: 160px; height: auto;">
                                <p class="card-text mb-3">Escanear el Qr e Instalar el app <br>para el Colector de datos</p>
         
                            </div>
                        </div> 
                    </div>

        </div>

        <script src="assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="assets/js/custom/custom-table-datatable.js"></script>

        <?php include ('template/pie.php'); ?>