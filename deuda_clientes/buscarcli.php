<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');




?>
<style>
    .cuadbus {
        margin: 4px;
        /* Elimina el margen */
        padding: 4px;
        /* Elimina el padding */
    }

    .fonbus {
        border-left: 2px solid #06A8FF;
        border-right: 2px solid #06A8FF;
        border-bottom: 2px solid #06A8FF;
        width: 350px;
        position: absolute;
        margin: 0;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
        top: 248;
        background-color: #ffffff;
        z-index: 1;
        margin: 0;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
    }
</style>
<div id="cudrobus" class="fonbus">
    <?
    $busquecl = trim($_POST['id_cliente'] ?? '');
    $busquedadsr = mysqli_real_escape_string($rjdhfbpqj, $busquecl);

    // dividir por cualquier espacio en blanco y filtrar vacíos
    $palabrascl = preg_split('/\s+/', $busquedadsr);
    $palabrascl = array_filter($palabrascl, fn($w) => $w !== '');

    // armar condiciones, cada una entre paréntesis
    $condicioncl = [];
    foreach ($palabrascl as $palabracl) {
        $termino = '%' . $palabracl . '%';
        $condicioncl[] = "(nom_empr LIKE '$termino' OR nom_contac LIKE '$termino')";
    }

    // si querés que también matchee la frase completa ("La Melona" tal cual)
    $frase = '%' . $busquedadsr . '%';
    $condicionFrase = "(nom_empr LIKE '$frase' OR nom_contac LIKE '$frase')";

    // unir: TODAS las palabras AND, o bien la frase completa
    $condicion_fincl = '';
    if ($condicioncl) {
        $condicion_fincl = '(' . implode(' AND ', $condicioncl) . " OR $condicionFrase)";
    } else {
        // sin palabras (cadena vacía): no filtres por nombre/contacto
        $condicion_fincl = '1=1';
    }

    if ($busquecl !== '') {
        $sql = "
        SELECT nom_empr, address, localidad, id, nom_contac
        FROM clientes
        WHERE ($condicion_fincl) AND estado='0'
        ORDER BY nom_empr ASC
        LIMIT 5
    ";
        $sqlordenc = mysqli_query($rjdhfbpqj, $sql);
    }


    while ($rowordencl = mysqli_fetch_array($sqlordenc)) {


        $nombrevc = $rowordencl["nom_empr"];
        $nom_contac = $rowordencl["nom_contac"];
        $address = $rowordencl["address"];
        $localidad = $rowordencl["localidad"];
        $idprosa = $rowordencl["id"];


        echo '
 <p class="cuadbus">' . $nom_contac . '- ' . $nombrevc . '<i style="display:none;">@' . $rowordencl["id"] . '@</i></p>

            ';
    }

    mysqli_close($rjdhfbpqj);
    ?>
    <script>
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Tab') {
                event.preventDefault();
                const focusableElements = 'input, button, [tabindex]:not([tabindex="-1"])';
                const focusable = Array.prototype.filter.call(document.querySelectorAll(focusableElements), function(element) {
                    return element.offsetWidth > 0 || element.offsetHeight > 0 || element === document.activeElement;
                });
                /*    const index = focusable.indexOf(document.activeElement);
                   if (index > -1) {
                       const nextIndex = (index + 1) % focusable.length;
                       focusable[nextIndex].focus();
                   } */
            }
        });
    </script>
</div>