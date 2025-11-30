function ajax_efectivo(fecha_caja, id_camioneta, efec1, efec2, efec3, efec4, efec5, efec6, efec7, efec8, efec9){
    var parametros = {
    "fecha_caja":fecha_caja,
    "id_camioneta":id_camioneta,
    "efec1":efec1,
    "efec2":efec2,
    "efec3":efec3,
    "efec4":efec4,
    "efec5":efec5,
    "efec6":efec6,
    "efec7":efec7,
    "efec8":efec8,
    "efec9":efec9
    };
    $.ajax({
             data: parametros,
             url: 'insert_efectivo.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestroefectivo").html('');
             },
             success: function(response){
                      $("#muestroefectivo").html(response);
             }
          });
    }