<?php
include("conexion.php");

$query = "SELECT fecha,hora FROM citasmedicas";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
  $fecha = $row['fecha'];
  $hora = $row['hora'];

  echo '<div class="medicamento">';
  echo '<img src="' . $imagen . '" alt="' . $nombre . '" class="medicamento__img">';
  echo '<h3 class="medicamento__nombre">' . $nombre . '</h3>';
  echo '</div>';
}

$conn->close();
?>
