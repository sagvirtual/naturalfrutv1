<?php include('../f54du60ig65.php');
include('../template/cabezal.php');

unset($_SESSION['idcliente']);
unset($_SESSION['dianoms']);
//unset($_SESSION['fecharepart']);
unset($_SESSION['id_rubro']);
unset($_SESSION['tipo_cliente']);
unset($_SESSION['id_orden']);
unset($_SESSION['hojaderut']);


$sqlproveedoresa = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where whatsapp != ''");
while ($rowproveedoresa = mysqli_fetch_array($sqlproveedoresa)) {
    $whatsappa = $rowproveedoresa["whatsapp"];
    if (!empty($whatsappa)) {
        $whs = "1";
    }
}


$sqlproveedoresad = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where 'address' != ''");
while ($rowproveedoresad = mysqli_fetch_array($sqlproveedoresad)) {
    $addressa = $rowproveedoresad["address"];
    if (!empty($addressa)) {
        $andr = "1";
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    function ajax_buscar(buscar) {
        var parametros = {
            "buscar": buscar,

        };
        $.ajax({
            data: parametros,
            url: 'buscarorden.php',
            type: 'POST',
            beforeSend: function() {
                $("#resultadobuscar").html('<img src="../assets/images/loader.gif"style="width: 60px; height:60px;">');
            },
            success: function(response) {
                $("#resultadobuscar").html(response);
            }
        });
    }
</script>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-4 col-lg-4">
            <h4 class="page-title"><i class="fa fa-file-text"></i> Remitos Clientes</h4>


        </div>


        <div class="col-md-4 col-lg-4">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" onkeyup="ajax_buscar($('#buscar').val());return false;"> <? } ?>

            </div>





        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="agregar_orden"><button class="btn btn-primary"><i class="fa fa-file-text"></i> Agregar Remito</button></a>
            </div>
        </div>
    </div>
</div>

<div id="resultadobuscar">
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
</div>
<?php include('../template/pie.php'); ?>