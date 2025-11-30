<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

$idproveedorde = $_GET['jfndhom'];
$productos = $_GET['productos'];
$nombrepro = $_GET['nombrepro'];

/* lista de precios */
$jfnddhom = $_GET['jfnddhom'];
$pagina = $_GET['pagina'];
$busquedads = $_GET['busquedads'];

$_SESSION['jfnddhom'] = $_GET['jfnddhom'];
$_SESSION['pagina'] = $_GET['pagina'];
$_SESSION['busquedads'] = $_GET['busquedads'];




$idproveedor = base64_decode($idproveedorde);

if (!empty($idproveedorde)) {
    $whereprov = "WHERE id='" . $idproveedor . "'";
} else {
    $whereprov = "";
}
unset($_SESSION['kkfnuhtf']);
unset($_SESSION["kilo"]);
unset($_SESSION["costo"]);
unset($_SESSION["codigo"]);
unset($_SESSION["categoria"]);
unset($_SESSION["id_proveedor"]);
unset($_SESSION["nombre"]);
unset($_SESSION["nombreb"]);
unset($_SESSION["estado"]);
unset($_SESSION["detalle"]);
unset($_SESSION["id_rubro1"]);
unset($_SESSION["id_rubro2"]);
unset($_SESSION["id_rubro3"]);
unset($_SESSION["id_rubro4"]);
unset($_SESSION["id_rubro5"]);
unset($_SESSION["id_rubro6"]);
unset($_SESSION["id_rubro7"]);
unset($_SESSION["id_rubro8"]);
unset($_SESSION["id_rubro9"]);
unset($_SESSION["id_marcas"]);
unset($_SESSION["modo_producto"]);
unset($_SESSION["ventaminma	"]);
unset($_SESSION["fracionado"]);
unset($_SESSION["unidadventa"]);

if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == '1') {
?>
    <!-- Start Breadcrumbbar -->

    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <a onclick="ajax_buscar($('#modobus').val(), $('#buscar').val())" style="cursor: pointer;">
                    <h4 class="page-title"><i class="feather icon-package"></i> Precios Productos </h4>
                </a>







                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



                <script>
                    function ajax_buscars() {
                        var parametros = {
                            "buscar": '<?= $_GET['buscar'] ?>'

                        };

                        $.ajax({
                            data: parametros,
                            url: 'buscar.php',
                            type: 'POST',
                            beforeSend: function() {
                                $("#resultadobuscar").html('<div style="text-align:center;position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><h4 style="text-align:center;">Un momento estamos buscando en una <br>base de más de 2000 Productos...</h4></div>');
                            },
                            success: function(response) {
                                $("#resultadobuscar").html(response);
                            }
                        });
                    }
                </script>




                <? if ($productos == "") { ?>




                    <script>
                        let debounceTimer;

                        function ajax_buscar(modobus, buscar, pag) {
                            clearTimeout(debounceTimer); // Limpiar el temporizador previo

                            debounceTimer = setTimeout(function() {
                                // Solo ejecuta la búsqueda si 'buscar' tiene al menos 3 caracteres
                                if (buscar.length >= 3) {
                                    var parametros = {
                                        "modobus": modobus,
                                        "buscar": buscar,
                                        "pag": pag
                                    };

                                    $.ajax({
                                        data: parametros,
                                        url: 'buscar.php',
                                        type: 'POST',
                                        beforeSend: function() {
                                            $("#resultadobuscar").html('<div style="text-align:center;position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><h4 style="text-align:center;">Un momento estamos buscando en una <br>base de más de 2000 Productos...</h4></div>');
                                        },
                                        success: function(response) {
                                            $("#resultadobuscar").html(response);
                                        }
                                    });
                                } else {
                                    // Borra el resultado de búsqueda si el texto es menor a 3 caracteres
                                    $("#resultadobuscar").html('');
                                }
                            }, 500); // Espera 300ms después de la última pulsación
                        }
                    </script>
                <? } else { ?>
                    <script>
                        $(document).ready(function ajax_buscar(modobus) {
                            var parametros = {
                                "modobus": modobus,
                                "buscar": '<?= $nombrepro ?>',

                            };
                            $.ajax({
                                data: parametros,
                                url: 'buscar.php',
                                type: 'POST',
                                beforeSend: function() {
                                    $("#resultadobuscar").html('<div style="text-align:center;position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><h4 style="text-align:center;">Un momento estamos buscando en una <br>base de más de 2000 Productos...</h4></div>');
                                },
                                success: function(response) {
                                    $("#resultadobuscar").html(response);
                                }
                            });
                        })
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

            <div class="col-md-4 col-lg-4" id="cargas" <?php

                                                        if (!empty($_SESSION['jfnddhom'])) {
                                                            echo 'style="display:none;"';
                                                        }

                                                        ?>>
                <div class="input-group" style="background-color: white;">

                    <input id="modobus" name="modobus" type="hidden">


                    <? if ($productos == "") { ?>
                        <input type="search" id="buscar" name="buscar" value="<?= $_GET['buscar'] ?>" class="form-control" placeholder="Buscar Productos, Marca o Proveedor" aria-label="Search" aria-describedby="button-addon2" onkeypress="ajax_buscar_si_enter(event, $('#modobus').val(), this.value)" autocomplete="off" onchange="ajax_buscar($('#modobus').val(), $('#buscar').val())"> <? } ?>

                </div>


                <!-- oninput="ajax_buscar($('#modobus').val(), $('#buscar').val());return false;" -->


            </div>

            <div class="col-md-2 col-lg-2" <?php

                                            if (!empty($_SESSION['jfnddhom'])) {
                                                echo 'style="display:none;"';
                                            }

                                            ?>>
                <a onclick="ajax_buscar($('#modobus').val(), $('#buscar').val())" style="cursor: pointer;">
                    <h4 class="page-title"><i class="feather icon-package"></i> Buscar</h4>
                </a>



            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <?php

                    if (!empty($_SESSION['jfnddhom'])) {

                    ?>
                        <a href=" 
            <?php
                        if ($_SESSION['jfnddhom'] != 'sinprecio') {
                            echo '../listadeprecio/listaedit?jfndhom=' . $_SESSION['jfnddhom'] . '&pagina=' . $_SESSION['pagina'] . '&busquedads=' . $_SESSION['busquedads'] . '';
                        } else {
                            echo '../sinprecio/';
                        }
            ?>
            "><button type="button" class="btn btn-round btn-dark"><i class="fa fa-close"></i></button></a>&nbsp;&nbsp;&nbsp; <?php

                                                                                                                            } else {

                                                                                                                                ?>
                        <a href="/salidas/cod_listadeprecios.php" target="_blanck" title="Descargar Costos"><button type="button" class="btn btn-round btn-primary"><i class="feather icon-upload"></i></button></a>

                        <? if ($productos == "") { ?>&nbsp; <a href="/lproductos"> <button class="btn btn-primary"><i class="feather icon-package"></i> Agregar Producto</button></a><? }
                                                                                                                                                                                } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->


    <div id="resultadobuscar"></div>
    <div id="resultadocuentaf"></div>


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
    mysqli_close($rjdhfbpqj);


    include('template/pie.php');
} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
} ?>