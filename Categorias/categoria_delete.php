<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta para eliminar la categoria
    $query = "DELETE FROM categorias WHERE id_categoria = $id";

    if ($enlace->query($query) === TRUE) {
        echo "categoria eliminada con éxito.";
        // Redirigir a la lista de categorias después de eliminar
        header("Location: categorias_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar categoria: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>
