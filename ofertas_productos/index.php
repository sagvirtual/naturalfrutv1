<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');


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
                <a onclick="ajax_buscar($('#modobus').val(), $('#buscar').val())" style="cursor: pointer;">
                    <h4 class="page-title"><i class="mdi mdi-chart-areaspline"></i> Oferta Productos </h4>
                </a>







                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>








                <? if ($productos != " ") { ?>




                    <script>
                        let xhr; // Variable global para almacenar la solicitud activa
                        let debounceTimer;

                        function ajax_buscar(modobus, buscar, pag) {
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
                                    "pag": pag
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

            <div class="col-md-4 col-lg-4" id="cargas">
                <div class="input-group" style="background-color: white;">



                    <input type="search" id="buscar" name="buscar" value="<?= $_GET['buscar'] ?>" class="form-control" placeholder="Buscar Productos, Marca o Proveedor" aria-label="Search" aria-describedby="button-addon2" onchange="ajax_buscar($('#modobus').val(), $('#buscar').val())" onkeypress="ajax_buscar_si_enter(event, $('#modobus').val(), this.value)">

                </div>


                <!-- oninput="ajax_buscar($('#modobus').val(), $('#buscar').val());return false;" -->


            </div>

            <div class="col-md-6 col-lg-6">
                <div style="display: flex; gap: 10px; ">

                    <button type="button" class="btn btn-dark" onclick="ajax_buscar('0', $('#buscar').val())">Buscar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="button" class="btn btn-success" onclick="ajax_buscar('1', $('#buscar').val())">Ofertas Activas</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" onclick="ajax_buscar('2', $('#buscar').val())">Ofertas Inactivas</button>



                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->


    <div id="resultadobuscar"></div>


    </div>

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