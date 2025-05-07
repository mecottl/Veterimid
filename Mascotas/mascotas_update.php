<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_mascota']) && is_numeric($_POST['id_mascota']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['especie']) &&
        !empty($_POST['raza']) &&
        !empty($_POST['edad']) &&
        !empty($_POST['peso']) &&
        !empty($_POST['cliente'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_mascota'];
        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $edad = $_POST['edad'];
        $peso = $_POST['peso'];
        $cliente = $_POST['cliente'];


        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE mascotas SET nombre = ?, especie = ?, raza = ?, edad = ?, peso = ?, id_cliente = ? WHERE id_mascota = ?");
        $query->bind_param("sssidii", $nombre, $especie, $raza, $edad, $peso, $cliente, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: mascotas_read.html"); // Redirige a la lista de mascotas
            exit();
        } else {
            echo "Error al actualizar mascota: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>