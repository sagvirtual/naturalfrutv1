<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');

if($tipo_usuario=="0" || $tipo_usuario=="1" || $tipo_usuario=="30"  || $tipo_usuario=="3"){
include('funcion_saldoanterior.php');

$id_clientecod = $_GET['jhduskdsa'];

$errcan=$_GET['error'];
$modif=$_GET['modif'];
$ref=$_GET['ref'];

/* idorden pasada */
if(!empty($_GET['orjndty'])){
$id_ordencod=$_GET['orjndty'];
$id_orden=base64_decode($id_ordencod);
}

/* idorden pasada */
if(!empty($_GET['jufqwes'])){
    $idordenseg = $_GET['jufqwes'];
    $id_orden=base64_decode($idordenseg);
}

if(!empty($id_clientecod)){$id_clienteint = base64_decode($id_clientecod);

}else{
$id_cliente = $_GET['id_cliente'];
$id_clientev=explode("@",$id_cliente);
$id_clientevers = $id_clientev[0];

$id_clientevr=explode("(",$id_clientevers);
$id_clientever=$id_clientevr[0];

$id_clienteint = $id_clientev[1];
$id_orden = '';//$id_clientev[2];

}

/* agregar && $rubro=='0' */
if(!empty($_GET['producto']) ){
$productods=$_GET['producto'];
 $productod=explode("@",$productods);
 $productor = preg_replace('/\s+/', ' ', $productod[0]);
 $productore = explode("[",$productor);
 $producto = $productore[0];
 $idproduc = $productore[2];
 $id_orden = $productod[2];
 $unidsx = $productod[1];
} 


 $activainp=$_GET['focf'];
 if($activainp!='1'){$verinpur="display:none;";}


/*  $sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $id_clienteve=$rowclientes["empresa"];
    
    $direccion=$rowclientes['address'];
    $localidad=$rowclientes['localidad'];
    $retiradcv=$rowclientes['retira'];
    if($retiradcv=='1'){ $verprreir="checked";}
   


 
$id_clientever=$id_clienteve; */

$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$id_clienteint' and id!='0'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $id_clienteve=$rowclientes["empresa"];
    $rubro=$rowclientes["rubro"];

    if($rubro=='0'){$verpros='style="display:none;"';}else{$verpros='';}
    
    $direccion=$rowclientes['address'];
    $retiradcv=$rowclientes['retira'];
    if($retiradcv=='1'){ $verprreir="checked";}
   
   
    $tipo_cliente = 0;
$id_clientever=$rowclientes["empresa"];



$botedi="editar";
$idcliedit=base64_encode($id_clienteint);
$id_ordencod=base64_encode($id_orden);
$enalcli='<a href="../lclientes/?jnnfsc='.$idcliedit.'&modocl=1&jufqwes='.$id_ordencod.'" tabindex="-1">';

}else{$noverpro="display:none;";$botedi="agregar"; $enalcli='<a href="../lclientes/?modocl=1&jufqwes='.$id_ordencod.'" tabindex="-1">';}

if($id_orden=='' || $id_orden== 'dsds'){

    $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordencompra Where finalizada='0' and id_cliente='$id_clienteint'");
   
    }else{
        $sqlordenx = mysqli_query($rjdhfbpqj, "SELECT * FROM ordencompra Where id='$id_orden'");
    }


if ($rowordenx = mysqli_fetch_array($sqlordenx)) {

    $id_cliente = $rowordenx['id_cliente'];
    $id_usuarioclav = $rowordenx['id_usuarioclav'];
    $sadldodreal = $rowordenx['saldoreal'];
    
    $fefecivo = $rowordenx['fefecivo'];
    $fcheque = $rowordenx['fcheque'];
    $ftransfer = $rowordenx['ftransfer'];
    $fdeposito = $rowordenx['fdeposito'];
    $comment = $rowordenx['comment'];
    $numero = $rowordenx['numero'];
    $numeror = $rowordenx['numeror'];


// Reemplazar comas por puntos
$saldoreal =  number_format($sadldodreal, 2, ',', '.');

    
    $id_hoja = $rowordenx['id_hoja'];
    $fechahoja = $rowordenx['fechahoja'];
    $idcamioneta = $rowordenx['camioneta'];
    
    $prioridad = $rowordenx['prioridad'];
    if($prioridad=="1"){$chepr="checked";}
 $id_orden = $rowordenx['id'];
 /*       $_SESSION['id_orden'] = $id_orden; */

    /* pie saldos */
    $subtotal=$rowordenx['subtotal'];
    $uniddesc=$rowordenx['uniddesc'];
    if($uniddesc=='0'){$sedeeund0="selected";}
    if($uniddesc=='1'){$sedeeund1="selected";}
    $desporsen=$rowordenx['desporsen'];
    $descuento=$rowordenx['descuento'];
    $perporsen=$rowordenx['perporsen'];
    $totalper=$rowordenx['totalper'];
    $ivaporsen=$rowordenx['ivaporsen'];
    $totalivas=$rowordenx['totalivas'];
    $totalOrden=$rowordenx['total'];
    $pago=$rowordenx['pago'];
    $salddo=$rowordenx['saldo'];
    $saldorr =  number_format($salddo, 2, ',', '.');
    $forzado=$rowordenx['forzado'];
    if($forzado=='1'){ $verprreirf="checked";}
    /* fin */
    $comillas = "'";
    $fechaordn=$rowordenx['fecha'];
    $horaord=$rowordenx['hora'];
    $colestado=$rowordenx['col'];

    if($colestado=='0'){$sele0="selected";
        $nombrvot='1'; $blain="disabled";
    }else{
            $nombrvot="2";}
    if($colestado=='1'){$sele1="selected";}
    if($colestado=='2'){$sele2="selected";}
    if($colestado=='3'){$sele3="selected";}
    if($colestado=='4'){$sele4="selected";}
    if($colestado=='5'){$sele5="selected";}
    if($colestado=='6'){$sele6="selected";}
    if($colestado=='7'){$sele7="selected";}
    if($colestado=='8'){$sele8="selected";}
    if($colestado=='9'){$sele9="selected";}
    if($colestado=='2' || $colestado=='3'){$verpicing='display: block;';}else{$verpicing='display: none;';}
    
    if($_SESSION['tipo']=="3"){
    if($colestado >2){$blain="disabled";$versele='1';}}else{

       $versele='1';
    }


    $fechahoyventa=date('d/m/Y', strtotime($fechaordn))." ".$horaord;

} else {
    $id_orden = "dsds";
    $verpr="hidden";
  

    $fechaordn=$fechahoy;
    $horaord=$horasin;

    $fechahoyventa=date('d/m/Y', strtotime($fechahoy))." ".$horasin;


}

if (empty($producto)) {
    $producto = "";
}



$sqlordent = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$id_orden'");
if ($rowordenre = mysqli_fetch_array($sqlordent)) {$veritem="1";$notab='tabindex="-1"'; }else{$veritem="2";$blain="disabled";}

if($ref !='1'){
    $urlref='orden_de_compra.php';
    }else{$urlref='orden_de_compra.php';}
?>
<?php
   
  
 

 if($_SESSION['tipo']=="29"){$editd="";}else{$editd="?1=1";}
 if($_SESSION['tipo']=="30"){$editd=""; }

 $calculodeuda= calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden);




 ?>

    
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Orden de pago - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrapb.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body >
<?php
                    $sqlore = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$id_orden' and modo='0'");
                    $canverificafin = mysqli_num_rows($sqlore);
                    if($canverificafin > 6){
                        $ubufocus="ter";
                    //echo'<div style="height: 305px;width: 100%; text-align:center;background-color: #fffff;"></div> ';
                    //echo'<br><br><br><br><br><br><br><br><br> ';
                    }else{$ubufocusr="ter";}

                    ?>   
<div id="foo<?=$ubufocusr?>"></div>
<style>

    
    body {
        zoom: 85%;
        scroll-behavior: smooth;
        /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
    }

/*   

.scrdesa {
  width: 100%;
  height: 100%;
  overflow-y: scroll;
  scroll-behavior: none;
} */


</style>


<div class="scrdesa">



    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Orden de pago Versión 1.0.1</p>
    </div>

    <div class="container" >

        <div class="row">
            <div class="col-2">
              <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
            </div>

                    <?php   
                        
                        if($id_orden == "dsds"){$id_ordends="";}else{$id_ordends=$id_orden; $blockclien='disabled';}
                        
                        
                        
                        ?>

            <div class="col-4">
                <div style="padding-bottom:15px; width: 350px;">
            <b>Nº Orden de Pago</b> 
              <input type="text" class="form-control"  value="<? 
            
$id_ordendsd = str_pad($id_ordends, 8, '0', STR_PAD_LEFT);

echo ''.$id_ordendsd.'';

?>"  disabled>


        </div>
        <div style="padding-bottom:15px; width: 350px;">
        <b>Fecha</b>     
        <input type="text" class="form-control" value="<?=$fechahoyventa?>" style="width: 350px;" disabled>
        <input type="hidden" id="fechaordn" value="<?=$fechaordn?>">
        <input type="hidden" id="horaord" value="<?=$horaord?>">
        </div>
            
    <b>Proveedor  </b>
                            <?php
                
                include('inpubclien.php');
                
                
                ?>
            </div>
            <div class="col-2" style="width: auto;  position: relative; float: left; display:none;"><?=$enalcli?>
                <img src="../assets/images/<?=$botedi?>.png" alt="Nuevo Cliente" style="width: auto; height: 30px; position: absolute; bottom: 20px; left: -70px;"></a>
            </div>

            <div class="col-4">
        
                    <div style="padding-bottom:15px; width: 350px;">
                    <b>Saldo Actual</b>
                    <input type="text" class="form-control" value="$<?=number_format($calculodeuda, 2, ',', '.')?>" disabled></div>
                    <b>Estado</b>     
                <select name="col" id="col" class="form-control" style="width: 350px;" onchange="ajax_seguimiento($('#col').val());" tabindex="-1" <?=$blain?>>

                <option value="0" <?=$sele0?>>Ingresando...</option>
                <option value="1" <?=$sele1?>>Eperando Fecha</option>
                <option value="2" <?=$sele2?>>Confirmado</option>
                <? if($versele=="1"){?>  
                <option value="8" <?=$sele8?>>FINALIZADO</option>
                
                <? }?>  

                </select>
                <?php
         
         if(!empty($id_clienteint)){
          
         ?>
             <br>
             <b>Ir a Pagar  </b><input type="checkbox" name="retira" id="retira" value="1" onclick="ajax_retira($('input:checkbox[name=retira]:checked').val());" title="Marcar si hay que ir a pagar" tabindex="-1" <?=$verprreir?>>
             <div id="muestroorden5"></div>
         
           
           

             <?php
          }
          ?>


                <div style="width: 350px;padding-top:15px;display:none;">
                    <b>Localidad</b>     
                 <input type="text" class="form-control" tabindex="-1"  value="<?=$localidad?>" disabled>
            </div>
            </div> 
             <div class="col-2" style="width: auto;  position: relative; float: left;">
            
             

           <a href="../ordendecompra" tabindex="-1">
                <button type="button" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Panel</button></a>
            </div>


                  
        </div><br>
        <script>
		setTimeout(function() {
			var divb = document.getElementById('muestroorden4');
			divb.style.display = 'none';
		}, 3000); // 5000 milisegundos = 5 segundos
	</script>

        <div id="muestroorden4"> </div>
        <div id="muestroorden6"> </div>
     
            <div class="row" id="ordenin">
         
<?php   $comillas = "'";
if($modif=='1'){echo' <script>
		setTimeout(function() {
			var div = document.getElementById('. $comillas.'guardao7364'. $comillas.');
			div.style.display = '. $comillas.'none'. $comillas.';
		}, 3000); // 5000 milisegundos = 5 segundos
	</script>

 <br><div id="guardao7364" class="alert alert-success" style="width:400px">
<strong>Información actualizada.</strong>
</div>  ';} 

 
?>
            <? if ($id_orden != "dsds" && $veritem=="1") { ?>
        <div class="container mt-3">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                    <th style="text-align:left; padding-left: 10px;">Orden de Pago</th>

                        <th style="width: 150px;" class="text-center">Importe $</th>
                        <th style="width: 100px;text-align:center;"></th>
                        <th style="width: 100px;text-align:center;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                   

                    $sqlorden = mysqli_query($rjdhfbpqj, "SELECT * FROM item_compra Where id_orden = '$id_orden'  and modo='0' ORDER BY `id` ASC");
                    while ($roworden = mysqli_fetch_array($sqlorden)) {
                        $iditeorfd=$roworden['id'];
                        $id_producto=$roworden['id_producto'];

                        $idproducservi=$idproducservi + 1;
                        $tipounidad=$roworden['tipounidad'];
                        $totalite+=$roworden['total'];
                        $agregado=$roworden['agregado'];
                        if($agregado=='1'){$agreccs='<i style="font-size: 10pt; color:red">'.$agregado=$roworden['hora'].'</i>';}else{$agreccs='';}

                        if($tipounidad=='0'){$seled0="selected";}else{$seled0="";}
                        if($tipounidad=='1'){$seled1="selected";
                        $comoviene="- ".$nombrebult."&nbsp;x&nbsp;".$cantidadbiene."&nbsp;".$nombreunid;
                        
                        }else{$seled1="";$comoviene="";}

                       
                        echo'
                        
                        <tr>
                        <td  style="padding-left: 2mm;">   
                        <input type="text" class="form-control" id="producto' . $roworden['id'] . '" value="' . $roworden['nombre'] . ' '.$comoviene.'" >
                        </td>
                   
                
                   
                 </td>
                  

                 


                      <td  style="text-align:center;'.$fondotd.'">
                      <input type="text" id="importtot' . $roworden['id'] . '" value="' . number_format($roworden['total'], 2, ',', '.') . '" class="form-control"  style="text-align:right;"  oninput="formatoMoneda(this)">
                      </td>
                 
                       <td class="text-center" style="place-items: center;text-align:center;'.$fondotd.'">   
                       <input type="hidden" name="iditem' . $roworden['id'] . '"  id="iditem' . $roworden['id'] . '" value="' . $roworden['id'] . '">    
                       
                       
                                <button type="button"  class="btn btn-success" 
                    onclick="ajax_actuait' . $roworden['id'] . '($(' . $comillas . '#importtot' . $roworden['id'] . '' . $comillas . ').val(),$(' . $comillas . '#producto' . $roworden['id'] . '' . $comillas . ').val());" 

                    style="width: 100%;">Mod</button></td><td style="text-align:center;">



                       <button type="button" class="btn btn-danger btn-sm"  ondblclick="ajax_elimina($(' . $comillas . '#iditem' . $roworden['id'] . '' . $comillas . ').val(),' . $comillas . ''.$id_producto.'' . $comillas . ');
                       $(' . $comillas . '#producto' . $comillas . ').val(' . $comillas . '' . $comillas . ');
                       
                       " tabindex="-1">X</button>

                           

                       <script>
                       
                       function ajax_actuait' . $roworden['id'] . '(improteun' . $roworden['id'] . ',producto' . $roworden['id'] . ') {
                                              
                       var parametros = {
                            "precio": improteun' . $roworden['id'] . ',
                            "producto": producto' . $roworden['id'] . ',
                            "iditem": ' . $comillas . '' . $roworden['id'] . '' . $comillas . '
                        };
                        $.ajax({
                            data: parametros,
                            url: ' . $comillas . 'actualitem.php' . $comillas . ',
                            type: ' . $comillas . 'POST' . $comillas . ',
                            beforeSend: function() {
                                $("#muestroordenr' . $roworden['id'] . '").html(' . $comillas . '' . $comillas . ');
                            },
                            success: function(response) {
                                $("#muestroordenr' . $roworden['id'] . '").html(response);
                            }
                        });
                    }
                    
                 
                   </script>


                            <div id="muestroordenr' . $roworden['id'] . '"></div>


                      </td>
                   </tr>'
                    ;
                    }

         
    
        ?>
        
      
        
        
                    

                </tbody>
            </table>
            
            <div id="foo<?=$ubufocus?>" style="position:relative; top:-200px;"></div>

        <?php  }


 
                
 
?>




      <div id="muestroorden2"> </div>
    
                        
    <div id="muestroorden29"> </div>

    
                <div>
                         <table class="table table-bordered table-sm"  style="bottom: 300px; <?=$noverpro?>">
                            <thead>
                                <tr>
                                    <th style="text-align:left; padding-left: 10px;">Agregar referencia para el pago</th>

                                    <th style="width: 200px;" class="text-center">Importe $</th>
                                    <th style="width: 100px;text-align:center;">Acción</th>
                                </tr>
                            </thead>
                <tbody>
                
                <tr >
                     <td  style="padding-left: 2mm; ">  
                             
                     <input type="text" name="producto" id="producto" class="form-control" value="Pagar">
                     
                     </td>
                  
                    
                   
                   <td  style="text-align:center; "><input type="text" name="importtot" id="importtot" value="<?=number_format($totalite, 2, ',', '.')?>" class="form-control"  style="text-align:right;" onclick="select()" oninput="formatoMoneda(this)" ></td>
              
                    <td class="text-center" style="place-items: center;text-align:center; ">        
                    <button type="button" id="suminstr"  class="btn btn-success" 
                    onclick="ajax_ordenbajar($('#producto').val(),$('#importtot').val())"
                    
                    style="width: 100%; ">Agregar</button>
                   </td>
                </tr>
                 </tbody>
            </table><?=$alerpeo?>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input1 = document.getElementById('suminstr');

            input1.addEventListener('keydown', function(event) {
                // Detectar si la tecla presionada es Tab (código de tecla 9)
                if (event.key === 'Tab' || event.keyCode === 9) {
                    // Prevenir el comportamiento predeterminado (enfocar el siguiente elemento)
                    event.preventDefault();
                }
            });
        });
    </script>
        <? if($veritem=="1"){
          
            ?>






            <!-- total venat -->
            <table class="table">
                                <tr>
                                     <td  style="text-align:left"> 

                                     <div class="row">
                                    
<div style="width: 320px;"> Como Pagar:
<div class="input-group mb-1" >
   
      <span class="input-group-text" style="width: 120px;">Efectivo</span>
      <input type="text" class="form-control"  name="fefecivo" id="fefecivo"  value="<?=number_format($fefecivo, 2, ',', '.');?>" oninput="updateRemaining();formatoMoneda(this)" onclick="select()" style="text-align:right;">
    </div>
    <div class="input-group mb-1">
      <span class="input-group-text" style="width: 120px;">Cheque</span>
      <input type="text" class="form-control"  name="fcheque" id="fcheque" value="<?=number_format($fcheque, 2, ',', '.');?>" oninput="updateRemaining();formatoMoneda(this)"  onclick="select()" style="text-align:right;">
    </div>
    <div class="input-group mb-1" >
      <span class="input-group-text" style="width: 120px;">Transferencia</span>
      <input type="text" class="form-control"  name="ftransfer" id="ftransfer" value="<?=number_format($ftransfer, 2, ',', '.');?>" oninput="updateRemaining();formatoMoneda(this)" onclick="select()"  style="text-align:right;">
    </div>    
    <div class="input-group mb-1">
      <span class="input-group-text" style="width: 120px;">Deposito</span>
      <input type="text" class="form-control"  name="fdeposito" id="fdeposito" value="<?=number_format($fdeposito, 2, ',', '.');?>" oninput="updateRemaining();formatoMoneda(this)" onclick="select()"  style="text-align:right;">
    </div>
   
</div>

<div style="width: 320px;">
Falta destino del pago:
<div class="input-group mb-1">
      
      <input type="text" class="form-control"  name="faltapag" id="faltapag" style="text-align:right;">
    </div>
    <div class="mb-3 mt-3">
      <label for="comment">Comentario:</label>
      <textarea class="form-control" rows="3" id="comment" name="text"><?=$comment?></textarea>
    </div> 
   
    <div class="mb-3 mt-3" style="position:relative; left:300px; top:-55px;">
    <button type="button" class="btn btn-success" onclick="ajax_pagnota()">Guardar</button>
    </div> 
    </div>
</div>
</div>
        </td> 
                                     <td  style="text-align:right;width: 400px;"> 
                                                <table style=" float: right;">
                                                    <tr>                                               
    
                                                        <td  colspan="3" style="text-align:right; width: 380px;display:none;"> 
                                                        Suma Compra:&nbsp;
                                                        </td>
                                                        <td  style="text-align:right"> 
                                                        <input type="hidden" class="form-control"  id="suresul" style="text-align:right;" value="<?=$totalite?>"  disabled>
                                                  
                                                        </td>
                                                    </tr>
                                                    <tr style="display:none;"> 
                                                        <td  style="text-align:right"> 
                                                        <div style="position:relative; left:40px; top:0px;">
                                                        Descuento:&nbsp;
                                                        </div>
                                                    </td>
                                                      
                                                        <td  style="text-align:right;  width: 50px;"> 
                                                        <div style="position:relative; left:40px; top:0px;">
                                                        <select name="desuni" id="desuni" class="form-control" tabindex="-1"
                                                       tabindex="-1"
                                                        > 
                                                            <option value="0" <?=$sedeeund0?>>%</option> 
                                                            <option value="1" <?=$sedeeund1?>>$</option>
                                                        </select >
                                                         </div>
                                                         </td>

                                                            <td  style="text-align:right; width: 100px;"> 
                                                            <div style="position:relative; left:40px; top:0px;">
                                                            <input type="text" id="desuniva" class="form-control" style="text-align:right; width: 55px;" value="<?=$desporsen?>" 
                                                            
                                                            onclick="select()">
                                                            </div>
                                                                </td>
                                                                <td  style="text-align:right;"> 
                                                                <input type="text"  id="totaldes" class="form-control" style="text-align:right;" style="text-align:right; width: 100px;"  value="<?=$descuento?>" disabled>
                                                                </td>
                                                    </tr>
                                                    <tr style="display:none;"> 
                                                        <td   colspan="2" style="text-align: right;">
                                                        <div style="position:relative; left:40px; top:0px;"> 
                                                        Persep. %:&nbsp;
                                                          </div>
                                                        </td>
                                                        <td  style="text-align: right;"> 
                                                        <div style="position:relative; left:40px; top:0px;">
                                                        <input type="text" id="valdvp" class="form-control" style="text-align:right; width: 55px" value="<?=$perporsen?>" 
                                                        
                                                        
                                                        onclick="select()" tabindex="-1"></div>
                                                  
                                                        </td>
                                                        <td   colspan="3" style="text-align: right;"> 
                                                        <input type="text"  id="totalpersep" class="form-control" style="text-align:right;"  value="<?=$totalper?>" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr style="display:none;">
                                                        <td   colspan="2" style="text-align: right;"> 
                                                        <div style="position:relative; left:40px; top:0px;">
                                                        IVA %:&nbsp;
                                                     </div>    
                                                    </td>
                                                        <td  style="text-align: right;"> 
                                                        <div style="position:relative; left:40px; top:0px;">
                                                        <input type="text" id="valoiva" class="form-control" style="text-align:right; width: 55px" value="<?=$ivaporsen?>" 
                                                         
                                                        
                                                        
                                                        onclick="select()" tabindex="-1">
                                                     </div>
                                                  
                                                        </td>
                                                        <td   colspan="3" style="text-align: right;"> 
                                                        <input type="text"  id="totalivas" class="form-control" style="text-align:right;"  value="<?=$totalivas?>" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr style="display:none;">
                                                        <td  colspan="3"  style="text-align:right"> 
                                                        <strong>Total:</strong>&nbsp;
                                                        </td>
                                                        <td  style="text-align:right"> 
                                                        <input type="text" class="form-control"  id="totalventa" style="padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?=$totalOrden?>" disabled>
                                                  
                                                        </td>
                                                    </tr>
                                                    <tr>                                               
    
                                                        <td  colspan="3" style="text-align:right; width: 380px;display:none;"> 
                                                        Anterior:&nbsp;
                                                        </td>
                                                        <td  style="text-align:right;display:none;"> 
                                                        <input type="text" class="form-control"  id="anterior" style="text-align:right;" value="<?=$calculodeuda?>"  disabled>
                                                        
                                                        </td>
                                                    </tr>
                                                 
                                                                                         
                                                
                                                    
                                                    <tr>
                                                        <td  colspan="3"  style="text-align:right"> 
                                                        <strong>Total a Pagar $:</strong>&nbsp;
                                                        </td>
                                                        <td  style="text-align:right"> 
                                                        <input type="text" class="form-control"  id="saldo" style="padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?=number_format($totalite, 2, ',', '.')?>" disabled >
                                                  
                                                        </td>
                                                    </tr>
                                                    <tr style="display:none;">
                                                        <td  colspan="3"  style="text-align:right"> 
                                                        <strong>Saldo Final $:</strong>&nbsp;
                                                        </td>
                                                        <td  style="text-align:right"> 
                                                        <input type="text" class="form-control"  id="saldoreal" style="background-color: yellow;font-size: 14pt;padding-left:100px; text-align:right; width: 250px;font-weight: bold;" value="<?=$saldoreal?>" 
                                                        
                                                        onkeyup="saldofinal($('#saldoreal').val());updateRemaining();formatoMoneda(this)" 
                                                        onChange="saldofinal($('#saldoreal').val());updateRemaining();formatoMoneda(this)" 
                                                        >
                                                  
                                                        </td>
                                                    </tr>
    


                                                </table>
                                               
                                                
                                                <div id="muestroorden7"></div>
                                        </td>
                                 </tr>
                            </table> 
                            
                            
                            
                            
                                   
                                    
    
    <!-- fin -->  <?  
    
    include('../orden_de_compra/calComPag.php');
    echo '</div>';}









                                echo '
                                    </div>
                                    </div>';

 



?> 
    





</div>

        <div id="muestroorden3"> </div>
       
        
        <br><div class="container mt-3 text-center"> <? if($veritem=="1"){?>
    
<?  if($nombrvot=='222'){?>
    
            <a href="orden_de_pago_pdf.php?jdhsknc=<?= base64_encode($id_orden)?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF Orden de Pago</button></a> &nbsp;&nbsp;&nbsp;&nbsp;  
            
           
            
            <? } if($nombrvot=='1'){?>
    <button  onclick="ajax_guardarorden($('#col').val());" type="button" class="btn btn-dark" tabindex="-1">Finalizar Orden de Pago Total: <b>$<?=number_format($totalite, 2, ',', '.')?></b></button>
    <? } ?>
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <? }?>

<a href="/ordendecompra">
                    <button type="button" id="suminstr2" class="btn btn-danger" >Salir</button>
                </a>

        </div><br><br><br><br><br>
     
                <script>
                    <? if ($id_orden == "dsds" && empty($id_cliente)) { ?>
                        document.getElementById('cantidad').focus();
                        document.getElementById('cantidad').select();
                    <?  } else { ?>



                        <? if (!empty($producto)) { ?>
                            document.getElementById('cantidad').focus();
                            document.getElementById('cantidad').select();

                            <? } else { ?>document.getElementById('producto').focus();
                    <? }
                    } ?>

                    function detectarEnter(event) {
                        if (event.key === 'Enter') {
                            ajax_ordenbajar($('#producto').val(),$('#importtot').val());
                        }
                    }

                    function detectarEnterb(event) {
                        if (event.key === 'Enter') {
                            document.getElementById('producto').focus();
                        }
                    }
                </script>

                <?php

                //Agregar producto al Pedido

                ?>




    <br>
  



    <div id="muestroorden"> </div>
 
 


   
    <script>
        function ajax_ordenbajar(producto,importtot) {
            if (<?=$id_clienteint?>) { // Verifica si id_cliente tiene datos
                var parametros = {
                "producto": producto,                     
                    "importtot": importtot,
                    "id_cliente": '<?=$id_clienteint?>',
                    "fechaordn": '<?=$fechaordn?>',
                    "horaord": '<?=$horaord?>',
                    "id_ordenedit": '<?=$id_orden?>',
                    "id_marca": '<?=$id_marca?>',
                    "id_categoria": '<?=$id_categoria?>',
                    "tipoprov": '<?=$rubro?>'
                };
                $.ajax({
                    data: parametros,
                    url: 'insert_item.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#muestroorden").html('');
                    },
                    success: function(response) {
                        $("#muestroorden").html(response);
                    }
                });
                
            } else {
                alert("INGRESE DATOS!");
                document.getElementById('id_cliente').focus();
            }
        }
    </script>   
    




<script>
 function showInput() {
    var selectValue = document.getElementById("tipopag").value;
    var ncheque = document.getElementById("ncheque");
    var vencheque = document.getElementById("vencheque");
  
  if (selectValue === "4") {
    ncheque.style.display = 'block';
    vencheque.style.display = 'block';
    nota.placeholder = "Banco";
    
  } else {
    ncheque.style.display = 'none';
    vencheque.style.display = 'none';
    nota.placeholder = "Nota";
  }
}
       
</script>



    <script>
        function ajax_elimina(iditem,idproduc) {
            var parametros = {
                "iditem": iditem,
                "idproduc": idproduc,
                "idorden": <?=$id_orden?>,
                "cantpro": <?=$canverificafin?>
            };
            $.ajax({
                data: parametros,
                url: 'eliminar.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden2").html('');
                },
                success: function(response) {
                    $("#muestroorden2").html(response);
                }
            });
        }            
        
        
        
        function saldofinal(saldoreal) {
            var parametros = {
                "saldoreal": saldoreal,
                "idorden": <?=$rubro?>
            };
            $.ajax({
                data: parametros,
                url: 'saldoreal.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden2").html('');
                },
                success: function(response) {
                    $("#muestroorden2").html(response);
                }
            });
        }        
  

 
    </script>

<script>
        function ajax_guardarorden(col) {
            var parametros = {
                "col": col,
                "idorden": '<?=$id_orden?>',
                "idcliente": '<?=$idcliedit?>'
            };
            $.ajax({
                data: parametros,
                url: 'guardaor.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden3").html('');
                },
                success: function(response) {
                    $("#muestroorden3").html(response);
                }
            });
        }


        function ajax_seguimiento(col) {
            var parametros = {
                "col": col,
                "idorden": '<?=$id_orden?>'
            };
            $.ajax({
                data: parametros,
                url: 'guardaseg.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden4").html('');
                },
                success: function(response) {
                    $("#muestroorden4").html(response);
                }
            });
        }


   

        function ajax_retira(retira) {
            var parametros = {
                "retira": retira,
                "idcliente": '<?=$id_clienteint?>'
            };
            $.ajax({
                data: parametros,
                url: 'guardasretira.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden5").html('');
                },
                success: function(response) {
                    $("#muestroorden5").html(response);
                }
            });
        }


 
    </script>

<!-- <script>
        function sumoventas(cantidad,descuenun,improteun) {
            //valores 
            var cantidad = cantidad;
            var descuenun = descuenun;
            var improteun = improteun;
                /* precio total producto */
                if (descuenun === undefined || descuenun === null || descuenun === ''|| descuenun === '0') {
                    costoxbuld = cantidad * improteun
                    document.getElementById('importtot').value = Math.round(costoxbuld); 
                }else{
            costoxbuldr = cantidad * improteun;
                /* descuento al totalfinal */
                costoxbuldd = costoxbuldr - (costoxbuldr * (descuenun / 100));
            document.getElementById('importtot').value = Math.round(costoxbuldd); 
                }
        }
    </script> -->


   <script>
        // Función para validar y limitar el rango de un campo de entrada 
        function validarRango(input) {
            let valor = input.value;

            // Validar si el valor es un número válido entre 0 y 100
            if (valor !== '' && (isNaN(valor) || Number(valor) < 0 || Number(valor) > 100)) {
                // Si el valor no es válido, restablecer el valor del input a un valor permitido
                input.value = '';
            }
        }

        // Obtener referencias a los campos de entrada
        const input1 = document.getElementById('valoiva');
       /*  const input2 = document.getElementById('desuniva'); */

        // Agregar event listener al primer campo de entrada
        input1.addEventListener('input', function(event) {
            validarRango(input1);
        });

        // Agregar event listener al segundo campo de entrada
     /*    input2.addEventListener('input', function(event) {
            validarRango(input2);
        }); */
    </script>

<?php
 if($sumapag<0.1){$sumapag=0;}

 
?>






 <style>
    /* Estilos del botón flotante */
.btnGoToTop {
    position: fixed;
    bottom: 20px; /* Distancia desde la parte inferior */
    right: 20px; /* Distancia desde la derecha */
    z-index: 99;
}

</style>




</scroll-container>

<script>
        // Espera a que la página esté completamente cargada
        window.onload = function() {
            // Desplaza la página hasta el pie
            document.getElementById('footer').scrollIntoView();
        };
    </script>

<script>


function formatoMoneda(input) {
  var num = input.value.replace(/\./g, '');
  if (!isNaN(num)) {
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/, '');
      input.value = num;
  }

  else {
      input.value = input.value.replace(/[^\d,.]/g, '');
  }
}

</script>

</body>

</html>
<?php
 
     
}else{
    echo ("<script language='JavaScript' type='text/javascript'>");
            echo ("location.href='../'");
            echo ("</script>"); 
    }
 
?>

<?php
 

 if(!empty($id_orden)){

    $saldddo=$anterior+$totalite;

    $sqlclientes = "Update ordencompra Set saldo='$saldddo' Where id = '$id_orden'";
    mysqli_query($rjdhfbpqj, $sqlclientes) or die(mysqli_error($rjdhfbpqj));
   
   } 
 
?>
