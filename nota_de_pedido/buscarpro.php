<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../control_stock/funcionStockSnot.php');
include('../funciones/func_ofertas.php');

$busquedadds = $_POST['producto'];
$id_ordenpro = $_POST['id_ordenp'];
$busquedads = mysqli_real_escape_string($rjdhfbpqj, $busquedadds);
if (strlen(trim($busquedads)) >= 2) {
    // Dividir la cadena de búsqueda en palabras
    $palabras = explode(' ', $busquedads);

    // Crear un array para almacenar las condiciones de búsqueda para cada palabra
    $condiciones = array();

    foreach ($palabras as $palabra) {
        // Reemplazar espacios con comodines para que coincida con cualquier palabra
        $termino = '%' . str_replace(' ', '%', $palabra) . '%';
        // Agregar la condición para esta palabra al array
        $condiciones[] = "nombre LIKE '$termino'";
    }

    // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
    $condicion_final = implode(' AND ', $condiciones);



?>
    <style>
        .cuadbus {
            margin: 4;
            /* Elimina el margen */
            padding: 4;
            margin-left: 10px;
            /* Elimina el padding */
        }

        .fonbus {
            border-left: 2px solid #06A8FF;
            border-right: 2px solid #06A8FF;
            border-bottom: 2px solid #06A8FF;
            width: 590px;
            position: relative;
            margin: 0;
            /* Elimina el margen */
            padding: 4;
            /* Elimina el padding */
            top: -23;
            background-color: #ffffff;
            /*  z-index: 1; */
            margin: 0;
            /* Elimina el margen */
            padding: 4;
            /* Elimina el padding */
            overflow: auto;
        }
    </style>
    <div id="cudrobus" class="fonbus">
        <?
        if (!empty($_POST['producto']) && $_POST['producto'] != ' ' && $_POST['producto'] != null)
            /* producto proveedor y marca */
            $sqlorden = mysqli_query($rjdhfbpqj, "SELECT id, nombre, unidadnom, modo_producto, kilo, estado FROM productos Where  $condicion_final and estado='0' ORDER BY `productos`.`nombre` ASC Limit 10");
        while ($roworden = mysqli_fetch_array($sqlorden)) {
            $numberimp = $numberimp + 1;

            $nombrev = $roworden["nombre"];
            $kilo = $roworden["kilo"];
            $unidadnom = $roworden["unidadnom"];
            $modo_producto = $roworden["modo_producto"];
            $presentacion = $roworden["modo_producto"] . " x " . $kilo . " " . $unidadnom;
            $nombrevd = explode("(", $nombrev);
            $idproduc = $roworden["id"];
            $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
            $marcno = $nombrevd[1];
            $resultoferta = oferta($rjdhfbpqj, $idproduc, $fechahoy, $id_clienteint);
            $oferta = $resultoferta['oferta'];
            if ($oferta == 1) {
                $tinedes = '<span class="badge bg-danger">% Oferta</span>';
            } else {
                $tinedes = '';
            }

            $stokbulto = $stockdispom / $kilo;
            $stokbulto = explode(".", $stokbulto);


            if (!empty($nombrevd[2])) {
                $marcnod = '<i style="color:blue;">(' . $nombrevd[2] . '</i>';
                $colorecaj = "black;";
            } else {
                $marcnod = "";
                $colorecaj = "blue;";
            }

            if ($marcno != '') {
                $empresamarca = ' <i style="color:' . $colorecaj . '">(' . $marcno . '</i>' . $marcnod . '';
            } else {
                $empresamarca = "";
            }

            $nombrevein = "<b>" . $nombrevd[0] . "</b>" . $tinedes . "<br>" . $presentacion . "<br>" . $empresamarca . " [Stock: " . $stockdispom . " " . $roworden['unidadnom'] . " / " . $stokbulto[0] . " " . $modo_producto . "]";

            echo '
 <p class="cuadbus">' . $nombrevein . '<i style="display:none;">[' . $roworden["id"] . '@' . $roworden["unidadnom"] . '@' . $id_ordenpro . '@</i></p>

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
<? } ?>