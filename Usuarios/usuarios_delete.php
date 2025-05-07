<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la usuario
    $query = "DELETE FROM usuarios WHERE id_usuario = $id";

    if ($enlace->query($query) === TRUE) {
        echo "usuario eliminado con éxito.";
        // Redirigir a la lista de usuarios después de eliminar
        header("Location: usuarios_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar usuario: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>