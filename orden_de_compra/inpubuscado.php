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
 <input type="hidden" id="id_ordenp" name="id_ordenp" value="<?=$id_orden?>">
</form>

<div id="resultado"></div>

<script>
$(document).ready(function(){
    var indiceSeleccionado = -1;


    // Manejar el evento keyup para buscar mientras se escribe
    $('#producto').on('keyup', function(e) {
        if (event.key === 'Escape') { // Escape
            $('#resultado').empty(); // Vaciar el listado de resultados
            document.getElementById('producto').value = '';
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

        
        if (e.keyCode === 38) { // Flecha arriba
            e.preventDefault();
            if (indiceSeleccionado > 0) {
                indiceSeleccionado--;
                actualizarSeleccion($resultados);
            }
        } else if (e.keyCode === 40) { // if (e.keyCode === 40)Flecha abajo
            e.preventDefault();
            if (indiceSeleccionado < $resultados.length - 1) {
                indiceSeleccionado++;
                actualizarSeleccion($resultados);
            }
        } else if (e.keyCode === 9 || event.key === 'Enter') { // Enter

           
            e.preventDefault();
            if (indiceSeleccionado !== -1) {
                // Aquí puedes hacer lo que necesites con el resultado seleccionado, por ejemplo:



                     // Construir la URL con el parámetro seleccionado
                     var seleccionado = $($resultados[indiceSeleccionado]).text();
                var url = "?&focf=1&producto=" + encodeURIComponent(seleccionado) + "&id_cliente=<?=$id_clientever?>@<?=$id_clienteint?>@#buscarproi" ;
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

     
        var seleccionado = $(this).text();
        var url = "?&focf=1&producto=" + encodeURIComponent(seleccionado) + "&id_cliente=<?=$id_clientever?>@<?=$id_clienteint?>@#buscarproi" ;
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


        var descuenuna = document.getElementById('descuenun');
        var improteuna = document.getElementById('improteun');
        var importtota = document.getElementById('importtot');
        descuenuna.style.display = 'none';
        improteuna.style.display = 'none';
        importtota.style.display = 'none';
        // Realizar la solicitud AJAX       
        $.ajax({
            type: "POST",
            url: "/nota_de_pedido/buscarpro.php",
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

