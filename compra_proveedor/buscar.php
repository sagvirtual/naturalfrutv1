<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

$busquedadds = $_POST['busqueda'];
$busquedads = mysqli_real_escape_string($rjdhfbpqj, $busquedadds);

// Dividir la cadena de búsqueda en palabras
$palabras = explode(' ', $busquedads);

// Crear un array para almacenar las condiciones de búsqueda para cada palabra
$condiciones = array();

foreach ($palabras as $palabra) {
    // Reemplazar espacios con comodines para que coincida con cualquier palabra
    $termino = '%' . str_replace(' ', '%', $palabra) . '%';
    // Agregar la condición para esta palabra al array
    $condiciones[] = "productos.nombre LIKE '$termino'";
}

// Unir todas las condiciones con el operador AND para asegurarse de que todas las palabras estén presentes
$condicion_final = implode(' AND ', $condiciones);

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
        width: 600px;
        position: absolute;
        margin: 0;
        /* Elimina el margen */
        padding: 4;
        /* Elimina el padding */
        top: 195;
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

    /* busqueda proveedor y marca */
    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT 
   productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.verunidad, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.kilo, 
   proveedores.id, proveedores.empresa as empresapro,
   marcas.empresa 

   FROM 
   productos INNER JOIN marcas ON productos.id_marcas = marcas.id 
   INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
   
  
   Where  $condicion_final and productos.estado='0' OR marcas.empresa LIKE '%$busquedads%' OR proveedores.empresa LIKE '%$busquedads%'  ORDER BY `productos`.`position` ASC ");
    while ($roworden = mysqli_fetch_array($sqlorden)) {
        $numberimp = $numberimp + 1;

        $modo_producto = $roworden["modo_producto"];
        $verunidad = $roworden["verunidad"];
        $unidadver = $roworden["unidadnom"];
        $nombrev = $roworden["nombre"];
        $canxbul = $roworden["kilo"];
        $empre = $roworden['empresapro'];

        $id_marcas = $roworden["id_marcas"];
        if ($id_marcas != '0') {
            $empresamarca = ' <i style="color:blue;">(' . $roworden['empresa'] . ')</i>';
        } else {
            $empresamarca = "";
        }


        $id_mprov = $roworden["id"];
        if ($id_mprov != '0' || $empre != 'Sin proveedor') {
            $empresprov = '<br><i style="color:grey; font-size:10pt;">(' . $roworden['empresapro'] . ')</i>';
        } else {
            $empresprov = "";
        }


        if ($modo_producto == "0") {
            $unidadnomav = "Caja";
        }
        if ($modo_producto == "1") {
            $unidadnomav = "Bolsa";
        }
        if ($modo_producto == "2") {
            $unidadnomav = "Kg.";
        }
        if ($modo_producto == "3") {
            $unidadnomav = "Pack";
        }
        $nombrevd = explode("(", $nombrev);

        $nombrevein = "<b>" . $nombrevd[0] . "</b>  " . $unidadnomav . " x " . $canxbul . " " . $unidadver . $empresamarca . $empresprov;

        echo '
 <p class="cuadbus" style="padding-left:5px;">' . $nombrevein . ' <i style="display:none;">idproducto=@' . $roworden["idproducto"] . '@</i></p>
            ';
    }

    ?>

</div>