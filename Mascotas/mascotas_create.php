<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $especie = $_POST["especie"];
    $raza = $_POST["raza"];
    $edad = $_POST["edad"];
    $peso = $_POST["peso"];
    $cliente = $_POST["cliente"];

    $query = "INSERT INTO mascotas (nombre,especie,raza,edad,peso,id_cliente) VALUES ('$nombre', '$especie', '$raza', '$edad','$peso','$cliente')";

    if ($enlace->query($query) === TRUE) {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>