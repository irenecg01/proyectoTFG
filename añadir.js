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

// Función para mostrar los medicamentos
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
        asignarEventosVerMas();
      } else {
        console.log('Error al cargar los medicamentos.');
      }
    }
  };
  xhr.send();
}

// Llamar a la función para mostrar todos los medicamentos al cargar la página
mostrarMedicamentos('todos');

// Obtener la hora actual del usuario
function obtenerHoraActual() {
  var fechaActual = new Date();
  var hora = fechaActual.getHours();
  return hora;
}

function obtenerHorarioSegunHora(hora) {
  if (hora >= 5 && hora < 12) {
    return 'mañana';
  } else if (hora >= 12 && hora < 13) {
    return 'mediodía';
  } else if (hora >= 13 && hora < 15) {
    return 'almuerzo';
  } else if (hora >= 15 && hora < 18) {
    return 'merienda';
  } else if (hora >= 18 && hora < 21) {
    return 'cena';
  } else {
    return 'noche';
  }
}


// Mostrar los medicamentos según el horario actual
function mostrarMedicamentosSegunHoraActual() {
  var horaActual = obtenerHoraActual();
  var horario = obtenerHorarioSegunHora(horaActual);
  mostrarMedicamentos(horario);
}

// Mostrar todos los medicamentos
function mostrarTodosLosMedicamentos() {
  mostrarMedicamentos('todos');
}

// Función para mapear los valores de horario a rangos de horas reales
function mapearHorario(horario) {
  switch (horario) {
    case 'mañana':
      return '7:00 - 9:00';
    case 'mediodía':
      return '12:00 - 13:00';
    case 'almuerzo':
      return '13:00 - 14:00';
    case 'merienda':
      return '16:00 - 17:00';
    case 'cena':
      return '19:00 - 20:00';
    case 'noche':
      return '21:00 - 22:00';
    default:
      return 'Sin horario especificado';
  }
}




// Mostrar los medicamentos según el horario
function mostrarMedicamentos(horario) {
  var xhr = new XMLHttpRequest();
  var url = 'obtenermedicamentos.php';

  if (horario !== 'todos') {
    url += '?horario=' + encodeURIComponent(horario);
  }

  xhr.open('GET', url);
  xhr.onload = function () {
    if (xhr.status === 200) {
      var medicamentos = JSON.parse(xhr.responseText);
      var listaMedicamentos = document.getElementById('lista_medicamentos');
      listaMedicamentos.innerHTML = '';

      if (medicamentos.length > 0) {
        medicamentos.forEach(function (medicamento) {
          var divMedicamento = document.createElement('div');
          divMedicamento.classList.add('medicamento');

          var imgMedicamento = document.createElement('img');
          imgMedicamento.src = medicamento.imagen;
          imgMedicamento.alt = medicamento.nombre;
          imgMedicamento.classList.add('medicamento__img');

          var h3Nombre = document.createElement('h3');
          h3Nombre.classList.add('medicamento__nombre');
          //h3Nombre.textContent = medicamento.nombre;

          var buttonVerMas = document.createElement('button');
          buttonVerMas.classList.add('ver-mas-btn');
          buttonVerMas.textContent = 'Ver más';

          buttonVerMas.addEventListener('click', function () {
            var horaReal = mapearHorario(medicamento.horario); // Obtener el rango de horas mapeado
          
            var [horaInicio, horaFin] = horaReal.split(' - '); // Divide el rango en hora de inicio y hora de fin
          
            var horaInicioParts = horaInicio.split(':'); // Divide la hora de inicio en horas y minutos
            var horaFinParts = horaFin.split(':'); // Divide la hora de fin en horas y minutos
          
            var hora = new Date(); // Crea una nueva instancia de Date
          
            // Establece las horas y minutos de inicio en la instancia de Date
            hora.setHours(parseInt(horaInicioParts[0]));
            hora.setMinutes(parseInt(horaInicioParts[1]));
          
            var horaFormateada = hora.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
          
            Swal.fire({
              html: '<h3>' + medicamento.nombre + '</h3>' +
                '<p>' + medicamento.descripcion + '</p>' +
                '<p>Tomar entre las ' + horaFormateada + ' y las ' + horaFin + '</p>' +
                '<div class="checkbox-container">' +
                '<label><input type="checkbox" id="checkMedicacion"> Si te la has tomado marcala </label>' +
                '</div>',
              icon: 'info',
              confirmButtonText: 'Cerrar',
              onOpen: function () {
                // Obtener el elemento del checkbox
                var checkbox = document.getElementById('checkMedicacion');
                // Agregar un evento para escuchar el cambio en el estado del checkbox
                checkbox.addEventListener('change', function () {
                  if (checkbox.checked) {
                    // Si el checkbox está marcado, mostrar un mensaje de confirmación
                    Swal.fire('Medicación tomada', 'Has marcado la medicación como tomada', 'success');
                  }
                });
              }
            });

          });

          divMedicamento.appendChild(imgMedicamento);
          divMedicamento.appendChild(h3Nombre);
          divMedicamento.appendChild(buttonVerMas);

          listaMedicamentos.appendChild(divMedicamento);
        });
      } else {
        var pSinMedicamentos = document.createElement('p');
        pSinMedicamentos.textContent = 'No se encontraron medicamentos.';
        listaMedicamentos.appendChild(pSinMedicamentos);
      }
    } else {
      console.log('Error al cargar los medicamentos.');
    }
  };
  xhr.send();
}


// Llamar a la función para mostrar los medicamentos según el horario actual al cargar la página
document.addEventListener('DOMContentLoaded', mostrarMedicamentosSegunHoraActual);

// Llamar a la función para mostrar todos los medicamentos al hacer clic en "Mostrar todo"
var mostrarTodoButton = document.getElementById('mostrar_todo_btn');
mostrarTodoButton.addEventListener('click', mostrarTodosLosMedicamentos);
