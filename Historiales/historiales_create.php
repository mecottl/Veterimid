<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mascota = $_POST["mascota"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];
    $tratamiento = $_POST["tratamiento"];

    $query = "INSERT INTO historial_medico (descripcion,fecha,tratamiento,id_mascota) VALUES ('$descripcion', '$fecha', '$tratamiento', '$mascota')";

    if ($enlace->query($query) === TRUE) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>