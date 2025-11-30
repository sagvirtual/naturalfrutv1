<script>
    /* listafecha */
  
    function convertirfechalis() {
    var fechalis = document.getElementById('fechalis');
    var nuevoInputx = document.createElement('input');
    nuevoInputx.type = 'date';
    nuevoInputx.min = '<?=$fechahoy?>';
    nuevoInputx.value = fechalis.textContent;
    nuevoInputx.id = 'textoInputx';
    nuevoInputx.style.width = '110px';
    fechalis.parentNode.replaceChild(nuevoInputx, fechalis);
    nuevoInputx.focus();
    fechalis.addEventListener('click', convertirfechalis); // Agregar el evento click aquí
    nuevoInputx.addEventListener('blur', actualizarTextox);

   
    
  }

  function actualizarTextox() {
    var textoInputx = document.getElementById('textoInputx');
    var nuevoTextotx = textoInputx.value;
    var fechalis = document.createElement('font');
    fechalis.style.color = 'white';

    // Formatear la fecha al formato dd/mm/yyyy
    var partesFecha = nuevoTextotx.split("-");
    var fechaFormateada = partesFecha[2] + "/" + partesFecha[1] + "/" + partesFecha[0];
    
    fechalis.textContent = fechaFormateada; // Asignar la fecha formateada
    fechalis.id = 'fechalis';
    fechalis.addEventListener('click', convertirfechalis); // Agregar el evento click aquí
    textoInputx.parentNode.replaceChild(fechalis, textoInputx); // Reemplazar textoInputx directamente
      // Llamada a la función ajax_fecha()
      if(textoInputx.value!==''){
      ajax_fecha(textoInputx.value); // Pasamos el valor del nuevo input date como parámetro
    }
  }






    /* COMPRA MINIMA */
  function convertircommin() {
    var commin = document.getElementById('commin');
    var nuevoInputb = document.createElement('input');
    nuevoInputb.type = 'text';
    nuevoInputb.value = commin.textContent;
    nuevoInputb.id = 'textoInputb';
       // Define el ancho del input en 200 píxeles
       nuevoInputb.style.width = '80px';
    commin.parentNode.replaceChild(nuevoInputb, commin);
    nuevoInputb.focus();
    nuevoInputb.addEventListener('blur', actualizarTextob);
  }

  function actualizarTextob() {
    var textoInputb = document.getElementById('textoInputb');
    var nuevoTextob = textoInputb.value;
    var commin = document.createElement('font');
    commin.style.color = 'white';
    commin.textContent = nuevoTextob;
    commin.id = 'commin';
    commin.addEventListener('click', convertircommin);
    textoInputb.parentNode.replaceChild(commin, textoInputb);
    /* ajax */
    if(textoInputb.value!==''){
      ajax_compramin(textoInputb.value); 
    }
  }

      /* COMPRA envio */
      function convertircomenv() {
    var comenv = document.getElementById('comenv');
    var nuevoInputc = document.createElement('input');
    nuevoInputc.type = 'text';
    nuevoInputc.value = comenv.textContent;
    nuevoInputc.id = 'textoInputc';
       // Define el ancho del input en 200 píxeles
       nuevoInputc.style.width = '100px';
    comenv.parentNode.replaceChild(nuevoInputc, comenv);
    nuevoInputc.focus();
    nuevoInputc.addEventListener('blur', actualizarTextoc);
  }

  function actualizarTextoc() {
    var textoInputc = document.getElementById('textoInputc');
    var nuevoTextoc = textoInputc.value;
    var comenv = document.createElement('font');
    comenv.style.color = 'white';
    comenv.textContent = nuevoTextoc;
    comenv.id = 'comenv';
    comenv.addEventListener('click', convertircomenv);
    textoInputc.parentNode.replaceChild(comenv, textoInputc);
      /* ajax */
      if(textoInputc.value!==''){
      ajax_commmenor(textoInputc.value); 
    }
  }
  



    /* NO SE ACEPTAN AGREGADOS */
  function convertirEnInput() {
    var noseacep = document.getElementById('noseacep');
    var nuevoInput = document.createElement('input');
    nuevoInput.type = 'text';
    nuevoInput.value = noseacep.textContent;
    nuevoInput.id = 'textoInput';
       // Define el ancho del input en 200 píxeles
       nuevoInput.style.width = '400px';
    noseacep.parentNode.replaceChild(nuevoInput, noseacep);
    nuevoInput.focus();
    nuevoInput.addEventListener('blur', actualizarTexto);
  }

  function actualizarTexto() {
    var textoInput = document.getElementById('textoInput');
    var nuevoTexto = textoInput.value;
    var noseacep = document.createElement('font');
    noseacep.style.color = 'white';
    noseacep.textContent = nuevoTexto;
    noseacep.id = 'noseacep';

    noseacep.addEventListener('click', convertirEnInput);
    textoInput.parentNode.replaceChild(noseacep, textoInput);
      /* ajax */
      if(textoInput.value !==''){
        ajax_noseac(textoInput.value); 
    }
  }
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
<script>
  $(document).ready(function(){
    
    $("#colorpicker").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color como fondo de la celda de la tabla
            $('#colorCell').css('background-color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInput').val(selectedColor);

            // Llamar a la función ajax_editlista() con el nuevo valor
          

            ajax_color1(selectedColor);
            
        }
    });

    $("#colorpickerB").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color como fondo de la celda de la tabla
            $('#colorCellB').css('background-color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputB').val(selectedColor);
            ajax_color4(selectedColor);
        }
    });

    $("#colorpickerC").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color como fondo de la celda de la tabla
            $('#colorCellC').css('background-color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputC').val(selectedColor);
            ajax_color7(selectedColor);
        }
    });

    /* color texto  no se aceptan*/
        $("#colorpickerTA").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color en el texto
            $('#noseacep').css('color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputTA').val(selectedColor);
            ajax_color8(selectedColor);
        }
    });

        /* color texto compra minima*/
        $("#colorpickerTB").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color en el texto
            $('#colorpickerTB').css('color', selectedColor);
            $('#colorpickerTBa').css('color', selectedColor);
            $('#colorpickerTBb').css('color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputTB').val(selectedColor);
            ajax_color5(selectedColor);
        }
    });       
    
    /* color texto valor compra minima */
        $("#colorpickerTC").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color en el texto
            $('#commin').css('color', selectedColor);
            $('#comenv').css('color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputTC').val(selectedColor);
            ajax_color6(selectedColor);
        }
    });  
    
    /* color texto valor precios */
        $("#colorpickerTer").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color en el texto
            $('#colorpickerTer').css('color', selectedColor);
            $('#colorpickerTera').css('color', selectedColor);
            $('#colorpickerTerb').css('color', selectedColor);
            $('#colorpickerTerc').css('color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputTer').val(selectedColor);
            ajax_color2(selectedColor);
        }
    });   
    
    /* color texto fecha */
        $("#colorpickerFE").spectrum({
        change: function(color) {
            // Obtener el color seleccionado
            var selectedColor = color.toHexString();
            // Aplicar el color en el texto
            $('#fechalis').css('color', selectedColor);
            // Mostrar el código hexadecimal en el campo de entrada
            $('#hexInputFE').val(selectedColor);
            ajax_color3(selectedColor);
        }
    });

});

/* ajax */ 

function ajax_fecha(fechalis){
var parametros = {
"idlis":'<?= $idcod?>',
"fechalis":fechalis
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color1").html(response);
         }
      });
}


var fechalis=document.getElementById('fechalis');



function ajax_compramin(comminima){
var parametros = {
"idlis":'<?= $idcod?>',
"comminima":comminima
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color1").html(response);
         }
      });
}

function ajax_commmenor(commmenor){
var parametros = {
"idlis":'<?= $idcod?>',
"commmenor":commmenor
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color1").html(response);
         }
      });
}

function ajax_noseac(noseac){
var parametros = {
"idlis":'<?= $idcod?>',
"noseac":noseac
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color1").html(response);
         }
      });
}




function ajax_color1(color1){
var parametros = {
"idlis":'<?= $idcod?>',
"color1":color1
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color1").html(response);
         }
      });
}

function ajax_color2(color2){
var parametros = {
"idlis":'<?= $idcod?>',
"color2":color2
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color2").html(response);
         }
      });
}

function ajax_color3(color3){
var parametros = {
"idlis":'<?= $idcod?>',
"color3":color3
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color3").html(response);
         }
      });
}

function ajax_color4(color4){
var parametros = {
"idlis":'<?= $idcod?>',
"color4":color4
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color4").html(response);
         }
      });
}

function ajax_color5(color5){
var parametros = {
"idlis":'<?= $idcod?>',
"color5":color5
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color5").html(response);
         }
      });
}

function ajax_color6(color6){
var parametros = {
"idlis":'<?= $idcod?>',
"color6":color6
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color6").html(response);
         }
      });
}

function ajax_color7(color7){
var parametros = {
"idlis":'<?= $idcod?>',
"color7":color7
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color7").html(response);
         }
      });
}


function ajax_color8(color8){
var parametros = {
"idlis":'<?= $idcod?>',
"color8":color8
};
$.ajax({
         data: parametros,
         url: 'insert_editlista.php',
         type: 'POST',
         success: function(response){
                  $("#color8").html(response);
         }
      });
}
</script>

<!-- para poner porcentajes -->

<script>
    function mostrarInput() {
      var inputContainer = document.querySelector('.input-container');
      if (inputContainer.style.display === 'none' || inputContainer.style.display === '') {
        inputContainer.style.display = 'block'; // Mostrar el contenedor de input si está oculto
      } else {
        inputContainer.style.display = 'none'; // Ocultar el contenedor de input si está visible
      }
    }
    function mostrarInputb() {
      var inputContainerb = document.querySelector('.input-containerb');
      if (inputContainerb.style.display === 'none' || inputContainerb.style.display === '') {
        inputContainerb.style.display = 'block'; // Mostrar el contenedor de input si está oculto
      } else {
        inputContainerb.style.display = 'none'; // Ocultar el contenedor de input si está visible
      }
    }

    function mostrarInputc() {
      var inputContainerc = document.querySelector('.input-containerc');
      if (inputContainerc.style.display === 'none' || inputContainerc.style.display === '') {
        inputContainerc.style.display = 'block'; // Mostrar el contenedor de input si está oculto
      } else {
        inputContainerc.style.display = 'none'; // Ocultar el contenedor de input si está visible
      }
    }
  </script>