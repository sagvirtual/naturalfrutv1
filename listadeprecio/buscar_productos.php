<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buscador</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .seleccionado {
        background-color: #ccc;
    }
</style>
</head>
<body>
<form id="formBusqueda">
    <input type="text" id="busqueda" name="busqueda" autocomplete="off">
</form>
<div id="resultado"></div>

<script>
$(document).ready(function(){
    var indiceSeleccionado = -1;

    // Manejar el evento keydown para buscar mientras se escribe
    $('#busqueda').on('keydown', function(e) {
        var $resultados = $('#resultado input');
        
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
        } else if (e.keyCode === 13) { // Enter
            e.preventDefault();
            if (indiceSeleccionado !== -1) {
                // Construir la URL con el parámetro seleccionado
                var seleccionado = $($resultados[indiceSeleccionado]).val();
                var url = "prueba.php?seleccion=" + encodeURIComponent(seleccionado);
                // Redireccionar a la URL
                window.location.href = url;
            }
        } else {
            // Si se presiona otra tecla, realizar la búsqueda
            realizarBusqueda();
        }
    });

    // Manejar el evento click en los resultados de la búsqueda
    $(document).on('click', '#resultado input', function() {
        indiceSeleccionado = $(this).index();
        actualizarSeleccion($('#resultado input'));
        $('#busqueda').focus(); // Mantener el foco en el campo de búsqueda
    });

    function realizarBusqueda() {
        // Obtener los datos del formulario
        var formData = $('#formBusqueda').serialize();

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "prueba.php",
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
</body>
</html>
