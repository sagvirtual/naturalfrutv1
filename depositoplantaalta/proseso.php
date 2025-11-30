<?php
include('../funciones/funcUbicProd.php');
$iptrr = $_SERVER['PHP_SELF'];
//echo ''.$iptrr .'';

if ($iptrr == "/depositoplantaalta/index.php") {

    //echo "<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>";

}

?>
<? if ($tipo_usuario == "29") {
    $tit = "10000000000000000";

    $sqlordenxgvr = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where preparado= '1' and id_usuarioclav='$id_usuarioclav'");
    if ($rowordentcvr = mysqli_fetch_array($sqlordenxgvr)) {


?>

        <div class="container mt-3">
            <div class="alert alert-success" style="padding: 0; padding-left: 10;">
                <strong>En Preparación</strong>
            </div>

            <div id="accordion">
                <?php

                $comilla = "'";

                $sqlordenxgv = mysqli_query($rjdhfbpqj, "SELECT * FROM ordenbajar  Where preparado= '1' and  usuario='$nombrenegocio' ORDER BY `id` DESC");
                while ($rowordentcv = mysqli_fetch_array($sqlordenxgv)) {

                    $usuarioprpd = ${"usuarioprpd" . $rowordentcv['id']};
                    $usuarioprpd = $rowordentcv['usuario'];
                    $idorhisc = $rowordentcv['id'];
                    $numero = $rowordentcv['numero'];
                    $sectort = $rowordentcv['sector'];

                    $prioridadp = ${"prioridadp" . $rowordentcv['id']};
                    $prioverepd = ${"prioverepd" . $rowordentcv['id']};
                    $prioridadp = $rowordentcv['prioridad'];

                    if ($prioridadp == "1") {
                        $prioverepd = '';
                    }
                    if ($prioridadp == "2") {
                        $prioverepd = '<div style="background-color: red; width:100%; padding-left:10px; color:white;"><strong>
            ' . $gifalae . 'CAMINONETA EN LA PUERTA!!</strong></div>';
                    }
                    if ($prioridadp == "3") {
                        $prioverepd = '<div style="background-color: red; width:100%; padding-left:10px; color:white;">
            ' . $gifalae . '<strong>CLIENTE EN LA PUERTA!!</strong></div>';
                    }





                    if ($sectort == "21") {
                        $sectorvert = '<div class="bg-success" style="width:100%; padding-left:10px; color:white;"><strong>ENVASADO PB</strong></div>';
                    } else {
                        $sectorvert = '';
                    }

                    echo ' <div class="card">' . $prioverepd . '
        <div class="card-header" ' . $colorfrv . '>' . $sectorvert . '
       
          Hs.' . $rowordentcv['hora'] . ' | <strong>Pedido Nº ' . $numero . '  | ' . $usuarioprpd . '</strong>
          <a  onclick="ajax_seguimientop' . $idorhisc . '();" style="float:right; color:green; cursor: pointer;">✔︎</a>

       ';

                    echo '</div>
    <div>
    <script>
        function ajax_seguimientop' . $idorhisc . '() {
            var confirmacion = confirm("¿' . $usuarioprpd . ' queres confirmar la entrega del Pedido Nº ' . $numero . ' ?");
            if (confirmacion) {
            var parametros = {
                "preparado": "9",
                "iditem": ' . $idorhisc . '
            };
            $.ajax({
                data: parametros,
                url: ' . $comilla . 'seguimiento.php' . $comilla . ',
                type: ' . $comilla . 'POST' . $comilla . ',
                beforeSend: function() {
                    $("#muestroorden38' . $idorhisc . '").html(' . $comilla . '' . $comilla . ');
                },
                success: function(response) {
                    $("#muestroorden38' . $idorhisc . '").html(response);
                }
            });
        }
    }
    </script>  <div id="muestroorden38' . $idorhisc . '"> </div>
 
        ';





                ?>




            </div>
        </div>
        <table class="table table-bordered table-sm">

            <tbody>

                <?php
                    $comillas = "'";
                    $sqlordenr = mysqli_query($rjdhfbpqj, "SELECT  id,cantidad,producto,unidad,listo,sinstock,id_producto,numero  FROM itembajar Where id_orden = '$idorhisc' $ordensalp");
                    while ($rowordentc = mysqli_fetch_array($sqlordenr)) {

                        $listo = ${"listo" . $rowordentc['listo']};
                        $sinstock = ${"sinstock" . $rowordentc['listo']};
                        $listo = $rowordentc['listo'];
                        $sinstock = $rowordentc['sinstock'];
                        $idpedido = $rowordentc['numero'];
                        $id_producto = $rowordentc['id_producto'];
                        $vecimienver = funcvencimiProd($rjdhfbpqj, $id_producto, $idpedido);
                        if ($listo == "1" && $sinstock == "0") {

                            echo '  <style>
                        #itemped' . $rowordentc['id'] . ' {
                            text-decoration: line-through;
                            cursor: pointer;
                            color: inherit;
                            user-select: none; 
                            color : red;
                            font-style: normal;
    
                        }
                        </style>';
                        }
                        if ($listo == "1" && $sinstock == "1") {

                            echo '
    
                        
                        <style>
                        #itemped' . $rowordentc['id'] . ' {
                            text-decoration: line-through;
                            cursor: pointer;
                            color: inherit;
                            user-select: none; 
                            color : grey;
                            font-style: italic;
    
    
                        }
                        </style>';
                        }

                        if ($listo == "0" && $sinstock == "0") {

                            echo '

                    
                    <style>
                    #itemped' . $rowordentc['id'] . ' {
                        text-decoration: none;
                        cursor: pointer;
                        color: inherit;
                        user-select: none;
                        font-style: normal; 

                    }
                    </style>';
                        }


                        //fin array('presentacion' => $presentacion, 'NombreBulto' => $NombreBulto, 'NombreUnidad' => $NombreUnidad);

                        $sqlusuarios = mysqli_query($rjdhfbpqj, "SELECT kilo,modo_producto,unidadnom,id FROM productos Where  id = '$id_producto'");
                        if ($rowusuarios = mysqli_fetch_array($sqlusuarios)) {
                            $presentaciond = $rowusuarios["kilo"];
                            $NombreBultos = $rowusuarios["modo_producto"];
                            $NombreUnidads = $rowusuarios["unidadnom"];
                        }


                        $CantStocktotal = 0;

                        $sqlsw = mysqli_query($rjdhfbpqj, "SELECT CantStock,id_producto FROM stockhgz1 Where id_producto = '$id_producto'");
                        while ($rowsdk = mysqli_fetch_array($sqlsw)) {
                            $CantStocktotal += $rowsdk['CantStock'];
                        }

                        $stokbultos = $CantStocktotal / $presentaciond;
                        $stokbultos = explode(".", $stokbultos);


                        echo '
                <tr id="itemped' . $rowordentc['id'] . '" onclick="ajax_tachar' . $rowordentc['id'] . '($(' . $comillas . '#listo' . $rowordentc['id'] . '' . $comillas . ').val());">
                <td  style="padding-left: 2mm;"><strong>' . $rowordentc['producto'] . '</strong>
                ';


                        $ubicanom = ubicacionpro($rjdhfbpqj, $id_producto);
                        if ($CantStocktotal > '0') {
                            echo '<p style="color:grey">[Stock: ' . $CantStocktotal . ' ' . $NombreUnidads . ' / ' . $stokbultos[0] . ' ' . $NombreBultos . ']- Venc. ' . $vecimienver . '</p>';
                        } else {
                            echo '<p style="color:red">[Sin Stock]</p>';
                        }
                        echo '
                
                
                </td>
                <form name="frmMain' . $rowordentc['id'] . '">
                <input id="listo' . $rowordentc['id'] . '" name="listo' . $rowordentc['id'] . '" type="hidden" value="1">
                </form>
                <td class="text-center" style="place-items: center; width: 20mm;"><strong>' . $rowordentc['cantidad'] . ' ' . $rowordentc['unidad'] . '</strong></td>
                
                 </tr>
                
                
                
                 <script>
                 var itemped' . $rowordentc['id'] . ' = document.getElementById("itemped' . $rowordentc['id'] . '");
                 var subrayadoActivo' . $rowordentc['id'] . ' = false;
               
                 itemped' . $rowordentc['id'] . '.addEventListener("click", function() {
                   if (subrayadoActivo' . $rowordentc['id'] . ') {
                     itemped' . $rowordentc['id'] . '.style.textDecoration = "none";
                     itemped' . $rowordentc['id'] . '.style.backgroundColor = "transparent";
                     itemped' . $rowordentc['id'] . '.style.color = "black"; 
                     document.getElementById("itemped' . $rowordentc['id'] . '").style.fontStyle = "normal";
                     subrayadoActivo' . $rowordentc['id'] . ' = false;
                     document.frmMain' . $rowordentc['id'] . '.listo' . $rowordentc['id'] . '.value = ' . $comillas . '1' . $comillas . ';
                   } else {
                     itemped' . $rowordentc['id'] . '.style.textDecoration = "line-through";
                     itemped' . $rowordentc['id'] . '.style.backgroundColor = "#ccc";
                     itemped' . $rowordentc['id'] . '.style.color = "red"
                     document.getElementById("itemped' . $rowordentc['id'] . '").style.fontStyle = "normal";
                     subrayadoActivo' . $rowordentc['id'] . ' = true;
                     document.frmMain' . $rowordentc['id'] . '.listo' . $rowordentc['id'] . '.value = ' . $comillas . '0' . $comillas . ';
                   }
                 });
               </script>
               
               <script>
               function ajax_tachar' . $rowordentc['id'] . '(listo' . $rowordentc['id'] . ') {
                   var parametros = {
                       "listo": listo' . $rowordentc['id'] . ',
                       "iditem": ' . $rowordentc['id'] . '
                   };
                   $.ajax({
                       data: parametros,
                       url: ' . $comillas . 'tachar.php' . $comillas . ',
                       type: ' . $comillas . 'POST' . $comillas . ',
                       beforeSend: function() {
                           $("#muestroorden3t' . $rowordentc['id'] . '").html(' . $comillas . '' . $comillas . ');
                       },
                       success: function(response) {
                           $("#muestroorden3t' . $rowordentc['id'] . '").html(response);
                       }
                   });
               }
           </script>
                
                
                
                
           <div id="muestroorden3t' . $rowordentc['id'] . '"></div>




      


       <div id="muestroorden3ts' . $rowordentc['id'] . '"></div>

       <script>
       let isDragging' . $rowordentc['id'] . ' = false;
       let startX' . $rowordentc['id'] . ' = null;
   
       document.getElementById(' . $comilla . 'itemped' . $rowordentc['id'] . '' . $comilla . ').addEventListener(' . $comilla . 'touchstart' . $comilla . ', (event) => {
           isDragging' . $rowordentc['id'] . ' = true;
           startX' . $rowordentc['id'] . ' = event.touches[1].clientX;
       });
   
       document.getElementById(' . $comilla . 'itemped' . $rowordentc['id'] . '' . $comilla . ').addEventListener(' . $comilla . 'touchmove' . $comilla . ', (event) => {
           if (isDragging' . $rowordentc['id'] . ' && startX' . $rowordentc['id'] . ' !== null) {
               if (event.touches[1].clientX < startX' . $rowordentc['id'] . ') {
                   miFuncion' . $rowordentc['id'] . '();
               }
           }
       });
   
       document.getElementById(' . $comilla . 'itemped' . $rowordentc['id'] . '' . $comilla . ').addEventListener(' . $comilla . 'touchend' . $comilla . ', () => {
           isDragging' . $rowordentc['id'] . ' = false;
           startX' . $rowordentc['id'] . ' = null;
       });
   
       function miFuncion' . $rowordentc['id'] . '() {


        var parametros = {
            "listo": 1,
            "iditem": ' . $rowordentc['id'] . '
        };
        $.ajax({
            data: parametros,
            url: ' . $comillas . 'tacharsin.php' . $comillas . ',
            type: ' . $comillas . 'POST' . $comillas . ',
            beforeSend: function() {
                $("#muestroorden3ts' . $rowordentc['id'] . '").html(' . $comillas . '' . $comillas . ');
            },
            success: function(response) {
                $("#muestroorden3ts' . $rowordentc['id'] . '").html(response);
            }
        });
     
        itemped' . $rowordentc['id'] . '.style.textDecoration = "line-through";
        document.getElementById("itemped' . $rowordentc['id'] . '").style.color = "grey";
        document.getElementById("itemped' . $rowordentc['id'] . '").style.fontStyle = "italic";
        




           
       }
   </script>

                
                 ';
                    }

                ?>


            </tbody>
        </table>
    <?php

                }

    ?>
    </div>

    </div>



<?  }
} else {
    $tit = "800";
} ?>