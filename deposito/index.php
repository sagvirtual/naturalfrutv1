<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
function isMobileDevice()
{
    return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
}

if (!isMobileDevice()) {
    header("Location: ../deposito/infodeposito");
    exit;
}

/* agregar */
$idproedit = $_GET['idproedit'];
$id_pallet = $_GET['id_pallet'];
$odoin = $_GET['odoin'];
if (!$idproedit) {
    $productods = $_GET['producto'];

    $productod = explode("@", $productods);
    $producto = preg_replace('/\s+/', ' ', $productod[0]);

    $unidsx = $productod[1];
    $ediyes = '0';
} else {

    $sqen = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$idproedit'");
    if ($rowod = mysqli_fetch_array($sqen)) {

        $nodrevpro = $rowod["nombre"];
        $kildpro = $rowod["kilo"];
    }
    $producto = $nodrevpro;

    $unidsx = $_GET['idproedit'];
    $ediyes = '1';
}


$id_palletb = substr($id_pallet, 0, 12);
$rowrdep = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito where id_pallet='$id_palletb' and fin='0'");
if ($rowrdep = mysqli_fetch_array($rowrdep)) {
    $id_palletv = $rowrdep['id_pallet'];
    $id_destiins = $rowrdep['id_destino'];
    $blockpallet = "disabled";


    $sqldub = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where codigo='$id_destiins'");
    if ($rowrubrnom = mysqli_fetch_array($sqldub)) {
        $nombreubi = $rowrubrnom['nombre'];
    }
}
?>

<?php

function nombrub($rjdhfbpqj, $id_destino)
{
    $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi Where codigo='$id_destino'");
    if ($rowod = mysqli_fetch_array($sqwen)) {

        $nombreubic = $rowod["nombre"];
    } else {
        $nombreubic = "No se Asigno Ubicación!";
    }

    return $nombreubic;
}

?>

<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Gestión Deposito </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Gestión Deposito&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>

    <div id="aviso-pedido"></div>
    <div class="container">

        <div class="row">

            <div class="col-lg-12" style="padding-top: 10px;">
                <input type="hidden" class="form-control" id="numero" name="numero" value="999">
                <input type="hidden" class="form-control" id="cantidad" name="cantidad" value="999">
                <input type="hidden" class="form-control" id="unidad" name="unidad" value="999">
                <input type="hidden" class="form-control" id="suminstr" name="suminstr" value="999">
                <input type="hidden" class="form-control" id="id_deposito" name="id_deposito" value="<?= $id_deposito ?>">
                <?php

                include('inpubuscado.php');




                ?>

                <br>

                <?php

                $sqwen = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_producto='$unidsx' and fin='0' ORDER BY `fecha_venc` ASC");
                while ($rowod = mysqli_fetch_array($sqwen)) {

                    $id_dep = $rowod["id"];
                    $id_palletd = $rowod["id_pallet"];
                    $id_destino = $rowod["id_destino"];
                    $nombreubi = nombrub($rjdhfbpqj, $id_destino);

                    $block = $rowod["block"];
                    $fecha_ing = $rowod["fecha_ing"];
                    $fecha_venc = $rowod["fecha_venc"];

                    $fecha_encar = $rowod['fecha_encar'];
                    $encarpado = $rowod['encarpado'];




                    $sqwwen = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi Where codigo='$id_destino' and fraccionar='1'");
                    if ($rowdod = mysqli_fetch_array($sqwwen)) {



                        $colorbla = 'success';
                        $notca = '<p style="color:green">Habilitado</p>';
                    } else {
                        $idcont += 1;


                        if ($idcont != '1') {
                            $block = '1';
                        }

                        if ($block == '0') {
                            $colorbla = 'success';
                            $notca = '<p style="color:green">Habilitado</p>';
                        } else {

                            $colorbla = 'danger';
                            $notca = '<p style="color:red">No tocar</p>';
                        }
                    }

                    if ($encarpado == '1') {

                        $colorbla = 'dark';
                        $notca = '<p style="color:dark">No tocar encarpado <br>' . date('d/m/Y', strtotime($fecha_encar)) . '</p>';
                        $block = '1';
                        $nombreenca = "Quitar Encarpado";
                        $encarp = 'No tocar encarpado ' . date('d/m/Y', strtotime($fecha_encar)) . '';
                    } else {
                        $nombreenca = "Encarpar Pallets";

                        if ($fecha_encar != '0000-00-00') {
                            $encarp = 'Fue encarpado ' . date('d/m/Y', strtotime($fecha_encar)) . '';
                        } else {
                            $encarp = '';
                        }
                    }



                    $comilla = "'";
                    echo '
                                            <button type="button" class="btn btn-' . $colorbla . '" data-bs-toggle="collapse" data-bs-target="#pallets' . $id_dep . '" style="width: 100%;height: 70px; font-size: 20pt;">
                                
                            <strong>' . $nombreubi . '</strong><br><p style="font-size: 12pt;">Fecha vencimiento: ' . date('d/m/Y', strtotime($fecha_venc)) . ' </p>
                           
                                                           </button>' . $encarp . '
                                                           <br> <br>
  <div id="pallets' . $id_dep . '" class="collapse">
  <div class="alert alert-light alert-dismissible text-center">
  <h1><strong>Cod.' . $id_palletd . '#</strong></h1>
</div>
<div class="alert alert-light alert-dismissible text-center">
  <strong>Fecha Ingreso: ' . date('d/m/Y', strtotime($fecha_ing)) . '</strong>
</div>';

                    if ($fecha_venc != '3000-00-00' && $fecha_venc != '0000-00-00' && $fecha_venc != '') {
                        echo '
<div class="alert alert-light alert-dismissible text-center">
 <h2 onclick="mostrarFechaVencimiento' . $id_dep . '()">  <strong>Fecha vencimiento: ' . date('d/m/Y', strtotime($fecha_venc)) . '</strong></h2>';
                        if ($id_usuarioclav == '40') {
                            echo '
<div id="fechaInput' . $id_dep . '" style="display:none;">
<input type="date" id="fecha_venc' . $id_dep . '" name="fecha_venc' . $id_dep . '"  class="form-control"  value="' . $fecha_venc . '" 
onchange="ajax_fechaven' . $id_dep . '($(' . $comilla . '#fecha_venc' . $id_dep . '' . $comilla . ').val())">
</div>';
                        }
                        echo '</div>';

                        if ($id_usuarioclav == '40') {
                            echo '
<div id="muestroorden7' . $id_dep . '"></div>
<script>
   function mostrarFechaVencimiento' . $id_dep . '() {
    var inputDiv' . $id_dep . ' = document.getElementById(' . $comilla . 'fechaInput' . $id_dep . '' . $comilla . ');
    inputDiv' . $id_dep . '.style.display = ' . $comilla . 'block' . $comilla . ';
} </script>
<script>

      function ajax_fechaven' . $id_dep . '(fecha_venc' . $id_dep . ') {
                                var parametros = {
                                    "fecha_venc": fecha_venc' . $id_dep . ',
                                    "id_pallet": ' . $id_dep . '
                                };
                                $.ajax({
                                    data: parametros,
                                    url: ' . $comilla . 'vencimientoar.php' . $comilla . ',
                                    type: ' . $comilla . 'POST' . $comilla . ',
                                    beforeSend: function() {
                                        $("#muestroorden7' . $id_dep . '").html(' . $comilla . '' . $comilla . ');
                                    },
                                    success: function(response) {
                                        $("#muestroorden7' . $id_dep . '").html(response);
                                    }
                                });
                            }
</script>

';
                        }
                    }
                    echo '<div class="text-center">
<img src="../deposito/estado' . $block . '.png" style="width: 100px;">' . $notca . '<br>';

                    if ($block == '0' || $id_usuarioclav == '40' || $id_usuarioclav == '93') {
                        echo '<a href="../deposito/checked.php?idproedit=' . $unidsx . '&id_pallet=' . $id_palletd . '&modbaja=0">
                    <button type="button" id="suminstr2" class="btn btn-primary" style="width: 100%;font-size: 20pt;">Mover Pallets' . $temporald . '</button>
                </a><br> <br>     <br> <br>  <a href="../deposito/checked.php?idproedit=' . $unidsx . '&id_pallet=' . $id_palletd . '&modbaja=1">
                    <button type="button" id="suminstr2" class="btn btn-danger" style="width: 100%;font-size: 20pt;">Dar de Baja Pallets' . $temporald . '</button>
                </a> <br> <br>     <br> <br> 
                    <a href="../deposito/checked.php?idproedit=' . $unidsx . '&id_pallet=' . $id_palletd . '&modbaja=3"> 
                    <button type="button" id="suminstr2" class="btn btn-dark" style="width: 100%;font-size: 20pt;">' . $nombreenca . ' ' . $temporald . '</button>
                 </a>
                
              
                ';
                    }
                    echo '</div>




<hr>   <br> <br>     <br> <br>     <br> <br>     <br> <br>     <br> <br>     <br> <br>
  </div>

                
                
                
                ';
                }



                ?>



                <br>


            </div>
        </div>

    </div>

    <br><br>


    <div class="container">
        <div class="btn-group" style="width: 100%;">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#lug1" style="width: 33%;">Lugares Libres</button>
            <button type="button" class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="#lug3" style="width: 33%;">Encarpados</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#lug2" style="width: 33%;">Lugares Ocupados</button>

        </div>
        <br> <br>

        <div id="lug1" class="collapse">
            <?php

            $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where fraccionar='0' ORDER BY `position` ASC");
            while ($rowrubros = mysqli_fetch_array($sqlrubros)) {

                $codigopalle = $rowrubros['codigo'];

                $sqwf = ${"sqwf" . $codigopalle};
                $rowod = ${"rowod" . $codigopalle};

                $sqwf = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$codigopalle'");
                if ($rowod = mysqli_fetch_array($sqwf)) {
                } else {
                    echo '
                                    
                                    <div class="alert alert-primary text-center">
                                    <strong>  ' . $rowrubros['nombre'] . '</strong> 
                                    </div>';
                }
            }
            ?>
        </div>




        <div id="lug2" class="collapse">
            <?php

            $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where fraccionar='0' ORDER BY `position` ASC");
            while ($rowrubros = mysqli_fetch_array($sqlrubros)) {

                $codigopalle = $rowrubros['codigo'];

                $sqwf = ${"sqwf" . $codigopalle};
                $rowod = ${"rowod" . $codigopalle};


                $sqwf = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$codigopalle'");
                $canverificafin = mysqli_num_rows($sqwf);
                if ($canverificafin != '0') {
                    echo '   <div class="alert alert-danger text-center">
                            <strong>  ' . $rowrubros['nombre'] . ' </strong>';
                    echo '(' . $canverificafin . ')';
                    while ($rowod = mysqli_fetch_array($sqwf)) {
                        echo '                                    
                            <br> <br>
                            <div class="alert alert-light">
                            ' . $rowod['nombre'] . ' <br>
                            Cod. ' . $rowod['id_pallet'] . '<br>
                                 <strong>Ingreso: ' . date('d/m/Y', strtotime($rowod['fecha_ing'])) . '</strong><br>
                                 <strong>Vencimiento: ' . date('d/m/Y', strtotime($rowod['fecha_venc'])) . '</strong>
 
                                 </div><img src="pallets.png" style="width: 100%; position:relative; top:-20px">
                                
                              ';
                    }

                    echo '  </div>';
                }
            }
            ?>
        </div>



        <div id="lug3" class="collapse">
            <?php

            $sqlsqlrubroserubros = mysqli_query($rjdhfbpqj, "SELECT * FROM coddeposi where fraccionar='0' ORDER BY `position` ASC");
            while ($rowrubrdos = mysqli_fetch_array($sqlsqlrubroserubros)) {

                $codigopalled = $rowrubrdos['codigo'];

                $sqdwf = ${"sqdwf" . $codigopalled};
                $rowodr = ${"rowodr" . $codigopalled};


                $sqdwf = mysqli_query($rjdhfbpqj, "SELECT * FROM deposito Where id_destino='$codigopalled' and encarpado='1'");
                $canverificafind = mysqli_num_rows($sqdwf);
                if ($canverificafind != '0') {
                    echo '   <div class="alert alert-dark text-center">
                            <strong>  ' . $rowrubrdos['nombre'] . ' </strong>';
                    echo '(' . $canverificafind . ')';
                    while ($rowodr = mysqli_fetch_array($sqdwf)) {
                        echo '                                    
                            <br> <br>
                            <div class="alert alert-light">
                            ' . $rowodr['nombre'] . ' <br>
                            Cod. ' . $rowodr['id_pallet'] . '<br>
                                 <strong>Ingreso: ' . date('d/m/Y', strtotime($rowodr['fecha_ing'])) . '</strong><br>
                                 <strong>Vencimiento: ' . date('d/m/Y', strtotime($rowodr['fecha_venc'])) . '</strong><br>
                                <strong style="color:red;">Encarpado: ' . date('d/m/Y', strtotime($rowodr['fecha_encar'])) . '</strong><br>
                                 </div><img src="pallets.png" style="width: 100%; position:relative; top:-20px">
                                
                              ';
                    }

                    echo '  </div>';
                }
            }
            ?>
        </div>







    </div>




    <? if (!empty($unidsx)) { ?>
        <br><br> <br><br>
        <div class="container" style="max-width: 360px;">
            <div class="row">
                <div class="col-12" style="padding-top: 10px;">
                    <a href="../deposito/ingreso.php?idproedit=<?= $unidsx ?>">
                        <button type="button" id="suminstr1" class="btn btn-secondary" style="width: 100%;height: 100px; font-size: 30pt;">Nuevo Ingreso</button>
                    </a>
                </div><br><br>
            <? } ?>
            <div class="container" style="padding-top: 10px;"><br><br>
                <a href="../deposito/verinfo.php">
                    <button type="button" id="suminstr1" class="btn btn-light" style="width: 100%;height: 100px; font-size: 20pt;">Ver Info Pallet</button>
                </a>
            </div><br><br>

            <div class="container" style="padding-top: 10px;"><br><br>
                <a href="../deposito/buscarubicacion.php">
                    <button type="button" id="suminstr1" class="btn btn-light" style="width: 100%;height: 100px; font-size: 20pt;">Ver Producto en ubicación</button>
                </a>
            </div>



            <br><br><br><br>


            <? if ($id_usuarioclav == '40') { ?><br><br><br><br>
                <div class="col-12" style="padding-top: 10px;">
                    <a href="../control/">
                        <button type="button" id="suminstr2" class="btn btn-dark" style="width: 100%;">Volver al panel de Control</button>
                    </a>
                </div>
            <? } ?>




            <br><br>
            <br><br>
            <? if (!empty($unidsx)) { ?>
                <div class="col-12" style="padding-top: 10px;">
                    <a href="../deposito/">
                        <button type="button" id="suminstr2" class="btn btn-danger" style="width: 100%;">Salir</button>
                    </a>
                </div>
            <? } ?>



            </div>
        </div>

        <?php if ($pikiusuario == 1) { ?>
            <div class="mt-5 p-4 text-center">
                <a href="../picking/"><button type="button"
                        class="btn btn-dark btn-xs btnGoToTop">Picking Pedidos</button></a><br><br>
            </div>
        <?php } ?>
        <div class="mt-5 p-4 text-center">
            <a href="../lusuarios/logincerrar.php">
                <button type="button" class="btn btn-secondary btn-xs btnGoToTop">Cerrar usuario</button>
            </a><br><br>
        </div>
        <script>
            function verificarPedido() {
                fetch('func_avisoorden')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("aviso-pedido").innerHTML = data;
                    })
                    .catch(error => console.error('Error al verificar el pedido:', error));
            }
            // Ejecutar al cargar la página
            verificarPedido();

            // Verificar cada 10 segundos
            setInterval(verificarPedido, 10000);
        </script>

</body>

</html>