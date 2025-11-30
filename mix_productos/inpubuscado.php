    <style>
    .seleccionado {
        background-color: #ccc;
         }
         .no-seleccionado {
            background-color: #fff; 
        }

         

</style>
 <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Producto para el Mix ..." value="<?= $producto ?>" autocomplete="off" 
 onkeyup="ajax_buscars($('#buscar').val())"  autocomplete="off">





<script>
    let debounceTimer;
   function ajax_buscars(buscar) {
    clearTimeout(debounceTimer); // Limpiar el temporizador previo

debounceTimer = setTimeout(function () {
    // Solo ejecuta la búsqueda si 'buscar' tiene al menos 3 caracteres
    if (buscar.length >= 3) {
                var parametros = {
                    "buscar": buscar

                };
          
                $.ajax({
                    data: parametros,
                    url: 'buscarpro.php',
                    type: 'POST',
                    beforeSend: function() {
                        $("#resultado").html('<div style="text-align:center;"><img src="../assets/images/loader.gif"style="width: 60px; height:60px;"><h4 style="text-align:center;">Un momento estamos buscando en una <br>base de más de 2000 Productos...</h4></div>');
                    },
                    success: function(response) {
                        $("#resultado").html(response);
                    }
                });      } else {
            // Borra el resultado de búsqueda si el texto es menor a 3 caracteres
            $("#resultadobuscar").html('');
        }
    }, 300); // Espera 300ms después de la última pulsación
}
</script>


