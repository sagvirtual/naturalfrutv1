<?php
 
if($sectors =='21'){$textmen="Envasado PB"; $colornen="success";}
if($sectors =='22'){$textmen="Envasado PA"; $colornen="danger";}
if($sectors =='29'){$textmen="Deposito PA"; $colornen="info";}
 
?>        
        
        <div class="col-lg-12">
<br>
        <?php
         
         $sqlrumen = mysqli_query($rjdhfbpqj, "SELECT * FROM mensajes Where visto = '0' and sector='$sectors'");
         while ($rowmen = mysqli_fetch_array($sqlrumen)) {
                if($rowmen['usuario']=="0"){$tiposecto="General";}
                if($rowmen['usuario']=="30"){$tiposecto="Preparación&nbsp;de&nbsp;Pedidos";}
                if($rowmen['usuario']=="31"){$tiposecto="Recepción&nbsp;de&nbsp;Pedidos";}

            echo'
            <div class="alert alert-danger">Mensaje del sector: "'.$tiposecto.'"<br>
  <strong>'.$rowmen['mensajes'].'</strong><br><p style="font-size: 10pt;">'.$rowmen['hora'].'hs.</p>
  
</div>
            
            ';

         }
         
        ?>

                    <label for="inputEmail4">Mensaje para <?=$textmen?></label>
                    <textarea class="form-control" id="mensajes<?=$sectors?>"></textarea>
              
<input type="hidden" id="tipo_cliente<?=$sectors?>" value="<?=$sectors?>">
               

                <br>
                <input type="button" name="submit" class="btn btn-<?=$colornen?>" onclick="ajax_mensaje($('#mensajes<?=$sectors?>').val(),$('#tipo_cliente<?=$sectors?>').val())"
                    value="Enviar mensajes" />

            </div>
