<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO categoria (nombre,descripcion) VALUES ('$nombre', '$descripcion')";

    if ($enlace->query($query) === TRUE) {
        header("Location: categorias_read.html");
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>