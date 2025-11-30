<?php include ('../f54du60ig65.php');

$id_producto = $_GET['id_producto'];
$pedido = $_GET['pedido'];
if(!empty($pedido)){$pedidod="(Pedido Nº ".$pedido.")" ; }

$sqdrdenr = mysqli_query($rjdhfbpqj, "SELECT * FROM productos Where id='$id_producto'");
if ($redentc = mysqli_fetch_array($sqdrdenr)) {

    $nomductod = $redentc['nombre']; 
   $codigodepro = $redentc['codigo']; 

   /*   $nomductods=explode("(", $nomductod);

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


}

$sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM etiquetas Where id_producto= '$id_producto'");
if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {

    $elaborado = $rowordentcvr["elaborado"];
    $rnpa = $rowordentcvr["rnpa"];
    $rne = $rowordentcvr["rne"];
    $fraccionado = $rowordentcvr["fraccionado"];
    $lote = $rowordentcvr["lote"];

} 
if($lote==""){
$primeras_dos_letras = substr($nomductod, 0, 2);
    
$lotee=strtoupper($primeras_dos_letras);
$loteq=date("m")+3000+date("y");

$lote=$lotee.$loteq;
}
?>

<head>
    <title>Nota de Etiquetas - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>

<body>
    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;"
        style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Etiquetas Versión 1.0.12</p>   <button type="button" class="btn btn-danger" onclick="window.close();" style="float:right;" >Cerrar</button>
    </div>

  



    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-light" style="font-size: 30pt;">
                    <strong><?= $nomducto ?> <?=$pedidod?></strong>
                </div>
            </div>
        </div><br><br>

        <div class="row">
            <div class="col-6 text-center">
                <a href="../etiquetas/print_etiqueta.php?id_producto=<?= $id_producto ?>&idhg=1&pedido=<?=$pedido?>" target="_blank">
                   
                    <button type="button" class="btn btn-secondary" style="font-weight: bold;  font-size: 60pt;"> 1
                        Kg.</button>
                </a>
            </div>
            <div class="col-6 text-center">
                <a href="../etiquetas/print_etiqueta.php?id_producto=<?= $id_producto ?>&idhg=5&pedido=<?=$pedido?>" target="_blank">
                    <button type="button" class="btn btn-secondary" style="font-weight: bold;  font-size: 60pt;">
                    5
                        Kg.</button>
                </a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-light" style="font-size: 30pt;">
               <form action="../etiquetas/print_etiqueta.php" method="get" target="_blank">
                    <input type="hidden" id="id_producto" name="id_producto" value="<?= $id_producto ?>">
                    <input type="hidden" id="pedido" name="pedido" value="<?=$pedido?>">
                    <input type="text" id="idhg" name="idhg"  value="500" class="btn btn-secondary" style="width: 110px;font-weight: bold;  font-size: 30pt; height: 100px;" onclick="select()">
                        <select name="unidad" id="unidad" class="btn btn-secondary"style="font-weight: bold;  font-size: 30pt;height: 100px" >
                            <option value="Grs.">Grs.</option>
                                <option value="Kg.">Kg.</option>

                        </select> <button type="submit" class="btn btn-secondary" style="font-weight: bold;  font-size: 21pt;height: 100px">Imprimir</button>
                    </form>
                </div>
            </div>
        </div><br><br>
    <div class="row">
            <div class="col-12 text-center">
            <div class="input-group">
    <span class="input-group-text">Elaborado por:</span>
    <input type="text" class="form-control" id="elaborado" value="<?=$elaborado?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">R.N.E.:</span>
    <input type="text" class="form-control" id="rnpa"  value="<?=$rnpa?>">
  </div><br>
  <div class="input-group">
    <span class="input-group-text">R.N.P.A:</span>
    <input type="text" class="form-control" id="rne" value="<?=$rne?>">
  </div><br>
  <div class="input-group">
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
<button type="button" class="btn btn-success" onclick="ayac_datos($('#elaborado').val(),$('#rnpa').val(),$('#rne').val(),$('#fraccionado').val(),$('#lote').val());" >Guardar</button>
            </div>
        </div><br><br>
        <br><br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-light" style="font-size: 30pt;">
                <button type="button" class="btn btn-danger" onclick="window.close();" >Cerrar</button>
                </div>
            </div>
        </div><br><br>


    
    </div>

    <script>function ayac_datos(elaborado,rnpa,rne,fraccionado,lote) {
        var parametros = {
            "elaborado": elaborado,
            "rnpa": rnpa,
            "rne": rne,
            "fraccionado": fraccionado,
            "lote": lote,
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
</body>