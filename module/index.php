<?php include('../f54du60ig65.php');
include('../template/cabezalcelu.php');

?>

<div class="contentbar">

    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">

            <!-- Start row -->
            <div class="row">

                <!-- Orden de carga -->



                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a data-toggle="collapse" href="#collapseExampleb" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <li class="media">
                                    <span class="iconbar iconbar-md bg-dark text-white rounded align-self-center mr-3"> <i class="la la-print"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Orden de Carga</h5>
                                            <p class="mb-0">Ingresar</p>
                             
                                        </div>
                                    </li>
                                </a>
                            </ul>            
                        </div>
                        <div class="collapse" id="collapseExampleb">
                            <div class="card card-body">

                                <?php

                                $fechacodhoy = base64_encode($fechahoy);

                                $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores where estado='0'");
                                while ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
                                    $ideProvCod=base64_encode($rowproveedores["id"]);
                                    echo '
                                  
                                    <a href="print_orden_carga.php?hfbbd='.$ideProvCod.'&podjfuu='.$fechacodhoy.'">
                                    <button type="button" class="btn btn-outline-dark btn-block">Imprimir Orden de Carga <br><strong>' . $rowproveedores["empresa"] . '</strong></button></a>
                                  <br>';
                                }

                                ?>


                            </div>
                        </div>
                        
                    </div>
                </div>





                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"> <i class="dripicons-article"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Control de Carga</h5>
                                            <p class="mb-0">Ingresar</p>
                             
                                        </div>
                                    </li>
                                </a>
                            </ul>            
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">

                                <?php

                                $fechacodhoy = base64_encode($fechahoy);

                                $sqlproveedores = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores where estado='0'");
                                while ($rowproveedores = mysqli_fetch_array($sqlproveedores)) {
                                    $ideProvCod=base64_encode($rowproveedores["id"]);
                                    echo '
                                  
                                    <a href="orden_carga?hfbbd='.$ideProvCod.'&podjfuu='.$fechacodhoy.'">
                                    <button type="button" class="btn btn-outline-primary btn-block">' . $rowproveedores["empresa"] . '</button></a>
                                  <br>';
                                }

                                ?>



                            </div>
                        </div>
                        
                    </div>
                </div>




                <!-- End col -->
                
                
                
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <a href="hoja_de_ruta.php">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-primary text-white rounded align-self-center mr-3"> <i class="dripicons-to-do"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Hoja de Ruta</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="caja">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-danger text-white rounded align-self-center mr-3"><i class="feather icon-book-open"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Caja Diaria</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col -->       
         

   



<!-- esto en -->
                    <!-- completados -->
        
                                 <?php


$fechadecod = $fechahoy; 



$fechaexplo = explode("-", $fechadecod);
$diaymes = $fechaexplo[2] . "/" . $fechaexplo[1];

$fechats = strtotime($fechadecod);
$dayver = date('w', $fechats);

$diaselec = $fechaexplo[2];

if (!empty($diahoy)) {
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


                                 $querycliordn = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.finalizada, e.id as idorden, u.id, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.position6, u.position0, u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, u.camioneta FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' and u.camioneta='$idcamioneta' and e.finalizada='0' ORDER BY `position$dayver` ASC");
                                 if ($rowcategorias = mysqli_fetch_array($querycliordn)) {                     
                                     $idus = $rowcategorias["id_cliente"];
                                     $idorden = $rowcategorias["idorden"];
                                     $idordencod = base64_encode($idorden);
                                     $cliente = $rowcategorias["address"].', ('.$rowcategorias["nom_empr"].')';
                                     $clientev = strtoupper($cliente);}else{$finrecorr='1';}
                                     
                                     //el proximo
                                     $querycliordnp = mysqli_query($rjdhfbpqj, "SELECT e.id_cliente, e.finalizada, e.id as idorden, u.id, u.address, u.nom_empr, u.position1, u.position2, u.position3, u.position4, u.position5, u.position6, u.position0, u.dia_repart1, u.dia_repart2, u.dia_repart3, u.dia_repart4, u.dia_repart5, u.dia_repart6, u.dia_repart0, u.estado, u.camioneta FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id WHERE e.fecha='$fechadecod' and u.estado='0' and u.camioneta='$idcamioneta' and e.finalizada='0' and u.id!='$idus' ORDER BY `position$dayver` ASC");
                                     if ($rowcategoriasp = mysqli_fetch_array($querycliordnp)) {                     
                                         $idordenp = $rowcategoriasp["idorden"];
                                         $idordencodp = base64_encode($idordenp);
                                         $clientep = $rowcategoriasp["address"].', ('.$rowcategoriasp["nom_empr"].')';
                                         $clientevp = strtoupper($clientep);
                                         $ultimo='ESTAR EN...';
                                        }else{$nohay='1'; $ultimo='ULTIMO...';}

                                 ?>
                        
                                                <!-- fin completados -->
<!-- fin esto en -->
<? if($finrecorr!='1'){?>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <h5 class="card-title mb-0" style="position: relative; top:-9px; color:blue;"><?=$ultimo?></h5>
                                    <a href="remito?jfndhom=<?= $idordencod?>" >
                                    <div class="border-primary border rounded text-center py-3 mb-3">
                                        <h5 class="card-title text-primary mb-1">#<?=$idorden?></h5>
                                        <p class="text-primary mb-0">Remito</p>
                                    </div></a>

                                </div>
                                <div class="col-6 col-lg-9">
                                    <p><?=$clientev?></p>
                                        <?php porcentajeorden($fechadecod,$rjdhfbpqj);?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? }else{?>

                    <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-12">
                                    <h5 class="card-title mb-0" style="position: relative; top:-9px; color:blue;">Recorrido completo</h5>
                                  
                                    

                                    <span class="float-right" style="position:relative; top:-9px;">100%</span>
                                    <div class="progress mb-3" style="height: 5px;">
   <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> </div>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <? }?>
                <!-- End col -->
                                        <? if($nohay!='1'){?>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30" style="background-color: #EAEAEA;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <h5 class="card-title mb-0" style="position: relative; top:-9px; color:blue">PROXIMO...</h5>
                                    <a href="remito?jfndhom=<?= $idordencodp?>" >
                                    <div class="border-primary border rounded text-center py-3 mb-3">
                                        <h5 class="card-title text-primary mb-1">#<?=$idordenp?></h5>
                                        <p class="text-primary mb-0">Remito</p>
                                    </div></a>

                                </div>
                                <div class="col-6 col-lg-9">
                                    <p><?=$clientevp?></p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <? }?>
            </div>
            <!-- End row -->






        </div>
        <!-- End row -->

        <? if($finrecorr!='1'){?>
                       <!-- End col -->
                       <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                             
                                    <li class="media">
                                        
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos faltantes</h5>
                                            <?php 
                        
                        $idcamioneta='1';
                        
                         stockcarga($fechahoy,$idcamioneta,$rjdhfbpqj);
                        ?>

                                        </div>
                                    </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <? }else {?>
                                         
                    <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="producstock">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-success text-white rounded align-self-center mr-3">  <i class="feather icon-package"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Productos sin vender</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col -->        <? }?>
                                
                <!-- End col -->

           <!-- End col -->
           <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">

                                <a href="buscremito">
                                    <li class="media">
                                        <span class="iconbar iconbar-md bg-warning text-white rounded align-self-center mr-3"><i class="dripicons-search"></i></span>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1 font-16">Buscar remitos</h5>
                                            <p class="mb-0">Ingresar</p>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col -->       

    </div>
</div>
</div>

</div>
</div>
</div>

<!-- End col -->

<!-- acaaaaa -->














<?php
mysqli_close($rjdhfbpqj);


include('../template/piecelu.php'); ?>