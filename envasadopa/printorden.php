<?php include('../f54du60ig65.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Ticket</title>
</head>

<body>
    <?php


    $id_orden = $_SESSION['id_orden'];

    $sqlordenx=mysqli_query($rjdhfbpqj,"SELECT * FROM ordenevaa Where id = '$id_orden'");
    if ($rowordenx = mysqli_fetch_array($sqlordenx)){
    
    $numero=$rowordenx['numero'];
    
    }
    $ultimos_tres_digitos = substr($numero, -3); // Obtener los últimos tres caracteres
    $numero = substr_replace($numero, "<strong>&nbsp;{$ultimos_tres_digitos}</strong>", -3); // Reemplazar los últimos tres caracteres con la versión en negrita
  
    ?>
<?php

 /*  $ultimos_tres_digitos = substr($numero, -3); // Obtener los últimos tres caracteres
  $numero = substr_replace($numero, "<b>{$ultimos_tres_digitos}</b>", -3); // Reemplazar los últimos tres caracteres con la versión en negrita
 */
?>
    <style>
        @media print {
            #miDiv {
                display: none;
            }
        }

        .subrayado {
            text-decoration: underline;
        }

        table.tabla_sin {

            border-collapse: collapse;

            border: none;

        }

        td.celda_sin {

            padding: 0;


        }

        tr.tr_linea {

            padding: 0;
            border-bottom: 0.1mm solid black;

        }

        tr.tr_lineatop {

            padding: 0;
            border-bottom: 0.1mm solid black;
            border-left: 0.1mm solid black;
            border-top: 0.1mm solid black;


        }

        tr.tr_lineader {

            border-left: 0.1mm solid black;

        }


        td.td_lineader {

            border-right: 0.1mm solid black;

        }

        body {
            font-family: arial;
            font-size: 8pt;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            /* Green */

            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <div id="miDiv" style="text-align: center;">
        <h1>Imprimiendo...</h1>
        <p>espere a que salga el Ticket</p>
        <br>
        <br>
        <a href="index.php"><button class="button button1">LISTO</button></a>
        <!--  <a onclick="javascript:window.print()" style="font-size: 40pt;">Imprimir</a> -->
    <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br>
    </div> 

    <img src="/assets/images/logopc.png" style="width:58mm;"></div>
    <!--   -->
    <hr>




    <table class="tabla_sin" style="width:58mm;">
        <tr>
            <td >
            <p style="font-size:22pt;">Orden&nbsp;Nº<?= $numero ?></p>
                <br><?= $fechahoyver ?>
                <?php
                 
                 echo '&nbsp;&nbsp;' . $hora_actual = date("H:i") . '';
                 
                ?>


            </td>
            

        </tr>







    </table>





    <br>


    <table class="tabla_sin" style="width:100%">









        <?php
       $sqlorden=mysqli_query($rjdhfbpqj,"SELECT * FROM itemenvas Where id_orden = '$id_orden' ORDER BY `id` ASC");
       while ($roworden = mysqli_fetch_array($sqlorden)){





            echo '<tr class="tr_linea tr_lineader tr_lineatop">
                                        <td class="celda_sin td_lineader" style="text-align:left;font-size:12pt;  vertical-align: middle; padding: 2mm;">'.$roworden['producto'].'</td>
                                        <td class="celda_sin td_lineader" style="text-align:center;font-size:12pt;  vertical-align: middle;  padding: 2mm;">'.$roworden['cantidad'].'&nbsp;'.$roworden['unidad'].'</td>
                                        
                                        </tr>';
        }
       $sqlordend = "Update ordenevaa Set fin='1' Where id = '$id_orden'";
        mysqli_query($rjdhfbpqj, $sqlordend) or die(mysqli_error($rjdhfbpqj));
        ?>








    </table><br> .

   
<script>
  window.print(); 



        // Esperar a que la impresión termine
        // Esperar 5 segundos antes de cerrar la ventana
      setTimeout(function() {
            location.href='index.php';
        }, 20000);
    </script>









</body>

</html>