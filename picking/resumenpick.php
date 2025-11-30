


<div id="ver" class="collapse">
  <?php
   if($_SESSION['anterior'] !=""){
  echo'<div class="alert alert-success text-center">
  Antes, termine la orden <strong>Nº'.$_SESSION['anterior'].'</strong>
</div>';

   }

   $nombrecli=NomCliente($rjdhfbpqj,$id_cliente);
  ?>

<div class="container mt-3">  

<div class="alert alert-secondary text-center">
Cliente:<b><?=$nombrecli?><b>
</div>


  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center">Productos</th>
        <th class="text-center">Cantidad</th>
        <th class="text-center">Estado</th>
      </tr>
    </thead>
    <tbody>
   
 <?php
  


  function destallpick($rjdhfbpqj, $idpedido){


  $sqenordi = mysqli_query($rjdhfbpqj, "SELECT 
  productos.id, productos.pascol, productos.ubicacion, productos.codigo, productos.kilo, productos.kgaprox, productos.modo_producto, productos.unidadnom, 
  picking.nombre, picking.position, 
  item_orden.id_orden, item_orden.id_producto, item_orden.picking, item_orden.tipounidad, item_orden.piccant, item_orden.kilos, item_orden.nombre as nombpro, item_orden.modo, item_orden.id as iditem
 
  FROM 
  productos 
  INNER JOIN picking ON productos.pascol = picking.nombre 
 INNER JOIN item_orden ON productos.id = item_orden.id_producto
  
  
      Where id_orden='$idpedido'  and modo='0' and kgaprox='0' ORDER BY `picking`.`position` ASC limit 536");
   while ($rowodedi = mysqli_fetch_array($sqenordi)) {
      $iditem=$rowodedi["iditem"];
      $idproedit=$rowodedi["id_producto"];
      $tipounidad=$rowodedi["tipounidad"];            
      $piccant=$rowodedi["picking"];            
      $nodrevpro=$rowodedi["nombpro"];    
      $ubicacion=$rowodedi["ubicacion"]; 
      $codigover=$rowodedi["codigo"];  
      $comoviene=$rowodedi["kilos"];
      $modo_producto=$rowodedi["modo_producto"];
      $unidadnom=$rowodedi["unidadnom"];


      if($tipounidad=="1"){

        $cantidadvulto=$rowodedi["modo_producto"];
    }else{ $cantidadvulto=$rowodedi["unidadnom"]; }



    switch ($piccant) {
        case "0":
            $tiposecto = '<span class="badge bg-primary">Sin Pick</span>';
            break;
        case "1":
            $tiposecto = '<span class="badge bg-success">Pick OK</span>';
            break;
        case "2":
            $tiposecto = '<span class="badge bg-warning">Despues</span>';
            break;
        case "3":
            $tiposecto = '<span class="badge bg-danger">NO HAY</span>';
            break;}



echo ' <tr>

<td >'.$nodrevpro.' </td>

<td class="text-center">'.$comoviene.' '.$cantidadvulto.'</td>

<td class="text-center">'.$tiposecto.' </td>




</tr>';

  
   }
  }
  echo ''.destallpick($rjdhfbpqj,  $idpedido).'';
?>
 <script>

document.getElementById('toggle').addEventListener('click', function () {
    const input = document.getElementById('codigo');
    const collapseDiv = document.getElementById('ver');

    // Alternar la clase "show" para simular expandir/contraer
    collapseDiv.classList.toggle('show');

    // Mantener el foco en el input
    input.focus();
});

 </script>
 
      
    </tbody>
  </table>
</div>

</div>





