function ajax_carga(id_proveedor, id_producto, fecha, kilosex, cajas){
    var parametros = {
    "id_proveedor":id_proveedor,
    "id_producto":id_producto,
    "fecha":fecha,
    "kilosex":kilosex,
    "cajas":cajas,
    };
    $.ajax({
             data: parametros,
             url: 'insert_carga.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocarga").html('UN MOMENTO...<br>');
             },
             success: function(response){
                      $("#muestrocarga").html(response);
             }
          });
    }
