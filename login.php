<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logueadostyles.css"> 
    <link href="https://fonts.googleapis.com/css2?family=San+Francisco&display=swap" rel="stylesheet">

    <title>Document</title>

</head>
<body>
  <div class="botones">
    <a href="citaMedica.php">
        <button id="Citamedica"  >Cita Médica</button>
      </a>
    
      <!-- Botón para Medicamentos -->
      <a href="medicamentos.php">
        <button id="medicamentos">Medicamentos</button>
      </a>
    </div>

    <div class="notificaciones">
      <h1>!NOTIFICACIONES!</h1>
      <div class="notificacion">
    <?php include("conexion.php"); 
    

     // Verificar si la conexión fue exitosa
     if ($conn) {
         // Obtener la cita más cercana y los medicamentos a tomar en ese día
         $query = "SELECT c.fecha, c.hora, c.especialidad, c.comentario, c.lugar, c.motivo, m.nombre AS nombre_medicamento, h.horario 
          FROM citas c
          LEFT JOIN horarios h ON c.id = h.id
          LEFT JOIN anadirmedicamentos m ON h.medicamentos_id = m.id
          WHERE c.fecha >= CURDATE()
          ORDER BY c.fecha ASC, c.hora ASC
          LIMIT 1";

         $result = mysqli_query($conn, $query);

         if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $fechaCita = $row['fecha'];
          $nombreMedicamento = $row['nombre_medicamento'];

          // Mostrar la notificación
          echo '<div class="notificacion">
                  <div class="icono">!</div>
                  <div class="contenido">
                    <div class="titulo">Tu cita más cercana es el ' . $fechaCita . '</div>
                    <div class="mensaje">No olvides tomar tu medicación ' . $nombreMedicamento . '</div>
                  </div>
                </div>';
      } else {
          echo "No tienes citas próximas ni medicamentos programados para hoy.";
      }

         // Liberar los resultados y cerrar la conexión
         mysqli_free_result($result);
         mysqli_close($conn);
     } else {
         echo "Error al conectar con la base de datos.";
     }
    
    
    
    
    ?>


    </div>
    </div>
</body>
</html>
    
    

    </div>
    </div>
</body>
</html>