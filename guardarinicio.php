<?php
// Incluir el archivo de conexión a la base de datos (conexion.php)
require_once 'conexion.php';

// Obtener los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Insertar los datos en la base de datos
$query = "INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $correo);
$stmt->bindParam(2, $contrasena);

if ($stmt->execute()) {
    // Los datos se han guardado correctamente
    echo "Los datos se han guardado correctamente en la base de datos.";
} else {
    // Ha ocurrido un error al guardar los datos
    echo "Ha ocurrido un error al guardar los datos en la base de datos.";
}
?>
