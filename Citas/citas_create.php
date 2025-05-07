<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estado = $_POST["estado"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $mascota = $_POST["mascota"];
    $veterinario = $_POST["veterinario"];
    $motivo = $_POST["motivo"];

    $query = "INSERT INTO citas (estado,fecha,hora,id_mascota,id_veterinario,motivo) VALUES ('$estado', '$fecha', '$hora', '$mascota','$veterinario','$motivo')";

    if ($enlace->query($query) === TRUE) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error: " . $enlace->error;
    }
}
?>