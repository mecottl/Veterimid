<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar la plantilla
    $query = "DELETE FROM inventario WHERE id_inventario = $id";

    if ($enlace->query($query) === TRUE) {
        echo "producto eliminado con éxito.";
        // Redirigir a la lista de inventario después de eliminar
        header("Location: inventario_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar prducto: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>