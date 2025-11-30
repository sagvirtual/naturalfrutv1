function ajax_carga(id_orden, id_cliente, pago_valor, tipopag, ncheque){
    var parametros = {
    "id_orden":id_orden,
    "id_cliente":id_cliente,
    "pago_valor":pago_valor,
    "tipopag":tipopag,
    "ncheque":ncheque
    };
    $.ajax({
             data: parametros,
             url: 'insertar_pago.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestrocarga").html('');
             },
             success: function(response){
                      $("#muestrocarga").html(response);
             }
          });
    }
