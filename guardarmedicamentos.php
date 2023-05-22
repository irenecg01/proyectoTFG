<?php
include("conexion.php");

if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_FILES["imagen"])) {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_archivo = "img/uploads/" . $nombre_archivo;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_archivo);

    try {
        $query = "INSERT INTO anadirmedicamentos (nombre, descripcion, imagen) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $nombre, $descripcion, $ruta_archivo);
        $stmt->execute();
        $medicamento_id = $stmt->insert_id;  // Obtener el ID del medicamento recién insertado
        $stmt->close();

        // Insertar el horario en la tabla 'horarios'
        if (isset($_POST['horario'])) {
            $horarios = $_POST['horario'];
            foreach ($horarios as $horario) {
                $query = "INSERT INTO horarios (medicamentos_id, horario) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('is', $medicamento_id, $horario);
                $stmt->execute();
                $stmt->close();
            }
        }

        echo "Los datos se han insertado correctamente en la base de datos.";
    } catch (PDOException $e) {
        echo "Error al insertar los datos en la base de datos: " . $e->getMessage();
    }

    $conn->close();

} else {
    echo "Error. Faltan datos en el formulario.";
}
?>
