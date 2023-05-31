<?php
$servername = "localhost";
$username = "root";
$contraseña = "";
$dbname = "cuidate";
$conn = mysqli_connect($servername, $username, $contraseña, $dbname);

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
//echo "Conexión exitosa";

function getEspecialidad() { // esta funcion lo que hace es coger la tabla con todo 

  global $conn;
  
  $sql = "SELECT id,fecha,hora,especialidad,lugar,motivo FROM citas WHERE especialidad = ?";
  $stmt = $conn->prepare($sql); 
  $stmt->execute();
  $result = $stmt->get_result();

  $citas= array();
  while ($row = $result->fetch_assoc()) {
    $citas[] = $row;
  }


  $stmt->close();
  return $citas;
}

