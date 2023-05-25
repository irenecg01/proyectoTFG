<?php
function obtenerColorHorario($horario) {
  $coloresHorarios = array(
    'mañana' => '#FADBD8', 
    'mediodía' => '#c4dafa', 
    'almuerzo' => '#F9E79F ', 
    'merienda' => '#F5EEF8 ', 
    'cena' => '#D5F5E3', 
    'noche' => '#F9E79F ' 
  );

  // Verificar si el horario existe en el arreglo de colores
  if (array_key_exists($horario, $coloresHorarios)) {
    return $coloresHorarios[$horario];
  } else {
    return '#000000'; // Color predeterminado si no se encuentra el horario
  }
}
?>
