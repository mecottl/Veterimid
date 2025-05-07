<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta para eliminar la venta
    $query = "DELETE FROM ventas WHERE id_venta = $id";

    if ($enlace->query($query) === TRUE) {
        echo "venta eliminada con éxito.";
        // Redirigir a la lista de ventas después de eliminar
        header("Location: ventas_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar venta: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>
