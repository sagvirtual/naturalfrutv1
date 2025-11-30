<?php include('f54du60ig65.php');
include('../inicio/login.php');
include('inicio/login.php');

function isMobileDevice() {
  return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
}

if (!isMobileDevice()) {
  // Redirigir a una página diferente o mostrar un mensaje
  header("Location: ../");
  exit;
}

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
