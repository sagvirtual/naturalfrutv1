<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');

if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "37") {
    include('template/cabezal.php');

    unset($_SESSION['idcliente']);
    unset($_SESSION['dianoms']);
    unset($_SESSION['fecharepart']);
    unset($_SESSION['id_rubro']);
    unset($_SESSION['tipo_cliente']);
    unset($_SESSION['id_orden']); ?>
    <!-- Start Breadcrumbbar -->
    <?php //cantide para enviar

    function ordecomccant($rjdhfbpqj, $id_usuariv)
    {
        $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT fecha,enviado,id FROM ordencompra WHERE enviado = '0' and quien='$id_usuariv'");

        $canverificafin = mysqli_num_rows($sqlordenr);

        return $canverificafin;
    }
    $comi = "'";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <div class="breadcrumbbar">
        <div class="row align-items-center">

            <div class="col-md-2 col-lg-2">
                <div class="input-group">
                    <input id="modobus" name="modobus" type="hidden">


                    <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control"
                            placeholder="Nº Orden/Nombre" aria-label="Search" aria-describedby="button-addon2"
                            onkeyup="ajax_buscar($('#buscar').val());return false;" autocomplete="off"> <? } ?>

                </div>

            </div>
            <div class="col-md-8 col-lg-8" style="justify-content: center;
            align-items: center;">

                <span class="badge" style="background-color:#0064FF;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','')">Ver<br>todos</span>
                <span class="badge" style="background-color:grey;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','0','')">En<br>Ingresando</span>
                <span class="badge" style="background-color:#AD3B06;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','1','')">Eperando<br>Fecha</span>
                <span class="badge" style="background-color:#067FAD;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','2','')">En<br>Confirmado</span>&nbsp;&nbsp;&nbsp;
                <span class="badge" style="background-color:green;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','','1')">Día<br>LUNES</span>
                <span class="badge" style="background-color: #678C35;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','','2')">Día<br>MARTES</span>
                <span class="badge" style="background-color:#9000BA;color:white; cursor: pointer;"
                    onclick="ajax_buscar('','','3')">Día<br>MIERCOLES</span>
                <span class="badge" style="background-color:#F0FF00;color:black; cursor: pointer;"
                    onclick="ajax_buscar('','','4')">Día<br>JUEVES</span>
                <span class="badge" style="background-color:#FFD500;color:black; cursor: pointer;"
                    onclick="ajax_buscar('','','5')">Día<br>VIERNES</span>&nbsp;&nbsp;&nbsp;

                <span class="badge" style="background-color:RED;color:black; cursor: pointer;"
                    onclick="ajax_buscar('','6','')">ENTREGADO<br>SIN PAGAR</span>
                <span class="badge" style="background-color:RED;color:black; cursor: pointer;"
                    onclick="ajax_buscar('','7','')">PAGADO<br>SIN ENTREGAR</span>&nbsp;&nbsp;&nbsp;

                <span class="badge" style="background-color:black;color:white; cursor: pointer;" onclick="ajax_buscar('','8','')">En<br>Finalizadas
                </span>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="widgetbar">



                    <a href="/orden_de_compra/"><button class="btn btn-primary"><i
                                class="feather icon-user-plus mr-2"></i>Agregar Orden de Compra</button></a><br>
                    <a href="/orden_de_pago/"><button class="btn btn-dark"><i
                                class="feather icon-user-plus mr-2"></i>Agregar Orden de Pago</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php

    if ($tipo_usuario == "0") {
        $sqlusub = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where tipo_cliente<='1' and estado = '0' and (id='35' or id='74' or id='51') ORDER BY nom_contac ASC");
        echo '<div class="container">Para enviar:';
        while ($rowusuarios = mysqli_fetch_array($sqlusub)) {
            $id_usuariv = $rowusuarios['id'];
            $cantidparenviar = ordecomccant($rjdhfbpqj, $id_usuariv);

            echo '
        <button type="button" class="btn btn-primary" onclick="ajax_buscar(' . $comi . '' . $comi . ',' . $comi . '' . $comi . ',' . $comi . '' . $comi . ',' . $comi . '1' . $comi . ',' . $comi . '' . $id_usuariv . '' . $comi . ')">
                                      ' . $rowusuarios["nom_contac"] . ' <span class="badge badge-light" style="font-size: 10pt;">' . $cantidparenviar . '</span>
                                      <span class="sr-only">unread messages</span>
                                    </button> ';
        }
        echo '</div>';
    } else {

        $cantidparenviar = ordecomccant($rjdhfbpqj, $id_usuarioclav);

        echo '<div class="container">Para enviar:
        <button type="button" class="btn btn-primary" onclick="ajax_buscar(' . $comi . '' . $comi . ',' . $comi . '' . $comi . ',' . $comi . '' . $comi . ',' . $comi . '1' . $comi . ',' . $comi . '' . $id_usuarioclav . '' . $comi . ')">
                                      ' . $rowusuarios["nom_contac"] . ' <span class="badge badge-light" style="font-size: 10pt;">' . $cantidparenviar . '</span>
                                      <span class="sr-only">unread messages</span>
                                    </button> ';

        echo '</div>';
    }
    ?>

    <div id="resultadobuscar"></div>



    <script>
        function ajax_buscar(buscar, col, diaver, sinenviar, quinenviar) {
            var parametros = {
                "buscar": buscar,
                "col": col,
                "diaver": diaver,
                "sinenviar": sinenviar,
                "quinenviar": quinenviar

            };
            $.ajax({
                data: parametros,
                url: '../orden_de_compra/buscarOrden.php',
                type: 'POST',
                beforeSend: function() {
                    $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                }
            });
        }
        $(document).ready(function() {
            // Llamada a la función ajax_buscar con parámetros iniciales
            ajax_buscar('', '');
        });
    </script>
    <?php include('template/pie.php'); ?>

<?php

} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../'");
    echo ("</script>");
}

?>