<?php
include("conexion.php");

if (isset($_POST['citaId'])) {
  $citaId = $_POST['citaId'];
  $nuevaFecha = $_POST['fecha'];
  $nuevaHora = $_POST['hora'];
  $nuevaEspecialidad = $_POST['especialidad'];
  $nuevoLugar = $_POST['lugar'];
  $nuevoMotivo = $_POST['motivo'];
  $nuevoComentario = $_POST['comentario'];

  // Agrega mensajes de depuración para verificar los valores recibidos
  error_log("citaId: " . $citaId);
  error_log("nuevaFecha: " . $nuevaFecha);
  error_log("nuevaHora: " . $nuevaHora);
  error_log("nuevaEspecialidad: " . $nuevaEspecialidad);
  error_log("nuevoLugar: " . $nuevoLugar);
  error_log("nuevoMotivo: " . $nuevoMotivo);
  error_log("nuevoComentario: " . $nuevoComentario);

  $query = "UPDATE citas SET fecha = '$nuevaFecha', hora = '$nuevaHora', especialidad = '$nuevaEspecialidad', lugar = '$nuevoLugar', motivo = '$nuevoMotivo', comentario = '$nuevoComentario' WHERE id = $citaId";
  $result = $conn->query($query);

  if ($result) {
    // Los cambios se guardaron correctamente
    echo json_encode(array('success' => true));
  } else {
    // Hubo un error al guardar los cambios
    echo json_encode(array('success' => false, 'message' => 'Error al guardar los cambios.'));
  }
}

$conn->close();
?>
