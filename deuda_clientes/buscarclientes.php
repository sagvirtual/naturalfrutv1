<?php include('../f54du60ig65.php'); // conexión $rjdhfbpqj
include('../lusuarios/login.php');
//include('../nota_de_pedido/funcion_saldoanterior.php');

$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';
$filtro_monto = isset($_POST['filtro_monto']) ? floatval($_POST['filtro_monto']) : 0.0;

// ==========================
// FUNCIONES
// ==========================
function calculodeuda($rjdhfbpqj, $id_clienteint, $id_orden)
{
    // IMPORTANTE: inicializar todo
    $totald         = 0.0;
    $pagoTotal      = 0.0;
    $adicionalvalor = 0.0;
    $ptotalcredi    = 0.0;
    $saldoini       = 0.0;
    $feorcha        = null;

    // ---------------- ÓRDENES ----------------
    // antes: SELECT *  ahora: solo lo que usás
    $sqlpagdeufp = mysqli_query(
        $rjdhfbpqj,
        "SELECT id, adicionalvalor, total, fecha 
         FROM orden 
         WHERE id_cliente = '$id_clienteint'
           AND id < $id_orden 
           AND col != '0'
         ORDER BY id DESC"
    );

    while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $iddorden        = $rowpagdeufp["id"]; // aunque no lo uses, lo conservo
        $adicionalvalor += (float)$rowpagdeufp["adicionalvalor"];
        $totald         += (float)$rowpagdeufp["total"];
        // en tu lógica original, $feorcha queda con la fecha de la ÚLTIMA vuelta del while
        $feorcha         = $rowpagdeufp["fecha"];
    }

    // ---------------- PAGOS (item_orden) ----------------
    $sqlpeufpd = mysqli_query(
        $rjdhfbpqj,
        "SELECT valor 
         FROM item_orden 
         WHERE id_cliente = '$id_clienteint'  
           AND modo = '1' 
           AND id_orden < '$id_orden'
         ORDER BY id ASC"
    );

    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {
        $pagoTotal += (float)$rowpaufp["valor"];
    }

    // ---------------- NOTAS DE CRÉDITO ----------------
    if (!empty($feorcha)) {
        $sqlpecrpd = mysqli_query(
            $rjdhfbpqj,
            "SELECT total 
             FROM nota_credito 
             WHERE id_cliente = '$id_clienteint'  
               AND fin = '1' 
               AND fecha <= '$feorcha'
             ORDER BY id ASC"
        );

        while ($rowdpaufp = mysqli_fetch_array($sqlpecrpd)) {
            $ptotalcredi += (float)$rowdpaufp["total"];
        }
    }

    $pagoTotal = $pagoTotal + $ptotalcredi;

    // ---------------- SALDO INICIAL CLIENTE ----------------
    $sclientes = mysqli_query(
        $rjdhfbpqj,
        "SELECT saldoini 
         FROM clientes 
         WHERE id = '$id_clienteint'
         LIMIT 1"
    );
    if ($rowpclientes = mysqli_fetch_array($sclientes)) {
        $saldoini = (float)$rowpclientes['saldoini'];
    }

    // ---------------- SALDO FINAL ----------------
    $saldo = $totald - $pagoTotal + $saldoini + $adicionalvalor;

    return $saldo;
}
function ultimaboleta($rjdhfbpqj, $id_clienteint)
{
    $sql = mysqli_query(
        $rjdhfbpqj,
        "SELECT id 
         FROM orden 
         WHERE id_cliente = '$id_clienteint' 
           AND col != '8' AND col != '31' AND col != '32'
         ORDER BY id ASC
         LIMIT 1"
    );

    if ($row = mysqli_fetch_array($sql)) {
        return $row['id'];
    } else {
        return 99999999999999; // tu valor grande
    }
}

function Vencimiento($rjdhfbpqj, $id_clienteint)
{
    $sql = mysqli_query(
        $rjdhfbpqj,
        "SELECT fecha 
         FROM orden 
         WHERE id_cliente = '$id_clienteint'
           AND col='8' AND fin='1' AND finalizada='1'
         ORDER BY fecha DESC
         LIMIT 1"
    );

    if ($row = mysqli_fetch_array($sql)) {
        return $row['fecha'];
    } else {
        return null;
    }
}

// ==========================
// WHERE PRINCIPAL
// ==========================

$where = "c.estado = '0'";

if ($buscar !== '') {
    $palabras = preg_split('/\s+/', $buscar);
    $cond = [];

    foreach ($palabras as $p) {
        $p = trim($p);
        if ($p === '') continue;
        $term = '%' . mysqli_real_escape_string($rjdhfbpqj, $p) . '%';
        $cond[] = "CONCAT(c.nom_empr,' ',c.nom_contac,' ',c.address) LIKE '$term'";
    }

    if (!empty($cond)) {
        $where .= " AND (" . implode(" AND ", $cond) . ")";
    }
}

// ==========================
// CONSULTA CLIENTES
// ==========================

$sqlclientes = mysqli_query(
    $rjdhfbpqj,
    "SELECT 
        c.id,
        c.nom_empr,
        c.nom_contac,
        c.address,
        z.nombre AS zona_nombre
     FROM clientes c
     LEFT JOIN zona z ON z.id = c.zona
     WHERE $where
     ORDER BY c.nom_contac ASC"
);

// total general
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
                                    <th class="text-center">Zona</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Ult. Compra</th>
                                    <th class="text-center">Días Venc.</th>
                                    <th class="text-center">Saldo</th>
                                    <th class="text-center">Resumen</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $hoy = new DateTime(date('Y-m-d'));

                                while ($row = mysqli_fetch_assoc($sqlclientes)) {

                                    $id_cliente   = $row['id'];
                                    $idcod        = base64_encode($id_cliente);
                                    $zona         = $row['zona_nombre'];

                                    // ID límite
                                    $totalresta = ultimaboleta($rjdhfbpqj, $id_cliente);

                                    // Calculamos una sola vez
                                    $salgral = calculodeuda($rjdhfbpqj, $id_cliente, $totalresta);

                                    // ==========================
                                    // FILTROS DE MONTO
                                    // ==========================

                                    if ($filtro_monto > 0) {
                                        if ($salgral < $filtro_monto) continue; // mayor a X
                                    } elseif ($filtro_monto < 0) {
                                        if ($salgral >= abs($filtro_monto)) continue; // menor a abs(X)
                                    }

                                    $salgraltotal += $salgral;

                                    // Última compra
                                    $fec = Vencimiento($rjdhfbpqj, $id_cliente);
                                    $fecFmt = $fec ? date('d/m/Y', strtotime($fec)) : "";

                                    // Días vencidos
                                    $dias = 0;

                                    if (!empty($fec) && $salgral > 1) {
                                        $fini = new DateTime(date('Y-m-d', strtotime($fec)));
                                        $dif = $fini->diff($hoy)->days;
                                        $dias = ($dif > 1) ? $dif : 0;
                                    }

                                    echo "
        <tr>
            <td class='text-center'>$zona</td>
            <td>{$row['nom_contac']} ({$row['nom_empr']})</td>
            <td class='text-center'>$fecFmt</td>
            <td class='text-center'>$dias</td>
            <td class='text-center'>$" . number_format($salgral, 2, '.', ',') . "</td>
            <td class='text-center'>
                <a href='../deuda_clientes/debe_haber?jhduskdsa=$idcod' target='_blank'>
                    <button class='btn btn-outline-primary'>Resumen</button>
                </a>
            </td>
        </tr>
    ";
                                }
                                ?>

                            </tbody>
                        </table>

                        <?php if ($tipo_usuario == "0") { ?>
                            <table style="float:right;">
                                <tr>
                                    <td><b>Deuda Total</b> </td>
                                    <td><b>$<?= number_format($salgraltotal, 2, '.', ',') ?></b></td>
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