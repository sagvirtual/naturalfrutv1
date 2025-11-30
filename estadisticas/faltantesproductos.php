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



        <h4 class="page-title" style="padding-right: 70px;"><i class="sl-icon-people"></i> Productos Faltantes</h4>
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
                    onChange="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorp').val())"
                    style="width: 450px;">

            </div>
        </f>
    </div>
    <div class="col-md-12 col-lg-12">
        <f class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-right: 21px;">Proveedor: </label>
                <input type="search" id="busproveedorp" name="busproveedorp" class="form-control"
                    aria-label="Search" aria-describedby="button-addon2"
                    onChange="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorp').val())"
                    style="width: 450px;">

            </div>
        </f>
        <f class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="staticEmail2" style="padding-right: 28px;">Producto: </label>
                <input type="search" id="buscar" name="buscar" class="form-control"
                    aria-label="Search" aria-describedby="button-addon2"
                    onChange="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorp').val())"
                    style="width: 450px;">

            </div>
            <div class="form-group mx-sm-3 mb-2">
                <a onclick="ajax_buscar($('#desde_date').val(),$('#hasta_date').val(),$('#buscar').val(),$('#busproveedor').val(),$('#busproveedorp').val())"
                    style="cursor: pointer;">
                    <h4 class="page-title"><i class="sl-icon-people"></i> Buscar</h4>
                </a>

            </div>
        </f>
    </div>
</div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="ajax_excel()">
    <button type="button">PDF</button>
</a>
<div id="resultadobuscar"></div>
</div>


<script>
    function ajax_buscar(desde_date, hasta_date, buscar, busproveedor, busproveedorp) {
        var parametros = {
            "desde_date": desde_date,
            "hasta_date": hasta_date,
            "buscar": buscar,
            "busproveedor": busproveedor,
            "busproveedorp": busproveedorp

        };
        $.ajax({
            data: parametros,
            url: 'buscar_faltantes_productos.php',
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

<script>
    function ajax_excel() {
        // Obtener valores
        var desde_date = document.getElementById('desde_date').value;
        var hasta_date = document.getElementById('hasta_date').value;
        var buscar = document.getElementById('buscar').value;
        var busproveedor = document.getElementById('busproveedor').value;
        var busproveedorp = document.getElementById('busproveedorp').value;

        // Construir URL con parámetros
        var url = 'faltantes_productos_excel.php' +
            '?desde_date=' + encodeURIComponent(desde_date) +
            '&hasta_date=' + encodeURIComponent(hasta_date) +
            '&buscar=' + encodeURIComponent(buscar) +
            '&busproveedor=' + encodeURIComponent(busproveedor) +
            '&busproveedorp=' + encodeURIComponent(busproveedorp);

        // Abrir nueva ventana o pestaña
        window.open(url, '_blank');
    }
</script>





<?php include('../template/pie.php'); ?>