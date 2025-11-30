<script>
    $(document).ready(function() {
        updateRemaining();
    });



    function updateRemaining() {
        // Obtener el valor total pendiente de pago

        let saldoreald = document.getElementById('saldoreal').value.replace(/\./g, "").replace(/,/g, ".");

        let saldoreal = parseFloat(saldoreald) || 0;


// Convierte el valor a número para hacer una comparación correcta
if (parseFloat(saldoreal) > 0) {
    var totalPago = saldoreal; // Ya tenemos el valor
} else {

    
    var totalPago = <?=$totalite?>;
    
}

document.getElementById('faltapag').value = totalPago.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

// Obtener los valores ingresados en los campos de pago
let efectivo = document.getElementById('fefecivo').value.replace(/\./g, "").replace(/,/g, ".");
let cheque = document.getElementById('fcheque').value.replace(/\./g, "").replace(/,/g, ".");
let transferencia = document.getElementById('ftransfer').value.replace(/\./g, "").replace(/,/g, ".");
let deposito = document.getElementById('fdeposito').value.replace(/\./g, "").replace(/,/g, ".");

// Convertir los valores a float después de limpiar las cadenas
let efectivoa = parseFloat(efectivo) || 0;
let chequea = parseFloat(cheque) || 0;
let transferenciaa = parseFloat(transferencia) || 0;
let depositoa = parseFloat(deposito) || 0;

// Calcular el total pagado
let totalPagado = efectivoa + chequea + transferenciaa + depositoa;

        // Actualizar el valor de "faltapag"
        let faltante = totalPago - totalPagado;

        // Mostrar el valor restante en el campo "faltapag"
        document.getElementById('faltapag').value = faltante.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

/* 
    function formatoMoneda(input) {
  var num = input.value.replace(/\./g, '');
  if (!isNaN(num)) {
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/, '');
      input.value = num;
  }

  else {
      input.value = input.value.replace(/[^\d,.]/g, '');
  }
}
 */

   

function ajax_pagnota() {
            var parametros = {
                "fefecivo": document.getElementById('fefecivo').value,
                "fcheque": document.getElementById('fcheque').value,
                "ftransfer": document.getElementById('ftransfer').value,
                "fdeposito": document.getElementById('fdeposito').value,
                "comment": document.getElementById('comment').value,
                "idorden": '<?=$id_orden?>'
                /* ,
                "numero": document.getElementById('numero').value,
                "numeror": document.getElementById('numeror').value */
            };
            $.ajax({
                data: parametros,
                url: 'insForPagNot.php',
                type: 'POST',
                beforeSend: function() {
                    $("#muestroorden7").html('');
                },
                success: function(response) {
                    $("#muestroorden7").html(response);
                }
            });
        }

</script>