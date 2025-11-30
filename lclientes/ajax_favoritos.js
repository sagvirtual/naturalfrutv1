function ajax_favoritos(id_cliente, favorito, id_producto){
    var parametros = {
    "id_cliente":id_cliente,
    "favorito":favorito,
    "id_producto":id_producto
    };
    $.ajax({
             data: parametros,
             url: 'insert_favoritos.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrofavoritos").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestrofavoritos").html(response);
             }
          });
    }