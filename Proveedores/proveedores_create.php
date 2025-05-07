<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contacto = $_POST["contacto"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];

    $query = "INSERT INTO proveedores (nombre,contacto,telefono,correo,direccion) VALUES ('$nombre', '$contacto', '$telefono', '$correo','$direccion')";

    if ($enlace->query($query) === TRUE) {
        header("Location: proveedores_read.html");
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>