<?php
include("conexion.php");
$horario = isset($_GET['horario']) ? $_GET['horario'] : 'todos';

if ($horario == 'todos') {
  $query = "SELECT am.id, am.nombre, am.imagen, am.descripcion, h.horario FROM anadirmedicamentos am LEFT JOIN horarios h ON am.id = h.medicamentos_id";
} else {
  $query = "SELECT am.id, am.nombre, am.imagen, am.descripcion, h.horario FROM anadirmedicamentos am INNER JOIN horarios h ON am.id = h.medicamentos_id WHERE h.horario = ?";
}

$stmt = $conn->prepare($query);

if ($horario !== 'todos') {
  $stmt->bind_param('s', $horario);
}

$stmt->execute();
$result = $stmt->get_result();
$medicamentos = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $medicamento = array(
      'nombre' => $row['nombre'],
      'imagen' => $row['imagen'],
      'descripcion' => $row['descripcion'],
      'horario' => $row['horario'], 
    );
    array_push($medicamentos, $medicamento);
  }
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($medicamentos);
?>
