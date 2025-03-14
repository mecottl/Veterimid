<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $rol = $_POST["rol"];

    $query = "INSERT INTO usuarios (nombre,correo,contraseña,rol) VALUES ('$nombre', '$correo', '$contraseña', '$rol')";
    
    if ($enlace->query($query) === TRUE) {
        header("Location: usuarios_read.html");
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>
