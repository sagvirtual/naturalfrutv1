function ajax_pedir(id_clientec, idpedir){
    var parametros = {
    "id_clientec":id_clientec,
    "idpedir":idpedir
    };
    $.ajax({
             data: parametros,
             url: 'insert_pedir.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrofavoritos").html('');
             },
             success: function(response){
                      $("#muestrofavoritos").html(response);
             }
          });
    }