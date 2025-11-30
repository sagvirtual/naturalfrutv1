<?php
// Función para obtener el nombre del dia
function NomDiaOrden( $fechaOrden) {

    $dia_en_espanol = array(
        'Monday'    => 'Lunes',
        'Tuesday'   => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday'  => 'Jueves',
        'Friday'    => 'Viernes',
        'Saturday'  => 'Sábado',
        'Sunday'    => 'Domingo'
    );
    
    $nombre_dia_ingles = date('l', strtotime($fechaOrden));
    $nombre_dia_espanol = $dia_en_espanol[$nombre_dia_ingles];
    
  //  echo "Hoy es: $nombre_dia_espanol";
return $nombre_dia_espanol;
}
