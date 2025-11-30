        <script>
            document.getElementById('fechaactual<?= $idfila ?>').innerHTML = '<b <?= $sticolr ?>><?= $fecheok ?></b>';
        
            var costo_totalr = <?= $mpa ?>;
            var costo_totalvie = <?= $preciomayorvie ?>;

            var costoxcajar = <?= $epa ?>;
            var costoxcajavie = <?= $precioespevie ?>;

                /* variacion po unidad */
            var variaka = eval(costo_totalr) - eval(costo_totalvie);
            var variaporav = 100 * eval(costo_totalr) / eval(costo_totalvie);
            var varkpora = eval(variaporav) - 100;

            document.getElementById('variaka<?= $idfila ?>').innerHTML = variaka.toFixed(0);
            document.getElementById('varkpora<?= $idfila ?>').innerHTML = varkpora.toFixed(0);
            if (variaka > 0) {
                document.getElementById('flechaa<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('flechaa<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-down"></i>';
            }
            /* fin  */


            /* variacion bulto */
            var variakb = eval(costoxcajar) - eval(costoxcajavie);
            var variaporbv = 100 * eval(costoxcajar) / eval(costoxcajavie);
            var varkporb = eval(variaporbv) - 100;

            document.getElementById('variakb<?= $idfila ?>').innerHTML = variakb.toFixed(0);
            document.getElementById('varkporb<?= $idfila ?>').innerHTML = varkporb.toFixed(0);
            if (variakb > 0) {
                document.getElementById('flechab<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-up"></i>';
            } else {
                document.getElementById('flechab<?= $idfila ?>').innerHTML = '<i class="feather icon-arrow-down"></i>';
            }
            
        </script>

    <?
        


        echo '<script> window.onload =realizaProcesos' . $idfila . ';


        
            function realizaProcesos' . $idfila . '(jfndhom' . $idfila . ', costoxcaj' . $idfila . ', costo' . $idfila . ', modobus, buscar, nref' . $idfila . ', fecven' . $idfila . ', agrstock' . $idfila . ', descuento' . $idfila . ',iibb_bsas' . $idfila . ', iibb_caba' . $idfila . ', perc_iva' . $idfila . ', iva' . $idfila . ', desadi' . $idfila . ',costo_final' . $idfila . ', mka' . $idfila . ', mga' . $idfila . ', mpa' . $idfila . ', 
            mkb' . $idfila . ', 
            mub' . $idfila . ', 
            mgb' . $idfila . ', 
            mpb' . $idfila . ', 
            mkc' . $idfila . ', 
            muc' . $idfila . ', 
            mgc' . $idfila . ', 
            mpc' . $idfila . ', 
            mkd' . $idfila . ', 
            mud' . $idfila . ', 
            mgd' . $idfila . ', 
            mpd' . $idfila . ', 
            mke' . $idfila . ', 
            mue' . $idfila . ', 
            mge' . $idfila . ', 
            mpe' . $idfila . ', 
            eka' . $idfila . ', 
            ega' . $idfila . ', 
            epa' . $idfila . ', 
            ekb' . $idfila . ', 
            eub' . $idfila . ', 
            egb' . $idfila . ', 
            epb' . $idfila . ', 
            ekc' . $idfila . ', 
            euc' . $idfila . ', 
            egc' . $idfila . ', 
            epc' . $idfila . ', 
            ekd' . $idfila . ', 
            eud' . $idfila . ', 
            egd' . $idfila . ', 
            epd' . $idfila . ', 
            eke' . $idfila . ', 
            eue' . $idfila . ', 
            ege' . $idfila . ', 
            epe' . $idfila . '){';
        /* saco los calculos */
        echo "



        var costoxcaj" . $idfila . " = costoxcaj" . $idfila . ";
        var costo" . $idfila . " = costo" . $idfila . ";
        var descuentov" . $idfila . " = descuento" . $idfila . ";
        var iibb_bsas" . $idfila . " = iibb_bsas" . $idfila . ";
        var iibb_caba" . $idfila . " = iibb_caba" . $idfila . ";
        var perc_iva" . $idfila . " = perc_iva" . $idfila . ";
        var iva" . $idfila . " = iva" . $idfila . ";
        var desadi" . $idfila . " = desadi" . $idfila . ";


           
                    ";
            

        if($fac_unid=="1"){
            echo "
                 /* costo unitario ok */
                costocau" . $idfila . " = costoxcaj" . $idfila . " / " . $kilo . ";
                document.getElementById('costo" . $idfila . "').value = costocau" . $idfila . ".toFixed(2);
                ";
        }else{
            echo "
            /* costo bulto */
            costocau" . $idfila . " = costo" . $idfila . ";
           costocab" . $idfila . " = costo" . $idfila . " * " . $kilo . ";
           document.getElementById('costoxcaj" . $idfila . "').value = costocab" . $idfila . ".toFixed(2);
           ";

           

           

        }
             
                echo "
                /* precio con descuento ok */
                const descccost" . $idfila . " = costocau" . $idfila . " - (costocau" . $idfila . " * (descuento" . $idfila . " / 100));
                document.getElementById('pcondescu" . $idfila . "').textContent = '$' +descccost" . $idfila . ".toFixed(2);


                /* precio bruto */
                const impuestos" . $idfila . " = eval(iibb_bsas" . $idfila . ") + eval(iibb_caba" . $idfila . ") + eval(perc_iva" . $idfila . ") + eval(iva" . $idfila . ");
                const roimp" . $idfila . " = descccost" . $idfila . " + (descccost" . $idfila . " * (impuestos" . $idfila . " / 100));
                document.getElementById('pbruto" . $idfila . "').textContent = '$' +roimp" . $idfila . ".toFixed(2);



                /* precio final unitario */

                const preciofinal" . $idfila . " = roimp" . $idfila . " - (roimp" . $idfila . " * (desadi" . $idfila . " / 100));
                document.getElementById('costo_total" . $idfila . "').textContent = preciofinal" . $idfila . ".toFixed(2);
                document.getElementById('costo_final" . $idfila . "').value = preciofinal" . $idfila . ".toFixed(2);
                

                /* precio final bulto */
                costoxcajar" . $idfila . " = preciofinal" . $idfila . ".toFixed(2) * " . $kilo . ";
                



        ";

        echo"
        /* cambia el color del date */
        if(".$fechahoy."!=".$fechex."){

            if(".$costo_total."!==preciofinal" . $idfila . "){
            document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:green> " . $fechahoyver . "</b>';
            }else{
                document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:red> " . $fecheok . "</b>';
            }
    
            }
            ";

             

                                                    echo '
                                                   var parametros = {
                                                           "jfndhom" : jfndhom' . $idfila . ',
                                                        "costoxcaj" : costoxcaj' . $idfila . ',
                                                        "costo" : costo' . $idfila . ',
                                                        "modobus" : modobus,
                                                        "buscar" : buscar,
                                                        "nref" : nref' . $idfila . ',
                                                        "fecven" : fecven' . $idfila . ',
                                                        "agrstock" : agrstock' . $idfila . ',
                                                        "descuento" : descuento' . $idfila . ',
                                                        "iibb_bsas" : iibb_bsas' . $idfila . ',
                                                        "iibb_caba" : iibb_caba' . $idfila . ',
                                                        "perc_iva" : perc_iva' . $idfila . ',
                                                        "iva" : iva' . $idfila . ',
                                                        "desadi" : desadi' . $idfila . ',                                                        
                                                        "costo_final" : costo_final' . $idfila . ',                                                        
                                                        "mka" : mka' . $idfila . ',
                                                        "mga" : mga' . $idfila . ',
                                                        "mpa" : mpa' . $idfila . ',
                                                        "mkb" : mkb' . $idfila . ',            
                                                        "mub" : mub' . $idfila . ',            
                                                        "mgb" : mgb' . $idfila . ',
                                                        "mpb" : mpb' . $idfila . ',
                                                        "mkc" : mkc' . $idfila . ',            
                                                        "muc" : muc' . $idfila . ',            
                                                        "mgc" : mgc' . $idfila . ',
                                                        "mpc" : mpc' . $idfila . ',
                                                        "mkd" : mkd' . $idfila . ',
                                                        "mud" : mud' . $idfila . ',
                                                        "mgd" : mgd' . $idfila . ',
                                                        "mpd" : mpd' . $idfila . ',
                                                        "mke" : mke' . $idfila . ',
                                                        "mue" : mue' . $idfila . ',
                                                        "mge" : mge' . $idfila . ',
                                                        "mpe" : mpe' . $idfila . ',
                                                        "eka" : eka' . $idfila . ',
                                                        "ega" : ega' . $idfila . ',
                                                        "epa" : epa' . $idfila . ',
                                                        "ekb" : ekb' . $idfila . ',            
                                                        "eub" : eub' . $idfila . ',            
                                                        "egb" : egb' . $idfila . ',
                                                        "epb" : epb' . $idfila . ',
                                                        "ekc" : ekc' . $idfila . ',            
                                                        "euc" : euc' . $idfila . ',            
                                                        "egc" : egc' . $idfila . ',
                                                        "epc" : epc' . $idfila . ',
                                                        "ekd" : ekd' . $idfila . ',
                                                        "eud" : eud' . $idfila . ',
                                                        "egd" : egd' . $idfila . ',
                                                        "epd" : epd' . $idfila . ',
                                                        "eke" : eke' . $idfila . ',
                                                        "eue" : eue' . $idfila . ',
                                                        "ege" : ege' . $idfila . ',
                                                        "epe" : epe' . $idfila . '
                                                   };
                                                   $.ajax({
                                                           data:  parametros,
                                                           url:';
                                                    echo "'";
                                                    echo 'lproductos/updateproducto.php';
                                                    echo "'";
                                                    echo ',
                                                           type:';
                                                    echo "'";
                                                    echo 'post';
                                                    echo "'";
                                                    echo ',
                                                            beforeSend: function () {
                                                                   $("#resultadocuenta' . $idfila . '").html(';
                                                    echo "'";
                                                    echo '';
                                                    echo "'";
                                                    echo ');
                                                           },
                                                           success:  function (response) {
                                                                   $("#resultadocuenta' . $idfila . '").html(response);
                                                           }




                                                   });return;
                                           }
                                           
                                           </script>';

/* costo directo final */
                                           echo '<script>
        
                                           function realizaProcesosf' . $idfila . '(jfndhom' . $idfila . ', modobus, buscar, nref' . $idfila . ', fecven' . $idfila . ', agrstock' . $idfila . ', costo_final' . $idfila . ', mka' . $idfila . ', mga' . $idfila . ', mpa' . $idfila . ', 
                                           mkb' . $idfila . ', 
                                           mub' . $idfila . ', 
                                           mgb' . $idfila . ', 
                                           mpb' . $idfila . ', 
                                           mkc' . $idfila . ', 
                                           muc' . $idfila . ', 
                                           mgc' . $idfila . ', 
                                           mpc' . $idfila . ', 
                                           mkd' . $idfila . ', 
                                           mud' . $idfila . ', 
                                           mgd' . $idfila . ', 
                                           mpd' . $idfila . ', 
                                           mke' . $idfila . ', 
                                           mue' . $idfila . ', 
                                           mge' . $idfila . ', 
                                           mpe' . $idfila . ', 
                                           eka' . $idfila . ', 
                                           ega' . $idfila . ', 
                                           epa' . $idfila . ', 
                                           ekb' . $idfila . ', 
                                           eub' . $idfila . ', 
                                           egb' . $idfila . ', 
                                           epb' . $idfila . ', 
                                           ekc' . $idfila . ', 
                                           euc' . $idfila . ', 
                                           egc' . $idfila . ', 
                                           epc' . $idfila . ', 
                                           ekd' . $idfila . ', 
                                           eud' . $idfila . ', 
                                           egd' . $idfila . ', 
                                           epd' . $idfila . ', 
                                           eke' . $idfila . ', 
                                           eue' . $idfila . ', 
                                           ege' . $idfila . ', 
                                           epe' . $idfila . '){';
                                       /* saco los calculos */
                               
                                           echo "
                                          var costo_final" . $idfila . " = costo_final" . $idfila . ";
                                          costocab" . $idfila . " = costo_final" . $idfila . " * " . $kilo . ";
                                          document.getElementById('costoxcaj" . $idfila . "').value = costocab" . $idfila . ".toFixed(2);
                                          document.getElementById('costo" . $idfila . "').value = costo_final" . $idfila . ";
                                              
                                           var costoxcaj" . $idfila . " = costocab" . $idfila . ".toFixed(2);
                                           var costo" . $idfila . " = costo_final" . $idfila . ";


                                               document.getElementById('descuento" . $idfila . "').value = '0';   
                                                document.getElementById('iibb_bsas" . $idfila . "').value = '0';   
                                                document.getElementById('iibb_caba" . $idfila . "').value = '0';   
                                                document.getElementById('perc_iva" . $idfila . "').value = '0';    
                                                document.getElementById('iva" . $idfila . "').value = '0';   
                                                document.getElementById('desadi" . $idfila . "').value = '0';   
                                               
                                          
                                               document.getElementById('pcondescu" . $idfila . "').textContent = '$0.00';
                               
                               
                                  
                                               document.getElementById('pbruto" . $idfila . "').textContent = '$0.00';                               
                               
                               
                               
                               
                                               document.getElementById('costo_total" . $idfila . "').textContent = costo_final" . $idfila . ";
                                               
                               
                                               costoxcajar" . $idfila . " = costo_final" . $idfila . " * " . $kilo . ";
                                                
                                                                        
                                       if(".$fechahoy."!=".$fechex."){
                               
                                           if(".$costo_total."!==costo_final" . $idfila . "){
                                           document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:green> " . $fechahoyver . "</b>';
                                           }else{
                                               document.getElementById('fechaactual" . $idfila . "').innerHTML = '<b style=color:red> " . $fecheok . "</b>';
                                           }
                                   
                                           }
                                           ";
                               
                                            
                               
                                                                                   echo '
                                                                                  var parametros = {
                                                                                       "jfndhom" : jfndhom' . $idfila . ',
                                                                                       "costoxcaj" : costoxcaj' . $idfila . ',
                                                                                       "costo" : costo' . $idfila . ',                                                      
                                                                                       "costo_final" : costo_final' . $idfila . ',                                                        
                                                                                       "mka" : mka' . $idfila . ',
                                                                                       "mga" : mga' . $idfila . ',
                                                                                       "mpa" : mpa' . $idfila . ',
                                                                                       "mkb" : mkb' . $idfila . ',            
                                                                                       "mub" : mub' . $idfila . ',            
                                                                                       "mgb" : mgb' . $idfila . ',
                                                                                       "mpb" : mpb' . $idfila . ',
                                                                                       "mkc" : mkc' . $idfila . ',            
                                                                                       "muc" : muc' . $idfila . ',            
                                                                                       "mgc" : mgc' . $idfila . ',
                                                                                       "mpc" : mpc' . $idfila . ',
                                                                                       "mkd" : mkd' . $idfila . ',
                                                                                       "mud" : mud' . $idfila . ',
                                                                                       "mgd" : mgd' . $idfila . ',
                                                                                       "mpd" : mpd' . $idfila . ',
                                                                                       "mke" : mke' . $idfila . ',
                                                                                       "mue" : mue' . $idfila . ',
                                                                                       "mge" : mge' . $idfila . ',
                                                                                       "mpe" : mpe' . $idfila . ',
                                                                                       "eka" : eka' . $idfila . ',
                                                                                       "ega" : ega' . $idfila . ',
                                                                                       "epa" : epa' . $idfila . ',
                                                                                       "ekb" : ekb' . $idfila . ',            
                                                                                       "eub" : eub' . $idfila . ',            
                                                                                       "egb" : egb' . $idfila . ',
                                                                                       "epb" : epb' . $idfila . ',
                                                                                       "ekc" : ekc' . $idfila . ',            
                                                                                       "euc" : euc' . $idfila . ',            
                                                                                       "egc" : egc' . $idfila . ',
                                                                                       "epc" : epc' . $idfila . ',
                                                                                       "ekd" : ekd' . $idfila . ',
                                                                                       "eud" : eud' . $idfila . ',
                                                                                       "egd" : egd' . $idfila . ',
                                                                                       "epd" : epd' . $idfila . ',
                                                                                       "eke" : eke' . $idfila . ',
                                                                                       "eue" : eue' . $idfila . ',
                                                                                       "ege" : ege' . $idfila . ',
                                                                                       "epe" : epe' . $idfila . '
                                                                                  };
                                                                                  $.ajax({
                                                                                          data:  parametros,
                                                                                          url:';
                                                                                   echo "'";
                                                                                   echo 'lproductos/updateproducto.php';
                                                                                   echo "'";
                                                                                   echo ',
                                                                                          type:';
                                                                                   echo "'";
                                                                                   echo 'post';
                                                                                   echo "'";
                                                                                   echo ',
                                                                                           beforeSend: function () {
                                                                                                  $("#resultadocuentaf' . $idfila . '").html(';
                                                                                   echo "'";
                                                                                   echo '';
                                                                                   echo "'";
                                                                                   echo ');
                                                                                          },
                                                                                          success:  function (response) {
                                                                                                  $("#resultadocuentaf' . $idfila . '").html(response);
                                                                                          }
                               
                               
                               
                               
                                                                                  });return;
                                                                          }
                                                                          
                                                                          </script>';