<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');

if($tipo_usuario=="0" || $tipo_usuario=="1" || $tipo_usuario=="37"){
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
                        onkeyup="ajax_buscar($('#buscar').val());return false;" autocomplete="off"> <? } ?>

            </div>

        </div>
        <div class="col-md-8 col-lg-8" style="justify-content: center;
            align-items: center;">

            <span class="badge" style="background-color:#0064FF;color:white; cursor: pointer;"
                onclick="ajax_buscar('','8')">Ver<br>todos</span>
        </div>
        <div class="col-md-2 col-lg-2">
            <div class="widgetbar">

            

                <
            </div>
        </div>
    </div>
</div>
<div id="resultadobuscar"></div>



<script>
    function ajax_buscar(buscar, col, diaver) {
        var parametros = {
            "buscar": buscar,
            "col": col,
            "diaver": diaver

        };
        $.ajax({
            data: parametros,
            url: '../orden_de_compra/buscarconcretadas.php',
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
            ajax_buscar('', '');
        });
</script>
<?php include ('template/pie.php'); ?>

<?php
         
        }else{
            echo ("<script language='JavaScript' type='text/javascript'>");
                    echo ("location.href='../'");
                    echo ("</script>"); 
            }
         
        ?>