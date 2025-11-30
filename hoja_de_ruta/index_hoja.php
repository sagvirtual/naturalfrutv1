<?php include('../f54du60ig65.php');
include('../template/cabezal.php');

unset($_SESSION['hojaderut']);
unset($_SESSION['fecharepart']);
unset($_SESSION['idcliente']);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    function ajax_buscar(buscar) {
        var parametros = {
            "buscar": buscar,

        };
        $.ajax({
            data: parametros,
            url: 'buscarhoja.php',
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
        <div class="col-md-2 col-lg-2">
            <h4 class="page-title"><i class="fa fa-file-text"></i> Hojas de Ruta</h4>


        </div>


        <div class="col-md-4 col-lg-4">
            <div class="input-group" style="background-color: white;">

                <input id="modobus" name="modobus" type="hidden">


                <? if ($productos == "") { ?> <input type="search" id="buscar" name="buscar" class="form-control" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" onkeyup="ajax_buscar($('#buscar').val());return false;"> <? } ?>

            </div>





        </div>

<?php
 
 $fechahoycod=base64_encode($fechahoy);
 
?>

        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            <a href="../orden/agregar_orden" title="Crear Remito"> <button class="btn btn-primary">
     <i class="fa fa-file-text"></i> Crear Remito</button></a>
            </div>
        </div>

    </div>
</div>

<div id="resultadobuscar">
    <!-- End Breadcrumbbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Día</th>
                                        <th>Fecha</th>
                                        <th>Camioneta</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja  ORDER BY `hoja`.`fecha` DESC LIMIT 12");
                                    while ($rowhoja = mysqli_fetch_array($sqlhoja)) {
                                        $id = $rowhoja["id"];
                                        $idcod = base64_encode($id);
                                        $fecha = $rowhoja["fecha"];
                                        $fechacod = base64_encode($fecha);
                                        $fin = $rowhoja["fin"];
                                        $camioneid = $rowhoja["camioneta"];
                                        $idcamcod = base64_encode($camioneid);

                                        //extrigo nombre de la camioneta
                                        $sqlcamionetas=mysqli_query($rjdhfbpqj,"SELECT * FROM camionetas Where id = ' $camioneid'");
                                        if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)){
                                            $nombrecamio = $rowcamionetas["nombre"];
                                        }
                                        //

                                        $fechav = explode("-", $fecha);
                                        $fechavr = $fechav[2] . "/" . $fechav[1] . "/" . $fechav[0];



                                        $fechats = strtotime($fecha); //pasamos a timestamp

                                        //el parametro w en la funcion date indica que queremos el dia de la semana
                                        //lo devuelve en numero 0 domingo, 1 lunes,....


                                        switch (date('w', $fechats)) {
                                            case 0:
                                                $quedia = "Domingo";
                                                break;
                                            case 1:
                                                $quedia = "Lunes";
                                                break;
                                            case 2:
                                                $quedia = "Martes";
                                                break;
                                            case 3:
                                                $quedia = "Miercoles";
                                                break;
                                            case 4:
                                                $quedia = "Jueves";
                                                break;
                                            case 5:
                                                $quedia = "Viernes";
                                                break;
                                            case 6:
                                                $quedia = "Sabado";
                                                break;
                                        }


                                        //aca me fijo si hay ordenes posteriores
                                        $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM orden  Where fecha = '$fecha'");
                                        if ($rowordenr = mysqli_fetch_array($sqlordenr)) {
                                            $verbo = "1";
                                        } else {
                                            $verbo = "0";
                                        }


                                        echo '
                                        <tr style="' . $colorestado . '">
                                        <td scope="row">' . $quedia . '</td>
                                        <td scope="row">' . $fechavr . '</td>
                                        <td scope="row">' . $nombrecamio . '</td>
                                        <td>
                                            <div class="button-list">
                                            <a href="ver_hoja_de_ruta.php?hdnsbloekdjgsd=' . $fechacod . '&hdnskdjjgsd=' . $idcamcod . '" target="_parent" title="Ver hoja de ruta">
                                            
                                            <button type="button" class="btn btn-primary"><i class="feather icon-send mr-2"></i> VER HOJA DE RUTA</button></a>
                                            ';
                                        //aca me fijo si hay productos anula el boton borrar
                                        if ($verbo == "0") {

                                            echo ' 
                                               
                                                    <a href="javascript:eliminar(' . "'mlkdthsls?" . 'juhytm=' . $idcod . '&hdnsbloekdjgsd=' . $fechacod . '' . "'" . ')" class="btn btn-danger-rgba">  <i class="ri-delete-bin-3-line"></i></a>';
                                        }


                                        echo ' </div>
                                        </td>
                                        </tr>
                                        ';
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Contentbar -->
</div>
<?php include('../template/pie.php'); ?>