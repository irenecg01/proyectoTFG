<?php
include("conexion.php");

if (isset($_POST['citaId'])) {
  $citaId = $_POST['citaId'];

  // Realizar la lógica para borrar la cita utilizando el ID proporcionado
  
  // Por ejemplo, podrías ejecutar una consulta SQL DELETE para borrar la cita de la base de datos
  $query = "DELETE FROM citas WHERE id = $citaId";
  $result = $conn->query($query);
  if ($result) {
    // El borrado fue exitoso
    echo json_encode(array('success' => true));
  } else {
    // Hubo un error al borrar la cita
    echo json_encode(array('success' => false, 'message' => 'Error al borrar la cita'));
  }
}  

$conn->close();
?>
