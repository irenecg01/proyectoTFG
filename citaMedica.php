<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="citasstyle.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-TCKrH/3itT9KaRpx7jVQe6sj5nJEo60lKU/dq5wzuc6wD6ez9v5djrTJKeXx8IW/" crossorigin="anonymous">


</head>
<body>

<div class="citas">
  <h2>Mis Citas Médicas</h2>
  <!-- Lista de citas medicas -->
  <div id="lista-citas">
      <?php
      include("lista_citas.php");

      // Obtener el parámetro especialidad de la URL
      $especialidad = $_GET['especialidad'] ?? '';

      // Mostrar solo las citas de la especialidad seleccionada
      if (!empty($especialidad)) {
        echo '<script>filtrarCitasPorEspecialidad("' . $especialidad . '");</script>';
      }
      ?>
  </div>
</div>
<!-- Formulario de Edición -->
<div id="formulario-edicion" style="display: none;">
  <h2>Editar Cita</h2>
  <form id="form-edicion" class="formulario__login">
    <label for="nuevo-fecha">Fecha:</label>
    <input type="date" id="nuevo-fecha" name="nuevo-fecha" required>
    <br>
    <label for="nuevo-hora">Hora:</label>
    <input type="time" id="nuevo-hora" name="nuevo-hora" required>
    <br>
    <label for="nuevo-especialidad">Especialidad:</label>
    <input type="text" id="nuevo-especialidad" name="nuevo-especialidad" required>
    <br>
    <label for="nuevo-lugar">Lugar:</label>
    <input type="text" id="nuevo-lugar" name="nuevo-lugar" required>
    <br>
    <label for="nuevo-motivo">Motivo:</label>
    <input type="text" id="nuevo-motivo" name="nuevo-motivo" required>
    <br>
    <label for="nuevo-comentario">Comentario:</label>
    <input type="text" id="nuevo-comentario" name="nuevo-comentario">
    <br>
    <br>
    <button id="btn-guardar" type="button">Guardar</button>
  </form>
</div>


  <!-- Botón de Agregar Cita -->
  <div class="botones">
    <button id="btnAgregarCita" onclick="abrirModalAgregar('Agregar')">Agregar Cita</button>
    <button id="btnEditar">Editar</button>
    <a href="login.php"><button type="button">Volver Atrás</button></a>
    <button onclick="mostrarCitas('todos')">Mostrar Todo</button>
  </div>

  <!-- Modal de Agregar Cita -->
<div id="modalAgregar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModalCitas()">&times;</span>
    <h2>Agregar Cita</h2>
    <form action="guardarcita.php" method="POST" class="formulario__login" enctype="multipart/form-data">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" required>
      <br>
      <label for="hora">Hora:</label>
      <input type="time" id="hora" name="hora" required>
      <br>
      <label for="especialidad">Especialidad:</label>
      <input list="opciones" name="especialidad" id="especialidad" required>
      <datalist id="opciones">
        <option value="Cardiología">
        <option value="Traumatología">
        <option value="Endocrinología">
        <option value="Oncología">
        <option value="Endocrinología">  
      </datalist>
      <br>
      <label for="lugar">Lugar:</label>
      <input type="text" id="lugar" name="lugar" required>
      <br>
      <label for="motivo">Motivo:</label>
      <input type="text" id="motivo" name="motivo" required>
      <br>
      <label for="comentario">Comentario:</label>
      <input type="text" id="comentario" name="comentario">
      <br>
      <br>
      <button type="submit">Agregar</button>
    </form>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="hola.js"></script>
</body>
</html>
