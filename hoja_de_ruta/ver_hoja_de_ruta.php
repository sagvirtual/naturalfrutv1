<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
include('../lferiados/inputdateferiados.php');
include('../funciones/funcZonas.php');
include('../nota_de_pedido/funcion_saldoanterior.php');
include('../funciones/func_formapago.php');
include('../funciones/StatusOrden.php');


unset($_SESSION['id_orden']);
unset($_SESSION['idcliente']);
unset($_SESSION['edit']);

$diaselec = $_GET['hdnsbloekdjgsd'];
$fechadecod = base64_decode($diaselec);
$idcamcod = $_GET['hdnskdjjgsd'];
$idhoja = $_GET['hidjjhdho'];
$idcamioneta = base64_decode($idcamcod);


$fechaexplo = explode("-", $fechadecod);
$diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

$fechats = strtotime($fechadecod);
$dayver = date('w', $fechats);



//extrigo nombre de la camioneta
$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = '$idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $nombrecamio = $rowcamionetas["nombre"];
    $idcamioneta = $rowcamionetas["id"];
}


//extrigo nombre de la camioneta
$sqlhoja = mysqli_query($rjdhfbpqj, "SELECT * FROM hoja Where camioneta = '$idcamioneta' and id='$idhoja'");
if ($rowhoja = mysqli_fetch_array($sqlhoja)) {
    $idchofer = $rowhoja["chofer"];
    $salida = $rowhoja["position"];

    if ($salida < 70) {

        $salidave = "Carga: Nº " . $salida;
    }

    //extrigo nombre de la camioneta
    $sqlcamiodtas = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id = ' $idchofer'");
    if ($rowcam23 = mysqli_fetch_array($sqlcamiodtas)) {
        $nomchofer = $rowcam23["nom_contac"];
    }
}




//$idchofer = $rowcamionetas["chofer"];



if (!empty($diaselec)) {
    if ($dayver == '1') {
        $activla1 = "active";
        $selectearial1 = "true";
        $dianombr = "Lunes";
        $diasql = "position1";
    } else {
        $selectearial1 = "false";
    }
    if ($dayver == '2') {
        $activla2 = "active";
        $selectearial2 = "true";
        $dianombr = "Martes";
        $diasql = "position2";
    } else {
        $selectearial2 = "false";
    }
    if ($dayver == '3') {
        $activla3 = "active";
        $selectearial3 = "true";
        $dianombr = "Miercoles";
        $diasql = "position3";
    } else {
        $selectearial3 = "false";
    }
    if ($dayver == '4') {
        $activla4 = "active";
        $selectearial4 = "true";
        $dianombr = "Jueves";
        $diasql = "position4";
    } else {
        $selectearial4 = "false";
    }
    if ($dayver == '5') {
        $activla5 = "active";
        $selectearial5 = "true";
        $dianombr = "Viernes";
        $diasql = "position5";
    } else {
        $selectearial5 = "false";
    }
    if ($dayver == '6') {
        $activla6 = "active";
        $selectearial6 = "true";
        $dianombr = "Sábados";
        $diasql = "position6";
    } else {
        $selectearial6 = "false";
    }
    if ($dayver == '0') {
        $activla0 = "active";
        $selectearial0 = "true";
        $dianombr = "Domingos";
        $diasql = "position0";
    } else {
        $selectearial5 = "false";
    }
} else {
    echo ("<script language='JavaScript' type='text/javascript'>");
    echo ("location.href='../hoja_de_ruta/'");
    echo ("</script>");
}





if (isset($_POST['update1'])) {
    foreach ($_POST['positions1'] as $position1) {
        $index1 = $position1[0];
        $newPosition1 = $position1[1];


        $rjdhfbpqj->query("UPDATE clientes SET $diasql = '$newPosition1' WHERE id='$index1'");
        $rjdhfbpqj->query("UPDATE orden SET position = '$newPosition1' WHERE id_hoja='$idhoja' and id_cliente='$index1'");

        $sqlclied = "Update hoja Set cerrar='0' Where id = '$idhoja'";
        mysqli_query($rjdhfbpqj, $sqlclied) or die(mysqli_error($rjdhfbpqj));
    }



    exit('success');
}


?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="ri-book-read-line"></i> Hoja de Ruta ID: <?= $idhoja ?></h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/hoja_de_ruta/"> <button class="btn btn-primary"><i class="fa fa-file-text"></i> Hojas de rutas</button></a>
            </div>




        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">


        <div class="row">

            <div class="col-lg-12 col-xl-8">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-lg-8">
                                <? echo '<h5>' . $numdia . '  ' . $dianombr . '  ' . $diaymes . ' <br>';

                                if ($nombrecamio != "" || $nomchofer != "") {
                                    echo ' Camioneta: ' . $nombrecamio . ' - Chofer: ' . $nomchofer . ' - ' . $salidave . '</h5>';
                                } else {
                                    echo 'Retiro en el local o sin ubicación asignada en la hoja de ruta</h5>';
                                }
                                ?>


                            </div>


                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar" style="text-align: right;">
                                    <a href="print_hoja_de_rutaC?hdnsbloekdjgsd=<?= $diaselec ?>&ijkfndt=<?= $dayver ?>&hdnskdjjgsd=<?= $idcamcod ?>&idhoja=<?= $idhoja ?>" target="_black" title="Imprimir hoja de ruta">
                                        <button class="btn btn-primary"><i class="dripicons-print"></i> Imprimir hoja de Ruta</button></a>
                                </div>
                            </div>

                        </div>




                        <div class="tab-content" id="v-pills-product-tabContent">
                            <!-- hoja1 -->
                            <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">

                                <div class="row">

                                    <!-- Start col -->
                                    <div class="col-lg-12">
                                        <div class="card m-b-30">

                                            <div class="card-body">

                                                <div class="table-responsive">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>

                                                                <th style="width:60px;">Estado</th>
                                                                <th class="text-center">Orden</th>
                                                                <th class="text-center">Clientes</th>
                                                                <th style="width:10px;"></th>
                                                                <th style="width:100px; text-align:center;"></th>
                                                                <th style="width:10px;"></th>
                                                                <!-- <th>Acción</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            //aca miro si hay orden con positio diferente a 0
                                                            $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_hoja='$idhoja'");
                                                            if ($rowordenf = mysqli_fetch_array($sqlorden)) {
                                                                $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente,u.horarios, e.finalizada, e.pedir, e.position, e.total, e.id_hoja, e.id as idorden, u.id, u.address, u.nom_empr, u.position0, u.retira,  u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, e.camioneta, u.nom_contac, u.zona 
                FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id 
                WHERE e.id_hoja='$idhoja' and u.estado='0' and e.camioneta='$idcamioneta' ORDER BY `position` ASC");
                                                                $positionupdate = '1';
                                                            }

                                                            while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
                                                                $id = $rowcategorias["id"];
                                                                $idclet = $rowcategorias["id_cliente"];
                                                                $idcletz = $rowcategorias["id_cliente"];
                                                                $idzons = $rowcategorias["zona"];
                                                                $zonar = ${"zonar" . $id};
                                                                $rita = ${"rita" . $id};

                                                                $retira = $rowcategorias["retira"];
                                                                if ($retira == '1') {
                                                                    $rita = '<button type="button" class="btn btn-warning">Retira en el Local</button>';
                                                                } else {
                                                                    $rita = '';
                                                                }

                                                                $sqlleadd = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$idzons'");
                                                                if ($rowleadd = mysqli_fetch_array($sqlleadd)) {
                                                                    $zonar = $rowleadd["nombre"];
                                                                }


                                                                $mostrarr = ${"mostrarr" . $id};
                                                                $idorden = $rowcategorias["idorden"];
                                                                $status = StatusOrden($rjdhfbpqj, $idorden);
                                                                $fila = $fila + 1;
                                                                $idcod = base64_encode($id);
                                                                $idordencod = base64_encode($idorden);
                                                                $cliente = $rowcategorias["nom_contac"];
                                                                $clientev = strtoupper($cliente);
                                                                $nom_empr = $rowcategorias["nom_empr"];
                                                                $nom_emprv = ucfirst(strtolower($nom_empr));
                                                                if (($fila % 2) == 0) {
                                                                    //Es un número par
                                                                    $colorf = '#fff';
                                                                } else {
                                                                    //Es un número impar
                                                                    $colorf = '#F1F1F1';
                                                                }
                                                                $totalliq = $rowcategorias["total"];
                                                                $total = number_format($totalliq, 2, '.', '');
                                                                //acamirosi pertenese el cliente a ese dia
                                                                $diarep = $rowcategorias["dia_repart" . $dayver];

                                                                if ($diarep != "1") {
                                                                    $pertenesr = '<i class="ion ion-ios-alert" style="color:red"></i> ';
                                                                } else {
                                                                    $pertenesr = "";
                                                                }

                                                                //aca veo la duda
                                                                $sqlitem_orden = ${"sqlitem_orden" . $idclet};
                                                                $rowitem_ordena = ${"rowitem_ordena" . $idclet};
                                                                $positioncol = ${"positioncol" . $idclet};
                                                                $sqlordenu = ${"sqlordenu" . $idclet};
                                                                $finalizada = ${"finalizada" . $idclet};
                                                                $sqlitem_ordenv = ${"sqlitem_ordenv" . $idclet};
                                                                $sqlitem_ordenvv = ${"sqlitem_ordenvv" . $idclet};
                                                                $sqlordenrf = ${"sqlordenrf" . $idclet};
                                                                $rowordenrf = ${"rowordenrf" . $idclet};

                                                                $sqlnotas = ${"sqlnotas" . $idclet};
                                                                $rowotas = ${"rowotas" . $idclet};
                                                                $nota = ${"nota" . $idclet};

                                                                $finalizada = $rowcategorias["finalizada"];

                                                                $sqlnotas = mysqli_query($rjdhfbpqj, "SELECT * FROM notahoja where id_orden = '$idorden'");
                                                                if ($rowotas = mysqli_fetch_array($sqlnotas)) {
                                                                    $nota = $rowotas['nota'];
                                                                } else {
                                                                    $nota = "";
                                                                }



                                                                echo '<tr data-index="' . $rowcategorias['id'] . '" data-position="' . $rowcategorias['position'] . '" style="cursor:move; ">
                                                            
                                                                <td>' . $status . '
                                                                <input type="hidden" id="id_clientec' . $idclet . '" name="id_clientec' . $idclet . '" value="' . $idorden . '">
                                                                </td>

                                                               
                                                                     <td class="text-center" style="text-align:center;">' . $fila . '</td>
                                      
                                                                    <td style="color: black; background-color:' . $colortr . '">
                                                                    
                                                                    
                                                                    
                                                                     Nº' . $idorden . ' -  ' . $pertenesr . '<b>' . $zonar . ' - ' . $clientev . '</b> (' . $nom_emprv . ' ) ' . $rita . '' . $rowcategorias["horarios"] . '  
                                                                     
                                                                     <span class="badge badge-primary">' . formDePag($rjdhfbpqj, $idclet, $idorden) . '</span><br>';





                                                                echo '
                                                                     <input type="text" 
                                                                      oninput="ajax_pedir(                                                                    
                                                                    ' . $comilla . '' . $idorden . '' . $comilla . ', 
                                                                    $(' . $comilla . '#nota' . $idorden . '' . $comilla . ').val(), 
                                                                );" 
                                                                     
                                                                     class="form-control" name="nota' . $idorden . '" id="nota' . $idorden . '" 
                                                                     value="' . $nota . '"
                                                                     
                                                                     placeholder="Observación">';

                                                                echo '
                                                                </td>
                                                                    
                                                            
                                                                
                                                                <td>';

                                                                //aca me fijo si hay productos anula el boton borrar
                                                                $sqlordenrf = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden  Where fecha='$fechadecod' and id_cliente = '$idclet' and fin='1'");
                                                                if ($rowordenrf = mysqli_fetch_array($sqlordenrf)) {

                                                                    /*  $idordenv = str_pad($idorden, 4, '0', STR_PAD_LEFT); */

                                                                    echo '
                                                    <a href="mlkdthsrt?juhytm=' . $idordencod . '&hdnsbloekdjgsd=' . $diaselec . '&hdnskdjjgsd=' . $idcamcod . '&hidjjhdho=' . $idhoja . '" class="btn btn-danger-rgba" title="Sacar de la Hoja de Ruta"> 
                                                                     <i class="dripicons-arrow-right">Quitar</i></a>';
                                                                } else {
                                                                    echo '<a href="mlkdthsrt?juhytm=' . $idordencod . '&hdnsbloekdjgsd=' . $diaselec . '&hdnskdjjgsd=' . $idcamcod . '&hidjjhdho=' . $idhoja . '" class="btn btn-danger-rgba" title="Sacar de la Hoja de Ruta"> 
                                                                     <i class="dripicons-arrow-right">Quitar</i></a>
                                                                     
                                                                    
                                                                     
                                                                    ';
                                                                }
                                                                echo ' </td><td>';
                                                                //aca me fijo si hay productos anula el boton borrar
                                                                $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM orden  Where fecha > '$fecha' and id_cliente = '$idcli' ");
                                                                if ($rowordenr = mysqli_fetch_array($sqlordenr)) {

                                                                    $verbo = "1";
                                                                } else {
                                                                    $verbo = "0";
                                                                }
                                                                if ($verbo == "0") {

                                                                    echo ' 
                                                             <a href=" ../nota_de_pedido/index.php?jhduskdsa=' . base64_encode($idclet) . '&orjndty=' . $idordencod . '" target="_black" class="btn btn-success" title="Editar Nota de Pedido"><i class="dripicons-document"></i></a>



                                                            </div>';
                                                                }


                                                                echo '


                                                                </td> 
                                                            </tr>';
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
                            <!-- fin hoja 1 -->

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-12">
                                <? echo '<h3>En espera ...</h3>'; ?>


                            </div>





                        </div>




                        <div class="tab-content" id="v-pills-product-tabContent">
                            <!-- hoja1 -->
                            <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">

                                <div class="row">

                                    <!-- Start col -->
                                    <div class="col-lg-12" style="display:none">
                                        <div class="card m-b-30">

                                            <div class="card-body">

                                                <div class="table-responsive">

                                                    <table class="table">

                                                        <tbody>
                                                            <?php
                                                            $sqlclientesr = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart$dayver = '1'  ORDER BY `position$dayver` ASC");
                                                            while ($rowclientesr = mysqli_fetch_array($sqlclientesr)) {

                                                                $idcl = $rowclientesr["id"];
                                                                $esta = ${"idcl" . $rowclientesr["id"]};

                                                                $sqlordenf = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcl' and fecha='$fechadecod'");
                                                                if ($roworden = mysqli_fetch_array($sqlordenf)) {
                                                                    $esta = "ESTA";
                                                                } else {
                                                                    $esta = "NOPO";
                                                                }

                                                                $zona = NombreZona($rjdhfbpqj, $idcl);
                                                                $idcodcli = base64_encode($idcl);
                                                                $clienter = $rowclientesr["address"];
                                                                $clientevr = strtoupper($clienter);
                                                                $nom_emprr = $rowclientesr["nom_empr"];
                                                                $nom_contac = $rowclientesr["nom_contac"];
                                                                $nom_contacd = ucfirst(strtolower($nom_contac));

                                                                if ($esta == "NOPO") {

                                                                    echo '<tr style="cursor:move; ">
                                                             <td> 
                                                             <a href="../hoja_de_ruta/agregar_hoja?juhytm=' . $idcodcli . '&hdnsbloekdjgsd=' . $diaselec . '&kjdsdsd=' . $dayver . '&hdnskdjjgsd=' . $idcamcod . '" target="_parent" class="btn btn-dark-rgba" title="Agregar a la Hoja de ruta"><i class="dripicons-arrow-left"></i></a>
                                                          ';

                                                                    echo '</td>
                                      
                                                                    <td><b>' . $zona . ' - ' . $nom_contacd . '</b> (' . $nom_emprr . ')</td>
                                                                    
                                                                <td>

                                                            </tr>';
                                                                }
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php


                                    if ($dayver == '1') {
                                        $exspandia1 = '';
                                    } else {
                                        $exspandia1 = '';
                                    } //class="collapse"
                                    if ($dayver == '2') {
                                        $exspandia2 = '';
                                    } else {
                                        $exspandia2 = '';
                                    }
                                    if ($dayver == '3') {
                                        $exspandia3 = '';
                                    } else {
                                        $exspandia3 = '';
                                    }
                                    if ($dayver == '4') {
                                        $exspandia4 = '';
                                    } else {
                                        $exspandia4 = '';
                                    }
                                    if ($dayver == '5') {
                                        $exspandia5 = '';
                                    } else {
                                        $exspandia5 = '';
                                    }
                                    if ($dayver == '6') {
                                        $exspandia6 = '';
                                    } else {
                                        $exspandia6 = '';
                                    }
                                    if ($dayver == '0') {
                                        $exspandia0 = '';
                                    } else {
                                        $exspandia0 = '';
                                    }

                                    ?>
                                    <!-- cliente sin dia-->
                                    <?php

                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart1 = '0' and dia_repart2 = '0' and dia_repart3 = '0' and dia_repart4 = '0'  and dia_repart5 = '0'  and dia_repart6 = '0'  and dia_repart0 = '0'   ORDER BY `position1` ASC");


                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                        $idcdm1 = $rowclientesrl["id"];
                                        $sqlordenfm1 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm1' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm = mysqli_fetch_array($sqlordenfm1)) {
                                    ?>
                                            <!-- lunes -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline1wr" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes Sin Día</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline1wr" <?= $exspandia1 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButtonS" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButtonS" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>




                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart1 = '0' ORDER BY `position1` ASC");


                                                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {


                                                                        $idcll = $rowclientesrl["id"];
                                                                        $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                        $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll' and col>'1' and col<'8' and id_hoja='0'");

                                                                        while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                            $estal = "ESTA";
                                                                            $idordeniunfo = $rowordenl['id'];


                                                                            $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                            $idcodclil = base64_encode($idcll);
                                                                            $clienterl = $rowclientesrl["nom_contac"];
                                                                            $clientevrl = strtoupper($clienterl);
                                                                            $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                            $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                            if ($estal == "ESTA") {

                                                                                $estael1s = '1';


                                                                                echo '
                             <div class="custom-control custom-checkbox">
                             <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                             <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                             <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                             
                           <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll . '">
                             <input type="checkbox" class="custom-control-input" id="idorden' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>

                             
                             <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                            <label class="custom-control-label" for="idorden' . $idordeniunfo . '" ><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                          </div>';
                                                                            }
                                                                        }
                                                                    }

                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar' . $nohayre . '</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin lunes -->

                                    <?php
                                        }
                                    } ?>



                                    <!-- fin cliente sin dia -->
                                    <?php

                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart1 = '1'  ORDER BY `position1` ASC");


                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                        $idcdm1 = $rowclientesrl["id"];
                                        $sqlordenfm1 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm1' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm = mysqli_fetch_array($sqlordenfm1)) {
                                    ?>
                                            <!-- lunes -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline1" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Lunes</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline1" <?= $exspandia1 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton1" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton1" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>




                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart1 = '1' ORDER BY `position1` ASC");


                                                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {


                                                                        $idcll = $rowclientesrl["id"];
                                                                        $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                        $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll' and col>'1' and col<'8' and id_hoja='0'");

                                                                        while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                            $estal = "ESTA";
                                                                            $idordeniunfo = $rowordenl['id'];


                                                                            $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                            $idcodclil = base64_encode($idcll);
                                                                            $clienterl = $rowclientesrl["nom_contac"];
                                                                            $clientevrl = strtoupper($clienterl);
                                                                            $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                            $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                            if ($estal == "ESTA") {

                                                                                $estael1 = '1';


                                                                                echo '
                                                                    <div class="custom-control custom-checkbox">
                                                                    <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                                                                    <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                                                                    <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                                                                    <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                                                                    
                                                                  <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll . '">
                                                                    <input type="checkbox" class="custom-control-input" id="idorden' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>

                                                                    
                                                                    <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                                                                   <label class="custom-control-label" for="idorden' . $idordeniunfo . '" ><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                                                                 </div>';
                                                                            }
                                                                        }
                                                                    }

                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar' . $nohayre . '</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin lunes -->

                                        <?php
                                        }
                                    }

                                    $sqlclientesrm = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart2 = '1'  ORDER BY `position2` ASC");

                                    while ($rowclientesrm = mysqli_fetch_array($sqlclientesrm)) {

                                        $idcdm2 = $rowclientesrm["id"];
                                        $sqlordenfm2 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm2' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm2 = mysqli_fetch_array($sqlordenfm2)) {

                                        ?>
                                            <!-- martes -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline2" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Martes</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline2" <?= $exspandia2 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton2" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton2" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>
                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrm = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart2 = '1'and retira='0'  ORDER BY `position2` ASC");

                                                                    while ($rowclientesrm = mysqli_fetch_array($sqlclientesrm)) {


                                                                        $idclm = $rowclientesrm["id"];
                                                                        $estam = ${"idcll" . $rowclientesrm["id"]};

                                                                        $sqlordenfm = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idclm' and col>'1' and col<'8' and id_hoja='0'");
                                                                        while ($rowordenm = mysqli_fetch_array($sqlordenfm)) {
                                                                            $estam = "ESTA";
                                                                            $idordeniunfod = $rowordenm['id'];

                                                                            $zona = NombreZona($rjdhfbpqj, $idclm);
                                                                            $idcodclim = base64_encode($idclm);
                                                                            $clienterm = $rowclientesrm["nom_contac"];
                                                                            $clientevrm = strtoupper($clienterm);
                                                                            $nom_emprrm = $rowclientesrm["nom_empr"];
                                                                            $nom_emprvrm = ucfirst(strtolower($nom_emprrm));

                                                                            if ($estam == "ESTA") {

                                                                                $estael2 = '1';

                                                                                echo '
                            <div class="custom-control custom-checkbox">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            
                            <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idclm . '">
                            <input type="checkbox" class="custom-control-input" id="idorden2' . $idordeniunfod . '"  name="idorden[]"  value="' . $idordeniunfod . '" checked>

                           <label class="custom-control-label" for="idorden2' . $idordeniunfod . '"><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfod) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfod . ' </a>- ' . $zona . ' - ' . $clientevrm . '</b> (' . $nom_emprvrm . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfod) . '</label>
                           <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                         </div>';
                                                                            }
                                                                        }
                                                                    }

                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin martes -->


                                        <?php
                                        }
                                    }
                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart3 = '1'  ORDER BY `position3` ASC");
                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                        $idcdm3 = $rowclientesrl["id"];
                                        $sqlordenfm3 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm3' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm3 = mysqli_fetch_array($sqlordenfm3)) {
                                        ?>
                                            <!-- miercoles -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline3" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Miercoles</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline3" <?= $exspandia3 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton3" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton3" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>
                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart3 = '1'  ORDER BY `position3` ASC");
                                                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                                                        $idcll = $rowclientesrl["id"];
                                                                        $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                        $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll' and col>'1' and col<'8' and id_hoja='0'");
                                                                        while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                            $estal = "ESTA";
                                                                            $idordeniunfo = $rowordenl['id'];

                                                                            $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                            $idcodclil = base64_encode($idcll);
                                                                            $clienterl = $rowclientesrl["nom_contac"];
                                                                            $clientevrl = strtoupper($clienterl);
                                                                            $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                            $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                            if ($estal == "ESTA") {
                                                                                $estael3 = '1';


                                                                                echo '
                            <div class="custom-control custom-checkbox">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            
                            <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll . '">
                            <input type="checkbox" class="custom-control-input" id="idorden3' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>



                            
                            <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                           <label class="custom-control-label" for="idorden3' . $idordeniunfo . '"><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                         </div>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin miercoles -->

                                        <?php
                                        }
                                    }
                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart4 = '1'  ORDER BY `position4` ASC");
                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                        $idcdm4 = $rowclientesrl["id"];
                                        $sqlordenfm4 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm4' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm4 = mysqli_fetch_array($sqlordenfm4)) {
                                        ?>

                                            <!-- jueves -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline4" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Jueves</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline4" <?= $exspandia4 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton4" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton4" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>
                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart4 = '1' ORDER BY `position4` ASC");
                                                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                                                        $idcll = $rowclientesrl["id"];
                                                                        $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                        $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll' and col>'1' and col<'8' and id_hoja='0'");
                                                                        while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                            $idordeniunfo = $rowordenl['id'];
                                                                            $estal = "ESTA";


                                                                            $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                            $idcodclil = base64_encode($idcll);
                                                                            $clienterl = $rowclientesrl["nom_contac"];
                                                                            $clientevrl = strtoupper($clienterl);
                                                                            $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                            $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                            if ($estal == "ESTA") {

                                                                                $estael4 = '1';

                                                                                echo ' 
                            <div class="custom-control custom-checkbox">
                            <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            
                             <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll . '">
                            <input type="checkbox" class="custom-control-input" id="idorden4' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>
                            
                            <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                           <label class="custom-control-label" for="idorden4' . $idordeniunfo . '">
                            <a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                         </div>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin jueves -->


                                        <?php
                                        }
                                    }
                                    $sqlclientesrl5 = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart5 = '1'  ORDER BY `position5` ASC");
                                    while ($rowclientesrl5 = mysqli_fetch_array($sqlclientesrl5)) {

                                        $idcdm5 = $rowclientesrl5["id"];
                                        $sqlordenfm5 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm5' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm5 = mysqli_fetch_array($sqlordenfm5)) {
                                        ?>

                                            <!-- jueves -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline5" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Viernes</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline5" <?= $exspandia5 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton5" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton5" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>
                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl5 = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart5 = '1' ORDER BY `position5` ASC");
                                                                    while ($rowclientesrl5 = mysqli_fetch_array($sqlclientesrl5)) {

                                                                        $idcll5 = $rowclientesrl5["id"];
                                                                        $estal5 = ${"idcll" . $rowclientesrl5["id"]};

                                                                        $sqlordenfl5 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll5' and col>'1' and col<'8' and id_hoja='0'");
                                                                        while ($rowordenl5 = mysqli_fetch_array($sqlordenfl5)) {
                                                                            $estal5 = "ESTA";
                                                                            $idordeniunfo = $rowordenl5['id'];

                                                                            $zona = NombreZona($rjdhfbpqj, $idcll5);
                                                                            $idcodclil5 = base64_encode($idcll5);
                                                                            $clienterl5 = $rowclientesrl5["nom_contac"];
                                                                            $clientevrl5 = strtoupper($clienterl5);
                                                                            $nom_emprrl5 = $rowclientesrl5["nom_empr"];
                                                                            $nom_emprvrl5 = ucfirst(strtolower($nom_emprrl5));

                                                                            if ($estal5 == "ESTA") {
                                                                                $estael5 = '1';



                                                                                echo '
                            <div class="custom-control custom-checkbox">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            
                             <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll5 . '">
                            <input type="checkbox" class="custom-control-input" id="idorden5' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>
                            
                            <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                           <label class="custom-control-label" for="idorden5' . $idordeniunfo . '"><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $clientevrl5 . '</b> (' . $nom_emprvrl5 . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . ' </label>
                         </div>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin viernes-->


                                        <?php
                                        }
                                    }
                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart6 = '1'  ORDER BY `position6` ASC");
                                    while ($rowclientesrl6 = mysqli_fetch_array($sqlclientesrl)) {

                                        $idcdm6 = $rowclientesrl6["id"];
                                        $sqlordenfm6 = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcdm6' and col>'1' and col<'8' and id_hoja='0'");
                                        if ($rowordnm6 = mysqli_fetch_array($sqlordenfm6)) {
                                        ?>

                                            <!-- sabado -->

                                            <div class="col-lg-12">



                                                <div class="accordion accordion-outline" id="accordionoutline">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOneoutline">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline6" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                    <i class="dripicons-arrow-left"></i> Clientes del Sábado</button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapseOneoutline6" <?= $exspandia6 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                            <div class="card-body">
                                                                <button id="unselectAllButton6" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                                <button id="selectAllButton6" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                                <br><br>
                                                                <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                    <?php
                                                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart6 = '1' ORDER BY `position6` ASC");
                                                                    while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                                                        $idcll = $rowclientesrl["id"];
                                                                        $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                        $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll'  and col>'1' and col<'8' and id_hoja='0'");
                                                                        while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                            $estal = "ESTA";
                                                                            $idordeniunfo = $rowordenl['id'];


                                                                            $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                            $idcodclil = base64_encode($idcll);
                                                                            $clienterl = $rowclientesrl["nom_contac"];
                                                                            $clientevrl = strtoupper($clienterl);
                                                                            $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                            $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                            if ($estal == "ESTA") {
                                                                                $estael6 = '1';


                                                                                echo '
                            <div class="custom-control custom-checkbox">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            
                             <input type="hidden" id="juhytm3" name="juhytm[]" value="' . $idcll . '">
                            <input type="checkbox" class="custom-control-input" id="idorden6' . $idordeniunfo . '"  name="idorden[]"  value="' . $idordeniunfo . '" checked>
                            
                            
                            <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                           <label class="custom-control-label" for="idorden6' . $idordeniunfo . '"><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ') ' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                         </div>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                    ?>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- fin sabado -->

                                    <?php
                                        }
                                    }

                                    ?>

                                    <!-- domingo -->

                                    <?php
                                    $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart0 = '1'  ORDER BY `position0` ASC");
                                    if ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) { ?>

                                        <div class="col-lg-12">



                                            <div class="accordion accordion-outline" id="accordionoutline">
                                                <div class="card">
                                                    <div class="card-header" id="headingOneoutline">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOneoutline0" aria-expanded="true" aria-controls="collapseOneoutline">
                                                                <i class="dripicons-arrow-left"></i> Clientes del Domingo</button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseOneoutline0" <?= $exspandia0 ?> aria-labelledby="headingOneoutline" data-parent="#accordionoutline">
                                                        <div class="card-body">
                                                            <button id="unselectAllButton7" class="btn btn-info btn-sm">Desmarcar Todos</button>
                                                            <button id="selectAllButton7" class="btn btn-info btn-sm">Seleccionar Todos</button>
                                                            <br><br>
                                                            <form action="agregar_hoja_b" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
                                                                <?php
                                                                $sqlclientesrl = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where dia_repart0 = '1' ORDER BY `position0` ASC");
                                                                while ($rowclientesrl = mysqli_fetch_array($sqlclientesrl)) {

                                                                    $idcll = $rowclientesrl["id"];
                                                                    $estal = ${"idcll" . $rowclientesrl["id"]};

                                                                    $sqlordenfl = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente ='$idcll' and col>'1' and col<'8' and id_hoja='0'");
                                                                    while ($rowordenl = mysqli_fetch_array($sqlordenfl)) {
                                                                        $estal = "ESTA";
                                                                        $idordeniunfo = $rowordenl['id'];

                                                                        $zona = NombreZona($rjdhfbpqj, $idcll);
                                                                        $idcodclil = base64_encode($idcll);
                                                                        $clienterl = $rowclientesrl["nom_contac"];
                                                                        $clientevrl = strtoupper($clienterl);
                                                                        $nom_emprrl = $rowclientesrl["nom_empr"];
                                                                        $nom_emprvrl = ucfirst(strtolower($nom_emprrl));

                                                                        if ($estal == "ESTA") {
                                                                            $estael7 = '1';


                                                                            echo '
                            <div class="custom-control custom-checkbox">
                             <input type="hidden" id="id_hoja" name="id_hoja" value="' . $idhoja . '">
                            <input type="hidden" id="kjdsdsd" name="kjdsdsd[]" value="' . $dayver . '">
                            <input type="hidden" id="hdnsbloekdjgsd" name="hdnsbloekdjgsd[]" value="' . $fechadecod . '">
                             <input type="hidden" id="idorden" name="idorden[]" value="' . $idordeniunfo . '">
                            <input type="hidden" id="fechaper" name="fechaper" value="' . $diaselec . '">
                            <input type="checkbox" class="custom-control-input" id="juhytm0' . $rowclientesrl["id"] . '"  name="juhytm[]"  value="' . $idcll . '" checked>
                            <input type="hidden" id="hdnskdjjgsd" name="hdnskdjjgsd" value="' . $idcamcod . '">
                           <label class="custom-control-label" for="juhytm0' . $rowclientesrl["id"] . '"><a href="/nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . base64_encode($idordeniunfo) . '" target="_blank" tabindex="-1"> Nº' . $idordeniunfo . ' </a>- ' . $zona . ' - ' . $zona . ' - ' . $clientevrl . '</b> (' . $nom_emprvrl . ')' . StatusOrden($rjdhfbpqj, $idordeniunfo) . '</label>
                         </div>';
                                                                        }
                                                                    }
                                                                }
                                                                echo ' <br><button type="submit" class="btn btn-primary">Enviar</button>';

                                                                ?>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- fin domingo -->


                                    <?php
                                    }

                                    ?>
                                </div>

                            </div>
                            <!-- fin hoja 1 -->

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- End col -->
















        <?php include('../template/pie.php');
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('table tbody').sortable({
                    update: function(event, ui) {
                        $(this).children().each(function(index1) {
                            if ($(this).attr('data-position') != (index1 + 1)) {
                                $(this).attr('data-position', (index1 + 1)).addClass('updated');
                            }
                        });

                        saveNewPositions1();
                    }
                });
            });

            function saveNewPositions1() {
                var positions1 = [];
                $('.updated').each(function() {
                    positions1.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                    $(this).removeClass('updated');
                });

                $.ajax({
                    url: 'ver_hoja_de_ruta?hdnsbloekdjgsd=<?= $diaselec ?>&hidjjhdho=<?= $idhoja ?>',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        update1: 1,
                        positions1: positions1
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            }
            /* fin1 */



            document.addEventListener("DOMContentLoaded", function() {
                // Función para seleccionar/desmarcar todos los checkboxes dentro de un formulario específico
                function toggleCheckboxes(form, checkState) {
                    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = checkState;
                    });
                }

                // Configurar eventos para cada grupo
                const groups = [{
                        selectButtonId: 'selectAllButtonS',
                        unselectButtonId: 'unselectAllButtonS',
                        formSelector: '#collapseOneoutline1wr form'
                    },
                    {
                        selectButtonId: 'selectAllButton2',
                        unselectButtonId: 'unselectAllButton2',
                        formSelector: '#collapseOneoutline2 form'
                    },
                ];

                groups.forEach(group => {
                    const selectButton = document.getElementById(group.selectButtonId);
                    const unselectButton = document.getElementById(group.unselectButtonId);
                    const form = document.querySelector(group.formSelector);

                    if (selectButton && unselectButton && form) {
                        // Seleccionar todos
                        selectButton.addEventListener('click', () => toggleCheckboxes(form, true));
                        // Desmarcar todos
                        unselectButton.addEventListener('click', () => toggleCheckboxes(form, false));
                    }
                });
            });





            document.addEventListener("DOMContentLoaded", function() {
                // Función para seleccionar/desmarcar todos los checkboxes dentro de un formulario específico
                function toggleCheckboxes(form, checkState) {
                    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = checkState;
                    });
                }

                // Configurar eventos para cada grupo
                const groups = [{
                        selectButtonId: 'selectAllButtonS',
                        unselectButtonId: 'unselectAllButtonS',
                        formSelector: '#collapseOneoutline1wr form'
                    },
                    {
                        selectButtonId: 'selectAllButton1',
                        unselectButtonId: 'unselectAllButton1',
                        formSelector: '#collapseOneoutline1 form'
                    },
                    {
                        selectButtonId: 'selectAllButton2',
                        unselectButtonId: 'unselectAllButton2',
                        formSelector: '#collapseOneoutline2 form'
                    },
                    {
                        selectButtonId: 'selectAllButton3',
                        unselectButtonId: 'unselectAllButton3',
                        formSelector: '#collapseOneoutline3 form'
                    },
                    {
                        selectButtonId: 'selectAllButton4',
                        unselectButtonId: 'unselectAllButton4',
                        formSelector: '#collapseOneoutline4 form'
                    },
                    {
                        selectButtonId: 'selectAllButton5',
                        unselectButtonId: 'unselectAllButton5',
                        formSelector: '#collapseOneoutline5 form'
                    },
                    {
                        selectButtonId: 'selectAllButton6',
                        unselectButtonId: 'unselectAllButton6',
                        formSelector: '#collapseOneoutline6 form'
                    },
                    {
                        selectButtonId: 'selectAllButton7',
                        unselectButtonId: 'unselectAllButton7',
                        formSelector: '#collapseOneoutline7 form'
                    },
                ];
                groups.forEach(group => {
                    const selectButton = document.getElementById(group.selectButtonId);
                    const unselectButton = document.getElementById(group.unselectButtonId);
                    const form = document.querySelector(group.formSelector);

                    if (selectButton && unselectButton && form) {
                        // Seleccionar todos
                        selectButton.addEventListener('click', () => toggleCheckboxes(form, true));
                        // Desmarcar todos
                        unselectButton.addEventListener('click', () => toggleCheckboxes(form, false));
                    }
                });
            });
        </script>



        <div id="muestrofavoritos"> </div>

        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <script>
            function ajax_pedir(id_orden, nota) {
                var parametros = {
                    "id_orden": id_orden,
                    "nota": nota
                };
                $.ajax({
                    data: parametros,
                    url: 'insert_pedir.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestrofavoritos").html('');
                    },
                    success: function(response) {
                        $("#muestrofavoritos").html(response);
                    }
                });
            }
        </script>