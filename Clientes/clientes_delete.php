<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el cliente
    $query = "DELETE FROM clientes WHERE id_cliente = $id";

    if ($enlace->query($query) === TRUE) {
        echo "Cliente eliminado con éxito.";
        // Redirigir a la lista de clientes después de eliminar
        header("Location: clientes_read.html");
    } else {
        echo "Error al eliminar cliente: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado.";
}
?>