<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

$id_cliente = base64_decode($_GET['jhduskdsa']);
$id_orden   = $_GET['pagdkdsa'];
$fechapago   = $_GET['fechapago'];

// ===== Conversor número -> letras (español, con "pesos" y "centavos") =====
function numeroEnLetras($numero)
{
    $numero = floatval($numero);
    $entero   = intval(floor($numero));
    $centavos = intval(round(($numero - $entero) * 100));

    if (class_exists('NumberFormatter')) {
        $fmt = new NumberFormatter('es_AR', NumberFormatter::SPELLOUT);
        $texto = $fmt->format($entero);
        $texto = preg_replace('/\buno\b$/u', 'un', trim($texto));
        $res = ucfirst($texto) . ' ' . ($entero == 1 ? 'peso' : 'pesos');
        if ($centavos > 0) {
            $txtCent = $fmt->format($centavos);
            $txtCent = preg_replace('/\buno\b$/u', 'un', trim($txtCent));
            $res .= ' con ' . $txtCent . ' ' . ($centavos == 1 ? 'centavo' : 'centavos');
        }
        return $res;
    } else {
        return numeroEnLetrasFallback($entero, $centavos);
    }
}

// -------- Fallback sin Intl --------
function numeroEnLetrasFallback($entero, $centavos = 0)
{
    $unidades = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve', 'veinte'];
    $decenas = ['', '', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
    $centenas = ['', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'];

    $toWords999 = function ($n) use ($unidades, $decenas, $centenas) {
        if ($n == 0) return 'cero';
        if ($n == 100) return 'cien';
        $c = intdiv($n, 100);
        $r = $n % 100;
        $d = intdiv($r, 10);
        $u = $r % 10;
        $parts = [];
        if ($c > 0) $parts[] = $centenas[$c];
        if ($r > 0) {
            if ($r <= 20) {
                $parts[] = $unidades[$r];
            } else {
                if ($d == 2 && $u > 0) {
                    $veinti = 'veinti' . ($u == 1 ? 'uno' : ($u == 2 ? 'dós' : ($u == 3 ? 'trés' : $unidades[$u])));
                    $parts[] = $veinti;
                } else {
                    $txt = $decenas[$d];
                    if ($u > 0) $txt .= ' y ' . $unidades[$u];
                    $parts[] = $txt;
                }
            }
        }
        return trim(implode(' ', array_filter($parts)));
    };
    $toWords = function ($n) use ($toWords999) {
        if ($n == 0) return 'cero';
        $billones = intdiv($n, 1000000000000);
        $n %= 1000000000000;
        $millones = intdiv($n, 1000000);
        $n %= 1000000;
        $miles    = intdiv($n, 1000);
        $n %= 1000;
        $res = [];
        if ($billones > 0) $res[] = ($billones == 1 ? 'un billón' : $toWords999($billones) . ' billones');
        if ($millones > 0) $res[] = ($millones == 1 ? 'un millón' : $toWords999($millones) . ' millones');
        if ($miles > 0)    $res[] = ($miles == 1 ? 'mil' : $toWords999($miles) . ' mil');
        if ($n > 0)        $res[] = $toWords999($n);
        return trim(implode(' ', $res));
    };
    $textoEntero = $toWords($entero);
    $textoEntero = preg_replace('/\buno\b$/u', 'un', $textoEntero);
    $res = ucfirst($textoEntero) . ' ' . ($entero == 1 ? 'peso' : 'pesos');
    if ($centavos > 0) {
        $textoCent = $toWords($centavos);
        $textoCent = preg_replace('/\buno\b$/u', 'un', $textoCent);
        $res .= ' con ' . $textoCent . ' ' . ($centavos == 1 ? 'centavo' : 'centavos');
    }
    return $res;
}

// Lista los pagos (imprime filas)
function listopagos($rjdhfbpqj, $id_orden, $id_cliente, $fechapago)
{
    $sqlpag = mysqli_query($rjdhfbpqj, "SELECT id, modo, valor, id_orden, fecha, id_cliente, tipopag, ncheque, nota 
        FROM item_orden 
        WHERE modo='1' AND valor > 0 AND tipopag != '33' AND id_orden='$id_orden' AND id_cliente='$id_cliente' AND fecha='$fechapago'
        ORDER BY id DESC");
    while ($rowpag = mysqli_fetch_array($sqlpag)) {
        $valor   = number_format($rowpag['valor'], 2, ',', '.');
        $tipopag = (int)$rowpag['tipopag'];
        $ncheque = $rowpag['ncheque'];
        $nota    = $rowpag['nota'];
        switch ($tipopag) {
            case 1:
                $texto = "Efectivo";
                break;
            case 2:
                $texto = "Transferencia";
                break;
            case 3:
                $texto = "Depósito";
                break;
            case 4:
                $texto = "Cheque Nº " . $ncheque . " " . $nota;
                break;
            case 5:
                $texto = "Mercadería";
                break;
            case 6:
                $texto = "Echeq";
                break;
            default:
                $texto = "Sin definir";
                break;
        }
        echo '<div class="fila"><div class="et">' . $texto . ':</div><div class="val">$' . $valor . '</div></div>';
    }
}

// ================== CARGA DE DATOS ==================
if (!empty($id_cliente)) {

    // Total de pagos y fecha del recibo
    $totalpag = 0.0;
    $fecharec = date('Y-m-d'); // por si no hay filas
    $sqlpag = mysqli_query($rjdhfbpqj, "SELECT valor, fecha 
        FROM item_orden 
        WHERE modo='1' AND valor > 0  AND tipopag != '33' AND id_orden='$id_orden' AND id_cliente='$id_cliente' AND fecha='$fechapago'");
    $todag = mysqli_num_rows($sqlpag);
    while ($rowpag = mysqli_fetch_array($sqlpag)) {
        $totalpag += (float)$rowpag['valor'];
        $fecharec  = $rowpag['fecha']; // última fecha encontrada
    }

    $numfactu = sprintf("N° %07d", $id_orden);

    $nom_empr = $nom_contac = $address = $localidad = '';
    $sqlclie = mysqli_query($rjdhfbpqj, "SELECT nom_empr, nom_contac, address, localidad FROM clientes WHERE id='$id_cliente' LIMIT 1");
    if ($rowcli = mysqli_fetch_array($sqlclie)) {
        $nom_empr   = $rowcli['nom_empr'];
        $nom_contac = $rowcli['nom_contac'];
        $address    = $rowcli['address'];
        $localidad  = $rowcli['localidad'];
    }

    // Traigo / creo el número de recibo
    $formato = '';
    $sql = mysqli_query($rjdhfbpqj, "SELECT id, fecha FROM recibo WHERE id_orden='$id_orden' AND id_cliente='$id_cliente' AND fecha='$fechapago' and origen='1' LIMIT 1");
    if ($row = mysqli_fetch_array($sql)) {
        $numerorecibo = (int)$row['id'];
        if (!empty($row['fecha'])) $fecharec = $row['fecha'];
        $formato = sprintf("N° %04d-%07d", 1, $numerorecibo);
    } else {
        $fechaIns = $fecharec ?: date('Y-m-d');
        $sqlIns = "INSERT INTO recibo (id_orden, id_cliente, fecha,origen) VALUES ('$id_orden', '$id_cliente', '$fechapago','1')";
        mysqli_query($rjdhfbpqj, $sqlIns) or die(mysqli_error($rjdhfbpqj));
        $numerorecibo = mysqli_insert_id($rjdhfbpqj);
        $formato = sprintf("N° %04d-%07d", 1, $numerorecibo);
    }

    // Función para renderizar UNA copia (Original / Duplicado)
    function render_copia($tipoCopia, $formato, $fecharec, $nom_empr, $nom_contac, $address, $localidad, $numfactu, $todag, $totalpag, $rjdhfbpqj, $id_orden, $id_cliente, $fechapago)
    {
?>
        <section class="recibo">
            <header class="marca">
                <div>
                    <img src="/assets/images/logo.png" class="logo" alt="Logo">
                </div>
                <div class="datos-empresa">
                    <div class="nom">RECIBO</div>
                    <div class="sub">
                        Alsina 1935, B1650 Villa Lynch,<br>Provincia de Buenos Aires
                    </div>
                </div>
                <div class="info-doc">
                    <span class="copiatipo"><?= htmlspecialchars($tipoCopia) ?></span>
                    <div style="margin-top:6px; color:var(--muted); font-size:.92rem">
                        N° <strong><?= $formato ?></strong><br>
                        Fecha: <strong><?= date('d/m/Y', strtotime($fecharec)) ?></strong>
                    </div>
                </div>
            </header>

            <div class="grid">
                <div class="card">
                    <h4>Recibido de</h4>
                    <div class="fila">
                        <div class="et">Nombre / Razón Social:</div>
                        <div class="val"><?= htmlspecialchars($nom_empr . ' ' . $nom_contac) ?></div>
                    </div>
                    <div class="fila">
                        <div class="et">Domicilio:</div>
                        <div class="val"><?= htmlspecialchars($address . ' ' . $localidad) ?></div>
                    </div>
                </div>
                <div class="card">
                    <h4>Medio de pago</h4>
                    <?php listopagos($rjdhfbpqj, $id_orden, $id_cliente, $fechapago); ?>
                </div>
            </div>

            <div class="concepto">
                <table>
                    <thead>
                        <tr>
                            <th style="width:65%">Concepto</th>
                            <th style="width:15%">Cant.</th>
                            <th style="width:20%; text-align:right">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= 'Pago a cuenta de Factura ' . $numfactu ?></td>
                            <td><?= (int)$todag ?></td>
                            <td style="text-align:right"><?= number_format($totalpag, 2, ',', '.') ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <div class="total">
                                    <div class="en-letras">Son: <strong><?= numeroEnLetras($totalpag) ?></strong></div>
                                    <div class="monto"><?= number_format($totalpag, 2, ',', '.') ?></div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br><br><br>
            <div class="firmas">
                <div class="box">Firma / Aclaración</div>
                <div class="box">DNI</div>
            </div>

        </section>
    <?php
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recibo de Cobro</title>
        <style>
            :root {
                --accent: #0d6efd;
                --ink: #1f2937;
                --soft: #e5e7eb;
                --muted: #6b7280;
                --ok: #10b981;
                --danger: #ef4444;
            }

            * {
                box-sizing: border-box
            }

            body {
                font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
                color: var(--ink);
                background: #f6f7fb;
                margin: 0;
                padding: 24px;
            }

            .wrap {
                max-width: 900px;
                margin: 0 auto;
            }

            .toolbar {
                display: flex;
                gap: 8px;
                margin: 0 auto 16px;
                justify-content: flex-end;
            }

            .btn {
                border: 1px solid var(--soft);
                background: #fff;
                padding: 8px 12px;
                border-radius: 10px;
                cursor: pointer;
                font-weight: 600;
            }

            .btn:hover {
                filter: brightness(0.98)
            }

            .btn-print {
                border-color: var(--accent)
            }

            .recibo {
                background: #fff;
                border: 1px solid var(--soft);
                border-radius: 16px;
                padding: 22px;
                box-shadow: 0 6px 22px rgba(0, 0, 0, .06);
                margin-bottom: 22px;
            }

            .marca {
                display: flex;
                align-items: center;
                gap: 16px;
                border-bottom: 1px dashed var(--soft);
                padding-bottom: 14px;
                margin-bottom: 14px;
            }

            .logo {
                width: auto;
                height: 75px;
                border-radius: 12px;
                border: 1px solid var(--soft);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 800;
                color: var(--accent);
            }

            .datos-empresa {
                line-height: 1.35;
            }

            .datos-empresa .nom {
                font-size: 1.2rem;
                font-weight: 800
            }

            .datos-empresa .sub {
                color: var(--muted);
                font-size: .92rem
            }

            .info-doc {
                margin-left: auto;
                text-align: right;
            }

            .info-doc .copiatipo {
                font-size: .78rem;
                font-weight: 800;
                color: var(--muted);
                letter-spacing: 1px;
                border: 1px dashed var(--soft);
                padding: 4px 8px;
                border-radius: 999px;
                margin-left: 8px;
            }

            .grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px;
                margin: 10px 0 6px;
            }

            .card {
                border: 1px solid var(--soft);
                border-radius: 12px;
                padding: 12px;
            }

            .card h4 {
                margin: 0 0 8px;
                font-size: .95rem;
                letter-spacing: .2px;
                color: #374151
            }

            .fila {
                display: flex;
                gap: 10px;
                margin: 4px 0;
                font-size: .95rem
            }

            .et {
                min-width: 140px;
                color: var(--muted)
            }

            .val {
                font-weight: 600
            }

            .concepto {
                margin-top: 6px;
                border: 1px solid var(--soft);
                border-radius: 12px;
                overflow: hidden;
            }

            table {
                width: 100%;
                border-collapse: collapse
            }

            thead th {
                background: #fafafa;
                border-bottom: 1px solid var(--soft);
                padding: 10px;
                text-align: left;
                font-size: .92rem;
                color: var(--muted);
                letter-spacing: .2px
            }

            tbody td {
                padding: 10px;
                border-bottom: 1px dashed #eee;
                vertical-align: top
            }

            tfoot td {
                padding: 12px 10px;
            }

            .total {
                display: flex;
                gap: 14px;
                align-items: center;
                justify-content: flex-end;
                margin-top: 10px;
            }

            .monto {
                border: 2px solid var(--ink);
                border-radius: 14px;
                padding: 10px 16px;
                font-size: 1.25rem;
                font-weight: 900;
                letter-spacing: .3px
            }

            .en-letras {
                color: var(--muted);
                font-style: italic;
                font-size: .93rem;
                margin-top: 6px
            }

            .firmas {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 24px;
                margin-top: 18px;
            }

            .firmas .box {
                border-top: 1px solid var(--soft);
                padding-top: 10px;
                text-align: center;
                color: var(--muted);
                font-size: .9rem
            }

            .pie {
                display: flex;
                gap: 16px;
                align-items: center;
                justify-content: space-between;
                margin-top: 12px;
                color: var(--muted);
                font-size: .85rem
            }

            .qr {
                width: 90px;
                height: 90px;
                border: 1px dashed var(--soft);
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: .78rem;
                color: var(--muted)
            }

            .corte {
                margin: 16px 0;
                display: flex;
                align-items: center;
                gap: 10px;
                color: #9ca3af;
            }

            .corte::before,
            .corte::after {
                content: "";
                height: 1px;
                background: repeating-linear-gradient(to right, #d1d5db 0 6px, transparent 6px 12px);
                flex: 1;
            }

            @media (max-width:700px) {
                .grid {
                    grid-template-columns: 1fr
                }

                .info-doc {
                    text-align: left;
                    margin-top: 8px
                }

                .total {
                    justify-content: flex-start
                }
            }

            @media print {
                body {
                    background: #fff;
                    padding: 0;
                }

                .toolbar {
                    display: none !important
                }

                .recibo {
                    box-shadow: none;
                    border: 1px solid #bbb;
                    border-radius: 10px;
                    page-break-inside: avoid;
                }

                /* Si querés cada copia en página distinta, descomentá la línea abajo */
                /* .corte{ break-after: page } */
                a[href]:after {
                    content: "" !important
                }
            }

            /* === A4 compacto: 2 recibos por página === */
            @media print {

                /* Forzamos tamaño de hoja y márgenes chicos */
                @page {
                    size: A4 portrait;
                    margin: 10mm;
                    /* probá 8–12mm según tu impresora */
                }

                /* Reducimos tipografías y espaciados para que entren 2 secciones */
                html {
                    font-size: 11.2px;
                }

                /* bajar a 10.8px si todavía queda largo */

                body {
                    padding: 0;
                    background: #fff;
                }

                .wrap {
                    /* A4 ancho útil ≈ 210mm - (márgenes * 2) */
                    max-width: 190mm;
                    /* margen lateral cómodo */
                    margin: 0 auto;
                }

                .recibo {
                    padding: 10mm 9mm;
                    /* antes 22px: compactamos */
                    margin-bottom: 6mm;
                    /* espacio entre original y duplicado */
                    border-radius: 8px;
                    border: 1px solid #bbb;
                    box-shadow: none;
                    page-break-inside: avoid;
                    /* no cortar un recibo */
                }

                .marca {
                    padding-bottom: 8px;
                    margin-bottom: 10px;
                }

                .logo {
                    height: 55px;
                }

                /* antes 75px */

                .datos-empresa .nom {
                    font-size: 1.05rem;
                }

                .datos-empresa .sub {
                    font-size: .84rem;
                }

                .info-doc {
                    font-size: .9rem;
                }

                .info-doc .copiatipo {
                    padding: 2px 6px;
                    font-size: .72rem;
                }

                .grid {
                    gap: 10px;
                }

                .card {
                    padding: 8px;
                    border-radius: 8px;
                }

                .card h4 {
                    margin: 0 0 6px;
                    font-size: .9rem;
                }

                .fila {
                    margin: 2px 0;
                    font-size: .9rem;
                }

                .et {
                    min-width: 120px;
                }

                .concepto {
                    border-radius: 8px;
                }

                thead th {
                    padding: 8px;
                    font-size: .86rem;
                }

                tbody td,
                tfoot td {
                    padding: 8px;
                }

                .total {
                    gap: 10px;
                }

                .monto {
                    padding: 8px 12px;
                    font-size: 1.05rem;
                    /* antes 1.25rem */
                    border-width: 1.5px;
                    border-radius: 10px;
                }

                .en-letras {
                    font-size: .88rem;
                }

                .firmas {
                    gap: 16px;
                    margin-top: 12px;
                }

                .firmas .box {
                    padding-top: 8px;
                }

                .pie {
                    font-size: .8rem;
                    margin-top: 8px;
                }

                .qr {
                    width: 70px;
                    height: 70px;
                    font-size: .7rem;
                }

                /* La línea de separación NO fuerza salto de página */
                .corte {
                    margin: 8mm 0 4mm;
                }

                .corte {
                    break-after: avoid;
                }
            }

            /* Vista en pantalla un poco más compacta también (opcional) */
            @media screen {
                html {
                    font-size: 14px;
                }

                .wrap {
                    max-width: 900px;
                }

                .logo {
                    height: 60px;
                }
            }
        </style>

    </head>

    <body>
        <div class="wrap">
            <div class="toolbar">
                <button class="btn btn-print" onclick="window.print()">🖨️ Imprimir</button>
            </div>

            <?php
            // ========= ORIGINAL =========
            render_copia('ORIGINAL',  $formato, $fecharec, $nom_empr, $nom_contac, $address, $localidad, $numfactu, $todag, $totalpag, $rjdhfbpqj, $id_orden, $id_cliente, $fechapago);
            ?>

            <div class="corte">— — — — — — — — — — — — — — — — — — — —</div>

            <?php
            // ========= DUPLICADO =========
            render_copia('DUPLICADO', $formato, $fecharec, $nom_empr, $nom_contac, $address, $localidad, $numfactu, $todag, $totalpag, $rjdhfbpqj, $id_orden, $id_cliente, $fechapago);
            ?>
        </div>
    </body>

    </html>
<?php
} // fin if !empty($id_cliente)
?>