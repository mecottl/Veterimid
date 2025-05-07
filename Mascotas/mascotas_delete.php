<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la mascota
    $query = "DELETE FROM mascotas WHERE id_mascota = $id";

    if ($enlace->query($query) === TRUE) {
        echo "mascota eliminada con éxito.";
        // Redirigir a la lista de mascota después de eliminar
        header("Location: mascotas_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar mascota: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>