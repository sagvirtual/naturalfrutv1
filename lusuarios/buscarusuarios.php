<?php include('../f54du60ig65.php');
include('login.php');
$buscar = $_POST['buscar'];
include('../funciones/funcUsuario.php');
?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<script>
    $('#default-datatable').DataTable({
        "order": [
            [0, "asc"]
        ],
        responsive: true
    });
</script>
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>


                                    <th>Nombre</th>
                                    <th>WhatsApp</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Tipo</th>
                                    <th>Camioneta</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios  Where  nom_contac like '%$buscar%' ORDER BY `tipo_cliente` ASC");
                                while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
                                    $id = $rowusuarios["id"];
                                    $camioneta = $rowusuarios["camioneta"];
                                    $cli_usuario = base64_decode($rowusuarios["cli_usuario"]);
                                    $cli_pass = base64_decode($rowusuarios["cli_pass"]);
                                    $picking = $rowusuarios["piking"];
                                    if ($picking == 1) {

                                        $comopick = "(Solo asignado)";
                                    } else {

                                        $comopick = "";
                                    }

                                    $wsp = $rowusuarios["wsp"];
                                    $tipo_cliente = $rowusuarios["tipo_cliente"];
                                    $idcod = base64_encode($id);
                                    $tipo = TipoUsuario($rjdhfbpqj, $id);

                                    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM camionetas Where id='$camioneta'");
                                    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {

                                        $nomcamione = $rowcamionetas['nombre'];
                                    } else {
                                        $nomcamione = "";
                                    }
                                    if ($tipo_usuario == '0') {
                                        echo '
                                          <tr>
                                           
                                           
                                             <td style="color: black;">' . $rowusuarios["nom_contac"] . '</td>   
                                             
                                              <td>';
                                        if ($rowusuarios["wsp"] != '0') {
                                            echo '<a href="https://api.whatsapp.com/send?phone=54' . $rowusuarios["wsp"] . '&text=Hola" target="_blank"><i class="socicon-whatsapp"></i> ' . $rowusuarios["wsp"] . '</a>';
                                        }
                                        echo '<td>' . $cli_usuario . '</td>
                                              <td>' . $cli_pass . '</td>
                                              <td><span class="badge badge-primary-inverse">' . $tipo . '</span> <span class="badge badge-secondary">' . $comopick . '</span></td>
                                              <td>' . $nomcamione . '</td>
                                            <td>
                                                <div class="button-list">
                                              
                                                    <a href="/lusuarios/?jnnfsc=' . $idcod . '" class="btn btn-success-rgba" title="Editar Usuario Tipo ' . $tipo_cliente . '|' . $id . '"><i class="ri-pencil-line"></i></a>';
                                        if ($tipo_cliente != "0") {
                                            echo ' <a href="javascript:eliminar(' . "'/lusuarios/mlkdths?" . 'jnnfsc=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"> 
                                                   <i class="ri-delete-bin-3-line"></i></a>';
                                        }
                                        echo ' </div>
                                            </td>
                                        </tr>';
                                    } else {

                                        if ($tipo_cliente == "34" || $tipo_cliente == "56") {
                                            echo '
                                          <tr>
                                           
                                           
                                             <td style="color: black;">' . $rowusuarios["nom_contac"] . '</td>   
                                             
                                              <td>';
                                            if ($rowusuarios["wsp"] != '0') {
                                                echo '<a href="https://api.whatsapp.com/send?phone=54' . $rowusuarios["wsp"] . '&text=Hola" target="_blank"><i class="socicon-whatsapp"></i>' . $rowusuarios["wsp"] . '</a>';
                                            }
                                            echo '<td></td>
                                              <td></td>
                                              <td><span class="badge badge-primary-inverse"> ' . $tipo . '</span></td>
                                              <td>' . $nomcamione . '</td>
                                            <td>
                                                <div class="button-list">
                                              
                                                    <a href="/lusuarios/?jnnfsc=' . $idcod . '" class="btn btn-success-rgba" title="Editar Usuario"><i class="ri-pencil-line"></i></a>';
                                            if ($tipo_cliente != "0") {
                                                /*    echo ' <a href="javascript:eliminar(' . "'/lusuarios/mlkdths?" . 'jnnfsc=' . $idcod . '' . "'" . ')" class="btn btn-danger-rgba"> 
                                                   <i class="ri-delete-bin-3-line"></i></a>'; */
                                            }
                                            echo ' </div>
                                            </td>
                                        </tr>';
                                        }
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->