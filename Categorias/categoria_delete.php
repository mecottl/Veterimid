<?php
include("../config/conectar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM categorias WHERE id_categoria = $id";

    if ($enlace->query($query) === TRUE) {
        echo "categoria eliminada con éxito.";
        header("Location: categorias_read.html");
        exit;
    } else {
        echo "Error al eliminar categoria: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>