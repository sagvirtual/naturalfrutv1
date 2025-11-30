<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

$fechacja = $_POST['fechacja'];
if (empty($fechacja)) {

    $fechacja = $fechahoy;
}

$fechacjaver = date('d/m/Y', strtotime($fechacja));

function nombreclien($rjdhfbpqj, $idcliente)
{
    $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$idcliente'");
    if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

        $nobrecliente = "(" . $rowclientes["nom_contac"] . ")";
    }

    return $nobrecliente;
}


function nombreproveedorn($rjdhfbpqj, $idproveedo)
{
    $sqloprov = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idproveedo'");
    if ($rowprov = mysqli_fetch_array($sqloprov)) {

        $nobreprov = "(" . $rowprov["empresa"] . ")";
    }

    return $nobreprov;
}



function nombrerubro($id_rubro)
{

    switch ($id_rubro) {
        case '1':
            echo "Servicios";
            break;
        case '2':
            echo "Insumos";
            break;
        case '3':
            echo "Alquileres";
            break;
        case '4':
            echo "Reparaciones";
            break;
        case '5':
            echo "Otros";
            break;
        case '6':
            echo "Combustible";
            break;
        case '7':
            echo "Comida";
            break;
        case '8':
            echo "Retiro";
            break;
        case '9':
            echo "Adelanto";
            break;
        case '10':
            echo "Liquidación";
            break;
        case '11':
            echo "Premio";
            break;
        case '12':
            echo "Impuestos";
            break;
        case '13':
            echo "Multas";
            break;
        case '14':
            echo "Preventa";
            break;
        default:
            echo "";
            break;
    }
}


function saldoanteriorn($rjdhfbpqj, $tipopagv, $fechacja)
{
    $ingresoant = 0;
    $egresoant = 0;


    if ($tipopagv == '77') {
        $sqloc = " AND (tipopag='2' OR tipopag='3')";
    } else {
        $sqloc = " AND tipopag='$tipopagv'";
    }
    //sumo la entrada de dinero
    $sqloprov = mysqli_query($rjdhfbpqj, "SELECT valor FROM item_orden Where  modo='1' AND fecha <'$fechacja' $sqloc");
    while ($rowprov = mysqli_fetch_array($sqloprov)) {

        $ingresoant += $rowprov["valor"];
    }
    //sumo la entrada de dinero
    $sqloprova = mysqli_query($rjdhfbpqj, "SELECT valor FROM prodcom Where  modopag='1' AND fecha < '$fechacja' $sqloc");
    while ($rowprovd = mysqli_fetch_array($sqloprova)) {

        $egresoant += $rowprovd["valor"];
    }
    $totalsaldoant = $ingresoant - $egresoant;


    return $totalsaldoant;
}
?>

<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Caja Diaria </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>

    <style>
        body {
            zoom: 90%;
        }
    </style>


    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Sistema de Caja Diaria&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>


    <div class="container">
        <form action="../cajadiaria/" method="post">
            <div class="row">

                <div class="col-lg-2 col-6">

                    <a href="../">
                        <img src="/assets/images/logopc.png" style="width:38mm;">
                    </a>

                </div>
                <div class="col-lg-2 col-6" style="padding-top: 10px; float:right;">
                    <a href="estadopago">
                        <h3><span class="badge bg-primary">Estado Ordenes</span></h3>
                    </a>

                </div>

                <div class="col-lg-8 col-12" style="padding-top: 10px;">


                    <div class="col">
                        <input type="date" class="form-control" name="fechacja" id="fechacja" value="<?= $fechacja ?>" style="width: 350px; float:right;" max="<?= $fechahoy ?>">

                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success" style=" float:right;">
                            Ver Caja
                        </button>
                    </div>





                </div>
            </div>
        </form>
        <hr>

        <h2>Caja Diaria <?= $fechacjaver ?>

            <a style="cursor: pointer;" onclick="recargarPagina()" title="Actualizar Información">
                <i class="material-icons" style="font-size:36px; position:relative; top:6px;">refresh</i></a>

        </h2>

        <?php

        if ($tipo_usuario == "0" || $tipo_usuario == "37") {
            include('cajaefectivo.php');
        }
        if ($tipo_usuario == "0") {
            include('cajabanco.php');
        }
        if ($tipo_usuario == "0" || $tipo_usuario == "37") {
            include('cajacheques.php');
        }
        if ($tipo_usuario == "0") {
            include('cajacheqelec.php');
        }

        ?>

        <?php

        //disabled      include('ordenessincob.php');

        ?>
        <br><br><br>
        <div id="muestroorden29"> </div>
        <div id="muestroorden30"> </div>

        <? //if($fechacja==$fechahoy){
        ?>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>


                        <div class="form-group row col-md-12">
                            <label><b>Rubro</b></label>
                            <div class="input-group mb-2">
                                <select class="form-control" id="id_rubro" name="id_rubro">
                                    <option value="2">Insumos</option>
                                    <option value="6">Combustible</option>
                                    <option value="7">Comida</option>
                                    <option value="8">Retiro</option>
                                    <option value="9">Adelanto</option>
                                    <option value="10">Liquidación</option>
                                    <option value="14">Preventa</option>
                                    <option value="11">Premio</option>
                                    <option value="1">Servicios</option>
                                    <option value="12">Impuestos</option>
                                    <option value="4">Reparaciones</option>
                                    <option value="3">Alquileres</option>
                                    <option value="13">Multas</option>
                                    <option value="5">Otros</option>
                                </select>


                                &nbsp;
                                <input type="date" class="form-control" name="fechapag" id="fechapag" value="<?= $fechacja ?>" disabled>
                                &nbsp;

                                <select class="form-control" name="ingreegre" id="ingreegre">
                                    <option value="1">Egreso Dinero</option>
                                    <option value="2">Ingreso Dinero</option>
                                </select>
                                &nbsp; &nbsp;
                                <select class="form-control" name="tipopag" id="tipopag" onchange="showInput()">
                                    <? if ($tipo_usuario == "0" || $tipo_usuario == "37") { ?><option value="1">Efectivo</option> <? } ?>
                                    <? if ($tipo_usuario == "0"  || $tipo_usuario == "37") { ?> <option value="4">Cheque</option> <? } ?>


                                    <? if ($tipo_usuario == "0") { ?><option value="2">Transferencia</option> <? } ?>
                                    <? if ($tipo_usuario == "0") { ?><option value="3">Deposito</option> <? } ?>
                                    <? if ($tipo_usuario == "0") { ?><option value="6">ECheq</option> <? } ?>
                                    <!-- <option value="5">Mercado Pago</option> -->

                                </select>

                                &nbsp;
                                <input type="text" class="form-control" name="ncheque" id="ncheque" placeholder="Nº Cheque" style="display: none;" autocomplete="off">
                                &nbsp;
                                <input type="date" class="form-control" name="vencheque" id="vencheque" style="display: none;" autocomplete="off">

                                &nbsp;
                                <input type="text" class="form-control" name="valor" id="valor" placeholder="$0.00" autocomplete="off">
                                &nbsp; &nbsp; &nbsp;
                                <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota" autocomplete="off">

                                <input type="hidden" id="id_cliente" name="id_cliente" value="139" autocomplete="off">

                                &nbsp;<button onclick="ajax_agrgpago($('#valor').val(),$('#tipopag').val(),$('#fechapag').val(),$('#ncheque').val(),$('#vencheque').val(),$('#nota').val(),$('#ingreegre').val(),$('#id_rubro').val())" class="btn btn-secondary" style="width: 100px;">Enviar</button>
                            </div>


                    </td>
                </tr>

            </tbody>
        </table> <? //}
                    ?>
    </div>



    <br>





    <div class="container mt-3 text-center">

        <a href="cajadiaria_pdf?fechacja=<?= $fechacja ?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a>

        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../"><button type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



    </div><br><br><br>
    <div id="id301" tabindex="-1"></div>




    </div>




    <script>
        function ajax_eliminapag(iditempag, tipo) {
            var parametros = {
                "iditem": iditempag,
                "tipo": tipo
            };
            $.ajax({
                data: parametros,
                url: 'eliminarpag.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden30").html('');
                },
                success: function(response) {
                    $("#muestroorden30").html(response);
                }
            });
        }
    </script>



    <script>
        function ajax_agrgpago(valor, tipopag, fechapag, ncheque, vencheque, nota, ingreegre, id_rubro) {
            // Determinar la URL en función del valor de ingreegre
            var url = '';
            if (ingreegre == 1) {
                url = 'inser_pag2.php';
            } else if (ingreegre == 2) {
                url = 'inser_pag3.php';
            }

            var parametros = {
                "pago_valor": valor,
                "tipopag": tipopag,
                "fechapag": fechapag,
                "ncheque": ncheque,
                "vencheque": vencheque,
                "nota": nota,
                "ingreegre": ingreegre,
                "id_rubro": id_rubro
            };

            $.ajax({
                data: parametros,
                url: url, // Utiliza la URL determinada según ingreegre
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden29").html('');
                },
                success: function(response) {
                    $("#muestroorden29").html(response);
                }
            });
        }
    </script>

    <script>
        function showInput() {
            var selectValue = document.getElementById("tipopag").value;
            var ncheque = document.getElementById("ncheque");
            var vencheque = document.getElementById("vencheque");

            if (selectValue === "4" || selectValue === "6") {
                ncheque.style.display = 'block';
                vencheque.style.display = 'block';
                nota.placeholder = "Banco";
            } else {
                ncheque.style.display = 'none';
                vencheque.style.display = 'none';
                nota.placeholder = "Nota";
            }
        }
    </script>
    <script>
        // Función para recargar la página
        function recargarPagina() {
            location.reload();
        }

        // Configura la recarga automática cada 1 minuto (60,000 milisegundos)
        setInterval(recargarPagina, 60000);
    </script>
</body>

</html>

<?php

mysqli_close($rjdhfbpqj);

?>