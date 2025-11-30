function ajax_carga(id_producto, idorden, kilos){
    var parametros = {
    "id_producto":id_producto,
    "idorden":idorden,
    "kilos":kilos
    };
    $.ajax({
             data: parametros,
             url: 'update_pedir.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocarga").html('');
             },
             success: function(response){
                      $("#muestrocarga").html(response);
             }
          });
    }
