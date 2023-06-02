<?php
include("conexion.php");

$query = "SELECT nombre, imagen FROM anadirmedicamentos";
$result = $conn->query($query);

echo '<ul>';
while ($row = $result->fetch_assoc()) {
  $nombre = $row['nombre'];
  $imagen = $row['imagen'];
  echo '<li class="medicamento">'; // Agregar la clase "medicamento" al elemento <li>
  echo '<img src="' . $imagen . '" alt="' . $nombre . '" class="medicamento__img">'; // Agregar la clase "medicamento__img" al elemento <img>
   echo '<h3 class="medicamento__nombre">' . $nombre . '</h3>'; // Agregar la clase "medicamento__nombre" al elemento <h3>
  echo '</li>';
}
echo '</ul>';

$conn->close();
?>
