function ajax_marcas(jfndhom, empresa, whatsapp, telefono, email, web, estado, tipo, gananciaa, gananciab, gananciac, address){
    var parametros = {
    "jfndhom":jfndhom,
    "empresa":empresa,
    "whatsapp":whatsapp,
    "telefono":telefono,
    "email":email,
    "web":web,
    "estado":estado,
    "tipo":tipo,
    "gananciaa":gananciaa,
    "gananciab":gananciab,
    "gananciac":gananciac,
    "address":address
    };
    $.ajax({
             data: parametros,
             url: 'insert_marcas.php',
             type: 'POST',
             beforeSend: function(){
                      $("#muestromarcas").html('<img src="../assets/images/loader.gif">');
             },
             success: function(response){
                      $("#muestromarcas").html(response);
             }
          });
    }