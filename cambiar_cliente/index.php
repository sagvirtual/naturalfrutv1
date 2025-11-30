<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../template/cabezal.php');
$id_clientever = null;
$focf = $_GET['focf'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($focf == 1) {
    $idorden = $_GET['idorden'];
    $idclinet = $_GET['clienteant'];


    $id_clientein = $_GET['id_cliente'];
    $id_clientev = explode("@", $id_clientein);

    $id_clienteint = $id_clientev[1];
} else {

    $idcordencod = $_GET['orjndty'];
    $idorden = base64_decode($idcordencod);
    $idclinete = $_GET['jhduskdsa'];
    $idclinet = base64_decode($idclinete);
}


if ($tipo_usuario == "0") {



    $sqlclientess = mysqli_query($rjdhfbpqj, "SELECT id,nom_empr,nom_contac FROM clientes Where id='$idclinet'");
    if ($rowcclientes = mysqli_fetch_array($sqlclientess)) {

        $nomclientes = $rowcclientes['nom_empr'];
        $nomnegocio = $rowcclientes['nom_contac'];
    } else {

        $nomclientes = null;
        $nomnegocio = null;
    }


    $sqlclientessnew = mysqli_query($rjdhfbpqj, "SELECT id,nom_empr,nom_contac FROM clientes Where id='$id_clienteint'");
    if ($rowcclientesnew = mysqli_fetch_array($sqlclientessnew)) {

        $nomclientesnew = $rowcclientesnew['nom_empr'];
        $nomnegocionew = $rowcclientesnew['nom_contac'];
    }






?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><i class="ri-stack-line"></i> Cambiar el Cliente de la Orden de Pedido (<?= $nomnegocio ?> <?= $nomclientes ?>)</h4>

            </div>


            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="../notadepedido"> <button class="btn btn-primary"><i class="ri-stack-line"></i> Notas de Pedidos</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->

    <div class="contentbar">
        <!-- Start row -->
        <div class="row">

            <div class="col-lg-8">
                <div class="card m-b-30">

                    <div class="card-body">
                        <div class="form-group text-center">
                            <h1><span class="badge badge-default"> La Orden Nº <?= $idorden ?></span></h1>
                            <label for=" inputEmail4">Cambiar por el Cliente</label>

                            <? if ($focf != 1) { ?>
                                <div class="row">

                                    <div class="col-4 text-center">
                                    </div>
                                    <style>
                                        .seleccionacld {
                                            background-color: #ccc;
                                        }

                                        .no-seleccionacld {
                                            background-color: #fff;
                                        }
                                    </style>
                                    <div class="form-group text-left">

                                        <div class="col-4 form-group text-left">
                                            <form id="formBusqucl">
                                                <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente" placeholder="Buscar un Cliente" value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;">

                                            </form>

                                            <div id="resultadocl"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                </div>
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
                                                    var url = " ?clienteant=<?= $idclinet ?>&idorden=<?= $idorden ?>&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
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
                                            var url = " ?clienteant=<?= $idclinet ?>&idorden=<?= $idorden ?>&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
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

                            <? } else {

                                echo '<h3>Id: ' . $id_clienteint . ' - ' . $nomclientesnew . ' ' . $nomnegocionew . '</h3>';
                            } ?>


                            <? if ($focf == 1) { ?>
                                <label for="inputEmail4"></label><br>
                                <button class="btn btn-primary my-2" type="button" ondblclick="cambiarcl();">
                                    Cambiar el Cliente
                                </button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger my-2" type="button" onClick="window.history.back();">
                                    Cancelar
                                </button>
                            <?php } ?>
                        </div>
                    </div>


                    <div id="muestroorden30"></div>



                </div>
            </div>

            <script>
                function cambiarcl() {
                    // Mostrar un cuadro de entrada para que el usuario ingrese un número
                    var idordend = <?= $idorden ?>;
                    var numeroIngresado = prompt("Por favor, ingrese el número del Pedido que quiere cambiarle el cliente");

                    // Verificar si el usuario ingresó un número válido
                    if (numeroIngresado !== null && numeroIngresado.trim() == idordend) {
                        // Confirmar si desea continuar
                        var confirmacion = confirm("¿Está seguro de que desea Cambiar el cliente <?= $nomnegocio ?> <?= $nomclientes ?> por ---> <?= $nomnegocionew ?> <?= $nomclientesnew ?>?");

                        if (confirmacion) {
                            // Preparar parámetros con el número ingresado
                            var parametros = {
                                "idorden": '<?= $idorden ?>',
                                "id_clienteant": '<?= $idclinet ?>',
                                "id_clientenew": '<?= $id_clienteint ?>'
                            };

                            // Realizar la solicitud AJAX
                            $.ajax({
                                data: parametros,
                                url: 'hcamdkfnds.php',
                                type: 'POST',
                                beforeSend: function() {
                                    $("#muestroorden30").html('');
                                },
                                success: function(response) {
                                    $("#muestroorden30").html(response);
                                }
                            });
                        }
                    } else {
                        alert("Debe ingresar un número válido para continuar.");
                    }
                }
            </script>


        <?php

    } else {

        echo ("<script language='JavaScript' type='text/javascript'>");
        echo ("location.href='../notadepedido'");
        echo ("</script>");
    }
    include('../template/pie.php'); ?>