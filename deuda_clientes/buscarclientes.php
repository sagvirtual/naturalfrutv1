<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/funcion_saldoanterior.php');

$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';

function ultimaboleta($rjdhfbpqj, $id_clienteint)
{
    // Antes no tenía LIMIT, puede hacerte pelota si hay muchas órdenes
    $sqlpagdeufp = mysqli_query(
        $rjdhfbpqj,
        "SELECT id 
         FROM orden 
         WHERE id_cliente = '$id_clienteint' 
           AND col != '8' 
           AND col != '31' 
           AND col != '32' 
         ORDER BY id ASC 
         LIMIT 1"
    );

    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $totalresta = $rowpagdeufp["id"];
    } else {
        $totalresta = '99999999999999';
    }
    return $totalresta;
}

function Vencimiento($rjdhfbpqj, $id_clienteint)
{
    $sqlpagdeufp = mysqli_query(
        $rjdhfbpqj,
        "SELECT fecha 
         FROM orden 
         WHERE id_cliente = '$id_clienteint'  
           AND col = '8' 
           AND fin = '1' 
           AND finalizada = '1' 
         ORDER BY fecha DESC 
         LIMIT 1"
    );
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        return $rowpagdeufp['fecha'];
    } else {
        return null;
    }
}

// ==========================
//  ARMAMOS EL WHERE
// ==========================
$where = "c.estado = '0'";

if ($buscar !== '') {
    $palabrascl = preg_split('/\s+/', $buscar);
    $condicioncl = array();

    foreach ($palabrascl as $palabracl) {
        $palabracl = trim($palabracl);
        if ($palabracl === '') continue;

        $terminocl = '%' . mysqli_real_escape_string($rjdhfbpqj, $palabracl) . '%';
        $condicioncl[] = "CONCAT(c.nom_empr, ' ', c.nom_contac, ' ', c.address) LIKE '$terminocl'";
    }

    if (!empty($condicioncl)) {
        $where .= ' AND (' . implode(' AND ', $condicioncl) . ')';
    }
}

// ==========================
//  CONSULTA CLIENTES + ZONA
// ==========================
$sqlclientes = mysqli_query(
    $rjdhfbpqj,
    "SELECT 
        c.id,
        c.nom_empr,
        c.nom_contac,
        c.address,
        z.nombre AS zona_nombre
     FROM clientes AS c
     LEFT JOIN zona AS z ON z.id = c.zona
     WHERE $where
     ORDER BY c.nom_contac ASC"
);

// total general de deuda
$salgraltotal = 0.00;

?>

<script>
    $('#default-datatable').DataTable({
        "order": [
            [4, "desc"]
        ],
        responsive: true
    });
</script>

<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
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
                                $hoy = new DateTime(date('Y-m-d'));

                                while ($rowclientes = mysqli_fetch_assoc($sqlclientes)) {

                                    $id_clienteint = $rowclientes["id"];
                                    $id_clientecod = base64_encode($id_clienteint);

                                    // ID límite para calculodeuda
                                    $totalresta = ultimaboleta($rjdhfbpqj, $id_clienteint);

                                    // SOLO una vez calculodeuda por cliente
                                    $salgral = calculodeuda($rjdhfbpqj, $id_clienteint, $totalresta);
                                    $salgraltotal += $salgral;

                                    // Última compra
                                    $fechaven = Vencimiento($rjdhfbpqj, $id_clienteint);
                                    if (!empty($fechaven)) {
                                        $fechave = date('d/m/Y', strtotime($fechaven));
                                    } else {
                                        $fechave = "";
                                    }

                                    // Días vencidos (versión liviana de diasvencitotal)
                                    $diasven = 0;
                                    if (!empty($fechaven) && $salgral > 1) {
                                        $fechaInicio = new DateTime(date('Y-m-d', strtotime($fechaven)));
                                        $intervalo   = $fechaInicio->diff($hoy);
                                        $totalven    = (int)$intervalo->days;

                                        if ($totalven > 1) {
                                            $diasven = $totalven;
                                        } else {
                                            $diasven = 0;
                                        }
                                    }

                                    $nombrezona = $rowclientes["zona_nombre"];

                                    echo '
                                        <tr>
                                            <td style="color: black;" class="text-center">' . $nombrezona . '</td>   
                                            <td style="color: black;">' . $rowclientes["nom_contac"] . ' (' . $rowclientes["nom_empr"] . ')</td>   
                                            <td scope="row" class="text-center">' . $fechave . '</td>
                                            <td scope="row" class="text-center">' . intval($diasven) . '</td>
                                            <td class="text-center">$' . number_format($salgral, 2, '.', ',') . '</td>
                                            <td class="text-center">
                                                <a href="../deuda_clientes/debe_haber?jhduskdsa=' . $id_clientecod . '" target="_blank">
                                                    <button type="button" class="btn btn-outline-primary">Resumen de Cuenta</button>
                                                </a>
                                            </td>
                                        </tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php if ($tipo_usuario == "0") { ?>
                            <table style="float:right;">
                                <tr>
                                    <td><b>Deuda Total</b> &nbsp;</td>
                                    <td><b>$<?= number_format($salgraltotal, 2, '.', ',') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="width:105;"></td>
                                </tr>
                            </table>
                        <?php } ?>

                        <?php mysqli_close($rjdhfbpqj); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
<script src="../assets/js/custom/custom-table-datatable.js"></script>