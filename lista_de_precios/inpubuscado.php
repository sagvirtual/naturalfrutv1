    <style>
        .seleccionado {
            background-color: #ccc;
        }

        .no-seleccionado {
            background-color: #fff;
        }
    </style>
    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar Producto..." value="<?= $producto ?>" autocomplete="off"
        onchange="ajax_buscars($('#buscar').val())" autocomplete="off">





    <script>
        function ajax_buscars(buscar) {
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
            });
        }
    </script>