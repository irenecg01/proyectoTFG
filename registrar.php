<?php
    $validate = true;


    if( !isset($_POST["correo"]) ) $validate = false;
    if( !isset($_POST["contraseña"]) || (strlen($_POST["contraseña"])<2) ) $validate = false;

    if( $validate ){

        $correo=$_POST["correo"];
        $contrasena=$_POST["contraseña"];
     

        include("conexion.php");

        $query = "INSERT INTO registrar (correo,contrasena) VALUES ( ?, ? ) ";

        $q = $conn->prepare($query);
        $q->bind_param("ss",$correo,$contrasena);
        $q->execute();

        echo $q->affected_rows;

        if( $q->affected_rows == 1){
            // Usuario insertado correctamente
            header("location: ../login.html");

        } else {

        }

    }

?>