let porcentaje = 0;
const porcentajeTexto = document.getElementById("porcentaje");
const loader = document.getElementById("loader");
const contenido = document.getElementById("contenido");

// Simula el progreso de carga
const intervalo = setInterval(() => {
  porcentaje++;
  porcentajeTexto.textContent = porcentaje + "%";

  if (porcentaje >= 100) {
    clearInterval(intervalo);
    loader.style.display = "none";
    contenido.style.display = "block";
  }
}, 30); // Velocidad: menor es más rápido
