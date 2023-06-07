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
  asignarEventoEspecialidad(botonesEspecialidad[i]);
}

// Función para asignar el evento click a un botón de especialidad
function asignarEventoEspecialidad(botonEspecialidad) {
  // Obtener el texto de la especialidad
  var especialidadTexto = botonEspecialidad.textContent;
  var especialidadMayusculas = especialidadTexto.toUpperCase();

  // Establecer el texto en mayúsculas y más grande en el botón de especialidad
  botonEspecialidad.textContent = especialidadMayusculas;
  botonEspecialidad.style.fontSize = "0.8em";

  // Asignar el evento click con la especialidad
  botonEspecialidad.addEventListener("click", function() {
    var especialidad = this.textContent;
    mostrarCitas(especialidad);
  });
}
// Función para mostrar las citas según la especialidad
function mostrarCitas(especialidad) {
  var especialidadFiltrada = especialidad.toLowerCase();
  window.location.href = 'citaMedica.php?especialidad=' + encodeURIComponent(especialidadFiltrada);
}

// Al cargar la página, mostrar las citas según el filtro de especialidad actual
window.onload = function() {
  filtrarCitasPorEspecialidad();
};

function filtrarCitasPorEspecialidad() {
  // Obtener el parámetro de especialidad de la URL
  var urlParams = new URLSearchParams(window.location.search);
  var especialidad = urlParams.get('especialidad');

  // Obtener todos los botones de especialidad
  var botonesEspecialidad = document.getElementsByClassName("especialidad-btn");

  // Iterar sobre los botones de especialidad
  for (var i = 0; i < botonesEspecialidad.length; i++) {
    var botonEspecialidad = botonesEspecialidad[i];
    var especialidadTexto = botonEspecialidad.textContent.toLowerCase();

    if (especialidadTexto === especialidad) {
      // Resaltar el botón de la especialidad actual
      botonEspecialidad.classList.add("active");
    } else {
      // Quitar el resaltado de los demás botones de especialidad
      botonEspecialidad.classList.remove("active");
    }
  }
}

// Al cargar la página, mostrar las citas según el filtro de especialidad actual
window.onload = function() {
  filtrarCitasPorEspecialidad();
};


// Agregar evento click a los botones de editar
var botonesEditar = document.getElementsByClassName("editar-btn");
for (var i = 0; i < botonesEditar.length; i++) {
  botonesEditar[i].addEventListener("click", mostrarFormularioEdicion.bind(botonesEditar[i]));
}

function mostrarFormularioEdicion() {
  var citaId = this.getAttribute("data-cita-id");
  var fecha = this.getAttribute("data-fecha");
  var hora = this.getAttribute("data-hora");
  var especialidad = this.getAttribute("data-especialidad");
  var lugar = this.getAttribute("data-lugar");
  var motivo = this.getAttribute("data-motivo");
  var comentario = this.getAttribute("data-comentario");

  // Mostrar el formulario de edición
  var formularioEdicion = document.getElementById("formulario-edicion");
  formularioEdicion.style.display = "block";

  // Establecer los valores en los campos del formulario de edición
  document.getElementById("nuevo-fecha").value = fecha;
  document.getElementById("nuevo-hora").value = hora;
  document.getElementById("nuevo-especialidad").value = especialidad;
  document.getElementById("nuevo-lugar").value = lugar;
  document.getElementById("nuevo-motivo").value = motivo;
  document.getElementById("nuevo-comentario").value = comentario;

  var btnGuardar = document.getElementById("btn-guardar");
  btnGuardar.setAttribute("data-cita-id", citaId); // Establecer el ID de la cita en el botón de guardar

  btnGuardar.addEventListener("click", function() {
    guardarEdicionCita(citaId);
  });
}

function guardarEdicionCita(citaId) {
  var nuevaFecha = document.getElementById("nuevo-fecha").value;
  var nuevaHora = document.getElementById("nuevo-hora").value;
  var nuevaEspecialidad = document.getElementById("nuevo-especialidad").value;
  var nuevoLugar = document.getElementById("nuevo-lugar").value;
  var nuevoMotivo = document.getElementById("nuevo-motivo").value;
  var nuevoComentario = document.getElementById("nuevo-comentario").value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Analizar la respuesta JSON
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          // Cita editada exitosamente
          console.log("La cita con ID " + citaId + " se ha editado correctamente.");

          // Ocultar el formulario de edición
          var formularioEdicion = document.getElementById("formulario-edicion");
          formularioEdicion.style.display = "none";

          // Actualizar la lista de citas con los cambios realizados
          obtenerListaCitas();
        } else {
          // Error al editar la cita
          console.error("Error al editar la cita con ID " + citaId + ": " + response.message);
        }
      } else {
        // Error de solicitud
        console.error("Error al realizar la solicitud: " + xhr.status);
      }
    }
  };

  xhr.open("POST", "editar_cita.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("citaId=" + citaId + "&fecha=" + nuevaFecha + "&hora=" + nuevaHora + "&especialidad=" + nuevaEspecialidad + "&lugar=" + nuevoLugar + "&motivo=" + nuevoMotivo + "&comentario=" + nuevoComentario);
}
