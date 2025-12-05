<?php
include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

$id_clientein = $_GET['id_cliente'];
$id_clientev = explode("@", $id_clientein);
$id_clienteint = $id_clientev[1];

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']);
?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    let xhr; // Variable global para almacenar la solicitud activa

    function ajax_buscar(buscar) {
        if (xhr) {
            xhr.abort(); // Aborta la solicitud anterior si aún está en progreso
        }

        $("#resultadobuscarind").hide();

        // Leemos el filtro de monto (hidden)
        var filtro_monto = $("#filtro_monto").val();

        var parametros = {
            "buscar": buscar,
            "filtro_monto": filtro_monto
        };

        xhr = $.ajax({
            data: parametros,
            url: '../deuda_clientes/buscarclientes.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif" style="width: 60px; height:60px;"></div>');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            },
            error: function(jqXHR, textStatus) {
                if (textStatus !== "abort") {
                    console.error("Error en la solicitud ", textStatus);
                }
            }
        });
    }
</script>

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-3 col-lg-3">
            <h4 class="page-title">
                <a href="../lclientes/resclientes_excel.php" target="_blank">
                    <bottom class="btn btn-success">
                        <i class="sl-icon-people"></i> Deudores Clientes Excel
                    </bottom>
                </a>
            </h4>
        </div>

        <div class="col-md-3 col-lg-3">
            <input id="modobus" name="modobus" type="hidden">

            <style>
                .seleccionacld {
                    background-color: #ccc;
                }

                .no-seleccionacld {
                    background-color: #fff;
                }
            </style>

            <form id="formBusqucl">
                <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente" placeholder="Buscar un Cliente" value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;" <?= $notab ?> <?= $blockclien ?>>
            </form>

            <div id="resultadocl"></div>

            <script>
                $(document).ready(function() {
                    var indiceseleccionacld = -1;

                    // ESC limpia el resultado
                    $('#id_cliente').on('keyup', function(e) {
                        if (event.key === 'Escape') {
                            $('#resultadocl').empty();
                        }
                    });

                    // Click afuera cierra listado
                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
                            $('#resultadocl').empty();
                        }
                    });

                    // Navegación con flechas / enter
                    $('#id_cliente').on('keyup', function(e) {
                        var $resultadcl = $('#resultadocl p');

                        if (e.keyCode === 38) { // Flecha arriba
                            e.preventDefault();
                            if (indiceseleccionacld > 0) {
                                indiceseleccionacld--;
                                actualizarSeleccion($resultadcl);
                            }
                        } else if (e.keyCode === 40) { // Flecha abajo
                            e.preventDefault();
                            if (indiceseleccionacld < $resultadcl.length - 1) {
                                indiceseleccionacld++;
                                actualizarSeleccion($resultadcl);
                            }
                        } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter o Tab
                            e.preventDefault();
                            if (indiceseleccionacld !== -1) {
                                var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
                                var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                                window.location.href = url;
                            }
                        } else {
                            realizarBusqucl();
                        }
                    });

                    // Click en resultado
                    $(document).on('click', '#resultadocl p', function() {
                        indiceseleccionacld = $(this).index();
                        actualizarSeleccion($('#resultadocl p'));
                        $('#id_cliente').focus();
                        var seleccionacld = $(this).text();
                        var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                        window.location.href = url;
                    });

                    function realizarBusqucl() {
                        var formData = $('#formBusqucl').serialize();
                        $("#resultadobuscar").hide();

                        $.ajax({
                            type: "POST",
                            url: "../deuda_clientes/buscarcli.php",
                            data: formData,
                            success: function(response) {
                                $('#resultadocl').html(response);
                                indiceseleccionacld = -1;
                            }
                        });
                    }

                    function actualizarSeleccion($resultadcl) {
                        $resultadcl.removeClass('seleccionacld');
                        $($resultadcl[indiceseleccionacld]).addClass('seleccionacld');
                    }
                });
            </script>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">
                <!-- Filtro de monto (hidden) -->
                <input id="filtro_monto" name="filtro_monto" type="hidden" value="0">

                <?php if ($productos == "") { ?>
                    <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar varios clientes" aria-label="Search" aria-describedby="button-addon2" onchange="ajax_buscar($('#buscar').val());return false;" autocomplete="off">
                <?php } ?>

            </div>
        </div>
        <div class="col-md-3 col-lg-3">
            <!-- Ver todos + botones de montos -->
            <a onclick="$('#filtro_monto').val(0); ajax_buscar($('#buscar').val())" style="cursor: pointer;">
                <h4 class="page-title"><i class="sl-icon-people"></i> Ver todos</h4>
            </a>


        </div>

    </div><br>
    <div class="row">
        <div class="col-12">
            <div style="margin-top:10px;">
                <label>Deudores</label>
                <button type="button" class="btn btn-sm btn-danger"
                    onclick="$('#filtro_monto').val(10000000); ajax_buscar($('#buscar').val());">
                    + $10.000.000
                </button>
                <button type="button" class="btn btn-sm btn-dark"
                    onclick="$('#filtro_monto').val(1000000); ajax_buscar($('#buscar').val());">
                    + $1.000.000
                </button>
                <button type="button" class="btn btn-sm btn-primary"
                    onclick="$('#filtro_monto').val(100000); ajax_buscar($('#buscar').val());">
                    + $100.000
                </button>
                <button type="button" class="btn btn-sm btn-info"
                    onclick="$('#filtro_monto').val(-100000); ajax_buscar($('#buscar').val());">
                    Menos de $100.000
                </button>
            </div>
        </div>
    </div>
</div>

<div id="resultadobuscar"></div>

<div id="resultadobuscarind">
    <?php
    if (!empty($id_clientein)) {
        include('deuda_clientes/buscarclientesind.php');
    }
    ?>
</div>

<?php include('template/pie.php'); ?>