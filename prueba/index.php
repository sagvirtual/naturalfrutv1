<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/funcion_saldoanterior.php');

$buscar = $_POST['buscar'];

function ultimaboleta($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT id FROM orden Where  id_cliente = '$id_clienteint' and col !='8' and col !='31' and col !='32' ORDER BY `orden`.`id` ASC");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $totalresta = $rowpagdeufp["id"];
    } else {
        $totalresta = '99999999999999';
    }
    return $totalresta;
}

function Vencimiento($rjdhfbpqj, $id_clienteint)
{

    $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT fecha FROM orden Where id_cliente = '$id_clienteint'  and col='8' and fin='1' and finalizada='1' ORDER BY `orden`.`fecha` DESC");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {

        $fechaorden = $rowpagdeufp['fecha'];
    }
    return $fechaorden;
}


function diasvenci($rjdhfbpqj, $id_clienteint)
{


    $venci = Vencimiento($rjdhfbpqj, $id_clienteint);
    $fechaFhoy =  date("Y-m-d");

    // Fecha de inicio
    $fechaInicio = new DateTime($venci);

    // Fecha de fin
    $fechaFin = new DateTime($fechaFhoy);
    $intervalo = $fechaInicio->diff($fechaFin);
    // Calcula la diferencia
    return $intervalo->days;
}

function diasvencitotal($rjdhfbpqj, $id_clienteint)
{
    $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, 99999999999);
    $totalven = diasvenci($rjdhfbpqj, $id_clienteint);

    if ($totalven > '1' && $salgral > '1') {
        $diasvedver = $totalven;
    } else {
        $diasvedver = '<i style="color:#ccc;">Sin Deuda</i>';
    }

    return $diasvedver;
}
function NombreZona($rjdhfbpqj, $id_usuario)
{

    $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where  id = '$id_usuario'");
    if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
        $zonaid = $rowusuarios["zona"];


        $sqlleadd = mysqli_query($rjdhfbpqj, "SELECT * FROM zona Where id = '$zonaid'");
        if ($rowleadd = mysqli_fetch_array($sqlleadd)) {
            $zonad = $rowleadd["nombre"];
        }
    }

    return $zonad;
}

?>
<h1 style="color:red;"> NO!! USAR ESTOY CORRIGIENDO </h1>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [4, "desc"]
        ],
        responsive: true
    });
</script>
<!-- End Breadcrumbbar -->
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
                                    <!-- <th>Foto</th> -->
                                    <th style="width: 50px;" class="text-center">Zona</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Ult. Compra</th>
                                    <th class="text-center">Días Venc.</th>
                                    <th class="text-center">Saldo</th>
                                    <th class="text-center">Resumen de Cuenta</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                // Dividir la cadena de búsqueda en palabrascl
                                $palabrascl = explode(' ', $buscar);

                                // Crear un array para almacenar las condiciones de búsqueda para cada palabra
                                $condicioncl = array();

                                foreach ($palabrascl as $palabracl) {
                                    // Reemplazar espacios con comodines para que coincida con cualquier palabra
                                    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
                                    // Agregar la condición para esta palabra al array
                                    $condicioncl[] = "CONCAT(nom_empr, ' ', nom_contac, ' ',address) LIKE '$terminocl'";
                                }

                                // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
                                $condicion_fincl = implode(' AND ', $condicioncl);


                                $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT nom_empr,address,id,nom_contac FROM clientes Where  $condicion_fincl  and estado='0'");

                                while ($rowclientes = mysqli_fetch_array($sqlclientes)) {

                                    $id_clienteint = $rowclientes["id"];
                                    $id_clientecod = base64_encode($id_clienteint);

                                    $totalresta = ultimaboleta($rjdhfbpqj, $id_clienteint);
                                    $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
                                    $salgraltotal += calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
                                    $fechaven = Vencimiento($rjdhfbpqj, $id_clienteint);
                                    $nombrezona = NombreZona($rjdhfbpqj, $id_clienteint);
                                    $diasven = diasvencitotal($rjdhfbpqj, $id_clienteint);

                                    if (!empty($fechaven)) {
                                        $fechave = date('d/m/Y', strtotime($fechaven));
                                    } else {
                                        $fechave = "";
                                    }


                                    echo '
                                          <tr>
                                          <td style="color: black;"  class="text-center">' . $nombrezona . '</td>   
                                          <td style="color: black;">' . $rowclientes["nom_contac"] . ' (' . $rowclientes["nom_empr"] . ')</td>   
                                           <td scope="row"  class="text-center">' . $fechave . '</td>
                                           <td scope="row"  class="text-center">' . intval($diasven) . '</td>
                                          
                                            <td  class="text-center">$' . number_format($salgral, 2, '.', ',') . '</td>
                                            <td  class="text-center">
                                            <a href="../deuda_clientes/debe_haber?jhduskdsa=' . $id_clientecod . '" target="_blank">
                                            <button type="button" class="btn btn-outline-primary">Resumen de Cuenta</button></td>
                                        </a>
                                        </tr>';
                                }

                                ?>

                            </tbody>
                        </table>
                        <?php

                        if ($tipo_usuario == "0") {

                        ?>
                            <table style="float:right;">
                                <tr>
                                    <td><b>Deuda Total</b> &nbsp;</td>
                                    <td><b>$<?= number_format($salgraltotal, 2, '.', ',') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="width:105;"></td>
                                </tr>
                            </table>
                        <?php

                        }
                        mysqli_close($rjdhfbpqj);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
        <script src="../assets/js/custom/custom-table-datatable.js"></script>
        <!-- End col -->