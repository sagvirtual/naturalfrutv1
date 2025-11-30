<? include('../f54du60ig65.php'); 
unset($_SESSION['id_orden']);
unset($_SESSION['id_usuario']);
unset($_SESSION['id_distri']);
unset($_SESSION['wscli']);
unset($_SESSION['esorden']);
unset($_SESSION['usuario']);
unset($_SESSION['clave']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>San Cipriano - Lo mejor del Mar</title>
    <!--   <link rel="manifest" href="manifest.json"> -->
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!-- Touchspin css -->
    <link href="/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Apex css -->
    <link href="/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <!-- Slick css -->
    <link href="/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <!-- End css -->
    <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <META HTTP-EQUIV="REFRESH" CONTENT="2000000000;">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, orientation=portrait">
</head>

<body>
<audio id="myAudio">
  <source src="../assets/sound/lighter-zippo-click.mp3" type="audio/ogg">
  Your browser does not support the audio element.
</audio>
<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 
</script>

            <div class="alturas">
                <div style="background-color: white; width:100%; padding:15px; text-align:center;">
                <a href="/module" class="mobile-logo"><img src="/assets/images/logo.png" class="img-fluid" alt="logo"></a>
                </div>

<?php 
$error=$_GET['error'];

?>






<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid  bg-grey">

	<script>
		function realizaProceso(valorusuario, valorclave) {
			var parametros = {
				"usuario": valorusuario,
				"clave": valorclave
			};
			$.ajax({
				data: parametros,
				url: 'verifica_ingreso.php',
				type: 'post',
				beforeSend: function() {
					$("#resultado").html('<div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div>');
				},
				success: function(response) {
					$("#resultado").html(response);
				}
			});
		}
	</script>

	<style>
		.bubblingG {
			text-align: center;
			width: 78px;
			height: 49px;
			margin: auto;
		}

		.bubblingG span {
			display: inline-block;
			vertical-align: middle;
			width: 10px;
			height: 10px;
			margin: 24px auto;
			background: rgb(0, 0, 0);
			border-radius: 49px;
			-o-border-radius: 49px;
			-ms-border-radius: 49px;
			-webkit-border-radius: 49px;
			-moz-border-radius: 49px;
			animation: bubblingG 1.5s infinite alternate;
			-o-animation: bubblingG 1.5s infinite alternate;
			-ms-animation: bubblingG 1.5s infinite alternate;
			-webkit-animation: bubblingG 1.5s infinite alternate;
			-moz-animation: bubblingG 1.5s infinite alternate;
		}

		#bubblingG_1 {
			animation-delay: 0s;
			-o-animation-delay: 0s;
			-ms-animation-delay: 0s;
			-webkit-animation-delay: 0s;
			-moz-animation-delay: 0s;
		}

		#bubblingG_2 {
			animation-delay: 0.45s;
			-o-animation-delay: 0.45s;
			-ms-animation-delay: 0.45s;
			-webkit-animation-delay: 0.45s;
			-moz-animation-delay: 0.45s;
		}

		#bubblingG_3 {
			animation-delay: 0.9s;
			-o-animation-delay: 0.9s;
			-ms-animation-delay: 0.9s;
			-webkit-animation-delay: 0.9s;
			-moz-animation-delay: 0.9s;
		}



		@keyframes bubblingG {
			0% {
				width: 10px;
				height: 10px;
				background-color: rgb(0, 0, 0);
				transform: translateY(0);
			}

			100% {
				width: 23px;
				height: 23px;
				background-color: rgb(255, 255, 255);
				transform: translateY(-20px);
			}
		}

		@-o-keyframes bubblingG {
			0% {
				width: 10px;
				height: 10px;
				background-color: rgb(0, 0, 0);
				-o-transform: translateY(0);
			}

			100% {
				width: 23px;
				height: 23px;
				background-color: rgb(255, 255, 255);
				-o-transform: translateY(-20px);
			}
		}

		@-ms-keyframes bubblingG {
			0% {
				width: 10px;
				height: 10px;
				background-color: rgb(0, 0, 0);
				-ms-transform: translateY(0);
			}

			100% {
				width: 23px;
				height: 23px;
				background-color: rgb(255, 255, 255);
				-ms-transform: translateY(-20px);
			}
		}

		@-webkit-keyframes bubblingG {
			0% {
				width: 10px;
				height: 10px;
				background-color: rgb(0, 0, 0);
				-webkit-transform: translateY(0);
			}

			100% {
				width: 23px;
				height: 23px;
				background-color: rgb(255, 255, 255);
				-webkit-transform: translateY(-20px);
			}
		}

		@-moz-keyframes bubblingG {
			0% {
				width: 10px;
				height: 10px;
				background-color: rgb(0, 0, 0);
				-moz-transform: translateY(0);
			}

			100% {
				width: 23px;
				height: 23px;
				background-color: rgb(255, 255, 255);
				-moz-transform: translateY(-20px);
			}
		}

		a {
			color: #000000;
			font-size: 16px;
			font-style: normal;
			text-decoration: none;
		}

		a:hover {
			color: #555555;
			text-decoration: none;
		}
		input{font-size: 24pt;}



		.colorfondo {
			-webkit-background-size: 100% 200%;
			/* Safari 3.0 */
			-moz-background-size: 100% 200%;
			/* Gecko 1.9.2 (Firefox 3.6) */
			-o-background-size: 100% 200%;
			/* Opera 9.5 */
			background-size: 100% 100%;
			/* Gecko 2.0 (Firefox 4.0) and other CSS3-compliant browsers */
			background-repeat: repeat-y;
			background-size: 100% 823px;
			background-image: url("/images/fondo.png");


		}

		.colorgral {
			background-color: #000000;

		}

		.colortext {
			color: #000000;

		}

		.bienvenidos {
			font-family: 'Courgette', cursive;
			font-size: 26pt;
		}

		.botonok {
			width: 100%;
			height: 43px;
			border: 0px;
			-webkit-border-radius: 7;
			-moz-border-radius: 7;
			border-radius: 7px;
			font-family: Arial;
			color: #ffffff;
			font-size: 16px;
			background: #000000;
			padding: 10px 20px 10px 20px;
			text-decoration: none;
		}

		.botonok:hover {
			background: #555555;
			text-decoration: none;
		}


		.botonoff {
			width: 100%;
			height: 43px;
			border: 0px;
			-webkit-border-radius: 7;
			-moz-border-radius: 7;
			border-radius: 7px;
			font-family: Arial;
			color: #ffffff;
			font-size: 16px;
			background: #555555;
			padding: 10px 20px 10px 20px;
			text-decoration: none;
		}

		.botonoff:hover {
			background: #555555;
			text-decoration: none;
		}


		.botonblanco {
			border-style: solid;
			width: 100%;
			height: 43px;
			border-color: #000000;
			-webkit-border-radius: 7;
			-moz-border-radius: 7;
			border-radius: 7px;
			font-family: Arial;
			color: #000000;
			font-size: 16px;
			background: #ffffff;
			padding: 10px 20px 10px 20px;
			text-decoration: none;
		}

		.botonblanco:hover {
			background: #ffffff;
			text-decoration: none;
			color: #555555;
		}


		.imput {
			border-style: solid;
			border-width: 2px;
			border-radius: 0px;
			padding-left: 10px;
			width: 100%;
			height: 63px;
			background: #ffffff;
			border-color: #555555;

		}

		.imputactiv {

			border-style: solid;
			border-width: 2px;
			border-radius: 0px;
			width: 50px;
			height: 50px;
			background: #ffffff;
			border-color: #555555;
			font-size: 22pt;
			border-radius: 10px;
			-o-border-radius: 10px;
			-ms-border-radius: 10px;
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			color: #404040;
			font-weight: bold;
			text-align: center;
		}


		.cuadro {
			background: #FFFFFF;
			border-radius: 66px 0px 66px 7px;
			-moz-border-radius: 66px 0px 66px 7px;
			-webkit-border-radius: 66px 0px 66px 7px;
			border: 1px solid #000000;
			-webkit-box-shadow: -8px 10px 12px -2px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: -8px 10px 12px -2px rgba(0, 0, 0, 0.75);
			box-shadow: -8px 10px 12px -2px rgba(0, 0, 0, 0.75);

		}
	</style>
	<br><br>
	<div class="col-xs-12 col-lg-4"></div>
	<div class="col-xs-12 col-lg-4">
		<div class="row"><br><br><br>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<h3 class="colortext">Iniciar Sesión </h3>
				<?php
				 
				if($error==1){echo'<h3 style="color:red;">Usuario o contraseña Incorrecta</h3>';}
				 
				?>


			</div>

			<form action="#" method="post">
				<div>

					<input id="usuario" class="imput" type="text" placeholder="Usuario" required>
				</div><br>
				<div>

					<input id="clave" class="imput" type="password" placeholder="Contraseña" required>
				</div><br>

				<span id="resultado"></span>



				<input type="button" class="botonok" href="javascript:;" onclick="realizaProceso($('#usuario').val(), $('#clave').val());return false;" value="Ingresar" /><br>
			</form>
	
		</div>
		<br>



	</div>
	</div>



<!-- <script>
      if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("/sw.js");
      }
    </script> -->






	<?php include('../template/piecelu.php'); ?>