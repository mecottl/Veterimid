<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la historial
    $query = "DELETE FROM historial_medicos WHERE id_historial = $id";

    if ($enlace->query($query) === TRUE) {
        echo "historial eliminada con éxito.";
        // Redirigir a la lista de historials después de eliminar
        header("Location: historials_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar historial: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>