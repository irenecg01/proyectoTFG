<?php
include("conexion.php");

$citaId = $_GET['citaId'];

if (isset($_POST['citaId'])) {
    $citaId = $_POST['citaId'];
    $query = "SELECT * FROM citas WHERE id = $citaId";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // La cita existe, obtener los datos
        $cita = mysqli_fetch_assoc($result);
        ?>
        <form action="guardarcambios.php" method="POST">
          <input type="hidden" name="citaId" value="<?php echo $cita['id']; ?>">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" value="<?php echo $cita['nombre']; ?>">
          <!-- Otros campos del formulario -->
          <button type="submit">Guardar cambios</button>
        </form>
        <?php
      } else {
        // La cita no existe o no se encontró, mostrar un mensaje de error o redirigir a otra página
        echo "La cita no existe.";
      }
    }
$conn->close();
?>
