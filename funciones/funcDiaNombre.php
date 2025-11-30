<?php
// Función para obtener el nombre del dia
function DiaNombre($rjdhfbpqj,$id_cliente) {

    $sqlocliente = mysqli_query( $rjdhfbpqj, "SELECT * FROM clientes Where id='$id_cliente'" );
    if ( $rowclientes = mysqli_fetch_array( $sqlocliente ) ) {

        $dia_repart1 = $rowclientes[ 'dia_repart1' ];
        $dia_repart2 = $rowclientes[ 'dia_repart2' ];
        $dia_repart3 = $rowclientes[ 'dia_repart3' ];
        $dia_repart4 = $rowclientes[ 'dia_repart4' ];
        $dia_repart5 = $rowclientes[ 'dia_repart5' ];
        $dia_repart6 = $rowclientes[ 'dia_repart6' ];
        $dia_repart0 = $rowclientes[ 'dia_repart0' ];

        if ( $dia_repart1 == '1' ) {
            $diaCliente = "Lunes";
        } elseif ( $dia_repart2 == '1' ) {
            $diaCliente = "Martes";
        } elseif ( $dia_repart3 == '1' ) {
            $diaCliente = "Miercoles";
        } elseif ( $dia_repart4 == '1' ) {
            $diaCliente = "Jueves";
        } elseif ( $dia_repart5 == '1' ) {
            $diaCliente = "Viernes";
        } elseif ( $dia_repart6 == '1' ) {
            $diaCliente = "Sabado";
        } elseif ( $dia_repart0 == '1' ) {
            $diaCliente = "Domingo";;
        }

    }
return $diaCliente;
}
