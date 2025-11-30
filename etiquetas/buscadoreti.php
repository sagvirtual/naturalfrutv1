<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');
include('lusuarios/login.php');



$id_orden = $_SESSION['id_orden'];
$numero = $_GET['numero'];
$pan = $_GET['pan'];
/* agregar */
 $productods=$_GET['producto'];

 $productod=explode("@",$productods);
 $producto = preg_replace('/\s+/', ' ', $productod[0]);

 $unidsx = $productod[1];
 $id_producto = $productod[2];

 $activainp=$_GET['focf'];
 if($activainp!='1'){$verinpur="display:none;";}
/* fin */

if ($unidsx == "Kg.") {
    $seleuna = "selected";
}
if ($unidsx == "Uni.") {
    $seleunb = "selected";
}



?>


    
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Impresion de Etiquetas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
   
</head>

<body>





    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Etiquetas Versión 1.0.1 </p>
    </div>

    <div class="container mt-3">

        <div class="row">
            <div class="col-6">
             <img src="/assets/images/logopc.png" style="width:38mm;">
            </div>         <div class="col-6">
           
                <button type="button" class="btn btn-danger" onclick="window.close();" style="float:right;" >Cerrar</button>
              
          
            </div>


           

            </div>
        </div>


        <!-- <form> -->
            <div class="container">
            <div class="row">
     
                <div class="col-lg12" style="padding-top: 10px;">

<?php
 
include('../buscadoprodu/inpubuscadosto.php');
 
?>


                    <div class="list-group" id="muestrobus" tabindex="0"></div>
                </div>

                <div class="col-lg-1 " style="padding-top: 10px;display:none;">
                    <select name="unidad" id="unidad" class="form-select">
                        <option value="Kg." <?= $seleuna ?>>Kg.</option>
                        <option value="Unid." <?= $seleunb ?>>Unid.</option>
                    </select>
                </div>


                <div class="col-lg-1" style="padding-top: 10px;display:none;">
                    <input type="number" name="cantidad" id="cantidad">
                </div>


               

                <div class="col-lg-1" style="padding-top: 10px; display:none;">
                    <button type="button" id="suminstr" >Agregar</button>
                    <input type="number" name="numero" id="numero" value="<?= $numero ?>">
                </div>
            </div>
        <!-- </form> -->

    </div>
    </div>

    <!-- etiquetas /mix_productos/preparado_mix?jfndhom=MTEzOA&esmix=1 -->

    <?php 
$idpprjf=base64_encode($id_producto);
if(!empty($id_producto)){
$sqdrdenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'"); //and ubicacion!='1'
if ($redentc = mysqli_fetch_array($sqdrdenr)) {

    $nomductod = $redentc['nombre']; 
    $codigodepro = $redentc['codigo']; 
    $esmix = $redentc['mix']; 
    if($esmix=='1'){

        $bonmir='&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a href="../mix_productos/preparado_mix?jfndhom='.$idpprjf.'&esmix=1" target="_parent">
        <button type="submit" class="btn btn-dark" style="font-weight: bold;  font-size: 12pt;height: 50px">Stockear</button> </a>';
       

    }else{

        $bonmir='&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a href="../mix_productos/preparado_mix?jfndhom='.$idpprjf.'&esmix=0" target="_parent">
        <button type="submit" class="btn btn-dark" style="font-weight: bold;  font-size: 12pt;height: 50px">Stockear</button> </a>';

    }

   /*  $nomductods=explode("(", $nomductod);

    $nomducto=$nomductods[0]; */
    $elementoa = "(Frutas Glaseadas / Deshidroazucaradas)";
    $elementob = "(Sin marca)";
    $elementoc = "(Especias y Condimentos)";    
    $elementod = "(Fruta Desecada)";
    $elementoe = "(Fruta Seca)";
    $elementof = "(Cultivo Avena)";
  
    
    
    
    $nomductoa = str_replace($elementoa, '', $nomductod );
    $nomductob = str_replace($elementob, '', $nomductoa );
    
    $nomductoc = str_replace($elementoc, '', $nomductob );
    $nomductod = str_replace($elementod, '', $nomductoc );
    $nomductof = str_replace($elementoe, '', $nomductod );
    
    $nomducto = str_replace($elementof, '', $nomductof);

    

    


$sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM etiquetas Where id_producto= '$id_producto'");
if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {

    $elaborado = $rowordentcvr["elaborado"];
    $importado = $rowordentcvr["importado"];
    $origen = $rowordentcvr["origen"];
    $direccion = $rowordentcvr["direccion"];
    $rnpa = $rowordentcvr["rnpa"];
    $rne = $rowordentcvr["rne"];
    $fraccionado = $rowordentcvr["fraccionado"];
    $lote = $rowordentcvr["lote"];

} else{$larta='<div class="alert alert-danger text-center">
  <strong>Acualizar datos!</strong>
</div>';}

if($lote==""){
$primeras_dos_letras = substr($nomductod, 0, 2);
    
$lotee=strtoupper($primeras_dos_letras);
$loteq=date("m")+3000+date("y");

$lote=$lotee.$loteq;
}
?>
<br><br>

    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-light" style="font-size: 30pt;">
                    <strong><?= $nomducto ?></strong> <?=$bonmir?>
                </div>
            </div>
        </div><br><br>

        <div class="row">
            <div class="col-6 text-center">
                <a href="../etiquetas/print_etiqueta.php?id_producto=<?= $id_producto ?>&idhg=1" target="_blank">
                   
                    <button type="button" class="btn btn-secondary" style="font-weight: bold;  font-size: 60pt;"> 1&nbsp;Kg.</button>
                </a>
            </div>
            <div class="col-6 text-center">
                <a href="../etiquetas/print_etiqueta.php?id_producto=<?= $id_producto ?>&idhg=5" target="_blank">
                    <button type="button" class="btn btn-secondary" style="font-weight: bold;  font-size: 60pt;">5&nbsp;Kg.</button>
                </a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-light" style="font-size: 30pt;">
               <form action="../etiquetas/print_etiqueta.php" method="get" target="_blank">
                    <input type="hidden" id="id_producto" name="id_producto" value="<?= $id_producto ?>">
                    <input type="text" id="idhg" name="idhg"  value="500" class="btn btn-secondary" style="width: 110px;font-weight: bold;  font-size: 30pt; height: 100px;" onclick="select()">
                        <select name="unidad" id="unidad" class="btn btn-secondary"style="font-weight: bold;  font-size: 30pt;height: 100px" >
                            <option value="Grs.">Grs.</option>
                                <option value="Kg.">Kg.</option>

                        </select> <button type="submit" class="btn btn-secondary" style="font-weight: bold;  font-size: 21pt;height: 100px">Imprimir</button>
                    </form>
                </div>
            </div>
        </div><br><br>
        <?=$larta?>
    <div class="row">
            <div class="col-12 text-center">
            <div class="input-group">
    <span class="input-group-text">Elaborado por:</span>
    <input type="text" class="form-control" id="elaborado" value="<?=$elaborado?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">Origen:</span>
    <input type="text" class="form-control" id="origen" value="<?=$origen?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">Importado:</span>
    <input type="text" class="form-control" id="importado" value="<?=$importado?>">
  </div><br>
   <div class="input-group">
    <span class="input-group-text">Direccíon:</span>
    <input type="text" class="form-control" id="direccion" value="<?=$direccion?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">R.N.E.:</span>
    <input type="text" class="form-control" id="rnpa"  value="<?=$rnpa?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">R.N.P.A:</span>
    <input type="text" class="form-control" id="rne" value="<?=$rne?>">
  </div><br>  <div class="input-group">
    <span class="input-group-text">Lote:</span>
    <input type="text" class="form-control" id="lote" value="<?=$lote?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">FRACCIONADO POR:</span>

    <select name="fraccionado" id="fraccionado" class="form-control">

    <option value="<?=$fraccionado?>"><?=$fraccionado?></option>
<option value=""></option>
<option value="Sebastian Genebrier">Sebastian Genebrier</option>

    </select>

  </div><br>
  

<div id="muestroprpa"></div>
            <button type="button" class="btn btn-success" onclick="ayac_datos($('#elaborado').val(),$('#rnpa').val(),$('#rne').val(),$('#fraccionado').val(),$('#lote').val(),$('#origen').val(),$('#importado').val(),$('#direccion').val());" >Guardar</button>
            </div>
        </div><br><br>
        <br><br><br><br><br><br><br><br>
      
             


    
    </div>


<script>function ayac_datos(elaborado,rnpa,rne,fraccionado,lote,origen,importado,direccion) {
        var parametros = {
            "elaborado": elaborado,
            "rnpa": rnpa,
            "rne": rne,
            "fraccionado": fraccionado,
            "lote": lote,
            "origen": origen,
            "importado": importado,
            "direccion": direccion,
            "id_producto": <?=$id_producto?>
        };
        $.ajax({
            data: parametros,
            url: 'insertdatoeti.php',
            type: 'POST',
            beforeSend: function () {
                $("#muestroprpa").html('');
            },
            success: function (response) {
                $("#muestroprpa").html(response);
            }
        });
    }</script>
<? } }?>
<!-- fin -->
</body>

</html>