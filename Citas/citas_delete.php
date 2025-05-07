<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la cita
    $query = "DELETE FROM citas WHERE id_cita = $id";

    if ($enlace->query($query) === TRUE) {
        echo "Cita eliminada con éxito.";
        // Redirigir a la lista de citas después de eliminar
        header("Location: citas_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar cita: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>