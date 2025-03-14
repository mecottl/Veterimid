<?php
include("../config/conectar.php");

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])){
    $id = $_GET['id'];

    // Consulta para eliminar la factura
    $query = "DELETE FROM facturas WHERE id_factura = $id";

    if ($enlace->query($query) === TRUE) {
        echo "factura eliminada con éxito.";
        // Redirigir a la lista de facturas después de eliminar
        header("Location: facturas_read.html");
        exit; // Siempre es bueno hacer un exit después de header para prevenir la ejecución posterior
    } else {
        echo "Error al eliminar factura: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>
