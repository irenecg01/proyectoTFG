function mostrarCitas(especialidad) {
    if (especialidad === undefined || especialidad === 'todos') {
      window.location.href = 'lista_citas.php';
    } else {
      window.location.href = 'lista_citas.php?especialidad=' + encodeURIComponent(especialidad);
    }
  }
  