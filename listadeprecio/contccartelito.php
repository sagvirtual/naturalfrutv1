
<style>
  .container {
    display: flex;
    flex-wrap: wrap;
  }

  .contenido {
    flex: 1 1 10%; /* Ocupa el 25% del contenedor (para hasta cuatro elementos por fila) */
    margin: 5px; /* Espacio entre elementos */
    box-sizing: border-box; /* Incluir el margen en el tamaño del elemento */
    background-color: #f0f0f0; /* Color de fondo para visualización */
    padding: 10px; /* Añadir un poco de espacio interior para que se vean mejor */
  }
</style>
<?php
 if( $id_plantilla=='13'|| $id_plantilla=='11' || $id_plantilla=='1' || $id_plantilla=='3' || $id_plantilla=='12'  || $id_plantilla=='17' || $id_plantilla=='18' || $id_plantilla=='19'){
echo'
<table style="width: 100%; ">
    <tr style="text-align:center; background-color: #F9F7A6;height: 40px; ">
        <td><p>Cartelitos para <b>'.$nombreproduc.'</b></p></td>
    </tr></table>';
    echo'
    <table style="width: 100%; ">
    <tr>
        <td>
        <div class="container">
        <table>';
      
         
         $sqlbannert=mysqli_query($rjdhfbpqj,"SELECT * FROM carteltext ORDER BY `carteltext`.`id` ASC");
         while ($rowbannert = mysqli_fetch_array($sqlbannert)){
            $idcodet=base64_encode($rowbannert['id']);

            echo '
            <tr>
           
            <td>
            
            <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel='.$rowbannert['id'].'&id_color=1&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Cartelito '.$rowbannert['textcar'].'" style="text-decoration: none;">
            <div style="font-size:12pt; font-family: cambria;color:white; width: 170px; height: 40px; background-color: '.$rowbannert['color1'].'; display: flex; justify-content: center; align-items: center;">
            '.$rowbannert['textcar'].'
            </div>
            </a>
            </td>
            <td>
            <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel='.$rowbannert['id'].'&id_color=2&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Cartelito '.$rowbannert['textcar'].'" style="text-decoration: none;">
            <div style="font-size:12pt; font-family: cambria;color:white; width: 170px; height: 40px; background-color: '.$rowbannert['color2'].'; display: flex; justify-content: center; align-items: center;">
            '.$rowbannert['textcar'].'
            </div> </a>
            </td>
            <td>
            <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel='.$rowbannert['id'].'&id_color=3&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Cartelito '.$rowbannert['textcar'].'" style="text-decoration: none;">
            <div style="font-size:12pt; font-family: cambria;color:white; width: 170px; height: 40px; background-color: '.$rowbannert['color3'].'; display: flex; justify-content: center; align-items: center;">
            '.$rowbannert['textcar'].'
            </div> </a>
            </td>
            <td>
            <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel='.$rowbannert['id'].'&id_color=4&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Cartelito '.$rowbannert['textcar'].'" style="text-decoration: none;">
            <div style="font-size:12pt; font-family: cambria;color:white; width: 170px; height: 40px; background-color: '.$rowbannert['color4'].'; display: flex; justify-content: center; align-items: center;">
            '.$rowbannert['textcar'].'
            </div> </a>
            </td>
            <td>
            <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel='.$rowbannert['id'].'&id_color=5&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Cartelito '.$rowbannert['textcar'].'" style="text-decoration: none;">
            <div style="font-size:12pt; font-family: cambria;color:white; width: 170px; height: 40px; background-color: '.$rowbannert['color5'].'; display: flex; justify-content: center; align-items: center;">
            '.$rowbannert['textcar'].'
            </div> </a>
            </td>
    

    
            </td>
           
            </tr>';}
         
         
      echo'  
     </table>
     <a href="insert_carttext?jfndhom='.$idcodrt.'&id_cartel=0&id_color=0&fecha=' . $fechalista . '&id_producto='.$idpro.'&tipolista=0&pagina='.$pagina.'&busqueda='.$busqueda.'"  title="Elegir Sin Cartelito" style="text-decoration: none;">
     <div style="font-size:12pt; font-family: cambria;color:black; width: 170px; height: 40px; background-color: red; display: flex; justify-content: center; align-items: center;">
     Sin Cartelito
     </div>
     </a>
   </div>
    </td>
    </tr>
    </table>';
         }


    /* carteles fotos */
    echo'<table style="width: 100%; ">
    <tr>
        <td>
        <div class="container">';


                          $comillsass="'";
                         
                         $sqlbanner=mysqli_query($rjdhfbpqj,"SELECT * FROM cartelitos ORDER BY `cartelitos`.`position` ASC");
                         while ($rowbanner = mysqli_fetch_array($sqlbanner)){
                            $idcod=base64_encode($rowbanner['id']);

                            $idcsrt=$rowbanner['id'];

                            $sqlcarte=${"sqlcarte".$idpro};
                            $rowecarte=${"rowecarte".$idpro};


                           


                            echo '
                            <div class="contenido"> 
                            <img src="../cartelitos/'.$rowbanner['id'].'" style="width: 170px; height:auto;"> 
                            
                            <input type="checkbox" id="poner'.$idpro.''.$rowbanner['id'].'" name="poner'.$idpro.''.$rowbanner['id'].'" value="1" 
                            
                            onclick="ajax_pcartel'.$idpro.''.$rowbanner['id'].'($('.$comillsass.'input:checkbox[name=poner'.$idpro.''.$rowbanner['id'].']:checked'.$comillsass.').val());" ';
                            
                            $sqlcarte=mysqli_query($rjdhfbpqj,"SELECT * FROM editliscartel Where fecha = '$fechalista' and tipolista = '0'  and id_cartel = '$idcsrt' and id_producto='$idpro'");
                            if ($rowecarte = mysqli_fetch_array($sqlcarte)){
                              echo 'checked';
                            }echo'>
                            
                           
                            
                            
                            </div>
                            <script>
                        
                        function ajax_pcartel'.$idpro.''.$rowbanner['id'].'(poner){
                        var parametros = {
                        "poner":poner,
                        "position":'.$comillsass.''.$rowbanner['position'].''.$comillsass.',
                        "id_cartel":'.$comillsass.''.$rowbanner['id'].''.$comillsass.',
                        "fecha":'.$comillsass.''.$fechalista.''.$comillsass.',
                        "id_producto":'.$comillsass.''.$idpro.''.$comillsass.',
                        "idlis":'.$comillsass.''.$idcodrt.''.$comillsass.',
                        "tipolista":'.$comillsass.'0'.$comillsass.'
                        };
                        $.ajax({
                                 data: parametros,
                                 url: '.$comillsass.'insert_cartel.php'.$comillsass.',
                                 type: '.$comillsass.'POST'.$comillsass.',
                                 beforeSend: function(){
                                          $("#muestrocartel'.$idpro.''.$rowbanner['id'].'").html('.$comillsass.''.$comillsass.');
                                 },
                                 success: function(response){
                                          $("#muestrocartel'.$idpro.''.$rowbanner['id'].'").html(response);
                                 }
                              });
                        }
                        
                            </script> <div  id="muestrocartel'.$idpro.''.$rowbanner['id'].'"></div>';
                           


                         }
                         echo'</div>
                         </td>
                             </tr>
                         ';
                         $pagina=$_SESSION['pagina'];
                         $busquedads=$_SESSION['busquedads'];
                        ?>
</table>
<table  style="width:100%; background-color: #f0f0f0; text-align:center;">
<tr style="text-align:center; "> 
        <td style="text-align:center;">
        <a href="listaedit?jfndhom=<?=$idcodrt?>&pagina=<?=$pagina?>&busqueda=<?=$busquedads?>">
        <button type="button" style="display: inline-block;" onclick="close<?=$idpro?>">Cerrar</button></a>
                                </td>
    </tr>
<tr>
    
    
    </tr></table>

