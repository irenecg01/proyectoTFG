<?php
include ("conexion.php");
$horario = $_POST['horario'];
$horaActual = date("H");

// Realiza la consulta a la base de datos para obtener los medicamentos según el horario
$query = "SELECT m.nombre FROM medicamentos m
          INNER JOIN horarios h ON m.id = h.medicamentos_id
          WHERE h.horario = ? AND h.hora = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("ss", $horario, $horaActual);
$stmt->execute();
$result = $stmt->get_result();

// Genera el HTML para mostrar los medicamentos
$html = '<ul>';
while ($row = $result->fetch_assoc()) {
   $html .= '<li>' . $row['nombre'] . '</li>';
}
$html .= '</ul>';

// Devuelve el resultado como respuesta
echo $html;
?>


