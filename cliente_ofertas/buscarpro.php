<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../lusuarios/redirec.php');
include('func_ofertaclien.php');
include('../funciones/funcNombrcliente.php');
$aster = "'";

include('../control_stock/funcionStockSnot.php');
$comilla = "'";


$idcodw = $_POST["jfndhom"];
$id_cliente = $_POST["id_cliente"];
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
          <h5>Oferta para: (Id <?= $id_cliente ?>) <?= NomCliente($rjdhfbpqj, $id_cliente) ?> </h5>
          <table id="default-datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre Producto</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Oferta</th>
                <th class="text-center">Descuento<br>%</th>
                <th class="text-center">Ej. 3 x 1</th>
                <th class="text-center">Hasta que cantidad<br> aplico Oferta</th>
                <th class="text-center">Limite Stock<br>Oferta</th>
                <th class="text-center">Fecha<br>Desde</th>
                <th class="text-center">Fecha<br>Hasta</th>
                <th class="text-center">Acción</th>
                <th class="text-center">Activar<br>Oferta</th>
              </tr>
            </thead>
            <tbody>
              <?php


              if ($modobus == 0) {


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


Where productos.estado='0' and $sqlbusuer ORDER BY `productos`.`nombre` ASC ");
              } elseif ($modobus == 1) {
                $sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.kilo, 
proveedores.id, proveedores.empresa as empresapro,
marcas.empresa, 
categorias.nombre as nomcate,
ofertacli.id_cliente

FROM 
productos 
INNER JOIN marcas ON productos.id_marcas = marcas.id 
INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
INNER JOIN categorias ON productos.categoria = categorias.id
INNER JOIN ofertacli ON productos.id = ofertacli.id_producto


Where productos.estado='0' and activo='1' and ofertacli.id_cliente='$id_cliente' ORDER BY `productos`.`nombre` ASC ");
              } elseif ($modobus == 2) {
                $sqljoin = mysqli_query($rjdhfbpqj, "SELECT 
productos.id_marcas, productos.id as idproducto, productos.id_proveedor, productos.codigo, productos.modo_producto, productos.nombre, productos.gananciasper, productos.categoria, productos.detalle, productos.estado, productos.unidadnom, productos.kilo, 
proveedores.id, proveedores.empresa as empresapro,
marcas.empresa, 
categorias.nombre as nomcate,
ofertacli.id_cliente

FROM 
productos 
INNER JOIN marcas ON productos.id_marcas = marcas.id 
INNER JOIN proveedores ON productos.id_proveedor = proveedores.id
INNER JOIN categorias ON productos.categoria = categorias.id
INNER JOIN ofertacli ON productos.id = ofertacli.id_producto


Where productos.estado='0' and activo='0' and ofertacli.id_cliente='$id_cliente' ORDER BY `productos`.`nombre` ASC ");
              }






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
                $datofert = datosOfertaCli($rjdhfbpqj, $id_cliente, $id);
                $id_oferta = $datofert['id_oferta'];
                $descuento = $datofert['descuento'];
                $cantmax = $datofert['cantmax'];
                $unidad = $datofert['unidad'];
                $stock = $datofert['stock'];
                $unidstock = $datofert['unidstock'];
                $fecha_desde = $datofert['fecha_desde'];
                $fecha_hasta = $datofert['fecha_hasta'];
                $activo = $datofert['activo'];
                $nota = $datofert['nota'];
                $dosporeuno = $datofert['dosporeuno'];
                $forzadoprecio = $datofert['forzadoprecio'];
                if ($forzadoprecio == true) {
                  $chekedforza = "checked";
                } else {
                  $chekedforza = "";
                }

                if ($unidad == 0) {
                  $unidseleteda = "selected";
                  $unidseletedb = "";
                } else {
                  $unidseleteda = "";
                  $unidseletedb = "selected";
                }

                if ($unidstock == 0) {
                  $unidstseleteda = "selected";
                  $unidstseletedb = "";
                } else {
                  $unidstseleteda = "";
                  $unidstseletedb = "selected";
                }

                if ($activo == 0) {
                  $checactiv = "";
                } else {
                  $checactiv = "checked";
                }





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


                $idproduc = $rowproductos['idproducto'];






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

                if ($nota == "") {
                  $nota = "PROMO!";
                }

                $stockdispom = SumaStock($rjdhfbpqj, $idproduc);
                $stokbulto = $stockdispom / $kilo;
                $stokbulto = explode(".", $stokbulto);


                $nstockver = number_format($stockdispom, 0, ',', '.') . "&nbsp;" . $rowproductos['unidadnom'] . " <br> " . number_format($stokbulto[0], 0, ',', '.')  . "&nbsp;" . $modo_producto;
                if ($estado == 0) {
                  echo '
<tr> 
        
        <td><strong>' . $rowproductos["nombre"] . '</strong>
             <br>
                      ' . $comovie . '
               <h9 style="color:grey;font-size:8pt;">Id:' . $id . ' - Marca: ' . $marcaempre . '</h9><br>
               <h9 style="color:grey;font-size:8pt;">Proveedor: ' . $rowproductos["empresapro"] . '</h9>
               </td>
               <td class="text-center">
               ' . $nstockver . '
               </td>               
                  <td class="text-center">
                  <textarea style="width:200px;" class="text-center" id="nota' . $idproduc . '" name="nota' . $idproduc . '">' . $nota . '</textarea>
                  </td>  
                  
                  <td style="width:100px;">
                   <input type="text" id="descuento' . $idproduc . '" name="descuento' . $idproduc . '" value="' . $descuento . '" class="form-control text-center" onclick="select()">
                  </td>   
                  
                  <td style="width:100px;" class="text-center">
                    <input type="text" id="dosporeuno' . $idproduc . '" name="dosporeuno' . $idproduc . '" value="' . $dosporeuno . '" class="form-control text-center" onclick="select()"
                    oninput="calcularDescuentoPromo' . $idproduc . '()"
                    >
                         
                  </td>
                  <td style="width:220px;">
                    <div style="display: flex; gap: 10px; align-items: center;">
                    
                    <input type="text" id="cantmax' . $idproduc . '" name="cantmax' . $idproduc . '" value="' . $cantmax . '"  class="form-control text-center" onclick="select()" >
                         
                    <select name="unidad' . $idproduc . '" id="unidad' . $idproduc . '" class="form-control text-center" >

                                                  <option value="0" ' . $unidseleteda . '>' . $unidadnom . '</option>
                                                  <option value="1" ' . $unidseletedb . '>' . $modo_producto . '</option>


                                              </select>
                                             <input type="checkbox" id-"forzadoprecio' . $idproduc . '" name="forzadoprecio' . $idproduc . '" value="1" title="Forzar mismo Precio no importa la Cantidad" ' . $chekedforza . '>
                    </div>
                  </td>
                      <td style="width:220px;">
                    <div style="display: flex; gap: 10px; align-items: center;">
                   
                    <input type="text" id="stock' . $idproduc . '" name="stock' . $idproduc . '" value="' . $stock . '"  class="form-control text-center" onclick="select()" >
                         
                    <select name="unidstock' . $idproduc . '" id="unidstock' . $idproduc . '" class="form-control text-center">

                                                  <option value="0" ' . $unidstseleteda . '>' . $unidadnom . '</option>
                                                  <option value="1" ' . $unidstseletedb . '>' . $modo_producto . '</option>


                                              </select>
                    </div>
                  </td>
                  <td style="width:100px;">
                  <input type="date" id="desde_date' . $idproduc . '" name="desde_date' . $idproduc . '" value="' . $fecha_desde . '" class="form-control" >
                  </td>
                  <td style="width:100px;">
                  <input type="date" id="desde_hasta' . $idproduc . '" name="desde_hasta' . $idproduc . '" value="' . $fecha_hasta . '" class="form-control">
                  </td>
                  
                 
                                <td>
                                  <button type="button"  class="btn btn-success" 
                    onclick="ajax_poneroferta($(' . $comilla . 'input:checkbox[name=activo' . $idproduc . ']:checked' . $comilla . ').val(),' . $comilla . '' . $idproduc . '' . $comilla . ',$(' . $comilla . '#cantmax' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#unidad' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#descuento' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#desde_date' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#desde_hasta' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#stock' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#unidstock' . $idproduc . '' . $comilla . ').val(),' . $comilla . '' . $id_oferta . '' . $comilla . ',$(' . $comilla . '#nota' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#dosporeuno' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . 'input:checkbox[name=forzadoprecio' . $idproduc . ']:checked' . $comilla . ').val());"
                    style="width: 100%;">Guardar</button>
                                </td>
                                  <td style="width:0px;"><div class="button-list" tabindex="-1">

                                    <div class="custom-control custom-switch col-6"
                                style="text-align: center; position:relative; left:10px;">


                                <input type="checkbox"  onclick="ajax_poneroferta($(' . $comilla . 'input:checkbox[name=activo' . $idproduc . ']:checked' . $comilla . ').val(),' . $comilla . '' . $idproduc . '' . $comilla . ',$(' . $comilla . '#cantmax' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#unidad' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#descuento' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#desde_date' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#desde_hasta' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#stock' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#unidstock' . $idproduc . '' . $comilla . ').val(),' . $comilla . '' . $id_oferta . '' . $comilla . ',$(' . $comilla . '#nota' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . '#dosporeuno' . $idproduc . '' . $comilla . ').val(),$(' . $comilla . 'input:checkbox[name=forzadoprecio' . $idproduc . ']:checked' . $comilla . ').val());" class="custom-control-input" id="activo' . $idproduc . '"
                                    name="activo' . $idproduc . '" value="1" onchange="showInput()" ' . $checactiv . '>

                                    <script>
                              function calcularDescuentoPromo' . $idproduc . '() {

                                let valor = document.getElementById(' . $comilla . 'dosporeuno' . $idproduc . '' . $comilla . ').value.trim();

                                if (valor.includes(' . $comilla . 'x' . $comilla . ')) {
                                  let partes = valor.split(' . $comilla . 'x' . $comilla . ');
                                  let cantidad_total = parseInt(partes[0]);
                                  let cantidad_pagada = parseInt(partes[1]);

                                  if (!isNaN(cantidad_total) && !isNaN(cantidad_pagada) && cantidad_total > 0 && cantidad_pagada > 0) {
                                    let descuento = ((cantidad_total - cantidad_pagada) / cantidad_total) * 100;

                                    if(descuento < 0 ){descuento=0;}
                                    descuento = descuento.toFixed(5); 
                                    document.getElementById(' . $comilla . 'descuento' . $idproduc . '' . $comilla . ').value = descuento;
                                  } else {
                                    document.getElementById(' . $comilla . 'descuento' . $idproduc . '' . $comilla . ').value = ' . $comilla . '' . $comilla . ';
                                  }
                                } else {
                                  document.getElementById(' . $comilla . 'descuento' . $idproduc . '' . $comilla . ').value = ' . $comilla . '' . $comilla . ';
                                }
                                  
                              }
                            </script>

                                <label class="custom-control-label" for="activo' . $idproduc . '"></label>
                            </div>

                              
                                </td>
                                </tr> 
                ';
                }
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
<div id="muestroorden55"></div>
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

<script>
  function ajax_poneroferta(activo, id_producto, canmax, unidad, descuento, fecha_desde, fecha_hasta, stock, unidstock, id_oferta, nota, dosporeuno, forzadoprecio) {
    // Validar que las fechas no estén vacías
    if (!fecha_desde || !fecha_hasta || descuento <= 0) {
      alert("Debe completar la fecha desde y hasta y el descuento.");
      return;
    }

    // Validar que fecha_desde no sea mayor que fecha_hasta
    const desde = new Date(fecha_desde);
    const hasta = new Date(fecha_hasta);
    if (desde > hasta) {
      alert("La fecha DESDE no puede ser mayor que la fecha HASTA.");
      return;
    }

    var parametros = {
      'activo': activo,
      'id_producto': id_producto,
      'descuento': descuento,
      'canmax': canmax,
      'unidad': unidad,
      'fecha_desde': fecha_desde,
      'fecha_hasta': fecha_hasta,
      'stock': stock,
      'unidstock': unidstock,
      'id_oferta': id_oferta,
      'nota': nota,
      'dosporeuno': dosporeuno,
      'forzadoprecio': forzadoprecio,
      'id_cliente': '<?= $id_cliente ?>'

    };

    $.ajax({
      data: parametros,
      url: 'datosoferta.php',
      type: 'POST',
      beforeSend: function() {
        $('#muestroorden55').html('');
      },
      success: function(response) {
        $('#muestroorden55').html(response);
        const mensaje = document.getElementById("mensajeActualizado");
        mensaje.style.display = "block";

        // Reinicia la animación
        mensaje.style.animation = 'none';
        mensaje.offsetHeight; // fuerza el reflow
        mensaje.style.animation = 'fadeOut 2s forwards';

        console.error(response);
      },
      error: function(xhr, status, error) {
        console.error("Error en AJAX:", error);
      }
    });
  }
</script>

<?php

mysqli_close($rjdhfbpqj);


?>