<?php
// Configuración de la conexión a la base de datos
$host = "localhost"; // Cambiar por el nombre del servidor de la base de datos
$dbname = "cuidate"; // Cambiar por el nombre de la base de datos
$username = "root"; // Cambiar por el nombre de usuario de la base de datos
$password = ""; // Cambiar por la contraseña de la base de datos
$conn = mysqli_connect($host, $username, $password, $dbname);
try {
  // Crear una nueva conexión PDO
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  // Configurar el modo de error de PDO para que genere excepciones en caso de errores
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // En caso de error, mostrar un mensaje y terminar la ejecución del script
  die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
