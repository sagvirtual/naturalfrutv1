<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']);
unset($_SESSION["id_rubro"]);
unset($_SESSION["estado"]);
unset($_SESSION["tipo_cliente"]);
unset($_SESSION["dia_repart1"]);
unset($_SESSION["dia_repart2"]);
unset($_SESSION["dia_repart3"]);
unset($_SESSION["dia_repart4"]);
unset($_SESSION["dia_repart5"]);
unset($_SESSION["dia_repart6"]);
unset($_SESSION["dia_repart0"]);

unset($_SESSION["cod_fac"]);
unset($_SESSION["iva_por"]);
unset($_SESSION["persep_por"]);
unset($_SESSION["facturado"]);

unset($_SESSION["cli_usuario"]);
unset($_SESSION["cli_pass"]);
unset($_SESSION["nom_empr"]);
unset($_SESSION["nom_contac"]);
unset($_SESSION["wsp"]);
unset($_SESSION["tel"]);
unset($_SESSION["email"]);
unset($_SESSION["direccion"]);
unset($_SESSION["localidad"]);
unset($_SESSION["file"]);
unset($_SESSION["iva"]);
unset($_SESSION["cuit"]);
unset($_SESSION["razonsocial"]);
unset($_SESSION["saldoini"]);
unset($_SESSION["camioneta"]);
unset($_SESSION["cobrable"]);
unset($_SESSION["zona"]);
unset($_SESSION["horarios"]);
unset($_SESSION["picking"]);




?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    let timeout = null;
    let paginaActual = 1; // Página actual
    const limite = 15; // Registros por página
    let xhr = null; // Para abortar la solicitud anterior

    function ajax_buscar(buscar, pagina = 1) {
        clearTimeout(timeout);

        timeout = setTimeout(function() {
            const parametros = {
                "buscar": buscar,
                "pagina": pagina,
                "limite": limite
            };

            // Abortamos la request anterior si sigue en vuelo
            if (xhr && xhr.readyState !== 4) {
                try {
                    xhr.abort();
                } catch (e) {}
            }

            xhr = $.ajax({
                data: parametros,
                url: 'lclientes/buscarclientes.php',
                type: 'POST',
                cache: false,
                beforeSend: function() {
                    $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif" style="width: 60px; height:60px;"></div>');
                },
                success: function(response) {
                    $("#resultadobuscar").html(response);
                    paginaActual = pagina;
                    // opcional: subir un poco para que se vea el inicio de la tabla al cambiar de página
                    // window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                error: function(jqXHR, textStatus) {
                    if (textStatus !== 'abort') {
                        $("#resultadobuscar").html('<div class="alert alert-danger mb-0">Ocurrió un error al cargar los datos.</div>');
                    }
                }
            });
        }, 200); // pequeño debounce para tipeo
    }

    // Cambiar de página (lo llama el HTML renderizado desde buscarclientes.php)
    function cambiarPagina(pagina) {
        const buscar = $("#buscar").val();
        ajax_buscar(buscar, pagina);
    }

    // Búsqueda en vivo al tipear (si preferís solo ENTER, comentá este bloque)
    $(document).on('input', '#buscar', function() {
        ajax_buscar(this.value, 1);
    });

    // También disparar con Enter por si el usuario prefiere
    $(document).on('keydown', '#buscar', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            ajax_buscar(this.value, 1);
        }
    });

    // Carga inicial
    $(function() {
        ajax_buscar($('#buscar').val() || '', 1);
    });
</script>


<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-2 col-lg-2">
            <h4 class="page-title"><i class="sl-icon-people"></i> Listado de Clientes</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" onchange="ajax_buscar($('#buscar').val());return false;"> <? } ?>

            </div>
        </div>
        <div class="col-md-2 col-lg-2">

            <a onclick="$('#buscar').val(''); ajax_buscar('', 1);" style="cursor: pointer;">
                <h4 class="page-title"><i class="sl-icon-people"></i> Buscar</h4>
            </a>



        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lclientes"><button class="btn btn-primary"><i class="feather icon-user-plus mr-2"></i>Agregar Cliente</button></a>
            </div>
        </div>
    </div>
</div>
<div id="resultadobuscar"></div>

<?php include('template/pie.php'); ?>