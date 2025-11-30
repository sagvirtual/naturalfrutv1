<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');
include('../funciones/funcNombrcliente.php');



$id_clientein = $_GET['id_cliente'];
$id_clientev = explode("@", $id_clientein);

$id_clienteint = $id_clientev[1];


$idproveedorde = $_GET['jfndhom'];
$productos = $_GET['productos'];
$nombrepro = $_GET['nombrepro'];

/* lista de precios */
$jfnddhom = $_GET['jfnddhom'];
$pagina = $_GET['pagina'];
$busquedads = $_GET['busquedads'];

if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "29" || $tipo_usuario == "30") {
?>
    <!-- Start Breadcrumbbar -->

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-2 col-lg-2">
                <a href="../cliente_ofertas/">
                    <h4 class="page-title"><i class="mdi mdi-chart-areaspline"></i> Ofertas Clientes</h4>
                </a>







                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>








                <? if ($productos != " ") { ?>




                    <script>
                        let xhr; // Variable global para almacenar la solicitud activa
                        let debounceTimer;

                        function ajax_buscar(modobus, buscar, pag) {

                            if (buscar != "") {
                                clearTimeout(debounceTimer); // Limpiar el temporizador previo

                                // Abortar la solicitud AJAX previa si existe
                                if (xhr) {
                                    xhr.abort();
                                }

                                debounceTimer = setTimeout(function() {
                                    // Ejecutar la búsqueda solo si 'buscar' tiene al menos 3 caracteres

                                    var parametros = {
                                        "modobus": modobus,
                                        "buscar": buscar,
                                        "pag": pag,
                                        "id_cliente": '<?= $id_clienteint ?>'
                                    };

                                    xhr = $.ajax({
                                        data: parametros,
                                        url: 'buscarpro.php',
                                        type: 'POST',
                                        beforeSend: function() {
                                            $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif" style="width: 60px; height:60px;"></div>');
                                        },
                                        success: function(response) {
                                            $("#resultadobuscar").html(response);
                                        },
                                        error: function(jqXHR, textStatus) {
                                            if (textStatus !== "abort") {
                                                console.error("Error en la solicitud AJAX:", textStatus);
                                            }
                                        }
                                    });

                                }, 300); // Espera 300ms después de la última pulsación
                            }
                        }
                    </script>

                <? } ?>

            </div>
            <script>
                function ajax_buscar_si_enter(event, modo, valor) {
                    if (event.key === 'Enter') {
                        ajax_buscar(modo, valor);
                    }
                }
            </script>
            <? if ($id_clienteint == 0) { ?>
                <div class="col-md-4 col-lg-4" id="cargas">
                    <div class="input-group">

                        <style>
                            .seleccionacld {
                                background-color: #ccc;
                            }

                            .no-seleccionacld {
                                background-color: #fff;
                            }
                        </style>
                        <form id="formBusqucl">
                            <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente" placeholder="Buscar Cliente" value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;" <?= $notab ?> <?= $blockclien ?>>
                            <div id="resultadocl"></div>
                        </form>


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




                </div>
            <? }
            if ($id_clienteint > 0) { ?>
                <div class="col-md-4 col-lg-4" id="cargas">
                    <div class="input-group" style="background-color: white;">


                        <input type="search" id="buscar" name="buscar"
                            value="<?= $_GET['buscar'] ?>"
                            class="form-control"
                            placeholder="Buscar Productos para <?= NomCliente($rjdhfbpqj, $id_clienteint) ?>"
                            aria-label="Search"
                            aria-describedby="button-addon2"
                            onchange="if(this.value.trim().length > 0){ ajax_buscar($('#modobus').val(), this.value); }"
                            onkeypress="ajax_buscar_si_enter(event, $('#modobus').val(), this.value)">


                    </div>


                    <!-- oninput="ajax_buscar($('#modobus').val(), $('#buscar').val());return false;" -->


                </div>


                <div class="col-md-6 col-lg-6">
                    <div style="display: flex; gap: 10px; ">

                        <button type="button" class="btn btn-dark" onclick="ajax_buscar('0', $('#buscar').val())">Buscar&nbsp;Producto</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button type="button" class="btn btn-success" onclick="ajax_buscar('1', 'noooo')">Ofertas Activas</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" onclick="ajax_buscar('2', 'noooo')">Ofertas Inactivas</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="../cliente_ofertas/"><button type="button" class="btn btn-primary">Otro&nbsp;Cliente</button></a>


                    </div>
                </div> <? } ?>
        </div>
    </div>
    <!-- End Breadcrumbbar -->


    <div id="resultadobuscar"></div>


    </div>

    </div>
    </div>

    <!-- End col -->

    <!-- acaaaaa -->



    <style>
        /* Estilos del botón flotante */
        #btnGoToTop {
            position: fixed;
            bottom: 20px;
            /* Distancia desde la parte inferior */
            right: 20px;
            /* Distancia desde la derecha */
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            display: none;
            /* El botón estará oculto inicialmente */
        }

        #btnGoToTop:hover {
            background-color: #0056b3;
        }
    </style>

    <button onclick="goToTop()" id="btnGoToTop" title="Ir Arriba"> <i class="dripicons-arrow-thin-up"></i></button>

    <script>
        // Función para mostrar u ocultar el botón basado en la posición de desplazamiento
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            var btnGoToTop = document.getElementById("btnGoToTop");

            // Mostrar el botón cuando el usuario baja 20px desde la parte superior del documento
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                btnGoToTop.style.display = "block";
            } else {
                btnGoToTop.style.display = "none";
            }
        }

        // Función para desplazarse hacia arriba al hacer clic en el botón
        function goToTop() {
            document.body.scrollTop = 0; // Para Safari
            document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
        }
    </script>

<?php
} else {

    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
}

mysqli_close($rjdhfbpqj);


include('template/pie.php'); ?>