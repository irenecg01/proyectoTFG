<?php
// Incluir el archivo de conexión a la base de datos (conexion.php)
require_once 'conexion.php';

// Obtener los datos del formulario
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$especialidad = $_POST["especialidad"];
$comentario = $_POST["comentario"];
$lugar = $_POST["lugar"];
$motivo = $_POST["motivo"];

// Insertar los datos en la base de datos
$query = "INSERT INTO citas (fecha, hora, especialidad, comentario, lugar, motivo) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(1, $fecha);
$stmt->bindParam(2, $hora);
$stmt->bindParam(3, $especialidad);
$stmt->bindParam(4, $comentario);
$stmt->bindParam(5, $lugar);
$stmt->bindParam(6, $motivo);

if ($stmt->execute()) {
    // Los datos se han guardado correctamente
    echo "Los datos se han guardado correctamente en la base de datos.";
} else {
    // Ha ocurrido un error al guardar los datos
    echo "Ha ocurrido un error al guardar los datos en la base de datos.";
}
?>
