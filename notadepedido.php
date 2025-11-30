<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('../funciones/funcPicking.php');

if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "3" || $tipo_usuario == "30" || $tipo_usuario == "37") {
    include('template/cabezal.php');

    unset($_SESSION['idcliente']);
    unset($_SESSION['dianoms']);
    unset($_SESSION['fecharepart']);
    unset($_SESSION['id_rubro']);
    unset($_SESSION['tipo_cliente']);
    unset($_SESSION['id_orden']); ?>
    <!-- Start Breadcrumbbar -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <div class="breadcrumbbar">
        <div class="row align-items-center">

            <div class="col-md-2 col-lg-2">
                <div class="input-group">
                    <input id="modobus" name="modobus" type="hidden">


                    <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control"
                            placeholder="Nº Orden/Nombre" aria-label="Search" aria-describedby="button-addon2"
                            onchange="ajax_buscar($('#buscar').val());return false;" autocomplete="off"> <? } ?>

                </div>

            </div>
            <div class="col-md-9 col-lg-9" style="justify-content: center;
            align-items: center;">
                <?
                if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1") {
                ?>

                    <span class="badge" style="background-color:#0064FF;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','','','')">Ver<br>todos</span>
                    <span class="badge" style="background-color:grey;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','0','','')">Vendedor<br>Ingresando</span>
                    <span class="badge" style="background-color:#AD3B06;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','1','','')">Eperando<br>Confirmación</span>
                    <span class="badge" style="background-color:#067FAD;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','2','','')">En<br>Confirmado</span>
                <? } ?>
                <?
                if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3" || $tipo_usuario == "1" || $tipo_usuario == "30") {
                ?>


                    <span class="badge" style="background-color:green;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','3','','')">En<br>Preparando</span>
                    <span class="badge" style="background-color: #678C35;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','4','','')">Pidiendo<br>Productos</span>
                    <span class="badge" style="background-color:#9000BA;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','5','','')">En<br>Controlando</span>
                    <span class="badge" style="background-color:#F0FF00;color:black; cursor: pointer;"
                        onclick="ajax_buscar('','6','','')">Listo<br>para Retiro</span>
                    <span class="badge" style="background-color:#FFD500;color:black; cursor: pointer;"
                        onclick="ajax_buscar('','7','','')">Listo<br>para Despacho</span>
                    <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','9','','')">En<br>Ruta de Entrega
                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="badge" style="background-color:red;color:white; cursor: pointer;"
                        onclick="ajax_buscar('','','','1')">Ingreso<br>Stock</span>

                <? } ?>

            </div>
            <div class="col-md-1 col-lg-1">
                <div class="widgetbar">

                    <?
                    if ($tipo_usuario == "0" || $tipo_usuario == "33") { ?>
                        <a href="../seguimiento/" tabindex="-1">
                            <button type="button" class="btn btn-success" style="position: absolute; top: 0; left: -120px;"
                                tabindex="-1">Seguimiento</button></a>
                    <?
                    } ?>
                    <?
                    if ($tipo_usuario == "0" || $tipo_usuario == "33"  || $tipo_usuario == "3") {
                    ?>

                        <a href="/nota_de_pedido"><button class="btn btn-primary">Agregar Nota</button></a>

                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <?
    if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3") {
    ?>
        <div class="container text-center" style="position:relative; top:10px;">



            <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','1')">Lunes</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','2')">Martes</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','3')">Miercoles</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','4')">Jueves</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:black;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','5')">Viernes</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:grey;color:white; cursor: pointer;"
                onclick="ajax_buscar('','99','6')">Sábado</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:green;color:white; cursor: pointer;"
                onclick="ajax_buscar('','31')">Entregadas
            </span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge" style="background-color:#B50004;color:white; cursor: pointer;"
                onclick="ajax_buscar('','32')">Canceladas
            </span>
        </div>
    <? } ?>
    <div id="resultadobuscar"></div>



    <script>
        function ajax_buscar(buscar, col, diaver, ingreso) {
            var parametros = {
                "buscar": buscar,
                "col": col,
                "diaver": diaver,
                "ingreso": ingreso

            };
            $.ajax({
                data: parametros,
                url: '../lnotasdepedido/buscarnota.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                }
            });
        }
        <?
        if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "3") {
        ?>

            $(document).ready(function() {
                // Llamada a la función ajax_buscar con parámetros iniciales
                ajax_buscar('', '');
            });

        <? } ?>


        <?
        if ($tipo_usuario == "30") {
        ?>

            $(document).ready(function() {
                // Llamada a la función ajax_buscar con parámetros iniciales
                ajax_buscar('', '5');
            });

        <? } ?>
    </script>
    <?php include('template/pie.php'); ?>

<?php

} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
}

?>