function ajax_pedirdinero(id_orden, pedir){
    var parametros = {
    "id_orden":id_orden,
    "pedir":pedir
    };
    $.ajax({
             data: parametros,
             url: 'insert_pedirdinero.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrofavoritos").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrofavoritos").html(response);
             }
          });
    }