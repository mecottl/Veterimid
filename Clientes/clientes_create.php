<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];


    $query = "INSERT INTO clientes (nombre, telefono, correo, direccion) VALUES ('$nombre', '$telefono', '$correo', '$direccion')";

    if ($enlace->query($query) === TRUE) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>