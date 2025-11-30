function ajax_rubros(jfndhom, nombre, ubicacion, estado){
    var parametros = {
    "jfndhom":jfndhom,
    "nombre":nombre,
    "ubicacion":ubicacion,
    "estado":estado
    };
    $.ajax({
             data: parametros,
             url: 'insert_rubros.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrorubros").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrorubros").html(response);
             }
          });
    }