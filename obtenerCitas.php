<?php
include("conexion.php");

$query = "SELECT fecha, hora, especialidad, id, lugar FROM citas ORDER BY hora DESC";
$result = $conn->query($query);

// Definir los colores de las especialidades
$coloresEspecialidades = array(
  "Cardiología" => "#ff7069", // Color rojo
  "Traumatología" => "#ff914c", // Color verde
  "Endocrinología" => "#b8dbbc", // Color azul
  "Oncología" => "#d1ebf7"
  // Agrega más especialidades y colores según necesites
);

while ($row = $result->fetch_assoc()) {
  $fecha = $row['fecha'];
  $hora = $row['hora'];
  $especialidad = $row['especialidad'];
  $citaId = $row['id'];
  $lugar = $row['lugar'];

  echo '<div class="cita">';
  echo '<p class="cita__fecha">' . $fecha . '</p>';
  echo '<p class="cita__hora">' . $hora . '</p>';
  echo '<p class="cita__lugar">' . $lugar . '</p>';
  echo '<button class="especialidad-btn" data-especialidad="' . $especialidad . '" style="background-color: ' . $coloresEspecialidades[$especialidad] . '">' . $especialidad . '</button>';

  // Contenedor de botones ocultos de editar y borrar
  echo '<div class="botones-cita" style="display: none;">';
  echo '<button class="editar-btn">Editar</button>'. ' ';
  echo '<button class="borrar-btn" data-cita-id="' . $citaId . '">Borrar</button>';
  echo '</div>';

  echo '</div>';
}

$conn->close();
?>
