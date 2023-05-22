<?php
include("conexion.php");

$horario = isset($_GET['horario']) ? $_GET['horario'] : 'todos';

if ($horario == 'todos') {
  // Obtener todos los medicamentos sin restricciones de horario
  $query = "SELECT nombre, imagen FROM anadirmedicamentos";
} else {
  // Obtener medicamentos según el horario especificado
  $query = "SELECT am.nombre, am.imagen FROM anadirmedicamentos am INNER JOIN horarios h ON am.id = h.medicamentos_id WHERE h.horario = ?";
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

    echo '<div class="medicamento">';
    echo '<img src="' . $imagen . '" alt="' . $nombre . '" class="medicamento__img">';
    echo '<h3 class="medicamento__nombre">' . $nombre . '</h3>';
    echo '</div>';
  }
} else {
  echo 'No se encontraron medicamentos.';
}

$stmt->close();
$conn->close();
?>
