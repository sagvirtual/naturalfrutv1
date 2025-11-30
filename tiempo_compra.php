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
    let xhr; // solicitud activa
    let currentFiltro = 'todos'; // filtro actual: 'todos' | 'no_compra' | 'sin_30' | 'habitual'

    // page y per_page opcionales (default: 1 y 1000, como lo tenías)
    function ajax_buscar(buscar, page = 1, per_page = 1000) {
        if (xhr) xhr.abort();

        $("#resultadobuscarind").hide();
        const parametros = {
            buscar: buscar || '',
            page: page,
            per_page: per_page,
            filtro: currentFiltro
        };

        xhr = $.ajax({
            data: parametros,
            url: '../flujocompra/buscarclientes.php', // endpoint AJAX
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif" style="width:60px; height:60px;"></div>');
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

    // Delego clicks del paginador dibujado por PHP (en la respuesta)
    $(document).on('click', '.paginacion a.page-link', function(e) {
        e.preventDefault();
        const page = parseInt($(this).data('page'), 10);
        if (!page || page < 1) return;
        const buscar = $('#buscar').val() || '';
        const per_page = parseInt($(this).data('per'), 10) || 5000; // mantiene tamaño
        ajax_buscar(buscar, page, per_page);
        // scroll al inicio del listado
        $('html, body').animate({
            scrollTop: $("#resultadobuscar").offset().top - 80
        }, 200);
    });

    // Botones de filtro
    $(document).on('click', '.filtro-btn', function(e) {
        e.preventDefault();
        currentFiltro = $(this).data('filtro');
        // Feedback visual
        $('.filtro-btn').removeClass('btn-secondary').addClass('btn-outline-dark');
        $(this).removeClass('btn-outline-dark btn-outline-warning btn-outline-success').addClass('btn-secondary');
        // Reinicio a página 1
        const buscar = $('#buscar').val() || '';
        ajax_buscar(buscar, 1, 1000);
    });

    // Acción "Buscar"
    $(document).on('click', '#btnBuscarTop', function() {
        ajax_buscar($('#buscar').val(), 1, 1000);
    });

    // Enter en input
    $(document).on('keypress', '#buscar', function(e) {
        if (e.which === 13) {
            ajax_buscar($('#buscar').val(), 1, 1000);
        }
    });

    // Cargar "Todos"
    $(document).on('click', '#btnTodosTop', function() {
        $('#buscar').val('');
        currentFiltro = 'todos';
        $('.filtro-btn').removeClass('btn-secondary').addClass('btn-outline-dark');
        $('.filtro-btn[data-filtro="todos"]').removeClass('btn-outline-dark').addClass('btn-secondary');
        ajax_buscar('', 1, 1000);
    });
</script>

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-3 col-lg-3">
            <h4 class="page-title"><i class="feather icon-package"></i> Flujo de Compra Clientes</h4>
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

            <!-- Tu buscador de clientes (oculto) y autocompletado siguen intactos -->
            <form id="formBusqucl" style="display: none;">
                <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente"
                    placeholder="Buscar un Cliente" value="<?= $id_clientever ?>" autocomplete="off"
                    onclick="select()" onkeypress="return event.keyCode != 13;" <?= $notab ?> <?= $blockclien ?>>
            </form>
            <div id="resultadocl"></div>

            <script>
                $(document).ready(function() {
                    var indiceseleccionacld = -1;

                    $('#id_cliente').on('keyup', function(e) {
                        if (event.key === 'Escape') {
                            $('#resultadocl').empty();
                        }
                    });

                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
                            $('#resultadocl').empty();
                        }
                    });

                    $('#id_cliente').on('keyup', function(e) {
                        var $resultadcl = $('#resultadocl p');
                        if (e.keyCode === 38) {
                            e.preventDefault();
                            if (indiceseleccionacld > 0) {
                                indiceseleccionacld--;
                                actualizarSeleccion($resultadcl);
                            }
                        } else if (e.keyCode === 40) {
                            e.preventDefault();
                            if (indiceseleccionacld < $resultadcl.length - 1) {
                                indiceseleccionacld++;
                                actualizarSeleccion($resultadcl);
                            }
                        } else if (e.keyCode === 9 || event.key === 'Enter') {
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
                            url: "../flujocompra/buscarcli.php",
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

        <!-- Buscador y botones arriba -->
        <div class="col-md-6 col-lg-6">
            <div class="input-group">
                <input type="hidden" id="modobus" name="modobus">
                <?php if ($productos == "") { ?>
                    <input
                        type="search"
                        id="buscar"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar clientes"
                        aria-label="Search"
                        autocomplete="off"
                        onchange="ajax_buscar($('#buscar').val());return false;">
                    <div class="input-group-append">&nbsp;
                        <button id="btnBuscarTop" class="btn btn-sm btn-primary">
                            <i class="sl-icon-people"></i> Buscar
                        </button>


                        <button type="button" class="btn btn-sm btn-secondary filtro-btn" data-filtro="todos">Todos</button>
                        <button type="button" class="btn btn-sm btn-success filtro-btn" data-filtro="habitual">&lt;30 días</button>
                        <button type="button" class="btn btn-sm btn-warning filtro-btn" data-filtro="sin_30">+30 días</button>
                        <button type="button" class="btn btn-sm btn-dark filtro-btn" data-filtro="no_compra">No compran</button>
                    </div>
                <?php } ?>
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