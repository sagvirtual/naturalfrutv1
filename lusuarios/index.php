<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('../template/cabezal.php');
$error = $_GET['error'];
$idcod = $_GET['jnnfsc'];
$id = base64_decode($idcod);




$sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id = '$id'");
if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
    $id_rubro = $rowusuarios["id_rubro"];
    $idrubcod = base64_encode($id_rubro);
    $estado = $rowusuarios["estado"];
    $tipo_cliente = $rowusuarios["tipo_cliente"];
    $cli_usuario = base64_decode($rowusuarios["cli_usuario"]);
    $cli_pass = base64_decode($rowusuarios["cli_pass"]);
    $nom_contac = $rowusuarios["nom_contac"];
    $wsp = $rowusuarios["wsp"];
    $fecha = $rowusuarios["fecha"];;
    $camionetaid = $rowusuarios["camioneta"];
    $check_reparto = $rowusuarios["piking"];
} else {
    if ($error == "1") {
        $estado = $_SESSION["estado"];
        $tipo_cliente = $_SESSION["tipo_cliente"];
        $cli_usuario = $_SESSION["cli_usuario"];
        $cli_pass = $_SESSION["cli_pass"];
        $nom_contac = $_SESSION["nom_contac"];
        $wsp = $_SESSION["wsp"];
        $camioneta = $_SESSION["camioneta"];
        $check_reparto = $_SESSION["check_reparto"];
    }
    $foto = "/assets/images/no_image.png";
}
if ($estado == "0") {
    $estadosel0 = "selected";
}
if ($estado == "1") {
    $estadosel1 = "selected";
}

//
if ($tipo_cliente == "0") {
    $tipo_usuariosel0 = "selected";
}
if ($tipo_cliente == "1") {
    $tipo_usuariosel1 = "selected";
}
if ($tipo_cliente == "2") {
    $tipo_usuariosel2 = "selected";
}
if ($tipo_cliente == "21") {
    $tipo_usuariosel21 = "selected";
}
if ($tipo_cliente == "22") {
    $tipo_usuariosel22 = "selected";
}
if ($tipo_cliente == "27") {
    $tipo_usuariosel27 = "selected";
}
if ($tipo_cliente == "29") {
    $tipo_usuariosel29 = "selected";
}
if ($tipo_cliente == "30") {
    $tipo_usuariosel30 = "selected";
}
if ($tipo_cliente == "31") {
    $tipo_usuariosel31 = "selected";
}
if ($tipo_cliente == "37") {
    $tipo_usuariosel37 = "selected";
}
if ($tipo_cliente == "3") {
    $tipo_usuariosel3 = "selected";
}
if ($tipo_cliente == "33") {
    $tipo_usuariosel33 = "selected";
}
if ($tipo_cliente == "34") {
    $tipo_usuariosel34 = "selected";
}
if ($tipo_cliente == "56") {
    $tipo_usuariosel56 = "selected";
}
if ($tipo_cliente == "57") {
    $tipo_usuariosel57 = "selected";
}
if ($check_reparto == "1") {
    $chekpiking = "checked";
}


if ($tipo_usuario == '0') {
    $ocultas = '';
    $ocublo = '';
} else {
    $ocultas = 'style="display:none;"';
    $ocublo = 'disabled';
}

?>
<!-- Start Breadcrumbbar -->
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><i class="feather icon-user-plus mr-2"></i> Usuario</h4>

        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/usuarios"> <button class="btn btn-primary"><i class="sl-icon-people"></i>Listar Usuarios</button></a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<form action="insert_usuarios.php" id="formda" name="formda" method="post" enctype="multipart/form-data" target="_parent">
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30" <?= $ocultas ?>>
                    <div class="card-header">
                        <h5 class="card-title">Datos</h5>

                        <?php if ($error == "1") {
                            echo '<br><div class="alert alert-danger">
                                <strong>Falta completar datos!</strong><br> Nombre, Usuario y Contraseña deben estar completados.
                               </div>';
                        }
                        ?>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nombre:</label>
                                <input type="text" class="form-control" id="nom_contac" name="nom_contac" value="<?= $nom_contac ?>">
                            </div>
                            <div class="form-group col-md-6" <?= $ocultas ?>>
                                <label for="inputEmail4"> WhatsApp</label>
                                <input type="number" class="form-control" id="wsp" name="wsp" value="<?= $wsp ?>">
                                <input type="hidden" id="jjdnhsa" name="jjdnhsa" value="<?= $idcod ?>">
                            </div>



                        </div>








                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Parametros</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-row" <?= $ocultas ?>>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Usuario</label>
                                <input type="text" class="form-control" id="cli_usuario" name="cli_usuario" value="<?= $cli_usuario ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Contraseña</label>
                                <input type="text" class="form-control" id="cli_pass" name="cli_pass" value="<?= $cli_pass ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Estado</label>
                                <select class="custom-select" id="estado" name="estado">
                                    <option value="0" <?= $estadosel0 ?>>Activo</option>
                                    <option value="1" <?= $estadosel1 ?>>Inactivo</option>
                                </select>
                            </div>

                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Tipo de Usuario</label><br>
                                <select class="custom-select" name="tipo_cliente" id="tipo_cliente">
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="0" <?= $tipo_usuariosel0 ?>>General</option>
                                    <? } ?>
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="1" <?= $tipo_usuariosel1 ?>>Administración</option>
                                    <? } ?>
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="37" <?= $tipo_usuariosel37 ?>>Tesorería</option>
                                    <? } ?>
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="33" <?= $tipo_usuariosel33 ?>>Jefa Ventas</option>
                                    <? } ?>
                                    <option value="34" <?= $tipo_usuariosel34 ?>>Picking</option>
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="3" <?= $tipo_usuariosel3 ?>>Ventas</option>
                                        <option value="30" <?= $tipo_usuariosel30 ?>>Preparación de Pedidos</option>
                                        <option value="31" <?= $tipo_usuariosel31 ?>>Recepción de Pedidos</option>
                                        <option value="21" <?= $tipo_usuariosel21 ?>>Envasado Planta Baja</option>
                                        <option value="22" <?= $tipo_usuariosel22 ?>>Envasado Planta Alta</option>
                                        <option value="2" <?= $tipo_usuariosel2 ?>>Gestíon de Deposito</option>
                                        <option value="29" <?= $tipo_usuariosel29 ?>>Deposito Planta Alta</option>
                                    <? } ?>
                                    <option value="56" <?= $tipo_usuariosel56 ?>>Inventario</option>
                                    <? if ($tipo_usuario == '0') { ?>
                                        <option value="57" <?= $tipo_usuariosel57 ?>>Stock</option>
                                        <option value="27" <?= $tipo_usuariosel27 ?>>Reparto </option>
                                    <? } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">

                            </div>

                            <div class="form-group col-md-4" id="bloque_camioneta">
                                <div class="alert alert-primary" role="alert">
                                    <b>Camioneta</b>
                                    <select id="camioneta" name="camioneta" class="custom-select">
                                        <option value="0">----</option>
                                        <?php
                                        $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas ORDER BY id ASC");
                                        while ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
                                            echo '<option value="' . $rowcamionetas["id"] . '"';
                                            if ($camionetaid == $rowcamionetas["id"]) {
                                                echo ' selected';
                                            }
                                            echo '>' . $rowcamionetas["nombre"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>


                        </div>


                        <!-- Check visible solo si es Picking -->
                        <div id="bloque_checkreparto" style="display:none; margin-top:10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check_reparto" id="check_reparto" value="1" <?= $chekpiking ?>>
                                <label class="form-check-label" for="check_reparto">
                                    Picking Pedidos Asignado previamente
                                </label>
                            </div>
                        </div>

                    </div>


                </div>








            </div>




            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Datos</button>
            </div>
        </div>






    </div>
    </div>
    </div>
    <!-- End col -->
</form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoCliente = document.getElementById("tipo_cliente");
        const bloqueCamioneta = document.getElementById("bloque_camioneta");
        const bloqueCheckReparto = document.getElementById("bloque_checkreparto");

        function actualizarVista() {
            const valor = tipoCliente.value;
            if (valor === "27") {
                // Reparto: mostrar camioneta, ocultar checkbox
                bloqueCamioneta.style.display = "block";
                bloqueCheckReparto.style.display = "none";
            } else if (valor === "34") {
                // Picking: mostrar camioneta + checkbox
                bloqueCamioneta.style.display = "none";
                bloqueCheckReparto.style.display = "block";
            } else {
                // Otros: ocultar todo
                bloqueCamioneta.style.display = "none";
                bloqueCheckReparto.style.display = "none";
            }
        }

        tipoCliente.addEventListener("change", actualizarVista);
        actualizarVista(); // Al cargar
    });
</script>







<?php include('../template/pie.php'); ?>