<?php
include('../f54du60ig65.php');
include('../lusuarios/login.php');

?>



<!DOCTYPE html>


<html lang="es">

<head>
    <title>Sistema de Lista de Precios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <style>
        /* Estilo para el mensaje de confirmación */
        #mensajeCopiado {
            display: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            position: fixed;
            top: 120px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            border-radius: 5px;
        }
    </style>

</head>

<body>




    <div class="bg-success text-white text-center" style="padding-left: 10px; padding-right: 10px; flex-shrink: 0;" style="background-color: #0B6CF7; ">
        <p style=" font-size: 10pt; color: white;">Sistema de Lista de Precios&nbsp;&nbsp; Usuario:&nbsp;<strong> <?= $nombrenegocio ?></p>
    </div>


    <div class="container">

        <div class="row">
            <div class="col-lg-2">
                <a href="../">
                    <img src="/assets/images/logopc.png" style="width:38mm;">
                </a>
            </div>

            <div class="col-8" style="padding-top: 10px;">

                <?php

                include('inpubuscado.php');




                ?> <div id="mensajeCopiado">Dato copiado!!</div>
            </div>

            <div class="col-lg-2" style="padding-top: 10px;">
                <a href="index.php"> <button type="button" class="btn btn-success">
                        Nueva Busqueda
                    </button>
                </a>
            </div>
        </div>

    </div>
    </div>
    </div> <br>
    <div class="container">
        <div id="resultado"></div>

    </div>



    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="row">
        <div class="col-4">



        </div>
        <div class="col-4 text-center"><button type="button" class="btn btn-secondary" onclick="copyToClipboard('#fot2')"> Copiar Direccíon</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-secondary" onclick="copyToClipboard('#fot3')"> Copiar Datos del Banco</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-secondary" onclick="copyToClipboard('#fot4')"> Nuevo Cliente</button><br><br>
            <a href="../">
                <button type="button" id="suminstr2" class="btn btn-danger" style="width: 100%;">Salir</button>
            </a>

        </div>
        <div class="col-4">
        </div>
    </div>
    </div>









    </div>

    <div class="invisible">
        <textarea id="fot2">
Natural Frut     
Alsina 1935, B1650 Villa Lynch, Provincia de Buenos Aires
Lunes a Viernes de 10:00 a 13:00 y 14:00 a 15:30hs
https://maps.app.goo.gl/6K4HHyq7ixd13iANA
			</textarea>
    </div>



    <div class="invisible">
        <textarea id="fot3">
*DATOS PARA DEPOSITO/TRANSFERENCIA*
*Razón Social:* Genebrier Sebastián Alejandro
*Banco:* Banco Credicoop
*CUIT:* 20-32763767-4
*Sucursal:* 069
*Tipo de Cuenta:* Cuenta Corriente
*CBU:* 1910069855006900863132
*Nº Cuenta:* CC$ 191-069-008631/3
*Alias:* NATURAL.FRUT.GENE</textarea>
    </div>

    <div class="invisible">
        <textarea id="fot4">
*Nombre de contacto:*
*Nombre del local/negocio:*
*Direccion:*
*Localidad:*
*Telefono de contacto:*
*Horarios de atencion:*
*Condicion frente al IVA:*
*CUIT:*
*RAZON SOCIAL:* &nbsp;</textarea>
    </div>

    <script language="JavaScript" type="text/JavaScript">
        function copyToClipboard(elemento) {
            var $temp = $("<textarea>");
            $("body").append($temp);
            $temp.val($(elemento).text()).select();
            document.execCommand("copy");
            $temp.remove();
            
            // Mostrar el mensaje "Dato copiado"
            var mensaje = document.getElementById("mensajeCopiado");
            mensaje.style.display = "block";
            
            // Ocultar el mensaje después de 2 segundos
            setTimeout(function() {
                mensaje.style.display = "none";
            }, 2000);
        }
    </script>

</body>

</html>