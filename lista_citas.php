<?php
include("conexion.php");

// Función para obtener la ruta del icono de la especialidad
function obtenerIconoEspecialidad($especialidad) {
  return "iconos/" . strtolower($especialidad) . ".png";
}

$especialidadFiltrada = 'todos'; // Inicializar la variable con un valor predeterminado

// Verificar si se ha recibido el parámetro de especialidad en la URL
if (isset($_GET['especialidad'])) {
  $especialidadFiltrada = $_GET['especialidad'];
}

if ($especialidadFiltrada === 'todos') {
  $query = "SELECT fecha, hora, especialidad, id, lugar FROM citas ORDER BY hora DESC";
} else {
  $especialidadFiltrada = strtolower($especialidadFiltrada);
  $query = "SELECT fecha, hora, especialidad, id, lugar FROM citas WHERE LOWER(especialidad) = '$especialidadFiltrada' ORDER BY hora DESC";
}

$result = $conn->query($query);

// Definir los colores de las especialidades
$coloresEspecialidades = array(
  "Cardiología" => "#ff7069", // Color rojo
  "Traumatología" => "#ff914c", // Color verde
  "Endocrinología" => "#b8dbbc", // Color azul
  "Oncología"=> "#d1ebf7",
);

while ($row = $result->fetch_assoc()) {
  $fecha = date("d/m/Y", strtotime($row['fecha']));
  $hora = substr($row['hora'], 0, 5); 
  $especialidad = $row['especialidad'];
  $citaId = $row['id'];
  $lugar = $row['lugar'];

  echo '<div class="cita">';
  echo '<p class="cita__fecha">' . $fecha . '</p>';
  echo '<p class="cita__hora">' . $hora . '</p>';
  echo '<p class="cita__lugar">' . $lugar . '</p>';
  echo '<button class="especialidad-btn" onclick="mostrarCitas(\'' . $especialidad . '\')" style="background-color: ' . $coloresEspecialidades[$especialidad] . '">' . $especialidad . '</button>';

  echo '<div class="botones-cita" style="display: none;">';

  // Botón de editar con el icono
  echo '<button class="editar-btn"><i class="fas fa-edit"></i> Editar</button>'. ' ';

  // Botón de borrar con el icono
  echo '<button class="borrar-btn" data-cita-id="' . $citaId . '"><i class="fas fa-trash"></i> Borrar</button>';

  echo '</div>';

  echo '</div>';
}
?>

<script src="lista_citas.js"></script>
