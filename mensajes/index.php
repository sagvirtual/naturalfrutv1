<style>
  .chat-container {
    display: flex;
    align-items: flex-end;
    width: 100%;
    max-width: 600px;
    margin: auto;
  }
  
  .chat-input {
    display: flex;
    align-items: center;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 20px;
    padding: 5px;
  }
  
  .chat-input textarea {
    flex: 1;
    border: none;
    outline: none;
    resize: none;
    padding: 10px;
    border-radius: 20px;
    font-size: 16px;
    overflow: hidden;
  }
  
  .chat-input textarea:focus {
    border: none;
    outline: none;
  }
  
  .chat-input button {
    background: none;
    border: none;
    padding: 0 10px;
    cursor: pointer;
  }
  
  .chat-input button img {
    width: 24px;
    height: 24px;
  }
  .chat-message {
    margin: 10px 0;
    padding: 10px 15px;
    border-radius: 50%;
    max-width: 70%;
    position: relative;
}


</style><?php
 
 
if($sectors =='21'){$textmen="Enviar mensaje a Envasado PB";}
if($sectors =='22'){$textmen="Enviar mensaje a Envasado PA";}
if($sectors =='29'){$textmen="Enviar mensaje a Deposito PA";}
 
?>        
     <div class="chat-container">
        <div class="col-lg-12">
<br>
<?php

// Realiza la consulta SQL para obtener los últimos 3 mensajes y ordenarlos en orden ascendente
$sqlrumen = mysqli_query($rjdhfbpqj, "
    SELECT * FROM (
        SELECT * FROM mensajes 
        WHERE visto = '0' AND sector='$sectors'
        ORDER BY id DESC
        LIMIT 3
    ) AS last_three_messages
    ORDER BY id ASC
");

// Recorre los resultados y muestra los mensajes
while ($rowmen = mysqli_fetch_array($sqlrumen)) {
 $menfecha= $rowmen['fecha'];
 $menhora= $rowmen['hora']."hs.";

 if($menfecha==$fechahoy){$menhora= $rowmen['hora'];}else{
  $menhora= date('d/m/Y', strtotime($menfecha));
}

    switch ($rowmen['origen']) {
        case "21":
        case "22":
        case "29":
          $colornen = "#F0F0F0";
          $floatd = "left";
            break;
        default:
        $colornen = "#B4FB79";
        $floatd = "right";
            break;
    }

    echo '
    <div style="border-radius: 50px; background-color: '.$colornen.'; padding: 0px 20px; text-align: '.$floatd.';">
        '.$rowmen['usuario'].': 
        <strong>'.$rowmen['mensajes'].'</strong><br>
        <p style="font-size: 10pt;">'.$menhora.' ✓</p>
    </div>
    ';
}
?>



<div id="muestromenPe">    
<div id="muestromenPA">
<div id="muestromenPB"> 
            
  <div class="chat-input">
        <input type="hidden" id="tipo_cliente<?=$sectors?>" value="<?=$sectors?>">
    <textarea id="mensajes<?=$sectors?>" rows="1" oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'" placeholder="<?=$textmen?>" autocomplete="off"></textarea>
    <button  onclick="ajax_mensaje($('#mensajes<?=$sectors?>').val(),$('#tipo_cliente<?=$sectors?>').val())">
      <img src="../mensajes/enviar.png" alt="Send">
    </button>
  </div>
</div>
      </div>
      </div> </div></div> 