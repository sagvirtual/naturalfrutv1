function ajax_categoria(id_rubro, id_categoria, fracionado){
    var parametros = {
    "id_rubro":id_rubro,
    "id_categoria":id_categoria,
    "fracionado":fracionado
    };
    $.ajax({
             data: parametros,
             url: '../rubro_fraccionado/f_categoria.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocategorias").html('');
             },
             success: function(response){
                      $("#muestrocategorias").html(response);
             }
          });
    }