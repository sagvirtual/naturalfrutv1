<style>
    .seleccionacld {
        background-color: #ccc;
         }
         .no-seleccionacld {
            background-color: #fff; 
        }

         

</style>
<form id="formBusqucl">
 <input type="text" class="form-control" style="width: 350px;" id="id_cliente" name="id_cliente"  value="<?= $id_clientever ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;" <?=$notab?> <?=$blockclien?>>

</form>

<div id="resultadocl"></div>

<script>
$(document).ready(function(){
    var indiceseleccionacld = -1;


    // Manejar el evento keyup para buscar mientras se escribe
    $('#id_cliente').on('keyup', function(e) {
        if (event.key === 'Escape') { // Escape
            $('#resultadocl').empty(); // Vaciar el listado de resultadcl
           
        } 
    });
    

  $(document).on('click', function(e) {
        if (!$(e.target).closest('#resultadocl').length && !$(e.target).is('#id_cliente')) {
            $('#resultadocl').empty();
        }
    }); 

    

    // Manejar el evento keydown para buscar mientras se escribe
    $('#id_cliente').on('keyup', function(e) {
        var $resultadcl = $('#resultadocl p');

        
        if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            if (indiceseleccionacld > 0) {
                indiceseleccionacld--;
                actualizarSeleccion($resultadcl);
            }
        } else if (e.keyCode === 40) { // Flecha abajo
            e.preventDefault();
            if (indiceseleccionacld < $resultadcl.length - 1) {
                indiceseleccionacld++;
                actualizarSeleccion($resultadcl);
            }
        } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter

           
            e.preventDefault();
            if (indiceseleccionacld !== -1) {
                // Aquí puedes hacer lo que necesites con el resultado seleccionacld, por ejemplo:



                     // Construir la URL con el parámetro seleccionacld
                     var seleccionacld = $($resultadcl[indiceseleccionacld]).text();
                var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld) ;
                // Redireccionar a la URL
                window.location.href = url;

                
            }

            


            
        } else {
            // Si se presiona otra tecla, realizar la búsqueda
            realizarBusqucl();
        }
    });

    // Manejar el evento click en los resultadcl de la búsqueda
  $(document).on('click', '#resultadocl p', function() {
        indiceseleccionacld = $(this).index();
         actualizarSeleccion($('#resultadocl p'));
        $('#id_cliente').focus(); // Mantener el foco en el campo de búsqueda

     
        var seleccionacld = $(this).text();
        var url = "?&focf=1&id_cliente=" + encodeURIComponent(seleccionacld) ;
        window.location.href = url;

    });
 


    function realizarBusqucl() {
        // Obtener los datos del formulario
        var formData = $('#formBusqucl').serialize();

        var inputordenin = document.getElementById('ordenin');
        var inputNumero = document.getElementById('ordenin');
        var botonproductod = document.getElementById('producto');

        var importtota = document.getElementById('importtot');
        importtota.style.display = 'none';

        
        // Realizar la solicitud AJAX       
        $.ajax({
            type: "POST",
            url: "buscarcli.php",
            data: formData,
            success: function(response) {
                $('#resultadocl').html(response); // Actualizar los resultadcl en la página
                indiceseleccionacld = -1; // Reiniciar el índice seleccionacld
            }
        });
    }

    function actualizarSeleccion($resultadcl) {
        $resultadcl.removeClass('seleccionacld');
        $($resultadcl[indiceseleccionacld]).addClass('seleccionacld');
    }

    
});
</script>

