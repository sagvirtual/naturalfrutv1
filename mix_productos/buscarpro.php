<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../listadeprecio/func_fechalista.php');
include('../control_stock/funcionStockSnot.php');






$fechalista=fechalista($rjdhfbpqj);

$buscar = $_POST['buscar'];
$buscar =str_replace(' ', '%', $buscar);
$_SESSION["buscar"] = $_POST['buscar'];
//
//nuevo buscador
$busquedadds = $_POST['buscar'];
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

//




?>


      
<?php


function buscarlist ($rjdhfbpqj,$unidsx,$fechalista,$tipo_usuario){

/* veo el fraccionado info d
el producto */

$comilla="'";
$sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$unidsx' and estado='0' and mix='0'");
if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
$cantidbiene=$rowpdaod['kilo'];
$unidadnom=$rowpdaod['unidadnom'];
$modo_producto=$rowpdaod['modo_producto'];


$stockdispomd=SumaStock($rjdhfbpqj,$unidsx);

if($stockdispomd > 0){

  $stockdispom=$stockdispomd." ".$unidadnom;

}else{ $stockdispom='';}


/* saber como lo venden al producto en la lista de&nbsp;Precio&nbsp;*/

$sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$unidsx' and fecha <='$fechalista' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {

$costo_total = $rowprecioprod["costo_total"];


} 




echo'


      <tr>
      
      <td>'.$rowpdaod['nombre'].'</td>
      <td class="text-center">'.$modo_producto.' x '.$cantidbiene.' '.$unidadnom.'</td>
      <td class="text-center">'.$stockdispom.'</td>';
      if($tipo_usuario=='0'){ 
        echo'<td class="text-center">
        $'.number_format($costo_total, 2, ',', '.').'
        

        </td>';
}
echo'
<td class="text-center"><button type="button" class="btn btn-warning" onclick="ajax_insermix('.$comilla.''.$rowprecioprod["id_producto"].''.$comilla.')">Agregar al Mix</button>


</td>

        
      </tr>

      

';
}
}


               
?>  
 
 
<?   
                    $sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
                    productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.kilo, productos.mix, 
                    proveedores.id, proveedores.empresa as empresapro,
                    marcas.empresa, 
                    categorias.nombre as nomcate

                    FROM 
                    productos 
                    INNER JOIN marcas ON productos.id_marcas = marcas.id 
                    INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
                    INNER JOIN categorias ON productos.categoria = categorias.id
                    
                    
                    Where  $condicion_final OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' and productos.mix='0' ORDER BY `productos`.`nombre` ASC ");


echo '
  <table class="table table-bordered">
<thead>
      <tr>
      <th>Producto</th>
      <th class="text-center">Presentacion</th>
      <th class="text-center">Stock</th>';

      if($tipo_usuario=='0'){ 
      echo'
        <th class="text-center">Precio Costo</th>';
      }
     echo' <th class="text-center"></th></tr>
    </thead>
    <tbody>';


while ($rowproducto = mysqli_fetch_array($sqljoin)) {



    
    $unidsx=$rowproducto['idproducto'];
buscarlist ($rjdhfbpqj,$unidsx,$fechalista,$tipo_usuario);

}



?>    
 </tbody>
  </table>

  
