<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
//include('../lusuarios/redirec.php');
include('../template/cabezal.php');



// Crear un objeto DateTime con la fecha actual
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-1 day');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");


?>
<!-- Start Breadcrumbbar -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="breadcrumbbar">

    <div class="col-md-12 col-lg-12">



        <h4 class="page-title" style="padding-right: 70px;"><i class="sl-icon-people"></i> Productos Eliminados del Pedido</h4>
    </div><br>
    <div class="col-md-12 col-lg-12">
        <f class="form-inline">

            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-right: 50px;">Desde: </label>
                <input type="date" id="desde_date" name="desde_date" value="<?= $desde_date ?>" class="form-control">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-left: 20px; padding-right: 20;">Hasta: </label>
                <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control">

            </div>
        </f>
    </div>
    <div class="col-md-12 col-lg-12">
        <f class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input id="modobus" name="modobus" type="hidden">

                <label for="staticEmail2" style="padding-right: 43;">Cliente: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="search"
                    id="busproveedor" name="busproveedor" class="form-control"
                    aria-label="Search" aria-describedby="button-addon2"
                    onChange="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val())"
                    style="width: 450px;">

            </div>
        </f>
    </div>
    <div class="col-md-12 col-lg-12">
        <f class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-right: 28px;">Producto: </label>
                <input type="search" id="buscar" name="buscar" class="form-control"
                    aria-label="Search" aria-describedby="button-addon2"
                    onChange="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val())"
                    style="width: 450px;">

            </div>
            <div class="form-group mx-sm-3 mb-2">
                <a onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val())"
                    style="cursor: pointer;">
                    <h4 class="page-title"><i class="sl-icon-people"></i> Buscar</h4>
                </a>

            </div>
        </f>
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="form-group mx-sm-3 mb-2">
            <f class="form-inline">
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'1')" style="position:relative; top:10px;"> No hay</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'2')" style="position:relative; top:10px;"> Venc. Corto</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'3')" style="position:relative; top:10px;"> Vencido</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'4')" style="position:relative; top:10px;"> Mal estado</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'5')" style="position:relative; top:10px;"> Equivocado</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'6')" style="position:relative; top:10px;"> Bichos</button>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'8')" style="position:relative; top:10px;"> Roto</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'9')" style="position:relative; top:10px;"> No quiso el cliente</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'10')" style="position:relative; top:10px;"> Ingrese Mal</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'11')" style="position:relative; top:10px;"> Agregado no enviado</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-dark" onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),'12')" style="position:relative; top:10px;"> Olvido Chofer</button>
            </f>
        </div>
    </div>

    <div id="resultadobuscar"></div>
</div>
<script>
    function ajax_buscar(desde_date, hasta_date, buscar, busproveedor, motivo) {
        var parametros = {
            "desde_date": desde_date,
            "hasta_date": hasta_date,
            "buscar": buscar,
            "busproveedor": busproveedor,
            "motivo": motivo

        };
        $.ajax({
            data: parametros,
            url: 'buscar_elimados_productos.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<div style="text-align:center; position:relative; top:100px;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><div>');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });
    }
</script>




<?php include('../template/pie.php'); ?>