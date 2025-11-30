<?php include('f54du60ig65.php');
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
unset($_SESSION['id_orden']); ?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    let xhr; // Variable global para almacenar la solicitud activa

    function ajax_buscar(buscar) {
        if (xhr) {
            xhr.abort(); // Aborta la solicitud anterior si aún está en progreso
        }

        /*   if (buscar.trim() === "") {
        $("#resultadobuscar").html(""); // Si el campo de búsqueda está vacío, limpiar el resultado
        return;resultadobuscarind
    }
 */
        $("#resultadobuscarind").hide();
        var parametros = {
            "buscar": buscar
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
            <h4 class="page-title"><a href="../lclientes/resclientes_excel.php" target="_blank">
                    <bottom class="btn btn-success"><i class="sl-icon-people"></i> Deudores Clientes Excel </bottom>
                </a></h4>

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


                    // Manejar el evento keyup para buscar mientras se escribe
                    $('#id_cliente').on('keyup', function(e) {
                        if (event.key === 'Escape') { // Escape
                            $('#resultadocl').empty(); // Vaciar el listado de resultadcl

                        }
                    });


                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
                            $('#resultadocl').empty();
                        }
                    });



                    // Manejar el evento keydown para buscar mientras se escribe
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
                        } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter


                            e.preventDefault();
                            if (indiceseleccionacld !== -1) {
                                // Aquí puedes hacer lo que necesites con el resultado seleccionacld, por ejemplo:



                                // Construir la URL con el parámetro seleccionacld
                                var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
                                var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                                // Redireccionar a la URL
                                window.location.href = url;


                            }





                        } else {
                            // Si se presiona otra tecla, realizar la búsqueda
                            realizarBusqucl();
                        }
                    });

                    // Manejar el evento click en los resultadcl de la búsqueda
                    $(document).on('click', '#resultadocl p', function() {
                        indiceseleccionacld = $(this).index();
                        actualizarSeleccion($('#resultadocl p'));
                        $('#id_cliente').focus(); // Mantener el foco en el campo de búsqueda


                        var seleccionacld = $(this).text();
                        var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
                        window.location.href = url;

                    });



                    function realizarBusqucl() {
                        // Obtener los datos del formulario
                        var formData = $('#formBusqucl').serialize();

                        $("#resultadobuscar").hide();


                        // Realizar la solicitud AJAX       
                        $.ajax({
                            type: "POST",
                            url: "../deuda_clientes/buscarcli.php",
                            data: formData,
                            success: function(response) {
                                $('#resultadocl').html(response); // Actualizar los resultadcl en la página
                                indiceseleccionacld = -1; // Reiniciar el índice seleccionacld
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


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar varios clientes" aria-label="Search" aria-describedby="button-addon2" onchange="ajax_buscar($('#buscar').val());return false;" autocomplete="off"> <? } ?>

            </div>
        </div>
        <div class="col-md-2 col-lg-2">
            <a onclick="ajax_buscar($('#buscar').val())" style="cursor: pointer;">
                <h4 class="page-title"><i class="sl-icon-people"></i> Ver todos</h4>
            </a>



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