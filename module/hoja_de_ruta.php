<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');


$fechadecod = $fechahoy; 




$fechaexplo = explode("-", $fechadecod);
$diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

$fechats = strtotime($fechadecod);
$dayver = date('w', $fechats);

$diaselec = $fechaexplo[2];

//extrigo nombre de la camioneta
$sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id = ' $idcamioneta'");
if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
    $nombrecamio = $rowcamionetas["nombre"];
    $idcamioneta = $rowcamionetas["id"];
}
//




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
}





?>


<style>
    a {
        color: black;
    }
</style>

<div class="contentbar">


    <div class="col-lg-12">
        <!-- Start row -->
        <div class="row">
            <div class="card m-b-30" style="width:100%;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-lg-8">
                            <? echo '<h3>' . $numdia . '  ' . $dianombr . '  ' . $diaymes . '</h3>'; ?>


                        </div>


                    </div>
                </div>


                <div class="row">

                    <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">


                            <!-- Start col -->
                            <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Completados</button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                   <!-- completados -->
                                                   <table class="table">
                             
                                <tbody>
                                    <?php



                                    $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.total, e.fecha, e.finalizada, e.id as idorden, u.id, u.fecha, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.position6, u.position0, u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, u.camioneta FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' and u.camioneta='$idcamioneta' and e.finalizada='1' ORDER BY `position$dayver` ASC");
                                    while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
                                        $id = $rowcategorias["id"];


                                        $mostrarr = ${"mostrarr" . $id};
                                        $idorden = $rowcategorias["idorden"];
                                        $fila = $fila + 1;
                                        $idcod = base64_encode($id);
                                        $idordencod = base64_encode($idorden);
                                        $cliente = $rowcategorias["address"];
                                        $clientev = strtoupper($cliente);
                                        $nom_empr = $rowcategorias["nom_empr"];
                                        $nom_emprv = ucfirst(strtolower($nom_empr));
                                        if (($fila % 2) == 0) {
                                            //Es un número par
                                            $colortr = '#fff';
                                        } else {
                                            //Es un número impar
                                            $colortr = '#F1F1F1';
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



                                        echo '<tr>';

                                        $modopord = ${"modopord" . $idorden};
                                        $verde = ${"verde" . $idorden};
                                        $rosa = ${"rosa" . $idorden};
                                        //acabusco si hay item con congelado y fresco
                                        $querycliordnv = mysqli_query($rjdhfbpqj, "SELECT i.id_producto, i.id_orden, p.id, p.nombre, p.modo_producto  
                                                                FROM item_orden i INNER JOIN productos p ON i.id_producto = p.id WHERE i.id_orden='$idorden'");
                                        while ($rowcategoriasv = mysqli_fetch_array($querycliordnv)) {
                                            $modopord = $rowcategoriasv['modo_producto'];


                                            if ($modopord == "0") {
                                                $verde = "1";
                                            }
                                            if ($modopord == "1") {
                                                $rosa = "1";
                                            }



                                            $modopord = $rowcategoriasv['modo_producto'];
                                        }




                                        echo '
                                                        <td style="color: black; text-align:center; padding:0px; background-color:#60FF76;">' . $fila . ')</td>
                                                        <td style="color: black; padding: 0 5px 5px 5px; background-color:#60FF76;"><b>' . $clientev . '</b> (' . $nom_emprv . ') </td>
                                                                    
                                                                <td style="color: black; background-color:#60FF76;"> 
                                                                <div class="button-list">
                                                                        <a href="remito?jfndhom=' . $idordencod . '" class="btn btn-dark-rgba"> #' . $idorden . '</a> 


                                                                       

                                                                </td> 
                                                            </tr>';
                                    }


                                    ?>
                            
                                </tbody>
                            </table>
                       
                                                   <!-- fin completados -->
                                                </div>
                                            </div>
                                        </div>
                            <!-- End col -->






                            <table class="table">
                               
                                    <?php



                                    $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.total, e.fecha, e.finalizada, e.id as idorden, u.id, u.fecha, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.position6, u.position0, u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, u.camioneta FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' and u.camioneta='$idcamioneta' and e.finalizada='0' ORDER BY `position$dayver` ASC");
                                    $cantidado = mysqli_num_rows($querycliordn);
                                    
                                    if($cantidado > 0){

                                        echo ' <thead>
                                        <tr>
                                        
                                        
                                        <th></th>
                                        <th class="text-left">Clientes</th>
                                        <th style="width:10mm;">Remito</th>
                                        <!-- <th>Acción</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>';
                                    }
                                        
                                    
                                    
                                    while ($rowcategorias = mysqli_fetch_array($querycliordn)) {
                                        $id = $rowcategorias["id"];


                                        $mostrarr = ${"mostrarr" . $id};
                                        $idorden = $rowcategorias["idorden"];
                                        $fila = $fila + 1;
                                        $idcod = base64_encode($id);
                                        $idordencod = base64_encode($idorden);
                                        $cliente = $rowcategorias["address"];
                                        $clientev = strtoupper($cliente);
                                        $nom_empr = $rowcategorias["nom_empr"];
                                        $nom_emprv = ucfirst(strtolower($nom_empr));
                                        if (($fila % 2) == 0) {
                                            //Es un número par
                                            $colortr = '#fff';
                                        } else {
                                            //Es un número impar
                                            $colortr = '#F1F1F1';
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



                                        echo '<tr>';

                                        $modopord = ${"modopord" . $idorden};
                                        $verde = ${"verde" . $idorden};
                                        $rosa = ${"rosa" . $idorden};
                                        //acabusco si hay item con congelado y fresco
                                        $querycliordnv = mysqli_query($rjdhfbpqj, "SELECT i.id_producto, i.id_orden, p.id, p.nombre, p.modo_producto  
                                                                FROM item_orden i INNER JOIN productos p ON i.id_producto = p.id WHERE i.id_orden='$idorden'");
                                        while ($rowcategoriasv = mysqli_fetch_array($querycliordnv)) {
                                            $modopord = $rowcategoriasv['modo_producto'];


                                            if ($modopord == "0") {
                                                $verde = "1";
                                            }
                                            if ($modopord == "1") {
                                                $rosa = "1";
                                            }



                                            $modopord = $rowcategoriasv['modo_producto'];
                                        }




                                        echo '
                                                        <td style="color: black; text-align:center; padding:0px; background-color:' . $colortr . '">' . $fila . ')</td>
                                                        <td style="color: black; padding: 0 5px 5px 5px; background-color:' . $colortr . '"><b>' . $clientev . '</b> (' . $nom_emprv . ') </td>
                                                                    
                                                                <td style="color: black; background-color:' . $colortr . '"> 
                                                                <div class="button-list">
                                                                        <a href="remito?jfndhom=' . $idordencod . '"  class="btn btn-dark-rgba"> #' . $idorden . '</a> 


                                                                       

                                                                </td> 
                                                            </tr>';
                                    }


                                    ?>
                              
                                </tbody>
                            </table>



                        </div>

                    <?php
                     $diadocod = base64_encode($fechahoy); //fecha
                     $diaselec= base64_encode($dayver); //numero de dia de la semana ej 1 lunes
                     $idcamcod= base64_encode($idcamioneta);
                     
                    ?>
                                    <a href="../hoja_de_ruta/print_hoja_de_ruta?hdnsbloekdjgsd=<?= $diadocod ?>&ijkfndt=<?= $diaselec ?>&hdnskdjjgsd=<?= $idcamcod ?>" target="_black" title="Imprimir hoja de ruta">
                                        <button class="btn btn-primary" style="width:100%;"><i class="dripicons-cloud-download"></i> Descargar Hoja de Ruta</button></a>
                               

                    </div>
                </div>


            </div>

        </div>




    </div>
    <!-- End col -->






</div>








<?php include('../template/piecelu.php');
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>