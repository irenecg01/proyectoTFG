<?php

include ("conexion.php");

$especialidadSeleccionada = $_GET['especialidad'];

$sql = "SELECT * FROM citas WHERE especialidad = '$especialidadSeleccionada'";
$resultado = $conexion->query($sql);

$htmlCitas = '';
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Construir el HTML para cada cita
        // Aquí debes adaptar el código para generar el HTML de acuerdo a tu estructura y diseño

        $htmlCitas .= '<div class="cita">';
        $htmlCitas .= '<span class="especialidad-btn" data-especialidad="' . $fila['especialidad'] . '">' . $fila['especialidad'] . '</span>';
        // Otras etiquetas y datos de la cita
        $htmlCitas .= '</div>';
    }
} else {
    $htmlCitas = 'No se encontraron citas.';
}

// Devolver el HTML generado como respuesta AJAX
echo $htmlCitas;

// Cerrar la conexión a la base de datos
$conexion->close();
?>
?>