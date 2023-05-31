<?php
include("conexion.php");

$query = "SELECT nombre, imagen FROM anadirmedicamentos";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
  $nombre = $row['nombre'];
  $imagen = $row['imagen'];
 

  echo '<div class="medicamento">';
  echo '<img src="' . $imagen . '" alt="' . $nombre . '" class="medicamento__img">';
  echo '</div>';
}

$conn->close();
?>
