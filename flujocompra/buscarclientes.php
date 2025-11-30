<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../funciones/funcZonas.php');

/* ========== Helpers ========== */
function listouldies($rjdhfbpqj, $id_clienteint)
{
    echo '<div class="accordion accordion-outline" id="accordionoutline' . $id_clienteint . '">';
    $sql = mysqli_query($rjdhfbpqj, "SELECT fecha,id,total FROM orden WHERE id_cliente = '$id_clienteint' AND col !='32' ORDER BY id DESC LIMIT 10");
    while ($r = mysqli_fetch_array($sql)) {
        echo '
        <div id="collapseOneoutline'  . $id_clienteint  . '" class="collapse" aria-labelledby="headingOneoutline" data-parent="#accordionoutline'  . $id_clienteint  . '">
            <a href="../nota_de_pedido/?jhduskdsa=' . base64_encode($id_clienteint) . '&orjndty=' . base64_encode($r['id']) . '" target="_blank">  
                <button type="button" class="btn btn-outline-dark" style="width:100%;"> ' . date('d/m/Y', strtotime($r['fecha'])) . ' Orden Nº ' . $r['id'] . ' $' . number_format($r['total'], 0, ',', '.') . '</button>
            </a><br>
        </div>';
    }
    echo '</div>';
}


/* ========== Helpers ========== */
function historialconver($rjdhfbpqj, $id_clienteint)
{
    $comilla = "'";
    echo '<div class="accordion accordion-outline" id="haccordionoutline' . $id_clienteint . '">
        <div id="hcollapseOneoutline'  . $id_clienteint  . '" class="collapse" aria-labelledby="headingOneoutline" data-parent="#haccordionoutline'  . $id_clienteint  . '">
            <div class="card-body">
            ';

    $sqlnota = mysqli_query($rjdhfbpqj, "SELECT * FROM notacli WHERE id_cliente = '$id_clienteint'  ORDER BY id DESC");
    while ($rnotas = mysqli_fetch_array($sqlnota)) {
        //if ($rnotas['nota'] != "") {
        $idnota = $rnotas['id'];
        $fecha_action = $rnotas['fecha_action'];
        $nombrearchivo = $rnotas['mime'];
        $responsable = $rnotas['responsable'];
        $sqllogdins = mysqli_query($rjdhfbpqj, "SELECT nom_contac,id FROM usuarios WHERE  id= '$responsable'");
        if ($rowudden = mysqli_fetch_array($sqllogdins)) {
            $mbeusuario = $rowudden['nom_contac'];
        }
        if ($nombrearchivo != "") {

            $archivo = '
            Descargar: <a href="/flujocompra/' . $idnota . '_' . $nombrearchivo . '" target="_blank" download>
            
            ' . $nombrearchivo . '</a>';
        } else {
            $archivo = "";
        }

        // Separar fecha y hora
        $fechasep = explode(' ', $fecha_action);

        $fechabien = date('d/m/Y', strtotime($fechasep[0]));

        $notaver = $rnotas['nota'] . "<br>";
        echo '
        
        <div class="alert-list">
                                    <div class="alert alert-dark" role="alert">
                                      <p> ' . $notaver . '</p>
                                  ' . $archivo . '
                                      <p  style="float:right;color:grey;">' . $mbeusuario . ' ' . $fechabien . ' ' . $fechasep[1] . ' hs.</p>
                                    </div>                                    
                                </div>
          
        
       ';
        // }
    }


    echo '
                <input type="hidden" class="id_cliente" value="' . $id_clienteint . '">
          

                <div class="form-group">
                    <textarea class="form-control" id="nota' . $id_clienteint . '" rows="3" placeholder="Cargar Nota o Conversación"></textarea>
                </div>

                <div class="form-group mb-0">
                    <input type="file" class="form-control-file" id="archinota' . $id_clienteint . '" 
                           accept=".txt,.jpg,.jpeg,.png,.mpg,.opus,.pdf">
                    <small class="text-muted">Formatos: txt, jpg, png, mpg, opus, pdf. Máx: 5MB.</small>
                </div>
                <br>

                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary btn-guardar-nota"
                       onclick="ajax_cargarnota(' . $comilla . ''  . $id_clienteint  . '' . $comilla . ')">Guardar</button>
                </div>

                <div class="alert mt-2" style="display:none;"></div>
            </div>
            <br>
        </div>';


    echo '</div>';
}



function mes_a_etiqueta($fechaUltima)
{
    if (!$fechaUltima) return '';
    $hoy = new DateTime(date("Y-m-d"));
    $ini = new DateTime($fechaUltima);
    $dif = $ini->diff($hoy);
    if ($dif->y >= 1 || $dif->m >= 1) {
        $meses = ($dif->y * 12) + $dif->m;
        return $meses;
    }
    return "";
}




function dias_a_etiqueta($fechaUltima)
{
    if (!$fechaUltima) return '';
    $hoy = new DateTime(date("Y-m-d"));
    $ini = new DateTime($fechaUltima);
    $dif = $ini->diff($hoy);

    return $dif->days;
}
/* ========== Parámetros ========== */
$buscar    = isset($_POST['buscar']) ? $_POST['buscar'] : '';
$page      = isset($_POST['page']) ? max(1, intval($_POST['page'])) : 1;
$per_page  = isset($_POST['per_page']) ? max(1, intval($_POST['per_page'])) : 5000;
$filtro    = isset($_POST['filtro']) ? $_POST['filtro'] : 'todos';

/* ========== Búsqueda ========== */
$palabrascl   = explode(' ', trim($buscar));
$condicioncl  = array();

if (count($palabrascl) === 0 || (count($palabrascl) === 1 && $palabrascl[0] === '')) {
    // sin texto: que no filtre nada (todo)
    $condicioncl[] = "CONCAT(c.nom_empr, ' ', c.nom_contac, ' ', c.address, ' ', IFNULL(z.nombre,'')) LIKE '%%'";
} else {
    foreach ($palabrascl as $palabracl) {
        $palabracl = trim($palabracl);
        if ($palabracl === '') continue;

        $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
        $terminocl = mysqli_real_escape_string($rjdhfbpqj, $terminocl);

        // 🔹 Busca por nombre, contacto, address y también por nombre de zona
        $condicioncl[] = "(
            CONCAT(c.nom_empr, ' ', c.nom_contac, ' ', c.address) LIKE '$terminocl'
            OR z.nombre LIKE '$terminocl'
        )";
    }
}

$condicion_fincl = implode(' AND ', $condicioncl);
if ($condicion_fincl === '') {
    $condicion_fincl = "CONCAT(c.nom_empr, ' ', c.nom_contac, ' ', c.address, ' ', IFNULL(z.nombre,'')) LIKE '%%'";
}

/* ========== Filtro ==========
   'todos' | 'no_compra' | 'sin_30' | 'habitual'
*/
$whereFiltroCount = "1=1";
$whereFiltroRows  = "1=1";
switch ($filtro) {
    case 'no_compra':
        $whereFiltroCount = "lc.ultima_compra IS NULL";
        $whereFiltroRows  = "lc.ultima_compra IS NULL";
        $titucom  = "que no compran";
        break;
    case 'sin_30':
        $whereFiltroCount = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) >= 30";
        $whereFiltroRows  = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) >= 30";
        $titucom  = "que hace más de 30 días que no compran";
        break;
    case 'habitual':
        $whereFiltroCount = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) < 30";
        $whereFiltroRows  = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) < 30";
        $titucom  = "habituales";
        break;
    default:
        $whereFiltroCount = "1=1";
        $whereFiltroRows  = "1=1";
}

/* ========== Total para paginar ========== */
$sql_count = mysqli_query($rjdhfbpqj, "
    SELECT COUNT(*) AS total
    FROM clientes c
    LEFT JOIN (
        SELECT id_cliente, MAX(fecha) AS ultima_compra
        FROM orden
        WHERE col != '32'
        GROUP BY id_cliente
    ) lc ON lc.id_cliente = c.id
    LEFT JOIN zona z ON z.id = c.zona
    WHERE ($condicion_fincl) AND c.estado='0' AND ($whereFiltroCount)
");
$rowc = mysqli_fetch_assoc($sql_count);
$total_reg = intval($rowc['total']);

$total_pages = ($total_reg > 0) ? (int)ceil($total_reg / $per_page) : 1;
$page        = min($page, $total_pages);
$offset      = ($page - 1) * $per_page;

/* ========== Rows ========== */
$sqlclientes = mysqli_query($rjdhfbpqj, "
    SELECT 
        c.nom_empr,
        c.address,
        c.id,
        c.nom_contac,
        c.wsp,
        c.localidad,
        z.nombre AS nombre_zona,
        lc.ultima_compra,
        CASE 
           WHEN lc.ultima_compra IS NULL THEN NULL
           ELSE DATEDIFF(CURDATE(), lc.ultima_compra)
        END AS dias_sin_compra
    FROM clientes c
    LEFT JOIN (
        SELECT id_cliente, MAX(fecha) AS ultima_compra
        FROM orden
        WHERE col != '32'
        GROUP BY id_cliente
    ) lc ON lc.id_cliente = c.id
    LEFT JOIN zona z ON z.id = c.zona
    WHERE ($condicion_fincl) AND c.estado='0' AND ($whereFiltroRows)
    ORDER BY c.nom_empr ASC
    LIMIT $offset, $per_page
");

/* ========== Render SOLO tabla + paginador (sin head/html) ========== */

?>
<script>
    $('#default-datatable').DataTable({
        "order": [
            [5, "desc"]
        ],
        responsive: true
    });
</script>

<?php

function cantestdis($rjdhfbpqj, $modo)
{


    $whereFiltroCount = "1=1";
    switch ($modo) {
        case '1':
            $whereFiltroCount = "lc.ultima_compra IS NULL"; //no_compra
            $cuaadro = 'dark';
            $tecto = "No compran";
            break;
        case '2':
            $whereFiltroCount = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) >= 30"; //mas de 30
            $cuaadro = 'danger';
            $tecto = "Más de 30 días que no compran";
            break;
        case '3':
            $whereFiltroCount = "lc.ultima_compra IS NOT NULL AND DATEDIFF(CURDATE(), lc.ultima_compra) < 30"; //haboituales
            $cuaadro = 'primary';
            $tecto = "Habituales";
            break;
        default:
            $whereFiltroCount = "1=1";
    }


    $sql_count = mysqli_query($rjdhfbpqj, "
    SELECT COUNT(*) AS total
    FROM clientes c
    LEFT JOIN (
        SELECT id_cliente, MAX(fecha) AS ultima_compra
        FROM orden
        WHERE col != '32'
        GROUP BY id_cliente
    ) lc ON lc.id_cliente = c.id
    WHERE c.estado='0' AND ($whereFiltroCount)
");
    $rowc = mysqli_fetch_assoc($sql_count);
    $total_reg = intval($rowc['total']);

    echo '<div class="alert alert-' . $cuaadro . '">' . $tecto . '
  <strong>' . $total_reg . '</strong>
</div>';
}


?>
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div style="display:flex; gap:8px; flex-wrap:wrap;">
                        <!-- Botones de filtro -->


                        <?php

                        cantestdis($rjdhfbpqj, 1);
                        cantestdis($rjdhfbpqj, 2);
                        cantestdis($rjdhfbpqj, 3);

                        ?>

                    </div>
                    <br> Total clientes <?= $titucom ?>: <b><?php echo number_format($total_reg); ?></b>

                    <table id="default-datatable" class="table table-bordered table-striped" style="position: relative; top:-40px;">
                        <thead>
                            <tr>
                                <th style="width:50px;" class="text-center">Id&nbsp;Cli.</th>
                                <th style="width:50px;" class="text-center">Zona</th>
                                <th>Localidad</th>
                                <th></th>
                                <th>Nombre</th>
                                <th style="width:150px;">WhatsApp</th>
                                <th class="text-center">Días</th>
                                <th class="text-center">Últimas&nbsp;Compras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($sqlclientes)) {
                                $id_clienteint  = $row["id"];
                                $nombrezona     = NombreZona($rjdhfbpqj, $id_clienteint);
                                $ult            = $row["ultima_compra"]; // puede ser NULL
                                $diasNum        = is_null($row["dias_sin_compra"]) ? null : intval($row["dias_sin_compra"]);
                                $labelDias      = $ult ? dias_a_etiqueta($ult) : '';
                                $colorcom       = ($diasNum !== null && $diasNum > 30) ? "color:red;" : "color:green;";
                            ?>
                                <tr>
                                    <td class="text-center" style="color:black;width: 20px; "><?php echo $id_clienteint; ?></td>
                                    <td class="text-center" style="color:black;width: 20px;"><?php echo $nombrezona; ?></td>
                                    <td style="color:black;width: 20px;"><?php echo htmlspecialchars($row["localidad"]); ?></td>
                                    <td style="color:black;width: 20px;"><button type="button" class="btn btn-xs btn-rounded btn-warning"
                                            data-toggle="collapse"
                                            data-target="#hcollapseOneoutline<?php echo $id_clienteint; ?>"
                                            aria-expanded="true"
                                            aria-controls="hcollapseOneoutline<?php echo $id_clienteint; ?>">Notas</button>




                                    </td>

                                    <td style="color:black;"><?php echo htmlspecialchars($row["nom_contac"]) . ' (' . htmlspecialchars($row["nom_empr"]) . ')'; ?>


                                        <div id="historialconver<?= $id_clienteint ?>">
                                            <?php historialconver($rjdhfbpqj, $id_clienteint); ?>

                                        </div>
                                    </td>

                                    <td style="width: 20px;">
                                        <?php if (intval($row["wsp"]) > 930181681) {
                                            $w = htmlspecialchars($row["wsp"]);
                                            echo '<a href="https://api.whatsapp.com/send?phone=54' . $w . '" target="_blank"><i class="socicon-whatsapp"></i> ' . $w . '</a>';
                                        } ?>
                                    </td>
                                    <td class="text-center" style="width: 20px;">
                                        <?php if ($ult) { ?>
                                            <b style="font-size:18pt; <?php echo $colorcom; ?>"><?php echo $labelDias; ?></b>
                                        <?php } else { ?>
                                            <p style="display:none;">-1</p>
                                            <i style="color:grey">No compró</i>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center" style="width: 20px;">
                                        <?php if ($ult) { ?>
                                            <p style="display:none;"><?php echo date('Y/m/d', strtotime($ult)); ?></p>
                                            <button type="button" class="btn btn-rounded btn-primary"
                                                data-toggle="collapse"
                                                data-target="#collapseOneoutline<?php echo $id_clienteint; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapseOneoutline<?php echo $id_clienteint; ?>"
                                                style="width:100%;">Ver compras</button>
                                            <?php listouldies($rjdhfbpqj, $id_clienteint); ?>
                                        <?php } else { ?>
                                            <i style="color:grey">No compró</i>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>




                    <?php
                    // Paginador compacto (usa data-page y data-per para la delegación)
                    function dibujar_paginador($page, $total_pages, $per_page)
                    {
                        if ($total_pages <= 1) return '';
                        $html = '<nav class="paginacion" aria-label="Page navigation"><ul class="pagination pagination-sm justify-content-center" style="margin-top:10px;">';
                        $prev = max(1, $page - 1);
                        $next = min($total_pages, $page + 1);
                        $disabledPrev = ($page == 1) ? ' disabled' : '';
                        $disabledNext = ($page == $total_pages) ? ' disabled' : '';
                        $html .= '<li class="page-item' . $disabledPrev . '"><a class="page-link" href="#" data-page="1" data-per="' . $per_page . '">&laquo;</a></li>';
                        $html .= '<li class="page-item' . $disabledPrev . '"><a class="page-link" href="#" data-page="' . $prev . '" data-per="' . $per_page . '">&lsaquo;</a></li>';
                        $start = max(1, $page - 2);
                        $end   = min($total_pages, $page + 2);
                        if ($start > 1) {
                            $html .= '<li class="page-item"><a class="page-link" href="#" data-page="1" data-per="' . $per_page . '">1</a></li>';
                            if ($start > 2) $html .= '<li class="page-item disabled"><span class="page-link">…</span></li>';
                        }
                        for ($p = $start; $p <= $end; $p++) {
                            $active = ($p == $page) ? ' active' : '';
                            $html .= '<li class="page-item' . $active . '"><a class="page-link" href="#" data-page="' . $p . '" data-per="' . $per_page . '">' . $p . '</a></li>';
                        }
                        if ($end < $total_pages) {
                            if ($end < $total_pages - 1) $html .= '<li class="page-item disabled"><span class="page-link">…</span></li>';
                            $html .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $total_pages . '" data-per="' . $per_page . '">' . $total_pages . '</a></li>';
                        }
                        $html .= '<li class="page-item' . $disabledNext . '"><a class="page-link" href="#" data-page="' . $next . '" data-per="' . $per_page . '">&rsaquo;</a></li>';
                        $html .= '<li class="page-item' . $disabledNext . '"><a class="page-link" href="#" data-page="' . $total_pages . '" data-per="' . $per_page . '">&raquo;</a></li>';
                        $html .= '</ul></nav>';
                        return $html;
                    }
                    echo dibujar_paginador($page, $total_pages, $per_page);

                    // Cierro conexión si querés:
                    mysqli_close($rjdhfbpqj);

                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*     // Límite y tipos permitidos
        const MAX_BYTES = 5 * 1024 * 1024; // 5MB
        const EXT_PERMITIDAS = ['txt', 'jpg', 'jpeg', 'png', 'mpg', 'opus', 'pdf'];

        function extDeNombre(nombre) {
            const p = nombre.lastIndexOf('.');
            return p >= 0 ? nombre.substring(p + 1).toLowerCase() : '';
        }

        // Delegación para múltiples bloques
        $(document).on('click', '.btn-guardar-nota', function() {
            const wrapSel = $(this).data('wrap');
            const $wrap = $(wrapSel);

            const id_cliente = $wrap.find('.id_cliente').val();
            const id_orden = $wrap.find('.id_orden').val();
            const nota = $wrap.find('.nota').val().trim();
            const $fileInput = $wrap.find('.archinota');
            const $alert = $wrap.find('.alert');

            $alert.hide().removeClass('alert-success alert-danger').text('');

            // Validar archivo (opcional: se puede enviar solo texto)
            let archivo = null;
            if ($fileInput[0].files && $fileInput[0].files.length > 0) {
                archivo = $fileInput[0].files[0];

                // tamaño
                if (archivo.size > MAX_BYTES) {
                    $alert.addClass('alert-danger').text('El archivo supera los 5MB.').show();
                    return;
                }

                // extensión
                const ext = extDeNombre(archivo.name);
                if (!EXT_PERMITIDAS.includes(ext)) {
                    $alert.addClass('alert-danger').text('Formato no permitido.').show();
                    return;
                }
            }

            // Al menos algo: nota o archivo
            if (!nota && !archivo) {
                $alert.addClass('alert-danger').text('Cargá una nota o elegí un archivo.').show();
                return;
            }

            const fd = new FormData();
            fd.append('id_cliente', id_cliente);    
            fd.append('id_orden', id_orden);
            fd.append('nota', nota);
            if (archivo) fd.append('archinota', archivo);

            $.ajax({
                url: '../flujocompra/guarda_notacli.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $alert.removeClass('alert-success alert-danger').text('Guardando...').addClass('alert-info').show();
                },
                success: function(resp) {
                    // Se espera JSON
                    let data = {};
                    try {
                        data = JSON.parse(resp);
                    } catch (e) {}

                    if (data.ok) {
                        $alert.removeClass('alert-info alert-danger').addClass('alert-success').text('Guardado correctamente.').show();

                        // limpiar
                        $wrap.find('.nota').val('');
                        $fileInput.val('');
                    } else {
                        $alert.removeClass('alert-info').addClass('alert-danger').text(data.msg || 'Error al guardar.').show();
                    }
                },
                error: function() {
                    $alert.removeClass('alert-info').addClass('alert-danger').text('Error de comunicación.').show();
                }
            });
        }); */


        function ajax_cargarnota(idcliente) {
            // armamos FormData en vez de objeto plano
            var parametros = new FormData();
            var nota = document.getElementById('nota' + idcliente).value || '';
            var input = $('#archinota' + idcliente)[0]; // <input type="file" id="archinota{ID}">
            var file = (input && input.files && input.files[0]) ? input.files[0] : null;

            parametros.append('idcliente', idcliente);
            parametros.append('nota', nota);
            if (file) {
                parametros.append('archinota', file);
            }

            $.ajax({
                url: '/flujocompra/guarda_notacli.php',
                type: 'POST',
                data: parametros,
                processData: false, // <- clave
                contentType: false, // <- clave
                cache: false,
                beforeSend: function() {
                    console.log("Enviando datos al servidor...");
                },
                success: function(response) {
                    $('#historialconver' + idcliente).html(response);
                    // location.reload();
                },
                error: function(xhr, status, err) {
                    console.error('Error AJAX:', status, err);
                }
            });
        }
    </script>