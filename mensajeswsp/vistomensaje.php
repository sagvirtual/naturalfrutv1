
<br>
        <?php
         $comliia="'";
         $sqlrumen = mysqli_query($rjdhfbpqj, "SELECT * FROM mensajescrm Where visto = '0'");
         while ($rowmen = mysqli_fetch_array($sqlrumen)) {

            $idse=$rowmen['id'];
            $rowmen['usuariovisto'];
            $tiposecto=${"tiposecto".$idse};


            echo'
            <div class="alert alert-danger"><p style="font-size: 18pt;">
 '.$rowmen['mensajes'].'</p><br><p style="font-size: 10pt;">'.$rowmen['hora'].'hs.</p><br><input type="hidden" id="idmensa'.$sectors.'" value="'.$rowmen['id'].'">

</div>

            ';

         }
         
        ?>

              


