<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Natural Frut</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Start css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form action="verifica_ingreso.php" method="post">
                                        <div class="form-head">
                                            <a href="index"><img src="/assets/images/logo.png" alt="logo" style="width: 100%; height:auto;"></a>
                                        </div>                                        
                                        <h5 class="text-dark my-2">INICIAR SESIÓN</h5>
            
                                        <?php
                                         if($_GET['error']=='1'){
                                        echo' <div class="alert alert-danger" role="alert">
                                        Error <a href="#" class="alert-link">Usuario o contraseña </a>incorrecto.
                                      </div>';
                                    }
                                        ?>


                                        <div class="form-group">
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
                                        </div>                        
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Ingresar</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <!-- End js -->
</body>
</html>