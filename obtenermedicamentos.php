<?php
include("conexion.php");
include("obtenercolorHorario.php");
$horario = isset($_GET['horario']) ? $_GET['horario'] : 'todos';

if ($horario == 'todos') {
  
  $query = "SELECT am.id, am.nombre, am.imagen, h.horario FROM anadirmedicamentos am LEFT JOIN horarios h ON am.id = h.medicamentos_id";

} else {
  // Obtener medicamentos según el horario especificado
  $query = "SELECT am.nombre, am.imagen, h.horario FROM anadirmedicamentos am INNER JOIN horarios h ON am.id = h.medicamentos_id WHERE h.horario = ?";
}

$stmt = $conn->prepare($query);

if ($horario !== 'todos') {
  $stmt->bind_param('s', $horario);
}

$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $nombre = $row['nombre'];
    $imagen = $row['imagen'];

    echo '<div class="medicamento" style="color: white;">';
    echo '<img src="' . $imagen . '" alt="' . $nombre . '" class="medicamento__img">';
    echo '<h3 class="medicamento__nombre">' . $nombre . '</h3>';

    // Obtener los horarios del medicamento
    $query_horarios = "SELECT horario FROM horarios WHERE medicamentos_id = ?";
    $stmt_horarios = $conn->prepare($query_horarios);
    $stmt_horarios->bind_param('i', $row['id']);
    $stmt_horarios->execute();
    $result_horarios = $stmt_horarios->get_result();

    if ($result_horarios->num_rows > 0) {
      echo '<div class="medicamento__info">';
      echo '<p>Horarios:</p>';
      echo '<div class="medicamento__horarios">';
      while ($row_horarios = $result_horarios->fetch_assoc()) {
        $horario = $row_horarios['horario'];
        echo '<button class="horario-btn" style="background-color: ' . obtenerColorHorario($horario) . '; color: white;">' . $horario . '</button>';
      }
      echo '</div>';
      echo '</div>';
    }
    
    echo '</div>';
  }
} else {
  echo 'No se encontraron medicamentos.';
}

$stmt->close();
$stmt_horarios->close();
$conn->close();
?>

