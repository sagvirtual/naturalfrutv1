function ajax_remitodev(idorden, gridRadios1, nota, noenterga){
    var parametros = {
    "idorden":idorden,
    "gridRadios1":gridRadios1,
    "nota":nota,
    "noenterga":noenterga
    };
    $.ajax({
             data: parametros,
             url: 'update_cerrado.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocargar").html('');
             },
             success: function(response){
                      $("#muestrocargar").html(response);
             }
          });
    }
