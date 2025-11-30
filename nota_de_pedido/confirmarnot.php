<?php include( '../f54du60ig65.php' );
include( '../lusuarios/login.php' );
include( '../funciones/funcHojaRuta.php' );


date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME,"es_RA");
$fechare = date("Y-m-d");

$fechare = new DateTime();
$diaHoy = $fechare->format( 'w' );
 
 $col=$_POST['confirmado'];

 $idorden=$_POST['iditem'];


if ( !empty($idorden) &&  $col == '2' ) {



        $sqlcliefes = "Update orden Set col='2', fecha2='$fechahoy', hora2='$horasin' Where id = '$idorden'";
        mysqli_query( $rjdhfbpqj, $sqlcliefes ) or die( mysqli_error( $rjdhfbpqj ) );
    

        $sqlordenfm1 = mysqli_query( $rjdhfbpqj, "SELECT * FROM orden Where id ='$idorden' and col>'1' and col<'8' and id_hoja='0'" );
        if ( $rowordnm = mysqli_fetch_array( $sqlordenfm1 ) ) {
            $id_clienteint = $rowordnm[ 'id_cliente' ];

            $sqlocliente = mysqli_query( $rjdhfbpqj, "SELECT * FROM clientes Where id='$id_clienteint'" );
            if ( $rowclientes = mysqli_fetch_array( $sqlocliente ) ) {

                $id_camionetacli = $rowclientes[ 'camioneta' ];
                $dia_repart1 = $rowclientes[ 'dia_repart1' ];
                $dia_repart2 = $rowclientes[ 'dia_repart2' ];
                $dia_repart3 = $rowclientes[ 'dia_repart3' ];
                $dia_repart4 = $rowclientes[ 'dia_repart4' ];
                $dia_repart5 = $rowclientes[ 'dia_repart5' ];
                $dia_repart6 = $rowclientes[ 'dia_repart6' ];
                $dia_repart0 = $rowclientes[ 'dia_repart0' ];
                $retira = $rowclientes[ 'retira' ];

                if ( $dia_repart1 == '1' && $diaHoy <= 1) {
                    $diaCliente = 1;
                    $position = $rowclientes[ 'position1' ];
                } elseif ( $dia_repart2 == '1' && $diaHoy <= 2) {
                    $diaCliente = 2;
                    $position = $rowclientes[ 'position2' ];
                } elseif ( $dia_repart3 == '1'&& $diaHoy <= 3 ) {
                    $diaCliente = 3;
                    $position = $rowclientes[ 'position3' ];
                } elseif ( $dia_repart4 == '1' && $diaHoy <= 4) {
                    $diaCliente = 4;
                    $position = $rowclientes[ 'position4' ];
                } elseif ( $dia_repart5 == '1' && $diaHoy <= 5) {
                    $diaCliente = 5;
                    $position = $rowclientes[ 'position5' ];
                } elseif ( $dia_repart6 == '1' && $diaHoy <= 6) {
                    $diaCliente = 6;
                    $position = $rowclientes[ 'position6' ];
                } elseif ( $dia_repart0 == '1' && $diaHoy <= 0) {
                    $diaCliente = 0;
                    $position = $rowclientes[ 'position0' ];
                }
                
                elseif ( $dia_repart1 == '1') {
                    $diaCliente = 1;
                    $position = $rowclientes[ 'position1' ];
                }elseif ( $dia_repart2 == '1' ) {
                    $diaCliente = 2;
                    $position = $rowclientes[ 'position2' ];
                } elseif ( $dia_repart3 == '1' ) {
                    $diaCliente = 3;
                    $position = $rowclientes[ 'position3' ];
                } elseif ( $dia_repart4 == '1' ) {
                    $diaCliente = 4;
                    $position = $rowclientes[ 'position4' ];
                } elseif ( $dia_repart5 == '1' ) {
                    $diaCliente = 5;
                    $position = $rowclientes[ 'position5' ];
                } elseif ( $dia_repart6 == '1' ) {
                    $diaCliente = 6;
                    $position = $rowclientes[ 'position6' ];
                } elseif ( $dia_repart0 == '1' ) {
                    $diaCliente = 0;
                    $position = $rowclientes[ 'position0' ];
                }
            }

            /* fice la fecha para crear la hoja de ruta */
            if($diaCliente !=''){
            $diaClienter = obtenerFechaMasCercana( $diaCliente );

            HojaRuta( $rjdhfbpqj, $diaClienter, $id_camionetacli, $idorden, $position,$retira );
            }
        }
        echo'<script>
        location.reload();
        </script> ';
    } 
 
?>