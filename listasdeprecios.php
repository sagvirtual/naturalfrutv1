<?php include('f54du60ig65.php');
include('lusuarios/login.php');
include('lusuarios/redirec.php');
include('template/cabezal.php');


unset($_SESSION["jfnddhom"]);
unset($_SESSION["pagina"]);
unset($_SESSION["busquedads"]);

if($tipo_usuario=="0"){
?>


<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-12">
            <h4 class="page-title"><i class="dripicons-document"></i> Listado de Precios</h4>

        </div>

    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col Lista de precios Mayorista -->
        <div class="col-lg-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title" style="display: inline-block;">Lista de precios Mayorista</h5>
                    <a href="/listadeprecio?jkdlsm=0" style="float: right; margin-left: auto;"><button class="btn btn-primary"><i class="dripicons-document"></i> Agregar Lista de precios</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th style="width: 100px;">Fecha</th>
                                    <th>Nombre</th>
                                    <th style="width: 200px; text-align:center;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqleditlistaa = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '0' ORDER BY `editlista`.`fecha` DESC LIMIT 5");
                                while ($rowlistaa = mysqli_fetch_array($sqleditlistaa)) {
                                    $idmayoris = $rowlistaa["id"];
                                    $idcod = base64_encode($idmayoris);
                                    $idmay = $idmay + 1;

                                    echo '<tr>
                                    <td style="color: black;"> ' . date('d/m/Y', strtotime($rowlistaa["fecha"])) . '</td>
                                              
                                                <td style="color: black;">Lista Mayorista ' . date('d-m-Y', strtotime($rowlistaa["fecha"])) . '.pdf </td>
                                               
                                                <td style="width: 200px; text-align:center;" >
                                                    <div class="button-list">
                                                    ';

                                    if ($idmay == '1') {
                                        echo ' <a href="/listadeprecio/listaedit?jfndhom=' . $idcod . '&pagina=999" class="btn btn-success-rgba" title="Editar Lista de Precios"><i class="ri-pencil-line"></i>
                                                        </a>';
                                    }

                                    echo '
                                                        <a href="/listadeprecio?/lista_pdf?jfndhom=' . $idcod . '" class="btn btn-dark-rgba" title="Descargar Lista de Precios">
                                                        <i class="dripicons-download"></i></a>
                                                        ';

                                    if ($idmay == '1') {
                                        echo ' <a href="javascript:eliminar(' . "'/listadeprecio/mlkdths?" . 'juhytm=' . $idcod . '&fechlis=' . $rowlistaa["fecha"] . '&tipolist=0' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';
                                    }

                                    echo ' 
                                                   
                                                   </div>
                                                </td>
                                              </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href=" /lproductos/orden_productos" style="float: left; margin-left: auto;"><button class="btn btn-dark">Ordenar productos</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col  -->
       
                <!-- Start col Lista de precios precios especiales -->
                <div class="col-lg-10" style="display:none;">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title" style="display: inline-block;">Lista de precios Especiales</h5>
                    <a href="/listadeprecio?jkdlsm=1" style="float: right; margin-left: auto;"><button class="btn btn-primary"><i class="dripicons-document"></i> Agregar Lista de precios</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th style="width: 100px;">Fecha</th>
                                    <th>Nombre</th>
                                    <th style="width: 200px; text-align:center;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlespecia = mysqli_query($rjdhfbpqj, "SELECT * FROM editlista Where tipolista = '1' ORDER BY `editlista`.`fecha` DESC LIMIT 5");
                                while ($rowlistab = mysqli_fetch_array($sqlespecia)) {
                                    $ideespecial = $rowlistab["id"];
                                    $idcode = base64_encode($ideespecial);
                                    $idmaye = $idmaye + 1;

                                    echo '<tr>
                                    <td style="color: black;"> ' . date('d/m/Y', strtotime($rowlistab["fecha"])) . '</td>
                                              
                                                <td style="color: black;">Lista Especial ' . date('d-m-Y', strtotime($rowlistab["fecha"])) . '.pdf </td>
                                               
                                                <td style="width: 200px; text-align:center;" >
                                                    <div class="button-list">
                                                    ';

                                    if ($idmaye == '1') {
                                        echo ' <a href="/listadeprecio/listaedit?jfndhom=' . $idcode . '" class="btn btn-success-rgba" title="Editar Lista de Precios"><i class="ri-pencil-line"></i>
                                                        </a>';
                                    }

                                    echo '
                                                        <a href="/listadeprecio?jfndhom=' . $idcode . '" class="btn btn-dark-rgba" title="Descargar Lista de Precios">
                                                        <i class="dripicons-download"></i></a>
                                                        ';

                                    if ($idmaye == '1') {
                                        echo ' <a href="javascript:eliminar(' . "'/listadeprecio/mlkdths?" . 'juhytm=' . $idcode . '&fechlis=' . $rowlistab["fecha"] . '&tipolist=' . $rowlistab["tipolist"] . '' . "'" . ')" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></a>';
                                    }

                                    echo ' 
                                                   
                                                   </div>
                                                </td>
                                              </tr>';
                                }
                                mysqli_close($rjdhfbpqj);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
        <!-- End col  -->















        <?php include('template/pie.php'); ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        <?php
         
        }else{
            echo ("<script language='JavaScript' type='text/javascript'>");
                    echo ("location.href='../'");
                    echo ("</script>"); 
            }
         
        ?>