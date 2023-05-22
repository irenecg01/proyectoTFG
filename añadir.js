// Función para abrir el modal
function abrirModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}

// Función para cerrar el modal
function cerrarModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}


function mostrarMedicamentos(horario) {
  var xhr = new XMLHttpRequest();
  var url = 'obtenermedicamentos.php';

  if (horario !== 'todos') {
    url += '?horario=' + encodeURIComponent(horario);
  }

  xhr.open('GET', url, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        document.getElementById('lista_medicamentos').innerHTML = xhr.responseText;
      } else {
        console.log('Error al cargar los medicamentos.');
      }
    }
  };
  xhr.send();
}

// Llamar a la función para mostrar todos los medicamentos al cargar la página
mostrarMedicamentos('todos');