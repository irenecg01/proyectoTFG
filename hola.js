var filtroEspecialidad = 'todos';

// Función para abrir el modal de agregar
function abrirModalAgregar(tipo) {
  var modal = document.getElementById("modalAgregar");
  var titulo = document.getElementsByTagName("h2")[0];

  modal.style.display = "block";
}

// Función para cerrar el modal de agregar
function cerrarModalCitas() {
  var modal = document.getElementById("modalAgregar");
  modal.style.display = "none";
}

document.getElementById('btnEditar').addEventListener('click', mostrarBotones);

function mostrarBotones() {
  var botonesCita = document.getElementsByClassName("botones-cita");
  for (var i = 0; i < botonesCita.length; i++) {
    if (botonesCita[i].style.display === "none") {
      botonesCita[i].style.display = "block";
    } else {
      botonesCita[i].style.display = "none";
    }
  }
}

// Agregar evento click a los botones de borrar
var botonesBorrar = document.getElementsByClassName("borrar-btn");
for (var i = 0; i < botonesBorrar.length; i++) {
  botonesBorrar[i].addEventListener("click", confirmarBorrado);
}

function confirmarBorrado() {
  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, borrarlo'
  }).then((result) => {
    if (result.isConfirmed) {
      var citaId = this.getAttribute("data-cita-id");
      borrarCita(citaId);
      Swal.fire(
        '¡Borrado!',
        'La cita ha sido eliminada.',
        'success'
      )
    }
  });
}

function borrarCita(citaId) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Analizar la respuesta JSON
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          // La cita se borró exitosamente
          console.log("La cita con ID " + citaId + " se ha borrado correctamente.");

          // Obtener la lista de citas actualizada
          obtenerListaCitas();
        } else {
          // Hubo un error al borrar la cita
          console.error("Error al borrar la cita con ID " + citaId + ": " + response.message);
        }
      } else {
        // Error de solicitud
        console.error("Error al realizar la solicitud: " + xhr.status);
      }
    }
  };

  xhr.open("POST", "borrar_cita.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("citaId=" + citaId);
}

// Obtener todos los botones de especialidad
var botonesEspecialidad = document.getElementsByClassName("especialidad-btn");

// Asignar el evento click a cada botón de especialidad
for (var i = 0; i < botonesEspecialidad.length; i++) {
  botonesEspecialidad[i].addEventListener("click", filtrarCitasPorEspecialidad);
}
function filtrarCitasPorEspecialidad(especialidad) {
  // Mostrar solo las citas de la especialidad seleccionada
  var citas = document.getElementsByClassName("cita");
  for (var i = 0; i < citas.length; i++) {
    var citaEspecialidad = citas[i].querySelector(".cita__especialidad").textContent.trim();

    if (citaEspecialidad === especialidad || especialidad === 'todos') {
      citas[i].style.display = "block";
    } else {
      citas[i].style.display = "none";
    }
  }

  // Actualizar la URL con el parámetro especialidad
  var url = window.location.href.split('?')[0]; // Obtener la URL base sin parámetros
  window.history.pushState({}, '', url + '?especialidad=' + encodeURIComponent(especialidad));
}


function mostrarCitas(especialidad) {
  window.location.href = 'citaMedica.php?especialidad=' + encodeURIComponent(especialidad);
}

// Al cargar la página, mostrar las citas según el filtro de especialidad actual
window.onload = function() {
  filtrarCitasPorEspecialidad();
};


