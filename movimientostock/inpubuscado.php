    <style>
    .seleccionado {
        background-color: #ccc;
         }
         .no-seleccionado {
            background-color: #fff; 
        }

         

</style>
<form id="formBusqueda">
 <input type="text" class="form-control" id="producto" name="producto" placeholder="Buscar Producto..." value="<?= $producto ?>" autocomplete="off" onclick="select()" onkeypress="return event.keyCode != 13;">
</form>

<div id="resultado"></div>

<script>
$(document).ready(function(){
    var indiceSeleccionado = -1;


    // Manejar el evento keyup para buscar mientras se escribe
    $('#producto').on('keyup', function(e) {
        if (event.key === 'Escape') { // Escape
            $('#resultado').empty(); // Vaciar el listado de resultados
            location.href = '?osert=1';
        } 
    });
    

  $(document).on('click', function(e) {
        if (!$(e.target).closest('#resultado').length && !$(e.target).is('#producto')) {
            $('#resultado').empty();
        }
    }); 

    

    // Manejar el evento keydown para buscar mientras se escribe
    $('#producto').on('keyup', function(e) {
        var $resultados = $('#resultado p');

        var numerobd = document.getElementById('numero');
        var pruenumerobdba = numerobd.value;
        
        if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            if (indiceSeleccionado > 0) {
                indiceSeleccionado--;
                actualizarSeleccion($resultados);
            }
        } else if (e.keyCode === 40) { // Flecha abajo
            e.preventDefault();
            if (indiceSeleccionado < $resultados.length - 1) {
                indiceSeleccionado++;
                actualizarSeleccion($resultados);
            }
        } else if (event.key === 'Enter') { // Enter

           
            e.preventDefault();
            if (indiceSeleccionado !== -1) {
                // Aquí puedes hacer lo que necesites con el resultado seleccionado, por ejemplo:



                     // Construir la URL con el parámetro seleccionado
                     var seleccionado = $($resultados[indiceSeleccionado]).text();
                var url = "?&focf=1&producto=" + encodeURIComponent(seleccionado) + " &numero=" + pruenumerobdba;
                // Redireccionar a la URL
                window.location.href = url;

                
            }

            


            
        } else {
            // Si se presiona otra tecla, realizar la búsqueda
            realizarBusqueda();
        }
    });

    // Manejar el evento click en los resultados de la búsqueda
  $(document).on('click', '#resultado p', function() {
        indiceSeleccionado = $(this).index();
         actualizarSeleccion($('#resultado p'));
        $('#producto').focus(); // Mantener el foco en el campo de búsqueda

        var numerobd = document.getElementById('numero');
        var pruenumerobdba = numerobd.value;
     
        var seleccionado = $(this).text();
        var url = "?&focf=1&producto=" + encodeURIComponent(seleccionado) + " &numero=" + pruenumerobdba;
        window.location.href = url;

    });
 


    function realizarBusqueda() {
        // Obtener los datos del formulario
        var formData = $('#formBusqueda').serialize();

        var inputNumero = document.getElementById('cantidad');
        var botonSuminstr = document.getElementById('suminstr');
        var botonUnidad = document.getElementById('unidad');
        inputNumero.style.display = 'none';
        botonUnidad.style.display = 'none';
        botonSuminstr.style.display = 'none';
        // Realizar la solicitud AJAX       
        $.ajax({
            type: "POST",
            url: "buscarpro.php",
            data: formData,
            success: function(response) {
                $('#resultado').html(response); // Actualizar los resultados en la página
                indiceSeleccionado = -1; // Reiniciar el índice seleccionado
            }
        });
    }

    function actualizarSeleccion($resultados) {
        $resultados.removeClass('seleccionado');
        $($resultados[indiceSeleccionado]).addClass('seleccionado');
    }

    
});
</script>

