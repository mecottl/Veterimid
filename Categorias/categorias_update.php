<?php
include("../config/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los datos requeridos están presentes y son válidos
    if (
        !empty($_POST['id_categoria']) && is_numeric($_POST['id_categoria']) &&
        !empty($_POST['nombre']) &&
        !empty($_POST['descripcion'])
    ) {

        // Obtener los datos del formulario
        $id = $_POST['id_categoria'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        // Preparar la consulta de actualización
        $query = $enlace->prepare("UPDATE categoria SET nombre = ?, descripcion = ? WHERE id_categoria = ?");
        $query->bind_param("ssi", $nombre, $descripcion, $id);

        // Ejecutar la consulta
        if ($query->execute()) {
            header("Location: categorias_read.html"); // Redirige a la lista de categorias
            exit();
        } else {
            echo "Error al actualizar categoria: " . $query->error;
        }

    } else {
        echo "Datos incompletos.";
    }
}
?>