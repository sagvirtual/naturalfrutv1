function ajax_caja(fecha_caja, id_camioneta, det_entrada, val_entrada, val_salida, modo){
    var parametros = {
    "fecha_caja":fecha_caja,
    "id_camioneta":id_camioneta,
    "det_entrada":det_entrada,
    "val_entrada":val_entrada,
    "val_salida":val_salida,
    "modo":modo
    };
    $.ajax({
             data: parametros,
             url: '../caja/insert_caja.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocaja").html('');
             },
             success: function(response){
                      $("#muestrocaja").html(response);
             }
          });
    }