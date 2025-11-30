<?php include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('../nota_de_pedido/funcion_saldoanterior.php');
include('../funciones/StatusOrden.php');
$id_clientecod = $_GET['jhduskdsa'];
$id_clienteint=base64_decode($id_clientecod);

$errcan=$_GET['error'];
$modif=$_GET['modif'];

if(!empty($_POST['desde_date']) && !empty($_POST['hasta_date'])){
$desde_date=$_POST['desde_date'];
$hasta_date=$_POST['hasta_date'];
}
else{
$fechaObj = new DateTime($fechahoy);

// Restar un mes
$fechaObj->modify('-11 month');

// Obtener la fecha modificada
$desde_date = $fechaObj->format("Y-m-d");
$hasta_date=$fechahoy;
}
$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $id_clienteve=$rowclientes["nom_contac"];
    
    $direccion=$rowclientes['address'];
    $localidad=$rowclientes['localidad'];
    $retiradcv=$rowclientes['retira'];
    $zonaid=$rowclientes['zona'];


    $sqlleadd=mysqli_query($rjdhfbpqj,"SELECT * FROM zona Where id = '$zonaid'");
if ($rowleadd = mysqli_fetch_array($sqlleadd)){
	$zonad=$rowleadd["nombre"];

}else{$zonad="";}
$id_clientever=$zonad." - ".$rowclientes["nom_empr"]." ".$id_clienteve."";

}


function proveedores($rjdhfbpqj){

   
    $sqlclientes = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where estado='0' ORDER BY `proveedores`.`empresa` ASC");
    while ($rowclientes = mysqli_fetch_array($sqlclientes)) {

        echo '<option value="'.$rowclientes['id'].'">'.$rowclientes['empresa'].'</option>';


    }


}

function pagoprovee($rjdhfbpqj,$idprov){
   
    $sql = mysqli_query($rjdhfbpqj, "SELECT * FROM proveedores Where id='$idprov'");
    if ($row = mysqli_fetch_array($sql)) {

       $pagprov= ' Transferencia a '.$row['empresa'].'';

    }

return $pagprov;
}



?>
<?php
 
 if($_SESSION['tipo']=="29"){$editd="";}else{$editd="?1=1";}
 if($_SESSION['tipo']=="30"){$editd=""; }

 $calculodeuda= calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden);




 ?>

    
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Debe y Haber Clientes - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
</script>
<body>
<style>

    
    body {
        zoom: 85%;
        scroll-behavior: smooth;
        /* Escala la página al 80% del tamaño original ; onclick="ajax_buscar('dsdssddds');" */
    }

  


</style>


<div>



    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Debe y Haber Clientes Versión 1.0.0</p>
    </div>
<!-- </div class="text-center">
<h1 style="color:red;"> AL CLIENTE ESTE RESUMEN ESTOY CONTROLANDO </h1>
</div> -->
    <div class="container" >
    <form action="../deuda_clientes/debe_haber?fort=1&jhduskdsa=<?=$id_clientecod?>" method="post">
        <div class="row">
            <div class="col-2">
<a href="../../">
                <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1"></a>
            </div>

              

            <div class="col-4">
                <div style="padding-bottom:15px; width: 350px;">
            <b>Cliente Id: <?=$id_clienteint?></b> 
              <input type="text" class="form-control"  value="<?=$id_clientever?>"  disabled>
        </div>

        <div style="padding-bottom:15px; width: 350px;">
        <b>Fecha desde</b>     
        <input type="date"  id="desde_date" name="desde_date" class="form-control" value="<?=$desde_date?>" style="width: 350px;" >
        </div>
        
            </div>
            <div class="col-2" style="width: auto;  position: relative; float: left;">
              
            </div>

            <div class="col-4">
        
                    <div style="padding-bottom:15px; width: 350px;">
                    <b>Saldo Actual</b>
                    <input type="text" class="form-control" value="$<? 
                    
                    $salgral=calculodeuda($rjdhfbpqj,$id_clienteint,99999999999);
                    
                    echo ''. number_format($salgral, 0, '.', ',').''?>" disabled></div>
        
                    <b>Fecha Hasta</b>     
                    <input type="date"id="hasta_date" name="hasta_date"  class="form-control" value="<?=$hasta_date?>" style="width: 350px;" >
           
            </div> 
            
            
            <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="debe_haber?jhduskdsa=Mw==" tabindex="-1">
                <button type="submit" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Ver</button></a>
            </div>


                     
        </div>
      </form>

     
            <div class="row">
         
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
          
        <div class="container">
         
 


    
 

    
                <div>
                <table class="table table-bordered table-sm" style="bottom: 300px; <?=$noverpro?>">
    <thead>
        <tr>
            <th style="width: 100px; text-align: center;">Estado</th>
            <th style="width: 100px; text-align: center;">Fecha</th>
            <th style="width: 60px; text-align: center;">Tipo</th>
            <th style="text-align: left; padding-left: 10px;">Número</th>
            <th style="width: 150px; padding-left: 10px;text-align: center;">Debe</th>
            <th style="width: 150px; padding-left: 10px;text-align: center;">Haber</th>
            <th style="width: 150px; padding-left: 10px;text-align: center;">Saldo</th>
            <th style="width: 90px; padding-left: 10px;text-align: center;">Acción</th>
        </tr>
    </thead>
    <tbody> <? 
saldoinicial($rjdhfbpqj,$id_clienteint);

/* $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint' and col!='0'");
if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {}else{ 
    
} */
iniciomov($rjdhfbpqj,$id_clienteint,$desde_date,$hasta_date);

   ventas($rjdhfbpqj,$id_clienteint,$desde_date,$hasta_date);
  






  
       ?>
        

    </tbody>
</table>


        </div>
        <br><br><?php
 
/*  $sqlo2nx=mysqli_query($rjdhfbpqj,"SELECT * FROM orden Where id_cliente='$id_clienteint' ORDER BY `orden`.`id` ASC");
 if ($rowordx = mysqli_fetch_array($sqlo2nx)){
    $cidordpag=$rowordx['fecha']; */
 
?>
<div class="container">

                            <table class="table table-bordered">
                                <tbody>
                                    
                                        <div class="form-group row col-md-12">
                                            <div class="card-body">
                                            <div id="muestroorden30"> </div>
                                                                  
                                             <div id="muestroorden29"> </div>
                                                <label><b>Cargar Pago</b></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                                                    </div>

                                                    &nbsp;


                                                    <input type="date" id="fechapag" name="fechapag" class="form-control" value="<?= $fechahoy ?>" min="<?= $cidordpag ?>" max="<?= $fechahoy ?>">&nbsp;  &nbsp;
                                                    <select class="form-control" name="tipopag" id="tipopag" onchange="showInput()">
                                                        <option value="1">Efectivo</option>
                                                        <option value="2">Transferencia</option>
                                                        <option value="3">Deposito</option>
                                                        <option value="4">Cheque</option>
                                                        <option value="6">ECheq</option>
                                                        <option value="5">Mercado Pago</option>
                                                    </select>
                                                    
                                                    &nbsp;  
                                                    <select class="form-control" name="id_proveedor" id="id_proveedor" style="display: none;" >
                                                        <option value="0">Mi Banco</option>
                                                        <?php
                                                         
                                                         proveedores($rjdhfbpqj);
                                                         
                                                        ?>
                                                    </select>

                                                    &nbsp;  
                                                    <select class="form-control" name="tipocuneta" id="tipocuneta" style="display: none;" >
                                                        <option value="0">Cuenta A</option>
                                                        <option value="1">Cuenta R</option>
                                                       
                                                    </select>
                                                    
                                                    &nbsp;
                                                    <input type="text" class="form-control" name="ncheque" id="ncheque" placeholder="Nº Cheque" style="display: none;" autocomplete="off">
                                                    &nbsp;
                                                    <input type="date" class="form-control" name="vencheque" id="vencheque"  style="display: none;" autocomplete="off">
                                                    
                                                    &nbsp;
                                                    <input type="text" class="form-control" name="valor" id="valor" placeholder="$0.00" autocomplete="off"> 
                                                    &nbsp;  &nbsp;  &nbsp;
                                                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota" autocomplete="off">

                                                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $id_clienteint ?>" autocomplete="off">

                                                    &nbsp;<button onclick="ajax_agrgpago($('#valor').val(),$('#tipopag').val(),$('#fechapag').val(),$('#ncheque').val(),$('#vencheque').val(),$('#nota').val(),$('#id_proveedor').val(),$('#tipocuneta').val())" class="btn btn-secondary" style="width: 100px;">Enviar</button>
                                                </div>


                                            </div>
                                </tbody>
                            </table>
                            </div>
                            <?php /* }else{
                             
    } */
                             
                            ?>
                                    </div>
  
                                    <?php


function saldoinicialsuma($rjdhfbpqj,$id_clienteint){

$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini > 0");
if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
$saldoini = $rowpagdeufp["saldoini"];
$nosumomas=99;
}
 // Devuelve un array con ambos valores
 return array('saldoini' => $saldoini, 'nosumomas' => $nosumomas);

}


                                    function saldoinicial($rjdhfbpqj,$id_clienteint){
                                        $comillas="'";
                                     
                                        

$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini !='0'");
if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
    $saldoini = $rowpagdeufp["saldoini"];
    $fechasaldo = $rowpagdeufp["fecha"];
      
    
   
    echo '                      
                        
                         <tr>

                           <td style="text-align: center;vertical-align: middle;">        
               
            </td>  
            
            <td style="text-align: center;vertical-align: middle;">        
                '.date('d/m/y', strtotime($fechasaldo)).'
            </td>  
            <td style="text-align: center; vertical-align: middle;">        
               
            </td>
            <td style="padding-left: 3mm; vertical-align: middle;">   
             Saldo Anterior  
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
            $'. number_format($saldoini, 2, '.', ',').'                 
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                            
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
               
            </td>
            <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

        </tr>  ';
   
    }


}

                                    function ventas($rjdhfbpqj,$id_clienteint,$desde_date,$hasta_date){
                                        $comillas="'";
                                     
                            //and fin='1' and finalizada='1'             

$sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM orden Where id_cliente = '$id_clienteint'  and col!='0' and fecha BETWEEN '$desde_date' and '$hasta_date'  ORDER BY `orden`.`id` ASC");
while ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
    $iditefp = $rowpagdeufp["id"];
    $id_orden = $rowpagdeufp["id"];
    $fecha = $rowpagdeufp["fecha"];
    $id_ordencod = base64_encode($iditefp);
    $adicionalvalor=$rowpagdeufp["adicionalvalor"];
    $total = $rowpagdeufp["total"]+$adicionalvalor;
    //$total = $rowpagdeufp["total"];
    $totald+= $rowpagdeufp["total"];
    $fechaad = $rowpagdeufp["fecha"];
    /* cal */
    $saldoinicials=saldoinicialsuma($rjdhfbpqj,$id_clienteint);
    $saldoinials=$saldoinicials['saldoini'];

    $idcanord=$idcanord+1;
    if($idcanord=="1"){
        $decudaanter=calculodeuda($rjdhfbpqj,$id_clienteint,$id_orden); 
    }else{$decudaanter=0; }
    
    if(!empty($saldohaber)){$sumapd=$total+$saldohaber;}
    else{ $sumapd=$totald+$decudaanter;}
    $sumapag=$totald;
    
    $decudaanterd=calculosaldo($rjdhfbpqj,$id_clienteint,$id_orden);
    $status=StatusOrden($rjdhfbpqj,$id_orden);
    // 
    
   
    echo '                      
                        
                         <tr>

                                       <td style="text-align: center;vertical-align: middle;">        
                '.$status.'
            </td>  
            
            <td style="text-align: center;vertical-align: middle;">        
                '.date('d/m/y', strtotime($fechaad)).'
            </td>  
            <td style="text-align: center; vertical-align: middle;">        
                Fac
            </td>
            <td style="padding-left: 3mm; vertical-align: middle;">   
               N' . str_pad($iditefp, 8, "0", STR_PAD_LEFT) . '
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> 
            $'. number_format($total, 2, '.', ',').'                 
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                            
            </td>
            <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                <b>$'. number_format($decudaanterd, 2, '.', ',').'              </b>
            </td>
            <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

            <a href="../nota_de_pedido/nota_de_pedido_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
              <button type="button" class="btn btn-success btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
            </td>
        </tr>  ';
        $idcanpag=${"idcanpag".$iditefp};
        $sqlpedpd=${"sqlpedpd".$iditefp};
       
        
        $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1' and id_orden='$iditefp'and fecha BETWEEN '$desde_date' and '$hasta_date' ORDER BY `item_orden`.`id` ASC ");
       
        while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {
             $nota = $rowpaufp["nota"];
             $idprov = $rowpaufp["id_provepag"];
           $deudavfp= $rowpaufp["valor"];
     
            
            $idcanpag=$idcanpag+1;

            $rowdfp=${"rowdfp".$idcanpag};
            $deudavfdp=${"deudavfdp".$idcanpag};
            $saldohabersaldohaber=${"saldohaber".$idcanpag};
           
           $pagoTotal += $rowpaufp["valor"];
            //extraigo cada pago xxx

            $sqlpedpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint'  and modo='1' and id_orden='$iditefp'and fecha BETWEEN '$desde_date' and '$hasta_date' ORDER BY `item_orden`.`id` ASC limit $idcanpag");
            {

                while ($rowdfp = mysqli_fetch_array($sqlpedpd)) {
                   $deudavfdp+= $rowdfp["valor"];
                
                }



            }
            //
               $tipopages = $rowpaufp['tipopag'];
            if ($tipopages == '1') {
                $tipopagver = "E";
            }
            if ($tipopages == '2') {
                $tipopagver = "T";
            }
            if ($tipopages == '3') {
                $tipopagver = "D";
            }
            if ($tipopages == '4') {
                $tipopagver = "C";
            }
            if ($tipopages == '5') {
                $tipopagver = "M";
            }
            if ($tipopages == '6') {
                $tipopagver = "Ech";
            }  $refor="";
            if ($tipopages == '33') {
                $tipopagver = "C";
                $iditefp=$rowpaufp['id_notacredito'];


                $sddenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id='$iditefp'");        
                if ($rowodx = mysqli_fetch_array($sddenx)) {
                    $ordedecompra = $rowodx['ordedecompra'];
                  
                }
                
                if($ordedecompra > 0){$refor="Ref. Orden de Compra Nº".$rowodx['ordedecompra'];}else{$refor="";}
                    

                  //  $iditefp=$rowpaufp['id_notacredito'].$refor ;




                $id_ordencod=base64_encode($iditefp);
            }
            $fechaad = $rowpaufp["fecha"];

            if($tipopages == '33'){$nomb="Cred";}else{$nomb="Pag";}

            if($idprov !='0'){
            $pagprov=pagoprovee($rjdhfbpqj,$idprov);
            }else{ $pagprov="";}
            if(!empty($nota)){$notaver=" (".$nota.")";}else{$notaver="";}
           

        
        $saldohaber=$decudaanterd-$deudavfdp;
      


            echo '                      
                                
                                 <tr>
                               <td style="text-align: center;vertical-align: middle;">        
               
            </td>  
                    <td style="text-align: center;vertical-align: middle;">        
                        '.date('d/m/y', strtotime($fechaad)).' 
                    </td>
                         <td style="text-align: center; vertical-align: middle;">        
                        '.$nomb.'
                    </td>
                    <td style="padding-left: 3mm; vertical-align: middle;"> ';
                    if($deudavfp < 0){echo 'Débito ' . $notaver . '';}else{

                        echo'  ' . $tipopagver . '' . str_pad($iditefp, 8, "0", STR_PAD_LEFT) . ''.$notaver.' '.$refor.'';
                  }
                         echo''.$pagprov.'</td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> ';  
                    if($deudavfp < 0){
                        $deuddfp=substr($deudavfp, 1);
                    echo'  $'. number_format($deuddfp, 2, '.', ',').' ';}  
                    echo'</td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">';
                    if($deudavfp > 0){
                      
                    echo'  $'. number_format($deudavfp, 2, '.', ',').' ';}            
                   echo' </td>
                    <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                        <b> $'. number_format($saldohaber, 2, '.', ',').'              </b>
                    </td>';
                    if($tipopages != '33'){
                    echo '  <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
                        <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag(' . $comillas . '' . $rowpaufp['id'] . '' . $comillas .',' . $comillas . '' . $rowpaufp['id_orden'] . '' . $comillas .',' . $comillas . '' . $rowpaufp['id_provepag'] . '' . $comillas .');" tabindex="-1">✕</button>';
                        }else{


                            echo '<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

            <a href="../nota_de_credito/nota_de_credito_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
              <button type="button" class="btn btn-primary btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
            </td>';
                            
                        }
                   echo' </td>


                </tr> '; 
              
        }
    }


}
function iniciomov($rjdhfbpqj,$id_clienteint,$desde_date,$hasta_date){
    $comillas="'";
 
    /* $sqlpagdeufp = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id = '$id_clienteint' and saldoini > 0");
    if ($rowpagdeufp = mysqli_fetch_array($sqlpagdeufp)) {
        $saldoini = $rowpagdeufp["saldoini"];
    
    
    
    } */
    $decudaanterd=calculosaldo($rjdhfbpqj,$id_clienteint,$id_orden);

    $idcan=${"idcan".$iditefp};
    $sqlpeufpd = mysqli_query($rjdhfbpqj, "SELECT * FROM item_orden Where id_cliente = '$id_clienteint' and id_orden='0' and modo='1' and fecha BETWEEN '$desde_date' and '$hasta_date' ORDER BY `item_orden`.`fecha` ASC,`item_orden`.`id` ASC");
    $canv = mysqli_num_rows($sqlpeufpd);
    while ($rowpaufp = mysqli_fetch_array($sqlpeufpd)) {
         $nota = $rowpaufp["nota"];
         $idprov = $rowpaufp["id_provepag"];
        $deudavfp = $rowpaufp["valor"];
        $idcan=$idcan+1;
        $pagoTotal += $rowpaufp["valor"];
    
           $tipopages = $rowpaufp['tipopag'];
        if ($tipopages == '1') {
            $tipopagver = "E";
        }
        if ($tipopages == '2') {
            $tipopagver = "T";
        }
        if ($tipopages == '3') {
            $tipopagver = "D";
        }
        if ($tipopages == '4') {
            $tipopagver = "C";
        }
        if ($tipopages == '5') {
            $tipopagver = "M";
        }
        if ($tipopages == '6') {
            $tipopagver = "Ech";
        }  $refor="";
        if ($tipopages == '33') {
            $tipopagver = "C";
            $iditefp=$rowpaufp['id_notacredito'];


            $sddenx = mysqli_query($rjdhfbpqj, "SELECT * FROM nota_credito Where id='$iditefp'");        
            if ($rowodx = mysqli_fetch_array($sddenx)) {
                $ordedecompra = $rowodx['ordedecompra'];
              
            }
            
            if($ordedecompra > 0){$refor="Ref. Orden de Compra Nº".$rowodx['ordedecompra'];}else{$refor="";}
                

              //  $iditefp=$rowpaufp['id_notacredito'].$refor ;




            $id_ordencod=base64_encode($iditefp);
        }
        $fechaad = $rowpaufp["fecha"];

        if($tipopages == '33'){$nomb="Cred";}else{$nomb="Pag";}

        if($idprov !='0'){
        $pagprov=pagoprovee($rjdhfbpqj,$idprov);
        }else{ $pagprov="";}
        if(!empty($nota)){$notaver=" (".$nota.")";}else{$notaver="";}
       
       if( $idcan=='1'){$saldohaber=$sumapd-$deudavfp;}else{$saldohaber=$saldohaber-$deudavfp;}

       //$saldohaber=$saldoini-$pagoTotal;
       $saldohaber=$decudaanterd-$pagoTotal;
        echo '                      
                            
                             <tr>
                           <td style="text-align: center;vertical-align: middle;">        
         
            </td>  
                <td style="text-align: center;vertical-align: middle;">        
                    '.date('d/m/y', strtotime($fechaad)).' 
                </td>
                     <td style="text-align: center; vertical-align: middle;">        
                    '.$nomb.'
                </td>
                <td style="padding-left: 3mm; vertical-align: middle;"> ';
                if($deudavfp < 0){echo 'Débito ' . $notaver . '';}else{

                    echo'  ' . $tipopagver . '' . str_pad($iditefp, 8, "0", STR_PAD_LEFT) . ''.$notaver.' '.$refor.'';
              }
                     echo''.$pagprov.'</td>
                <td style="padding-right: 3mm; text-align: right; vertical-align: middle;"> ';  
                if($deudavfp < 0){
                    $deuddfp=substr($deudavfp, 1);;
                echo'  $'. number_format($deuddfp, 2, '.', ',').' ';}  
                echo'</td>
                <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">';
                if($deudavfp > 0){
                  
                echo'  $'. number_format($deudavfp, 2, '.', ',').' ';}            
               echo' </td>
                <td style="padding-right: 3mm; text-align: right; vertical-align: middle;">
                    <b> $'. number_format($saldohaber, 2, '.', ',').'              </b>
                </td>';
                if($tipopages != '33'){
                echo '  <td style="padding-right: 3mm; text-align: center; vertical-align: middle;">
                    <button type="button" class="btn btn-danger btn-sm" style="width: 40px;"  ondblclick="ajax_eliminapag(' . $comillas . '' . $rowpaufp['id'] . '' . $comillas .',' . $comillas . '' . $rowpaufp['id_orden'] . '' . $comillas .',' . $comillas . '' . $rowpaufp['id_provepag'] . '' . $comillas .');" tabindex="-1">✕</button>';
                    }else{


                        echo '<td style="padding-right: 3mm; text-align: center; vertical-align: middle;">

        <a href="../nota_de_credito/nota_de_credito_pdf.php?jdhsknc=' . $id_ordencod . '" class="btn btn-dark-rgba" target="_blank" tabindex="-1" title="PDF Nota de Pedido">
          <button type="button" class="btn btn-primary btn-sm" style="width: 40px;" tabindex="-1">⌾</button></a>
        </td>';
                        
                    }
               echo' </td>


            </tr> '; 
          
    }

}
                                    
?>                                 







                           
    
        <br><br><br><br><br>
        <br>
        
        <br><div class="container mt-3 text-center"> 
    
            <a href="debe_haber_pdf.php?jhduskdsa=<?= base64_encode($id_clienteint)?>&desde_date=<?=$desde_date?>&hasta_date=<?=$hasta_date?>" target="_blank" tabindex="-1"> <button type="button" class="btn btn-dark" tabindex="-1">Descargar PDF</button></a> 

    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <a onclick="window.close()"><button  type="button" class="btn btn-danger" tabindex="-1">Salir</button></a>



        </div>
        <br>
            



            </div>
      

    </div>
    <br>
  

 
 
   








    <script>
          
        
        function ajax_eliminapag(iditempag,idorden,id_provepag) {
            var parametros = {
                "iditem": iditempag,
                "idorden": idorden,
                "id_provepag": id_provepag,
                "id_cliente": '<?=$id_clienteint?>'
            };
            $.ajax({
                data: parametros,
                url: '../nota_de_pedido/eliminarpag.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden30").html('');
                },
                success: function(response) {
                    $("#muestroorden30").html(response);
                }
            });
        }


 
    </script>

    
    <script>
        function ajax_agrgpago(valor,tipopag,fechapag,ncheque,vencheque,nota,id_proveedor,tipocuneta) {
            var parametros = {
                "pago_valor": valor,
                "tipopag": tipopag,
                "fechapag": fechapag,
                "ncheque": ncheque,
                "vencheque": vencheque,
                "nota": nota,
                "id_proveedor": id_proveedor,
                "tipocuneta": tipocuneta,
                "id_cliente": '<?=$id_clienteint?>'
            };
            $.ajax({
                data: parametros,
                url: '../cuenta_clientes/inser_pag3.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden29").html('');
                },
                success: function(response) {
                    $("#muestroorden29").html(response);
                }
            });
        }


 
    </script>







<?php
 if($sumapag<0.1){$sumapag=0;}

 
?>

   
<script>
 function showInput() {
    var selectValue = document.getElementById("tipopag").value;
    var ncheque = document.getElementById("ncheque");
    var vencheque = document.getElementById("vencheque");
    var id_proveedor = document.getElementById("id_proveedor");
  
  if (selectValue === "4" || selectValue === "6") {
    ncheque.style.display = 'block';
    vencheque.style.display = 'block';
    id_proveedor.style.display = 'block';
    nota.placeholder = "Banco";
  } else {
    ncheque.style.display = 'none';
    vencheque.style.display = 'none';
    id_proveedor.style.display = 'none';
    nota.placeholder = "Nota";
  }


  if (selectValue === "2") {
    id_proveedor.style.display = 'block';
    tipocuneta.style.display = 'block';
  } else {
    id_proveedor.style.display = 'none';
    tipocuneta.style.display = 'none';
  
} 
 }
       
</script>

 <style>
    /* Estilos del botón flotante */
.btnGoToTop {
    position: fixed;
    bottom: 20px; /* Distancia desde la parte inferior */
    right: 20px; /* Distancia desde la derecha */
    z-index: 99;
}

</style>







</body>

</html>