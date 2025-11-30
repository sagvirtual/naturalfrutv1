
<?  if($tipo_usuario=="21"){$tit="10000000000000000";
    
    $sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where preparado= '1' and tipo_cliente='21'");
    if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {
        
      
    ?>


    
<div class="container mt-3" > <div class="alert alert-success" style="padding: 0; padding-left: 10;">
  <strong>En Preparación</strong>
</div>
<div id="accordion">
    <?php

  $comilla="'";

    $sqlordenxgv = mysqli_query($rjdhfbpqj, "SELECT * FROM ordeneva  Where preparado= '1'  ORDER BY `id` DESC");
    while ($rowordentcv = mysqli_fetch_array($sqlordenxgv)) {

        $usuarioprpd=${"usuarioprpd".$rowordentcv['id']};
        $usuarioprpd=$rowordentcv['usuario'];
        $idorhisc = $rowordentcv['id'];
        $numero = $rowordentcv['numero'];
        $prioridadp= ${"prioridadp".$rowordentcv['id']};
        $prioverep= ${"prioverep".$rowordentcv['id']};
        $prioridadp = $rowordentcv['prioridad'];

        if($prioridadp=="1"){$prioverep='<strong title="PRIORIDAD">🕓 </strong>';}
        if($prioridadp=="2"){$prioverep='<div style="background-color: grey; width:100%; padding-left:10px; color:white;"><strong>
            '.$gifalae.'CAMINONETA EN LA PUERTA!!</strong></div>';}
        if($prioridadp=="3"){$prioverep='<div style="background-color: grey; width:100%; padding-left:10px; color:white;">
            '.$gifalae.'<strong>CLIENTE EN LA PUERTA!!</strong></div>';}

        echo' <div class="card">'.$prioverep.'
        <div class="card-header" '.$colorfrv.'>
       
          Hs.'.$rowordentcv['hora'].' | <strong>Pedido Nº '.$numero.'  | </strong><strong style="color:red;">'.$usuarioprpd.'</strong>

          <a  onclick="ajax_seguimientope'.$idorhisc.'();" style="float:right; color:green; cursor: pointer;">✔︎</a>
       ';

    echo'</div>
    <div>
    <script>
    function ajax_seguimientope'.$idorhisc.'() {
        var confirmacion = confirm("¿'.$usuarioprpd.' completaste el Pedido Nº '.$numero.' ?");
        if (confirmacion) {
        var parametros = {
            "preparado": "9",
            "iditem": '.$idorhisc.'
        };
        $.ajax({
            data: parametros,
            url: '. $comilla.'seguimiento.php'. $comilla.',
            type: '. $comilla.'POST'. $comilla.',
            beforeSend: function() {
                $("#muestroorden34'.$idorhisc.'").html('. $comilla.''. $comilla.');
            },
            success: function(response) {
                $("#muestroorden34'.$idorhisc.'").html(response);
            }
        });
    }
}
</script>  <div id="muestroorden34'.$idorhisc.'"> </div>
        ';


      


    ?>
    
           
       
           
        </div>
        </div> <table class="table table-bordered table-sm" style="position: relative; top:-25px">
            
            <tbody>

                <?php
                $comillas="'";
                $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT * FROM itemenvas Where id_orden = '$idorhisc'");
                while ($rowordentc = mysqli_fetch_array($sqlordenr)) {

                    $listo=${"listo".$rowordentc['listo']};
                    $listo=$rowordentc['listo'];

                    if($listo=="1"){

                        echo '  <style>
                        #itemped' . $rowordentc['id'] . ' {
                            text-decoration: line-through;
                            cursor: pointer;
                            color: inherit;
                            user-select: none; 
                            color : red;
    
                        }
                        </style>';

                    }else{
                    echo '

                    
                    <style>
                    #itemped' . $rowordentc['id'] . ' {
                        text-decoration: none;
                        cursor: pointer;
                        color: inherit;
                        user-select: none; 

                    }
                    </style>';
                }
                echo'
                <tr  >
                <td id="itemped' . $rowordentc['id'] . '" onclick="ajax_tachar'.$rowordentc['id'].'($('.$comillas.'#listo' . $rowordentc['id'] . ''.$comillas.').val());" style="vertical-align: middle;padding-left: 2mm;"><strong>' . $rowordentc['producto'] . '</strong></td>
                <form name="frmMain' . $rowordentc['id'] . '">
                <input id="listo' . $rowordentc['id'] . '" name="listo' . $rowordentc['id'] . '" type="hidden" value="1">
                </form>
                <td onclick="ajax_tachar'.$rowordentc['id'].'($('.$comillas.'#listo' . $rowordentc['id'] . ''.$comillas.').val());" class="text-center" style="vertical-align: middle;place-items: center; width: 20mm;"><strong>' . $rowordentc['cantidad'] . ' ' . $rowordentc['unidad'] . '</strong></td>
                <td class="text-center" style="vertical-align: middle;place-items: center; width: 20mm;">
                <a href="../etiquetas/index.php?id_producto=' . $rowordentc['id_producto'] . '&pedido='.$numero.'" target="_blank" onclick="">
                <button type="button" class="btn btn-outline-dark">Etiquetas</button>
                </a>
                </td>
                
                 </tr>
                
                
                
                 <script>
                 var itemped' . $rowordentc['id'] . ' = document.getElementById("itemped' . $rowordentc['id'] . '");
                 var subrayadoActivo' . $rowordentc['id'] . ' = false;
               
                 itemped' . $rowordentc['id'] . '.addEventListener("click", function() {
                   if (subrayadoActivo' . $rowordentc['id'] . ') {
                     itemped' . $rowordentc['id'] . '.style.textDecoration = "none";
                     itemped' . $rowordentc['id'] . '.style.backgroundColor = "transparent";
                     itemped' . $rowordentc['id'] . '.style.color = "black"; 
                     subrayadoActivo' . $rowordentc['id'] . ' = false;
                     document.frmMain' . $rowordentc['id'] . '.listo' . $rowordentc['id'] . '.value = '.$comillas.'1'.$comillas.';
                   } else {
                     itemped' . $rowordentc['id'] . '.style.textDecoration = "line-through";
                     itemped' . $rowordentc['id'] . '.style.backgroundColor = "#ccc";
                     itemped' . $rowordentc['id'] . '.style.color = "red"
                     subrayadoActivo' . $rowordentc['id'] . ' = true;
                     document.frmMain' . $rowordentc['id'] . '.listo' . $rowordentc['id'] . '.value = '.$comillas.'0'.$comillas.';
                   }
                 });
               </script>
               
               <script>
               function ajax_tachar'.$rowordentc['id'].'(listo'.$rowordentc['id'].') {
                   var parametros = {
                       "listo": listo'.$rowordentc['id'].',
                       "iditem": '.$rowordentc['id'].'
                   };
                   $.ajax({
                       data: parametros,
                       url: '. $comillas.'tachar.php'. $comillas.',
                       type: '. $comillas.'POST'. $comillas.',
                       beforeSend: function() {
                           $("#muestroorden3t'.$rowordentc['id'].'").html('. $comillas.''. $comillas.');
                       },
                       success: function(response) {
                           $("#muestroorden3t'.$rowordentc['id'].'").html(response);
                       }
                   });
               }
           </script>
                
                
                
                
           <div id="muestroorden3t'.$rowordentc['id'].'"></div>
                
                 ';
                }

                ?>

                <br>
            </tbody>
        </table>
    <?php

    }

    ?>
</div>

</div>



<?  }}else{$tit="800";}?>

 

