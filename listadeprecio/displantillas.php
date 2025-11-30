
     
          <!-- plantilla 17  -->

          <a onclick="ajax_plantilla<?=$idpro?>('17')" style="cursor: pointer;" title="Elegir Plantilla 17">

<?php
 
 include('plantilla17.php');
 
?></a><br> 
          <!-- plantilla 18  -->

          <a onclick="ajax_plantilla<?=$idpro?>('18')" style="cursor: pointer;" title="Elegir Plantilla 18">

<?php
 
 include('plantilla18.php');
 
?></a><br> 
          <!-- plantilla 19  -->

          <a onclick="ajax_plantilla<?=$idpro?>('19')" style="cursor: pointer;" title="Elegir Plantilla 19">

<?php
 
 include('plantilla19.php');
 
?></a><br>

        <!-- plantilla 1  -->
        <a onclick="ajax_plantilla<?=$idpro?>('1')" style="cursor: pointer;" title="Elegir Plantilla 1">
<?php

include('plantilla1.php');

?></a>
<br> 

     <!-- plantilla 13  -->
     <a onclick="ajax_plantilla<?=$idpro?>('13')" style="cursor: pointer;" title="Elegir Plantilla 13">

<?php
 
 include('plantilla13.php');
 
?></a><br>
     
     <!-- plantilla 7  -->
                    <a onclick="ajax_plantilla<?=$idpro?>('7')" style="cursor: pointer;" title="Elegir Plantilla 7">

               <?php
               
               include('plantilla7.php');
               
               ?></a>
               <br>   
             <!-- plantilla 3  -->
            <a onclick="ajax_plantilla<?=$idpro?>('3')" style="cursor: pointer;" title="Elegir Plantilla 3">

            <?php
             
             include('plantilla3.php');
             
            ?></a><br> 

     
            
            <!-- plantilla 2  -->
            <a onclick="ajax_plantilla<?=$idpro?>('2')" style="cursor: pointer;" title="Elegir Plantilla 2">

            <?php
             
             include('plantilla2.php');
             
            ?></a>
            <br>
   
 
     <!-- plantilla 8  -->
   <!--   <a onclick="ajax_plantilla<?=$idpro?>('8')" style="cursor: pointer;" title="Elegir Plantilla 8">
 -->
<?php
 
 //include('plantilla8.php');
 
?><!-- </a><br> -->
              
                   <!-- plantilla 9 con fondo adentro -->
          

     <!-- plantilla 11  -->
     <a onclick="ajax_plantilla<?=$idpro?>('11')" style="cursor: pointer;" title="Elegir Plantilla 11">

<?php
 
 include('plantilla11.php');
 
?></a><br>

     <!-- plantilla 12  -->
     <a onclick="ajax_plantilla<?=$idpro?>('12')" style="cursor: pointer;" title="Elegir Plantilla 12">

<?php
 
 include('plantilla12.php');
 
?></a> <br>


<!-- plantilla 20  -->
   
   
   <a onclick="ajax_plantilla<?=$idpro?>('20')" style="cursor: pointer;" title="Elegir Plantilla 20">
 
<?php

include('plantilla20lista.php');
 
?></a><br>

                <script>
                
                function ajax_plantilla<?=$idpro?>(id_plantilla) {

                    modalp<?=$idpro?>.style.display = "none";

                var parametros = {
                    "id_plantilla": id_plantilla,
                    "tipolist": '0',
                    "id_producto": '<?=$idpro?>',
                    "str": '<?=$str?>',
                    "fechalista": '<?=$fechalista?>',

                };
                $.ajax({
                    data: parametros,
                    url: 'plantilla.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#resultadoplantilla<?=$idpro?>").html('Cargando Plantilla</h4></div>');
                    },
                    success: function(response) {
                        $("#resultadoplantilla<?=$idpro?>").html(response);
                    }
                });
                return;
            }


          </script>
<!-- carga de foto producto -->
<script>
        $('#myfile<?=$idpro?>').change(function() {
            // submit the form
            $('#form<?=$idpro?>').submit();
        });

        $(document).ready(function(e) {
            $("#form<?=$idpro?>").on('submit', function(e) {



                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'cargar_fotopro.php?idlis=<?= $idcodrt ?>&idproduc=<?=$idpro?>&pagina=<?=$pagina?>&busqueda=<?=$busquedads?>',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) {
                        $('.statusMsg').html('');

                        $('#form<?=$idpro?>').css("opacity", "");
                        $(".submitBtn").removeAttr("disabled");
                        $("#muestroaca<?=$idpro?>").html(msg);
                    }
                });
            });


        });
    </script>

