<?php
 
if($sectors =='21'){$textmen="Envasado PB"; $colornen="success";}
if($sectors =='22'){$textmen="Envasado PA"; $colornen="danger";}
if($sectors =='29'){$textmen="Deposito PA"; $colornen="info";}


 
?>  


        
        <div class="container">
<br>
        <?php
         $comliia="'";
         $sqlrumen = mysqli_query($rjdhfbpqj, "SELECT * FROM mensajes Where visto = '0' and sector='$sectors'");
         while ($rowmen = mysqli_fetch_array($sqlrumen)) {

            $idse=$rowmen['id'];
            $rowmen['usuariovisto'];
            $tiposecto=${"tiposecto".$idse};

            if($rowmen['usuario']=="0"){$tiposecto="General";}
            if($rowmen['usuario']=="30"){$tiposecto="Preparación&nbsp;de&nbsp;Pedidos";}
            if($rowmen['usuario']=="31"){$tiposecto="Recepción&nbsp;de&nbsp;Pedidos";}

            echo'
            <div class="alert alert-danger">Mensaje del sector: "'.$tiposecto.'"<br>
  <strong style="font-size: 24pt;">'.$rowmen['mensajes'].'</strong><br><p style="font-size: 10pt;">'.$rowmen['hora'].'hs.</p><br><input type="hidden" id="idmensa'.$sectors.'" value="'.$rowmen['id'].'">

<input type="button" name="submit" class="btn btn-'.$colornen.'" onclick="ajax_mensvis('.$comliia.''.$rowmen['id'].''.$comliia.')"
    value="Confirmo que vi el Mensaje" />  
</div>

            ';

         }
         
        ?>

              


            </div>
