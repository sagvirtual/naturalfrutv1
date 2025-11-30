<? include ('f54du60ig65.php');
//include('template/cabezal.php');
include('classestadoscli.php');
$id_clientecod=$_GET['kjkdssdd'];
$id_cliente=base64_decode($id_clientecod);
	
?>
<?php
 
$id_cliente='1';
$sqlocliente = mysqli_query($rjdhfbpqj, "SELECT * FROM clientes Where id='$id_cliente'");
if ($rowclientes = mysqli_fetch_array($sqlocliente)) {

    $id_clienteve=$rowclientes["nom_contac"];
    
    $direccion=$rowclientes['address'];
    $localidad=$rowclientes['localidad'];
    $retiradcv=$rowclientes['retira'];
    $zonaid=$rowclientes['zona'];
}
?>    
    <!DOCTYPE html>
<html lang="es">

<head>
    <title>Nota de Pedidos - Natural Frut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
 <script language="JavaScript1.2" type="text/javascript"> 
        function eliminar (id) 
        { 
            var statusConfirm = confirm("¿Realmente lo desea borrar?"); 
            if (statusConfirm == true) 
            { 
              	window.location.href=id;
            } 
            else 
            { 
              ("Haces otra cosa"); 
            } 
        } 
    </script>                
<div class="container">
<div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Estado de Cuenta Versión 1.0.1</p>
    </div>
        <div class="row">
            <div class="col-2">
               <img src="/assets/images/logopc.png" style="width:38mm;" tabindex="-1">
            </div>

                   

            <div class="col-4">
                <div style="padding-bottom:15px; width: 350px;">
            <b>Cliente</b> 
              <input type="text" class="form-control"  value="<?=$id_clienteve?>"  disabled>
        </div>
        <div style="padding-bottom:15px; width: 350px;">
        <b>Fecha</b>     
        <input type="text" class="form-control" value="<?=$fechahoyventa?>" style="width: 350px;" disabled>
        <input type="hidden" id="fechaordn" value="<?=$fechaordn?>">
        <input type="hidden" id="horaord" value="<?=$horaord?>">
        </div>
     
            </div>
            <div class="col-2" style="width: auto;  position: relative; float: left;"><?=$enalcli?>
              
            </div>

            <div class="col-4">
        
                    <div style="padding-bottom:15px; width: 350px;">
                    <b>Saldo Actual</b>
                    <input type="text" class="form-control" value="$<?=$calculodeuda?>" disabled></div>
                    
            
                <div style="width: 350px;padding-top:15px;">
                    <b>Localidad</b>     
                 <input type="text" class="form-control" tabindex="-1"  value="<?=$localidad?>" disabled>
            </div>
            </div> 
            
            
            <div class="col-2" style="width: auto;  position: relative; float: left;"><a href="../seguimiento/" tabindex="-1">
                <button type="button" class="btn btn-success" style="position: absolute; bottom: 16px; left: 0px;" tabindex="-1">Seguimiento</button></a>
            </div>
<br>
 
        </div>
	

                  <? debehaber($rjdhfbpqj,$id_cliente); ?>

      </div>
</body>

</html>