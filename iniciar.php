<?php
$correo = $_POST["correo"];
$contrasena = $_POST["contraseña"];

try {
  $base = new PDO("mysql:host=localhost; dbname=ipet", "root","");
  $base-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $base-> exec("SET CHARACTER SET utf8");
  include("conexion.php");
  
  $sql = "SELECT * FROM usuarios WHERE correo=:correo  AND contrasena=:contrasena";
  $resultado = $base->prepare($sql);
  $login = htmlentities(addslashes($_POST['correo']));
  $password = htmlentities(addslashes($_POST['contrasena']));
  $resultado->bindValue(":correo", $correo);
  $resultado->bindValue(":contrasena", $contrasena);
  $resultado->execute();
  
  $numero_registro = $resultado->rowCount();
  
  if ($numero_registro != 0) {
    session_start();
    $sql = "SELECT nombre FROM usuarios WHERE correo=:correo AND contrasena=:contrasena";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":correo", $correo);
    $resultado->bindValue(":contrasena", $contrasena);
    $resultado->execute();
    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        $_SESSION['usuario'] = $usuario['nombre'];
    }
    
    header("Location: /login.html");
  } else {
    echo "Usuario incorrecto";
    header("Location: /inicio");
  }

} catch (Exception $e) {
  die("Error: " . $e->getMessage());
}
?>