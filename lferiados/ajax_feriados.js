function ajax_feriados(jfndhom, titulo, fecha){
    var parametros = {
    "jfndhom":jfndhom,
    "titulo":titulo,
    "fecha":fecha
    };
    $.ajax({
             data: parametros,
             url: 'insert_feriados.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestroferiados").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestroferiados").html(response);
             }
          });
    }