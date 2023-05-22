<?php
include("conexion.php");

// Obtén la especialidad seleccionada desde la solicitud POST
$especialidad = $_POST['especialidad'];

// Prepara la consulta SQL para obtener las citas de esa especialidad
$query = "SELECT fecha, hora, especialidad, id FROM citas WHERE especialidad = '$especialidad' ORDER BY hora DESC";
$result = $conn->query($query);

// Crea un array para almacenar las citas
$citas = array();

while ($row = $result->fetch_assoc()) {
  $cita = array(
    'fecha' => $row['fecha'],
    'hora' => $row['hora'],
    'especialidad' => $row['especialidad'],
    'id' => $row['id']
  );

  // Agrega la cita al array de citas
  $citas[] = $cita;
}

// Devuelve el array de citas como una respuesta JSON
echo json_encode($citas);

$conn->close();
?>
