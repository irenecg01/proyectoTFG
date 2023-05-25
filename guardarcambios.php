<?php
include("conexion.php");

if (isset($_POST['citaId'])) {
    $citaId = $_POST['citaId'];
    // Recibir los datos del formulario y realizar la validación y limpieza necesaria
    $nombre = $_POST['nombre'];
    // Otros campos del formulario

    // Realizar la consulta para actualizar los datos en la base de datos
    $query = "UPDATE citas SET nombre = '$nombre' WHERE id = $citaId";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Los cambios se guardaron correctamente
        echo "Los cambios se guardaron correctamente.";
    } else {
        // Hubo un error al guardar los cambios
        echo "Error al guardar los cambios: " . mysqli_error($conexion);
    }
} else {
    // No se recibió el ID de la cita, mostrar un mensaje de error o redirigir a otra página
    echo "ID de cita no especificado.";
}

$conexion->close();
?>
