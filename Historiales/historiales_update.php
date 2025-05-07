<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_historial']) && is_numeric($_POST['id_historial']) &&
        !empty($_POST['fecha']) &&
        !empty($_POST['mascota']) &&
        !empty($_POST['descripcion']) &&
        !empty($_POST['tratamiento'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_historial'];
        $mascota = $_POST['mascota'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];
        $tratamiento = $_POST['tratamiento'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE historial_medico SET descripcion = ?, fecha = ?, tratamiento = ?, id_mascota = ? WHERE id_historial = ?");
        $query->bind_param("sssii", $descripcion, $fecha, $tratamiento, $mascota, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: historiales_read.html"); // Redirige a la lista de historiales
            exit();
        } else {
            echo "Error al actualizar historial: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>