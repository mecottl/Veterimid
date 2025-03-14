<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta para eliminar la proveedor
    $query = "DELETE FROM proveedores WHERE id_proveedor = $id";

    if ($enlace->query($query) === TRUE) {
        echo "proveedor eliminada con éxito.";
        // Redirigir a la lista de proveedores después de eliminar
        header("Location: proveedores_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar proveedor: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>
