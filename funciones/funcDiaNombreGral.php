<?php
// Función para obtener el nombre del dia
function DiaNombregral($rjdhfbpqj,$fechadn) {
   if($fechadn!='0000-00-00'){
        $dia_en_espanol = array(
            'Monday'    => 'Lunes',
            'Tuesday'   => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday'  => 'Jueves',
            'Friday'    => 'Viernes',
            'Saturday'  => 'Sábado',
            'Sunday'    => 'Domingo'
        );
        
        $nombre_dia_ingles = date('l', strtotime($fechadn));
        $fechadn = $dia_en_espanol[$nombre_dia_ingles];

     

    }else{$fechadn= '';}
    return $fechadn;

}
