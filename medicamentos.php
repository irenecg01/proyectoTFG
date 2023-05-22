<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modal.css">
</head>
<body>
      <!-- Botones de horarios -->
<div class="horarios">
  <button onclick="mostrarMedicamentos('mañana')">Mañana</button>
  <button onclick="mostrarMedicamentos('mediodia')">Mediodia</button>
  <button onclick="mostrarMedicamentos('almuerzo')">Almuerzo</button>
  <button onclick="mostrarMedicamentos('merienda')">Merienda</button>
  <button onclick="mostrarMedicamentos('cena')">Cena</button>
  <button onclick="mostrarMedicamentos('noche')">Noche</button>
</div>

<br>

<!-- Lista de medicamentos -->


<div id="lista_medicamentos"></div>

<!-- Resto del contenido HTML -->

<!-- Botón que abre el modal -->
<button onclick="abrirModal()">Agregar Medicamento</button>

<button onclick="mostrarMedicamentos('todos')">Mostrar Todo</button>

<a href="login.php"><button type="button">Volver Atrás</button></a>
<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Contenido del modal -->
    <div class="modal-content">
        <!-- Formulario -->
        <form action="guardarmedicamentos.php" method="POST" class="formulario__login" enctype="multipart/form-data">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
            <label for="horario">Horario:</label>
            <input type="checkbox" id="manana-checkbox" name="horario[]" value="manana">
            <label for="manana-checkbox">Mañana</label>

            <input type="checkbox" id="mediodia-checkbox" name="horario[]" value="mediodia">
            <label for="mediodia-checkbox">Mediodía</label>

            <input type="checkbox" id="almuerzo-checkbox" name="horario[]" value="almuerzo">
            <label for="almuerzo-checkbox">Almuerzo</label>

            <input type="checkbox" id="merienda-checkbox" name="horario[]" value="merienda">
            <label for="merienda-checkbox">Merienda</label>

            <input type="checkbox" id="cena-checkbox" name="horario[]" value="cena">
            <label for="cena-checkbox">Cena</label>

            <input type="checkbox" id="noche-checkbox" name="horario[]"  value="noche">
            <label for="noche-checkbox">Dormir</label><br><br>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen"><br><br>

            <input type="submit" value="Guardar">
        </form>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="añadir.js"></script>

</body>
</html>
