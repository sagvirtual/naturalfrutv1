<!-- lista productos -->
<script>
  // Definir una función para cambiar el color de fondo
  function cambiarColorFondo() {
    var colores = ['#000000', '#ff0000', '#00ff00', '#0000ff']; // Lista de colores
    var index = Math.floor(Math.random() * colores.length); // Seleccionar un color al azar
    var color = colores[index]; // Obtener el color seleccionado

    // Aplicar el color de fondo a la celda
    //document.getElementById("celdaTitulo").style.backgroundColor = color;
  }

  // Llamar a la función cuando se cargue la página
  window.onload = function() {
    cambiarColorFondo(); // Cambiar el color de fondo inicialmente
  };
</script>
<?
// Array de colores pasteles
$coloresPasteles = array(
    "#FEFD8F", // amarillo claro
    "#B1C0D8", // violeta
    "#BCAE89", // marron
    "#F95DF9", // magenta
    "#44FA3D", // green
    "#FDFC3D", // yellow
    "#B4D9DF", // celeste laro
    "#FAB030", // naranga
    "#C6B2CB"  // gris rojiso
);

// Variable para almacenar el índice del último color usado
$ultimoIndice = 0;

// Función para obtener el siguiente color pastel del array
function obtenerSiguienteColor(&$ultimoIndice, $coloresPasteles) {
    $str = $coloresPasteles[$ultimoIndice];
    $ultimoIndice = ($ultimoIndice + 1) % count($coloresPasteles); // Avanzar al siguiente índice
    return $str;
}
?>