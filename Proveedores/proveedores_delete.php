<?php
include("../config/conectar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM proveedores WHERE id_proveedor = $id";

    if ($enlace->query($query) === TRUE) {
        echo "proveedor eliminada con éxito.";
        header("Location: proveedores_read.html");
        exit;
    } else {
        echo "Error al eliminar proveedor: " . $enlace->error;
    }
} else {
    echo "ID no proporcionado o inválido.";
}
?>