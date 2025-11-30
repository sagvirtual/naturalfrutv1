<hr>
<?php


function salidascamEnPb($rjdhfbpqj, $id_orden)
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


function NombreZonaOrdenpb($rjdhfbpqj, $id_orden)
{
    $sql = "
        SELECT 
            z.nombre AS nombre_zona
        FROM 
            orden o
        INNER JOIN 
            clientes c ON o.id_cliente = c.id
        INNER JOIN 
            zona z ON c.zona = z.id
        WHERE 
            o.id = '$id_orden'
    ";

    $resultado = mysqli_query($rjdhfbpqj, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        return " (" . $fila['nombre_zona'] . ")";
    } else {
        return null; // Si no se encuentra el registro
    }
}

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
    $urlpa = "/envasadopb/?pan=1";
    $nosegui = "1";
} elseif ($nombreCarpeta == "/preparacionpedidos/index.php") {
    $botnom = "+";
    $urlpa = "/envasadopb/?pan=1";
    $nosegui = "1";
} else {
    $botnom = "Volver al Panel";
    $urlpa = "/preparacionpedidos/";
    $nosegui = "0";
}

?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container mt-3"><a style="cursor: pointer;" onclick="recargarPagina()" title="Actualizar Información">
        <i class="material-icons" style="font-size:36px">refresh</i></a>
    <h5>




        <? if ($_SESSION['tipo'] == "30" || $_SESSION['tipo'] == "31" || $_SESSION['tipo'] == "0" || empty($_SESSION['tipo'])) { ?> <strong class="badge bg-Success" style="font-size: 20pt;">Envasado PB</strong>
        <? } ?>

        <? if ($_SESSION['tipo'] == "30") { ?>
            &nbsp;&nbsp; <a href="<?= $urlpa ?>"><button type="button" class="btn btn-success" title="Agregar pedido para Envasado"><?= $botnom ?></button></a>

        <? } ?>
        <?php

        if ($tipo_usuario == "0" || $_SESSION['tipo'] == "21") {
            include('../envasadopb/resumen.php');
        }

        ?>


    </h5>
    <?php
    if ($_SESSION['tipo'] == "0" || $_SESSION['tipo'] == "21" || $_SESSION['tipo'] == "31" || $id_usuarioclav == "40") {
        /* calculo cuantas hordenes se isieron */
        $sqlnxgees = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where fechaentreg='$fechahoy' and  preparado='9' and  fin='1'");
        $canterenv = mysqli_num_rows($sqlnxgees);

        /* calculo cuantas hordenes se isieron */
        $sqlnxgees2 = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where fin='1' and (preparado='0' or preparado = '4' or preparado = '5' or preparado = '6') ");
        $canterenv2 = mysqli_num_rows($sqlnxgees2);

        /* calculo cuantas hordenes se isieron */
        $sqlnxgees2s = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where preparado='1' and  fin='1'");
        $canterenv2s = mysqli_num_rows($sqlnxgees2s);

        echo 'Pedidos terminados&nbsp;' . $canterenv . ' preparando&nbsp;' . $canterenv2s . ' en&nbsp;espera&nbsp;' . $canterenv2 . '';
    }
    ?>


    <div id="accordion">
        <?php

        /* $date = new DateTime($fechahoy);
$date->modify('-3 days'); // Resta 3 días
$nueva_fecha = $date->format('Y-m-d');  */

        //el ultimo dia que encuentro algo le descuento 2 dias
        $sqlnxge = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where fin='1' and preparado < '9'  ORDER BY fecha ASC");
        if ($rowogde = mysqli_fetch_array($sqlnxge)) {
            $sumodiae = $rowogde['fecha'];
        } else {
            $sumodiae = $fechahoy;
        }





        $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where fecha >= '$sumodiae' and fin='1' $sqldep ORDER BY `preparado` ASC, id DESC");
        // $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where fecha = '$fechahoy' and fin='1' ORDER BY `id` DESC");


        while ($rowordenxg = mysqli_fetch_array($sqlordenxg)) {

            $idorhis = $rowordenxg['id'];
            $horaentrega = $rowordenxg['horaentrega'];
            $usuarioprp = $rowordenxg['usuario'];
            $priovere = ${"priovere" . $rowordenxg['id']};
            $prioridad = $rowordenxg['prioridad'];
            $eoprioridadd = $rowordenxg['ordenpedi'];




            if ($prioridad == "1") {
                $priovere = '<strong title="PRIORIDAD">🕓 </strong>';
            }

            $sqlordenrt = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where id_orden = '$idorhis'");
            $canitem = mysqli_num_rows($sqlordenrt);

            $sqlordenrtr = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where id_orden = '$idorhis' and listo='1'");
            $canitemr = mysqli_num_rows($sqlordenrtr);

            if ($_SESSION['tipo'] == "21") {
                $canitemd = "(P." . $canitem . ")";
            }

            /*  $porcentajef = ($canitemr / $canitem) * 100;
         $porcentaje = number_format($porcentajef, 0, '.', ','); */

            $numero = $rowordenxg['numero'];
            $fechaor = $rowordenxg['fecha'];
            $preparadodde = ${"preparadodde" . $idorhis};
            $preparadodde = $rowordenxg['preparado'];
            $preparado = ${"preparado" . $idorhis};
            $colorfr = ${"colorfr" . $idorhis};
            $selea = ${"selea" . $idorhis};
            $seleb = ${"seleb" . $idorhis};
            $selec = ${"selec" . $idorhis};
            $seled = ${"seled" . $idorhis};
            $selee = ${"selee" . $idorhis};
            $selef = ${"selef" . $idorhis};
            $pretiti = ${"pretiti" . $idorhis};

            $selepriae = ${"selepriae" . $idorhis};
            $selepribe = ${"selepribe" . $idorhis};
            $seleprice = ${"seleprice" . $idorhis};
            $selepride = ${"selepride" . $idorhis};

            $eoselepria = ${"eoselepria" . $idorhis};
            $eoseleprib = ${"eoseleprib" . $idorhis};
            $eoselepric = ${"eoselepric" . $idorhis};
            $eoseleprid = ${"eoseleprid" . $idorhis};
            $eoseleprie = ${"eoseleprie" . $idorhis};
            $eoseleprif = ${"eoseleprif" . $idorhis};
            $eoseleprig = ${"eoseleprig" . $idorhis};

            $gifalae = ${"gifalae" . $idorhis};


            if ($preparadodde == "0") {
                $preparado = "En&nbsp;espera";
                $selea = "selected";
                $colorfr = 'style="background-color: #F7560B; cursor: pointer;';
                $pretiti = "";
                $gifalae = ' <img src="../assets/images/alarmab.gif" style="position:relative; left:-5px; top:0px;height: 28px; width:auto;">';
            }
            if ($preparadodde == "1") {
                $preparado = "Prep.";
                $seleb = "selected";
                $colorfr = 'style="background-color: #F7CC0B; cursor: pointer;';
                $pretiti = "containerr" . $idorhis;
                $gifalae = '';
            }
            //if($preparadodde=="2"){$preparado="Completado"; $selec="selected"; $colorfr='style="background-color: #9EF70B; cursor: pointer;'; $pretiti="";}
            if ($preparadodde == "9") {
                $preparado = "Completado";
                $selec = "selected";
                $colorfr = 'style="background-color: #9EF70B; cursor: pointer;';
                $pretiti = "";
                $gifalae = '';
            }
            if ($preparadodde == "99") {
                $preparado = "Anulado";
                $seled = "selected";
                $colorfr = 'style="background-color: #7A7978; cursor: pointer;';
                $pretiti = "";
                $gifalae = '';
            }
            if ($preparadodde == "4") {
                $preparado = "Esperando&nbsp;Producto/s Deposito!! " . $usuarioprp;
                $seled = "selected";
                $colorfr = 'style="background-color: #D565F5; cursor: pointer;';
                $pretiti = "";
                $gifalae = '';
            }
            if ($preparadodde == "5") {
                $preparado = "Esperando&nbsp;Envasado de PA!! " . $usuarioprp;
                $selee = "selected";
                $colorfr = 'style="background-color: #658CF5; cursor: pointer;';
                $pretiti = "";
                $gifalae = '';
            }
            if ($preparadodde == "6") {
                $preparado = "Esperando&nbsp;Producto/s Planta Baja !!.$usuarioprp";
                $selef = "selected";
                $colorfr = 'style="background-color: #06FFFF; cursor: pointer;';
                $pretiti = "";
                $gifalae = '';
            }




            ///prioridad
            if ($prioridad == "0") {
                $selepriae = "selected";
            }
            if ($prioridad == "1") {
                $selepribe = "selected";
            }
            if ($prioridad == "2") {
                $seleprice = "selected";
            }
            if ($prioridad == "3") {
                $selepride = "selected";
            }



            ///orden
            if ($eoprioridadd == "0") {
                $eoselepria = "selected";
                // $eopriover = '';
            }
            if ($eoprioridadd == "1") {
                $eoseleprib = "selected";
                //  $eopriover = '<button type="button" class="btn btn-primary btn-sm">1ra Salida</button>&nbsp;';
            }
            if ($eoprioridadd == "2") {
                $eoselepric = "selected";
                // $eopriover = '<button type="button" class="btn btn-success btn-sm"> 2da Salida</button>&nbsp;';
            }
            if ($eoprioridadd == "3") {
                $eoseleprid = "selected";
                // $eopriover = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida</button>&nbsp;';
            }
            if ($eoprioridadd == "4") {
                $eoseleprie = "selected";
                // $eopriover = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida</button>&nbsp;';
            }
            if ($eoprioridadd == "5") {
                $eoseleprif = "selected";
                //$eopriover = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida</button>&nbsp;';
            }
            if ($eoprioridadd == "6") {
                $eoseleprig = "selected";
                // $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida</button>&nbsp;';
            }

            $eopriover = salidascamEnPb($rjdhfbpqj, $numero);

            if ($prioridad == "2") {
                $priovere = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;"><strong>
            ' . $gifalae . 'CAMINONETA EN LA PUERTA!!</strong></div>';
            }
            if ($prioridad == "3") {
                $priovere = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;">
            ' . $gifalae . '<strong>CLIENTE EN LA PUERTA!!</strong></div>';
            }






            $comilla = "'";

            $iniciotieme = ${"iniciotieme" . $idorhisd};
            $fintoeme = ${"fintoeme" . $idorhisd};
            $inicioe = ${"inicioe" . $idorhisd};
            $fine = ${"fine" . $idorhisd};
            $diferenciae = ${"diferenciae" . $idorhisd};
            $horase = ${"horase" . $idorhisd};
            $minutose = ${"minutose" . $idorhisd};
            $hosvere = ${"hosvere" . $idorhisd};
            $tardoe = ${"tardoe" . $idorhisd};

            $iniciotieme = $rowordenxg['fecha'] . " " . $rowordenxg['hora'];
            $fintoeme = $rowordenxg['fechaentreg'] . " " . $rowordenxg['horaentrega'];

            $inicioe = strtotime("$iniciotieme");
            $fine = strtotime("$fintoeme");

            $diferenciae = $fine - $inicioe;

            $horase = floor($diferenciae / 3600);
            $minutose = floor(($diferenciae % 3600) / 60);

            if (($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' && $tipo_usuario != '30' && $tipo_usuario != '21') && $preparadodde == '9') {

                if ($horase > 0) {
                    $hosvere = $horase . ":";
                }

                $tardoe = "<br>Cerrado <strong>" . $rowordenxg['horaentrega'] . "</strong> Se tardó  " . $hosvere . $minutose . " minutos.";
            } else {
                $tardoe = '';
            }


            if (($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' &&  $tipo_usuario != '30' && $tipo_usuario != '21')) {

                $porcentajef = ($canitemr / $canitem) * 100;
                $porcentaje = number_format($porcentajef, 0, '.', ',') . "%";
            } else {
                $porcentaje = '';
            }

            if ($preparadodde == "5" || $preparadodde == "4" || $preparadodde == "6") {
                $usuarioprp = "";
                $porcentaje = "";
            }

            echo ' <div class="card">
        <div class="card-header ' . $pretiti . '" ' . $colorfr . '>
        <a class="btn" data-bs-toggle="collapse" href="#collapse' . $idorhis . '">
           ' . $canitemd . ' ' . date('d/m', strtotime($rowordenxg['fecha'])) . ' Hs.' . $rowordenxg['hora'] . ' | ' . $priovere . ' ' . $eopriover . '<strong>Pedido Nº ' . $numero . '
           
           ' . NombreZonaOrdenpb($rjdhfbpqj, $numero) . '
           </strong> 
        </a>';
            /*  if($_GET['1']=='1'){
        echo'  <select name="preparado'.$rowordenxg['id'].'" id="preparado'.$rowordenxg['id'].'" class="form-select" onchange="ajax_seguimiento'.$rowordenxg['id'].'($('.$comilla.'#preparado'.$rowordenxg['id'].''.$comilla.').val());">
        <option value="0" '.$selea.'>En espera.</option>
        <option value="1" '.$seleb.'>En preparación.</option>
        <option value="2" '.$selec.'>Completado.</option>
        <option value="3" '.$seled.'>Anulado.</option>
    </select>';
        }else{echo '&nbsp;&nbsp;&nbsp;'.$preparado.'';}'.$horaentrega.' */
            echo '&nbsp;&nbsp;&nbsp;' . $preparado . ' ' . $usuarioprp . ' ' . $porcentaje . ' ' . $tardoe . '</div>
    <div id="collapse' . $idorhis . '" class="collapse" data-bs-parent="#accordion" >
        ';


            echo '
<script>
        function ajax_seguimiento' . $rowordenxg['id'] . '(preparado' . $rowordenxg['id'] . ') {
            var parametros = {
                "preparado": preparado' . $rowordenxg['id'] . ',
                "iditem": ' . $rowordenxg['id'] . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comilla . 'seguimiento.php' . $comilla . ',
                type: ' . $comilla . 'POST' . $comilla . ',
                beforeSend: function() {
                    $("#muestroorden3' . $rowordenxg['id'] . '").html(' . $comilla . '' . $comilla . ');
                },
                success: function(response) {
                    $("#muestroorden3' . $rowordenxg['id'] . '").html(response);
                }
            });
            
        }
    </script>';

            if ($preparadodde == "1") {
                echo ' <script>
    function titilarBackground() {
        var containerr' . $rowordenxg['id'] . ' = document.querySelector(' . $comilla . '.containerr' . $rowordenxg['id'] . '' . $comilla . ');
    
        var intervalo = setInterval(function() {
            var colorActual = window.getComputedStyle(containerr' . $rowordenxg['id'] . ').backgroundColor;
            containerr' . $rowordenxg['id'] . '.style.backgroundColor = (colorActual === ' . $comilla . 'rgb(247, 204, 11)' . $comilla . ') ? ' . $comilla . '#F5E465' . $comilla . ' : ' . $comilla . '#F7CC0B' . $comilla . ';
        }, ' . $tit . ');
    
        setTimeout(function() {
            clearInterval(intervalo);
            containerr' . $rowordenxg['id'] . '.style.backgroundColor = ' . $comilla . '#F7CC0B' . $comilla . '; 
        }, 5000000); 
    }
    
    titilarBackground();
    
    
    </script>';
            }

            echo '

    <div id="muestroorden3' . $rowordenxg['id'] . '"> </div>
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

                        $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where id_orden = '$idorhis' ");
                        while ($rowordent = mysqli_fetch_array($sqlordenr)) {


                            $listo = ${"listo" . $rowordent['listo']};
                            $listo = $rowordent['listo'];
                            $verunid = $rowordent['unidad'];
                            if ($verunid != 'Kg.' && $verunid != 'Uni.') {

                                $colorave = "background-color: red;";
                            } else {
                                $colorave = "";
                            }
                            if ($listo == "1") {

                                echo '  <style>
                        #itempedv' . $rowordent['id'] . ' {
                            text-decoration: line-through;
                            cursor: pointer;
                            color: inherit;
                            user-select: none; 
                            color : red;
    
                        }
                        </style>';
                            } else {
                                echo '

                    
                    <style>
                    #itempedv' . $rowordent['id'] . ' {
                        text-decoration: none;
                        cursor: pointer;
                        color: inherit;
                        user-select: none; 

                    }
                    </style>';
                            }



                            echo '
                
                <tr id="itempedv' . $rowordent['id'] . '">
                <td  style="padding-left: 2mm; ' . $colorave . '">' . $rowordent['producto'] . '</td>
              
                <td class="text-center" style="place-items: center;' . $colorave . '">' . $rowordent['cantidad'] . ' ' . $rowordent['unidad'] . '</td>
                
                 </tr>
                
                ';
                        }

                        ?>

                        <br>
                    </tbody>
                </table>

                <?php
                /* xxx */

                if ($tipo_usuario == "21" || $tipo_usuario == "30" && $nosegui == "0") {
                    echo '  <select name="preparado' . $rowordenxg['id'] . '" id="preparado' . $rowordenxg['id'] . '" class="form-select" onchange="ajax_seguimiento' . $rowordenxg['id'] . '($(' . $comilla . '#preparado' . $rowordenxg['id'] . '' . $comilla . ').val());">
        <option value="100" ' . $selea . '>Estado....</option>
        <option value="0" ' . $selea . '>En espera.</option>
        
        ';


                    $sqlusuadrios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios  Where tipo_cliente='21' Or tipo_cliente='22' and estado='0' ORDER BY `nom_contac` ASC");
                    while ($rowode = mysqli_fetch_array($sqlusuadrios)) {
                        $idusenv = $rowode['id'];
                        $nombreuscon = $rowode['nom_contac'];

                        echo ' <option value="1|' . $idusenv . '|' . $nombreuscon . '" >En preparación ' . $nombreuscon . '.</option>';
                    }

                    echo '<option value="9" ' . $selec . '>Completado.</option>
        <option value="99" ' . $seled . '>Anulado.</option>
        <option value="4" ' . $seled . '>Esperando Productos.</option>
        <option value="5" ' . $selee . '>Esperando Envasado PA.</option>
        <option value="6" ' . $selef . '>Esperando Productos Planta Baja.</option>
       
    </select>';
                } else {
                    /* aca pongo prioridades */

                    if ($tipo_usuario == "31" || $tipo_usuario == "30") {
                        echo ' <br> <select name="prioridade' . $rowordenxg['id'] . '" id="prioridade' . $rowordenxg['id'] . '" class="form-select" 
                onchange="ajax_prioridade' . $rowordenxg['id'] . '($(' . $comilla . '#prioridade' . $rowordenxg['id'] . '' . $comilla . ').val());">

                <option value="0" ' . $selepriae . '>Elegir Prioridad...</option>
                <option value="0" ' . $selepriae . '>Sin Prioridad</option>
                <option value="1" ' . $selepribe . '>Con Prioridad</option>
                <option value="2" ' . $seleprice . '>Camioneta en la Puerta</option>
                <option value="3" ' . $selepride . '>Cliente en la Puerta.</option>
               
            </select>
            <br> <select name="eordenpedi' . $rowordenxg['id'] . '" id="eordenpedi' . $rowordenxg['id'] . '" class="form-select" 
            onchange="ajax_eordenpedi' . $rowordenxg['id'] . '($(' . $comilla . '#eordenpedi' . $rowordenxg['id'] . '' . $comilla . ').val());">

            <option value="0" ' . $eoselepria . '>Elegir Orden...</option>
            <option value="0" ' . $eoselepria . '>Sin Orden</option>
            <option value="1" ' . $eoseleprib . '>1ra Salida</option>
            <option value="2" ' . $eoselepric . '>2da Salida</option>
            <option value="3" ' . $eoseleprid . '>3ra Salida</option>
            <option value="4" ' . $eoseleprie . '>4ta Salida</option>
            <option value="5" ' . $eoseleprif . '>5ta Salida</option>
            <option value="6" ' . $eoseleprig . '>6ta Salida</option>
           
        </select>
            
            
<script>
function ajax_prioridade' . $rowordenxg['id'] . '(prioridade' . $rowordenxg['id'] . ') {
   
        var parametros = {
            "prioridad": prioridade' . $rowordenxg['id'] . ',
            "id_orden": ' . $rowordenxg['id'] . ',
        };
        $.ajax({
            data: parametros,
            url: ' . $comilla . '../control/prioridadenv.php' . $comilla . ',
            type: ' . $comilla . 'POST' . $comilla . ',
            beforeSend: function() {
                $("#muestroordenpt' . $rowordenxg['id'] . '").html(' . $comilla . '' . $comilla . ');
            },
            success: function(response) {
                $("#muestroordenpt' . $rowordenxg['id'] . '").html(response);
            }
        });
   
}

function ajax_eordenpedi' . $rowordenxg['id'] . '(eordenpedi' . $rowordenxg['id'] . ') {
   
    var parametros = {
        "eordenpedi": eordenpedi' . $rowordenxg['id'] . ',
        "id_orden": ' . $rowordenxg['id'] . ',
    };
    $.ajax({
        data: parametros,
        url: ' . $comilla . '../control/ordenpedienv.php' . $comilla . ',
        type: ' . $comilla . 'POST' . $comilla . ',
        beforeSend: function() {
            $("#emuestroordenpto' . $rowordenxg['id'] . '").html(' . $comilla . '' . $comilla . ');
        },
        success: function(response) {
            $("#emuestroordenpto' . $rowordenxg['id'] . '").html(response);
        }
    });

}

</script>
            
           <div id="muestroordenpt' . $rowordenxg['id'] . '"></div> 
           <div id="emuestroordenpto' . $rowordenxg['id'] . '"></div> 
            
            
            
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

</div>

<!-- <script>
 <option value="4" '.$seled.'>Esperando Productos.</option>
        <option value="5" '.$selee.'>Esperando Envasado.</option>
 -->