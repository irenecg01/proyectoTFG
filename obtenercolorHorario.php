<?php
function obtenerColorHorario($horario) {
  $coloresHorarios = array(
    'mañana' => '#FF0000', // Rojo
    'mediodía' => '#00FF00', // Verde
    'almuerzo' => '#0000FF', // Azul
    'merienda' => '#FFFF00', // Amarillo
    'cena' => '#FF00FF', // Magenta
    'noche' => '#00FFFF' // Cian
  );

  // Verificar si el horario existe en el arreglo de colores
  if (array_key_exists($horario, $coloresHorarios)) {
    return $coloresHorarios[$horario];
  } else {
    return '#000000'; // Color predeterminado si no se encuentra el horario
  }
}
?>
