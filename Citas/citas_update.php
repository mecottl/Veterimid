<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_cita']) && is_numeric($_POST['id_cita']) &&
        !empty($_POST['motivo']) &&
        !empty($_POST['fecha']) &&
        !empty($_POST['hora']) &&
        !empty($_POST['mascota']) &&
        !empty($_POST['veterinario'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_cita'];
        $motivo = $_POST['motivo'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $mascota = $_POST['mascota'];
        $veterinario = $_POST['veterinario'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE citas SET motivo = ?, fecha = ?, hora = ?, id_mascota = ?, id_veterinario = ? WHERE id_cita = ?");
        $query->bind_param("sssiii", $motivo, $fecha, $hora, $mascota, $veterinario, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: citas_read.html"); // Redirige a la lista de citas
            exit();
        } else {
            echo "Error al actualizar cita: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>