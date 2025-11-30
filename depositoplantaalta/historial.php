<hr>
<?php
include('../funciones/funcZonas.php');
include('../control_stock/funcionStockSnot.php');
include('../funciones/func_presentacion.php');

//include('../funciones/funcUbicProd.php');
$fechats = strtotime($fechahoy);

$dayverr = date('w', $fechats);
if ($dayverr == '1') {
    $dianombrv = "Lunes";
    $descyendia = "5";
}
if ($dayverr == '2') {
    $dianombrv = "Martes";
    $descyendia = "1";
}
if ($dayverr == '3') {
    $dianombrv = "Miércoles";
    $descyendia = "1";
}
if ($dayverr == '4') {
    $dianombrv = "Jueves";
    $descyendia = "1";
}
if ($dayverr == '5') {
    $dianombrv = "Viernes";
    $descyendia = "1";
}
if ($dayverr == '6') {
    $dianombrv = "el Lunes";
    $descyendia = "3";
}

if ($dayverr == '7') {
    $dianombrv = "el Lunes";
    $descyendia = "4";
}

if ($dayverr == '0') {
    $dianombrv = "el Lunes";
    $descyendia = "4";
}


$nombreCarpeta = "$_SERVER[REQUEST_URI]";
if ($nombreCarpeta == "/preparacionpedidos/") {
    $botnom = "+";
    $urlpa = "/depositoplantaalta/?pan=1";
    $nosegui = "1";
} elseif ($nombreCarpeta == "/preparacionpedidos/index.php") {
    $botnom = "+";
    $urlpa = "/depositoplantaalta/?pan=1";
    $nosegui = "1";
} else {
    $botnom = "Volver al Panel";
    $urlpa = "/preparacionpedidos/";
    $nosegui = "0";
}

if ($_SESSION['tipo'] == "21") {
    $botnom = "Volver al Panel";
    $urlpa = "/envasadopb/";
    $nosegui = "0";
}

function salidascamDePa($rjdhfbpqj, $id_orden)
{


    $sqlhodja = mysqli_query($rjdhfbpqj, "SELECT id,id_hoja FROM orden WHERE id = '$id_orden'");
    if ($rowhdoja = mysqli_fetch_array($sqlhodja)) {
        $id_dhoja = $rowhdoja['id_hoja'];


        $sqlhoja = mysqli_query($rjdhfbpqj, "SELECT id,position,camioneta,fecha FROM hoja WHERE id = '$id_dhoja' and camioneta !='0'");
        if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
            $eoprioridadd = $rowhoja['position'];
            $fechahoja = $rowhoja['fecha'];

            $fechats = strtotime($fechahoja);
            $dayver = date('w', $fechats);

            switch ($dayver) {
                case 0:
                    $dianombr = "<b>Domingo</b>";
                    break;
                case 1:
                    $dianombr = "<b>Lunes</b>";
                    break;
                case 2:
                    $dianombr = "<b>Martes</b>";
                    break;
                case 3:
                    $dianombr = "<b>Miércoles</b>";
                    break;
                case 4:
                    $dianombr = "<b>Jueves</b>";
                    break;
                case 5:
                    $dianombr = "<b>Viernes</b>";
                    break;
                case 6:
                    $dianombr = "<b>Sábado</b>";
                    break;
                default:
                    $dianombr = "";
                    break;
            }
        } else {
            $eoprioridadd = '20';
        }

        ///orden
        if ($eoprioridadd > "20") {
            $eopriover = '';
        }
        if ($eoprioridadd == "1") {
            $eopriover = '<button type="button" class="btn btn-primary btn-sm">1ra Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "2") {
            $eopriover = '<button type="button" class="btn btn-success btn-sm"> 2da Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "3") {
            $eopriover = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "4") {

            $eopriover = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "5") {

            $eopriover = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "6") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "7") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 7ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "8") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 8ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "9") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 9ta Salida ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "10") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 10ta Salida ' . $dianombr . '</button>&nbsp;';
        }
    } else {
        $eopriover = '';
    }

    return $eopriover;
}
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container mt-3"><a style="cursor: pointer;" onclick="recargarPagina()" title="Actualizar Información">
        <i class="material-icons" style="font-size:36px">refresh</i></a>
    <h5>

        <? if ($_SESSION['tipo'] == "30" || $_SESSION['tipo'] == "31" ||  $_SESSION['tipo'] == "0" || empty($_SESSION['tipo']) || $id_usuarioclav == "40") { ?>
            <strong class="badge bg-primary" style="font-size: 20pt;">Deposito PA</strong><? } ?>
        <?php
        if ($tipo_usuario == "0" || $_SESSION['tipo'] == "31") {
            include('../depositoplantaalta/sin_stock.php');
        }


        if ($tipo_usuario == "0" || $_SESSION['tipo'] == "29") {
            include('../depositoplantaalta/resumen.php');
        }

        ?>

        <? if ($_SESSION['tipo'] == "30" || $_SESSION['tipo'] == "21") { ?>
            &nbsp;&nbsp; <a href="<?= $urlpa ?>"><button type="button" class="btn btn-primary" title="Agregar pedido para bajar productos/s"><?= $botnom ?></button></a>

        <? } ?>

    </h5>
    <?php
    if ($_SESSION['tipo'] == "0" || $_SESSION['tipo'] == "31" || $_SESSION['tipo'] == "29" || $id_usuarioclav == "40") {
        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesar = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where fechaentreg='$fechahoy' and  preparado='9' and  fin='1'");
        $canterenvar = mysqli_num_rows($sqlnxgeesar);

        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesar5 = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where fechaentreg='$fechahoy' and  preparado='5' and  fin='1'");
        $canterenvar5 = mysqli_num_rows($sqlnxgeesar5);

        $canterenvar = $canterenvar + $canterenvar5;


        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesa2r = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where  preparado ='0' and  fin='1'");
        $canterenva2r = mysqli_num_rows($sqlnxgeesa2r);


        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesa2rp = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where  preparado ='1' and  fin='1'");
        $canterenva2rp = mysqli_num_rows($sqlnxgeesa2rp);

        echo 'Pedidos&nbsp;terminados&nbsp;' . $canterenvar . ' preparando&nbsp;' . $canterenva2rp . ' en&nbsp;espera&nbsp;' . $canterenva2r . '';
    }
    ?>


    <div id="accordion">

        <?php


        /* $date = new DateTime($fechahoy);
$date->modify('-2 days'); // Resta 3 días
$nueva_fecha = $date->format('Y-m-d');  */

        //el ultimo dia que encuentro algo le descuento 2 dias
        $sqlnxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where   fin='1' and preparado < '5'  ORDER BY fecha ASC");
        if ($rowogd = mysqli_fetch_array($sqlnxg)) {
            $sumodiat = $rowogd['fecha'];
        } else {

            $sumodiat = $fechahoy;
        }




        $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where fecha >= '$sumodiat' and fin='1' $sqldep ORDER BY `preparado` ASC, id DESC");
        // $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where fecha = '$fechahoy' and fin='1' ORDER BY `id` DESC");


        while ($rowordenxgd = mysqli_fetch_array($sqlordenxg)) {

            $idorhisd = $rowordenxgd['id'];
            $horaentrega = $rowordenxgd['horaentrega'];
            $usuarioprp = $rowordenxgd['usuario'];
            $priover = ${"priover" . $rowordenxgd['id']};
            $prioridadd = $rowordenxgd['prioridad'];
            $oprioridadd = $rowordenxgd['ordenpedi'];
            $sectord = $rowordenxgd['sector'];


            if ($prioridadd == "1") {
                $priover = '<strong title="PRIORIDAD">🕓&nbsp; <img src="../assets/images/urgente.gif" style="position:relative; left:-5px; top:0px;height: 28px; width:auto;"></strong>';
            }

            $sqlordenrt = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar Where id_orden = '$idorhisd' $ordensalp");
            $canitem = mysqli_num_rows($sqlordenrt);

            $sqlordenrtr = mysqli_query($rjdhfbpqj, "SELECT * FROM itembajar Where id_orden = '$idorhisd' and listo='1' $ordensalp");
            $canitemr = mysqli_num_rows($sqlordenrtr);

            if ($_SESSION['tipo'] == "29") {
                $canitemd = "(P." . $canitem . ")";
            }

            /*  $porcentajef = ($canitemr / $canitem) * 100;
         $porcentaje = number_format($porcentajef, 0, '.', ','); */

            $numero = $rowordenxgd['numero'];
            $fechaor = $rowordenxgd['fecha'];
            $preparadodd = ${"preparadodd" . $idorhisd};
            $preparado = ${"preparado" . $idorhisd};
            $colorfr = ${"colorfr" . $idorhisd};
            $selea = ${"selea" . $idorhisd};
            $seleb = ${"seleb" . $idorhisd};
            $selec = ${"selec" . $idorhisd};
            $seled = ${"seled" . $idorhisd};
            $selee = ${"selee" . $idorhisd};

            $selepria = ${"selepria" . $idorhisd};
            $seleprib = ${"seleprib" . $idorhisd};
            $selepric = ${"selepric" . $idorhisd};
            $seleprid = ${"seleprid" . $idorhisd};

            $oselepria = ${"oselepria" . $idorhisd};
            $oseleprib = ${"oseleprib" . $idorhisd};
            $oselepric = ${"oselepric" . $idorhisd};
            $oseleprid = ${"oseleprid" . $idorhisd};
            $oseleprie = ${"oseleprie" . $idorhisd};
            $oseleprif = ${"oseleprif" . $idorhisd};
            $oseleprig = ${"oseleprig" . $idorhisd};

            $pretiti = ${"pretiti" . $idorhisd};
            $tardo = ${"tardo" . $idorhisd};
            //$sectord = ${"sector".$idorhisd};
            $sectorver = ${"sectorver" . $idorhisd};
            $gifala = ${"gifala" . $idorhisd};
            $preparadodd = $rowordenxgd['preparado'];

            if ($sectord == "21") {
                $sectorver = '<div class="bg-success" style="width:100%; padding-left:10px; color:white;"><strong>ENVASADO PB</strong></div>';
            } else {
                $sectorver = '';
            }

            if ($preparadodd == "0") {
                $preparado = "En&nbsp;espera";
                $selea = "selected";
                $colorfr = 'style="background-color: #F7560B; cursor: pointer;';
                $pretiti = "";
                $gifala = ' <img src="../assets/images/alarmab.gif" style="position:relative; left:-5px; top:0px;height: 28px; width:auto;">';
            }
            if ($preparadodd == "1") {
                $preparado = "Prep.";
                $seleb = "selected";
                $colorfr = 'style="background-color: #F7CC0B; cursor: pointer;';
                $pretiti = "containerr" . $idorhisd;
                $gifala = '';
            }
            //if($preparadodd=="2"){$preparado="Completado"; $selec="selected"; $colorfr='style="background-color: #9EF70B; cursor: pointer;'; $pretiti="";}
            if ($preparadodd == "9") {
                $preparado = "Entregado";
                $selec = "selected";
                $colorfr = 'style="background-color: #9EF70B; cursor: pointer;';
                $pretiti = "";
                $gifala = '';
            }
            if ($preparadodd == "99") {
                $preparado = "Anulado";
                $seled = "selected";
                $colorfr = 'style="background-color: #7A7978; cursor: pointer;';
                $pretiti = "";
                $gifala = '';
            }
            if ($preparadodd == "4") {
                $preparado = "Esperando&nbsp;Productos!!";
                $seled = "selected";
                $colorfr = 'style="background-color: #D565F5; cursor: pointer;';
                $pretiti = "";
                $gifala = '';
            }
            if ($preparadodd == "5") {
                $preparado = "Entregado con faltantes!!";
                $selee = "selected";
                $colorfr = 'style="background-color: #658CF5; cursor: pointer;';
                $pretiti = "";
                $gifala = '';
            }


            ///prioridad
            if ($prioridadd == "0") {
                $selepria = "selected";
            }
            if ($prioridadd == "1") {
                $seleprib = "selected";
            }
            if ($prioridadd == "2") {
                $selepric = "selected";
            }
            if ($prioridadd == "3") {
                $seleprid = "selected";
            }

            ///orden
            if ($oprioridadd == "0") {
                $oselepria = "selected";
            }
            if ($oprioridadd == "1") {
                $oseleprib = "selected";
            }
            if ($oprioridadd == "2") {
                $oselepric = "selected";
            }
            if ($oprioridadd == "3") {
                $oseleprid = "selected";
            }
            if ($oprioridadd == "4") {
                $oseleprie = "selected";
            }
            if ($oprioridadd == "5") {
                $oseleprif = "selected";
            }
            if ($oprioridadd == "6") {
                $oseleprig = "selected";
            }

            /*       if ($oprioridadd == "0") {
                $opriover = '';
            }
            if ($oprioridadd == "1") {
                $opriover = '<button type="button" class="btn btn-primary btn-sm">1ra Salida</button>&nbsp;';
            }
            if ($oprioridadd == "2") {
                $opriover = '<button type="button" class="btn btn-success btn-sm"> 2da Salida</button>&nbsp;';
            }
            if ($oprioridadd == "3") {
                $opriover = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida</button>&nbsp;';
            }
            if ($oprioridadd == "4") {
                $opriover = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida</button>&nbsp;';
            }
            if ($oprioridadd == "5") {
                $opriover = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida</button>&nbsp;';
            }
            if ($oprioridadd == "6") {
                $opriover = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida</button>&nbsp;';
            } */

            $opriover = salidascamDePa($rjdhfbpqj, $numero);


            if ($prioridadd == "2") {
                $priover = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;"><strong>
            ' . $gifala . 'CAMINONETA EN LA PUERTA!!</strong></div>';
            }
            if ($prioridadd == "3") {
                $priover = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;">
            ' . $gifala . '<strong>CLIENTE EN LA PUERTA!!</strong></div>';
            }






            $comilla = "'";
            //calculo el tiempo

            $iniciotiem = ${"iniciotiem" . $idorhisd};
            $fintoem = ${"fintoem" . $idorhisd};
            $inicio = ${"inicio" . $idorhisd};
            $fin = ${"fin" . $idorhisd};
            $diferencia = ${"diferencia" . $idorhisd};
            $horas = ${"horas" . $idorhisd};
            $minutos = ${"minutos" . $idorhisd};
            $hosver = ${"hosver" . $idorhisd};
            $tardo = ${"tardo" . $idorhisd};

            $iniciotiem = $rowordenxgd['fecha'] . " " . $rowordenxgd['hora'];
            $fintoem = $rowordenxgd['fechaentreg'] . " " . $rowordenxgd['horaentrega'];

            $inicio = strtotime("$iniciotiem");
            $fin = strtotime("$fintoem");

            $diferencia = $fin - $inicio;

            $horas = floor($diferencia / 3600);
            $minutos = floor(($diferencia % 3600) / 60);

            if (($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' && $tipo_usuario != '30' && $tipo_usuario != '21') && ($preparadodd == '9' || $preparadodd == '5')) {

                if ($horas > 0) {
                    $hosver = $horas . ":";
                }

                $tardo = "<br>Cerrado <strong>" . $rowordenxgd['horaentrega'] . "</strong> se tardó  " . $hosver . $minutos . " minutos.";
            } else {
                if ($id_usuarioclav == "40") {
                    $tardo = "<br>Cerrado <strong>" . $rowordenxgd['horaentrega'] . "</strong> se tardó  " . $hosver . $minutos . " minutos.";
                } else {
                    $tardo = '';
                }
            }


            if ($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' &&  $tipo_usuario != '30' && $tipo_usuario != '21') {

                $porcentajef = ($canitemr / $canitem) * 100;
                $porcentaje = number_format($porcentajef, 0, '.', ',') . "%";
            } else {
                if ($id_usuarioclav == "40") {
                    $porcentajef = ($canitemr / $canitem) * 100;
                    $porcentaje = number_format($porcentajef, 0, '.', ',') . "%";
                } else {
                    $porcentaje = '';
                }
            }









            echo ' <div class="card">
        <div class="card-header ' . $pretiti . '" ' . $colorfr . '>
        <a class="btn" data-bs-toggle="collapse" href="#collapse' . $idorhisd . '">' . $sectorver . '
        <strong> ' . $canitemd . '</strong> ' . date('d/m', strtotime($rowordenxgd['fecha'])) . ' Hs.' . $rowordenxgd['hora'] . ' | ' . $priover . ' ' . $opriover . '<strong>Pedido Nº ' . $numero . '
        
        ' . NombreZonaOrden($rjdhfbpqj, $numero) . '
        
        </strong>
        ' . $tardo . '
        </a>';
            /*  if($_GET['1']=='1'){
        echo'  <select name="preparado'.$rowordenxgd['id'].'" id="preparado'.$rowordenxgd['id'].'" class="form-select" onchange="ajax_seguimiento'.$rowordenxgd['id'].'($('.$comilla.'#preparado'.$rowordenxgd['id'].''.$comilla.').val());">
        <option value="0" '.$selea.'>En espera.</option>
        <option value="1" '.$seleb.'>En preparación.</option>
        <option value="2" '.$selec.'>Completado.</option>
        <option value="3" '.$seled.'>Anulado.</option>
    </select>';
        }else{echo '&nbsp;&nbsp;&nbsp;'.$preparado.'';}'.$horaentrega.' */
            echo '&nbsp;&nbsp;&nbsp;' . $preparado . ' ' . $usuarioprp . ' ' . $porcentaje . '</div>
    <div id="collapse' . $idorhisd . '" class="collapse" data-bs-parent="#accordion" >
        ';


            echo '
<script>
        function ajax_seguimiento' . $rowordenxgd['id'] . '(preparado' . $rowordenxgd['id'] . ') {
            var parametros = {
                "preparado": preparado' . $rowordenxgd['id'] . ',
                "iditem": ' . $rowordenxgd['id'] . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comilla . 'seguimiento.php' . $comilla . ',
                type: ' . $comilla . 'POST' . $comilla . ',
                beforeSend: function() {
                    $("#muestroorden3' . $rowordenxgd['id'] . '").html(' . $comilla . '' . $comilla . ');
                },
                success: function(response) {
                    $("#muestroorden3' . $rowordenxgd['id'] . '").html(response);
                }
            });
        }
    </script>';

            if ($preparadodd == "1") {
                echo ' <script>
    function titilarBackground() {
        var containerr' . $rowordenxgd['id'] . ' = document.querySelector(' . $comilla . '.containerr' . $rowordenxgd['id'] . '' . $comilla . ');
    
        var intervalo = setInterval(function() {
            var colorActual = window.getComputedStyle(containerr' . $rowordenxgd['id'] . ').backgroundColor;
            containerr' . $rowordenxgd['id'] . '.style.backgroundColor = (colorActual === ' . $comilla . 'rgb(247, 204, 11)' . $comilla . ') ? ' . $comilla . '#F5E465' . $comilla . ' : ' . $comilla . '#F7CC0B' . $comilla . ';
        }, ' . $tit . ');
    
        setTimeout(function() {
            clearInterval(intervalo);
            containerr' . $rowordenxgd['id'] . '.style.backgroundColor = ' . $comilla . '#F7CC0B' . $comilla . '; 
        }, 5000000); 
    }
    
    titilarBackground();
    
    
    </script>';
            }

            echo '

    <div id="muestroorden3' . $rowordenxgd['id'] . '"> </div>
  
';



        ?>

            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">Producto</th>

                            <th class="text-center" style="width: 20mm;">Cantidad</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT id,cantidad,producto,unidad,listo,sinstock,id_producto,numero FROM itembajar Where id_orden = '$idorhisd' $ordensalp");
                        while ($rowordentd = mysqli_fetch_array($sqlordenr)) {


                            $listod = ${"listo" . $rowordentd['listo']};
                            $sinstockd = ${"sinstockd" . $rowordentd['listo']};
                            $finsver = ${"finsver" . $rowordentd['listo']};
                            $listod = $rowordentd['listo'];
                            $sinstockd = $rowordentd['sinstock'];
                            $id_producto = $rowordentd['id_producto'];
                            $idpediddo = $rowordentd['numero'];
                            // $vecimienvser = funcvencimiProd($rjdhfbpqj, $id_producto, $idpediddo);

                            //nuevo css
                            if ($listod == "1" && $sinstockd == "0") {

                                echo '  <style>
                    #itempedvd' . $rowordentd['id'] . ' {
                        text-decoration: line-through;
                        cursor: pointer;
                        color: inherit;
                        user-select: none; 
                        color : red;
                        font-style: normal;

                    }
                    </style>';

                                $fonverde = '';
                            }
                            if ($listod == "1" && $sinstockd == "1") {

                                $finsver = '<span class="badge bg-danger">Sin Stock</span> ';
                                $fonverde = ' background-color: #00ff00; ';

                                echo '

                    
                    <style>
                    #itempedvd' . $rowordentd['id'] . ' {
                        text-decoration: line-through;
                        cursor: pointer;
                        color: inherit;
                        user-select: none; 
                        color : grey;
                        font-style: italic;


                    }
                    </style>';
                            }

                            if ($listod == "0" && $sinstockd == "0") {

                                echo '

                
                <style>
                #itempedvd' . $rowordentd['id'] . ' {
                    text-decoration: none;
                    cursor: pointer;
                    color: inherit;
                    user-select: none;
                    font-style: normal; 

                }
                </style>';
                                $fonverde = '';
                            }
                            //fin array('presentacion' => $presentacion, 'NombreBulto' => $NombreBulto, 'NombreUnidad' => $NombreUnidad);
                            $modo_productod = $roworden["modo_producto"];
                            $presentaciondet = funcPresenatcion($rjdhfbpqj, $id_producto);
                            $presentacion = $presentaciondet['presentacion'];
                            $NombreBulto = $presentaciondet['NombreBulto'];
                            $NombreUnidad = $presentaciondet['NombreUnidad'];
                            $stockdispom = SumaStock($rjdhfbpqj, $id_producto);
                            $stokbulto = $stockdispom / $presentacion;
                            $stokbulto = explode(".", $stokbulto);
                            echo '
                
                <tr id="itempedvd' . $rowordentd['id'] . '">
                <td  style="padding-left: 2mm; ' . $fonverde . '">' . $finsver . '' . $rowordentd['producto'] . '';

                            if ($stockdispom > '0') {
                                echo '<p style="color:grey">[Stock: ' . $stockdispom . ' ' . $NombreUnidad . ' / ' . $stokbulto[0] . ' ' . $NombreBulto . ']</p>';
                                /*  echo '<p style="color:grey">[Stock: ' . $stockdispom . ' ' . $NombreUnidad . ' / ' . $stokbulto[0] . ' ' . $NombreBulto . '] - Venc.' . $vecimienvser . '</p>'; */
                            } else {
                                echo '<p style="color:red">[Sin Stock]</p>';
                            }


                            //  $ubicanom=ubicacionpro($rjdhfbpqj,$id_producto);
                            echo '</td>
              
                <td class="text-center" style="place-items: center; ' . $fonverde . '">' . $rowordentd['cantidad'] . ' ' . $rowordentd['unidad'] . '</td>
                
                 </tr>
                
                ';
                        }

                        ?>

                        <br>
                    </tbody>
                </table>

                <?php

                if ($tipo_usuario == "29" || $tipo_usuario == "30" && $nosegui == "0") {
                    echo '  <select name="preparado' . $rowordenxgd['id'] . '" id="preparado' . $rowordenxgd['id'] . '" class="form-select" onchange="ajax_seguimiento' . $rowordenxgd['id'] . '($(' . $comilla . '#preparado' . $rowordenxgd['id'] . '' . $comilla . ').val());">
        <option value="0" ' . $selea . '>En espera.</option>
        <option value="1" ' . $seleb . '>En preparación.</option>
        <option value="9" ' . $selec . '>Entregado.</option>
        <option value="99" ' . $seled . '>Anulado.</option>
        <option value="5" ' . $selee . '>Entregado con faltantes.</option>
       
    </select>';
                    if ($tipo_usuario == "30") {
                        echo '<br><a href="../depositoplantaalta/printorden.php?hist=1&id_orden=' . $idorhisd . '" target="_parent"> <button type="button" class="btn btn-dark">Imprimir  Orden</button></a>';
                    }
                } else {
                    /* aca pongo prioridades */

                    if ($tipo_usuario == '31' || $tipo_usuario == '30') {
                        echo ' <br> <select name="prioridad' . $rowordenxgd['id'] . '" id="prioridad' . $rowordenxgd['id'] . '" class="form-select" 
                onchange="ajax_prioridad' . $rowordenxgd['id'] . '($(' . $comilla . '#prioridad' . $rowordenxgd['id'] . '' . $comilla . ').val());">

                <option value="0" ' . $selepria . '>Elegir Prioridad...</option>
                <option value="0" ' . $selepria . '>Sin Prioridad</option>
                <option value="1" ' . $seleprib . '>Con Prioridad</option>
                <option value="2" ' . $selepric . '>Camioneta en la Puerta</option>
                <option value="3" ' . $seleprid . '>Cliente en la Puerta.</option>
               
            </select>
            <br> <select name="ordenpedi' . $rowordenxgd['id'] . '" id="ordenpedi' . $rowordenxgd['id'] . '" class="form-select" 
            onchange="ajax_ordenpedi' . $rowordenxgd['id'] . '($(' . $comilla . '#ordenpedi' . $rowordenxgd['id'] . '' . $comilla . ').val());">

            <option value="0" ' . $oselepria . '>Elegir Orden...</option>
            <option value="0" ' . $oselepria . '>Sin Orden</option>
            <option value="1" ' . $oseleprib . '>1ra Salida</option>
            <option value="2" ' . $oselepric . '>2da Salida</option>
            <option value="3" ' . $oseleprid . '>3ra Salida</option>
            <option value="4" ' . $oseleprie . '>4ta Salida</option>
            <option value="5" ' . $oseleprif . '>5ta Salida</option>
            <option value="6" ' . $oseleprig . '>6ta Salida</option>
           
        </select>
            
            
<script>
function ajax_prioridad' . $rowordenxgd['id'] . '(prioridad' . $rowordenxgd['id'] . ') {
   
        var parametros = {
            "prioridad": prioridad' . $rowordenxgd['id'] . ',
            "id_orden": ' . $rowordenxgd['id'] . ',
        };
        $.ajax({
            data: parametros,
            url: ' . $comilla . '../control/prioridad.php' . $comilla . ',
            type: ' . $comilla . 'POST' . $comilla . ',
            beforeSend: function() {
                $("#muestroordenpt' . $rowordenxgd['id'] . '").html(' . $comilla . '' . $comilla . ');
            },
            success: function(response) {
                $("#muestroordenpt' . $rowordenxgd['id'] . '").html(response);
            }
        });
   
}

function ajax_ordenpedi' . $rowordenxgd['id'] . '(ordenpedi' . $rowordenxgd['id'] . ') {
   
    var parametros = {
        "ordenpedi": ordenpedi' . $rowordenxgd['id'] . ',
        "id_orden": ' . $rowordenxgd['id'] . ',
    };
    $.ajax({
        data: parametros,
        url: ' . $comilla . '../control/ordenpedi.php' . $comilla . ',
        type: ' . $comilla . 'POST' . $comilla . ',
        beforeSend: function() {
            $("#muestroordenpto' . $rowordenxgd['id'] . '").html(' . $comilla . '' . $comilla . ');
        },
        success: function(response) {
            $("#muestroordenpto' . $rowordenxgd['id'] . '").html(response);
        }
    });

}
</script>
            
           <div id="muestroordenpt' . $rowordenxgd['id'] . '"></div> 
           <div id="muestroordenpto' . $rowordenxgd['id'] . '"></div> 
            
            
            
            ';
                    }
                }

                ?>
            </div>
    </div>
</div>
<?php

        }

?>


</div>
<br><br>
</div>

<!-- <script>
 <option value="4" '.$seled.'>Esperando Productos.</option>
        <option value="5" '.$selee.'>Esperando Envasado.</option>
 -->