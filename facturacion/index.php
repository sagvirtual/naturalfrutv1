<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');


include('../funciones/funcNombrcliente.php');

include('../nota_de_pedido/func_nombreunid.php');
$quienv = $_POST['quienv'];
function StatusOrden($rjdhfbpqj, $id_orden)
{

  $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id = '$id_orden' and col !='0' and col!='32'");
  if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
    $col = $rowusuarios["col"];
  }

  switch ($col) {

    case 0:
      $status = '<p><span class="badge bg-secondary">Ingresando</span></p>';

      break;
    case 1:
      $status = '<p><span class="badge" style="background-color: #9B290A; color:white">Sin Confirmar</span></p>';

      break;
    case 2:
      $status = '<p><span class="badge " style="background-color: #1A6B9D; color:white">Confirmado</span></p>';

      break;
    case 3:
      $status = '<p><span class="badge " style="background-color: #1C7002; color:white">Preparando</span></p>';

      break;
    case 4:
      $status = '<p><span class="badge " style="background-color: #557B29; color:white">Pidiendo</span></p>';

      break;
    case 5:
      $status = '<p><span class="badge " style="background-color: #7B00AC; color:white">Controlando</span></p>';
      break;
    case 6:
      $status = '<p><span class="badge " style="background-color: #EDFF0A; color:black">Retiro</span></p>';

      break;
    case 7:
      $status = '<p><span class="badge " style="background-color: #FBCE0B; color:black">Despacho</span></p>';

      break;
    case 8:
      $status = '<p><span class="badge bg-danger" >Concretado</span>
      <br><span class="badge bg-danger" style="background-color:black; color:white">Facturar</span></p>
      
      ';

      break;
    case 7:
      $status = '<p><span class="badge bg-secondary">Finalizado</span></p>';
      break;
    case 9:
      $status = '<p><span class="badge"style="background-color:black; color:white">En Ruta</span></p>';
      break;
    case 31:
      $status = '<p><span class="badge"  style="background-color:blue; color:white">Entregada</span></p>';
      break;
    case 32:
      $status = '<p><span class="badge"  style="background-color:red; color:black">Cancelada</span></p>';
      break;
  }
  return $status;
}
function inserfactu($rjdhfbpqj, $id_orden, $total, $monto_sin)
{

  $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden FROM facturacion Where id_orden='$id_orden'");
  $canverificafin = mysqli_num_rows($sqlordendx);
  if ($canverificafin <= 0) {
    $sqlprodu = "INSERT INTO `facturacion` (quienfac,id_orden,monto_fac,monto_sin) VALUES ('0','$id_orden','$total','$monto_sin');";
    mysqli_query($rjdhfbpqj, $sqlprodu) or die(mysqli_error($rjdhfbpqj));
  }
}

if ($tipo_usuario == "0"  || $tipo_usuario == "33" || $tipo_usuario == "1"  || $tipo_usuario == "37" || $id_usuarioclav == "83") {
} else {

  echo ("<script language='JavaScript' type='text/javascript'>");
  echo ("location.href='../'");
  echo ("</script>");
}

$orden = $_GET['orden'];
$colum = $_GET['colum'];
$todas = $_GET['todas'];

if ($_GET['orden'] == '') {
  $orden = '2';
}
if ($_SESSION['vehabi'] == '') {
  $_SESSION['vehabi'] = '1';
}
if ($_GET['colum'] == '') {
  $colum = '3';
}


$estados = $_POST['estados'];


$id_cliente = $_GET['id_cliente'];
$id_clientev = explode("@", $id_cliente);
$id_clientevers = $id_clientev[0];

$id_clientevr = explode("(", $id_clientevers);
$id_clientever = $id_clientevr[0];

$id_clienteintn = $id_clientev[1];


if ($_POST['buscar'] != '') {
  $_SESSION['buscar'] = $_POST['buscar'];
}

if (empty($orden)) {
  $orden = 2;
  $colum = '1';
} elseif ($orden == 1) {
  $orden = 2;
} elseif ($orden == 2) {
  $orden = 1;
}

if ($_GET['vehabi'] != '') {
  $_SESSION['vehabi'] = $_GET['vehabi'];
}
if ($todas == '1') {
  $_SESSION['buscar'] = "";
}

$buscar = $_SESSION['buscar'];


?>
<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
?>
<!DOCTYPE html>


<html lang="es">

<head>
  <title>Sistema seguimiento Facturacíon </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrapb.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--   <META HTTP-EQUIV="REFRESH" CONTENT="82"> -->



</head>


<body>

  <style>
    body {
      zoom: 90%;
      scroll-behavior: smooth;
      /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
    }


    .scrdesa {
      width: 100%;
      height: 100%;
      overflow-y: scroll;
      scroll-behavior: none;
    }

    .fixed-bottom-left {
      position: fixed;
      bottom: 0;
      left: 0;
      z-index: 1000;
      /* Asegúrate de que esté por encima de otros elementos */
      width: 400px;
      /* Ajusta el ancho según tus necesidades */
      max-height: 35vh;
      /* Limita la altura si es necesario */
      overflow-y: auto;
      /* Añade un scroll interno si el contenido es muy largo */
      background-color: white;
      /* Opcional: establece un fondo */
      border-top-right-radius: 10px;
      /* Opcional: esquinas redondeadas */
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
      /* Opcional: sombra */
    }




    @keyframes titilar {
      0% {
        opacity: 1;
      }

      100% {
        opacity: 0.2;
      }
    }

    .seleccionacld {
      background-color: #ccc;
    }

    .no-seleccionacld {
      background-color: #fff;
    }
  </style>





  <?php

  /* 

  function sabersifac($rjdhfbpqj, $id_producto)
  {

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id_producto,iva,modo FROM prodcom Where id_producto='$id_producto'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
      //esta el producto
      $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id_producto,iva,modo FROM prodcom Where id_producto='$id_producto' and modo='0'");
      if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
        $modod = 0;
      }




      if ($modod == '0') {
        $facturadopro = 1;
      } elseif ($modod == '1') {
        $facturadopro = 2;
      }
    } else {
      $facturadopro = 3;
    }


    return $facturadopro;
  }
 */




  function MontoTotalFac($rjdhfbpqj, $fechahoy)
  {



    /*  if ($fechaini < '2025-04-01') {
      $fechaini = '2025-04-01';
    } else {
      $fechaini = $fechaObj->format("Y-m-d");
    } */
    $fechaini = '2025-04-01';
    $totalored = 0;
    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,totalivas,fecha,ivaporsen,total FROM orden Where ivaporsen >= '4' and col!='0' and fecha>='$fechaini' ");
    while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

      $id_orden = $rowordenx['id'];

      $sqlordd = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida,enviada FROM facturacion Where id_orden='$id_orden' and emitida='1' and enviada='1'");
      if ($rowodd = mysqli_fetch_array($sqlordd)) {
        $totalfac = 0;
        $monto_sin = 0;
        $iva = 0;
      } else {


        if (!mysqli_fetch_array($sqlordd)) {
          // Solo sumamos si NO fue emitida y enviada
          $totalored += $rowordenx['total'];
        }
        // $totalored += $rowordenx['total'];

        $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida,monto_fac,monto_sin FROM facturacion Where id_orden='$id_orden'");
        if ($roworded = mysqli_fetch_array($sqlordendx)) {
          //   $emitida = $roworded['emitida'];
          $totalfac = $roworded['monto_fac'];
          $monto_sin = $roworded['monto_sin'];
        } else {
          $totalfac = $totalored;
          $monto_sin = 0;
          // $emitida = 0;
        }
        $iva = $totalfac - $monto_sin;

        if ($iva == $totalfac) {
          $iva = 0;
        }
        /* if ($emitida != 1) {
        $cantiparfac = $cantiparfac + 1;
      } */
      }
    }

    $monto_sin = $totalfac / 1.24;
    $iva =  $totalfac - $monto_sin;

    return array('totalfac' => $totalfac, 'monto_sin' => $monto_sin, 'iva' => $iva);
  }



  function vercantfactur($rjdhfbpqj, $fechahoy, $modo)
  {

    $cantiparfac = 0;
    /*  $fechaObj = new DateTime($fechahoy);
    // Restar un mes
    $fechaObj->modify('-3 month');
    // Obtener la fecha modificada
    $fechaini = $fechaObj->format("Y-m-d");

    if ($fechaini < '2025-04-01') {
    } else {
      $fechaini = $fechaObj->format("Y-m-d");
    } */
    $fechaini = '2025-04-01';

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,totalivas,fecha,ivaporsen FROM orden Where ivaporsen >= '4' and fecha>='$fechaini' and col!='0' ");
    while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

      $id_orden = $rowordenx['id'];


      $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT id_orden,emitida FROM facturacion Where id_orden='$id_orden'");
      if ($roworded = mysqli_fetch_array($sqlordendx)) {

        $emitida = $roworded['emitida'];
      } else {
        $emitida = 0;
      }

      if ($emitida != 1) {
        $cantiparfac = $cantiparfac + 1;
      }
    }

    return $cantiparfac + 0;
  }


  function vercantfacturenvi($rjdhfbpqj)
  {
    $canverificafin = 0;
    $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT enviada,emitida,id_orden FROM facturacion Where emitida='1' and enviada='0' and nfactura > 0");
    //$canverificafin = mysqli_num_rows($sqlordendx);
    while ($rowusfac = mysqli_fetch_array($sqlordendx)) {
      $idorde = $rowusfac['id_orden'];
      $sqlfadct = mysqli_query($rjdhfbpqj, "SELECT * FROM orden WHERE id = '$idorde' AND ivaporsen > 1 ");

      if ($rowusdfac = mysqli_fetch_array($sqlfadct)) {
        $canverificafin = $canverificafin + 1;
      }
    }
    $canvecdafe = $canverificafin;
    $sqlfactd = mysqli_query(
      $rjdhfbpqj,
      "SELECT *
             FROM facturacion 
             WHERE id_orden='0' AND emitida = '1' AND enviada = '0' AND nfactura > '0' AND fecha_accion >= '2025-04-01 00:00:00'"
    );
    while ($rowudsfac = mysqli_fetch_array($sqlfactd)) {
      $canvecdafe = $canvecdafe + 1; ////el problema es los del iva

    }

    return $canvecdafe;
  }


  function vercantfactRealiza($rjdhfbpqj, $quienv)
  {
    if ($_SESSION['vehabi'] == 1) {
      $emitida = '0';
      $enviada = '0';
    }
    if ($_SESSION['vehabi'] == 2) {
      $emitida = '1';
      $enviada = '0';
    }

    $sqlcamionetas = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where id = '$quienv'");
    if ($rowcamionetas = mysqli_fetch_array($sqlcamionetas)) {
      $nom_contac = $rowcamionetas["nom_contac"];
    }

    $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT enviada,emitida,quienfac FROM facturacion Where quienfac= '$quienv' and  emitida='$emitida' and enviada='$enviada'");
    $canverificafin = mysqli_num_rows($sqlordendx);

    return $nom_contac . " " . $canverificafin;
  }



  //tr para facturar xxx
  function verfactur($rjdhfbpqj, $fechahoy, $modo, $orden, $colum, $buscar, $estados, $quienv)
  {

    $comilla = "'";



    if ($buscar != '') {
      //buscador
      $busquedadsr = mysqli_real_escape_string($rjdhfbpqj, $buscar);

      // Dividir la cadena de búsqueda en palabrascl
      $palabrascl = explode(' ', $busquedadsr);

      // Crear un array para almacenar las condiciones de búsqueda para cada palabra
      $condicioncl = array();

      foreach ($palabrascl as $palabracl) {
        // Reemplazar espacios con comodines para que coincida con cualquier palabra
        $terminocl = '%' . str_replace(' ', '%', $palabracl) . '%';
        // Agregar la condición para esta palabra al array, combinando ambos campos
        $condicioncl[] = "CONCAT_WS(' ', u.nom_empr, u.nom_contac) LIKE '$terminocl'";
      }

      // Unir todas las condiciones con el operador AND para asegurarse de que todas las palabrascl estén presentes
      $condicion_fincl = implode(' AND ', $condicioncl);

      $dsand = "and";
      $dsanda = "(";
      $dsandc = ")";
    } else {
      $condicion_fincl = "";

      $dsand = "";
      $dsanda = "";
      $dsandc = "";
    }

    if ($estados > 0) {
      $estadobus = " and e.col='" . $estados . "'";
    } else {
      $estadobus = "";
    }
    //




    $fechaObj = new DateTime($fechahoy);
    // Restar un mes
    $fechaObj->modify('-3 month');
    // Obtener la fecha modificada
    $fechaini = $fechaObj->format("Y-m-d");

    if ($fechaini < '2025-04-01') {
      $fechaini = '2025-04-01';
    } else {
      $fechaini = $fechaObj->format("Y-m-d");
    }



    switch ($colum) {
      case 1:
        $ordenar = 'e.col';
        break;
      case 2:
        $ordenar = 'e.fecha';
        break;
      case 3:
        $ordenar = 'e.id';
        break;
      case 4:
        $ordenar = 'u.nom_contac';
        break;
    }

    switch ($orden) {
      case 1:
        $forma = 'ASC';
        break;
      case 2:
        $forma = 'DESC';
        break;
    }


    if (empty($orden)) {
      $ordenar = 'e.fecha';
      $forma = 'ASC';
    }

    $sinemitir = 0;




    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT e.*, u.nom_contac, u.nom_empr, u.nom_contac, u.cod_fac
    FROM orden e INNER JOIN clientes u ON e.id_cliente = u.id
    Where $condicion_fincl $dsand $dsanda e.ivaporsen >='4' and col!='0' and e.fecha>='$fechaini' $estadobus $dsandc ORDER BY $ordenar $forma");

    if ($quienv != "99") {
      $aqlquienv = "and quienfac='" . $quienv . "'";
    } else {

      $aqlquienv = "";
    }


    // $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where ivaporsen >='4' and e.fecha>='$fechaini' ORDER BY $ordenar $forma ");
    while ($rowordenx = mysqli_fetch_array($sqlordenx)) {

      $id_orden = $rowordenx['id'];
      $id_clienteint = $rowordenx['id_cliente'];
      $cod_fac = $rowordenx['cod_fac'];
      $fechaord = $rowordenx['fecha'];
      $total = $rowordenx['total'];
      $totalc = $rowordenx['total'];
      $monto_sin = $total / 1.24;
      $totalivas = $rowordenx['ivaporsen'];
      $ivaporsen = $rowordenx['perporsen'];
      $observacion = $rowordenx['observacion'];
      $col = $rowordenx['col'];

      $nombreclien = NomCliente($rjdhfbpqj, $id_clienteint);

      $estadod = StatusOrden($rjdhfbpqj, $id_orden);

      if ($modo == 1) {
        $facturar = 0;
        $enviar = 0;
        $boton = "Emitida";
        $botoncol = "dark";
        $botoaxac = "pemitida";
        $sqlenvia = "";
        $sqleblok = "";
        if ($col == 8) {
          inserfactu($rjdhfbpqj, $id_orden, $total, $monto_sin);
        }
      } elseif ($modo == 2) {
        $facturar = 1;
        $enviar = 0;
        $boton = "Enviada";
        $botoncol = "success";
        $botoaxac = "enviada";
        $sqlenvia = "and nfactura > 0";
        $sqleblok = "disabled";
      }

      $nota = ${"nota" . $id_orden};
      $notaver = ${"notaver" . $id_orden};
      $emitida = ${"emitida" . $id_orden};
      $emitida = "";



      $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM facturacion Where id_orden='$id_orden' $sqlenvia");
      if ($roworded = mysqli_fetch_array($sqlordendx)) {

        $id_factura = $roworded['id'];




        $emitida = $roworded['emitida'];
        $enviada = $roworded['enviada'];
        $nota = $roworded['nota'];
        $quien = $roworded['quienfac'];

        if (!empty($nota)) {

          $notaver = $nota;
        } else {
          $notaver = " ";
        }

        //$monto_fac = $roworded['monto_fac'];
        //$monto_sin = $roworded['monto_sin'];
        $colorsin = "Red";
        /*    $monto_sin = $roworded['monto_sin'];
        $nfactura = $roworded['nfactura']; */

        /*   if (!empty($monto_fac)) {
          $total = $monto_fac;
        } */
      } else {
        $emitida = 0;
        $enviada = 0;
        $quien = 0;

        if ($modo == 2) {
          $emitida = 3;
          $enviada = 3;
        }
        $monto_sin = $total / 1.24;
        $colorsin = "grey";
      }

      if ($emitida == $facturar && $enviada == $enviar) {

        if ($quien == $quienv || $quienv == "99" || $quienv == "") {

          echo '
  
          <tr style="font-weight: normal;">
        <td class="text-center"><p style="position:relative; top:8px;">' . $estadod . '</p></td>
        <td class="text-center">
        
        <select name="quien' . $id_orden . '" id="quien' . $id_orden . '" class="form-control text-center"  style="width:160px;"
         onchange="ajax_quien($(' . $comilla . '#quien' . $id_orden . '' . $comilla . ').val(), ' . $comilla . '' . $id_orden . '' . $comilla . ',$(' . $comilla . '#monto_fac' . $id_orden . '' . $comilla . ').val(), $(' . $comilla . '#monto_sin' . $id_orden . '' . $comilla . ').val());" tabindex="-1" ' . $sqleblok . '>
                                               <option value="0">--Sin asignar--</option>';

          $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where estado = '0' and (tipo_cliente='33' or id='83' or tipo_cliente='1') ORDER BY nom_contac ASC");
          while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

            echo ' <option value="' . $rowusuarios["id"] . '"';
            if ($quien == $rowusuarios["id"]) {
              echo 'selected';
            }
            echo '>' . $rowusuarios["nom_contac"] . '</option>';
          }





          echo '  </select>
        </td>
        <td class="text-center"><p style="position:relative; top:8px;">' . date('d/m/y', strtotime($fechaord)) . '</p></td>
        <td class="text-center"  onclick="ajax_facblanco(
          ' . $comilla . '' . $id_orden . '' . $comilla . ',
          ' . $comilla . '' . $totalivas . '' . $comilla . ',
          ' . $comilla . '' . $ivaporsen . '' . $comilla . ',
          ' . $comilla . '' . $totalc . '' . $comilla . ')"><b style="position:relative; top:8px; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#veritem' . $id_orden . '">Nº' . $id_orden . '</b></td>
        <td><p style="position:relative; top:8px;">' . $nombreclien . '<br><i style="color:grey; font-size: 10pt;">Cod. ' . $cod_fac . '</i></p>
       
        
        </td>
        <td class="text-center">
          <input type="text" id="monto_fac' . $id_orden . '"  name="monto_fac' . $id_orden . '"  class="form-control text-center" value="' . number_format($total, 2, ',', '.') . '" onclick="select()" oninput="formatoMoneda(this);
        ajax_parafacturar(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_orden . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_orden . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_orden . '' . $comilla . ').val()
          )"
          
          style="font-weight: bold;"
          disabled>
        
        
        </td>
          <td class="text-center">
          <input type="text" id="monto_sin' . $id_orden . '"  name="monto_sin' . $id_orden . '"  class="form-control text-center" value="' . number_format($monto_sin, 2, ',', '.') . '" onclick="select()" oninput="formatoMoneda(this);
          
          ajax_parafacturar(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_orden . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_orden . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_orden . '' . $comilla . ').val()
          )"

          style="color:
          ' . $colorsin . '; font-weight: bold;"
          disabled>
        
        
        </td>
        <td class="text-center;" style="width: 120px;"> 
        <input type="text" id="nfactura' . $id_orden . '"  name="nfactura' . $id_orden . '"  value="' . $roworded['nfactura'] . '" class="form-control text-center"  style="width: 120px;color:#F7870B; font-weight: bold;"
        
        
         oninput=" ajax_parafacturar(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_orden . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_orden . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_orden . '' . $comilla . ').val()
          )"
         ' . $sqleblok . '>
    </td>
        <td>
        
                <textarea id="nota' . $id_orden . '"  name="nota' . $id_orden . '"  class="form-control"
         oninput=" ajax_parafacturar(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_orden . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_orden . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_orden . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_orden . '' . $comilla . ').val()
          )"
          
          style="font-weight: bold;"
          >' . $notaver . '</textarea>
        
        </td>
        <td class="text-center"><button type="button" class="btn btn-' . $botoncol . ' btn-sm" 
        onclick="ajax_' . $botoaxac . '(' . $comilla . '' . $id_orden . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_orden . '' . $comilla . ').val())">' . $boton . '</button></td>
      </tr>

      <tr  id="veritem' . $id_orden . '" class="collapse">
      <td colspan="9">
      <div id="muestrafac' . $id_orden . '">
      </div>
      
      ';
          //itemfac($rjdhfbpqj, $id_orden, $totalivas, $ivaporsen, $totalc);

          // include('facblanco.php');
          echo '</td>
      </tr>

    
    ';
        }
      }
    }
  }


  //adicionalfaturacion
  //tr para facturar 
  function AdicionalFactur($rjdhfbpqj, $modo, $buscar, $estados)
  {
    if (empty($buscar)) {

      if ($modo == '1') {
        $imitidas = '0';
        $enviadad = '0';
        $sqleblok = "";
        $sqlenvia = "";
      } elseif ($modo == '2') {
        $imitidas = '1';
        $enviadad = '0';
        $sqleblok = "disabled";
        $sqlenvia = "and nfactura > 0";
      }

      $comilla = "'";


      $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM facturacion Where id_orden='$estados' and emitida='$imitidas' and enviada='$enviadad' $sqlenvia");
      while ($roworded = mysqli_fetch_array($sqlordendx)) {


        $id_factura = $roworded['id'];
        $id_clienteint = $roworded['id_cliente'];
        $fechaord = $roworded['fecha'];
        $quien = $roworded['quienfac'];
        /*       $emitida = $roworded['emitida'];
      $enviada = $roworded['enviada']; */
        $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
        if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

          $nombreclien = $rowusuarios["nom_contac"] . " " . $rowusuarios["nom_empr"];
          $cod_fac = $rowusuarios["cod_fac"];
        }


        if ($modo == 1) {
          $boton = "Emitida";
          $botoncol = "dark";
          $botoaxac = "emitidaAd";
        } elseif ($modo == 2) {
          $boton = "Enviada";
          $botoncol = "success";
          $botoaxac = "enviadaAd";
        }

        //$emitida = ${"emitida" . $id_factura};





        $monto_fac = $roworded['monto_fac'];
        $monto_sin = $roworded['monto_sin'];
        $nfactura = $roworded['nfactura'];
        $observacion = $roworded['nota'];

        echo '  
          <tr style="font-weight: normal;">
        <td class="text-center"><p style="position:relative; top:8px;">Agregada</p> <button type="button" class="btn btn-danger btn-sm" 
          ondblclick="ajax_agrgaquitar(' . $comilla . '' . $id_factura . '' . $comilla . ')">Eliminar</button></td>
           <td class="text-center">
        
        <select name="quien' . $id_factura . '" id="quien' . $id_factura . '" class="form-control text-center"  style="width:160px;"
         onchange="ajax_quienAg($(' . $comilla . '#quien' . $id_factura . '' . $comilla . ').val(), ' . $comilla . '' . $id_factura . '' . $comilla . ',$(' . $comilla . '#monto_fac' . $id_factura . '' . $comilla . ').val(), $(' . $comilla . '#monto_sin' . $id_factura . '' . $comilla . ').val());" tabindex="-1" ' . $sqleblok . '>
                                               <option value="0">--Sin asignar--</option>';

        $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where estado = '0' and (tipo_cliente='33' or id='83' or tipo_cliente='1') ORDER BY nom_contac ASC");
        while ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {

          echo ' <option value="' . $rowusuarios["id"] . '"';
          if ($quien == $rowusuarios["id"]) {
            echo 'selected';
          }
          echo '>' . $rowusuarios["nom_contac"] . '</option>';
        }





        echo '  </select>
        </td>
        <td class="text-center"><p style="position:relative; top:8px;">' . date('d/m/y', strtotime($fechaord)) . '</p></td>
        <td class="text-center"><b style="position:relative; top:8px;">Nº' . $nfactura . '</b></td>
        <td><p style="position:relative; top:8px;">' . $nombreclien . '<br><i style="color:grey; font-size: 10pt;">Cod. ' . $cod_fac . '</p>
       
        
        </td>
        <td class="text-center">
          <input type="text" id="monto_fac' . $id_factura . '"  name="monto_fac' . $id_factura . '"  class="form-control text-center" value="' . number_format($monto_fac, 2, ',', '.') . '" onclick="select()" oninput="formatoMoneda(this);
        ajax_parafacturarAd(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_factura . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_factura . '' . $comilla . ').val()
          )"
          
          style="font-weight: bold;"
          ' . $sqleblok . '>
        
        
        </td>
          <td class="text-center">
          <input type="text" id="monto_sin' . $id_factura . '"  name="monto_sin' . $id_factura . '"  class="form-control text-center" value="' . number_format($monto_sin, 2, ',', '.') . '" onclick="select()" oninput="formatoMoneda(this);
          
          ajax_parafacturarAd(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_factura . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_factura . '' . $comilla . ').val()
          )"

          style="color:red; font-weight: bold;"
          ' . $sqleblok . '>
        
        
        </td>
        <td class="text-center;" style="width: 120px;"> 
        <input type="text" id="nfactura' . $id_factura . '"  name="nfactura' . $id_factura . '"  value="' . $roworded['nfactura'] . '" class="form-control text-center"  style="width: 120px;color:#F7870B; font-weight: bold;"
        
        
         oninput=" ajax_parafacturarAd(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_factura . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_factura . '' . $comilla . ').val()
          )"
        ' . $sqleblok . '>
    </td>
        <td>
        
                <textarea id="nota' . $id_factura . '"  name="nota' . $id_factura . '"  class="form-control"
         oninput=" ajax_parafacturarAd(
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          ' . $comilla . '' . $id_factura . '' . $comilla . ',
          $(' . $comilla . '#monto_fac' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#monto_sin' . $id_factura . '' . $comilla . ').val(),
          ' . $comilla . '' . $id_clienteint . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_factura . '' . $comilla . ').val(),
          $(' . $comilla . '#nota' . $id_factura . '' . $comilla . ').val()
          )"
          
          style="font-weight: bold;"
          >' . $observacion . '</textarea>
        
        </td>
        <td class="text-center"><button type="button" class="btn btn-' . $botoncol . ' btn-sm" 
        onclick="ajax_' . $botoaxac . '(' . $comilla . '' . $id_factura . '' . $comilla . ',
          $(' . $comilla . '#nfactura' . $id_factura . '' . $comilla . ').val())">' . $boton . '</button> 
          
    </td>
      </tr>

     

    
    ';
      }
    }
  }
  //facturado
  function verlistasfactur($rjdhfbpqj, $fecha, $modo, $orden, $colum)
  {

    $fechaDescontada = date("Y-m-d", strtotime("-5 days", strtotime($fecha)));
    $mes = date("m", strtotime($fechaDescontada));
    $anio = date("Y", strtotime($fechaDescontada));

    /*     $mes = date("m", strtotime($fecha));  // Extrae el mes (03)
    $anio = date("Y", strtotime($fecha)); // Extrae el año (2025) */


    $comilla = "'";
    $desde_date = 1;
    $hasta_date = 31;

    switch ($colum) {
      case 1:
        $ordenar = 'o.col';
        break;
      case 2:
        $ordenar = 'o.fecha';
        break;
      case 3:
        $ordenar = 'o.id';
        break;
      case 4:
        $ordenar = 'u.nom_empr';
        break;
    }

    switch ($orden) {
      case 1:
        $forma = 'ASC';
        break;
      case 2:
        $forma = 'DESC';
        break;
    }


    if (empty($orden)) {
      $ordenar = 'o.fecha';
      $forma = 'ASC';
    }


    /* 
    $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT e.*,  o.*, u.nom_contac, u.nom_empr
    FROM facturacion e INNER JOIN clientes u ON e.id_cliente = u.id 
    INNER JOIN orden o ON e.id_orden = o.id
    Where  e.emitida='1' and e.enviada='1'  AND MONTH(e.fecha_emitida) = '$mes' 
    AND YEAR(e.fecha_emitida) = '$anio' ORDER BY $ordenar $forma"); */


    $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM facturacion Where  emitida='1' and enviada='1'  AND MONTH(fecha_emitida) = '$mes' AND YEAR(fecha_emitida) = '$anio'");
    while ($roworded = mysqli_fetch_array($sqlordendx)) {

      $id_factura = $roworded['id'];
      $id_orden = $roworded['id_orden'];




      $emitida = $roworded['emitida'];
      $enviada = $roworded['enviada'];
      $nota = $roworded['nota'];
      $id_clienteint = $roworded['id_cliente'];

      $nombreclien = NomCliente($rjdhfbpqj, $id_clienteint);

      $nfactura = $roworded['nfactura'];
      $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT id,fecha FROM orden Where id =' $id_orden'");
      if ($rowordenx = mysqli_fetch_array($sqlordenx)) {
        $fechaord = $rowordenx['fecha'];
      } else {
        $fechaord = $roworded['fecha'];
      }
      if ($id_orden == '0') {
        $estado = 'Agregada';
        $id_orden = $nfactura;
      } else {
        $estado = StatusOrden($rjdhfbpqj, $id_orden);
      }
      if (!empty($nota)) {

        $notaver = $nota;
      } else {
        $notaver = " ";
      }

      $total = $roworded['monto_fac'];
      $monto_sin = $roworded['monto_sin'];





      echo '
        
              <tr style="font-weight: normal;">
            <td class="text-center"><p style="position:relative; top:8px;">' . $estado . '</p></td>
            <td class="text-center"><p style="position:relative; top:8px;">' . date('d/m/y', strtotime($fechaord)) . '</p></td>
            <td class="text-center"><b style="position:relative; top:8px; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#veritem' . $id_orden . '">Nº' . $id_orden . '</b></td>
            <td><p style="position:relative; top:8px;">' . $nombreclien . '</p>
           
            
            </td>
            <td class="text-center">
              <input type="text" id="monto_fac' . $id_orden . '"  name="monto_fac' . $id_orden . '"  class="form-control text-center" value="' . number_format($total, 2, ',', '.') . '" ';
      /*  onclick="select()" oninput="formatoMoneda(this);  ajax_parafacturar(
              '.$comilla.''.$id_factura.''.$comilla.',
              '.$comilla.''.$id_orden.''.$comilla.',
              $('.$comilla.'#monto_fac'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#monto_sin'.$id_orden.''.$comilla.').val(),
              '.$comilla.''.$id_clienteint.''.$comilla.',
              $('.$comilla.'#nfactura'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#nota'.$id_orden.''.$comilla.').val()
              )" */
      echo '
              style="font-weight: bold;" disabled
              >
            
            
            </td>
              <td class="text-center">
              <input type="text" id="monto_sin' . $id_orden . '"  name="monto_sin' . $id_orden . '"  class="form-control text-center" value="' . number_format($roworded['monto_sin'], 2, ',', '.') . '"';

      /*  onclick="select()" oninput="formatoMoneda(this); ajax_parafacturar(
              '.$comilla.''.$id_factura.''.$comilla.',
              '.$comilla.''.$id_orden.''.$comilla.',
              $('.$comilla.'#monto_fac'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#monto_sin'.$id_orden.''.$comilla.').val(),
              '.$comilla.''.$id_clienteint.''.$comilla.',
              $('.$comilla.'#nfactura'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#nota'.$id_orden.''.$comilla.').val()
              )" */

      echo 'style="color:red; font-weight: bold;" disabled>
            
            
            </td>
            <td class="text-center;" style="width: 120px;"> 
            <input type="text" id="nfactura' . $id_orden . '"  name="nfactura' . $id_orden . '"  value="' . $roworded['nfactura'] . '" class="form-control text-center"  style="width: 120px;color:#F7870B; font-weight: bold;"';

      /*    
             oninput=" ajax_parafacturar(
              '.$comilla.''.$id_factura.''.$comilla.',
              '.$comilla.''.$id_orden.''.$comilla.',
              $('.$comilla.'#monto_fac'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#monto_sin'.$id_orden.''.$comilla.').val(),
              '.$comilla.''.$id_clienteint.''.$comilla.',
              $('.$comilla.'#nfactura'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#nota'.$id_orden.''.$comilla.').val()
              )" */
      echo ' disabled>
        </td>
            <td>
            
                 ';
      /*       oninput=" ajax_parafacturar(
              '.$comilla.''.$id_factura.''.$comilla.',
              '.$comilla.''.$id_orden.''.$comilla.',
              $('.$comilla.'#monto_fac'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#monto_sin'.$id_orden.''.$comilla.').val(),
              '.$comilla.''.$id_clienteint.''.$comilla.',
              $('.$comilla.'#nfactura'.$id_orden.''.$comilla.').val(),
              $('.$comilla.'#nota'.$id_orden.''.$comilla.').val()
              )" */

      $fecha_modmo = $roworded['fecha_emitida'];
      $fecha_enviada = $roworded['fecha_enviada'];


      echo '' . $notaver . '
            
            </td>
            <td class="text-center">
            ' . date('d/m/Y', strtotime($fecha_modmo)) . '<br>
            
              
              </td>
                  <td class="text-center">
            ' . date('d/m/Y', strtotime($fecha_enviada)) . '<br>
            
              
              </td>
          </tr>';

      /* <tr  id="veritem'.$id_orden.'" class="collapse">
          <td colspan="9">';
          itemfac($rjdhfbpqj,$id_orden,$totalivas,$ivaporsen,$totalc);
          echo'</td>
          </tr>
     */
    }
  }





  ?></a>


  <div class="bg-dark text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
    <p style=" font-size: 10pt; color: white;">Sistema de seguimiento Facturacíon&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
  </div>


  <div class="container">

    <div class="row">

      <div class="col-lg-2 col-6">

        <a href="../">
          <img src="/assets/images/logopc.png" style="width:38mm;">
        </a>

      </div>
      <div class="col-lg-2 col-6" style="padding-top: 10px; float:right;">
        <a href="index.php?todas=1">
          <button class="btn btn-primary">Actualizar</button></a>

      </div>


      <div class="col-lg-8 col-12" style="padding-top: 10px;">




        <form action="index.php" method="post">


          <div class="input-group">
            <select class="btn btn-primary" name="estados" id="estados" style="width: 130px;">
              <option value="0" <? if ($estados == 0) {
                                  echo 'selected';
                                } ?>>Todas</option>
              <option value="8" <? if ($estados == 8) {
                                  echo 'selected';
                                } ?>>Concretadas</option>
              <option value="31" <? if ($estados == 31) {
                                    echo 'selected';
                                  } ?>>Entregada</option>
              <option value="9" <? if ($estados == 9) {
                                  echo 'selected';
                                } ?>>En Ruta de Entrega</option>
              <option value="7" <? if ($estados == 7) {
                                  echo 'selected';
                                } ?>>Listo para Despacho</option>
              <option value="6" <? if ($estados == 6) {
                                  echo 'selected';
                                } ?>>Listo para Retiro</option>
              <option value="1" <? if ($estados == 1) {
                                  echo 'selected';
                                } ?>>Eperando Confirmación</option>
              <option value="2" <? if ($estados == 2) {
                                  echo 'selected';
                                } ?>>Confirmado</option>
              <option value="3" <? if ($estados == 3) {
                                  echo 'selected';
                                } ?>>Preparando</option>
              <option value="4" <? if ($estados == 4) {
                                  echo 'selected';
                                } ?>>Pidiendo Producto</option>
              <option value="5" <? if ($estados == 5) {
                                  echo 'selected';
                                } ?>>Controlando</option>
            </select>


            <select name="quienv" id="quienv" class="form-control text-center" style="width:20px;">
              <option value="99" <? if ($quienv == 99) {
                                    echo 'selected';
                                  } ?>></option>
              <option value="0" <? if ($quienv == 0) {
                                  echo 'selected';
                                } ?>>Sin asignar</option>
              <?

              $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT * FROM usuarios Where estado = '0' and (tipo_cliente='33' or id='83' or tipo_cliente='1') ORDER BY nom_contac ASC");
              while ($rowusuardios = mysqli_fetch_array($sqlusuarios)) {

                echo ' <option value="' . $rowusuardios["id"] . '"';
                if ($quienv == $rowusuardios["id"]) {
                  echo 'selected';
                }
                echo '>' . $rowusuardios["nom_contac"] . '</option>';
              }





              echo '  </select>'; ?>





              <input type="text" class="form-control" placeholder="Buscar" name="buscar" id="buscar"><button type="submit" class="btn btn-primary">Buscar</button>
          </div>


        </form>





      </div>



    </div>
    <hr>

    <div class="row">

      <div class="container mt-3 col-lg-12 col-12">


        <!-- factura agregada -->

        <div class="col-12">





          <table class="table table-bordered" style="position:relative; top:-18px;" id="enviar">
            <thead>
              <tr>
                <th class="text-center" style="width: 120px;cursor:pointer">Agregar otras para facturar</th>
                <th class="text-center" style="width: 120px;cursor:pointer">Fecha</th>
                <th class="text-center" style="width: 120px;">Nº&nbsp;Factura</th>
                <th class="text-center" style="cursor:pointer;display:none;">NúmeroRef</th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;Factura</th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;S/IVA</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <tr style="font-weight: normal;">
                <td>

                  <form id="formBusqucl">
                    <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente" value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;" <? //= $notab 
                                                                                                                                                                                                                                  ?> <? //= $blockclien 
                                                                                                                                                                                                                                      ?>>

                  </form>

                  <div id="resultadocl"></div>

                </td>
                <td class="text-center">
                  <input type="date" id="nfechan" name="nfechan" class="form-control text-center" value="<?= $fechahoy ?>" style="width: 140px;">
                </td>
                <td class="text-center;" style="width: 120px;">
                  <input type="text" id="nfacturan" name="nfacturan" class="form-control text-center" style="width: 120px;color:#F7870B; font-weight: bold;">

                </td>
                <td class="text-center" style="display:none;">
                  <input type="text" id="numeroorn" name="numeroorn" class="form-control text-center" style="font-weight: bold;">
                </td>

                <td class="text-center">
                  <input type="text" id="monto_facn" name="monto_facn" class="form-control text-center" style="font-weight: bold;" oninput="formatoMoneda(this);">


                </td>
                <td class="text-center">
                  <input type="text" id="monto_sinn" name="monto_sinn" class="form-control text-center" style="color:red; font-weight: bold;" oninput="formatoMoneda(this);">


                </td>

                <td>
                  <textarea id="notan" name="notan" class="form-control" style="font-weight: bold;"></textarea>

                </td>

                <td>
                  <button type="button" class="btn btn-primary btn-sm"
                    onclick="ajax_agrgarnew($('#nfechan').val(),$('#numeroorn').val(),$('#monto_facn').val(),$('#monto_sinn').val(),$('#nfacturan').val(),$('#notan').val())">Agregar</button>

                </td>

              </tr>
            </tbody>
          </table>

          <? if ($tipo_usuario == "0") {

            $MontoTotalFac = MontoTotalFac($rjdhfbpqj, $fechahoy);
            $totalfa = $MontoTotalFac['totalfac'];
            $monto_sin = $MontoTotalFac['monto_sin'];
            $iva = $MontoTotalFac['iva'];


          ?><div class="container text-center"><span class="badge bg-dark">
                Monto para Factura: $<?= number_format($totalfa, 0, '.', ',') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto S/IVA:<?= number_format($monto_sin, 0, '.', ',') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total IVA:<?= number_format($iva, 0, '.', ',') ?></span> </div>
          <? } ?>

        </div><br>


        <!-- fin -->







        <a href="?vehabi=1" style="text-decoration: none; color: inherit;">
          <div data-bs-toggle="collapse" data-bs-target="#facturar" class="alert alert-dark text-center" style="cursor: pointer;">
            <strong>PARA FACTURAR <?php

                                  $modo = 1;
                                  if ($quienv == "99" || $quienv == "") {
                                    echo '(' . vercantfactur($rjdhfbpqj, $fechahoy, $modo) . ')';
                                  } else {

                                    if ($_SESSION['vehabi'] == 1) {

                                      echo '(' . vercantfactRealiza($rjdhfbpqj, $quienv) . ')';
                                    } else {

                                      echo '(' . vercantfactur($rjdhfbpqj, $fechahoy, $modo) . ')';
                                    }
                                  }
                                  ?></strong>




          </div>
        </a> <br>


        <? if ($_SESSION['vehabi'] == '1') {  ?>
          <table class="table table-bordered" style="position:relative; top:-45px;" id="facturar" class="collapse" data-sort="asc">
            <thead>
              <tr>
                <th class="text-center" style="width: 120px;cursor:pointer">Estado&nbsp;<a href="../facturacion/?colum=1&orden=<?= $orden ?>"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="width: 120px;cursor:pointer">Realiza</th>
                <th class="text-center" style="width: 120px;cursor:pointer">Fecha&nbsp;<a href="../facturacion/?colum=2&orden=<?= $orden ?>"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="cursor:pointer">Pedido&nbsp;<a href="../facturacion/?colum=3&orden=<?= $orden ?>"><i class="fas fa-sort"></i></a></th>
                <th class="text-center">Cliente <a href="../facturacion/?colum=2&orden=<?= $orden ?>#facturar"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;Factura</th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;S/IVA</th>
                <th class="text-center" style="width: 120px;">Nº&nbsp;Factura</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center">Acción</th>
              </tr>
            </thead>
            <tbody>


              <?php

              AdicionalFactur($rjdhfbpqj, 1, $buscar, $estados);
              verfactur($rjdhfbpqj, $fechahoy, 1, $orden, $colum, $buscar, $estados, $quienv);

              ?>

            </tbody>
          </table>

        <? }  ?>
      </div>
      <!-- enviar -->
      <a href="?vehabi=2" style="text-decoration: none; color: inherit;">
        <div class="container mt-3 col-lg-12 col-12">
          <div class="alert alert-success text-center" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#enviar">
            <strong>PARA ENVIAR <?php
                                $modo = 2;
                                if ($quienv == "99" || $quienv == "") {
                                  echo '(' . vercantfacturenvi($rjdhfbpqj) . ')';
                                } else {

                                  if ($_SESSION['vehabi'] == 2) {

                                    echo '(' . vercantfactRealiza($rjdhfbpqj, $quienv) . ')';
                                  } else {
                                    echo '(' . vercantfacturenvi($rjdhfbpqj) . ')';
                                  }
                                }
                                ?></strong>



          </div>
      </a>

      <div>

        <? if ($_SESSION['vehabi'] == '2') {  ?>


          <table class="table table-bordered" style="position:relative; top:-18px;" id="enviar">
            <thead>
              <thead>
                <tr>
                  <th class="text-center" style="width: 120px;cursor:pointer">Estado&nbsp;<a href="../facturacion/?colum=1&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                  <th class="text-center" style="width: 120px;cursor:pointer">Realiza</th>
                  <th class="text-center" style="width: 120px;cursor:pointer">Fecha&nbsp;<a href="../facturacion/?colum=2&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                  <th class="text-center" style="cursor:pointer">Pedido&nbsp;<a href="../facturacion/?colum=3&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                  <th class="text-center">Cliente <a href="../facturacion/?colum=2&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                  <th class="text-center" style="width: 160px;">Monto&nbsp;Factura</th>
                  <th class="text-center" style="width: 160px;">Monto&nbsp;S/IVA</th>
                  <th class="text-center" style="width: 120px;">Nº&nbsp;Factura</th>
                  <th class="text-center">Observaciones</th>
                  <th class="text-center">Acción</th>
                </tr>
              </thead>
            </thead>
            <tbody>
              <?php
              AdicionalFactur($rjdhfbpqj, 2, $buscar, $estados);
              verfactur($rjdhfbpqj, $fechahoy, $modo, $orden, $colum, $buscar, $estados, $quienv);

              ?>
            </tbody>
          </table>


        <? }


        ?>
      </div>
      <?php
      $motobruto = 0;
      $monto_sin = 0;
      $fecha = $fechahoy;


      $fechaDescontada = date("Y-m-d", strtotime("-5 days", strtotime($fecha)));
      $mes = date("m", strtotime($fechaDescontada));
      $anio = date("Y", strtotime($fechaDescontada));
      /*     $mes = date("m", strtotime($fecha));  // Extrae el mes (03)
      $anio = date("Y", strtotime($fecha)); // Extrae el año (2025) */


      $sqlordendx = mysqli_query($rjdhfbpqj, "SELECT * FROM facturacion Where  emitida='1' and enviada='1'  AND MONTH(fecha_emitida) = '$mes' 
 AND YEAR(fecha_emitida) = '$anio'");
      $canverificafin = mysqli_num_rows($sqlordendx);
      while ($roworded = mysqli_fetch_array($sqlordendx)) {
        $motobruto += $roworded['monto_fac'];
        $monto_sin += $roworded['monto_sin'];
      }

      $motobrutov = number_format($motobruto, 2, ',', '.');
      $monto_sinv = number_format($monto_sin, 2, ',', '.');
      $toiva = $motobruto - $monto_sin;
      $toivav = number_format($toiva, 2, ',', '.');
      ?>
      <!-- mes -->
      <a href="?vehabi=3" style="text-decoration: none; color: inherit;">
        <div class="container mt-3 col-lg-12 col-12">
          <div class="alert alert-dark text-center" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#enviar">
            <strong>Periodo <?= $mes ?>/<?= $anio ?> (<?= $canverificafin ?>)<?php
                                                                              $modo = 2;


                                                                              ?>
              <? if ($tipo_usuario == "0") { ?><br><span class="badge bg-dark">
                  Monto Facturado: $<?= $motobrutov ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto S/IVA:<?= $monto_sinv ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total IVA:<?= $toivav ?></span>
              <? } ?>

            </strong>
          </div>
      </a>

      <div>
        <? if ($_SESSION['vehabi'] == '3') {  ?>


          <table class="table table-bordered" style="position:relative; top:-18px;" id="enviar">
            <thead>
              <tr>
                <th class="text-center" style="width: 120px;cursor:pointer">Estado&nbsp;<a href="../facturacion/?colum=1&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="width: 120px;cursor:pointer">Fecha&nbsp;<a href="../facturacion/?colum=2&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="cursor:pointer">Pedido&nbsp;<a href="../facturacion/?colum=3&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                <th class="text-center">Cliente <a href="../facturacion/?colum=4&orden=<?= $orden ?>#enviarb"><i class="fas fa-sort"></i></a></th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;Factura</th>
                <th class="text-center" style="width: 160px;">Monto&nbsp;S/IVA</th>
                <th class="text-center" style="width: 120px;">Nº&nbsp;Factura</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center">Emitida</th>
                <th class="text-center">Enviada</th>
              </tr>
            </thead>
            <tbody>
              <?php

              verlistasfactur($rjdhfbpqj, $fecha, $modo, $orden, $colum);

              ?>


              ?>
            </tbody>
          </table>
      </div>

    <? }  ?>
    </div>







    <!-- finalizadas -->


    <div class="container mt-3 col-lg-12 col-12" id="enviarb">

      <div class="alert alert-light">
        <strong>Buscar Notas de Pedidos Facturadas o para Facturar</strong>



        <div class="input-group mb-3">
          <label for="staticEmail2" style="padding-right: 20;" class="input-group-text">Desde: </label>
          <input type="date" id="desde_date" name="desde_date" value="<?= $fechahoy ?>" class="form-control"
            onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" min="2025-04-01">&nbsp;&nbsp;&nbsp;

          <label for="staticEmail2" style="padding-left: 30; padding-right: 20;" class="input-group-text">Hasta: </label>
          <input type="date" id="hasta_date" name="hasta_date" value="<?= $fechahoy ?>" class="form-control"
            onchange="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" min="2025-04-01">


          <input id="modobus" name="modobus" type="hidden">
          &nbsp;&nbsp;&nbsp;


          <input type="search" id="buscar" name="buscar" style="width: 500px;" class="form-control"
            placeholder="Buscar por: Nº Orden / Cliente" aria-label="Search" aria-describedby="button-addon2"
            onkeyup="ajax_buscar($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');" autocomplete="off">




          <button type="buttom" class="btn btn-secondary" onclick="ajax_buscartodo($('#buscar').val(),$('#desde_date').val(),$('#hasta_date').val(),'');">Buscar</button>





        </div>




        <div id="muestroorden55"></div>



      </div>

    </div>










    <br>





    <div class="container mt-3 text-center">

      <a href="../"><button type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



    </div>



    <script>
      function ajax_parafacturar(id_factura, id_orden, monto_fac, monto_sin, id_cliente, nfactura, nota) {
        var parametros = {
          "id_factura": id_factura,
          "id_orden": id_orden,
          "monto_fac": monto_fac,
          "monto_sin": monto_sin,
          "id_cliente": id_cliente,
          "nfactura": nfactura,
          "nota": nota
        };
        $.ajax({
          data: parametros,
          url: '../facturacion/parafacturar.php',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden55").html('');
          },
          success: function(response) {
            $("#muestroorden55").html(response);
          }
        });
      }
    </script>

    <script>
      function ajax_parafacturarAd(id_factura, id_orden, monto_fac, monto_sin, id_cliente, nfactura, nota) {
        var parametros = {
          "id_factura": id_factura,
          "id_orden": id_orden,
          "monto_fac": monto_fac,
          "monto_sin": monto_sin,
          "id_cliente": id_cliente,
          "nfactura": nfactura,
          "nota": nota
        };
        $.ajax({
          data: parametros,
          url: '../facturacion/parafacturarad.php',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden55").html('');
          },
          success: function(response) {
            $("#muestroorden55").html(response);
          }
        });
      }
    </script>


    <script>
      $(document).ready(function() {
        var indiceseleccionacld = -1;


        // Manejar el evento keyup para buscar mientras se escribe
        $('#id_cliente').on('keyup', function(e) {
          if (event.key === 'Escape') { // Escape
            $('#resultadocl').empty(); // Vaciar el listado de resultadcl

          }
        });


        $(document).on('click', function(e) {
          if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
            $('#resultadocl').empty();
          }
        });



        // Manejar el evento keydown para buscar mientras se escribe
        $('#id_cliente').on('keyup', function(e) {
          var $resultadcl = $('#resultadocl p');


          if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            if (indiceseleccionacld > 0) {
              indiceseleccionacld--;
              actualizarSeleccion($resultadcl);
            }
          } else if (e.keyCode === 40) { // Flecha abajo
            e.preventDefault();
            if (indiceseleccionacld < $resultadcl.length - 1) {
              indiceseleccionacld++;
              actualizarSeleccion($resultadcl);
            }
          } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter


            e.preventDefault();
            if (indiceseleccionacld !== -1) {
              // Aquí puedes hacer lo que necesites con el resultado seleccionacld, por ejemplo:



              // Construir la URL con el parámetro seleccionacld
              var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
              var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
              // Redireccionar a la URL
              window.location.href = url;


            }





          } else {
            // Si se presiona otra tecla, realizar la búsqueda
            realizarBusqucl();
          }
        });

        // Manejar el evento click en los resultadcl de la búsqueda
        $(document).on('click', '#resultadocl p', function() {
          indiceseleccionacld = $(this).index();
          actualizarSeleccion($('#resultadocl p'));
          $('#id_cliente').focus(); // Mantener el foco en el campo de búsqueda


          var seleccionacld = $(this).text();
          var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld);
          window.location.href = url;

        });



        function realizarBusqucl() {
          // Obtener los datos del formulario
          var formData = $('#formBusqucl').serialize();

          /*         var inputordenin = document.getElementById('ordenin');
                  var inputNumero = document.getElementById('cantidad');
                  var botonSuminstr = document.getElementById('suminstr');
                  var botonUnidad = document.getElementById('unidad');
                  var botonproductod = document.getElementById('producto');
                  inputNumero.style.display = 'none';
                  botonUnidad.style.display = 'none';
                  botonSuminstr.style.display = 'none';
                  botonproductod.style.display = 'none';
                  inputordenin.style.display = 'none';

                  var descuenuna = document.getElementById('descuenun');
                  var improteuna = document.getElementById('improteun');
                  var importtota = document.getElementById('importtot');
                  descuenuna.style.display = 'none';
                  improteuna.style.display = 'none';
                  importtota.style.display = 'none'; */


          // Realizar la solicitud AJAX       
          $.ajax({
            type: "POST",
            url: "../facturacion/buscarcli.php",
            data: formData,
            success: function(response) {
              $('#resultadocl').html(response); // Actualizar los resultadcl en la página
              indiceseleccionacld = -1; // Reiniciar el índice seleccionacld
            }
          });
        }

        function actualizarSeleccion($resultadcl) {
          $resultadcl.removeClass('seleccionacld');
          $($resultadcl[indiceseleccionacld]).addClass('seleccionacld');
        }


      });
    </script>






    <script>
      function ajax_agrgarnew(nfechan, numeroorn, monto_facn, monto_sinn, nfacturan, notan) {
        var parametros = {
          "nfechan": nfechan,
          "id_ordenn": numeroorn,
          "monto_facn": monto_facn,
          "monto_sinn": monto_sinn,
          "id_clienten": '<?= $id_clienteintn ?>',
          "nfacturan": nfacturan,
          "notan": notan
        };
        $.ajax({
          data: parametros,
          url: '../facturacion/painsernewfac.php',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden55").html('');
          },
          success: function(response) {
            $("#muestroorden55").html(response);
            location.reload();
          }
        });
      }
    </script>





    <script>
      function ajax_agrgaquitar(id_fac) {
        if (confirm("¿Estás seguro de que quieres eliminar este elemento?")) {
          var parametros = {
            "id_fac": id_fac
          };
          $.ajax({
            data: parametros,
            url: '../facturacion/painsernewelimi.php',
            type: 'POST',
            beforeSend: function() {
              $("#muestroorden55").html('');
            },
            success: function(response) {
              $("#muestroorden55").html(response);
              location.reload();
            }
          });
        }
      }
    </script>



    <script>
      function ajax_pemitida(id_factura, nfactura) {

        if (nfactura.trim() !== '') {
          if (confirm('¿Confirma que Emitio la Factura Nº' + nfactura + '?')) {
            var parametros = {
              "id_factura": id_factura
            };
            $.ajax({
              data: parametros,
              url: '../facturacion/emitida.php',
              type: 'POST',
              beforeSend: function() {
                $("#muestroorden55").html('');
              },
              success: function(response) {
                $("#muestroorden55").html(response);
                location.reload();
              }
            });
          }
        } else {
          var nombrenfac = 'nfactura' + id_factura;
          alert('Obligatorio el Numero de factura');
          document.getElementById(nombrenfac).select().focus();

        }
      }

      /*   location.reload(); */
    </script>


    <script>
      function ajax_emitidaAd(id_factura, nfactura) {

        if (nfactura.trim() !== '') {
          if (confirm('¿Confirma que Emitio la Factura Nº' + nfactura + '?')) {
            var parametros = {
              "id_factura": id_factura
            };
            $.ajax({
              data: parametros,
              url: '../facturacion/emitidaad.php',
              type: 'POST',
              beforeSend: function() {
                $("#muestroorden55").html('');
              },
              success: function(response) {
                $("#muestroorden55").html(response);
                location.reload();
              }
            });
          }
        } else {
          var nombrenfac = 'nfactura' + id_factura;
          alert('Obligatorio el Numero de factura');
          document.getElementById(nombrenfac).select().focus();

        }
      }

      /*   location.reload(); */
    </script>
    <script>
      function ajax_enviada(id_factura, nfactura) {

        if (nfactura.trim() !== '') {
          if (confirm('¿Confirma que envio al cliente la Factura Nº' + nfactura + '?')) {
            var parametros = {
              "id_factura": id_factura
            };
            $.ajax({
              data: parametros,
              url: '../facturacion/enviada.php',
              type: 'POST',
              beforeSend: function() {
                $("#muestroorden55").html('');
              },
              success: function(response) {
                $("#muestroorden55").html(response);
                location.reload();
              }
            });
          }
        } else {

          var nombrenfac = 'nfactura' + id_factura;
          alert('Obligatorio el Numero de factura');
          document.getElementById(nombrenfac).select().focus();

        }
      }

      /*   location.reload(); */
    </script>
    <script>
      function ajax_enviadaAd(id_factura, nfactura) {

        if (nfactura.trim() !== '') {
          if (confirm('¿Confirma que envio al cliente la Factura Nº' + nfactura + '?')) {
            var parametros = {
              "id_factura": id_factura
            };
            $.ajax({
              data: parametros,
              url: '../facturacion/enviadaad.php',
              type: 'POST',
              beforeSend: function() {
                $("#muestroorden55").html('');
              },
              success: function(response) {
                $("#muestroorden55").html(response);
                location.reload();
              }
            });
          }
        } else {

          var nombrenfac = 'nfactura' + id_factura;
          alert('Obligatorio el Numero de factura');
          document.getElementById(nombrenfac).select().focus();

        }
      }

      /*   location.reload(); */
    </script>

    <script>
      function formatoMoneda(input) {
        var num = input.value.replace(/\./g, '');
        if (!isNaN(num)) {
          num = num.split('').reverse().join('').replace(/(\d{3}(?!$))/g, '$1.');
          num = num.split('').reverse().join('');
          input.value = num;
        } else {
          input.value = input.value.replace(/[^\d,.]/g, '');
        }
      }
    </script>
    <div id="muestroorden4"></div>
    <script>
      function ajax_quien(quien, id_orden, monto_fac, monto_sin) {


        var parametros = {
          "quien": quien,
          "idorden": id_orden,
          "monto_fac": monto_fac,
          "monto_sin": monto_sin
        };
        $.ajax({
          data: parametros,
          url: 'seenvioquin.php',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden4").html('');
          },
          success: function(response) {
            $("#muestroorden4").html(response);
          }
        });
      }
    </script>
    <script>
      function ajax_quienAg(quien, id_orden, monto_fac, monto_sin) {


        var parametros = {
          "quien": quien,
          "idorden": id_orden,
          "monto_fac": monto_fac,
          "monto_sin": monto_sin
        };
        $.ajax({
          data: parametros,
          url: 'seenvioquinAg.php',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden4").html('');
          },
          success: function(response) {
            $("#muestroorden4").html(response);
          }
        });
      }
    </script>


    <script>
      function ajax_buscartodo(buscar, desde_date, hasta_date, col) {

        // Tomar la subcadena a partir del tercer carácter
        //var buscar_recortado = buscar.substring(2);

        var parametros = {
          "buscar": buscar,
          "desde_date": desde_date,
          "hasta_date": hasta_date,
          "col": col
        };

        $.ajax({
          data: parametros,
          url: '../facturacion/buscarfinali',
          type: 'POST',
          beforeSend: function() {
            $("#muestroorden55").html('');
          },
          success: function(response) {
            $("#muestroorden55").html(response);
          }
        });

      }
    </script>

    <script>
      function ajax_buscar(buscar, desde_date, hasta_date, col) {
        if (buscar.length > 2) {
          // Tomar la subcadena a partir del tercer carácter
          //var buscar_recortado = buscar.substring(2);

          var parametros = {
            "buscar": buscar,
            "desde_date": desde_date,
            "hasta_date": hasta_date,
            "col": col
          };

          $.ajax({
            data: parametros,
            url: '../facturacion/buscarfinali.php',
            type: 'POST',
            beforeSend: function() {
              $("#muestroorden55").html('');
            },
            success: function(response) {
              $("#muestroorden55").html(response);
            }
          });
        }
      }
    </script>
    <script>
      function ajax_facblanco(id_orden, totalivas, ivaporsen, totalc) {
        var id_orden = id_orden;

        var parametros = {
          "id_orden": id_orden,
          "totalivas": totalivas,
          "ivaporsen": ivaporsen,
          "totalc": totalc
        };

        $.ajax({
          data: parametros,
          url: 'facblanco.php',
          type: 'POST',
          beforeSend: function() {
            // Mostrar un mensaje de carga
            $("#muestrafac" + id_orden).html('<span class="text-muted">Cargando...</span>');
            console.log("Enviando datos al servidor...");
          },
          success: function(response) {
            // Cuando llega la respuesta, se muestra
            $("#muestrafac" + id_orden).html(response);
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
            $("#muestrafac" + id_orden).html('<span class="text-danger">Error al cargar.</span>');
          }
        });
      }
    </script>
    <script>

    </script>
</body>

</html>

<?php

mysqli_close($rjdhfbpqj);

?>