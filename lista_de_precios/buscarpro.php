<?php include('../f54du60ig65.php');
include('../listadeprecio/func_fechalista.php');

$fechalista = fechalista($rjdhfbpqj);

$buscar = $_POST['buscar'];
$buscar = str_replace(' ', '%', $buscar);
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


function buscarlist($rjdhfbpqj, $unidsx, $fechalista)
{
  $fraciocopy = 0;
  $stockdispom = 0;
  /* veo el fraccionado info d
el producto */
  $sqldrod = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id = '$unidsx' and estado='0'");
  if ($rowpdaod = mysqli_fetch_array($sqldrod)) {
    $cantidbiene = $rowpdaod['kilo'];
    $unidadnom = $rowpdaod['unidadnom'];

    $fraciocopy .= '*' . $rowpdaod['nombre'] . '*/n/n';


    $modo_producto = $rowpdaod['modo_producto'];
    $ventaminima = $rowpdaod['ventaminma'];
    $fraccionado = $rowpdaod['fracionado'];
    $mensaje = $rowpdaod['mensaje'];
    $id_categoria = $rowpdaod['categoria'];
    $id_marca = $rowpdaod['id_marcas'];

    $sqlsw = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$unidsx'");
    while ($rowsdk = mysqli_fetch_array($sqlsw)) {
      $stockdispom += $rowsdk['CantStock'];
    }




    /* saber como lo venden al producto en la lista de&nbsp;Precio&nbsp;*/

    $sqlprecioprod = mysqli_query($rjdhfbpqj, "SELECT * FROM precioprod Where id_producto = '$unidsx' and fecha <='$fechalista' and cerrado = '1' and confirmado = '1' ORDER BY fecha DESC, id DESC;");
    if ($rowprecioprod = mysqli_fetch_array($sqlprecioprod)) {
      $mub = $rowprecioprod["mub"];
      $muc = $rowprecioprod["muc"];
      $mud = $rowprecioprod["mud"];
      $mue = $rowprecioprod["mue"];

      $mkb = $rowprecioprod["mkb"];
      $mkc = $rowprecioprod["mkc"];
      $mkd = $rowprecioprod["mkd"];
      $mke = $rowprecioprod["mke"];

      $mpa = $rowprecioprod["mpa"];
      $mpb = $rowprecioprod["mpb"];
      $mpc = $rowprecioprod["mpc"];
      $mpd = $rowprecioprod["mpd"];
      $mpe = $rowprecioprod["mpe"];

      $eub = $rowprecioprod["eub"];
      $euc = $rowprecioprod["euc"];
      $eud = $rowprecioprod["eud"];
      $eue = $rowprecioprod["eue"];

      $ekb = $rowprecioprod["ekb"];
      $ekc = $rowprecioprod["ekc"];
      $ekd = $rowprecioprod["ekd"];
      $eke = $rowprecioprod["eke"];

      $epa = $rowprecioprod["epa"];
      $epb = $rowprecioprod["epb"];
      $epc = $rowprecioprod["epc"];
      $epd = $rowprecioprod["epd"];
      $epe = $rowprecioprod["epe"];



      $fracio = '  <a href="#" class="list-group-item list-group-item-action">1 ' . $unidadnom . ' <br>Precio <b>$' . number_format($mpa, 0, ',', '.') . '</b></a>';
      $fraciocopy .= '1 ' . $unidadnom . ' x *$' . number_format($mpa, 0, ',', '.') . '*/n';

      if ($mub == "0" && $mkb > 0 && $mpb > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkb . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($mpb * $mkb, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpb, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mkb . ' ' . $unidadnom . ' x  *$' . number_format($mpb * $mkb, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpb, 0, ',', '.') . ')_ /n';
      }

      if ($muc == "0" && $mkc > 0 && $mpc > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkc . ' ' . $unidadnom . ' &nbsp;Precio&nbsp;<b>$' . number_format($mpc * $mkc, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpc, 0, ',', '.') . ')</i><br></a>';


        $fraciocopy .= '' . $mkc . ' ' . $unidadnom . '  x *$' . number_format($mpc * $mkc, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpc, 0, ',', '.') . ')_ /n';
      }

      if ($mud == "0" && $mkd > 0 && $mpd > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkd . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($mpd * $mkd, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpd, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mkd . ' ' . $unidadnom . ' x  $' . number_format($mpd * $mkd, 0, ',', '.') . ' _(' . $unidadnom . '&nbsp;$' . number_format($mpd, 0, ',', '.') . ')_ /n';
      }

      if ($mue == "0" && $mke > 0 && $mpe > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mke . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($mpe * $mke, 0, ',', '.') . '</b></a><i>(' . $unidadnom . '&nbsp;$' . number_format($mpe, 0, ',', '.') . ')</i><br>';

        $fraciocopy .= '' . $mke . ' ' . $unidadnom . '&nbsp;$' . number_format($mpe * $mke, 0, ',', '.') . '_(' . $unidadnom . '&nbsp;$' . number_format($mpe, 0, ',', '.') . ')_ /n';
      }


      if ($mub == "1" && $mkb > 0 && $mpb > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
Precio <b>$' . number_format($mpb * $cantidbiene * $mkb, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpb, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mkb . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($mpb * $cantidbiene * $mkb, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpb, 0, ',', '.') . ')_ /n';
      }

      if ($muc == "1" && $mkc > 0 && $mpc > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
Precio <b>$' . number_format($mpc * $cantidbiene * $mkc, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpc, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mkc . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($mpc * $cantidbiene * $mkc, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpc, 0, ',', '.') . ')_ /n';
      }

      if ($mud == "1" && $mkd > 0 && $mpd > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mkd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
 &nbsp;Precio&nbsp;<b>$' . number_format($mpd * $cantidbiene * $mkd, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpd, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mkd . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($mpd * $cantidbiene * $mkd, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpd, 0, ',', '.') . ')_ /n';
      }

      if ($mue == "1" && $mke > 0 && $mpe > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $mke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($mpe * $cantidbiene * $mke, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($mpe, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $mke . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($mpe * $cantidbiene * $mke, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($mpe, 0, ',', '.') . ')_/n';
      }
      if ($eub == "0" && $ekb > 0 && $epb > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekb . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($epb * $ekb, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epb, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $ekb . ' ' . $unidadnom . ' x  *$' . number_format($epb * $ekb, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epb, 0, ',', '.') . ')_ /n';
      }

      if ($euc == "0" && $ekc > 0 && $epc > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekc . ' ' . $unidadnom . ' &nbsp;Precio&nbsp;<b>$' . number_format($epc * $ekc, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epc, 0, ',', '.') . ')</i><br></a>';


        $fraciocopy .= '' . $ekc . ' ' . $unidadnom . '  x *$' . number_format($epc * $ekc, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epc, 0, ',', '.') . ')_ /n';
      }

      if ($eud == "0" && $ekd > 0 && $epd > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekd . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($epd * $ekd, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epd, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $ekd . ' ' . $unidadnom . ' x  $' . number_format($epd * $ekd, 0, ',', '.') . ' _(' . $unidadnom . '&nbsp;$' . number_format($epd, 0, ',', '.') . ')_ /n';
      }

      if ($eue == "0" && $eke > 0 && $epe > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $eke . ' ' . $unidadnom . '&nbsp;Precio&nbsp;<b>$' . number_format($epe * $eke, 0, ',', '.') . '</b></a><i>(' . $unidadnom . '&nbsp;$' . number_format($epe, 0, ',', '.') . ')</i><br>';

        $fraciocopy .= '' . $eke . ' ' . $unidadnom . '&nbsp;$' . number_format($epe * $eke, 0, ',', '.') . '_(' . $unidadnom . '&nbsp;$' . number_format($epe, 0, ',', '.') . ')_ /n';
      }


      if ($eub == "1" && $ekb > 0 && $epb > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekb . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '
  Precio <b>$' . number_format($epb * $cantidbiene * $ekb, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epb, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $ekb . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($epb * $cantidbiene * $ekb, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epb, 0, ',', '.') . ')_ /n';
      }

      if ($euc == "1" && $ekc > 0 && $epc > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekc . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . '  
  Precio <b>$' . number_format($epc * $cantidbiene * $ekc, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epc, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $ekc . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($epc * $cantidbiene * $ekc, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epc, 0, ',', '.') . ')_ /n';
      }

      if ($eud == "1" && $ekd > 0 && $epd > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $ekd . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' 
   &nbsp;Precio&nbsp;<b>$' . number_format($epd * $cantidbiene * $ekd, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epd, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $ekd . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($epd * $cantidbiene * $ekd, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epd, 0, ',', '.') . ')_ /n';
      }

      if ($eue == "1" && $eke > 0 && $epe > 0) {
        $fracio .= '  <a href="#" class="list-group-item list-group-item-action">' . $eke . ' ' . $modo_producto . ' x ' . $cantidbiene . '  ' . $unidadnom . ' Precio<b> $' . number_format($epe * $cantidbiene * $eke, 0, ',', '.') . '</b>&nbsp;<i style="color:grey;">(' . $unidadnom . '&nbsp;$' . number_format($epe, 0, ',', '.') . ')</i><br></a>';

        $fraciocopy .= '' . $eke . ' ' . $modo_producto . ' ' . $cantidbiene . ' ' . $unidadnom . ' x *$' . number_format($epe * $cantidbiene * $eke, 0, ',', '.') . '* _(' . $unidadnom . '&nbsp;$' . number_format($epe, 0, ',', '.') . ')_';
      }
    }

    if (($mub == '0' && $mkb > 0 && $mpb > 0) || ($muc == '0' && $mkc > 0  && $mpc > 0) || ($mud == '0' && $mkd > 0 && $mpd > 0) || ($mue == '0' && $mke > 0  && $mpe > 0)) {
      $selecunid = "1";
    } else {
      $selecunid = "0";
    }
    if (($mub == '1' && $mkb > 0 && $mpb > 0) || ($muc == '1' && $mkc > 0  && $mpc > 0) || ($mud == '1' && $mkd > 0 && $mpd > 0) || ($mue == '1' && $mke > 0  && $mpe > 0)) {
      $selecunidc = "1";
    } else {
      $selecunidc = "0";
    }


    if ($ventaminima == '0') {
      $ventamida = "No tiene <br>venta mínima.";
    } else {
      $ventamida = 'La venta <br>minima es de ' . $ventaminima . ' ' . $unidadnom;
    }
    if ($ventaminima == '0') {
      $ventamidad = "Sin venta mínima - Precios sin Impuestos.";
    } else {
      $ventamidad = 'La venta minima es de ' . $ventaminima . ' ' . $unidadnom . ' - Precios sin Impuestos.';
    }

    if ($mensaje == '') {
      $menobs = "";
    } else {
      $menobs = '' . $mensaje . '';
    }


    echo '


      <tr>
        <td>' . $rowpdaod['nombre'] . '</td>
       
        <td>
        
<div class="list-group">
' . $fracio . '
</div>
        </td>
        <td>' . $stockdispom . '&nbsp;' . $unidadnom . '</td>
         <td>' . $modo_producto . ' x ' . $cantidbiene . ' ' . $unidadnom . '</td>


<td>' . $ventamida . '</td>

        <td>' . $menobs . '</td>
        
        </td>

<td><button type="button" class="btn btn-warning" onclick=copyToClipboard("#fot1' . $unidsx . '")>Copiar Informacíon</button>';
    $mensaje_formateado = str_replace('/n', "\n", $fraciocopy);
    echo '<div class="invisible">
<textarea id="fot1' . $unidsx . '">';
    echo '' . $mensaje_formateado . ''; // Esto es solo para mostrarlo 
    echo '
' . $ventamidad . '
</textarea>
</div>

</td>

        
      </tr>

';
  }
}

?>


<?
$sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
                    productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.kilo, 
                    proveedores.id, proveedores.empresa as empresapro,
                    marcas.empresa, 
                    categorias.nombre as nomcate

                    FROM 
                    productos 
                    INNER JOIN marcas ON productos.id_marcas = marcas.id 
                    INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
                    INNER JOIN categorias ON productos.categoria = categorias.id
                    
                    
                    Where  $condicion_final OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' ORDER BY `productos`.`nombre` ASC ");


echo '
  <table class="table table-bordered">
<thead>
      <tr>
      <th>Producto</th>
        <th>Precio/s</th>
        <th>Stock</th>
        <th>Presentacion</th>
        <th>Venta</th>
        <th>Observeción</th>
        <th>Copiar</th>
      </tr>
    </thead>
    <tbody>';


while ($rowproducto = mysqli_fetch_array($sqljoin)) {




  $unidsx = $rowproducto['idproducto'];
  buscarlist($rjdhfbpqj, $unidsx, $fechalista);
}



?>
</tbody>
</table>