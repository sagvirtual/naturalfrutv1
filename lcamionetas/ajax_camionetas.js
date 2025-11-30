function ajax_camionetas(jfndhom, nombre, ubicacion, estado){
    var parametros = {
    "jfndhom":jfndhom,
    "nombre":nombre,
    "ubicacion":ubicacion,
    "estado":estado
    };
    $.ajax({
             data: parametros,
             url: 'insert_camionetas.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocamionetas").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrocamionetas").html(response);
             }
          });
    }