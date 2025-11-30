<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
$aster = "'";
/* $modobus = $_POST['modobus'];
$buscar = $_POST['buscar'];
 */
include('../control_stock/funcionStockS.php');
include('../funciones/funcUbicProdHab.php');



$idcodw = $_POST["jfndhom"];
$idw = base64_decode($idcodw);
//$costo = $_POST["costo"];



$modobus = $_POST['modobus'];
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




if (is_numeric($buscar)) {
  $sqlbusuer = "productos.id = '$buscar'";
} else {



  $sqlbusuer = $condicion_final . " OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' OR categorias.nombre LIKE '%$buscar%' ";
  //$sqlbusuer="productos.nombre LIKE '%$buscar%' OR marcas.empresa LIKE '%$buscar%' OR productos.codigo LIKE '%$buscar%' OR proveedores.empresa LIKE '%$buscar%' ";


}



$error = $_GET['error'];
$id = base64_decode($idcod);
$timean = date("His");



?>
<!--   <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  
  
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/style.css" rel="stylesheet" type="text/css"> -->
<!-- End css -->
<script>
  $('#default-datatable').DataTable({
    "order": [
      [1, "desc"]
    ],
    responsive: true
  });
</script>
<div class="contentbar">
  <!-- Start row -->
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
      <div class="card m-b-30">

        <div class="card-body">

          <table id="default-datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">ID Prod.</th>
                <th>Ubicación</th>
                <th>Nombre Producto</th>
                <th class="text-center">Stock Unid.</th>
                <th class="text-center">Stock Bulto.</th>
                <? if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "30") { ?>
                  <th class="text-center">Alarma</th><? } ?>
                <th class="text-center">Producto Vencimiento</th>
                <? if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "57" || $tipo_usuario == "30") { ?>
                  <th>Acción</th>
                <? } ?>
              </tr>
            </thead>
            <tbody>
              <?php




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


Where  $sqlbusuer  ORDER BY `productos`.`nombre` ASC ");






              while ($rowproductos = mysqli_fetch_array($sqljoin)) {



                $idcategoria = $rowproductos["categoria"];
                $id_proveedor = $rowproductos["id_proveedor"];
                $gananciasper = $rowproductos["gananciasper"];
                $id = $rowproductos["idproducto"];
                $estado = $rowproductos["estado"];
                $idcodp = base64_encode($id);
                $id_marcas = $rowproductos["id_marcas"];
                $modo_producto = $rowproductos["modo_producto"];
                $unidadnom = $rowproductos["unidadnom"];
                $kilo = $rowproductos["kilo"];
                $alarmaven = $rowproductos["alarmaven"];
                if ($alarmaven > 0) {
                  $alarmaven = $rowproductos["alarmaven"] . " Meses";
                } else {
                  $alarmaven = '<p style="color:red;">Off</p>';
                }
                if ($estado == 0) {
                  $estadover = "";
                } else {
                  $estadover = '; background-color:#FDDFE1;';
                }
                /* 

if($unidadnom=="Kg."){$bulto="Kg.";$comovie=' <h9 style="color:grey;font-size:8pt;">Presentación: '.$rowproductos['modo_producto'].' x '.$kilo.' '.$unidadnom.'</h9><br>'; }
if($unidadnom=="Uni."){$bulto=$rowproductos['modo_producto']; $comovie=' <h9 style="color:grey;font-size:8pt;">Presentación: '.$bulto.' x '.$kilo.' '.$unidadnom.'</h9><br>';} */

                $bulto = $rowproductos['modo_producto'];
                $comovie = ' <h9 style="color:grey;font-size:8pt;">Presentación: ' . $bulto . ' x ' . $kilo . ' ' . $unidadnom . '</h9><br>';

                $sqlprecioprod = ${"sqlprecioprod" . $rowproductos["idproducto"]};
                $rowprecioprod = ${"rowprecioprod" . $rowproductos["idproducto"]};



                $fecven = ${"fecven" . $rowproductos["idproducto"]};
                $tipo = ${"tipo" . $rowproductos["idproducto"]};



                if ($modo_producto == "0") {
                  $unidadver = "Caja";
                }
                if ($modo_producto == "1") {
                  $unidadver = "Bolsa";
                }
                if ($modo_producto == "2") {
                  $unidadver = "Kg.";
                }
                if ($modo_producto == "3") {
                  $unidadver = "Pack";
                }

                if ($estado == '1') {
                  $colorestado = 'background-color: #ffe6e6;';
                } else {
                  $colorestado = '';
                }
                $idfila = 1 + $idfila;


                $idproduc = ${'idproduc' . $rowproductos['id']};


                $sqlstok = mysqli_query($rjdhfbpqj, "SELECT * FROM stockhgz1 Where id_producto = '$id' and CantStock > 0");
                if ($rowstok = mysqli_fetch_array($sqlstok)) {
                  $idproduc = $id;
                  $CantStocks = SumaStock($rjdhfbpqj, $idproduc);
                  $CantStocksuni = SumaStockunid($rjdhfbpqj, $idproduc);
                  $fecven = vencimientoprox($rjdhfbpqj, $idproduc);
                  $Ubprod = ubicacionprohab($rjdhfbpqj, $idproduc);

                  if ($CantStocks > '0') {
                    $CantStock = $CantStocks;
                    //$CantStock = $CantStocks . " " . $bulto;
                    $CantStocksunis = intval($CantStocksuni);
                    //$CantStocksunis = $CantStocksuni." ".$unidadnom;
                  } else {
                    $CantStock = '<i style="color:red;">0</i>';
                    $CantStocksunis = '<i style="color:red;">0</i>';
                  }
                } else {
                  $CantStock = '<i style="color:red;">0</i>';
                  $CantStocksunis = '<i style="color:red;">0</i>';
                }





                //nombre de la marca
                $sqlmarcasb = mysqli_query($rjdhfbpqj, "SELECT * FROM marcas Where id = '$id_marcas' ");
                if ($rowmarcasb = mysqli_fetch_array($sqlmarcasb)) {
                  $marcaempre = $rowmarcasb["empresa"];
                  if ($gananciasper == "0") {
                    $texga = "dark";
                    $tipo = $rowmarcasb["tipo"];
                  }
                }


                $uniddom = $unidadnom;
                if ($fecven != '0000-00-00' && $fecven != "" && $fecven != "3000-01-01") {
                  $fecven = cantoprox($rjdhfbpqj, $idproduc, $uniddom);
                } else {


                  if ($fecven == "3000-01-01") {

                    $fecven = "<i>No Vence</i>";
                  } else {
                    $fecven = '<img src="../assets/images/sinvencimiento.png" title="No tiene fecha de vencimiento">';
                  }
                }


                echo '
<tr> 
        
        <td class="text-center" style="width:0px; ' . $estadover . '">' . $id . '</td>
        <td style="width:0px;' . $estadover . '">' . $Ubprod . '</td>
        <td style="color:black;' . $estadover . '"><strong>' . $rowproductos["nombre"] . '</strong>
             <br>
               <h9 style="color:black;font-size:10pt;' . $estadover . '">Categoría: ' . $rowproductos["nomcate"] . '</h9><br>
              ' . $comovie . '
               <h9 style="color:grey;font-size:8pt;' . $estadover . '">Marca: ' . $marcaempre . '</h9><br>
               <h9 style="color:grey;font-size:8pt;' . $estadover . '">Proveedor: ' . $rowproductos["empresapro"] . '</h9>
               </td> 
             <td style="width:100px; text-align:center;' . $estadover . '">' . $CantStocksunis . '</td>
             <td style="width:100px; text-align:center;' . $estadover . '">' . $CantStock . '</td>
             
             
             ';

                if ($tipo_usuario == "0" || $tipo_usuario == "33" || $tipo_usuario == "30" || $tipo_usuario == "57") {
                  echo '
             <td style="width:0px; text-align:center;' . $estadover . '">' . $alarmaven . '</td>';
                }

                echo '  <td style="color:black;' . $estadover . '"> 
                                ' . $fecven . '
                                </td>';




                if ($tipo_usuario == "0"  || $tipo_usuario == "57" || $tipo_usuario == "33" || $tipo_usuario == "1" || $tipo_usuario == "3" || $tipo_usuario == "30") {

                  echo '    <td style="width:0px;' . $estadover . '"><div class="button-list" tabindex="-1">

                               

                                <a href="/control_stock/?jfndhom=' . $idcodp . '&kkfnuhtf=' . $idcodp . '" target="_parent" class="btn btn-success-rgba" title="Editar Stock" tabindex="-1"><i class="ri-pencil-line"></i></a>
                              
                                </td> ';
                }
                echo '</tr> 
';
              }
              ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- End col -->

  </div>
  <!-- End row -->
</div>
<!-- Start js -->
<!--  <script src="../assets/js/jquery.min.js"></script> -->
<!--   <script src="../assets/js/bootstrap.min.js"></script> -->




</body>

</html>

<!--    <script src="../../assets/js/popper.min.js"></script> -->
<!-- Start js -->
<!--  <script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTablesb.min.js"></script>
  <script src="../assets/js/custom/custom-table-datatable.js"></script> -->
<?php

mysqli_close($rjdhfbpqj);


?>