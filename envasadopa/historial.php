<hr>
<?php


function salidascamEnPa($rjdhfbpqj, $id_orden)
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
            $eopriover = '<button type="button" class="btn btn-primary btn-sm">1ra Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "2") {
            $eopriover = '<button type="button" class="btn btn-success btn-sm"> 2da Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "3") {
            $eopriover = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "4") {

            $eopriover = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "5") {

            $eopriover = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "6") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "7") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 7ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "8") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 8ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "9") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 9ta Salida  ' . $dianombr . '</button>&nbsp;';
        }
        if ($eoprioridadd == "10") {

            $eopriover = '<button type="button" class="btn btn-dark btn-sm"> 10ta Salida ' . $dianombr . '</button>&nbsp;';
        }
    } else {
        $eopriover = '';
    }

    return $eopriover;
}


function NombreZonaOrdenpa($rjdhfbpqj, $id_orden)
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
    $botnoma = "+";
    $urlpa = "/envasadopa/?pan=1";
    $nosegui = "1";
} elseif ($nombreCarpeta == "/preparacionpedidos/index.php") {
    $botnoma = "+";
    $urlpa = "/envasadopa/?pan=1";
    $nosegui = "1";
} else {
    $botnoma = "Volver al Panel";
    $urlpa = "/preparacionpedidos/";
    $nosegui = "0";
}
?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container mt-3"><a style="cursor: pointer;" onclick="recargarPagina()" title="Actualizar Información">
        <i class="material-icons" style="font-size:36px">refresh</i></a>
    <h5>
        <? if ($_SESSION['tipo'] == "30" || $_SESSION['tipo'] == "31" || $_SESSION['tipo'] == "0" || empty($_SESSION['tipo'])) { ?> <strong class="badge bg-danger" style="font-size: 20pt;">Envasado PA</strong><? } ?>

        <? if ($_SESSION['tipo'] == "30") { ?>
            &nbsp;&nbsp; <a href="<?= $urlpa ?>"><button type="button" class="btn btn-danger" title="Agregar pedido para Envasado"><?= $botnoma ?></button></a>

        <? } ?>

    </h5>
    <?php
    if ($_SESSION['tipo'] == "0" || $_SESSION['tipo'] == "31" || $id_usuarioclav == "40") {
        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesa = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa  Where fechaentreg='$fechahoy' and  preparado='9' and  fin='1'");
        $canterenva = mysqli_num_rows($sqlnxgeesa);

        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesa2 = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa Where fin='1' and (preparado='0' or preparado = '4' or preparado = '5') ");
        $canterenva2 = mysqli_num_rows($sqlnxgeesa2);

        /* calculo cuantas hordenes se isieron */
        $sqlnxgeesa2p = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa  Where  preparado ='1' and  fin='1'");
        $canterenva2p = mysqli_num_rows($sqlnxgeesa2p);


        echo 'Pedidos&nbsp;terminados&nbsp;' . $canterenva . ' preparando&nbsp;' . $canterenva2p . ' en&nbsp;espera&nbsp;' . $canterenva2 . '';
    }
    ?>


    <div id="accordion">
        <?php

        /* 
$date = new DateTime($fechahoy);
$date->modify('-3 days'); // Resta 3 días
$nueva_fecha = $date->format('Y-m-d');  */

        //el ultimo dia que encuentro algo le descuento 2 dias


        $sqlnxge = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa  Where fin='1' and preparado < '9'  ORDER BY fecha ASC");
        if ($rowogde = mysqli_fetch_array($sqlnxge)) {
            $sumodiae = $rowogde['fecha'];
        } else {
            $sumodiae = $fechahoy;
        }




        $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa  Where fecha >= '$sumodiae' and fin='1' $sqldep ORDER BY `preparado` ASC, id DESC");
        // $sqlordenxg = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenevaa  Where fecha = '$fechahoy' and fin='1' ORDER BY `id` DESC");


        while ($rowordenxga = mysqli_fetch_array($sqlordenxg)) {

            $idorhisa = $rowordenxga['id'];
            $horaentrega = $rowordenxga['horaentrega'];
            $usuarioprpa = $rowordenxga['usuario'];
            $prioverea = ${"prioverea" . $rowordenxga['id']};
            $prioridada = $rowordenxga['prioridad'];
            $eoprioridadda = $rowordenxga['ordenpedi'];




            if ($prioridada == "1") {
                $prioverea = '<strong title="PRIORIDAD">🕓 </strong>';
            }

            $sqlordenrta = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvasa Where id_orden = '$idorhisa'");
            $canitema = mysqli_num_rows($sqlordenrta);

            $sqlordenrtr = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvasa Where id_orden = '$idorhisa' and listo='1'");
            $canitemra = mysqli_num_rows($sqlordenrtr);

            if ($_SESSION['tipo'] == "22") {
                $canitemda = "(P." . $canitema . ")";
            }

            /*  $porcentajefa = ($canitemra / $canitema) * 100;
         $porcentajea = number_format($porcentajefa, 0, '.', ','); */

            $numeroa = $rowordenxga['numero'];
            $fechaora = $rowordenxga['fecha'];
            $preparadoddea = ${"preparadodde" . $idorhisa};
            $preparadoddea = $rowordenxga['preparado'];
            $preparadoa = ${"preparado" . $idorhisa};
            $colorfra = ${"colorfr" . $idorhisa};
            $seleaa = ${"seleaa" . $idorhisa};
            $seleba = ${"seleba" . $idorhisa};
            $seleca = ${"seleca" . $idorhisa};
            $seleda = ${"seleda" . $idorhisa};
            $seleea = ${"seleea" . $idorhisa};
            $pretitia = ${"pretitia" . $idorhisa};

            $selepriaea = ${"selepriaea" . $idorhisa};
            $selepribea = ${"selepribea" . $idorhisa};
            $selepricea = ${"selepricea" . $idorhisa};
            $selepridea = ${"selepridea" . $idorhisa};

            $eoselepriaa = ${"eoselepriaa" . $idorhisa};
            $eoselepriba = ${"eoselepriba" . $idorhisa};
            $eoseleprica = ${"eoseleprica" . $idorhisa};
            $eoseleprida = ${"eoseleprida" . $idorhisa};
            $eoselepriea = ${"eoselepriea" . $idorhisa};
            $eoseleprifa = ${"eoseleprifa" . $idorhisa};
            $eoselepriga = ${"eoselepriga" . $idorhisa};

            $gifalaea = ${"gifalaea" . $idorhisa};


            if ($preparadoddea == "0") {
                $preparadoa = "En&nbsp;espera";
                $seleaa = "selected";
                $colorfra = 'style="background-color: #F7560B; cursor: pointer;';
                $pretitia = "";
                $gifalaea = ' <img src="../assets/images/alarmab.gif" style="position:relative; left:-5px; top:0px;height: 28px; width:auto;">';
            }
            if ($preparadoddea == "1") {
                $preparadoa = "Prep.";
                $seleba = "selected";
                $colorfra = 'style="background-color: #F7CC0B; cursor: pointer;';
                $pretitia = "containerr" . $idorhisa;
                $gifalaea = '';
            }
            //if($preparadoddea=="2"){$preparadoa="Completado"; $seleca="selected"; $colorfra='style="background-color: #9EF70B; cursor: pointer;'; $pretitia="";}
            if ($preparadoddea == "9") {
                $preparadoa = "Completado";
                $seleca = "selected";
                $colorfra = 'style="background-color: #9EF70B; cursor: pointer;';
                $pretitia = "";
                $gifalaea = '';
            }
            if ($preparadoddea == "99") {
                $preparadoa = "Anulado";
                $seleda = "selected";
                $colorfra = 'style="background-color: #7A7978; cursor: pointer;';
                $pretitia = "";
                $gifalaea = '';
            }
            if ($preparadoddea == "4") {
                $preparadoa = "Esperando&nbsp;Producto/s!!";
                $seleda = "selected";
                $colorfra = 'style="background-color: #D565F5; cursor: pointer;';
                $pretitia = "";
                $gifalaea = '';
            }
            if ($preparadoddea == "5") {
                $preparadoa = "Con Problemas!!";
                $seleea = "selected";
                $colorfra = 'style="background-color: #658CF5; cursor: pointer;';
                $pretitia = "";
                $gifalaea = '';
            }




            ///prioridad
            if ($prioridada == "0") {
                $selepriaea = "selected";
            }
            if ($prioridada == "1") {
                $selepribea = "selected";
            }
            if ($prioridada == "2") {
                $selepricea = "selected";
            }
            if ($prioridada == "3") {
                $selepridea = "selected";
            }



            ///orden
            if ($eoprioridadda == "0") {
                $eoselepriaa = "selected";
                $eopriovera = '';
            }
            if ($eoprioridadda == "1") {
                $eoselepriba = "selected";
                //$eopriovera = '<button type="button" class="btn btn-primary btn-sm">1ra Salida</button>&nbsp;';
            }
            if ($eoprioridadda == "2") {
                $eoseleprica = "selected";
                // $eopriovera = '<button type="button" class="btn btn-success btn-sm"> 2da Salida</button>&nbsp;';
            }
            if ($eoprioridadda == "3") {
                $eoseleprida = "selected";
                // $eopriovera = '<button type="button" class="btn btn-info btn-sm"> 3ra Salida</button>&nbsp;';
            }
            if ($eoprioridadda == "4") {
                $eoselepriea = "selected";
                // $eopriovera = '<button type="button" class="btn btn-warning btn-sm"> 4ta Salida</button>&nbsp;';
            }
            if ($eoprioridadda == "5") {
                $eoseleprifa = "selected";
                // $eopriovera = '<button type="button" class="btn btn-danger btn-sm"> 5ta Salida</button>&nbsp;';
            }
            if ($eoprioridadda == "6") {
                $eoselepriga = "selected";
                // $eopriovera = '<button type="button" class="btn btn-dark btn-sm"> 6ta Salida</button>&nbsp;';
            }



            $eopriovera = salidascamEnPa($rjdhfbpqj, $numeroa);



            if ($prioridada == "2") {
                $prioverea = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;"><strong>
            ' . $gifalaea . 'CAMINONETA EN LA PUERTA!!</strong></div>';
            }
            if ($prioridada == "3") {
                $prioverea = '<div style="background-color: #000000; width:100%; padding-left:10px; color:white;">
            ' . $gifalaea . '<strong>CLIENTE EN LA PUERTA!!</strong></div>';
            }






            $comilla = "'";

            $iniciotiemea = ${"iniciotiemea" . $idorhisa};
            $fintoemea = ${"fintoemea" . $idorhisa};
            $inicioea = ${"inicioea" . $idorhisa};
            $finea = ${"finea" . $idorhisa};
            $diferenciaea = ${"diferenciaea" . $idorhisa};
            $horasea = ${"horasea" . $idorhisa};
            $minutosea = ${"minutosea" . $idorhisa};
            $hosverea = ${"hosverea" . $idorhisa};
            $tardoea = ${"tardoea" . $idorhisa};

            $iniciotiemea = $rowordenxga['fecha'] . " " . $rowordenxga['hora'];
            $fintoemea = $rowordenxga['fechaentreg'] . " " . $rowordenxga['horaentrega'];

            $inicioea = strtotime("$iniciotiemea");
            $finea = strtotime("$fintoemea");

            $diferenciaea = $finea - $inicioea;

            $horasea = floor($diferenciaea / 3600);
            $minutosea = floor(($diferenciaea % 3600) / 60);

            if (($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' && $tipo_usuario != '30' && $tipo_usuario != '22') && $preparadoddea == '9') {

                if ($horasea > 0) {
                    $hosverea = $horasea . ":";
                }

                $tardoea = "<br>Cerrado <strong>" . $rowordenxga['horaentrega'] . "</strong> Se tardó  " . $hosverea . $minutosea . " minutos.";
            } else {
                $tardoea = '';
            }


            if (($tipo_usuario == '31' || $tipo_usuario == '0' || $tipo_usuario != '29' &&  $tipo_usuario != '30' && $tipo_usuario != '21')) {

                $porcentajefa = ($canitemra / $canitema) * 100;
                $porcentajea = number_format($porcentajefa, 0, '.', ',') . "%";
            } else {
                $porcentajea = '';
            }

            if ($preparadoddea == "5" || $preparadoddea == "4") {
                $usuarioprpa = "";
                $porcentajea = "";
            }

            echo ' <div class="card">
        <div class="card-header ' . $pretitia . '" ' . $colorfra . '>
        <a class="btn" data-bs-toggle="collapse" href="#collapse' . $idorhisa . '">
           ' . $canitemda . ' ' . date('d/m', strtotime($rowordenxga['fecha'])) . ' Hs.' . $rowordenxga['hora'] . ' | ' . $prioverea . ' ' . $eopriovera . '<strong>Pedido Nº ' . $numeroa . '
           
           ' . NombreZonaOrdenpa($rjdhfbpqj, $numeroa) . '
           
           </strong> 
        </a>';
            /*  if($_GET['1']=='1'){
        echo'  <select name="preparado'.$rowordenxga['id'].'" id="preparado'.$rowordenxga['id'].'" class="form-select" onchange="ajax_seguimiento'.$rowordenxga['id'].'($('.$comilla.'#preparado'.$rowordenxga['id'].''.$comilla.').val());">
        <option value="0" '.$seleaa.'>En espera.</option>
        <option value="1" '.$seleba.'>En preparación.</option>
        <option value="2" '.$seleca.'>Completado.</option>
        <option value="3" '.$seleda.'>Anulado.</option>
    </select>';
        }else{echo '&nbsp;&nbsp;&nbsp;'.$preparadoa.'';}'.$horaentrega.' */
            echo '&nbsp;&nbsp;&nbsp;' . $preparadoa . ' ' . $usuarioprpa . ' ' . $porcentajea . ' ' . $tardoea . '</div>
    <div id="collapse' . $idorhisa . '" class="collapse" data-bs-parent="#accordion" >
        ';


            echo '
<script>
        function ajax_seguimiento' . $rowordenxga['id'] . '(preparado' . $rowordenxga['id'] . ') {
            var parametros = {
                "preparado": preparado' . $rowordenxga['id'] . ',
                "iditem": ' . $rowordenxga['id'] . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comilla . '../envasadopa/seguimiento.php' . $comilla . ',
                type: ' . $comilla . 'POST' . $comilla . ',
                beforeSend: function() {
                    $("#muestroorden3' . $rowordenxga['id'] . '").html(' . $comilla . '' . $comilla . ');
                },
                success: function(response) {
                    $("#muestroorden3' . $rowordenxga['id'] . '").html(response);
                }
            });
        }
    </script>';

            if ($preparadoddea == "1") {
                echo ' <script>
    function titilarBackground() {
        var containerr' . $rowordenxga['id'] . ' = document.querySelector(' . $comilla . '.containerr' . $rowordenxga['id'] . '' . $comilla . ');
    
        var intervalo = setInterval(function() {
            var colorActual = window.getComputedStyle(containerr' . $rowordenxga['id'] . ').backgroundColor;
            containerr' . $rowordenxga['id'] . '.style.backgroundColor = (colorActual === ' . $comilla . 'rgb(247, 204, 11)' . $comilla . ') ? ' . $comilla . '#F5E465' . $comilla . ' : ' . $comilla . '#F7CC0B' . $comilla . ';
        }, ' . $tit . ');
    
        setTimeout(function() {
            clearInterval(intervalo);
            containerr' . $rowordenxga['id'] . '.style.backgroundColor = ' . $comilla . '#F7CC0B' . $comilla . '; 
        }, 5000000); 
    }
    
    titilarBackground();
    
    
    </script>';
            }

            echo '

    <div id="muestroorden3' . $rowordenxga['id'] . '"> </div>
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

                        $sqlordenra = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvasa Where id_orden = '$idorhisa' ");
                        while ($rowordenta = mysqli_fetch_array($sqlordenra)) {


                            $listo = ${"listo" . $rowordenta['listo']};
                            $listo = $rowordenta['listo'];

                            if ($listo == "1") {

                                echo '  <style>
                        #itempedv' . $rowordenta['id'] . ' {
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
                    #itempedv' . $rowordenta['id'] . ' {
                        text-decoration: none;
                        cursor: pointer;
                        color: inherit;
                        user-select: none; 

                    }
                    </style>';
                            }



                            echo '
                
                <tr id="itempedv' . $rowordenta['id'] . '">
                <td  style="padding-left: 2mm;">' . $rowordenta['producto'] . '</td>
              
                <td class="text-center" style="place-items: center;">' . $rowordenta['cantidad'] . ' ' . $rowordenta['unidad'] . '</td>
                
                 </tr>
                
                ';
                        }

                        ?>

                        <br>
                    </tbody>
                </table>

                <?php

                if ($tipo_usuario == "22" || $tipo_usuario == "30" && $nosegui == "0") {
                    echo '  <select name="preparado' . $rowordenxga['id'] . '" id="preparado' . $rowordenxga['id'] . '" class="form-select" onchange="ajax_seguimiento' . $rowordenxga['id'] . '($(' . $comilla . '#preparado' . $rowordenxga['id'] . '' . $comilla . ').val());">
        <option value="0" ' . $seleaa . '>En espera.</option>
        <option value="1" ' . $seleba . '>En preparación.</option>
        <option value="9" ' . $seleca . '>Completado.</option>
        <option value="99" ' . $seleda . '>Anulado.</option>
        <option value="4" ' . $seleda . '>Esperando Productos.</option>
        <option value="5" ' . $seleea . '>Con Problemas.</option>
       
    </select>';
                } else {
                    /* aca pongo prioridades */

                    if ($tipo_usuario == "31" || $tipo_usuario == "30") {
                        echo ' <br> <select name="prioridada' . $rowordenxga['id'] . '" id="prioridada' . $rowordenxga['id'] . '" class="form-select" 
                onchange="ajax_prioridadeaa' . $rowordenxga['id'] . '($(' . $comilla . '#prioridada' . $rowordenxga['id'] . '' . $comilla . ').val());">

                <option value="0" ' . $selepriaea . '>Elegir Prioridad...</option>
                <option value="0" ' . $selepriaea . '>Sin Prioridad</option>
                <option value="1" ' . $selepribea . '>Con Prioridad</option>
                <option value="2" ' . $selepricea . '>Camioneta en la Puerta</option>
                <option value="3" ' . $selepridea . '>Cliente en la Puerta.</option>
               
            </select>
            <br> <select name="eordenpedia' . $rowordenxga['id'] . '" id="eordenpedia' . $rowordenxga['id'] . '" class="form-select" 
            onchange="ajax_eordenpedi' . $rowordenxga['id'] . '($(' . $comilla . '#eordenpedia' . $rowordenxga['id'] . '' . $comilla . ').val());">

            <option value="0" ' . $eoselepriaa . '>Elegir Orden...</option>
            <option value="0" ' . $eoselepriaa . '>Sin Orden</option>
            <option value="1" ' . $eoselepriba . '>1ra Salida</option>
            <option value="2" ' . $eoseleprica . '>2da Salida</option>
            <option value="3" ' . $eoseleprida . '>3ra Salida</option>
            <option value="4" ' . $eoselepriea . '>4ta Salida</option>
            <option value="5" ' . $eoseleprifa . '>5ta Salida</option>
            <option value="6" ' . $eoselepriga . '>6ta Salida</option>
           
        </select>
            
            
<script>
function ajax_prioridadeaa' . $rowordenxga['id'] . '(prioridada' . $rowordenxga['id'] . ') {
   
        var parametros = {
            "prioridada": prioridada' . $rowordenxga['id'] . ',
            "id_orden": ' . $rowordenxga['id'] . ',
        };
        $.ajax({
            data: parametros,
            url: ' . $comilla . '../control/prioridadenva.php' . $comilla . ',
            type: ' . $comilla . 'POST' . $comilla . ',
            beforeSend: function() {
                $("#muestroordenpta' . $rowordenxga['id'] . '").html(' . $comilla . '' . $comilla . ');
            },
            success: function(response) {
                $("#muestroordenpta' . $rowordenxga['id'] . '").html(response);
            }
        });
   
}

function ajax_eordenpedi' . $rowordenxga['id'] . '(eordenpedia' . $rowordenxga['id'] . ') {
   
    var parametros = {
        "eordenpedia": eordenpedia' . $rowordenxga['id'] . ',
        "id_orden": ' . $rowordenxga['id'] . ',
    };
    $.ajax({
        data: parametros,
        url: ' . $comilla . '../control/ordenpedienva.php' . $comilla . ',
        type: ' . $comilla . 'POST' . $comilla . ',
        beforeSend: function() {
            $("#emuestroorda' . $rowordenxga['id'] . '").html(' . $comilla . '' . $comilla . ');
        },
        success: function(response) {
            $("#emuestroorda' . $rowordenxga['id'] . '").html(response);
        }
    });

}

</script>
            
           <div id="muestroordenpta' . $rowordenxga['id'] . '"></div> 
           <div id="emuestroorda' . $rowordenxga['id'] . '"></div> 
            
            
            
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

</div><br><br>

<!-- <script>
 <option value="4" '.$seleda.'>Esperando Productos.</option>
        <option value="5" '.$seleea.'>Esperando Envasado.</option>
 -->