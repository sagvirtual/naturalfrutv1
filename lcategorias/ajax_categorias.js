function ajax_categorias(jfndhom, nombre, ubicacion, estado){
    var parametros = {
    "jfndhom":jfndhom,
    "nombre":nombre,
    "ubicacion":ubicacion,
    "estado":estado
    };
    $.ajax({
             data: parametros,
             url: 'insert_categorias.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocategorias").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrocategorias").html(response);
             }
          });
    }