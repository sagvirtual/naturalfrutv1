<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


$busquecl = $_POST['id_cliente'];

$busquedadsr = mysqli_real_escape_string($rjdhfbpqj, $busquecl);

// Dividir la cadena de búsqueda en palabrascl
$palabrascl = explode(' ', $busquedadsr);

// Crear un array para almacenar las condiciones de búsqueda para cada palabra
$condicioncl = array();

foreach ($palabrascl as $palabracl) {
    // Reemplazar espacios con comodines para que coincida con cualquier palabra
    $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
    // Agregar la condición para esta palabra al array
    $condicioncl[] = "nom_empr LIKE '$terminocl' Or nom_contac LIKE '$terminocl'";
}

// Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
$condicion_fincl = implode(' AND ', $condicioncl);



?>
<style>
    .cuadbus {
        margin: 4;
        /* Elimina el margen */
        padding: 4;
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
    if (!empty($_POST['id_cliente']) && $_POST['id_cliente'] != ' ' && $_POST['id_cliente'] != null)
        /* id_cliente proveedor y marca */
        $sqlordenc = mysqli_query($rjdhfbpqj, "SELECT nom_empr,address,localidad,id,nom_contac FROM clientes Where  $condicion_fincl  and estado='0' ORDER BY `clientes`.`nom_empr` ASC Limit 5");

    while ($rowordencl = mysqli_fetch_array($sqlordenc)) {


        $nombrevc = $rowordencl["nom_empr"];
        $nom_contac = $rowordencl["nom_contac"];
        $address = $rowordencl["address"];
        $localidad = $rowordencl["localidad"];
        $idprosa = $rowordencl["id"];


        echo '
 <p class="cuadbus" style="padding-left:10px;">' . $nom_contac . '- ' . $nombrevc . '<i style="display:none;">@' . $rowordencl["id"] . '@</i></p>

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