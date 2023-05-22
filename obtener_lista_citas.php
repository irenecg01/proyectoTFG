<?php
include("conexion.php");

// Obtener la lista de citas desde la base de datos
$query = "SELECT fecha, hora, especialidad, id FROM citas ORDER BY hora DESC";
$result = $conn->query($query);

$citas = array();

while ($row = $result->fetch_assoc()) {
  $cita = array(
    'fecha' => $row['fecha'],
    'hora' => $row['hora'],
    'especialidad' => $row['especialidad'],
    'id' => $row['id']
  );

  $citas[] = $cita;
}

// Devolver la lista de citas como respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($citas);

$conn->close();
?>
