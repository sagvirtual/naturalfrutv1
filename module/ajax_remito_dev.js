function ajax_cargadev(id_producto, idorden, kilos, gridRadios1, nota, noenterga){
    var parametros = {
    "id_producto":id_producto,
    "idorden":idorden,
    "kilos":kilos,
    "gridRadios1":gridRadios1,
    "nota":nota,
    "noenterga":noenterga
    };
    $.ajax({
             data: parametros,
             url: 'update_intemorden.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocarga").html('');
             },
             success: function(response){
                      $("#muestrocarga").html(response);
             }
          });
    }
