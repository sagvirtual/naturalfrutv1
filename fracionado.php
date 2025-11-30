<?php include('f54du60ig65.php');
include('template/cabezal.php');


?>

<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="dripicons-cutlery"></i> Listado de Rubros para fracionado</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/lrubros"><button class="btn btn-primary"><i class="dripicons-cutlery"></i> Agregar Rubros</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- categoria -->
        <?php

        $sqlrubros = mysqli_query($rjdhfbpqj, "SELECT * FROM rubros ORDER BY `rubros`.`id` ASC");
        while ($rowrubros = mysqli_fetch_array($sqlrubros)) {
            $idrub = $rowrubros["id"];
            $fila = $fila + 1;
            $idrubcod = base64_encode($idrub);
            $comillas = "'";

            $sqlcategorias = ${"sqlcategorias" . $idrub};
            $rowcategorias = ${"rowcategorias" . $idrub};
            $idcat = ${"idcat" . $idrub};
            $idcatcod = ${"idcatcod" . $idrub};
            $sqlf_categoria = ${"sqlf_categoria" . $idrub};
            $rowcategorias = ${"rowcategorias" . $idrub};


            echo '<div class="col-lg-4">
            <div class="card m-b-30">
               
                <div class="card-body">

                    <div class="table-responsive m-b-30">
                    <h5 class="card-title">' . $rowrubros["nombre"] . '</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Categoría</th>
                                    <th scope="col" class="text-center">Fracionar</th>
                                    <th scope="col" class="text-center">Opción</th>
                                </tr>
                            </thead>
                            <tbody>'; ?>


            <?  //categorias  
            $sqlcategorias = mysqli_query($rjdhfbpqj, "SELECT * FROM categorias ORDER BY `position` ASC");
            while ($rowcategorias = mysqli_fetch_array($sqlcategorias)) {
                $idcat = $rowcategorias["id"];
                $filacat = $filacat + 1;
                $idcatcod = base64_encode($idcat);

                $checked = ${"checked" . $idcat};
                $fracionado = ${"fracionado" . $idcat};
                $enlaceper = ${"enlaceper" . $idcat};

                //me fijo si esta fraccionado
                $sqlf_categoria = mysqli_query($rjdhfbpqj, "SELECT * FROM f_categoria Where id_rubro = '$idrub' and id_categoria = '$idcat'");
                if ($rowf_categoria = mysqli_fetch_array($sqlf_categoria)) {

                    $fracionado = $rowf_categoria["fracionado"];

                    if ($fracionado == '1') {
                        $checked = "checked";
                        $enlaceper = '<a href="/f_rubro?jfndhom=' . $idrubcod . '&jfndhomcat=' . $idcatcod . '" class="btn btn-primary-rgba" title="Fraccionamiento Personalizado"><i class="dripicons-link-broken"></i></a>';
                    } else {
                        $checked = "";
                        $enlaceper = '<a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>';
                    }
                }else{$enlaceper = '<a href="#" class="btn btn-secondary-rgba" ><i class="dripicons-link-broken"></i></a>';}



                echo ' <tr>
                                    <td>' . $rowcategorias["nombre"] . '</td>
                                    <td>
                                        <div class="custom-control custom-switch text-center">

                                        <input type="hidden" id="id_rubro' . $filacat . '" name="id_rubro' . $filacat . '" value="' . $idrub . '">
                                        <input type="hidden" id="id_categoria' . $filacat . '" name="id_categoria' . $filacat . '" value="' . $idcat . '">



                                            <input type="checkbox" class="custom-control-input" id="customSwitch' . $filacat . '"  name="customSwitch' . $filacat . '" value="1" onchange="showInput' . $filacat . '()"
                                            onclick="ajax_categoria($';

                echo "('#id_rubro" . $filacat . "').val(), $('#id_categoria" . $filacat . "').val(), $('input:checkbox[name=customSwitch" . $filacat . "]:checked').val());";



                echo '"' . $checked . '>

                                            <label class="custom-control-label" for="customSwitch' . $filacat . '"></label>                                            
                                        </div>
                                    </td>
                                    <td>
                                        <div id="extraInput' . $filacat . '" class="text-center">'.$enlaceper.'</div>

                                        <script>
                                            function showInput' . $filacat . '() {
                                                var selectValue = document.getElementById("customSwitch' . $filacat . '").checked;
                                                var extraInputDiv = document.getElementById("extraInput' . $filacat . '");

                                                if (selectValue) {
                                                    extraInputDiv.innerHTML = ' . $comillas . '<a href="/f_rubro?jfndhom=' . $idrubcod . '&jfndhomcat=' . $idcatcod . '" class="btn btn-primary-rgba" title="Fraccionamiento Personalizado"><i class="dripicons-link-broken"></i></a>' . $comillas . ';
                                                } else {
                                                    extraInputDiv.innerHTML = ' . $comillas . '<a href="#" class="btn btn-secondary-rgba"><i class="dripicons-link-broken"></i></a>' . $comillas . ';
                                                }
                                            }
                                        </script>



                                    </td>
                                </tr>';
            } ?>

        <?php echo '</tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>';
        } ?>
        <!-- End col -->
        <div id="muestrocategorias"> </div>
        <script src="/rubro_fraccionado/ajax_categorias.js"></script>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <!-- End col -->















        <?php include('template/pie.php'); ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>